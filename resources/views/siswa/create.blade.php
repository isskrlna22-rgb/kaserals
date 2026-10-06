<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Siswa - KASERALS</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f8fafc;
            color: #0f172a;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            border: 1px solid #cbd5e1;
            border-radius: 16px;
            padding: 30px;
        }

        h1 {
            font-size: 25px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #64748b;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #0d9488;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            padding: 12px 18px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-save {
            background: #0d9488;
            color: white;
        }

        .btn-save:hover {
            background: #0f766e;
        }

        .btn-back {
            background: #e2e8f0;
            color: #0f172a;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Tambah Data Siswa</h1>

        <p class="subtitle">
            Masukkan data siswa untuk menambahkan siswa baru.
        </p>

        <form action="{{ route('data-siswa.store') }}" method="POST">
            @csrf

            {{-- NISN --}}
            <div class="form-group">
                <label for="nisn">NISN</label>

                <input
                    type="text"
                    id="nisn"
                    name="nisn"
                    value="{{ old('nisn') }}"
                    placeholder="Masukkan NISN"
                    required
                >

                @error('nisn')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            {{-- NAMA LENGKAP --}}
            <div class="form-group">
                <label for="nama_lengkap">Nama Siswa</label>

                <input
                    type="text"
                    id="nama_lengkap"
                    name="nama_lengkap"
                    value="{{ old('nama_lengkap') }}"
                    placeholder="Masukkan nama lengkap siswa"
                    required
                >

                @error('nama_lengkap')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            {{-- KELAS --}}
            <div class="form-group">
                <label for="kelas">Kelas</label>

                <input
                    type="text"
                    id="kelas"
                    name="kelas"
                    value="{{ old('kelas') }}"
                    placeholder="Contoh: XII RPL 1"
                    required
                >

                @error('kelas')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            {{-- NO HP --}}
            <div class="form-group">
                <label for="no_hp">No. HP</label>

                <input
                    type="text"
                    id="no_hp"
                    name="no_hp"
                    value="{{ old('no_hp') }}"
                    placeholder="Masukkan nomor HP"
                >

                @error('no_hp')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            {{-- BUTTON --}}
            <div class="actions">

                <a href="{{ route('data-siswa.index') }}" class="btn btn-back">
                    Kembali
                </a>

                <button type="submit" class="btn btn-save">
                    Simpan Siswa
                </button>

            </div>

        </form>

    </div>

</div>

</body>

</html>
