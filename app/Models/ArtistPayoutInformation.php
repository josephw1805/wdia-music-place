<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtistPayoutInformation extends Model
{
    protected $fillable = [
        'artist_id',
        'gateway',
        'information'
    ];
}
