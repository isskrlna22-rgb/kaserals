<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Kas - KASERALS</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

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

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
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

        /* ================= KONTEN HALAMAN ================= */
        .student-card {
            background: linear-gradient(135deg, #0d9488 0%, #0f766e 50%, #115e59 100%);
            color: white;
            padding: 28px;
            border-radius: 20px;
            margin-bottom: 25px;
            box-shadow: 0 10px 25px -5px rgba(13, 148, 136, 0.3);
            position: relative;
            overflow: hidden;
        }

        .student-card::after {
            content: "";
            position: absolute;
            width: 250px;
            height: 250px;
            right: -50px;
            top: -100px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.15), transparent 70%);
            pointer-events: none;
        }

        .student-card h3 {
            font-size: 16px;
            margin-bottom: 18px;
            font-weight: 800;
        }

        .student-info {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            position: relative;
            z-index: 2;
        }

        .info-label {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.75);
            margin-bottom: 6px;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .info-value {
            font-size: 15px;
            font-weight: 800;
            overflow-wrap: anywhere;
        }

        .content-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr);
            gap: 24px;
            align-items: start;
        }

        .card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 22px;
            padding: 28px;
            box-shadow: 0 10px 30px -5px rgba(13, 148, 136, 0.05);
            transition: 0.3s;
        }

        .card:hover {
            box-shadow: 0 15px 35px -5px rgba(13, 148, 136, 0.1);
        }

        .card h2 {
            font-size: 18px;
            margin-bottom: 6px;
            font-weight: 800;
            color: #0f172a;
        }

        .card-description {
            color: #64748b;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 22px;
            font-weight: 500;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: #334155;
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 13px 15px;
            border: 2px solid #e2e8f0;
            border-radius: 14px;
            background: #f8fafc;
            color: #0f172a;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            outline: none;
            transition: 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #0d9488;
            background: white;
            box-shadow: 0 0 0 4px rgba(13, 148, 136, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 90px;
        }

        .hint {
            display: block;
            color: #94a3b8;
            font-size: 11px;
            line-height: 1.6;
            margin-top: 7px;
            font-weight: 600;
        }

        .btn-submit {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #0d9488, #0f766e);
            border: none;
            border-radius: 14px;
            color: white;
            font-family: inherit;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(13, 148, 136, 0.25);
            transition: 0.3s;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(13, 148, 136, 0.35);
        }

        .alert {
            padding: 14px 18px;
            border-radius: 14px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 22px;
            line-height: 1.6;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .alert-error ul {
            padding-left: 20px;
            margin-top: 6px;
        }

        .history-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .history-item {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 18px;
            transition: 0.2s;
        }

        .history-item:hover {
            border-color: #5eead4;
            box-shadow: 0 5px 15px rgba(13, 148, 136, 0.08);
            transform: translateY(-2px);
        }

        .history-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 12px;
            border-bottom: 1px dashed #e2e8f0;
            padding-bottom: 12px;
        }

        .history-title {
            font-size: 14px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .history-date {
            color: #64748b;
            font-size: 11px;
            font-weight: 600;
        }

        .amount {
            color: #0d9488;
            font-weight: 900;
            font-size: 15px;
            white-space: nowrap;
        }

        .history-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            font-size: 12px;
        }

        .detail-label {
            color: #94a3b8;
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 4px;
            text-transform: uppercase;
        }

        .detail-value {
            font-weight: 700;
            color: #334155;
            overflow-wrap: anywhere;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 800;
        }

        .status-menunggu {
            background: #fef3c7;
            color: #b45309;
        }

        .status-diterima {
            background: #dcfce7;
            color: #166534;
        }

        .status-ditolak {
            background: #fee2e2;
            color: #991b1b;
        }

        .proof-link {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            color: #0d9488;
            text-decoration: none;
            font-weight: 800;
            margin-top: 14px;
            font-size: 12px;
            background: #f0fdfa;
            padding: 8px 12px;
            border-radius: 10px;
            transition: 0.2s;
        }

        .proof-link:hover {
            background: #ccfbf1;
            transform: translateX(3px);
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #64748b;
            font-size: 13px;
            line-height: 1.7;
        }

        .empty-icon {
            font-size: 38px;
            margin-bottom: 12px;
            opacity: 0.6;
        }

        .footer {
            text-align: center;
            color: #94a3b8;
            font-size: 11px;
            padding-top: 35px;
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
            .content-grid {
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

            .student-info {
                grid-template-columns: 1fr;
                gap: 14px;
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

            /* Sembunyikan profil topbar di mobile agar tidak sempit */
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
            <a href="{{ route('dashboard.siswa.pembayaran') }}" class="menu-item active">
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
            <a href="{{ route('dashboard.siswa') }}#info-kas" class="menu-item">
                <span class="menu-icon">ⓘ</span> Info Kas
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

    <main class="main">

        <!-- TOPBAR MOBILE -->
        <div class="topbar-mobile">
            <div class="brand-mobile">KASE<span>RALS</span></div>
            <small style="color: #94a3b8; font-weight: 600;">Portal Siswa</small>
        </div>

        <div class="container">

            <!-- ================= TOPBAR DESKTOP ================= -->
            <div class="topbar">
                <div class="page-heading">
                    <h1>Pembayaran Kas 💳</h1>
                    <p>
                        Lakukan pembayaran kas kelas dan pantau riwayat pembayaranmu
                        melalui halaman ini.
                    </p>
                </div>

                <!-- PROFIL DI TOPBAR (KANAN ATAS) -->
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

            <section class="student-card">
                <h3>Informasi Siswa</h3>

                <div class="student-info">
                    <div>
                        <div class="info-label">Nama Lengkap</div>
                        <div class="info-value">
                            {{ $siswa->nama_lengkap }}
                        </div>
                    </div>

                    <div>
                        <div class="info-label">NISN</div>
                        <div class="info-value">
                            {{ $siswa->nisn }}
                        </div>
                    </div>

                    <div>
                        <div class="info-label">Kelas</div>
                        <div class="info-value">
                            {{ $siswa->kelas }}
                        </div>
                    </div>
                </div>
            </section>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-error">
                    <strong>Data belum bisa dikirim.</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="content-grid">

                {{-- FORM PEMBAYARAN --}}
                <section class="card">
                    <h2>Form Pembayaran</h2>
                    <p class="card-description">
                        Isi informasi pembayaran sesuai ketentuan kas kelas.
                        Untuk transfer, lampirkan bukti pembayaran.
                    </p>

                    <form action="{{ route('dashboard.siswa.pembayaran.simpan') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="nominal">Nominal Pembayaran (Rp)</label>
                            <input type="number" id="nominal" name="nominal" min="1" step="1"
                                value="{{ old('nominal') }}" placeholder="Masukkan nominal pembayaran" required>
                        </div>

                        <div class="form-group">
                            <label for="metode_pembayaran">
                                Metode Pembayaran
                            </label>

                            <div class="form-group" id="uang-tunai-group" style="display: none;">
                                <label for="uang_dibayarkan">Uang Dibayarkan (Rp)</label>

                                <input type="number" id="uang_dibayarkan" name="uang_dibayarkan" min="1"
                                    step="1" value="{{ old('uang_dibayarkan') }}" placeholder="Contoh: 10000">

                                <span class="hint">
                                    Masukkan uang tunai yang diberikan.
                                </span>
                            </div>

                            <div class="form-group" id="kembalian-group" style="display: none;">
                                <label for="uang_kembalian">Uang Kembalian (Rp)</label>

                                <input type="text" id="uang_kembalian" value="Rp 0" readonly>

                                <span class="hint" id="pesan-kembalian">
                                    Kembalian dihitung otomatis.
                                </span>
                            </div>

                            <select name="metode_pembayaran" id="metode_pembayaran" required>
                                <option value="">-- Pilih Metode --</option>
                                <option value="Tunai" {{ old('metode_pembayaran') == 'Tunai' ? 'selected' : '' }}>
                                    Tunai
                                </option>

                                <option>
                                    value="Transfer"
                                    {{ old('metode_pembayaran') == 'Transfer' ? 'selected' : '' }}
                                    >
                                    Transfer
                                </option>
                            </select>
                        </div>

                        <div class="form-group" id="bukti-group" style="display: none;">
                            <label for="bukti_transfer">Bukti Transfer</label>

                            <input type="file" id="bukti_transfer" name="bukti_transfer"
                                accept=".jpg,.jpeg,.png,.pdf">

                            <span class="hint">
                                Format yang diperbolehkan: JPG, JPEG, PNG, atau PDF.
                                Maksimal ukuran file 2 MB.
                            </span>

                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan (Opsional)</label>

                            <textarea id="keterangan" name="keterangan" placeholder="Contoh: Pembayaran kas mingguan">{{ old('keterangan') }}</textarea>
                        </div>

                        <button type="submit" class="btn-submit">
                            Kirim Pembayaran
                        </button>
                    </form>
                </section>

                {{-- RIWAYAT PEMBAYARAN --}}
                <section class="card">
                    <h2>Riwayat Pembayaran</h2>
                    <p class="card-description">
                        Daftar pembayaran kas yang tercatat pada akunmu.
                    </p>

                    <div class="history-list">
                        @forelse ($pembayaran as $item)
                            <article class="history-item">

                                <div class="history-top">
                                    <div>
                                        <div class="history-title">
                                            Pembayaran Kas Minggu
                                            {{ $item->minggu_ke ?? '-' }}
                                        </div>

                                        <div class="history-date">
                                            {{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d M Y') : '-' }}
                                        </div>
                                    </div>

                                    <div class="amount">
                                        Rp {{ number_format((float) $item->nominal, 0, ',', '.') }}
                                    </div>
                                </div>

                                <div class="history-details">
                                    <div>
                                        <div class="detail-label">Metode</div>
                                        <div class="detail-value">
                                            {{ $item->metode_pembayaran ?? '-' }}
                                        </div>
                                    </div>

                                    <div>
                                        <div class="detail-label">Status</div>
                                        <div>
                                            @php
                                                $statusClass = match ($item->status) {
                                                    'Diterima' => 'status-diterima',
                                                    'Ditolak' => 'status-ditolak',
                                                    default => 'status-menunggu',
                                                };
                                            @endphp

                                            <span class="status {{ $statusClass }}">
                                                {{ $item->status ?? 'Menunggu' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                @if ($item->keterangan)
                                    <div
                                        style="margin-top: 12px; background: #f8fafc; padding: 10px; border-radius: 8px;">
                                        <div class="detail-label">Keterangan</div>
                                        <div class="detail-value"
                                            style="font-size: 11px; font-weight: 500; color: #64748b;">
                                            {{ $item->keterangan }}
                                        </div>
                                    </div>
                                @endif

                                @if ($item->bukti_transfer)
                                    <a href="{{ asset('storage/' . $item->bukti_transfer) }}" target="_blank"
                                        rel="noopener noreferrer" class="proof-link">
                                        Lihat Bukti Pembayaran ↗
                                    </a>
                                @endif

                            </article>
                        @empty
                            <div class="empty-state">
                                <div class="empty-icon">🧾</div>
                                <strong>Belum Ada Pembayaran</strong>
                                <p>
                                    Riwayat pembayaranmu akan tampil di sini
                                    setelah pembayaran tercatat.
                                </p>
                            </div>
                        @endforelse
                    </div>
                </section>

            </div>

            <div class="footer">
                © {{ date('Y') }} KASERALS · Sistem Pengelolaan Kas Kelas Digital
            </div>

        </div>
    </main>

    <!-- ================= MASCOT POJOK BAWAH (^ᴗ^) ================= -->
    <div class="mascot-container">
        <div class="mascot-bubble">
            Semangat bayar kasnya ya Kak! 💸<br>
            <span>Catatannya jangan lupa diisi! ✨</span>
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
        <a href="{{ route('dashboard.siswa.pembayaran') }}" class="nav-item active">
            <span class="nav-icon">💳</span>
            <span class="nav-text">Bayar Kas</span>
        </a>
        <a href="{{ route('dashboard.siswa.status') }}" class="nav-item">
            <span class="nav-icon">✓</span>
            <span class="nav-text">Status</span>
        </a>
    </nav>

    <!-- LOGOUT FORM HIDDEN -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
        @csrf
    </form>

    <script>
        const metodePembayaran = document.getElementById('metode_pembayaran');
        const buktiGroup = document.getElementById('bukti-group');
        const buktiTransfer = document.getElementById('bukti_transfer');

        function aturBuktiTransfer() {
            const transferDipilih = metodePembayaran.value === 'Transfer';

            buktiGroup.style.display = transferDipilih ? 'block' : 'none';
            buktiTransfer.required = transferDipilih;

            if (!transferDipilih) {
                buktiTransfer.value = '';
            }
        }

        metodePembayaran.addEventListener('change', aturBuktiTransfer);
        aturBuktiTransfer();
    </script>

</body>

</html>
