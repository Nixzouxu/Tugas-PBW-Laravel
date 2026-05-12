<?php

namespace App\Http\Controllers;

use App\Models\KedaiKopi;

class KedaiKopiController extends Controller {
    // Tampilkan semua kedai kopi
    public function index() {
        $kedaiKopi = KedaiKopi::orderBy('rating', 'desc')->get();
        return view('kedai_kopi.index', compact('kedaiKopi'));
    }

    // Tampilkan detail satu kedai kopi
    public function show($id) {
        $kedai = KedaiKopi::findOrFail($id);
        return view('kedai_kopi.show', compact('kedai'));
    }
}