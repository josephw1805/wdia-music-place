<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WatchHistory extends Model
{
    protected $fillable = ['user_id', 'chapter_id', 'album_id', 'track_id', 'is_completed', 'updated_at'];
}
