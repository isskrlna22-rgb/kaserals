```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi | KASERALS</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --navy: #101b35;
            --navy-light: #1c2a49;
            --teal: #16b8a6;
            --teal-light: #e4faf6;
            --bg: #f4f7fb;
            --white: #ffffff;
            --text: #1c2940;
            --muted: #8490a5;
            --border: #e8edf4;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .sidebar {
            width: 255px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: var(--navy);
            color: white;
            padding: 28px 18px;
            display: flex;
            flex-direction: column;
            z-index: 10;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 10px 30px;
            border-bottom: 1px solid rgba(255,255,255,.1);
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            background: var(--teal);
            border-radius: 13px;
            display: grid;
            place-items: center;
            font-size: 23px;
            font-weight: 800;
        }

        .brand-name {
            font-size: 19px;
            font-weight: 800;
            letter-spacing: .5px;
        }

        .brand-subtitle {
            font-size: 10px;
            color: #aab8d0;
            margin-top: 4px;
        }

        .menu-title {
            color: #8796b2;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.2px;
            margin: 28px 10px 12px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 14px;
            margin: 4px 0;
            border-radius: 11px;
            font-size: 12px;
            font-weight: 600;
            color: #bdc8da;
            transition: .2s;
        }

        .menu-item:hover {
            background: var(--navy-light);
            color: white;
        }

        .menu-item.active {
            color: white;
            background: var(--teal);
            box-shadow: 0 7px 18px rgba(22,184,166,.18);
        }

        .menu-icon {
            width: 21px;
            text-align: center;
            font-size: 16px;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 16px 10px 0;
            border-top: 1px solid rgba(255,255,255,.1);
            color: #aab8d0;
            font-size: 10px;
            line-height: 1.8;
        }

        .main {
            margin-left: 255px;
            padding: 34px 38px 50px;
            max-width: 1700px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .eyebrow {
            font-size: 11px;
            color: var(--teal);
            font-weight: 800;
            letter-spacing: 1.3px;
            margin-bottom: 9px;
        }

        h1 {
            font-size: clamp(23px, 3vw, 30px);
            font-weight: 800;
            letter-spacing: -.8px;
        }

        .subtitle {
            color: var(--muted);
            font-size: 12px;
            margin-top: 9px;
            line-height: 1.7;
        }

        .student-chip {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 10px 15px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            flex-shrink: 0;
        }

        .avatar {
            width: 39px;
            height: 39px;
            border-radius: 12px;
            background: var(--teal-light);
            color: #078b7d;
            display: grid;
            place-items: center;
            font-size: 17px;
            font-weight: 800;
        }

        .student-name {
            font-size: 12px;
            font-weight: 800;
        }

        .student-class {
            color: var(--muted);
            font-size: 10px;
            margin-top: 4px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 17px;
            margin-bottom: 26px;
        }

        .stat-card {
            padding: 22px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 17px;
            box-shadow: 0 4px 18px rgba(30,50,80,.025);
            min-width: 0;
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 17px;
        }

        .stat-label {
            color: var(--muted);
            font-size: 11px;
            font-weight: 700;
        }

        .stat-icon {
            width: 37px;
            height: 37px;
            display: grid;
            place-items: center;
            border-radius: 11px;
            background: var(--teal-light);
            color: #078b7d;
            font-size: 17px;
        }

        .stat-number {
            font-size: clamp(20px, 2.2vw, 27px);
            font-weight: 800;
            letter-spacing: -.8px;
            overflow-wrap: anywhere;
        }

        .stat-note {
            color: var(--muted);
            font-size: 10px;
            margin-top: 8px;
        }

        .panel {
            background: white;
            border: 1px solid var(--border);
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 4px 18px rgba(30,50,80,.025);
        }

        .panel-header {
            padding: 23px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            border-bottom: 1px solid var(--border);
        }

        .panel-title {
            font-size: 15px;
            font-weight: 800;
        }

        .panel-description {
            font-size: 11px;
            color: var(--muted);
            margin-top: 6px;
            line-height: 1.6;
        }

        .transaction-count {
            font-size: 10px;
            color: #078b7d;
            background: var(--teal-light);
            padding: 8px 11px;
            border-radius: 9px;
            font-weight: 800;
            white-space: nowrap;
        }

        .filters {
            padding: 19px 25px;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            border-bottom: 1px solid var(--border);
        }

        .search-box {
            position: relative;
            flex: 1;
            min-width: 200px;
        }

        .search-box span {
            position: absolute;
            top: 50%;
            left: 13px;
            transform: translateY(-50%);
            color: var(--muted);
        }

        .search-box input,
        .filters select {
            width: 100%;
            height: 43px;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 0 13px;
            font: inherit;
            font-size: 11px;
            color: var(--text);
            outline: none;
            background: white;
        }

        .search-box input {
            padding-left: 37px;
        }

        .search-box input:focus,
        .filters select:focus {
            border-color: var(--teal);
        }

        .filters select {
            width: 175px;
            cursor: pointer;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 760px;
        }

        thead {
            background: #f9fbfd;
        }

        th {
            padding: 15px 20px;
            color: var(--muted);
            text-align: left;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .5px;
            white-space: nowrap;
        }

        td {
            padding: 17px 20px;
            border-top: 1px solid #f0f3f8;
            font-size: 11px;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #fbfdfd;
        }

        .transaction-id {
            font-size: 10px;
            color: var(--muted);
            margin-bottom: 5px;
        }

        .transaction-name {
            font-weight: 800;
            color: var(--text);
        }

        .transaction-date {
            color: var(--muted);
            font-size: 10px;
            margin-top: 5px;
        }

        .amount {
            font-weight: 800;
            white-space: nowrap;
        }

        .method {
            color: #536178;
            font-weight: 600;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 10px;
            border-radius: 8px;
            font-size: 10px;
            font-weight: 800;
            white-space: nowrap;
        }

        .status::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        .status-diterima {
            color: #09866e;
            background: #e5f8f1;
        }

        .status-menunggu {
            color: #b77912;
            background: #fff5dd;
        }

        .status-ditolak {
            color: #c23c4c;
            background: #ffeaed;
        }

        .status-lain {
            color: #59677c;
            background: #edf1f6;
        }

        .empty-state {
            text-align: center;
            padding: 55px 20px;
        }

        .empty-icon {
            font-size: 38px;
            margin-bottom: 14px;
        }

        .empty-title {
            font-size: 14px;
            font-weight: 800;
        }

        .empty-description {
            color: var(--muted);
            font-size: 11px;
            line-height: 1.8;
            margin-top: 8px;
        }

        .empty-action {
            display: inline-block;
            margin-top: 18px;
            padding: 11px 15px;
            background: var(--teal);
            color: white;
            border-radius: 10px;
            font-size: 11px;
            font-weight: 800;
        }

        .no-results {
            display: none;
            text-align: center;
            padding: 28px;
            font-size: 12px;
            color: var(--muted);
        }

        .panel-footer {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            padding: 17px 25px;
            border-top: 1px solid var(--border);
            color: var(--muted);
            font-size: 10px;
            line-height: 1.7;
        }

        .bottom-nav {
            display: none;
        }

        @media (max-width: 1050px) {
            .sidebar {
                width: 220px;
            }

            .main {
                margin-left: 220px;
                padding: 28px 22px;
            }

            .stats {
                gap: 12px;
            }

            .stat-card {
                padding: 17px;
            }
        }

        @media (max-width: 760px) {
            .sidebar {
                display: none;
            }

            .main {
                margin-left: 0;
                padding: 23px 15px 100px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
                margin-bottom: 23px;
            }

            .student-chip {
                width: 100%;
            }

            .stats {
                grid-template-columns: 1fr;
                gap: 11px;
            }

            .stat-card {
                padding: 17px 19px;
            }

            .stat-top {
                margin-bottom: 10px;
            }

            .stat-number {
                font-size: 23px;
            }

            .panel-header {
                padding: 19px;
            }

            .filters {
                padding: 15px;
            }

            .search-box {
                min-width: 100%;
            }

            .filters select {
                width: 100%;
            }

            .panel-footer {
                padding: 15px;
                flex-direction: column;
            }

            .bottom-nav {
                position: fixed;
                z-index: 20;
                bottom: 0;
                left: 0;
                right: 0;
                display: flex;
                justify-content: space-around;
                padding: 10px 5px calc(10px + env(safe-area-inset-bottom));
                background: white;
                border-top: 1px solid var(--border);
            }

            .bottom-nav a {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 5px;
                color: var(--muted);
                font-size: 9px;
                font-weight: 700;
                padding: 4px 10px;
            }

            .bottom-nav a span {
                font-size: 18px;
            }

            .bottom-nav a.active {
                color: #079b8c;
            }
        }
    </style>
</head>

<body>
    @php
        $totalTransaksi = $pembayaran->count();

        $totalDiterima = $pembayaran
            ->where('status', 'Diterima')
            ->sum('nominal');

        $totalMenunggu = $pembayaran
            ->where('status', 'Menunggu')
            ->sum('nominal');

        $namaSiswa = $siswa->nama_lengkap ?? 'Siswa';
        $kelasSiswa = $siswa->kelas ?? '-';
        $inisial = strtoupper(substr($namaSiswa, 0, 1));
    @endphp

    <aside class="sidebar">
        <div class="brand">
            <div class="brand-icon">K</div>
            <div>
                <div class="brand-name">KASERALS</div>
                <div class="brand-subtitle">Sistem Kas Kelas Digital</div>
            </div>
        </div>

        <div class="menu-title">MENU UTAMA</div>

        <a href="{{ route('dashboard.siswa') }}" class="menu-item">
            <span class="menu-icon">⌂</span> Dashboard
        </a>

        <div class="menu-title">TRANSAKSI & RIWAYAT</div>

        <a href="{{ route('dashboard.siswa.pembayaran') }}" class="menu-item">
            <span class="menu-icon">▣</span> Pembayaran Kas
        </a>

        <a href="{{ route('dashboard.siswa.status') }}" class="menu-item">
            <span class="menu-icon">✓</span> Status Pembayaran
        </a>

        <a href="{{ route('dashboard.siswa.riwayat') }}" class="menu-item active">
            <span class="menu-icon">↻</span> Riwayat Transaksi
        </a>

        <div class="sidebar-bottom">
            <strong>KASERALS</strong><br>
            Transparan, tertib, dan digital.<br>
            © {{ date('Y') }} FINORA
        </div>
    </aside>

    <main class="main">
        <header class="topbar">
            <div>
                <div class="eyebrow">TRANSAKSI SISWA</div>
                <h1>Riwayat Transaksi</h1>
                <p class="subtitle">
                    Pantau seluruh transaksi pembayaran kas kelas yang tercatat pada akunmu.
                </p>
            </div>

            <div class="student-chip">
                <div class="avatar">{{ $inisial }}</div>
                <div>
                    <div class="student-name">{{ $namaSiswa }}</div>
                    <div class="student-class">Kelas {{ $kelasSiswa }}</div>
                </div>
            </div>
        </header>

        <section class="stats">
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-label">Total Transaksi</div>
                    <div class="stat-icon">↻</div>
                </div>
                <div class="stat-number">{{ number_format($totalTransaksi, 0, ',', '.') }}</div>
                <div class="stat-note">Jumlah catatan pembayaran kas milikmu</div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-label">Pembayaran Diterima</div>
                    <div class="stat-icon">✓</div>
                </div>
                <div class="stat-number">
                    Rp {{ number_format((float) $totalDiterima, 0, ',', '.') }}
                </div>
                <div class="stat-note">Akumulasi transaksi berstatus Diterima</div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-label">Menunggu Verifikasi</div>
                    <div class="stat-icon">◷</div>
                </div>
                <div class="stat-number">
                    Rp {{ number_format((float) $totalMenunggu, 0, ',', '.') }}
                </div>
                <div class="stat-note">Akumulasi transaksi berstatus Menunggu</div>
            </div>
        </section>

        <section class="panel">
            <div class="panel-header">
                <div>
                    <div class="panel-title">Daftar Transaksi</div>
                    <div class="panel-description">
                        Data ditampilkan berdasarkan catatan pembayaran di database.
                    </div>
                </div>

                <div class="transaction-count">
                    {{ number_format($totalTransaksi, 0, ',', '.') }} transaksi
                </div>
            </div>

            <div class="filters">
                <div class="search-box">
                    <span>⌕</span>
                    <input
                        type="search"
                        id="searchTransaction"
                        placeholder="Cari tanggal, metode, nominal, atau status..."
                        aria-label="Cari transaksi"
                    >
                </div>

                <select id="filterStatus" aria-label="Filter status transaksi">
                    <option value="">Semua Status</option>
                    <option value="diterima">Diterima</option>
                    <option value="menunggu">Menunggu</option>
                    <option value="ditolak">Ditolak</option>
                </select>
            </div>

            @if ($pembayaran->isNotEmpty())
                <div class="table-wrap">
                    <table id="transactionTable">
                        <thead>
                            <tr>
                                <th>TRANSAKSI</th>
                                <th>TANGGAL</th>
                                <th>METODE</th>
                                <th>NOMINAL</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pembayaran as $item)
                                @php
                                    $statusAsli = $item->status ?? 'Belum ada status';
                                    $statusSlug = strtolower(trim($statusAsli));

                                    $statusClass = match ($statusSlug) {
                                        'diterima' => 'status-diterima',
                                        'menunggu' => 'status-menunggu',
                                        'ditolak' => 'status-ditolak',
                                        default => 'status-lain',
                                    };

                                    $tanggal = $item->tanggal
                                        ? \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y')
                                        : '-';

                                    $metode = $item->metode_pembayaran ?: '-';
                                @endphp

                                <tr class="transaction-row"
                                    data-status="{{ $statusSlug }}"
                                    data-search="{{ strtolower($tanggal . ' ' . $metode . ' ' . $statusAsli . ' ' . $item->nominal . ' ' . ($item->keterangan ?? '')) }}">

                                    <td>
                                        <div class="transaction-id">
                                            ID #{{ $item->id_pembayaran }}
                                        </div>
                                        <div class="transaction-name">Pembayaran Kas</div>

                                        @if (!empty($item->minggu_ke))
                                            <div class="transaction-date">
                                                Minggu ke-{{ $item->minggu_ke }}
                                            </div>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="transaction-name">{{ $tanggal }}</div>
                                    </td>

                                    <td>
                                        <span class="method">{{ $metode }}</span>
                                    </td>

                                    <td>
                                        <div class="amount">
                                            Rp {{ number_format((float) $item->nominal, 0, ',', '.') }}
                                        </div>
                                    </td>

                                    <td>
                                        <span class="status {{ $statusClass }}">
                                            {{ $statusAsli }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div id="noResults" class="no-results">
                    Tidak ada transaksi yang sesuai dengan pencarian atau filter.
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-icon">🧾</div>
                    <div class="empty-title">Belum Ada Transaksi</div>
                    <p class="empty-description">
                        Belum ada catatan pembayaran kas untuk akunmu.<br>
                        Setelah pembayaran tercatat, riwayatnya akan muncul di halaman ini.
                    </p>

                    <a href="{{ route('dashboard.siswa.pembayaran') }}" class="empty-action">
                        Buka Pembayaran Kas
                    </a>
                </div>
            @endif

            <div class="panel-footer">
                <span>Data bersumber dari catatan pembayaran akun siswa yang sedang login.</span>
                <span>KASERALS · {{ date('Y') }}</span>
            </div>
        </section>
    </main>

    <nav class="bottom-nav">
        <a href="{{ route('dashboard.siswa') }}">
            <span>⌂</span>Dashboard
        </a>
        <a href="{{ route('dashboard.siswa.pembayaran') }}">
            <span>▣</span>Pembayaran
        </a>
        <a href="{{ route('dashboard.siswa.status') }}">
            <span>✓</span>Status
        </a>
        <a href="{{ route('dashboard.siswa.riwayat') }}" class="active">
            <span>↻</span>Riwayat
        </a>
    </nav>

    <script>
        const searchInput = document.getElementById('searchTransaction');
        const statusFilter = document.getElementById('filterStatus');
        const transactionRows = document.querySelectorAll('.transaction-row');
        const noResults = document.getElementById('noResults');

        function filterTransactions() {
            const keyword = searchInput.value.toLowerCase().trim();
            const selectedStatus = statusFilter.value.toLowerCase();
            let visibleCount = 0;

            transactionRows.forEach(function (row) {
                const searchableText = row.dataset.search || '';
                const rowStatus = row.dataset.status || '';

                const matchesSearch = searchableText.includes(keyword);
                const matchesStatus = !selectedStatus ||
                    rowStatus === selectedStatus;

                const visible = matchesSearch && matchesStatus;
                row.style.display = visible ? '' : 'none';

                if (visible) {
                    visibleCount++;
                }
            });

            if (noResults) {
                noResults.style.display =
                    transactionRows.length > 0 && visibleCount === 0
                        ? 'block'
                        : 'none';
            }
        }

        searchInput.addEventListener('input', filterTransactions);
        statusFilter.addEventListener('change', filterTransactions);
    </script>
</body>
</html>
```
