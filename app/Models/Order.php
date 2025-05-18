<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'service_id',
        'status',
        'total_price'
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function chats(): HasOne
    {
        return $this->hasOne(Chat::class);
    }

    public function history_orders(): BelongsTo
    {
        return $this->belongsTo(History_order::class);
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'order_services')
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
