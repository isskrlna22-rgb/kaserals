<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Riwayat Transaksi - KASERALS</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Tambahan font Nunito untuk Maskot -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Nunito:wght@700;800;900&display=swap"
        rel="stylesheet">

    <style>
        /* ================= ANIMASI GEMAS ================= */
        @keyframes floatMascot {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }

        @keyframes pulse-gemes {
            0% { box-shadow: 0 0 0 0 rgba(13, 148, 136, 0.4); }
            70% { box-shadow: 0 0 0 15px rgba(13, 148, 136, 0); }
            100% { box-shadow: 0 0 0 0 rgba(13, 148, 136, 0); }
        }

        @keyframes blink {
            0%, 96%, 98% { opacity: 1; }
            97% { opacity: 0; transform: scaleY(0.1); }
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background:
                radial-gradient(circle at 85% 10%, rgba(13, 148, 136, 0.10), transparent 25%),
                #f6f9fb;
            color: #0f172a;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button,
        input,
        select {
            font-family: inherit;
        }

        /* ================= SIDEBAR ================= */

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 270px;
            flex-shrink: 0;
            background: linear-gradient(180deg, #0f172a 0%, #111827 100%);
            color: white;
            padding: 28px 18px;
            box-shadow: 10px 0 35px rgba(15, 23, 42, 0.08);
            display: flex;
            flex-direction: column;
            z-index: 20;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 4px 10px 30px;
        }

        .logo-icon {
            width: 54px;
            height: 54px;
            border-radius: 17px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0d9488, #14b8a6);
            font-size: 25px;
            font-weight: 800;
            box-shadow: 0 10px 25px rgba(13, 148, 136, 0.28);
            animation: pulse-gemes 2s infinite; /* Efek Gemas Logo */
        }

        .logo-title {
            font-size: 21px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .logo-subtitle {
            margin-top: 3px;
            font-size: 11px;
            color: #94a3b8;
        }

        /* Navigasi */
        nav {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .nav-section {
            margin: 20px 10px 8px;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.5px;
            color: #64748b;
        }

        .nav-link {
            position: relative;
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 15px;
            border-radius: 15px;
            color: #cbd5e1;
            font-size: 14px;
            font-weight: 600;
            transition: .3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 5px;
            height: 0;
            border-radius: 0 8px 8px 0;
            background: #5eead4;
            transform: translateY(-50%);
            transition: height 0.3s ease;
        }

        .nav-link.active::before {
            height: 60%;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.06);
            color: white;
            transform: translateX(5px);
        }

        .nav-link.active {
            background: linear-gradient(135deg, #0d9488, #0f766e);
            color: white;
            box-shadow: 0 9px 25px rgba(13, 148, 136, 0.22);
        }

        .nav-icon {
            width: 25px;
            text-align: center;
            font-size: 17px;
            transition: transform 0.3s ease;
        }

        .nav-link:hover .nav-icon {
            transform: scale(1.2) rotate(-5deg);
        }

        /* SIDEBAR BOTTOM (PROFIL & LOGOUT) */
        .sidebar-bottom {
            margin-top: auto;
            border-top: 1px solid rgba(255, 255, 255, .08);
            padding-top: 24px;
        }

        .profile-mini {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #cbd5e1;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .profile-avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #1e293b;
            border: 2px solid #2dd4bf;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 800;
            color: #2dd4bf;
        }

        .logout-btn {
            width: 100%;
            padding: 12px 14px;
            background: rgba(239, 68, 68, .1);
            border: 1px solid rgba(239, 68, 68, .2);
            border-radius: 12px;
            color: #f87171;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .logout-btn:hover {
            background: #ef4444;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(239, 68, 68, 0.3);
        }

        /* ================= MAIN ================= */

        .main {
            flex: 1;
            min-width: 0;
        }

        .topbar {
            height: 82px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 38px;
            background: rgba(255, 255, 255, 0.78);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid #e2e8f0;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .topbar-title {
            font-size: 20px;
            font-weight: 800;
        }

        .avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ccfbf1;
            color: #0f766e;
            font-size: 13px;
            font-weight: 800;
            border: 3px solid white;
            box-shadow: 0 4px 15px rgba(15, 118, 110, .12);
            cursor: pointer;
            transition: 0.3s;
        }

        .avatar:hover {
            transform: scale(1.1) rotate(5deg);
        }

        .content {
            padding: 34px 38px 50px;
            max-width: 1500px;
        }

        /* ================= HERO ================= */

        .page-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 26px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: #0d9488;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.3px;
            margin-bottom: 9px;
        }

        .eyebrow-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #14b8a6;
            box-shadow: 0 0 0 5px rgba(20, 184, 166, .12);
        }

        .page-title {
            font-size: 32px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .page-description {
            margin-top: 7px;
            color: #64748b;
            font-size: 14px;
        }

        /* ================= SUMMARY ================= */

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 17px;
            margin-bottom: 24px;
        }

        .summary-card {
            position: relative;
            overflow: hidden;
            padding: 21px;
            border: 1px solid rgba(226, 232, 240, .9);
            border-radius: 20px;
            background: rgba(255, 255, 255, .82);
            box-shadow: 0 10px 30px rgba(15, 23, 42, .045);
            transition: 0.3s ease;
        }

        .summary-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(15, 23, 42, .08);
        }

        .summary-card::after {
            content: "";
            position: absolute;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            right: -25px;
            top: -30px;
            background: rgba(13, 148, 136, .07);
        }

        .summary-label {
            color: #64748b;
            font-size: 12px;
            font-weight: 700;
        }

        .summary-value {
            margin-top: 8px;
            font-size: 22px;
            font-weight: 800;
            letter-spacing: -.5px;
        }

        .summary-small {
            margin-top: 5px;
            color: #94a3b8;
            font-size: 11px;
        }

        .green { color: #059669; }
        .red { color: #dc2626; }
        .teal { color: #0d9488; }

        /* ================= FILTER ================= */

        .filter-card {
            margin-bottom: 25px;
            padding: 21px;
            border: 1px solid rgba(153, 246, 228, .8);
            border-radius: 22px;
            background: linear-gradient(135deg, rgba(240, 253, 250, .95), rgba(255, 255, 255, .9));
            box-shadow: 0 10px 30px rgba(13, 148, 136, .055);
        }

        .filter-top {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 13px;
        }

        .filter-bottom {
            display: grid;
            grid-template-columns: 1fr 1fr auto auto;
            gap: 13px;
            margin-top: 13px;
        }

        .input-wrap { position: relative; }

        .search-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 16px;
        }

        .input,
        .select {
            width: 100%;
            height: 50px;
            padding: 0 15px;
            border: 1px solid #cbd5e1;
            border-radius: 14px;
            background: white;
            color: #334155;
            outline: none;
            font-size: 13px;
            transition: .2s ease;
        }

        .search-input { padding-left: 44px; }

        .input:focus,
        .select:focus {
            border-color: #0d9488;
            box-shadow: 0 0 0 4px rgba(13, 148, 136, .09);
        }

        .filter-button {
            height: 50px;
            padding: 0 24px;
            border: none;
            border-radius: 14px;
            background: linear-gradient(135deg, #0d9488, #0f766e);
            color: white;
            font-weight: 800;
            font-size: 13px;
            cursor: pointer;
            box-shadow: 0 8px 18px rgba(13, 148, 136, .18);
            transition: .2s ease;
        }

        .filter-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 11px 23px rgba(13, 148, 136, .24);
        }

        .reset-button {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 16px;
            color: #0d9488;
            font-size: 13px;
            font-weight: 800;
        }

        .reset-button:hover { text-decoration: underline; }

        /* ================= TABLE ================= */

        .table-card {
            overflow: hidden;
            border: 1px solid #e2e8f0;
            border-radius: 22px;
            background: rgba(255, 255, 255, .88);
            box-shadow: 0 12px 35px rgba(15, 23, 42, .055);
        }

        .table-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 23px;
            border-bottom: 1px solid #e2e8f0;
        }

        .table-title {
            font-size: 15px;
            font-weight: 800;
        }

        .transaction-count {
            padding: 6px 11px;
            border-radius: 999px;
            background: #f0fdfa;
            color: #0d9488;
            font-size: 11px;
            font-weight: 800;
        }

        .table-scroll { overflow-x: auto; }

        table {
            width: 100%;
            min-width: 850px;
            border-collapse: collapse;
        }

        th {
            padding: 15px 20px;
            background: #f8fafc;
            color: #94a3b8;
            text-align: left;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
            white-space: nowrap;
        }

        td {
            padding: 17px 20px;
            border-top: 1px solid #f1f5f9;
            font-size: 13px;
        }

        tbody tr { transition: .18s ease; }

        tbody tr:hover { background: #f8fffe; }

        .date {
            color: #475569;
            font-weight: 600;
            white-space: nowrap;
        }

        .type-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 11px;
            border-radius: 999px;
            font-size: 10px;
            font-weight: 800;
            white-space: nowrap;
        }

        .type-in { background: #ecfdf5; color: #047857; }
        .type-out { background: #fef2f2; color: #dc2626; }

        .description {
            color: #334155;
            font-weight: 600;
        }

        .student-name {
            display: block;
            color: #0f172a;
            font-weight: 700;
        }

        .amount {
            text-align: right;
            font-weight: 800;
            white-space: nowrap;
        }

        .muted-dash {
            color: #cbd5e1;
            font-weight: 500;
        }

        .balance {
            text-align: right;
            font-weight: 800;
            color: #0f172a;
            white-space: nowrap;
        }

        /* ================= EMPTY ================= */

        .empty {
            padding: 65px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 58px;
            height: 58px;
            margin: 0 auto 15px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f0fdfa;
            color: #0d9488;
            font-size: 25px;
        }

        .empty-title {
            font-weight: 800;
            font-size: 15px;
        }

        .empty-text {
            margin-top: 6px;
            color: #94a3b8;
            font-size: 12px;
        }

        /* ================= MASCOT SENYUM KANAN BAWAH ================= */
        .mascot-container {
            position: fixed; bottom: 40px; right: 40px; z-index: 100;
            display: flex; flex-direction: column; align-items: flex-end;
            animation: floatMascot 4s ease-in-out infinite; font-family: 'Nunito', sans-serif;
        }

        .mascot-bubble {
            background: white; padding: 14px 20px; border-radius: 20px 20px 0 20px;
            box-shadow: 0 10px 25px rgba(13, 148, 136, 0.2); margin-bottom: 16px;
            font-size: 14px; font-weight: 800; color: #0f172a; max-width: 260px;
            text-align: center; opacity: 0; transform: translateY(20px) scale(0.9);
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            border: 2px solid #ccfbf1; line-height: 1.4;
        }

        .mascot-bubble span { color: #0d9488; }

        .mascot-body {
            width: 80px; height: 80px; background: linear-gradient(135deg, #2dd4bf, #0d9488);
            border-radius: 40%; display: flex; align-items: center; justify-content: center;
            box-shadow: 0 15px 30px rgba(13, 148, 136, 0.4); cursor: pointer;
            border: 4px solid #f8fafc; transition: all 0.3s ease; position: relative;
        }

        .mascot-face { font-size: 28px; color: white; font-weight: bold; animation: blink 4s infinite; }

        .mascot-container:hover .mascot-bubble { opacity: 1; transform: translateY(0) scale(1); }
        .mascot-container:hover .mascot-body { transform: scale(1.1) rotate(10deg); border-radius: 50%; }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 1050px) {
            .sidebar { width: 235px; }
            .summary-grid { grid-template-columns: 1fr; }
            .filter-top { grid-template-columns: 1fr; }
            .filter-bottom { grid-template-columns: 1fr 1fr; }
        }

        @media (max-width: 800px) {
            .sidebar { display: none; }
            .topbar { padding: 0 20px; }
            .content { padding: 25px 18px 40px; }
            .page-title { font-size: 26px; }
            .page-header { align-items: flex-start; }
            .filter-bottom { grid-template-columns: 1fr; }
            .mascot-container { display: none; }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="logo">
            <div class="logo-icon">K</div>
            <div>
                <div class="logo-title">KASERALS</div>
                <div class="logo-subtitle">Kas Kelas Digital</div>
            </div>
        </div>

        <nav>

            <a href="{{ route('dashboard') }}" class="nav-link">
                <span class="nav-icon">▣</span> Dashboard
            </a>

            <a href="{{ route('data-siswa.index') }}" class="nav-link">
                <span class="nav-icon">◉</span> Data Siswa
            </a>

            <div class="nav-section">TRANSAKSI</div>

            <a href="{{ route('pembayaran-kas.index') }}" class="nav-link">
                <span class="nav-icon">✓</span> Pembayaran Kas
            </a>

            <a href="{{ route('verifikasi-pembayaran.index') }}" class="nav-link">
                <span class="nav-icon">●</span> Verifikasi Pembayaran
            </a>

            <a href="{{ route('detail-pembayaran.index') }}" class="nav-link">
                <span class="nav-icon">▤</span> Detail Pembayaran
            </a>

            <a href="{{ route('pengeluaran.web.index') }}" class="nav-link">
                <span class="nav-icon">↑</span> Pengeluaran
            </a>

            <div class="nav-section">CATATAN</div>

            <a href="{{ route('riwayat.index') }}" class="nav-link active">
                <span class="nav-icon">↻</span> Riwayat Transaksi
            </a>

            @if (Route::has('pengumuman.index'))
                <a href="{{ route('pengumuman.index') }}" class="nav-link">
                    <span class="nav-icon">▣</span> Pengumuman
                </a>
            @endif

            <a href="{{ route('laporan.index') }}" class="nav-link">
                <span class="nav-icon">▤</span> Laporan Keuangan
            </a>

        </nav>

        <!-- PROFIL & LOGOUT BAWAH -->
        <div class="sidebar-bottom">
            <div class="profile-mini">
                <div class="profile-avatar">BE</div>
                <span>{{ Auth::user()->name ?? 'Bendahara' }}</span>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">
                    ↪ &nbsp; Keluar
                </button>
            </form>
        </div>

    </aside>


    <!-- MAIN -->
    <main class="main">

        <!-- TOPBAR -->
        <header class="topbar">
            <div class="topbar-title">Riwayat Transaksi</div>
            <div class="avatar">NS</div>
        </header>

        <!-- CONTENT -->
        <section class="content">

            <!-- HEADER -->
            <div class="page-header">
                <div>
                    <div class="eyebrow">
                        <span class="eyebrow-dot"></span> Catatan Keuangan
                    </div>
                    <h1 class="page-title">Riwayat Transaksi</h1>
                    <p class="page-description">
                        Pantau seluruh aktivitas pembayaran kas dan pengeluaran kas kelas.
                    </p>
                </div>
            </div>

            <!-- SUMMARY -->
            @php
                $jumlahTransaksi = $riwayat->count();

                $totalMasuk = $riwayat
                    ->where('tipe', 'masuk')
                    ->sum('nominal');

                $totalKeluar = $riwayat
                    ->where('tipe', 'keluar')
                    ->sum('nominal');
            @endphp

            <div class="summary-grid">

                <div class="summary-card">
                    <div class="summary-label">TOTAL TRANSAKSI</div>
                    <div class="summary-value teal">
                        {{ number_format($jumlahTransaksi, 0, ',', '.') }}
                    </div>
                    <div class="summary-small">Transaksi sesuai filter</div>
                </div>

                <div class="summary-card">
                    <div class="summary-label">TOTAL UANG MASUK</div>
                    <div class="summary-value green">
                        Rp {{ number_format($totalMasuk, 0, ',', '.') }}
                    </div>
                    <div class="summary-small">Pembayaran kas siswa</div>
                </div>

                <div class="summary-card">
                    <div class="summary-label">TOTAL UANG KELUAR</div>
                    <div class="summary-value red">
                        Rp {{ number_format($totalKeluar, 0, ',', '.') }}
                    </div>
                    <div class="summary-small">Pengeluaran kas</div>
                </div>

            </div>

            <!-- FILTER -->
            <form action="{{ route('riwayat.index') }}" method="GET">

                <div class="filter-card">

                    <div class="filter-top">
                        <div class="input-wrap">
                            <span class="search-icon">⌕</span>
                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                class="input search-input"
                                placeholder="Cari nama, keterangan, atau nominal..."
                            >
                        </div>

                        <select name="jenis" class="select">
                            <option value="">Semua jenis transaksi</option>
                            <option value="Pembayaran Kas" {{ request('jenis') == 'Pembayaran Kas' ? 'selected' : '' }}>
                                Pembayaran Kas
                            </option>

                            <option value="Pengeluaran" {{ request('jenis') == 'Pengeluaran' ? 'selected' : '' }}>
                                Pengeluaran
                            </option>
                        </select>
                    </div>

                    <div class="filter-bottom">
                        <input
                            type="date"
                            name="dari"
                            value="{{ request('dari') }}"
                            class="input"
                        >
                        <input
                            type="date"
                            name="sampai"
                            value="{{ request('sampai') }}"
                            class="input"
                        >
                        <button type="submit" class="filter-button">Terapkan Filter</button>
                        <a href="{{ route('riwayat.index') }}" class="reset-button">Reset</a>
                    </div>

                </div>

                <!-- TABLE -->
                <div class="table-card">

                    <div class="table-header">
                        <div class="table-title">Semua Transaksi</div>
                        <div class="transaction-count">
                            {{ number_format($jumlahTransaksi, 0, ',', '.') }} transaksi
                        </div>
                    </div>

                    <div class="table-scroll">
                        <table>
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jenis</th>
                                    <th>Nama / Keterangan</th>
                                    <th style="text-align:right;">Masuk</th>
                                    <th style="text-align:right;">Keluar</th>
                                    <th style="text-align:right;">Saldo</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($riwayat as $item)
                                    <tr>
                                        <!-- TANGGAL -->
                                        <td class="date">
                                            {{ \Carbon\Carbon::parse($item['tanggal'])->format('d M Y') }}
                                        </td>

                                        <!-- JENIS -->
                                        <td>
                                            @if ($item['tipe'] === 'masuk')
                                                <span class="type-badge type-in">↑ {{ $item['jenis'] }}</span>
                                            @else
                                                <span class="type-badge type-out">↓ {{ $item['jenis'] }}</span>
                                            @endif
                                        </td>

                                        <!-- KETERANGAN -->
                                        <td>
                                            @if (!empty($item['nama_siswa']))
                                                <span class="student-name">{{ $item['nama_siswa'] }}</span>
                                                <span class="description">{{ $item['keterangan'] }}</span>
                                            @else
                                                <span class="description">{{ $item['keterangan'] }}</span>
                                            @endif
                                        </td>

                                        <!-- MASUK -->
                                        <td class="amount green">
                                            @if ($item['tipe'] === 'masuk')
                                                Rp {{ number_format($item['nominal'], 0, ',', '.') }}
                                            @else
                                                <span class="muted-dash">—</span>
                                            @endif
                                        </td>

                                        <!-- KELUAR -->
                                        <td class="amount red">
                                            @if ($item['tipe'] === 'keluar')
                                                Rp {{ number_format($item['nominal'], 0, ',', '.') }}
                                            @else
                                                <span class="muted-dash">—</span>
                                            @endif
                                        </td>

                                        <!-- SALDO -->
                                        <td class="balance">
                                            Rp {{ number_format($item['saldo'], 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <div class="empty">
                                                <div class="empty-icon">↻</div>
                                                <div class="empty-title">Belum ada transaksi</div>
                                                <div class="empty-text">Data transaksi akan muncul di sini setelah dicatat.</div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </form>

        </section>

    </main>

</div>

<!-- ================= EFEK MASCOT KASI MELAYANG (POJOK KANAN BAWAH) ================= -->
<div class="mascot-container">
    <div class="mascot-bubble">
        Wih, laporannya rapi banget, De! 📝<br>
        <span>Semoga saldo kelas kita aman terus ya! ✨</span>
    </div>
    <div class="mascot-body">
        <div class="mascot-face">^ᴗ^</div>
    </div>
</div>

</body>
</html>
