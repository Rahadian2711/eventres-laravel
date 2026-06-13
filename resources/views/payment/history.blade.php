@extends('layouts.app')

@section('title', 'Riwayat Pembayaran – Melodia')

@section('content')

<div class="min-h-screen bg-slate-50 dark:bg-[#060B1F] transition-colors duration-300">

    {{-- Background ambient --}}
    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#EC4899]/5 dark:bg-[#EC4899]/8 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/3 right-1/4 w-80 h-80 bg-purple-600/5 dark:bg-purple-600/8 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-4xl mx-auto px-6 lg:px-8 py-8">

        {{-- BREADCRUMB --}}
        <nav class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 mb-8">
            <a href="{{ route('home') }}" class="hover:text-[#EC4899] transition-colors">Beranda</a>
            <span>›</span>
            <span class="text-[#EC4899] font-medium">Riwayat Pembayaran</span>
        </nav>

        {{-- HEADER --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Riwayat Pembayaran</h1>
            <p class="text-slate-500 dark:text-slate-400 mt-1 text-sm">Semua transaksi tiket yang pernah kamu lakukan.</p>
        </div>

        {{-- FLASH MESSAGE --}}
        @if(session('info'))
            <div class="mb-6 px-5 py-4 rounded-2xl bg-blue-50 dark:bg-blue-500/10 border border-blue-200 dark:border-blue-500/30 text-blue-700 dark:text-blue-300 text-sm">
                {{ session('info') }}
            </div>
        @endif

        {{-- EMPTY STATE --}}
        @if($orders->isEmpty())
            <div class="flex flex-col items-center justify-center py-24 text-center">
                <div class="w-20 h-20 rounded-full bg-slate-200 dark:bg-white/5 flex items-center justify-center mb-5">
                    <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-slate-700 dark:text-white mb-2">Belum ada transaksi</h3>
                <p class="text-slate-500 dark:text-slate-400 text-sm mb-6">Kamu belum pernah melakukan pemesanan tiket.</p>
                <a href="{{ route('home') }}"
                    class="px-6 py-3 bg-[#EC4899] hover:bg-[#db2777] text-white font-semibold rounded-2xl text-sm transition-colors">
                    Cari Event
                </a>
            </div>

        @else

        {{-- ORDER LIST --}}
        <div class="space-y-4">
            @foreach($orders as $order)

            @php
                $statusConfig = [
                    'pending'   => ['label' => 'Menunggu Pembayaran', 'bg' => 'bg-amber-500/15',  'text' => 'text-amber-600 dark:text-amber-400',  'border' => 'border-amber-400/30'],
                    'paid'      => ['label' => 'Pembayaran Berhasil', 'bg' => 'bg-emerald-500/15', 'text' => 'text-emerald-600 dark:text-emerald-400', 'border' => 'border-emerald-400/30'],
                    'expired'   => ['label' => 'Kedaluwarsa',         'bg' => 'bg-red-500/15',     'text' => 'text-red-500 dark:text-red-400',       'border' => 'border-red-400/30'],
                    'cancelled' => ['label' => 'Dibatalkan',          'bg' => 'bg-slate-500/15',   'text' => 'text-slate-500 dark:text-slate-400',   'border' => 'border-slate-400/30'],
                ];
                $s = $statusConfig[$order->status] ?? $statusConfig['cancelled'];
            @endphp

            <a href="{{ route('history.show', $order) }}"
                class="block rounded-2xl border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0F172A] hover:border-[#EC4899]/40 dark:hover:border-[#EC4899]/40 hover:shadow-md transition-all overflow-hidden">

                <div class="flex flex-col sm:flex-row sm:items-center gap-4 p-5">

                    {{-- Event image placeholder --}}
                    <div class="w-full sm:w-20 h-20 rounded-xl bg-slate-100 dark:bg-white/5 flex items-center justify-center shrink-0 overflow-hidden">
                        @if($order->event->banner ?? false)
                            <img src="{{ asset('storage/' . $order->event->banner) }}" alt="{{ $order->event->title }}" class="w-full h-full object-cover">
                        @else
                            <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                            </svg>
                        @endif
                    </div>

                    {{-- Info --}}
                    <div class="flex-1 min-w-0">
                        <div class="flex flex-wrap items-start justify-between gap-2 mb-1">
                            <h3 class="font-semibold text-slate-900 dark:text-white text-sm truncate">
                                {{ $order->event->title ?? 'Event tidak ditemukan' }}
                            </h3>
                            {{-- Status badge --}}
                            <span class="shrink-0 px-3 py-1 rounded-full text-[11px] font-semibold border {{ $s['bg'] }} {{ $s['text'] }} {{ $s['border'] }}">
                                {{ $s['label'] }}
                            </span>
                        </div>

                        <p class="text-xs text-slate-500 dark:text-slate-400 mb-2">
                            {{ $order->ticketCategory->name ?? '-' }} · {{ $order->quantity }} Tiket
                        </p>

                        <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-slate-500 dark:text-slate-400">
                            <span class="flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                    <line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                                </svg>
                                {{ $order->created_at->format('d M Y, H:i') }} WIB
                            </span>
                            @if($order->payment_method)
                            <span class="flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/>
                                </svg>
                                {{ strtoupper($order->payment_method) }}
                            </span>
                            @endif
                        </div>
                    </div>

                    {{-- Total + arrow --}}
                    <div class="flex sm:flex-col items-center sm:items-end justify-between sm:justify-center gap-2 sm:gap-1 shrink-0">
                        <span class="text-base font-bold text-[#EC4899]">
                            Rp{{ number_format($order->total, 0, ',', '.') }}
                        </span>
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>

                </div>

                {{-- Pending bar: lanjutkan pembayaran --}}
                @if($order->status === 'pending')
                <div class="px-5 py-3 bg-amber-50 dark:bg-amber-500/8 border-t border-amber-200 dark:border-amber-500/20 flex items-center justify-between gap-3">
                    <div class="flex items-center gap-2 text-xs text-amber-700 dark:text-amber-400">
                        <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        @if($order->expired_at)
                            Bayar sebelum {{ $order->expired_at->format('d M Y, H:i') }} WIB
                        @else
                            Menunggu pembayaran
                        @endif
                    </div>
                    <span class="text-xs font-semibold text-[#EC4899]">Lanjutkan →</span>
                </div>
                @endif

            </a>
            @endforeach
        </div>

        {{-- PAGINATION --}}
        @if($orders->hasPages())
        <div class="mt-8">
            {{ $orders->links() }}
        </div>
        @endif

        @endif

    </div>
</div>

@endsection
