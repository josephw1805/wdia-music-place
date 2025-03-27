<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
