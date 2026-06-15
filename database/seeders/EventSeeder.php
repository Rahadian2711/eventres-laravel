<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Artist;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            // ── KONSER TUNGGAL ──────────────────────────────────────
            [
                'category_id' => 1, 'artist' => 'noah',
                'title'       => 'NOAH Live in Concert',
                'slug'        => 'noah-live-in-concert',
                'organizer'   => 'Musica Studios',
                'description' => 'Saksikan penampilan spektakuler NOAH Live in Concert secara langsung. Nikmati hits terbaik mereka dari Separuh Aku hingga Tak Lagi Sama dalam satu malam yang tak terlupakan.',
                'venue'       => 'Istora Senayan, Jakarta',
                'start'       => '2026-06-25 19:30:00',
                'tickets'     => [
                    ['name' => 'Festival',  'price' => 350000,  'quota' => 5000, 'desc' => 'Akses area festival, standing'],
                    ['name' => 'Prestige',  'price' => 650000,  'quota' => 1500, 'desc' => 'Akses area prestige, kursi bernomor'],
                    ['name' => 'VIP',       'price' => 950000,  'quota' => 500,  'desc' => 'Akses area VIP, meet & greet, goodie bag eksklusif'],
                ],
            ],
            [
                'category_id' => 1, 'artist' => 'sheila-on-7',
                'title'       => 'Sheila On 7 Live in Concert',
                'slug'        => 'sheila-on-7-live-in-concert',
                'organizer'   => 'Trinity Optima',
                'description' => 'Rayakan 28 tahun perjalanan musik Sheila On 7 bersama ribuan Sheila Gank. Dari "Dan" hingga "Sahabat Sejati", semua lagu legendaris akan dibawakan dalam satu malam penuh nostalgia.',
                'venue'       => 'Jexpo Kemayoran, Jakarta',
                'start'       => '2026-07-05 19:30:00',
                'tickets'     => [
                    ['name' => 'Festival',  'price' => 350000,  'quota' => 4000, 'desc' => 'Akses area festival, standing'],
                    ['name' => 'Tribune',   'price' => 550000,  'quota' => 2000, 'desc' => 'Kursi tribune bernomor'],
                    ['name' => 'VIP',       'price' => 850000,  'quota' => 500,  'desc' => 'Kursi VIP dengan fasilitas premium'],
                ],
            ],
            [
                'category_id' => 3, 'artist' => 'tulus',
                'title'       => 'Tulus Tur Manusia 2026',
                'slug'        => 'tulus-tur-manusia-2026',
                'organizer'   => 'Demajors',
                'description' => 'Tulus kembali hadir dalam tur konser terbarunya. Malam ini akan dipenuhi lagu-lagu dari album Manusia yang menyentuh hati, dibawakan dengan aransemen orkestra yang memukau.',
                'venue'       => 'JCC Senayan, Jakarta',
                'start'       => '2026-07-30 19:30:00',
                'tickets'     => [
                    ['name' => 'Festival',  'price' => 350000,  'quota' => 4000, 'desc' => 'Akses area festival, standing'],
                    ['name' => 'Prestige',  'price' => 650000,  'quota' => 1000, 'desc' => 'Akses area prestige, kursi bernomor'],
                    ['name' => 'VIP',       'price' => 950000,  'quota' => 300,  'desc' => 'Akses area VIP, meet & greet, goodie bag eksklusif'],
                ],
            ],
            [
                'category_id' => 3, 'artist' => 'dewa-19',
                'title'       => 'Dewa 19 30th Anniversary Tour',
                'slug'        => 'dewa-19-30th-anniversary-tour',
                'organizer'   => 'Big Daddy Entertainment',
                'description' => 'Merayakan 30 tahun perjalanan musik Dewa 19 yang penuh legenda. Saksikan Ahmad Dhani dan kawan-kawan membawakan semua lagu ikonik dari Kangen hingga Laskar Cinta.',
                'venue'       => 'ICE BSD City',
                'start'       => '2026-07-16 19:00:00',
                'tickets'     => [
                    ['name' => 'Festival',  'price' => 400000,  'quota' => 6000, 'desc' => 'Akses area festival, standing'],
                    ['name' => 'Tribune',   'price' => 650000,  'quota' => 3000, 'desc' => 'Kursi tribune bernomor'],
                    ['name' => 'VIP',       'price' => 1200000, 'quota' => 500,  'desc' => 'Kursi VIP premium dengan fasilitas eksklusif'],
                ],
            ],
            [
                'category_id' => 1, 'artist' => 'pamungkas',
                'title'       => 'Pamungkas Live in Jakarta',
                'slug'        => 'pamungkas-live-in-jakarta',
                'organizer'   => 'Berlian Entertainment',
                'description' => 'Pamungkas hadir membawakan lagu-lagu terbaiknya dalam konser solo perdana di Jakarta. Nikmati atmosfer intim dan personal yang akan membawa kamu larut dalam musik.',
                'venue'       => 'Tennis Indoor Senayan',
                'start'       => '2026-06-28 20:00:00',
                'tickets'     => [
                    ['name' => 'Festival',  'price' => 350000,  'quota' => 3000, 'desc' => 'Akses area festival, standing'],
                    ['name' => 'VIP',       'price' => 750000,  'quota' => 500,  'desc' => 'Akses area VIP dengan fasilitas premium'],
                ],
            ],
            [
                'category_id' => 1, 'artist' => 'hindia',
                'title'       => 'Hindia Live in Concert',
                'slug'        => 'hindia-live-in-concert',
                'organizer'   => 'Inspiro',
                'description' => 'Hindia hadir dengan konser solo yang akan membawa kamu menyelami dunia musik indie yang kaya emosi. Lagu-lagu dari Sebuah Taman di Bawah Langit dan Evaluasi akan dibawakan secara live.',
                'venue'       => 'Jexpo Kemayoran, Jakarta',
                'start'       => '2026-07-25 20:00:00',
                'tickets'     => [
                    ['name' => 'Regular',   'price' => 400000,  'quota' => 2500, 'desc' => 'Akses area regular, standing'],
                    ['name' => 'VIP',       'price' => 800000,  'quota' => 400,  'desc' => 'Akses area VIP dengan fasilitas premium'],
                ],
            ],
            [
                'category_id' => 1, 'artist' => 'juicy-luicy',
                'title'       => 'Juicy Luicy Live in Concert',
                'slug'        => 'juicy-luicy-live-in-concert',
                'organizer'   => 'Mola TV',
                'description' => 'Juicy Luicy hadir membawakan semua lagu galau favorit kamu. Dari Lantas hingga Tampar, rasakan setiap emosi dalam satu malam yang penuh perasaan.',
                'venue'       => 'Istora Senayan',
                'start'       => '2026-08-15 19:30:00',
                'tickets'     => [
                    ['name' => 'Festival',  'price' => 350000,  'quota' => 4000, 'desc' => 'Akses area festival, standing'],
                    ['name' => 'VIP',       'price' => 700000,  'quota' => 500,  'desc' => 'Kursi VIP dengan fasilitas premium'],
                ],
            ],
            [
                'category_id' => 3, 'artist' => 'nadin-amizah',
                'title'       => 'Nadin Amizah Tour 2026',
                'slug'        => 'nadin-amizah-tour-2026',
                'organizer'   => 'Demajors',
                'description' => 'Nadin Amizah membawa tur solo pertamanya ke Jakarta. Saksikan penampilan yang emosional dan intim dari salah satu penyanyi paling berbakat Indonesia.',
                'venue'       => 'The Kasablanka',
                'start'       => '2026-08-20 20:00:00',
                'tickets'     => [
                    ['name' => 'Regular',   'price' => 300000,  'quota' => 2000, 'desc' => 'Akses area regular'],
                    ['name' => 'VIP',       'price' => 650000,  'quota' => 300,  'desc' => 'Akses VIP dengan meet & greet'],
                ],
            ],
            [
                'category_id' => 1, 'artist' => 'yura-yunita',
                'title'       => 'Yura Yunita Live in Concert',
                'slug'        => 'yura-yunita-live-in-concert',
                'organizer'   => 'Sony Music',
                'description' => 'Yura Yunita hadir dengan penampilan panggung yang spektakuler. Nikmati lagu-lagu hits dari Cinta dan Rahasia hingga Intuisi dalam satu malam penuh kegembiraan.',
                'venue'       => 'Tennis Indoor Senayan',
                'start'       => '2026-08-28 19:30:00',
                'tickets'     => [
                    ['name' => 'Festival',  'price' => 300000,  'quota' => 3000, 'desc' => 'Akses area festival, standing'],
                    ['name' => 'VIP',       'price' => 650000,  'quota' => 400,  'desc' => 'Kursi VIP premium'],
                ],
            ],
            [
                'category_id' => 1, 'artist' => 'sal-priadi',
                'title'       => 'Sal Priadi Live in Concert',
                'slug'        => 'sal-priadi-live-in-concert',
                'organizer'   => 'Neonotes',
                'description' => 'Sal Priadi hadir dengan konser solo yang akan membawa kamu merasakan kehangatan dan keindahan musiknya. Dari Amin Paling Serius hingga 2 Celsius, semua akan dibawakan secara live.',
                'venue'       => 'JCC Senayan',
                'start'       => '2026-09-05 20:00:00',
                'tickets'     => [
                    ['name' => 'Regular',   'price' => 350000,  'quota' => 2500, 'desc' => 'Akses area regular'],
                    ['name' => 'VIP',       'price' => 700000,  'quota' => 350,  'desc' => 'Akses VIP dengan fasilitas eksklusif'],
                ],
            ],
            [
                'category_id' => 1, 'artist' => 'maliq-dessentials',
                'title'       => "Maliq & D'Essentials Live",
                'slug'        => 'maliq-dessentials-live',
                'organizer'   => 'Trinity Optima',
                'description' => "Maliq & D'Essentials hadir dengan konser yang penuh harmoni. Nikmati R&B soul terbaik Indonesia dalam satu malam yang elegan dan penuh groove.",
                'venue'       => 'GBK Basketball Hall',
                'start'       => '2026-09-20 19:30:00',
                'tickets'     => [
                    ['name' => 'Regular',   'price' => 400000,  'quota' => 3000, 'desc' => 'Akses area regular'],
                    ['name' => 'VIP',       'price' => 800000,  'quota' => 400,  'desc' => 'Kursi VIP premium'],
                ],
            ],
            // ── FESTIVAL ────────────────────────────────────────────
            [
                'category_id' => 2, 'artist' => null,
                'title'       => 'We The Fest 2026',
                'slug'        => 'we-the-fest-2026',
                'organizer'   => 'ismaya Live',
                'description' => 'We The Fest kembali hadir sebagai festival musik terbesar di Indonesia. Menampilkan lineup artis terbaik lokal dan internasional selama 3 hari penuh musik, seni, dan kuliner.',
                'venue'       => 'GBK Sports Complex, Jakarta',
                'start'       => '2026-08-23 14:00:00',
                'tickets'     => [
                    ['name' => '1 Day Pass',  'price' => 495000,  'quota' => 8000, 'desc' => 'Akses 1 hari festival'],
                    ['name' => '3 Day Pass',  'price' => 1200000, 'quota' => 3000, 'desc' => 'Akses 3 hari festival, hemat lebih banyak'],
                    ['name' => 'VIP 3 Day',   'price' => 2500000, 'quota' => 500,  'desc' => 'Akses VIP 3 hari, lounge eksklusif, free F&B'],
                ],
                'extra_artists' => ['tulus', 'hindia', 'pamungkas'],
            ],
            [
                'category_id' => 2, 'artist' => null,
                'title'       => 'Java Jazz Festival 2026',
                'slug'        => 'java-jazz-festival-2026',
                'organizer'   => 'Java Festival Production',
                'description' => 'Java Jazz Festival hadir kembali membawa pengalaman jazz terbaik dari musisi lokal dan internasional. Festival jazz terbesar di Asia Tenggara yang telah berlangsung selama lebih dari 20 tahun.',
                'venue'       => 'JIExpo Kemayoran, Jakarta',
                'start'       => '2026-10-02 15:00:00',
                'tickets'     => [
                    ['name' => '1 Day Pass',  'price' => 550000,  'quota' => 10000, 'desc' => 'Akses 1 hari festival'],
                    ['name' => '3 Day Pass',  'price' => 1350000, 'quota' => 5000,  'desc' => 'Akses 3 hari festival'],
                    ['name' => 'VIP',         'price' => 3000000, 'quota' => 500,   'desc' => 'Akses VIP all-in dengan hospitality eksklusif'],
                ],
                'extra_artists' => ['maliq-dessentials', 'sal-priadi'],
            ],
            [
                'category_id' => 2, 'artist' => null,
                'title'       => 'Synchronize Festival 2026',
                'slug'        => 'synchronize-festival-2026',
                'organizer'   => 'Rajawali Indonesia Communication',
                'description' => 'Synchronize Festival adalah festival musik indie terbesar di Indonesia yang menampilkan ratusan artis dari berbagai genre. Tiga hari penuh musik, komunitas, dan keberagaman.',
                'venue'       => 'Gambir Expo, Jakarta',
                'start'       => '2026-10-16 13:00:00',
                'tickets'     => [
                    ['name' => '1 Day Pass',  'price' => 350000,  'quota' => 8000, 'desc' => 'Akses 1 hari festival'],
                    ['name' => '3 Day Pass',  'price' => 850000,  'quota' => 3000, 'desc' => 'Akses 3 hari festival'],
                ],
                'extra_artists' => ['hindia', 'nadin-amizah', 'pamungkas'],
            ],
            // ── EVENT BARU (artis baru) ──────────────────────────────
            [
                'category_id' => 1, 'artist' => 'raisa',
                'title'       => 'Raisa Live in Concert 2026',
                'slug'        => 'raisa-live-in-concert-2026',
                'organizer'   => 'Trinity Optima',
                'description' => 'Raisa hadir kembali dengan konser solo yang memukau. Dari "Serba Salah" hingga "Jatuh Hati", semua lagu terbaik Raisa akan dibawakan dalam satu malam yang penuh romansa dan keindahan.',
                'venue'       => 'Istora Senayan, Jakarta',
                'start'       => '2026-07-12 19:30:00',
                'tickets'     => [
                    ['name' => 'Festival',  'price' => 375000,  'quota' => 4000, 'desc' => 'Akses area festival, standing'],
                    ['name' => 'Prestige',  'price' => 650000,  'quota' => 1500, 'desc' => 'Kursi prestige bernomor'],
                    ['name' => 'VIP',       'price' => 950000,  'quota' => 400,  'desc' => 'Kursi VIP, meet & greet, goodie bag eksklusif'],
                ],
            ],
            [
                'category_id' => 1, 'artist' => 'isyana-sarasvati',
                'title'       => 'Isyana Sarasvati — Reborn Tour',
                'slug'        => 'isyana-sarasvati-reborn-tour',
                'organizer'   => 'Hits Records',
                'description' => 'Isyana Sarasvati hadir dengan konsep pertunjukan yang belum pernah ada sebelumnya. Menggabungkan musik pop modern dengan sentuhan orkestra klasik, malam ini akan menjadi pengalaman yang benar-benar luar biasa.',
                'venue'       => 'JCC Senayan, Jakarta',
                'start'       => '2026-08-02 19:00:00',
                'tickets'     => [
                    ['name' => 'Regular',   'price' => 350000,  'quota' => 3000, 'desc' => 'Akses area regular, standing'],
                    ['name' => 'VIP',       'price' => 800000,  'quota' => 500,  'desc' => 'Kursi VIP, akses soundcheck, goodie bag'],
                ],
            ],
            [
                'category_id' => 1, 'artist' => 'fiersa-besari',
                'title'       => 'Fiersa Besari — Konser Semesta',
                'slug'        => 'fiersa-besari-konser-semesta',
                'organizer'   => 'Demajors',
                'description' => 'Fiersa Besari mengajak kamu menyelami semesta musiknya dalam satu malam yang penuh emosi. Lagu-lagu dari Gaun Merah hingga Waktu yang Salah akan dibawakan secara live dengan aransemen yang lebih intim dari sebelumnya.',
                'venue'       => 'Tennis Indoor Senayan, Jakarta',
                'start'       => '2026-09-13 20:00:00',
                'tickets'     => [
                    ['name' => 'Regular',   'price' => 300000,  'quota' => 3000, 'desc' => 'Akses area regular, standing'],
                    ['name' => 'VIP',       'price' => 650000,  'quota' => 400,  'desc' => 'Kursi VIP premium, goodie bag'],
                ],
            ],
            [
                'category_id' => 1, 'artist' => 'ardhito-pramono',
                'title'       => 'Ardhito Pramono Live Concert',
                'slug'        => 'ardhito-pramono-live-concert',
                'organizer'   => 'Inspiro',
                'description' => 'Ardhito Pramono hadir dalam konser solo pertamanya yang dinantikan banyak penggemar. Nikmati jazz pop yang smooth dan elegan dalam suasana konser yang intim dan penuh nuansa.',
                'venue'       => 'The Kasablanka, Jakarta',
                'start'       => '2026-09-27 20:00:00',
                'tickets'     => [
                    ['name' => 'Regular',   'price' => 325000,  'quota' => 2000, 'desc' => 'Akses area regular'],
                    ['name' => 'VIP',       'price' => 700000,  'quota' => 300,  'desc' => 'Kursi VIP dengan meet & greet'],
                ],
            ],
            [
                'category_id' => 1, 'artist' => 'barasuara',
                'title'       => 'Barasuara — Taifun Tour',
                'slug'        => 'barasuara-taifun-tour',
                'organizer'   => 'Berlian Entertainment',
                'description' => 'Barasuara kembali menggebrak panggung dengan Taifun Tour. Energi penuh dari lagu-lagu seperti Taifun dan Mengunci Dunia akan membuat malam ini menjadi pengalaman rock yang tidak terlupakan.',
                'venue'       => 'Jexpo Kemayoran, Jakarta',
                'start'       => '2026-10-10 19:30:00',
                'tickets'     => [
                    ['name' => 'Festival',  'price' => 350000,  'quota' => 4000, 'desc' => 'Akses area festival, standing'],
                    ['name' => 'VIP',       'price' => 750000,  'quota' => 400,  'desc' => 'Kursi VIP, goodie bag eksklusif'],
                ],
            ],
            [
                'category_id' => 2, 'artist' => null,
                'title'       => 'Soundrenaline 2026',
                'slug'        => 'soundrenaline-2026',
                'organizer'   => 'Mahaka Entertainment',
                'description' => 'Soundrenaline kembali hadir sebagai festival rock terbesar di Indonesia. Dua hari penuh penampilan band-band terbaik tanah air yang akan membakar semangat dan adrenalin kamu.',
                'venue'       => 'Bali Beach GWK, Bali',
                'start'       => '2026-11-14 13:00:00',
                'tickets'     => [
                    ['name' => '1 Day Pass',  'price' => 450000,  'quota' => 10000, 'desc' => 'Akses 1 hari festival'],
                    ['name' => '2 Day Pass',  'price' => 800000,  'quota' => 5000,  'desc' => 'Akses 2 hari festival, hemat lebih banyak'],
                    ['name' => 'VIP 2 Day',   'price' => 2000000, 'quota' => 500,   'desc' => 'Akses VIP 2 hari, lounge eksklusif, free F&B'],
                ],
                'extra_artists' => ['barasuara', 'noah', 'sheila-on-7'],
            ],
            [
                'category_id' => 2, 'artist' => null,
                'title'       => 'Joyland Festival 2026',
                'slug'        => 'joyland-festival-2026',
                'organizer'   => 'Joyland Festival',
                'description' => 'Joyland Festival hadir dengan lineup artis lokal dan internasional yang memukau. Festival musik multi-genre ini menawarkan pengalaman unik yang memadukan musik, seni, dan kuliner dalam satu tempat.',
                'venue'       => 'Istora Senayan, Jakarta',
                'start'       => '2026-12-05 14:00:00',
                'tickets'     => [
                    ['name' => '1 Day Pass',  'price' => 525000,  'quota' => 8000, 'desc' => 'Akses 1 hari festival'],
                    ['name' => '3 Day Pass',  'price' => 1300000, 'quota' => 3000, 'desc' => 'Akses 3 hari festival'],
                    ['name' => 'VIP 3 Day',   'price' => 2800000, 'quota' => 400,  'desc' => 'Akses VIP 3 hari, hospitality premium'],
                ],
                'extra_artists' => ['raisa', 'isyana-sarasvati', 'ardhito-pramono', 'mocca'],
            ],
            [
                'category_id' => 3, 'artist' => 'raisa',
                'title'       => 'Raisa — Diary Tour 2026',
                'slug'        => 'raisa-diary-tour-2026',
                'organizer'   => 'Trinity Optima',
                'description' => 'Raisa membawa Diary Tour ke berbagai kota di Indonesia. Sebuah perjalanan musikal yang menceritakan kisah cinta dan kehidupan melalui lagu-lagu terbaik Raisa yang telah menemani hari-hari jutaan penggemarnya.',
                'venue'       => 'Sabuga, Bandung',
                'start'       => '2026-12-19 19:30:00',
                'tickets'     => [
                    ['name' => 'Regular',   'price' => 350000,  'quota' => 3000, 'desc' => 'Akses area regular'],
                    ['name' => 'VIP',       'price' => 750000,  'quota' => 400,  'desc' => 'Kursi VIP premium, goodie bag'],
                ],
            ],
        ];
            [
                'category_id' => 3, 'artist' => 'noah',
                'title'       => 'NOAH The Journey Tour 2026',
                'slug'        => 'noah-the-journey-tour-2026',
                'organizer'   => 'Musica Studios',
                'description' => 'NOAH kembali hadir dalam tur keliling kota terbesar mereka. Saksikan penampilan NOAH di kota kamu dan rasakan energi luar biasa dari salah satu band rock terbaik Indonesia.',
                'venue'       => 'Mata Elang International Stadium, Tangerang',
                'start'       => '2026-11-07 19:00:00',
                'tickets'     => [
                    ['name' => 'Festival',  'price' => 375000,  'quota' => 6000, 'desc' => 'Akses area festival, standing'],
                    ['name' => 'Prestige',  'price' => 675000,  'quota' => 2000, 'desc' => 'Kursi prestige bernomor'],
                    ['name' => 'VIP',       'price' => 1000000, 'quota' => 500,  'desc' => 'Kursi VIP dengan meet & greet'],
                ],
            
            [
                'category_id' => 3, 'artist' => 'yura-yunita',
                'title'       => 'Yura Yunita Intuisi Tour',
                'slug'        => 'yura-yunita-intuisi-tour',
                'organizer'   => 'Sony Music',
                'description' => 'Yura Yunita membawa Intuisi Tour ke berbagai kota di Indonesia. Sebuah perjalanan musikal yang penuh warna dan semangat kesetaraan.',
                'venue'       => 'Balai Sarbini, Jakarta',
                'start'       => '2026-11-21 19:30:00',
                'tickets'     => [
                    ['name' => 'Regular',   'price' => 325000,  'quota' => 2500, 'desc' => 'Akses area regular'],
                    ['name' => 'VIP',       'price' => 700000,  'quota' => 350,  'desc' => 'Kursi VIP premium'],
                ],
            ],
        ];

        foreach ($events as $data) {
            // Skip jika sudah ada
            if (Event::where('slug', $data['slug'])->exists()) {
                $event = Event::where('slug', $data['slug'])->first();

                // Update description
                $event->update(['description' => $data['description']]);

                // Buat schedule jika belum ada
                if ($event->schedules()->count() === 0) {
                    \App\Models\EventSchedule::create([
                        'event_id'   => $event->id,
                        'title'      => $data['title'],
                        'start_time' => $data['start'],
                        'end_time'   => Carbon::parse($data['start'])->addHours(3),
                    ]);
                }

                // Buat tiket jika belum ada
                if ($event->ticketCategories()->count() === 0) {
                    foreach ($data['tickets'] as $ticket) {
                        \App\Models\TicketCategory::create([
                            'event_id' => $event->id,
                            'name'     => $ticket['name'],
                            'price'    => $ticket['price'],
                            'quota'    => $ticket['quota'],
                            'benefits' => $ticket['desc'],
                        ]);
                    }
                }

                // Hubungkan artis jika belum terhubung
                if ($data['artist']) {
                    $artist = Artist::where('slug', $data['artist'])->first();
                    if ($artist) {
                        $event->artists()->syncWithoutDetaching([$artist->id]);
                    }
                }
                foreach ($data['extra_artists'] ?? [] as $slug) {
                    $artist = Artist::where('slug', $slug)->first();
                    if ($artist) {
                        $event->artists()->syncWithoutDetaching([$artist->id]);
                    }
                }

                continue;
            }

            $event = Event::create([
                'category_id' => $data['category_id'],
                'title'       => $data['title'],
                'slug'        => $data['slug'],
                'organizer'   => $data['organizer'],
                'description' => $data['description'],
                'venue'       => $data['venue'],
                'status'      => 'published',
            ]);

            // Schedule
            \App\Models\EventSchedule::create([
                'event_id'   => $event->id,
                'title'      => $data['title'],
                'start_time' => $data['start'],
                'end_time'   => Carbon::parse($data['start'])->addHours(3),
            ]);

            // Ticket categories
            foreach ($data['tickets'] as $ticket) {
                \App\Models\TicketCategory::create([
                    'event_id' => $event->id,
                    'name'     => $ticket['name'],
                    'price'    => $ticket['price'],
                    'quota'    => $ticket['quota'],
                    'benefits' => $ticket['desc'],
                ]);
            }

            // Hubungkan artis utama
            if ($data['artist']) {
                $artist = Artist::where('slug', $data['artist'])->first();
                if ($artist) {
                    $event->artists()->syncWithoutDetaching([$artist->id]);
                }
            }

            // Artis tambahan (festival)
            foreach ($data['extra_artists'] ?? [] as $slug) {
                $artist = Artist::where('slug', $slug)->first();
                if ($artist) {
                    $event->artists()->syncWithoutDetaching([$artist->id]);
                }
            }
        }

        $this->command->info('✅ Event seeder selesai! Total: ' . Event::count() . ' event.');
    }
}