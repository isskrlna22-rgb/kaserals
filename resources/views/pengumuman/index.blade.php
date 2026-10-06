<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman - KASERALS</title>

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
        textarea,
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

        /* ================= SIDEBAR ================= */
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
            transition: 0.3s ease;
        }

        .logout-btn:hover {
            background: #ef4444;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(239, 68, 68, 0.3);
        }

        /* ================= MAIN & TOPBAR ================= */
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

        /* ================= LAYOUT SPLIT ================= */
        .columns {
            display: grid;
            grid-template-columns: 1fr 1.3fr;
            gap: 30px;
            align-items: start;
        }

        @media (max-width: 1024px) {
            .columns {
                grid-template-columns: 1fr;
            }
        }

        /* KARTU */
        .card {
            padding: 30px;
            border: none;
            border-radius: 24px;
            background: white;
            box-shadow: 0 10px 40px -10px rgba(15, 23, 42, .08);
            transition: 0.3s ease;
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
            padding: 14px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 16px;
            background: #f8fafc;
            font-size: 15px;
            outline: none;
            transition: 0.3s ease;
        }

        textarea.form-control {
            min-height: 140px;
            resize: vertical;
            line-height: 1.5;
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
            background: #0d9488;
            color: white;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(13, 148, 136, 0.3);
            transition: 0.3s ease;
            margin-top: 10px;
        }

        .btn-save:hover {
            background: #0f766e;
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(13, 148, 136, 0.4);
        }

        /* DAFTAR PENGUMUMAN (KANAN) */
        .announcement-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .announcement-item {
            padding: 22px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.04);
            transition: 0.25s ease;
            position: relative;
        }

        .announcement-item:hover {
            transform: translateY(-3px);
            border-color: #99f6e4;
            box-shadow: 0 10px 25px rgba(13, 148, 136, 0.12);
        }

        .announce-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 12px;
        }

        .announce-title {
            font-size: 18px;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.3;
            padding-right: 15px;
        }

        .announce-date {
            font-size: 11px;
            font-weight: 800;
            color: #0d9488;
            background: #ccfbf1;
            padding: 5px 12px;
            border-radius: 10px;
            white-space: nowrap;
        }

        .announce-body {
            font-size: 14px;
            color: #475569;
            line-height: 1.6;
            margin-bottom: 16px;
        }

        .announce-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 14px;
            border-top: 1px dashed #e2e8f0;
            font-size: 12px;
            color: #94a3b8;
            font-weight: 600;
        }

        .author-badge {
            color: #0f172a;
            font-weight: 800;
        }

        .edit-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 8px;
            background: #ccfbf1;
            color: #0f766e;
            font-weight: bold;
            font-size: 11px;
            cursor: pointer;
            transition: 0.3s;
        }

        .edit-btn:hover {
            background: #0d9488;
            color: white;
        }

        /* ALERT SUCCESS */
        .alert-success {
            background: #f0fdfa;
            border: 1px solid #99f6e4;
            color: #0f766e;
            padding: 16px 20px;
            border-radius: 16px;
            margin-bottom: 24px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* ================= MASCOT ================= */
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
    </style>
</head>

<body>

    <div class="page">
        <!-- SIDEBAR -->
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
                <a href="{{ route('pembayaran-kas.index') }}" class="nav-link">
                    <span>✓</span> Pembayaran Kas
                </a>
                <a href="{{ route('verifikasi-pembayaran.index') }}" class="nav-link">
                    <span>●</span> Verifikasi Pembayaran
                </a>
                <a href="{{ route('pengeluaran.web.index') }}" class="nav-link">
                    <span>↑</span> Pengeluaran
                </a>

                <p class="section-title">CATATAN & LAPORAN</p>
                <a href="{{ route('riwayat.index') }}" class="nav-link">
                    <span>↻</span> Riwayat Transaksi
                </a>
                <!-- MENU PENGUMUMAN ACTIVE -->
                <a href="{{ route('pengumuman.index') }}" class="nav-link active">
                    <span>▣</span> Pengumuman
                </a>
                <a href="{{ route('laporan.index') }}" class="nav-link">
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
                <h2>Pengumuman Kelas</h2>
                <div class="avatar">
                    {{ strtoupper(substr(Auth::user()->name ?? 'BE', 0, 2)) }}
                </div>
            </header>

            <section class="content">
                <div class="title">
                    <h1>Papan Informasi 📢</h1>
                    <p>Sampaikan informasi penting terkait kas kelas, iuran acara, atau tunggakan di sini.</p>
                </div>

                @if (session('success'))
                    <div class="alert-success">
                        <span style="font-size:18px;">✨</span> {{ session('success') }}
                    </div>
                @endif

                <!-- KOLOM: KIRI FORM, KANAN DAFTAR PENGUMUMAN -->
                <div class="columns">

                    <!-- KOLOM KIRI: FORM PENGUMUMAN -->
                    <div class="card">
                        <h2>Buat Pengumuman</h2>
                        <form action="{{ route('pengumuman.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="judul">Judul Pengumuman *</label>
                                <input type="text" id="judul" name="judul" class="form-control"
                                    placeholder="Contoh: Tagihan Kas Bulan Oktober" required
                                    value="{{ old('judul') }}">
                            </div>

                            <div class="form-group">
                                <label for="isi">Isi Pesan / Keterangan *</label>
                                <textarea id="isi" name="isi" class="form-control"
                                    placeholder="Tuliskan pesan atau rincian kegiatan dengan jelas..." required>{{ old('isi') }}</textarea>
                            </div>

                            <button type="submit" class="btn-save">Terbitkan Pengumuman</button>
                        </form>
                    </div>

                    <!-- KOLOM KANAN: DAFTAR PENGUMUMAN -->
                    <div class="card">
                        <h2 style="margin-bottom: 20px;">Daftar Pengumuman</h2>

                        <div class="announcement-list">
                            @forelse($pengumuman ?? [] as $item)
                                <div class="announcement-item">
                                    <div class="announce-header">
                                        <div class="announce-title">{{ $item->judul }}</div>
                                        <div class="announce-date">
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                        </div>
                                    </div>

                                    <div class="announce-body">
                                        {{ $item->isi }}
                                    </div>

                                    <div class="announce-footer">

                                        <div>
                                            Oleh:
                                            <span class="author-badge">
                                                {{ $item->user->name ?? 'Bendahara' }}
                                            </span>
                                        </div>

                                        <div style="display: flex; gap: 8px;">

                                            <!-- TOMBOL UBAH -->
                                            <button type="button" class="edit-btn"
                                                onclick="openEditModal(
                {{ $item->id_pengumuman }},
                @js($item->judul),
                @js($item->isi)
            )">
                                                Ubah
                                            </button>

                                            <!-- TOMBOL HAPUS -->
                                            @if (Route::has('pengumuman.destroy'))
                                                <form action="{{ route('pengumuman.destroy', $item->id_pengumuman) }}"
                                                    method="POST" onsubmit="return confirm('Hapus pengumuman ini?')"
                                                    style="margin: 0;">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="delete-btn">
                                                        Hapus
                                                    </button>
                                                </form>
                                            @endif

                                        </div>

                                    </div>
                                </div>
                            @empty
                                <div style="text-align:center; padding:40px 20px; color:#94a3b8;">
                                    <div style="font-size:40px; margin-bottom:10px;">📭</div>
                                    <div style="font-weight:800; color:#64748b;">Belum ada pengumuman.</div>
                                    <div style="font-size:13px; margin-top:5px;">Informasi yang diterbitkan akan muncul
                                        di sini.</div>
                                </div>
                            @endforelse
                        </div>
                    </div>

                </div>
            </section>
        </main>
    </div>

    <!-- ================= MASCOT KASI ================= -->
    <div class="mascot-container">
        <div class="mascot-bubble">
            Ada info penting apa nih, Kak? 👀<br>
            <span>Tulis yang jelas ya biar teman-teman sekelas pada ngerti! 📢</span>
        </div>
        <div class="mascot-body">
            <div class="mascot-face">^ᴗ^</div>
        </div>
    </div>
    <!-- ================= MODAL EDIT PENGUMUMAN ================= -->

    <div id="editPengumumanModal" class="edit-modal">

        <div class="edit-modal-content">

            <div class="edit-modal-header">
                <h2>Ubah Pengumuman</h2>

                <button type="button" class="modal-close" onclick="closeEditModal()">
                    &times;
                </button>
            </div>

            <form id="editPengumumanForm" method="POST">

                @csrf
                @method('PUT')

                <div class="form-group">

                    <label for="editJudul">
                        Judul Pengumuman
                    </label>

                    <input type="text" id="editJudul" name="judul" class="form-control" required>

                </div>

                <div class="form-group">

                    <label for="editIsi">
                        Isi Pengumuman
                    </label>

                    <textarea id="editIsi" name="isi" class="form-control" required></textarea>

                </div>

                <div class="modal-actions">

                    <button type="button" class="btn-cancel" onclick="closeEditModal()">
                        Batal
                    </button>

                    <button type="submit" class="btn-save">
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
            background: rgba(15, 23, 42, 0.5);
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .edit-modal.show {
            display: flex;
        }

        .edit-modal-content {
            width: 100%;
            max-width: 550px;
            background: white;
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        }

        .edit-modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .edit-modal-header h2 {
            margin: 0;
            font-size: 22px;
            color: #1e293b;
        }

        .modal-close {
            border: none;
            background: transparent;
            font-size: 28px;
            color: #64748b;
            cursor: pointer;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        .btn-cancel {
            padding: 12px 20px;
            border: none;
            border-radius: 12px;
            background: #e2e8f0;
            color: #475569;
            font-weight: 700;
            cursor: pointer;
        }
    </style>


    <script>
        function openEditModal(id, judul, isi) {

            const modal = document.getElementById('editPengumumanModal');

            const form = document.getElementById('editPengumumanForm');

            document.getElementById('editJudul').value = judul;

            document.getElementById('editIsi').value = isi;

            form.action = "{{ url('/pengumuman') }}/" + id;

            modal.classList.add('show');
        }


        function closeEditModal() {

            document
                .getElementById('editPengumumanModal')
                .classList.remove('show');

        }


        document
            .getElementById('editPengumumanModal')
            .addEventListener('click', function(event) {

                if (event.target === this) {
                    closeEditModal();
                }

            });
    </script>
</body>

</html>
