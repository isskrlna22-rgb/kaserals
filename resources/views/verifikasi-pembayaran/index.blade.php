<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Pembayaran - KASERALS</title>

    <!-- Font Nunito agar membulat & gemes -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">

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

        /* ================= CARDS & TABLE ================= */
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

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        th {
            text-align: left;
            padding: 16px;
            border-bottom: 2px dashed #cbd5e1;
            color: #64748b;
            font-size: 13px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        td {
            padding: 20px 16px;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
            transition: 0.2s;
        }

        tr:hover td {
            background: #f8fafc;
        }

        /* Hover baris gemes */

        .student-info {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .student-avatar {
            width: 48px;
            height: 48px;
            border-radius: 16px;
            background: linear-gradient(135deg, #ccfbf1, #99f6e4);
            color: #0d9488;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 16px;
        }

        .student-name {
            font-size: 16px;
            font-weight: 800;
            color: #0f172a;
        }

        .student-date {
            font-size: 13px;
            color: #64748b;
            margin-top: 4px;
            font-weight: 600;
        }

        .nominal-text {
            font-size: 18px;
            font-weight: 900;
            color: #0d9488;
        }

        .badge {
            padding: 8px 14px;
            border-radius: 14px;
            font-size: 13px;
            font-weight: 800;
            display: inline-block;
        }

        .badge-tunai {
            background: #e0f2fe;
            color: #0369a1;
        }

        .badge-transfer {
            background: #f3e8ff;
            color: #7e22ce;
        }

        .btn-lihat {
            padding: 10px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 14px;
            background: white;
            color: #475569;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-lihat:hover {
            border-color: #0d9488;
            color: #0d9488;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(13, 148, 136, 0.1);
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn-action {
            padding: 10px 18px;
            border: none;
            border-radius: 14px;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-terima {
            background: #10b981;
            color: white;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }

        .btn-terima:hover {
            background: #059669;
            transform: translateY(-3px) scale(1.05);
        }

        .btn-tolak {
            background: #ef4444;
            color: white;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
        }

        .btn-tolak:hover {
            background: #dc2626;
            transform: translateY(-3px) scale(1.05);
        }

        /* ================= EFEK MASCOT KASI ================= */
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

        /* ================= MODAL EFEK GEMES ================= */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.5);
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
            position: relative;
        }

        .modal-overlay.active .modal-box {
            transform: translateY(0) scale(1);
        }

        /* Modal Image Preview */
        .modal-box.image-modal {
            max-width: 500px;
            padding: 30px;
        }

        .modal-img-preview {
            width: 100%;
            border-radius: 16px;
            max-height: 60vh;
            object-fit: contain;
            background: #f1f5f9;
        }

        .modal-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            font-weight: bold;
            margin: 0 auto 20px;
        }

        .icon-terima {
            background: #dcfce7;
            color: #10b981;
            animation: pulse-terima 2s infinite;
        }

        .icon-tolak {
            background: #fee2e2;
            color: #ef4444;
            animation: pulse-tolak 2s infinite;
        }

        @keyframes pulse-terima {
            0% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.4);
            }

            70% {
                box-shadow: 0 0 0 15px rgba(16, 185, 129, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
            }
        }

        @keyframes pulse-tolak {
            0% {
                box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.4);
            }

            70% {
                box-shadow: 0 0 0 15px rgba(239, 68, 68, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(239, 68, 68, 0);
            }
        }

        .modal-title {
            font-size: 24px;
            font-weight: 900;
            margin-bottom: 12px;
            color: #0f172a;
        }

        .modal-text {
            color: #64748b;
            margin-bottom: 30px;
            font-size: 15px;
            font-weight: 600;
            line-height: 1.6;
        }

        .modal-buttons {
            display: flex;
            gap: 12px;
        }

        .modal-btn {
            flex: 1;
            padding: 14px;
            border-radius: 16px;
            font-size: 15px;
            font-weight: 800;
            cursor: pointer;
            border: none;
            transition: 0.3s;
        }

        .btn-cancel {
            background: #f1f5f9;
            color: #475569;
        }

        .btn-cancel:hover {
            background: #e2e8f0;
            transform: translateY(-2px);
        }

        .btn-close-modal {
            position: absolute;
            top: 16px;
            right: 16px;
            width: 36px;
            height: 36px;
            background: #f1f5f9;
            border: none;
            border-radius: 50%;
            font-size: 16px;
            cursor: pointer;
            color: #64748b;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-close-modal:hover {
            background: #e2e8f0;
            color: #0f172a;
            transform: scale(1.1);
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
                <a href="{{ route('pembayaran-kas.index') }}"
                    class="nav-link {{ request()->routeIs('pembayaran-kas.*') ? 'active' : '' }}">
                    <span>✓</span> Pembayaran Kas
                </a>

                <!-- MENU VERIFIKASI PEMBAYARAN ACTIVE -->
                <a href="{{ route('verifikasi-pembayaran.index') }}" class="nav-link active">
                    <span>●</span> Verifikasi Pembayaran
                </a>

                <a href="{{ route('detail-pembayaran.index') }}"
                    class="nav-link {{ request()->routeIs('detail-pembayaran.*') ? 'active' : '' }}">
                    <span>📄</span> Detail Pembayaran
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

        <!-- MAIN CONTENT -->
        <main class="main">
            <header class="topbar">
                <h2>Verifikasi Pembayaran</h2>
                <div class="avatar">
                    {{ strtoupper(substr(Auth::user()->name ?? 'BE', 0, 2)) }}
                </div>
            </header>

            <section class="content">
                <div class="title">
                    <h1>Menunggu Verifikasi 🔍</h1>
                    <p>Cek bukti transfer dan pastikan nominalnya sesuai sebelum disetujui ya!</p>
                </div>

                <!-- TABEL TRANSAKSI -->
                <div class="card">
                    <div style="overflow-x: auto;">
                        <table>
                            <thead>
                                <tr>
                                    <th>Data Siswa</th>
                                    <th>Total Bayar</th>
                                    <th>Metode</th>
                                    <th>Bukti Transfer</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $adaPembayaranMenunggu = false;
                                @endphp

                                @foreach ($siswa as $item)

                                    @php
                                        $pembayaranMenunggu = $item->pembayaranKas
                                            ->where('status', 'Menunggu')
                                            ->sortByDesc('tanggal');

                                        $pembayaranTerbaru = $pembayaranMenunggu->first();
                                    @endphp

                                    @if ($pembayaranTerbaru)
                                        @php
                                            $adaPembayaranMenunggu = true;
                                        @endphp

                                        <tr>

                                            {{-- DATA SISWA --}}
                                            <td>
                                                <div class="student-info">

                                                    <div class="student-avatar">
                                                        {{ strtoupper(substr($item->nama_lengkap, 0, 2)) }}
                                                    </div>

                                                    <div>
                                                        <div class="student-name">
                                                            {{ $item->nama_lengkap }}
                                                        </div>

                                                        <div class="student-date">
                                                            {{ \Carbon\Carbon::parse($pembayaranTerbaru->tanggal)->translatedFormat('d F Y') }}
                                                        </div>
                                                    </div>

                                                </div>
                                            </td>


                                            {{-- NOMINAL --}}
                                            <td>
                                                <div class="nominal-text">
                                                    Rp {{ number_format($pembayaranTerbaru->nominal, 0, ',', '.') }}
                                                </div>
                                            </td>


                                            {{-- METODE --}}
                                            <td>

                                                @if ($pembayaranTerbaru->metode_pembayaran === 'Transfer')
                                                    <span class="badge badge-transfer">
                                                        Transfer
                                                    </span>
                                                @else
                                                    <span class="badge badge-tunai">
                                                        Tunai
                                                    </span>
                                                @endif

                                            </td>


                                            {{-- BUKTI TRANSFER --}}
                                            <td>

                                                @if ($pembayaranTerbaru->bukti_transfer)
                                                    @php
                                                        $buktiUrl = asset(
                                                            'storage/' . $pembayaranTerbaru->bukti_transfer,
                                                        );

                                                        $extension = strtolower(
                                                            pathinfo(
                                                                $pembayaranTerbaru->bukti_transfer,
                                                                PATHINFO_EXTENSION,
                                                            ),
                                                        );
                                                    @endphp

                                                    @if (in_array($extension, ['jpg', 'jpeg', 'png']))
                                                        <button type="button" class="btn-lihat"
                                                            onclick='openImageModal(@json($buktiUrl))'>
                                                            👁️ Lihat Bukti
                                                        </button>
                                                    @else
                                                        <a href="{{ $buktiUrl }}" target="_blank" class="btn-lihat"
                                                            style="display:inline-block;">
                                                            📄 Lihat Bukti
                                                        </a>
                                                    @endif
                                                @else
                                                    <span
                                                        style="
                            font-size:13px;
                            color:#94a3b8;
                            font-weight:bold;
                        ">
                                                        - Tidak Ada
                                                    </span>
                                                @endif

                                            </td>


                                            {{-- AKSI --}}
                                            <td>

                                                <div class="action-buttons">

                                                    <button type="button" class="btn-action btn-terima"
                                                        onclick="openConfirmModal(
                                'terima',
                                {{ $pembayaranTerbaru->id_pembayaran }},
                                @js($item->nama_lengkap)
                            )">
                                                        Terima
                                                    </button>

                                                    <button type="button" class="btn-action btn-tolak"
                                                        onclick="openConfirmModal(
                                'tolak',
                                {{ $pembayaranTerbaru->id_pembayaran }},
                                @js($item->nama_lengkap)
                            )">
                                                        Tolak
                                                    </button>

                                                </div>

                                            </td>

                                        </tr>
                                    @endif

                                @endforeach


                                {{-- KALAU TIDAK ADA PEMBAYARAN MENUNGGU --}}
                                @if (!$adaPembayaranMenunggu)
                                    <tr>

                                        <td colspan="5"
                                            style="
                    text-align:center;
                    padding:40px;
                    color:#94a3b8;
                    font-weight:700;
                ">

                                            <div
                                                style="
                    font-size:35px;
                    margin-bottom:10px;
                ">
                                                ✅
                                            </div>

                                            Tidak ada pembayaran yang menunggu verifikasi.

                                        </td>

                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- ================= EFEK MASCOT KASI ================= -->
    <div class="mascot-container">
        <div class="mascot-bubble">
            Ada yang setor kas nih Kak! 🔔<br>
            <span>Cek struknya pelan-pelan yaa biar nggak salah rekap~ ✨</span>
        </div>
        <div class="mascot-body">
            <div class="mascot-face">^ᴗ^</div>
        </div>
    </div>

    <!-- ================= MODAL LIHAT BUKTI GAMBAR ================= -->
    <div class="modal-overlay" id="imageModal">
        <div class="modal-box image-modal">
            <button class="btn-close-modal" onclick="closeModals()">✕</button>
            <h3 class="modal-title" style="font-size: 20px; margin-bottom: 16px;">Bukti Pembayaran</h3>
            <img id="previewImage" src="" alt="Bukti Transfer" class="modal-img-preview">
        </div>
    </div>

    <!-- ================= MODAL KONFIRMASI TERIMA/TOLAK ================= -->
    <div class="modal-overlay" id="confirmModal">
        <div class="modal-box">
            <div class="modal-icon" id="confirmIcon">✓</div>
            <h3 class="modal-title" id="confirmTitle">Konfirmasi</h3>
            <p class="modal-text" id="confirmText">Apakah Anda yakin?</p>

            <form id="verifyForm" method="POST" action="">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" id="inputStatus">

                <div class="modal-buttons">
                    <button type="button" class="modal-btn btn-cancel" onclick="closeModals()">Batal</button>
                    <button type="submit" class="modal-btn" id="confirmSubmitBtn">Ya, Lanjutkan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ================= SCRIPT LOGIKA EFEK POP UP ================= -->
    <script>
        const imageModal = document.getElementById('imageModal');
        const confirmModal = document.getElementById('confirmModal');

        // Tutup Semua Modal
        function closeModals() {
            imageModal.classList.remove('active');
            confirmModal.classList.remove('active');
        }

        // Modal Gambar
        function openImageModal(imageUrl) {
            document.getElementById('previewImage').src = imageUrl;
            imageModal.classList.add('active');
        }

        // Modal Konfirmasi Dinamis (Ganti warna & teks)
        function openConfirmModal(action, paymentId, studentName) {
            const form = document.getElementById('verifyForm');
            const icon = document.getElementById('confirmIcon');
            const title = document.getElementById('confirmTitle');
            const text = document.getElementById('confirmText');
            const submitBtn = document.getElementById('confirmSubmitBtn');
            const inputStatus = document.getElementById('inputStatus');

            // Ganti URL Action form sesuai ID (Sesuaikan dengan route Laravel kamu)
            form.action = `/verifikasi-pembayaran/${paymentId}`;

            if (action === 'terima') {
                icon.className = 'modal-icon icon-terima';
                icon.innerText = '✓';
                title.innerText = 'Terima Pembayaran?';
                text.innerHTML =
                    `Kamu akan memverifikasi setoran dari <b>${studentName}</b>. Saldo kas akan otomatis bertambah! ✨`;

                submitBtn.style.background = '#10b981';
                submitBtn.style.color = 'white';
                submitBtn.style.boxShadow = '0 4px 15px rgba(16, 185, 129, 0.4)';
                submitBtn.innerText = 'Ya, Terima!';
                inputStatus.value = 'Diterima';
            } else if (action === 'tolak') {
                icon.className = 'modal-icon icon-tolak';
                icon.innerText = '✕';
                title.innerText = 'Tolak Pembayaran?';
                text.innerHTML =
                    `Setoran dari <b>${studentName}</b> akan ditolak. Pastikan kamu ngasih tau alasannya ke siswa ya! 🚨`;

                submitBtn.style.background = '#ef4444';
                submitBtn.style.color = 'white';
                submitBtn.style.boxShadow = '0 4px 15px rgba(239, 68, 68, 0.4)';
                submitBtn.innerText = 'Ya, Tolak!';
                inputStatus.value = 'Ditolak';
            }

            // Tampilkan Modal Mantul
            confirmModal.classList.add('active');
        }

        // Klik di luar box untuk tutup modal
        window.onclick = function(event) {
            if (event.target == imageModal || event.target == confirmModal) {
                closeModals();
            }
        }
    </script>

</body>

</html>
