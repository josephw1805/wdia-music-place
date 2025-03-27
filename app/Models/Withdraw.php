<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Withdraw extends Model
{
    function artist(): BelongsTo
    {
        return $this->belongsTo(User::class, 'artist_id', 'id');
    }
}
