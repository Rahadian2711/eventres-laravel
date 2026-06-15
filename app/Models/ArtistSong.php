<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtistSong extends Model
{
    protected $fillable = [
        'artist_id',
        'title',
        'album',
        'year',
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}
