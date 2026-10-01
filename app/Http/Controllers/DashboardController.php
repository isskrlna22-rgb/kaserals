<?php

namespace App\Http\Controllers;

use App\Models\PembayaranKas;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPembayaran = PembayaranKas::sum('nominal');
        $totalPemasukan = Pemasukan::sum('nominal');
        $totalPengeluaran = Pengeluaran::sum('nominal');

        $saldo = $totalPembayaran
            + $totalPemasukan
            - $totalPengeluaran;

        return response()->json([
            'total_pembayaran' => $totalPembayaran,
            'total_pemasukan' => $totalPemasukan,
            'total_pengeluaran' => $totalPengeluaran,
            'saldo' => $saldo,
        ]);
    }

    public function view()
    {
        // =========================
        // RINGKASAN KEUANGAN
        // =========================

        $totalPembayaran = PembayaranKas::sum('nominal');
        $totalPemasukan = Pemasukan::sum('nominal');
        $totalPengeluaran = Pengeluaran::sum('nominal');

        $saldo = $totalPembayaran
            + $totalPemasukan
            - $totalPengeluaran;

        // =========================
        // DATA SISWA & STATUS BAYAR
        // =========================

        $totalSiswa = \App\Models\Siswa::count();

        $pembayaranTerbaru = PembayaranKas::latest('tanggal')->first();

        $periodeAktif = $pembayaranTerbaru
            ? $pembayaranTerbaru->periode
            : now()->translatedFormat('F Y');

        $sudahBayar = $pembayaranTerbaru
            ? PembayaranKas::where('periode', $periodeAktif)
                ->distinct('siswa_id')
                ->count('siswa_id')
            : 0;

        $belumBayar = max($totalSiswa - $sudahBayar, 0);

        $persentasePembayaran = $totalSiswa > 0
            ? round(($sudahBayar / $totalSiswa) * 100)
            : 0;

        // =========================
        // TRANSAKSI TERAKHIR
        // =========================

        $transaksi = collect();

        // Pembayaran Kas
        $pembayaran = PembayaranKas::with('siswa')
            ->latest('tanggal')
            ->take(5)
            ->get();

        foreach ($pembayaran as $item) {
            $tanggal = $item->getAttribute('tanggal')
                ?? $item->created_at;

            $transaksi->push([
                'tanggal' => Carbon::parse($tanggal),
                'jenis' => 'Pembayaran',
                'keterangan' => ($item->siswa?->nama ?? 'Siswa')
                    . ' — kas ' . $item->periode,
                'nominal' => $item->nominal,
                'arah' => 'in',
            ]);
        }

        // Pemasukan
        $pemasukan = Pemasukan::latest()
            ->take(5)
            ->get();

        foreach ($pemasukan as $item) {
            $tanggal = $item->getAttribute('tanggal')
                ?? $item->created_at;

            $keterangan = null;

            foreach (['keterangan', 'sumber', 'sumber_dana'] as $field) {
                $value = $item->getAttribute($field);

                if ($value !== null && $value !== '') {
                    $keterangan = $value;
                    break;
                }
            }

            $transaksi->push([
                'tanggal' => Carbon::parse($tanggal),
                'jenis' => 'Pemasukan',
                'keterangan' => $keterangan ?? 'Pemasukan kas',
                'nominal' => $item->nominal,
                'arah' => 'in',
            ]);
        }

        // Pengeluaran
        $pengeluaran = Pengeluaran::latest()
            ->take(5)
            ->get();

        foreach ($pengeluaran as $item) {
            $tanggal = $item->getAttribute('tanggal')
                ?? $item->created_at;

            $keterangan = null;

            foreach (['keterangan', 'kategori'] as $field) {
                $value = $item->getAttribute($field);

                if ($value !== null && $value !== '') {
                    $keterangan = $value;
                    break;
                }
            }

            $transaksi->push([
                'tanggal' => Carbon::parse($tanggal),
                'jenis' => 'Pengeluaran',
                'keterangan' => $keterangan ?? 'Pengeluaran kas',
                'nominal' => $item->nominal,
                'arah' => 'out',
            ]);
        }

        $transaksi = $transaksi
            ->sortByDesc('tanggal')
            ->take(5)
            ->values();

        // =========================
        // PILIH DASHBOARD BERDASARKAN ROLE
        // =========================

        $data = [
            'totalPembayaran' => $totalPembayaran,
            'totalPemasukan' => $totalPemasukan,
            'totalPengeluaran' => $totalPengeluaran,
            'saldo' => $saldo,
            'totalSiswa' => $totalSiswa,
            'periodeAktif' => $periodeAktif,
            'sudahBayar' => $sudahBayar,
            'belumBayar' => $belumBayar,
            'persentasePembayaran' => $persentasePembayaran,
            'transaksi' => $transaksi,
        ];

     $user = Auth::user();

        if ($user->role === 'BENDAHARA') {
            return view('dashboard-bendahara', $data);
        }

        return view('dashboard', $data);
    }
}
