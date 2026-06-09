<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Event;
use App\Models\TicketCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;
use Midtrans\Transaction;
use Midtrans\Config;
use Midtrans\Notification;

class PaymentController extends Controller
{
    /**
     * Tampilkan halaman pembayaran.
     *
     * Route: GET /payment/{order}
     * Contoh: Route::get('/payment/{order}', [PaymentController::class, 'show'])->name('payment.show');
     *
     * Asumsi model Order memiliki kolom:
     *   - id, event_id, ticket_category_id, user_id
     *   - quantity, subtotal, service_fee, total
     *   - payment_code (nomor VA / kode bayar)
     *   - expired_at (Carbon / datetime)
     *   - status (pending, paid, cancelled)
     *
     * Asumsi relasi Order:
     *   - belongsTo Event
     *   - belongsTo TicketCategory
     */
    public function show(Order $order)
    {
        // Pastikan order milik user yang sedang login
        abort_if($order->user_id !== Auth::id(), 403);

        // Batalkan akses jika order sudah kedaluwarsa atau bukan pending
        if ($order->status !== 'pending') {
            return redirect()->route('home')
                ->with('info', 'Pesanan ini sudah diproses atau dibatalkan.');
        }

        // Load relasi yang dibutuhkan
        $order->load(['event', 'ticketCategory']);

        // ── Data yang dikirim ke view ──────────────────────────────
        $event      = $order->event;              // App\Models\Event
        $ticket     = $order->ticketCategory;     // App\Models\TicketCategory
        $quantity   = $order->quantity;           // int
        $subtotal   = $order->subtotal;           // int / float  (harga × qty)
        $serviceFee = $order->service_fee;        // int / float
        $total      = $order->total;              // int / float  (subtotal + service_fee)
        // ──────────────────────────────────────────────────────────

        // Notifikasi untuk dropdown navbar (opsional — bisa juga via View Composer)
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
     * Proses pemilihan metode pembayaran & simpan ke order.
     *
     * Route: POST /payment/{order}/method
     */
    public function selectMethod(Request $request, Order $order)
    {
        abort_if($order->user_id !== Auth::id(), 403);

        $request->validate([
            'payment_method' => 'required|in:qris,bca,bni,mandiri,gopay,dana,ovo,shopee',
        ]);

        $order->update([
            'payment_method' => $request->payment_method,
        ]);

        // Di sini Anda bisa memanggil Midtrans / payment gateway untuk generate VA
        // Contoh: $paymentCode = MidtransService::createVA($order);

        return redirect()->route('payment.show', $order)
            ->with('success', 'Metode pembayaran berhasil dipilih.');
    }

    public function createTransaction(Order $order)
    {
        abort_if($order->user_id !== Auth::id(), 403);

        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . $order->id . '-' . time(),
                'gross_amount' => (int) $order->total,
            ],

            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ],
        ];

        //$snapToken = Snap::getSnapToken($params);
        try {

            $snapToken = Snap::getSnapToken($params);

        } catch (\Exception $e) {

            Log::error('Midtrans Error: ' . $e->getMessage());

            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }

        return response()->json([
            'snap_token' => $snapToken,
        ]);
    }

    public function notification()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $notification = new Notification();

        $transactionStatus = $notification->transaction_status;
        $orderId = $notification->order_id;

        $orderCode = explode('-', $orderId);

        $order = Order::find($orderCode[1]);

        if (!$order) {
            return response()->json([
                'message' => 'Order tidak ditemukan'
            ], 404);
        }

        if (
            $transactionStatus == 'settlement' ||
            $transactionStatus == 'capture'
        ) {

            $order->update([
                'status' => 'paid',
                'transaction_id' => $notification->transaction_id,
                'payment_type' => $notification->payment_type,
            ]);
        }

        if (
            $transactionStatus == 'expire'
        ) {

            $order->update([
                'status' => 'expired'
            ]);
        }

        if (
            $transactionStatus == 'cancel'
        ) {

            $order->update([
                'status' => 'cancelled'
            ]);
        }

        return response()->json([
            'message' => 'Notification processed'
        ]);
    }
}
