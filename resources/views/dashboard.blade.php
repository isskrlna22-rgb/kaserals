<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - KASERALS</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Nunito', Arial, Helvetica, sans-serif;
            background: #f8fafc;
            color: #0f172a;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        button {
            font-family: inherit;
        }

        .page {
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            width: 270px;
            flex-shrink: 0;
            min-height: 100vh;
            background: #0f172a;
            color: white;
            display: flex;
            flex-direction: column;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 100;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 28px 24px;
        }

        .logo-box {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 18px;
            background: #0d9488;
            font-size: 24px;
            font-weight: bold;
            box-shadow: 0 4px 15px rgba(13, 148, 136, 0.4);
            animation: pulse-gemes 2s infinite;
        }

        .logo h1 {
            font-size: 22px;
            letter-spacing: 1px;
        }

        .logo p {
            margin-top: 4px;
            font-size: 13px;
            color: #94a3b8;
        }

        .navigation {
            flex: 1;
            padding: 0 16px 20px;
            overflow-y: auto;
            scrollbar-width: none;
        }

        .navigation::-webkit-scrollbar {
            display: none;
        }

        .nav-link {
            position: relative;
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 6px;
            padding: 13px 20px;
            border-radius: 18px;
            color: #cbd5e1;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
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
            transform: translateX(5px);
            background: rgba(255, 255, 255, .05);
            color: white;
        }

        .nav-link.active {
            background: #0d9488;
            color: white;
            font-weight: bold;
            box-shadow: 0 4px 12px rgba(13, 148, 136, 0.3);
        }

        .nav-link span {
            width: 24px;
            text-align: center;
            font-size: 18px;
            transition: transform 0.3s ease;
        }

        .nav-link:hover span {
            transform: scale(1.2) rotate(-5deg);
        }

        .section-title {
            margin: 20px 0 8px;
            padding: 0 20px;
            color: #64748b;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .15em;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, .08);
            background: rgba(0, 0, 0, 0.1);
        }

        .profile-mini {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .profile-avatar {
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #1e293b;
            border: 2px solid #5eead4;
            color: #5eead4;
            font-size: 14px;
            font-weight: 800;
        }

        .profile-info strong {
            display: block;
            color: #f8fafc;
            font-size: 14px;
        }

        .profile-info span {
            color: #5eead4;
            font-size: 12px;
            font-weight: 700;
        }

        .logout-btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 14px;
            background: rgba(239, 68, 68, .1);
            color: #ef4444;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .logout-btn:hover {
            background: #ef4444;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(239, 68, 68, 0.3);
        }

        /* ================= MAIN CONTENT ================= */
        .main {
            width: calc(100% - 270px);
            margin-left: 270px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            height: 90px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            background: white;
            border-bottom: 1px solid #e2e8f0;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .topbar h2 {
            font-size: 22px;
            font-weight: 800;
            color: #1e293b;
        }

        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #ccfbf1;
            color: #0d9488;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .avatar:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 5px 15px rgba(13, 148, 136, 0.2);
        }

        .content {
            flex: 1;
            padding: 40px;
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
        }

        /* ================= DASHBOARD BANNER (WELCOME SVG KASI) ================= */
        .welcome-card {
            background: linear-gradient(135deg, #0d9488, #0f766e);
            border-radius: 24px;
            padding: 35px 40px;
            color: white;
            box-shadow: 0 15px 35px rgba(13, 148, 136, 0.25);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .welcome-left {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        /* GAMBAR KASI SVG DI DALAM BANNER SAJA */
        .banner-kasi {
            width: 120px;
            height: auto;
            flex-shrink: 0;
            animation: floatKasi 4s ease-in-out infinite;
            filter: drop-shadow(0 15px 10px rgba(0, 0, 0, 0.2));
        }

        @keyframes floatKasi {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-15px);
            }
        }

        .welcome-text h1 {
            font-size: 32px;
            font-weight: 900;
            margin-bottom: 6px;
        }

        .welcome-text p {
            color: #ccfbf1;
            font-size: 16px;
            font-weight: 500;
        }

        .welcome-date {
            background: rgba(255, 255, 255, 0.15);
            padding: 10px 20px;
            border-radius: 16px;
            font-weight: 700;
            backdrop-filter: blur(5px);
        }

        /* ================= STATS WIDGETS ================= */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 24px;
            padding: 25px;
            box-shadow: 0 10px 40px -10px rgba(15, 23, 42, .06);
            transition: 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px -10px rgba(13, 148, 136, .15);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 16px;
        }

        .icon-teal {
            background: #ccfbf1;
            color: #0d9488;
        }

        .icon-blue {
            background: #dbeafe;
            color: #2563eb;
        }

        .icon-orange {
            background: #ffedd5;
            color: #ea580c;
        }

        .icon-rose {
            background: #ffe4e6;
            color: #e11d48;
        }

        .stat-title {
            color: #64748b;
            font-weight: 800;
            font-size: 12px;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 26px;
            font-weight: 900;
            color: #0f172a;
        }

        /* ================= BOTTOM WIDGETS ================= */
        .bottom-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 24px;
        }

        .panel {
            background: white;
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 10px 40px -10px rgba(15, 23, 42, .06);
        }

        .panel-title {
            font-size: 20px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-wrapper {
            overflow-x: auto;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
        }

        .transaction-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 500px;
        }

        .transaction-table th {
            background: #f8fafc;
            color: #64748b;
            font-size: 12px;
            font-weight: 800;
            padding: 14px 18px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        .transaction-table td {
            padding: 14px 18px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 14px;
            font-weight: 700;
            color: #334155;
        }

        .transaction-table tbody tr:hover {
            background: #f0fdfa;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 10px;
            font-size: 11px;
            font-weight: 800;
        }

        .badge-pending {
            background: #fef3c7;
            color: #d97706;
        }

        .badge-success {
            background: #ccfbf1;
            color: #0d9488;
        }

        .shortcut-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .shortcut-btn {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 16px;
            border-radius: 16px;
            background: #f8fafc;
            border: 2px solid transparent;
            color: #0f172a;
            font-weight: 800;
            font-size: 14px;
            transition: 0.3s;
            cursor: pointer;
        }

        .shortcut-btn:hover {
            background: white;
            border-color: #5eead4;
            box-shadow: 0 10px 25px rgba(13, 148, 136, 0.1);
            transform: translateX(5px);
            color: #0d9488;
        }

        .shortcut-icon {
            font-size: 20px;
        }

        /* ================= MASCOT POJOK BAWAH (ORIGINAL ^ᴗ^) ================= */
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

        @keyframes floatMascot {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-15px);
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

        .mascot-bubble {
            background: white;
            padding: 14px 20px;
            border-radius: 20px 20px 0 20px;
            box-shadow: 0 10px 25px rgba(13, 148, 136, 0.2);
            margin-bottom: 16px;
            font-size: 14px;
            font-weight: 800;
            color: #0f172a;
            max-width: 230px;
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

        /* ================= RESPONSIVE ================= */
        @media (max-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .bottom-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 900px) {
            .sidebar {
                display: none;
            }

            .main {
                width: 100%;
                margin-left: 0;
            }

            .welcome-card {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }

            .welcome-left {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
            }

            .content {
                padding: 20px;
            }

            .mascot-container {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="page">

        <!-- ================= SIDEBAR ADMIN ================= -->
        <aside class="sidebar">

            <div class="logo">
                <div class="logo-box">K</div>
                <div>
                    <h1>KASERALS</h1>
                    <p>Kas Kelas Digital</p>
                </div>
            </div>

            <nav class="navigation">
                <!-- Beranda (Tidak Dihitung 11 Menu) -->
                <a href="#" class="nav-link active">
                    <span>◫</span> Dashboard
                </a>

                <p class="section-title">MASTER DATA</p>
                <!-- Menu 1 -->
                <a href="{{ route('akun.index') }}" class="nav-link">
                    <span>⚙</span> Kelola Akun & Sistem
                </a>
                <!-- Menu 2 -->
                <a href="{{ route('data-siswa.index') }}" class="nav-link">
                    <span>◉</span>
                    Kelola Data Siswa
                </a>
                <p class="section-title">TRANSAKSI ADMIN</p>
                <!-- Menu 3 -->
                <a href="{{ route('pembayaran-kas.index') }}" class="nav-link">
                    <span>✓</span> Catat Pembayaran Kas
                </a>
                <!-- Menu 4 -->
                <a href="{{ route('verifikasi-pembayaran.index') }}" class="nav-link">
                    <span>●</span> Verifikasi Pembayaran
                </a>
                <!-- Menu 5 -->
                <a href="{{ route('pengeluaran.web.index') }}" class="nav-link">
                    <span>↑</span> Catat Pengeluaran
                </a>

                <p class="section-title">AKSES SISWA</p>

                <!-- Menu 8 -->
                <a href="{{ route('dashboard.siswa.status') }}" class="nav-link">
                    <span>👤</span> Status Bayar Pribadi
                </a>

                <p class="section-title">CATATAN & LAPORAN</p>
                <!-- Menu 9 -->
                <a href="{{ route('riwayat.index') }}" class="nav-link">
                    <span>↻</span> Riwayat Transaksi
                </a>
                <!-- Menu 10 -->
                <a href="{{ route('pengumuman.index') }}" class="nav-link">
                    <span>▣</span> Kelola Pengumuman
                </a>
                <!-- Menu 11 -->
                <a href="{{ route('laporan.index') }}" class="nav-link">
                    <span>▤</span> Laporan Keuangan
                </a>
            </nav>

            <div class="sidebar-bottom">
                <div class="profile-mini">
                    <div class="profile-avatar">AD</div>
                    <div class="profile-info">
                        <strong>{{ Auth::user()->name ?? 'Administrator' }}</strong>
                        <span>Super Admin</span>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        ↪ &nbsp; Keluar
                    </button>
                </form>

            </div>
        </aside>

        <!-- ================= MAIN CONTENT ================= -->
        <main class="main">

            <header class="topbar">
                <h2>Dashboard Admin</h2>
                <div class="avatar">AD</div>
            </header>

            <section class="content">

                <!-- ================= BANNER WELCOME (PAKAI KASI SVG) ================= -->
                <div class="welcome-card">

                    <div class="welcome-left">
                        <!-- GAMBAR KASI SVG MELAYANG -->
                        <img src="{{ asset('images/kasi.svg') }}" alt="KASI Kucing Tosca" class="banner-kasi">

                        <div class="welcome-text">
                            <h1>Halo, Administrator!</h1>
                            <p>Selamat datang kembali di panel KASERALS. Semua kendali sistem ada di tanganmu.</p>
                        </div>
                    </div>

                    <div class="welcome-date">
                        {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
                    </div>

                </div>

                <!-- Stats Grid -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon icon-teal">💰</div>
                        <div class="stat-title">Saldo Kas Saat Ini</div>
                        <div class="stat-value">
                            Rp {{ number_format($saldo, 0, ',', '.') }}
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon icon-blue">👥</div>
                        <div class="stat-title">Total Data Siswa</div>
                        <div class="stat-value">
                            {{ $totalSiswa }} Siswa
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon icon-orange">⏳</div>
                        <div class="stat-title">Menunggu Verifikasi</div>
                        <div class="stat-value">
                            {{ $jumlahMenunggu }} Transaksi
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon icon-rose">📢</div>
                        <div class="stat-title">Pengumuman Aktif</div>
                        <div class="stat-value">
                            {{ $jumlahPengumuman }} Pengumuman
                        </div>
                    </div>
                </div>

                <!-- Bottom Grid (Table & Shortcuts) -->
                <div class="bottom-grid">

                    <!-- Table Transaksi -->
                    <div class="panel">
                        <div class="panel-title">
                            Aktivitas Transaksi Terbaru
                            <a href="#" style="font-size: 14px; color: #0d9488;">Lihat Semua &rarr;</a>
                        </div>

                        <div class="table-wrapper">
                            <table class="transaction-table">
                                <thead>
                                    <tr>
                                        <th>NAMA SISWA</th>
                                        <th>NOMINAL</th>
                                        <th>METODE</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($transaksiTerbaru as $item)

                                        <tr>

                                            <td>
                                                {{ $item['nama'] }}
                                            </td>

                                            <td>
                                                Rp {{ number_format($item['nominal'], 0, ',', '.') }}
                                            </td>

                                            <td>
                                                {{ $item['metode'] }}
                                            </td>

                                            <td>

                                                @if ($item['tipe'] === 'Pembayaran Kas')
                                                    @if ($item['status'] === 'Menunggu')
                                                        <span class="badge badge-pending">
                                                            Menunggu Verifikasi
                                                        </span>
                                                    @elseif ($item['status'] === 'Diterima')
                                                        <span class="badge badge-success">
                                                            Diterima
                                                        </span>
                                                    @else
                                                        <span class="badge">
                                                            {{ $item['status'] }}
                                                        </span>
                                                    @endif
                                                @else
                                                    <span class="badge" style="background:#f1f5f9; color:#475569;">
                                                        Pengeluaran
                                                    </span>
                                                @endif

                                            </td>

                                        </tr>

                                    @empty

                                        <tr>
                                            <td colspan="4" style="text-align:center; padding:30px;">
                                                Belum ada transaksi.
                                            </td>
                                        </tr>

                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Akses Cepat (Shortcuts) -->
                    <div class="panel">
                        <div class="panel-title">Akses Cepat</div>
                        <div class="shortcut-grid">
                            <a href="#" class="shortcut-btn">
                                <span class="shortcut-icon">⚙️</span>

                                <div class="shortcut-content">
                                    <strong>Konfigurasi Sistem</strong>
                                    <small>Atur konfigurasi sistem</small>
                                </div>

                                <span class="shortcut-arrow">→</span>
                            </a>
                            <a href="{{ route('verifikasi-pembayaran.index') }}" class="shortcut-btn">
                                <span class="shortcut-icon">✅</span>

                                <div class="shortcut-content">
                                    <strong>Verifikasi Pembayaran</strong>
                                    <small>Periksa pembayaran yang masuk</small>
                                </div>

                                <span class="shortcut-arrow">→</span>
                            </a>
                            <a href="{{ route('data-siswa.index') }}" class="shortcut-btn">
                                <span class="shortcut-icon">👤</span>

                                <div class="shortcut-content">
                                    <strong>Tambah Data Siswa</strong>
                                    <small>Kelola data siswa kelas</small>
                                </div>

                                <span class="shortcut-arrow">→</span>
                            </a>

                        </div>
                    </div>

                </div>

            </section>
        </main>

    </div>

    <!-- ================= MASCOT BAWAH KANAN (KEMBALI ORIGINAL ^ᴗ^) ================= -->
    <div class="mascot-container">
        <div class="mascot-bubble">
            Halo Kak Admin! 👋<br>
            <span>Semua transaksi hari ini udah siap dipantau nih! ✨</span>
        </div>
        <div class="mascot-body">
            <div class="mascot-face">^ᴗ^</div>
        </div>
    </div>

</body>

</html>
