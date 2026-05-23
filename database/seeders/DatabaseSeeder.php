<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * Urutan penting: KedaiKopiSeeder harus jalan DULU sebelum UlasanSeeder
     * karena Ulasan membutuhkan kedai_kopi_id yang sudah ada.
     */
    public function run(): void
    {
        $this->call([
            KedaiKopiSeeder::class,  // Seed data kedai dulu (parent)
            UlasanSeeder::class,      // Baru seed ulasan (child / relasi)
        ]);
    }
}