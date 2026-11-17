<?php

namespace App\Http\Controllers;

use App\Models\PembayaranKas;
use App\Models\Pengeluaran;
use Illuminate\Support\Facades\DB;
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
 * Rekap pembayaran berdasarkan kelas sesuai hak akses.
 */
private function queryRekapPerKelas()
{
    $query = DB::table('detail_pembayaran')
        ->join(
            'siswa',
            'detail_pembayaran.id_siswa',
            '=',
            'siswa.id_siswa'
        );

    if (Auth::user()->role === 'BENDAHARA') {
        $kelasSaya = $this->kelasBendahara();

        $query->whereIn('siswa.kelas', $kelasSaya);
    } elseif (Auth::user()->role !== 'ADMIN') {
        abort(403, 'Anda tidak memiliki akses ke laporan keuangan.');
    }

    return $query
        ->select(
            'siswa.kelas',
            DB::raw('COUNT(detail_pembayaran.id_detail) as jumlah_pembayaran'),
            DB::raw('SUM(detail_pembayaran.nominal) as total_kas')
        )
        ->groupBy('siswa.kelas')
        ->orderBy('siswa.kelas')
        ->get();
}

    /**
     * Query pembayaran sesuai hak akses.
     */
    private function queryPembayaran()
    {
        $query = PembayaranKas::with([
            'siswa',
            'transaksi',
            'detailPembayaran',
        ])->whereHas('transaksi', function ($q) {
            $q->where('status', 'Diterima');
        });

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
     * Menghitung total nominal pembayaran.
     *
     * @param \Illuminate\Support\Collection $pembayaran
     * @return float|int
     */
    private function hitungTotalPembayaran(
        \Illuminate\Support\Collection $pembayaran
    ) {
        return $pembayaran->sum(function ($item) {
            return $item->detailPembayaran?->nominal ?? 0;
        });
    }
    /**
     * API LAPORAN
     */
    public function index()
    {
        $pembayaran = $this->queryPembayaran()->get();
        $pengeluaran = $this->queryPengeluaran()->get();

        $totalPembayaran = $this->hitungTotalPembayaran($pembayaran);
        $totalPengeluaran = $pengeluaran->sum('nominal');
        $saldo = $totalPembayaran - $totalPengeluaran;

        $rekapPerKelas = DB::table('detail_pembayaran')
    ->join(
        'siswa',
        'detail_pembayaran.id_siswa',
        '=',
        'siswa.id_siswa'
    )
    ->select(
        'siswa.kelas',
        DB::raw('COUNT(detail_pembayaran.id_detail) as jumlah_pembayaran'),
        DB::raw('SUM(detail_pembayaran.nominal) as total_kas')
    )
    ->groupBy('siswa.kelas')
    ->orderBy('siswa.kelas')
    ->get();
return response()->json([
    'ringkasan' => [
        'total_pembayaran' => $totalPembayaran,
        'total_pengeluaran' => $totalPengeluaran,
        'saldo' => $saldo,
    ],
    'rekap_per_kelas' => $rekapPerKelas,
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

    $totalPembayaran = $this->hitungTotalPembayaran($pembayaran);
    $totalPengeluaran = $pengeluaran->sum('nominal');
    $saldo = $totalPembayaran - $totalPengeluaran;

    // Rekap pembayaran sesuai hak akses
    $rekapPerKelas = $this->queryRekapPerKelas();

    return view('laporan.index', compact(
        'pembayaran',
        'pengeluaran',
        'totalPembayaran',
        'totalPengeluaran',
        'saldo',
        'rekapPerKelas'
    ));
}

    }

