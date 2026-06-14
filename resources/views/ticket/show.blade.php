@extends('layouts.app')

@section('title', 'Tiket – {{ $ticket->ticket_code }}')

@section('content')

{{-- Load QRCode.js dari CDN --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<div class="min-h-screen bg-slate-50 dark:bg-[#060B1F] transition-colors duration-300">

    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#EC4899]/5 dark:bg-[#EC4899]/8 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/3 right-1/4 w-80 h-80 bg-purple-600/5 dark:bg-purple-600/8 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-lg mx-auto px-4 py-8">

        {{-- BREADCRUMB --}}
        <nav class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 mb-8">
            <a href="{{ route('home') }}" class="hover:text-[#EC4899] transition-colors">Beranda</a>
            <span>›</span>
            <a href="{{ route('tickets.index') }}" class="hover:text-[#EC4899] transition-colors">Tiket Saya</a>
            <span>›</span>
            <span class="text-[#EC4899] font-medium">Detail Tiket</span>
        </nav>

        @php
            $order  = $ticket->order;
            $event  = $order->event;
            $cat    = $order->ticketCategory;
            $user   = $order->user;
            $statusConfig = [
                'active'    => ['label' => 'Aktif',       'text' => 'text-emerald-500', 'bg' => 'bg-emerald-500/15', 'border' => 'border-emerald-400/40'],
                'used'      => ['label' => 'Sudah Dipakai','text' => 'text-slate-400',   'bg' => 'bg-slate-500/15',  'border' => 'border-slate-400/30'],
                'cancelled' => ['label' => 'Dibatalkan',  'text' => 'text-red-400',      'bg' => 'bg-red-500/15',    'border' => 'border-red-400/30'],
            ];
            $s = $statusConfig[$ticket->status] ?? $statusConfig['active'];
        @endphp

        {{-- ===================== TICKET CARD ===================== --}}
        <div id="ticket-card"
            class="rounded-3xl overflow-hidden border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0F172A]"
            style="box-shadow: 0 0 60px rgba(236,72,153,0.12);">

            {{-- TOP GRADIENT HEADER --}}
            <div class="relative px-7 pt-8 pb-6"
                style="background: linear-gradient(135deg, #1e0a2e 0%, #3b0764 50%, #1e1040 100%);">

                {{-- Decorative circles --}}
                <div class="absolute top-0 right-0 w-40 h-40 rounded-full bg-[#EC4899]/10 blur-2xl pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 w-32 h-32 rounded-full bg-purple-500/10 blur-2xl pointer-events-none"></div>

                {{-- Logo + Status --}}
                <div class="relative flex items-center justify-between mb-5">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-[#E91E8C] rounded-xl flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 3v10.55A4 4 0 1 0 14 17V7h4V3h-6z"/>
                            </svg>
                        </div>
                        <span class="text-white font-bold text-sm tracking-wide">Melodia</span>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold border {{ $s['bg'] }} {{ $s['text'] }} {{ $s['border'] }}">
                        {{ $s['label'] }}
                    </span>
                </div>

                {{-- Event title --}}
                <h1 class="relative text-white font-bold text-xl leading-snug mb-1">
                    {{ $event->title ?? 'Event' }}
                </h1>
                <p class="relative text-purple-300 text-sm font-medium">{{ $cat->name ?? 'Tiket' }}</p>

                {{-- Event info --}}
                <div class="relative flex flex-wrap gap-4 mt-4">
                    @if($event->start_date ?? false)
                    <div class="flex items-center gap-1.5 text-purple-200 text-xs">
                        <svg class="w-3.5 h-3.5 text-[#EC4899]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                        {{ $event->start_date->format('d M Y') }} · {{ $event->start_date->format('H:i') }} WIB
                    </div>
                    @endif
                    @if($event->location ?? false)
                    <div class="flex items-center gap-1.5 text-purple-200 text-xs">
                        <svg class="w-3.5 h-3.5 text-[#EC4899]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        {{ $event->location }}
                    </div>
                    @endif
                </div>
            </div>

            {{-- ZIGZAG SEPARATOR --}}
            <div class="relative h-6 bg-white dark:bg-[#0F172A]" style="margin-top: -1px;">
                <div class="absolute inset-x-0 -top-3 flex">
                    {{-- Left semicircle --}}
                    <div class="w-6 h-6 rounded-full bg-slate-50 dark:bg-[#060B1F] border border-slate-200 dark:border-white/10 -ml-3 shrink-0"></div>
                    {{-- Dashed line --}}
                    <div class="flex-1 border-t-2 border-dashed border-slate-200 dark:border-white/10 mt-3 mx-1"></div>
                    {{-- Right semicircle --}}
                    <div class="w-6 h-6 rounded-full bg-slate-50 dark:bg-[#060B1F] border border-slate-200 dark:border-white/10 -mr-3 shrink-0"></div>
                </div>
            </div>

            {{-- BOTTOM CONTENT --}}
            <div class="px-7 pb-8">

                {{-- Holder info --}}
                <div class="flex items-center justify-between gap-4 mb-6">
                    <div>
                        <p class="text-xs text-slate-400 uppercase tracking-wider mb-1">Pemegang Tiket</p>
                        <p class="font-bold text-slate-900 dark:text-white">{{ $user->name ?? '-' }}</p>
                        <p class="text-xs text-slate-500 dark:text-slate-400">{{ $user->email ?? '-' }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs text-slate-400 uppercase tracking-wider mb-1">Jumlah</p>
                        <p class="font-bold text-slate-900 dark:text-white text-lg">{{ $order->quantity }}x</p>
                    </div>
                </div>

                {{-- QR Code --}}
                <div class="flex flex-col items-center py-5 px-4 rounded-2xl bg-white border border-slate-100 dark:border-white/8 mb-5"
                    style="background: white;">
                    <div id="qr-code-container" class="mb-3"></div>
                    <p class="font-mono text-xs text-slate-500 tracking-widest text-center mt-1">
                        {{ $ticket->ticket_code }}
                    </p>
                </div>

                {{-- Detail rows --}}
                <div class="space-y-3">
                    <div class="flex justify-between text-sm">
                        <span class="text-slate-500 dark:text-slate-400">Order ID</span>
                        <span class="font-medium text-slate-900 dark:text-white font-mono text-xs">{{ $order->order_code ?? '#' . $order->id }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-slate-500 dark:text-slate-400">Metode Bayar</span>
                        <span class="font-medium text-slate-900 dark:text-white uppercase">{{ $order->payment_method ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-slate-500 dark:text-slate-400">Total Bayar</span>
                        <span class="font-bold text-[#EC4899]">Rp{{ number_format($order->total, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-slate-500 dark:text-slate-400">Tanggal Beli</span>
                        <span class="font-medium text-slate-900 dark:text-white">{{ $order->created_at->format('d M Y, H:i') }} WIB</span>
                    </div>
                </div>

                {{-- Warning jika sudah dipakai --}}
                @if($ticket->status === 'used')
                <div class="mt-5 px-4 py-3 rounded-xl bg-slate-100 dark:bg-white/5 border border-slate-200 dark:border-white/10 text-xs text-slate-500 dark:text-slate-400 text-center">
                    Tiket ini sudah digunakan untuk masuk event.
                </div>
                @endif

            </div>
        </div>

        {{-- ACTION BUTTONS --}}
        <div class="mt-5 flex flex-col sm:flex-row gap-3">
            <button onclick="printTicket()"
                class="flex-1 flex items-center justify-center gap-2 py-3.5 bg-[#EC4899] hover:bg-[#db2777] text-white font-semibold rounded-2xl text-sm transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                </svg>
                Print / Simpan PDF
            </button>
            <a href="{{ route('tickets.index') }}"
                class="flex-1 flex items-center justify-center gap-2 py-3.5 border border-slate-300 dark:border-white/15 text-slate-700 dark:text-slate-300 hover:border-[#EC4899] hover:text-[#EC4899] font-semibold rounded-2xl text-sm transition-colors">
                ← Tiket Saya
            </a>
        </div>

    </div>
</div>

<script>
// Generate QR Code
document.addEventListener('DOMContentLoaded', function () {
    new QRCode(document.getElementById('qr-code-container'), {
        text: '{{ $ticket->qr_code ?? $ticket->ticket_code }}',
        width: 180,
        height: 180,
        colorDark: '#1e1b4b',
        colorLight: '#ffffff',
        correctLevel: QRCode.CorrectLevel.H,
    });
});

// Print ticket
function printTicket() {
    const card = document.getElementById('ticket-card');
    const printWindow = window.open('', '_blank');
    printWindow.document.write(`
        <!DOCTYPE html>
        <html>
        <head>
            <title>Tiket – {{ $ticket->ticket_code }}</title>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"><\/script>
            <style>
                * { margin: 0; padding: 0; box-sizing: border-box; }
                body { font-family: system-ui, sans-serif; background: #f8fafc; display: flex; align-items: center; justify-content: center; min-height: 100vh; padding: 20px; }
                .ticket { max-width: 420px; width: 100%; border-radius: 24px; overflow: hidden; box-shadow: 0 20px 60px rgba(0,0,0,0.15); background: white; }
                .ticket-header { padding: 32px 28px 24px; background: linear-gradient(135deg, #1e0a2e 0%, #3b0764 50%, #1e1040 100%); }
                .logo { display: flex; align-items: center; gap: 8px; margin-bottom: 20px; }
                .logo-icon { width: 32px; height: 32px; background: #E91E8C; border-radius: 10px; display: flex; align-items: center; justify-content: center; }
                .logo-text { color: white; font-weight: 700; font-size: 14px; }
                .event-title { color: white; font-size: 20px; font-weight: 700; margin-bottom: 4px; }
                .event-cat { color: #c4b5fd; font-size: 13px; }
                .event-info { margin-top: 16px; display: flex; flex-wrap: wrap; gap: 12px; }
                .event-info span { color: #ddd6fe; font-size: 12px; }
                .separator { height: 1px; border-top: 2px dashed #e2e8f0; margin: 16px 0; position: relative; }
                .ticket-body { padding: 20px 28px 28px; }
                .holder { display: flex; justify-content: space-between; margin-bottom: 24px; }
                .label { font-size: 10px; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 4px; }
                .value { font-weight: 700; font-size: 15px; color: #1e293b; }
                .sub-value { font-size: 12px; color: #64748b; }
                .qr-wrapper { display: flex; flex-direction: column; align-items: center; padding: 16px; background: white; border: 1px solid #e2e8f0; border-radius: 16px; margin-bottom: 16px; }
                .ticket-code { font-family: monospace; font-size: 11px; color: #64748b; letter-spacing: 0.1em; margin-top: 8px; }
                .details { border-top: 1px solid #f1f5f9; padding-top: 16px; display: grid; gap: 10px; }
                .detail-row { display: flex; justify-content: space-between; font-size: 13px; }
                .detail-label { color: #64748b; }
                .detail-value { font-weight: 600; color: #1e293b; }
                .detail-value.pink { color: #EC4899; }
                @media print { body { background: white; } .ticket { box-shadow: none; } }
            </style>
        </head>
        <body>
            <div class="ticket">
                <div class="ticket-header">
                    <div class="logo">
                        <div class="logo-icon">
                            <svg width="16" height="16" fill="white" viewBox="0 0 24 24"><path d="M12 3v10.55A4 4 0 1 0 14 17V7h4V3h-6z"/></svg>
                        </div>
                        <span class="logo-text">Melodia</span>
                    </div>
                    <div class="event-title">{{ $event->title ?? 'Event' }}</div>
                    <div class="event-cat">{{ $cat->name ?? 'Tiket' }}</div>
                    <div class="event-info">
                        @if($event->start_date ?? false)
                        <span>📅 {{ $event->start_date->format('d M Y, H:i') }} WIB</span>
                        @endif
                        @if($event->location ?? false)
                        <span>📍 {{ $event->location }}</span>
                        @endif
                    </div>
                </div>
                <div class="separator"></div>
                <div class="ticket-body">
                    <div class="holder">
                        <div>
                            <div class="label">Pemegang Tiket</div>
                            <div class="value">{{ $user->name ?? '-' }}</div>
                            <div class="sub-value">{{ $user->email ?? '-' }}</div>
                        </div>
                        <div style="text-align: right;">
                            <div class="label">Jumlah</div>
                            <div class="value">{{ $order->quantity }}x</div>
                        </div>
                    </div>
                    <div class="qr-wrapper">
                        <div id="print-qr"></div>
                        <div class="ticket-code">{{ $ticket->ticket_code }}</div>
                    </div>
                    <div class="details">
                        <div class="detail-row"><span class="detail-label">Order ID</span><span class="detail-value">{{ $order->order_code ?? '#' . $order->id }}</span></div>
                        <div class="detail-row"><span class="detail-label">Metode Bayar</span><span class="detail-value">{{ strtoupper($order->payment_method ?? '-') }}</span></div>
                        <div class="detail-row"><span class="detail-label">Total Bayar</span><span class="detail-value pink">Rp{{ number_format($order->total, 0, ',', '.') }}</span></div>
                        <div class="detail-row"><span class="detail-label">Tanggal Beli</span><span class="detail-value">{{ $order->created_at->format('d M Y') }}</span></div>
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    new QRCode(document.getElementById('print-qr'), {
                        text: '{{ $ticket->qr_code ?? $ticket->ticket_code }}',
                        width: 160, height: 160,
                        colorDark: '#1e1b4b', colorLight: '#ffffff',
                        correctLevel: QRCode.CorrectLevel.H
                    });
                    setTimeout(() => window.print(), 800);
                });
            <\/script>
        </body>
        </html>
    `);
    printWindow.document.close();
}
</script>

@endsection
