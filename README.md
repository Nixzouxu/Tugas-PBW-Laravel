<div align="center">

# ☕ Katalog Kedai Kopi Lokal Indonesia

**Aplikasi web full-stack berbasis Laravel untuk menjelajahi kedai kopi lokal terbaik dari seluruh Nusantara.**

![Laravel](https://img.shields.io/badge/Laravel-13.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.5-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Blade](https://img.shields.io/badge/Blade-Template-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)

</div>

---

## 📌 Tentang Proyek

Proyek ini adalah aplikasi web **Katalog Kedai Kopi Lokal Indonesia** yang dibangun menggunakan **Laravel Framework** sebagai bagian dari tugas mata kuliah **Pemrograman Berbasis Web**.

Aplikasi ini menerapkan dua pola arsitektur secara bertahap:

| Tugas | Konsep | Cakupan |
|-------|--------|---------|
| Tugas 1 | **MVC** (Model-View-Controller) | Read-only: tampil daftar & detail kedai |
| Tugas 2 | **Eloquent ORM** + Relasi | Full CRUD + relasi antar tabel (ulasan) |

Pengguna dapat melihat, menambah, mengedit, dan menghapus data kedai kopi, serta memberikan ulasan yang tersimpan dalam database secara relasional.

---

## ✨ Fitur Utama

| Fitur | Deskripsi |
|-------|-----------|
| 📋 **Katalog Kedai** | Menampilkan semua kedai kopi diurutkan berdasarkan rating tertinggi |
| 🔍 **Pencarian & Filter** | Cari berdasarkan nama, kota, kopi unggulan; filter berdasarkan suasana |
| ➕ **Tambah Kedai** | Form untuk menambahkan kedai baru menggunakan `Eloquent::create()` |
| ✏️ **Edit Kedai** | Form edit data kedai menggunakan `Eloquent::update()` |
| 🗑️ **Hapus Kedai** | Hapus data dengan cascade ke tabel ulasan menggunakan `Eloquent::delete()` |
| 💬 **Ulasan Pengunjung** | Tambah & hapus ulasan per kedai — implementasi relasi `hasMany` / `belongsTo` |
| 📄 **Pagination** | Data tampil 6 per halaman |

---

## 🗂️ Struktur Direktori

```
tugas-pbw/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── KedaiKopiController.php   # CRUD kedai kopi
│   │       └── UlasanController.php      # Tambah & hapus ulasan
│   └── Models/
│       ├── KedaiKopi.php                 # Model + relasi hasMany(Ulasan)
│       └── Ulasan.php                    # Model + relasi belongsTo(KedaiKopi)
├── database/
│   ├── migrations/
│   │   ├── xxxx_create_kedai_kopi_table.php
│   │   └── xxxx_create_ulasan_table.php  # Migration tabel relasi
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── KedaiKopiSeeder.php
│       └── UlasanSeeder.php
├── resources/
│   └── views/
│       └── kedai_kopi/
│           ├── index.blade.php           # Halaman katalog + search
│           ├── show.blade.php            # Detail kedai + ulasan
│           ├── create.blade.php          # Form tambah kedai
│           └── edit.blade.php            # Form edit kedai
├── routes/
│   └── web.php                           # Definisi semua route
└── .env                                  # Konfigurasi environment
```

---

## 🗄️ Skema Database

### Tabel `kedai_kopi`

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| `id` | BIGINT UNSIGNED | Primary Key, Auto Increment |
| `nama_kedai` | VARCHAR(255) | Nama kedai kopi |
| `kota` | VARCHAR(255) | Kota lokasi kedai |
| `provinsi` | VARCHAR(255) | Provinsi lokasi kedai |
| `kopi_unggulan` | VARCHAR(255) | Menu kopi andalan |
| `suasana` | VARCHAR(255) | Nuansa kedai (Modern, Cozy, dll.) |
| `harga_mulai` | INT | Harga terendah menu (Rupiah) |
| `deskripsi` | TEXT | Deskripsi lengkap kedai |
| `jam_buka` | VARCHAR(255) | Jam operasional |
| `rating` | DECIMAL(2,1) | Penilaian kedai (skala 1.0–5.0) |
| `created_at` | TIMESTAMP | Waktu data dibuat |
| `updated_at` | TIMESTAMP | Waktu data diperbarui |

### Tabel `ulasan` *(relasi hasMany)*

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| `id` | BIGINT UNSIGNED | Primary Key, Auto Increment |
| `kedai_kopi_id` | BIGINT UNSIGNED | **Foreign Key** → `kedai_kopi.id` (cascade delete) |
| `nama_pengulas` | VARCHAR(255) | Nama pemberi ulasan |
| `komentar` | TEXT | Isi ulasan |
| `rating_ulasan` | DECIMAL(2,1) | Rating dari pengulas (1.0–5.0) |
| `created_at` | TIMESTAMP | Waktu ulasan dibuat |
| `updated_at` | TIMESTAMP | Waktu ulasan diperbarui |

### Relasi Antar Tabel

```
kedai_kopi          ulasan
──────────          ──────────────────
id  ◄───────────── kedai_kopi_id (FK)
nama_kedai          nama_pengulas
...                 komentar
                    rating_ulasan
```

> **KedaiKopi** `hasMany` **Ulasan** — Satu kedai bisa punya banyak ulasan.  
> **Ulasan** `belongsTo` **KedaiKopi** — Setiap ulasan milik satu kedai.

---

## 🛣️ Routes

| Method | URI | Controller | Fungsi |
|--------|-----|------------|--------|
| `GET` | `/` | `KedaiKopiController@index` | Tampilkan semua kedai + search |
| `GET` | `/kedai/tambah` | `KedaiKopiController@create` | Form tambah kedai |
| `POST` | `/kedai` | `KedaiKopiController@store` | Simpan kedai baru |
| `GET` | `/kedai/{id}` | `KedaiKopiController@show` | Detail kedai + ulasan |
| `GET` | `/kedai/{id}/edit` | `KedaiKopiController@edit` | Form edit kedai |
| `PUT` | `/kedai/{id}` | `KedaiKopiController@update` | Perbarui data kedai |
| `DELETE` | `/kedai/{id}` | `KedaiKopiController@destroy` | Hapus kedai |
| `POST` | `/kedai/{id}/ulasan` | `UlasanController@store` | Tambah ulasan |
| `DELETE` | `/ulasan/{id}` | `UlasanController@destroy` | Hapus ulasan |

---

## ⚙️ Cara Menjalankan Proyek

### Prasyarat

Pastikan sudah terinstall:
- [Laragon](https://laragon.org/) (sudah termasuk PHP 8.x, MySQL, Composer)
- Git

### Langkah Instalasi

**1. Clone repository**
```bash
git clone https://github.com/Nixzouxu/Tugas-PBW-Laravel.git
cd Tugas-PBW-Laravel
```

**2. Install dependencies PHP**
```bash
composer install
```

**3. Salin file environment**
```bash
cp .env.example .env
```

**4. Generate application key**
```bash
php artisan key:generate
```

**5. Konfigurasi database di `.env`**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tugas_pbw
DB_USERNAME=root
DB_PASSWORD=
```
> Buat database `tugas_pbw` terlebih dahulu di HeidiSQL / phpMyAdmin.

**6. Jalankan migration dan seeder**
```bash
php artisan migrate:fresh --seed
```
Perintah ini akan membuat semua tabel dan mengisi data awal (10 kedai + 10 ulasan).

**7. Jalankan server development**
```bash
php artisan serve
```

**8. Buka di browser**
```
http://127.0.0.1:8000
```

---

## 🔁 Alur Kerja Aplikasi

```
User (Browser)
     │
     │  HTTP Request
     ▼
routes/web.php  ──────────────────────────────────────────┐
     │                                                     │
     ▼                                                     │
KedaiKopiController / UlasanController                    │
     │                                                     │
     │  Eloquent ORM (create / find / where / update / delete)
     ▼                                                     │
Model: KedaiKopi ◄──── hasMany ────► Model: Ulasan        │
     │                                                     │
     │  Query ke Database                                  │
     ▼                                                     │
MySQL Database (kedai_kopi, ulasan)                        │
     │                                                     │
     │  Data dikembalikan ke Controller                    │
     ▼                                                     │
Blade View (index / show / create / edit)  ◄──────────────┘
     │
     │  HTML Response
     ▼
User (Browser)
```

---

## 🧠 Konsep yang Diterapkan

### 1. Arsitektur MVC
Laravel memisahkan logika aplikasi menjadi tiga lapisan:
- **Model** → representasi data & interaksi database
- **View** → tampilan yang dilihat pengguna (Blade template)
- **Controller** → perantara yang menerima request dan mengembalikan response

### 2. Eloquent ORM
Eloquent adalah Object-Relational Mapper bawaan Laravel yang memungkinkan interaksi database menggunakan sintaks PHP tanpa menulis SQL mentah.

```php
// Contoh penggunaan dalam proyek ini:

// READ — ambil semua kedai dengan eager loading ulasan
KedaiKopi::with('ulasan')->orderBy('rating', 'desc')->paginate(6);

// READ — cari kedai berdasarkan nama/kota
KedaiKopi::where('nama_kedai', 'like', "%$keyword%")->get();

// CREATE — simpan kedai baru
KedaiKopi::create($request->validated());

// FIND — ambil satu data by ID
$kedai = KedaiKopi::find($id);

// UPDATE — perbarui data
$kedai->update($request->validated());

// DELETE — hapus data (ulasan ikut terhapus via cascade)
$kedai->delete();
```

### 3. Relasi Database dengan Eloquent

```php
// KedaiKopi.php — satu kedai punya banyak ulasan
public function ulasan() {
    return $this->hasMany(Ulasan::class, 'kedai_kopi_id');
}

// Ulasan.php — setiap ulasan milik satu kedai
public function kedaiKopi() {
    return $this->belongsTo(KedaiKopi::class, 'kedai_kopi_id');
}
```

---

## 🛠️ Teknologi yang Digunakan

| Teknologi | Versi | Peran |
|-----------|-------|-------|
| Laravel | 13.x | Framework utama (routing, ORM, Blade, validasi) |
| PHP | 8.5 | Bahasa pemrograman server-side |
| MySQL | 8.0 | Sistem manajemen database relasional |
| Eloquent ORM | Built-in | Interaksi database berbasis objek |
| Blade | Built-in | Template engine untuk View |
| Composer | Latest | Package manager PHP |
| Laragon | 6.x | Local development environment |
| HTML5 + CSS3 | - | Struktur dan tampilan antarmuka |

---

## 👨‍💻 Identitas

| | |
|---|---|
| **Nama** | Muhammad Hafidz |
| **Mata Kuliah** | Pemrograman Berbasis Web |
| **Program Studi** | Informatika |
| **Jenis Tugas** | Tugas Individu — Semester 4 |
| **Framework** | Laravel 13.x |

---

<div align="center">

*Dibuat dengan ☕ dan Laravel untuk keperluan tugas akademik*

</div>