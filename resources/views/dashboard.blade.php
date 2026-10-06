<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard admin- KASERALS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
            -webkit-font-smoothing: antialiased;
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #0f172a 0%, #080d1a 100%);
            color: #ffffff;
            padding: 32px 22px;
            display: flex;
            flex-direction: column;
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.04);
            z-index: 10;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 36px;
        }

        .brand-logo {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            background: linear-gradient(135deg, #14b8a6 0%, #0d9488 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: 800;
            color: #ffffff;
            box-shadow: 0 8px 16px rgba(13, 148, 136, 0.35);
        }

        .brand-text h2 {
            font-size: 20px;
            font-weight: 700;
            letter-spacing: -0.4px;
            margin-bottom: 2px;
            color: #ffffff;
        }

        .brand-text p {
            color: #64748b;
            font-size: 12px;
            font-weight: 500;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .menu-title {
            color: #475569;
            font-size: 11px;
            font-weight: 700;
            margin: 22px 12px 8px;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 16px;
            color: #94a3b8;
            text-decoration: none;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .menu a:hover {
            background: rgba(255, 255, 255, 0.06);
            color: #f8fafc;
            transform: translateX(3px);
        }

        .menu a.active {
            background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%);
            color: #ffffff;
            font-weight: 600;
            box-shadow: 0 8px 20px rgba(13, 148, 136, 0.3);
        }

        .menu-icon {
            width: 20px;
            text-align: center;
            font-size: 15px;
            opacity: 0.9;
        }

        .sidebar-bottom {
            margin-top: auto;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .profile-mini {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #cbd5e1;
            font-size: 14px;
            font-weight: 500;
        }

        .profile-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #1e293b;
            border: 2px solid #334155;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 700;
            color: #38bdf8;
        }

        .logout-btn {
            width: 100%;
            padding: 10px 14px;
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 10px;
            color: #f87171;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
        }

        /* ================= MAIN ================= */

        .main {
            flex: 1;
            min-width: 0;
            background: #f8fafc;
        }

        /* ================= HEADER ================= */

        .header {
            height: 88px;
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 36px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
        }

        .header-left h1 {
            font-size: 24px;
            font-weight: 700;
            color: #0f172a;
            letter-spacing: -0.5px;
            margin-bottom: 2px;
        }

        .header-left p {
            color: #64748b;
            font-size: 13px;
            font-weight: 500;
        }

        .header-profile {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .header-profile-text {
            text-align: right;
        }

        .header-profile-text strong {
            display: block;
            font-size: 14px;
            font-weight: 700;
            color: #0f172a;
        }

        .header-profile-text span {
            display: block;
            color: #64748b;
            font-size: 12px;
            margin-top: 2px;
        }

        .header-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #ccfbf1;
            color: #0d9488;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 15px;
            box-shadow: 0 2px 8px rgba(13, 148, 136, 0.15);
        }

        /* ================= CONTENT ================= */

        .content {
            padding: 32px 36px;
        }

        /* ================= WELCOME BANNER & MASKOT ================= */

        .welcome-banner {
            background: linear-gradient(135deg, #0f766e 0%, #14b8a6 100%);
            border-radius: 20px;
            padding: 32px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
            color: white;
            box-shadow: 0 10px 25px -5px rgba(20, 184, 166, 0.4);
            position: relative;
            overflow: hidden;
        }

        .welcome-banner::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -5%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
            border-radius: 50%;
            z-index: 1;
        }

        .welcome-text {
            flex: 1;
            z-index: 2;
        }

        .welcome-text h2 {
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 12px;
            letter-spacing: -0.5px;
        }

        .welcome-text p {
            font-size: 15px;
            line-height: 1.6;
            opacity: 0.95;
            max-width: 500px;
        }

        .welcome-mascot {
            width: 160px;
            height: 160px;
            z-index: 2;
        }

        /* Animasi Maskot KASI */
        @keyframes floatMascot {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }
        @keyframes shadowPulse {
            0%, 100% { transform: scale(1); opacity: 0.25; }
            50% { transform: scale(0.8); opacity: 0.1; }
        }
        @keyframes coinFlip {
            0% { transform: rotateY(0deg); }
            100% { transform: rotateY(360deg); }
        }

        .mascot-group {
            animation: floatMascot 4s ease-in-out infinite;
            transform-origin: center;
        }
        .mascot-shadow {
            animation: shadowPulse 4s ease-in-out infinite;
            transform-origin: center;
        }

        /* ================= SUMMARY ================= */

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-bottom: 28px;
        }

        .summary-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 24px 28px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.03), 0 8px 10px -6px rgba(0, 0, 0, 0.03);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .summary-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.06), 0 8px 10px -6px rgba(0, 0, 0, 0.04);
        }

        .summary-card.dark {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            border-color: #1e293b;
            color: #ffffff;
            box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.25);
        }

        .summary-title {
            color: #64748b;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            margin-bottom: 14px;
        }

        .summary-card.dark .summary-title {
            color: #94a3b8;
        }

        .summary-value {
            font-size: 32px;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.5px;
        }

        .summary-value.income {
            color: #10b981;
        }

        .summary-card.dark .summary-value {
            color: #ffffff;
        }

        .summary-date {
            margin-top: 12px;
            color: #64748b;
            font-size: 13px;
            font-weight: 500;
        }

        .summary-card.dark .summary-date {
            color: #94a3b8;
        }

        /* ================= MIDDLE ================= */

        .middle-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 24px;
            margin-bottom: 28px;
        }

        .card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 28px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.03), 0 8px 10px -6px rgba(0, 0, 0, 0.03);
            transition: all 0.3s ease;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .card-header h2 {
            font-size: 20px;
            font-weight: 700;
            color: #0f172a;
            letter-spacing: -0.3px;
        }

        .payment-info {
            color: #64748b;
            margin-bottom: 22px;
            line-height: 1.6;
            font-size: 14px;
        }

        .payment-status {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .status-box {
            padding: 22px;
            border-radius: 16px;
            transition: all 0.25s ease;
        }

        .status-box.paid {
            background: #f0fdf4;
            border: 1px solid #dcfce7;
        }

        .status-box.unpaid {
            background: #fffbeb;
            border: 1px solid #fef3c7;
        }

        .status-number {
            font-size: 30px;
            font-weight: 800;
            margin-bottom: 6px;
            letter-spacing: -0.5px;
        }

        .paid .status-number {
            color: #15803d;
        }

        .unpaid .status-number {
            color: #b45309;
        }

        .status-label {
            color: #64748b;
            font-size: 13px;
            font-weight: 600;
        }

        /* ================= QUICK ACTION ================= */

        .quick-actions h2 {
            font-size: 20px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 20px;
            letter-spacing: -0.3px;
        }

        .quick-btn {
            width: 100%;
            min-height: 50px;
            border-radius: 14px;
            border: 1px solid #e2e8f0;
            background: #ffffff;
            color: #334155;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            margin-bottom: 12px;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04);
        }

        .quick-btn:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
            color: #0f172a;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .quick-btn.primary {
            background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%);
            color: #ffffff;
            border-color: transparent;
            box-shadow: 0 4px 14px rgba(13, 148, 136, 0.35);
        }

        .quick-btn.primary:hover {
            background: linear-gradient(135deg, #0f766e 0%, #115e59 100%);
            box-shadow: 0 6px 18px rgba(13, 148, 136, 0.45);
            transform: translateY(-2px);
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 1024px) {
            .sidebar {
                width: 250px;
            }
            .summary-grid {
                grid-template-columns: 1fr;
            }
            .middle-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .dashboard {
                display: block;
            }
            .sidebar {
                width: 100%;
                min-height: auto;
                padding: 20px;
            }
            .menu, .sidebar-bottom {
                display: none;
            }
            .header {
                height: auto;
                padding: 20px;
            }
            .content {
                padding: 20px;
            }
            .header-profile-text {
                display: none;
            }
            .payment-status {
                grid-template-columns: 1fr;
            }
            /* Penyesuaian banner di HP */
            .welcome-banner {
                flex-direction: column;
                text-align: center;
                padding: 24px;
            }
            .welcome-text p {
                margin: 0 auto 20px;
            }
            .welcome-mascot {
                width: 140px;
                height: 140px;
            }
        }
    </style>
</head>

<body>

    <div class="dashboard">

        <!-- SIDEBAR -->

        <aside class="sidebar">

            <div class="brand">

                <div class="brand-logo">
                    K
                </div>

                <div class="brand-text">
                    <h2>KASERALS</h2>
                    <p>Kas Kelas Digital</p>
                </div>

            </div>

            <nav class="menu">

                <a href="{{ route('dashboard') }}" class="active">
                    <span class="menu-icon">▣</span>
                    Dashboard
                </a>

                <a href="{{ route('data-siswa.index') }}">
                    <span class="menu-icon">◉</span>
                    Data Siswa
                </a>

                <div class="menu-title">
                    TRANSAKSI
                </div>

                <a href="{{ route('pembayaran-kas.index') }}">
                    <span class="menu-icon">✓</span>
                    Pembayaran Kas
                </a>

                <a href="{{ route('verifikasi-pembayaran.index') }}">
                    <span class="menu-icon">●</span>
                    Status Pembayaran
                </a>

                <a href="{{ route('pemasukan.web.index') }}">
                    <span class="menu-icon">↓</span>
                    Pemasukan
                </a>

                <a href="{{ route('pengeluaran.web.index') }}">
                    <span class="menu-icon">↑</span>
                    Pengeluaran
                </a>

                <div class="menu-title">
                    CATATAN
                </div>

                <a href="{{ route('riwayat.index') }}">
                    <span class="menu-icon">▣</span>
                    Riwayat Transaksi
                </a>

                <a href="{{ route('laporan.index') }}">
                    <span class="menu-icon">▤</span>
                    Laporan Keuangan
                </a>

            </nav>

            <div class="sidebar-bottom">

                <div class="profile-mini">

                    <div class="profile-avatar">
                        AD
                    </div>

                    <span>
                        Admin Sistem
                    </span>

                </div>

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button type="submit" class="logout-btn">
                        ↪ Keluar
                    </button>

                </form>

            </div>

        </aside>


        <!-- MAIN -->

        <main class="main">

            <!-- HEADER -->

            <header class="header">

                <div class="header-left">

                    <h1>
                        Dashboard
                    </h1>

                    <p>
                        {{ now()->translatedFormat('l, d F Y') }}
                    </p>

                </div>

                <div class="header-profile">

                    <div class="header-profile-text">

                        <strong>
                            Admin Sistem
                        </strong>

                        <span>
                            Administrator KASERALS
                        </span>

                    </div>

                    <div class="header-avatar">
                        AD
                    </div>

                </div>

            </header>


            <!-- CONTENT -->

            <section class="content">

                <!-- WELCOME BANNER & MASKOT -->
                <div class="welcome-banner">
                    <div class="welcome-text">
                        <h2>Selamat Datang, Admin! 👋</h2>
                        <p>Aplikasi KASERALS siap digunakan. Kelola kas kelas dengan lebih transparan, cepat, dan mudah hari ini.</p>
                    </div>

                    <svg class="welcome-mascot" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                        <!-- Shadow (bayangan) -->
                        <ellipse class="mascot-shadow" cx="100" cy="185" rx="45" ry="10" fill="#000000"/>

                        <!-- Grup Maskot -->
                        <g class="mascot-group">
                            <!-- Body Utama (Celengan Babi) -->
                            <path d="M70,80 Q100,50 130,80 L140,140 Q100,160 60,140 Z" fill="#f8fafc"/>

                            <!-- Telinga -->
                            <path d="M70,80 L55,40 L90,65 Z" fill="#f8fafc"/>
                            <path d="M130,80 L145,40 L110,65 Z" fill="#f8fafc"/>
                            <!-- Bagian dalam telinga -->
                            <path d="M68,75 L58,45 L85,62 Z" fill="#e2e8f0"/>
                            <path d="M132,75 L142,45 L115,62 Z" fill="#e2e8f0"/>

                            <!-- Mata -->
                            <circle cx="85" cy="95" r="7" fill="#0f172a"/>
                            <circle cx="115" cy="95" r="7" fill="#0f172a"/>
                            <circle cx="83" cy="93" r="2.5" fill="#ffffff"/>
                            <circle cx="113" cy="93" r="2.5" fill="#ffffff"/>

                            <!-- Kacamata -->
                            <path d="M95,105 Q100,110 105,105" fill="none" stroke="#0f172a" stroke-width="2.5" stroke-linecap="round"/>

                            <!-- Senyum -->
                            <path d="M90,112 Q100,120 110,112" fill="none" stroke="#f472b6" stroke-width="2" stroke-linecap="round"/>

                            <!-- Baju/Seragam -->
                            <path d="M60,110 L140,110 L135,150 Q100,165 65,150 Z" fill="#14b8a6"/>
                            <path d="M85,110 L115,110 L110,135 Q100,145 90,135 Z" fill="#f8fafc"/>
                            <!-- Dasi -->
                            <path d="M95,115 L105,115 L105,125 L95,125 Z" fill="#f59e0b"/>

                            <!-- Koin (Berputar) -->
                            <g style="animation: coinFlip 3s infinite linear; transform-origin: 155px 95px;">
                                <circle cx="155" cy="95" r="15" fill="#fbbf24" stroke="#d97706" stroke-width="2"/>
                                <text x="155" y="100" font-family="Arial" font-weight="bold" font-size="14" fill="#d97706" text-anchor="middle">Rp</text>
                            </g>

                            <!-- Tangan Kanan (megang koin) -->
                            <path d="M125,125 Q145,110 155,115" fill="none" stroke="#f8fafc" stroke-width="12" stroke-linecap="round"/>

                            <!-- Tangan Kiri -->
                            <path d="M75,125 Q55,110 45,115" fill="none" stroke="#f8fafc" stroke-width="12" stroke-linecap="round"/>
                        </g>
                    </svg>
                </div>

                <!-- ADMIN SUMMARY -->

                <div class="summary-grid">

                    <div class="summary-card">

                        <div class="summary-title">
                            TOTAL SISWA
                        </div>

                        <div class="summary-value">
                            {{ $totalSiswa }}
                        </div>

                        <div class="summary-date">
                            Data siswa terdaftar
                        </div>

                    </div>


                    <div class="summary-card">

                        <div class="summary-title">
                            STATUS SISTEM
                        </div>

                        <div class="summary-value income">
                            Aktif
                        </div>

                        <div class="summary-date">
                            Sistem KASERALS berjalan normal
                        </div>

                    </div>


                    <div class="summary-card dark">

                        <div class="summary-title">
                            ROLE SISTEM
                        </div>

                        <div class="summary-value">
                            5 Role
                        </div>

                        <div class="summary-date">
                            Admin · Bendahara · Siswa · Ketua Kelas · Guru
                        </div>

                    </div>

                </div>


                <!-- ADMIN MONITORING -->

                <div class="middle-grid">

                    <!-- PENGELOLAAN PENGGUNA -->

                    <div class="card">

                        <div class="card-header">

                            <h2>
                                Pengelolaan Pengguna
                            </h2>

                        </div>

                        <p class="payment-info">
                            Kelola dan pantau data pengguna yang terdaftar
                            dalam sistem KASERALS.
                        </p>

                        <div class="payment-status">

                            <div class="status-box paid">

                                <div class="status-number">
                                    {{ $totalSiswa }}
                                </div>

                                <div class="status-label">
                                    Data Siswa
                                </div>

                            </div>


                            <div class="status-box unpaid">

                                <div class="status-number">
                                    5
                                </div>

                                <div class="status-label">
                                    Role Sistem
                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- AKSI ADMIN -->

                    <div class="card quick-actions">

                        <h2>
                            Aksi Admin
                        </h2>

                        <a href="{{ route('data-siswa.index') }}"
                           class="quick-btn primary"
                           style="display:flex; align-items:center; justify-content:center; text-decoration:none;">

                            Kelola Data Siswa

                        </a>


                        <a href="{{ route('laporan.index') }}"
                           class="quick-btn"
                           style="display:flex; align-items:center; justify-content:center; text-decoration:none;">

                            Lihat Laporan

                        </a>


                        <a href="{{ route('riwayat.index') }}"
                           class="quick-btn"
                           style="display:flex; align-items:center; justify-content:center; text-decoration:none;">

                            Lihat Riwayat

                        </a>

                    </div>

                </div>

            </section>

        </main>

    </div>

</body>

</html>
