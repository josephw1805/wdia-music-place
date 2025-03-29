<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Album extends Model
{
    function artist(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'artist_id');
    }

    function category(): HasOne
    {
        return $this->hasOne(AlbumCategory::class, 'id', 'category_id');
    }

    function genre(): HasOne
    {
        return $this->hasOne(AlbumGenre::class, 'id', 'genre_id');
    }

    function language(): HasOne
    {
        return $this->hasOne(AlbumLanguage::class, 'id', 'language_id');
    }

    function chapters(): HasMany
    {
        return $this->hasMany(AlbumChapter::class, 'album_id', 'id')->orderBy('order');
    }

    function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'album_id', 'id');
    }
}
