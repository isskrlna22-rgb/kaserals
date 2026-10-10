<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Wali Kelas - KASERALS</title>

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

        /* ================= HERO (BANNER WALI KELAS - WARNA KASERALS) ================= */
        .welcome {
            position: relative;
            overflow: hidden;
            min-height: 190px;
            border-radius: 24px;
            padding: 32px 36px;
            margin-bottom: 24px;
            background: linear-gradient(135deg, #0d9488 0%, #0f766e 50%, #115e59 100%);
            box-shadow: 0 10px 25px -5px rgba(13, 148, 136, 0.3);
            display: flex;
            align-items: center;
            justify-content: space-between; /* Membuat jarak antara text dan mascot */
            color: white;
        }

        .welcome::after {
            content: "";
            position: absolute;
            width: 250px;
            height: 250px;
            right: -50px;
            top: -100px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,255,255,0.15), transparent 70%);
            pointer-events: none;
        }

        .welcome-content { position: relative; z-index: 2; max-width: 550px; }
        .welcome-small {
            color: rgba(255, 255, 255, 0.75);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.5px;
            margin-bottom: 8px;
            text-transform: uppercase;
        }
        .welcome h1 { font-size: 28px; font-weight: 800; margin-bottom: 8px; }
        .welcome p { color: rgba(255, 255, 255, 0.9); font-size: 13px; line-height: 1.6; font-weight: 500; }

        .btn-laporan {
            display: inline-block;
            margin-top: 16px;
            padding: 10px 20px;
            border-radius: 12px;
            background: white;
            color: #0d9488;
            font-size: 12px;
            font-weight: 800;
            text-decoration: none;
            transition: 0.3s;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .btn-laporan:hover { background: #f8fafc; transform: translateY(-2px); box-shadow: 0 6px 20px rgba(0,0,0,0.15); }

        /* STYLE GAMBAR MASCOT DI BANNER */
        .welcome-mascot {
            position: relative;
            z-index: 2;
            height: 150px; /* Atur besar-kecil mascotnya di sini */
            object-fit: contain;
            animation: floatMascot 4s ease-in-out infinite;
        }

        /* ================= CARDS (RINGKASAN KEUANGAN) ================= */
        .cards { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 24px; }
        .card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 22px;
            padding: 22px;
            box-shadow: 0 10px 30px -5px rgba(13, 148, 136, 0.05);
            transition: transform 0.3s ease;
        }

        .card:hover { transform: translateY(-5px); box-shadow: 0 15px 35px -5px rgba(13, 148, 136, 0.15); }
        .card-label { font-size: 11px; color: #64748b; font-weight: 800; letter-spacing: 0.5px; margin-bottom: 10px; text-transform: uppercase; }
        .card-value { font-size: 22px; color: #0f172a; font-weight: 800; }

        .card-value.green { color: #0d9488; }
        .card-value.red { color: #e11d48; }
        .card-value.warning { color: #d97706; }

        /* ================= CONTENT GRID ================= */
        .content-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 20px; }
        .panel {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 22px;
            padding: 22px;
            box-shadow: 0 10px 30px -5px rgba(13, 148, 136, 0.05);
        }

        .panel-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px; }
        .section-title { font-size: 15px; font-weight: 800; color: #0f172a; }
        .panel-link { font-size: 12px; color: #0d9488; font-weight: 700; text-decoration: none; transition: 0.2s; }
        .panel-link:hover { text-decoration: underline; }

        /* TABLE */
        .table-head, .table-row { display: grid; grid-template-columns: 2fr 1fr 1.5fr 1fr; align-items: center; gap: 10px; }
        .table-head { padding: 0 6px 10px; border-bottom: 1px solid #f1f5f9; }
        .table-head span { font-size: 10px; color: #94a3b8; font-weight: 700; text-transform: uppercase; }
        .table-head span:last-child, .table-row span:last-child { text-align: right; }
        .table-row { padding: 12px 6px; border-bottom: 1px solid #f8fafc; transition: 0.2s ease; }
        .table-row:hover { background: #f0fdfa; border-radius: 8px; }
        .table-row span { font-size: 12px; color: #334155; font-weight: 600; }

        .nominal-in { color: #0d9488 !important; font-weight: 800 !important; }
        .nominal-out { color: #e11d48 !important; font-weight: 800 !important; }

        .badge-status { padding: 4px 10px; border-radius: 20px; font-size: 10px; font-weight: 700; display: inline-block; text-align: center; }
        .badge-masuk { background: #dcfce7; color: #166534; }
        .badge-keluar { background: #ffe4e6; color: #9f1239; }

        /* LIST SISWA MENUNGGAK */
        .alert-list { display: flex; flex-direction: column; gap: 12px; }
        .alert-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px;
            border-radius: 12px;
            background: #fffbeb;
            border: 1px solid #fde68a;
        }

        .alert-info .name { font-size: 13px; font-weight: 700; color: #92400e; margin-bottom: 4px; }
        .alert-info .detail { font-size: 11px; color: #b45309; font-weight: 600; }
        .alert-action {
            background: #d97706;
            color: white;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 700;
            text-decoration: none;
            transition: 0.2s;
        }
        .alert-action:hover { background: #b45309; }

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

        @media (max-width: 1024px) {
            .cards { grid-template-columns: repeat(2, 1fr); }
            .content-grid { grid-template-columns: 1fr; }
        }

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

            .welcome { min-height: 160px; padding: 24px 20px; display: flex; flex-direction: column; align-items: flex-start; }
            /* Penyesuaian mascot banner di mobile */
            .welcome-mascot { position: absolute; right: -20px; bottom: -10px; height: 130px; opacity: 0.25; z-index: 1; }

            .cards { grid-template-columns: 1fr 1fr; gap: 12px; }
            .table-head, .table-row { grid-template-columns: 1fr 1fr; }
            .table-head span:nth-child(2), .table-row span:nth-child(2), .table-head span:nth-child(3), .table-row span:nth-child(3) { display: none; }
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
            <a href="{{ route('wali-kelas.dashboard') }}" class="menu-item active">
                <span class="menu-icon">⌂</span> Dashboard
            </a>
        </div>

        <div class="menu-section">
            <div class="menu-title">MONITORING</div>
            <a href="{{ route('wali-kelas.riwayat-transaksi') }}" class="menu-item">
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
                    <h1>Dashboard Wali Kelas</h1>
                    <p>
                        Pemantauan Keuangan Kelas {{ $kelas->nama_kelas ?? '-' }}
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

            <!-- HERO SECTION (SUDAH WARNA TOSCA KASERALS + TEMPAT MASCOT) -->
            <section class="welcome">
                <div class="welcome-content">
                    <div class="welcome-small">
                        PORTAL MONITORING KASERALS
                    </div>
                    <h1>
                        Halo, {{ $waliKelas->name ?? 'Wali Kelas' }} 👋
                    </h1>
                    <p>
                        Pantau perkembangan kas kelas, lihat laporan dari Bendahara, dan
                        awasi siswa yang belum membayar kas dengan mudah.
                    </p>
                    <a href="{{ route('wali-kelas.laporan-keuangan') }}" class="btn-laporan">Unduh Laporan Bulan Ini ↓</a>
                </div>

                <!-- INI TEMPAT GAMBAR MASCOT KAMU KAK 👇 TINGGAL UBAH URL SRC-NYA -->
                <img src="{{ asset('images/kasi.svg') }}" alt="Mascot Kaserals" class="welcome-mascot">

            </section>

            <!-- CARDS RINGKASAN -->
            <section class="cards">
                <div class="card">
                    <div class="card-label">SALDO KAS SAAT INI</div>
                    <div class="card-value green">
                        Rp {{ number_format($saldoKas ?? 0, 0, ',', '.') }}
                    </div>
                </div>
                <div class="card">
                    <div class="card-label">TOTAL PEMASUKAN</div>
                    <div class="card-value">
                        Rp {{ number_format($totalPemasukan ?? 0, 0, ',', '.') }}
                    </div>
                </div>
                <div class="card">
                    <div class="card-label">TOTAL PENGELUARAN</div>
                    <div class="card-value red">
                        Rp {{ number_format($totalPengeluaran ?? 0, 0, ',', '.') }}
                    </div>
                </div>
                <div class="card">
                    <div class="card-label">SISWA MENUNGGAK</div>
                    <div class="card-value warning">
                        {{ $jumlahMenunggak ?? 0 }} Siswa
                    </div>
                </div>
            </section>

            <!-- CONTENT GRID -->
            <section class="content-grid">

                <!-- PEMBAYARAN KAS TERBARU -->
                <div class="panel">
                    <div class="panel-header">
                        <div class="section-title">Pembayaran Kas Terbaru</div>
                        <a href="{{ route('wali-kelas.riwayat-transaksi') }}" class="panel-link">Lihat Semua →</a>
                    </div>

                    <div class="table-head">
                        <span>NAMA SISWA</span>
                        <span>TANGGAL</span>
                        <span>STATUS</span>
                        <span>NOMINAL</span>
                    </div>

                    @forelse ($pembayaranTerbaru ?? [] as $trx)
                        <div class="table-row">
                            <span>{{ $trx->siswa->nama_lengkap ?? 'Siswa' }}</span>
                            <span>{{ $trx->tanggal ? \Carbon\Carbon::parse($trx->tanggal)->format('d/m/Y') : '-' }}</span>
                            <span>
                                @if ($trx->status === 'Diterima')
                                    <span class="badge-status badge-masuk">Diterima</span>
                                @elseif ($trx->status === 'Ditolak')
                                    <span class="badge-status badge-keluar">Ditolak</span>
                                @else
                                    <span class="badge-status" style="background:#fef3c7;color:#92400e;">Menunggu</span>
                                @endif
                            </span>
                            <span class="nominal-in">Rp {{ number_format($trx->nominal ?? 0, 0, ',', '.') }}</span>
                        </div>
                    @empty
                        <div class="table-row">
                            <span>Belum ada pembayaran</span>
                            <span>-</span>
                            <span>-</span>
                            <span>-</span>
                        </div>
                    @endforelse
                </div>

                <!-- SISWA PERLU PERHATIAN (MENUNGGAK) -->
                <div class="panel" style="border-top: 4px solid #f59e0b;">
                    <div class="panel-header">
                        <div class="section-title">Perlu Perhatian ⚠️</div>
                    </div>
                    <p style="font-size: 12px; color: #64748b; margin-bottom: 16px;">
                        Ringkasan siswa yang memiliki pembayaran berstatus Menunggu atau Ditolak.
                    </p>
                    <div class="alert-list">
                        <div class="alert-item">
                            <div class="alert-info">
                                <div class="name">Pembayaran perlu diperiksa</div>
                                <div class="detail">
                                    {{ $jumlahMenunggak ?? 0 }} siswa memiliki pembayaran berstatus Menunggu atau Ditolak.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </main>

    <!-- ================= MASCOT POJOK BAWAH (^ᴗ^) ================= -->
    <div class="mascot-container">
        <div class="mascot-bubble">
            Selamat bertugas, Bapak/Ibu! 📚<br>
            <span>Semoga kas kelasnya lancar selalu! ✨</span>
        </div>
        <div class="mascot-body">
            <div class="mascot-face">^ᴗ^</div>
        </div>
    </div>

    <!-- BOTTOM NAV MOBILE -->
    <nav class="bottom-nav">
        <a href="{{ route('wali-kelas.dashboard') }}" class="nav-item active">
            <span class="nav-icon">⌂</span>
            <span class="nav-text">Dashboard</span>
        </a>
        <a href="{{ route('wali-kelas.laporan-keuangan') }}" class="nav-item">
            <span class="nav-icon">📊</span>
            <span class="nav-text">Laporan</span>
        </a>
        <a href="{{ route('wali-kelas.riwayat-transaksi') }}" class="nav-item">
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
