<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pembayaran Siswa - KASERALS</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <style>
        /* ================= RESET & BASE ================= */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Nunito', Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #1e293b;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        a {
            text-decoration: none;
        }

        button, input {
            font-family: inherit;
            outline: none;
        }

        .page {
            display: flex;
            min-height: 100vh;
        }

        /* Custom Scrollbar Universal */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

        /* ================= SIDEBAR ================= */
        .sidebar {
            width: 280px;
            flex-shrink: 0;
            min-height: 100vh;
            background: #0b1121;
            color: white;
            display: flex;
            flex-direction: column;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 100;
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.04);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 32px 28px;
        }

        .logo-box {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            background: linear-gradient(135deg, #14b8a6, #0d9488);
            font-size: 24px;
            font-weight: 900;
            color: white;
            box-shadow: 0 8px 20px -4px rgba(20, 184, 166, 0.5);
            animation: pulse-gemes 3s infinite cubic-bezier(0.4, 0, 0.2, 1);
        }

        .logo h1 {
            font-size: 24px;
            font-weight: 900;
            letter-spacing: 0.5px;
            color: #ffffff;
        }

        .logo p {
            margin-top: 2px;
            font-size: 12px;
            font-weight: 600;
            color: #14b8a6;
            letter-spacing: 0.5px;
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
            margin-bottom: 4px;
            padding: 12px 20px;
            border-radius: 16px;
            color: #94a3b8;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-link::before {
            content: '';
            position: absolute;
            left: -16px;
            top: 50%;
            width: 4px;
            height: 0;
            border-radius: 0 8px 8px 0;
            background: #14b8a6;
            transform: translateY(-50%);
            transition: all 0.3s ease;
            opacity: 0;
        }

        .nav-link.active::before {
            height: 60%;
            left: 0;
            opacity: 1;
            box-shadow: 0 0 10px rgba(20, 184, 166, 0.5);
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.03);
            color: #f8fafc;
            transform: translateX(4px);
        }

        .nav-link.active {
            background: rgba(20, 184, 166, 0.1);
            color: #14b8a6;
            font-weight: 800;
        }

        .nav-link span {
            width: 24px;
            text-align: center;
            font-size: 18px;
            transition: transform 0.3s ease;
        }

        .nav-link.active span {
            color: #14b8a6;
        }

        .nav-link:hover span {
            transform: scale(1.15) rotate(-5deg);
        }

        .section-title {
            margin: 24px 0 10px;
            padding: 0 20px;
            color: #475569;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 24px;
            background: #080c17;
            border-top: 1px solid rgba(255, 255, 255, 0.03);
        }

        .profile-mini {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 20px;
            padding: 12px;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.03);
            transition: 0.3s;
        }

        .profile-mini:hover {
            background: rgba(255, 255, 255, 0.06);
        }

        .avatar {
            text-decoration: none;
            overflow: hidden;
            width: 44px;
            height: 44px;
            border: 2px solid #14b8a6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #1e293b;
            color: #5eead4;
            font-size: 16px;
            font-weight: 800;
            flex-shrink: 0;
            transition: 0.3s;
        }

        .avatar:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(20, 184, 166, 0.3);
        }

        .avatar-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .profile-info strong {
            display: block;
            color: #f8fafc;
            font-size: 14px;
            font-weight: 700;
        }

        .profile-info span {
            color: #14b8a6;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .logout-btn {
            width: 100%;
            padding: 14px;
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 14px;
            background: rgba(239, 68, 68, 0.05);
            color: #ef4444;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .logout-btn:hover {
            background: #ef4444;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px -6px rgba(239, 68, 68, 0.5);
            border-color: #ef4444;
        }

        /* ================= MAIN CONTENT ================= */
        .main {
            width: calc(100% - 280px);
            margin-left: 280px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .topbar h2 {
            font-size: 20px;
            font-weight: 800;
            color: #0f172a;
        }

        .content {
            flex: 1;
            padding: 40px;
            max-width: 1200px; /* Lebar dibatasi agar tabel proporsional */
            width: 100%;
        }

        /* ================= TABLE PANEL (Dari Dashboard) ================= */
        .panel {
            background: white;
            border-radius: 28px;
            padding: 32px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02), 0 2px 4px -1px rgba(0, 0, 0, 0.02);
            border: 1px solid #f1f5f9;
        }

        .panel-header {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-bottom: 24px;
        }

        @media (min-width: 640px) {
            .panel-header {
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }
        }

        .panel-title {
            font-size: 18px;
            font-weight: 800;
            color: #0f172a;
        }

        .panel-title span {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #64748b;
            margin-top: 4px;
        }

        /* Kotak Pencarian */
        .search-container {
            position: relative;
            width: 100%;
            max-width: 320px;
        }

        .search-input {
            width: 100%;
            padding: 12px 16px 12px 44px;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            background: #f8fafc;
            font-size: 13px;
            font-weight: 600;
            color: #1e293b;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: #14b8a6;
            box-shadow: 0 0 0 4px rgba(20, 184, 166, 0.1);
            background: white;
        }

        .search-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 14px;
            color: #94a3b8;
            pointer-events: none;
        }

        .table-wrapper {
            overflow-x: auto;
            border-radius: 16px;
            border: 1px solid #f1f5f9;
        }

        .transaction-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        .transaction-table th {
            background: #f8fafc;
            color: #64748b;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 16px 20px;
            text-align: left;
            border-bottom: 2px solid #f1f5f9;
        }

        .transaction-table td {
            padding: 16px 20px;
            border-bottom: 1px solid #f8fafc;
            font-size: 14px;
            font-weight: 700;
            color: #334155;
            transition: 0.2s;
        }

        .transaction-table tbody tr:hover td {
            background: #fcfcfd;
            color: #0f172a;
        }

        /* Badge Status */
        .badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 6px 14px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .badge-success {
            background: #ccfbf1;
            color: #0f766e;
            border: 1px solid #99f6e4;
        }

        .badge-danger {
            background: #ffe4e6;
            color: #be123c;
            border: 1px solid #fecdd3;
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

        @keyframes floatMascot {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        @keyframes blink {
            0%, 96%, 98% { opacity: 1; transform: scaleY(1); }
            97% { opacity: 0.5; transform: scaleY(0.1); }
        }

        @keyframes pulse-gemes {
            0% { box-shadow: 0 0 0 0 rgba(20, 184, 166, 0.4); }
            70% { box-shadow: 0 0 0 15px rgba(20, 184, 166, 0); }
            100% { box-shadow: 0 0 0 0 rgba(20, 184, 166, 0); }
        }

        .mascot-bubble {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
            padding: 16px 20px;
            border-radius: 20px 20px 4px 20px;
            box-shadow: 0 15px 35px -5px rgba(13, 148, 136, 0.15);
            margin-bottom: 12px;
            font-size: 13px;
            font-weight: 700;
            color: #334155;
            max-width: 240px;
            text-align: center;
            opacity: 0;
            transform: translateY(15px) scale(0.9);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            border: 1px solid #ccfbf1;
            line-height: 1.5;
        }

        .mascot-bubble span {
            color: #0d9488;
            font-weight: 800;
        }

        .mascot-body {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #2dd4bf, #0d9488);
            border-radius: 40%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 15px 25px -5px rgba(13, 148, 136, 0.4);
            cursor: pointer;
            border: 3px solid #ffffff;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .mascot-face {
            font-size: 24px;
            color: white;
            font-weight: bold;
            animation: blink 4s infinite;
        }

        .mascot-container:hover .mascot-bubble {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .mascot-container:hover .mascot-body {
            transform: scale(1.1) rotate(8deg);
            border-radius: 50%;
        }

        /* ================= RESPONSIVE ================= */
        @media (max-width: 900px) {
            .sidebar { display: none; }
            .main { width: 100%; margin-left: 0; }
            .content { padding: 24px 20px 100px; }
            .mascot-container { display: none; }
            .mobile-nav { display: none; }
        }

        @media (max-width: 900px) {
            /* Navigasi khusus mobile ala native App */
            .mobile-nav {
                display: flex;
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                z-index: 200;
                justify-content: space-around;
                align-items: center;
                background: rgba(255, 255, 255, 0.9);
                backdrop-filter: blur(15px);
                -webkit-backdrop-filter: blur(15px);
                border-top: 1px solid rgba(226, 232, 240, 0.8);
                box-shadow: 0 -10px 25px rgba(0, 0, 0, 0.05);
                padding: 12px 8px calc(12px + env(safe-area-inset-bottom));
            }

            .mobile-nav a {
                display: flex;
                flex: 1;
                flex-direction: column;
                align-items: center;
                gap: 6px;
                color: #94a3b8;
                font-size: 10px;
                font-weight: 800;
                text-align: center;
                padding: 8px 4px;
                border-radius: 16px;
                transition: 0.3s;
            }

            .mobile-nav a span { font-size: 20px; transition: 0.3s; }
            .mobile-nav a.active { color: #0d9488; }
            .mobile-nav a.active span { transform: translateY(-4px); }

            .topbar { height: 70px; padding: 0 20px; }
            .panel { padding: 24px 20px; border-radius: 20px; }
            .panel-title { font-size: 16px; }
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
                <!-- Beranda -->
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <span>◫</span> Dashboard
                </a>

                <p class="section-title">MASTER DATA</p>
                <a href="{{ route('akun.index') }}" class="nav-link">
                    <span>⚙</span> Kelola Akun & Sistem
                </a>
                <a href="{{ route('data-siswa.index') }}" class="nav-link">
                    <span>◉</span> Kelola Data Siswa
                </a>

                <p class="section-title">TRANSAKSI ADMIN</p>
                <a href="{{ route('pembayaran-kas.index') }}" class="nav-link">
                    <span>✓</span> Catat Pembayaran Kas
                </a>
                <a href="{{ route('verifikasi-pembayaran.index') }}" class="nav-link">
                    <span>●</span> Verifikasi Pembayaran
                </a>
                <a href="{{ route('pengeluaran.web.index') }}" class="nav-link">
                    <span>↑</span> Catat Pengeluaran
                </a>

                <p class="section-title">AKSES SISWA</p>
                <!-- STATUS BAYAR PRIBADI (KINI MENJADI ACTIVE) -->
                <a href="{{ route('admin.status-pembayaran') }}" class="nav-link active">
                    <span>👤</span> Status Bayar Pribadi
                </a>

                <p class="section-title">CATATAN & LAPORAN</p>
                <a href="{{ route('riwayat.index') }}" class="nav-link">
                    <span>↻</span> Riwayat Transaksi
                </a>
                <a href="{{ route('pengumuman.index') }}" class="nav-link">
                    <span>▣</span> Kelola Pengumuman
                </a>
                <a href="{{ route('laporan.index') }}" class="nav-link">
                    <span>▤</span> Laporan Keuangan
                </a>
            </nav>

            <div class="sidebar-bottom">
                <div class="profile-mini">
                    <a href="{{ route('profile.edit') }}" class="avatar" title="Pengaturan Profil" aria-label="Pengaturan Profil">
                        @if (Auth::user()->foto_profil)
                            <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" alt="Foto profil Admin" class="avatar-image">
                        @else
                            {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                        @endif
                    </a>
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
                <h2>Status Pembayaran Siswa</h2>

                <!-- Avatar Kanan Atas -->
                <a href="{{ route('profile.edit') }}" class="avatar" title="Profil Anda" style="width: 44px; height: 44px; text-decoration: none; border: none; background: #ccfbf1; color: #0d9488; font-weight: bold; border-radius: 50%; display: flex; justify-content: center; align-items: center; transition: 0.3s;">
                    @if (Auth::user()->foto_profil)
                        <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" alt="Profil" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                    @else
                        {{ strtoupper(substr(Auth::user()->name ?? 'AD', 0, 2)) }}
                    @endif
                </a>
            </header>

            <section class="content">

                <!-- Table Panel -->
                <div class="panel">

                    <!-- Header & Pencarian -->
                    <div class="panel-header">
                        <div class="panel-title">
                            Data Status Pembayaran
                            <span>Rekapitulasi total pembayaran dan status kas.</span>
                        </div>

                        <!-- Kotak Cari (Search) -->
                        <div class="search-container">
                            <span class="search-icon">🔍</span>
                            <input type="search" id="search" class="search-input" placeholder="Cari nama, NISN, kelas..." autocomplete="off">
                        </div>
                    </div>

                    <!-- Tabel Data -->
                    <div class="table-wrapper">
                        <table class="transaction-table">
                            <thead>
                                <tr>
                                    <th style="width: 50px; text-align: center;">NO</th>
                                    <th>NAMA SISWA</th>
                                    <th>NISN</th>
                                    <th>KELAS</th>
                                    <th style="text-align: center;">TRANSAKSI</th>
                                    <th>TOTAL DIBAYAR</th>
                                    <th style="text-align: center;">STATUS</th>
                                </tr>
                            </thead>
                            <tbody id="studentRows">

                                @forelse ($dataStatus as $item)
                                    <tr>
                                        <td style="text-align: center; color: #94a3b8;">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $item['nama_lengkap'] }}
                                        </td>
                                        <td style="font-family: monospace; color: #64748b;">
                                            {{ $item['nisn'] }}
                                        </td>
                                        <td>
                                            {{ $item['kelas'] }}
                                        </td>
                                        <td style="text-align: center;">
                                            <span style="background: #f1f5f9; padding: 4px 10px; border-radius: 8px; font-size: 12px;">
                                                {{ $item['jumlah_transaksi'] }}x
                                            </span>
                                        </td>
                                        <td>
                                            Rp {{ number_format($item['total_dibayar'], 0, ',', '.') }}
                                        </td>
                                        <td style="text-align: center;">
                                            @if ($item['status_pembayaran'] === 'SUDAH BAYAR')
                                                <span class="badge badge-success">
                                                    ✓ SUDAH BAYAR
                                                </span>
                                            @else
                                                <span class="badge badge-danger">
                                                    ! BELUM BAYAR
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" style="text-align: center; padding: 40px; color: #94a3b8;">
                                            <div style="font-size: 32px; margin-bottom: 10px;">📁</div>
                                            Belum ada data siswa atau riwayat pembayaran.
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

    <!-- ================= MASCOT BAWAH KANAN ================= -->
    <div class="mascot-container">
        <div class="mascot-bubble">
            Ayo Kak Admin! 🔍<br>
            <span>Cek siapa aja yang udah atau belum lunas minggu ini!</span>
        </div>
        <div class="mascot-body">
            <div class="mascot-face">^ᴗ^</div>
        </div>
    </div>

    <!-- ================= MOBILE NAV ================= -->
    <nav class="mobile-nav">
        <a href="{{ route('dashboard') }}">
            <span>◫</span>
            Dashboard
        </a>
        <a href="{{ route('data-siswa.index') }}">
            <span>👥</span>
            Data Siswa
        </a>

        <!-- Status Bayar Pribadi (Kini Active di HP) -->
        <a href="{{ route('admin.status-pembayaran') }}" class="active">
            <span>👤</span>
            Status Kas
        </a>

        <a href="{{ route('pengumuman.index') }}">
            <span>📢</span>
            Pengumuman
        </a>
        <a href="{{ route('laporan.index') }}">
            <span>▤</span>
            Laporan
        </a>
    </nav>

    <!-- Script Javascript untuk Filter Pencarian -->
    <script>
        const search = document.getElementById('search');
        search.addEventListener('input', function () {
            const keyword = this.value.toLowerCase();
            document.querySelectorAll('#studentRows tr').forEach(row => {
                // Sembunyikan jika tidak cocok, tapi jangan sembunyikan baris "Data Kosong"
                if (!row.querySelector('td[colspan="7"]')) {
                    row.hidden = !row.textContent.toLowerCase().includes(keyword);
                }
            });
        });
    </script>
</body>
</html>
