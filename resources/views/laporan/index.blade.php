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

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f8fb;
            color: #0d1b35;
        }

        .app {
            display: flex;
            min-height: 100vh;
            background: #f7f9fb;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 418px;
            min-height: 100vh;
            background: #0d162b;
            color: white;
            padding: 30px 26px;
            flex-shrink: 0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 58px;
            padding-left: 7px;
        }

        .brand-icon {
            width: 58px;
            height: 58px;
            border-radius: 16px;
            background: #0c9c94;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            font-weight: bold;
        }

        .brand-text h2 {
            font-size: 29px;
            letter-spacing: 0.5px;
        }

        .brand-text p {
            color: #8fa2c0;
            margin-top: 8px;
            font-size: 18px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .menu-title {
            color: #6d819f;
            font-weight: bold;
            letter-spacing: 2px;
            font-size: 16px;
            margin: 29px 15px 10px;
        }

        .menu-item {
            height: 67px;
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 0 24px;
            color: #d7e0ef;
            text-decoration: none;
            border-radius: 15px;
            font-size: 22px;
            transition: 0.2s;
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
            width: 25px;
            text-align: center;
            font-size: 22px;
        }

        /* ================= MAIN ================= */

        .main {
            flex: 1;
            min-width: 0;
        }

        .topbar {
            height: 116px;
            background: white;
            border-bottom: 1px solid #c9d5e3;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 45px;
        }

        .topbar-title {
            font-size: 26px;
            font-weight: bold;
        }

        .profile {
            width: 62px;
            height: 62px;
            border-radius: 50%;
            background: #c8f7f1;
            color: #0b968e;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            font-weight: bold;
        }

        .content {
            padding: 46px 43px;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 33px;
        }

        .page-heading h1 {
            font-size: 36px;
            margin-bottom: 16px;
        }

        .date {
            font-size: 23px;
            color: #6480a2;
        }

        /* ================= EXPORT ================= */

        .export-wrapper {
            position: relative;
        }

        .export-button {
            border: none;
            background: #0b9991;
            color: white;
            padding: 20px 28px;
            border-radius: 17px;
            font-size: 22px;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .export-button:hover {
            background: #078b84;
        }

        .export-menu {
            position: absolute;
            right: 0;
            top: 75px;
            width: 368px;
            background: white;
            border: 2px solid #d0dbe7;
            border-radius: 19px;
            padding: 11px;
            box-shadow: 0 15px 35px rgba(25, 45, 70, 0.16);
            display: none;
            z-index: 20;
        }

        .export-menu.show {
            display: block;
        }

        .export-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 19px 18px;
            border-radius: 12px;
            font-size: 21px;
            cursor: pointer;
            color: #10203a;
        }

        .export-item:hover {
            background: #eefbf9;
            color: #07978f;
        }

        .export-icon {
            width: 28px;
            text-align: center;
        }

        /* ================= SUMMARY ================= */

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 27px;
            margin-bottom: 31px;
        }

        .summary-card {
            background: white;
            border: 2px solid #cad7e5;
            border-radius: 19px;
            padding: 27px 25px;
            min-height: 190px;
        }

        .summary-title {
            color: #8296b1;
            font-weight: bold;
            font-size: 20px;
            letter-spacing: 1px;
            margin-bottom: 25px;
        }

        .summary-value {
            font-size: 31px;
            font-weight: bold;
            line-height: 1.45;
        }

        .summary-value.green {
            color: #0aab55;
        }

        .summary-value.red {
            color: #e32828;
        }

        /* ================= LOWER CONTENT ================= */

        .lower-grid {
            display: grid;
            grid-template-columns: 1.6fr 1fr;
            gap: 27px;
        }

        .panel {
            background: white;
            border: 2px solid #cad7e5;
            border-radius: 19px;
            padding: 35px 31px;
        }

        .panel-title {
            font-size: 26px;
            margin-bottom: 13px;
        }

        .panel-subtitle {
            color: #6480a2;
            font-size: 21px;
        }

        /* ================= CHART ================= */

        .chart {
            height: 270px;
            margin-top: 40px;
            display: flex;
            align-items: flex-end;
            justify-content: space-around;
            padding: 0 15px;
            border-bottom: 1px solid #d8e1eb;
        }

        .chart-group {
            display: flex;
            align-items: flex-end;
            gap: 16px;
            height: 100%;
        }

        .bar {
            width: 73px;
            border-radius: 9px 9px 0 0;
        }

        .bar.income {
            background: #119d94;
        }

        .bar.expense {
            background: #dfe6ef;
        }

        .h-70 {
            height: 70%;
        }

        .h-25 {
            height: 25%;
        }

        .h-84 {
            height: 84%;
        }

        .h-34 {
            height: 34%;
        }

        .h-65 {
            height: 65%;
        }

        .h-19 {
            height: 19%;
        }

        .legend {
            display: flex;
            gap: 30px;
            margin-top: 22px;
            color: #7186a2;
            font-size: 19px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .legend-box {
            width: 18px;
            height: 18px;
            border-radius: 4px;
        }

        .legend-income {
            background: #119d94;
        }

        .legend-expense {
            background: #dfe6ef;
        }

        /* ================= CATEGORY ================= */

        .category-list {
            margin-top: 34px;
        }

        .category {
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: 96px;
            border-bottom: 1px solid #dbe2ea;
            font-size: 20px;
        }

        .category:last-child {
            border-bottom: none;
        }

        .category-name {
            max-width: 160px;
            line-height: 1.4;
        }

        .category-value {
            text-align: right;
            font-weight: bold;
            line-height: 1.5;
        }

        .category-value span {
            display: block;
        }

        .green {
            color: #08a84e;
        }

        .red {
            color: #e32727;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 1200px) {
            .sidebar {
                width: 300px;
            }

            .summary-grid {
                grid-template-columns: 1fr;
            }

            .lower-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 800px) {
            .sidebar {
                width: 80px;
                padding: 25px 12px;
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

            .topbar {
                padding: 0 20px;
            }

            .content {
                padding: 30px 20px;
            }

            .page-heading {
                flex-direction: column;
                gap: 25px;
            }

            .export-menu {
                right: auto;
                left: 0;
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

            <a href="{{ url('/pembayaran-kas') }}" class="menu-item">
                <span class="menu-icon">✓</span>
                <span>Pembayaran Kas</span>
            </a>

            <a href="{{ url('/status-pembayaran') }}" class="menu-item">
                <span class="menu-icon">≡</span>
                <span>Status Pembayaran</span>
            </a>

            <a href="{{ url('/pemasukan') }}" class="menu-item">
                <span class="menu-icon">↓</span>
                <span>Pemasukan</span>
            </a>

            <a href="{{ url('/pengeluaran') }}" class="menu-item">
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

        <!-- TOPBAR -->

        <header class="topbar">

            <div class="topbar-title">
                Laporan Keuangan
            </div>

            <div class="profile">
                NS
            </div>

        </header>


        <!-- CONTENT -->

        <section class="content">

            <!-- TITLE -->

            <div class="page-heading">

                <div>
                    <h1>Laporan Keuangan</h1>

                    <div class="date">
                        01 – 30 November 2026
                    </div>
                </div>


                <!-- EXPORT -->

                <div class="export-wrapper">

                    <button
                        type="button"
                        class="export-button"
                        onclick="toggleExport()"
                    >
                        ↓ &nbsp; Ekspor Laporan ▾
                    </button>

                    <div
                        id="exportMenu"
                        class="export-menu"
                    >

                        <div
                            class="export-item"
                            onclick="exportPDF()"
                        >
                            <span class="export-icon">▤</span>
                            <span>Unduh sebagai PDF</span>
                        </div>

                        <div
                            class="export-item"
                            onclick="exportExcel()"
                        >
                            <span class="export-icon">▥</span>
                            <span>Unduh sebagai Excel</span>
                        </div>

                        <div
                            class="export-item"
                            onclick="printReport()"
                        >
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
                        SALDO AWAL
                    </div>

                    <div class="summary-value">
                        Rp 0
                    </div>

                </div>


                <div class="summary-card">

                    <div class="summary-title">
                        PEMASUKAN
                    </div>

                    <div class="summary-value green">
                        Rp<br>
                        3.150.000
                    </div>

                </div>


                <div class="summary-card">

                    <div class="summary-title">
                        PENGELUARAN
                    </div>

                    <div class="summary-value red">
                        Rp<br>
                        700.000
                    </div>

                </div>

            </div>


            <!-- ================= LOWER ================= -->

            <div class="lower-grid">

                <!-- CHART -->

                <div class="panel">

                    <h2 class="panel-title">
                        Pemasukan vs Pengeluaran
                    </h2>

                    <div class="panel-subtitle">
                        Per minggu, November 2026
                    </div>


                    <div class="chart">

                        <div class="chart-group">
                            <div class="bar income h-70"></div>
                            <div class="bar expense h-25"></div>
                        </div>

                        <div class="chart-group">
                            <div class="bar income h-84"></div>
                            <div class="bar expense h-34"></div>
                        </div>

                        <div class="chart-group">
                            <div class="bar income h-65"></div>
                            <div class="bar expense h-19"></div>
                        </div>

                    </div>


                    <div class="legend">

                        <div class="legend-item">
                            <div class="legend-box legend-income"></div>
                            Pemasukan
                        </div>

                        <div class="legend-item">
                            <div class="legend-box legend-expense"></div>
                            Pengeluaran
                        </div>

                    </div>

                </div>


                <!-- CATEGORY -->

                <div class="panel">

                    <h2 class="panel-title">
                        Rekap per Kategori
                    </h2>


                    <div class="category-list">

                        <div class="category">

                            <div class="category-name">
                                Kas rutin<br>
                                siswa
                            </div>

                            <div class="category-value green">
                                <span>Rp</span>
                                <span>2.800.000</span>
                            </div>

                        </div>


                        <div class="category">

                            <div class="category-name">
                                Donasi
                            </div>

                            <div class="category-value green">
                                <span>Rp</span>
                                <span>350.000</span>
                            </div>

                        </div>


                        <div class="category">

                            <div class="category-name">
                                Kebutuhan<br>
                                kelas
                            </div>

                            <div class="category-value red">
                                <span>Rp</span>
                                <span>700.000</span>
                            </div>

                        </div>

                    </div>

                </div>

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

        alert('Fitur export PDF akan diproses.');

        // Contoh jika nanti menggunakan route Laravel:
        // window.location.href = "{{ route('laporan.export.pdf') }}";

    }


    function exportExcel() {

        alert('Fitur export Excel akan diproses.');

        // Contoh:
        // window.location.href = "{{ route('laporan.export.excel') }}";

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