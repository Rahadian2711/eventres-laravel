@extends('layouts.app')

@section('title', 'Semua Konser – Melodia')

@section('content')

<div class="min-h-screen bg-slate-50 dark:bg-[#060B1F] transition-colors duration-300">

    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#EC4899]/5 dark:bg-[#EC4899]/8 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/3 right-1/4 w-80 h-80 bg-purple-600/5 dark:bg-purple-600/8 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-[1400px] mx-auto px-6 lg:px-8 py-10">

        {{-- HEADER --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Semua Konser</h1>
            <p class="text-slate-500 dark:text-slate-400 mt-1 text-sm">{{ $events->total() }} event tersedia</p>
        </div>

        {{-- FILTER BAR --}}
        <div class="flex flex-wrap items-center gap-3 mb-8">

            {{-- Search --}}
            <form method="GET" action="{{ route('concerts.index') }}"
                class="flex items-center gap-2 bg-white dark:bg-[#0F172A] border border-slate-200 dark:border-white/10 rounded-2xl px-4 py-2.5 flex-1 min-w-[200px] max-w-xs">
                <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Cari konser atau artis..."
                class="bg-transparent border-0 outline-none focus:outline-none focus:ring-0 focus:border-transparent text-sm w-full text-slate-700 dark:text-white placeholder-slate-400">
                @if(request('category')) <input type="hidden" name="category" value="{{ request('category') }}"> @endif
            </form>

            {{-- Category filters --}}
            <div class="flex items-center gap-2 flex-wrap">
                <a href="{{ route('concerts.index', array_filter(['search' => request('search')])) }}"
                    class="px-4 py-2 rounded-xl text-sm font-semibold transition-all
                    {{ !request('category') ? 'bg-[#EC4899] text-white' : 'bg-white dark:bg-[#0F172A] border border-slate-200 dark:border-white/10 text-slate-600 dark:text-slate-300 hover:border-[#EC4899] hover:text-[#EC4899]' }}">
                    Semua
                </a>
                @foreach($categories as $cat)
                <a href="{{ route('concerts.index', array_filter(['category' => $cat->slug, 'search' => request('search')])) }}"
                    class="px-4 py-2 rounded-xl text-sm font-semibold transition-all
                    {{ request('category') === $cat->slug ? 'bg-[#EC4899] text-white' : 'bg-white dark:bg-[#0F172A] border border-slate-200 dark:border-white/10 text-slate-600 dark:text-slate-300 hover:border-[#EC4899] hover:text-[#EC4899]' }}">
                    {{ $cat->name }}
                </a>
                @endforeach
            </div>

        </div>

        {{-- EMPTY STATE --}}
        @if($events->isEmpty())
        <div class="flex flex-col items-center justify-center py-24 text-center">
            <div class="text-5xl mb-4">🎵</div>
            <h3 class="text-lg font-semibold text-slate-700 dark:text-white mb-2">Konser tidak ditemukan</h3>
            <p class="text-slate-500 dark:text-slate-400 text-sm mb-6">Coba kata kunci atau filter lain.</p>
            <a href="{{ route('concerts.index') }}" class="px-5 py-2.5 bg-[#EC4899] text-white rounded-xl text-sm font-semibold hover:bg-[#db2777] transition">
                Reset Filter
            </a>
        </div>

        @else

        {{-- EVENTS GRID --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4">
            @foreach($events as $event)
            @php
                $gradients = ['from-gray-800 via-gray-700 to-gray-600','from-slate-800 via-slate-700 to-slate-600','from-zinc-900 via-zinc-700 to-zinc-600','from-stone-800 via-stone-700 to-stone-500','from-purple-900 via-purple-700 to-purple-600','from-indigo-900 via-indigo-700 to-indigo-600'];
                $grad = $gradients[$loop->index % count($gradients)];
                $badgeColor = match($event->category->slug ?? '') {
                    'festival' => 'bg-purple-600',
                    'tur'      => 'bg-cyan-600',
                    default    => 'bg-pink-600',
                };
            @endphp
            <a href="{{ route('events.show', $event->slug) }}"
                class="group bg-white border border-gray-100 dark:bg-[#131A2A]/80 dark:backdrop-blur-xl dark:border-white/10 rounded-xl overflow-hidden hover:-translate-y-1 hover:shadow-[0_0_20px_rgba(233,30,140,0.2)] transition-all duration-300">

                <div class="relative w-full h-[130px] overflow-hidden">
                    @if($event->thumbnail)
                        <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event->title }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                        <div class="w-full h-full bg-gradient-to-br {{ $grad }} flex items-end group-hover:scale-105 transition-transform duration-300">
                            <div class="p-2.5 w-full"><div class="text-white/40 text-[9px]">{{ $event->organizer }}</div></div>
                        </div>
                    @endif
                    <span class="absolute top-2 left-2 text-[10px] font-bold text-white {{ $badgeColor }} px-2 py-0.5 rounded-md shadow">
                        {{ $event->category->name ?? '' }}
                    </span>
                </div>

                <div class="p-3">
                    <h3 class="font-bold text-xs text-gray-900 dark:text-white line-clamp-2 group-hover:text-[#E91E8C] transition mb-1.5 leading-snug">
                        {{ $event->title }}
                    </h3>
                    @if($event->schedules->first())
                    <div class="flex items-center gap-1 text-[10px] text-gray-400 mb-1">
                        <svg class="w-3 h-3 text-[#E91E8C]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                        {{ \Carbon\Carbon::parse($event->schedules->first()->start_time)->isoFormat('DD MMM YYYY') }}
                    </div>
                    @endif
                    <div class="flex items-center gap-1 text-[10px] text-gray-400 mb-2">
                        <svg class="w-3 h-3 text-[#E91E8C] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        </svg>
                        <span class="truncate">{{ Str::before($event->venue, ',') }}</span>
                    </div>
                    @if($event->ticketCategories->count())
                    <div class="text-[10px] font-bold text-[#E91E8C]">
                        Mulai dari Rp{{ number_format($event->ticketCategories->min('price'), 0, ',', '.') }}
                    </div>
                    @endif
                </div>
            </a>
            @endforeach
        </div>

        {{-- PAGINATION --}}
        @if($events->hasPages())
        <div class="mt-10">{{ $events->links() }}</div>
        @endif

        @endif
    </div>
</div>

@endsection
