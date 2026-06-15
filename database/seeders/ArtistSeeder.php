<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artist;
use App\Models\ArtistSong;
use App\Models\Event;

class ArtistSeeder extends Seeder
{
    public function run(): void
    {
        $artists = [
            // ── ARTIS LAMA ──────────────────────────────────────────
            [
                'name'  => 'NOAH',
                'slug'  => 'noah',
                'genre' => 'Rock',
                'bio'   => 'NOAH adalah band rock asal Indonesia yang terbentuk sejak 1996 dengan nama Peterpan sebelum berganti nama menjadi NOAH pada 2012. Dikenal dengan vokal khas Ariel Noah dan musik yang emosional, NOAH telah merilis berbagai album ikonik dan menjadi salah satu band terbesar di Indonesia.',
                'songs' => [
                    ['title' => 'Separuh Aku',                'album' => 'Seperti Seharusnya', 'year' => '2012'],
                    ['title' => 'Hidup Untukmu Mati Tanpamu', 'album' => 'Seperti Seharusnya', 'year' => '2012'],
                    ['title' => 'Tak Lagi Sama',              'album' => 'Second Chance',      'year' => '2015'],
                    ['title' => 'Menunggumu',                 'album' => 'Seperti Seharusnya', 'year' => '2012'],
                    ['title' => 'Langit Tak Mendengar',       'album' => 'Sings',              'year' => '2019'],
                ],
            ],
            [
                'name'  => 'Sheila On 7',
                'slug'  => 'sheila-on-7',
                'genre' => 'Pop Rock',
                'bio'   => 'Sheila On 7 adalah band pop rock asal Yogyakarta yang berdiri sejak 1996. Dengan lirik yang puitis dan melodi yang catchy, mereka berhasil meraih hati jutaan penggemar di seluruh Indonesia. Album perdana mereka terjual lebih dari 1,5 juta kopi.',
                'songs' => [
                    ['title' => 'Dan',           'album' => 'Sheila On 7',                   'year' => '1999'],
                    ['title' => 'Kita',          'album' => 'Sheila On 7',                   'year' => '1999'],
                    ['title' => 'Itu Aku',       'album' => 'Kisah Klasik untuk Masa Depan', 'year' => '2000'],
                    ['title' => 'Bait Pertama',  'album' => '07 Des',                        'year' => '2002'],
                    ['title' => 'Sahabat Sejati','album' => 'Sheila On 7',                   'year' => '1999'],
                ],
            ],
            [
                'name'  => 'Tulus',
                'slug'  => 'tulus',
                'genre' => 'Pop',
                'bio'   => 'Muhammad Tulus adalah penyanyi dan penulis lagu asal Bukittinggi, Sumatera Barat. Gaya musiknya yang unik memadukan jazz, soul, dan pop dengan lirik yang penuh makna membuat Tulus menjadi salah satu musisi paling berpengaruh di Indonesia saat ini.',
                'songs' => [
                    ['title' => 'Gajah',              'album' => 'Gajah',    'year' => '2014'],
                    ['title' => 'Sepatu',             'album' => 'Tulus',    'year' => '2011'],
                    ['title' => 'Manusia Kuat',       'album' => 'Monokrom', 'year' => '2016'],
                    ['title' => 'Monokrom',           'album' => 'Monokrom', 'year' => '2016'],
                    ['title' => 'Hati-Hati di Jalan', 'album' => 'Manusia',  'year' => '2022'],
                ],
            ],
            [
                'name'  => 'Nadin Amizah',
                'slug'  => 'nadin-amizah',
                'genre' => 'Indie Folk',
                'bio'   => 'Nadin Amizah adalah penyanyi dan penulis lagu muda berbakat asal Indonesia. Dengan suara yang khas dan lirik yang puitis dan personal, Nadin berhasil mencuri perhatian industri musik Indonesia dan meraih berbagai penghargaan bergengsi di usia yang sangat muda.',
                'songs' => [
                    ['title' => 'Rumpang',        'album' => 'Selamat Ulang Tahun', 'year' => '2019'],
                    ['title' => 'Bertaut',        'album' => 'Bertaut',             'year' => '2020'],
                    ['title' => 'Sorai',          'album' => 'Sorai',               'year' => '2021'],
                    ['title' => 'Salahkah',       'album' => 'Selamat Ulang Tahun', 'year' => '2019'],
                    ['title' => 'Seperti Tulang', 'album' => 'Selamat Ulang Tahun', 'year' => '2019'],
                ],
            ],
            [
                'name'  => 'Dewa 19',
                'slug'  => 'dewa-19',
                'genre' => 'Rock',
                'bio'   => 'Dewa 19 adalah legenda musik rock Indonesia yang dibentuk di Surabaya pada tahun 1986. Dipimpin oleh Ahmad Dhani, band ini telah menghasilkan puluhan lagu hits yang melegenda dan tetap dicintai hingga generasi sekarang.',
                'songs' => [
                    ['title' => 'Kangen',               'album' => 'Dewa 19',           'year' => '1992'],
                    ['title' => 'Cinta Adalah Misteri',  'album' => 'Format Masa Depan', 'year' => '1994'],
                    ['title' => 'Separuh Nafas',         'album' => 'Bintang Lima',      'year' => '2000'],
                    ['title' => 'Roman Picisan',         'album' => 'Bintang Lima',      'year' => '2000'],
                    ['title' => 'Laskar Cinta',          'album' => 'Laskar Cinta',      'year' => '2004'],
                ],
            ],
            [
                'name'  => 'Pamungkas',
                'slug'  => 'pamungkas',
                'genre' => 'Indie Pop',
                'bio'   => 'Pamungkas adalah penyanyi, penulis lagu, dan produser musik asal Jakarta. Ia dikenal dengan musiknya yang catchy namun penuh kedalaman emosi. Lagu-lagunya sering viral di media sosial dan berhasil menembus pasar internasional, terutama di Asia Tenggara.',
                'songs' => [
                    ['title' => 'To The Bone',                  'album' => 'Walk The Talk', 'year' => '2019'],
                    ['title' => 'I Love You But Im Letting Go',  'album' => 'Walk The Talk', 'year' => '2019'],
                    ['title' => 'Kenanga',                       'album' => 'Walk The Talk', 'year' => '2019'],
                    ['title' => 'One Only',                      'album' => 'Solipsism',     'year' => '2021'],
                    ['title' => 'Teman Hidup',                   'album' => 'Solipsism',     'year' => '2021'],
                ],
            ],
            [
                'name'  => 'Hindia',
                'slug'  => 'hindia',
                'genre' => 'Indie',
                'bio'   => 'Hindia adalah proyek solo dari Baskara Putra, musisi multitalenta yang juga dikenal sebagai vokalis Stars and Rabbit versi solo. Musik Hindia mengusung tema kesehatan mental, kegelisahan, dan kehidupan sehari-hari dengan aransemen indie pop yang segar.',
                'songs' => [
                    ['title' => 'Secukupnya',                'album' => 'Sebuah Taman di Bawah Langit', 'year' => '2019'],
                    ['title' => 'Belum Tidur',               'album' => 'Sebuah Taman di Bawah Langit', 'year' => '2019'],
                    ['title' => 'Evaluasi',                  'album' => 'Evaluasi',                     'year' => '2020'],
                    ['title' => 'Besok Mungkin Kita Sampai', 'album' => 'Besok Mungkin Kita Sampai',    'year' => '2022'],
                    ['title' => 'Rumah Ke Rumah',            'album' => 'Sebuah Taman di Bawah Langit', 'year' => '2019'],
                ],
            ],
            [
                'name'  => 'Juicy Luicy',
                'slug'  => 'juicy-luicy',
                'genre' => 'Pop',
                'bio'   => 'Juicy Luicy adalah duo musik asal Indonesia yang terdiri dari Aryo dan Randy. Mereka dikenal dengan lagu-lagu pop yang ringan namun penuh emosi, terutama bertema patah hati dan percintaan.',
                'songs' => [
                    ['title' => 'Lantas',             'album' => 'Lantas',             'year' => '2021'],
                    ['title' => 'Tampar',             'album' => 'Tampar',             'year' => '2020'],
                    ['title' => 'Pesan Terakhir',     'album' => 'Pesan Terakhir',     'year' => '2022'],
                    ['title' => 'Terlanjur Mencinta', 'album' => 'Terlanjur Mencinta', 'year' => '2021'],
                    ['title' => 'Kehilangan',         'album' => 'Kehilangan',         'year' => '2023'],
                ],
            ],
            [
                'name'  => 'Sal Priadi',
                'slug'  => 'sal-priadi',
                'genre' => 'Indie',
                'bio'   => 'Sal Priadi adalah penyanyi dan penulis lagu indie asal Indonesia yang dikenal dengan suaranya yang lembut dan lirik yang penuh imajinasi. Musik Sal Priadi memadukan elemen folk, indie pop, dan jazz dengan cara yang unik dan personal.',
                'songs' => [
                    ['title' => 'Amin Paling Serius',     'album' => 'Asmara Antara',          'year' => '2019'],
                    ['title' => 'Ibu Bapak',              'album' => 'Asmara Antara',          'year' => '2019'],
                    ['title' => 'Berdua di Tempat Tidur', 'album' => 'Berdua di Tempat Tidur', 'year' => '2021'],
                    ['title' => '2 Celsius',              'album' => '2 Celsius',              'year' => '2022'],
                    ['title' => 'Gala Buah',              'album' => 'Asmara Antara',          'year' => '2019'],
                ],
            ],
            [
                'name'  => 'Yura Yunita',
                'slug'  => 'yura-yunita',
                'genre' => 'Pop',
                'bio'   => 'Yura Yunita adalah penyanyi pop asal Bandung yang dikenal dengan suaranya yang powerful dan penampilan panggung yang energik. Ia sering berkolaborasi dengan berbagai musisi ternama dan aktif mempromosikan kesetaraan gender melalui musiknya.',
                'songs' => [
                    ['title' => 'Cinta dan Rahasia', 'album' => 'Yura Yunita',     'year' => '2015'],
                    ['title' => 'Satu Rasa Cinta',   'album' => 'Satu Rasa Cinta', 'year' => '2016'],
                    ['title' => 'Bukan Milikku',     'album' => 'Merakit',         'year' => '2018'],
                    ['title' => 'Intuisi',           'album' => 'Intuisi',         'year' => '2020'],
                    ['title' => 'Katakan',           'album' => 'Katakan',         'year' => '2021'],
                ],
            ],
            [
                'name'  => "Maliq & D'Essentials",
                'slug'  => 'maliq-dessentials',
                'genre' => 'R&B Soul',
                'bio'   => "Maliq & D'Essentials adalah band R&B soul asal Jakarta yang terbentuk pada 2002. Dikenal dengan harmoni vokal yang indah dan aransemen musik yang kaya, mereka telah menjadi salah satu band paling konsisten di industri musik Indonesia selama lebih dari dua dekade.",
                'songs' => [
                    ['title' => 'Terdiam',        'album' => "Maliq & D'Essentials",     'year' => '2006'],
                    ['title' => 'Satu',           'album' => 'Sriously',                 'year' => '2009'],
                    ['title' => 'Untukmu',        'album' => 'Sriously',                 'year' => '2009'],
                    ['title' => 'Setapak Jalanku','album' => 'Lagu Lain',                'year' => '2012'],
                    ['title' => 'Love Me Right',  'album' => "Bestfriend's Exgirlfriend",'year' => '2017'],
                ],
            ],

            // ── ARTIS BARU ──────────────────────────────────────────
            [
                'name'  => 'Raisa',
                'slug'  => 'raisa',
                'genre' => 'Pop',
                'bio'   => 'Raisa Andriana adalah penyanyi pop asal Jakarta yang dikenal dengan suaranya yang merdu dan lagu-lagu romantis. Ia telah merilis beberapa album sukses dan menjadi salah satu penyanyi wanita paling populer di Indonesia.',
                'songs' => [
                    ['title' => 'Serba Salah',          'album' => 'Raisa',          'year' => '2012'],
                    ['title' => 'Jatuh Hati',           'album' => 'Raisa',          'year' => '2012'],
                    ['title' => 'Apalah Arti Menunggu', 'album' => 'Heart to Heart', 'year' => '2016'],
                    ['title' => 'Ku Mau',               'album' => 'Heart to Heart', 'year' => '2016'],
                    ['title' => 'Melukis Senja',         'album' => 'Handmade',       'year' => '2019'],
                ],
            ],
            [
                'name'  => 'Isyana Sarasvati',
                'slug'  => 'isyana-sarasvati',
                'genre' => 'Pop',
                'bio'   => 'Isyana Sarasvati adalah penyanyi dan musisi multitalenta yang juga seorang pianis klasik berbakat. Dengan kombinasi vokal yang kuat dan latar belakang musik klasik, Isyana berhasil menciptakan identitas musiknya yang unik di industri pop Indonesia.',
                'songs' => [
                    ['title' => 'Keep Being You',   'album' => 'Explore!', 'year' => '2015'],
                    ['title' => 'Tetap Dalam Jiwa', 'album' => 'Explore!', 'year' => '2015'],
                    ['title' => 'Kau Adalah',       'album' => 'Explore!', 'year' => '2015'],
                    ['title' => 'Terpesona',        'album' => 'Reborn',   'year' => '2017'],
                    ['title' => 'Lilly',            'album' => 'Lexicon',  'year' => '2020'],
                ],
            ],
            [
                'name'  => 'Fiersa Besari',
                'slug'  => 'fiersa-besari',
                'genre' => 'Indie Folk',
                'bio'   => 'Fiersa Besari adalah penyanyi, penulis lagu, dan penulis buku asal Bandung. Dikenal dengan lirik-liriknya yang puitis dan personal, Fiersa berhasil meraih hati jutaan penggemar muda Indonesia melalui musik folk yang sederhana namun penuh makna.',
                'songs' => [
                    ['title' => 'Gaun Merah',        'album' => 'Konstellasi',       'year' => '2017'],
                    ['title' => 'Waktu yang Salah',  'album' => 'Konstellasi',       'year' => '2017'],
                    ['title' => 'Satu Bulan',        'album' => 'Konstellasi',       'year' => '2017'],
                    ['title' => 'Terkotak',          'album' => 'Aku Benci Sekolah', 'year' => '2021'],
                    ['title' => 'Tak Pernah Setara', 'album' => 'Aku Benci Sekolah', 'year' => '2021'],
                ],
            ],
            [
                'name'  => 'Ardhito Pramono',
                'slug'  => 'ardhito-pramono',
                'genre' => 'Jazz Pop',
                'bio'   => "Ardhito Pramono adalah penyanyi dan aktor muda berbakat asal Jakarta. Musiknya memadukan jazz, soul, dan pop dengan aransemen yang elegan. Ia dikenal dengan lagunya yang hits seperti Fine and Fine dan I Just Couldn't Save You Tonight.",
                'songs' => [
                    ['title' => 'Fine and Fine',                    'album' => 'Fine and Fine',   'year' => '2018'],
                    ['title' => "I Just Couldn't Save You Tonight", 'album' => 'buat kamu',      'year' => '2019'],
                    ['title' => 'Cinta Pertama dan Terakhir',       'album' => 'buat kamu',      'year' => '2019'],
                    ['title' => 'Sudah',                            'album' => 'sudah, lanjut.', 'year' => '2021'],
                    ['title' => 'Kau Bikin Aku Jatuh Cinta',        'album' => 'sudah, lanjut.', 'year' => '2021'],
                ],
            ],
            [
                'name'  => 'Mocca',
                'slug'  => 'mocca',
                'genre' => 'Pop Jazz',
                'bio'   => 'Mocca adalah band pop jazz asal Bandung yang terbentuk pada 1997. Dikenal dengan nuansa retro 60an dan lirik berbahasa Inggris yang catchy, Mocca telah menjadi ikon musik indie Indonesia dan memiliki penggemar setia di berbagai negara Asia.',
                'songs' => [
                    ['title' => 'I Remember',         'album' => 'My Diary', 'year' => '2002'],
                    ['title' => 'You',                'album' => 'Friends',  'year' => '2005'],
                    ['title' => 'On The Night Like This','album' => 'Friends','year' => '2005'],
                    ['title' => 'Dear',               'album' => 'Colours',  'year' => '2008'],
                    ['title' => 'Happy',              'album' => 'Colours',  'year' => '2008'],
                ],
            ],
            [
                'name'  => 'Float',
                'slug'  => 'float',
                'genre' => 'Indie Pop',
                'bio'   => 'Float adalah band indie pop asal Bandung yang dikenal dengan musik atmosferik dan lirik yang introspektif. Mereka telah menjadi salah satu nama penting dalam skena musik indie Indonesia dengan album-album yang konsisten berkualitas.',
                'songs' => [
                    ['title' => 'Biarkan Aku Menua Bersamamu', 'album' => 'Kamar Gelap',     'year' => '2007'],
                    ['title' => 'Kosong',                      'album' => 'Kamar Gelap',     'year' => '2007'],
                    ['title' => 'Sampai Jadi Debu',            'album' => 'Sampai Jadi Debu','year' => '2010'],
                    ['title' => 'Pulang',                      'album' => 'Sampai Jadi Debu','year' => '2010'],
                    ['title' => 'Kita',                        'album' => 'Kita',            'year' => '2016'],
                ],
            ],
            [
                'name'  => 'Barasuara',
                'slug'  => 'barasuara',
                'genre' => 'Alternative Rock',
                'bio'   => 'Barasuara adalah band alternative rock asal Jakarta yang dikenal dengan musik yang powerful dan lirik yang penuh makna sosial. Mereka telah merilis beberapa album yang mendapat pujian dari kritikus musik dan menjadi favorit di berbagai festival musik Indonesia.',
                'songs' => [
                    ['title' => 'Taifun',                   'album' => 'Taifun',                 'year' => '2015'],
                    ['title' => 'Mengunci Dunia',           'album' => 'Taifun',                 'year' => '2015'],
                    ['title' => 'Hagia',                    'album' => 'Pikiran dan Perjalanan', 'year' => '2018'],
                    ['title' => 'Aku Bisa Menjadi Angin',   'album' => 'Pikiran dan Perjalanan', 'year' => '2018'],
                    ['title' => 'Guna Manusia',             'album' => 'Rahwana Rahwi',          'year' => '2022'],
                ],
            ],
        ];

        foreach ($artists as $data) {
            $songs = $data['songs'];
            unset($data['songs']);

            $artist = Artist::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );

            // Hapus lagu lama lalu isi ulang
            $artist->songs()->delete();
            foreach ($songs as $song) {
                $artist->songs()->create($song);
            }

            $this->command->info('✅ ' . $artist->name);
        }

        // ── RELASI ARTIS ↔ EVENT ────────────────────────────────────
        $map = [
            'noah'             => ['noah-live-in-concert', 'noah-the-journey-tour-2026', 'soundrenaline-2026'],
            'sheila-on-7'      => ['sheila-on-7-live-in-concert', 'soundrenaline-2026'],
            'tulus'            => ['tulus-tur-manusia-2026', 'we-the-fest-2026'],
            'dewa-19'          => ['dewa-19-30th-anniversary-tour'],
            'pamungkas'        => ['pamungkas-live-in-jakarta', 'we-the-fest-2026', 'synchronize-festival-2026'],
            'hindia'           => ['hindia-live-in-concert', 'we-the-fest-2026', 'synchronize-festival-2026'],
            'juicy-luicy'      => ['juicy-luicy-live-in-concert'],
            'sal-priadi'       => ['sal-priadi-live-in-concert', 'java-jazz-festival-2026'],
            'yura-yunita'      => ['yura-yunita-live-in-concert', 'yura-yunita-intuisi-tour'],
            'nadin-amizah'     => ['nadin-amizah-tour-2026', 'synchronize-festival-2026'],
            'maliq-dessentials'=> ['maliq-dessentials-live', 'java-jazz-festival-2026'],
            'raisa'            => ['raisa-live-in-concert-2026', 'raisa-diary-tour-2026', 'joyland-festival-2026'],
            'isyana-sarasvati' => ['isyana-sarasvati-reborn-tour', 'joyland-festival-2026'],
            'fiersa-besari'    => ['fiersa-besari-konser-semesta'],
            'ardhito-pramono'  => ['ardhito-pramono-live-concert', 'joyland-festival-2026'],
            'mocca'            => ['joyland-festival-2026'],
            'barasuara'        => ['barasuara-taifun-tour', 'soundrenaline-2026'],
        ];

        foreach ($map as $artistSlug => $eventSlugs) {
            $artist = Artist::where('slug', $artistSlug)->first();
            if (!$artist) continue;
            foreach ($eventSlugs as $eventSlug) {
                $event = Event::where('slug', $eventSlug)->first();
                if ($event) {
                    $event->artists()->syncWithoutDetaching([$artist->id]);
                }
            }
        }

        $this->command->info('✅ Artist seeder selesai! Total: ' . Artist::count() . ' artis.');
    }
}