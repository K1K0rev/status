<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chat extends Model
{
    protected $fillable = [
        'order_id',
        'user_id',
        'status',
    ];

    protected function users() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function orders() : BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    protected function messages() : HasMany
    {
        return $this->hasMany(Message::class);
    }
}
