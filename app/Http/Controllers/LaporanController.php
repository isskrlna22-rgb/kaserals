<?php

namespace App\Http\Controllers;

use App\Models\PembayaranKas;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;

class LaporanController extends Controller
{
    // =========================
    // API LAPORAN
    // =========================
    public function index()
    {
        $pembayaran = PembayaranKas::with('siswa')
            ->latest('tanggal')
            ->get();

        $pemasukan = Pemasukan::latest('tanggal')->get();

        $pengeluaran = Pengeluaran::latest('tanggal')->get();

        $totalPembayaran = PembayaranKas::sum('nominal');

        $totalPemasukan = Pemasukan::sum('nominal');

        $totalPengeluaran = Pengeluaran::sum('nominal');

        $saldo = $totalPembayaran
            + $totalPemasukan
            - $totalPengeluaran;

        return response()->json([
            'ringkasan' => [
                'total_pembayaran' => $totalPembayaran,
                'total_pemasukan' => $totalPemasukan,
                'total_pengeluaran' => $totalPengeluaran,
                'saldo' => $saldo,
            ],
            'pembayaran' => $pembayaran,
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,
        ]);
    }

    // =========================
    // HALAMAN WEB LAPORAN
    // =========================
    public function page()
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

        return view('laporan.index', compact(
            'pembayaran',
            'pemasukan',
            'pengeluaran',
            'totalPembayaran',
            'totalPemasukan',
            'totalPengeluaran',
            'saldo'
        ));
    }
}
