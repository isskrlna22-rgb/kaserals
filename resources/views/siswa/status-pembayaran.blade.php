<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pembayaran - KASERALS</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            /* Warna dasar gelap mengikuti desain header di gambar */
            background-color: #0b1320;
            color: #0f172a;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }

        /* ================= SIDEBAR (DESKTOP) ================= */
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
            border-right: 1px solid rgba(255,255,255,0.05);
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
        }

        .brand-name {
            font-size: 18px;
            font-weight: 800;
            letter-spacing: 0.5px;
            color: #ffffff;
        }

        .brand-subtitle {
            font-size: 11px;
            color: #94a3b8;
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
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .menu-item:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.06);
            transform: translateX(3px);
        }

        .menu-item.active {
            background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%);
            color: white;
            box-shadow: 0 8px 20px rgba(13, 148, 136, 0.35);
            font-weight: 700;
        }

        .menu-icon {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        /* ================= MAIN AREA ================= */
        .main {
            margin-left: 250px;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* HEADER TEXT (DARK BG) */
        .page-header {
            padding: 40px 40px 20px;
            color: #ffffff;
        }

        .page-title {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -0.3px;
            margin-bottom: 4px;
        }

        .page-subtitle {
            font-size: 14px;
            color: #94a3b8;
            font-weight: 500;
        }

        /* WHITE CONTAINER MELENGKUNG */
        .content-wrapper {
            background-color: #ffffff;
            border-radius: 32px 32px 0 0;
            flex: 1;
            padding: 32px 40px 50px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* ================= CARDS ================= */
        .card {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
            transition: transform 0.2s;
        }

        .card:active {
            transform: scale(0.98);
        }

        /* KARTU 1: STATUS UTAMA */
        .status-main {
            text-align: center;
            padding: 32px 24px;
        }

        .status-month {
            font-size: 13px;
            font-weight: 800;
            color: #94a3b8;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 16px;
        }

        .badge-lunas-large {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background-color: #ecfdf5;
            color: #10b981;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .dot-green {
            width: 8px;
            height: 8px;
            background-color: #10b981;
            border-radius: 50%;
        }

        .status-nominal {
            font-size: 32px;
            font-weight: 800;
            color: #0b1320;
            letter-spacing: -0.5px;
            margin-bottom: 12px;
        }

        .status-footer-text {
            font-size: 13px;
            color: #94a3b8;
            font-weight: 500;
        }

        /* KARTU 2: PROGRES KAS */
        .card-title {
            font-size: 16px;
            font-weight: 800;
            color: #0b1320;
            margin-bottom: 16px;
        }

        .progress-bar {
            width: 100%;
            height: 12px;
            background-color: #e2e8f0;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 12px;
        }

        .progress-fill {
            height: 100%;
            background-color: #0d9488;
            border-radius: 10px;
            transition: width 1s ease-in-out;
        }

        .progress-text {
            font-size: 13px;
            color: #94a3b8;
            font-weight: 500;
        }

        /* KARTU 3: PERIODE SEBELUMNYA */
        .history-list {
            display: flex;
            flex-direction: column;
        }

        .history-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .history-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .history-item:first-child {
            padding-top: 4px;
        }

        .history-month {
            font-size: 15px;
            font-weight: 500;
            color: #0b1320;
        }

        .badge-sm {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 800;
        }

        .badge-lunas {
            background-color: #ecfdf5;
            color: #10b981;
        }

        .badge-belum {
            background-color: #fffbeb;
            color: #d97706;
        }

        /* ================= BOTTOM NAV (MOBILE) ================= */
        .bottom-nav {
            display: none;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: #ffffff;
            border-top: 1px solid #f1f5f9;
            grid-template-columns: repeat(4, 1fr);
            padding: 12px 16px 20px;
            z-index: 100;
        }

        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: #94a3b8;
            gap: 4px;
            padding: 4px 0;
            cursor: pointer;
            transition: all 0.2s;
        }

        .nav-item:active {
            transform: scale(0.9);
        }

        .nav-item.active {
            color: #0d9488;
        }

        .nav-icon {
            font-size: 20px;
            line-height: 1;
        }

        .nav-text {
            font-size: 11px;
            font-weight: 700;
        }

        /* ================= RESPONSIVE RULES ================= */
        @media (max-width: 768px) {
            .sidebar { display: none; }

            .main { margin-left: 0; }

            .page-header {
                padding: 32px 24px 20px; /* Header persis desain mobile */
            }

            .content-wrapper {
                padding: 24px 20px 100px; /* Ruang untuk nav bawah */
                border-radius: 24px 24px 0 0;
            }

            .bottom-nav { display: grid; }
        }
    </style>
</head>

<body>

<!-- ================= SIDEBAR (DESKTOP) ================= -->
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
        <a href="{{ route('dashboard.siswa') }}" class="menu-item">
            <span class="menu-icon">⌂</span>
            Dashboard
        </a>
    </div>

    <div class="menu-section">
        <div class="menu-title">TRANSAKSI</div>
        <!-- Status Pembayaran Aktif di Desktop -->
        <a href="{{ route('pembayaran.status') }}" class="menu-item active">
            <span class="menu-icon">≡</span>
            Status Pembayaran
        </a>
    </div>

    <div class="menu-section">
        <div class="menu-title">CATATAN</div>
        <a href="#" class="menu-item">
            <span class="menu-icon">◷</span>
            Riwayat Transaksi
        </a>
        <a href="#" class="menu-item">
            <span class="menu-icon">ⓘ</span>
            Info Kas
        </a>
    </div>
</aside>

<!-- ================= MAIN CONTENT ================= -->
<main class="main">

    <!-- HEADER PAGE (Dark Background) -->
    <div class="page-header">
        <h1 class="page-title">Status Pembayaran</h1>
        <p class="page-subtitle">Periode berjalan</p>
    </div>

    <!-- CONTENT WRAPPER (White Background Rounded) -->
    <div class="content-wrapper">

        <!-- KARTU 1: STATUS PERIODE BERJALAN -->
        <div class="card status-main">
            <div class="status-month">
                {{ strtoupper(now()->translatedFormat('F Y')) }}
            </div>

            @if($statusLunas ?? true)
                <div class="badge-lunas-large">
                    <span class="dot-green"></span> Lunas
                </div>
            @else
                <div class="badge-lunas-large" style="background: #fffbeb; color: #d97706;">
                    <span class="dot-green" style="background: #d97706;"></span> Belum Lunas
                </div>
            @endif

            <div class="status-nominal">
                Rp {{ number_format($nominalKas ?? 20000, 0, ',', '.') }}
            </div>

            <div class="status-footer-text">
                Dibayar {{ $tanggalBayar ?? '16 Nov 2026' }} · dicatat oleh {{ $namaBendahara ?? 'Iis Karlina' }}
            </div>
        </div>

        <!-- KARTU 2: PROGRES KELAS -->
        <div class="card">
            <h3 class="card-title">Progres Kas Kelas</h3>
            <div class="progress-bar">
                <!-- Ubah persentase width sesuai data (misal: 28/34 * 100 = 82%) -->
                <div class="progress-fill" style="width: 82%;"></div>
            </div>
            <p class="progress-text">
                {{ $jumlahMembayar ?? 28 }} dari {{ $totalSiswa ?? 34 }} siswa sudah membayar bulan ini
            </p>
        </div>

        <!-- KARTU 3: PERIODE SEBELUMNYA -->
        <div class="card">
            <h3 class="card-title">Periode Sebelumnya</h3>
            <div class="history-list">

                <!-- History Item 1 -->
                <div class="history-item">
                    <span class="history-month">Oktober 2026</span>
                    <span class="badge-sm badge-lunas">Lunas</span>
                </div>

                <!-- History Item 2 -->
                <div class="history-item">
                    <span class="history-month">September 2026</span>
                    <span class="badge-sm badge-belum">Belum</span>
                </div>

            </div>
        </div>

    </div>

</main>

<!-- ================= BOTTOM NAV (MOBILE) ================= -->
<nav class="bottom-nav">
    <a href="{{ route('dashboard.siswa') }}" class="nav-item">
        <span class="nav-icon">▢</span>
        <span class="nav-text">Beranda</span>
    </a>

    <!-- Menu Status Aktif di Mobile -->
    <a href="{{ route('pembayaran.status') }}" class="nav-item active">
        <span class="nav-icon">≡</span>
        <span class="nav-text">Status</span>
    </a>

    <a href="#" class="nav-item">
        <span class="nav-icon">↺</span>
        <span class="nav-text">Riwayat</span>
    </a>

    <a href="#" class="nav-item">
        <span class="nav-icon">ⓘ</span>
        <span class="nav-text">Info Kas</span>
    </a>
</nav>

</body>
</html>
