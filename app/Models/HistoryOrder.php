<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistoryOrder extends Model
{
    protected $fillable = [
        'order_id',
        'title',
        'description',
    ];

    public function orders() : BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
