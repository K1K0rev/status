<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'service_id',
        'total_price',
    ];

    protected function users() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function cart_services() : BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'cart_services');
    }
}
