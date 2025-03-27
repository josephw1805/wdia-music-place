<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'background',
        'video_url',
        'description',
        'button_text',
        'button_url'
    ];
}
