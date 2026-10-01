<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Siswa - KASERALS</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7f6;
            margin: 0;
            padding: 30px;
            color: #1f2937;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        h1 {
            margin-bottom: 5px;
        }

        .subtitle {
            color: #6b7280;
            margin-bottom: 30px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 22px;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .card-title {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .card-value {
            font-size: 24px;
            font-weight: bold;
        }

        .section {
            background: white;
            padding: 25px;
            border-radius: 14px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .section h2 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
        }

        th {
            background: #f9fafb;
        }

        .status {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            background: #dcfce7;
            color: #166534;
        }

        .empty {
            color: #6b7280;
            padding: 20px 0;
        }

        @media (max-width: 900px) {
            .cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            body {
                padding: 15px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .section {
                overflow-x: auto;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Dashboard Siswa</h1>

    <div class="subtitle">
        Selamat datang, {{ $siswa->nama }}
    </div>

    {{-- IDENTITAS SISWA --}}
    <div class="section">
        <h2>Data Siswa</h2>

        <p><strong>Nama:</strong> {{ $siswa->nama }}</p>
        <p><strong>NIS:</strong> {{ $siswa->nis }}</p>
        <p><strong>Kelas:</strong> {{ $siswa->kelas }}</p>
    </div>

    {{-- RINGKASAN SISWA --}}
    <div class="cards">

        <div class="card">
            <div class="card-title">
                Total Pembayaran Saya
            </div>

            <div class="card-value">
                Rp {{ number_format($totalPembayaranSiswa, 0, ',', '.') }}
            </div>
        </div>

        <div class="card">
            <div class="card-title">
                Jumlah Pembayaran
            </div>

            <div class="card-value">
                {{ $jumlahPembayaran }} transaksi
            </div>
        </div>

        <div class="card">
            <div class="card-title">
                Status Pembayaran
            </div>

            <div class="card-value">
                <span class="status">
                    {{ $statusPembayaran }}
                </span>
            </div>
        </div>

        <div class="card">
            <div class="card-title">
                Saldo Kas Kelas
            </div>

            <div class="card-value">
                Rp {{ number_format($saldoKas, 0, ',', '.') }}
            </div>
        </div>

    </div>

    {{-- INFORMASI KAS --}}
    <div class="section">

        <h2>Informasi Kas Kelas</h2>

        <p>
            <strong>Total Pemasukan:</strong>
            Rp {{ number_format($totalPemasukan, 0, ',', '.') }}
        </p>

        <p>
            <strong>Total Pengeluaran:</strong>
            Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}
        </p>

        <p>
            <strong>Saldo Kas:</strong>
            Rp {{ number_format($saldoKas, 0, ',', '.') }}
        </p>

    </div>

    {{-- PEMBAYARAN TERAKHIR --}}
    <div class="section">

        <h2>Pembayaran Terakhir</h2>

        @if ($pembayaranTerakhir)

            <p>
                <strong>Tanggal:</strong>
                {{ $pembayaranTerakhir->tanggal->format('d-m-Y') }}
            </p>

            <p>
                <strong>Nominal:</strong>
                Rp {{ number_format($pembayaranTerakhir->nominal, 0, ',', '.') }}
            </p>

            <p>
                <strong>Periode:</strong>
                {{ $pembayaranTerakhir->periode }}
            </p>

            <p>
                <strong>Keterangan:</strong>
                {{ $pembayaranTerakhir->keterangan ?? '-' }}
            </p>

        @else

            <div class="empty">
                Belum ada pembayaran kas.
            </div>

        @endif

    </div>

    {{-- RIWAYAT PEMBAYARAN --}}
    <div class="section">

        <h2>Riwayat Pembayaran Kas</h2>

        @if ($pembayaran->count() > 0)

            <table>

                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Periode</th>
                        <th>Nominal</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($pembayaran as $item)

                        <tr>

                            <td>
                                {{ $item->tanggal->format('d-m-Y') }}
                            </td>

                            <td>
                                {{ $item->periode }}
                            </td>

                            <td>
                                Rp {{ number_format($item->nominal, 0, ',', '.') }}
                            </td>

                            <td>
                                {{ $item->keterangan ?? '-' }}
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        @else

            <div class="empty">
                Belum ada riwayat pembayaran kas.
            </div>

        @endif

    </div>

</div>

</body>
</html>
