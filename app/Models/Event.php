<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'category_id','title','slug','organizer',
        'description','thumbnail','banner','venue','status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ticketCategories()
    {
        return $this->hasMany(TicketCategory::class);
    }

    public function schedules()
    {
        return $this->hasMany(EventSchedule::class);
    }

    public function tags()
    {
        return $this->hasMany(EventTag::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}