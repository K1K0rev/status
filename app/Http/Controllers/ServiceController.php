<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Service;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ServiceController extends Controller
{
	public function index() {
		$services = Service::orderBy('created_at')->get();

		return Inertia::render('Service/Services', [
			'services' => $services
		]);

	}
	public function show($id) {
		$service = Service::find($id);

		return Inertia::render('Service/ServiceInfo'.$id, [
			'service' => $service
		]);
	}

	public function info() {
		$services = Service::all();
    return Inertia::render('Service/ServiceInfo', [
			'services' => $services
		]);
  }

	public function info_id($id) {
		$service = Service::findOrFail($id);
		return Inertia::render('Service/ServiceInfo'. $id, 
		[
			'service' => $service
		]);
	}

public function add_to_cart($id)
{
    $cart = Cart::firstOrCreate([
        'user_id' => auth()->id()
    ]);

    $existingService = $cart->services()->where('service_id', $id)->first();

    if ($existingService) {
        $cart->services()->updateExistingPivot($id, [
            'quantity' => $existingService->pivot->quantity + 1,
            'updated_at' => now()
        ]);
    } else {
        $cart->services()->attach($id, [
            'quantity' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    return redirect()->back()->with('alert', [
			'type' => 'success',
			'message' => 'Сервис добавлен в корзину'
		]);
}
}
