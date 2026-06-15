@extends('layouts.app')

@section('title', $event->title)

@section('content')

<section class="max-w-[1400px] mx-auto px-6 lg:px-8 py-8">

    {{-- Breadcrumb --}}
    <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400 mb-8">
        <a href="{{ route('home') }}" class="hover:text-[#E91E8C]">
            Beranda
        </a>
        <span>›</span>
        <span>Event</span>
        <span>›</span>
        <span class="font-semibold text-gray-900 dark:text-white">
            {{ $event->title }}
        </span>
    </div>

    {{-- TOP SECTION --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

        {{-- LEFT --}}
        <div class="lg:col-span-8">

            <div class="relative overflow-hidden rounded-3xl">
                <img
                    src="{{ $event->image }}"
                    alt="{{ $event->title }}"
                    class="w-full h-[380px] object-cover">

                <button
                    class="absolute top-4 right-4 w-11 h-11 rounded-xl bg-white shadow-lg flex items-center justify-center text-gray-400 hover:text-red-500 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </button>
            </div>

            {{-- DETAIL EVENT (dipindah ke bawah gambar di kolom kiri) --}}
            <div class="mt-8">

                {{-- Title --}}
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
                    {{ $event->title }}
                </h1>

                {{-- Badge --}}
                <div class="mt-4">
                    <span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold bg-pink-100 text-pink-600">
                        {{ $event->category->name ?? 'Konser' }}
                    </span>
                </div>

                {{-- Meta --}}
                @php $schedule = $event->schedules->first(); @endphp
                <div class="flex flex-wrap gap-3 mt-6">
                    <div class="flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-100 dark:bg-slate-800 dark:text-white text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#E91E8C]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ $schedule ? \Carbon\Carbon::parse($schedule->start_time)->translatedFormat('d F Y') : '-' }}
                    </div>

                    <div class="flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-100 dark:bg-slate-800 dark:text-white text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#E91E8C]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ $schedule ? \Carbon\Carbon::parse($schedule->start_time)->format('H:i') : '-' }} WIB
                    </div>

                    <div class="flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-100 dark:bg-slate-800 dark:text-white text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#E91E8C]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        {{ $event->venue }}
                    </div>

                    <div class="flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-100 dark:bg-slate-800 dark:text-white text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#E91E8C]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        {{ $event->organizer }}
                    </div>
                </div>

                {{-- Tentang Event --}}
                <div class="mt-10">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                        Tentang Event
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                        {{ $event->description }}
                    </p>
                </div>

                {{-- ARTIS / LINEUP --}}
                @if($event->artists->count() > 0)
                <div class="mt-10">
                    @if($event->artists->count() === 1)
                        {{-- Event tunggal: tampil simpel --}}
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Artis</h2>
                        @foreach($event->artists as $artist)
                        <a href="{{ route('artists.show', $artist->slug) }}"
                            class="inline-flex items-center gap-3 px-4 py-2.5 rounded-2xl border border-slate-200 dark:border-white/10 bg-white dark:bg-slate-900 hover:border-[#E91E8C]/40 transition-all">
                            <div class="w-10 h-10 rounded-xl overflow-hidden shrink-0">
                                @if($artist->image)
                                    <img src="{{ asset('storage/' . $artist->image) }}" alt="{{ $artist->name }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-[#EC4899] to-purple-600 flex items-center justify-center">
                                        <span class="text-white text-xs font-bold">{{ strtoupper(substr($artist->name, 0, 1)) }}</span>
                                    </div>
                                @endif
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white text-sm">{{ $artist->name }}</p>
                                @if($artist->genre)
                                <p class="text-xs text-gray-500">{{ $artist->genre }}</p>
                                @endif
                            </div>
                        </a>
                        @endforeach
                    @else
                        {{-- Festival / banyak artis: tampil lineup --}}
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Lineup Artis</h2>
                        <div class="flex flex-wrap gap-3">
                            @foreach($event->artists as $artist)
                            <a href="{{ route('artists.show', $artist->slug) }}"
                                class="flex items-center gap-2.5 px-3 py-2 rounded-xl border border-slate-200 dark:border-white/10 bg-white dark:bg-slate-900 hover:border-[#E91E8C]/40 hover:shadow-sm transition-all">
                                <div class="w-8 h-8 rounded-lg overflow-hidden shrink-0">
                                    @if($artist->image)
                                        <img src="{{ asset('storage/' . $artist->image) }}" alt="{{ $artist->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-[#EC4899] to-purple-600 flex items-center justify-center">
                                            <span class="text-white text-[10px] font-bold">{{ strtoupper(substr($artist->name, 0, 1)) }}</span>
                                        </div>
                                    @endif
                                </div>
                                <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $artist->name }}</span>
                            </a>
                            @endforeach
                        </div>
                    @endif
                </div>
                @endif

                {{-- Penampilan Spesial --}}
                @if($event->tags->count() > 0)
                <div class="mt-10">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                        Penampilan Spesial
                    </h2>
                    <div class="flex flex-wrap gap-3">
                        @foreach($event->tags as $tag)
                        <span class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-gray-100 dark:bg-slate-800 dark:text-white text-sm font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-[#E91E8C] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                            </svg>
                            {{ $tag->tag }}
                        </span>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Informasi Tambahan --}}
                @php
                    $scheduleFirst = $event->schedules->first();
                    $durasi = $scheduleFirst
                        ? \Carbon\Carbon::parse($scheduleFirst->start_time)->diffInHours(\Carbon\Carbon::parse($scheduleFirst->end_time))
                        : null;
                    $gateOpen = $scheduleFirst
                        ? \Carbon\Carbon::parse($scheduleFirst->start_time)->subHour()->format('H:i')
                        : null;
                @endphp

                {{-- Informasi Tambahan --}}
                <div class="mt-10 rounded-3xl border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-900 p-6">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                        Informasi Tambahan
                    </h2>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

                        <div>
                            <div class="mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#E91E8C]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="text-sm text-gray-500">Durasi</div>
                            <div class="font-semibold dark:text-white">± {{ $durasi ?? 3 }} Jam</div>
                        </div>

                        <div>
                            <div class="mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#E91E8C]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="text-sm text-gray-500">Pintu Dibuka</div>
                            <div class="font-semibold dark:text-white">{{ $gateOpen ?? '17:00' }} WIB</div>
                        </div>

                        <div>
                            <div class="mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#E91E8C]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                                </svg>
                            </div>
                            <div class="text-sm text-gray-500">Kategori Event</div>
                            <div class="font-semibold dark:text-white">{{ $event->category->name ?? '-' }}</div>
                        </div>

                        <div>
                            <div class="mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#E91E8C]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div class="text-sm text-gray-500">Penyelenggara</div>
                            <div class="font-semibold dark:text-white">{{ $event->organizer }}</div>
                        </div>

                    </div>
                </div>

                {{-- SYARAT & KETENTUAN --}}
                <div class="mt-10">

                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                        Syarat &amp; Ketentuan
                    </h2>

                    <div class="space-y-3">

                        {{-- Item 1: Kebijakan Refund --}}
                        <div class="rounded-2xl border border-gray-200 dark:border-slate-700 overflow-hidden">
                            <button class="sk-toggle w-full flex items-center justify-between px-5 py-4 text-left bg-white dark:bg-slate-900 hover:bg-gray-50 dark:hover:bg-slate-800 transition">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-xl bg-pink-100 dark:bg-pink-950/40 flex items-center justify-center shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#E91E8C]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z" />
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-gray-900 dark:text-white text-sm">Kebijakan Refund &amp; Pengembalian Dana</span>
                                </div>
                                <svg class="sk-chevron w-5 h-5 text-gray-400 transition-transform duration-300 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="sk-content hidden px-5 pb-5 bg-white dark:bg-slate-900">
                                <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                                    <li class="flex items-start gap-2">
                                        <span class="text-[#E91E8C] mt-0.5 shrink-0">•</span>
                                        Tiket yang sudah dibeli <strong class="text-gray-800 dark:text-gray-200">tidak dapat dikembalikan (non-refundable)</strong> kecuali event dibatalkan oleh penyelenggara.
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <span class="text-[#E91E8C] mt-0.5 shrink-0">•</span>
                                        Jika event dibatalkan, pengembalian dana diproses dalam <strong class="text-gray-800 dark:text-gray-200">14 hari kerja</strong> ke metode pembayaran asal.
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <span class="text-[#E91E8C] mt-0.5 shrink-0">•</span>
                                        Tiket dapat dipindahtangankan dengan menghubungi tim Melodia minimal <strong class="text-gray-800 dark:text-gray-200">3 hari sebelum event</strong>.
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <span class="text-[#E91E8C] mt-0.5 shrink-0">•</span>
                                        Biaya layanan platform tidak dapat dikembalikan dalam kondisi apapun.
                                    </li>
                                </ul>
                            </div>
                        </div>

                        {{-- Item 2: Aturan Masuk --}}
                        <div class="rounded-2xl border border-gray-200 dark:border-slate-700 overflow-hidden">
                            <button class="sk-toggle w-full flex items-center justify-between px-5 py-4 text-left bg-white dark:bg-slate-900 hover:bg-gray-50 dark:hover:bg-slate-800 transition">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-xl bg-pink-100 dark:bg-pink-950/40 flex items-center justify-center shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#E91E8C]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-gray-900 dark:text-white text-sm">Aturan Masuk Venue</span>
                                </div>
                                <svg class="sk-chevron w-5 h-5 text-gray-400 transition-transform duration-300 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="sk-content hidden px-5 pb-5 bg-white dark:bg-slate-900">
                                <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                                    <li class="flex items-start gap-2">
                                        <span class="text-[#E91E8C] mt-0.5 shrink-0">•</span>
                                        Tunjukkan <strong class="text-gray-800 dark:text-gray-200">e-tiket (QR Code)</strong> dan KTP/identitas valid saat masuk venue.
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <span class="text-[#E91E8C] mt-0.5 shrink-0">•</span>
                                        Tiket kategori <strong class="text-gray-800 dark:text-gray-200">Student</strong> wajib menunjukkan kartu pelajar/mahasiswa yang masih berlaku.
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <span class="text-[#E91E8C] mt-0.5 shrink-0">•</span>
                                        Pintu venue dibuka pukul <strong class="text-gray-800 dark:text-gray-200">17:00 WIB</strong>. Peserta yang datang terlambat tidak mendapat kompensasi.
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <span class="text-[#E91E8C] mt-0.5 shrink-0">•</span>
                                        Anak di bawah <strong class="text-gray-800 dark:text-gray-200">5 tahun</strong> tidak diperkenankan masuk demi keamanan bersama.
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <span class="text-[#E91E8C] mt-0.5 shrink-0">•</span>
                                        Penyelenggara berhak menolak masuk tanpa pengembalian dana bagi peserta yang melanggar aturan.
                                    </li>
                                </ul>
                            </div>
                        </div>

                        {{-- Item 3: Barang Larangan --}}
                        <div class="rounded-2xl border border-gray-200 dark:border-slate-700 overflow-hidden">
                            <button class="sk-toggle w-full flex items-center justify-between px-5 py-4 text-left bg-white dark:bg-slate-900 hover:bg-gray-50 dark:hover:bg-slate-800 transition">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-xl bg-pink-100 dark:bg-pink-950/40 flex items-center justify-center shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#E91E8C]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-gray-900 dark:text-white text-sm">Barang yang Dilarang Dibawa</span>
                                </div>
                                <svg class="sk-chevron w-5 h-5 text-gray-400 transition-transform duration-300 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="sk-content hidden px-5 pb-5 bg-white dark:bg-slate-900">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm text-gray-600 dark:text-gray-400">
                                    <div class="flex items-center gap-2">
                                        <span class="w-5 h-5 rounded-full bg-red-100 text-red-500 flex items-center justify-center text-xs font-bold shrink-0">✕</span>
                                        Senjata tajam / benda berbahaya
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="w-5 h-5 rounded-full bg-red-100 text-red-500 flex items-center justify-center text-xs font-bold shrink-0">✕</span>
                                        Minuman beralkohol dari luar
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="w-5 h-5 rounded-full bg-red-100 text-red-500 flex items-center justify-center text-xs font-bold shrink-0">✕</span>
                                        Narkoba / obat terlarang
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="w-5 h-5 rounded-full bg-red-100 text-red-500 flex items-center justify-center text-xs font-bold shrink-0">✕</span>
                                        Kamera profesional (DSLR / mirrorless)
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="w-5 h-5 rounded-full bg-red-100 text-red-500 flex items-center justify-center text-xs font-bold shrink-0">✕</span>
                                        Laser pointer
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="w-5 h-5 rounded-full bg-red-100 text-red-500 flex items-center justify-center text-xs font-bold shrink-0">✕</span>
                                        Makanan &amp; minuman dari luar venue
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="w-5 h-5 rounded-full bg-red-100 text-red-500 flex items-center justify-center text-xs font-bold shrink-0">✕</span>
                                        Drone / kamera terbang
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="w-5 h-5 rounded-full bg-red-100 text-red-500 flex items-center justify-center text-xs font-bold shrink-0">✕</span>
                                        Flare / kembang api
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Item 4: Privasi & Dokumentasi --}}
                        <div class="rounded-2xl border border-gray-200 dark:border-slate-700 overflow-hidden">
                            <button class="sk-toggle w-full flex items-center justify-between px-5 py-4 text-left bg-white dark:bg-slate-900 hover:bg-gray-50 dark:hover:bg-slate-800 transition">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-xl bg-pink-100 dark:bg-pink-950/40 flex items-center justify-center shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#E91E8C]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-gray-900 dark:text-white text-sm">Privasi &amp; Dokumentasi</span>
                                </div>
                                <svg class="sk-chevron w-5 h-5 text-gray-400 transition-transform duration-300 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="sk-content hidden px-5 pb-5 bg-white dark:bg-slate-900">
                                <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                                    <li class="flex items-start gap-2">
                                        <span class="text-[#E91E8C] mt-0.5 shrink-0">•</span>
                                        Dengan membeli tiket, peserta menyetujui bahwa <strong class="text-gray-800 dark:text-gray-200">foto/video dokumentasi event</strong> dapat digunakan oleh penyelenggara untuk keperluan promosi.
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <span class="text-[#E91E8C] mt-0.5 shrink-0">•</span>
                                        Rekaman video untuk keperluan <strong class="text-gray-800 dark:text-gray-200">komersial</strong> tanpa izin tertulis dari penyelenggara tidak diperbolehkan.
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <span class="text-[#E91E8C] mt-0.5 shrink-0">•</span>
                                        Data pribadi peserta digunakan sesuai <a href="#" class="text-[#E91E8C] underline hover:no-underline">Kebijakan Privasi Melodia</a>.
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    {{-- Catatan bawah --}}
                    <p class="mt-4 text-xs text-gray-400 dark:text-gray-500">
                        Dengan melanjutkan pembelian, Anda menyatakan telah membaca dan menyetujui seluruh syarat &amp; ketentuan di atas.
                        Hubungi <a href="mailto:support@melodia.id" class="text-[#E91E8C] hover:underline">support@melodia.id</a> untuk pertanyaan lebih lanjut.
                    </p>

                </div>

            </div>

        </div>

        {{-- RIGHT - Sticky Ticket Panel --}}
        <div class="lg:col-span-4">

            <div class="sticky top-24 rounded-3xl border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-900 shadow-sm flex flex-col" style="max-height: calc(100vh - 7rem);">

                {{-- Header --}}
                <div class="px-6 pt-6 pb-3 shrink-0">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                        Pilih Tiket
                    </h2>
                </div>

                {{-- Scrollable ticket list --}}
                <div class="overflow-y-auto px-6 pb-3 space-y-3 flex-1 min-h-0 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden" id="ticket-options">

                    @foreach($event->ticketCategories as $index => $ticket)
                    <label class="ticket-label flex items-center justify-between border border-gray-200 dark:border-slate-700 rounded-2xl p-4 cursor-pointer hover:border-[#E91E8C] transition-colors has-[:checked]:border-[#E91E8C] has-[:checked]:bg-pink-50 dark:has-[:checked]:bg-pink-950/20">
                        <div class="flex items-start gap-3">
                            <input type="radio" name="ticket" value="{{ $ticket->price }}" data-id="{{ $ticket->id }}" class="mt-1 accent-[#E91E8C]" {{ $index === 0 ? 'checked' : '' }}>
                            <div>
                                <h3 class="font-semibold dark:text-white text-sm">{{ $ticket->name }}</h3>
                                @if(!empty($ticket->benefits))
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">{{ $ticket->benefits }}</p>
                                @endif
                                <p class="text-xs text-gray-400 mt-1">Sisa {{ $ticket->quota - $ticket->sold }}</p>
                            </div>
                        </div>
                        <div class="font-bold text-[#E91E8C] text-sm whitespace-nowrap ml-2">
                            Rp{{ number_format($ticket->price, 0, ',', '.') }}
                        </div>
                    </label>
                    @endforeach

                </div>

                {{-- Footer: selalu terlihat, tidak ikut scroll --}}
                <div class="shrink-0 px-6 pb-6 pt-4">

                    {{-- Quantity --}}
                    <div class="mb-4">
                        <h3 class="font-semibold dark:text-white mb-3 text-sm">Jumlah Tiket</h3>
                        <div class="flex items-center gap-4">
                            <button
                                id="btn-minus"
                                class="w-9 h-9 rounded-xl border border-gray-200 dark:border-slate-700 text-gray-600 dark:text-gray-300 hover:border-[#E91E8C] hover:text-[#E91E8C] transition font-bold text-lg leading-none flex items-center justify-center">
                                −
                            </button>
                            <span id="qty-display" class="font-bold dark:text-white w-4 text-center">1</span>
                            <button
                                id="btn-plus"
                                class="w-9 h-9 rounded-xl border border-gray-200 dark:border-slate-700 text-gray-600 dark:text-gray-300 hover:border-[#E91E8C] hover:text-[#E91E8C] transition font-bold text-lg leading-none flex items-center justify-center">
                                +
                            </button>
                        </div>
                    </div>

                    {{-- Total --}}
                    <div class="flex justify-between items-center mb-5">
                        <span class="text-gray-500 text-sm">Total</span>
                        <span id="total-display" class="font-bold text-xl text-[#E91E8C]">
                            Rp{{ number_format($event->ticketCategories->first()->price ?? 0, 0, ',', '.') }}
                        </span>
                    </div>

                    {{-- CTA --}}
                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf

                        <input type="hidden"
                            name="event_id"
                            value="{{ $event->id }}">

                        <input type="hidden"
                            name="ticket_category_id"
                            id="ticket_category_id">

                        <input type="hidden"
                            name="quantity"
                            id="quantity_input"
                            value="1">

                        <button
                            type="submit"
                            class="w-full bg-[#E91E8C] hover:bg-[#c4176f] text-white py-4 rounded-2xl font-semibold transition">
                            Pesan Sekarang
                        </button>
                    </form>

                    <p class="text-center text-xs text-gray-500 mt-3">
                        🔒 Aman &amp; Terpercaya
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<script>
    const radios = document.querySelectorAll('input[name="ticket"]');
    const ticketCategoryInput = document.getElementById('ticket_category_id');
    const quantityInput = document.getElementById('quantity_input');
    const qtyDisplay = document.getElementById('qty-display');
    const totalDisplay = document.getElementById('total-display');
    const btnMinus = document.getElementById('btn-minus');
    const btnPlus = document.getElementById('btn-plus');

    let qty = 1;
    const selectedTicket =
        document.querySelector(
            'input[name="ticket"]:checked'
        );

    if (selectedTicket) {

        ticketCategoryInput.value =
            selectedTicket.dataset.id;

    }

    function getSelectedPrice() {
        const selected = document.querySelector('input[name="ticket"]:checked');
        return selected ? parseInt(selected.value) : 0;
    }

    function formatRupiah(num) {
        return 'Rp' + num.toLocaleString('id-ID');
    }

    function updateTotal() {
        totalDisplay.textContent = formatRupiah(getSelectedPrice() * qty);
    }

    radios.forEach(r => {

        r.addEventListener('change', () => {

            ticketCategoryInput.value =
                r.dataset.id;

            updateTotal();

        });

    });

    btnMinus.addEventListener('click', () => {
        if (qty > 1) {
            qty--;
            qtyDisplay.textContent = qty;
            quantityInput.value = qty;
            updateTotal();
        }
    });

    btnPlus.addEventListener('click', () => {
        qty++;
        qtyDisplay.textContent = qty;
        quantityInput.value = qty;
        updateTotal();
    });

    // Accordion S&K
    document.querySelectorAll('.sk-toggle').forEach(btn => {
        btn.addEventListener('click', () => {
            const content = btn.nextElementSibling;
            const chevron = btn.querySelector('.sk-chevron');
            const isOpen = !content.classList.contains('hidden');

            // Tutup semua
            document.querySelectorAll('.sk-content').forEach(c => c.classList.add('hidden'));
            document.querySelectorAll('.sk-chevron').forEach(c => c.classList.remove('rotate-180'));

            // Buka yang diklik (kecuali kalau sudah terbuka)
            if (!isOpen) {
                content.classList.remove('hidden');
                chevron.classList.add('rotate-180');
            }
        });
    });
</script>

@endsection