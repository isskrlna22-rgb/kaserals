<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Status Pembayaran - KASERALS</title>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --navy: #0f172a;
            --teal: #0d9488;
            --teal-dark: #0f766e;
            --teal-light: #ccfbf1;

            --bg: #f6f8fb;
            --white: #ffffff;

            --text: #0f172a;
            --muted: #64748b;
            --soft: #94a3b8;

            --border: #e2e8f0;

            --green: #16a34a;
            --green-bg: #f0fdf4;

            --red: #dc2626;
            --red-bg: #fef2f2;

            --shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
        }

        body {
            margin: 0;
            font-family: "Plus Jakarta Sans", sans-serif;
            background: var(--bg);
            color: var(--text);
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* =========================
           LAYOUT
        ========================= */

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            width: 270px;
            flex-shrink: 0;
            background: var(--navy);
            color: white;
            display: flex;
            flex-direction: column;
        }

        .logo-area {
            padding: 32px 28px 28px;
        }

        .logo-wrapper {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .logo-box {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            background: var(--teal);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 800;
            box-shadow: 0 8px 25px rgba(13, 148, 136, 0.25);
        }

        .logo-title {
            margin: 0;
            font-size: 20px;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .logo-subtitle {
            margin: 4px 0 0;
            font-size: 12px;
            color: #94a3b8;
        }

        /* =========================
           NAVIGATION
        ========================= */

        .navigation {
            flex: 1;
            padding: 0 16px;
        }

        .nav-section-title {
            margin: 0 0 12px;
            padding: 0 16px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.18em;
            color: #64748b;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;

            margin-bottom: 8px;
            padding: 14px 16px;

            border-radius: 16px;

            color: #cbd5e1;
            font-size: 14px;
            font-weight: 600;

            transition: all 0.25s ease;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.06);
            transform: translateX(3px);
            color: white;
        }

        .nav-link.active {
            background: var(--teal);
            color: white;
            font-weight: 700;

            box-shadow:
                0 8px 24px rgba(13, 148, 136, 0.25),
                inset 0 1px 0 rgba(255, 255, 255, 0.12);
        }

        .nav-icon {
            width: 36px;
            height: 36px;
            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;
            background: rgba(255, 255, 255, 0.05);

            font-size: 16px;
        }

        .nav-link.active .nav-icon {
            background: rgba(255, 255, 255, 0.15);
        }

        .nav-spacer {
            margin-bottom: 24px;
        }

        /* =========================
           SIDEBAR USER
        ========================= */

        .sidebar-user {
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .user-card {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 12px;
            border-radius: 16px;

            background: rgba(255, 255, 255, 0.05);

            transition: 0.25s ease;
        }

        .user-card:hover {
            background: rgba(255, 255, 255, 0.08);
        }

        .avatar {
            width: 44px;
            height: 44px;
            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #ccfbf1;
            color: var(--teal);

            font-size: 14px;
            font-weight: 800;

            transition: 0.25s ease;
        }

        .avatar:hover {
            transform: scale(1.06);
            box-shadow: 0 0 0 5px rgba(13, 148, 136, 0.12);
        }

        .user-name {
            margin: 0;
            font-size: 14px;
            font-weight: 700;
        }

        .user-role {
            margin: 3px 0 0;
            font-size: 12px;
            color: #94a3b8;
        }

        /* =========================
           MAIN
        ========================= */

        .main {
            min-width: 0;
            flex: 1;
        }

        /* =========================
           TOPBAR
        ========================= */

        .topbar {
            height: 78px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 40px;

            background: rgba(255, 255, 255, 0.9);
            border-bottom: 1px solid var(--border);

            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
        }

        .breadcrumb {
            margin: 0;
            font-size: 11px;
            font-weight: 700;
            color: #94a3b8;
            letter-spacing: 0.04em;
        }

        .page-title-small {
            margin: 4px 0 0;
            font-size: 18px;
            font-weight: 800;
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .topbar-user-info {
            text-align: right;
        }

        .topbar-user-name {
            margin: 0;
            font-size: 14px;
            font-weight: 700;
        }

        .topbar-user-role {
            margin: 3px 0 0;
            font-size: 12px;
            color: #94a3b8;
        }

        .topbar-avatar {
            width: 44px;
            height: 44px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #f0fdfa;
            color: var(--teal);

            font-size: 14px;
            font-weight: 800;

            transition: 0.25s ease;
        }

        .topbar-avatar:hover {
            transform: scale(1.05);
            box-shadow: 0 0 0 5px rgba(13, 148, 136, 0.1);
        }

        /* =========================
           CONTENT
        ========================= */

        .content {
            padding: 40px;
        }

        .page-heading {
            margin-bottom: 32px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 7px 12px;
            border-radius: 999px;

            background: #f0fdfa;
            color: var(--teal);

            font-size: 12px;
            font-weight: 800;
        }

        .badge-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--teal);
        }

        .page-heading h1 {
            margin: 12px 0 0;

            font-size: 36px;
            line-height: 1.2;
            font-weight: 800;
            letter-spacing: -0.8px;
        }

        .page-heading p {
            max-width: 680px;
            margin: 10px 0 0;

            font-size: 14px;
            line-height: 1.7;
            color: var(--muted);
        }

        /* =========================
           SUMMARY CARDS
        ========================= */

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;

            margin-bottom: 28px;
        }

        .summary-card {
            padding: 24px;

            border: 1px solid var(--border);
            border-radius: 24px;

            background: rgba(255, 255, 255, 0.82);

            box-shadow: var(--shadow);

            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);

            transition: all 0.25s ease;
        }

        .summary-card:hover {
            transform: translateY(-4px);
            box-shadow:
                0 18px 40px rgba(15, 23, 42, 0.08),
                0 0 25px rgba(13, 148, 136, 0.05);
        }

        .summary-card.green {
            background: rgba(240, 253, 244, 0.85);
            border-color: #dcfce7;
        }

        .summary-card.red {
            background: rgba(254, 242, 242, 0.85);
            border-color: #fee2e2;
        }

        .summary-card.dark {
            background: var(--navy);
            color: white;
            border-color: var(--navy);
        }

        .summary-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .summary-label {
            margin: 0;
            font-size: 13px;
            font-weight: 700;
            color: var(--muted);
        }

        .green .summary-label {
            color: #15803d;
        }

        .red .summary-label {
            color: #b91c1c;
        }

        .dark .summary-label {
            color: #94a3b8;
        }

        .summary-number {
            margin: 10px 0 0;
            font-size: 30px;
            font-weight: 800;
        }

        .dark .summary-number {
            font-size: 23px;
        }

        .summary-icon {
            width: 48px;
            height: 48px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 16px;
            background: #f1f5f9;

            font-size: 17px;
        }

        .green .summary-icon {
            background: white;
            color: var(--green);
        }

        .red .summary-icon {
            background: white;
            color: var(--red);
        }

        .dark .summary-icon {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .summary-description {
            margin: 12px 0 0;
            font-size: 11px;
            color: #94a3b8;
        }

        .green .summary-description {
            color: #16a34a;
        }

        .red .summary-description {
            color: #dc2626;
        }

        .dark .summary-description {
            color: #94a3b8;
        }

        /* =========================
           PROGRESS CARD
        ========================= */

        .progress-card {
            margin-bottom: 28px;
            padding: 28px;

            border: 1px solid var(--border);
            border-radius: 24px;

            background: rgba(255, 255, 255, 0.82);

            box-shadow: var(--shadow);

            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .progress-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;

            margin-bottom: 18px;
        }

        .progress-title {
            margin: 0;
            font-size: 18px;
            font-weight: 800;
        }

        .progress-description {
            margin: 5px 0 0;
            font-size: 13px;
            color: var(--soft);
        }

        .progress-percentage {
            font-size: 24px;
            font-weight: 800;
            color: var(--teal);
        }

        .progress-track {
            width: 100%;
            height: 12px;

            overflow: hidden;
            border-radius: 999px;

            background: #f1f5f9;
        }

        .progress-bar {
            height: 100%;
            border-radius: 999px;

            background: linear-gradient(
                90deg,
                var(--teal),
                #14b8a6
            );

            transition: width 0.5s ease;

            box-shadow: 0 0 12px rgba(13, 148, 136, 0.3);
        }

        .progress-footer {
            display: flex;
            justify-content: space-between;

            margin-top: 10px;

            font-size: 11px;
            color: var(--soft);
        }

        /* =========================
           TABLE CARD
        ========================= */

        .table-card {
            overflow: hidden;

            border: 1px solid var(--border);
            border-radius: 24px;

            background: rgba(255, 255, 255, 0.88);

            box-shadow: var(--shadow);

            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .table-header {
            padding: 28px;
            border-bottom: 1px solid #f1f5f9;
        }

        .table-header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .table-label {
            margin: 0;

            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;

            color: var(--teal);
        }

        .table-title {
            margin: 5px 0 0;
            font-size: 20px;
            font-weight: 800;
        }

        .student-count {
            padding: 9px 13px;
            border-radius: 12px;

            background: #f1f5f9;
            color: var(--muted);

            font-size: 11px;
            font-weight: 800;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 760px;
            border-collapse: collapse;
        }

        thead {
            background: #f8fafc;
        }

        th {
            padding: 16px 24px;

            border-bottom: 1px solid #f1f5f9;

            text-align: left;

            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;

            color: var(--soft);
        }

        td {
            padding: 20px 24px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 13px;
        }

        tbody tr {
            transition: all 0.2s ease;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .number-cell {
            font-weight: 800;
            color: var(--soft);
        }

        .student-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .student-avatar {
            width: 40px;
            height: 40px;
            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #f0fdfa;
            color: var(--teal);

            font-size: 13px;
            font-weight: 800;

            transition: 0.2s ease;
        }

        tr:hover .student-avatar {
            box-shadow: 0 0 0 5px rgba(13, 148, 136, 0.08);
        }

        .student-name {
            margin: 0;
            font-size: 13px;
            font-weight: 800;
            color: #1e293b;
        }

        .student-id {
            margin: 4px 0 0;
            font-size: 10px;
            color: var(--soft);
        }

        .normal-cell {
            font-size: 12px;
            font-weight: 600;
            color: #475569;
        }

        .total-cell {
            text-align: right;
            font-size: 13px;
            font-weight: 800;
            color: #1e293b;
        }

        .transaction-cell {
            text-align: center;
        }

        .transaction-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            min-width: 36px;

            padding: 8px 12px;
            border-radius: 12px;

            background: #f1f5f9;
            color: #475569;

            font-size: 11px;
            font-weight: 800;
        }

        .status-cell {
            text-align: center;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            padding: 8px 12px;
            border-radius: 999px;

            font-size: 10px;
            font-weight: 800;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
        }

        .status.paid {
            background: var(--green-bg);
            color: #15803d;
        }

        .status.paid .status-dot {
            background: #22c55e;
            box-shadow: 0 0 8px rgba(34, 197, 94, 0.4);
        }

        .status.unpaid {
            background: var(--red-bg);
            color: #b91c1c;
        }

        .status.unpaid .status-dot {
            background: #ef4444;
            box-shadow: 0 0 8px rgba(239, 68, 68, 0.4);
        }

        /* =========================
           EMPTY STATE
        ========================= */

        .empty-state {
            padding: 64px 24px;
            text-align: center;
        }

        .empty-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 18px;

            background: #f1f5f9;
            color: var(--soft);

            font-size: 24px;
        }

        .empty-title {
            margin: 16px 0 0;

            font-size: 15px;
            font-weight: 800;
            color: #334155;
        }

        .empty-description {
            margin: 5px 0 0;

            font-size: 12px;
            color: var(--soft);
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1100px) {
            .summary-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 900px) {
            .sidebar {
                display: none;
            }

            .topbar {
                padding: 0 24px;
            }

            .content {
                padding: 28px 24px;
            }
        }

        @media (max-width: 600px) {
            .topbar {
                padding: 0 18px;
            }

            .content {
                padding: 24px 18px;
            }

            .topbar-user-info {
                display: none;
            }

            .page-heading h1 {
                font-size: 28px;
            }

            .summary-grid {
                grid-template-columns: 1fr;
            }

            .summary-card,
            .progress-card,
            .table-header {
                padding: 20px;
            }

            .progress-footer {
                flex-direction: column;
                gap: 5px;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- =========================
         SIDEBAR
    ========================= -->
    <aside class="sidebar">

        <!-- LOGO -->
        <div class="logo-area">
            <div class="logo-wrapper">

                <div class="logo-box">
                    K
                </div>

                <div>
                    <h1 class="logo-title">
                        KASERALS
                    </h1>

                    <p class="logo-subtitle">
                        Kas Kelas Digital
                    </p>
                </div>

            </div>
        </div>


        <!-- NAVIGATION -->
        <nav class="navigation">

            <p class="nav-section-title">
                Utama
            </p>

            <a href="{{ route('dashboard') }}" class="nav-link">
                <span class="nav-icon">
                    ◫
                </span>
                Dashboard
            </a>

            <a href="{{ route('data-siswa.index') }}" class="nav-link nav-spacer">
                <span class="nav-icon">
                    ◉
                </span>
                Data Siswa
            </a>


            <p class="nav-section-title">
                Transaksi
            </p>

            <a href="{{ route('pembayaran-kas.index') }}" class="nav-link">
                <span class="nav-icon">
                    ✓
                </span>
                Pembayaran Kas
            </a>

            <!-- ACTIVE -->
            <a href="{{ route('status-pembayaran.index') }}" class="nav-link active">
                <span class="nav-icon">
                    ≡
                </span>
                Status Pembayaran
            </a>

            <a href="{{ route('pemasukan.web.index') }}" class="nav-link">
                <span class="nav-icon">
                    ↓
                </span>
                Pemasukan
            </a>

            <a href="{{ route('pengeluaran.web.index') }}" class="nav-link nav-spacer">
                <span class="nav-icon">
                    ↑
                </span>
                Pengeluaran
            </a>


            <p class="nav-section-title">
                Catatan
            </p>

            <a href="{{ route('riwayat.index') }}" class="nav-link">
                <span class="nav-icon">
                    ↻
                </span>
                Riwayat Transaksi
            </a>

            <a href="{{ route('laporan.index') }}" class="nav-link">
                <span class="nav-icon">
                    ▤
                </span>
                Laporan Keuangan
            </a>

        </nav>


        <!-- USER -->
        <div class="sidebar-user">

            <div class="user-card">

                <div class="avatar">
                    IK
                </div>

                <div>
                    <p class="user-name">
                        Iis Karlina
                    </p>

                    <p class="user-role">
                        Bendahara
                    </p>
                </div>

            </div>

        </div>

    </aside>


    <!-- =========================
         MAIN
    ========================= -->
    <main class="main">

        <!-- TOPBAR -->
        <header class="topbar">

            <div>
                <p class="breadcrumb">
                    TRANSAKSI / PEMBAYARAN
                </p>

                <h2 class="page-title-small">
                    Status Pembayaran
                </h2>
            </div>


            <div class="topbar-user">

                <div class="topbar-user-info">

                    <p class="topbar-user-name">
                        Iis Karlina
                    </p>

                    <p class="topbar-user-role">
                        Bendahara
                    </p>

                </div>

                <div class="topbar-avatar">
                    IK
                </div>

            </div>

        </header>


        <!-- CONTENT -->
        <section class="content">

            <!-- PAGE HEADING -->
            <div class="page-heading">

                <div class="badge">
                    <span class="badge-dot"></span>
                    Monitoring Pembayaran
                </div>

                <h1>
                    Status Pembayaran Siswa
                </h1>

                <p>
                    Pantau siswa yang sudah melakukan pembayaran kas
                    dan siswa yang belum melakukan pembayaran.
                </p>

            </div>


            <!-- =========================
                 PERHITUNGAN
            ========================= -->
            @php

                $totalSiswa = $siswa->count();

                $sudahBayar = $siswa->filter(function ($item) {
                    return $item->pembayaranKas->count() > 0;
                })->count();

                $belumBayar = $totalSiswa - $sudahBayar;

                $persentase = $totalSiswa > 0
                    ? round(($sudahBayar / $totalSiswa) * 100)
                    : 0;

                $totalPembayaran = $siswa->sum(function ($item) {
                    return $item->pembayaranKas->sum('nominal');
                });

            @endphp


            <!-- =========================
                 SUMMARY CARDS
            ========================= -->
            <div class="summary-grid">

                <!-- TOTAL SISWA -->
                <div class="summary-card">

                    <div class="summary-top">

                        <div>
                            <p class="summary-label">
                                Total Siswa
                            </p>

                            <p class="summary-number">
                                {{ $totalSiswa }}
                            </p>
                        </div>

                        <div class="summary-icon">
                            ◉
                        </div>

                    </div>

                    <p class="summary-description">
                        Siswa terdaftar
                    </p>

                </div>


                <!-- SUDAH BAYAR -->
                <div class="summary-card green">

                    <div class="summary-top">

                        <div>
                            <p class="summary-label">
                                Sudah Bayar
                            </p>

                            <p class="summary-number">
                                {{ $sudahBayar }}
                            </p>
                        </div>

                        <div class="summary-icon">
                            ✓
                        </div>

                    </div>

                    <p class="summary-description">
                        {{ $persentase }}% dari seluruh siswa
                    </p>

                </div>


                <!-- BELUM BAYAR -->
                <div class="summary-card red">

                    <div class="summary-top">

                        <div>
                            <p class="summary-label">
                                Belum Bayar
                            </p>

                            <p class="summary-number">
                                {{ $belumBayar }}
                            </p>
                        </div>

                        <div class="summary-icon">
                            !
                        </div>

                    </div>

                    <p class="summary-description">
                        Perlu dipantau
                    </p>

                </div>


                <!-- TOTAL NOMINAL -->
                <div class="summary-card dark">

                    <div class="summary-top">

                        <div>
                            <p class="summary-label">
                                Total Pembayaran
                            </p>

                            <p class="summary-number">
                                Rp {{ number_format($totalPembayaran, 0, ',', '.') }}
                            </p>
                        </div>

                        <div class="summary-icon">
                            Rp
                        </div>

                    </div>

                    <p class="summary-description">
                        Dari seluruh siswa
                    </p>

                </div>

            </div>


            <!-- =========================
                 PROGRESS
            ========================= -->
            <div class="progress-card">

                <div class="progress-header">

                    <div>
                        <h2 class="progress-title">
                            Ringkasan Pembayaran
                        </h2>

                        <p class="progress-description">
                            Persentase siswa yang sudah membayar.
                        </p>
                    </div>

                    <span class="progress-percentage">
                        {{ $persentase }}%
                    </span>

                </div>


                <div class="progress-track">

                    <div
                        class="progress-bar"
                        style="width: {{ $persentase }}%;">
                    </div>

                </div>


                <div class="progress-footer">

                    <span>
                        {{ $sudahBayar }} siswa sudah bayar
                    </span>

                    <span>
                        {{ $belumBayar }} siswa belum bayar
                    </span>

                </div>

            </div>


            <!-- =========================
                 TABLE
            ========================= -->
            <div class="table-card">

                <!-- TABLE HEADER -->
                <div class="table-header">

                    <div class="table-header-content">

                        <div>

                            <p class="table-label">
                                Data Pembayaran
                            </p>

                            <h2 class="table-title">
                                Daftar Status Siswa
                            </h2>

                        </div>

                        <div class="student-count">
                            {{ $totalSiswa }} siswa
                        </div>

                    </div>

                </div>


                <!-- TABLE -->
                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    No
                                </th>

                                <th>
                                    Siswa
                                </th>

                                <th>
                                    NIS
                                </th>

                                <th>
                                    Kelas
                                </th>

                                <th style="text-align: right;">
                                    Total Bayar
                                </th>

                                <th style="text-align: center;">
                                    Transaksi
                                </th>

                                <th style="text-align: center;">
                                    Status
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($siswa as $index => $item)

                                @php

                                    $jumlahTransaksi =
                                        $item->pembayaranKas->count();

                                    $totalBayar =
                                        $item->pembayaranKas->sum('nominal');

                                    $sudah =
                                        $jumlahTransaksi > 0;

                                @endphp


                                <tr>

                                    <!-- NO -->
                                    <td class="number-cell">
                                        {{ $index + 1 }}
                                    </td>


                                    <!-- SISWA -->
                                    <td>

                                        <div class="student-info">

                                            <div class="student-avatar">
                                                {{ strtoupper(substr($item->nama, 0, 1)) }}
                                            </div>

                                            <div>

                                                <p class="student-name">
                                                    {{ $item->nama }}
                                                </p>

                                                <p class="student-id">
                                                    ID Siswa #{{ $item->id }}
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    <!-- NIS -->
                                    <td class="normal-cell">
                                        {{ $item->nis }}
                                    </td>


                                    <!-- KELAS -->
                                    <td class="normal-cell">
                                        {{ $item->kelas }}
                                    </td>


                                    <!-- TOTAL -->
                                    <td class="total-cell">
                                        Rp {{ number_format($totalBayar, 0, ',', '.') }}
                                    </td>


                                    <!-- TRANSAKSI -->
                                    <td class="transaction-cell">

                                        <span class="transaction-count">
                                            {{ $jumlahTransaksi }}
                                        </span>

                                    </td>


                                    <!-- STATUS -->
                                    <td class="status-cell">

                                        @if($sudah)

                                            <span class="status paid">

                                                <span class="status-dot"></span>

                                                SUDAH BAYAR

                                            </span>

                                        @else

                                            <span class="status unpaid">

                                                <span class="status-dot"></span>

                                                BELUM BAYAR

                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="7">

                                        <div class="empty-state">

                                            <div class="empty-icon">
                                                ◉
                                            </div>

                                            <h3 class="empty-title">
                                                Belum ada data siswa
                                            </h3>

                                            <p class="empty-description">
                                                Tambahkan data siswa terlebih dahulu.
                                            </p>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </section>

    </main>

</div>

</body>
</html>
