<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ulasan extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database.
     */
    protected $table = 'ulasan';

    /**
     * Kolom yang boleh diisi secara massal.
     */
    protected $fillable = [
        'kedai_kopi_id',
        'nama_pengulas',
        'komentar',
        'rating_ulasan',
    ];

    /**
     * Casting tipe data.
     */
    protected $casts = [
        'rating_ulasan' => 'float',
    ];

    // RELASI ELOQUENT

    /**
     * Relasi: Setiap Ulasan MILIK SATU KedaiKopi.
     * Tipe Relasi: belongsTo
     *
     * Penggunaan: $ulasan->kedaiKopi
     */
    public function kedaiKopi()
    {
        return $this->belongsTo(KedaiKopi::class, 'kedai_kopi_id');
    }
}