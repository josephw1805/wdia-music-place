<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LatestAlbum extends Model
{
    protected $fillable = [
        'category_one',
        'category_two',
        'category_three',
        'category_four',
    ];
}
