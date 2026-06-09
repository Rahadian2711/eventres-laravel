<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Category;
use App\Models\TicketCategory;
use App\Models\EventSchedule;
use App\Models\EventTag;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $konser   = Category::where('slug', 'konser')->first();
        $festival = Category::where('slug', 'festival')->first();
        $tur = Category::where('slug', 'tur')->first();

        $events = [
            [
                'title'        => 'NOAH Live in Concert',
                'organizer'    => 'Musica Studios',
                'venue'        => 'Istora Senayan, Jakarta',
                'start'        => '2026-06-25 19:00:00',
                'end'          => '2026-06-25 22:00:00',
                'category'     => $konser,
                'performances' => ['NOAH', 'Full Band', 'Special Stage', 'Light Show'],
                'tickets'      => [
                    ['name' => 'Festival',  'price' => 350000, 'quota' => 5000, 'benefits' => 'Akses area festival, standing'],
                    ['name' => 'Tribune',   'price' => 550000, 'quota' => 2000, 'benefits' => 'Akses area tribun, kursi bernomor'],
                    ['name' => 'VIP',       'price' => 850000, 'quota' => 500,  'benefits' => 'Akses area VIP, kursi terbaik, goodie bag'],
                ],
            ],
            [
                'title'        => 'Sheila On 7 Live in Concert',
                'organizer'    => 'Trinity Optima',
                'venue'        => 'Jexpo Kemayoran, Jakarta',
                'start'        => '2026-07-05 19:00:00',
                'end'          => '2026-07-05 22:30:00',
                'category'     => $konser,
                'performances' => ['Sheila On 7', 'Full Band', 'Akustik Session', 'Special Guest'],
                'tickets'      => [
                    ['name' => 'Festival',  'price' => 350000, 'quota' => 5000, 'benefits' => 'Akses area festival, standing'],
                    ['name' => 'VIP',       'price' => 750000, 'quota' => 800,  'benefits' => 'Akses area VIP, kursi terbaik, goodie bag'],
                ],
            ],
            [
                'title'        => 'Tulus Tur Manusia 2026',
                'organizer'    => 'Demajors',
                'venue'        => 'JCC Senayan, Jakarta',
                'start'        => '2026-07-30 19:30:00',
                'end'          => '2026-07-30 22:00:00',
                'category'     => $tur,
                'performances' => ['Tulus', 'String Orchestra', 'Backing Vocalist', 'Visual Show'],
                'tickets'      => [
                    ['name' => 'Festival',  'price' => 350000, 'quota' => 4000, 'benefits' => 'Akses area festival, standing'],
                    ['name' => 'Prestige',  'price' => 650000, 'quota' => 1000, 'benefits' => 'Akses area prestige, kursi bernomor'],
                    ['name' => 'VIP',       'price' => 950000, 'quota' => 300,  'benefits' => 'Akses area VIP, meet & greet, goodie bag eksklusif'],
                ],
            ],
            [
                'title'        => 'We The Fest 2026',
                'organizer'    => 'ismaya Live',
                'venue'        => 'GBK Sports Complex, Jakarta',
                'start'        => '2026-08-23 14:00:00',
                'end'          => '2026-08-24 23:00:00',
                'category'     => $festival,
                'performances' => ['Multi-Stage', '20+ Artist', 'DJ Set', 'Food Festival', 'Art Installation'],
                'tickets'      => [
                    ['name' => '1-Day Pass', 'price' => 495000,  'quota' => 10000, 'benefits' => 'Akses 1 hari semua stage'],
                    ['name' => '2-Day Pass', 'price' => 850000,  'quota' => 5000,  'benefits' => 'Akses 2 hari semua stage, welcome drink'],
                    ['name' => 'VIP 2-Day',  'price' => 1500000, 'quota' => 500,   'benefits' => 'Akses 2 hari VIP lounge, goodie bag, fast lane entry'],
                ],
            ],
            [
                'title'        => 'Dewa 19 30th Anniversary Tour',
                'organizer'    => 'Big Daddy Entertainment',
                'venue'        => 'ICE BSD City',
                'start'        => '2026-07-16 19:00:00',
                'end'          => '2026-07-16 22:30:00',
                'category'     => $tur,
                'performances' => ['Dewa 19', 'Ahmad Dhani', 'Once Mekel', 'Special Collaboration'],
                'tickets'      => [
                    ['name' => 'Festival',  'price' => 400000, 'quota' => 6000, 'benefits' => 'Akses area festival, standing'],
                    ['name' => 'VIP',       'price' => 900000, 'quota' => 600,  'benefits' => 'Akses area VIP, kursi terbaik, goodie bag anniversary'],
                ],
            ],
            [
                'title'        => 'Pamungkas Live in Jakarta',
                'organizer'    => 'Berlian Entertainment',
                'venue'        => 'Tennis Indoor Senayan',
                'start'        => '2026-06-28 19:00:00',
                'end'          => '2026-06-28 22:00:00',
                'category'     => $konser,
                'performances' => ['Pamungkas', 'Full Band', 'Akustik Set', 'New Album Showcase'],
                'tickets'      => [
                    ['name' => 'Regular',   'price' => 350000, 'quota' => 2000, 'benefits' => 'Akses area reguler, standing'],
                    ['name' => 'VIP',       'price' => 650000, 'quota' => 400,  'benefits' => 'Akses area VIP, kursi terbaik, signed poster'],
                ],
            ],
            [
                'title'        => 'Hindia Live in Concert',
                'organizer'    => 'Inspiro',
                'venue'        => 'Jexpo Kemayoran, Jakarta',
                'start'        => '2026-07-25 19:00:00',
                'end'          => '2026-07-25 22:00:00',
                'category'     => $konser,
                'performances' => ['Hindia', 'Full Band', 'Special Guest Vocalist', 'Immersive Lighting'],
                'tickets'      => [
                    ['name' => 'Regular',   'price' => 400000, 'quota' => 3000, 'benefits' => 'Akses area reguler, standing'],
                    ['name' => 'VIP',       'price' => 750000, 'quota' => 500,  'benefits' => 'Akses area VIP, goodie bag, priority queue'],
                ],
            ],
            [
                'title'        => 'Juicy Luicy Live in Concert',
                'organizer'    => 'Mola TV',
                'venue'        => 'Istora Senayan, Jakarta',
                'start'        => '2026-08-15 19:30:00',
                'end'          => '2026-08-15 22:30:00',
                'category'     => $konser,
                'performances' => ['Juicy Luicy', 'Full Band', 'Opening Act', 'Special Stage Effect'],
                'tickets'      => [
                    ['name' => 'Festival',  'price' => 350000, 'quota' => 4000, 'benefits' => 'Akses area festival, standing'],
                    ['name' => 'VIP',       'price' => 700000, 'quota' => 600,  'benefits' => 'Akses area VIP, kursi terbaik, exclusive merchandise'],
                ],
            ],
            [
                'title'        => 'Nadin Amizah Tour 2026',
                'organizer'    => 'Demajors',
                'venue'        => 'The Kasablanka, Jakarta',
                'start'        => '2026-08-20 19:00:00',
                'end'          => '2026-08-20 22:00:00',
                'category'     => $tur,
                'performances' => ['Nadin Amizah', 'Live Band', 'String Quartet', 'Poetry Reading'],
                'tickets'      => [
                    ['name' => 'Regular',   'price' => 300000, 'quota' => 2000, 'benefits' => 'Akses area reguler, standing'],
                    ['name' => 'VIP',       'price' => 600000, 'quota' => 300,  'benefits' => 'Akses area VIP, meet & greet, signed album'],
                ],
            ],
            [
                'title'        => 'Yura Yunita Live in Concert',
                'organizer'    => 'Sony Music',
                'venue'        => 'Tennis Indoor Senayan',
                'start'        => '2026-08-28 19:00:00',
                'end'          => '2026-08-28 22:00:00',
                'category'     => $konser,
                'performances' => ['Yura Yunita', 'Full Band', 'Dance Crew', 'Special Visual'],
                'tickets'      => [
                    ['name' => 'Regular',   'price' => 300000, 'quota' => 2000, 'benefits' => 'Akses area reguler, standing'],
                    ['name' => 'VIP',       'price' => 600000, 'quota' => 400,  'benefits' => 'Akses area VIP, kursi terbaik, goodie bag'],
                ],
            ],
            [
                'title'        => 'Sal Priadi Live in Concert',
                'organizer'    => 'Neonotes',
                'venue'        => 'JCC Senayan, Jakarta',
                'start'        => '2026-09-05 19:00:00',
                'end'          => '2026-09-05 22:00:00',
                'category'     => $konser,
                'performances' => ['Sal Priadi', 'Full Band', 'Choir', 'Intimate Stage'],
                'tickets'      => [
                    ['name' => 'Regular',   'price' => 350000, 'quota' => 3000, 'benefits' => 'Akses area reguler, standing'],
                    ['name' => 'VIP',       'price' => 700000, 'quota' => 500,  'benefits' => 'Akses area VIP, kursi terbaik, signed merchandise'],
                ],
            ],
            [
                'title'        => 'Maliq & D\'Essentials Live',
                'organizer'    => 'Trinity Optima',
                'venue'        => 'GBK Basketball Hall, Jakarta',
                'start'        => '2026-09-20 19:00:00',
                'end'          => '2026-09-20 22:00:00',
                'category'     => $konser,
                'performances' => ['Maliq & D\'Essentials', 'Full Band', 'Jazz Ensemble', 'Special Guest'],
                'tickets'      => [
                    ['name' => 'Regular',   'price' => 400000, 'quota' => 3000, 'benefits' => 'Akses area reguler, standing'],
                    ['name' => 'VIP',       'price' => 800000, 'quota' => 400,  'benefits' => 'Akses area VIP, kursi premium, goodie bag eksklusif'],
                ],
            ],
        ];

        foreach ($events as $data) {
            $slug = \Illuminate\Support\Str::slug($data['title']);
            $counter = 1;
            $originalSlug = $slug;
            while (Event::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter++;
            }

            $event = Event::create([
                'category_id' => $data['category']->id,
                'title'       => $data['title'],
                'slug'        => $slug,
                'organizer'   => $data['organizer'],
                'description' => 'Saksikan penampilan spektakuler ' . $data['title'] . ' secara langsung. Jangan lewatkan momen tak terlupakan ini!',
                'venue'       => $data['venue'],
                'status'      => 'published',
            ]);

            EventSchedule::create([
                'event_id'   => $event->id,
                'title'      => $data['title'],
                'start_time' => $data['start'],
                'end_time'   => $data['end'],
            ]);

            // Simpan sebagai EventTag dengan prefix 'perf:' agar bisa dibedakan di blade
            foreach ($data['performances'] as $perf) {
                EventTag::create(['event_id' => $event->id, 'tag' => $perf]);
            }

            foreach ($data['tickets'] as $ticket) {
                TicketCategory::create([
                    'event_id' => $event->id,
                    'name'     => $ticket['name'],
                    'price'    => $ticket['price'],
                    'quota'    => $ticket['quota'],
                    'sold'     => 0,
                    'benefits' => $ticket['benefits'],
                ]);
            }
        }
    }
}
