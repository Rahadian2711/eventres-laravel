<?php

namespace App\Services;

use App\Models\Order;
use Midtrans\Config;
use Midtrans\CoreApi;

class MidtransService
{
    public static function init(): void
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$clientKey = config('midtrans.client_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    /**
     * Charge sesuai metode pembayaran yang dipilih user.
     * Mengembalikan array hasil yang siap disimpan ke Order.
     */
    public static function charge(Order $order, string $method): array
    {
        self::init();

        $orderId = self::buildOrderId($order);
        $grossAmount = (int) $order->total;

        $customer = [
            'first_name' => $order->user->name,
            'email' => $order->user->email,
        ];

        $payload = match ($method) {
            'qris' => [
                'payment_type' => 'qris',
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => $grossAmount,
                ],
                'qris' => ['acquirer' => 'gopay'],
            ],

            'bca' => self::vaPayload($orderId, $grossAmount, 'bca', $customer),
            'bni' => self::vaPayload($orderId, $grossAmount, 'bni', $customer),
            'bri' => self::vaPayload($orderId, $grossAmount, 'bri', $customer),

            'gopay' => [
                'payment_type' => 'gopay',
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => $grossAmount,
                ],
                'gopay' => ['enable_callback' => false],
            ],

            default => throw new \InvalidArgumentException("Metode pembayaran '{$method}' tidak didukung."),
        };

        $response = (array) CoreApi::charge($payload);

        return self::extractResult($response, $method, $orderId);
    }

    private static function vaPayload(
    string $orderId,
    int $grossAmount,
    string $bank,
    array $customer
):array
    {
        

        return [
            'payment_type' => 'bank_transfer',
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $grossAmount,
            ],
            'bank_transfer' => [
                'bank' => $bank,
            ],
            'customer_details' => $customer,
        ];
    }

    /**
     * Ekstrak nomor VA / QR URL / deeplink dari response Midtrans.
     */
    private static function extractResult(array $response, string $method, string $orderId): array
    {
        $result = [
            'midtrans_order_id' => $orderId,
            'payment_method' => $method,
            'transaction_id' => $response['transaction_id'] ?? null,
            'payment_type' => $response['payment_type'] ?? $method,
            'payment_code' => null,
            'qr_url' => null,
            'deeplink_url' => null,
        ];

        // VA-based (bca, bni, bri)
        if (!empty($response['va_numbers'])) {
            $va = (array) $response['va_numbers'][0];
            $result['payment_code'] = $va['va_number'] ?? null;
        }


        // QRIS / GoPay / ShopeePay → actions array
        foreach ($response['actions'] ?? [] as $action) {
            $action = (array) $action;
            $name = $action['name'] ?? null;

            if ($name === 'generate-qr-code') {
                $result['qr_url'] = $action['url'];
            }

            if ($name === 'deeplink-redirect') {
                $result['deeplink_url'] = $action['url'];
            }
        }



        return $result;
    }

    private static function buildOrderId(Order $order): string
    {
        return 'ORDER-' . $order->id . '-' . time();
    }
}