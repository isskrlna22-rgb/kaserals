<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi | KASERALS</title>

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
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        @keyframes pulseLogo {
            0% { box-shadow: 0 0 0 0 rgba(13, 148, 136, 0.4); }
            70% { box-shadow: 0 0 0 12px rgba(13, 148, 136, 0); }
            100% { box-shadow: 0 0 0 0 rgba(13, 148, 136, 0); }
        }

        @keyframes blink {
            0%, 96%, 98% { opacity: 1; }
            97% { opacity: 0; transform: scaleY(0.1); }
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

        /* ================= STATS CARDS ================= */
        .stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 22px;
            padding: 24px;
            box-shadow: 0 10px 30px -5px rgba(13, 148, 136, 0.05);
            transition: 0.3s;
        }

        .stat-card:hover {
            box-shadow: 0 15px 35px -5px rgba(13, 148, 136, 0.1);
            transform: translateY(-2px);
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 14px;
        }

        .stat-label {
            color: #64748b;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-icon {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: #ccfbf1;
            color: #0d9488;
            font-size: 18px;
            font-weight: 800;
        }

        .stat-number {
            font-size: 24px;
            font-weight: 800;
            color: #0f172a;
            overflow-wrap: anywhere;
        }

        .stat-note {
            color: #94a3b8;
            font-size: 11px;
            margin-top: 6px;
            font-weight: 500;
        }

        /* ================= PANEL & TABEL ================= */
        .panel {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 10px 30px -5px rgba(13, 148, 136, 0.05);
        }

        .panel-header {
            padding: 24px 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            border-bottom: 1px solid #f1f5f9;
        }

        .panel-title {
            font-size: 16px;
            font-weight: 800;
            color: #0f172a;
        }

        .panel-description {
            font-size: 12px;
            color: #64748b;
            margin-top: 4px;
            font-weight: 500;
        }

        .transaction-count {
            font-size: 11px;
            color: #0d9488;
            background: #ccfbf1;
            padding: 8px 14px;
            border-radius: 12px;
            font-weight: 800;
            white-space: nowrap;
        }

        .filters {
            padding: 20px 28px;
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            border-bottom: 1px solid #f1f5f9;
            background: rgba(248, 250, 252, 0.5);
        }

        .search-box {
            position: relative;
            flex: 1;
            min-width: 220px;
        }

        .search-box span {
            position: absolute;
            top: 50%;
            left: 14px;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 16px;
        }

        .search-box input,
        .filters select {
            width: 100%;
            height: 44px;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 0 14px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            color: #0f172a;
            outline: none;
            background: white;
            transition: 0.3s;
        }

        .search-box input {
            padding-left: 40px;
        }

        .search-box input:focus,
        .filters select:focus {
            border-color: #0d9488;
            box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.1);
        }

        .filters select {
            width: 180px;
            cursor: pointer;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 760px;
        }

        thead {
            background: #f8fafc;
        }

        th {
            padding: 16px 24px;
            color: #64748b;
            text-align: left;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.5px;
            white-space: nowrap;
            border-bottom: 2px solid #e2e8f0;
        }

        td {
            padding: 18px 24px;
            border-top: 1px solid #f1f5f9;
            font-size: 13px;
            vertical-align: middle;
            color: #334155;
            font-weight: 500;
        }

        tbody tr:hover {
            background: #f0fdfa;
        }

        .transaction-id {
            font-size: 11px;
            color: #94a3b8;
            margin-bottom: 2px;
            font-weight: 700;
        }

        .transaction-name {
            font-weight: 800;
            color: #0f172a;
        }

        .transaction-date {
            color: #64748b;
            font-size: 11px;
            margin-top: 2px;
            font-weight: 600;
        }

        .amount {
            font-weight: 800;
            color: #0f172a;
            white-space: nowrap;
        }

        .method {
            color: #475569;
            font-weight: 700;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 800;
            white-space: nowrap;
        }

        .status::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        .status-diterima {
            color: #166534;
            background: #dcfce7;
            border: 1px solid #bbf7d0;
        }

        .status-menunggu {
            color: #b45309;
            background: #fef3c7;
            border: 1px solid #fde68a;
        }

        .status-ditolak {
            color: #991b1b;
            background: #fee2e2;
            border: 1px solid #fecaca;
        }

        .status-lain {
            color: #475569;
            background: #f1f5f9;
        }

        .empty-state {
            text-align: center;
            padding: 50px 20px;
        }

        .empty-icon {
            font-size: 40px;
            margin-bottom: 12px;
            opacity: 0.7;
        }

        .empty-title {
            font-size: 15px;
            font-weight: 800;
            color: #0f172a;
        }

        .empty-description {
            color: #64748b;
            font-size: 12px;
            line-height: 1.7;
            margin-top: 6px;
            font-weight: 500;
        }

        .empty-action {
            display: inline-block;
            margin-top: 18px;
            padding: 12px 20px;
            background: linear-gradient(135deg, #0d9488, #0f766e);
            color: white;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 800;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(13, 148, 136, 0.25);
            transition: 0.3s;
        }

        .empty-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(13, 148, 136, 0.35);
        }

        .no-results {
            display: none;
            text-align: center;
            padding: 30px;
            font-size: 13px;
            color: #64748b;
            font-weight: 600;
        }

        .panel-footer {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            padding: 18px 28px;
            border-top: 1px solid #f1f5f9;
            color: #94a3b8;
            font-size: 11px;
            font-weight: 600;
        }

        .footer-bottom {
            text-align: center;
            color: #94a3b8;
            font-size: 11px;
            padding-top: 30px;
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

        .nav-icon {
            font-size: 18px;
        }

        .nav-text {
            font-size: 10px;
        }

        @media (max-width: 900px) {
            .stats {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 760px) {
            .sidebar {
                display: none;
            }

            .main {
                margin-left: 0;
                padding: 20px 16px 90px;
            }

            .bottom-nav {
                display: grid;
            }

            .mascot-container {
                display: none;
            }

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
                margin: -20px -16px 24px -16px;
            }

            .brand-mobile {
                font-size: 20px;
                font-weight: 800;
            }

            .brand-mobile span {
                color: #2dd4bf;
            }
        }
    </style>
</head>

<body>
    @php
        $totalTransaksi = $pembayaran->count();

        $totalDiterima = $pembayaran
            ->where('status', 'Diterima')
            ->sum('nominal');

        $totalMenunggu = $pembayaran
            ->where('status', 'Menunggu')
            ->sum('nominal');

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
            <a href="{{ route('dashboard.siswa.riwayat') }}" class="menu-item active">
                <span class="menu-icon">⏱</span> Riwayat Transaksi
            </a>
            <a href="{{ route('dashboard.siswa') }}#info-kas" class="menu-item">
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
                    <h1>Riwayat Transaksi ⏱</h1>
                    <p>
                        Pantau seluruh transaksi pembayaran kas kelas yang tercatat pada akunmu.
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

            <!-- STATISTIK RINGKASAN -->
            <section class="stats">
                <div class="stat-card">
                    <div class="stat-top">
                        <div class="stat-label">Total Transaksi</div>
                        <div class="stat-icon">↻</div>
                    </div>
                    <div class="stat-number">{{ number_format($totalTransaksi, 0, ',', '.') }}</div>
                    <div class="stat-note">Jumlah catatan pembayaran kas milikmu</div>
                </div>

                <div class="stat-card">
                    <div class="stat-top">
                        <div class="stat-label">Pembayaran Diterima</div>
                        <div class="stat-icon">✓</div>
                    </div>
                    <div class="stat-number">
                        Rp {{ number_format((float) $totalDiterima, 0, ',', '.') }}
                    </div>
                    <div class="stat-note">Akumulasi transaksi berstatus Diterima</div>
                </div>

                <div class="stat-card">
                    <div class="stat-top">
                        <div class="stat-label">Menunggu Verifikasi</div>
                        <div class="stat-icon">◷</div>
                    </div>
                    <div class="stat-number">
                        Rp {{ number_format((float) $totalMenunggu, 0, ',', '.') }}
                    </div>
                    <div class="stat-note">Akumulasi transaksi berstatus Menunggu</div>
                </div>
            </section>

            <!-- PANEL TABEL RIWAYAT -->
            <section class="panel">
                <div class="panel-header">
                    <div>
                        <div class="panel-title">Daftar Transaksi</div>
                        <div class="panel-description">
                            Data ditampilkan berdasarkan catatan pembayaran di database.
                        </div>
                    </div>

                    <div class="transaction-count">
                        {{ number_format($totalTransaksi, 0, ',', '.') }} transaksi
                    </div>
                </div>

                <div class="filters">
                    <div class="search-box">
                        <span>⌕</span>
                        <input
                            type="search"
                            id="searchTransaction"
                            placeholder="Cari tanggal, metode, nominal, atau status..."
                            aria-label="Cari transaksi"
                        >
                    </div>

                    <select id="filterStatus" aria-label="Filter status transaksi">
                        <option value="">Semua Status</option>
                        <option value="diterima">Diterima</option>
                        <option value="menunggu">Menunggu</option>
                        <option value="ditolak">Ditolak</option>
                    </select>
                </div>

                @if ($pembayaran->isNotEmpty())
                    <div class="table-wrap">
                        <table id="transactionTable">
                            <thead>
                                <tr>
                                    <th>TRANSAKSI</th>
                                    <th>TANGGAL</th>
                                    <th>METODE</th>
                                    <th>NOMINAL</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($pembayaran as $item)
                                    @php
                                        $statusAsli = $item->status ?? 'Belum ada status';
                                        $statusSlug = strtolower(trim($statusAsli));

                                        $statusClass = match ($statusSlug) {
                                            'diterima' => 'status-diterima',
                                            'menunggu' => 'status-menunggu',
                                            'ditolak' => 'status-ditolak',
                                            default => 'status-lain',
                                        };

                                        $tanggal = $item->tanggal
                                            ? \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y')
                                            : '-';

                                        $metode = $item->metode_pembayaran ?: '-';
                                    @endphp

                                    <tr class="transaction-row"
                                        data-status="{{ $statusSlug }}"
                                        data-search="{{ strtolower($tanggal . ' ' . $metode . ' ' . $statusAsli . ' ' . $item->nominal . ' ' . ($item->keterangan ?? '')) }}">

                                        <td>
                                            <div class="transaction-id">
                                                ID #{{ $item->id_pembayaran }}
                                            </div>
                                            <div class="transaction-name">Pembayaran Kas</div>

                                            @if (!empty($item->minggu_ke))
                                                <div class="transaction-date">
                                                    Minggu ke-{{ $item->minggu_ke }}
                                                </div>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="transaction-name">{{ $tanggal }}</div>
                                        </td>

                                        <td>
                                            <span class="method">{{ $metode }}</span>
                                        </td>

                                        <td>
                                            <div class="amount">
                                                Rp {{ number_format((float) $item->nominal, 0, ',', '.') }}
                                            </div>
                                        </td>

                                        <td>
                                            <span class="status {{ $statusClass }}">
                                                {{ $statusAsli }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div id="noResults" class="no-results">
                        Tidak ada transaksi yang sesuai dengan pencarian atau filter.
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-icon">🧾</div>
                        <div class="empty-title">Belum Ada Transaksi</div>
                        <p class="empty-description">
                            Belum ada catatan pembayaran kas untuk akunmu.<br>
                            Setelah pembayaran tercatat, riwayatnya akan muncul di halaman ini.
                        </p>

                        <a href="{{ route('dashboard.siswa.pembayaran') }}" class="empty-action">
                            Buka Pembayaran Kas
                        </a>
                    </div>
                @endif

                <div class="panel-footer">
                    <span>Data bersumber dari catatan pembayaran akun siswa yang sedang login.</span>
                    <span>KASERALS · {{ date('Y') }}</span>
                </div>
            </section>

            <div class="footer-bottom">
                © {{ date('Y') }} KASERALS · Sistem Pengelolaan Kas Kelas Digital
            </div>

        </div>
    </main>

    <!-- MASCOT POJOK BAWAH (^ᴗ^) -->
    <div class="mascot-container">
        <div class="mascot-bubble">
            Cek riwayat pembayaranmu di sini ya! 📑<br>
            <span>Transparan dan rapi banget! ✨</span>
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
            <span class="nav-text">Bayar Kas</span>
        </a>
        <a href="{{ route('dashboard.siswa.status') }}" class="nav-item">
            <span class="nav-icon">✓</span>
            <span class="nav-text">Status</span>
        </a>
        <a href="{{ route('dashboard.siswa.riwayat') }}" class="nav-item active">
            <span class="nav-icon">⏱</span>
            <span class="nav-text">Riwayat</span>
        </a>
    </nav>

    <!-- LOGOUT FORM HIDDEN -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
        @csrf
    </form>

    <script>
        const searchInput = document.getElementById('searchTransaction');
        const statusFilter = document.getElementById('filterStatus');
        const transactionRows = document.querySelectorAll('.transaction-row');
        const noResults = document.getElementById('noResults');

        function filterTransactions() {
            const keyword = searchInput ? searchInput.value.toLowerCase().trim() : '';
            const selectedStatus = statusFilter ? statusFilter.value.toLowerCase() : '';
            let visibleCount = 0;

            transactionRows.forEach(function (row) {
                const searchableText = row.dataset.search || '';
                const rowStatus = row.dataset.status || '';

                const matchesSearch = searchableText.includes(keyword);
                const matchesStatus = !selectedStatus || rowStatus === selectedStatus;

                const visible = matchesSearch && matchesStatus;
                row.style.display = visible ? '' : 'none';

                if (visible) {
                    visibleCount++;
                }
            });

            if (noResults) {
                noResults.style.display =
                    transactionRows.length > 0 && visibleCount === 0
                        ? 'block'
                        : 'none';
            }
        }

        if (searchInput) searchInput.addEventListener('input', filterTransactions);
        if (statusFilter) statusFilter.addEventListener('change', filterTransactions);
    </script>
</body>

</html>
