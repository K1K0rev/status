<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $orders = Order::where('user_id', $user->id)->with('services')->get();

        return Inertia::render('Order/Orders', [
            'orders' => $orders->sortBy('created_at')->values()
        ]);
    }

    public function history()
    {

        $user = Auth::user();

        $orders = Order::where('user_id', $user->id)->with('services')->get();

        return Inertia::render('Order/OrdersHistory', [
            'orders' => $orders->sortBy('created_at')
        ]);
    }

    public function info($id)
    {
        $order = Auth::user()->orders()->with('history_orders')->find($id);

        return Inertia::render('Order/OrderInfo', [
            'order' => $order
        ]);
    }

    public function destroy($id)
    {
        $order = Auth::user()->orders()->findOrFail($id);

        abort_unless($order->user_id == Auth::id(), 403, 'Вы не можете удалить чужой заказ');

        $order->delete();

        return redirect()->back()->with('alert', [
            'type' => 'success',
            'message' => 'Заказ успешно удален'
        ]);
    }
}
