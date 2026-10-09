<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Akun - KASERALS</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f8fafc;
            padding: 40px;
            color: #0f172a;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            padding: 35px;
            border-radius: 24px;
            box-shadow: 0 10px 40px rgba(15, 23, 42, 0.08);
        }

        h1 {
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
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 14px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 15px;
        }

        button,
        .back {
            display: inline-block;
            padding: 13px 20px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-save {
            background: #0d9488;
            color: white;
        }

        .back {
            background: #e2e8f0;
            color: #334155;
            margin-right: 10px;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Tambah Akun Baru</h1>

        <p class="subtitle">
            Tambahkan akun pengguna KASERALS.
        </p>

        <form action="{{ route('akun.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nama Lengkap</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="email">Email</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="role">Hak Akses / Peran</label>

                <select id="role" name="role" required>
                    <option value="">-- Pilih Peran --</option>
                    <option value="ADMIN">Admin</option>
                    <option value="BENDAHARA">Bendahara</option>
                    <option value="WALI_KELAS">Wali Kelas</option>
                    <option value="SISWA">Siswa</option>
                </select>
            </div>

            <div class="form-group">
                <label for="password">Password</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                >
            </div>

            <a href="{{ route('akun.index') }}" class="back">
                Batal
            </a>

            <button type="submit" class="btn-save">
                Simpan Akun
            </button>

        </form>

    </div>

</body>

</html>
