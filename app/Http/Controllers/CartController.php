<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart\StoreOrderRequest;
use App\Models\Cart;
use App\Models\Chat;
use App\Models\Order;
use App\Models\Service;
use App\Services\OrderPricingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Auth::user()->carts()->with('services')->first();

        if ($cartItems) {
            $total = $cartItems->services->sum(function ($service) {
                return $service->pivot->quantity * $service->price;
            });
        } else {
            $total = 0;
        }

        return Inertia::render('Cart/Cart', [
            'cartItems' => $cartItems,
            'total' => $total,
        ]);
    }

    public function store(StoreOrderRequest $request)
    {
        $validated = $request->validated();

        $user = Auth::user();

        $cartItems = Cart::where('user_id', $user->id)->with('services')->first();

        $total = $cartItems->services->sum(function ($service) {
            return $service->pivot->quantity * $service->price;
        });

        $order = Order::create([
            'user_id' => $user->id,
            'total_price' => $total,
            ...$validated
        ]);


        foreach ($cartItems->services as $service) {
            $order->services()->attach($service->id, [
                'quantity' => $service->pivot->quantity,
                'price' => $service->price,
            ]);
        }

        $calculator = app(OrderPricingService::class);
        $calculatedTotal = $calculator->calculateTotal($order);

        $order->update([
            'total_price' => $calculatedTotal,
        ]);

        $chat = Chat::create([
            'order_id' => $order->id,
        ]);

        $chat->users()->attach($user->id, [
            'user_id' => $user->id,
            'chat_id' => $chat->id
        ]);

        $cartItems->services()->detach();

        return redirect()->route('orders')->with('alert', [
            'type' => 'success',
            'message' => 'Заказ успешно создан'
        ]);
    }

    public function calculate(Request $request)
    {
        $input = $request->all();

        $tempOrder = new Order($input);

        if (auth()->check()) {
            $cartItems = Cart::where('user_id', auth()->id())
                ->with('services')
                ->first();

            if ($cartItems) {
                $tempOrder->setRelation('services', $cartItems->services);
            }
        }

        $calculator = app(OrderPricingService::class);
        $total = $calculator->calculateTotal($tempOrder);

        return Inertia::render('Cart/Cart', [
            'calculatedTotal' => $total,
        ]);
    }

    public function update(Request $request, $service_id)
    {
        $cart = Auth::user()->carts()->firstOrFail();

        $cart->services()->updateExistingPivot($service_id, [
            'quantity' => $request->quantity,
        ]);

        return back();
    }

    public function destroy($service_id)
    {
        $cart = Auth::user()->carts()->firstOrFail();

        $cart->services()->detach($service_id);

        return back();
    }

    public function clear()
    {

        $cart = Cart::where('user_id', Auth::id())->first();
        $cart->services()->detach();

        return redirect()->back();
    }
}
