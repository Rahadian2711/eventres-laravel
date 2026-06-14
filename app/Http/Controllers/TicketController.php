<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Daftar semua tiket milik user yang login.
     * Route: GET /tiket-saya
     */
    public function index()
    {
        $tickets = Ticket::with(['order.event', 'order.ticketCategory'])
            ->whereHas('order', fn($q) => $q->where('user_id', Auth::id()))
            ->latest()
            ->paginate(10);

        return view('ticket.index', compact('tickets'));
    }

    /**
     * Tampilkan tiket detail dengan QR code.
     * Route: GET /tiket-saya/{ticket}
     */
    public function show(Ticket $ticket)
    {
        // Pastikan tiket milik user yang login
        abort_if($ticket->order->user_id !== Auth::id(), 403);

        $ticket->load(['order.event', 'order.ticketCategory', 'order.user']);

        return view('ticket.show', compact('ticket'));
    }
}
