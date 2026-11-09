
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Akun - KASERALS</title>

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

        input:focus,
        select:focus {
            outline: none;
            border-color: #0d9488;
        }

        button,
        .back {
            display: inline-block;
            padding: 13px 20px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-save {
            background: #0d9488;
            color: white;
        }

        .btn-save:hover {
            background: #0f766e;
        }

        .back {
            background: #e2e8f0;
            color: #334155;
            margin-right: 10px;
        }

        .error-message {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
            font-weight: 600;
        }

        .error-input {
            border-color: #dc2626;
            background: #fffafa;
        }

        .hint {
            color: #64748b;
            font-size: 12px;
            margin-top: 7px;
        }

        @media (max-width: 640px) {
            body {
                padding: 15px;
            }

            .container {
                margin: 15px auto;
                padding: 25px;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Edit Akun Sistem</h1>

        <p class="subtitle">
            Perbarui informasi akun pengguna KASERALS.
        </p>

        @if ($errors->any())
            <div style="
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

        <form action="{{ route('akun.update', $user->id_users) }}"
              method="POST" id="editForm">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama Lengkap</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $user->name) }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="email">Email</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $user->email) }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="role">Hak Akses / Peran</label>

                <select id="role" name="role" required>
                    <option value="">-- Pilih Peran --</option>

                    <option value="ADMIN"
                        {{ old('role', $user->role) == 'ADMIN' ? 'selected' : '' }}>
                        Admin
                    </option>

                    <option value="BENDAHARA"
                        {{ old('role', $user->role) == 'BENDAHARA' ? 'selected' : '' }}>
                        Bendahara
                    </option>

                    <option value="WALI_KELAS"
                        {{ old('role', $user->role) == 'WALI_KELAS' ? 'selected' : '' }}>
                        Wali Kelas
                    </option>

                    <option value="SISWA"
                        {{ old('role', $user->role) == 'SISWA' ? 'selected' : '' }}>
                        Siswa
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="password">Password Baru</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Kosongkan jika tidak ingin mengganti password"
                >

                <p class="hint">
                    Password lama tetap digunakan jika bagian ini dikosongkan.
                </p>
            </div>

            <a href="{{ route('akun.index') }}" class="back">
                Batal
            </a>

            <button type="submit" class="btn-save">
                Simpan Perubahan
            </button>

        </form>

    </div>

    <script>
        document.getElementById('editForm').addEventListener('submit', function(e) {
            const name = document.getElementById('name');
            const email = document.getElementById('email');
            const role = document.getElementById('role');

            let firstInvalid = null;

            [name, email, role].forEach(input => {
                input.classList.remove('error-input');

                const oldError = input.parentElement.querySelector('.error-message');
                if (oldError) oldError.remove();

                let message = '';

                if (!input.value.trim()) {
                    message = 'Bagian ini wajib diisi.';
                } else if (input === email && !input.validity.valid) {
                    message = 'Format email belum benar.';
                }

                if (message) {
                    e.preventDefault();
                    input.classList.add('error-input');

                    const error = document.createElement('small');
                    error.className = 'error-message';
                    error.textContent = message;

                    input.insertAdjacentElement('afterend', error);

                    if (!firstInvalid) firstInvalid = input;
                }
            });

            if (firstInvalid) {
                firstInvalid.focus();
            }
        });
    </script>

</body>
</html>
