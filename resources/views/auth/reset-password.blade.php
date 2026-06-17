<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password – Melodia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 dark:bg-[#060B1F] flex items-center justify-center px-4 transition-colors duration-300">

    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#EC4899]/8 rounded-full blur-[100px]"></div>
    </div>

    <div class="relative w-full max-w-md">

        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="inline-flex flex-col items-center gap-2">
                <div class="w-14 h-14 bg-[#EC4899] rounded-2xl flex items-center justify-center shadow-lg shadow-pink-500/30">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 3v10.55A4 4 0 1 0 14 17V7h4V3h-6z"/>
                    </svg>
                </div>
                <div>
                    <div class="text-xl font-bold text-gray-900 dark:text-white">Melodia</div>
                    <div class="text-xs text-[#EC4899] font-semibold tracking-wide">Live the Music</div>
                </div>
            </a>
        </div>

        <div class="bg-white dark:bg-[#0F172A] border border-gray-100 dark:border-white/8 rounded-3xl p-8 shadow-xl dark:shadow-2xl">

            <div class="mb-7">
                <h1 class="text-2xl font-extrabold text-gray-900 dark:text-white">Reset Password</h1>
                <p class="text-sm text-gray-500 dark:text-slate-400 mt-1">Masukkan password baru kamu di bawah ini.</p>
            </div>

            <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-slate-300 mb-1.5">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username"
                        class="w-full px-4 py-3 bg-slate-50 dark:bg-white/5 border border-gray-200 dark:border-white/10 rounded-xl text-sm text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-slate-500 focus:outline-none focus:border-[#EC4899] focus:ring-2 focus:ring-[#EC4899]/20 transition"
                        placeholder="email@kamu.com">
                    @error('email')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-slate-300 mb-1.5">Password Baru</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        class="w-full px-4 py-3 bg-slate-50 dark:bg-white/5 border border-gray-200 dark:border-white/10 rounded-xl text-sm text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-slate-500 focus:outline-none focus:border-[#EC4899] focus:ring-2 focus:ring-[#EC4899]/20 transition"
                        placeholder="Min. 8 karakter">
                    @error('password')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 dark:text-slate-300 mb-1.5">Konfirmasi Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                        class="w-full px-4 py-3 bg-slate-50 dark:bg-white/5 border border-gray-200 dark:border-white/10 rounded-xl text-sm text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-slate-500 focus:outline-none focus:border-[#EC4899] focus:ring-2 focus:ring-[#EC4899]/20 transition"
                        placeholder="Ulangi password baru">
                    @error('password_confirmation')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full py-3 bg-[#EC4899] hover:bg-[#db2777] text-white font-bold rounded-xl transition shadow-md shadow-pink-500/20 text-sm">
                    Reset Password
                </button>
            </form>
        </div>
    </div>

</body>
</html>