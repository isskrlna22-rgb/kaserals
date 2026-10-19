<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KASERALS</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            /* Perpaduan Gradien Teal & Indigo yang lebih halus */
            background: linear-gradient(135deg, #0d9488 0%, #1e1b4b 50%, #4f46e5 100%);
            background-attachment: fixed;
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

        /* Hiasan Blobs Dua Warna di Background - Diperhalus */
        body::before,
        body::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            z-index: 0;
            opacity: 0.6;
        }

        body::before {
            top: -5%;
            left: -5%;
            width: 400px;
            height: 400px;
            background: rgba(45, 212, 191, 0.4);
            /* Light Teal */
            animation: pulseBlob 8s infinite alternate ease-in-out;
        }

        body::after {
            bottom: -5%;
            right: -5%;
            width: 450px;
            height: 450px;
            background: rgba(99, 102, 241, 0.4);
            /* Light Indigo */
            animation: pulseBlob 10s infinite alternate-reverse ease-in-out;
        }

        @keyframes pulseBlob {
            0% {
                transform: scale(1) translate(0, 0);
            }

            100% {
                transform: scale(1.1) translate(20px, -20px);
            }
        }

        .page {
            width: 100%;
            max-width: 440px;
            padding: 20px;
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* =====================
            HEADER (Di Luar Box)
        ====================== */
        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
            animation: fadeInDown 0.8s ease-out;
        }

        .brand-logo-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            padding: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .brand-logo {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .brand-name {
            font-size: 22px;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: 1.5px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        /* =====================
            BAGIAN UTAMA (Glass Box)
        ====================== */
        .login-box {
            width: 100%;
            background: rgba(15, 23, 42, 0.45);
            /* Darker, more transparent base */
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 32px;
            padding: 40px 32px;
            text-align: center;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5), inset 0 1px 0 rgba(255, 255, 255, 0.1);
            position: relative;
            animation: fadeInUp 0.8s ease-out 0.2s both;
        }

        /* =====================
            ANIMASI MASKOT KASI
        ====================== */
        @keyframes floatMascot {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-10px) rotate(2deg);
            }
        }

        @keyframes shadowPulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.4;
            }

            50% {
                transform: scale(0.85);
                opacity: 0.2;
            }
        }

        @keyframes coinFlip {
            0% {
                transform: rotateY(0deg);
            }

            100% {
                transform: rotateY(360deg);
            }
        }

        .mascot-container {
            width: 120px;
            height: 120px;
            margin: 0 auto 16px;
            position: relative;
        }

        .mascot-group {
            animation: floatMascot 5s ease-in-out infinite;
            transform-origin: center bottom;
        }

        .mascot-shadow {
            animation: shadowPulse 5s ease-in-out infinite;
            transform-origin: center;
        }

        /* =====================
            WELCOME TEXT
        ====================== */
        .welcome-title {
            font-size: 26px;
            margin: 0 0 8px;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: -0.5px;
        }

        .welcome-text {
            margin: 0 auto 30px;
            max-width: 90%;
            text-align: center;
            font-size: 14px;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
        }

        .welcome-text strong {
            font-weight: 800;
            /* Gradient text yang lebih pop */
            background: linear-gradient(135deg, #2dd4bf, #a5b4fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* =====================
            FORM LOGIN
        ====================== */
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 20px;
            font-size: 16px;
            color: rgba(255, 255, 255, 0.5);
            z-index: 2;
            transition: color 0.3s ease;
        }

        .form-input {
            width: 100%;
            height: 54px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 16px;
            padding: 0 50px;
            font-size: 14px;
            font-weight: 500;
            color: #ffffff;
            outline: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.4);
            font-weight: 400;
        }

        /* Hover & Focus Effects */
        .form-input:hover {
            background: rgba(255, 255, 255, 0.09);
            border-color: rgba(255, 255, 255, 0.25);
        }

        .form-input:focus {
            background: rgba(255, 255, 255, 0.12);
            border-color: #2dd4bf;
            box-shadow: 0 0 0 4px rgba(45, 212, 191, 0.15);
        }

        .form-input:focus~.input-icon,
        .form-input:not(:placeholder-shown)~.input-icon {
            color: #2dd4bf;
            /* Icon warna teal saat aktif */
        }

        .password-input {
            padding-right: 50px;
        }

        .password-toggle {
            position: absolute;
            right: 20px;
            border: none;
            background: transparent;
            color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            font-size: 16px;
            transition: color 0.2s, transform 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .password-toggle:hover {
            color: #ffffff;
            transform: scale(1.1);
        }

        /* =====================
            LUPA PASSWORD
        ====================== */
        .forgot-password {
            display: inline-block;
            margin: 4px 4px 24px;
            float: right;
            color: #a5b4fc;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
        }

        .forgot-password:hover {
            color: #c7d2fe;
            text-decoration: underline;
            text-underline-offset: 4px;
        }

        /* Clearfix for float */
        .form-actions {
            clear: both;
        }

        /* =====================
            ERROR
        ====================== */
        .error {
            color: #fca5a5;
            font-size: 12px;
            font-weight: 500;
            margin: 6px 16px 0;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .error::before {
            content: '⚠';
            font-size: 10px;
        }

        /* =====================
            TOMBOL LOGIN
        ====================== */
        .login-button {
            width: 100%;
            height: 54px;
            border: none;
            border-radius: 16px;
            background: linear-gradient(135deg, #0d9488 0%, #4f46e5 100%);
            color: #ffffff;
            font-size: 16px;
            font-weight: 800;
            letter-spacing: 0.5px;
            cursor: pointer;
            box-shadow: 0 10px 25px -5px rgba(79, 70, 229, 0.4);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        /* Efek Shine pada tombol */
        .login-button::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 50%;
            height: 100%;
            background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0) 100%);
            transform: skewX(-20deg);
            transition: 0.5s;
        }

        .login-button:hover {
            background: linear-gradient(135deg, #14b8a6 0%, #6366f1 100%);
            box-shadow: 0 15px 30px -5px rgba(79, 70, 229, 0.6);
            transform: translateY(-2px);
        }

        .login-button:hover::after {
            left: 150%;
            transition: 0.7s ease-in-out;
        }

        .login-button:active {
            transform: translateY(1px);
            box-shadow: 0 5px 15px rgba(79, 70, 229, 0.4);
        }

        /* =====================
            FOOTER
        ====================== */
        .footer {
            text-align: center;
            margin-top: 30px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 13px;
            font-weight: 500;
            animation: fadeInUp 0.8s ease-out 0.4s both;
        }

        .footer a {
            color: #2dd4bf;
            text-decoration: none;
            margin-left: 4px;
            padding: 4px 8px;
            border-radius: 8px;
            background: rgba(45, 212, 191, 0.1);
            transition: all 0.2s;
        }

        .footer strong {
            font-weight: 700;
        }

        .footer a:hover {
            background: rgba(45, 212, 191, 0.2);
            color: #5eead4;
        }

        /* =====================
            ANIMATIONS
        ====================== */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* =====================
            RESPONSIVE MOBILE
        ====================== */
        @media (max-width: 480px) {
            body {
                padding: 16px 0;
            }

            .page {
                padding: 16px;
                max-width: 100%;
            }

            .brand {
                margin-bottom: 20px;
            }

            .brand-name {
                font-size: 20px;
            }

            .login-box {
                padding: 32px 24px;
                border-radius: 28px;
            }

            .mascot-container {
                width: 90px;
                height: 90px;
                margin-bottom: 12px;
            }

            .welcome-title {
                font-size: 24px;
            }

            .welcome-text {
                font-size: 13px;
                margin-bottom: 24px;
                max-width: 100%;
            }

            .form-input,
            .login-button {
                height: 50px;
            }

            .forgot-password {
                margin-bottom: 20px;
            }
        }

        @media (max-width: 360px) {
            .login-box {
                padding: 24px 16px;
            }

            .form-input {
                padding-left: 42px;
                padding-right: 42px;
            }

            .input-icon {
                left: 16px;
            }
        }
    </style>
</head>

<body>

    <div class="page">


        <!-- KOTAK UTAMA -->
        <div class="login-box">

            <!-- MASKOT KASI -->
            <div class="mascot-container">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <!-- Bayangan Maskot -->
                    <ellipse class="mascot-shadow" cx="100" cy="185" rx="45" ry="10"
                        fill="#000000" />

                    <!-- Grup Animasi Maskot -->
                    <g class="mascot-group">
                        <!-- Body Utama Celengan -->
                        <path d="M70,80 Q100,50 130,80 L140,140 Q100,160 60,140 Z" fill="#f8fafc" />

                        <!-- Telinga -->
                        <path d="M70,80 L55,40 L90,65 Z" fill="#f8fafc" />
                        <path d="M130,80 L145,40 L110,65 Z" fill="#f8fafc" />
                        <path d="M68,75 L58,45 L85,62 Z" fill="#cbd5e1" />
                        <path d="M132,75 L142,45 L115,62 Z" fill="#cbd5e1" />

                        <!-- Mata -->
                        <circle cx="85" cy="95" r="7" fill="#0f172a" />
                        <circle cx="115" cy="95" r="7" fill="#0f172a" />
                        <circle cx="83" cy="93" r="2.5" fill="#ffffff" />
                        <circle cx="113" cy="93" r="2.5" fill="#ffffff" />

                        <!-- Kacamata -->
                        <path d="M95,105 Q100,110 105,105" fill="none" stroke="#0f172a" stroke-width="2.5"
                            stroke-linecap="round" />

                        <!-- Senyum -->
                        <path d="M90,112 Q100,120 110,112" fill="none" stroke="#f472b6" stroke-width="2"
                            stroke-linecap="round" />

                        <!-- Baju Seragam / Kemeja -->
                        <path d="M60,110 L140,110 L135,150 Q100,165 65,150 Z" fill="#0d9488" />
                        <path d="M85,110 L115,110 L110,135 Q100,145 90,135 Z" fill="#f8fafc" />

                        <!-- Dasi -->
                        <path d="M95,115 L105,115 L105,125 L95,125 Z" fill="#f59e0b" />

                        <!-- Koin Berputar -->
                        <g style="animation: coinFlip 3s infinite linear; transform-origin: 155px 95px;">
                            <circle cx="155" cy="95" r="15" fill="#fbbf24" stroke="#d97706"
                                stroke-width="2" />
                            <text x="155" y="100" font-family="Arial" font-weight="bold" font-size="14" fill="#d97706"
                                text-anchor="middle">Rp</text>
                        </g>

                        <!-- Tangan -->
                        <path d="M125,125 Q145,110 155,115" fill="none" stroke="#f8fafc" stroke-width="12"
                            stroke-linecap="round" />
                        <path d="M75,125 Q55,110 45,115" fill="none" stroke="#f8fafc" stroke-width="12"
                            stroke-linecap="round" />
                    </g>
                </svg>
            </div>

            <!-- WELCOME -->
            <div>
                <h1 class="welcome-title">Selamat Datang</h1>
                <p class="welcome-text">
                    Login untuk lanjut mengelola kas kelas kamu bareng <strong>KASERALS</strong>.
                </p>
            </div>

            <!-- FORM LOGIN -->
            <div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- EMAIL -->
                    <div class="form-group">
                        <div class="input-wrapper">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                autofocus autocomplete="username" placeholder="Masukkan email" class="form-input">
                            <span class="input-icon">✉</span>
                        </div>
                        @error('email')
                            <div class="error">
                                @if ($message === 'These credentials do not match our records.')
                                    Email atau password yang kamu masukkan salah.
                                @else
                                    {{ $message }}
                                @endif
                            </div>
                        @enderror
                    </div>

                    <!-- PASSWORD -->
                    <div class="form-group">
                        <div class="input-wrapper">
                            <input id="password" type="password" name="password" required
                                autocomplete="current-password" placeholder="Masukkan password"
                                class="form-input password-input">
                            <span class="input-icon">🔒</span>

                            <button type="button" class="password-toggle" onclick="togglePassword()"
                                aria-label="Toggle password visibility">
                                <span id="toggleIcon">👁</span>
                            </button>
                        </div>
                        @error('password')
                            <div class="error">
                                @if ($message === 'These credentials do not match our records.')
                                    Email atau password yang kamu masukkan salah.
                                @else
                                    {{ $message }}
                                @endif
                            </div>
                        @enderror
                    </div>

                    <!-- LUPA PASSWORD & SUBMIT -->
                    <div class="form-actions">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-password">
                                Lupa Password?
                            </a>
                        @endif

                        <button type="submit" class="login-button">
                            LOGIN
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- FOOTER -->
        <div class="footer">
            Belum punya akun?
            <a href="https://wa.me/6281546422640?text=Hallo%20Admin%2C%0ASaya%20belum%20memiliki%20akun%20untuk%20login%20ke%20WEB%20KASERALS.%0A%0ANama%3A%20%0AKelas%3A%20%0A%0AMohon%20bantu%20dibuatkan%20akun%20saya.%0ATerima%20kasih."
                target="_blank" rel="noopener noreferrer">
                <strong>Hubungi Admin</strong>
            </a>
        </div>

    </div>

    <!-- SCRIPT -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.style.opacity = '0.5'; // Memberi indikator visual saat password terlihat
            } else {
                passwordInput.type = 'password';
                toggleIcon.style.opacity = '1';
            }
        }
    </script>

</body>

</html>
