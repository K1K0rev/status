<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Auth::user()->carts()->with('services')->first();

        if($cartItems) {
            $total = $cartItems->services->sum(function ($service) {
                return $service->pivot->quantity * $service->price;
            });
        } else {
            $total = 0;
        }   

        return Inertia::render('Cart', [
            'cartItems' => $cartItems,
            'total' => $total,
        ]);
    }


    public function store(Request $request)
    {
        $item = Auth::user()->cartItems()->firstOrCreate([
            'service_id' => $request->service_id
        ]);

        $item->increment('quantity');

        return redirect()->back();
    }

    public function update(Request $request, Service $service)
    {
        $cart = Auth::user()->carts()->firstOrFail();

        $cart->services()->updateExistingPivot($service->id, [
            'quantity' => $request->quantity,
        ]);

        return back();
    }

    public function destroy(Service $service)
    {
        $cart = Auth::user()->carts()->firstOrFail();

        $cart->services()->detach($service->id);

        return redirect()->back();
    }

    public function clear()
    {

        $cart = Cart::where('user_id', Auth::id())->first();
        $cart->services()->detach();

        return redirect()->back();
    }
}
