<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - KASERALS</title>

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

        /* =====================
           HEADER
        ====================== */

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

        /* =====================
           BAGIAN UTAMA
        ====================== */

        .login-box {
            background: white;
            border-radius: 27px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
        }

        /* =====================
           WELCOME
        ====================== */

        .welcome-card {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg,
                    #d5f8f3,
                    #f3fbfa);

            padding: 35px 18px 25px;
            text-align: left;
        }

        .welcome-card::after {
            content: "";
            position: absolute;
            width: 82px;
            height: 82px;
            right: -18px;
            top: -18px;
            background: rgba(13, 148, 136, 0.12);
            border-radius: 50%;
        }

        .welcome-logo {
            display: block;
            width: 90px;
            height: 90px;
            object-fit: contain;
            margin: 0 auto 18px;
            position: relative;
            z-index: 1;
        }

        .welcome-title {
            position: relative;
            z-index: 1;
            font-size: 21px;
            margin: 0 0 7px;
            font-weight: 700;
            text-align: center;

        }

        .welcome-text {
            z-index: 1;
            margin: 0 auto;
            max-width: 280px;
            text-align: center;

            font-family: "Segoe UI", Arial, sans-serif;
            font-size: 11px;
            font-weight: 400;
            line-height: 1.6;
            letter-spacing: 0.1px;
            color: #64748b;
        }

        .welcome-text strong {
            font-weight: 700;
            color: #0d9488;

        }

        /* =====================
           FORM LOGIN
        ====================== */

        .login-card {
            background: white;
            padding: 20px 18px 17px;
        }

        .form-group {
            margin-bottom: 10px;
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
            z-index: 2;
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

        .password-input {
            padding-right: 42px;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #94a3b8;
            cursor: pointer;
            font-size: 12px;
        }

        /* =====================
           LUPA PASSWORD
        ====================== */

        .forgot-password {
            display: block;
            margin: 10px 4px 16px;
            text-align: right;
            color: #0d9488;
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        /* =====================
           ERROR
        ====================== */

        .error {
            color: #dc2626;
            font-size: 10px;
            margin: 4px 12px 0;
        }

        /* =====================
           LOGIN BUTTON
        ====================== */

        .login-button {
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

        .login-button:hover {
            background: #0f766e;
        }

        /* =====================
           FOOTER
        ====================== */

        .footer {
            text-align: center;
            margin-top: 18px;
            color: #94a3b8;
            font-size: 10px;
        }

        .footer strong {
            color: #0d9488;
        }

        /* =====================
           MOBILE
        ====================== */

        @media (max-width: 430px) {

            .page {
                padding: 20px 15px;
            }

            .welcome-card {
                padding: 30px 18px 22px;
            }

            .login-card {
                padding: 18px 16px 16px;
            }
        }
    </style>
</head>

<body>

    <div class="page">

        <!-- HEADER -->

        <div class="brand">

            <img src="{{ asset('images/logo k.png') }}" alt="Logo KASERALS" class="brand-logo">

            <span class="brand-name">
                KASERALS
            </span>

        </div>


        <!-- KOTAK UTAMA -->
        <!-- Welcome + Login SEKARANG MENYATU -->

        <div class="login-box">

            <!-- =====================
             WELCOME
        ====================== -->

            <div class="welcome-card">

                <img src="{{ asset('images/logo_kaserals.png') }}" alt="Logo KASERALS" class="welcome-logo">


                <h1 class="welcome-title" style="text-align: center;">
                    SELAMAT DATANG!
                </h1>
                <p class="welcome-text">
                    Login untuk lanjut mengelola kas kelas kamu bareng
                    <strong>KASERALS</strong>.
                </p>

            </div>


            <!-- =====================
             FORM LOGIN
        ====================== -->

            <div class="login-card">

                <form method="POST" action="{{ route('login') }}">
                     @csrf


                    <!-- EMAIL -->

                    <div class="form-group">

                        <div class="input-wrapper">

                            <span class="input-icon">
                                ✉
                            </span>

                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                autofocus autocomplete="username" placeholder="Masukkan email" class="form-input">

                        </div>

                        @error('email')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- PASSWORD -->

                    <div class="form-group">

                        <div class="input-wrapper">

                            <span class="input-icon">
                                🔒
                            </span>

                            <input id="password" type="password" name="password" required
                                autocomplete="current-password" placeholder="Masukkan password"
                                class="form-input password-input">

                            <button type="button" class="password-toggle" onclick="togglePassword()">
                                👁
                            </button>

                        </div>

                        @error('password')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- LUPA PASSWORD -->

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-password">
                            Lupa Password?
                        </a>
                    @endif


                    <!-- LOGIN -->

                    <button type="submit" class="login-button">
                        Login
                    </button>

                </form>

            </div>

        </div>


        <!-- FOOTER -->

        <div class="footer">
            Lupa password?
            <a href="https://wa.me/6281546422640?text=Hallo%20Admin%2C%0ASaya%20belum%20memiliki%20akun%20untuk%20login%20ke%20WEB%20KASERALS.%0A%0ANama%3A%20%0AKelas%3A%20%0A%0AMohon%20bantu%20dibuatkan%20akun%20saya.%0ATerima%20kasih."
                target="_blank" rel="noopener noreferrer">
                <strong>Hubungi admin</strong>
            </a>
        </div>


        <script>
            function togglePassword() {

                const password =
                    document.getElementById('password');

                if (password.type === 'password') {

                    password.type = 'text';

                } else {

                    password.type = 'password';

                }

            }
        </script>

</body>

</html>