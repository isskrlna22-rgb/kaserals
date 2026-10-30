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

        .error-message {
            display: none;
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
            font-weight: 600;
        }

        input.invalid,
        select.invalid {
            border-color: #dc2626;
            background: #fffafa;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Tambah Akun Baru</h1>

        <p class="subtitle">
            Tambahkan akun pengguna KASERALS.
        </p>

        <form action="{{ route('akun.store') }}" method="POST" novalidate>
            @csrf

            @if ($errors->any())
                <div
                    style="
        background: #fee2e2;
        color: #b91c1c;
        padding: 12px 16px;
        border-radius: 10px;
        margin-bottom: 20px;
        font-size: 14px;
    ">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="form-group">
                <label for="name">Nama Lengkap</label>

                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>

                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
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

                <input type="password" id="password" name="password" required>
            </div>

            <a href="{{ route('akun.index') }}" class="back">
                Batal
            </a>

            <button type="submit" class="btn-save">
                Simpan Akun
            </button>

        </form>

    </div>
    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            const fields = [{
                    id: 'name',
                    message: 'Nama lengkap wajib diisi.'
                },
                {
                    id: 'email',
                    message: 'Email wajib diisi.'
                },
                {
                    id: 'role',
                    message: 'Silakan pilih hak akses.'
                },
                {
                    id: 'password',
                    message: 'Password wajib diisi.'
                }
            ];

            let firstInvalid = null;

            fields.forEach(field => {
                const input = document.getElementById(field.id);
                let error = input.parentElement.querySelector('.error-message');

                if (!error) {
                    error = document.createElement('small');
                    error.className = 'error-message';
                    input.insertAdjacentElement('afterend', error);
                }

                let message = '';

                if (!input.value.trim()) {
                    message = field.message;
                } else if (field.id === 'email' && !input.validity.valid) {
                    message = 'Format email belum benar.';
                }

                input.classList.toggle('invalid', !!message);
                error.textContent = message;
                error.style.display = message ? 'block' : 'none';

                if (message && !firstInvalid) {
                    firstInvalid = input;
                }


                if (!/^[a-zA-Z0-9._%+-]+@admin\.kaserals\.id$/.test(emailValue)) {
                    e.preventDefault();
                    error.textContent = 'Gunakan format nama@admin.kaserals.id.';
                    email.focus();
                    return;
                }

            });

            if (firstInvalid) {
                e.preventDefault();
                firstInvalid.focus();
            }
        });
    </script>
</body>

</html>
