<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email – Melodia</title>
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

        <div class="bg-white dark:bg-[#0F172A] border border-gray-100 dark:border-white/8 rounded-3xl p-8 shadow-xl dark:shadow-2xl text-center">

            <div class="w-16 h-16 rounded-2xl bg-[#EC4899]/10 flex items-center justify-center mx-auto mb-5">
                <svg class="w-8 h-8 text-[#EC4899]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                </svg>
            </div>

            <h1 class="text-2xl font-extrabold text-gray-900 dark:text-white mb-2">Cek Email Kamu!</h1>
            <p class="text-sm text-gray-500 dark:text-slate-400 leading-relaxed mb-6">
                Kami sudah mengirim link verifikasi ke email kamu. Klik link tersebut untuk mengaktifkan akun Melodia-mu.
            </p>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-5 p-3 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl text-sm text-green-700 dark:text-green-400">
                    Link verifikasi baru sudah dikirim ke email kamu!
                </div>
            @endif

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit"
                    class="w-full py-3 bg-[#EC4899] hover:bg-[#db2777] text-white font-bold rounded-xl transition shadow-md shadow-pink-500/20 text-sm mb-4">
                    Kirim Ulang Email Verifikasi
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm text-gray-500 dark:text-slate-400 hover:text-[#EC4899] transition font-medium">
                    Logout
                </button>
            </form>
        </div>
    </div>

</body>
</html>