<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Kas Kelas | KASERALS</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background:
                radial-gradient(circle at 10% 10%, rgba(45, 212, 191, 0.12), transparent 40%),
                radial-gradient(circle at 90% 90%, rgba(20, 184, 166, 0.10), transparent 40%),
                #edf7f5;
            color: #17233d;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ================= ANIMASI ================= */
        @keyframes floatMascot {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes pulseLogo {
            0% {
                box-shadow: 0 0 0 0 rgba(13, 148, 136, 0.4);
            }

            70% {
                box-shadow: 0 0 0 12px rgba(13, 148, 136, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(13, 148, 136, 0);
            }
        }

        @keyframes blink {

            0%,
            96%,
            98% {
                opacity: 1;
            }

            97% {
                opacity: 0;
                transform: scaleY(0.1);
            }
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: #091320;
            color: white;
            padding: 32px 20px;
            z-index: 20;
            display: flex;
            flex-direction: column;
            box-shadow: 4px 0 25px rgba(0, 0, 0, 0.05);
            overflow-y: auto;
        }

        .brand-sidebar {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 0 6px;
            margin-bottom: 36px;
        }

        .logo {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            background: linear-gradient(135deg, #14b8a6, #0d9488);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: 800;
            color: white;
            box-shadow: 0 8px 20px rgba(13, 148, 136, 0.35);
            animation: pulseLogo 2.5s infinite;
        }

        .brand-name {
            font-size: 18px;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .brand-subtitle {
            font-size: 11px;
            color: #64748b;
            margin-top: 2px;
        }

        .menu-section {
            margin-bottom: 24px;
        }

        .menu-title {
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.5px;
            color: #475569;
            padding: 0 12px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #94a3b8;
            padding: 12px 16px;
            border-radius: 14px;
            margin-bottom: 4px;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .menu-item:hover {
            color: white;
            background: rgba(255, 255, 255, 0.06);
            transform: translateX(5px);
        }

        .menu-item.active {
            background: linear-gradient(135deg, #0d9488, #0f766e);
            color: white;
            box-shadow: 0 8px 20px rgba(13, 148, 136, 0.35);
            font-weight: 700;
        }

        .menu-icon {
            width: 20px;
            text-align: center;
            font-size: 16px;
            transition: transform 0.3s ease;
        }

        .menu-item:hover .menu-icon {
            transform: scale(1.1) rotate(-5deg);
        }

        /* ================= PROFIL DI SIDEBAR (BAWAH) & LOGOUT ================= */
        .sidebar-footer {
            margin-top: auto;
            padding-top: 24px;
            border-top: 1px dashed rgba(255, 255, 255, 0.1);
        }

        .sidebar-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
            padding: 0 12px;
        }

        .sidebar-avatar {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: rgba(45, 212, 191, 0.2);
            color: #2dd4bf;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 800;
        }

        .sidebar-user-info {
            overflow: hidden;
        }

        .sidebar-user-name {
            font-size: 13px;
            font-weight: 700;
            color: white;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        .sidebar-user-role {
            font-size: 11px;
            color: #94a3b8;
            margin-top: 2px;
        }

        .menu-logout {
            color: #f87171 !important;
        }

        .menu-logout:hover {
            background: rgba(239, 68, 68, 0.1) !important;
            color: #fca5a5 !important;
        }

        /* ================= MAIN CONTENT ================= */
        .main {
            margin-left: 250px;
            padding: 32px 40px 50px;
        }

        .topbar-mobile {
            display: none;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        /* ================= TOPBAR (PROFIL KANAN ATAS) ================= */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 25px;
            gap: 20px;
        }

        .page-heading h1 {
            font-size: 27px;
            margin-bottom: 8px;
            font-weight: 800;
            color: #0f172a;
        }

        .page-heading p {
            color: #64748b;
            font-size: 13px;
            line-height: 1.7;
            font-weight: 500;
            max-width: 600px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 12px;
            background: rgba(255, 255, 255, 0.6);
            padding: 8px 18px 8px 8px;
            border-radius: 50px;
            border: 1px solid transparent;
            transition: all 0.3s ease;
            cursor: pointer;
            flex-shrink: 0;
        }

        .profile:hover {
            background: white;
            border-color: #e2e8f0;
            box-shadow: 0 6px 20px rgba(13, 148, 136, 0.08);
            transform: translateY(-2px);
        }

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #ccfbf1;
            color: #0d9488;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 800;
        }

        .profile-name {
            font-size: 13px;
            font-weight: 800;
            color: #0f172a;
        }

        .profile-role {
            font-size: 11px;
            color: #64748b;
            margin-top: 2px;
            font-weight: 600;
        }

        /* ================= PENGUMUMAN (ANNOUNCEMENT) ================= */
        .announcement-card {
            background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%);
            border-radius: 24px;
            padding: 30px;
            color: white;
            margin-bottom: 25px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px -5px rgba(13, 148, 136, 0.3);
            display: flex;
            gap: 24px;
            align-items: flex-start;
        }

        /* Dekorasi Lingkaran */
        .announcement-card::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .announcement-icon {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            flex-shrink: 0;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .announcement-content h2 {
            font-size: 20px;
            font-weight: 800;
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .announcement-content p {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.85);
            line-height: 1.6;
            margin-bottom: 12px;
            font-weight: 500;
        }

        .announcement-meta {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(0, 0, 0, 0.15);
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }

        /* ================= INFO KEUANGAN KELAS ================= */
        .finance-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .finance-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 22px;
            padding: 24px;
            box-shadow: 0 10px 30px -5px rgba(13, 148, 136, 0.05);
            transition: 0.3s;
        }

        .finance-card:hover {
            box-shadow: 0 15px 35px -5px rgba(13, 148, 136, 0.1);
            transform: translateY(-2px);
        }

        .finance-label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #64748b;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
        }

        .finance-amount {
            font-size: 24px;
            font-weight: 800;
            color: #0f172a;
        }

        .finance-amount.green {
            color: #0d9488;
        }

        .finance-amount.red {
            color: #e11d48;
        }

        /* ================= ATURAN KAS KELAS ================= */
        .rules-panel {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 22px;
            padding: 30px;
            box-shadow: 0 10px 30px -5px rgba(13, 148, 136, 0.05);
            margin-bottom: 40px;
        }

        .rules-panel h3 {
            font-size: 18px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .rules-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .rules-list li {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            background: #f8fafc;
            padding: 16px 20px;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            transition: 0.2s;
        }

        .rules-list li:hover {
            border-color: #0d9488;
            background: white;
            box-shadow: 0 4px 15px rgba(13, 148, 136, 0.05);
        }

        .rule-icon {
            font-size: 18px;
            margin-top: 2px;
        }

        .rule-text h4 {
            font-size: 14px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .rule-text p {
            font-size: 12px;
            color: #64748b;
            line-height: 1.6;
            font-weight: 500;
        }

        .footer-bottom {
            text-align: center;
            color: #94a3b8;
            font-size: 11px;
            padding-top: 10px;
            font-weight: 600;
        }

        /* ================= MASCOT POJOK BAWAH (^ᴗ^) ================= */
        .mascot-container {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 100;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            animation: floatMascot 4s ease-in-out infinite;
        }

        .mascot-bubble {
            background: white;
            padding: 12px 18px;
            border-radius: 20px 20px 0 20px;
            box-shadow: 0 10px 25px rgba(13, 148, 136, 0.2);
            margin-bottom: 12px;
            font-size: 13px;
            font-weight: 800;
            color: #0f172a;
            max-width: 240px;
            text-align: center;
            border: 2px solid #ccfbf1;
        }

        .mascot-bubble span {
            color: #0d9488;
        }

        .mascot-body {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #2dd4bf, #0d9488);
            border-radius: 40%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 12px 25px rgba(13, 148, 136, 0.35);
            cursor: pointer;
            border: 3px solid #f8fafc;
            transition: all 0.3s ease;
        }

        .mascot-face {
            font-size: 24px;
            color: white;
            font-weight: bold;
            animation: blink 4s infinite;
        }

        .mascot-container:hover .mascot-body {
            transform: scale(1.1) rotate(8deg);
            border-radius: 50%;
        }


        /* ================= BOTTOM NAV MOBILE ================= */
        .bottom-nav {
            display: none;
        }

        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-width: 0;
            width: 100%;
            text-decoration: none;
            color: #94a3b8;
            gap: 4px;
            padding: 5px 0;
            transition: 0.3s;
        }

        .nav-item.active {
            color: #0d9488;
            font-weight: 700;
        }

        .nav-icon {
            font-size: 18px;
            line-height: 1.2;
        }

        .nav-text {
            font-size: 9px;
            text-align: center;
            white-space: nowrap;
        }

        @media (max-width: 900px) {
            .finance-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 760px) {
            .sidebar {
                display: none;
            }

            .main {
                margin-left: 0;
                padding: 20px 12px 100px;
            }

            .bottom-nav {
                display: grid;
                grid-template-columns: repeat(6, minmax(0, 1fr));
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                width: 100%;
                padding: 8px 4px calc(8px + env(safe-area-inset-bottom));
                background: rgba(255, 255, 255, 0.97);
                border-top: 1px solid #e2e8f0;
                z-index: 100;
                backdrop-filter: blur(10px);
            }

            .mascot-container,
            .profile {
                display: none;
            }

            .topbar-mobile {
                background: #091320;
                color: white;
                padding: 16px 20px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin: -20px -12px 24px;
            }

            .brand-mobile {
                font-size: 20px;
                font-weight: 800;
            }

            .brand-mobile span {
                color: #2dd4bf;
            }

            .announcement-card {
                flex-direction: column;
                gap: 16px;
                padding: 24px;
            }
        }
    </style>
</head>

<body>
    @php
        $namaSiswa = $siswa->nama_lengkap ?? 'Siswa';
        $kelasSiswa = $siswa->kelas ?? '-';
        $inisial = strtoupper(substr($namaSiswa, 0, 2));
    @endphp

    <!-- SIDEBAR (MENU UTAMA) -->
    <aside class="sidebar">
        <div class="brand-sidebar">
            <div class="logo">K</div>
            <div>
                <div class="brand-name">KASERALS</div>
                <div class="brand-subtitle">Kas Kelas Digital</div>
            </div>
        </div>

        <div class="menu-section">
            <div class="menu-title">MENU</div>
            <a href="{{ route('dashboard.siswa') }}" class="menu-item">
                <span class="menu-icon">⌂</span> Dashboard
            </a>
        </div>

        <div class="menu-section">
            <div class="menu-title">TRANSAKSI</div>
            <a href="{{ route('dashboard.siswa.pembayaran') }}" class="menu-item">
                <span class="menu-icon">💳</span> Pembayaran Kas
            </a>
            <a href="{{ route('dashboard.siswa.status') }}" class="menu-item">
                <span class="menu-icon">✓</span> Status Pembayaran
            </a>
        </div>

        <div class="menu-section">
            <div class="menu-title">CATATAN</div>
            <a href="{{ route('dashboard.siswa.riwayat') }}" class="menu-item">
                <span class="menu-icon">⏱</span> Riwayat Transaksi
            </a>
            <a href="#" class="menu-item active">
                <span class="menu-icon">ⓘ</span> Info Kas
            </a>
        </div>

        <!-- PROFIL & LOGOUT DI SIDEBAR BAWAH -->
        <div class="sidebar-footer">
            <div class="menu-title">AKUN</div>
            <div class="sidebar-profile">
                <div class="sidebar-avatar">
                    {{ $inisial }}
                </div>
                <div class="sidebar-user-info">
                    <div class="sidebar-user-name">
                        {{ $namaSiswa }}
                    </div>
                    <div class="sidebar-user-role">
                        Siswa · {{ $kelasSiswa }}
                    </div>
                </div>
            </div>

            <a href="{{ route('logout') }}" class="menu-item menu-logout"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span class="menu-icon">⎋</span> Keluar
            </a>
        </div>
    </aside>

    <main class="main">
        <!-- TOPBAR MOBILE -->
        <div class="topbar-mobile">
            <div class="brand-mobile">KASE<span>RALS</span></div>
            <small style="color: #94a3b8; font-weight: 600;">Portal Siswa</small>
        </div>

        <div class="container">
            <!-- TOPBAR DESKTOP -->
            <div class="topbar">
                <div class="page-heading">
                    <h1>Info Kas Kelas 📢</h1>
                    <p>
                        Pusat informasi transparansi keuangan, aturan, dan pengumuman kas kelasmu.
                    </p>
                </div>

                <!-- PROFIL DI TOPBAR (KANAN ATAS) -->
                <div class="profile">
                    <div class="avatar">
                        {{ $inisial }}
                    </div>
                    <div>
                        <div class="profile-name">
                            {{ $namaSiswa }}
                        </div>
                        <div class="profile-role">
                            Siswa · {{ $kelasSiswa }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- ================= PENGUMUMAN UTAMA ================= -->
            <section class="announcement-card">
                <div class="announcement-icon">📣</div>

                <div class="announcement-content">
                    <h2>Pengumuman Bendahara</h2>

                    @if ($pengumuman)
                        <h3>{{ $pengumuman->judul ?? 'Pengumuman Kas' }}</h3>

                        <p style="white-space: pre-line;">
                            {{ $pengumuman->isi ?? '' }}
                        </p>

                        <div class="announcement-meta">
                            🗓 Diperbarui:
                            {{ $pengumuman->created_at ? $pengumuman->created_at->format('d M Y') : '-' }}
                        </div>
                    @else
                        <p>Belum ada pengumuman dari bendahara.</p>
                    @endif
                </div>
            </section>

            <!-- ================= INFO KEUANGAN (TRANSPARANSI) ================= -->
            <section class="finance-grid">
                <div class="finance-card">
                    <div class="finance-label">
                        <span>💰</span> Total Saldo Kas Kelas
                    </div>
                    <div class="finance-amount green">
                        Rp {{ number_format($saldoKas, 0, ',', '.') }}
                    </div>
                </div>

                <div class="finance-card">
                    <div class="finance-label">
                        <span>📉</span> Pengeluaran Bulan Ini
                    </div>
                    <div class="finance-amount red">
                        Rp {{ number_format($pengeluaranBulanIni, 0, ',', '.') }}
                    </div>
                </div>

                <div class="finance-card"
                    style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
                    <div style="font-size: 30px; margin-bottom: 8px;">🤝</div>
                    <div style="font-size: 13px; font-weight: 800; color: #0f172a;">Kas Transparan</div>
                    <div style="font-size: 11px; color: #64748b; margin-top: 4px;">Kelola bersama, untuk bersama.</div>
                </div>
            </section>

            <!-- ================= ATURAN KAS KELAS ================= -->
            <section class="rules-panel">
                <h3>📌 Peraturan & Ketentuan Kas Kelas</h3>
                <ul class="rules-list">
                    <li>
                        <div class="rule-icon">🗓</div>
                        <div class="rule-text">
                            <h4>Wajib Bayar Mingguan</h4>
                            <p>Pembayaran kas wajib dilakukan setiap minggu sesuai dengan nominal yang telah disepakati
                                bersama oleh anggota kelas.</p>
                        </div>
                    </li>
                    <li>
                        <div class="rule-icon">🧾</div>
                        <div class="rule-text">
                            <h4>Bukti Pembayaran (Transfer)</h4>
                            <p>Bagi yang membayar melalui transfer bank atau E-Wallet, wajib mengunggah bukti transfer
                                yang sah melalui halaman pembayaran.</p>
                        </div>
                    </li>
                    <li>
                        <div class="rule-icon">⏳</div>
                        <div class="rule-text">
                            <h4>Keterlambatan Pembayaran</h4>
                            <p>Tunggakan kas akan terus dicatat. Segera lunasi tunggakanmu agar tidak menumpuk di akhir
                                semester.</p>
                        </div>
                    </li>
                    <li>
                        <div class="rule-icon">💡</div>
                        <div class="rule-text">
                            <h4>Penggunaan Dana</h4>
                            <p>Dana kas murni digunakan untuk keperluan kelas seperti fotokopi tugas, alat kebersihan,
                                perlengkapan lomba, atau menjenguk teman yang sakit.</p>
                        </div>
                    </li>
                </ul>
            </section>

            <div class="footer-bottom">
                © {{ date('Y') }} KASERALS · Sistem Pengelolaan Kas Kelas Digital
            </div>

        </div>
    </main>

    <!-- MASCOT POJOK BAWAH (^ᴗ^) -->
    <div class="mascot-container">
        <div class="mascot-bubble">
            Jangan lupa baca aturan kas kelasnya ya! 📢<br>
            <span>Biar kelas kita makin kompak! ✨</span>
        </div>
        <div class="mascot-body">
            <div class="mascot-face">^ᴗ^</div>
        </div>
    </div>

    <!-- BOTTOM NAV MOBILE -->

    <nav class="bottom-nav">
        <a href="{{ route('dashboard.siswa') }}" class="nav-item">
            <span class="nav-icon">⌂</span>
            <span class="nav-text">Dashboard</span>
        </a>

        <a href="{{ route('dashboard.siswa.pembayaran') }}" class="nav-item">
            <span class="nav-icon">💳</span>
            <span class="nav-text">Bayar</span>
        </a>

        <a href="{{ route('dashboard.siswa.status') }}" class="nav-item">
            <span class="nav-icon">✓</span>
            <span class="nav-text">Status</span>
        </a>

        <a href="{{ route('dashboard.siswa.riwayat') }}" class="nav-item">
            <span class="nav-icon">⏱</span>
            <span class="nav-text">Riwayat</span>
        </a>

        <a href="{{ route('dashboard.siswa') }}#info-kas" class="nav-item active">
            <span class="nav-icon">ⓘ</span>
            <span class="nav-text">Info Kas</span>
        </a>

        <a href="{{ route('logout') }}" class="nav-item"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <span class="nav-icon">⎋</span>
            <span class="nav-text">Keluar</span>
        </a>
    </nav>

    <!-- LOGOUT FORM HIDDEN -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
        @csrf
    </form>
</body>

</html>
