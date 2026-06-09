<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'event_id',
        'ticket_category_id',
        'quantity',
        'subtotal',
        'service_fee',
        'total',
        'payment_method',
        'payment_code',
        'status',
        'expired_at',
    ];

    protected $casts = [
        'expired_at' => 'datetime',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function ticketCategory()
    {
        return $this->belongsTo(TicketCategory::class);
    }

    public function ticket()
    {
        return $this->hasOne(Ticket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
