<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $kedai->nama_kedai }} — Katalog Kedai Kopi</title>
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
            --radius:     14px;
            --radius-sm:  8px;
            --shadow-sm:  0 2px 8px rgba(44,26,14,.10);
            --shadow-md:  0 4px 20px rgba(44,26,14,.14);
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Lato', sans-serif; background: var(--milk); color: var(--espresso); }

        /* ── TOPBAR ── */
        .topbar {
            background: var(--espresso);
            padding: 14px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }
        .back-link {
            color: var(--latte);
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: color .2s;
        }
        .back-link:hover { color: var(--cream); }
        .topbar-title {
            font-family: 'Playfair Display', serif;
            color: var(--cream);
            font-size: 16px;
            opacity: .7;
        }

        /* ── HERO ── */
        .hero {
            background: linear-gradient(135deg, var(--espresso) 0%, var(--dark-roast) 55%, #6B3A1F 100%);
            padding: 40px 24px 36px;
            position: relative;
            overflow: hidden;
        }
        .hero::after {
            content: '☕';
            position: absolute;
            right: 24px; top: 50%;
            transform: translateY(-50%);
            font-size: 100px;
            opacity: .06;
            pointer-events: none;
        }
        .hero-inner { max-width: 800px; margin: 0 auto; position: relative; z-index: 1; }
        .hero-badge {
            display: inline-block;
            padding: 4px 14px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .8px;
            text-transform: uppercase;
            background: rgba(255,255,255,.12);
            color: var(--latte);
            border: 1px solid rgba(255,255,255,.2);
            margin-bottom: 12px;
        }
        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(28px, 4vw, 44px);
            color: var(--cream);
            line-height: 1.15;
            margin-bottom: 8px;
        }
        .hero-location {
            color: var(--latte);
            font-size: 14px;
            opacity: .85;
            margin-bottom: 20px;
        }
        .hero-stats {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }
        .stat-pill {
            background: rgba(255,255,255,.1);
            border: 1px solid rgba(255,255,255,.18);
            border-radius: 30px;
            padding: 6px 16px;
            font-size: 13px;
            color: var(--cream);
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .stat-pill strong { color: var(--latte); }

        /* ── MAIN ── */
        .main { max-width: 800px; margin: 0 auto; padding: 28px 20px 60px; }

        /* ── ALERT ── */
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

        /* ── CARD ── */
        .card {
            background: var(--white);
            border: 1px solid #EDE0CC;
            border-radius: var(--radius);
            margin-bottom: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }
        .card-header {
            padding: 16px 20px;
            border-bottom: 1px solid #F0E4CC;
            background: var(--milk);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .card-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 17px;
            color: var(--dark-roast);
        }
        .card-header .count-badge {
            background: var(--caramel);
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            padding: 2px 9px;
            border-radius: 20px;
        }
        .card-body { padding: 20px; }

        /* ── INFO GRID ── */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 14px;
            margin-bottom: 20px;
        }
        .info-item {
            background: var(--milk);
            border: 1px solid #EDE0CC;
            border-radius: var(--radius-sm);
            padding: 12px 14px;
        }
        .info-item .lbl {
            font-size: 11px;
            color: var(--medium);
            text-transform: uppercase;
            letter-spacing: .6px;
            margin-bottom: 4px;
            font-weight: 700;
        }
        .info-item .val {
            font-size: 15px;
            font-weight: 700;
            color: var(--espresso);
        }
        .desc-box {
            background: var(--milk);
            border-left: 3px solid var(--caramel);
            border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
            padding: 14px 16px;
            font-size: 14px;
            line-height: 1.65;
            color: #5A3E28;
            margin-bottom: 20px;
        }

        /* ── ACTION ROW ── */
        .action-row {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 10px 20px;
            border-radius: var(--radius-sm);
            font-size: 13px;
            font-weight: 700;
            font-family: 'Lato', sans-serif;
            cursor: pointer;
            text-decoration: none;
            border: none;
            transition: transform .15s, box-shadow .15s;
        }
        .btn:hover { transform: translateY(-1px); box-shadow: var(--shadow-sm); }
        .btn-caramel { background: var(--caramel);    color: #fff; }
        .btn-danger  { background: var(--danger);     color: #fff; }
        .btn-primary { background: var(--dark-roast); color: var(--cream); }
        .btn-ghost   { background: transparent; color: var(--medium); border: 1.5px solid #E0CBAA; }
        .btn-ghost:hover { background: var(--cream); }

        /* ── RATING SUMMARY ── */
        .rating-summary {
            background: linear-gradient(135deg, var(--dark-roast), var(--medium));
            border-radius: var(--radius-sm);
            padding: 16px 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 16px;
            color: var(--cream);
        }
        .rating-big { font-size: 40px; font-weight: 800; line-height: 1; font-family: 'Playfair Display', serif; }
        .rating-info-text { font-size: 14px; font-weight: 600; }
        .rating-sub { font-size: 12px; opacity: .75; margin-top: 3px; }

        /* ── ULASAN CARD ── */
        .ulasan-item {
            border: 1px solid #EDE0CC;
            border-radius: var(--radius-sm);
            padding: 14px 16px;
            margin-bottom: 10px;
            background: var(--white);
            transition: box-shadow .2s;
        }
        .ulasan-item:hover { box-shadow: var(--shadow-sm); }
        .ulasan-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
            gap: 8px;
        }
        .ulasan-nama {
            font-weight: 700;
            font-size: 14px;
            color: var(--espresso);
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .ulasan-nama::before {
            content: '';
            width: 28px; height: 28px;
            background: var(--cream);
            border: 1.5px solid var(--latte);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            flex-shrink: 0;
        }
        .ulasan-right { display: flex; align-items: center; gap: 8px; }
        .rating-stars {
            background: var(--caramel);
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: 20px;
        }
        .ulasan-komentar {
            font-size: 13px;
            line-height: 1.6;
            color: #5A3E28;
            padding-left: 34px;
        }
        .ulasan-time {
            font-size: 11px;
            color: #AAA;
            padding-left: 34px;
            margin-top: 6px;
        }
        .btn-hapus-ulasan {
            background: none;
            border: 1px solid #ddd;
            color: var(--danger);
            padding: 3px 10px;
            border-radius: var(--radius-sm);
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
            font-family: 'Lato', sans-serif;
            transition: all .15s;
        }
        .btn-hapus-ulasan:hover { background: var(--danger); color: #fff; border-color: var(--danger); }

        .empty-ulasan {
            text-align: center;
            padding: 30px 20px;
            color: var(--medium);
            font-style: italic;
            font-size: 14px;
        }

        /* ── FORM ULASAN ── */
        .form-ulasan { margin-top: 6px; }
        .form-row-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
            margin-bottom: 14px;
        }
        .form-group { margin-bottom: 14px; }
        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: var(--medium);
            text-transform: uppercase;
            letter-spacing: .5px;
            margin-bottom: 6px;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px 14px;
            border: 1.5px solid #E0CBAA;
            border-radius: var(--radius-sm);
            font-size: 14px;
            font-family: 'Lato', sans-serif;
            background: var(--milk);
            color: var(--espresso);
            transition: border-color .2s;
        }
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--caramel);
        }
        .form-group textarea { resize: vertical; min-height: 90px; }
        .is-invalid { border-color: var(--danger) !important; }
        .err { color: var(--danger); font-size: 12px; margin-top: 4px; }
        .btn-kirim {
            width: 100%;
            background: var(--dark-roast);
            color: var(--cream);
            padding: 13px;
            border: none;
            border-radius: var(--radius-sm);
            font-size: 15px;
            font-weight: 700;
            font-family: 'Lato', sans-serif;
            cursor: pointer;
            transition: background .2s, transform .15s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-kirim:hover { background: var(--espresso); transform: translateY(-1px); }

        footer {
            background: var(--espresso);
            color: var(--latte);
            text-align: center;
            padding: 18px;
            font-size: 13px;
        }

        @media (max-width: 560px) {
            .info-grid { grid-template-columns: 1fr 1fr; }
            .form-row-2 { grid-template-columns: 1fr; }
            .hero-stats { gap: 8px; }
        }
    </style>
</head>
<body>

{{-- TOPBAR --}}
<div class="topbar">
    <a href="{{ route('kedai.index') }}" class="back-link">← Kembali ke Katalog</a>
    <span class="topbar-title">Detail Kedai</span>
</div>

{{-- HERO --}}
<div class="hero">
    <div class="hero-inner">
        <div class="hero-badge">{{ $kedai->suasana }}</div>
        <h1>{{ $kedai->nama_kedai }}</h1>
        <p class="hero-location">{{ $kedai->kota }}, {{ $kedai->provinsi }}</p>
        <div class="hero-stats">
            <div class="stat-pill">Rating <strong>{{ number_format($kedai->rating, 1) }}</strong></div>
            <div class="stat-pill">Mulai <strong>{{ $kedai->harga_format }}</strong></div>
            <div class="stat-pill"><strong>{{ $kedai->jam_buka }}</strong></div>
            <div class="stat-pill"><strong>{{ $kedai->ulasan->count() }}</strong> ulasan</div>
        </div>
    </div>
</div>

<main class="main">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- INFO KEDAI --}}
    <div class="card">
        <div class="card-header">
            <h2>☕ Informasi Kedai</h2>
        </div>
        <div class="card-body">
            <div class="info-grid">
                <div class="info-item">
                    <div class="lbl">Kopi Unggulan</div>
                    <div class="val">{{ $kedai->kopi_unggulan }}</div>
                </div>
                <div class="info-item">
                    <div class="lbl">Harga Mulai</div>
                    <div class="val">{{ $kedai->harga_format }}</div>
                </div>
                <div class="info-item">
                    <div class="lbl">Rating</div>
                    <div class="val">{{ number_format($kedai->rating, 1) }} / 5.0</div>
                </div>
                <div class="info-item">
                    <div class="lbl">Jam Buka</div>
                    <div class="val">{{ $kedai->jam_buka }}</div>
                </div>
                <div class="info-item">
                    <div class="lbl">Suasana</div>
                    <div class="val">{{ $kedai->suasana }}</div>
                </div>
                <div class="info-item">
                    <div class="lbl">Kota</div>
                    <div class="val">{{ $kedai->kota }}</div>
                </div>
            </div>
            <div class="desc-box">{{ $kedai->deskripsi }}</div>
            <div class="action-row">
                <a href="{{ route('kedai.edit', $kedai->id) }}" class="btn btn-caramel">✏️ Edit Kedai</a>
                <form action="{{ route('kedai.destroy', $kedai->id) }}" method="POST"
                      onsubmit="return confirm('Hapus {{ addslashes($kedai->nama_kedai) }}? Ulasan ikut terhapus!')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger">🗑 Hapus Kedai</button>
                </form>
            </div>
        </div>
    </div>

    {{-- ULASAN --}}
    <div class="card">
        <div class="card-header">
            <h2>💬 Ulasan Pengunjung</h2>
            <span class="count-badge">{{ $kedai->ulasan->count() }}</span>
        </div>
        <div class="card-body">

            @if($kedai->ulasan->count() > 0)
                <div class="rating-summary">
                    <div class="rating-big">{{ number_format($kedai->ulasan->avg('rating_ulasan'), 1) }}</div>
                    <div>
                        <div class="rating-info-text">Rata-rata Rating Ulasan</div>
                        <div class="rating-sub">dari {{ $kedai->ulasan->count() }} ulasan pengunjung</div>
                    </div>
                </div>
            @endif

            @forelse($kedai->ulasan->sortByDesc('created_at') as $ulasan)
                <div class="ulasan-item">
                    <div class="ulasan-top">
                        <div class="ulasan-nama">{{ $ulasan->nama_pengulas }}</div>
                        <div class="ulasan-right">
                            <span class="rating-stars">{{ number_format($ulasan->rating_ulasan, 1) }}</span>
                            <form action="{{ route('ulasan.destroy', $ulasan->id) }}" method="POST"
                                  onsubmit="return confirm('Hapus ulasan ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-hapus-ulasan">Hapus</button>
                            </form>
                        </div>
                    </div>
                    <p class="ulasan-komentar">{{ $ulasan->komentar }}</p>
                    <p class="ulasan-time">{{ $ulasan->created_at->locale('id')->diffForHumans() }}</p>
                </div>
            @empty
                <div class="empty-ulasan">Belum ada ulasan. Jadilah yang pertama!</div>
            @endforelse
        </div>
    </div>

    {{-- FORM TULIS ULASAN --}}
    <div class="card">
        <div class="card-header">
            <h2>Tulis Ulasan</h2>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div style="background:#f8d7da;color:#721c24;padding:12px 16px;border-radius:8px;margin-bottom:16px;font-size:13px;">
                    <ul style="margin:0;padding-left:18px;">
                        @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('ulasan.store', $kedai->id) }}" method="POST" class="form-ulasan">
                @csrf
                <div class="form-row-2">
                    <div class="form-group" style="margin-bottom:0">
                        <label>Nama Kamu *</label>
                        <input type="text" name="nama_pengulas"
                               value="{{ old('nama_pengulas') }}"
                               placeholder="Masukkan nama kamu..."
                               class="{{ $errors->has('nama_pengulas') ? 'is-invalid' : '' }}">
                        @error('nama_pengulas')<div class="err">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group" style="margin-bottom:0">
                        <label>Rating *</label>
                        <select name="rating_ulasan" class="{{ $errors->has('rating_ulasan') ? 'is-invalid' : '' }}">
                            <option value="">-- Pilih Rating --</option>
                            @for($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}" {{ old('rating_ulasan') == $i ? 'selected' : '' }}>
                                    {{ str_repeat('', $i) }} ({{ $i }}.0)
                                </option>
                            @endfor
                        </select>
                        @error('rating_ulasan')<div class="err">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="form-group" style="margin-top:14px">
                    <label>Komentar *</label>
                    <textarea name="komentar"
                              placeholder="Bagikan pengalamanmu (minimal 10 karakter)..."
                              class="{{ $errors->has('komentar') ? 'is-invalid' : '' }}">{{ old('komentar') }}</textarea>
                    @error('komentar')<div class="err">{{ $message }}</div>@enderror
                </div>
                <button type="submit" class="btn-kirim">📤 Kirim Ulasan</button>
            </form>
        </div>
    </div>

</main>

<footer>
    <p>Katalog Kedai Kopi Lokal Indonesia &copy; {{ date('Y') }}</p>
</footer>

</body>
</html>