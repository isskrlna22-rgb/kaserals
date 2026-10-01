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
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            /* PERPADUAN DUA WARNA: Teal (#0d9488) & Indigo/Ungu (#4f46e5) */
            background: linear-gradient(135deg, #0d9488 0%, #1e1b4b 50%, #4f46e5 100%);
            color: #ffffff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
            padding: 20px 0;
        }

        /* Hiasan Blobs Dua Warna di Background */
        body::before {
            content: '';
            position: absolute;
            top: -100px;
            left: -100px;
            width: 300px;
            height: 300px;
            background: rgba(13, 148, 136, 0.4);
            border-radius: 50%;
            filter: blur(80px);
            z-index: 0;
        }

        body::after {
            content: '';
            position: absolute;
            bottom: -100px;
            right: -100px;
            width: 300px;
            height: 300px;
            background: rgba(79, 70, 229, 0.4);
            border-radius: 50%;
            filter: blur(80px);
            z-index: 0;
        }

        .page {
            width: 100%;
            max-width: 420px;
            padding: 20px;
            position: relative;
            z-index: 1;
        }

        /* =====================
            HEADER (Di Luar Box)
        ====================== */

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .brand-logo-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 10px;
            padding: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
        }

        .brand-logo {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .brand-name {
            font-size: 18px;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: 1px;
        }

        /* =====================
            BAGIAN UTAMA (Glass Box Dua Warna)
        ====================== */

        .login-box {
            background: rgba(15, 23, 42, 0.55);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 28px;
            padding: 35px 25px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        /* =====================
            ANIMASI MASKOT KASI
        ====================== */

        @keyframes floatMascot {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
        @keyframes shadowPulse {
            0%, 100% { transform: scale(1); opacity: 0.3; }
            50% { transform: scale(0.8); opacity: 0.15; }
        }
        @keyframes coinFlip {
            0% { transform: rotateY(0deg); }
            100% { transform: rotateY(360deg); }
        }

        .mascot-container {
            width: 100px;
            height: 100px;
            margin: 0 auto 10px;
        }

        .mascot-group {
            animation: floatMascot 4s ease-in-out infinite;
            transform-origin: center;
        }

        .mascot-shadow {
            animation: shadowPulse 4s ease-in-out infinite;
            transform-origin: center;
        }

        /* =====================
            WELCOME
        ====================== */

        .welcome-title {
            font-size: 24px;
            margin: 0 0 8px;
            font-weight: 700;
            text-align: center;
            color: #ffffff;
        }

        .welcome-text {
            margin: 0 auto 25px;
            max-width: 290px;
            text-align: center;
            font-size: 13px;
            line-height: 1.5;
            color: rgba(255, 255, 255, 0.85);
        }

        /* Teks aksen dua warna */
        .welcome-text strong {
            font-weight: 700;
            background: linear-gradient(135deg, #2dd4bf, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* =====================
            FORM LOGIN
        ====================== */

        .form-group {
            margin-bottom: 16px;
            text-align: left;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 14px;
            color: rgba(255, 255, 255, 0.6);
            z-index: 2;
        }

        .form-input {
            width: 100%;
            height: 50px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 25px;
            padding: 0 45px;
            font-size: 13px;
            color: #ffffff;
            outline: none;
            transition: all 0.3s ease;
        }

        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .form-input:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: #2dd4bf;
            box-shadow: 0 0 12px rgba(45, 212, 191, 0.3);
        }

        .password-input {
            padding-right: 45px;
        }

        .password-toggle {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: rgba(255, 255, 255, 0.6);
            cursor: pointer;
            font-size: 14px;
            transition: color 0.2s;
        }

        .password-toggle:hover {
            color: #ffffff;
        }

        /* =====================
            LUPA PASSWORD
        ====================== */

        .forgot-password {
            display: block;
            margin: 8px 5px 22px;
            text-align: right;
            color: #818cf8;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.2s;
        }

        .forgot-password:hover {
            color: #a5b4fc;
            text-decoration: underline;
        }

        /* =====================
            ERROR
        ====================== */

        .error {
            color: #fca5a5;
            font-size: 11px;
            margin: 5px 15px 0;
        }

        /* =====================
            TOMBOL LOGIN DUA WARNA
        ====================== */

        .login-button {
            width: 100%;
            height: 50px;
            border: none;
            border-radius: 25px;
            background: linear-gradient(135deg, #0d9488 0%, #4f46e5 100%);
            color: #ffffff;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 0.5px;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.35);
            transition: all 0.3s ease;
        }

        .login-button:hover {
            background: linear-gradient(135deg, #14b8a6 0%, #6366f1 100%);
            box-shadow: 0 10px 25px rgba(79, 70, 229, 0.5);
            transform: translateY(-2px);
        }

        /* =====================
            FOOTER
        ====================== */

        .footer {
            text-align: center;
            margin-top: 25px;
            color: rgba(255, 255, 255, 0.75);
            font-size: 12px;
        }

        .footer a {
            color: #2dd4bf;
            text-decoration: none;
        }

        .footer strong {
            font-weight: 700;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* =====================
            RESPONSIVE MOBILE
        ====================== */

        @media (max-width: 430px) {
            .page {
                padding: 15px;
            }
            .login-box {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>

    <div class="page">

        <!-- HEADER (Di Luar Box) -->
        <div class="brand">
            <div class="brand-logo-container">
                <img src="{{ asset('images/logo_kaserals.png') }}" alt="Logo KASERALS" class="brand-logo">
            </div>
            <span class="brand-name">
                KASERALS
            </span>
        </div>

        <!-- KOTAK UTAMA (Glass Box Dua Warna) -->
        <div class="login-box">

            <!-- MASKOT KASI (SVG Interaktif) -->
            <div class="mascot-container">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <!-- Bayangan Maskot -->
                    <ellipse class="mascot-shadow" cx="100" cy="185" rx="45" ry="10" fill="#000000"/>

                    <!-- Grup Animasi Maskot -->
                    <g class="mascot-group">
                        <!-- Body Utama Celengan -->
                        <path d="M70,80 Q100,50 130,80 L140,140 Q100,160 60,140 Z" fill="#f8fafc"/>

                        <!-- Telinga -->
                        <path d="M70,80 L55,40 L90,65 Z" fill="#f8fafc"/>
                        <path d="M130,80 L145,40 L110,65 Z" fill="#f8fafc"/>
                        <path d="M68,75 L58,45 L85,62 Z" fill="#cbd5e1"/>
                        <path d="M132,75 L142,45 L115,62 Z" fill="#cbd5e1"/>

                        <!-- Mata -->
                        <circle cx="85" cy="95" r="7" fill="#0f172a"/>
                        <circle cx="115" cy="95" r="7" fill="#0f172a"/>
                        <circle cx="83" cy="93" r="2.5" fill="#ffffff"/>
                        <circle cx="113" cy="93" r="2.5" fill="#ffffff"/>

                        <!-- Kacamata -->
                        <path d="M95,105 Q100,110 105,105" fill="none" stroke="#0f172a" stroke-width="2.5" stroke-linecap="round"/>

                        <!-- Senyum -->
                        <path d="M90,112 Q100,120 110,112" fill="none" stroke="#f472b6" stroke-width="2" stroke-linecap="round"/>

                        <!-- Baju Seragam / Kemeja -->
                        <path d="M60,110 L140,110 L135,150 Q100,165 65,150 Z" fill="#0d9488"/>
                        <path d="M85,110 L115,110 L110,135 Q100,145 90,135 Z" fill="#f8fafc"/>
                        <!-- Dasi -->
                        <path d="M95,115 L105,115 L105,125 L95,125 Z" fill="#f59e0b"/>

                        <!-- Koin Berputar -->
                        <g style="animation: coinFlip 3s infinite linear; transform-origin: 155px 95px;">
                            <circle cx="155" cy="95" r="15" fill="#fbbf24" stroke="#d97706" stroke-width="2"/>
                            <text x="155" y="100" font-family="Arial" font-weight="bold" font-size="14" fill="#d97706" text-anchor="middle">Rp</text>
                        </g>

                        <!-- Tangan Kanan -->
                        <path d="M125,125 Q145,110 155,115" fill="none" stroke="#f8fafc" stroke-width="12" stroke-linecap="round"/>

                        <!-- Tangan Kiri -->
                        <path d="M75,125 Q55,110 45,115" fill="none" stroke="#f8fafc" stroke-width="12" stroke-linecap="round"/>
                    </g>
                </svg>
            </div>

            <!-- WELCOME -->
            <div>
                <h1 class="welcome-title">
                    Selamat Datang
                </h1>
                <p class="welcome-text">
                    Login untuk lanjut mengelola kas kelas kamu bareng
                    <strong>KASERALS</strong>.
                </p>
            </div>

            <!-- FORM LOGIN -->
            <div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- EMAIL -->
                    <div class="form-group">
                        <div class="input-wrapper">
                            <span class="input-icon">✉</span>
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
                            <span class="input-icon">🔒</span>
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

                    <!-- LOGIN BUTTON -->
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

    </div>

    <!-- SCRIPT -->
    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            if (password.type === 'password') {
                password.type = 'text';
            } else {
                password.type = 'password';
            }
        }
    </script>

</body>

</html>
