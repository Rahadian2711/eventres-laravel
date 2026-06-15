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

    // Konser mendatang
    public function upcomingEvents()
    {
        return $this->belongsToMany(Event::class)
            ->whereHas('schedules', fn($q) =>
                $q->where('start_time', '>=', now())
            )
            ->where('status', 'published')
            ->with('schedules')
            ->latest();
    }

    // Konser sebelumnya
    public function pastEvents()
    {
        return $this->belongsToMany(Event::class)
            ->whereHas('schedules', fn($q) =>
                $q->where('start_time', '<', now())
            )
            ->where('status', 'published')
            ->with('schedules')
            ->latest();
    }
}
