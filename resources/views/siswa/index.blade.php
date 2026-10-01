<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Siswa - KASERALS</title>

    <style>
        /* =========================
       GLOBAL
    ========================= */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont,
                'Segoe UI', Roboto, sans-serif;
            background: #f8fafc;
            color: #0f172a;
            -webkit-font-smoothing: antialiased;
        }

        a {
            text-decoration: none;
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
            width: 280px;
            flex-shrink: 0;
            background: linear-gradient(180deg, #0f172a 0%, #080d1a 100%);
            color: #ffffff;
            padding: 32px 22px;
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.04);
            z-index: 10;
        }

        .logo-area {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 36px;
            padding: 0 4px;
        }

        .logo-box {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            background: linear-gradient(135deg, #14b8a6 0%, #0d9488 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: 800;
            color: white;
            box-shadow: 0 8px 16px rgba(13, 148, 136, 0.35);
        }

        .logo-title {
            font-size: 20px;
            font-weight: 700;
            letter-spacing: -0.4px;
        }

        .logo-subtitle {
            color: #64748b;
            font-size: 12px;
            font-weight: 500;
            margin-top: 2px;
        }

        .navigation {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .nav-title {
            color: #475569;
            font-size: 11px;
            font-weight: 700;
            margin: 22px 12px 8px;
            letter-spacing: 1.2px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 16px;
            color: #94a3b8;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.25s ease;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.06);
            color: #f8fafc;
            transform: translateX(3px);
        }

        .nav-link.active {
            background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%);
            color: #ffffff;
            font-weight: 600;
            box-shadow: 0 8px 20px rgba(13, 148, 136, 0.3);
        }

        .nav-icon {
            width: 20px;
            text-align: center;
            font-size: 15px;
        }

        /* =========================
       MAIN
    ========================= */
        .main {
            flex: 1;
            min-width: 0;
            background: #f8fafc;
        }

        /* =========================
       HEADER
    ========================= */
        .topbar {
            height: 88px;
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 36px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
        }

        .topbar-title {
            font-size: 24px;
            font-weight: 700;
            color: #0f172a;
            letter-spacing: -0.5px;
        }

        .profile {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #ccfbf1;
            color: #0d9488;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 15px;
            box-shadow: 0 2px 8px rgba(13, 148, 136, 0.15);
        }

        /* =========================
       CONTENT
    ========================= */
        .content {
            padding: 32px 36px;
        }

        /* =========================
       SUCCESS
    ========================= */
        .success-message {
            margin-bottom: 24px;
            padding: 14px 18px;
            border: 1px solid #99f6e4;
            border-radius: 14px;
            background: #f0fdfa;
            color: #0f766e;
            box-shadow: 0 4px 12px rgba(13, 148, 136, 0.05);
        }

        .success-content {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* =========================
       WELCOME BANNER
    ========================= */
        .welcome-banner {
            background: linear-gradient(135deg, #0f766e 0%, #14b8a6 100%);
            border-radius: 20px;
            padding: 28px 34px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
            color: white;
            box-shadow: 0 10px 25px -5px rgba(20, 184, 166, 0.35);
            position: relative;
            overflow: hidden;
        }

        .welcome-banner::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -60px;
            width: 280px;
            height: 280px;
            background: radial-gradient(circle,
                    rgba(255, 255, 255, 0.16) 0%,
                    transparent 70%);
            border-radius: 50%;
        }

        .welcome-text {
            position: relative;
            z-index: 2;
            flex: 1;
        }

        .welcome-text h2 {
            font-size: 26px;
            font-weight: 800;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .welcome-text p {
            font-size: 14px;
            line-height: 1.6;
            opacity: 0.92;
            max-width: 560px;
        }

        /* =========================
       MASCOT
    ========================= */
        .welcome-mascot {
            position: relative;
            z-index: 2;
            width: 135px;
            height: 135px;
            object-fit: contain;
            animation: floatMascot 4s ease-in-out infinite;
            filter: drop-shadow(0 12px 14px rgba(0, 0, 0, 0.18));
        }

        @keyframes floatMascot {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        /* =========================
       PAGE HEADER
    ========================= */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 22px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.5px;
        }

        .page-description {
            margin-top: 6px;
            color: #64748b;
            font-size: 13px;
            font-weight: 500;
        }

        .btn-add {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 18px;
            border-radius: 12px;
            background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%);
            color: white;
            font-size: 13px;
            font-weight: 700;
            box-shadow: 0 6px 16px rgba(13, 148, 136, 0.25);
            transition: all 0.25s ease;
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(13, 148, 136, 0.3);
        }

        /* =========================
       SEARCH & FILTER
    ========================= */
        .toolbar {
            display: grid;
            grid-template-columns: 1fr 240px;
            gap: 14px;
            margin-bottom: 22px;
        }

        .search-box {
            position: relative;
        }

        .search-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 17px;
        }

        .search-input,
        .filter-select {
            width: 100%;
            height: 48px;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            background: white;
            color: #334155;
            font-size: 13px;
            outline: none;
            transition: all 0.2s ease;
            box-shadow: 0 2px 8px rgba(15, 23, 42, 0.03);
        }

        .search-input {
            padding: 0 16px 0 44px;
        }

        .filter-select {
            padding: 0 14px;
        }

        .search-input:focus,
        .filter-select:focus {
            border-color: #0d9488;
            box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.1);
        }

        /* =========================
       TABLE CARD
    ========================= */
        .table-card {
            overflow: hidden;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            box-shadow:
                0 10px 25px -5px rgba(0, 0, 0, 0.03),
                0 8px 10px -6px rgba(0, 0, 0, 0.03);
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .student-table {
            width: 100%;
            min-width: 850px;
            border-collapse: collapse;
        }

        .student-table thead {
            background: #f8fafc;
        }

        .student-table th {
            padding: 15px 20px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
            color: #64748b;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .student-table td {
            padding: 16px 20px;
            border-bottom: 1px solid #f1f5f9;
            color: #334155;
            font-size: 13px;
        }

        .student-table tbody tr {
            transition: all 0.2s ease;
        }

        .student-table tbody tr:hover {
            background: #f8fafc;
        }

        /* =========================
       STUDENT
    ========================= */
        .student-name {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .student-avatar {
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            border-radius: 50%;
            background: linear-gradient(135deg, #ccfbf1, #99f6e4);
            color: #0d9488;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 800;
        }

        .student-name-text {
            font-weight: 600;
            color: #1e293b;
        }

        /* =========================
       KELAS
    ========================= */
        .class-badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 10px;
            border-radius: 8px;
            background: #f0fdfa;
            color: #0f766e;
            font-size: 11px;
            font-weight: 700;
        }

        /* =========================
       ACTION
    ========================= */
        .actions {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .btn-edit,
        .btn-delete {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 62px;
            padding: 8px 11px;
            border-radius: 9px;
            font-size: 11px;
            font-weight: 700;
            transition: all 0.2s ease;
        }

        .btn-edit {
            border: 1px solid #e2e8f0;
            background: white;
            color: #475569;
        }

        .btn-edit:hover {
            background: #f0fdfa;
            border-color: #99f6e4;
            color: #0f766e;
        }

        .btn-delete {
            border: 1px solid #fecaca;
            background: white;
            color: #dc2626;
            cursor: pointer;
        }

        .btn-delete:hover {
            background: #fef2f2;
        }

        /* =========================
       EMPTY
    ========================= */
        .empty-state {
            padding: 50px 20px !important;
            text-align: center;
            color: #64748b;
        }

        /* =========================
       PAGINATION
    ========================= */
        #pagination {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 6px;
            margin-top: 18px;
        }

        #pagination button {
            width: 38px;
            height: 38px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            background: white;
            color: #475569;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        #pagination button:hover:not(:disabled) {
            background: #f0fdfa;
            border-color: #99f6e4;
            color: #0f766e;
        }

        #pagination button:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        .pagination-active {
            background: #0d9488 !important;
            border-color: #0d9488 !important;
            color: white !important;
        }

        /* =========================
       RESPONSIVE
    ========================= */
        @media (max-width: 1024px) {
            .sidebar {
                width: 240px;
            }

            .content {
                padding: 28px;
            }

            .topbar {
                padding: 0 28px;
            }
        }

        @media (max-width: 768px) {
            .app {
                display: block;
            }

            .sidebar {
                width: 100%;
                min-height: auto;
                padding: 20px;
            }

            .navigation {
                display: none;
            }

            .topbar {
                height: 72px;
                padding: 0 20px;
            }

            .content {
                padding: 20px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .btn-add {
                width: 100%;
            }

            .toolbar {
                grid-template-columns: 1fr;
            }

            .welcome-banner {
                flex-direction: column;
                text-align: center;
                padding: 24px;
            }

            .welcome-text p {
                margin: 0 auto 18px;
            }

            .welcome-mascot {
                width: 110px;
                height: 110px;
            }

            #pagination {
                justify-content: center;
            }
        }
    </style>
</head>

<body>

    <div class="app">

        <!-- SIDEBAR -->
        <aside class="sidebar">

            <div class="logo-area">
                <div class="logo-box">
                    K
                </div>

                <div>
                    <h1 class="logo-title">KASERALS</h1>
                    <p class="logo-subtitle">Kas Kelas Digital</p>
                </div>
            </div>

            <nav class="navigation">

                <a href="{{ route('dashboard') }}" class="nav-link">
                    <span class="nav-icon">□</span>
                    Dashboard
                </a>

                <a href="#" class="nav-link active">
                    <span class="nav-icon">◉</span>
                    Data Siswa
                </a>

                <p class="nav-title">TRANSAKSI</p>

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

                <a href="{{ route('pengeluaran.web.index') }}" class="nav-link">
                    <span class="nav-icon">↑</span>
                    Pengeluaran
                </a>

                <p class="nav-title">CATATAN</p>

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
                    Data Siswa
                </h2>

                <div class="profile">
                    NS
                </div>

            </header>


            <!-- CONTENT -->
            <section class="content">
              
                <!-- SUCCESS MESSAGE -->
                @if (session('success'))
                    <div class="success-message">

                        <div class="success-content">

                            <span>✓</span>

                            <p>
                                {{ session('success') }}
                            </p>

                        </div>

                    </div>
                @endif


                <!-- PAGE HEADER -->
                <div class="page-header">

                    <div>

                        <h1 class="page-title">
                            Data Siswa
                        </h1>

                        <p class="page-description">
                            {{ $siswa->count() }} siswa terdaftar
                        </p>

                    </div>

                    <a href="{{ route('data-siswa.create') }}" class="btn-add">
                        + Tambah Siswa
                    </a>

                </div>


                <!-- SEARCH + FILTER -->
                <div class="toolbar">

                    <div class="search-box">

                        <span class="search-icon">
                            🔍
                        </span>

                        <input type="text" id="searchSiswa" class="search-input" placeholder="Cari nama atau NIS...">

                    </div>


                    <select id="filterKelas" class="filter-select">

                        <option value="">
                            Kelas: Semua
                        </option>

                        @foreach ($siswa->pluck('kelas')->unique()->sort() as $kelas)
                            <option value="{{ $kelas }}">
                                {{ $kelas }}
                            </option>
                        @endforeach

                    </select>

                </div>


                <!-- TABLE -->
                <div class="table-card">

                    <div class="table-wrapper">

                        <table class="student-table">

                            <thead>

                                <tr>

                                    <th>
                                        Nama Siswa
                                    </th>

                                    <th>
                                        NIS
                                    </th>

                                    <th>
                                        Kelas
                                    </th>

                                    <th>
                                        No. HP
                                    </th>

                                    <th>
                                        Aksi
                                    </th>

                                </tr>

                            </thead>


                            <tbody id="tabelSiswa">

                                @forelse ($siswa as $item)
                                    <tr class="siswa-row">

                                        <!-- NAMA -->
                                        <td>

                                            <div class="student-name">

                                                <div class="student-avatar">

                                                    {{ strtoupper(substr($item->nama, 0, 2)) }}

                                                </div>

                                                <span class="student-name-text">
                                                    {{ $item->nama }}
                                                </span>

                                            </div>

                                        </td>


                                        <!-- NIS -->
                                        <td>
                                            {{ $item->nis }}
                                        </td>


                                        <!-- KELAS -->
                                        <td>

                                            <span class="class-badge">
                                                {{ $item->kelas }}
                                            </span>

                                        </td>


                                        <!-- NO HP -->
                                        <td>
                                            {{ $item->no_hp ?? '-' }}
                                        </td>


                                        <!-- AKSI -->
                                        <td>

                                            <div class="actions">

                                                <!-- UBAH -->
                                                <a href="{{ route('data-siswa.edit', $item->id) }}" class="btn-edit">
                                                    Ubah
                                                </a>


                                                <!-- HAPUS -->
                                                <form action="{{ route('data-siswa.destroy', $item->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus data siswa ini?')">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn-delete">
                                                        Hapus
                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="5" class="empty-state">
                                            Belum ada data siswa.
                                        </td>

                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>


                <!-- PAGINATION -->
                <div id="pagination">
                </div>

            </section>

        </main>

    </div>


    <!-- JAVASCRIPT -->
    <script>
        const searchInput =
            document.getElementById('searchSiswa');

        const filterKelas =
            document.getElementById('filterKelas');

        const rows =
            document.querySelectorAll('.siswa-row');

        const pagination =
            document.getElementById('pagination');

        const perPage = 10;

        let currentPage = 1;


        // FILTER DATA
        function getFilteredRows() {

            const keyword =
                searchInput.value.toLowerCase().trim();

            const kelas =
                filterKelas.value.toLowerCase();

            return Array.from(rows).filter(row => {

                const text =
                    row.textContent.toLowerCase();

                const cocokSearch =
                    text.includes(keyword);

                const cocokKelas =
                    kelas === '' ||
                    text.includes(kelas);

                return cocokSearch && cocokKelas;

            });

        }


        // TAMPILKAN SISWA
        function tampilkanSiswa() {

            const filteredRows =
                getFilteredRows();

            const totalPages =
                Math.ceil(filteredRows.length / perPage);


            if (totalPages > 0 && currentPage > totalPages) {

                currentPage = totalPages;

            }


            if (totalPages === 0) {

                currentPage = 1;

            }


            rows.forEach(row => {

                row.style.display = 'none';

            });


            const start =
                (currentPage - 1) * perPage;

            const end =
                start + perPage;


            filteredRows
                .slice(start, end)
                .forEach(row => {

                    row.style.display = '';

                });


            buatPagination(totalPages);

        }


        // BUAT PAGINATION
        function buatPagination(totalPages) {

            pagination.innerHTML = '';


            if (totalPages <= 1) {

                return;

            }


            // SEBELUMNYA
            const prev =
                document.createElement('button');

            prev.type = 'button';

            prev.textContent = '‹';

            prev.className =
                'pagination-prev';

            prev.disabled =
                currentPage === 1;

            prev.addEventListener('click', () => {

                if (currentPage > 1) {

                    currentPage--;

                    tampilkanSiswa();

                }

            });

            pagination.appendChild(prev);


            // NOMOR HALAMAN
            for (let i = 1; i <= totalPages; i++) {

                const button =
                    document.createElement('button');

                button.type = 'button';

                button.textContent = i;


                if (i === currentPage) {

                    button.className =
                        'pagination-active';

                } else {

                    button.className =
                        'pagination-number';

                }


                button.addEventListener('click', () => {

                    currentPage = i;

                    tampilkanSiswa();

                });


                pagination.appendChild(button);

            }


            // BERIKUTNYA
            const next =
                document.createElement('button');

            next.type = 'button';

            next.textContent = '›';

            next.className =
                'pagination-next';

            next.disabled =
                currentPage === totalPages;

            next.addEventListener('click', () => {

                if (currentPage < totalPages) {

                    currentPage++;

                    tampilkanSiswa();

                }

            });

            pagination.appendChild(next);

        }


        // SEARCH
        searchInput.addEventListener('input', () => {

            currentPage = 1;

            tampilkanSiswa();

        });


        // FILTER KELAS
        filterKelas.addEventListener('change', () => {

            currentPage = 1;

            tampilkanSiswa();

        });


        // JALANKAN SAAT HALAMAN DIBUKA
        tampilkanSiswa();
    </script>

</body>

</html>
