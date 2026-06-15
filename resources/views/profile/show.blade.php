@extends('layouts.app')

@section('title', 'Profil Saya – Melodia')

@section('content')

<div class="min-h-screen bg-slate-50 dark:bg-[#060B1F] transition-colors duration-300">

    {{-- Background ambient --}}
    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#EC4899]/5 dark:bg-[#EC4899]/8 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/3 right-1/4 w-80 h-80 bg-purple-600/5 dark:bg-purple-600/8 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-5xl mx-auto px-6 lg:px-8 py-8">

        {{-- BREADCRUMB --}}
        <nav class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 mb-8">
            <a href="{{ route('home') }}" class="hover:text-[#EC4899] transition-colors">Beranda</a>
            <span>›</span>
            <span class="text-[#EC4899] font-medium">Profil Saya</span>
        </nav>

        {{-- FLASH MESSAGE --}}
        @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
            class="mb-6 px-5 py-4 rounded-2xl bg-emerald-50 dark:bg-emerald-500/10 border border-emerald-200 dark:border-emerald-500/30 text-emerald-700 dark:text-emerald-300 text-sm flex items-center gap-3">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ session('success') }}
        </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- ====== LEFT COLUMN ====== --}}
            <div class="space-y-5">

                {{-- PROFILE CARD --}}
                <div class="rounded-3xl border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0F172A] overflow-hidden"
                    style="box-shadow: 0 0 40px rgba(236,72,153,0.06);">

                    {{-- Cover --}}
                    <div class="h-24 w-full" style="background: linear-gradient(135deg, #1e0a2e 0%, #3b0764 50%, #1e1040 100%);">
                        <div class="h-full w-full opacity-30"
                            style="background-image: radial-gradient(circle at 20% 50%, #EC4899 0%, transparent 50%), radial-gradient(circle at 80% 20%, #8b5cf6 0%, transparent 50%);">
                        </div>
                    </div>

                    <div class="px-6 pb-6">
                        {{-- Avatar --}}
                        <div class="flex justify-between items-end -mt-10 mb-4">
                            <div class="relative">
                                @if($user->avatar)
                                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}"
                                        class="w-20 h-20 rounded-2xl object-cover border-4 border-white dark:border-[#0F172A] shadow-lg">
                                @else
                                    <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-[#EC4899] to-purple-600 border-4 border-white dark:border-[#0F172A] shadow-lg flex items-center justify-center">
                                        <span class="text-white font-bold text-2xl">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <h2 class="text-lg font-bold text-slate-900 dark:text-white">{{ $user->name }}</h2>
                        <p class="text-sm text-slate-500 dark:text-slate-400">{{ $user->email }}</p>

                        @if($user->bio)
                        <p class="text-sm text-slate-600 dark:text-slate-300 mt-3 leading-relaxed">{{ $user->bio }}</p>
                        @endif

                        @if($user->phone)
                        <div class="flex items-center gap-2 mt-3 text-sm text-slate-500 dark:text-slate-400">
                            <svg class="w-4 h-4 text-[#EC4899]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            {{ $user->phone }}
                        </div>
                        @endif

                        <div class="flex items-center gap-2 mt-2 text-sm text-slate-500 dark:text-slate-400">
                            <svg class="w-4 h-4 text-[#EC4899]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                            </svg>
                            Bergabung {{ $user->created_at->format('M Y') }}
                        </div>
                    </div>
                </div>

                {{-- STATS CARD --}}
                <div class="rounded-3xl border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0F172A] p-6"
                    style="box-shadow: 0 0 40px rgba(236,72,153,0.06);">
                    <h3 class="text-sm font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-4">Statistik</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-[#EC4899]/10 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-[#EC4899]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                                    </svg>
                                </div>
                                <span class="text-sm text-slate-600 dark:text-slate-300">Total Tiket</span>
                            </div>
                            <span class="font-bold text-slate-900 dark:text-white">{{ $paidOrders }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-purple-500/10 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                    </svg>
                                </div>
                                <span class="text-sm text-slate-600 dark:text-slate-300">Total Order</span>
                            </div>
                            <span class="font-bold text-slate-900 dark:text-white">{{ $totalOrders }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-emerald-500/10 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <span class="text-sm text-slate-600 dark:text-slate-300">Total Belanja</span>
                            </div>
                            <span class="font-bold text-[#EC4899]">Rp{{ number_format($totalSpent, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ====== RIGHT COLUMN ====== --}}
            <div class="lg:col-span-2 space-y-5">

                {{-- EDIT PROFILE FORM --}}
                <div class="rounded-3xl border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0F172A] p-6 lg:p-8"
                    style="box-shadow: 0 0 40px rgba(236,72,153,0.06);">

                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-6">Edit Profil</h3>

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                        @csrf

                        {{-- Avatar Upload --}}
                        <div class="flex items-center gap-5">
                            <div class="relative shrink-0">
                                @if($user->avatar)
                                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="avatar"
                                        id="avatar-preview"
                                        class="w-16 h-16 rounded-2xl object-cover border-2 border-[#EC4899]/30">
                                @else
                                    <div id="avatar-preview-placeholder"
                                        class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#EC4899] to-purple-600 flex items-center justify-center">
                                        <span class="text-white font-bold text-xl">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                    </div>
                                    <img id="avatar-preview" src="" alt="preview" class="w-16 h-16 rounded-2xl object-cover border-2 border-[#EC4899]/30 hidden">
                                @endif
                            </div>
                            <div>
                                <label for="avatar"
                                    class="cursor-pointer inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-[#EC4899] text-[#EC4899] hover:bg-[#EC4899] hover:text-white text-sm font-semibold transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Ganti Foto
                                </label>
                                <input type="file" id="avatar" name="avatar" accept="image/*" class="hidden" onchange="previewAvatar(this)">
                                <p class="text-xs text-slate-400 mt-1.5">JPG, PNG, WebP. Maks 2MB.</p>
                            </div>
                        </div>

                        @error('avatar')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                        @enderror

                        {{-- Name --}}
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                class="w-full px-4 py-3 rounded-2xl border border-slate-200 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:border-[#EC4899] focus:ring-2 focus:ring-[#EC4899]/20 transition text-sm">
                            @error('name')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                class="w-full px-4 py-3 rounded-2xl border border-slate-200 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:border-[#EC4899] focus:ring-2 focus:ring-[#EC4899]/20 transition text-sm">
                            @error('email')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                        </div>

                        {{-- Phone --}}
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Nomor Telepon</label>
                            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="08xxxxxxxxxx"
                                class="w-full px-4 py-3 rounded-2xl border border-slate-200 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:border-[#EC4899] focus:ring-2 focus:ring-[#EC4899]/20 transition text-sm">
                            @error('phone')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                        </div>

                        {{-- Bio --}}
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Bio</label>
                            <textarea name="bio" rows="3" placeholder="Ceritakan sedikit tentang diri kamu..."
                                class="w-full px-4 py-3 rounded-2xl border border-slate-200 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:border-[#EC4899] focus:ring-2 focus:ring-[#EC4899]/20 transition text-sm resize-none">{{ old('bio', $user->bio) }}</textarea>
                            @error('bio')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <button type="submit"
                            class="w-full py-3.5 bg-[#EC4899] hover:bg-[#db2777] text-white font-semibold rounded-2xl text-sm transition-colors">
                            Simpan Perubahan
                        </button>
                    </form>
                </div>

                {{-- CHANGE PASSWORD FORM --}}
                <div class="rounded-3xl border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0F172A] p-6 lg:p-8"
                    style="box-shadow: 0 0 40px rgba(236,72,153,0.06);">

                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-6">Ubah Password</h3>

                    <form action="{{ route('profile.password') }}" method="POST" class="space-y-5">
                        @csrf

                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Password Saat Ini</label>
                            <input type="password" name="current_password" placeholder="••••••••"
                                class="w-full px-4 py-3 rounded-2xl border border-slate-200 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:border-[#EC4899] focus:ring-2 focus:ring-[#EC4899]/20 transition text-sm">
                            @error('current_password')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Password Baru</label>
                            <input type="password" name="password" placeholder="Min. 8 karakter"
                                class="w-full px-4 py-3 rounded-2xl border border-slate-200 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:border-[#EC4899] focus:ring-2 focus:ring-[#EC4899]/20 transition text-sm">
                            @error('password')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Konfirmasi Password Baru</label>
                            <input type="password" name="password_confirmation" placeholder="Ulangi password baru"
                                class="w-full px-4 py-3 rounded-2xl border border-slate-200 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:border-[#EC4899] focus:ring-2 focus:ring-[#EC4899]/20 transition text-sm">
                        </div>

                        <button type="submit"
                            class="w-full py-3.5 bg-slate-800 hover:bg-slate-700 dark:bg-white/10 dark:hover:bg-white/15 text-white font-semibold rounded-2xl text-sm transition-colors">
                            Ubah Password
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
function previewAvatar(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('avatar-preview');
            const placeholder = document.getElementById('avatar-preview-placeholder');
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            if (placeholder) placeholder.classList.add('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

@endsection