<?php

namespace App\Http\Controllers;

use App\Models\PembayaranKas;
use App\Models\Pengeluaran;
use App\Models\PengaturanSistem;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    /**
     * Mengambil kelas yang menjadi tanggung jawab Bendahara.
     */
    private function kelasBendahara()
    {
        return PengaturanSistem::where(
            'id_bendahara',
            Auth::id()
        )->pluck('nama_kelas');
    }

    /**
     * Query pembayaran sesuai hak akses.
     */
    private function queryPembayaran()
    {
        $query = PembayaranKas::with('siswa')
            ->where('status', 'Diterima');

        if (Auth::user()->role === 'BENDAHARA') {
            $kelasSaya = $this->kelasBendahara();

            $query->whereHas('siswa', function ($q) use ($kelasSaya) {
                $q->whereIn('kelas', $kelasSaya);
            });
        } elseif (Auth::user()->role !== 'ADMIN') {
            abort(403, 'Anda tidak memiliki akses ke laporan keuangan.');
        }

        return $query->latest('tanggal');
    }

    /**
     * Query pengeluaran sesuai hak akses.
     */
    private function queryPengeluaran()
    {
        $query = Pengeluaran::with('user');

        if (Auth::user()->role === 'BENDAHARA') {
            $kelasSaya = $this->kelasBendahara();

            $query->whereIn('nama_kelas', $kelasSaya);
        } elseif (Auth::user()->role !== 'ADMIN') {
            abort(403, 'Anda tidak memiliki akses ke laporan keuangan.');
        }

        return $query->latest('tanggal');
    }

    /**
     * API LAPORAN
     */
    public function index()
    {
        $pembayaran = $this->queryPembayaran()->get();
        $pengeluaran = $this->queryPengeluaran()->get();

        $totalPembayaran = $pembayaran->sum('nominal');
        $totalPengeluaran = $pengeluaran->sum('nominal');
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

    /**
     * HALAMAN WEB LAPORAN
     */
    public function page()
    {
        $pembayaran = $this->queryPembayaran()->get();
        $pengeluaran = $this->queryPengeluaran()->get();

        $totalPembayaran = $pembayaran->sum('nominal');
        $totalPengeluaran = $pengeluaran->sum('nominal');
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
