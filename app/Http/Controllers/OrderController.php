<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\TicketCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $ticket = TicketCategory::findOrFail(
            $request->ticket_category_id
        );

        $subtotal = $ticket->price;

        $serviceFee = 5000;

        $order = Order::create([
            'user_id' => Auth::id(),
            'event_id' => $ticket->event_id,
            'ticket_category_id' => $ticket->id,
            'quantity' => 1,
            'subtotal' => $subtotal,
            'service_fee' => $serviceFee,
            'total' => $subtotal + $serviceFee,
            'status' => 'pending',
            'expired_at' => now()->addMinutes(15),
        ]);

        return redirect()->route(
            'payment.show',
            $order
        );
    }
}