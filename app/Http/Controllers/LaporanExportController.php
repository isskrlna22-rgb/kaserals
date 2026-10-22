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
        // Ambil pembayaran yang sudah diterima
        $pembayaran = PembayaranKas::with([
            'siswa',
            'transaksi',
            'detailPembayaran',
        ])
            ->whereHas('transaksi', function ($query) {
                $query->where('status', 'Diterima');
            })
            ->latest('tanggal')
            ->get();

        // Ambil data pengeluaran
        $pengeluaran = Pengeluaran::with('user')
            ->latest('tanggal')
            ->get();

        // Hitung total nominal dari detail pembayaran
        $totalPembayaran = $pembayaran->sum(function ($item) {
            return $item->detailPembayaran?->nominal ?? 0;
        });

        // Hitung total pengeluaran
        $totalPengeluaran = $pengeluaran->sum('nominal');

        // Hitung saldo akhir
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
