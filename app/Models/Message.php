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

    public function chats() : BelongsTo
    {
        return $this->belongsTo(Chat::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
