<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Bendahara - KASERALS</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Tambahan font Nunito untuk Maskot -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Nunito:wght@700;800;900&display=swap"
        rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f8fafc;
            color: #0f172a;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        /* ================= ANIMASI GEMES GLOBAL ================= */
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

        /* ================= SIDEBAR ================= */

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #0f172a 0%, #080d1a 100%);
            color: white;
            padding: 32px 22px;
            display: flex;
            flex-direction: column;
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.04);
            z-index: 10;
            flex-shrink: 0;
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
            color: #fff;
            box-shadow: 0 8px 16px rgba(13, 148, 136, .35);
            animation: pulse-gemes 2s infinite;
        }

        .brand-text h2 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .brand-text p {
            color: #94a3b8;
            font-size: 12px;
        }

        /* ================= MENU MAKIN BAGUS & GEMES ================= */
        .menu {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .menu-title {
            color: #475569;
            font-size: 11px;
            font-weight: 800;
            margin: 22px 12px 8px;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .menu a {
            position: relative;
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 18px;
            color: #94a3b8;
            border-radius: 16px; /* Ujung lebih membulat */
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }

        /* Garis indikator hijau di kiri */
        .menu a::before {
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

        .menu a.active::before {
            height: 60%;
        }

        .menu a:hover {
            background: rgba(255, 255, 255, .05);
            color: #fff;
            transform: translateX(5px);
        }

        .menu a:active {
            transform: translateX(2px) scale(0.98);
        }

        .menu a.active {
            background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%);
            color: #fff;
            font-weight: 700;
            box-shadow: 0 8px 20px rgba(13, 148, 136, .3);
        }

        .menu-icon {
            width: 20px;
            text-align: center;
            font-size: 16px;
            display: inline-block;
            transition: transform 0.3s ease;
        }

        .menu a:hover .menu-icon {
            transform: scale(1.2) rotate(-5deg);
        }

        /* ================= SIDEBAR BOTTOM (JANGAN JAUH) ================= */
        .sidebar-bottom {
            margin-top: 32px; /* Diubah dari auto agar tidak lompat ke bawah banget */
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
            background: #f8fafc;
        }

        .header {
            height: 88px;
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 36px;
        }

        .header-left h1 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .header-left p {
            color: #64748b;
            font-size: 13px;
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
            cursor: pointer;
            transition: 0.3s;
        }

        .header-avatar:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 5px 15px rgba(13, 148, 136, 0.2);
        }

        /* ================= CONTENT ================= */

        .content {
            padding: 32px 36px;
        }

        /* ================= WELCOME ================= */

        .welcome-banner {
            background: linear-gradient(135deg, #0f766e 0%, #14b8a6 100%);
            border-radius: 20px;
            padding: 32px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
            color: white;
            box-shadow: 0 10px 25px -5px rgba(20, 184, 166, .4);
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .welcome-banner:hover {
            transform: translateY(-3px);
        }

        .welcome-banner::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -5%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(255, 255, 255, .15), transparent 70%);
            border-radius: 50%;
        }

        .welcome-text {
            position: relative;
            z-index: 2;
        }

        .welcome-text h2 {
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .welcome-text p {
            font-size: 15px;
            line-height: 1.6;
            max-width: 600px;
        }

        .welcome-mascot {
            width: 160px;
            height: 160px;
            object-fit: contain;
            z-index: 2;
            animation: floatMascot 4s ease-in-out infinite;
            filter: drop-shadow(0 10px 10px rgba(0,0,0,0.15));
        }

        /* ================= SUMMARY ================= */

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-bottom: 28px;
        }

        .summary-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 24px 28px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, .03);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s ease;
        }

        .summary-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px -5px rgba(13, 148, 136, .1);
        }

        .summary-card.dark {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            color: white;
            border: none;
        }

        .summary-card.dark:hover {
            box-shadow: 0 15px 35px -5px rgba(15, 23, 42, .4);
        }

        .summary-title {
            color: #64748b;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .8px;
            text-transform: uppercase;
            margin-bottom: 14px;
        }

        .dark .summary-title {
            color: #94a3b8;
        }

        .summary-value {
            font-size: 30px;
            font-weight: 800;
        }

        .summary-value.green {
            color: #10b981;
        }

        .dark .summary-value {
            color: #fff;
        }

        .summary-date {
            margin-top: 10px;
            color: #64748b;
            font-size: 13px;
        }

        .dark .summary-date {
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
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 28px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, .03);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px -5px rgba(0, 0, 0, .05);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .card-header h2 {
            font-size: 20px;
        }

        .card-link {
            color: #0d9488;
            font-size: 13px;
            font-weight: 700;
            transition: 0.2s;
        }

        .card-link:hover {
            color: #0f766e;
            text-decoration: underline;
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
            transition: transform 0.2s;
            cursor: default;
        }

        .status-box:hover {
            transform: scale(1.02);
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
            margin-bottom: 20px;
        }

        .quick-btn {
            width: 100%;
            min-height: 50px;
            border-radius: 14px;
            border: 1px solid #e2e8f0;
            background: #fff;
            color: #334155;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .quick-btn:hover {
            background: #f8fafc;
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .quick-btn.primary {
            background: linear-gradient(135deg, #0d9488, #0f766e);
            color: white;
            border: none;
            box-shadow: 0 4px 14px rgba(13, 148, 136, .35);
        }

        .quick-btn.primary:hover {
            background: #0f766e;
            box-shadow: 0 8px 20px rgba(13, 148, 136, .45);
        }

        /* ================= VERIFIKASI ================= */

        .verification-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }

        .verification-box {
            padding: 18px;
            border-radius: 14px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            transition: 0.3s;
            cursor: pointer;
        }

        .verification-box:hover {
            background: white;
            border-color: #0d9488;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(13,148,136,0.1);
        }

        .verification-box h3 {
            font-size: 14px;
            margin-bottom: 8px;
            color: #0f172a;
        }

        .verification-box p {
            color: #64748b;
            font-size: 12px;
            line-height: 1.5;
        }

        /* Hover Tabel Riwayat */
        tbody tr {
            transition: 0.2s ease;
        }
        tbody tr:hover {
            background-color: #f8fafc;
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
            font-size: 14px; font-weight: 800; color: #0f172a; max-width: 240px;
            text-align: center; opacity: 0; transform: translateY(20px) scale(0.9);
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            border: 2px solid #ccfbf1;
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

        @media (max-width: 1024px) {
            .sidebar { width: 250px; }
            .summary-grid { grid-template-columns: 1fr; }
            .middle-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .dashboard { display: block; }
            .sidebar { width: 100%; min-height: auto; }
            .menu, .sidebar-bottom { display: none; }
            .header { height: auto; padding: 20px; }
            .content { padding: 20px; }
            .header-profile-text { display: none; }
            .payment-status, .verification-grid { grid-template-columns: 1fr; }
            .welcome-banner { flex-direction: column; text-align: center; }
            .mascot-container { display: none; }
        }
    </style>
</head>

<body>

    <div class="dashboard">

        {{-- ================= SIDEBAR ================= --}}

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

                {{-- Dashboard --}}
                <a href="{{ route('dashboard') }}" class="active">
                    <span class="menu-icon">▣</span>
                    Dashboard
                </a>


                {{-- Data Siswa --}}
                <a href="{{ route('data-siswa.index') }}">
                    <span class="menu-icon">◉</span>
                    Data Siswa
                </a>


                <div class="menu-title">
                    TRANSAKSI
                </div>


                {{-- Pembayaran Kas --}}
                <a href="{{ route('pembayaran-kas.index') }}">
                    <span class="menu-icon">✓</span>
                    Pembayaran Kas
                </a>
                {{-- Detail Pembayaran --}}
                <a href="{{ route('detail-pembayaran.index') }}">
                    <span class="menu-icon">▤</span>
                    Detail Pembayaran
                </a>

                {{-- Verifikasi Pembayaran --}}
                <a href="{{ route('verifikasi-pembayaran.index') }}">
                    <span class="menu-icon">●</span>
                    Verifikasi Pembayaran
                </a>


                {{-- Pengeluaran --}}
                <a href="{{ route('pengeluaran.web.index') }}">
                    <span class="menu-icon">↑</span>
                    Pengeluaran
                </a>


                <div class="menu-title">
                    CATATAN
                </div>


                {{-- Riwayat --}}
                <a href="{{ route('riwayat.index') }}">
                    <span class="menu-icon">↻</span>
                    Riwayat Transaksi
                </a>


                {{-- Pengumuman
                 route dibuat aman supaya dashboard tidak error
                 apabila halaman web pengumuman belum tersedia.
            --}}
                @if (Route::has('pengumuman.index'))
                    <a href="{{ route('pengumuman.index') }}">
                        <span class="menu-icon">▣</span>
                        Pengumuman
                    </a>
                @endif


                {{-- Laporan --}}
                <a href="{{ route('laporan.index') }}">
                    <span class="menu-icon">▤</span>
                    Laporan Keuangan
                </a>

            </nav>


            {{-- PROFILE --}}

            <div class="sidebar-bottom">

                <div class="profile-mini">

                    <div class="profile-avatar">
                        BE
                    </div>

                    <span>
                        {{ Auth::user()->name ?? 'Bendahara' }}
                    </span>

                </div>


                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button type="submit" class="logout-btn">

                        ↪ &nbsp; Keluar

                    </button>

                </form>

            </div>

        </aside>



        {{-- ================= MAIN ================= --}}

        <main class="main">


            {{-- HEADER --}}

            <header class="header">

                <div class="header-left">

                    <h1>
                        Dashboard Bendahara
                    </h1>

                    <p>
                        {{ now()->translatedFormat('l, d F Y') }}
                    </p>

                </div>


                <div class="header-profile">

                    <div class="header-profile-text">

                        <strong>
                            {{ Auth::user()->name ?? 'Bendahara' }}
                        </strong>

                        <span>
                            Bendahara KASERALS
                        </span>

                    </div>


                    <div class="header-avatar">
                        BE
                    </div>

                </div>

            </header>



            {{-- CONTENT --}}

            <section class="content">


                {{-- ================= WELCOME ================= --}}

                <div class="welcome-banner">

                    <div class="welcome-text">

                        <h2>
                            Selamat Datang, Bendahara! 👋
                        </h2>

                        <p>
                            Kelola pembayaran kas kelas dengan lebih
                            transparan, cepat, dan mudah bersama KASERALS.
                        </p>

                    </div>


                    {{-- Maskot --}}
                    <img src="{{ asset('images/kasi.svg') }}" alt="Maskot KASERALS" class="welcome-mascot">

                </div>



                {{-- ================= SUMMARY ================= --}}

                <div class="summary-grid">


                    {{-- Total Pembayaran --}}

                    <div class="summary-card">

                        <div class="summary-title">
                            TOTAL PEMBAYARAN KAS
                        </div>

                        <div class="summary-value green">

                            Rp
                            {{ number_format($totalPembayaran ?? 0, 0, ',', '.') }}

                        </div>

                        <div class="summary-date">
                            Pembayaran yang sudah diterima
                        </div>

                    </div>


                    {{-- Total Pengeluaran --}}

                    <div class="summary-card">

                        <div class="summary-title">
                            TOTAL PENGELUARAN
                        </div>

                        <div class="summary-value">

                            Rp
                            {{ number_format($totalPengeluaran ?? 0, 0, ',', '.') }}

                        </div>

                        <div class="summary-date">
                            Pengeluaran kas kelas
                        </div>

                    </div>


                    {{-- Saldo --}}

                    <div class="summary-card dark">

                        <div class="summary-title">
                            SALDO KAS
                        </div>

                        <div class="summary-value">

                            Rp
                            {{ number_format($saldo ?? 0, 0, ',', '.') }}

                        </div>

                        <div class="summary-date">
                            Saldo kas saat ini
                        </div>

                    </div>

                </div>



              F






                {{-- ================= VERIFIKASI ================= --}}

                <div class="card" style="margin-bottom:28px;">

                    <div class="card-header">

                        <h2>
                            Verifikasi Pembayaran
                        </h2>

                        <a href="{{ route('verifikasi-pembayaran.index') }}" class="card-link">

                            Kelola →

                        </a>

                    </div>


                    <div class="verification-grid">

                        <div class="verification-box">

                            <h3>
                                Pembayaran Transfer
                            </h3>

                            <p>
                                Periksa bukti transfer yang dikirim
                                siswa sebelum menerima pembayaran.
                            </p>

                        </div>


                        <div class="verification-box">

                            <h3>
                                Status Pembayaran
                            </h3>

                            <p>
                                Pembayaran memiliki status Menunggu,
                                Diterima, atau Ditolak.
                            </p>

                        </div>


                        <div class="verification-box">

                            <h3>
                                Kelola Pembayaran
                            </h3>

                            <p>
                                Buka halaman verifikasi untuk memeriksa
                                dan memperbarui status pembayaran.
                            </p>

                        </div>

                    </div>

                </div>



                {{-- ================= TRANSAKSI TERAKHIR ================= --}}

                <div class="card">

                    <div class="card-header">

                        <h2>
                            Transaksi Terakhir
                        </h2>

                        <a href="{{ route('riwayat.index') }}" class="card-link">

                            Riwayat Lengkap →

                        </a>

                    </div>


                    <div style="overflow-x:auto;">

                        <table style="width:100%; border-collapse:collapse;">

                            <thead>

                                <tr>

                                    <th style="padding:12px;text-align:left;">
                                        Tanggal
                                    </th>

                                    <th style="padding:12px;text-align:left;">
                                        Jenis
                                    </th>

                                    <th style="padding:12px;text-align:left;">
                                        Keterangan
                                    </th>

                                    <th style="padding:12px;text-align:right;">
                                        Nominal
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($transaksi ?? [] as $item)
                                    <tr style="border-top:1px solid #e2e8f0;">

                                        <td style="padding:14px 12px;">

                                            {{ $item['tanggal']->format('d M Y') }}

                                        </td>


                                        <td style="padding:14px 12px;">

                                            @if ($item['arah'] === 'in')
                                                <span
                                                    style="
                                                background:#dcfce7;
                                                color:#15803d;
                                                padding:5px 10px;
                                                border-radius:20px;
                                                font-size:11px;
                                                font-weight:700;
                                            ">
                                                    Pembayaran
                                                </span>
                                            @else
                                                <span
                                                    style="
                                                background:#fee2e2;
                                                color:#b91c1c;
                                                padding:5px 10px;
                                                border-radius:20px;
                                                font-size:11px;
                                                font-weight:700;
                                            ">
                                                    Pengeluaran
                                                </span>
                                            @endif

                                        </td>


                                        <td style="padding:14px 12px;">

                                            {{ $item['keterangan'] ?? '-' }}

                                        </td>


                                        <td
                                            style="
                                        padding:14px 12px;
                                        text-align:right;
                                        font-weight:700;
                                    ">

                                            @if ($item['arah'] === 'in')
                                                <span style="color:#15803d;">
                                                    +Rp
                                                    {{ number_format($item['nominal'] ?? 0, 0, ',', '.') }}
                                                </span>
                                            @else
                                                <span style="color:#b91c1c;">
                                                    -Rp
                                                    {{ number_format($item['nominal'] ?? 0, 0, ',', '.') }}
                                                </span>
                                            @endif

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="4"
                                            style="
                                            padding:30px;
                                            text-align:center;
                                            color:#94a3b8;
                                        ">

                                            Belum ada transaksi.

                                        </td>

                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>


            </section>

        </main>

    </div>

    <!-- ================= EFEK MASCOT KASI MELAYANG (POJOK KANAN BAWAH) ================= -->
    <div class="mascot-container">
        <div class="mascot-bubble">
           Semangat bertugas Kak Bendahara! 💪<br>
            <span>Jangan lupa senyum hari ini! ✨</span>
        </div>
        <div class="mascot-body">
            <div class="mascot-face">^ᴗ^</div>
        </div>
    </div>

</body>

</html>
