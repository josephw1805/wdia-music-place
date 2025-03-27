<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUsSection extends Model
{
    protected $fillable = [
        'image',
        'video_image',
        'round_text',
        'subscriber_count',
        'title',
        'description',
        'button_text',
        'button_url',
        'video_url',
    ];
}
