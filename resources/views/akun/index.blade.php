<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Akun & Sistem - KASERALS</title>

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

        button,
        input,
        select {
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

        .page-heading {
            margin-bottom: 30px;
        }

        .page-heading h1 {
            font-size: 32px;
            font-weight: 900;
            color: #0f172a;
            margin-bottom: 6px;
        }

        .page-heading p {
            color: #64748b;
            font-size: 16px;
        }

        /* ================= GRID LAYOUT ================= */
        .settings-grid {
            display: grid;
            grid-template-columns: 1fr 1.6fr;
            gap: 30px;
            align-items: start;
        }

        .panel {
            background: white;
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 10px 40px -10px rgba(15, 23, 42, .06);
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .panel-title {
            font-size: 20px;
            font-weight: 800;
            color: #0f172a;
        }

        .panel-subtitle {
            font-size: 14px;
            color: #64748b;
            margin-top: 5px;
        }

        /* ================= FORM STANDAR ================= */
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
            padding: 14px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 16px;
            background: #f8fafc;
            font-size: 15px;
            font-weight: 600;
            color: #0f172a;
            outline: none;
            transition: 0.3s ease;
        }

        .form-control:focus {
            background: white;
            border-color: #0d9488;
            box-shadow: 0 0 0 4px rgba(13, 148, 136, .1);
        }

        .btn-save {
            width: 100%;
            padding: 14px 28px;
            border: none;
            border-radius: 16px;
            font-size: 15px;
            font-weight: bold;
            background: linear-gradient(135deg, #0d9488, #0f766e);
            color: white;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(13, 148, 136, 0.25);
            transition: 0.3s ease;
            margin-top: 10px;
        }

        .btn-save:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(13, 148, 136, 0.35);
        }

        .btn-add {
            background: #0d9488;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-add:hover {
            background: #0f766e;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(13, 148, 136, 0.2);
        }

        /* ================= TABEL AKUN ================= */
        .table-wrapper {
            overflow-x: auto;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
        }

        .transaction-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        .transaction-table th {
            background: #f8fafc;
            color: #64748b;
            font-size: 12px;
            font-weight: 800;
            padding: 16px 20px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        .transaction-table td {
            padding: 16px 20px;
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
            padding: 6px 12px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .badge-admin {
            background: #fee2e2;
            color: #e11d48;
        }

        .badge-bendahara {
            background: #dbeafe;
            color: #2563eb;
        }

        .badge-siswa {
            background: #f3f4f6;
            color: #475569;
        }

        .action-btns {
            display: flex;
            gap: 8px;
        }

        .btn-edit {
            background: #ffedd5;
            color: #ea580c;
            border: none;
            padding: 6px 10px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 12px;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-delete {
            background: #ffe4e6;
            color: #e11d48;
            border: none;
            padding: 6px 10px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 12px;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-edit:hover {
            background: #ea580c;
            color: white;
        }

        .btn-delete:hover {
            background: #e11d48;
            color: white;
        }

        /* ================= MODAL TAMBAH AKUN ================= */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(5px);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        .modal-overlay.active {
            opacity: 1;
            pointer-events: auto;
        }

        .modal-card {
            background: white;
            width: 100%;
            max-width: 480px;
            border-radius: 24px;
            padding: 35px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
            transform: translateY(20px) scale(0.95);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .modal-overlay.active .modal-card {
            transform: translateY(0) scale(1);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .modal-title {
            font-size: 22px;
            font-weight: 900;
            color: #0f172a;
        }

        .btn-close {
            background: none;
            border: none;
            font-size: 24px;
            color: #94a3b8;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-close:hover {
            color: #e11d48;
            transform: rotate(90deg);
        }

        .modal-footer {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .btn-cancel {
            flex: 1;
            padding: 14px;
            border: 2px solid #e2e8f0;
            border-radius: 16px;
            background: white;
            color: #64748b;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-cancel:hover {
            background: #f1f5f9;
            border-color: #cbd5e1;
        }

        .btn-submit {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 16px;
            background: #0d9488;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 5px 15px rgba(13, 148, 136, 0.3);
        }

        .btn-submit:hover {
            background: #0f766e;
            transform: translateY(-2px);
        }

        /* ================= MASCOT POJOK BAWAH ================= */
        .mascot-container {
            position: fixed;
            bottom: 40px;
            right: 40px;
            z-index: 99;
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
            max-width: 240px;
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
            .settings-grid {
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
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <span>◫</span> Dashboard
                </a>

                <p class="section-title">MASTER DATA</p>
                <a href="{{ route('data-siswa.index') }}" class="nav-link">
                    <span>◉</span> Kelola Data Siswa
                </a>
                <a href="#" class="nav-link">
                    <span>◉</span> Kelola Data Siswa
                </a>

                <p class="section-title">TRANSAKSI ADMIN</p>
                <a href="#" class="nav-link">
                    <span>✓</span> Catat Pembayaran Kas
                </a>
                <a href="#" class="nav-link">
                    <span>●</span> Verifikasi Pembayaran
                </a>
                <a href="#" class="nav-link">
                    <span>↑</span> Catat Pengeluaran
                </a>

                <p class="section-title">AKSES SISWA</p>
                <a href="#" class="nav-link">
                    <span>💸</span> Lakukan Pembayaran
                </a>
                <a href="#" class="nav-link">
                    <span>📎</span> Unggah Bukti Bayar
                </a>
                <a href="#" class="nav-link">
                    <span>👤</span> Status Bayar Pribadi
                </a>

                <p class="section-title">CATATAN & LAPORAN</p>
                <a href="#" class="nav-link">
                    <span>↻</span> Riwayat Transaksi
                </a>
                <a href="#" class="nav-link">
                    <span>▣</span> Kelola Pengumuman
                </a>
                <a href="#" class="nav-link">
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
                <form method="POST" action="#">
                    <button type="submit" class="logout-btn">↪ &nbsp; Keluar</button>
                </form>
            </div>
        </aside>

        <!-- ================= MAIN CONTENT ================= -->
        <main class="main">

            <header class="topbar">
                <h2>Konfigurasi Sistem</h2>
                <div class="avatar">AD</div>
            </header>

            <section class="content">

                <div class="page-heading">
                    <h1>Kelola Akun & Sistem ⚙️</h1>
                    <p>Atur konfigurasi kelas, nominal uang kas, serta kelola hak akses pengguna.</p>
                </div>

                <!-- GRID KIRI & KANAN -->
                <div class="settings-grid">

                    <!-- KIRI: FORM KONFIGURASI SISTEM -->
                    <div class="panel">
                        <div class="panel-header">
                            <div>
                                <h2 class="panel-title">Pengaturan Kelas</h2>
                                <div class="panel-subtitle">Atur data utama aplikasi kas kelas.</div>
                            </div>
                        </div>

                        <form action="#" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="nama_kelas">Nama Kelas</label>
                                <input type="text" id="nama_kelas" name="nama_kelas" class="form-control"
                                    value="XII Rekayasa Perangkat Lunak 1" required>
                            </div>

                            <div class="form-group">
                                <label for="wali_kelas">Nama Wali Kelas</label>
                                <input type="text" id="wali_kelas" name="wali_kelas" class="form-control"
                                    value="Bpk. Budi Santoso, S.Kom." required>
                            </div>

                            <div class="form-group">
                                <label for="nominal_kas">Nominal Kas Rutin (Rp)</label>
                                <input type="number" id="nominal_kas" name="nominal_kas" class="form-control"
                                    value="10000" required>
                                <small
                                    style="color: #64748b; font-size: 12px; margin-top: 6px; display: block;">*Nominal
                                    standar per pertemuan/minggu</small>
                            </div>

                            <button type="submit" class="btn-save">Simpan Perubahan</button>
                        </form>
                    </div>

                    <!-- KANAN: TABEL AKUN PENGGUNA -->
                    <div class="panel">
                        <div class="panel-header">
                            <div>
                                <h2 class="panel-title">Daftar Pengguna</h2>
                                <div class="panel-subtitle">Kelola akun Admin, Bendahara, dan Siswa.</div>
                            </div>
                            <!-- TOMBOL TRIGGER POP-UP MODAL -->
                            <a href="{{ route('akun.create') }}" class="btn-add">
                                + Tambah Akun
                            </a>
                        </div>
                        <div class="table-wrapper">
                            <table class="transaction-table">
                                <thead>
                                    <tr>
                                        <th>NAMA LENGKAP</th>
                                        <th>EMAIL</th>
                                        <th>PERAN</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($akun as $item)
                                        <tr>

                                            <td>
                                                {{ $item->name }}
                                            </td>

                                            <td>
                                                {{ $item->email }}
                                            </td>

                                            <td>
                                                @if ($item->role === 'ADMIN')
                                                    <span class="badge badge-admin">
                                                        Admin
                                                    </span>
                                                @elseif ($item->role === 'BENDAHARA')
                                                    <span class="badge badge-bendahara">
                                                        Bendahara
                                                    </span>
                                                @elseif ($item->role === 'WALI_KELAS')
                                                    <span class="badge badge-bendahara">
                                                        Wali Kelas
                                                    </span>
                                                @elseif ($item->role === 'SISWA')
                                                    <span class="badge badge-siswa">
                                                        Siswa
                                                    </span>
                                                @else
                                                    <span class="badge badge-siswa">
                                                        {{ $item->role }}
                                                    </span>
                                                @endif
                                            </td>

                                            <td>

                                                <div class="action-btns">

                                                    <a href="{{ route('akun.edit', $item->id_users) }}"
                                                        class="btn-edit">
                                                        Edit
                                                    </a>

                                                    <form action="{{ route('akun.store') }}" method="POST"
                                                        onsubmit="return confirm('Yakin ingin menghapus akun ini?')">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn-delete">
                                                            Hapus
                                                        </button>
                                                    </form>

                                                </div>

                                            </td>

                                        </tr>

                                    @empty

                                        <tr>
                                            <td colspan="4" style="text-align: center; padding: 30px;">
                                                Belum ada akun pengguna.
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </section>
        </main>

    </div>

    <!-- ================= POP-UP MODAL TAMBAH AKUN ================= -->
    <div class="modal-overlay" id="addAccountModal">
        <div class="modal-card">

            <div class="modal-header">
                <h2 class="modal-title">Tambah Akun Baru</h2>
                <button type="button" class="btn-close"
                    onclick="document.getElementById('addAccountModal').classList.remove('active')">
                    ✕
                </button>
            </div>

            <!-- FORM TAMBAH AKUN -->
            <form action="#" method="POST">
                @csrf

                <div class="form-group">
                    <label for="new_email">Email *</label>

                    <input type="email" id="new_email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="new_email">Email *</label>

                    <input type="email" id="new_email" name="email" placeholder="contoh@email.com" required>
                </div>

                <div class="form-group">
                    <label for="new_role">Hak Akses / Peran *</label>
                    <select id="new_role" name="role" class="form-control" required>
                        <option value="" disabled selected>-- Pilih Peran --</option>
                        <option value="ADMIN">Admin</option>
                        <option value="BENDAHARA">Bendahara</option>
                        <option value="WALI_KELAS">Wali Kelas</option>
                        <option value="SISWA">Siswa</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="new_password">Password *</label>
                    <input type="password" id="new_password" name="password" class="form-control"
                        placeholder="Minimal 8 karakter" required>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal()">Batal</button>
                    <button type="submit" class="btn-submit">Simpan Akun</button>
                </div>

            </form>
        </div>
    </div>

    <!-- ================= MASCOT POJOK BAWAH ================= -->
    <div class="mascot-container">
        <div class="mascot-bubble" id="mascotText">
            Coba klik tombol <b>+ Tambah Akun</b> deh! 🤩<br>
            <span>Nanti bakal keluar form Pop-up yang keren banget loh!</span>
        </div>
        <div class="mascot-body">
            <div class="mascot-face">^ᴗ^</div>
        </div>
    </div>



</body>

</html>
