<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KedaiKopi extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan oleh model ini.
     * Eloquent secara default akan mencari 'kedai_kopis',
     * jadi kita definisikan secara eksplisit.
     */
    protected $table = 'kedai_kopi';

    /**
     * Kolom-kolom yang boleh diisi secara massal (mass assignment).
     * Digunakan oleh method create() dan update().
     */
    protected $fillable = [
        'nama_kedai',
        'kota',
        'provinsi',
        'kopi_unggulan',
        'suasana',
        'harga_mulai',
        'deskripsi',
        'jam_buka',
        'rating',
    ];

    /**
     * Casting tipe data kolom.
     * Memastikan tipe data sesuai saat diambil dari database.
     */
    protected $casts = [
        'harga_mulai' => 'integer',
        'rating'      => 'float',
    ];

    // RELASI ELOQUENT

    /**
     * Relasi: Satu KedaiKopi memiliki BANYAK Ulasan.
     * Tipe Relasi: hasMany
     *
     * Penggunaan: $kedai->ulasan
     */
    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'kedai_kopi_id');
    }
    // ACCESSOR (opsional, membantu format tampilan)

    /**
     * Format harga menjadi format Rupiah.
     * Penggunaan: $kedai->harga_format
     */
    public function getHargaFormatAttribute(): string
    {
        return 'Rp ' . number_format($this->harga_mulai, 0, ',', '.');
    }

    /**
     * Hitung rata-rata rating dari ulasan yang masuk.
     * Penggunaan: $kedai->rating_ulasan_rata
     */
    public function getRatingUlasanRataAttribute(): float|null
    {
        return $this->ulasan()->avg('rating_ulasan');
    }
}