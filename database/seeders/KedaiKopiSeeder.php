<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KedaiKopi;

class KedaiKopiSeeder extends Seeder {
    public function run(): void {
        KedaiKopi::truncate();
        $data = [
            ['nama_kedai' => 'Kopi Tuku', 'kota' => 'Jakarta Selatan', 'provinsi' => 'DKI Jakarta', 'kopi_unggulan' => 'Kopi Susu Tetangga', 'suasana' => 'Modern', 'harga_mulai' => 25000, 'deskripsi' => 'Kedai kopi lokal yang terkenal dengan kopi susu khasnya yang menggunakan biji kopi pilihan Nusantara.', 'jam_buka' => '07.00 - 22.00', 'rating' => 4.8],
            ['nama_kedai' => 'Kopi Kenangan', 'kota' => 'Bandung', 'provinsi' => 'Jawa Barat', 'kopi_unggulan' => 'Kenangan Latte', 'suasana' => 'Cozy', 'harga_mulai' => 20000, 'deskripsi' => 'Chain kopi lokal Indonesia yang menyajikan kopi berkualitas tinggi dengan harga terjangkau.', 'jam_buka' => '08.00 - 21.00', 'rating' => 4.5],
            ['nama_kedai' => 'Janji Jiwa', 'kota' => 'Surabaya', 'provinsi' => 'Jawa Timur', 'kopi_unggulan' => 'Jiwa Toast', 'suasana' => 'Vintage', 'harga_mulai' => 18000, 'deskripsi' => 'Kedai kopi dengan konsep grab-and-go yang menyajikan kopi Nusantara dengan sentuhan modern.', 'jam_buka' => '07.00 - 22.00', 'rating' => 4.4],
            ['nama_kedai' => 'Fore Coffee', 'kota' => 'Yogyakarta', 'provinsi' => 'DI Yogyakarta', 'kopi_unggulan' => 'Avocado Latte', 'suasana' => 'Modern', 'harga_mulai' => 30000, 'deskripsi' => 'Kedai kopi premium dengan berbagai pilihan minuman berbasis kopi dan non-kopi.', 'jam_buka' => '09.00 - 22.00', 'rating' => 4.6],
            ['nama_kedai' => 'Kopi Aceh Solong', 'kota' => 'Banda Aceh', 'provinsi' => 'Aceh', 'kopi_unggulan' => 'Kopi Gayo Robusta', 'suasana' => 'Tradisional', 'harga_mulai' => 10000, 'deskripsi' => 'Warung kopi legendaris Aceh yang telah berdiri sejak 1974, menyajikan kopi Gayo asli.', 'jam_buka' => '06.00 - 23.00', 'rating' => 4.9],
            ['nama_kedai' => 'Anomali Coffee', 'kota' => 'Bali', 'provinsi' => 'Bali', 'kopi_unggulan' => 'Single Origin Bali Kintamani', 'suasana' => 'Artisan', 'harga_mulai' => 35000, 'deskripsi' => 'Coffee shop artisan yang mengutamakan kualitas biji kopi single origin dari berbagai daerah Indonesia.', 'jam_buka' => '08.00 - 22.00', 'rating' => 4.7],
            ['nama_kedai' => 'Dua Coffee', 'kota' => 'Medan', 'provinsi' => 'Sumatera Utara', 'kopi_unggulan' => 'Kopi Mandailing', 'suasana' => 'Cozy', 'harga_mulai' => 15000, 'deskripsi' => 'Kedai kopi yang mengangkat cita rasa kopi Mandailing asli Sumatera Utara.', 'jam_buka' => '08.00 - 21.00', 'rating' => 4.5],
            ['nama_kedai' => 'Filosofi Kopi', 'kota' => 'Jakarta Pusat', 'provinsi' => 'DKI Jakarta', 'kopi_unggulan' => 'Ben & Jody', 'suasana' => 'Vintage', 'harga_mulai' => 40000, 'deskripsi' => 'Terinspirasi dari novel & film terkenal, menyajikan pengalaman kopi yang penuh makna dan cerita.', 'jam_buka' => '10.00 - 22.00', 'rating' => 4.6],
            ['nama_kedai' => 'Kopi Lain Hati', 'kota' => 'Semarang', 'provinsi' => 'Jawa Tengah', 'kopi_unggulan' => 'Kopi Susu Aren', 'suasana' => 'Cozy', 'harga_mulai' => 18000, 'deskripsi' => 'Kedai kopi lokal dengan menu kopi susu aren yang menggunakan gula aren asli Nusantara.', 'jam_buka' => '08.00 - 21.00', 'rating' => 4.3],
            ['nama_kedai' => 'Toraja Coffee House', 'kota' => 'Makassar', 'provinsi' => 'Sulawesi Selatan', 'kopi_unggulan' => 'Kopi Toraja Arabika', 'suasana' => 'Tradisional', 'harga_mulai' => 20000, 'deskripsi' => 'Rumah kopi yang menghadirkan keunikan cita rasa kopi Toraja arabika pilihan langsung dari petani lokal.', 'jam_buka' => '07.00 - 22.00', 'rating' => 4.8],
        ];

        foreach ($data as $item) {
            KedaiKopi::create($item);
        }
    }
}