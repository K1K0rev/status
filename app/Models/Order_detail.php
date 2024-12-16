<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order_detail extends Model
{
    protected $fillable = [
        'order_id',
        'service_id',
        'total_price',
    ];

    protected function services() : BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    protected function orders() : BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
