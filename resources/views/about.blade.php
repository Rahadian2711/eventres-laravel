@extends('layouts.app')

@section('title', 'Tentang Kami – Melodia')

@section('content')
<div class="bg-slate-50 dark:bg-[#060B1F] transition-colors duration-300">

    {{-- ── HERO ── --}}
    <section class="relative overflow-hidden pt-28 lg:pt-36 pb-16">
        {{-- ambient glow --}}
        <div class="absolute inset-0 pointer-events-none" style="background: radial-gradient(ellipse 60% 50% at 50% 0%, rgba(236,72,153,0.10) 0%, transparent 70%), radial-gradient(ellipse 40% 40% at 85% 20%, rgba(139,92,246,0.08) 0%, transparent 70%);"></div>

        <div class="relative max-w-3xl mx-auto px-6 text-center">
            <span class="inline-flex items-center gap-2 text-xs font-bold text-[#EC4899] bg-pink-50 dark:bg-[#EC4899]/10 border border-pink-200 dark:border-[#EC4899]/20 rounded-full px-4 py-1.5 mb-8">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 3v10.55A4 4 0 1 0 14 17V7h4V3h-6z"/></svg>
                Tentang Melodia
            </span>
            <h1 class="text-5xl lg:text-6xl font-extrabold text-gray-900 dark:text-white leading-[1.1] tracking-tight mb-6">
                Satu Tempat untuk<br>
                <span class="text-[#EC4899]">Semua Musik</span> yang Kamu Cinta
            </h1>
            <p class="text-base text-gray-500 dark:text-slate-400 leading-relaxed max-w-xl mx-auto">
                Melodia hadir sebagai jembatan antara penggemar musik dan artis favorit mereka — dari pencarian event hingga pembelian tiket dalam satu platform.
            </p>
        </div>
    </section>

    {{-- ── STATS ── --}}
    <section class="max-w-6xl mx-auto px-6 lg:px-8 pb-24 lg:pb-28">
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-5">

            <div class="bg-white dark:bg-[#0F172A] border border-gray-100 dark:border-white/8 rounded-3xl p-6 lg:p-7 hover:border-[#EC4899]/30 hover:-translate-y-0.5 transition-all duration-200">
                <div class="w-11 h-11 rounded-xl bg-[#EC4899]/10 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-[#EC4899]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 3v4M16 3v4M4 9h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                    </svg>
                </div>
                <div class="text-2xl font-extrabold text-gray-900 dark:text-white">24+</div>
                <div class="text-xs text-gray-400 dark:text-slate-500 mt-1 font-medium">Event Tersedia</div>
            </div>

            <div class="bg-white dark:bg-[#0F172A] border border-gray-100 dark:border-white/8 rounded-3xl p-6 lg:p-7 hover:border-violet-400/30 hover:-translate-y-0.5 transition-all duration-200">
                <div class="w-11 h-11 rounded-xl bg-violet-100 dark:bg-violet-500/10 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-violet-600 dark:text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14a3 3 0 003-3V6a3 3 0 10-6 0v5a3 3 0 003 3z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 11a7 7 0 01-14 0M12 18v3"/>
                    </svg>
                </div>
                <div class="text-2xl font-extrabold text-gray-900 dark:text-white">18+</div>
                <div class="text-xs text-gray-400 dark:text-slate-500 mt-1 font-medium">Artis Bergabung</div>
            </div>

            <div class="bg-white dark:bg-[#0F172A] border border-gray-100 dark:border-white/8 rounded-3xl p-6 lg:p-7 hover:border-cyan-400/30 hover:-translate-y-0.5 transition-all duration-200">
                <div class="w-11 h-11 rounded-xl bg-cyan-100 dark:bg-cyan-500/10 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-cyan-600 dark:text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 9.5A1.5 1.5 0 014.5 8h15A1.5 1.5 0 0121 9.5v1a1.5 1.5 0 000 3v1a1.5 1.5 0 01-1.5 1.5h-15A1.5 1.5 0 013 14.5v-1a1.5 1.5 0 000-3v-1z"/>
                        <path stroke-linecap="round" stroke-dasharray="2 2" d="M9 8.5v7"/>
                    </svg>
                </div>
                <div class="text-2xl font-extrabold text-gray-900 dark:text-white">50K+</div>
                <div class="text-xs text-gray-400 dark:text-slate-500 mt-1 font-medium">Tiket Terjual</div>
            </div>

            <div class="bg-white dark:bg-[#0F172A] border border-gray-100 dark:border-white/8 rounded-3xl p-6 lg:p-7 hover:border-amber-400/30 hover:-translate-y-0.5 transition-all duration-200">
                <div class="w-11 h-11 rounded-xl bg-amber-100 dark:bg-amber-500/10 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s7-7.79 7-12.5A7 7 0 105 8.5C5 13.21 12 21 12 21z"/>
                        <circle cx="12" cy="8.5" r="2.3"/>
                    </svg>
                </div>
                <div class="text-2xl font-extrabold text-gray-900 dark:text-white">15+</div>
                <div class="text-xs text-gray-400 dark:text-slate-500 mt-1 font-medium">Kota di Indonesia</div>
            </div>

        </div>
    </section>

    {{-- ── STORY ── --}}
    <section class="max-w-6xl mx-auto px-6 lg:px-8 pb-24 lg:pb-28">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-14 items-center">

            {{-- Visual --}}
            <div class="rounded-3xl h-80 lg:h-[26rem] bg-[#0d1117] dark:bg-[#0a0f1e] border border-white/8 relative overflow-hidden flex items-center justify-center">
                <div class="absolute inset-0" style="background: radial-gradient(ellipse at 30% 40%, rgba(236,72,153,0.15) 0%, transparent 60%), radial-gradient(ellipse at 80% 70%, rgba(139,92,246,0.12) 0%, transparent 60%);"></div>
                <div class="absolute inset-0 opacity-[0.07]" style="background-image: radial-gradient(white 1px, transparent 1px); background-size: 22px 22px;"></div>
                <div class="relative z-10 text-center px-6">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#EC4899] to-purple-600 flex items-center justify-center mx-auto mb-5 shadow-[0_0_30px_rgba(236,72,153,0.35)]">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 3v10.55A4 4 0 1 0 14 17V7h4V3h-6z"/>
                        </svg>
                    </div>
                    <p class="text-white/40 text-[11px] tracking-[0.2em] uppercase font-semibold mb-1">Didirikan</p>
                    <p class="text-white text-4xl font-extrabold">2024</p>
                    <div class="flex items-center justify-center gap-2 mt-6">
                        <span class="text-[11px] font-semibold text-white/60 bg-white/8 border border-white/12 rounded-lg px-3 py-1.5">🇮🇩 Made in Indonesia</span>
                        <span class="text-[11px] font-semibold text-[#EC4899] bg-[#EC4899]/10 border border-[#EC4899]/20 rounded-lg px-3 py-1.5">♪ Live the Music</span>
                    </div>
                </div>
            </div>

            {{-- Text --}}
            <div>
                <p class="text-[11px] font-bold text-[#EC4899] tracking-[0.15em] uppercase mb-3">Cerita Kami</p>
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white leading-snug mb-5">
                    Berawal dari Cinta<br>terhadap Musik Live
                </h2>
                <p class="text-sm text-gray-500 dark:text-slate-400 leading-relaxed mb-4">
                    Melodia lahir pada 2024 dari frustrasi yang umum: sulitnya menemukan informasi konser yang terpercaya, proses beli tiket yang ribet, dan pengalaman yang tidak memuaskan.
                </p>
                <p class="text-sm text-gray-500 dark:text-slate-400 leading-relaxed mb-7">
                    Kami membangun platform yang menempatkan pengalaman pengguna di atas segalanya — karena momen konser terlalu berharga untuk dirusak oleh proses yang membingungkan.
                </p>
                <div class="flex flex-wrap items-center gap-3">
                    <a href="{{ route('concerts.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#EC4899] hover:bg-[#db2777] text-white text-sm font-semibold rounded-xl transition shadow-md shadow-pink-500/20">
                        Jelajahi Konser
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                    </a>
                    <a href="{{ route('artists.index') }}" class="px-5 py-2.5 border border-gray-200 dark:border-white/10 text-gray-700 dark:text-slate-300 text-sm font-semibold rounded-xl hover:border-[#EC4899] hover:text-[#EC4899] dark:hover:border-[#EC4899] dark:hover:text-[#EC4899] transition">
                        Lihat Artis
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ── VISI & MISI ── --}}
    <section class="max-w-6xl mx-auto px-6 lg:px-8 pb-24 lg:pb-28">
        <div class="text-center mb-12">
            <p class="text-[11px] font-bold text-[#EC4899] tracking-[0.15em] uppercase mb-2">Arah Kami</p>
            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">Visi &amp; Misi</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Visi --}}
            <div class="relative bg-white dark:bg-[#0F172A] border border-gray-100 dark:border-white/8 rounded-3xl p-8 overflow-hidden hover:border-[#EC4899]/30 transition-colors duration-200">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-[#EC4899] to-purple-500"></div>
                <div class="flex items-center gap-4 mb-5">
                    <div class="w-12 h-12 rounded-2xl bg-[#EC4899]/10 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-[#EC4899]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Visi</h3>
                </div>
                <p class="text-sm text-gray-500 dark:text-slate-400 leading-relaxed">
                    Menjadi platform konser musik nomor satu di Indonesia yang menghubungkan jutaan penggemar dengan artis dan pengalaman live music terbaik di seluruh nusantara.
                </p>
            </div>

            {{-- Misi --}}
            <div class="relative bg-white dark:bg-[#0F172A] border border-gray-100 dark:border-white/8 rounded-3xl p-8 overflow-hidden hover:border-violet-400/30 transition-colors duration-200">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-violet-500 to-indigo-500"></div>
                <div class="flex items-center gap-4 mb-5">
                    <div class="w-12 h-12 rounded-2xl bg-violet-100 dark:bg-violet-500/10 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-violet-600 dark:text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Misi</h3>
                </div>
                <ul class="space-y-3">
                    @foreach([
                        'Platform tiket konser yang mudah, aman, dan terpercaya',
                        'Membantu artis Indonesia menjangkau lebih banyak penggemar',
                        'Informasi event musik yang lengkap, akurat, dan real-time',
                        'Ekosistem industri musik live yang sehat dan berkembang',
                    ] as $item)
                    <li class="flex items-start gap-3 text-sm text-gray-500 dark:text-slate-400 leading-relaxed">
                        <span class="w-5 h-5 mt-0.5 rounded-full bg-violet-100 dark:bg-violet-500/10 flex items-center justify-center flex-shrink-0">
                            <svg class="w-2.5 h-2.5 text-violet-600 dark:text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    {{-- ── TIM ── --}}
    <div class="bg-white dark:bg-white/[0.02] border-y border-gray-100 dark:border-white/5">
        <section class="max-w-6xl mx-auto px-6 lg:px-8 py-20 lg:py-24">
            <div class="text-center mb-12">
                <p class="text-[11px] font-bold text-[#EC4899] tracking-[0.15em] uppercase mb-2">Orang-orang di Baliknya</p>
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">Tim Kami</h2>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-5 lg:gap-6">
                @php $team = [
                    ['name' => 'Rahadian', 'role' => 'Founder & CEO',        'bg' => 'from-[#EC4899] to-rose-600'],
                    ['name' => 'Anisa',    'role' => 'Co-Founder & COO',     'bg' => 'from-violet-500 to-indigo-600'],
                    ['name' => 'Bima',     'role' => 'Head of Technology',   'bg' => 'from-cyan-500 to-blue-600'],
                    ['name' => 'Sari',     'role' => 'Head of Partnerships', 'bg' => 'from-amber-400 to-orange-500'],
                ]; @endphp
                @foreach($team as $m)
                <div class="bg-slate-50 dark:bg-[#0F172A] border border-gray-100 dark:border-white/8 rounded-3xl p-6 lg:p-7 text-center group hover:border-[#EC4899]/30 hover:-translate-y-0.5 transition-all duration-200">
                    <div class="w-16 h-16 rounded-full bg-gradient-to-br {{ $m['bg'] }} text-white text-xl font-bold flex items-center justify-center mx-auto mb-4 ring-4 ring-white dark:ring-[#0F172A] shadow-md group-hover:scale-105 transition-transform duration-200">
                        {{ strtoupper(substr($m['name'], 0, 1)) }}
                    </div>
                    <p class="text-sm font-bold text-gray-900 dark:text-white">{{ $m['name'] }}</p>
                    <p class="text-xs text-gray-400 dark:text-slate-500 mt-1 leading-snug">{{ $m['role'] }}</p>
                </div>
                @endforeach
            </div>
        </section>
    </div>

    {{-- ── CTA ── --}}
    <section class="max-w-6xl mx-auto px-6 lg:px-8 pt-24 lg:pt-28 pb-24 lg:pb-32">
        <div class="rounded-3xl bg-gradient-to-br from-[#EC4899] to-purple-700 p-10 lg:p-14 text-center relative overflow-hidden">
            <div class="absolute inset-0 opacity-[0.06]" style="background-image: radial-gradient(white 1px, transparent 1px); background-size: 24px 24px;"></div>
            <div class="relative z-10">
                <h2 class="text-2xl lg:text-3xl font-extrabold text-white mb-3">Siap Merasakan Konser Impianmu?</h2>
                <p class="text-white/70 text-sm mb-8 max-w-md mx-auto">Temukan event musik terbaik dari artis favoritmu dan pesan tiketnya sekarang.</p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                    <a href="{{ route('concerts.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-white text-[#EC4899] font-bold rounded-xl hover:bg-gray-50 transition text-sm shadow-md">
                        Jelajahi Konser
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                    </a>
                    <a href="{{ route('artists.index') }}" class="px-5 py-2.5 bg-white/15 border border-white/25 text-white font-bold rounded-xl hover:bg-white/25 transition text-sm">
                        Lihat Artis
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection