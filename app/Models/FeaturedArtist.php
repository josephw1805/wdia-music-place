<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturedArtist extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'button_text',
        'button_url',
        'artist',
        'featured_albums',
        'artist_image'
    ];
}
