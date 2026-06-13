<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderHistoryController extends Controller
{
    /**
     * Tampilkan semua riwayat pembayaran milik user yang login.
     * Route: GET /riwayat-pembayaran
     */
    public function index()
    {
        $orders = Order::with(['event', 'ticketCategory'])
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        // Auto-expire order yang sudah lewat waktu tapi masih pending
        $orders->each(function ($order) {
            if (
                $order->status === 'pending' &&
                $order->expired_at &&
                now()->gt($order->expired_at)
            ) {
                $order->update(['status' => 'expired']);
                $order->status = 'expired'; // update in-memory juga
            }
        });

        return view('payment.history', compact('orders'));
    }

    /**
     * Tampilkan detail satu order.
     * Route: GET /riwayat-pembayaran/{order}
     */
    public function show(Order $order)
    {
        abort_if($order->user_id !== Auth::id(), 403);

        $order->load(['event', 'ticketCategory']);

        // Auto-expire jika waktu sudah habis
        if (
            $order->status === 'pending' &&
            $order->expired_at &&
            now()->gt($order->expired_at)
        ) {
            $order->update(['status' => 'expired']);
            $order->status = 'expired';
        }

        return view('payment.history-detail', compact('order'));
    }
}
