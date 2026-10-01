<?php

namespace App\Http\Controllers;

use App\Models\PembayaranKas;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanExportController extends Controller
{
    // ================= EXPORT PDF =================

    public function exportPdf()
    {
        $pembayaran = PembayaranKas::with('siswa')
            ->latest('tanggal')
            ->get();

        $pemasukan = Pemasukan::latest('tanggal')
            ->get();

        $pengeluaran = Pengeluaran::latest('tanggal')
            ->get();

        $totalPembayaran = PembayaranKas::sum('nominal');

        $totalPemasukan = Pemasukan::sum('nominal');

        $totalPengeluaran = Pengeluaran::sum('nominal');

        $saldo = $totalPembayaran
            + $totalPemasukan
            - $totalPengeluaran;

        $pdf = Pdf::loadView(
            'laporan.pdf',
            compact(
                'pembayaran',
                'pemasukan',
                'pengeluaran',
                'totalPembayaran',
                'totalPemasukan',
                'totalPengeluaran',
                'saldo'
            )
        );

        return $pdf->download(
            'laporan-keuangan-kaserals.pdf'
        );
    }


    // ================= EXPORT EXCEL =================

    public function exportExcel()
    {
        return Excel::download(
            new LaporanExport,
            'laporan-keuangan-kaserals.xlsx'
        );
    }
}
