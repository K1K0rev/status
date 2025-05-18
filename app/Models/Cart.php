<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'total_price',
    ];

    public function users() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function services() : BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'cart_services')
        ->orderBy('cart_services.created_at', 'asc')
        ->withPivot('quantity');
    }
}
