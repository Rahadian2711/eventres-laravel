<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artist;
use App\Models\Event;

class ArtistSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat data artis
        $artists = [
            ['name' => 'NOAH',               'slug' => 'noah',               'genre' => 'Rock'],
            ['name' => 'Sheila On 7',         'slug' => 'sheila-on-7',        'genre' => 'Pop Rock'],
            ['name' => 'Tulus',              'slug' => 'tulus',              'genre' => 'Pop'],
            ['name' => 'Nadin Amizah',       'slug' => 'nadin-amizah',       'genre' => 'Indie Folk'],
            ['name' => 'Dewa 19',            'slug' => 'dewa-19',            'genre' => 'Rock'],
            ['name' => 'Pamungkas',          'slug' => 'pamungkas',          'genre' => 'Indie Pop'],
            ['name' => 'Hindia',             'slug' => 'hindia',             'genre' => 'Indie'],
            ['name' => 'Juicy Luicy',        'slug' => 'juicy-luicy',        'genre' => 'Pop'],
            ['name' => 'Sal Priadi',         'slug' => 'sal-priadi',         'genre' => 'Indie'],
            ['name' => 'Yura Yunita',        'slug' => 'yura-yunita',        'genre' => 'Pop'],
            ['name' => "Maliq & D'Essentials", 'slug' => 'maliq-dessentials', 'genre' => 'R&B Soul'],
        ];

        foreach ($artists as $data) {
            Artist::firstOrCreate(['slug' => $data['slug']], $data);
        }

        // 2. Hubungkan artis ke event (sesuai slug event di database)
        $map = [
            'noah'               => ['noah-live-in-concert'],
            'sheila-on-7'        => ['sheila-on-7-live-in-concert'],
            'tulus'              => ['tulus-tur-manusia-2026'],
            'dewa-19'            => ['dewa-19-30th-anniversary-tour'],
            'pamungkas'          => ['pamungkas-live-in-jakarta'],
            'hindia'             => ['hindia-live-in-concert'],
            'juicy-luicy'        => ['juicy-luicy-live-in-concert'],
            'sal-priadi'         => ['sal-priadi-live-in-concert'],
            'yura-yunita'        => ['yura-yunita-live-in-concert'],
            'nadin-amizah'       => ['nadin-amizah-tour-2026'],
            'maliq-dessentials'  => ['maliq-dessentials-live'],

            // We The Fest adalah festival — bisa punya banyak artis
            // Tambahkan artis yang tampil di We The Fest sesuai kebutuhan
            'tulus'              => ['tulus-tur-manusia-2026', 'we-the-fest-2026'],
            'hindia'             => ['hindia-live-in-concert', 'we-the-fest-2026'],
            'pamungkas'          => ['pamungkas-live-in-jakarta', 'we-the-fest-2026'],
        ];

        foreach ($map as $artistSlug => $eventSlugs) {
            $artist = Artist::where('slug', $artistSlug)->first();
            if (!$artist) continue;

            foreach ($eventSlugs as $eventSlug) {
                $event = Event::where('slug', $eventSlug)->first();
                if ($event) {
                    // syncWithoutDetaching agar tidak duplikat
                    $event->artists()->syncWithoutDetaching([$artist->id]);
                }
            }
        }

        $this->command->info('✅ Artist seeder selesai!');
    }
}