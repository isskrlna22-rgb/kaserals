<?php

namespace App\Http\Controllers;

use App\Models\PembayaranKas;
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

        $pengeluaran = Pengeluaran::with('user')
            ->latest('tanggal')
            ->get();

        // Hanya pembayaran yang sudah diterima
        $totalPembayaran = PembayaranKas::where('status', 'Diterima')
            ->sum('nominal');

        $totalPengeluaran = Pengeluaran::sum('nominal');

        $saldo = $totalPembayaran - $totalPengeluaran;

        $pdf = Pdf::loadView(
            'laporan.pdf',
            compact(
                'pembayaran',
                'pengeluaran',
                'totalPembayaran',
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
