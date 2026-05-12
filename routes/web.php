<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KedaiKopiController;

Route::get('/', [KedaiKopiController::class, 'index']);
Route::get('/kedai/{id}', [KedaiKopiController::class, 'show'])->name('kedai.show');
