<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index() {

        $orders = Order::all();

        return Inertia::render('AdminPanel/AdminPanel', [
            'orders' => $orders
        ]);
    }

    public function show($id) {

        $order = Order::with('user:id,fullname,login', 'services')->findOrFail($id);

        return Inertia::render('AdminPanel/Order', [
            'order' => $order
        ]);
    }
}
