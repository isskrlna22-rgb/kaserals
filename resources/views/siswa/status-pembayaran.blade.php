<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Status Bayar Pribadi - KASERALS</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background: #0b1320;
            color: #0f172a;
            min-height: 100vh;
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
            border-right: 1px solid rgba(255, 255, 255, 0.05);
        }

        .brand {
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
        }

        .brand-name {
            font-size: 18px;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .brand-subtitle {
            font-size: 11px;
            color: #94a3b8;
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
            transition: 0.2s ease;
        }

        .menu-item:hover {
            color: white;
            background: rgba(255, 255, 255, 0.06);
            transform: translateX(3px);
        }

        .menu-item.active {
            background: linear-gradient(135deg, #0d9488, #0f766e);
            color: white;
            box-shadow: 0 8px 20px rgba(13, 148, 136, 0.35);
        }

        .menu-icon {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        /* ================= MAIN ================= */

        .main {
            margin-left: 250px;
            min-height: 100vh;
        }

        .page-header {
            padding: 40px 40px 24px;
            color: white;
        }

        .page-title {
            font-size: 25px;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .page-subtitle {
            font-size: 14px;
            color: #94a3b8;
        }

        .content-wrapper {
            background: white;
            border-radius: 32px 32px 0 0;
            min-height: calc(100vh - 130px);
            padding: 32px 40px 50px;
        }

        /* ================= PROFILE ================= */

        .student-card {
            display: flex;
            align-items: center;
            gap: 18px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 20px 24px;
            margin-bottom: 20px;
        }

        .student-avatar {
            width: 55px;
            height: 55px;
            border-radius: 16px;
            background: linear-gradient(135deg, #14b8a6, #0d9488);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: 800;
        }

        .student-info h2 {
            font-size: 17px;
            font-weight: 800;
            margin-bottom: 4px;
        }

        .student-info p {
            font-size: 13px;
            color: #64748b;
        }

        /* ================= SUMMARY ================= */

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 20px;
        }

        .summary-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 22px;
            box-shadow: 0 4px 10px rgba(15, 23, 42, 0.03);
        }

        .summary-label {
            font-size: 12px;
            font-weight: 700;
            color: #64748b;
            margin-bottom: 10px;
        }

        .summary-value {
            font-size: 23px;
            font-weight: 800;
            color: #0f172a;
        }

        /* ================= STATUS ================= */

        .status-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 28px;
            margin-bottom: 20px;
            text-align: center;
        }

        .status-title {
            font-size: 14px;
            color: #64748b;
            font-weight: 700;
            margin-bottom: 14px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 22px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 800;
        }

        .status-sudah {
            background: #ecfdf5;
            color: #059669;
        }

        .status-belum {
            background: #fffbeb;
            color: #d97706;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: currentColor;
        }

        /* ================= RIWAYAT ================= */

        .history-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 24px;
        }

        .card-title {
            font-size: 17px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th {
            text-align: left;
            padding: 13px 12px;
            background: #f8fafc;
            color: #64748b;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 15px 12px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 13px;
            color: #334155;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 800;
        }

        .badge-diterima {
            background: #ecfdf5;
            color: #059669;
        }

        .badge-menunggu {
            background: #fffbeb;
            color: #d97706;
        }

        .badge-ditolak {
            background: #fef2f2;
            color: #dc2626;
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #94a3b8;
        }

        .empty-icon {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .empty-state p {
            font-size: 13px;
        }

        /* ================= MOBILE ================= */

        .bottom-nav {
            display: none;
        }

        @media (max-width: 768px) {

            .sidebar {
                display: none;
            }

            .main {
                margin-left: 0;
            }

            .page-header {
                padding: 30px 22px 22px;
            }

            .content-wrapper {
                padding: 24px 18px 100px;
                border-radius: 24px 24px 0 0;
            }

            .summary-grid {
                grid-template-columns: 1fr;
            }

            .student-card {
                padding: 18px;
            }

            .bottom-nav {
                position: fixed;
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                bottom: 0;
                left: 0;
                right: 0;
                background: white;
                border-top: 1px solid #e2e8f0;
                padding: 10px 15px 15px;
                z-index: 100;
            }

            .nav-item {
                text-decoration: none;
                text-align: center;
                color: #94a3b8;
                font-size: 12px;
                font-weight: 700;
                padding: 8px;
            }

            .nav-item.active {
                color: #0d9488;
            }
        }
    </style>
</head>

<body>

    {{-- ================= SIDEBAR ================= --}}

    <aside class="sidebar">

        <div class="brand">
            <div class="logo">K</div>

            <div>
                <div class="brand-name">KASERALS</div>
                <div class="brand-subtitle">Kas Kelas Digital</div>
            </div>
        </div>

        <div class="menu-section">

            <div class="menu-title">
                MENU
            </div>

            <a href="{{ route('dashboard.siswa') }}" class="menu-item">
                <span class="menu-icon">⌂</span>
                Dashboard
            </a>

        </div>

        <div class="menu-section">

            <div class="menu-title">
                TRANSAKSI
            </div>

            <a href="{{ route('dashboard.siswa.status') }}" class="menu-item active">
                <span class="menu-icon">✓</span>
                Status Bayar Pribadi
            </a>

        </div>

        <div class="menu-section">

            <div class="menu-title">
                CATATAN
            </div>

            <a href="#" class="menu-item">
                <span class="menu-icon">◷</span>
                Riwayat Transaksi
            </a>

            <a href="#" class="menu-item">
                <span class="menu-icon">ⓘ</span>
                Info Kas
            </a>

        </div>

    </aside>


    {{-- ================= MAIN ================= --}}

    <main class="main">

        <div class="page-header">

            <h1 class="page-title">
                Status Bayar Pribadi
            </h1>

            <p class="page-subtitle">
                Informasi pembayaran kas pribadi kamu
            </p>

        </div>


        <div class="content-wrapper">


            {{-- ================= DATA SISWA ================= --}}

            <div class="student-card">

                <div class="student-avatar">
                    {{ strtoupper(substr($siswa->nama_lengkap, 0, 1)) }}
                </div>

                <div class="student-info">

                    <h2>
                        {{ $siswa->nama_lengkap }}
                    </h2>

                    <p>
                        NISN: {{ $siswa->nisn ?? '-' }}
                        &nbsp; • &nbsp;
                        Kelas: {{ $siswa->kelas ?? '-' }}
                    </p>

                </div>

            </div>


            {{-- ================= RINGKASAN ================= --}}

            <div class="summary-grid">

                <div class="summary-card">

                    <div class="summary-label">
                        TOTAL PEMBAYARAN
                    </div>

                    <div class="summary-value">
                        Rp {{ number_format($totalPembayaranSiswa, 0, ',', '.') }}
                    </div>

                </div>


                <div class="summary-card">

                    <div class="summary-label">
                        JUMLAH TRANSAKSI
                    </div>

                    <div class="summary-value">
                        {{ $jumlahPembayaran }} transaksi
                    </div>

                </div>


                <div class="summary-card">

                    <div class="summary-label">
                        STATUS PEMBAYARAN
                    </div>

                    <div class="summary-value">

                        @if($statusPembayaran === 'SUDAH BAYAR')

                            <span class="status-badge status-sudah">
                                <span class="status-dot"></span>
                                SUDAH BAYAR
                            </span>

                        @else

                            <span class="status-badge status-belum">
                                <span class="status-dot"></span>
                                BELUM BAYAR
                            </span>

                        @endif

                    </div>

                </div>

            </div>


            {{-- ================= STATUS ================= --}}

            <div class="status-card">

                <div class="status-title">
                    STATUS PEMBAYARAN KAS
                </div>

                @if($statusPembayaran === 'SUDAH BAYAR')

                    <div class="status-badge status-sudah">
                        <span class="status-dot"></span>
                        SUDAH BAYAR
                    </div>

                @else

                    <div class="status-badge status-belum">
                        <span class="status-dot"></span>
                        BELUM BAYAR
                    </div>

                @endif

            </div>


            {{-- ================= RIWAYAT ================= --}}

            <div class="history-card">

                <h3 class="card-title">
                    Riwayat Pembayaran
                </h3>


                @if($pembayaran->count() > 0)

                    <div class="table-wrapper">

                        <table>

                            <thead>

                                <tr>
                                    <th>Tanggal</th>
                                    <th>Minggu Ke</th>
                                    <th>Nominal</th>
                                    <th>Metode</th>
                                    <th>Status</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach($pembayaran as $item)

                                    <tr>

                                        <td>
                                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}
                                        </td>

                                        <td>
                                            Minggu {{ $item->minggu_ke ?? '-' }}
                                        </td>

                                        <td>
                                            <strong>
                                                Rp {{ number_format($item->nominal, 0, ',', '.') }}
                                            </strong>
                                        </td>

                                        <td>
                                            {{ $item->metode_pembayaran ?? '-' }}
                                        </td>

                                        <td>

                                            @if($item->status === 'Diterima')

                                                <span class="badge badge-diterima">
                                                    Diterima
                                                </span>

                                            @elseif($item->status === 'Menunggu')

                                                <span class="badge badge-menunggu">
                                                    Menunggu
                                                </span>

                                            @elseif($item->status === 'Ditolak')

                                                <span class="badge badge-ditolak">
                                                    Ditolak
                                                </span>

                                            @else

                                                <span class="badge badge-menunggu">
                                                    {{ $item->status ?? '-' }}
                                                </span>

                                            @endif

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <div class="empty-state">

                        <div class="empty-icon">
                            💸
                        </div>

                        <p>
                            Belum ada data pembayaran kas.
                        </p>

                    </div>

                @endif

            </div>

        </div>

    </main>


    {{-- ================= MOBILE NAV ================= --}}

    <nav class="bottom-nav">

        <a href="{{ route('dashboard.siswa') }}" class="nav-item">
            🏠
            <br>
            Beranda
        </a>

        <a href="{{ route('dashboard.siswa.status') }}" class="nav-item active">
            👤
            <br>
            Status Bayar
        </a>

    </nav>

</body>

</html>
