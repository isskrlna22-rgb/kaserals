<?php

namespace App\Http\Controllers;

use App\Models\PembayaranKas;
use App\Models\Pengeluaran;
use App\Models\Siswa;
use App\Models\Pengumuman;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // =========================
        // DATA DASHBOARD
        // =========================

        $totalSiswa = Siswa::count();

        $totalPengguna = User::count();

        $totalPembayaran = PembayaranKas::where('status', 'Diterima')
            ->sum('nominal');

        $totalPengeluaran = Pengeluaran::sum('nominal');

        $saldo = $totalPembayaran - $totalPengeluaran;

        $jumlahMenunggu = PembayaranKas::where('status', 'Menunggu')
            ->count();

        $jumlahPengumuman = Pengumuman::count();


        // =========================
        // TRANSAKSI TERBARU
        // =========================

        $pembayaranTerbaru = PembayaranKas::with('siswa')
            ->latest('tanggal')
            ->latest('id_pembayaran')
            ->take(5)
            ->get()
            ->map(function ($item) {
                return [
                    'nama' => $item->siswa?->nama_lengkap ?? '-',
                    'nominal' => $item->nominal,
                    'metode' => $item->metode_pembayaran ?? '-',
                    'status' => $item->status,
                    'tipe' => 'Pembayaran Kas',
                    'tanggal' => $item->tanggal,
                ];
            });

        $pengeluaranTerbaru = Pengeluaran::latest('tanggal')
            ->latest('id_pengeluaran')
            ->take(5)
            ->get()
            ->map(function ($item) {
                return [
                    'nama' => $item->keterangan ?? $item->kategori ?? 'Pengeluaran',
                    'nominal' => $item->nominal,
                    'metode' => '-',
                    'status' => 'Pengeluaran',
                    'tipe' => 'Pengeluaran',
                    'tanggal' => $item->tanggal,
                ];
            });

        $transaksiTerbaru = $pembayaranTerbaru
            ->concat($pengeluaranTerbaru)
            ->sortByDesc(function ($item) {
                return $item['tanggal'];
            })
            ->take(5)
            ->values();


        // =========================
        // ADMIN
        // =========================

        if (Auth::user()->role === 'ADMIN') {
            return view('dashboard', compact(
                'totalSiswa',
                'totalPengguna',
                'totalPembayaran',
                'totalPengeluaran',
                'saldo',
                'jumlahMenunggu',
                'jumlahPengumuman',
                'transaksiTerbaru'
            ));
        }


        // =========================
        // BENDAHARA
        // =========================

        $sudahBayar = Siswa::whereHas('pembayaranKas', function ($query) {
            $query->where('status', 'Diterima');
        })->count();

        $belumBayar = $totalSiswa - $sudahBayar;

        $persentasePembayaran = $totalSiswa > 0
            ? round(($sudahBayar / $totalSiswa) * 100)
            : 0;

        $pembayaranMenunggu = PembayaranKas::with('siswa')
            ->where('status', 'Menunggu')
            ->latest('tanggal')
            ->latest('id_pembayaran')
            ->take(3)
            ->get();

        $mingguAktif = PembayaranKas::max('minggu_ke');

        return view('dashboard-bendahara', compact(
            'totalSiswa',
            'totalPembayaran',
            'totalPengeluaran',
            'saldo',
            'sudahBayar',
            'belumBayar',
            'persentasePembayaran',
            'pembayaranMenunggu',
            'jumlahMenunggu',
            'mingguAktif'
        ));
    }
}
