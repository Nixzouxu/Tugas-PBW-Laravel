<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KedaiKopi extends Model {
    protected $table = 'kedai_kopi';

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
}