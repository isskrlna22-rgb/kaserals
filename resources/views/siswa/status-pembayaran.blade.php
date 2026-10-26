<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Status Bayar Pribadi - KASERALS</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background:
                radial-gradient(circle at 10% 10%, rgba(45, 212, 191, 0.12), transparent 40%),
                radial-gradient(circle at 90% 90%, rgba(20, 184, 166, 0.10), transparent 40%),
                #edf7f5;
            color: #17233d;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ================= ANIMASI ================= */
        @keyframes floatMascot {
            0%,
            100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes pulseLogo {
            0% {
                box-shadow: 0 0 0 0 rgba(13, 148, 136, 0.4);
            }
            70% {
                box-shadow: 0 0 0 12px rgba(13, 148, 136, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(13, 148, 136, 0);
            }
        }

        @keyframes blink {
            0%,
            96%,
            98% {
                opacity: 1;
            }
            97% {
                opacity: 0;
                transform: scaleY(0.1);
            }
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: #091320;
            color: white;
            padding: 32px 20px;
            z-index: 20;
            display: flex;
            flex-direction: column;
            box-shadow: 4px 0 25px rgba(0, 0, 0, 0.05);
            overflow-y: auto;
        }

        .brand-sidebar {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 0 6px;
            margin-bottom: 36px;
        }

        .logo {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            background: linear-gradient(135deg, #14b8a6, #0d9488);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: 800;
            color: white;
            box-shadow: 0 8px 20px rgba(13, 148, 136, 0.35);
            animation: pulseLogo 2.5s infinite;
        }

        .brand-name {
            font-size: 18px;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .brand-subtitle {
            font-size: 11px;
            color: #64748b;
            margin-top: 2px;
        }

        .menu-section {
            margin-bottom: 24px;
        }

        .menu-title {
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.5px;
            color: #475569;
            padding: 0 12px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #94a3b8;
            padding: 12px 16px;
            border-radius: 14px;
            margin-bottom: 4px;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .menu-item:hover {
            color: white;
            background: rgba(255, 255, 255, 0.06);
            transform: translateX(5px);
        }

        .menu-item.active {
            background: linear-gradient(135deg, #0d9488, #0f766e);
            color: white;
            box-shadow: 0 8px 20px rgba(13, 148, 136, 0.35);
            font-weight: 700;
        }

        .menu-icon {
            width: 20px;
            text-align: center;
            font-size: 16px;
            transition: transform 0.3s ease;
        }

        .menu-item:hover .menu-icon {
            transform: scale(1.1) rotate(-5deg);
        }

        /* ================= PROFIL DI SIDEBAR (BAWAH) & LOGOUT ================= */
        .sidebar-footer {
            margin-top: auto;
            padding-top: 24px;
            border-top: 1px dashed rgba(255, 255, 255, 0.1);
        }

        .sidebar-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
            padding: 0 12px;
        }

        .sidebar-avatar {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: rgba(45, 212, 191, 0.2);
            color: #2dd4bf;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 800;
        }

        .sidebar-user-info {
            overflow: hidden;
        }

        .sidebar-user-name {
            font-size: 13px;
            font-weight: 700;
            color: white;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        .sidebar-user-role {
            font-size: 11px;
            color: #94a3b8;
            margin-top: 2px;
        }

        .menu-logout {
            color: #f87171 !important;
        }

        .menu-logout:hover {
            background: rgba(239, 68, 68, 0.1) !important;
            color: #fca5a5 !important;
        }

        /* ================= MAIN CONTENT ================= */
        .main {
            margin-left: 250px;
            padding: 32px 40px 50px;
        }

        .topbar-mobile {
            display: none;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        /* ================= TOPBAR (PROFIL KANAN ATAS) ================= */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 25px;
            gap: 20px;
        }

        .page-heading h1 {
            font-size: 27px;
            margin-bottom: 8px;
            font-weight: 800;
            color: #0f172a;
        }

        .page-heading p {
            color: #64748b;
            font-size: 13px;
            line-height: 1.7;
            font-weight: 500;
            max-width: 600px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 12px;
            background: rgba(255, 255, 255, 0.6);
            padding: 8px 18px 8px 8px;
            border-radius: 50px;
            border: 1px solid transparent;
            transition: all 0.3s ease;
            cursor: pointer;
            flex-shrink: 0;
        }

        .profile:hover {
            background: white;
            border-color: #e2e8f0;
            box-shadow: 0 6px 20px rgba(13, 148, 136, 0.08);
            transform: translateY(-2px);
        }

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #ccfbf1;
            color: #0d9488;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 800;
        }

        .profile-name {
            font-size: 13px;
            font-weight: 800;
            color: #0f172a;
        }

        .profile-role {
            font-size: 11px;
            color: #64748b;
            margin-top: 2px;
            font-weight: 600;
        }

        /* ================= KONTEN HALAMAN ================= */

        .student-card {
            display: flex;
            align-items: center;
            gap: 18px;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 22px;
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 0 10px 30px -5px rgba(13, 148, 136, 0.05);
            transition: 0.3s;
        }

        .student-card:hover {
            box-shadow: 0 15px 35px -5px rgba(13, 148, 136, 0.1);
        }

        .student-avatar {
            width: 65px;
            height: 65px;
            border-radius: 18px;
            background: linear-gradient(135deg, #14b8a6, #0d9488);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            font-weight: 800;
            box-shadow: 0 8px 15px rgba(13, 148, 136, 0.2);
        }

        .student-info h2 {
            font-size: 18px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 6px;
        }

        .student-info p {
            font-size: 13px;
            color: #64748b;
            font-weight: 600;
        }

        /* ================= SUMMARY GRID ================= */

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 24px;
        }

        .summary-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 22px;
            padding: 24px;
            box-shadow: 0 10px 30px -5px rgba(13, 148, 136, 0.05);
            transition: 0.3s;
        }

        .summary-card:hover {
            box-shadow: 0 15px 35px -5px rgba(13, 148, 136, 0.1);
            transform: translateY(-2px);
        }

        .summary-label {
            font-size: 11px;
            font-weight: 800;
            color: #64748b;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .summary-value {
            font-size: 24px;
            font-weight: 800;
            color: #0f172a;
        }

        /* ================= STATUS KAS ================= */

        .status-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 22px;
            padding: 30px;
            margin-bottom: 24px;
            text-align: center;
            box-shadow: 0 10px 30px -5px rgba(13, 148, 136, 0.05);
            transition: 0.3s;
        }

        .status-card:hover {
            box-shadow: 0 15px 35px -5px rgba(13, 148, 136, 0.1);
        }

        .status-title {
            font-size: 12px;
            color: #64748b;
            font-weight: 800;
            margin-bottom: 16px;
            letter-spacing: 0.5px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 24px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 800;
        }

        .status-sudah {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .status-belum {
            background: #fef3c7;
            color: #b45309;
            border: 1px solid #fde68a;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: currentColor;
        }

        /* ================= RIWAYAT TABEL ================= */

        .history-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 22px;
            padding: 28px;
            box-shadow: 0 10px 30px -5px rgba(13, 148, 136, 0.05);
            margin-bottom: 40px;
        }

        .card-title {
            font-size: 18px;
            font-weight: 800;
            margin-bottom: 24px;
            color: #0f172a;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th {
            text-align: left;
            padding: 14px 16px;
            background: #f8fafc;
            color: #64748b;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #e2e8f0;
            border-radius: 8px 8px 0 0;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 13px;
            color: #334155;
            font-weight: 600;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .badge {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 800;
        }

        .badge-diterima { background: #dcfce7; color: #166534; border: 1px solid #bbf7d0;}
        .badge-menunggu { background: #fef3c7; color: #b45309; border: 1px solid #fde68a;}
        .badge-ditolak { background: #fee2e2; color: #991b1b; border: 1px solid #fecaca;}

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #64748b;
        }

        .empty-icon {
            font-size: 40px;
            margin-bottom: 12px;
            opacity: 0.6;
        }

        .empty-state p {
            font-size: 14px;
            font-weight: 600;
        }

        .footer {
            text-align: center;
            color: #94a3b8;
            font-size: 11px;
            padding-top: 10px;
            font-weight: 600;
        }

        /* ================= MASCOT POJOK BAWAH (^ᴗ^) ================= */
        .mascot-container {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 100;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            animation: floatMascot 4s ease-in-out infinite;
        }

        .mascot-bubble {
            background: white;
            padding: 12px 18px;
            border-radius: 20px 20px 0 20px;
            box-shadow: 0 10px 25px rgba(13, 148, 136, 0.2);
            margin-bottom: 12px;
            font-size: 13px;
            font-weight: 800;
            color: #0f172a;
            max-width: 240px;
            text-align: center;
            border: 2px solid #ccfbf1;
        }

        .mascot-bubble span {
            color: #0d9488;
        }

        .mascot-body {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #2dd4bf, #0d9488);
            border-radius: 40%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 12px 25px rgba(13, 148, 136, 0.35);
            cursor: pointer;
            border: 3px solid #f8fafc;
            transition: all 0.3s ease;
        }

        .mascot-face {
            font-size: 24px;
            color: white;
            font-weight: bold;
            animation: blink 4s infinite;
        }

        .mascot-container:hover .mascot-body {
            transform: scale(1.1) rotate(8deg);
            border-radius: 50%;
        }

      /* ================= BOTTOM NAV MOBILE ================= */

.bottom-nav {
    display: none;
}

.nav-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-width: 0;
    width: 100%;
    gap: 4px;
    padding: 5px 0;
    text-align: center;
    text-decoration: none;
    color: #94a3b8;
    box-sizing: border-box;
}

.nav-item.active {
    color: #0d9488;
    font-weight: 700;
}

.nav-icon {
    font-size: 17px;
    line-height: 1;
}

.nav-text {
    font-size: 9px;
    line-height: 1.2;
    white-space: nowrap;
}

@media (max-width: 900px) {
    .summary-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 760px) {
    .sidebar {
        display: none;
    }

    .main {
        margin-left: 0;
        padding: 20px 16px 90px;
    }

    .bottom-nav {
        display: grid;
        grid-template-columns: repeat(6, minmax(0, 1fr));
        align-items: center;
        width: 100%;
        gap: 0;
        padding: 8px 2px calc(8px + env(safe-area-inset-bottom));
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(255, 255, 255, 0.97);
        border-top: 1px solid #e2e8f0;
        backdrop-filter: blur(10px);
        z-index: 100;
        box-sizing: border-box;
    }

    .mascot-container {
        display: none;
    }

    .profile {
        display: none;
    }

    .topbar-mobile {
        background: #091320;
        color: white;
        padding: 16px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: -20px -16px 24px;
    }

    .brand-mobile {
        font-size: 20px;
        font-weight: 800;
    }

    .brand-mobile span {
        color: #2dd4bf;
    }
}
    </style>
</head>

<body>

    <!-- SIDEBAR (MENU UTAMA) -->
    <aside class="sidebar">
        <div class="brand-sidebar">
            <div class="logo">K</div>
            <div>
                <div class="brand-name">KASERALS</div>
                <div class="brand-subtitle">Kas Kelas Digital</div>
            </div>
        </div>

        <div class="menu-section">
            <div class="menu-title">MENU</div>
            <a href="{{ route('dashboard.siswa') }}" class="menu-item">
                <span class="menu-icon">⌂</span> Dashboard
            </a>
        </div>

        <div class="menu-section">
            <div class="menu-title">TRANSAKSI</div>
            <a href="{{ route('dashboard.siswa.pembayaran') }}" class="menu-item">
                <span class="menu-icon">💳</span> Pembayaran Kas
            </a>
            <a href="{{ route('dashboard.siswa.status') }}" class="menu-item active">
                <span class="menu-icon">✓</span> Status Pembayaran
            </a>
        </div>

        <div class="menu-section">
            <div class="menu-title">CATATAN</div>
            <a href="{{ route('dashboard.siswa.riwayat') }}" class="menu-item">
                <span class="menu-icon">⏱</span> Riwayat Transaksi
            </a>
            <a href="{{ route('dashboard.siswa') }}#info-kas" class="menu-item">
                <span class="menu-icon">ⓘ</span> Info Kas
            </a>
        </div>

        <!-- ================= PROFIL & LOGOUT DI SIDEBAR BAWAH ================= -->
        <div class="sidebar-footer">
            <div class="menu-title">AKUN</div>
            <div class="sidebar-profile">
                <div class="sidebar-avatar">
                    {{ strtoupper(substr($siswa->nama_lengkap ?? 'SI', 0, 2)) }}
                </div>
                <div class="sidebar-user-info">
                    <div class="sidebar-user-name">
                        {{ $siswa->nama_lengkap ?? 'Siswa' }}
                    </div>
                    <div class="sidebar-user-role">
                        Siswa · {{ $siswa->kelas ?? '-' }}
                    </div>
                </div>
            </div>

            <a href="{{ route('logout') }}" class="menu-item menu-logout"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span class="menu-icon">⎋</span> Keluar
            </a>
        </div>
    </aside>

    <main class="main">

        <!-- TOPBAR MOBILE -->
        <div class="topbar-mobile">
            <div class="brand-mobile">KASE<span>RALS</span></div>
            <small style="color: #94a3b8; font-weight: 600;">Portal Siswa</small>
        </div>

        <div class="container">

            <!-- ================= TOPBAR DESKTOP ================= -->
            <div class="topbar">
                <div class="page-heading">
                    <h1>Status Bayar Pribadi 💳</h1>
                    <p>
                        Informasi dan rekapitulasi pembayaran kas pribadi kamu selama ini.
                    </p>
                </div>

                <!-- PROFIL DI TOPBAR (KANAN ATAS) -->
                <div class="profile">
                    <div class="avatar">
                        {{ strtoupper(substr($siswa->nama_lengkap ?? 'SI', 0, 2)) }}
                    </div>
                    <div>
                        <div class="profile-name">
                            {{ $siswa->nama_lengkap ?? 'Siswa' }}
                        </div>
                        <div class="profile-role">
                            Siswa · {{ $siswa->kelas ?? '-' }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- ================= DATA SISWA ================= -->
            <div class="student-card">
                <div class="student-avatar">
                    {{ strtoupper(substr($siswa->nama_lengkap ?? 'SI', 0, 1)) }}
                </div>
                <div class="student-info">
                    <h2>
                        {{ $siswa->nama_lengkap }}
                    </h2>
                    <p>
                        NISN: {{ $siswa->nisn ?? '-' }} &nbsp; • &nbsp; Kelas: {{ $siswa->kelas ?? '-' }}
                    </p>
                </div>
            </div>

            <!-- ================= SUMMARY ================= -->
            <div class="summary-grid">
                <div class="summary-card">
                    <div class="summary-label">
                        TOTAL PEMBAYARAN
                    </div>
                    <div class="summary-value">
                        Rp {{ number_format($totalPembayaranSiswa, 0, ',', '.') }}
                    </div>
                </div>

                <div class="summary-card">
                    <div class="summary-label">
                        JUMLAH TRANSAKSI
                    </div>
                    <div class="summary-value">
                        {{ $jumlahPembayaran }} transaksi
                    </div>
                </div>

                <div class="summary-card">
                    <div class="summary-label">
                        STATUS PEMBAYARAN
                    </div>
                    <div class="summary-value">
                        @if($statusPembayaran === 'SUDAH BAYAR')
                            <span class="status-badge status-sudah">
                                <span class="status-dot"></span>
                                SUDAH BAYAR
                            </span>
                        @else
                            <span class="status-badge status-belum">
                                <span class="status-dot"></span>
                                BELUM BAYAR
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- ================= STATUS BESAR ================= -->
            <div class="status-card">
                <div class="status-title">
                    STATUS PEMBAYARAN KAS
                </div>
                @if($statusPembayaran === 'SUDAH BAYAR')
                    <div class="status-badge status-sudah">
                        <span class="status-dot"></span>
                        SUDAH BAYAR
                    </div>
                @else
                    <div class="status-badge status-belum">
                        <span class="status-dot"></span>
                        BELUM BAYAR
                    </div>
                @endif
            </div>

            <!-- ================= RIWAYAT ================= -->
            <div class="history-card">
                <h3 class="card-title">
                    Riwayat Pembayaran
                </h3>

                @if($pembayaran->count() > 0)
                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Minggu Ke</th>
                                    <th>Nominal</th>
                                    <th>Metode</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pembayaran as $item)

<tr>
    <td>
        {{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}
    </td>

    <td>
        {{ $item->detailPembayaran?->minggu_ke
            ? 'Minggu '.$item->detailPembayaran->minggu_ke
            : 'Belum diisi' }}
    </td>

    <td>
        <strong>
            Rp {{ number_format(
                (float) ($item->detailPembayaran?->nominal ?? 0),
                0, ',', '.'
            ) }}
        </strong>
    </td>

    <td>
        {{ $item->metode_pembayaran ?? '-' }}
    </td>

    <td>
        @php
            $status = $item->transaksi->status ?? 'Menunggu';
        @endphp

        @if($status === 'Diterima')
            <span class="badge badge-diterima">Diterima</span>
        @elseif($status === 'Menunggu')
            <span class="badge badge-menunggu">Menunggu</span>
        @elseif($status === 'Ditolak')
            <span class="badge badge-ditolak">Ditolak</span>
        @else
            <span class="badge badge-menunggu">{{ $status }}</span>
        @endif
    </td>
</tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-icon">💸</div>
                        <p>Belum ada data pembayaran kas.</p>
                    </div>
                @endif
            </div>

            <div class="footer">
                © {{ date('Y') }} KASERALS · Sistem Pengelolaan Kas Kelas Digital
            </div>

        </div>
    </main>

    <!-- ================= MASCOT POJOK BAWAH (^ᴗ^) ================= -->
    <div class="mascot-container">
        <div class="mascot-body">
            <div class="mascot-face">^ᴗ^</div>
        </div>
    </div>

    <!-- BOTTOM NAV MOBILE -->
   <nav class="bottom-nav">
    <a href="{{ route('dashboard.siswa') }}" class="nav-item">
        <span class="nav-icon">⌂</span>
        <span class="nav-text">Dashboard</span>
    </a>

    <a href="{{ route('dashboard.siswa.pembayaran') }}" class="nav-item">
        <span class="nav-icon">💳</span>
        <span class="nav-text">Bayar</span>
    </a>

    <a href="{{ route('dashboard.siswa.status') }}" class="nav-item active">
        <span class="nav-icon">✓</span>
        <span class="nav-text">Status</span>
    </a>

    <a href="{{ route('dashboard.siswa.riwayat') }}" class="nav-item">
        <span class="nav-icon">⏱</span>
        <span class="nav-text">Riwayat</span>
    </a>

    <a href="{{ route('dashboard.siswa') }}#info-kas" class="nav-item">
        <span class="nav-icon">ⓘ</span>
        <span class="nav-text">Info Kas</span>
    </a>

    <a href="{{ route('logout') }}"
       class="nav-item nav-logout"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <span class="nav-icon">⎋</span>
        <span class="nav-text">Keluar</span>
    </a>
</nav>
    <!-- LOGOUT FORM HIDDEN -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
        @csrf
    </form>

</body>

</html>
