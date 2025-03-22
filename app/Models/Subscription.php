<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    function album(): BelongsTo
    {
        return $this->belongsTo(Album::class, 'album_id', 'id');
    }
}
