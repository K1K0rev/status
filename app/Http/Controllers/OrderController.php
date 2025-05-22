<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        $orders = Order::where('user_id', $user->id)->with('services')->get();

        return Inertia::render('Orders', [
            'orders' => $orders->sortBy('created_at')->values()
        ]);
    }

    public function store()
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->with('services')->first();

        $total = $cartItems->services->sum(function ($service) {
                return $service->pivot->quantity * $service->price;
        });

        $order = Order::create([
            'user_id' => $user->id,
            'total_price' => $total
        ]);

        foreach ($cartItems->services as $service) {
            $order->services()->attach($service->id, [
                'quantity' => $service->pivot->quantity,
                'price' => $service->price,
            ]);
        }

        $cartItems->services()->detach();

        return redirect()->route('orders');
    }

    public function history() {

        $user = Auth::user();

        $orders = Order::where('user_id', $user->id)->with('services')->get();

        return Inertia::render('OrdersHistory', [
            'orders' => $orders->sortBy('created_at')->values()
        ]);
    }

    public function info($id) {

        $order = Auth::user()->orders()->with('history_orders')->find($id);

        return Inertia::render('OrderInfo', [
            'order' => $order
        ]);
    }
}
