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
    ];

    protected function carts() : BelongsToMany
    {
        return $this->belongsToMany(Cart::class, 'cart_services');
    }

    protected function order_details() : HasMany
    {
        return $this->hasMany(Order_detail::class);
    }
}
