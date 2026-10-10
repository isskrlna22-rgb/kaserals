blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Kas | KASERALS</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --navy: #101b35;
            --navy-light: #1c2a49;
            --teal: #16b8a6;
            --teal-light: #e4faf6;
            --bg: #f4f7fb;
            --white: #fff;
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

        /* SIDEBAR */
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
            overflow-y: auto;
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
            flex-shrink: 0;
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
            background: var(--teal);
            color: white;
            box-shadow: 0 7px 18px rgba(22,184,166,.18);
        }

        .menu-icon {
            width: 21px;
            text-align: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 20px 10px 0;
            border-top: 1px solid rgba(255,255,255,.1);
            color: #aab8d0;
            font-size: 10px;
            line-height: 1.8;
        }

        /* KONTEN */
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
            line-height: 1.8;
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

        /* RINGKASAN */
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
            font-size: clamp(19px, 2.2vw, 27px);
            font-weight: 800;
            letter-spacing: -.8px;
            overflow-wrap: anywhere;
        }

        .stat-note {
            color: var(--muted);
            font-size: 10px;
            margin-top: 8px;
            line-height: 1.7;
        }

        /* PANEL TRANSAKSI */
        .panel {
            background: white;
            border: 1px solid var(--border);
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 4px 18px rgba(30,50,80,.025);
        }

        .panel-header {
            padding: 23px 25px;
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
            line-height: 1.7;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 650px;
            border-collapse: collapse;
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

        .amount {
            font-weight: 800;
            white-space: nowrap;
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
            padding: 48px 20px;
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

        .button {
            display: inline-block;
            margin-top: 18px;
            padding: 11px 15px;
            background: var(--teal);
            color: white;
            border-radius: 10px;
            font-size: 11px;
            font-weight: 800;
        }

        .panel-footer {
            padding: 17px 25px;
            border-top: 1px solid var(--border);
            color: var(--muted);
            font-size: 10px;
            line-height: 1.7;
        }

        /* NAVIGASI HP */
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
                padding: 18px;
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

            .panel-footer {
                padding: 15px;
            }

            .bottom-nav {
                position: fixed;
                z-index: 20;
                bottom: 0;
                left: 0;
                right: 0;
                display: flex;
                justify-content: space-around;
                padding: 10px 3px calc(10px + env(safe-area-inset-bottom));
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
                padding: 4px;
                text-align: center;
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

    <!-- SIDEBAR -->
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
            <span class="menu-icon">⌂</span>
            Dashboard
        </a>

        <a href="{{ route('dashboard.siswa.info-kas') }}" class="menu-item active">
            <span class="menu-icon">ⓘ</span>
            Info Kas
        </a>

        <div class="menu-title">TRANSAKSI & RIWAYAT</div>

        <a href="{{ route('dashboard.siswa.pembayaran') }}" class="menu-item">
            <span class="menu-icon">▣</span>
            Pembayaran Kas
        </a>

        <a href="{{ route('dashboard.siswa.status') }}" class="menu-item">
            <span class="menu-icon">✓</span>
            Status Pembayaran
        </a>

        <a href="{{ route('dashboard.siswa.riwayat') }}" class="menu-item">
            <span class="menu-icon">↻</span>
            Riwayat Transaksi
        </a>

        <div class="sidebar-bottom">
            <strong>KASERALS</strong><br>
            Transparan, tertib, dan digital.<br>
            © {{ date('Y') }} FINORA
        </div>
    </aside>

    <!-- KONTEN UTAMA -->
    <main class="main">
        <header class="topbar">
            <div>
                <div class="eyebrow">INFORMASI SISWA</div>
                <h1>Info Kas Kelas</h1>
                <p class="subtitle">
                    Pantau ringkasan dan catatan pembayaran kas yang tercatat pada akunmu.
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

        <!-- RINGKASAN DATABASE -->
        <section class="stats">
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-label">Total Transaksi</div>
                    <div class="stat-icon">↻</div>
                </div>
                <div class="stat-number">
                    {{ number_format($totalTransaksi, 0, ',', '.') }}
                </div>
                <div class="stat-note">
                    Jumlah catatan pembayaran kas milikmu.
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-label">Pembayaran Diterima</div>
                    <div class="stat-icon">✓</div>
                </div>
                <div class="stat-number">
                    Rp {{ number_format((float) $totalDiterima, 0, ',', '.') }}
                </div>
                <div class="stat-note">
                    Total nominal transaksi berstatus Diterima.
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-label">Menunggu Verifikasi</div>
                    <div class="stat-icon">◷</div>
                </div>
                <div class="stat-number">
                    Rp {{ number_format((float) $totalMenunggu, 0, ',', '.') }}
                </div>
                <div class="stat-note">
                    Total nominal transaksi berstatus Menunggu.
                </div>
            </div>
        </section>

        <!-- TABEL PEMBAYARAN -->
        <section class="panel">
            <div class="panel-header">
                <div class="panel-title">Detail Pembayaran Kas</div>
                <p class="panel-description">
                    Data berikut berasal dari tabel pembayaran kas di database.
                </p>
            </div>

            @if ($pembayaran->isNotEmpty())
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>TANGGAL</th>
                                <th>MINGGU KE</th>
                                <th>NOMINAL</th>
                                <th>METODE PEMBAYARAN</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pembayaran as $item)
                                @php
                                    $statusAsli = $item->status ?? 'Belum ada status';

                                    $statusClass = match (strtolower(trim($statusAsli))) {
                                        'diterima' => 'status-diterima',
                                        'menunggu' => 'status-menunggu',
                                        'ditolak' => 'status-ditolak',
                                        default => 'status-lain',
                                    };
                                @endphp

                                <tr>
                                    <td>
                                        {{ $item->tanggal
                                            ? \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y')
                                            : '-' }}
                                    </td>

                                    <td>{{ $item->minggu_ke ?? '-' }}</td>

                                    <td class="amount">
                                        Rp {{ number_format((float) $item->nominal, 0, ',', '.') }}
                                    </td>

                                    <td>{{ $item->metode_pembayaran ?? '-' }}</td>

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
            @else
                <div class="empty-state">
                    <div class="empty-icon">🧾</div>
                    <div class="empty-title">Belum Ada Transaksi</div>
                    <p class="empty-description">
                        Belum ada catatan pembayaran kas untuk akunmu.
                        Setelah transaksi tercatat, informasinya akan muncul di sini.
                    </p>

                    <a href="{{ route('dashboard.siswa.pembayaran') }}" class="button">
                        Buka Pembayaran Kas
                    </a>
                </div>
            @endif

            <div class="panel-footer">
                Data menampilkan transaksi milik akun siswa yang sedang login.
                <br>
                KASERALS · FINORA · {{ date('Y') }}
            </div>
        </section>
    </main>

    <!-- NAVIGASI MOBILE -->
    <nav class="bottom-nav">
        <a href="{{ route('dashboard.siswa') }}">
            <span>⌂</span>
            Dashboard
        </a>

        <a href="{{ route('dashboard.siswa.info-kas') }}" class="active">
            <span>ⓘ</span>
            Info Kas
        </a>

        <a href="{{ route('dashboard.siswa.pembayaran') }}">
            <span>▣</span>
            Pembayaran
        </a>

        <a href="{{ route('dashboard.siswa.status') }}">
            <span>✓</span>
            Status
        </a>

        <a href="{{ route('dashboard.siswa.riwayat') }}">
            <span>↻</span>
            Riwayat
        </a>
    </nav>
</body>
</html>

