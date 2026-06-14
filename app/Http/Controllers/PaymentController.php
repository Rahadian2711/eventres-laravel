<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Ticket;
use App\Services\MidtransService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Midtrans\Notification;

class PaymentController extends Controller
{
    /**
     * Tampilkan halaman pembayaran.
     * Route: GET /payment/{order}
     */
    public function show(Order $order)
    {
        abort_if($order->user_id !== Auth::id(), 403);

        if ($order->status !== 'pending') {
            return redirect()->route('home')
                ->with('info', 'Pesanan ini sudah diproses atau dibatalkan.');
        }

        $order->load(['event', 'ticketCategory']);

        $event      = $order->event;
        $ticket     = $order->ticketCategory;
        $quantity   = $order->quantity;
        $subtotal   = $order->subtotal;
        $serviceFee = $order->service_fee;
        $total      = $order->total;

        $notifications = collect();

        return view('payment.payment', compact(
            'order',
            'event',
            'ticket',
            'quantity',
            'subtotal',
            'serviceFee',
            'total',
            'notifications',
        ));
    }

    /**
     * Generate pembayaran (QRIS / VA / e-wallet) via Midtrans Core API.
     * Dipanggil saat tombol "Bayar Sekarang" diklik.
     *
     * Route: POST /payment/{order}/charge
     */
    public function charge(Request $request, Order $order)
    {
        abort_if($order->user_id !== Auth::id(), 403);
        abort_if($order->status !== 'pending', 400, 'Pesanan tidak valid.');

        $request->validate([
            'payment_method' =>
            'required|in:qris,bca,bni,bri,gopay,shopeepay',
        ]);

        try {
            $result = MidtransService::charge($order, $request->payment_method);

            if (!$order->payment_expired_at) {
                $result['payment_expired_at'] = now()->addMinutes(15);
            }

            $order->update($result);

            return response()->json([
                'success' => true,
                'method' => $request->payment_method,
                'payment_code' => $order->payment_code,
                'qr_url' => $order->qr_url,
                'deeplink_url' => $order->deeplink_url,
                'expired_at' => $order->payment_expired_at->toIso8601String(),
            ]);
        } catch (\Exception $e) {
            Log::error('Payment charge failed: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Gagal memproses pembayaran.'], 500);
        }
    } 


    /**
     * Polling status pembayaran dari frontend.
     * Route: GET /payment/{order}/status
     */
    public function checkStatus(Order $order)
    {
        abort_if($order->user_id !== Auth::id(), 403);

        return response()->json([
            'status' => $order->status,
        ]);
    }

    /**
     * Webhook notification dari Midtrans.
     * Route: POST /midtrans/notification
     */
    public function notification()
    {
        MidtransService::init();

        $notification = new Notification();

        $transactionStatus = $notification->transaction_status;
        $orderId = $notification->order_id;

        // Format: ORDER-{id}-{timestamp}
        $orderCode = explode('-', $orderId);
        $order = Order::find($orderCode[1] ?? null);

        if (!$order) {
            return response()->json(['message' => 'Order tidak ditemukan'], 404);
        }

        switch ($transactionStatus) {
            case 'settlement':
            case 'capture':
                $order->update([
                    'status' => 'paid',
                    'transaction_id' => $notification->transaction_id,
                    'payment_type' => $notification->payment_type,
                ]);

                // Auto-generate tiket jika belum ada
                if (!$order->ticket) {
                    $quantity = $order->quantity ?? 1;
                    for ($i = 0; $i < $quantity; $i++) {
                        $ticketCode = 'TIX-' . strtoupper(Str::random(4)) . '-' . $order->id . '-' . ($i + 1);
                        Ticket::create([
                            'order_id'    => $order->id,
                            'ticket_code' => $ticketCode,
                            'qr_code'     => $ticketCode, // value untuk di-encode jadi QR
                            'status'      => 'active',
                        ]);
                    }
                }
                break;

            case 'expire':
                $order->update(['status' => 'expired']);
                break;

            case 'cancel':
            case 'deny':
                $order->update(['status' => 'cancelled']);
                break;

            case 'pending':
                break;
        }

        return response()->json(['message' => 'Notification processed']);
    }
}   