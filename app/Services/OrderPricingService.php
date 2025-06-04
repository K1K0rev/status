<?php

namespace App\Services;

use App\Models\Order;
use Carbon\Carbon;

class OrderPricingService
{
	public function calculateTotal(Order $order): float
	{
		$base = $order->services->sum(function ($service) {
			return $service->price * $service->pivot->quantity;
		});

		$start = Carbon::parse($order['start_date']);
    $end = Carbon::parse($order['end_date']);

    $working_days = $start->diffInDays($end);

		if ($order->height >= 1 && $order->height <= 50) {
			$base += 2000;
		} elseif($order->height > 50 && $order->height <= 100) {
			$base += 4000;
		}

		if($order->surface_area) {
			$units = floor($order->surface_area / 100);
			$base += $units * 5000;
		}

		if ($order->rent_equipment === true && $working_days != null) {
			$rent_working_days = 5000 * $working_days;
			$base += $rent_working_days;
		}

		if ($order->complexity === 'средняя') $base *= 1.25;
		if ($order->complexity === 'сложная') $base *= 1.5;

		if ($order->accessibility_surface === 'затрудненное') $base *= 1.25;
		if ($order->accessibility_surface === 'критическое') $base *= 1.5;

		if ($order->accessibility_workplace === 'затрудненное') $base *= 1.25;
		if ($order->accessibility_workplace === 'критическое') $base *= 1.5;

		if($order->protect_other_components === true) $base *= 1.5;

		if($order->combined_work === true) $base *= 1.5;

		return round($base, 2);
	}
}
