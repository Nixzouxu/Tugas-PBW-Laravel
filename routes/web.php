<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KedaiKopiController;
use App\Http\Controllers\UlasanController;

/*
| Routes - Katalog Kedai Kopi (CRUD + Relasi Ulasan)
|
| Struktur routes untuk fitur lengkap CRUD kedai kopi
| dan tambahan relasi dengan tabel ulasan.
|
*/

// ROUTES KEDAI KOPI (CRUD Lengkap)

// GET  /               → Tampilkan semua kedai (dengan search & filter)
Route::get('/', [KedaiKopiController::class, 'index'])->name('kedai.index');

// GET  /kedai/tambah   → Form tambah kedai baru
Route::get('/kedai/tambah', [KedaiKopiController::class, 'create'])->name('kedai.create');

// POST /kedai          → Simpan kedai baru ke database
Route::post('/kedai', [KedaiKopiController::class, 'store'])->name('kedai.store');

// GET  /kedai/{id}     → Detail satu kedai + ulasannya
Route::get('/kedai/{id}', [KedaiKopiController::class, 'show'])->name('kedai.show');

// GET  /kedai/{id}/edit → Form edit kedai
Route::get('/kedai/{id}/edit', [KedaiKopiController::class, 'edit'])->name('kedai.edit');

// PUT  /kedai/{id}     → Update data kedai
Route::put('/kedai/{id}', [KedaiKopiController::class, 'update'])->name('kedai.update');

// DELETE /kedai/{id}   → Hapus kedai
Route::delete('/kedai/{id}', [KedaiKopiController::class, 'destroy'])->name('kedai.destroy');

// ROUTES ULASAN (Relasi KedaiKopi hasMany Ulasan)

// POST   /kedai/{kedaiId}/ulasan        → Tambah ulasan untuk satu kedai
Route::post('/kedai/{kedaiId}/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');

// DELETE /ulasan/{id}                   → Hapus ulasan
Route::delete('/ulasan/{id}', [UlasanController::class, 'destroy'])->name('ulasan.destroy');