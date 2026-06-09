<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventSchedule extends Model
{
    protected $fillable = [
        'event_id',
        'title',
        'start_time',
        'end_time'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}