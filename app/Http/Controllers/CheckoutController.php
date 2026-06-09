<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Order;
use App\Models\TicketCategory;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'ticket_category_id' => 'required|exists:ticket_categories,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $ticket = TicketCategory::findOrFail(
            $request->ticket_category_id
        );

        $subtotal = $ticket->price * $request->quantity;

        $serviceFee = 5000;

        $total = $subtotal + $serviceFee;

        $order = Order::create([
            'user_id' => auth()->id(),
            'event_id' => $request->event_id,
            'ticket_category_id' => $ticket->id,
            'quantity' => $request->quantity,
            'subtotal' => $subtotal,
            'service_fee' => $serviceFee,
            'total' => $total,
            'status' => 'pending',
            'expired_at' => now()->addMinutes(15),
        ]);

        return redirect()
            ->route('payment.show', $order->id);
    }
}