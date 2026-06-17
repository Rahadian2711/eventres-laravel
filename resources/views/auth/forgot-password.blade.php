<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password – Melodia</title>
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

            <div class="mb-6">
                <h1 class="text-2xl font-extrabold text-gray-900 dark:text-white">Lupa Password?</h1>
                <p class="text-sm text-gray-500 dark:text-slate-400 mt-1">Masukkan emailmu dan kami akan kirim link untuk reset password.</p>
            </div>

            @if (session('status'))
                <div class="mb-4 p-3 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl text-sm text-green-700 dark:text-green-400">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-slate-300 mb-1.5">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-3 bg-slate-50 dark:bg-white/5 border border-gray-200 dark:border-white/10 rounded-xl text-sm text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-slate-500 focus:outline-none focus:border-[#EC4899] focus:ring-2 focus:ring-[#EC4899]/20 transition"
                        placeholder="email@kamu.com">
                    @error('email')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full py-3 bg-[#EC4899] hover:bg-[#db2777] text-white font-bold rounded-xl transition shadow-md shadow-pink-500/20 text-sm">
                    Kirim Link Reset Password
                </button>
            </form>

            <p class="text-center text-sm text-gray-500 dark:text-slate-400 mt-6">
                Ingat password?
                <a href="{{ route('login') }}" class="text-[#EC4899] font-semibold hover:text-pink-400 transition">Kembali login</a>
            </p>
        </div>
    </div>

</body>
</html>