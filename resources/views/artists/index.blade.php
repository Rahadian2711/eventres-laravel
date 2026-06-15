@extends('layouts.app')

@section('title', 'Artis – Melodia')

@section('content')

<div class="min-h-screen bg-slate-50 dark:bg-[#060B1F] transition-colors duration-300">

    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#EC4899]/5 dark:bg-[#EC4899]/8 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/3 right-1/4 w-80 h-80 bg-purple-600/5 dark:bg-purple-600/8 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-[1400px] mx-auto px-6 lg:px-8 py-10">

        {{-- HEADER --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-10">
            <div>
                <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Jelajahi Artis</h1>
                <p class="text-slate-500 dark:text-slate-400 mt-1 text-sm">Temukan konser artis favoritmu.</p>
            </div>

            {{-- SEARCH --}}
            <form method="GET" action="{{ route('artists.index') }}"
                class="flex items-center gap-2 bg-white dark:bg-[#0F172A] border border-slate-200 dark:border-white/10 rounded-2xl px-4 py-2.5 w-full sm:w-72">
                <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari artis..."
                    class="bg-transparent border-0 outline-none focus:outline-none focus:ring-0 focus:border-transparent text-sm w-full text-slate-700 dark:text-white placeholder-slate-400">
            </form>
        </div>

        {{-- EMPTY STATE --}}
        @if($artists->isEmpty())
        <div class="flex flex-col items-center justify-center py-24 text-center">
            <div class="w-20 h-20 rounded-full bg-slate-200 dark:bg-white/5 flex items-center justify-center mb-5">
                <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 9l10.5-3m0 6.553v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 11-.99-3.467l2.31-.66a2.25 2.25 0 001.632-2.163zm0 0V2.25L9 5.25v10.303m0 0v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 01-.99-3.467l2.31-.66A2.25 2.25 0 009 15.553z"/>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-slate-700 dark:text-white mb-2">Artis tidak ditemukan</h3>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Coba kata kunci lain.</p>
        </div>

        @else

        {{-- ARTIST GRID --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5">
            @foreach($artists as $artist)
            <a href="{{ route('artists.show', $artist->slug) }}"
                class="group flex flex-col items-center text-center">

                {{-- Avatar --}}
                <div class="relative mb-3">
                    <div class="w-24 h-24 rounded-full overflow-hidden border-2 border-transparent group-hover:border-[#EC4899] transition-all duration-300 shadow-md group-hover:shadow-[0_0_20px_rgba(236,72,153,0.3)]">
                        @if($artist->image)
                            <img src="{{ asset('storage/' . $artist->image) }}" alt="{{ $artist->name }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-[#EC4899] to-purple-600 flex items-center justify-center">
                                <svg class="w-10 h-10 text-white/70" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 3v10.55A4 4 0 1 0 14 17V7h4V3h-6z"/>
                                </svg>
                            </div>
                        @endif
                    </div>
                    {{-- Event count badge --}}
                    @if($artist->events_count > 0)
                    <div class="absolute -bottom-1 -right-1 w-6 h-6 rounded-full bg-[#EC4899] text-white text-[10px] font-bold flex items-center justify-center border-2 border-white dark:border-[#060B1F]">
                        {{ $artist->events_count }}
                    </div>
                    @endif
                </div>

                <h3 class="font-semibold text-sm text-slate-900 dark:text-white group-hover:text-[#EC4899] transition-colors line-clamp-1">
                    {{ $artist->name }}
                </h3>
                @if($artist->genre)
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">{{ $artist->genre }}</p>
                @endif

            </a>
            @endforeach
        </div>

        {{-- PAGINATION --}}
        @if($artists->hasPages())
        <div class="mt-10">{{ $artists->links() }}</div>
        @endif

        @endif
    </div>
</div>

@endsection
