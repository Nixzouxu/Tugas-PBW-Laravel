<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kedai Kopi Baru</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Georgia', serif; background: #fdf6ec; color: #3e2c1c; }
        .container { max-width: 700px; margin: 40px auto; padding: 0 20px 40px; }
        .back-btn {
            display: inline-block;
            margin-bottom: 24px;
            padding: 10px 18px;
            background: #6f4e37;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
        }
        .form-card {
            background: white;
            border: 1px solid #e8d5b0;
            border-radius: 14px;
            padding: 32px;
            box-shadow: 0 4px 16px rgba(111,78,55,0.08);
        }
        .form-card h1 {
            color: #6f4e37;
            font-size: 24px;
            margin-bottom: 6px;
        }
        .form-card p.subtitle {
            color: #9a7a5a;
            font-size: 14px;
            margin-bottom: 28px;
        }
        .form-group { margin-bottom: 18px; }
        .form-group label {
            display: block;
            font-weight: 700;
            color: #3e2c1c;
            margin-bottom: 6px;
            font-size: 14px;
        }
        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 11px 14px;
            border: 1px solid #d4a96a;
            border-radius: 8px;
            font-size: 14px;
            background: #fffaf4;
            color: #3e2c1c;
            transition: border-color 0.2s;
        }
        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #6f4e37;
        }
        .form-group textarea { resize: vertical; min-height: 120px; }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        .is-invalid { border-color: #c0392b !important; }
        .invalid-feedback { color: #c0392b; font-size: 12px; margin-top: 4px; }
        .btn-submit {
            width: 100%;
            background: #6f4e37;
            color: white;
            padding: 14px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.2s;
        }
        .btn-submit:hover { background: #5a3e2b; }
        .required-note {
            font-size: 12px;
            color: #9a7a5a;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('kedai.index') }}" class="back-btn">← Kembali ke Katalog</a>

        <div class="form-card">
            <h1>☕ Tambah Kedai Kopi Baru</h1>
            <p class="subtitle">Isi formulir di bawah untuk menambahkan kedai kopi ke dalam katalog.</p>
            <p class="required-note">* Semua field wajib diisi</p>

            <form action="{{ route('kedai.store') }}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label for="nama_kedai">Nama Kedai *</label>
                        <input type="text" id="nama_kedai" name="nama_kedai"
                               value="{{ old('nama_kedai') }}"
                               placeholder="contoh: Kopi Nusantara"
                               class="{{ $errors->has('nama_kedai') ? 'is-invalid' : '' }}">
                        @error('nama_kedai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kopi_unggulan">Kopi Unggulan *</label>
                        <input type="text" id="kopi_unggulan" name="kopi_unggulan"
                               value="{{ old('kopi_unggulan') }}"
                               placeholder="contoh: Kopi Susu Aren"
                               class="{{ $errors->has('kopi_unggulan') ? 'is-invalid' : '' }}">
                        @error('kopi_unggulan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="kota">Kota *</label>
                        <input type="text" id="kota" name="kota"
                               value="{{ old('kota') }}"
                               placeholder="contoh: Banda Aceh"
                               class="{{ $errors->has('kota') ? 'is-invalid' : '' }}">
                        @error('kota')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="provinsi">Provinsi *</label>
                        <input type="text" id="provinsi" name="provinsi"
                               value="{{ old('provinsi') }}"
                               placeholder="contoh: Aceh"
                               class="{{ $errors->has('provinsi') ? 'is-invalid' : '' }}">
                        @error('provinsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="suasana">Suasana *</label>
                        <select id="suasana" name="suasana"
                                class="{{ $errors->has('suasana') ? 'is-invalid' : '' }}">
                            <option value="">-- Pilih Suasana --</option>
                            @foreach(['Modern', 'Cozy', 'Vintage', 'Tradisional', 'Artisan', 'Industrial'] as $s)
                                <option value="{{ $s }}" {{ old('suasana') == $s ? 'selected' : '' }}>{{ $s }}</option>
                            @endforeach
                        </select>
                        @error('suasana')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jam_buka">Jam Buka *</label>
                        <input type="text" id="jam_buka" name="jam_buka"
                               value="{{ old('jam_buka') }}"
                               placeholder="contoh: 07.00 - 22.00"
                               class="{{ $errors->has('jam_buka') ? 'is-invalid' : '' }}">
                        @error('jam_buka')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="harga_mulai">Harga Mulai (Rp) *</label>
                        <input type="number" id="harga_mulai" name="harga_mulai"
                               value="{{ old('harga_mulai') }}"
                               placeholder="contoh: 15000" min="0"
                               class="{{ $errors->has('harga_mulai') ? 'is-invalid' : '' }}">
                        @error('harga_mulai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="rating">Rating (1.0 - 5.0) *</label>
                        <input type="number" id="rating" name="rating"
                               value="{{ old('rating') }}"
                               placeholder="contoh: 4.5" min="1" max="5" step="0.1"
                               class="{{ $errors->has('rating') ? 'is-invalid' : '' }}">
                        @error('rating')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi *</label>
                    <textarea id="deskripsi" name="deskripsi"
                              placeholder="Ceritakan tentang kedai kopi ini..."
                              class="{{ $errors->has('deskripsi') ? 'is-invalid' : '' }}">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-submit">
                    ☕ Simpan Kedai Kopi
                </button>
            </form>
        </div>
    </div>
</body>
</html>