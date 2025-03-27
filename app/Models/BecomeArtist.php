<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BecomeArtist extends Model
{
    protected $fillable = [
        'image',
        'title',
        'subtitle',
        'button_text',
        'button_url'
    ];
}
