@extends('layouts.app')

@section('title', $artist->name . ' – Melodia')

@section('content')

<div class="min-h-screen bg-slate-50 dark:bg-[#060B1F] transition-colors duration-300">

    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#EC4899]/5 dark:bg-[#EC4899]/8 rounded-full blur-3xl"></div>
    </div>

    {{-- ===================== HERO BESAR ===================== --}}
    <div class="relative min-h-[420px] flex items-end"
        style="background: linear-gradient(135deg, #0d0118 0%, #1e0a2e 30%, #3b0764 65%, #1e1040 100%);">

        {{-- Decorative blobs --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-20 -right-20 w-96 h-96 rounded-full bg-[#EC4899]/15 blur-3xl"></div>
            <div class="absolute bottom-0 left-1/3 w-80 h-80 rounded-full bg-purple-500/10 blur-3xl"></div>
            <div class="absolute top-10 left-10 w-64 h-64 rounded-full bg-blue-500/5 blur-3xl"></div>
        </div>

        {{-- Background artis (blur) --}}
        @if($artist->image)
        <div class="absolute inset-0 overflow-hidden">
            <img src="{{ asset('storage/' . $artist->image) }}" alt=""
                class="w-full h-full object-cover opacity-10 blur-sm scale-110">
        </div>
        @endif

        <div class="relative w-full max-w-[1400px] mx-auto px-6 lg:px-8 pb-10 pt-24">

            {{-- Breadcrumb --}}
            <nav class="flex items-center gap-2 text-sm text-purple-300 mb-8">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a>
                <span>›</span>
                <a href="{{ route('artists.index') }}" class="hover:text-white transition-colors">Artis</a>
                <span>›</span>
                <span class="text-white font-medium">{{ $artist->name }}</span>
            </nav>

            <div class="flex flex-col sm:flex-row items-center sm:items-end gap-8">

                {{-- Avatar besar --}}
                <div class="w-44 h-44 rounded-3xl overflow-hidden border-4 border-white/20 shadow-2xl shrink-0"
                    style="box-shadow: 0 0 60px rgba(236,72,153,0.3);">
                    @if($artist->image)
                        <img src="{{ asset('storage/' . $artist->image) }}" alt="{{ $artist->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-[#EC4899] to-purple-600 flex items-center justify-center">
                            <svg class="w-20 h-20 text-white/70" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 3v10.55A4 4 0 1 0 14 17V7h4V3h-6z"/>
                            </svg>
                        </div>
                    @endif
                </div>

                {{-- Info --}}
                <div class="text-center sm:text-left flex-1">
                    <div class="flex flex-wrap items-center gap-3 justify-center sm:justify-start mb-3">
                        @if($artist->genre)
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-[#EC4899]/20 text-[#EC4899] border border-[#EC4899]/40">
                            {{ $artist->genre }}
                        </span>
                        @endif
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-white/10 text-white/70 border border-white/20">
                            {{ $upcomingEvents->count() }} Konser Mendatang
                        </span>
                    </div>

                    <h1 class="text-5xl lg:text-6xl font-bold text-white mb-4 leading-tight">{{ $artist->name }}</h1>

                    @if($artist->bio)
                    <p class="text-purple-200/80 text-sm leading-relaxed max-w-2xl">
                        {{ $artist->bio }}
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- ===================== CONTENT ===================== --}}
    <div class="relative max-w-[1400px] mx-auto px-6 lg:px-8 py-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- ====== LEFT ====== --}}
            <div class="space-y-5">

                {{-- LAGU POPULER --}}
                @if($artist->songs->count() > 0)
                <div class="rounded-3xl border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0F172A] p-6"
                    style="box-shadow: 0 0 40px rgba(236,72,153,0.06);">
                    <h3 class="font-bold text-slate-900 dark:text-white mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#EC4899]" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 3v10.55A4 4 0 1 0 14 17V7h4V3h-6z"/>
                        </svg>
                        Lagu Populer
                    </h3>
                    <div class="space-y-3">
                        @foreach($artist->songs as $i => $song)
                        <div class="flex items-center gap-3 group">
                            {{-- Nomor --}}
                            <span class="w-6 text-center text-sm font-bold text-slate-400 dark:text-slate-500 shrink-0">
                                {{ $i + 1 }}
                            </span>
                            {{-- Icon musik --}}
                            <div class="w-9 h-9 rounded-xl bg-slate-100 dark:bg-white/5 flex items-center justify-center shrink-0 group-hover:bg-[#EC4899]/10 transition-colors">
                                <svg class="w-4 h-4 text-slate-400 group-hover:text-[#EC4899] transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 3v10.55A4 4 0 1 0 14 17V7h4V3h-6z"/>
                                </svg>
                            </div>
                            {{-- Info --}}
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-slate-900 dark:text-white truncate">{{ $song->title }}</p>
                                <p class="text-xs text-slate-400 truncate">{{ $song->album }} · {{ $song->year }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- ARTIS LAINNYA --}}
                @if($similarArtists->count() > 0)
                <div class="rounded-3xl border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0F172A] p-6"
                    style="box-shadow: 0 0 40px rgba(236,72,153,0.06);">
                    <h3 class="font-bold text-slate-900 dark:text-white mb-4">Artis Lainnya</h3>
                    <div class="space-y-3">
                        @foreach($similarArtists as $similar)
                        <a href="{{ route('artists.show', $similar->slug) }}"
                            class="flex items-center gap-3 group">
                            <div class="w-10 h-10 rounded-xl overflow-hidden shrink-0">
                                @if($similar->image)
                                    <img src="{{ asset('storage/' . $similar->image) }}" alt="{{ $similar->name }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-[#EC4899] to-purple-600 flex items-center justify-center">
                                        <span class="text-white text-xs font-bold">{{ strtoupper(substr($similar->name, 0, 1)) }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-slate-900 dark:text-white group-hover:text-[#EC4899] transition-colors truncate">
                                    {{ $similar->name }}
                                </p>
                                @if($similar->genre)
                                <p class="text-xs text-slate-500">{{ $similar->genre }}</p>
                                @endif
                            </div>
                            <svg class="w-4 h-4 text-slate-400 group-hover:text-[#EC4899] transition-colors shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>

            {{-- ====== RIGHT ====== --}}
            <div class="lg:col-span-2 space-y-8">

                {{-- KONSER MENDATANG --}}
                <div>
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-4 flex items-center gap-2">
                        <span class="w-1 h-6 bg-[#EC4899] rounded-full inline-block"></span>
                        Konser Mendatang
                    </h2>

                    @if($upcomingEvents->isEmpty())
                    <div class="rounded-2xl border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0F172A] p-8 text-center">
                        <p class="text-slate-500 dark:text-slate-400 text-sm">Belum ada konser mendatang dari {{ $artist->name }}.</p>
                    </div>
                    @else
                    <div class="space-y-4">
                        @foreach($upcomingEvents as $event)
                        @php $schedule = $event->schedules->first(); @endphp
                        <a href="{{ route('events.show', $event->slug) }}"
                            class="group flex gap-4 rounded-2xl border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0F172A] p-4 hover:border-[#EC4899]/40 hover:shadow-md transition-all">
                            <div class="w-20 h-20 rounded-xl overflow-hidden shrink-0 bg-slate-100 dark:bg-white/5">
                                @if($event->thumbnail)
                                    <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 9l10.5-3m0 6.553v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 11-.99-3.467l2.31-.66a2.25 2.25 0 001.632-2.163zm0 0V2.25L9 5.25v10.303m0 0v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 01-.99-3.467l2.31-.66A2.25 2.25 0 009 15.553z"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="font-semibold text-slate-900 dark:text-white group-hover:text-[#EC4899] transition-colors text-sm mb-1 truncate">
                                    {{ $event->title }}
                                </h3>
                                <div class="flex flex-wrap gap-3 text-xs text-slate-500 dark:text-slate-400 mb-2">
                                    @if($schedule)
                                    <span class="flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5 text-[#EC4899]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                                        </svg>
                                        {{ \Carbon\Carbon::parse($schedule->start_time)->translatedFormat('d F Y') }}
                                    </span>
                                    @endif
                                    <span class="flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5 text-[#EC4899]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        {{ $event->venue }}
                                    </span>
                                </div>
                                <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-500/15 text-emerald-500 border border-emerald-400/30">
                                    Beli Tiket →
                                </span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    @endif
                </div>

                {{-- KONSER SEBELUMNYA --}}
                @if($pastEvents->count() > 0)
                <div>
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-4 flex items-center gap-2">
                        <span class="w-1 h-6 bg-slate-400 rounded-full inline-block"></span>
                        Konser Sebelumnya
                    </h2>
                    <div class="space-y-3">
                        @foreach($pastEvents as $event)
                        @php $schedule = $event->schedules->first(); @endphp
                        <a href="{{ route('events.show', $event->slug) }}"
                            class="group flex gap-4 rounded-2xl border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0F172A] p-4 hover:border-slate-400/40 transition-all opacity-70 hover:opacity-100">
                            <div class="w-14 h-14 rounded-xl overflow-hidden shrink-0 bg-slate-100 dark:bg-white/5 grayscale group-hover:grayscale-0 transition-all">
                                @if($event->thumbnail)
                                    <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 9l10.5-3m0 6.553v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 11-.99-3.467l2.31-.66a2.25 2.25 0 001.632-2.163zm0 0V2.25L9 5.25v10.303m0 0v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 01-.99-3.467l2.31-.66A2.25 2.25 0 009 15.553z"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="font-medium text-slate-700 dark:text-slate-300 text-sm truncate">{{ $event->title }}</h3>
                                @if($schedule)
                                <p class="text-xs text-slate-400 mt-0.5">{{ \Carbon\Carbon::parse($schedule->start_time)->translatedFormat('d F Y') }}</p>
                                @endif
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection