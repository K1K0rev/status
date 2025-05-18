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
            'orders' => $orders
        ]);
    }

    public function store()
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->with('services')->first();

        $total = $cartItems->services->sum(function ($service) {
                return $service->pivot->quantity * $service->price;
        });

        // Создаем заказ
        $order = Order::create([
            'user_id' => $user->id,
            'total_price' => $total
        ]);

        // Привязываем услуги к заказу
        foreach ($cartItems->services as $service) {
            $order->services()->attach($service->id, [
                'quantity' => $service->pivot->quantity,
                'price' => $service->price,
            ]);
        }

        // Очищаем корзину
        $cartItems->services()->detach();

        return redirect()->route('orders');
    }
}
