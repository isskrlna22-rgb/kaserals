<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Kas - KASERALS</title>

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

        button,
        input,
        select {
            font-family: inherit;
        }

        a {
            text-decoration: none;
        }

        .page {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            flex-shrink: 0;
            min-height: 100vh;
            background: #0f172a;
            color: white;
            display: flex;
            flex-direction: column;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 28px;
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

        /* NAVIGATION EXTRA GEMES */
        .navigation {
            flex: 1;
            padding: 0 16px;
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
            padding: 14px 20px;
            border-radius: 18px;
            color: #cbd5e1;
            font-size: 15px;
            font-weight: 500;
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
            transform: translateX(5px);
            background: rgba(255, 255, 255, .05);
            color: white;
        }

        .nav-link:active {
            transform: translateX(2px) scale(0.98);
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
            margin: 24px 0 10px;
            padding: 0 20px;
            color: #64748b;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .2em;
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
            color: #94a3b8;
            font-size: 12px;
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
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: #ef4444;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(239, 68, 68, 0.3);
        }

        /* MAIN & TOPBAR */
        .main {
            display: flex;
            flex: 1;
            flex-direction: column;
            min-width: 0;
        }

        .topbar {
            height: 90px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            background: white;
            border-bottom: 1px solid #e2e8f0;
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
        }

        .title h1 {
            font-size: 32px;
            font-weight: 900;
            color: #0f172a;
        }

        .title p {
            margin-top: 6px;
            color: #64748b;
            font-size: 16px;
            margin-bottom: 30px;
        }

        /* ================================
           LAYOUT COLUMNS (KIRI FORM, KANAN TRANSAKSI)
        ================================ */
        .columns {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 30px;
            align-items: start;
        }

        @media (max-width: 1024px) {
            .columns {
                grid-template-columns: 1fr;
            }
        }

        /* KARTU / CARD */
        .card {
            padding: 30px;
            border: none;
            border-radius: 24px;
            background: white;
            box-shadow: 0 10px 40px -10px rgba(15, 23, 42, .08);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px -10px rgba(13, 148, 136, .15);
        }

        .card h2 {
            margin-bottom: 24px;
            font-size: 22px;
            color: #1e293b;
        }

        /* FORM */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 800;
            color: #475569;
        }

        .form-control {
            width: 100%;
            min-height: 52px;
            padding: 0 16px;
            border: 2px solid #e2e8f0;
            border-radius: 16px;
            background: #f8fafc;
            font-size: 15px;
            outline: none;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: white;
            border-color: #0d9488;
            box-shadow: 0 0 0 4px rgba(13, 148, 136, .1);
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        /* BUTTONS */
        .buttons {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 20px;
        }

        .btn {
            padding: 14px 28px;
            border-radius: 16px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-reset {
            border: 2px solid #e2e8f0;
            background: white;
            color: #475569;
        }

        .btn-reset:hover {
            background: #f1f5f9;
        }

        .btn-save {
            border: none;
            background: #0d9488;
            color: white;
            box-shadow: 0 8px 20px rgba(13, 148, 136, 0.3);
        }

        .btn-save:hover {
            background: #0f766e;
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(13, 148, 136, 0.4);
        }

        .btn-save:active {
            transform: translateY(0);
        }

        /* LIST PEMBAYARAN */
        .payment-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .payment-header h2 {
            margin-bottom: 0;
        }

        .total {
            font-size: 16px;
            font-weight: 900;
            color: #0d9488;
            background: #ccfbf1;
            padding: 7px 13px;
            border-radius: 12px;
        }

        .payment-row {
            display: flex;
            flex-direction: column;
            gap: 12px;
            padding: 16px;
            margin-bottom: 12px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.05);
            transition: all 0.25s ease;
        }

        .payment-row:hover {
            transform: translateY(-2px);
            border-color: #99f6e4;
            box-shadow: 0 8px 20px rgba(13, 148, 136, 0.10);
        }

        .payment-row-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .student-avatar {
            width: 38px;
            height: 38px;
            flex-shrink: 0;
            border-radius: 11px;
            background: linear-gradient(135deg, #ccfbf1, #99f6e4);
            color: #0d9488;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 900;
        }

        .delete-btn {
            padding: 8px 16px;
            border: none;
            border-radius: 12px;
            background: #fee2e2;
            color: #ef4444;
            font-weight: bold;
            font-size: 12px;
            cursor: pointer;
            transition: 0.3s;
        }

        .delete-btn:hover {
            background: #ef4444;
            color: white;
            transform: scale(1.05);
        }

        /* EFEK MASCOT KASI */
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
            max-width: 220px;
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

        @keyframes floatMascot {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-15px);
            }
        }

        @keyframes blink {
            0%, 96%, 98% {
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

        /* MODAL EFEK GEMES */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.4);
            backdrop-filter: blur(8px);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: all 0.4s ease;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-box {
            background: white;
            border-radius: 28px;
            width: 90%;
            max-width: 420px;
            padding: 40px;
            text-align: center;
            transform: translateY(50px) scale(0.9);
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            border: 2px solid #e2e8f0;
        }

        .modal-overlay.active .modal-box {
            transform: translateY(0) scale(1);
        }

        .modal-icon {
            width: 70px;
            height: 70px;
            background: #ccfbf1;
            color: #0d9488;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            font-weight: bold;
            margin: 0 auto 20px;
            animation: pulse-gemes 2s infinite;
        }

        .modal-title {
            font-size: 22px;
            font-weight: 900;
            margin-bottom: 12px;
        }

        .modal-buttons {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .btn-confirm {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 14px;
            background: #0d9488;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-confirm:hover {
            background: #0f766e;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>

    <div class="page">

        <!-- SIDEBAR KASERALS -->
        <aside class="sidebar">
            <div class="logo">
                <div class="logo-box">K</div>
                <div>
                    <h1>KASERALS</h1>
                    <p>Kas Kelas Digital</p>
                </div>
            </div>

            <nav class="navigation">
                <a href="{{ route('dashboard') }}"
                    class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <span>◫</span> Dashboard
                </a>

                <a href="{{ route('data-siswa.index') }}"
                    class="nav-link {{ request()->routeIs('data-siswa.*') ? 'active' : '' }}">
                    <span>◉</span> Data Siswa
                </a>

                <p class="section-title">TRANSAKSI</p>

                <a href="{{ route('pembayaran-kas.index') }}" class="nav-link active">
                    <span>✓</span> Pembayaran Kas
                </a>

                <a href="{{ route('verifikasi-pembayaran.index') }}"
                    class="nav-link {{ request()->routeIs('verifikasi-pembayaran.*') ? 'active' : '' }}">
                    <span>●</span> Verifikasi Pembayaran
                </a>

                <a href="{{ route('pengeluaran.web.index') }}"
                    class="nav-link {{ request()->routeIs('pengeluaran.*') ? 'active' : '' }}">
                    <span>↑</span> Pengeluaran
                </a>

                <p class="section-title">CATATAN & LAPORAN</p>

                <a href="{{ route('riwayat.index') }}"
                    class="nav-link {{ request()->routeIs('riwayat.*') ? 'active' : '' }}">
                    <span>↻</span> Riwayat Transaksi
                </a>

                <a href="{{ route('pengumuman.index') }}"
                    class="nav-link {{ request()->routeIs('pengumuman.*') ? 'active' : '' }}">
                    <span>▣</span> Pengumuman
                </a>

                <a href="{{ route('laporan.index') }}"
                    class="nav-link {{ request()->routeIs('laporan.*') ? 'active' : '' }}">
                    <span>▤</span> Laporan Keuangan
                </a>
            </nav>

            <div class="sidebar-bottom">
                <div class="profile-mini">
                    <div class="profile-avatar">
                        {{ strtoupper(substr(Auth::user()->name ?? 'BE', 0, 2)) }}
                    </div>
                    <div class="profile-info">
                        <strong>{{ Auth::user()->name ?? 'Bendahara' }}</strong>
                        <span>Bendahara KASERALS</span>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">↪ &nbsp; Keluar</button>
                </form>
            </div>
        </aside>

        <!-- MAIN -->
        <main class="main">

            <header class="topbar">
                <h2>Pembayaran Kas</h2>
                <div class="avatar">
                    {{ strtoupper(substr(Auth::user()->name ?? 'BE', 0, 2)) }}
                </div>
            </header>

            <section class="content">

                <div class="title">
                    <h1>Catat Pembayaran 💸</h1>
                    <p>Catat total pembayaran kas siswa. Rincian tagihan dapat diisi di menu Detail Pembayaran.</p>
                </div>

                <!-- KOLOM: KIRI FORM, KANAN TRANSAKSI -->
                <div class="columns">

                    <!-- KOLOM KIRI: KARTU FORM PEMBAYARAN -->
                    <div class="card">
                        <h2>Form Pembayaran Kas</h2>
                        <form id="paymentForm" action="{{ route('pembayaran-kas.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- SISWA -->
                            <div class="form-group">
                                <label for="id_siswa">Pilih Siswa *</label>
                                <select id="id_siswa" name="id_siswa" class="form-control" required>
                                    <option value="">Pilih siswa...</option>
                                    @foreach ($siswa ?? [] as $item)
                                        <option value="{{ $item->id_siswa }}">
                                            {{ $item->nama_lengkap }} — NISN {{ $item->nisn }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- TOTAL BAYAR -->
                            <div class="form-group">
                                <label for="Total_bayar">Total Bayar (Rp) *</label>
                                <input id="Total_bayar" type="number" name="nominal" class="form-control"
                                    placeholder="Contoh: 20000" min="1" step="1" required>
                            </div>

                            <!-- METODE & BUKTI -->
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="metode_pembayaran">Metode Pembayaran *</label>
                                    <select id="metode_pembayaran" name="metode_pembayaran" class="form-control"
                                        required>
                                        <option value="">Pilih metode...</option>
                                        <option value="Tunai">Tunai</option>
                                        <option value="Transfer">Transfer</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="bukti_transfer">Bukti Transfer</label>
                                    <input type="file" id="bukti_transfer" name="bukti_transfer" class="form-control"
                                        accept=".jpg,.jpeg,.png,.pdf" style="padding-top: 13px;">
                                </div>
                            </div>

                            <!-- UANG DIBAYARKAN: KHUSUS TUNAI -->
                            <div class="form-group" id="uang-tunai-group" style="display: none;">
                                <label for="uang_dibayarkan">Uang Dibayarkan (Rp) *</label>
                                <input type="number" id="uang_dibayarkan" name="uang_dibayarkan" class="form-control"
                                    min="1" step="1" placeholder="Contoh: 50000">
                            </div>

                            <!-- KEMBALIAN OTOMATIS -->
                            <div class="form-group" id="kembalian-group" style="display: none;">
                                <label for="uang_kembalian">Uang Kembalian (Rp)</label>
                                <input type="text" id="uang_kembalian" class="form-control" value="Rp 0"
                                    readonly style="font-weight: bold; background: #f1f5f9;">
                                <small id="pesan-kembalian" style="display:block; margin-top:8px; color:#64748b; font-weight: 600;">
                                    Kembalian dihitung otomatis.
                                </small>
                            </div>

                            <div class="buttons">
                                <button type="reset" class="btn btn-reset">Bersihkan</button>
                                <button type="button" class="btn btn-save" onclick="showConfirmModal()">Simpan
                                    Data</button>
                            </div>
                        </form>
                    </div>

                    <!-- KOLOM KANAN: KARTU TRANSAKSI HARI INI -->
                    <div class="card">
                        <div class="payment-header">
                            <h2>Transaksi Hari Ini</h2>
                            <span class="total">
                                Rp {{ number_format($transaksiHariIni->sum('nominal') ?? 0, 0, ',', '.') }}
                            </span>
                        </div>

                        @if (isset($transaksiHariIni) && $transaksiHariIni->count() > 0)
                            @foreach ($transaksiHariIni as $transaksi)
                                <div class="payment-row">
                                    <div class="payment-row-top">
                                        {{-- DATA SISWA --}}
                                        <div style="display:flex; gap:12px; align-items:center; min-width:0;">
                                            <div class="student-avatar">
                                                {{ strtoupper(substr($transaksi->siswa->nama_lengkap ?? 'S', 0, 2)) }}
                                            </div>
                                            <div style="min-width:0;">
                                                <div
                                                    style="font-weight:bold; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                                                    {{ $transaksi->siswa->nama_lengkap ?? 'Siswa tidak ditemukan' }}
                                                </div>
                                                <div style="font-size:12px; color:#64748b;">
                                                    {{ $transaksi->status }}
                                                </div>
                                            </div>
                                        </div>
                                        {{-- TOMBOL HAPUS --}}
                                        <form action="{{ route('pembayaran-kas.destroy', $transaksi->id_pembayaran) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus pembayaran ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-btn">Hapus</button>
                                        </form>
                                    </div>

                                    <div style="display:flex; justify-content:space-between; align-items:flex-end; margin-top:4px;">
                                        <div>
                                            {{-- METODE & BUKTI --}}
                                            <div style="font-size:13px; font-weight:bold; color:#64748b; margin-bottom: 4px;">
                                                {{ $transaksi->metode_pembayaran }}
                                            </div>
                                            @if ($transaksi->bukti_transfer)
                                                <a href="{{ asset('storage/' . $transaksi->bukti_transfer) }}"
                                                    target="_blank"
                                                    style="display:inline-block; padding:5px 10px; background:#ccfbf1; color:#0d9488; border-radius:8px; font-size:11px; font-weight:bold;">
                                                    📎 Bukti
                                                </a>
                                            @endif
                                        </div>
                                        {{-- NOMINAL --}}
                                        <div style="font-size: 16px; font-weight:900; color:#0d9488;">
                                            Rp {{ number_format($transaksi->nominal, 0, ',', '.') }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div style="text-align:center; padding:40px 20px; color:#94a3b8;">
                                <div style="font-size:40px; margin-bottom:10px;">📝</div>
                                <div style="font-weight:800; color:#64748b;">Belum ada transaksi hari ini.</div>
                                <div style="font-size:13px; margin-top:5px;">Pembayaran yang berhasil dicatat akan muncul di sini.</div>
                            </div>
                        @endif
                    </div>

                </div>

            </section>
        </main>
    </div>

    <!-- ================= MASCOT KASI ================= -->
    <div class="mascot-container">
        <div class="mascot-bubble">
            Halo Kak Bendahara! 👋<br>
            <span>Jangan lupa isi rincian minggunya di menu Detail Pembayaran ya~ ✨</span>
        </div>
        <div class="mascot-body">
            <div class="mascot-face">^ᴗ^</div>
        </div>
    </div>

    <!-- ================= MODAL KONFIRMASI ================= -->
    <div class="modal-overlay" id="confirmModal">
        <div class="modal-box">
            <div class="modal-icon">✨</div>
            <h3 class="modal-title">Simpan Transaksi?</h3>
            <p style="color: #64748b; font-size: 15px; margin-bottom: 10px;">Pastikan nominal dan nama siswa sudah
                benar ya!</p>

            <div class="modal-buttons">
                <button class="btn btn-reset" style="flex:1;" onclick="closeConfirmModal()">Cek Lagi</button>
                <button class="btn-confirm" onclick="submitForm()">Ya, Simpan!</button>
            </div>
        </div>
    </div>

    <!-- ================= SCRIPT ================= -->
    <script>
        const form = document.getElementById('paymentForm');
        const modal = document.getElementById('confirmModal');

        // Element untuk logika Tunai & Transfer
        const totalBayar = document.getElementById('Total_bayar');
        const metodePembayaran = document.getElementById('metode_pembayaran');
        const buktiTransfer = document.getElementById('bukti_transfer');

        const uangTunaiGroup = document.getElementById('uang-tunai-group');
        const uangDibayarkan = document.getElementById('uang_dibayarkan');

        const kembalianGroup = document.getElementById('kembalian-group');
        const uangKembalian = document.getElementById('uang_kembalian');
        const pesanKembalian = document.getElementById('pesan-kembalian');

        // Fungsi Kalkulasi Kembalian
        function hitungKembalian() {
            const total = parseFloat(totalBayar.value) || 0;
            const dibayar = parseFloat(uangDibayarkan.value) || 0;

            if (metodePembayaran.value === 'Tunai') {
                const sisa = dibayar - total;

                if (uangDibayarkan.value === '' || dibayar === 0) {
                    uangKembalian.value = 'Rp 0';
                    uangKembalian.style.color = '#0f172a';
                    pesanKembalian.innerHTML = 'Kembalian dihitung otomatis.';
                    pesanKembalian.style.color = '#64748b';
                } else if (sisa < 0) {
                    uangKembalian.value = 'Uang Kurang!';
                    uangKembalian.style.color = '#ef4444';
                    pesanKembalian.innerHTML = 'Nominal yang dibayarkan kurang dari total.';
                    pesanKembalian.style.color = '#ef4444';
                } else {
                    uangKembalian.value = 'Rp ' + sisa.toLocaleString('id-ID');
                    uangKembalian.style.color = '#0d9488';
                    pesanKembalian.innerHTML = 'Uang pas / Kembalian sesuai.';
                    pesanKembalian.style.color = '#0d9488';
                }
            }
        }

        // Listener saat Metode Pembayaran Diganti
        metodePembayaran.addEventListener('change', function() {
            if (this.value === 'Transfer') {
                buktiTransfer.required = true;

                // Sembunyikan field Tunai
                uangTunaiGroup.style.display = 'none';
                kembalianGroup.style.display = 'none';
                uangDibayarkan.required = false;
                uangDibayarkan.value = '';
                uangKembalian.value = 'Rp 0';
            } else if (this.value === 'Tunai') {
                buktiTransfer.required = false;

                // Tampilkan field Tunai
                uangTunaiGroup.style.display = 'block';
                kembalianGroup.style.display = 'block';
                uangDibayarkan.required = true;

                // Hitung kembalian jika total tagihan sudah terisi
                hitungKembalian();
            } else {
                buktiTransfer.required = false;
                uangTunaiGroup.style.display = 'none';
                kembalianGroup.style.display = 'none';
                uangDibayarkan.required = false;
            }
        });

        // Trigger perhitungan otomatis saat angka diketik
        totalBayar.addEventListener('input', hitungKembalian);
        uangDibayarkan.addEventListener('input', hitungKembalian);

        // Reset UI form saat tombol Bersihkan ditekan
        form.addEventListener('reset', function() {
            setTimeout(() => {
                uangTunaiGroup.style.display = 'none';
                kembalianGroup.style.display = 'none';
                uangKembalian.value = 'Rp 0';
                uangKembalian.style.color = '#0f172a';
                pesanKembalian.innerHTML = 'Kembalian dihitung otomatis.';
                pesanKembalian.style.color = '#64748b';
            }, 10);
        });

        // Script Modal Confirm
        function showConfirmModal() {
            // Validasi manual khusus kembalian jika pilih Tunai
            if (metodePembayaran.value === 'Tunai') {
                const total = parseFloat(totalBayar.value) || 0;
                const dibayar = parseFloat(uangDibayarkan.value) || 0;
                if (dibayar < total) {
                    alert('Uang yang dibayarkan tidak boleh kurang dari total bayar!');
                    uangDibayarkan.focus();
                    return; // Batalkan kemunculan modal jika uang kurang
                }
            }

            if (form.checkValidity()) {
                modal.classList.add('active');
            } else {
                form.reportValidity();
            }
        }

        function closeConfirmModal() {
            modal.classList.remove('active');
        }

        function submitForm() {
            form.submit();
        }
    </script>

</body>
</html>
