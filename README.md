# KATALOG KEDAI KOPI LOKAL INDONESIA

> Aplikasi web berbasis Laravel Framework yang menerapkan pola arsitektur Model-View-Controller (MVC) untuk menampilkan katalog kedai kopi lokal dari seluruh Nusantara.

---

## IDENTITAS

| Keterangan     | Detail                          |
|----------------|---------------------------------|
| Mata Kuliah    | Pemrograman Berbasis Web        |
| Jenis Tugas    | Tugas Individu                  |
| Framework      | Laravel 13.x                    |
| Bahasa         | PHP 8.5                         |
| Database       | MySQL                           |
| Template       | Blade Template Engine           |

---

## DESKRIPSI PROYEK

Aplikasi **Katalog Kedai Kopi Lokal Indonesia** adalah sebuah sistem berbasis web yang dibangun menggunakan framework Laravel dengan pendekatan arsitektur MVC. Aplikasi ini menampilkan daftar kedai kopi lokal dari berbagai daerah di Indonesia lengkap dengan informasi detail setiap kedai, mulai dari lokasi, kopi unggulan, suasana, jam operasional, hingga harga.

Proyek ini dikembangkan sebagai implementasi nyata dari konsep MVC dalam pengembangan web modern, di mana setiap lapisan memiliki tanggung jawab yang jelas dan terpisah.

---

## KONSEP MVC YANG DITERAPKAN

### Model
Model berperan sebagai lapisan yang bertanggung jawab atas semua interaksi dengan database. Dalam proyek ini, model `KedaiKopi` merepresentasikan tabel `kedai_kopi` dan mendefinisikan atribut yang dapat diisi secara massal melalui properti `$fillable`.

**File:** `app/Models/KedaiKopi.php`

### View
View adalah lapisan presentasi yang bertanggung jawab menampilkan data kepada pengguna. Proyek ini menggunakan Blade Template Engine milik Laravel dengan dua halaman utama: halaman daftar kedai dan halaman detail kedai. File CSS dipisahkan dari HTML untuk menjaga kerapian dan prinsip separation of concerns.

**File:** `resources/views/kedai_kopi/index.blade.php`  
**File:** `resources/views/kedai_kopi/show.blade.php`

### Controller
Controller berperan sebagai jembatan antara Model dan View. Controller menerima request dari pengguna, mengambil data melalui Model, lalu mengirimkan data tersebut ke View untuk ditampilkan.

**File:** `app/Http/Controllers/KedaiKopiController.php`

---

## STRUKTUR DIREKTORI

```
tugas-pbw/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── KedaiKopiController.php
│   └── Models/
│       └── KedaiKopi.php
├── database/
│   ├── migrations/
│   │   └── xxxx_create_kedai_kopi_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       └── KedaiKopiSeeder.php
├── public/
│   └── css/
│       ├── index.css
│       └── show.css
├── resources/
│   └── views/
│       └── kedai_kopi/
│           ├── index.blade.php
│           └── show.blade.php
├── routes/
│   └── web.php
└── .env
```

---

## SKEMA DATABASE

**Tabel:** `kedai_kopi`

| Kolom          | Tipe Data       | Keterangan                        |
|----------------|-----------------|-----------------------------------|
| id             | BIGINT UNSIGNED | Primary Key, Auto Increment       |
| nama_kedai     | VARCHAR(255)    | Nama kedai kopi                   |
| kota           | VARCHAR(255)    | Kota lokasi kedai                 |
| provinsi       | VARCHAR(255)    | Provinsi lokasi kedai             |
| kopi_unggulan  | VARCHAR(255)    | Menu kopi andalan                 |
| suasana        | VARCHAR(255)    | Nuansa kedai (Modern, Cozy, dll.) |
| harga_mulai    | INT             | Harga terendah menu               |
| deskripsi      | TEXT            | Deskripsi lengkap kedai           |
| jam_buka       | VARCHAR(255)    | Jam operasional                   |
| rating         | DECIMAL(2,1)    | Penilaian kedai (skala 1-5)       |
| created_at     | TIMESTAMP       | Waktu data dibuat                 |
| updated_at     | TIMESTAMP       | Waktu data diperbarui             |

---

## FITUR APLIKASI

- Menampilkan seluruh daftar kedai kopi yang diurutkan berdasarkan rating tertinggi
- Menampilkan detail informasi lengkap setiap kedai kopi
- Tampilan responsif dengan desain bertema kopi yang hangat
- CSS terpisah dari HTML untuk masing-masing halaman
- Data diambil langsung dari database MySQL melalui Eloquent ORM

---

## CARA MENJALANKAN PROYEK

### Persyaratan Sistem

- PHP versi 8.2 atau lebih tinggi
- Composer
- MySQL
- Laravel 13.x

### Langkah Instalasi

**1. Clone atau ekstrak proyek**

```bash
cd tugas-pbw
```

**2. Install dependencies**

```bash
composer install
```

**3. Salin file konfigurasi environment**

```bash
cp .env.example .env
```

**4. Generate application key**

```bash
php artisan key:generate
```

**5. Konfigurasi database di file `.env`**

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tugas_pbw
DB_USERNAME=root
DB_PASSWORD=
```

**6. Jalankan migrasi dan seeder**

```bash
php artisan migrate:fresh --seed
```

**7. Jalankan server**

```bash
php artisan serve
```

**8. Buka di browser**

```
http://127.0.0.1:8000
```

---

## ALUR KERJA APLIKASI

```
Browser Request
      |
      v
  routes/web.php
      |
      v
KedaiKopiController
      |
      v
  Model KedaiKopi  <------>  Database (kedai_kopi)
      |
      v
  View Blade Template
      |
      v
Browser Response (HTML + CSS)
```

---

## ROUTES

| Method | URI           | Controller Method | Keterangan                   |
|--------|---------------|-------------------|------------------------------|
| GET    | /             | index             | Menampilkan semua kedai kopi |
| GET    | /kedai/{id}   | show              | Menampilkan detail satu kedai|

---

## DATA SAMPLE

Aplikasi dilengkapi dengan 10 data kedai kopi lokal dari berbagai daerah Indonesia, antara lain:

- Kopi Aceh Solong - Banda Aceh, Aceh
- Kopi Tuku - Jakarta Selatan, DKI Jakarta
- Kopi Kenangan - Bandung, Jawa Barat
- Janji Jiwa - Surabaya, Jawa Timur
- Fore Coffee - Yogyakarta, DI Yogyakarta
- Anomali Coffee - Bali
- Dua Coffee - Medan, Sumatera Utara
- Filosofi Kopi - Jakarta Pusat, DKI Jakarta
- Kopi Lain Hati - Semarang, Jawa Tengah
- Toraja Coffee House - Makassar, Sulawesi Selatan

---

## TEKNOLOGI YANG DIGUNAKAN

| Teknologi         | Versi     | Fungsi                              |
|-------------------|-----------|-------------------------------------|
| Laravel Framework | 13.x      | Framework utama aplikasi web        |
| PHP               | 8.5       | Bahasa pemrograman server-side      |
| MySQL             | 8.x       | Sistem manajemen database           |
| Blade             | Built-in  | Template engine untuk View          |
| Eloquent ORM      | Built-in  | Object-Relational Mapping           |
| Composer          | Latest    | Dependency manager PHP              |
| Laragon           | 6.x       | Local development environment       |
| HTML5 + CSS3      | -         | Struktur dan tampilan antarmuka     |

---

*Tugas Individu - Mata Kuliah Pemrograman Berbasis Web*