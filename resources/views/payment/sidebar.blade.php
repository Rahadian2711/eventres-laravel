{{-- resources/views/payment/sidebar.blade.php --}}
{{-- Variabel yang dibutuhkan (dikirim dari PaymentController):          --}}
{{--   $event       → App\Models\Event                                   --}}
{{--   $ticket      → App\Models\TicketCategory                          --}}
{{--   $quantity    → int                                                 --}}
{{--   $subtotal    → int|float                                           --}}
{{--   $serviceFee  → int|float                                           --}}
{{--   $total       → int|float                                           --}}

<div class="lg:w-1/3 flex-shrink-0">
    <div class="sticky top-24 space-y-4">

        {{-- Event Card --}}
        {{-- FIX #18: shadow-sm di light mode agar card tidak melebur ke bg slate-50 --}}
        <div class="rounded-3xl border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0F172A] overflow-hidden shadow-sm dark:shadow-none"
            style="box-shadow: 0 0 30px rgba(236,72,153,0.06);">

            {{-- Banner --}}
            {{-- FIX #19: gradient overlay from-[#0F172A] tidak adaptif → ganti ke from-black/60 dark:from-[#0F172A] --}}
            <div class="relative h-36 bg-gradient-to-br from-purple-900 via-slate-900 to-[#0F172A] overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 dark:from-[#0F172A] via-transparent to-transparent z-10"></div>
                @if($event->banner)
                    <img src="{{ asset('storage/' . $event->banner) }}"
                        alt="Banner {{ $event->title }}"
                        class="w-full h-full object-cover opacity-80">
                @elseif($event->thumbnail)
                    <img src="{{ asset('storage/' . $event->thumbnail) }}"
                        alt="Banner {{ $event->title }}"
                        class="w-full h-full object-cover opacity-80">
                @else
                    {{-- Fallback --}}
                    <div class="w-full h-full flex items-center justify-center">
                        {{-- FIX #20: text-slate-600 tidak terbaca di atas dark gradient → text-slate-400 --}}
                        <span class="text-slate-400 text-xs relative z-10">No Image</span>
                    </div>
                @endif
            </div>

            {{-- Event Info --}}
            <div class="p-5 pt-4">
                {{-- FIX #21: h3 hanya text-white tanpa light mode variant → tambah dark: prefix --}}
                <h3 class="text-lg font-bold text-slate-900 dark:text-white leading-snug">
                    {{ $event->title }}
                </h3>

                <div class="mt-3 space-y-2">
                    {{-- FIX #22: text-slate-400 saja di light mode terlalu pucat → text-slate-500 dark:text-slate-400 --}}
                    <div class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400">
                        <svg class="w-4 h-4 text-[#EC4899] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span>
                            {{ \Carbon\Carbon::parse($event->schedules->first()?->start_time ?? now())->format('d F Y') }}
                            ·
                            {{ \Carbon\Carbon::parse($event->schedules->first()?->start_time ?? now())->format('H:i') }} WIB
                        </span>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400">
                        <svg class="w-4 h-4 text-[#EC4899] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>{{ $event->venue }}</span>
                    </div>
                </div>

                {{-- Divider --}}
                {{-- FIX #23: border-white/8 tidak kelihatan di light mode → adaptif --}}
                <div class="border-t border-slate-200 dark:border-white/8 my-4"></div>

                {{-- Detail Pesanan --}}
                <div>
                    {{-- FIX #24: text-white saja tanpa light mode fallback --}}
                    <p class="text-sm font-semibold text-slate-900 dark:text-white mb-3">Detail Pesanan</p>

                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-8 h-8 rounded-xl bg-[#EC4899]/15 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-[#EC4899]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            {{-- FIX #25: text-white tanpa dark: prefix → slate-900 dark:text-white --}}
                            <p class="text-sm font-semibold text-slate-900 dark:text-white">{{ $ticket->name }}</p>
                            {{-- FIX #26: text-slate-400 saja terlalu pucat di light mode --}}
                            <p class="text-xs text-slate-500 dark:text-slate-400">{{ $quantity }} Tiket</p>
                        </div>
                        {{-- FIX #27: text-white tanpa dark: prefix --}}
                        <p class="text-sm font-semibold text-slate-900 dark:text-white">Rp{{ number_format($ticket->price, 0, ',', '.') }}</p>
                    </div>

                    <div class="space-y-2 text-sm">
                        {{-- FIX #28: text-slate-400 saja di light terlalu pucat --}}
                        <div class="flex justify-between text-slate-500 dark:text-slate-400">
                            <span>Subtotal</span>
                            {{-- FIX #29: text-white tanpa dark: prefix --}}
                            <span class="text-slate-900 dark:text-white font-medium">Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-slate-500 dark:text-slate-400">
                            <div class="flex items-center gap-1">
                                <span>Biaya Layanan</span>
                                <svg class="w-3.5 h-3.5 text-slate-400 dark:text-slate-500 cursor-help" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 16v-4m0-4h.01"/>
                                </svg>
                            </div>
                            {{-- FIX #30: text-white tanpa dark: prefix --}}
                            <span class="text-slate-900 dark:text-white font-medium">Rp{{ number_format($serviceFee, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    {{-- FIX #31: border-white/8 tidak kelihatan di light mode --}}
                    <div class="border-t border-slate-200 dark:border-white/8 mt-4 pt-4 flex justify-between items-center">
                        {{-- FIX #32: text-white tanpa dark: prefix --}}
                        <span class="font-semibold text-slate-900 dark:text-white text-sm">Total Pembayaran</span>
                        <span class="text-xl font-bold text-[#EC4899]">Rp{{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                </div>

                {{-- S&K note --}}
                {{-- FIX #33: bg-white/4 tidak kelihatan di light mode; border-white/8 juga --}}
                <div class="mt-4 flex items-start gap-2.5 p-3 rounded-xl bg-slate-100 dark:bg-white/5 border border-slate-200 dark:border-white/10">
                    <svg class="w-4 h-4 text-[#EC4899] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    {{-- FIX #34: text-slate-400 di light mode sulit dibaca --}}
                    <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed">
                        Dengan melanjutkan, Anda menyetujui
                        <a href="#" class="text-[#EC4899] hover:underline font-medium focus:outline-none focus:underline">Syarat &amp; Ketentuan</a> yang berlaku.
                    </p>
                </div>

            </div>
        </div>

        {{-- Help Card --}}
        {{-- FIX #35: bg-[#0F172A] hardcoded tanpa light mode variant; border hanya white/10 --}}
        <div class="rounded-2xl border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0F172A] shadow-sm dark:shadow-none p-5">
            <div class="flex items-start gap-3">
                <div class="w-9 h-9 rounded-xl bg-purple-500/15 flex items-center justify-center shrink-0 mt-0.5">
                    {{-- FIX #36: purple-400 terlalu terang di light mode --}}
                    <svg class="w-4 h-4 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <div>
                    {{-- FIX #37: text-white tanpa dark: prefix --}}
                    <p class="text-sm font-semibold text-slate-900 dark:text-white">Butuh bantuan?</p>
                    {{-- FIX #38: text-slate-400 di light mode sulit dibaca --}}
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 leading-relaxed">Hubungi Customer Support 24/7 melalui live chat atau email</p>
                    <a href="mailto:support@melodia.id" class="text-xs text-[#EC4899] font-medium hover:underline mt-1 block focus:outline-none focus:underline">support@melodia.id</a>
                </div>
            </div>
        </div>

        {{-- Cancel Button --}}
        {{-- FIX #39: hover:bg-red-500/8 di light mode hampir tidak kelihatan → tambah hover:bg-red-50 --}}
        <button onclick="confirmCancel()"
            class="w-full flex items-center justify-center gap-2 py-3 rounded-2xl border border-red-500/30 dark:border-red-500/30 text-red-500 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-500/8 hover:border-red-500/60 dark:hover:border-red-500/50 hover:text-red-600 dark:hover:text-red-400 transition-all text-sm font-medium focus:outline-none focus:ring-2 focus:ring-red-400/50">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <circle cx="12" cy="12" r="10"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 9l-6 6M9 9l6 6"/>
            </svg>
            Batalkan Pesanan
        </button>

    </div>
</div>

<script>
function confirmCancel() {
    if (confirm('Yakin ingin membatalkan pesanan? Tiket akan dilepas kembali.')) {
        window.location.href = '{{ route("home") }}';
    }
}
</script>
