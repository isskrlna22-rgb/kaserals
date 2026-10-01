<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pengeluaran - KASERALS</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background:
                radial-gradient(circle at top right, rgba(13, 148, 136, 0.08), transparent 30%),
                #f8fafc;
            color: #0f172a;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button,
        input,
        select {
            font-family: inherit;
        }

        /* =========================
           LAYOUT
        ========================= */

        .app {
            display: flex;
            min-height: 100vh;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            width: 256px;
            flex-shrink: 0;
            min-height: 100vh;
            padding: 28px 16px;
            background: linear-gradient(180deg, #0f172a 0%, #111827 100%);
            color: white;
        }

        .logo-area {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 0 16px;
            margin-bottom: 34px;
        }

        .logo-box {
            width: 56px;
            height: 56px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0d9488, #14b8a6);
            font-size: 25px;
            font-weight: 800;
            box-shadow: 0 10px 30px rgba(13, 148, 136, 0.25);
        }

        .logo-title {
            font-size: 21px;
            font-weight: 800;
        }

        .logo-subtitle {
            margin-top: 3px;
            color: #94a3b8;
            font-size: 12px;
        }

        .nav {
            margin-top: 10px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 14px 18px;
            margin-bottom: 7px;
            border-radius: 16px;
            color: #cbd5e1;
            font-size: 15px;
            font-weight: 600;
            transition: 0.25s ease;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.07);
            color: white;
            transform: translateX(2px);
        }

        .nav-link.active {
            background: linear-gradient(135deg, #0d9488, #0f766e);
            color: white;
            box-shadow:
                0 10px 25px rgba(13, 148, 136, 0.25),
                inset 0 1px 0 rgba(255, 255, 255, 0.15);
        }

        .nav-icon {
            width: 24px;
            text-align: center;
            font-size: 18px;
        }

        .nav-section {
            padding: 14px 20px 9px;
            color: #64748b;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        /* =========================
           MAIN
        ========================= */

        .main {
            flex: 1;
            min-width: 0;
        }

        .topbar {
            height: 92px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            background: rgba(255, 255, 255, 0.82);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid #e2e8f0;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .topbar-title {
            font-size: 23px;
            font-weight: 800;
        }

        .profile {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ccfbf1;
            color: #0f766e;
            font-size: 14px;
            font-weight: 800;
            border: 2px solid white;
            box-shadow: 0 6px 18px rgba(15, 118, 110, 0.12);
        }

        /* =========================
           CONTENT
        ========================= */

        .content {
            padding: 40px;
        }

        .page-title {
            margin-bottom: 30px;
        }

        .page-title h1 {
            font-size: 34px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .page-title p {
            margin-top: 9px;
            color: #64748b;
            font-size: 16px;
        }

        .expense-total {
            color: #dc2626;
            font-weight: 800;
        }

        /* =========================
           ALERT
        ========================= */

        .alert {
            padding: 15px 18px;
            margin-bottom: 22px;
            border-radius: 16px;
            font-size: 14px;
            font-weight: 600;
        }

        .alert-success {
            border: 1px solid #bbf7d0;
            background: #f0fdf4;
            color: #15803d;
        }

        .alert-error {
            border: 1px solid #fecaca;
            background: #fef2f2;
            color: #b91c1c;
        }

        .alert-error p {
            margin-bottom: 7px;
            font-weight: 800;
        }

        .alert-error ul {
            padding-left: 20px;
        }

        /* =========================
           GRID
        ========================= */

        .content-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, 1.15fr);
            gap: 24px;
        }

        .card {
            padding: 28px;
            border: 1px solid rgba(226, 232, 240, 0.9);
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.88);
            box-shadow:
                0 10px 35px rgba(15, 23, 42, 0.05),
                0 1px 2px rgba(15, 23, 42, 0.04);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
        }

        .card-title {
            margin-bottom: 25px;
            font-size: 20px;
            font-weight: 800;
        }

        /* =========================
           FORM
        ========================= */

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 9px;
            color: #334155;
            font-size: 14px;
            font-weight: 800;
        }

        .form-input,
        .form-select {
            width: 100%;
            height: 56px;
            padding: 0 17px;
            border: 1.5px solid #cbd5e1;
            border-radius: 15px;
            outline: none;
            background: rgba(255, 255, 255, 0.9);
            color: #0f172a;
            font-size: 14px;
            transition: 0.25s ease;
        }

        .form-input::placeholder {
            color: #94a3b8;
        }

        .form-input:hover,
        .form-select:hover {
            border-color: #94a3b8;
        }

        .form-input:focus,
        .form-select:focus {
            border-color: #0d9488;
            box-shadow:
                0 0 0 4px rgba(13, 148, 136, 0.10),
                0 8px 20px rgba(13, 148, 136, 0.08);
            transform: translateY(-1px);
        }

        /* =========================
           WARNING
        ========================= */

        .warning {
            margin-bottom: 22px;
            padding: 15px 18px;
            border: 1px solid #fde68a;
            border-radius: 16px;
            background: #fffbeb;
            color: #b45309;
            font-size: 13px;
            line-height: 1.6;
        }

        /* =========================
           BUTTON
        ========================= */

        .btn-submit {
            width: 100%;
            height: 56px;
            border: none;
            border-radius: 15px;
            background: linear-gradient(135deg, #0d9488, #0f766e);
            color: white;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.25s ease;
            box-shadow: 0 10px 22px rgba(13, 148, 136, 0.20);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 28px rgba(13, 148, 136, 0.28);
        }

        .btn-submit:active {
            transform: translateY(1px) scale(0.99);
            box-shadow: 0 5px 12px rgba(13, 148, 136, 0.18);
        }

        /* =========================
           TABLE
        ========================= */

        .table-header {
            display: grid;
            grid-template-columns: 1fr 1.2fr 1fr auto;
            gap: 12px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e2e8f0;
            color: #94a3b8;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .expense-row {
            display: grid;
            grid-template-columns: 1fr 1.2fr 1fr auto;
            align-items: center;
            gap: 12px;
            padding: 19px 0;
            border-bottom: 1px solid #f1f5f9;
            transition: 0.2s ease;
        }

        .expense-row:hover {
            padding-left: 6px;
            padding-right: 6px;
            border-radius: 12px;
            background: rgba(220, 38, 38, 0.025);
        }

        .expense-date,
        .expense-category {
            color: #475569;
            font-size: 13px;
        }

        .expense-description {
            margin-top: 4px;
            color: #94a3b8;
            font-size: 11px;
        }

        .expense-nominal {
            text-align: right;
            color: #dc2626;
            font-size: 14px;
            font-weight: 800;
        }

        .btn-edit {
            padding: 9px 13px;
            border: 1px solid #cbd5e1;
            border-radius: 11px;
            background: white;
            color: #334155;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn-edit:hover {
            border-color: #0d9488;
            background: #f0fdfa;
            color: #0f766e;
        }

        .btn-edit:active {
            transform: scale(0.96);
        }

        .empty-state {
            padding: 45px 15px;
            text-align: center;
            color: #94a3b8;
            font-size: 14px;
        }

        /* =========================
           TOTAL
        ========================= */

        .total-area {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 30px;
            padding-top: 22px;
        }

        .total-label {
            font-size: 16px;
            font-weight: 800;
        }

        .total-value {
            color: #dc2626;
            font-size: 18px;
            font-weight: 800;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1100px) {
            .sidebar {
                width: 225px;
            }

            .content {
                padding: 28px;
            }

            .topbar {
                padding: 0 28px;
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 800px) {
            .sidebar {
                display: none;
            }

            .topbar {
                height: 76px;
                padding: 0 20px;
            }

            .topbar-title {
                font-size: 19px;
            }

            .content {
                padding: 22px 18px;
            }

            .page-title h1 {
                font-size: 28px;
            }
        }

        @media (max-width: 600px) {
            .card {
                padding: 20px;
                border-radius: 19px;
            }

            .table-header {
                grid-template-columns: 1fr 1fr;
            }

            .table-header span:nth-child(3),
            .table-header span:nth-child(4) {
                display: none;
            }

            .expense-row {
                grid-template-columns: 1fr 1fr;
                gap: 8px;
            }

            .expense-nominal {
                text-align: left;
            }

            .btn-edit {
                grid-column: 2;
                justify-self: end;
            }

            .total-area {
                gap: 15px;
            }
        }
    </style>
</head>

<body>

<div class="app">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <!-- LOGO -->
        <div class="logo-area">

            <div class="logo-box">
                K
            </div>

            <div>
                <div class="logo-title">
                    KASERALS
                </div>

                <div class="logo-subtitle">
                    Kas Kelas Digital
                </div>
            </div>

        </div>


        <!-- NAVIGATION -->
        <nav class="nav">

            <a href="{{ route('dashboard') }}" class="nav-link">
                <span class="nav-icon">□</span>
                Dashboard
            </a>

            <a href="{{ route('data-siswa.index') }}" class="nav-link">
                <span class="nav-icon">◉</span>
                Data Siswa
            </a>


            <!-- TRANSAKSI -->
            <div class="nav-section">
                TRANSAKSI
            </div>

            <a href="{{ route('pembayaran-kas.index') }}" class="nav-link">
                <span class="nav-icon">✓</span>
                Pembayaran Kas
            </a>

            <a href="{{ route('status-pembayaran.index') }}" class="nav-link">
                <span class="nav-icon">≡</span>
                Status Pembayaran
            </a>

            <a href="{{ route('pemasukan.web.index') }}" class="nav-link">
                <span class="nav-icon">↓</span>
                Pemasukan
            </a>

            <!-- ACTIVE -->
            <a href="{{ route('pengeluaran.web.index') }}" class="nav-link active">
                <span class="nav-icon">↑</span>
                Pengeluaran
            </a>


            <!-- CATATAN -->
            <div class="nav-section">
                CATATAN
            </div>

            <a href="{{ route('riwayat.index') }}" class="nav-link">
                <span class="nav-icon">↻</span>
                Riwayat Transaksi
            </a>

            <a href="{{ route('laporan.index') }}" class="nav-link">
                <span class="nav-icon">▤</span>
                Laporan Keuangan
            </a>

        </nav>

    </aside>


    <!-- MAIN -->
    <main class="main">

        <!-- TOPBAR -->
        <header class="topbar">

            <h2 class="topbar-title">
                Pengeluaran
            </h2>

            <div class="profile">
                IK
            </div>

        </header>


        <!-- CONTENT -->
        <section class="content">

            <!-- SUCCESS MESSAGE -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif


            <!-- VALIDATION ERROR -->
            @if($errors->any())
                <div class="alert alert-error">

                    <p>
                        Data belum dapat disimpan:
                    </p>

                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>
            @endif


            <!-- TITLE -->
            <div class="page-title">

                <h1>
                    Pengeluaran Kas
                </h1>

                <p>
                    Total pengeluaran bulan ini:
                    <span class="expense-total">
                        Rp {{ number_format($pengeluaran->sum('nominal'), 0, ',', '.') }}
                    </span>
                </p>

            </div>


            <!-- CONTENT GRID -->
            <div class="content-grid">


                <!-- FORM -->
                <div class="card">

                    <h2 class="card-title">
                        Tambah Pengeluaran
                    </h2>

                    <form
                        action="{{ route('pengeluaran.web.store') }}"
                        method="POST"
                    >

                        @csrf


                        <!-- TANGGAL -->
                        <div class="form-group">

                            <label class="form-label">
                                Tanggal *
                            </label>

                            <input
                                type="date"
                                name="tanggal"
                                value="{{ old('tanggal', date('Y-m-d')) }}"
                                required
                                class="form-input"
                            >

                        </div>


                        <!-- KATEGORI -->
                        <div class="form-group">

                            <label class="form-label">
                                Kategori *
                            </label>

                            <select
                                name="kategori"
                                required
                                class="form-select"
                            >

                                <option value="">
                                    Pilih kategori
                                </option>

                                <option value="Kegiatan">
                                    Kegiatan
                                </option>

                                <option value="Perlengkapan">
                                    Perlengkapan
                                </option>

                                <option value="Konsumsi">
                                    Konsumsi
                                </option>

                                <option value="Dokumentasi">
                                    Dokumentasi
                                </option>

                                <option value="Lainnya">
                                    Lainnya
                                </option>

                            </select>

                        </div>


                        <!-- NOMINAL -->
                        <div class="form-group">

                            <label class="form-label">
                                Nominal *
                            </label>

                            <input
                                type="number"
                                name="nominal"
                                value="{{ old('nominal') }}"
                                min="1"
                                required
                                placeholder="150000"
                                class="form-input"
                            >

                        </div>


                        <!-- KETERANGAN -->
                        <div class="form-group">

                            <label class="form-label">
                                Keterangan
                            </label>

                            <input
                                type="text"
                                name="keterangan"
                                value="{{ old('keterangan') }}"
                                placeholder="Penjelasan singkat"
                                class="form-input"
                            >

                        </div>


                        <!-- WARNING -->
                        <div class="warning">
                            Pastikan nominal pengeluaran sesuai dengan kondisi saldo kas.
                        </div>


                        <!-- BUTTON -->
                        <button
                            type="submit"
                            class="btn-submit"
                        >
                            Simpan Pengeluaran
                        </button>

                    </form>

                </div>


                <!-- DAFTAR -->
                <div class="card">

                    <h2 class="card-title">
                        Daftar Pengeluaran — Bulan Ini
                    </h2>


                    <!-- TABLE HEADER -->
                    <div class="table-header">

                        <span>
                            Tanggal
                        </span>

                        <span>
                            Kategori
                        </span>

                        <span style="text-align: right;">
                            Nominal
                        </span>

                        <span></span>

                    </div>


                    <!-- DATA -->
                    @forelse($pengeluaran as $item)

                        <div class="expense-row">

                            <span class="expense-date">
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d M') }}
                            </span>

                            <div>

                                <span class="expense-category">
                                    {{ $item->kategori }}
                                </span>

                                @if($item->keterangan)
                                    <p class="expense-description">
                                        {{ $item->keterangan }}
                                    </p>
                                @endif

                            </div>

                            <span class="expense-nominal">
                                Rp {{ number_format($item->nominal, 0, ',', '.') }}
                            </span>

                            <button
                                type="button"
                                class="btn-edit"
                            >
                                Ubah
                            </button>

                        </div>

                    @empty

                        <div class="empty-state">
                            Belum ada data pengeluaran.
                        </div>

                    @endforelse


                    <!-- TOTAL -->
                    <div class="total-area">

                        <span class="total-label">
                            Total
                        </span>

                        <span class="total-value">
                            Rp {{ number_format($pengeluaran->sum('nominal'), 0, ',', '.') }}
                        </span>

                    </div>

                </div>

            </div>

        </section>

    </main>

</div>

</body>
</html>
