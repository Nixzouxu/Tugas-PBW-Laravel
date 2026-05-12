<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $kedai->nama_kedai }} - Katalog Kopi</title>
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
</head>
<body>
    <header>
        <a href="/">← Kembali ke Katalog</a>
    </header>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>{{ $kedai->nama_kedai }}</h1>
                <span class="rating">{{ $kedai->rating }}</span>
            </div>

            <div class="kota">{{ $kedai->kota }}, {{ $kedai->provinsi }}</div>

            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Kopi Unggulan</div>
                    <div class="info-value">☕ {{ $kedai->kopi_unggulan }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Suasana</div>
                    <div class="info-value">{{ $kedai->suasana }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Jam Buka</div>
                    <div class="info-value">{{ $kedai->jam_buka }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Harga Mulai</div>
                    <div class="info-value">Rp {{ number_format($kedai->harga_mulai, 0, ',', '.') }}</div>
                </div>
            </div>

            <p class="deskripsi">{{ $kedai->deskripsi }}</p>

            <a href="/" class="btn-back">← Kembali ke Katalog</a>
        </div>
    </div>
</body>
</html>