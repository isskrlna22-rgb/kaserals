<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - KASERALS</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f8fafc;
            color: #0f172a;
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 300px;
            background: #0f172a;
            color: white;
            padding: 28px 20px;
            display: flex;
            flex-direction: column;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 35px;
        }

        .brand-logo {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: #0d9488;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
        }

        .brand-text h2 {
            font-size: 20px;
            margin-bottom: 4px;
        }

        .brand-text p {
            color: #94a3b8;
            font-size: 13px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .menu-title {
            color: #64748b;
            font-size: 13px;
            font-weight: bold;
            margin: 22px 10px 8px;
            letter-spacing: 1px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 16px;
            color: #cbd5e1;
            text-decoration: none;
            border-radius: 12px;
            font-size: 15px;
            transition: 0.2s;
        }

        .menu a:hover {
            background: #1e293b;
            color: white;
        }

        .menu a.active {
            background: #0d9488;
            color: white;
            font-weight: bold;
        }

        .menu-icon {
            width: 18px;
            text-align: center;
        }

        .sidebar-bottom {
            margin-top: auto;
            border-top: 1px solid #263449;
            padding-top: 18px;
        }

        .profile-mini {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #94a3b8;
        }

        .profile-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #20324d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: bold;
        }


        /* ================= MAIN ================= */
        .logout-btn {
            width: 100%;
            margin-top: 15px;
            padding: 12px 16px;
            border: none;
            border-radius: 12px;
            background: #0d9488;
            color: white;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .logout-btn:hover {
            background: #aee7b9;
        }

        .main {
            flex: 1;
            min-width: 0;
        }

        /* ================= HEADER ================= */

        .header {
            height: 90px;
            background: white;
            border-bottom: 1px solid #cbd5e1;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
        }

        .header-left h1 {
            font-size: 22px;
            margin-bottom: 6px;
        }

        .header-left p {
            color: #94a3b8;
            font-size: 14px;
        }

        .header-profile {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .header-profile-text {
            text-align: right;
        }

        .header-profile-text strong {
            display: block;
            font-size: 15px;
        }

        .header-profile-text span {
            display: block;
            color: #94a3b8;
            font-size: 13px;
            margin-top: 4px;
        }

        .header-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #ccfbf1;
            color: #0d9488;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }


        /* ================= CONTENT ================= */

        .content {
            padding: 30px;
        }

        /* ================= SUMMARY ================= */

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 22px;
        }

        .summary-card {
            background: white;
            border: 1px solid #cbd5e1;
            border-radius: 16px;
            padding: 25px;
        }

        .summary-card.dark {
            background: #0f172a;
            border-color: #0f172a;
            color: white;
        }

        .summary-title {
            color: #94a3b8;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 0.5px;
            margin-bottom: 18px;
        }

        .summary-card.dark .summary-title {
            color: #94a3b8;
        }

        .summary-value {
            font-size: 28px;
            font-weight: bold;
        }

        .summary-value.income {
            color: #16a34a;
        }

        .summary-value.expense {
            color: #dc2626;
        }

        .summary-card.dark .summary-value {
            color: white;
        }

        .summary-date {
            margin-top: 10px;
            color: #94a3b8;
            font-size: 14px;
        }


        /* ================= MIDDLE ================= */

        .middle-grid {
            display: grid;
            grid-template-columns: 1.45fr 0.75fr;
            gap: 20px;
            margin-bottom: 22px;
        }

        .card {
            background: white;
            border: 1px solid #cbd5e1;
            border-radius: 16px;
            padding: 25px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .card-header h2 {
            font-size: 19px;
        }

        .card-link {
            color: #0d9488;
            font-weight: bold;
            text-decoration: none;
            font-size: 14px;
        }

        .payment-info {
            color: #64748b;
            margin-bottom: 15px;
        }

        .progress {
            width: 100%;
            height: 11px;
            background: #e2e8f0;
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .progress-bar {
            width: 82%;
            height: 100%;
            background: #0d9488;
            border-radius: 20px;
        }

        .payment-status {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .status-box {
            padding: 20px;
            border-radius: 13px;
        }

        .status-box.paid {
            background: #f0fdf4;
        }

        .status-box.unpaid {
            background: #fffbeb;
        }

        .status-number {
            font-size: 27px;
            font-weight: bold;
            margin-bottom: 7px;
        }

        .paid .status-number {
            color: #15803d;
        }

        .unpaid .status-number {
            color: #b45309;
        }

        .status-label {
            color: #64748b;
            font-size: 14px;
        }


        /* ================= QUICK ACTION ================= */

        .quick-actions h2 {
            font-size: 19px;
            margin-bottom: 20px;
        }

        .quick-btn {
            width: 100%;
            min-height: 52px;
            border-radius: 12px;
            border: 1px solid #cbd5e1;
            background: white;
            color: #0f172a;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            margin-bottom: 12px;
            transition: 0.2s;
        }

        .quick-btn:hover {
            background: #f8fafc;
        }

        .quick-btn.primary {
            background: #0d9488;
            color: white;
            border-color: #0d9488;
        }

        .quick-btn.primary:hover {
            background: #0f766e;
        }


        /* ================= TRANSACTIONS ================= */

        .transactions {
            background: white;
            border: 1px solid #cbd5e1;
            border-radius: 16px;
            padding: 25px;
        }

        .transaction-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .transaction-header h2 {
            font-size: 19px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 13px 15px;
            color: #94a3b8;
            font-size: 13px;
            border-bottom: 1px solid #cbd5e1;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 14px;
        }

        td:last-child,
        th:last-child {
            text-align: right;
        }

        .badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .badge.payment {
            background: #f0fdf4;
            color: #15803d;
        }

        .badge.expense {
            background: #fef2f2;
            color: #dc2626;
        }

        .badge.income {
            background: #f0fdf4;
            color: #15803d;
        }

        .student-name {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .student-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: #ccfbf1;
            color: #0d9488;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
        }

        .amount.in {
            color: #16a34a;
            font-weight: bold;
        }

        .amount.out {
            color: #dc2626;
            font-weight: bold;
        }


        /* ================= RESPONSIVE ================= */

        @media (max-width: 1000px) {

            .sidebar {
                width: 230px;
            }

            .summary-grid {
                grid-template-columns: 1fr;
            }

            .middle-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {

            .dashboard {
                display: block;
            }

            .sidebar {
                width: 100%;
                min-height: auto;
            }

            .menu {
                display: none;
            }

            .sidebar-bottom {
                display: none;
            }

            .header {
                height: auto;
                padding: 20px;
            }

            .content {
                padding: 18px;
            }

            .header-profile-text {
                display: none;
            }

            .payment-status {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <div class="dashboard">

        <!-- SIDEBAR -->
        <aside class="sidebar">

            <div class="brand">
                <div class="brand-logo">K</div>

                <div class="brand-text">
                    <h2>KASERALS</h2>
                    <p>Kas Kelas Digital</p>
                </div>
            </div>

            <nav class="menu">

                <a href="{{ route('dashboard') }}" class="active">
                    <span class="menu-icon">▣</span>
                    Dashboard
                </a>

                <a href="{{ route('data-siswa.index') }}">
                    <span class="menu-icon">◉</span>
                    Data Siswa
                </a>

                <div class="menu-title">TRANSAKSI</div>

                <a href="{{ route('pembayaran-kas.index') }}">
                    <span class="menu-icon">✓</span>
                    Pembayaran Kas
                </a>

                <a href="#">
                    <span class="menu-icon">≡</span>
                    Status Pembayaran
                </a>

                <a href="#">
                    <span class="menu-icon">↓</span>
                    Pemasukan
                </a>

                <a href="#">
                    <span class="menu-icon">↑</span>
                    Pengeluaran
                </a>

                <div class="menu-title">CATATAN</div>

                <a href="#">
                    <span class="menu-icon">↻</span>
                    Riwayat Transaksi
                </a>

                <a href="#">
                    <span class="menu-icon">▤</span>
                    Laporan Keuangan
                </a>

            </nav>

            <div class="sidebar-bottom">
                <div class="profile-mini">
                    <div class="profile-avatar">IK</div>
                    <span>Iis Karlina</span>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        ↪ Keluar
                    </button>
                </form>
            </div>
        </aside>


        <!-- MAIN -->
        <main class="main">

            <!-- HEADER -->
            <header class="header">

                <div class="header-left">
                    <h1>Dashboard</h1>
                    <p>Senin, 16 November 2026</p>
                </div>

                <div class="header-profile">

                    <div class="header-profile-text">
                        <strong>Iis Karlina</strong>
                        <span>Bendahara Kelas</span>
                    </div>

                    <div class="header-avatar">
                        IK
                    </div>

                </div>

            </header>


            <!-- CONTENT -->
            <section class="content">


                <!-- SUMMARY -->
                <div class="summary-grid">

                    <div class="summary-card">

                        <div class="summary-title">
                            TOTAL PEMASUKAN
                        </div>

                        <div class="summary-value income">
                            Rp 3.150.000
                        </div>

                        <div class="summary-date">
                            November 2026
                        </div>

                    </div>


                    <div class="summary-card">

                        <div class="summary-title">
                            TOTAL PENGELUARAN
                        </div>

                        <div class="summary-value expense">
                            Rp 700.000
                        </div>

                        <div class="summary-date">
                            November 2026
                        </div>

                    </div>


                    <div class="summary-card dark">

                        <div class="summary-title">
                            SALDO KAS
                        </div>

                        <div class="summary-value">
                            Rp 2.450.000
                        </div>

                        <div class="summary-date">
                            Diperbarui 5 menit lalu
                        </div>

                    </div>

                </div>


                <!-- MIDDLE -->
                <div class="middle-grid">


                    <!-- PAYMENT STATUS -->
                    <div class="card">

                        <div class="card-header">

                            <h2>Status Pembayaran Bulan Ini</h2>

                            <a href="#" class="card-link">
                                Lihat semua →
                            </a>

                        </div>

                        <p class="payment-info">
                            28 dari 34 siswa sudah membayar
                        </p>

                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>

                        <div class="payment-status">

                            <div class="status-box paid">

                                <div class="status-number">
                                    28
                                </div>

                                <div class="status-label">
                                    Sudah bayar
                                </div>

                            </div>


                            <div class="status-box unpaid">

                                <div class="status-number">
                                    6
                                </div>

                                <div class="status-label">
                                    Belum bayar
                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- QUICK ACTION -->
                    <div class="card quick-actions">

                        <h2>Aksi Cepat</h2>

                        <button class="quick-btn primary">
                            + Catat Pembayaran
                        </button>

                        <button class="quick-btn">
                            + Catat Pemasukan
                        </button>

                        <button class="quick-btn">
                            + Catat Pengeluaran
                        </button>

                    </div>

                </div>


                <!-- TRANSACTIONS -->
                <div class="transactions">

                    <div class="transaction-header">

                        <h2>Transaksi Terakhir</h2>

                        <a href="#" class="card-link">
                            Riwayat lengkap →
                        </a>

                    </div>


                    <div class="table-wrapper">

                        <table>

                            <thead>

                                <tr>
                                    <th>TANGGAL</th>
                                    <th>JENIS</th>
                                    <th>KETERANGAN</th>
                                    <th>NOMINAL</th>
                                </tr>

                            </thead>

                            <tbody>

                                <tr>

                                    <td>16 Nov</td>

                                    <td>
                                        <span class="badge payment">
                                            Pembayaran
                                        </span>
                                    </td>

                                    <td>

                                        <div class="student-name">

                                            <div class="student-avatar">
                                                NS
                                            </div>

                                            Nesya — kas November

                                        </div>

                                    </td>

                                    <td class="amount in">
                                        + Rp 20.000
                                    </td>

                                </tr>


                                <tr>

                                    <td>15 Nov</td>

                                    <td>
                                        <span class="badge expense">
                                            Pengeluaran
                                        </span>
                                    </td>

                                    <td>
                                        Spidol & penghapus papan tulis
                                    </td>

                                    <td class="amount out">
                                        − Rp 45.000
                                    </td>

                                </tr>


                                <tr>

                                    <td>14 Nov</td>

                                    <td>
                                        <span class="badge income">
                                            Pemasukan
                                        </span>
                                    </td>

                                    <td>
                                        Sisa dana class meeting
                                    </td>

                                    <td class="amount in">
                                        + Rp 150.000
                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </section>

        </main>

    </div>

</body>

</html>
