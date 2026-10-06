<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan - KASERALS</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Nunito', Arial, Helvetica, sans-serif;
            background: #f8fafc;
            color: #0f172a;
            overflow-x: hidden;
        }

        button, input, select { font-family: inherit; }
        a { text-decoration: none; }

        .page { display: flex; min-height: 100vh; }

        /* ================= SIDEBAR (SERAGAM DENGAN HALAMAN LAIN) ================= */
        .sidebar {
            width: 260px; flex-shrink: 0; min-height: 100vh;
            background: #0f172a; color: white;
            display: flex; flex-direction: column;
            position: fixed; left: 0; top: 0; bottom: 0; z-index: 100;
        }

        .logo { display: flex; align-items: center; gap: 16px; padding: 28px; }
        .logo-box {
            width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;
            border-radius: 18px; background: #0d9488; font-size: 24px; font-weight: bold;
            box-shadow: 0 4px 15px rgba(13, 148, 136, 0.4); animation: pulse-gemes 2s infinite;
        }
        .logo h1 { font-size: 22px; letter-spacing: 1px; }
        .logo p { margin-top: 4px; font-size: 13px; color: #94a3b8; }

        .navigation { flex: 1; padding: 0 16px; overflow-y: auto; scrollbar-width: none; }
        .navigation::-webkit-scrollbar { display: none; }

        .nav-link {
            position: relative; display: flex; align-items: center; gap: 16px; margin-bottom: 6px;
            padding: 14px 20px; border-radius: 18px; color: #cbd5e1; font-size: 15px; font-weight: 500;
            transition: all 0.3s ease; overflow: hidden;
        }
        .nav-link::before {
            content: ''; position: absolute; left: 0; top: 50%; width: 5px; height: 0;
            border-radius: 0 8px 8px 0; background: #5eead4; transform: translateY(-50%); transition: height 0.3s ease;
        }
        .nav-link.active::before { height: 60%; }
        .nav-link:hover { transform: translateX(5px); background: rgba(255, 255, 255, .05); color: white; }
        .nav-link.active { background: #0d9488; color: white; font-weight: bold; box-shadow: 0 4px 12px rgba(13, 148, 136, 0.3); }
        .nav-link span { width: 24px; text-align: center; font-size: 18px; transition: transform 0.3s ease; }
        .nav-link:hover span { transform: scale(1.2) rotate(-5deg); }

        .section-title { margin: 24px 0 10px; padding: 0 20px; color: #64748b; font-size: 11px; font-weight: 800; letter-spacing: .2em; }

        .sidebar-bottom { margin-top: auto; padding: 20px; border-top: 1px solid rgba(255, 255, 255, .08); background: rgba(0, 0, 0, 0.1); }
        .profile-mini { display: flex; align-items: center; gap: 12px; margin-bottom: 16px; }
        .profile-avatar {
            width: 44px; height: 44px; display: flex; align-items: center; justify-content: center;
            border-radius: 50%; background: #1e293b; border: 2px solid #5eead4; color: #5eead4; font-size: 14px; font-weight: 800;
        }
        .profile-info strong { display: block; color: #f8fafc; font-size: 14px; }
        .profile-info span { color: #94a3b8; font-size: 12px; }

        .logout-btn {
            width: 100%; padding: 12px; border: none; border-radius: 14px;
            background: rgba(239, 68, 68, .1); color: #ef4444; font-size: 14px; font-weight: bold; cursor: pointer; transition: 0.3s ease;
        }
        .logout-btn:hover { background: #ef4444; color: white; transform: translateY(-3px); box-shadow: 0 5px 15px rgba(239, 68, 68, 0.3); }

        /* ================= MAIN & TOPBAR ================= */
        .main { width: calc(100% - 260px); margin-left: 260px; min-height: 100vh; display: flex; flex-direction: column; }
        .topbar {
            height: 90px; display: flex; align-items: center; justify-content: space-between;
            padding: 0 40px; background: white; border-bottom: 1px solid #e2e8f0;
        }
        .topbar h2 { font-size: 22px; font-weight: 800; color: #1e293b; }
        .avatar {
            width: 50px; height: 50px; border-radius: 50%; background: #ccfbf1; color: #0d9488;
            display: flex; align-items: center; justify-content: center; font-weight: bold; cursor: pointer; transition: 0.3s;
        }
        .avatar:hover { transform: scale(1.1) rotate(5deg); box-shadow: 0 5px 15px rgba(13, 148, 136, 0.2); }

        .content { flex: 1; padding: 40px; max-width: 1400px; margin: 0 auto; width: 100%; }

        /* ================= HEADING & EXPORT ================= */
        .page-heading { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 30px; }
        .title h1 { font-size: 32px; font-weight: 900; color: #0f172a; margin-bottom: 6px; }
        .title p { color: #64748b; font-size: 16px; }

        .export-wrapper { position: relative; }
        .export-button {
            border: none; background: #0d9488; color: white; padding: 14px 24px; border-radius: 16px;
            font-size: 15px; font-weight: bold; cursor: pointer; transition: 0.3s ease;
            box-shadow: 0 8px 20px rgba(13, 148, 136, 0.25);
        }
        .export-button:hover { background: #0f766e; transform: translateY(-2px); box-shadow: 0 12px 25px rgba(13, 148, 136, 0.35); }

        .export-menu {
            position: absolute; right: 0; top: 60px; width: 250px; background: white;
            border: 1px solid #e2e8f0; border-radius: 16px; padding: 10px;
            box-shadow: 0 15px 35px rgba(15, 23, 42, 0.1); display: none; z-index: 200;
            transform: translateY(10px); opacity: 0; transition: all 0.3s ease;
        }
        .export-menu.show { display: block; transform: translateY(0); opacity: 1; }
        .export-item {
            display: flex; align-items: center; gap: 12px; padding: 14px; border-radius: 12px;
            font-size: 14px; font-weight: 700; cursor: pointer; color: #334155; transition: 0.2s;
        }
        .export-item:hover { background: #f0fdfa; color: #0d9488; }
        .export-icon { font-size: 18px; width: 24px; text-align: center; }

        /* ================= KARTU SUMMARY ================= */
        .summary-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; margin-bottom: 24px; }
        .summary-card {
            background: white; border-radius: 24px; padding: 28px; border: none;
            box-shadow: 0 10px 40px -10px rgba(15, 23, 42, .06); transition: 0.3s ease;
        }
        .summary-card:hover { transform: translateY(-5px); box-shadow: 0 15px 40px -10px rgba(13, 148, 136, .15); }
        .summary-title { color: #64748b; font-weight: 800; font-size: 12px; letter-spacing: 1px; margin-bottom: 12px; text-transform: uppercase; }
        .summary-value { font-size: 28px; font-weight: 900; }
        .green { color: #0d9488; }
        .red { color: #e11d48; }

        .saldo-card {
            background: linear-gradient(135deg, #0d9488, #0f766e); color: white;
            border-radius: 24px; padding: 30px; margin-bottom: 30px;
            box-shadow: 0 15px 30px rgba(13, 148, 136, 0.25);
        }
        .saldo-card .summary-title { color: #ccfbf1; }
        .saldo-card .summary-value { font-size: 36px; }

        /* ================= LOWER GRID (GRAFIK & REKAP) ================= */
        .lower-grid { display: grid; grid-template-columns: 1.6fr 1fr; gap: 24px; margin-bottom: 30px; }
        .panel {
            background: white; border-radius: 24px; padding: 30px;
            box-shadow: 0 10px 40px -10px rgba(15, 23, 42, .06);
        }
        .panel-title { font-size: 22px; font-weight: 800; color: #0f172a; margin-bottom: 6px; }
        .panel-subtitle { color: #64748b; font-size: 14px; margin-bottom: 24px; }

        /* GRAFIK */
        .chart {
            width: 100%; height: 220px; display: flex; align-items: flex-end; justify-content: center;
            gap: 80px; padding: 0 10px; border-bottom: 2px dashed #e2e8f0;
        }
        .chart-column { height: 100%; display: flex; flex-direction: column; justify-content: flex-end; align-items: center; gap: 10px; }
        .chart-value { font-size: 14px; font-weight: 900; color: #334155; }
        .bar { width: 70px; border-radius: 12px 12px 0 0; min-height: 10px; transition: 1s ease; }
        .bar.income { background: linear-gradient(to top, #0d9488, #2dd4bf); box-shadow: 0 4px 15px rgba(13, 148, 136, 0.3); }
        .bar.expense { background: linear-gradient(to top, #e11d48, #fb7185); box-shadow: 0 4px 15px rgba(225, 29, 72, 0.3); }
        .chart-label { font-size: 13px; font-weight: 700; color: #64748b; margin-top: 8px; }

        .legend { display: flex; justify-content: center; gap: 30px; margin-top: 24px; font-size: 13px; font-weight: 700; color: #475569; }
        .legend-item { display: flex; align-items: center; gap: 8px; }
        .legend-box { width: 14px; height: 14px; border-radius: 4px; }
        .legend-income { background: #0d9488; }
        .legend-expense { background: #e11d48; }

        /* KATEGORI DETAIL */
        .category { display: flex; justify-content: space-between; align-items: center; padding: 18px 0; border-bottom: 1px solid #f1f5f9; }
        .category:last-child { border-bottom: none; }
        .category-name { color: #334155; font-weight: 700; font-size: 15px; }
        .category-value { font-weight: 900; font-size: 16px; }

        /* ================= TABEL TRANSAKSI ================= */
        .table-wrapper { overflow-x: auto; border-radius: 16px; border: 1px solid #e2e8f0; }
        .transaction-table { width: 100%; border-collapse: collapse; min-width: 700px; }
        .transaction-table th { background: #f8fafc; color: #64748b; font-size: 12px; font-weight: 800; padding: 16px 20px; text-align: left; border-bottom: 1px solid #e2e8f0; }
        .transaction-table td { padding: 16px 20px; border-bottom: 1px solid #f1f5f9; font-size: 14px; font-weight: 700; color: #334155; }
        .transaction-table tbody tr:hover { background: #f0fdfa; }

        .badge { display: inline-block; padding: 6px 12px; border-radius: 12px; font-size: 11px; font-weight: 800; }
        .badge-masuk { background: #ccfbf1; color: #0d9488; }
        .badge-keluar { background: #ffe4e6; color: #e11d48; }

        .empty-state { text-align: center; padding: 40px; color: #94a3b8; }
        .empty-state h3 { font-size: 18px; font-weight: 800; color: #64748b; margin-top: 10px; }

        /* ================= MASCOT ================= */
        .mascot-container { position: fixed; bottom: 40px; right: 40px; z-index: 100; display: flex; flex-direction: column; align-items: flex-end; animation: floatMascot 4s ease-in-out infinite; }
        .mascot-bubble { background: white; padding: 14px 20px; border-radius: 20px 20px 0 20px; box-shadow: 0 10px 25px rgba(13, 148, 136, 0.2); margin-bottom: 16px; font-size: 14px; font-weight: 800; color: #0f172a; max-width: 230px; text-align: center; opacity: 0; transform: translateY(20px) scale(0.9); transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55); border: 2px solid #ccfbf1; }
        .mascot-bubble span { color: #0d9488; }
        .mascot-body { width: 80px; height: 80px; background: linear-gradient(135deg, #2dd4bf, #0d9488); border-radius: 40%; display: flex; align-items: center; justify-content: center; box-shadow: 0 15px 30px rgba(13, 148, 136, 0.4); cursor: pointer; border: 4px solid #f8fafc; transition: all 0.3s ease; position: relative; }
        .mascot-face { font-size: 28px; color: white; font-weight: bold; animation: blink 4s infinite; }
        .mascot-container:hover .mascot-bubble { opacity: 1; transform: translateY(0) scale(1); }
        .mascot-container:hover .mascot-body { transform: scale(1.1) rotate(10deg); border-radius: 50%; }

        @keyframes floatMascot { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-15px); } }
        @keyframes blink { 0%, 96%, 98% { opacity: 1; } 97% { opacity: 0; transform: scaleY(0.1); } }
        @keyframes pulse-gemes { 0% { box-shadow: 0 0 0 0 rgba(13, 148, 136, 0.4); } 70% { box-shadow: 0 0 0 15px rgba(13, 148, 136, 0); } 100% { box-shadow: 0 0 0 0 rgba(13, 148, 136, 0); } }

        /* ================= RESPONSIVE ================= */
        @media (max-width: 1200px) {
            .summary-grid { grid-template-columns: 1fr; }
            .lower-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 900px) {
            .sidebar { display: none; }
            .main { width: 100%; margin-left: 0; }
            .page-heading { flex-direction: column; gap: 15px; }
            .content { padding: 20px; }
            .mascot-container { display: none; }
        }

        @media print {
            .sidebar, .topbar, .export-wrapper, .mascot-container { display: none !important; }
            .main { width: 100%; margin-left: 0; }
            .content { max-width: none; padding: 0; }
            .panel, .summary-card, .saldo-card { box-shadow: none; border: 1px solid #ddd; }
        }
    </style>
</head>

<body>

<div class="page">

    <!-- ================= SIDEBAR ================= -->
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
            <a href="{{ route('data-siswa.index') }}" class="nav-link">
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
            @if(Route::has('pengumuman.index'))
            <a href="{{ route('pengumuman.index') }}" class="nav-link">
                <span>▣</span> Pengumuman
            </a>
            @endif
            <a href="{{ route('laporan.index') }}" class="nav-link active">
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

    <!-- ================= MAIN ================= -->
    <main class="main">

        <header class="topbar">
            <h2>Laporan Keuangan</h2>
            <div class="avatar">
                {{ strtoupper(substr(Auth::user()->name ?? 'BE', 0, 2)) }}
            </div>
        </header>

        <section class="content">

            <!-- ================= HEADER & EXPORT ================= -->
            <div class="page-heading">
                <div class="title">
                    <h1>Laporan Keuangan 📊</h1>
                    <p>Rekapitulasi total pembayaran kas dan pengeluaran kelas.</p>
                </div>

                <div class="export-wrapper">
                    <button type="button" class="export-button" onclick="toggleExport()">
                        ↓ &nbsp; Ekspor Laporan ▾
                    </button>

                    <div id="exportMenu" class="export-menu">
                        <div class="export-item" onclick="exportPDF()">
                            <span class="export-icon">📄</span>
                            <span>Unduh sebagai PDF</span>
                        </div>
                        <div class="export-item" onclick="exportExcel()">
                            <span class="export-icon">📊</span>
                            <span>Unduh sebagai Excel</span>
                        </div>
                        <div class="export-item" onclick="printReport()">
                            <span class="export-icon">🖨️</span>
                            <span>Cetak Langsung</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ================= SUMMARY KARTU ================= -->
            <div class="summary-grid">
                <div class="summary-card">
                    <div class="summary-title">TOTAL PEMBAYARAN KAS</div>
                    <div class="summary-value green">
                        Rp {{ number_format($totalPembayaran ?? 0, 0, ',', '.') }}
                    </div>
                </div>

                <div class="summary-card">
                    <div class="summary-title">TOTAL PENGELUARAN</div>
                    <div class="summary-value red">
                        Rp {{ number_format($totalPengeluaran ?? 0, 0, ',', '.') }}
                    </div>
                </div>

                <div class="summary-card">
                    <div class="summary-title">SALDO AKHIR KAS</div>
                    <div class="summary-value">
                        Rp {{ number_format($saldo ?? 0, 0, ',', '.') }}
                    </div>
                </div>
            </div>

            <!-- ================= SALDO BESAR ================= -->
            <div class="saldo-card">
                <div class="summary-title">SALDO KAS SAAT INI</div>
                <div class="summary-value">
                    Rp {{ number_format($saldo ?? 0, 0, ',', '.') }}
                </div>
            </div>

            <!-- ================= GRAFIK & REKAP KIRI KANAN ================= -->
            <div class="lower-grid">

                <!-- CHART -->
                <div class="panel">
                    <h2 class="panel-title">Ringkasan Keuangan</h2>
                    <div class="panel-subtitle">Perbandingan pembayaran kas dan pengeluaran</div>

                    @php
                        $totalMasuk = (float) ($totalPembayaran ?? 0);
                        $maksimum = max($totalMasuk, (float) ($totalPengeluaran ?? 0), 1);
                        $tinggiMasuk = min(100, ($totalMasuk / $maksimum) * 100);
                        $tinggiKeluar = min(100, (($totalPengeluaran ?? 0) / $maksimum) * 100);
                    @endphp

                    <div class="chart">
                        <div class="chart-column">
                            <div class="chart-value">Rp {{ number_format($totalMasuk, 0, ',', '.') }}</div>
                            <div class="bar income" style="height: {{ max($tinggiMasuk, 5) }}%;"></div>
                            <div class="chart-label">Pembayaran Kas</div>
                        </div>

                        <div class="chart-column">
                            <div class="chart-value">Rp {{ number_format($totalPengeluaran ?? 0, 0, ',', '.') }}</div>
                            <div class="bar expense" style="height: {{ max($tinggiKeluar, 5) }}%;"></div>
                            <div class="chart-label">Pengeluaran</div>
                        </div>
                    </div>

                    <div class="legend">
                        <div class="legend-item">
                            <div class="legend-box legend-income"></div>
                            Total pembayaran kas
                        </div>
                        <div class="legend-item">
                            <div class="legend-box legend-expense"></div>
                            Total Pengeluaran
                        </div>
                    </div>
                </div>

                <!-- DETAIL -->
                <div class="panel">
                    <h2 class="panel-title">Rekap Keuangan</h2>
                    <div class="panel-subtitle">Ringkasan transaksi kas</div>

                    <div class="category-list">
                        <div class="category">
                            <div class="category-name">Pembayaran kas siswa</div>
                            <div class="category-value green">
                                Rp {{ number_format($totalPembayaran ?? 0, 0, ',', '.') }}
                            </div>
                        </div>

                        <div class="category">
                            <div class="category-name">Pengeluaran kas</div>
                            <div class="category-value red">
                                Rp {{ number_format($totalPengeluaran ?? 0, 0, ',', '.') }}
                            </div>
                        </div>

                        <div class="category" style="margin-top: 10px;">
                            <div class="category-name">Saldo akhir</div>
                            <div class="category-value" style="color: #0d9488;">
                                Rp {{ number_format($saldo ?? 0, 0, ',', '.') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- ================= TABEL TRANSAKSI ================= -->
            <div class="panel">
                <h2 class="panel-title">Detail Transaksi</h2>
                <div class="panel-subtitle">Daftar riwayat seluruh pemasukan dan pengeluaran</div>

                @php
                    $transaksi = collect();

                    foreach ($pembayaran as $item) {
                        $transaksi->push([
                            'tanggal' => $item->tanggal,
                            'jenis' => 'Pembayaran Kas',
                            'keterangan' => $item->keterangan ?? 'Pembayaran kas siswa',
                            'nama' => $item->siswa?->nama_lengkap ?? '-',
                            'nominal' => $item->nominal,
                            'tipe' => 'masuk',
                        ]);
                    }

                    foreach ($pengeluaran as $item) {
                        $transaksi->push([
                            'tanggal' => $item->tanggal,
                            'jenis' => 'Pengeluaran',
                            'keterangan' => $item->keterangan ?? $item->kategori ?? 'Pengeluaran kas',
                            'nama' => '-',
                            'nominal' => $item->nominal,
                            'tipe' => 'keluar',
                        ]);
                    }

                    $transaksi = $transaksi->sortByDesc(function ($item) {
                        return \Carbon\Carbon::parse($item['tanggal'])->timestamp;
                    })->values();
                @endphp

                @if ($transaksi->count() > 0)
                    <div class="table-wrapper">
                        <table class="transaction-table">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>TANGGAL</th>
                                    <th>JENIS</th>
                                    <th>KETERANGAN</th>
                                    <th>NAMA SISWA</th>
                                    <th>NOMINAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item['tanggal'])->format('d/m/Y') }}</td>
                                        <td>
                                            @if ($item['tipe'] === 'masuk')
                                                <span class="badge badge-masuk">MASUK</span>
                                            @else
                                                <span class="badge badge-keluar">KELUAR</span>
                                            @endif
                                        </td>
                                        <td>{{ $item['keterangan'] }}</td>
                                        <td>{{ $item['nama'] }}</td>
                                        <td class="amount {{ $item['tipe'] === 'masuk' ? 'green' : 'red' }}">
                                            {{ $item['tipe'] === 'masuk' ? '+' : '-' }}
                                            Rp {{ number_format($item['nominal'], 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="empty-state">
                        <div style="font-size: 40px; margin-bottom: 10px;">📉</div>
                        <h3>Belum ada transaksi tercatat</h3>
                        <p>Pembayaran masuk atau pengeluaran akan tampil di tabel ini.</p>
                    </div>
                @endif
            </div>

        </section>
    </main>

</div>

<!-- ================= MASCOT KASI ================= -->
<div class="mascot-container">
    <div class="mascot-bubble">
        Wah, ini dia rekap uang kita! 💸<br>
        <span>Bisa langsung dicetak buat laporan ke Wali Kelas lho, Kak! 😉</span>
    </div>
    <div class="mascot-body">
        <div class="mascot-face">^ᴗ^</div>
    </div>
</div>

<script>
    function toggleExport() {
        const menu = document.getElementById('exportMenu');
        if(menu.classList.contains('show')) {
            menu.classList.remove('show');
            setTimeout(() => { menu.style.display = 'none'; }, 300);
        } else {
            menu.style.display = 'block';
            setTimeout(() => { menu.classList.add('show'); }, 10);
        }
    }

    function exportPDF() {
        window.location.href = "{{ route('laporan.export.pdf') }}";
    }

    function exportExcel() {
        window.location.href = "{{ route('laporan.export.excel') }}";
    }

    function printReport() {
        window.print();
    }

    document.addEventListener('click', function(event) {
        const wrapper = document.querySelector('.export-wrapper');
        const menu = document.getElementById('exportMenu');
        if (!wrapper.contains(event.target) && menu.classList.contains('show')) {
            menu.classList.remove('show');
            setTimeout(() => { menu.style.display = 'none'; }, 300);
        }
    });
</script>

</body>

</html>
