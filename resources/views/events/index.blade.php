@extends('layouts.app')

@section('title', 'Melodia - Temukan Konser Impianmu')

@section('content')

{{-- ============================================================
     HERO SECTION
============================================================ --}}
<section class="relative max-w-[1400px] mx-auto px-6 lg:px-8 pt-16 pb-20 overflow-hidden">
    {{-- Hero Background Image --}}
    <div class="absolute inset-0 rounded-[40px] overflow-hidden">
   
    {{-- Light Mode --}}
    <img
        src="{{ asset('images/hero-light-banner.png') }}"
        class="w-full h-full object-cover dark:hidden"
        alt="Hero Background">

    {{-- Dark Mode --}}
    <img
        src="{{ asset('images/hero-dark-banner.png') }}"
        class="hidden dark:block w-full h-full object-cover"
        alt="Hero Background">

    {{-- Overlay supaya teks tetap kebaca --}}
    <div class="absolute inset-0 bg-gradient-to-r
from-white/80
via-white/40
via-30%
to-transparent
dark:from-[#081127]/80
dark:via-[#081127]/50
dark:to-transparent">
</div>
</div>

    {{-- Glow --}}
    <div class="absolute left-0 top-0 w-[500px] h-[500px]
        bg-pink-500/10 blur-[120px]
        rounded-full z-[1]">
    </div>
    <div class="relative z-10 max-w-2xl">

        {{-- ── LEFT: Hero Text  ── --}}
        <div>
            <span class="inline-flex items-center gap-1.5 text-xs font-bold text-[#E91E8C] bg-pink-50 border border-pink-200 rounded-full px-3 py-1.5 mb-5">
                Temukan Konser Impianmu 🎵
            </span>

            <h1 class="text-[2.6rem] font-extrabold leading-[1.15] text-gray-900 dark:text-white mb-4">
                Semua Musik<br>
                Semua Momen<br>
                <span class="text-[#E91E8C]">Satu Tempat</span>
            </h1>

            <p class="text-sm text-gray-700 dark:text-slate-300 leading-relaxed mb-7">
                Temukan konser musik terbaik dari artis favoritmu.<br>
                Dapatkan tiketnya dan rasakan pengalaman yang tak terlupakan.
            </p>

            {{-- CTA --}}
            <div class="flex gap-3">
                <a href="#konser-populer"
                    class="flex items-center gap-2 text-sm font-semibold text-white bg-[#E91E8C] px-5 py-2.5 rounded-xl hover:bg-[#c4176f] transition shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    Jelajahi Konser
                </a>
                <a href="#artis"
                    class="flex items-center gap-2 text-sm font-semibold bg-white text-gray-700 border border-gray-200 dark:bg-[#131A2A]/80 dark:text-white  dark:border-white/10 backdrop-blur-xl  px-5 py-2.5 rounded-xl hover:border-[#E91E8C] hover:text-[#E91E8C] transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                    Semua Artis
                </a>
            </div>
        </div>

       
    </div>
</section>


{{-- ============================================================
     ARTIST SECTION
============================================================ --}}
<section id="artis" class="max-w-[1400px] mx-auto px-6 lg:px-8 pt-14 pb-10 overflow-visible">
    <div class="flex items-center justify-center gap-3 mb-8">
        <svg class="w-5 h-5 text-[#E91E8C]" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 3v10.55A4 4 0 1 0 14 17V7h4V3h-6z"/>
        </svg>
        <h2 class="text-xl font-extrabold text-gray-900 dark:text-white">Jelajahi Berdasarkan Artis</h2>
        <svg class="w-5 h-5 text-[#E91E8C]" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 3v10.55A4 4 0 1 0 14 17V7h4V3h-6z"/>
        </svg>
    </div>

    {{-- Artist list dari organizer events yang ada --}}
    <div class="flex items-center gap-6 overflow-visible justify-center flex-wrap py-4">
    @php
        $artists = [
            ['name' => 'NOAH',        'slug' => 'noah',        'emoji' => '🎸'],
            ['name' => 'Sheila On 7', 'slug' => 'sheila-on-7', 'emoji' => '🎵'],
            ['name' => 'Tulus',       'slug' => 'tulus',       'emoji' => '🎤'],
            ['name' => 'Nadin Amizah','slug' => 'nadin-amizah','emoji' => '🎶'],
            ['name' => 'Dewa 19',     'slug' => 'dewa-19',     'emoji' => '🥁'],
            ['name' => 'Pamungkas',   'slug' => 'pamungkas',   'emoji' => '🎹'],
            ['name' => 'Hindia',      'slug' => 'hindia',      'emoji' => '🎸'],
            ['name' => 'Juicy Luicy', 'slug' => 'juicy-luicy', 'emoji' => '🎷'],
            ['name' => 'Sal Priadi',  'slug' => 'sal-priadi',  'emoji' => '🎵'],
            ['name' => 'Yura Yunita', 'slug' => 'yura-yunita', 'emoji' => '🎤'],
        ];
    @endphp

        @foreach($artists as $artist)
        <a href="{{ route('artists.show', $artist['slug']) }}" class="flex flex-col items-center gap-2 cursor-pointer group flex-shrink-0">
            <div class="w-[72px] h-[72px] rounded-full bg-white border border-gray-200 shadow-md dark:bg-gradient-to-br dark:from-[#1A2235] dark:to-[#0F172A] dark:border-white/10
                flex items-center justify-center text-2xl shadow-md
                ring-2 ring-transparent group-hover:ring-[#E91E8C] transition-all duration-200
                group-hover:scale-105">
                {{ $artist['emoji'] }}
            </div>
            <span class="text-xs font-semibold text-gray-700 dark:text-slate-300 group-hover:text-[#E91E8C] transition text-center leading-tight">
                {{ $artist['name'] }}
            </span>
        </a>
        @endforeach

        <a href="{{ route('artists.index') }}" class="flex flex-col items-center gap-2 cursor-pointer group flex-shrink-0">
            <div class="w-[48px] h-[48px] rounded-full bg-gray-100 dark:bg-[#131A2A] dark:ring-white/10
                flex items-center justify-center
                ring-2 ring-gray-200 group-hover:ring-[#E91E8C] transition-all duration-200">
                <svg class="w-6 h-6 text-[#E91E8C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </div>
            <span class="text-xs font-semibold text-[#E91E8C] text-center leading-tight">Lihat<br>Semua</span>
        </a>
    </div>
</section>


{{-- ============================================================
     KONSER POPULER — Horizontal Scroll Card
============================================================ --}}
<section id="konser-populer" class="max-w-[1400px] mx-auto px-6 lg:px-8 py-6">
    <div class="flex items-center justify-between mb-5">
        <h2 class="text-xl font-extrabold text-gray-900 dark:text-white flex items-center gap-2">
            🔥 Konser Populer
        </h2>
        <a href="{{ route('concerts.index') }}" class="text-sm font-semibold text-[#E91E8C] hover:underline flex items-center gap-1">
            Lihat Semua
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
    </div>

    <div class="relative">
        {{-- Left arrow --}}
        <button id="scroll-left"
            class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 z-10
            w-9 h-9 bg-white dark:bg-[#131A2A]/90 dark:backdrop-blur-xl dark:border-white/10 rounded-full shadow-md border border-gray-200
            flex items-center justify-center hover:border-[#E91E8C] hover:text-[#E91E8C] transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>

        {{-- Cards container --}}
        <div id="popular-scroll"
            class="flex gap-5 overflow-x-auto scrollbar-hide scroll-smooth pb-2">
            @foreach($popularEvents as $event)
            <a href="{{ route('events.show', $event->slug) }}"
                class="group flex-shrink-0 w-[280px]
                bg-white
                border border-gray-100
                dark:bg-[#131A2A]/80
                dark:backdrop-blur-xl
                dark:border-white/10
                dark:shadow-xl
                backdrop-blur-xl
                rounded-2xl
                overflow-hidden
                hover:-translate-y-2
                hover:shadow-[0_0_30px_rgba(233,30,140,0.25)]
                transition-all duration-300">

                {{-- Image --}}
                <div class="relative w-full h-[170px] overflow-hidden">
                    @if($event->thumbnail)
                        <img src="{{ asset('storage/' . $event->thumbnail) }}"
                            alt="{{ $event->title }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                        {{-- Gradient placeholder --}}
                        @php
                            $gradients = [
                                'from-gray-800 to-gray-600',
                                'from-slate-800 to-slate-600',
                                'from-zinc-800 to-zinc-600',
                                'from-neutral-800 to-neutral-600',
                                'from-stone-800 to-stone-600',
                            ];
                            $gradient = $gradients[$loop->index % count($gradients)];
                        @endphp
                        <div class="w-full h-full bg-gradient-to-br {{ $gradient }}
                            flex items-end group-hover:scale-105 transition-transform duration-300">
                            <div class="w-full p-4">
                                <div class="text-white/50 text-xs font-medium">{{ $event->organizer }}</div>
                            </div>
                        </div>
                    @endif

                    {{-- Category badge --}}
                    @php
                    $badgeColor = match($event->category->slug) {
                        'festival' => 'bg-purple-600',
                        'tur'      => 'bg-cyan-600',
                        default    => 'bg-pink-600',
                    };
                    @endphp

                    <span class="absolute top-3 left-3 text-xs font-bold text-white {{ $badgeColor }} px-2.5 py-1 rounded-lg shadow-sm">
                        {{ $event->category->name }}
                    </span>

                    {{-- Wishlist --}}
                    <button onclick="event.preventDefault()"
                        class="absolute top-3 right-3 w-8 h-8 bg-white/80 backdrop-blur-sm rounded-full
                        flex items-center justify-center hover:bg-white transition shadow-sm">
                        <svg class="w-4 h-4 text-gray-400 hover:text-[#E91E8C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </button>
                </div>

                {{-- Content --}}
                <div class="p-4">
                    <h3 class="font-bold text-sm text-gray-900 dark:text-white line-clamp-2 group-hover:text-[#E91E8C] transition mb-2 leading-snug">
                        {{ $event->title }}
                    </h3>

                    @if($event->schedules->first())
                    <div class="flex items-center gap-1.5 text-xs text-gray-400 dark:text-slate-300 mb-1.5">
                        <svg class="w-3.5 h-3.5 text-[#E91E8C] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        {{ \Carbon\Carbon::parse($event->schedules->first()->start_time)->isoFormat('DD MMM YYYY') }}
                    </div>
                    @endif

                    <div class="flex items-center gap-1.5 text-xs text-gray-400 mb-3">
                        <svg class="w-3.5 h-3.5 text-[#E91E8C] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="truncate">{{ $event->venue }}</span>
                    </div>

                    @if($event->ticketCategories->count())
                    <div class="text-xs font-bold text-[#E91E8C]">
                        Mulai dari Rp{{ number_format($event->ticketCategories->min('price'), 0, ',', '.') }}
                    </div>
                    @endif
                </div>
            </a>
            @endforeach
        </div>

        {{-- Right arrow --}}
        <button id="scroll-right"
            class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 z-10
            w-9 h-9 bg-white dark:bg-[#131A2A]/90 dark:backdrop-blur-xl dark:border-white/10 rounded-full shadow-md border border-gray-200
            flex items-center justify-center hover:border-[#E91E8C] hover:text-[#E91E8C] transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </button>
    </div>
</section>


{{-- ============================================================
     SEMUA KONSER — Grid
============================================================ --}}
<section id="semua-konser" class="max-w-[1400px] mx-auto px-6 lg:px-8 py-6">
    <div class="flex items-center justify-between mb-5">
        <h2 class="text-xl font-extrabold text-gray-900 dark:text-white">Semua Konser</h2>
        <a href="{{ route('concerts.index') }}" class="text-sm font-semibold text-[#E91E8C] hover:underline flex items-center gap-1">
            Lihat Semua
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4">
        @forelse($allEvents as $event)
        @php
            $cardGradients = [
                'from-gray-800 via-gray-700 to-gray-600',
                'from-slate-800 via-slate-700 to-slate-600',
                'from-zinc-900 via-zinc-700 to-zinc-600',
                'from-stone-800 via-stone-700 to-stone-500',
                'from-neutral-900 via-neutral-700 to-neutral-600',
                'from-gray-900 via-gray-700 to-gray-500',
            ];
            $grad = $cardGradients[$loop->index % count($cardGradients)];
        @endphp
        <a href="{{ route('events.show', $event->slug) }}"
            class="group
            bg-white
            border border-gray-100
            dark:bg-[#131A2A]/80
            dark:backdrop-blur-xl
            dark:border-white/10
            dark:shadow-xl
            rounded-xl
            overflow-hidden
            hover:-translate-y-1
            hover:shadow-[0_0_20px_rgba(233,30,140,0.2)]
            transition-all duration-300">

            {{-- Thumbnail --}}
            <div class="relative w-full h-[130px] overflow-hidden">
                @if($event->thumbnail)
                    <img src="{{ asset('storage/' . $event->thumbnail) }}"
                        alt="{{ $event->title }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                @else
                    <div class="w-full h-full bg-gradient-to-br {{ $grad }}
                        flex items-end group-hover:scale-105 transition-transform duration-300">
                        <div class="p-2.5 w-full">
                            <div class="text-white/40 text-[9px]">{{ $event->organizer }}</div>
                        </div>
                    </div>
                @endif
                @php
                $badgeColor = match($event->category->slug) {
                    'festival' => 'bg-purple-600',
                    'tur'      => 'bg-cyan-600',
                    default    => 'bg-pink-600',
                };
                @endphp

                <span class="absolute top-2 left-2 text-[10px] font-bold text-white {{ $badgeColor }} px-2 py-0.5 rounded-md shadow">
                    {{ $event->category->name }}
                </span>
                <button onclick="event.preventDefault()"
                    class="absolute top-2 right-2 w-6 h-6 bg-white/80 rounded-full flex items-center justify-center
                    hover:bg-white transition shadow-sm">
                    <svg class="w-3 h-3 text-gray-400 hover:text-[#E91E8C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </button>
            </div>

            {{-- Content --}}
            <div class="p-3">
                <h3 class="font-bold text-xs text-gray-900 dark:text-white line-clamp-2 group-hover:text-[#E91E8C] transition mb-1.5 leading-snug">
                    {{ $event->title }}
                </h3>

                @if($event->schedules->first())
                <div class="flex items-center gap-1 text-[10px] text-gray-400 mb-1">
                    <svg class="w-3 h-3 text-[#E91E8C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    {{ \Carbon\Carbon::parse($event->schedules->first()->start_time)->isoFormat('DD MMM YYYY') }}
                </div>
                @endif

                <div class="flex items-center gap-1 text-[10px] text-gray-400 mb-2">
                    <svg class="w-3 h-3 text-[#E91E8C] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
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
        @empty
        <div class="col-span-6 text-center py-16">
            <div class="text-5xl mb-4">🎵</div>
            <p class="text-sm text-gray-400">Belum ada event. Jalankan seeder terlebih dahulu.</p>
        </div>
        @endforelse
    </div>
</section>

{{-- Scroll JS --}}
<script>
    const scrollContainer = document.getElementById('popular-scroll');
    document.getElementById('scroll-left').addEventListener('click', () => {
        scrollContainer.scrollBy({ left: -600, behavior: 'smooth' });
    });
    document.getElementById('scroll-right').addEventListener('click', () => {
        scrollContainer.scrollBy({ left: 600, behavior: 'smooth' });
    });
</script>

@endsection