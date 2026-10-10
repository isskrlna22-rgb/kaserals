<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi - KASERALS</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

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
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
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

        .brand-name { font-size: 18px; font-weight: 800; letter-spacing: 0.5px; }
        .brand-subtitle { font-size: 11px; color: #64748b; margin-top: 2px; }

        .menu-section { margin-bottom: 24px; }
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

        .menu-icon { width: 20px; text-align: center; font-size: 16px; transition: transform 0.3s ease; }
        .menu-item:hover .menu-icon { transform: scale(1.1) rotate(-5deg); }

        .sidebar-footer { margin-top: auto; padding-top: 24px; border-top: 1px dashed rgba(255, 255, 255, 0.1); }
        .sidebar-profile { display: flex; align-items: center; gap: 12px; margin-bottom: 16px; padding: 0 12px; }
        .sidebar-avatar { width: 40px; height: 40px; border-radius: 12px; background: rgba(45, 212, 191, 0.2); color: #2dd4bf; display: flex; align-items: center; justify-content: center; font-size: 14px; font-weight: 800; }
        .sidebar-user-info { overflow: hidden; }
        .sidebar-user-name { font-size: 13px; font-weight: 700; color: white; white-space: nowrap; text-overflow: ellipsis; overflow: hidden; }
        .sidebar-user-role { font-size: 11px; color: #94a3b8; margin-top: 2px; }

        .menu-logout { color: #f87171 !important; }
        .menu-logout:hover { background: rgba(239, 68, 68, 0.1) !important; color: #fca5a5 !important; }

        /* ================= MAIN ================= */
        .main { margin-left: 250px; padding: 32px 40px 50px; }

        .topbar-mobile { display: none; }
        .container { max-width: 1100px; margin: 0 auto; }

        /* ================= TOPBAR (PROFIL KANAN ATAS) ================= */
        .topbar { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 25px; gap: 20px; }

        .page-heading h1 { font-size: 27px; margin-bottom: 8px; font-weight: 800; color: #0f172a; }
        .page-heading p { color: #64748b; font-size: 13px; line-height: 1.7; font-weight: 500; max-width: 600px; }

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

        .profile:hover { background: white; border-color: #e2e8f0; box-shadow: 0 6px 20px rgba(13, 148, 136, 0.08); transform: translateY(-2px); }
        .avatar { width: 42px; height: 42px; border-radius: 50%; background: #ccfbf1; color: #0d9488; display: flex; align-items: center; justify-content: center; font-size: 14px; font-weight: 800; }
        .profile-name { font-size: 13px; font-weight: 800; color: #0f172a; }
        .profile-role { font-size: 11px; color: #64748b; margin-top: 2px; font-weight: 600; }

        /* ================= CARD & TABLE ================= */
        .card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 22px;
            padding: 28px;
            box-shadow: 0 10px 30px -5px rgba(13, 148, 136, 0.05);
            margin-bottom: 25px;
        }

        .card h3 { font-size: 18px; margin-bottom: 6px; font-weight: 800; color: #0f172a; }
        .card p { color: #64748b; font-size: 13px; line-height: 1.6; margin-bottom: 22px; font-weight: 500; }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
            background: white;
        }

        th, td {
            text-align: left;
            padding: 16px 20px;
            font-size: 13px;
            border-bottom: 1px solid #f1f5f9;
        }

        th {
            background: #f8fafc;
            color: #64748b;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 0.5px;
        }

        td {
            color: #334155;
            font-weight: 600;
        }

        tr:last-child td { border-bottom: none; }
        tr:hover td { background: #f0fdfa; }

        .nominal-cell {
            font-weight: 800;
            color: #0d9488;
        }

        /* STATUS BADGES */
        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 800;
            text-align: center;
        }

        .status.diterima { background: #dcfce7; color: #166534; }
        .status.menunggu { background: #fef3c7; color: #b45309; }
        .status.ditolak { background: #fee2e2; color: #991b1b; }

        .kosong {
            text-align: center;
            color: #94a3b8;
            padding: 40px 20px !important;
            font-weight: 600;
            font-size: 13px;
        }

        /* ================= MASCOT POJOK BAWAH (^ᴗ^) ================= */
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
            border: 2px solid #ccfbf1;
            opacity: 0;
            transform: translateY(20px) scale(0.9);
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }
        .mascot-bubble span { color: #0d9488; }
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
        .mascot-face { font-size: 28px; color: white; font-weight: bold; animation: blink 4s infinite; }

        .mascot-container:hover .mascot-bubble { opacity: 1; transform: translateY(0) scale(1); }
        .mascot-container:hover .mascot-body { transform: scale(1.1) rotate(10deg); border-radius: 50%; }

        /* ================= BOTTOM NAV MOBILE ================= */
        .bottom-nav {
            display: none;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(255, 255, 255, 0.95);
            border-top: 1px solid #e2e8f0;
            grid-template-columns: repeat(3, 1fr);
            padding: 10px 12px 14px;
            z-index: 100;
            backdrop-filter: blur(10px);
        }

        .nav-item { display: flex; flex-direction: column; align-items: center; text-decoration: none; color: #94a3b8; gap: 2px; transition: 0.3s; }
        .nav-item.active { color: #0d9488; font-weight: 700; }
        .nav-icon { font-size: 18px; }
        .nav-text { font-size: 10px; }

        @media (max-width: 768px) {
            .sidebar { display: none; }
            .main { margin-left: 0; padding: 20px 16px 90px; }
            .topbar { display: none; }
            .topbar-mobile {
                background: #091320;
                color: white;
                padding: 16px 20px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin: -20px -16px 24px -16px;
            }
            .brand-mobile { font-size: 20px; font-weight: 800; }
            .brand-mobile span { color: #2dd4bf; }

            .card { padding: 20px 16px; }
            .bottom-nav { display: grid; }
            .mascot-container { display: none; }
        }
    </style>
</head>
<body>

    <!-- SIDEBAR LENGKAP -->
    <aside class="sidebar">
        <div class="brand-sidebar">
            <div class="logo">K</div>
            <div>
                <div class="brand-name">KASERALS</div>
                <div class="brand-subtitle">Kas Kelas Digital</div>
            </div>
        </div>

        <div class="menu-section">
            <div class="menu-title">MENU UTAMA</div>
            <a href="{{ route('wali-kelas.dashboard') }}" class="menu-item">
                <span class="menu-icon">⌂</span> Dashboard
            </a>
        </div>

        <div class="menu-section">
            <div class="menu-title">MONITORING</div>
            <a href="{{ route('wali-kelas.riwayat-transaksi') }}" class="menu-item active">
                <span class="menu-icon">⏱</span> Riwayat Transaksi
            </a>
            <a href="{{ route('wali-kelas.laporan-keuangan') }}" class="menu-item">
                <span class="menu-icon">📊</span> Laporan Keuangan
            </a>
        </div>

        <!-- ================= PROFIL & LOGOUT DI SIDEBAR BAWAH ================= -->
        <div class="sidebar-footer">
            <div class="menu-title">AKUN WALI KELAS</div>

            <div class="sidebar-profile">
                <div class="sidebar-avatar">
                    {{ strtoupper(substr($waliKelas->nama_lengkap ?? 'WK', 0, 2)) }}
                </div>
                <div class="sidebar-user-info">
                    <div class="sidebar-user-name">
                        {{ $waliKelas->nama_lengkap ?? 'Bapak/Ibu Guru' }}
                    </div>
                    <div class="sidebar-user-role">
                        Wali Kelas · {{ $kelas->nama_kelas ?? 'Kelas' }}
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
            <small style="color: #94a3b8; font-weight: 600;">Wali Kelas</small>
        </div>

        <div class="container">

            <!-- ================= TOPBAR (PROFIL KANAN ATAS) ================= -->
            <div class="topbar">
                <div class="page-heading">
                    <h1>Riwayat Transaksi ⏱</h1>
                    <p>
                        Pantau seluruh riwayat pembayaran kas siswa untuk kelas {{ $kelas->nama_kelas ?? '-' }}.
                    </p>
                </div>

                <div class="profile">
                    <div class="avatar">
                        {{ strtoupper(substr($waliKelas->nama_lengkap ?? 'WK', 0, 2)) }}
                    </div>
                    <div>
                        <div class="profile-name">
                            {{ $waliKelas->name ?? 'Wali Kelas' }}
                        </div>
                        <div class="profile-role">
                            Wali Kelas {{ $kelas->nama_kelas ?? '-' }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- TABEL RIWAYAT TRANSAKSI -->
            <section class="card">
                <h3>Riwayat Pembayaran Kas</h3>
                <p>Daftar transaksi pembayaran kas siswa beserta status terkininya.</p>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Nama Siswa</th>
                                <th>Minggu Ke-</th>
                                <th>Nominal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pembayaran as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $item->tanggal
                                            ? \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y')
                                            : '-' }}
                                    </td>
                                    <td>
                                        {{ $item->siswa->nama_lengkap ?? 'Siswa tidak ditemukan' }}
                                    </td>
                                    <td>Minggu {{ $item->minggu_ke ?? '-' }}</td>
                                    <td class="nominal-cell">
                                        Rp {{ number_format((float) $item->nominal, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        @php
                                            $status = strtolower($item->status ?? '');
                                        @endphp
                                        <span class="status {{ $status }}">
                                            {{ $item->status ?? 'Menunggu' }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="kosong">
                                        Belum ada riwayat transaksi pembayaran.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>

        </div>
    </main>

    <!-- ================= MASCOT POJOK BAWAH (^ᴗ^) ================= -->
    <div class="mascot-container">
        <div class="mascot-bubble">
            Ini daftar transaksinya, Bapak/Ibu! 📋<br>
            <span>Semua tercatat dengan rapi. ✨</span>
        </div>
        <div class="mascot-body">
            <div class="mascot-face">^ᴗ^</div>
        </div>
    </div>

    <!-- BOTTOM NAV MOBILE -->
    <nav class="bottom-nav">
        <a href="{{ route('wali-kelas.dashboard') }}" class="nav-item">
            <span class="nav-icon">⌂</span>
            <span class="nav-text">Dashboard</span>
        </a>
        <a href="{{ route('wali-kelas.laporan-keuangan') }}" class="nav-item">
            <span class="nav-icon">📊</span>
            <span class="nav-text">Laporan</span>
        </a>
        <a href="{{ route('wali-kelas.riwayat-transaksi') }}" class="nav-item active">
            <span class="nav-icon">⏱</span>
            <span class="nav-text">Riwayat</span>
        </a>
    </nav>

    <!-- LOGOUT FORM HIDDEN -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
        @csrf
    </form>

</body>
</html>
