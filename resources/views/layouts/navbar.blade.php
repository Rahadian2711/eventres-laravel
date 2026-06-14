{{-- resources/views/components/navbar.blade.php --}}
{{-- Requires: Alpine.js (sudah include di layouts.app)                          --}}
{{-- Variabel opsional: $notifications (Collection dari controller/View Composer) --}}
{{--                                                                              --}}
{{-- Cara termudah mengirim $notifications ke semua view:                        --}}
{{-- Buat App\Http\View\Composers\NotificationComposer.php dan daftarkan di      --}}
{{-- AppServiceProvider::boot() :                                                 --}}
{{--   View::composer('*', NotificationComposer::class);                         --}}
{{--                                                                              --}}
{{-- Atau kirim dari controller seperti biasa:                                   --}}
{{--   $notifications = Auth::user()->notifications()->latest()->take(5)->get(); --}}

<nav x-data="{ notifOpen: false, userOpen: false }"
     class="sticky top-0 z-50 bg-white dark:bg-[#0D1526]/95 backdrop-blur-xl border-b border-gray-100 dark:border-white/8 shadow-sm">
    <div class="max-w-[1400px] mx-auto px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 gap-4">

            {{-- LOGO --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 flex-shrink-0">
                <div class="w-9 h-9 bg-[#E91E8C] rounded-xl flex items-center justify-center shadow-md shadow-pink-500/20">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 3v10.55A4 4 0 1 0 14 17V7h4V3h-6z"/>
                    </svg>
                </div>
                <div class="leading-none">
                    <div class="text-[17px] font-bold text-gray-900 dark:text-white tracking-tight">Melodia</div>
                    <div class="text-[10px] text-[#E91E8C] font-semibold tracking-wide">Live the Music</div>
                </div>
            </a>

            {{-- NAV LINKS --}}
            <div class="hidden md:flex items-center gap-7">
                <a href="{{ route('home') }}"
                    class="text-sm font-semibold {{ request()->routeIs('home') ? 'text-[#E91E8C] border-b-2 border-[#E91E8C] pb-0.5' : 'text-gray-600 dark:text-slate-300 hover:text-[#E91E8C]' }} transition">
                    Beranda
                </a>
                <a href="#artis" class="text-sm font-medium text-gray-600 dark:text-slate-300 hover:text-[#E91E8C] transition">Artis</a>
                <a href="{{ route('tickets.index') }}" class="text-sm font-medium text-gray-600 dark:text-slate-300 hover:text-[#E91E8C] transition">Tiket Saya</a>
                <a href="#" class="text-sm font-medium text-gray-600 dark:text-slate-300 hover:text-[#E91E8C] transition">Tentang Kami</a>
            </div>

            {{-- SEARCH --}}
            <form action="{{ route('home') }}" method="GET"
                class="hidden lg:flex items-center bg-gray-100 dark:bg-[#1a2540] border border-transparent dark:border-[#E91E8C]/40 rounded-full px-4 py-2 flex-1 max-w-xs hover:dark:border-[#E91E8C]/70 transition">
                <input type="text" name="search" placeholder="Cari konser, artis, atau venue..."
                value="{{ request('search') }}"
                class="bg-transparent border-0 outline-none ring-0 focus:outline-none focus:ring-0 text-sm w-full text-gray-700 dark:text-white placeholder-gray-400 dark:placeholder-slate-500">
                <button type="submit">
                    <svg class="w-4 h-4 text-gray-400 ml-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>
            </form>

            {{-- RIGHT SIDE --}}
            <div class="flex items-center gap-2 flex-shrink-0">

                {{-- Dark Mode Toggle --}}
                <button id="theme-toggle" aria-label="Toggle dark mode"
                    class="relative w-[52px] h-7 rounded-full border transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-[#E91E8C]/50
                        bg-slate-200 border-slate-300
                        dark:bg-[#E91E8C]/20 dark:border-[#E91E8C]/40
                        hover:border-[#E91E8C]/60 dark:hover:border-[#E91E8C]/70
                        group">
                    {{-- Track icon kiri: moon --}}
                    <span class="absolute left-1.5 top-1/2 -translate-y-1/2 transition-opacity duration-300 opacity-60 dark:opacity-0 pointer-events-none">
                        <svg class="w-3.5 h-3.5 text-slate-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3a7 7 0 0 0 9.79 9.79z"/>
                        </svg>
                    </span>
                    {{-- Track icon kanan: sun --}}
                    <span class="absolute right-1.5 top-1/2 -translate-y-1/2 transition-opacity duration-300 opacity-0 dark:opacity-60 pointer-events-none">
                        <svg class="w-3.5 h-3.5 text-[#E91E8C]" fill="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="5"/>
                            <path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42" stroke="currentColor" stroke-width="2" stroke-linecap="round" fill="none"/>
                        </svg>
                    </span>
                    {{-- Thumb/knob --}}
                    <span id="theme-thumb"
                        class="absolute top-0.5 left-0.5 w-6 h-6 rounded-full shadow-sm transition-all duration-300 flex items-center justify-center
                            bg-white dark:bg-[#E91E8C]
                            dark:translate-x-[24px]
                            dark:shadow-[0_0_8px_rgba(233,30,140,0.5)]">
                        {{-- Moon icon di thumb (light mode) --}}
                        <svg id="thumb-moon" class="w-3 h-3 text-slate-500 dark:hidden" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3a7 7 0 0 0 9.79 9.79z"/>
                        </svg>
                        {{-- Sun icon di thumb (dark mode) --}}
                        <svg id="thumb-sun" class="w-3 h-3 text-white hidden dark:block" fill="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="4.5"/>
                            <path d="M12 2v1.5M12 20.5V22M4.93 4.93l1.06 1.06M17.01 17.01l1.06 1.06M2 12h1.5M20.5 12H22M4.93 19.07l1.06-1.06M17.01 6.99l1.06-1.06" stroke="currentColor" stroke-width="2" stroke-linecap="round" fill="none"/>
                        </svg>
                    </span>
                </button>

                @auth

               

                {{-- User Dropdown --}}
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" @click.outside="open = false"
                        class="flex items-center gap-2.5 pl-2 pr-3 py-1.5 rounded-full bg-gray-100 dark:bg-white/10 border border-transparent dark:border-white/8 hover:bg-gray-200 dark:hover:bg-white/10 transition">
                        <div class="w-6 h-6 rounded-full bg-gradient-to-br from-[#E91E8C] to-purple-600 flex items-center justify-center text-white text-xs font-bold">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <span class="text-sm font-medium text-gray-700 dark:text-white hidden md:block">Hi, {{ Auth::user()->name }}</span>
                        <svg class="w-3.5 h-3.5 text-gray-400 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div x-show="open"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                    x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 mt-3 w-52 rounded-2xl
                        bg-white dark:bg-[#0D1526]
                        border border-gray-200 dark:border-white/10
                        shadow-xl dark:shadow-2xl
                        overflow-hidden py-1">

                        <div class="px-4 py-3 border-b border-gray-200 dark:border-white/8">
                            <p class="text-xs font-semibold text-gray-900 dark:text-white">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500 dark:text-slate-400 mt-0.5 truncate">{{ Auth::user()->email }}</p>
                        </div>

                        <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 dark:text-slate-300 hover:text-[#E91E8C] hover:bg-gray-100 dark:hover:bg-white/5 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Profil Saya
                        </a>
                        <a href="{{ route('tickets.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 dark:text-slate-300 hover:text-[#E91E8C] hover:bg-gray-100 dark:hover:bg-white/5 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                            </svg>
                            Tiket Saya
                        </a>
                        <a href="{{ route('history.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 dark:text-slate-300 hover:text-[#E91E8C] hover:bg-gray-100 dark:hover:bg-white/5 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8v4l3 3m6-3a9 9 0 11-3-6.7L21 8"/>
                            </svg>
                            Riwayat Pembayaran
                        </a>

                        <div class="border-t border-white/8 my-1"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-red-400 hover:text-red-300 hover:bg-red-500/5 transition text-left">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>

                @else

                {{-- Guest --}}
                <a href="{{ route('login') }}"
                    class="text-sm font-semibold text-gray-700 dark:text-white border border-gray-300 dark:border-white/20 px-5 py-1.5 rounded-full hover:border-[#E91E8C] hover:text-[#E91E8C] transition">
                    Login
                </a>
                <a href="{{ route('register') }}"
                    class="text-sm font-semibold text-white bg-[#E91E8C] px-5 py-1.5 rounded-full hover:bg-[#c4176f] transition shadow-sm shadow-pink-500/20">
                    Register
                </a>

                @endauth

            </div>

        </div>
    </div>
</nav>
