<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Service extends Model
{
    protected $fillable = [
        'name',
        'short_description',
        'price',
        'status',
        'img'
    ];

    public function toCartItem()
    {
        return [
            'id' => $this->id,
            'price' => $this->price,
            'quantity' => $this->pivot->quantity,
            'custom_price' => $this->pivot->custom_price,
        ];
    }

    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class, 'cart_services')
            ->withPivot('quantity', 'custom_price');
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_services')
            ->withPivot(['quantity', 'total_price'])
            ->withTimestamps();
    }
}
