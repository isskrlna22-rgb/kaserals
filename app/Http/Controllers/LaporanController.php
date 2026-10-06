<?php

namespace App\Http\Controllers;

use App\Models\PembayaranKas;
use App\Models\Pengeluaran;

class LaporanController extends Controller
{
    // =========================
    // API LAPORAN
    // =========================
    public function index()
    {
        // Hanya pembayaran yang sudah diterima
        $pembayaran = PembayaranKas::with('siswa')
            ->where('status', 'Diterima')
            ->latest('tanggal')
            ->get();

        // Semua pengeluaran yang tercatat
        $pengeluaran = Pengeluaran::with('user')
            ->latest('tanggal')
            ->get();

        // Total pembayaran kas yang sudah diterima
        $totalPembayaran = $pembayaran->sum('nominal');

        // Total seluruh pengeluaran
        $totalPengeluaran = $pengeluaran->sum('nominal');

        // Saldo akhir
        $saldo = $totalPembayaran - $totalPengeluaran;

        return response()->json([
            'ringkasan' => [
                'total_pembayaran' => $totalPembayaran,
                'total_pengeluaran' => $totalPengeluaran,
                'saldo' => $saldo,
            ],
            'pembayaran' => $pembayaran,
            'pengeluaran' => $pengeluaran,
        ]);
    }

    // =========================
    // HALAMAN WEB LAPORAN
    // =========================
    public function page()
    {
        // Hanya pembayaran yang sudah diterima
        $pembayaran = PembayaranKas::with('siswa')
            ->where('status', 'Diterima')
            ->latest('tanggal')
            ->get();

        // Semua pengeluaran yang tercatat
        $pengeluaran = Pengeluaran::with('user')
            ->latest('tanggal')
            ->get();

        // Total pembayaran kas yang sudah diterima
        $totalPembayaran = $pembayaran->sum('nominal');

        // Total seluruh pengeluaran
        $totalPengeluaran = $pengeluaran->sum('nominal');

        // Saldo akhir
        $saldo = $totalPembayaran - $totalPengeluaran;

        return view('laporan.index', compact(
            'pembayaran',
            'pengeluaran',
            'totalPembayaran',
            'totalPengeluaran',
            'saldo'
        ));
    }
}
