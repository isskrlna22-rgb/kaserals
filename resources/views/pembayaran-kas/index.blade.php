<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pembayaran Kas - KASERALS</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f8fafc;
            color: #0f172a;
        }

        button,
        input,
        select {
            font-family: inherit;
        }

        a {
            text-decoration: none;
        }

        /* ========================================
           LAYOUT
        ======================================== */

        .page {
            display: flex;
            min-height: 100vh;
        }

        /* ========================================
           SIDEBAR
        ======================================== */

        .sidebar {
            width: 256px;
            flex-shrink: 0;
            min-height: 100vh;
            background: #0f172a;
            color: white;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 28px;
        }

        .logo-box {
            width: 56px;
            height: 56px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 16px;
            background: #0d9488;

            font-size: 24px;
            font-weight: bold;
        }

        .logo h1 {
            font-size: 24px;
            font-weight: bold;
        }

        .logo p {
            margin-top: 4px;
            font-size: 14px;
            color: #94a3b8;
        }

        .navigation {
            margin-top: 28px;
            padding: 0 16px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 16px;

            margin-bottom: 8px;
            padding: 16px 20px;

            border-radius: 16px;

            color: #cbd5e1;
            font-size: 18px;

            transition:
                background 0.25s ease,
                color 0.25s ease,
                transform 0.2s ease,
                box-shadow 0.25s ease;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.08);
            color: white;
            transform: translateX(3px);
        }

        .nav-link:active {
            transform: scale(0.97);
        }

        .nav-link.active {
            background: #0d9488;
            color: white;
            font-weight: bold;

            box-shadow:
                0 0 0 1px rgba(45, 212, 191, 0.25),
                0 8px 25px rgba(13, 148, 136, 0.25);
        }

        .nav-link.active:hover {
            background: #0f766e;

            box-shadow:
                0 0 0 1px rgba(94, 234, 212, 0.35),
                0 10px 30px rgba(13, 148, 136, 0.35);
        }

        .nav-link span {
            width: 22px;
            text-align: center;
        }

        .section-title {
            margin: 18px 0 12px;
            padding: 0 24px;

            color: #64748b;
            font-size: 14px;
            font-weight: bold;

            letter-spacing: 0.15em;
        }

        /* ========================================
           MAIN
        ======================================== */

        .main {
            display: flex;
            flex: 1;
            min-width: 0;
            flex-direction: column;
        }

        /* ========================================
           TOPBAR
        ======================================== */

        .topbar {
            height: 96px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 36px;

            background: white;
            border-bottom: 1px solid #cbd5e1;
        }

        .topbar h2 {
            font-size: 24px;
            font-weight: bold;
        }

        .avatar {
            width: 56px;
            height: 56px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #ccfbf1;
            color: #0d9488;

            font-weight: bold;

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease;
        }

        .avatar:hover {
            transform: scale(1.06);
            box-shadow: 0 0 20px rgba(13, 148, 136, 0.25);
        }

        /* ========================================
           CONTENT
        ======================================== */

        .content {
            flex: 1;
            padding: 36px;
        }

        .title {
            margin-bottom: 28px;
        }

        .title h1 {
            font-size: 36px;
            font-weight: bold;
        }

        .title p {
            margin-top: 8px;
            color: #64748b;
            font-size: 20px;
        }

        /* ========================================
           TWO COLUMNS
        ======================================== */

        .columns {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 24px;
        }

        /* ========================================
           CARD
        ======================================== */

        .card {
            padding: 28px;

            border: 2px solid #cbd5e1;
            border-radius: 16px;

            background: rgba(255, 255, 255, 0.92);

            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);

            box-shadow:
                0 8px 25px rgba(15, 23, 42, 0.04);

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease,
                border-color 0.25s ease;
        }

        .card:hover {
            transform: translateY(-2px);

            border-color: #99f6e4;

            box-shadow:
                0 15px 35px rgba(15, 23, 42, 0.08),
                0 0 25px rgba(13, 148, 136, 0.06);
        }

        .card h2 {
            margin-bottom: 24px;
            font-size: 24px;
            font-weight: bold;
        }

        /* ========================================
           FORM
        ======================================== */

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 12px;

            font-size: 18px;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            height: 64px;

            padding: 0 20px;

            border: 2px solid #cbd5e1;
            border-radius: 16px;

            background: white;

            font-size: 18px;
            outline: none;

            transition:
                border-color 0.25s ease,
                box-shadow 0.25s ease,
                transform 0.2s ease;
        }

        .form-control:hover {
            border-color: #99f6e4;
        }

        .form-control:focus {
            border-color: #0d9488;

            box-shadow:
                0 0 0 4px rgba(13, 148, 136, 0.12),
                0 0 22px rgba(13, 148, 136, 0.10);

            transform: translateY(-1px);
        }

        select.form-control {
            cursor: pointer;
        }

        /* ========================================
           FORM TWO COLUMN
        ======================================== */

        .form-row {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        /* ========================================
           BUTTON
        ======================================== */

        .buttons {
            display: flex;
            justify-content: flex-end;
            gap: 16px;
        }

        .btn {
            padding: 16px 28px;

            border-radius: 16px;

            font-size: 18px;
            font-weight: bold;

            cursor: pointer;

            transition:
                transform 0.2s ease,
                box-shadow 0.25s ease,
                background 0.25s ease;
        }

        .btn-reset {
            border: 2px solid #cbd5e1;
            background: white;
            color: #0f172a;
        }

        .btn-reset:hover {
            background: #f1f5f9;
            transform: translateY(-2px);
        }

        .btn-save {
            border: 2px solid #0d9488;
            background: #0d9488;
            color: white;

            box-shadow:
                0 6px 18px rgba(13, 148, 136, 0.18);
        }

        .btn-save:hover {
            background: #0f766e;

            transform: translateY(-2px);

            box-shadow:
                0 10px 28px rgba(13, 148, 136, 0.30);
        }

        .btn:active {
            transform: scale(0.96);
        }

        /* ========================================
           PEMBAYARAN HARI INI
        ======================================== */

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
            font-size: 20px;
            font-weight: bold;
        }

        .table-header {
            display: grid;
            grid-template-columns: 1.5fr 1fr auto;

            padding-bottom: 20px;

            border-bottom: 2px solid #cbd5e1;

            color: #94a3b8;

            font-size: 14px;
            font-weight: bold;

            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .payment-row {
            display: grid;
            grid-template-columns: 1.5fr 1fr auto;

            align-items: center;
            gap: 16px;

            padding: 24px 0;

            border-bottom: 1px solid #e2e8f0;
        }

        .student {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .student-avatar {
            width: 44px;
            height: 44px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #ccfbf1;
            color: #0d9488;

            font-weight: bold;
        }

        .student-name {
            font-size: 18px;
            font-weight: 500;
        }

        .nominal {
            text-align: right;

            font-size: 18px;
            font-weight: bold;
        }

        .delete-btn {
            padding: 12px 20px;

            border: 2px solid #fca5a5;
            border-radius: 12px;

            background: white;
            color: #dc2626;

            font-weight: bold;

            cursor: pointer;

            transition:
                background 0.2s ease,
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .delete-btn:hover {
            background: #fef2f2;

            transform: translateY(-2px);

            box-shadow:
                0 6px 15px rgba(220, 38, 38, 0.10);
        }

        .delete-btn:active {
            transform: scale(0.95);
        }

        /* ========================================
           EMPTY
        ======================================== */

        .empty {
            padding: 30px 0;

            text-align: center;

            color: #94a3b8;
            font-size: 15px;
        }

        /* ========================================
           SUCCESS
        ======================================== */

        .success {
            margin-top: 28px;
            padding: 16px;

            border: 2px solid #4ade80;
            border-radius: 16px;

            background: #f0fdf4;
            color: #15803d;

            font-size: 18px;

            box-shadow:
                0 6px 20px rgba(34, 197, 94, 0.08);
        }

        /* ========================================
           RESPONSIVE
        ======================================== */

        @media (max-width: 1200px) {

            .columns {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 900px) {

            .sidebar {
                width: 220px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .content {
                padding: 24px;
            }

        }

        @media (max-width: 700px) {

            .page {
                display: block;
            }

            .sidebar {
                width: 100%;
                min-height: auto;
            }

            .navigation {
                margin-top: 10px;
                padding-bottom: 20px;
            }

            .topbar {
                padding: 0 20px;
            }

            .content {
                padding: 20px;
            }

            .title h1 {
                font-size: 28px;
            }

            .title p {
                font-size: 16px;
            }

            .card {
                padding: 20px;
            }

            .table-header,
            .payment-row {
                grid-template-columns: 1fr;
            }

            .nominal {
                text-align: left;
            }

            .payment-header {
                align-items: flex-start;
                gap: 10px;
                flex-direction: column;
            }

            .buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

        }
    </style>
</head>

<body>

<div class="page">

    <!-- =========================
         SIDEBAR
    ========================= -->

    <aside class="sidebar">

        <!-- LOGO -->

        <div class="logo">

            <div class="logo-box">
                K
            </div>

            <div>

                <h1>
                    KASERALS
                </h1>

                <p>
                    Kas Kelas Digital
                </p>

            </div>

        </div>


        <!-- NAVIGATION -->

        <nav class="navigation">

            <a
                href="{{ route('dashboard') }}"
                class="nav-link"
            >
                <span>
                    □
                </span>

                Dashboard
            </a>


            <a
                href="{{ route('data-siswa.index') }}"
                class="nav-link"
            >
                <span>
                    ◉
                </span>

                Data Siswa
            </a>


            <!-- TRANSAKSI -->

            <p class="section-title">
                TRANSAKSI
            </p>


            <!-- ACTIVE -->

            <a
                href="{{ route('pembayaran-kas.index') }}"
                class="nav-link active"
            >
                <span>
                    ✓
                </span>

                Pembayaran Kas
            </a>


            <a
                href="{{ route('status-pembayaran.index') }}"
                class="nav-link"
            >
                <span>
                    ≡
                </span>

                Status Pembayaran
            </a>


            <a
                href="{{ route('pemasukan.web.index') }}"
                class="nav-link"
            >
                <span>
                    ↓
                </span>

                Pemasukan
            </a>


            <a
                href="{{ route('pengeluaran.web.index') }}"
                class="nav-link"
            >
                <span>
                    ↑
                </span>

                Pengeluaran
            </a>


            <!-- CATATAN -->

            <p class="section-title">
                CATATAN
            </p>


            <a
                href="{{ route('riwayat.index') }}"
                class="nav-link"
            >
                <span>
                    ↻
                </span>

                Riwayat Transaksi
            </a>


            <a
                href="{{ route('laporan.index') }}"
                class="nav-link"
            >
                <span>
                    ▤
                </span>

                Laporan Keuangan
            </a>

        </nav>

    </aside>


    <!-- =========================
         MAIN
    ========================= -->

    <main class="main">

        <!-- TOPBAR -->

        <header class="topbar">

            <h2>
                Pembayaran Kas
            </h2>

            <div class="avatar">
                NS
            </div>

        </header>


        <!-- CONTENT -->

        <section class="content">

            <!-- TITLE -->

            <div class="title">

                <h1>
                    Catat Pembayaran Kas
                </h1>

                <p>
                    Pembayaran akan menambah saldo kas secara otomatis
                </p>

            </div>


            <!-- TWO COLUMNS -->

            <div class="columns">

                <!-- FORM -->

                <div class="card">

                    <h2>
                        Form Pembayaran
                    </h2>


                    <form
                        action="{{ route('pembayaran-kas.store') }}"
                        method="POST"
                    >

                        @csrf


                        <!-- PILIH SISWA -->

                        <div class="form-group">

                            <label for="siswa_id">
                                Pilih Siswa *
                            </label>

                            <select
                                id="siswa_id"
                                name="siswa_id"
                                class="form-control"
                                required
                            >

                                <option value="">
                                    Pilih siswa
                                </option>

                                @foreach($siswa as $item)

                                    <option
                                        value="{{ $item->id }}"
                                        {{ old('siswa_id') == $item->id ? 'selected' : '' }}
                                    >
                                        {{ $item->nama }} — {{ $item->nis }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        <!-- TANGGAL + NOMINAL -->

                        <div class="form-row">

                            <!-- TANGGAL -->

                            <div class="form-group">

                                <label for="tanggal">
                                    Tanggal *
                                </label>

                                <input
                                    id="tanggal"
                                    type="date"
                                    name="tanggal"
                                    value="{{ old('tanggal', now()->format('Y-m-d')) }}"
                                    class="form-control"
                                    required
                                >

                            </div>


                            <!-- NOMINAL -->

                            <div class="form-group">

                                <label for="nominal">
                                    Nominal *
                                </label>

                                <input
                                    id="nominal"
                                    type="number"
                                    name="nominal"
                                    value="{{ old('nominal') }}"
                                    placeholder="20000"
                                    min="1"
                                    class="form-control"
                                    required
                                >

                            </div>

                        </div>


                        <!-- PERIODE -->

                        <div class="form-group">

                            <label for="periode">
                                Periode
                            </label>

                            <select
                                id="periode"
                                name="periode"
                                class="form-control"
                                required
                            >

                                <option value="">
                                    Pilih periode
                                </option>

                                @for($i = 0; $i < 4; $i++)

                                    @php
                                        $periode = now()
                                            ->subMonths($i)
                                            ->translatedFormat('F Y');
                                    @endphp

                                    <option
                                        value="{{ $periode }}"
                                        {{ old('periode') == $periode ? 'selected' : '' }}
                                    >
                                        {{ $periode }}
                                    </option>

                                @endfor

                            </select>

                        </div>


                        <!-- KETERANGAN -->

                        <div class="form-group">

                            <label for="keterangan">
                                Keterangan
                            </label>

                            <input
                                id="keterangan"
                                type="text"
                                name="keterangan"
                                value="{{ old('keterangan') }}"
                                placeholder="Opsional"
                                class="form-control"
                            >

                        </div>


                        <!-- BUTTONS -->

                        <div class="buttons">

                            <button
                                type="reset"
                                class="btn btn-reset"
                            >
                                Reset
                            </button>


                            <button
                                type="submit"
                                class="btn btn-save"
                            >
                                Simpan Pembayaran
                            </button>

                        </div>

                    </form>

                </div>


                <!-- PEMBAYARAN HARI INI -->

                <div class="card">

                    @php

                        $pembayaranHariIni = $pembayaran->filter(function ($item) {

                            return $item->tanggal &&
                                $item->tanggal->format('Y-m-d') === now()->format('Y-m-d');

                        });

                        $totalHariIni = $pembayaranHariIni->sum('nominal');

                    @endphp


                    <!-- TITLE -->

                    <div class="payment-header">

                        <h2>
                            Pembayaran Hari Ini
                        </h2>

                        <span class="total">
                            Rp {{ number_format($totalHariIni, 0, ',', '.') }}
                        </span>

                    </div>


                    <!-- TABLE HEADER -->

                    <div class="table-header">

                        <span>
                            Nama
                        </span>

                        <span>
                            Nominal
                        </span>

                        <span></span>

                    </div>


                    @forelse($pembayaranHariIni as $item)

                        <!-- PEMBAYARAN -->

                        <div class="payment-row">

                            <div class="student">

                                <div class="student-avatar">
                                    {{ strtoupper(substr($item->siswa->nama ?? 'S', 0, 2)) }}
                                </div>

                                <span class="student-name">
                                    {{ $item->siswa->nama ?? 'Siswa' }}
                                </span>

                            </div>


                            <span class="nominal">
                                Rp {{ number_format($item->nominal, 0, ',', '.') }}
                            </span>


                            <form
                                action="{{ route('pembayaran-kas.destroy', $item->id) }}"
                                method="POST"
                                onsubmit="return confirm('Hapus pembayaran ini?')"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="delete-btn"
                                >
                                    Hapus
                                </button>

                            </form>

                        </div>

                    @empty

                        <div class="empty">
                            Belum ada pembayaran hari ini.
                        </div>

                    @endforelse


                    @if(session('success'))

                        <!-- SUCCESS MESSAGE -->

                        <div class="success">

                            <span>
                                ✓
                            </span>

                            {{ session('success') }}

                        </div>

                    @endif

                </div>

            </div>

        </section>

    </main>

</div>

</body>

</html>
