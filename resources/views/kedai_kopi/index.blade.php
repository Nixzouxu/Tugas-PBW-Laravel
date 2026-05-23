<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Kedai Kopi Lokal Indonesia</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Lato:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --espresso:   #2C1A0E;
            --dark-roast: #4A2C17;
            --medium:     #7B4F2E;
            --caramel:    #C07D3A;
            --latte:      #D4A96A;
            --cream:      #F5ECD7;
            --milk:       #FBF5EA;
            --white:      #FFFFFF;
            --success:    #2D6A4F;
            --danger:     #9B2226;
            --shadow-sm:  0 2px 8px rgba(44,26,14,.10);
            --shadow-md:  0 4px 20px rgba(44,26,14,.14);
            --shadow-lg:  0 8px 40px rgba(44,26,14,.18);
            --radius:     14px;
            --radius-sm:  8px;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Lato', sans-serif;
            background: var(--milk);
            color: var(--espresso);
            min-height: 100vh;
        }

        .hero {
            background: linear-gradient(135deg, var(--espresso) 0%, var(--dark-roast) 60%, var(--medium) 100%);
            padding: 52px 24px 44px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .hero::before {
            content: '☕';
            position: absolute;
            font-size: 220px;
            opacity: .04;
            top: -30px; right: -20px;
            line-height: 1;
        }
        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(26px, 4vw, 42px);
            color: var(--cream);
            letter-spacing: .5px;
            line-height: 1.2;
        }
        .hero p {
            color: var(--latte);
            font-size: 15px;
            margin-top: 8px;
            font-weight: 300;
            letter-spacing: .4px;
        }

        .toolbar {
            background: var(--white);
            border-bottom: 1px solid #EDE0CC;
            padding: 16px 24px;
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: var(--shadow-sm);
        }
        .toolbar form {
            display: flex;
            gap: 8px;
            flex: 1;
            min-width: 0;
            flex-wrap: wrap;
        }
        .toolbar input[type="text"] {
            flex: 1;
            min-width: 180px;
            padding: 9px 14px;
            border: 1.5px solid #E0CBAA;
            border-radius: var(--radius-sm);
            font-size: 14px;
            font-family: 'Lato', sans-serif;
            background: var(--milk);
            color: var(--espresso);
            transition: border-color .2s;
        }
        .toolbar input[type="text"]:focus {
            outline: none;
            border-color: var(--caramel);
        }
        .toolbar select {
            padding: 9px 12px;
            border: 1.5px solid #E0CBAA;
            border-radius: var(--radius-sm);
            font-size: 14px;
            font-family: 'Lato', sans-serif;
            background: var(--milk);
            color: var(--espresso);
            cursor: pointer;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 9px 18px;
            border-radius: var(--radius-sm);
            font-size: 13px;
            font-weight: 700;
            font-family: 'Lato', sans-serif;
            cursor: pointer;
            text-decoration: none;
            border: none;
            transition: transform .15s, box-shadow .15s, opacity .15s;
            white-space: nowrap;
        }
        .btn:hover { transform: translateY(-1px); box-shadow: var(--shadow-sm); }
        .btn:active { transform: translateY(0); }
        .btn-primary   { background: var(--dark-roast); color: var(--cream); }
        .btn-success   { background: var(--success);    color: #fff; }
        .btn-caramel   { background: var(--caramel);    color: #fff; }
        .btn-danger    { background: var(--danger);     color: #fff; }
        .btn-ghost     { background: transparent; color: var(--medium); border: 1.5px solid #E0CBAA; }
        .btn-ghost:hover { background: var(--cream); }
        .btn-sm { padding: 6px 12px; font-size: 12px; }

        .main { max-width: 1200px; margin: 0 auto; padding: 28px 20px 60px; }

        .alert {
            padding: 12px 18px;
            border-radius: var(--radius-sm);
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .alert-success { background: #D4EDDA; color: #155724; border-left: 4px solid #28a745; }
        .alert-error   { background: #F8D7DA; color: #721c24; border-left: 4px solid #dc3545; }

        .meta-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 8px;
        }
        .meta-count {
            font-size: 14px;
            color: var(--medium);
        }
        .meta-count strong { color: var(--espresso); }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 20px;
        }
        .card {
            background: var(--white);
            border-radius: var(--radius);
            border: 1px solid #EDE0CC;
            overflow: hidden;
            transition: box-shadow .2s, transform .2s;
            display: flex;
            flex-direction: column;
        }
        .card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-3px);
        }

        .card-top {
            background: linear-gradient(135deg, var(--espresso), var(--dark-roast));
            padding: 18px 20px 14px;
            position: relative;
        }
        .card-badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .5px;
            text-transform: uppercase;
            background: rgba(255,255,255,.15);
            color: var(--latte);
            border: 1px solid rgba(255,255,255,.2);
            margin-bottom: 8px;
        }
        .card-name {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            color: var(--cream);
            line-height: 1.2;
        }
        .card-location {
            font-size: 12px;
            color: var(--latte);
            margin-top: 4px;
            opacity: .85;
        }

        .card-body { padding: 16px 20px; flex: 1; }
        .card-coffee {
            font-size: 13px;
            color: var(--medium);
            margin-bottom: 10px;
            font-style: italic;
        }
        .card-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .card-rating {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: var(--caramel);
            color: #fff;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 700;
        }
        .card-price {
            font-size: 13px;
            font-weight: 700;
            color: var(--dark-roast);
        }
        .card-desc {
            font-size: 13px;
            color: #7a6050;
            line-height: 1.55;
        }
        .card-ulasan-count {
            margin-top: 8px;
            font-size: 12px;
            color: var(--medium);
        }

        .card-footer {
            padding: 12px 20px;
            border-top: 1px solid #F0E4CC;
            background: #FDFAF4;
            display: flex;
            gap: 8px;
            justify-content: flex-end;
        }

        .empty {
            text-align: center;
            padding: 80px 20px;
            color: var(--medium);
        }
        .empty-icon { font-size: 64px; margin-bottom: 16px; opacity: .4; }
        .empty h3 {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            margin-bottom: 8px;
            color: var(--dark-roast);
        }
        .empty p { font-size: 14px; margin-bottom: 20px; }

        .paging {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 6px;
            margin-top: 36px;
            flex-wrap: wrap;
        }
        .paging a, .paging span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            height: 36px;
            padding: 0 10px;
            border-radius: var(--radius-sm);
            font-size: 13px;
            font-weight: 600;
            font-family: 'Lato', sans-serif;
            text-decoration: none;
            border: 1.5px solid #E0CBAA;
            color: var(--dark-roast);
            background: var(--white);
            transition: all .15s;
        }
        .paging a:hover { background: var(--cream); border-color: var(--caramel); }
        .paging span.active {
            background: var(--dark-roast);
            color: var(--cream);
            border-color: var(--dark-roast);
        }
        .paging span.disabled {
            opacity: .35;
            cursor: not-allowed;
        }

        footer {
            background: var(--espresso);
            color: var(--latte);
            text-align: center;
            padding: 20px;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            .grid { grid-template-columns: 1fr; }
            .toolbar { padding: 12px 16px; }
            .main { padding: 20px 14px 50px; }
        }
    </style>
</head>
<body>

<header class="hero">
    <h1>☕ Katalog Kedai Kopi Lokal Indonesia</h1>
    <p>Temukan cita rasa kopi terbaik dari seluruh Nusantara</p>
</header>

<div class="toolbar">
    <form method="GET" action="{{ route('kedai.index') }}">
        <input type="text" name="search"
               placeholder="🔍 Cari nama, kota, kopi..."
               value="{{ request('search') }}">
        <select name="suasana">
            <option value="">Semua Suasana</option>
            @foreach($suasanaList as $s)
                <option value="{{ $s }}" {{ request('suasana') == $s ? 'selected' : '' }}>{{ $s }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Cari</button>
        @if(request('search') || request('suasana'))
            <a href="{{ route('kedai.index') }}" class="btn btn-ghost">✕ Reset</a>
        @endif
    </form>
    <a href="{{ route('kedai.create') }}" class="btn btn-success">＋ Tambah Kedai</a>
</div>

<main class="main">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    <div class="meta-row">
        <p class="meta-count">
            Menampilkan <strong>{{ $kedaiKopis->total() }}</strong> kedai kopi
            @if(request('search')) — hasil untuk "<em>{{ request('search') }}</em>" @endif
        </p>
    </div>

    @if($kedaiKopis->count() > 0)
        <div class="grid">
            @foreach($kedaiKopis as $kedai)
            <div class="card">
                <div class="card-top">
                    <div class="card-badge">{{ $kedai->suasana }}</div>
                    <div class="card-name">{{ $kedai->nama_kedai }}</div>
                    <div class="card-location">{{ $kedai->kota }}, {{ $kedai->provinsi }}</div>
                </div>
                <div class="card-body">
                    <div class="card-coffee">☕ {{ $kedai->kopi_unggulan }}</div>
                    <div class="card-row">
                        <span class="card-rating">{{ number_format($kedai->rating, 1) }}</span>
                        <span class="card-price">{{ $kedai->harga_format }}</span>
                    </div>
                    <p class="card-desc">{{ Str::limit($kedai->deskripsi, 90) }}</p>
                    <p class="card-ulasan-count">{{ $kedai->ulasan_count ?? $kedai->ulasan->count() }} ulasan</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('kedai.show', $kedai->id) }}" class="btn btn-primary btn-sm">Detail</a>
                    <a href="{{ route('kedai.edit', $kedai->id) }}" class="btn btn-caramel btn-sm">Edit</a>
                    <form action="{{ route('kedai.destroy', $kedai->id) }}" method="POST"
                          onsubmit="return confirm('Hapus {{ addslashes($kedai->nama_kedai) }}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination custom (bukan default Laravel yang jelek) --}}
        @if($kedaiKopis->lastPage() > 1)
        <div class="paging">
            {{-- Prev --}}
            @if($kedaiKopis->onFirstPage())
                <span class="disabled">‹ Prev</span>
            @else
                <a href="{{ $kedaiKopis->appends(request()->query())->previousPageUrl() }}">‹ Prev</a>
            @endif

            {{-- Nomor halaman --}}
            @for($p = 1; $p <= $kedaiKopis->lastPage(); $p++)
                @if($p == $kedaiKopis->currentPage())
                    <span class="active">{{ $p }}</span>
                @else
                    <a href="{{ $kedaiKopis->appends(request()->query())->url($p) }}">{{ $p }}</a>
                @endif
            @endfor

            {{-- Next --}}
            @if($kedaiKopis->hasMorePages())
                <a href="{{ $kedaiKopis->appends(request()->query())->nextPageUrl() }}">Next ›</a>
            @else
                <span class="disabled">Next ›</span>
            @endif
        </div>
        @endif

    @else
        <div class="empty">
            <div class="empty-icon">☕</div>
            <h3>Tidak ada kedai ditemukan</h3>
            <p>Coba kata kunci lain atau reset filter pencarian.</p>
            <a href="{{ route('kedai.index') }}" class="btn btn-primary">Tampilkan Semua</a>
        </div>
    @endif

</main>

<footer>
    <p>Katalog Kedai Kopi Lokal Indonesia &copy; {{ date('Y') }} — Tugas PBW Eloquent ORM</p>
</footer>

</body>
</html>