@extends('layouts.app')

@section('title', 'Pembayaran – Melodia')

@section('content')

{{-- ===================== MAIN CONTENT ===================== --}}
<div class="min-h-screen bg-slate-50 dark:bg-[#060B1F] transition-colors duration-300">

    {{-- Background ambient --}}
    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#EC4899]/5 dark:bg-[#EC4899]/8 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/3 right-1/4 w-80 h-80 bg-purple-600/5 dark:bg-purple-600/8 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6 lg:px-8 py-8">

        {{-- BREADCRUMB --}}
        <nav class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 mb-8">
            <a href="{{ route('home') }}" class="hover:text-[#EC4899] transition-colors">Beranda</a>
            <span class="text-slate-400 dark:text-slate-600">›</span>
            <span class="text-slate-500 dark:text-slate-400">Event</span>
            <span class="text-slate-400 dark:text-slate-600">›</span>
            <a href="#" class="hover:text-[#EC4899] transition-colors text-slate-500 dark:text-slate-400">{{ $event->title }}</a>
            <span class="text-slate-400 dark:text-slate-600">›</span>
            <span class="text-[#EC4899] font-medium">Pembayaran</span>
        </nav>

        {{-- ===================== PAGE: PILIH METODE ===================== --}}
        <div id="page-method" class="">

            <div class="flex flex-col lg:flex-row gap-8">

                {{-- LEFT --}}
                <div class="flex-1 lg:w-2/3">

                    {{-- Header + Timer --}}
                    <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4 mb-8">
                        <div>
                            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Pembayaran</h1>
                            <p class="text-slate-500 dark:text-slate-400 mt-1 text-sm">Selesaikan pembayaran dalam waktu yang tersisa.</p>
                        </div>
                        <div class="flex-shrink-0 rounded-2xl border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0F172A] shadow-sm dark:shadow-none px-6 py-4 flex items-center gap-4">
                            <div class="w-9 h-9 rounded-full border-2 border-[#EC4899] flex items-center justify-center">
                                <svg class="w-4 h-4 text-[#EC4899]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Sisa Waktu Pembayaran</p>
                                <div class="flex items-end gap-2">
                                    <span id="timer-method-min" class="text-2xl font-bold text-[#EC4899] tabular-nums">--</span>
                                    <span class="text-slate-400 dark:text-slate-400 mb-0.5 text-sm">:</span>
                                    <span id="timer-method-sec" class="text-2xl font-bold text-[#EC4899] tabular-nums">--</span>
                                </div>
                                <div class="flex gap-4 mt-0.5 text-[10px] text-slate-400 dark:text-slate-500">
                                    <span>Menit</span>
                                    <span>Detik</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Pilih Metode --}}
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-4">Pilih Metode Pembayaran</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-6" id="method-grid">

                        @php
                        $methods = [
                            ['id' => 'qris',    'label' => 'QRIS',                    'desc' => 'Bayar dengan semua aplikasi e-wallet & mobile banking', 'icon' => 'qris'],
                            ['id' => 'bca',     'label' => 'BCA Virtual Account',      'desc' => 'Pembayaran melalui Virtual Account BCA',                'icon' => 'bca'],
                            ['id' => 'bni',     'label' => 'BNI Virtual Account',      'desc' => 'Pembayaran melalui Virtual Account BNI',                'icon' => 'bni'],
                            ['id' => 'mandiri', 'label' => 'Mandiri Virtual Account',  'desc' => 'Pembayaran melalui Virtual Account Mandiri',            'icon' => 'mandiri'],
                            ['id' => 'gopay',   'label' => 'GoPay',                    'desc' => 'Bayar pakai saldo GoPay',                               'icon' => 'gopay'],
                            ['id' => 'dana',    'label' => 'DANA',                     'desc' => 'Bayar pakai saldo DANA',                               'icon' => 'dana'],
                            ['id' => 'ovo',     'label' => 'OVO',                      'desc' => 'Bayar pakai saldo OVO',                                'icon' => 'ovo'],
                            ['id' => 'shopee',  'label' => 'ShopeePay',                'desc' => 'Bayar pakai saldo ShopeePay',                          'icon' => 'shopee'],
                        ];
                        @endphp

                        @foreach($methods as $i => $m)
                        <label class="method-card flex items-center gap-4 p-4 rounded-2xl border cursor-pointer transition-all focus-within:ring-2 focus-within:ring-[#EC4899]/50
                            {{ $i === 0
                                ? 'border-[#EC4899] bg-[#EC4899]/8 dark:bg-[#EC4899]/8 ring-1 ring-[#EC4899]/30'
                                : 'border-slate-200 dark:border-white/8 bg-white dark:bg-[#0F172A] hover:border-[#EC4899]/40 dark:hover:border-white/20 hover:shadow-sm dark:hover:shadow-none' }}"
                            data-method="{{ $m['id'] }}">
                            <input type="radio" name="payment_method" value="{{ $m['id'] }}" class="sr-only" {{ $i === 0 ? 'checked' : '' }}>
                            <div class="radio-indicator relative w-5 h-5 rounded-full border-2
                                {{ $i === 0 ? 'border-[#EC4899]' : 'border-slate-400 dark:border-slate-600' }}
                                flex items-center justify-center shrink-0 transition-all">
                                <div class="radio-dot w-2.5 h-2.5 rounded-full bg-[#EC4899] transition-all {{ $i === 0 ? 'scale-100' : 'scale-0' }}"></div>
                            </div>
                            {{-- Icon container: bg-white sudah benar untuk semua mode (kontras brand icon) --}}
                            <div class="w-12 h-12 rounded-xl bg-white border border-slate-100 flex items-center justify-center shrink-0 overflow-hidden">
                                @if($m['icon'] === 'qris')
                                    <span class="text-xs font-black text-gray-800 tracking-tight">QRIS</span>
                                @elseif($m['icon'] === 'bca')
                                    <span class="text-[10px] font-black text-blue-700">BCA</span>
                                @elseif($m['icon'] === 'bni')
                                    <span class="text-[10px] font-black text-orange-600">BNI</span>
                                @elseif($m['icon'] === 'mandiri')
                                    <span class="text-[8px] font-black text-yellow-600">mandiri</span>
                                @elseif($m['icon'] === 'gopay')
                                    <span class="text-[9px] font-black text-green-600">GoPay</span>
                                @elseif($m['icon'] === 'dana')
                                    <span class="text-[10px] font-black text-blue-500">DANA</span>
                                @elseif($m['icon'] === 'ovo')
                                    <span class="text-[10px] font-black text-purple-700">OVO</span>
                                @elseif($m['icon'] === 'shopee')
                                    <span class="text-[8px] font-black text-orange-500">ShopeePay</span>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-semibold text-slate-900 dark:text-white text-sm">{{ $m['label'] }}</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5 leading-relaxed">{{ $m['desc'] }}</p>
                            </div>
                        </label>
                        @endforeach
                    </div>

                    {{-- Security bar --}}
                    <div class="flex items-center gap-3 px-5 py-4 rounded-2xl border border-slate-200 dark:border-white/8 bg-white dark:bg-[#0F172A] shadow-sm dark:shadow-none">
                        <div class="w-8 h-8 rounded-xl bg-emerald-500/15 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-slate-900 dark:text-white">Transaksi aman &amp; terenkripsi</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Melodia menggunakan sistem keamanan berlapis untuk melindungi setiap transaksi Anda.</p>
                        </div>
                    </div>

                </div>

                {{-- RIGHT SIDEBAR --}}
                @include('payment.sidebar')

            </div>

            {{-- Bottom CTA --}}
            <div class="mt-6">
                <button id="pay-button"
                    class="w-full sm:w-auto px-8 py-4 bg-[#EC4899] hover:bg-[#db2777] active:bg-[#be185d] text-white font-semibold rounded-2xl transition-all shadow-lg shadow-pink-500/25 hover:shadow-pink-500/40 flex items-center justify-center gap-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#EC4899] focus:ring-offset-2 dark:focus:ring-offset-[#060B1F]">
                    Bayar Sekarang
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </button>
            </div>

        </div>

        {{-- ===================== PAGE: VA DETAIL ===================== --}}
        <div id="page-va" class="hidden">

            <div class="flex flex-col lg:flex-row gap-8">

                {{-- LEFT --}}
                <div class="flex-1 lg:w-2/3">

                    {{-- Header --}}
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Selesaikan Pembayaran</h1>
                        <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm leading-relaxed">
                            Lakukan pembayaran sebelum waktu habis agar tiket Anda
                            <span class="text-[#EC4899] font-semibold">tidak dibatalkan.</span>
                        </p>
                    </div>

                    {{-- Main Payment Card --}}
                    <div class="rounded-3xl border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0F172A] shadow-md dark:shadow-none overflow-hidden"
                        style="box-shadow: 0 0 40px rgba(236,72,153,0.08);">

                        {{-- Metode Pembayaran Header --}}
                        <div class="px-6 py-5 border-b border-slate-200 dark:border-white/8 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-1 h-4 rounded-full bg-[#EC4899]"></div>
                                <span class="font-semibold text-slate-900 dark:text-white text-sm">Metode Pembayaran</span>
                            </div>
                            <div class="flex items-center gap-3">
                                {{-- [DINAMIS] Label & icon metode yang dipilih user --}}
                                <div class="flex items-center gap-2 px-3 py-1.5 rounded-xl bg-slate-100 dark:bg-white/5 border border-slate-200 dark:border-white/10">
                                    <div class="w-8 h-8 rounded-lg bg-white border border-slate-100 flex items-center justify-center" id="va-method-icon">
                                        <span class="text-[10px] font-black text-blue-700">BCA</span>
                                    </div>
                                    <span class="text-sm font-semibold text-slate-900 dark:text-white" id="va-method-label">BCA Virtual Account</span>
                                    <span class="ml-1 px-2 py-0.5 rounded-full bg-[#EC4899]/15 border border-[#EC4899]/30 text-[10px] font-semibold text-[#EC4899]">Dipilih</span>
                                </div>
                            </div>
                        </div>

                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                {{-- VA Number --}}
                                <div>
                                    <p class="text-sm font-semibold text-slate-700 dark:text-slate-300 mb-3">Nomor Virtual Account</p>
                                    <div class="flex items-center gap-3 p-4 rounded-2xl bg-slate-100 dark:bg-white/5 border border-slate-200 dark:border-white/10">
                                        <span class="text-xl font-bold text-slate-900 dark:text-white tracking-widest font-mono flex-1">{{ $order->payment_code }}</span>
                                        <button onclick="copyVA(this)"
                                            data-va="{{ $order->payment_code }}"
                                            class="flex items-center gap-1.5 px-3 py-2 rounded-xl border border-[#EC4899] text-[#EC4899] hover:bg-[#EC4899] hover:text-white active:bg-[#db2777] text-xs font-semibold transition-all shrink-0 focus:outline-none focus:ring-2 focus:ring-[#EC4899]/50">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                            </svg>
                                            Salin
                                        </button>
                                    </div>
                                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-2">Nomor VA unik untuk transaksi ini. Jangan ditransfer ke nomor lain.</p>
                                </div>

                                {{-- Countdown --}}
                                <div class="flex flex-col items-center justify-center">
                                    <p class="text-sm font-semibold text-slate-700 dark:text-slate-300 mb-4">Sisa Waktu Pembayaran</p>
                                    <div class="relative w-28 h-28">
                                        <svg class="w-28 h-28 -rotate-90" viewBox="0 0 112 112">
                                            <circle cx="56" cy="56" r="50" fill="none" stroke="currentColor" class="text-slate-200 dark:text-white/10" stroke-width="8"/>
                                            <circle id="countdown-ring" cx="56" cy="56" r="50" fill="none"
                                                stroke="#EC4899" stroke-width="8" stroke-linecap="round"
                                                stroke-dasharray="314" stroke-dashoffset="50"
                                                style="transition: stroke-dashoffset 1s linear;"/>
                                        </svg>
                                        <div class="absolute inset-0 flex flex-col items-center justify-center gap-0.5">
                                            <span id="timer-display" class="text-2xl font-bold text-slate-900 dark:text-white tabular-nums leading-none"></span>
                                            <span class="text-[10px] text-slate-400 dark:text-slate-500 mt-0.5">Menit : Detik</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-1.5 mt-3 text-xs text-slate-500 dark:text-slate-400">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        Expired pada {{ $order->expired_at->format('d M Y, H:i') }} WIB
                                    </div>
                                </div>

                            </div>

                            {{-- Payment Steps --}}
                            <div class="mt-6 pt-6 border-t border-slate-200 dark:border-white/8">
                                <p
                                    id="payment-guide-title"
                                    class="text-sm font-semibold text-slate-900 dark:text-white mb-5">
                                    Cara Bayar Melalui BCA Mobile / ATM
                                </p>

                                @php
                                $steps = [
                                    ['icon' => 'phone',    'label' => 'Login ke BCA Mobile'],
                                    ['icon' => 'transfer', 'label' => 'Pilih menu m-Transfer'],
                                    ['icon' => 'card',     'label' => 'Pilih BCA Virtual Account'],
                                    ['icon' => 'hash',     'label' => 'Masukkan nomor Virtual Account'],
                                    ['icon' => 'check',    'label' => 'Cek informasi & konfirmasi pembayaran'],
                                ];
                                @endphp

                                <div class="flex items-start overflow-x-auto pb-2">
                                    @foreach($steps as $i => $step)

                                    {{-- Step item --}}
                                    <div class="flex flex-col items-center flex-1 min-w-[72px] max-w-[110px]">

                                        {{-- Icon dengan connector line sebagai pseudo-element via relative positioning --}}
                                        <div class="relative flex items-center justify-center w-full h-11">

                                            {{-- Connector line: dari tengah icon ini ke tengah icon berikutnya --}}
                                            @if(!$loop->last)
                                            <div class="absolute left-1/2 right-0 top-1/2 -translate-y-1/2 h-px bg-gradient-to-r from-[#EC4899]/50 to-slate-300 dark:to-white/10 -z-0"></div>
                                            @endif
                                            @if(!$loop->first)
                                            <div class="absolute left-0 right-1/2 top-1/2 -translate-y-1/2 h-px bg-gradient-to-r from-slate-300 dark:from-white/10 to-[#EC4899]/50 -z-0"></div>
                                            @endif

                                            {{-- Icon box --}}
                                            <div class="relative z-10 w-11 h-11 rounded-2xl bg-[#EC4899]/15 border border-[#EC4899]/25 flex items-center justify-center shrink-0">
                                                @if($step['icon'] === 'phone')
                                                    <svg class="w-5 h-5 text-[#EC4899]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                        <rect x="5" y="2" width="14" height="20" rx="2" ry="2"/>
                                                        <line x1="12" y1="18" x2="12.01" y2="18"/>
                                                    </svg>
                                                @elseif($step['icon'] === 'transfer')
                                                    <svg class="w-5 h-5 text-[#EC4899]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                                                    </svg>
                                                @elseif($step['icon'] === 'card')
                                                    <svg class="w-5 h-5 text-[#EC4899]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"/>
                                                        <line x1="1" y1="10" x2="23" y2="10"/>
                                                    </svg>
                                                @elseif($step['icon'] === 'hash')
                                                    <svg class="w-5 h-5 text-[#EC4899]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                        <line x1="4" y1="9" x2="20" y2="9"/>
                                                        <line x1="4" y1="15" x2="20" y2="15"/>
                                                        <line x1="10" y1="3" x2="8" y2="21"/>
                                                        <line x1="16" y1="3" x2="14" y2="21"/>
                                                    </svg>
                                                @else
                                                    <svg class="w-5 h-5 text-[#EC4899]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                @endif
                                            </div>

                                        </div>

                                        {{-- Step label --}}
                                        <p class="payment-step text-[11px] text-slate-500 dark:text-slate-400 text-center mt-2 leading-4 w-full px-1">
                                            {{ $step['label'] }}
                                        </p>

                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Security footer --}}
                            <div class="mt-6 pt-5 border-t border-slate-200 dark:border-white/10 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-xl bg-emerald-500/15 flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-slate-900 dark:text-white">Transaksi aman &amp; terenkripsi</p>
                                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Melodia bekerja sama dengan Midtrans untuk keamanan transaksi Anda.</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3 shrink-0">
                                    <div class="px-3 py-1.5 rounded-lg bg-slate-100 dark:bg-white/5 border border-slate-200 dark:border-white/10">
                                        <span class="text-xs font-bold text-slate-700 dark:text-white tracking-wide">midtrans</span>
                                    </div>
                                    <div class="px-3 py-1.5 rounded-lg bg-slate-100 dark:bg-white/5 border border-slate-200 dark:border-white/10">
                                        <span class="text-xs font-bold text-slate-700 dark:text-white tracking-wide">PCI DSS</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- Bottom actions --}}
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mt-6">
                        <button onclick="showMethod()"
                            class="flex items-center gap-2 px-5 py-3 rounded-2xl border border-slate-300 dark:border-white/15 bg-white dark:bg-transparent text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:border-slate-400 dark:hover:border-white/30 hover:bg-slate-50 dark:hover:bg-white/5 text-sm font-medium transition-all focus:outline-none focus:ring-2 focus:ring-slate-400/50 dark:focus:ring-white/20">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Kembali ke Pilih Metode
                        </button>

                        <div class="flex-1 flex items-center gap-3 px-5 py-3 rounded-2xl bg-slate-100 dark:bg-white/5 border border-slate-200 dark:border-white/10">
                            <svg class="w-4 h-4 text-[#EC4899] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                            </svg>
                            <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed">
                                Setelah pembayaran berhasil, tiket akan otomatis tersimpan di menu
                                <a href="#" class="text-[#EC4899] font-semibold hover:underline">Tiket Saya</a>
                            </p>
                        </div>
                    </div>

                </div>

                {{-- RIGHT SIDEBAR --}}
                @include('payment.sidebar')

            </div>

        </div>

    </div>
</div>

{{-- ===================== EXPIRED AT ===================== --}}
<script>
// ===== PAGE SWITCHER =====
function showVA() {
    document.getElementById('page-method').classList.add('hidden');
    document.getElementById('page-va').classList.remove('hidden');
    window.scrollTo({ top: 0, behavior: 'smooth' });
}
function showMethod() {
    document.getElementById('page-va').classList.add('hidden');
    document.getElementById('page-method').classList.remove('hidden');
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// ===== METHOD SELECTION =====
const methodIcons = {
    qris:    '<span class="text-xs font-black text-gray-800 tracking-tight">QRIS</span>',
    bca:     '<span class="text-[10px] font-black text-blue-700">BCA</span>',
    bni:     '<span class="text-[10px] font-black text-orange-600">BNI</span>',
    mandiri: '<span class="text-[8px] font-black text-yellow-600">mandiri</span>',
    gopay:   '<span class="text-[9px] font-black text-green-600">GoPay</span>',
    dana:    '<span class="text-[10px] font-black text-blue-500">DANA</span>',
    ovo:     '<span class="text-[10px] font-black text-purple-700">OVO</span>',
    shopee:  '<span class="text-[8px] font-black text-orange-500">ShopeePay</span>',
};
const methodLabels = {
    qris:    'QRIS',
    bca:     'BCA Virtual Account',
    bni:     'BNI Virtual Account',
    mandiri: 'Mandiri Virtual Account',
    gopay:   'GoPay',
    dana:    'DANA',
    ovo:     'OVO',
    shopee:  'ShopeePay',
};

const paymentGuides = {
    qris: {
        title: 'Cara Bayar Melalui QRIS',
        steps: [
            'Buka aplikasi e-wallet atau mobile banking',
            'Pilih menu Scan QR',
            'Scan kode QR yang ditampilkan',
            'Periksa nominal pembayaran',
            'Konfirmasi pembayaran'
        ]
    },

    bca: {
        title: 'Cara Bayar Melalui BCA Mobile / ATM',
        steps: [
            'Login ke BCA Mobile',
            'Pilih menu m-Transfer',
            'Pilih BCA Virtual Account',
            'Masukkan nomor Virtual Account',
            'Konfirmasi pembayaran'
        ]
    },

    bni: {
        title: 'Cara Bayar Melalui BNI Mobile / ATM',
        steps: [
            'Login ke BNI Mobile',
            'Pilih Transfer',
            'Pilih Virtual Account Billing',
            'Masukkan nomor VA',
            'Konfirmasi pembayaran'
        ]
    },

    mandiri: {
        title: 'Cara Bayar Melalui Livin Mandiri',
        steps: [
            'Login Livin',
            'Pilih Bayar',
            'Pilih Virtual Account',
            'Masukkan nomor VA',
            'Konfirmasi pembayaran'
        ]
    },

    gopay: {
        title: 'Cara Bayar Menggunakan GoPay',
        steps: [
            'Buka aplikasi Gojek',
            'Pilih menu GoPay',
            'Masukkan nomor pembayaran',
            'Periksa nominal',
            'Konfirmasi pembayaran'
        ]
    },

    dana: {
        title: 'Cara Bayar Menggunakan DANA',
        steps: [
            'Buka aplikasi DANA',
            'Pilih Kirim / Bayar',
            'Masukkan kode pembayaran',
            'Periksa nominal',
            'Konfirmasi pembayaran'
        ]
    },

    ovo: {
        title: 'Cara Bayar Menggunakan OVO',
        steps: [
            'Buka aplikasi OVO',
            'Pilih Pembayaran',
            'Masukkan kode pembayaran',
            'Periksa nominal',
            'Konfirmasi pembayaran'
        ]
    },

    shopee: {
        title: 'Cara Bayar Menggunakan ShopeePay',
        steps: [
            'Buka aplikasi Shopee',
            'Pilih ShopeePay',
            'Masukkan kode pembayaran',
            'Periksa nominal',
            'Konfirmasi pembayaran'
        ]
    }
};

document.querySelectorAll('.method-card').forEach(card => {
    card.addEventListener('click', () => {
        // Reset semua card
        document.querySelectorAll('.method-card').forEach(c => {
            c.classList.remove('border-[#EC4899]', 'bg-[#EC4899]/8', 'ring-1', 'ring-[#EC4899]/30');
            c.classList.add('border-slate-200', 'dark:border-white/8', 'bg-white', 'dark:bg-[#0F172A]');
            const dot = c.querySelector('.radio-dot');
            if (dot) {
                dot.classList.remove('scale-100');
                dot.classList.add('scale-0');
            }
            const ring = c.querySelector('.radio-indicator');
            if (ring) { ring.classList.remove('border-[#EC4899]'); ring.classList.add('border-slate-400'); }
        });
        // Aktifkan card terpilih
        card.classList.add('border-[#EC4899]', 'bg-[#EC4899]/8', 'ring-1', 'ring-[#EC4899]/30');
        card.classList.remove('border-slate-200', 'dark:border-white/8', 'bg-white', 'dark:bg-[#0F172A]');
        const dot = card.querySelector('.radio-dot');
        if (dot) {
            dot.classList.remove('scale-0');
            dot.classList.add('scale-100');
        }
        const ring = card.querySelector('.radio-indicator');
        if (ring) { ring.classList.add('border-[#EC4899]'); ring.classList.remove('border-slate-400'); }

        // [DINAMIS] Update tampilan metode di page-VA
        card.querySelector('input[type="radio"]').checked = true;
        const method = card.dataset.method;
        const iconEl = document.getElementById('va-method-icon');
        const labelEl = document.getElementById('va-method-label');
        if (iconEl && methodIcons[method]) iconEl.innerHTML = methodIcons[method];
        if (labelEl && methodLabels[method]) labelEl.textContent = methodLabels[method];
        const guideTitle =
            document.getElementById('payment-guide-title');

        if (guideTitle && paymentGuides[method]) {
            guideTitle.textContent =
                paymentGuides[method].title;
        }

        const stepEls =
            document.querySelectorAll('.payment-step');

        if (paymentGuides[method]) {
            stepEls.forEach((step, index) => {
                if (paymentGuides[method].steps[index]) {
                    step.textContent =
                        paymentGuides[method].steps[index];
                }
            });
        }
    });
});

// ===== COUNTDOWN TIMER =====
const expiredAt = new Date("{{ $order->expired_at->toIso8601String() }}");
const TOTAL_INIT = (expiredAt - new Date("{{ $order->created_at->toIso8601String() }}")) / 1000 || (15 * 60);

function pad(n) { return String(n).padStart(2, '0'); }

function updateTimer() {
    const now = new Date();
    let remaining = Math.floor((expiredAt - now) / 1000);

    if (remaining <= 0) {
        const mm = document.getElementById('timer-method-min');
        const ms = document.getElementById('timer-method-sec');
        const td = document.getElementById('timer-display');
        if (mm) mm.textContent = '00';
        if (ms) ms.textContent = '00';
        if (td) td.textContent = '00:00';
        return;
    }

    const m = Math.floor(remaining / 60);
    const s = remaining % 60;

    const mm = document.getElementById('timer-method-min');
    const ms = document.getElementById('timer-method-sec');
    if (mm) mm.textContent = pad(m);
    if (ms) ms.textContent = pad(s);

    const td = document.getElementById('timer-display');
    if (td) td.textContent = pad(m) + ':' + pad(s);

    const ring = document.getElementById('countdown-ring');
    if (ring) {
        const circumference = 314;
        const offset = circumference * (1 - remaining / TOTAL_INIT);
        ring.style.strokeDashoffset = offset;
        if (remaining < 120) ring.setAttribute('stroke', '#f97316');
        if (remaining < 60)  ring.setAttribute('stroke', '#ef4444');
    }
}

updateTimer();
setInterval(updateTimer, 1000);

// ===== COPY VA =====
function copyVA(btn) {
    const vaNumber = btn.getAttribute('data-va');
    navigator.clipboard.writeText(vaNumber).then(() => {
        const orig = btn.innerHTML;
        btn.innerHTML = `<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> Disalin!`;
        btn.classList.add('bg-[#EC4899]', 'text-white', 'border-[#EC4899]');
        setTimeout(() => {
            btn.innerHTML = orig;
            btn.classList.remove('bg-[#EC4899]', 'text-white', 'border-[#EC4899]');
        }, 2000);
    });
}
</script>

{{-- MIDTRANS SNAP --}}
<script
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}">
</script>

<script>

document.addEventListener('DOMContentLoaded', () => {

    const btn = document.getElementById('pay-button');

    if (!btn) return;

    btn.addEventListener('click', async () => {

        try {

            btn.disabled = true;

            const response = await fetch(
                 "{{ route('payment.create', $order) }}",
                {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN':
                        document.querySelector(
                            'meta[name="csrf-token"]'
                        ).content,

                        'Accept':
                        'application/json'
                    }
                }
            );

            const data = await response.json();

                console.log(data);

                if (!data.snap_token) {
                    alert(data.error || 'Snap Token tidak ditemukan');
                    return;
                }

                snap.pay(data.snap_token, {

                onSuccess(result) {

                    alert(
                        'Pembayaran berhasil!'
                    );

                    location.reload();
                },

                onPending(result) {

                    alert(
                        'Menunggu pembayaran'
                    );
                },

                onError(result) {

                    alert(
                        'Pembayaran gagal'
                    );
                }

            });

        } catch (error) {

            console.error(error);

            alert(
                'Terjadi kesalahan'
            );
        }

        btn.disabled = false;

    });

});

</script>

@endsection
