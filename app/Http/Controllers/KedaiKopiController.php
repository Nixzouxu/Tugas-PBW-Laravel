<?php

namespace App\Http\Controllers;

use App\Models\KedaiKopi;
use Illuminate\Http\Request;

class KedaiKopiController extends Controller
{
    // INDEX - Menampilkan semua kedai (Eloquent: all / orderBy)
    public function index(Request $request)
    {
        // Gunakan where() untuk fitur pencarian
        $query = KedaiKopi::query();

        if ($request->filled('search')) {
            $search = $request->search;
            // Eloquent where() dengan orWhere() untuk multi-kolom
            $query->where(function ($q) use ($search) {
                $q->where('nama_kedai', 'like', "%{$search}%")
                  ->orWhere('kota', 'like', "%{$search}%")
                  ->orWhere('provinsi', 'like', "%{$search}%")
                  ->orWhere('kopi_unggulan', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan suasana (contoh penggunaan where())
        if ($request->filled('suasana')) {
            $query->where('suasana', $request->suasana);
        }

        // Ambil data diurutkan berdasarkan rating tertinggi
        $kedaiKopis = $query->orderBy('rating', 'desc')->paginate(6);

        // Ambil semua jenis suasana untuk filter dropdown
        $suasanaList = KedaiKopi::select('suasana')->distinct()->pluck('suasana');

        return view('kedai_kopi.index', compact('kedaiKopis', 'suasanaList'));
    }

    // SHOW - Detail satu kedai beserta ulasannya (Relasi)
    public function show($id)
    {
        // Eloquent find() - mengambil data berdasarkan primary key
        // with('ulasan') = eager loading relasi (menampilkan data relasi)
        $kedai = KedaiKopi::with('ulasan')->find($id);

        // Jika tidak ditemukan, tampilkan halaman 404
        if (!$kedai) {
            abort(404, 'Kedai kopi tidak ditemukan.');
        }

        return view('kedai_kopi.show', compact('kedai'));
    }

    // CREATE - Form tambah kedai baru
    public function create()
    {
        return view('kedai_kopi.create');
    }

    // STORE - Simpan kedai baru ke database (Eloquent: create())
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_kedai'    => 'required|string|max:255',
            'kota'          => 'required|string|max:255',
            'provinsi'      => 'required|string|max:255',
            'kopi_unggulan' => 'required|string|max:255',
            'suasana'       => 'required|string|max:255',
            'harga_mulai'   => 'required|integer|min:0',
            'deskripsi'     => 'required|string',
            'jam_buka'      => 'required|string|max:255',
            'rating'        => 'required|numeric|min:1|max:5',
        ], [
            'nama_kedai.required'    => 'Nama kedai wajib diisi.',
            'kota.required'          => 'Kota wajib diisi.',
            'provinsi.required'      => 'Provinsi wajib diisi.',
            'kopi_unggulan.required' => 'Kopi unggulan wajib diisi.',
            'suasana.required'       => 'Suasana wajib diisi.',
            'harga_mulai.required'   => 'Harga mulai wajib diisi.',
            'harga_mulai.integer'    => 'Harga mulai harus berupa angka.',
            'deskripsi.required'     => 'Deskripsi wajib diisi.',
            'jam_buka.required'      => 'Jam buka wajib diisi.',
            'rating.required'        => 'Rating wajib diisi.',
            'rating.min'             => 'Rating minimal 1.',
            'rating.max'             => 'Rating maksimal 5.',
        ]);

        // Eloquent create() - menyimpan data baru ke database
        KedaiKopi::create($validated);

        return redirect()->route('kedai.index')
                         ->with('success', 'Kedai kopi berhasil ditambahkan!');
    }

    // EDIT - Form edit kedai (Eloquent: find())
    public function edit($id)
    {
        // Eloquent find() untuk mendapatkan data yang akan diedit
        $kedai = KedaiKopi::find($id);

        if (!$kedai) {
            abort(404, 'Kedai kopi tidak ditemukan.');
        }

        return view('kedai_kopi.edit', compact('kedai'));
    }

    // UPDATE - Simpan perubahan data (Eloquent: update())
    public function update(Request $request, $id)
    {
        // Eloquent find() terlebih dahulu
        $kedai = KedaiKopi::find($id);

        if (!$kedai) {
            abort(404, 'Kedai kopi tidak ditemukan.');
        }

        // Validasi input
        $validated = $request->validate([
            'nama_kedai'    => 'required|string|max:255',
            'kota'          => 'required|string|max:255',
            'provinsi'      => 'required|string|max:255',
            'kopi_unggulan' => 'required|string|max:255',
            'suasana'       => 'required|string|max:255',
            'harga_mulai'   => 'required|integer|min:0',
            'deskripsi'     => 'required|string',
            'jam_buka'      => 'required|string|max:255',
            'rating'        => 'required|numeric|min:1|max:5',
        ]);

        // Eloquent update() - memperbarui data di database
        $kedai->update($validated);

        return redirect()->route('kedai.show', $kedai->id)
                         ->with('success', 'Data kedai kopi berhasil diperbarui!');
    }

    // DESTROY - Hapus kedai (Eloquent: delete())
    public function destroy($id)
    {
        // Eloquent find() untuk mendapatkan data
        $kedai = KedaiKopi::find($id);

        if (!$kedai) {
            abort(404, 'Kedai kopi tidak ditemukan.');
        }

        // Eloquent delete() - menghapus data dari database
        // Ulasan akan ikut terhapus karena ada cascade delete di migration
        $kedai->delete();

        return redirect()->route('kedai.index')
                         ->with('success', 'Kedai kopi berhasil dihapus!');
    }
}