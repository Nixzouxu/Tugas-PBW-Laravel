<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Kedai Kopi Lokal Indonesia</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    <header>
        <h1>Katalog Kedai Kopi Lokal Indonesia</h1>
        <p>Temukan kedai kopi terbaik dari seluruh Nusantara</p>
    </header>

    <div class="container">
        <div class="stats">Menampilkan {{ $kedaiKopi->count() }} kedai kopi dari seluruh Indonesia</div>

        <div class="grid">
            @foreach ($kedaiKopi as $kedai)
            <div class="card">
                <div class="card-header">
                    <span class="nama-kedai">{{ $kedai->nama_kedai }}</span>
                    <span class="rating">{{ $kedai->rating }}</span>
                </div>

                <div class="kota">{{ $kedai->kota }}, {{ $kedai->provinsi }}</div>

                <span class="badge">{{ $kedai->suasana }}</span>
                <span class="badge">{{ $kedai->jam_buka }}</span>

                <p class="deskripsi">{{ Str::limit($kedai->deskripsi, 100) }}</p>

                <div class="footer-card">
                    <span class="harga">Mulai Rp {{ number_format($kedai->harga_mulai, 0, ',', '.') }}</span>
                    <a href="{{ route('kedai.show', $kedai->id) }}" class="btn">Lihat Detail →</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <footer>
        <p>Katalog Kedai Kopi Lokal Indonesia &copy; {{ date('Y') }}</p>
    </footer>
</body>
</html>