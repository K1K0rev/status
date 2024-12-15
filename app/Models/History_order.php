<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History_order extends Model
{
    protected $fillable = [
        'order_id',
        'title',
        'description',
    ];
}
