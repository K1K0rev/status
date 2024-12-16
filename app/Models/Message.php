<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    protected $fillable = [
        'user_id',
        'chat_id',
        'text',
    ];

    protected function chats() : BelongsTo
    {
        return $this->belongsTo(Chat::class);
    }

    protected function users() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
