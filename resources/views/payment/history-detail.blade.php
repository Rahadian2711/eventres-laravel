@extends('layouts.app')

@section('title', 'Detail Transaksi – Melodia')

@section('content')

<div class="min-h-screen bg-slate-50 dark:bg-[#060B1F] transition-colors duration-300">

    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#EC4899]/5 dark:bg-[#EC4899]/8 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-2xl mx-auto px-6 lg:px-8 py-8">

        {{-- BREADCRUMB --}}
        <nav class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 mb-8">
            <a href="{{ route('home') }}" class="hover:text-[#EC4899] transition-colors">Beranda</a>
            <span>›</span>
            <a href="{{ route('history.index') }}" class="hover:text-[#EC4899] transition-colors">Riwayat Pembayaran</a>
            <span>›</span>
            <span class="text-[#EC4899] font-medium">Detail</span>
        </nav>

        @php
            $statusConfig = [
                'pending'   => ['label' => 'Menunggu Pembayaran', 'bg' => 'bg-amber-500/15',  'text' => 'text-amber-600 dark:text-amber-400',  'border' => 'border-amber-400/30', 'icon' => 'clock'],
                'paid'      => ['label' => 'Pembayaran Berhasil', 'bg' => 'bg-emerald-500/15', 'text' => 'text-emerald-600 dark:text-emerald-400', 'border' => 'border-emerald-400/30', 'icon' => 'check'],
                'expired'   => ['label' => 'Kedaluwarsa',         'bg' => 'bg-red-500/15',     'text' => 'text-red-500 dark:text-red-400',       'border' => 'border-red-400/30', 'icon' => 'x'],
                'cancelled' => ['label' => 'Dibatalkan',          'bg' => 'bg-slate-500/15',   'text' => 'text-slate-500 dark:text-slate-400',   'border' => 'border-slate-400/30', 'icon' => 'x'],
            ];
            $s = $statusConfig[$order->status] ?? $statusConfig['cancelled'];
        @endphp

        {{-- STATUS BANNER --}}
        <div class="rounded-2xl border {{ $s['border'] }} {{ $s['bg'] }} px-6 py-5 flex items-center gap-4 mb-6">
            <div class="w-12 h-12 rounded-full border-2 {{ $s['border'] }} flex items-center justify-center shrink-0">
                @if($s['icon'] === 'check')
                    <svg class="w-6 h-6 {{ $s['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                @elseif($s['icon'] === 'clock')
                    <svg class="w-6 h-6 {{ $s['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                @else
                    <svg class="w-6 h-6 {{ $s['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                @endif
            </div>
            <div>
                <p class="font-bold text-slate-900 dark:text-white">{{ $s['label'] }}</p>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">
                    Order #{{ $order->order_code ?? $order->id }} · {{ $order->created_at->format('d M Y, H:i') }} WIB
                </p>
            </div>
        </div>

        {{-- MAIN CARD --}}
        <div class="rounded-3xl border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0F172A] overflow-hidden mb-4"
            style="box-shadow: 0 0 40px rgba(236,72,153,0.06);">

            {{-- Event Info --}}
            <div class="px-6 py-5 border-b border-slate-100 dark:border-white/8">
                <p class="text-xs text-slate-400 mb-1 uppercase tracking-wider font-medium">Event</p>
                <h2 class="text-lg font-bold text-slate-900 dark:text-white">{{ $order->event->title ?? '-' }}</h2>
                @if($order->event)
                <div class="flex flex-wrap gap-4 mt-2 text-xs text-slate-500 dark:text-slate-400">
                    <span class="flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                        {{ optional($order->event->start_date)->format('d M Y, H:i') ?? '-' }} WIB
                    </span>
                    @if($order->event->location)
                    <span class="flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        {{ $order->event->location }}
                    </span>
                    @endif
                </div>
                @endif
            </div>

            {{-- Tiket & Harga --}}
            <div class="px-6 py-5 border-b border-slate-100 dark:border-white/8 space-y-3">
                <p class="text-xs text-slate-400 uppercase tracking-wider font-medium mb-3">Detail Pesanan</p>

                <div class="flex justify-between text-sm">
                    <span class="text-slate-600 dark:text-slate-400">Kategori Tiket</span>
                    <span class="font-medium text-slate-900 dark:text-white">{{ $order->ticketCategory->name ?? '-' }}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-slate-600 dark:text-slate-400">Jumlah Tiket</span>
                    <span class="font-medium text-slate-900 dark:text-white">{{ $order->quantity }} Tiket</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-slate-600 dark:text-slate-400">Subtotal</span>
                    <span class="font-medium text-slate-900 dark:text-white">Rp{{ number_format($order->subtotal, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-slate-600 dark:text-slate-400">Biaya Layanan</span>
                    <span class="font-medium text-slate-900 dark:text-white">Rp{{ number_format($order->service_fee, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-sm pt-3 border-t border-slate-100 dark:border-white/8">
                    <span class="font-bold text-slate-900 dark:text-white">Total Pembayaran</span>
                    <span class="font-bold text-[#EC4899] text-base">Rp{{ number_format($order->total, 0, ',', '.') }}</span>
                </div>
            </div>

            {{-- Info Pembayaran --}}
            <div class="px-6 py-5 space-y-3">
                <p class="text-xs text-slate-400 uppercase tracking-wider font-medium mb-3">Info Pembayaran</p>

                @if($order->payment_method)
                <div class="flex justify-between text-sm">
                    <span class="text-slate-600 dark:text-slate-400">Metode</span>
                    <span class="font-medium text-slate-900 dark:text-white uppercase">{{ $order->payment_method }}</span>
                </div>
                @endif

                @if($order->transaction_id)
                <div class="flex justify-between text-sm">
                    <span class="text-slate-600 dark:text-slate-400">Transaction ID</span>
                    <span class="font-medium text-slate-900 dark:text-white font-mono text-xs">{{ $order->transaction_id }}</span>
                </div>
                @endif

                @if($order->payment_code)
                <div class="flex justify-between items-center text-sm">
                    <span class="text-slate-600 dark:text-slate-400">Nomor VA</span>
                    <div class="flex items-center gap-2">
                        <span class="font-bold text-slate-900 dark:text-white font-mono tracking-widest">{{ $order->payment_code }}</span>
                        <button onclick="copyText('{{ $order->payment_code }}', this)"
                            class="px-2 py-1 rounded-lg border border-[#EC4899] text-[#EC4899] hover:bg-[#EC4899] hover:text-white text-[10px] font-semibold transition-all">
                            Salin
                        </button>
                    </div>
                </div>
                @endif

                @if($order->payment_expired_at)
                <div class="flex justify-between text-sm">
                    <span class="text-slate-600 dark:text-slate-400">Batas Waktu</span>
                    <span class="font-medium text-slate-900 dark:text-white">{{ $order->payment_expired_at->format('d M Y, H:i') }} WIB</span>
                </div>
                @endif
            </div>

        </div>

        {{-- QR / Deeplink — hanya tampil jika pending dan ada qr_url --}}
        @if($order->status === 'pending' && $order->qr_url)
        <div class="rounded-3xl border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0F172A] p-6 mb-4 flex flex-col items-center text-center">
            <p class="text-sm font-semibold text-slate-700 dark:text-slate-300 mb-4">Scan QR untuk melanjutkan pembayaran</p>
            <img src="{{ $order->qr_url }}" alt="QR Code"
                class="w-52 h-52 rounded-2xl border border-slate-200 dark:border-white/10 p-3 bg-white mx-auto">
            @if($order->deeplink_url)
            <a href="{{ $order->deeplink_url }}" target="_blank"
                class="mt-4 inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#EC4899] text-white text-sm font-semibold hover:bg-[#db2777] transition-colors">
                Buka Aplikasi
            </a>
            @endif
        </div>
        @endif

        {{-- ACTION BUTTONS --}}
        <div class="flex flex-col sm:flex-row gap-3">

            {{-- Pending: tombol lanjutkan pembayaran --}}
            @if($order->status === 'pending')
            <a href="{{ route('payment.show', $order) }}"
                class="flex-1 flex items-center justify-center gap-2 py-3.5 bg-[#EC4899] hover:bg-[#db2777] text-white font-semibold rounded-2xl text-sm transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
                Lanjutkan Pembayaran
            </a>
            @endif

            <a href="{{ route('history.index') }}"
                class="flex-1 flex items-center justify-center gap-2 py-3.5 border border-slate-300 dark:border-white/15 text-slate-700 dark:text-slate-300 hover:border-[#EC4899] hover:text-[#EC4899] font-semibold rounded-2xl text-sm transition-colors">
                ← Kembali ke Riwayat
            </a>

        </div>

    </div>
</div>

<script>
function copyText(text, btn) {
    navigator.clipboard.writeText(text).then(() => {
        const orig = btn.textContent;
        btn.textContent = 'Disalin!';
        btn.classList.add('bg-[#EC4899]', 'text-white');
        setTimeout(() => {
            btn.textContent = orig;
            btn.classList.remove('bg-[#EC4899]', 'text-white');
        }, 2000);
    });
}
</script>

@endsection
