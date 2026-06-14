@extends('layouts.app')

@section('title', 'Tiket Saya – Melodia')

@section('content')

<div class="min-h-screen bg-slate-50 dark:bg-[#060B1F] transition-colors duration-300">

    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#EC4899]/5 dark:bg-[#EC4899]/8 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/3 right-1/4 w-80 h-80 bg-purple-600/5 dark:bg-purple-600/8 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-4xl mx-auto px-6 lg:px-8 py-8">

        {{-- BREADCRUMB --}}
        <nav class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 mb-8">
            <a href="{{ route('home') }}" class="hover:text-[#EC4899] transition-colors">Beranda</a>
            <span>›</span>
            <span class="text-[#EC4899] font-medium">Tiket Saya</span>
        </nav>

        {{-- HEADER --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Tiket Saya</h1>
            <p class="text-slate-500 dark:text-slate-400 mt-1 text-sm">Semua tiket event yang sudah kamu beli.</p>
        </div>

        {{-- EMPTY STATE --}}
        @if($tickets->isEmpty())
        <div class="flex flex-col items-center justify-center py-24 text-center">
            <div class="w-20 h-20 rounded-full bg-slate-200 dark:bg-white/5 flex items-center justify-center mb-5">
                <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-slate-700 dark:text-white mb-2">Belum ada tiket</h3>
            <p class="text-slate-500 dark:text-slate-400 text-sm mb-6">Kamu belum memiliki tiket. Yuk beli tiket konser favoritmu!</p>
            <a href="{{ route('home') }}"
                class="px-6 py-3 bg-[#EC4899] hover:bg-[#db2777] text-white font-semibold rounded-2xl text-sm transition-colors">
                Cari Event
            </a>
        </div>

        @else

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            @foreach($tickets as $ticket)
            @php
                $statusConfig = [
                    'active'    => ['label' => 'Aktif',      'bg' => 'bg-emerald-500/15', 'text' => 'text-emerald-500', 'border' => 'border-emerald-400/30'],
                    'used'      => ['label' => 'Sudah Pakai', 'bg' => 'bg-slate-500/15',  'text' => 'text-slate-400',   'border' => 'border-slate-400/30'],
                    'cancelled' => ['label' => 'Dibatalkan',  'bg' => 'bg-red-500/15',     'text' => 'text-red-400',     'border' => 'border-red-400/30'],
                ];
                $s = $statusConfig[$ticket->status] ?? $statusConfig['active'];
                $event = $ticket->order->event;
            @endphp

            <a href="{{ route('tickets.show', $ticket) }}"
                class="group block rounded-3xl border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0F172A] hover:border-[#EC4899]/50 hover:shadow-lg dark:hover:shadow-pink-500/5 transition-all overflow-hidden">

                {{-- Top color bar --}}
                <div class="h-1.5 w-full bg-gradient-to-r from-[#EC4899] to-purple-500"></div>

                <div class="p-5">
                    {{-- Event banner --}}
                    <div class="w-full h-32 rounded-2xl bg-slate-100 dark:bg-white/5 mb-4 overflow-hidden flex items-center justify-center">
                        @if($event->banner ?? false)
                            <img src="{{ asset('storage/' . $event->banner) }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="flex flex-col items-center gap-2 text-slate-400">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 9l10.5-3m0 6.553v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 11-.99-3.467l2.31-.66a2.25 2.25 0 001.632-2.163zm0 0V2.25L9 5.25v10.303m0 0v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 01-.99-3.467l2.31-.66A2.25 2.25 0 009 15.553z"/>
                                </svg>
                                <span class="text-xs">Melodia</span>
                            </div>
                        @endif
                    </div>

                    {{-- Info --}}
                    <div class="flex items-start justify-between gap-2 mb-3">
                        <h3 class="font-bold text-slate-900 dark:text-white text-sm leading-snug line-clamp-2">
                            {{ $event->title ?? 'Event' }}
                        </h3>
                        <span class="shrink-0 px-2.5 py-1 rounded-full text-[10px] font-bold border {{ $s['bg'] }} {{ $s['text'] }} {{ $s['border'] }}">
                            {{ $s['label'] }}
                        </span>
                    </div>

                    <div class="space-y-1.5 mb-4">
                        @if($event->start_date ?? false)
                        <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400">
                            <svg class="w-3.5 h-3.5 text-[#EC4899] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                            </svg>
                            {{ $event->start_date->format('d M Y, H:i') }} WIB
                        </div>
                        @endif
                        @if($event->location ?? false)
                        <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400">
                            <svg class="w-3.5 h-3.5 text-[#EC4899] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            {{ $event->location }}
                        </div>
                        @endif
                        <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400">
                            <svg class="w-3.5 h-3.5 text-[#EC4899] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                            </svg>
                            {{ $ticket->order->ticketCategory->name ?? '-' }}
                        </div>
                    </div>

                    {{-- Ticket code + arrow --}}
                    <div class="flex items-center justify-between pt-3 border-t border-slate-100 dark:border-white/8">
                        <span class="font-mono text-xs text-slate-400 dark:text-slate-500 tracking-wider">{{ $ticket->ticket_code }}</span>
                        <svg class="w-4 h-4 text-[#EC4899] group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </div>

            </a>
            @endforeach
        </div>

        {{-- PAGINATION --}}
        @if($tickets->hasPages())
        <div class="mt-8">{{ $tickets->links() }}</div>
        @endif

        @endif
    </div>
</div>

@endsection
