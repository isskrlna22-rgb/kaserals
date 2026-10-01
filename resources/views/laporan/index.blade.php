<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan - KASERALS</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            width: 100%;
            min-height: 100%;
        }

        body {
            width: 100%;
            min-height: 100vh;
            font-family: "Plus Jakarta Sans", Arial, sans-serif;
            background: #f4f8f8;
            color: #10203a;
            overflow-x: hidden;
        }

        /* ================= APP ================= */

        .app {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 280px;
            min-width: 280px;
            min-height: 100vh;
            background: #0d162b;
            color: white;
            padding: 28px 20px;
            flex-shrink: 0;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 100;
            overflow-y: auto;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-bottom: 45px;
            padding-left: 7px;
        }

        .brand-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: #0c9c94;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: bold;
            flex-shrink: 0;
        }

        .brand-text h2 {
            font-size: 22px;
            letter-spacing: .5px;
        }

        .brand-text p {
            color: #8fa2c0;
            margin-top: 5px;
            font-size: 13px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .menu-title {
            color: #6d819f;
            font-weight: bold;
            letter-spacing: 1.5px;
            font-size: 11px;
            margin: 25px 13px 8px;
        }

        .menu-item {
            height: 48px;
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 0 15px;
            color: #d7e0ef;
            text-decoration: none;
            border-radius: 12px;
            font-size: 14px;
            transition: .2s;
        }

        .menu-item:hover {
            background: #17243d;
        }

        .menu-item.active {
            background: #0c9f96;
            color: white;
            font-weight: bold;
        }

        .menu-icon {
            width: 22px;
            min-width: 22px;
            text-align: center;
            font-size: 17px;
        }

        /* ================= MAIN ================= */

        .main {
            width: calc(100% - 280px);
            min-width: 0;
            min-height: 100vh;
            margin-left: 280px;
            overflow-x: hidden;
        }

        /* ================= TOPBAR ================= */

        .topbar {
            width: 100%;
            height: 76px;
            background: white;
            border-bottom: 1px solid #e0e7ef;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 36px;
        }

        .topbar-title {
            font-size: 18px;
            font-weight: bold;
        }

        .profile {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #d9f8f4;
            color: #0b968e;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: bold;
            flex-shrink: 0;
        }

        /* ================= CONTENT ================= */

        .content {
            width: 100%;
            max-width: 1600px;
            margin: 0 auto;
            padding: 35px;
            min-width: 0;
        }

        /* ================= HEADER ================= */

        .page-heading {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 28px;
        }

        .heading-left {
            min-width: 0;
        }

        .heading-left h1 {
            font-size: 28px;
            margin-bottom: 7px;
        }

        .date {
            color: #71839c;
            font-size: 14px;
        }

        /* ================= EXPORT ================= */

        .export-wrapper {
            position: relative;
            flex-shrink: 0;
        }

        .export-button {
            border: none;
            background: #0b9991;
            color: white;
            padding: 13px 18px;
            border-radius: 11px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            white-space: nowrap;
        }

        .export-button:hover {
            background: #078b84;
        }

        .export-menu {
            position: absolute;
            right: 0;
            top: 52px;
            width: 250px;
            max-width: calc(100vw - 30px);
            background: white;
            border: 1px solid #dce4ed;
            border-radius: 13px;
            padding: 7px;
            box-shadow: 0 12px 30px rgba(25, 45, 70, .14);
            display: none;
            z-index: 200;
        }

        .export-menu.show {
            display: block;
        }

        .export-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px;
            border-radius: 9px;
            font-size: 13px;
            cursor: pointer;
            color: #10203a;
        }

        .export-item:hover {
            background: #eefbf9;
            color: #07978f;
        }

        .export-icon {
            width: 22px;
            text-align: center;
        }

        /* ================= SUMMARY ================= */

        .summary-grid {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 20px;
        }

        .summary-card {
            min-width: 0;
            background: white;
            border: 1px solid #dfe7ef;
            border-radius: 15px;
            padding: 21px;
            box-shadow: 0 4px 12px rgba(24, 48, 78, .04);
        }

        .summary-title {
            color: #7c8da5;
            font-weight: bold;
            font-size: 11px;
            letter-spacing: 1px;
            margin-bottom: 12px;
        }

        .summary-value {
            font-size: 24px;
            font-weight: bold;
            word-break: break-word;
        }

        .green {
            color: #08a84e;
        }

        .red {
            color: #e32727;
        }

        /* ================= SALDO ================= */

        .saldo-card {
            width: 100%;
            background: linear-gradient(135deg, #0c9f96, #087f78);
            color: white;
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 25px;
            box-shadow: 0 10px 25px rgba(12, 159, 150, .18);
        }

        .saldo-card .summary-title {
            color: #d5fffb;
        }

        .saldo-card .summary-value {
            font-size: 30px;
        }

        /* ================= LOWER ================= */

        .lower-grid {
            width: 100%;
            display: grid;
            grid-template-columns: minmax(0, 1.6fr) minmax(280px, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .panel {
            width: 100%;
            min-width: 0;
            background: white;
            border: 1px solid #dfe7ef;
            border-radius: 15px;
            padding: 24px;
            box-shadow: 0 4px 12px rgba(24, 48, 78, .04);
            overflow: hidden;
        }

        .panel-title {
            font-size: 18px;
            margin-bottom: 6px;
        }

        .panel-subtitle {
            color: #7c8da5;
            font-size: 13px;
        }

        /* ================= CHART ================= */

        .chart {
            width: 100%;
            height: 250px;
            margin-top: 25px;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            gap: 70px;
            padding: 0 10px;
            border-bottom: 1px solid #e1e7ee;
        }

        .chart-column {
            height: 100%;
            min-width: 90px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
        }

        .chart-value {
            font-size: 12px;
            font-weight: bold;
            color: #536781;
            white-space: nowrap;
        }

        .bar {
            width: 60px;
            max-width: 60px;
            border-radius: 9px 9px 0 0;
            min-height: 8px;
        }

        .bar.income {
            background: #0c9f96;
        }

        .bar.expense {
            background: #e0e7ef;
        }

        .chart-label {
            font-size: 12px;
            color: #71839c;
            margin-top: 5px;
            white-space: nowrap;
        }

        .legend {
            display: flex;
            flex-wrap: wrap;
            gap: 22px;
            margin-top: 17px;
            color: #7186a2;
            font-size: 12px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .legend-box {
            width: 11px;
            height: 11px;
            border-radius: 3px;
            flex-shrink: 0;
        }

        .legend-income {
            background: #0c9f96;
        }

        .legend-expense {
            background: #e0e7ef;
        }

        /* ================= CATEGORY ================= */

        .category-list {
            width: 100%;
            margin-top: 18px;
        }

        .category {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            min-height: 70px;
            border-bottom: 1px solid #e5ebf1;
            font-size: 13px;
        }

        .category:last-child {
            border-bottom: none;
        }

        .category-name {
            color: #34465f;
            line-height: 1.5;
        }

        .category-value {
            text-align: right;
            font-weight: bold;
            white-space: nowrap;
        }

        /* ================= TRANSACTION TABLE ================= */

        .transaction-panel {
            width: 100%;
            margin-top: 5px;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            overflow-y: hidden;
            -webkit-overflow-scrolling: touch;
        }

        .transaction-table {
            width: 100%;
            min-width: 700px;
            border-collapse: collapse;
        }

        .transaction-table th {
            text-align: left;
            background: #f5f8fa;
            color: #71839c;
            font-size: 11px;
            letter-spacing: .7px;
            padding: 14px;
            border-bottom: 1px solid #e1e7ee;
            white-space: nowrap;
        }

        .transaction-table td {
            padding: 15px 14px;
            border-bottom: 1px solid #edf1f5;
            font-size: 13px;
            white-space: nowrap;
        }

        .transaction-table tbody tr:hover {
            background: #f8fbfb;
        }

        .badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }

        .badge-masuk {
            background: #e6f8ef;
            color: #078a48;
        }

        .badge-keluar {
            background: #ffeded;
            color: #d52b2b;
        }

        .amount {
            font-weight: bold;
            white-space: nowrap;
        }

        .empty-state {
            text-align: center;
            padding: 35px;
            color: #8797aa;
            font-size: 13px;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 1200px) {

            .content {
                padding: 28px;
            }

            .summary-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .lower-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 900px) {

            .sidebar {
                width: 220px;
                min-width: 220px;
            }

            .main {
                width: calc(100% - 220px);
                margin-left: 220px;
            }

            .content {
                padding: 24px;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-width: 700px) {

            .sidebar {
                width: 72px;
                min-width: 72px;
                padding: 20px 10px;
            }

            .main {
                width: calc(100% - 72px);
                margin-left: 72px;
            }

            .brand-text,
            .menu-item span:not(.menu-icon),
            .menu-title {
                display: none;
            }

            .brand {
                justify-content: center;
                padding: 0;
            }

            .menu-item {
                justify-content: center;
                padding: 0;
            }

            .content {
                padding: 20px;
            }

            .summary-grid {
                grid-template-columns: 1fr;
            }

            .topbar {
                padding: 0 20px;
            }

            .topbar-title {
                font-size: 15px;
            }

            .chart {
                gap: 30px;
            }

            .chart-column {
                min-width: 70px;
            }

            .bar {
                width: 45px;
            }
        }

        @media (max-width: 500px) {

            .sidebar {
                width: 60px;
                min-width: 60px;
            }

            .main {
                width: calc(100% - 60px);
                margin-left: 60px;
            }

            .content {
                padding: 15px;
            }

            .topbar {
                height: 65px;
                padding: 0 15px;
            }

            .profile {
                width: 36px;
                height: 36px;
            }

            .heading-left h1 {
                font-size: 23px;
            }

            .export-button {
                width: 100%;
            }

            .export-wrapper {
                width: 100%;
            }

            .export-menu {
                left: 0;
                right: auto;
                width: 100%;
            }

            .chart {
                gap: 20px;
            }

            .chart-value {
                font-size: 10px;
            }

            .chart-label {
                font-size: 10px;
            }
        }

        /* ================= PRINT ================= */

        @media print {

            .sidebar,
            .topbar,
            .export-wrapper {
                display: none !important;
            }

            .main {
                width: 100%;
                margin-left: 0;
            }

            .content {
                max-width: none;
                padding: 0;
            }

            .panel,
            .summary-card,
            .saldo-card {
                box-shadow: none;
                border: 1px solid #ddd;
            }
        }
    </style>
</head>

<body>

    <div class="app">

        <!-- ================= SIDEBAR ================= -->

        <aside class="sidebar">

            <div class="brand">
                <div class="brand-icon">K</div>

                <div class="brand-text">
                    <h2>KASERALS</h2>
                    <p>Kas Kelas Digital</p>
                </div>
            </div>

            <nav class="menu">

                <a href="{{ url('/dashboard') }}" class="menu-item">
                    <span class="menu-icon">□</span>
                    <span>Dashboard</span>
                </a>

                <a href="{{ url('/data-siswa') }}" class="menu-item">
                    <span class="menu-icon">◉</span>
                    <span>Data Siswa</span>
                </a>

                <div class="menu-title">TRANSAKSI</div>

                <a href="{{ url('/data-pembayaran') }}" class="menu-item">
                    <span class="menu-icon">✓</span>
                    <span>Pembayaran Kas</span>
                </a>

                <a href="{{ url('/status-pembayaran') }}" class="menu-item">
                    <span class="menu-icon">≡</span>
                    <span>Status Pembayaran</span>
                </a>

                <a href="{{ url('/data-pemasukan') }}" class="menu-item">
                    <span class="menu-icon">↓</span>
                    <span>Pemasukan</span>
                </a>

                <a href="{{ url('/data-pengeluaran') }}" class="menu-item">
                    <span class="menu-icon">↑</span>
                    <span>Pengeluaran</span>
                </a>

                <div class="menu-title">CATATAN</div>

                <a href="{{ url('/riwayat-transaksi') }}" class="menu-item">
                    <span class="menu-icon">↻</span>
                    <span>Riwayat Transaksi</span>
                </a>

                <a href="{{ url('/laporan-keuangan') }}" class="menu-item active">
                    <span class="menu-icon">▤</span>
                    <span>Laporan Keuangan</span>
                </a>

            </nav>
        </aside>


        <!-- ================= MAIN ================= -->

        <main class="main">

            <header class="topbar">

                <div class="topbar-title">
                    Laporan Keuangan
                </div>

                <div class="profile">
                    NS
                </div>

            </header>


            <section class="content">

                <!-- ================= HEADER ================= -->

                <div class="page-heading">

                    <div class="heading-left">

                        <h1>Laporan Keuangan</h1>

                        <div class="date">
                            Rekap seluruh transaksi kas kelas
                        </div>

                    </div>


                    <!-- EXPORT -->

                    <div class="export-wrapper">

                        <button type="button" class="export-button" onclick="toggleExport()">

                            ↓ &nbsp; Ekspor Laporan ▾

                        </button>


                        <div id="exportMenu" class="export-menu">

                            <div class="export-item" onclick="exportPDF()">

                                <span class="export-icon">▤</span>

                                <span>Unduh sebagai PDF</span>

                            </div>


                            <div class="export-item" onclick="exportExcel()">

                                <span class="export-icon">▥</span>

                                <span>Unduh sebagai Excel</span>

                            </div>


                            <div class="export-item" onclick="printReport()">

                                <span class="export-icon">♧</span>

                                <span>Cetak Langsung</span>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- ================= SUMMARY ================= -->

                <div class="summary-grid">

                    <div class="summary-card">

                        <div class="summary-title">
                            TOTAL PEMBAYARAN KAS
                        </div>

                        <div class="summary-value green">
                            Rp {{ number_format($totalPembayaran, 0, ',', '.') }}
                        </div>

                    </div>


                    <div class="summary-card">

                        <div class="summary-title">
                            TOTAL PEMASUKAN
                        </div>

                        <div class="summary-value green">
                            Rp {{ number_format($totalPemasukan, 0, ',', '.') }}
                        </div>

                    </div>


                    <div class="summary-card">

                        <div class="summary-title">
                            TOTAL PENGELUARAN
                        </div>

                        <div class="summary-value red">
                            Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}
                        </div>

                    </div>

                </div>


                <!-- ================= SALDO ================= -->

                <div class="saldo-card">

                    <div class="summary-title">
                        SALDO AKHIR KAS
                    </div>

                    <div class="summary-value">
                        Rp {{ number_format($saldo, 0, ',', '.') }}
                    </div>

                </div>


                <!-- ================= LOWER ================= -->

                <div class="lower-grid">


                    <!-- CHART -->

                    <div class="panel">

                        <h2 class="panel-title">
                            Ringkasan Keuangan
                        </h2>

                        <div class="panel-subtitle">
                            Perbandingan pemasukan dan pengeluaran
                        </div>


                        @php

                            $totalMasuk = (float) $totalPembayaran + (float) $totalPemasukan;

                            $maksimum = max($totalMasuk, (float) $totalPengeluaran, 1);

                            $tinggiMasuk = min(100, ($totalMasuk / $maksimum) * 100);

                            $tinggiKeluar = min(100, ($totalPengeluaran / $maksimum) * 100);
                        @endphp


                        <div class="chart">

                            <div class="chart-column">

                                <div class="chart-value">
                                    Rp {{ number_format($totalMasuk, 0, ',', '.') }}
                                </div>

                                <div class="bar income" style="height: {{ max($tinggiMasuk, 5) }}%;">
                                </div>

                                <div class="chart-label">
                                    Total Masuk
                                </div>

                            </div>


                            <div class="chart-column">

                                <div class="chart-value">
                                    Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}
                                </div>

                                <div class="bar expense" style="height: {{ max($tinggiKeluar, 5) }}%;">
                                </div>

                                <div class="chart-label">
                                    Pengeluaran
                                </div>

                            </div>

                        </div>


                        <div class="legend">

                            <div class="legend-item">

                                <div class="legend-box legend-income"></div>

                                Total pemasukan

                            </div>


                            <div class="legend-item">

                                <div class="legend-box legend-expense"></div>

                                Total pengeluaran

                            </div>

                        </div>

                    </div>


                    <!-- DETAIL -->

                    <div class="panel">

                        <h2 class="panel-title">
                            Rekap Keuangan
                        </h2>

                        <div class="panel-subtitle">
                            Ringkasan transaksi kas
                        </div>


                        <div class="category-list">

                            <div class="category">

                                <div class="category-name">
                                    Pembayaran kas siswa
                                </div>

                                <div class="category-value green">
                                    Rp {{ number_format($totalPembayaran, 0, ',', '.') }}
                                </div>

                            </div>


                            <div class="category">

                                <div class="category-name">
                                    Pemasukan lainnya
                                </div>

                                <div class="category-value green">
                                    Rp {{ number_format($totalPemasukan, 0, ',', '.') }}
                                </div>

                            </div>


                            <div class="category">

                                <div class="category-name">
                                    Pengeluaran kas
                                </div>

                                <div class="category-value red">
                                    Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}
                                </div>

                            </div>


                            <div class="category">

                                <div class="category-name">
                                    Saldo akhir
                                </div>

                                <div class="category-value">
                                    Rp {{ number_format($saldo, 0, ',', '.') }}
                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- ================= TRANSACTION TABLE ================= -->

                <div class="panel transaction-panel">

                    <div class="table-header">

                        <div>

                            <h2 class="panel-title">
                                Detail Transaksi
                            </h2>

                            <div class="panel-subtitle">
                                Daftar seluruh transaksi yang tercatat dalam kas kelas
                            </div>

                        </div>

                    </div>


                    @php

                        $transaksi = collect();

                        foreach ($pembayaran as $item) {
                            $transaksi->push([
                                'tanggal' => $item->tanggal,
                                'jenis' => 'Pembayaran Kas',
                                'keterangan' => $item->keterangan ?? 'Pembayaran kas siswa',
                                'nama' => $item->siswa->nama ?? '-',
                                'nominal' => $item->nominal,
                                'tipe' => 'masuk',
                            ]);
                        }

                        foreach ($pemasukan as $item) {
                            $transaksi->push([
                                'tanggal' => $item->tanggal,
                                'jenis' => 'Pemasukan',
                                'keterangan' => $item->sumber ?? 'Pemasukan lainnya',
                                'nama' => '-',
                                'nominal' => $item->nominal,
                                'tipe' => 'masuk',
                            ]);
                        }

                        foreach ($pengeluaran as $item) {
                            $transaksi->push([
                                'tanggal' => $item->tanggal,
                                'jenis' => 'Pengeluaran',
                                'keterangan' => $item->kategori ?? 'Pengeluaran kas',
                                'nama' => '-',
                                'nominal' => $item->nominal,
                                'tipe' => 'keluar',
                            ]);
                        }

                        $transaksi = $transaksi
                            ->sortByDesc(function ($item) {
                                return \Carbon\Carbon::parse($item['tanggal'])->timestamp;
                            })
                            ->values();

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

                                            <td>
                                                {{ $index + 1 }}
                                            </td>


                                            <td>
                                                {{ \Carbon\Carbon::parse($item['tanggal'])->format('d/m/Y') }}
                                            </td>


                                            <td>

                                                @if ($item['tipe'] === 'masuk')
                                                    <span class="badge badge-masuk">
                                                        MASUK
                                                    </span>
                                                @else
                                                    <span class="badge badge-keluar">
                                                        KELUAR
                                                    </span>
                                                @endif

                                            </td>


                                            <td>
                                                {{ $item['keterangan'] }}
                                            </td>


                                            <td>
                                                {{ $item['nama'] }}
                                            </td>


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
                            Belum ada transaksi yang tercatat.
                        </div>

                    @endif

                </div>

            </section>

        </main>

    </div>


    <script>
        function toggleExport() {

            const menu = document.getElementById('exportMenu');

            menu.classList.toggle('show');

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

            if (!wrapper.contains(event.target)) {

                menu.classList.remove('show');

            }

        });
    </script>

</body>

</html>
