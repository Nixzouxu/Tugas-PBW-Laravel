<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ulasan;

class UlasanSeeder extends Seeder
{
    /**
     * Seed data ulasan untuk testing relasi.
     * Ulasan ini berelasi dengan kedai_kopi melalui kedai_kopi_id.
     */
    public function run(): void
    {
        $ulasanData = [
            // Ulasan untuk Kedai ID 1 (Kopi Tuku - Jakarta)
            [
                'kedai_kopi_id' => 1,
                'nama_pengulas' => 'Budi Santoso',
                'komentar'      => 'Kopinya enak banget, suasananya juga nyaman untuk kerja. Pelayanan ramah dan cepat!',
                'rating_ulasan' => 5.0,
            ],
            [
                'kedai_kopi_id' => 1,
                'nama_pengulas' => 'Sari Dewi',
                'komentar'      => 'Kopi susu tetangganya memang juara. Udah berkali-kali ke sini, selalu puas.',
                'rating_ulasan' => 4.5,
            ],

            // Ulasan untuk Kedai ID 5 (Kopi Aceh Solong)
            [
                'kedai_kopi_id' => 5,
                'nama_pengulas' => 'Rahmat Hidayat',
                'komentar'      => 'Ini warung kopi terbaik di Banda Aceh! Kopi Gayonya autentik, harga sangat terjangkau.',
                'rating_ulasan' => 5.0,
            ],
            [
                'kedai_kopi_id' => 5,
                'nama_pengulas' => 'Nurul Fatimah',
                'komentar'      => 'Sudah berdiri sejak 1974 dan kualitasnya tetap terjaga. Wajib dikunjungi kalau ke Aceh!',
                'rating_ulasan' => 4.8,
            ],
            [
                'kedai_kopi_id' => 5,
                'nama_pengulas' => 'Ahmad Fauzi',
                'komentar'      => 'Kopi robustanya kuat dan pekat, pas untuk pagi hari. Tempatnya sederhana tapi berkesan.',
                'rating_ulasan' => 4.5,
            ],

            // Ulasan untuk Kedai ID 6 (Anomali Coffee - Bali)
            [
                'kedai_kopi_id' => 6,
                'nama_pengulas' => 'Putu Ardika',
                'komentar'      => 'Kopi single origin Kintamaninya benar-benar berbeda dari kopi biasa. Highly recommended!',
                'rating_ulasan' => 5.0,
            ],
            [
                'kedai_kopi_id' => 6,
                'nama_pengulas' => 'Wayan Sukma',
                'komentar'      => 'Tempatnya artistik dan kopinya berkualitas tinggi. Memang harga sedikit mahal tapi worth it.',
                'rating_ulasan' => 4.5,
            ],

            // Ulasan untuk Kedai ID 2 (Kopi Kenangan - Bandung)
            [
                'kedai_kopi_id' => 2,
                'nama_pengulas' => 'Dian Pratiwi',
                'komentar'      => 'Kenangan Latte-nya enak dengan harga yang sangat terjangkau. Pas untuk kantong mahasiswa!',
                'rating_ulasan' => 4.0,
            ],

            // Ulasan untuk Kedai ID 10 (Toraja Coffee House)
            [
                'kedai_kopi_id' => 10,
                'nama_pengulas' => 'Andi Baso',
                'komentar'      => 'Kopi Toraja arabikanya luar biasa! Rasa buah dan asamnya khas banget. Kebanggaan Sulawesi!',
                'rating_ulasan' => 5.0,
            ],
            [
                'kedai_kopi_id' => 10,
                'nama_pengulas' => 'Rini Maharani',
                'komentar'      => 'Senang bisa menikmati kopi petani lokal langsung. Konsepnya bagus dan bijinya segar.',
                'rating_ulasan' => 4.6,
            ],
        ];

        foreach ($ulasanData as $ulasan) {
            Ulasan::create($ulasan);
        }

        $this->command->info('UlasanSeeder: ' . count($ulasanData) . ' ulasan berhasil dibuat.');
    }
}