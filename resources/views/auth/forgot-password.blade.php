<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lupa Password - KASERALS</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8fafc;
            color: #0f172a;
        }

        .page {
            min-height: 100vh;
            padding: 18px 14px 25px;
            max-width: 420px;
            margin: auto;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 14px;
        }

        .brand-logo {
            width: 28px;
            height: 28px;
            object-fit: contain;
            border-radius: 8px;
        }

        .brand-name {
            font-size: 15px;
            font-weight: 700;
        }

        .forgot-box {
            background: white;
            border-radius: 27px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
        }

        .header-card {
            background: linear-gradient(135deg, #d5f8f3, #f3fbfa);
            padding: 35px 18px 25px;
            text-align: center;
        }

        .header-logo {
            width: 125px;
            height: 125%;
            object-fit: contain;
            margin-bottom: 15px;
        }

        .header-title {
            margin: 0 0 8px;
            font-size: 21px;
            font-weight: 700;
            color: #0d9488;
        }

        .header-text {
            margin: 0 auto;
            max-width: 290px;
            font-size: 11px;
            line-height: 1.6;
            color: #64748b;
        }

        .form-card {
            padding: 20px 18px 22px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 17px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 13px;
            color: #94a3b8;
        }

        .form-input {
            width: 100%;
            height: 44px;
            border: 1px solid #dbe2ea;
            border-radius: 24px;
            padding: 0 42px;
            font-size: 12px;
            outline: none;
            background: #f8fafc;
        }

        .form-input:focus {
            border-color: #0d9488;
            background: white;
            box-shadow: 0 0 0 2px rgba(13, 148, 136, 0.08);
        }

        .error {
            color: #dc2626;
            font-size: 10px;
            margin: 5px 12px 0;
        }

        .status {
            color: #0d9488;
            font-size: 11px;
            margin-bottom: 12px;
            text-align: center;
        }

        .submit-button {
            width: 100%;
            height: 46px;
            border: none;
            border-radius: 25px;
            background: #0d9488;
            color: white;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 7px 15px rgba(13, 148, 136, 0.20);
        }

        .submit-button:hover {
            background: #0f766e;
        }

        .back-login {
            display: block;
            margin-top: 15px;
            text-align: center;
            color: #0d9488;
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
        }

        .back-login:hover {
            text-decoration: underline;
        }

        .footer {
            text-align: center;
            margin-top: 18px;
            color: #94a3b8;
            font-size: 10px;
        }
    </style>
</head>

<body>

    <div class="page">

        <div class="brand">
            <img src="{{ asset('images/logo k.png') }}"
                 alt="Logo KASERALS"
                 class="brand-logo">

            <span class="brand-name">
                KASERALS
            </span>
        </div>

        <div class="forgot-box">

            <div class="header-card">

                <img src="{{ asset('images/logo_k.png') }}"
                     alt="Logo KASERALS"
                     class="header-logo">

                <h1 class="header-title">
                    LUPA PASSWORD?
                </h1>

                <p class="header-text">
                    Masukkan email akun kamu untuk mendapatkan
                    link reset password.
                </p>

            </div>

            <div class="form-card">

                @if (session('status'))
                    <div class="status">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group">

                        <div class="input-wrapper">

                            <span class="input-icon">
                                ✉
                            </span>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                autocomplete="email"
                                placeholder="Masukkan email"
                                class="form-input"
                            >

                        </div>

                        @error('email')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <button type="submit" class="submit-button">
                        Kirim Link Reset Password
                    </button>

                </form>

                <a href="{{ route('login') }}" class="back-login">
                    ← Kembali ke Login
                </a>

            </div>

        </div>

        <div class="footer">
            KASERALS — Sistem Kas Kelas Digital
        </div>

    </div>

</body>

</html>
