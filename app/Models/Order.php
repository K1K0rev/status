<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'service_id',
        'status',
    ];

    protected function users() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function chats() : BelongsTo
    {
        return $this->belongsTo(Chat::class);
    }

    protected function history_orders() : BelongsTo
    {
        return $this->belongsTo(History_order::class);
    }

    protected function order_details() : HasMany
    {
        return $this->hasMany(Order_detail::class);
    }
}
