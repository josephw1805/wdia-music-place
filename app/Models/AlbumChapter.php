<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AlbumChapter extends Model
{
    function tracks(): HasMany
    {
        return $this->hasMany(AlbumChapterTrack::class, 'chapter_id', 'id')->orderBy('order');
    }
}
