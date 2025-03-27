<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    function album(): BelongsTo
    {
        return $this->belongsTo(Album::class, 'album_id', 'id');
    }

    function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
