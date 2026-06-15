<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
        'bio',
        'genre',
    ];

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function songs()
    {
        return $this->hasMany(ArtistSong::class);
    }

    public function upcomingEvents()
    {
        return $this->belongsToMany(Event::class)
            ->whereHas('schedules', fn($q) =>
                $q->where('start_time', '>=', now())
            )
            ->where('status', 'published')
            ->with(['schedules', 'ticketCategories', 'category'])
            ->orderBy('events.created_at', 'desc');
    }

    public function pastEvents()
    {
        return $this->belongsToMany(Event::class)
            ->whereHas('schedules', fn($q) =>
                $q->where('start_time', '<', now())
            )
            ->where('status', 'published')
            ->with(['schedules', 'ticketCategories', 'category'])
            ->orderBy('events.created_at', 'desc');
    }
}