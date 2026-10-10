<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa - KASERALS</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background:
                radial-gradient(circle at 10% 10%, rgba(45, 212, 191, 0.12), transparent 40%),
                radial-gradient(circle at 90% 90%, rgba(20, 184, 166, 0.10), transparent 40%),
                #edf7f5;
            color: #0f172a;
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
                transform: translateY(-12px);
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

        .brand {
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

        /* ================= PROFIL DI SIDEBAR (BAWAH) ================= */
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

        /* ================= MAIN ================= */
        .main {
            margin-left: 250px;
            padding: 32px 40px 50px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .page-title {
            font-size: 26px;
            font-weight: 800;
            color: #0f172a;
        }

        .page-subtitle {
            margin-top: 4px;
            font-size: 13px;
            color: #64748b;
            font-weight: 500;
        }

        /* ================= PROFIL DI TOPBAR (KANAN ATAS) ================= */
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

        /* ================= HERO ================= */
        .welcome {
            position: relative;
            overflow: hidden;
            min-height: 190px;
            border-radius: 24px;
            padding: 32px 36px;
            margin-bottom: 24px;
            background: linear-gradient(135deg, #0d9488 0%, #0f766e 50%, #115e59 100%);
            box-shadow: 0 16px 32px -8px rgba(13, 148, 136, 0.32);
            display: flex;
            align-items: center;
        }

        .welcome::after {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            right: 120px;
            bottom: -100px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.18), transparent 70%);
            pointer-events: none;
        }

        .welcome-content {
            position: relative;
            z-index: 2;
            max-width: 520px;
        }

        .welcome-small {
            color: rgba(255, 255, 255, 0.85);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.5px;
            margin-bottom: 8px;
        }

        .welcome h1 {
            color: white;
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .welcome p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 13px;
            line-height: 1.6;
        }

        .mascot {
            position: absolute;
            right: 30px;
            bottom: -10px;
            width: 150px;
            max-height: 180px;
            object-fit: contain;
            z-index: 3;
            filter: drop-shadow(0 15px 15px rgba(0, 0, 0, 0.2));
            animation: floatMascot 4s ease-in-out infinite;
        }

        /* ================= CARDS ================= */
        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 24px;
        }

        .card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 22px;
            padding: 22px;
            box-shadow: 0 10px 30px -5px rgba(13, 148, 136, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px -5px rgba(13, 148, 136, 0.15);
        }

        .card-label {
            font-size: 11px;
            color: #64748b;
            font-weight: 800;
            letter-spacing: 0.5px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .card-value {
            font-size: 24px;
            color: #0f172a;
            font-weight: 800;
        }

        .card-value.green {
            color: #0d9488;
        }

        .card-value.warning {
            color: #d97706;
        }

        /* ================= STATUS ================= */
        .status-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 22px;
            padding: 22px;
            margin-bottom: 24px;
            box-shadow: 0 10px 30px -5px rgba(13, 148, 136, 0.05);
            transition: transform 0.3s ease;
        }

        .status-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .section-title {
            font-size: 15px;
            font-weight: 800;
            color: #0f172a;
        }

        .status-badge {
            padding: 6px 14px;
            border-radius: 20px;
            background: #10b981;
            color: white;
            font-size: 11px;
            font-weight: 800;
        }

        .status-detail {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-top: 14px;
        }

        .status-amount {
            font-size: 26px;
            font-weight: 800;
            color: #0f172a;
        }

        .status-date {
            font-size: 12px;
            color: #64748b;
            font-weight: 500;
        }

        /* ================= CONTENT GRID ================= */
        .content-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 20px;
        }

        .panel {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 22px;
            padding: 22px;
            box-shadow: 0 10px 30px -5px rgba(13, 148, 136, 0.05);
            transition: transform 0.3s ease;
        }

        .panel:hover {
            box-shadow: 0 15px 35px -5px rgba(13, 148, 136, 0.1);
        }

        .panel.announcement-panel {
            border-left: 4px solid #0d9488;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .panel-link {
            font-size: 12px;
            color: #0d9488;
            font-weight: 700;
            text-decoration: none;
            transition: 0.2s;
        }

        .panel-link:hover {
            text-decoration: underline;
        }

        /* TABLE */
        .table-head,
        .table-row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            align-items: center;
        }

        .table-head {
            padding: 0 6px 10px;
            border-bottom: 1px solid #f1f5f9;
        }

        .table-head span {
            font-size: 10px;
            color: #94a3b8;
            font-weight: 700;
        }

        .table-head span:last-child,
        .table-row span:last-child {
            text-align: right;
        }

        .table-row {
            padding: 12px 6px;
            border-bottom: 1px solid #f8fafc;
            transition: 0.2s ease;
        }

        .table-row:hover {
            background: #f0fdfa;
            border-radius: 8px;
        }

        .table-row span {
            font-size: 12px;
            color: #334155;
            font-weight: 600;
        }

        .nominal {
            color: #0d9488 !important;
            font-weight: 800 !important;
        }

        /* INFO */
        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            font-size: 12px;
            color: #64748b;
            font-weight: 600;
        }

        .info-value {
            font-size: 12px;
            color: #0d9488;
            font-weight: 800;
        }

        .expense {
            color: #ef4444 !important;
        }

        .saldo-card-dark {
            background-color: #091320;
            color: white;
            border-radius: 20px;
            padding: 20px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .saldo-dark-title {
            font-size: 13px;
            color: #94a3b8;
            font-weight: 600;
        }

        .saldo-dark-val {
            font-size: 18px;
            font-weight: 800;
            color: white;
        }

        /* ================= MASCOT POJOK BAWAH ================= */
        .mascot-container {
            position: fixed;
            bottom: 40px;
            right: 40px;
            z-index: 100;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            animation: floatMascot 4s ease-in-out infinite;
        }

        .mascot-bubble {
            background: white;
            padding: 14px 20px;
            border-radius: 20px 20px 0 20px;
            box-shadow: 0 10px 25px rgba(13, 148, 136, 0.2);
            margin-bottom: 16px;
            font-size: 14px;
            font-weight: 800;
            color: #0f172a;
            max-width: 250px;
            text-align: center;
            opacity: 0;
            transform: translateY(20px) scale(0.9);
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            border: 2px solid #ccfbf1;
        }

        .mascot-bubble span {
            color: #0d9488;
        }

        .mascot-body {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #2dd4bf, #0d9488);
            border-radius: 40%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 15px 30px rgba(13, 148, 136, 0.4);
            cursor: pointer;
            border: 4px solid #f8fafc;
            transition: all 0.3s ease;
            position: relative;
        }

        .mascot-face {
            font-size: 28px;
            color: white;
            font-weight: bold;
            animation: blink 4s infinite;
        }

        .mascot-container:hover .mascot-bubble {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .mascot-container:hover .mascot-body {
            transform: scale(1.1) rotate(10deg);
            border-radius: 50%;
        }


        /* ================= BOTTOM NAV ================= */
        .bottom-nav {
            display: none;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(255, 255, 255, 0.95);
            border-top: 1px solid #e2e8f0;
            grid-template-columns: repeat(4, 1fr);
            padding: 10px 12px 14px;
            z-index: 100;
            backdrop-filter: blur(10px);
        }

        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: #94a3b8;
            gap: 2px;
            transition: 0.3s;
        }

        .nav-item.active {
            color: #0d9488;
            font-weight: 700;
        }

        .nav-item:hover {
            color: #0d9488;
        }

        .nav-icon {
            font-size: 18px;
        }

        .nav-text {
            font-size: 10px;
        }

        /* ================= RESPONSIVE ================= */
        @media (max-width: 1024px) {
            .cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .main {
                margin-left: 0;
                padding: 20px 16px 90px;
            }

            .page-title {
                font-size: 22px;
            }

            .profile {
                display: none;
                /* Sembunyikan profil topbar di mode HP biar nggak kepenuhan */
            }

            .welcome {
                min-height: 160px;
                padding: 24px 20px;
            }

            .welcome h1 {
                font-size: 22px;
            }

            .mascot {
                width: 110px;
                right: 10px;
            }

            .cards {
                grid-template-columns: 1fr 1fr;
                gap: 12px;
            }

            .card {
                padding: 16px;
            }

            .card-value {
                font-size: 18px;
            }

            .status-amount {
                font-size: 22px;
            }

            .bottom-nav {
                display: grid;
            }

            .mascot-container {
                display: none;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR LENGKAP -->
    <aside class="sidebar">

        <div class="brand">
            <div class="logo">K</div>

            <div>
                <div class="brand-name">KASERALS</div>
                <div class="brand-subtitle">Kas Kelas Digital</div>
            </div>
        </div>

        <div class="menu-section">
            <div class="menu-title">MENU</div>
            <a href="{{ route('dashboard.siswa') }}" class="menu-item active">
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

            <a href="{{ route('dashboard.siswa.info-kas') }}" class="menu-item">
                <span class="menu-icon">ⓘ</span>
                Info Kas
            </a>

        </div>

        <!-- ================= PROFIL & LOGOUT DI SIDEBAR BAWAH ================= -->
        <div class="sidebar-footer">
            <div class="menu-title">AKUN</div>

            <div class="sidebar-profile">
                <div class="sidebar-avatar">
                    {{ strtoupper(substr($siswa->nama_lengkap ?? 'SI', 0, 2)) }}
                </div>
                <div class="sidebar-user-info">
                    <div class="sidebar-user-name">
                        {{ $siswa->nama_lengkap ?? 'Siswa' }}
                    </div>
                    <div class="sidebar-user-role">
                        Siswa · {{ $siswa->kelas ?? '-' }}
                    </div>
                </div>
            </div>

            <a href="{{ route('logout') }}" class="menu-item menu-logout"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span class="menu-icon">⎋</span> Keluar
            </a>
        </div>

    </aside>

    <!-- MAIN -->
    <main class="main">

        <!-- TOPBAR -->
        <div class="topbar">
            <div>
                <div class="page-title">
                    Halo, {{ $siswa->nama_lengkap ?? 'Siswa' }}
                </div>
                <div class="page-subtitle">
                    {{ $siswa->kelas ?? '-' }} · NISN {{ $siswa->nisn ?? '-' }}
                </div>
            </div>

            <!-- ================= PROFIL DI TOPBAR (KANAN ATAS) ================= -->
            <div class="profile">
                <div class="avatar">
                    {{ strtoupper(substr($siswa->nama_lengkap ?? 'SI', 0, 2)) }}
                </div>

                <div>
                    <div class="profile-name">
                        {{ $siswa->nama_lengkap ?? 'Siswa' }}
                    </div>
                    <div class="profile-role">
                        Siswa · {{ $siswa->kelas ?? '-' }}
                    </div>
                </div>
            </div>
        </div>

        <!-- HERO -->
        <section class="welcome">

            <div class="welcome-content">

                <div class="welcome-small">
                    KASERALS • KAS KELAS DIGITAL
                </div>

                <h1>
                    Halo, {{ $siswa->nama_lengkap ?? 'Siswa' }} 👋
                </h1>

                <p>
                    Pantau pembayaran kas kelasmu kapan saja —
                    transparan, rapi, dan mudah.
                </p>

            </div>

            <img src="{{ asset('images/kasi.svg') }}" alt="Mascot KASERALS" class="mascot">

        </section>

        <!-- SUMMARY -->
        <section class="cards">

            <div class="card">
                <div class="card-label">
                    TOTAL DIBAYAR
                </div>
                <div class="card-value green">
                    Rp {{ number_format($totalPembayaranSiswa ?? 0, 0, ',', '.') }}
                </div>
            </div>

            <div class="card">
                <div class="card-label">
                    TERTUNGGAK
                </div>
                <div class="card-value warning">
                    {{ $tertunggakPeriode ?? 0 }} periode
                </div>
            </div>

            <div class="card">
                <div class="card-label">
                    JUMLAH TRANSAKSI
                </div>
                <div class="card-value">
                    {{ $jumlahPembayaran ?? 0 }} transaksi
                </div>
            </div>

        </section>

        <!-- STATUS -->
        <section class="status-card">

            <div class="status-top">
                <div class="section-title">
                    Status Pembayaran
                </div>
                <div class="status-badge">
                    {{ $statusPembayaran ?? 'Belum Ada Data' }}
                </div>
            </div>

            <div class="status-detail">

                <div class="status-amount">
                    @if (isset($pembayaranTerakhir))
                        Rp {{ number_format($pembayaranTerakhir->nominal, 0, ',', '.') }}
                    @else
                        Rp 0
                    @endif
                </div>

                <div class="status-date">
                    @if (isset($pembayaranTerakhir))
                        Dicatat bendahara ·
                        {{ \Carbon\Carbon::parse($pembayaranTerakhir->tanggal)->format('d M Y') }}
                    @else
                        Belum ada pembayaran
                    @endif
                </div>

            </div>

        </section>

        <!-- CONTENT GRID -->
        <section class="content-grid">

            <!-- PEMBAYARAN TERAKHIR -->
            <div class="panel">

                <div class="panel-header">
                    <div class="section-title">
                        Pembayaran Terakhir
                    </div>
                    <a href="{{ route('dashboard.siswa.riwayat') }}" class="panel-link">
                        Lihat Riwayat →
                    </a>
                </div>

                <div class="table-head">
                    <span>PERIODE</span>
                    <span>TANGGAL</span>
                    <span>NOMINAL</span>
                </div>

                @if (isset($pembayaran) && count($pembayaran) > 0)
                    @foreach ($pembayaran->take(5) as $item)
                        <div class="table-row">
                            <span>Minggu ke-{{ $item->minggu_ke }}</span>
                            <span>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</span>
                            <span class="nominal">Rp {{ number_format($item->nominal, 0, ',', '.') }}</span>
                        </div>
                    @endforeach
                @else
                    <div class="table-row">
                        <span>-</span>
                        <span>-</span>
                        <span class="nominal">Belum ada</span>
                    </div>
                @endif

            </div>

            <!-- INFORMASI -->
            <div style="display:flex; flex-direction:column; gap:20px;">

                <!-- PENGUMUMAN -->
                <div class="panel announcement-panel">
                    <div class="panel-header">
                        <div class="section-title">📢 Pengumuman</div>
                    </div>
                    <p style="font-size:12px; color:#64748b; line-height:1.6;">
                        {{ $pengumuman ?? 'Belum ada pengumuman terbaru.' }}
                    </p>
                </div>

                <!-- INFO KAS -->
                <div class="panel">
                    <div class="section-title" style="margin-bottom:14px;">Info Kas Kelas</div>

                    <div class="info-item">
                        <span class="info-label">Total Pembayaran Kas</span>
                        <span class="info-value">Rp {{ number_format($totalPembayaranSiswa ?? 0, 0, ',', '.') }}</span>
                    </div>

                    <div class="info-item">
                        <span class="info-label">Total Pengeluaran</span>
                        <span class="info-value expense">Rp
                            {{ number_format($totalPengeluaran ?? 0, 0, ',', '.') }}</span>
                    </div>

                    <div class="saldo-card-dark">
                        <span class="saldo-dark-title">Saldo Kas Kelas</span>
                        <span class="saldo-dark-val">Rp {{ number_format($saldoKas ?? 0, 0, ',', '.') }}</span>
                    </div>
                </div>

            </div>

        </section>

    </main>

    <!-- ================= MASCOT POJOK BAWAH (^ᴗ^) ================= -->
    <div class="mascot-container">
        <div class="mascot-bubble">
            Halo, semangat belajarnya hari ini! 📚<br>
            <span>Jangan lupa cek tagihan kas kamu ya! ✨</span>
        </div>
        <div class="mascot-body">
            <div class="mascot-face">^ᴗ^</div>
        </div>
    </div>

    <!-- BOTTOM NAV MOBILE -->
    <nav class="bottom-nav">
        <a href="{{ route('dashboard.siswa') }}" class="nav-item active">
            <span class="nav-icon">⌂</span>
            <span class="nav-text">Dashboard</span>
        </a>

        <a href="{{ route('dashboard.siswa.pembayaran') }}" class="nav-item">
            <span class="nav-icon">💳</span>
            <span class="nav-text">Bayar</span>
        </a>

        <a href="{{ route('dashboard.siswa.riwayat') }}" class="nav-item">
            <span class="nav-icon">⏱</span>
            <span class="nav-text">Riwayat</span>
        </a>

        <a href="{{ route('dashboard.siswa') }}" class="nav-item">
            <span class="nav-icon">ⓘ</span>
            <span class="nav-text">Info Kas</span>
        </a>
    </nav>

    <!-- LOGOUT FORM HIDDEN -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
        @csrf
    </form>

</body>

</html>
