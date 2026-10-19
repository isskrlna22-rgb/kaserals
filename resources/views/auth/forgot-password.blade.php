<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - KASERALS</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            /* Perpaduan Gradien Teal & Indigo */
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

        /* Hiasan Blobs */
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
            animation: pulseBlob 8s infinite alternate ease-in-out;
        }

        body::after {
            bottom: -5%;
            right: -5%;
            width: 450px;
            height: 450px;
            background: rgba(99, 102, 241, 0.4);
            animation: pulseBlob 10s infinite alternate-reverse ease-in-out;
        }

        @keyframes pulseBlob {
            0% { transform: scale(1) translate(0, 0); }
            100% { transform: scale(1.1) translate(20px, -20px); }
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
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
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
            text-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        /* =====================
            BAGIAN UTAMA (Glass Box)
        ====================== */
        .auth-box {
            width: 100%;
            background: rgba(15, 23, 42, 0.45);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 32px;
            padding: 40px 32px;
            text-align: center;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5), inset 0 1px 0 rgba(255,255,255,0.1);
            position: relative;
            animation: fadeInUp 0.8s ease-out 0.2s both;
        }

        /* =====================
            ANIMASI MASKOT KASI (Bingung/Lupa)
        ====================== */
        @keyframes floatMascot {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(2deg); }
        }
        @keyframes shadowPulse {
            0%, 100% { transform: scale(1); opacity: 0.4; }
            50% { transform: scale(0.85); opacity: 0.2; }
        }
        @keyframes floatQuestion {
            0%, 100% { transform: translateY(0) scale(1); opacity: 0.8; }
            50% { transform: translateY(-5px) scale(1.1); opacity: 1; }
        }

        .mascot-container {
            width: 110px;
            height: 110px;
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
            font-size: 24px;
            margin: 0 0 12px;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: -0.5px;
        }

        .welcome-text {
            margin: 0 auto 25px;
            max-width: 95%;
            text-align: center;
            font-size: 13.5px;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
        }

        /* =====================
            ALERT / STATUS MESSAGE
        ====================== */
        .status-alert {
            background: rgba(16, 185, 129, 0.15);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #a7f3d0;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 20px;
            text-align: left;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .status-alert::before {
            content: '✓';
            display: flex;
            align-items: center;
            justify-content: center;
            width: 20px;
            height: 20px;
            background: #10b981;
            color: #0f172a;
            border-radius: 50%;
            font-size: 12px;
            flex-shrink: 0;
        }

        /* =====================
            FORM INPUT
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

        .form-input:hover {
            background: rgba(255, 255, 255, 0.09);
            border-color: rgba(255, 255, 255, 0.25);
        }

        .form-input:focus {
            background: rgba(255, 255, 255, 0.12);
            border-color: #2dd4bf;
            box-shadow: 0 0 0 4px rgba(45, 212, 191, 0.15);
        }

        .form-input:focus ~ .input-icon,
        .form-input:not(:placeholder-shown) ~ .input-icon {
            color: #2dd4bf;
        }

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
            TOMBOL SUBMIT
        ====================== */
        .submit-button {
            width: 100%;
            height: 54px;
            border: none;
            border-radius: 16px;
            background: linear-gradient(135deg, #0d9488 0%, #4f46e5 100%);
            color: #ffffff;
            font-size: 15px;
            font-weight: 800;
            letter-spacing: 0.5px;
            cursor: pointer;
            box-shadow: 0 10px 25px -5px rgba(79, 70, 229, 0.4);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .submit-button::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 50%;
            height: 100%;
            background: linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,0.2) 50%, rgba(255,255,255,0) 100%);
            transform: skewX(-20deg);
            transition: 0.5s;
        }

        .submit-button:hover {
            background: linear-gradient(135deg, #14b8a6 0%, #6366f1 100%);
            box-shadow: 0 15px 30px -5px rgba(79, 70, 229, 0.6);
            transform: translateY(-2px);
        }

        .submit-button:hover::after {
            left: 150%;
            transition: 0.7s ease-in-out;
        }

        .submit-button:active {
            transform: translateY(1px);
            box-shadow: 0 5px 15px rgba(79, 70, 229, 0.4);
        }

        /* =====================
            LINK KEMBALI
        ====================== */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #a5b4fc;
            font-size: 13.5px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
        }

        .back-link:hover {
            color: #c7d2fe;
            transform: translateX(-3px);
        }

        /* =====================
            ANIMATIONS
        ====================== */
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* =====================
            RESPONSIVE MOBILE
        ====================== */
        @media (max-width: 480px) {
            body { padding: 16px 0; }
            .page { padding: 16px; max-width: 100%; }
            .brand { margin-bottom: 20px; }
            .auth-box { padding: 32px 24px; border-radius: 28px; }
            .mascot-container { width: 90px; height: 90px; margin-bottom: 12px; }
            .welcome-title { font-size: 22px; }
            .form-input, .submit-button { height: 50px; }
        }
    </style>
</head>

<body>

    <div class="page">

        <!-- HEADER -->
        <div class="brand">
            <div class="brand-logo-container">
                <img src="{{ asset('images/logo_kaserals.png') }}" alt="Logo" class="brand-logo" onerror="this.style.display='none'">
            </div>
            <span class="brand-name">KASERALS</span>
        </div>

        <!-- KOTAK UTAMA -->
        <div class="auth-box">

            <!-- MASKOT KASI (Tanda Tanya/Bingung) -->
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

                        <!-- Mata (Bingung / Melihat ke Atas) -->
                        <circle cx="85" cy="92" r="7" fill="#0f172a"/>
                        <circle cx="115" cy="92" r="7" fill="#0f172a"/>
                        <circle cx="83" cy="90" r="2.5" fill="#ffffff"/>
                        <circle cx="113" cy="90" r="2.5" fill="#ffffff"/>

                        <!-- Kacamata -->
                        <path d="M95,102 Q100,107 105,102" fill="none" stroke="#0f172a" stroke-width="2.5" stroke-linecap="round"/>

                        <!-- Mulut (Kecil/Panik) -->
                        <ellipse cx="100" cy="115" rx="4" ry="6" fill="#f472b6" />

                        <!-- Baju Seragam / Kemeja -->
                        <path d="M60,110 L140,110 L135,150 Q100,165 65,150 Z" fill="#0d9488"/>
                        <path d="M85,110 L115,110 L110,135 Q100,145 90,135 Z" fill="#f8fafc"/>

                        <!-- Dasi -->
                        <path d="M95,115 L105,115 L105,125 L95,125 Z" fill="#f59e0b"/>

                        <!-- Tanda Tanya (?) Melayang -->
                        <g style="animation: floatQuestion 3s ease-in-out infinite;">
                            <text x="145" y="85" font-family="Arial" font-weight="900" font-size="32" fill="#fbbf24" style="text-shadow: 2px 2px 0px #d97706;">?</text>
                        </g>

                        <!-- Tangan Pegang Kepala (Bingung) -->
                        <path d="M75,120 Q50,90 65,70" fill="none" stroke="#f8fafc" stroke-width="10" stroke-linecap="round"/>
                        <path d="M125,120 Q150,90 135,70" fill="none" stroke="#f8fafc" stroke-width="10" stroke-linecap="round"/>
                    </g>
                </svg>
            </div>

            <!-- WELCOME -->
            <div>
                <h1 class="welcome-title">Lupa Password? 🔐</h1>
                <p class="welcome-text">
                    Jangan panik! Masukkan email kamu yang terdaftar, kami akan mengirimkan link untuk mereset password.
                </p>
            </div>

            <!-- SESSION STATUS (Notifikasi jika email berhasil dikirim) -->
            @if (session('status'))
                <div class="status-alert">
                    {{ session('status') }}
                </div>
            @endif

            <!-- FORM FORGOT PASSWORD -->
            <div>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- EMAIL INPUT -->
                    <div class="form-group">
                        <div class="input-wrapper">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                autofocus placeholder="Masukkan email kamu" class="form-input">
                            <span class="input-icon">✉</span>
                        </div>
                        @error('email')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- SUBMIT BUTTON -->
                    <button type="submit" class="submit-button">
                        Kirim Link Reset Password
                    </button>
                </form>
            </div>

            <!-- KEMBALI KE LOGIN -->
            <div style="margin-top: 10px;">
                <a href="{{ route('login') }}" class="back-link">
                    <span>←</span> Kembali ke halaman Login
                </a>
            </div>

        </div>
    </div>

</body>
</html>
