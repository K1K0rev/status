<?php

namespace App\Http\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
	public function rules()
	{
		return [
			'height' => 'required|numeric|min:0',
			'surface_area' => 'required|numeric|min:0',
			'rent_equipment' => 'required|boolean',
			'complexity' => 'required|in:легкая,средняя,сложная',
			'accessibility_surface' => 'required|in:свободное,затрудненное,критическое',
			'accessibility_workplace' => 'required|in:свободное,затрудненное,критическое',
			'protect_other_components' => 'required|boolean',
			'schedule' => 'required|boolean',
			'combined_work' => 'required|boolean',
			'start_date' => 'required|date',
			'end_date' => 'required|date',
		];
	}

	public function messages()
	{
		return [
			'*.required' => 'Поле обязательно для заполнения',
		];
	}

	public function attributes()
	{
		return [
			'height' => 'Высота',
			'surface_area' => 'Площадь обработки',
			'rent_equipment' => 'Аренда оборудования'
		];
	}
}
