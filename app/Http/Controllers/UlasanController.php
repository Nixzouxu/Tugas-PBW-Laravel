<?php

namespace App\Http\Controllers;

use App\Models\KedaiKopi;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    // STORE - Simpan ulasan baru (Eloquent: create())
    public function store(Request $request, $kedaiId)
    {
        // Cek apakah kedai ada
        $kedai = KedaiKopi::find($kedaiId);
        if (!$kedai) {
            abort(404, 'Kedai kopi tidak ditemukan.');
        }

        // Validasi input
        $validated = $request->validate([
            'nama_pengulas' => 'required|string|max:255',
            'komentar'      => 'required|string|min:10',
            'rating_ulasan' => 'required|numeric|min:1|max:5',
        ], [
            'nama_pengulas.required' => 'Nama wajib diisi.',
            'komentar.required'      => 'Komentar wajib diisi.',
            'komentar.min'           => 'Komentar minimal 10 karakter.',
            'rating_ulasan.required' => 'Rating wajib diisi.',
            'rating_ulasan.min'      => 'Rating minimal 1.',
            'rating_ulasan.max'      => 'Rating maksimal 5.',
        ]);

        // Tambahkan kedai_kopi_id ke data yang akan disimpan
        $validated['kedai_kopi_id'] = $kedaiId;

        // Eloquent create() - menyimpan ulasan baru
        Ulasan::create($validated);

        return redirect()->route('kedai.show', $kedaiId)
                         ->with('success', 'Ulasan berhasil ditambahkan! Terima kasih.');
    }

    // DESTROY - Hapus ulasan (Eloquent: delete())
    public function destroy($id)
    {
        // Eloquent find() dan delete()
        $ulasan = Ulasan::find($id);

        if (!$ulasan) {
            abort(404, 'Ulasan tidak ditemukan.');
        }

        $kedaiId = $ulasan->kedai_kopi_id;
        $ulasan->delete();

        return redirect()->route('kedai.show', $kedaiId)
                         ->with('success', 'Ulasan berhasil dihapus.');
    }
}