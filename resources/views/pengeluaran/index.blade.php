<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pengeluaran - KASERALS</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Tambahan font Nunito untuk Maskot -->
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Nunito:wght@700;800;900&display=swap"
        rel="stylesheet">

    <style>
        /* =========================
           GLOBAL & ANIMASI GEMAS
        ========================= */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background:
                radial-gradient(circle at top right, rgba(13, 148, 136, 0.08), transparent 30%),
                #f8fafc;
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

        @keyframes floatMascot {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-12px);
            }
        }

        @keyframes pulse-gemes {
            0% {
                box-shadow: 0 0 0 0 rgba(13, 148, 136, 0.4);
            }

            70% {
                box-shadow: 0 0 0 15px rgba(13, 148, 136, 0);
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

        /* =========================
           LAYOUT
        ========================= */
        .app {
            display: flex;
            min-height: 100vh;
        }

        /* =========================
           SIDEBAR
        ========================= */
        .sidebar {
            width: 280px;
            flex-shrink: 0;
            min-height: 100vh;
            padding: 28px 16px;
            background: linear-gradient(180deg, #0f172a 0%, #111827 100%);
            color: white;
            display: flex;
            flex-direction: column;
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.04);
            z-index: 20;
        }

        .logo-area {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 0 16px;
            margin-bottom: 34px;
        }

        .logo-box {
            width: 50px;
            height: 50px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0d9488, #14b8a6);
            font-size: 22px;
            font-weight: 800;
            box-shadow: 0 10px 30px rgba(13, 148, 136, 0.25);
            animation: pulse-gemes 2s infinite;
            /* Efek Gemas Logo */
        }

        .logo-title {
            font-size: 21px;
            font-weight: 800;
        }

        .logo-subtitle {
            margin-top: 3px;
            color: #94a3b8;
            font-size: 12px;
        }

        /* MENU MAKIN GEMAS */
        .nav {
            margin-top: 10px;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .nav-section {
            padding: 14px 20px 9px;
            color: #64748b;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .nav-link {
            position: relative;
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 18px;
            border-radius: 16px;
            color: #cbd5e1;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
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
            background: rgba(255, 255, 255, 0.05);
            color: white;
            transform: translateX(5px);
        }

        .nav-link:active {
            transform: translateX(2px) scale(0.98);
        }

        .nav-link.active {
            background: linear-gradient(135deg, #0d9488, #0f766e);
            color: white;
            font-weight: 700;
            box-shadow: 0 8px 20px rgba(13, 148, 136, 0.3);
        }

        .nav-icon {
            width: 20px;
            text-align: center;
            font-size: 16px;
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

        /* =========================
           MAIN & HEADER
        ========================= */
        .main {
            flex: 1;
            min-width: 0;
        }

        .topbar {
            height: 92px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            background: rgba(255, 255, 255, 0.82);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid #e2e8f0;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .topbar-title {
            font-size: 23px;
            font-weight: 800;
        }

        .profile {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ccfbf1;
            color: #0f766e;
            font-size: 14px;
            font-weight: 800;
            border: 2px solid white;
            box-shadow: 0 6px 18px rgba(15, 118, 110, 0.12);
            cursor: pointer;
            transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .profile:hover {
            transform: scale(1.1) rotate(5deg);
        }

        /* =========================
           CONTENT
        ========================= */
        .content {
            padding: 40px;
        }

        .page-title {
            margin-bottom: 30px;
        }

        .page-title h1 {
            font-size: 34px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .page-title p {
            margin-top: 9px;
            color: #64748b;
            font-size: 16px;
        }

        .expense-total {
            color: #dc2626;
            font-weight: 800;
        }

        /* =========================
           ALERT
        ========================= */
        .alert {
            padding: 15px 18px;
            margin-bottom: 22px;
            border-radius: 16px;
            font-size: 14px;
            font-weight: 600;
        }

        .alert-success {
            border: 1px solid #bbf7d0;
            background: #f0fdf4;
            color: #15803d;
            box-shadow: 0 4px 12px rgba(21, 128, 61, 0.05);
        }

        .alert-error {
            border: 1px solid #fecaca;
            background: #fef2f2;
            color: #b91c1c;
        }

        .alert-error p {
            margin-bottom: 7px;
            font-weight: 800;
        }

        .alert-error ul {
            padding-left: 20px;
        }

        /* =========================
           GRID & CARD
        ========================= */
        .content-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, 1.15fr);
            gap: 24px;
        }

        .card {
            padding: 28px;
            border: 1px solid rgba(226, 232, 240, 0.9);
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.88);
            box-shadow:
                0 10px 35px rgba(15, 23, 42, 0.05),
                0 1px 2px rgba(15, 23, 42, 0.04);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            transition: 0.3s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(15, 23, 42, 0.08);
        }

        .card-title {
            margin-bottom: 25px;
            font-size: 20px;
            font-weight: 800;
        }

        /* =========================
           FORM
        ========================= */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 9px;
            color: #334155;
            font-size: 14px;
            font-weight: 800;
        }

        .form-input,
        .form-select {
            width: 100%;
            height: 56px;
            padding: 0 17px;
            border: 1.5px solid #cbd5e1;
            border-radius: 15px;
            outline: none;
            background: rgba(255, 255, 255, 0.9);
            color: #0f172a;
            font-size: 14px;
            transition: 0.25s ease;
        }

        .form-input::placeholder {
            color: #94a3b8;
        }

        .form-input:hover,
        .form-select:hover {
            border-color: #94a3b8;
        }

        .form-input:focus,
        .form-select:focus {
            border-color: #0d9488;
            box-shadow:
                0 0 0 4px rgba(13, 148, 136, 0.10),
                0 8px 20px rgba(13, 148, 136, 0.08);
            transform: translateY(-1px);
        }

        /* =========================
           WARNING
        ========================= */
        .warning {
            margin-bottom: 22px;
            padding: 15px 18px;
            border: 1px solid #fde68a;
            border-radius: 16px;
            background: #fffbeb;
            color: #b45309;
            font-size: 13px;
            line-height: 1.6;
        }

        /* =========================
           BUTTON
        ========================= */
        .btn-submit {
            width: 100%;
            height: 56px;
            border: none;
            border-radius: 15px;
            background: linear-gradient(135deg, #0d9488, #0f766e);
            color: white;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 10px 22px rgba(13, 148, 136, 0.20);
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 28px rgba(13, 148, 136, 0.28);
        }

        .btn-submit:active {
            transform: translateY(1px) scale(0.98);
            box-shadow: 0 5px 12px rgba(13, 148, 136, 0.18);
        }

        /* =========================
           TABLE
        ========================= */
        .table-header {
            display: grid;
            grid-template-columns: 1fr 1.2fr 1fr auto;
            gap: 12px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e2e8f0;
            color: #94a3b8;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .expense-row {
            display: grid;
            grid-template-columns: 1fr 1.2fr 1fr auto;
            align-items: center;
            gap: 12px;
            padding: 19px 0;
            border-bottom: 1px solid #f1f5f9;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .expense-row:hover {
            padding-left: 10px;
            padding-right: 10px;
            border-radius: 12px;
            background: rgba(220, 38, 38, 0.035);
            transform: scale(1.01);
        }

        .expense-date,
        .expense-category {
            color: #475569;
            font-size: 13px;
            font-weight: 600;
        }

        .expense-description {
            margin-top: 4px;
            color: #94a3b8;
            font-size: 11px;
        }

        .expense-nominal {
            text-align: right;
            color: #dc2626;
            font-size: 14px;
            font-weight: 800;
        }

        .btn-edit {
            padding: 9px 13px;
            border: 1px solid #cbd5e1;
            border-radius: 11px;
            background: white;
            color: #334155;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-edit:hover {
            border-color: #0d9488;
            background: #f0fdfa;
            color: #0f766e;
            transform: scale(1.05);
        }

        .btn-edit:active {
            transform: scale(0.96);
        }

        .empty-state {
            padding: 45px 15px;
            text-align: center;
            color: #94a3b8;
            font-size: 14px;
        }

        /* =========================
           TOTAL
        ========================= */
        .total-area {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 30px;
            padding-top: 22px;
        }

        .total-label {
            font-size: 16px;
            font-weight: 800;
        }

        .total-value {
            color: #dc2626;
            font-size: 18px;
            font-weight: 800;
        }

        /* ================= MASCOT SENYUM KANAN BAWAH ================= */
        .mascot-container {
            position: fixed;
            bottom: 40px;
            right: 40px;
            z-index: 100;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            animation: floatMascot 4s ease-in-out infinite;
            font-family: 'Nunito', sans-serif;
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
            line-height: 1.4;
        }

        .mascot-bubble span {
            color: #dc2626;
        }

        /* Warna merah untuk pengeluaran */

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

        /* =========================
           RESPONSIVE
        ========================= */
        @media (max-width: 1100px) {
            .sidebar {
                width: 225px;
            }

            .content {
                padding: 28px;
            }

            .topbar {
                padding: 0 28px;
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 800px) {
            .sidebar {
                display: none;
            }

            .topbar {
                height: 76px;
                padding: 0 20px;
            }

            .topbar-title {
                font-size: 19px;
            }

            .content {
                padding: 22px 18px;
            }

            .page-title h1 {
                font-size: 28px;
            }

            .mascot-container {
                display: none;
            }
        }

        @media (max-width: 600px) {
            .card {
                padding: 20px;
                border-radius: 19px;
            }

            .table-header {
                grid-template-columns: 1fr 1fr;
            }

            .table-header span:nth-child(3),
            .table-header span:nth-child(4) {
                display: none;
            }

            .expense-row {
                grid-template-columns: 1fr 1fr;
                gap: 8px;
            }

            .expense-nominal {
                text-align: left;
            }

            .btn-edit {
                grid-column: 2;
                justify-self: end;
            }

            .total-area {
                gap: 15px;
            }
        }
    </style>
</head>

<body>

    <div class="app">

        <!-- SIDEBAR -->
        <aside class="sidebar">

            <!-- LOGO -->
            <div class="logo-area">
                <div class="logo-box">K</div>
                <div>
                    <div class="logo-title">KASERALS</div>
                    <div class="logo-subtitle">Kas Kelas Digital</div>
                </div>
            </div>

            <!-- NAVIGATION -->
            <nav class="nav">

                <a href="{{ route('dashboard') }}" class="nav-link">
                    <span class="nav-icon">▣</span>
                    Dashboard
                </a>

                <a href="{{ route('data-siswa.index') }}" class="nav-link">
                    <span class="nav-icon">◉</span>
                    Data Siswa
                </a>

                <!-- TRANSAKSI -->
                <div class="nav-section">TRANSAKSI</div>

                <a href="{{ route('pembayaran-kas.index') }}" class="nav-link">
                    <span class="nav-icon">✓</span>
                    Pembayaran Kas
                </a>

                <a href="{{ route('verifikasi-pembayaran.index') }}" class="nav-link">
                    <span class="nav-icon">●</span>
                    Verifikasi Pembayaran
                </a>

                <a href="{{ route('detail-pembayaran.index') }}" class="nav-link">
                    <span class="nav-icon">▤</span>
                    Detail Pembayaran
                </a>

                <!-- ACTIVE -->
                <a href="{{ route('pengeluaran.web.index') }}" class="nav-link active">
                    <span class="nav-icon">↑</span>
                    Pengeluaran
                </a>

                <!-- CATATAN -->
                <div class="nav-section">CATATAN</div>

                <a href="{{ route('riwayat.index') }}" class="nav-link">
                    <span class="nav-icon">↻</span>
                    Riwayat Transaksi
                </a>

                @if (Route::has('pengumuman.index'))
                    <a href="{{ route('pengumuman.index') }}" class="nav-link">
                        <span class="nav-icon">▣</span>
                        Pengumuman
                    </a>
                @endif

                <a href="{{ route('laporan.index') }}" class="nav-link">
                    <span class="nav-icon">▤</span>
                    Laporan Keuangan
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
                <h2 class="topbar-title">
                    Pengeluaran
                </h2>
                <div class="profile">
                    IK
                </div>
            </header>

            <!-- CONTENT -->
            <section class="content">

                <!-- SUCCESS MESSAGE -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- VALIDATION ERROR -->
                @if ($errors->any())
                    <div class="alert alert-error">
                        <p>Data belum dapat disimpan:</p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- TITLE -->
                <div class="page-title">
                    <h1>Pengeluaran Kas</h1>
                    <p>
                        Total pengeluaran bulan ini:
                        <span class="expense-total">
                            Rp {{ number_format($pengeluaran->sum('nominal'), 0, ',', '.') }}
                        </span>
                    </p>
                </div>

                <!-- CONTENT GRID -->
                <div class="content-grid">

                    <!-- FORM -->
                    <div class="card">
                        <h2 class="card-title">Tambah Pengeluaran</h2>
                        <form action="{{ route('pengeluaran.web.store') }}" method="POST">
                            @csrf

                            <!-- TANGGAL -->
                            <div class="form-group">
                                <label class="form-label">Tanggal *</label>
                                <input type="date" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}"
                                    required class="form-input">
                            </div>

                            <!-- KATEGORI -->
                            <div class="form-group">
                                <label class="form-label">Kategori *</label>
                                <select name="kategori" required class="form-select">
                                    <option value="">Pilih kategori</option>
                                    <option value="Kegiatan">Kegiatan kelas</option>
                                    <option value="Perlengkapan">Perlengkapan kelas</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>

                            <!-- NOMINAL -->
                            <div class="form-group">
                                <label class="form-label">Nominal *</label>
                                <input type="number" name="nominal" value="{{ old('nominal') }}" min="1"
                                    required placeholder="150000" class="form-input">
                            </div>

                            <!-- KETERANGAN -->
                            <div class="form-group">
                                <label class="form-label">Keterangan</label>
                                <input type="text" name="keterangan" value="{{ old('keterangan') }}"
                                    placeholder="Penjelasan singkat" class="form-input">
                            </div>

                            <!-- WARNING -->
                            <div class="warning">
                                Pastikan nominal pengeluaran sesuai dengan kondisi saldo kas.
                            </div>

                            <!-- BUTTON -->
                            <button type="submit" class="btn-submit">
                                Simpan Pengeluaran
                            </button>
                        </form>
                    </div>

                    <!-- DAFTAR -->
                    <div class="card">
                        <h2 class="card-title">Daftar Pengeluaran — Bulan Ini</h2>

                        <!-- TABLE HEADER -->
                        <div class="table-header">
                            <span>Tanggal</span>
                            <span>Kategori</span>
                            <span style="text-align: right;">Nominal</span>
                            <span></span>
                        </div>

                        <!-- DATA -->
                        @forelse($pengeluaran as $item)
                            <div class="expense-row">

                                <span class="expense-date">
                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M') }}
                                </span>

                                <div>
                                    <span class="expense-category">
                                        {{ $item->kategori }}
                                    </span>

                                    @if ($item->keterangan)
                                        <p class="expense-description">
                                            {{ $item->keterangan }}
                                        </p>
                                    @endif
                                </div>

                                <span class="expense-nominal">
                                    Rp {{ number_format($item->nominal, 0, ',', '.') }}
                                </span>

                                <div style="display: flex; gap: 8px; justify-content: flex-end;">

                                    <button type="button" class="btn-edit"
                                        onclick="openEditModal(
                    {{ $item->id_pengeluaran }},
                    '{{ $item->tanggal }}',
                    @js($item->kategori),
                    {{ $item->nominal }},
                    @js($item->keterangan)
                )">
                                        Ubah
                                    </button>

                                    <form action="{{ route('pengeluaran.web.destroy', $item->id_pengeluaran) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus pengeluaran ini?')"
                                        style="margin: 0;">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-edit" style="color: #dc2626;">
                                            Hapus
                                        </button>
                                    </form>

                                </div>

                            </div>

                        @empty

                            <div class="empty-state">
                                Belum ada data pengeluaran.
                            </div>
                        @endforelse
                        <!-- TOTAL -->
                        <div class="total-area">
                            <span class="total-label">Total</span>
                            <span class="total-value">
                                Rp {{ number_format($pengeluaran->sum('nominal'), 0, ',', '.') }}
                            </span>
                        </div>
                    </div>

                </div>
            </section>
        </main>
    </div>

    <!-- ================= EFEK MASCOT KASI MELAYANG (POJOK KANAN BAWAH) ================= -->
    <div class="mascot-container">
        <div class="mascot-bubble">
            Semangat nge-rekapnya! 💪<br>
            Hati-hati, uang kas kita makin menipis nih! <span>T_T</span>
        </div>
        <div class="mascot-body">
            <div class="mascot-face">^ᴗ^</div>
        </div>
    </div>
<!-- ================= MODAL EDIT PENGELUARAN ================= -->

<div id="editModal" class="edit-modal">

    <div class="edit-modal-content">

        <div class="edit-modal-header">
            <h2>Ubah Pengeluaran</h2>

            <button type="button" class="edit-modal-close" onclick="closeEditModal()">
                &times;
            </button>
        </div>

        <form id="editPengeluaranForm" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">

                <label class="form-label">
                    Tanggal *
                </label>

                <input
                    type="date"
                    name="tanggal"
                    id="editTanggal"
                    required
                    class="form-input"
                >

            </div>

            <div class="form-group">

                <label class="form-label">
                    Kategori *
                </label>

                <select
                    name="kategori"
                    id="editKategori"
                    required
                    class="form-select"
                >
                    <option value="">Pilih kategori</option>
                    <option value="Kegiatan">Kegiatan</option>
                    <option value="Perlengkapan">Perlengkapan</option>
                    <option value="Konsumsi">Konsumsi</option>
                    <option value="Dokumentasi">Dokumentasi</option>
                    <option value="Lainnya">Lainnya</option>
                </select>

            </div>

            <div class="form-group">

                <label class="form-label">
                    Nominal *
                </label>

                <input
                    type="number"
                    name="nominal"
                    id="editNominal"
                    min="1"
                    required
                    class="form-input"
                >

            </div>

            <div class="form-group">

                <label class="form-label">
                    Keterangan
                </label>

                <input
                    type="text"
                    name="keterangan"
                    id="editKeterangan"
                    class="form-input"
                    placeholder="Penjelasan singkat"
                >

            </div>

            <div class="edit-modal-actions">

                <button
                    type="button"
                    class="btn-cancel"
                    onclick="closeEditModal()"
                >
                    Batal
                </button>

                <button
                    type="submit"
                    class="btn-submit"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>


<style>

.edit-modal {
    display: none;
    position: fixed;
    inset: 0;
    z-index: 9999;
    background: rgba(0, 0, 0, 0.45);
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.edit-modal.show {
    display: flex;
}

.edit-modal-content {
    width: 100%;
    max-width: 500px;
    background: white;
    border-radius: 16px;
    padding: 24px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
}

.edit-modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
}

.edit-modal-header h2 {
    margin: 0;
    font-size: 22px;
}

.edit-modal-close {
    border: none;
    background: transparent;
    font-size: 28px;
    cursor: pointer;
    color: #64748b;
}

.edit-modal-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 20px;
}

.btn-cancel {
    padding: 12px 18px;
    border: none;
    border-radius: 8px;
    background: #e5e7eb;
    color: #374151;
    cursor: pointer;
    font-weight: 600;
}

</style>


<script>

function openEditModal(id, tanggal, kategori, nominal, keterangan) {

    const modal = document.getElementById('editModal');

    const form = document.getElementById('editPengeluaranForm');

    document.getElementById('editTanggal').value = tanggal;

    document.getElementById('editKategori').value = kategori;

    document.getElementById('editNominal').value = nominal;

    document.getElementById('editKeterangan').value = keterangan ?? '';

    form.action = "{{ url('/data-pengeluaran') }}/" + id;

    modal.classList.add('show');
}


function closeEditModal() {

    const modal = document.getElementById('editModal');

    modal.classList.remove('show');

}


document.getElementById('editModal').addEventListener('click', function(event) {

    if (event.target === this) {
        closeEditModal();
    }

});

</script>
</body>

</html>
