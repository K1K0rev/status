<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Service;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ServiceController extends Controller {
	public function index() {
		$services = Service::all();

		return Inertia::render('Services', [
			'services' => $services
		]);

	}
	public function show($id) {
		$service = Service::find($id);

		return Inertia::render("ServiceInfo".$id, [
			'service' => $service
		]);
	}

	public function info() {
		$services = Service::all();
    return Inertia::render('ServiceInfo', [
			'services' => $services
		]);
  }

	public function info_id($id) {
		$service = Service::findOrFail($id);
		return Inertia::render('ServiceInfo'. $id, 
		[
			'service' => $service
		]);
	}

	public function add_to_cart($id) {

		$cart = Cart::firstOrCreate([
			'user_id' => auth()->id()
		]);

		$cart->services()->attach($id, [
			'quantity' => 1,
			'created_at' => now()
		]);

		return redirect()->back();
	}
}
