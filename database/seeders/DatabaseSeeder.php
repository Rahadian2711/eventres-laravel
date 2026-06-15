<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,  // ← tetap ada, jangan dihapus
            ArtistSeeder::class,    // ← harus sebelum EventSeeder
            EventSeeder::class,
        ]);
    }
}