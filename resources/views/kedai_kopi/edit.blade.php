<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kedai: {{ $kedai->nama_kedai }}</title>
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
        .edit-badge {
            display: inline-block;
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffc107;
            border-radius: 20px;
            padding: 4px 14px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 16px;
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
        .btn-row { display: flex; gap: 12px; margin-top: 12px; }
        .btn-submit {
            flex: 1;
            background: #d4a520;
            color: white;
            padding: 14px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
        }
        .btn-submit:hover { background: #b8891a; }
        .btn-cancel {
            flex: 1;
            background: #6f4e37;
            color: white;
            padding: 14px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 16px;
            font-weight: 700;
            text-align: center;
            display: block;
        }
        .id-info {
            font-size: 12px;
            color: #9a7a5a;
            background: #f8f4ef;
            padding: 6px 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('kedai.show', $kedai->id) }}" class="back-btn">← Kembali ke Detail</a>

        <div class="form-card">
            <div class="edit-badge">Mode Edit</div>
            <h1>Edit: {{ $kedai->nama_kedai }}</h1>
            <p class="subtitle">Perbarui informasi kedai kopi di bawah ini.</p>
            <span class="id-info">ID Kedai: #{{ $kedai->id }}</span>

            {{--
                Method PUT digunakan karena HTML form hanya mendukung GET dan POST.
                Laravel akan membaca @method('PUT') via method spoofing.
                Ini adalah cara standar Eloquent update() lewat form HTML.
            --}}
            <form action="{{ route('kedai.update', $kedai->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="form-group">
                        <label for="nama_kedai">Nama Kedai *</label>
                        <input type="text" id="nama_kedai" name="nama_kedai"
                               value="{{ old('nama_kedai', $kedai->nama_kedai) }}"
                               class="{{ $errors->has('nama_kedai') ? 'is-invalid' : '' }}">
                        @error('nama_kedai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kopi_unggulan">Kopi Unggulan *</label>
                        <input type="text" id="kopi_unggulan" name="kopi_unggulan"
                               value="{{ old('kopi_unggulan', $kedai->kopi_unggulan) }}"
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
                               value="{{ old('kota', $kedai->kota) }}"
                               class="{{ $errors->has('kota') ? 'is-invalid' : '' }}">
                        @error('kota')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="provinsi">Provinsi *</label>
                        <input type="text" id="provinsi" name="provinsi"
                               value="{{ old('provinsi', $kedai->provinsi) }}"
                               class="{{ $errors->has('provinsi') ? 'is-invalid' : '' }}">
                        @error('provinsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="suasana">Suasana *</label>
                        <select id="suasana" name="suasana">
                            @foreach(['Modern', 'Cozy', 'Vintage', 'Tradisional', 'Artisan', 'Industrial'] as $s)
                                <option value="{{ $s }}"
                                    {{ old('suasana', $kedai->suasana) == $s ? 'selected' : '' }}>
                                    {{ $s }}
                                </option>
                            @endforeach
                        </select>
                        @error('suasana')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jam_buka">Jam Buka *</label>
                        <input type="text" id="jam_buka" name="jam_buka"
                               value="{{ old('jam_buka', $kedai->jam_buka) }}"
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
                               value="{{ old('harga_mulai', $kedai->harga_mulai) }}"
                               min="0"
                               class="{{ $errors->has('harga_mulai') ? 'is-invalid' : '' }}">
                        @error('harga_mulai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="rating">Rating (1.0 - 5.0) *</label>
                        <input type="number" id="rating" name="rating"
                               value="{{ old('rating', $kedai->rating) }}"
                               min="1" max="5" step="0.1"
                               class="{{ $errors->has('rating') ? 'is-invalid' : '' }}">
                        @error('rating')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi *</label>
                    <textarea id="deskripsi" name="deskripsi"
                              class="{{ $errors->has('deskripsi') ? 'is-invalid' : '' }}">{{ old('deskripsi', $kedai->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="btn-row">
                    <a href="{{ route('kedai.show', $kedai->id) }}" class="btn-cancel">
                        ✕ Batal
                    </a>
                    <button type="submit" class="btn-submit">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>