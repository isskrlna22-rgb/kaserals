<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Keuangan KASERALS</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        h1 {
            text-align: center;
            color: #0f766e;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #999;
            padding: 8px;
        }

        th {
            background: #0f766e;
            color: white;
        }

        .total {
            margin-top: 20px;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <h1>KASERALS</h1>

    <p style="text-align: center;">
        Laporan Keuangan Kas Kelas
    </p>

    <div class="total">
        <strong>Total Pembayaran:</strong>
        Rp {{ number_format($totalPembayaran, 0, ',', '.') }}
    </div>

    <div class="total">
        <strong>Total Pemasukan:</strong>
        Rp {{ number_format($totalPemasukan, 0, ',', '.') }}
    </div>

    <div class="total">
        <strong>Total Pengeluaran:</strong>
        Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}
    </div>

    <div class="total">
        <strong>Saldo:</strong>
        Rp {{ number_format($saldo, 0, ',', '.') }}
    </div>

    <h3>Riwayat Pembayaran Kas</h3>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Siswa</th>
                <th>Periode</th>
                <th>Nominal</th>
            </tr>
        </thead>

        <tbody>
            @forelse($pembayaran as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}
                    </td>

                    <td>
                        {{ $item->siswa->nama ?? '-' }}
                    </td>

                    <td>
                        {{ $item->periode }}
                    </td>

                    <td>
                        Rp {{ number_format($item->nominal, 0, ',', '.') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center;">
                        Belum ada data pembayaran.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
