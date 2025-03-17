<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AlbumCategory extends Model
{
    function subCategories(): HasMany
    {
        return $this->hasMany(AlbumCategory::class, 'parent_id');
    }
}
