<?php

namespace App\Http\Controllers;

use App\Models\PembayaranKas;
use App\Models\Pengeluaran;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class WaliKelasController extends Controller
{
    /**
     * Dashboard Wali Kelas
     */
    public function index()
    {
        $user = Auth::user();

        // Informasi Wali Kelas

        // Informasi Wali Kelas
        $waliKelas = $user;
        $kelas = 'Semua Kelas';


        // Total kas yang sudah diterima
        $totalKasDiterima = PembayaranKas::where(
            'status',
            'Diterima'
        )->sum('nominal');

        // Total pengeluaran kas
        $totalPengeluaran = Pengeluaran::sum('nominal');

        // Total saldo kas
        $saldoKas = $totalKasDiterima - $totalPengeluaran;

        // Jumlah pembayaran berdasarkan status
        $jumlahPembayaranDiterima = PembayaranKas::where(
            'status',
            'Diterima'
        )->count();

        $jumlahMenunggu = PembayaranKas::where(
            'status',
            'Menunggu'
        )->count();

        $jumlahDitolak = PembayaranKas::where(
            'status',
            'Ditolak'
        )->count();

        // Jumlah siswa yang memiliki pembayaran belum diterima
        $jumlahMenunggak = Siswa::whereHas(
            'pembayaranKas',
            function ($query) {
                $query->whereIn('status', [
                    'Menunggu',
                    'Ditolak'
                ]);
            }
        )->count();

        // Transaksi pembayaran terbaru
        $pembayaranTerbaru = PembayaranKas::with('siswa')
            ->orderByDesc('tanggal')
            ->orderByDesc('id_pembayaran')
            ->take(5)
            ->get();

        // Variabel yang digunakan pada tampilan dashboard
        $totalPemasukan = $totalKasDiterima;

        // Tampilkan dashboard Wali Kelas di luar folder wali-kelas
        return view('dashboard-walikelas', compact(
            'waliKelas',
            'kelas',
            'totalKasDiterima',
            'totalPemasukan',
            'totalPengeluaran',
            'saldoKas',
            'jumlahPembayaranDiterima',
            'jumlahMenunggu',
            'jumlahDitolak',
            'jumlahMenunggak',
            'pembayaranTerbaru'
        ));
    }

    /**
     * Riwayat Transaksi
     */

    public function riwayatTransaksi()
    {
        $waliKelas = Auth::user();

        // Kelas belum terhubung ke akun Wali Kelas.
        $kelas = null;

        $pembayaran = PembayaranKas::with('siswa')
            ->orderByDesc('tanggal')
            ->orderByDesc('id_pembayaran')
            ->get();

        $pengeluaran = Pengeluaran::with('user')
            ->orderByDesc('tanggal')
            ->get();

        return view('wali-kelas.riwayat-transaksi', compact(
            'waliKelas',
            'kelas',
            'pembayaran',
            'pengeluaran'
        ));
    }


    /**
     * Laporan Keuangan
     */
    public function laporanKeuangan()
    {
        $totalKasDiterima = PembayaranKas::where(
            'status',
            'Diterima'
        )->sum('nominal');

        $totalPengeluaran = Pengeluaran::sum('nominal');

        $saldoKas = $totalKasDiterima - $totalPengeluaran;

        $jumlahPembayaranDiterima = PembayaranKas::where(
            'status',
            'Diterima'
        )->count();

        $jumlahMenunggu = PembayaranKas::where(
            'status',
            'Menunggu'
        )->count();

        $pembayaran = PembayaranKas::with('siswa')
            ->orderByDesc('tanggal')
            ->orderByDesc('id_pembayaran')
            ->get();

        $pengeluaran = Pengeluaran::with('user')
            ->orderByDesc('tanggal')
            ->get();

        return view('wali-kelas.laporan-keuangan', compact(
            'totalKasDiterima',
            'totalPengeluaran',
            'saldoKas',
            'jumlahPembayaranDiterima',
            'jumlahMenunggu',
            'pembayaran',
            'pengeluaran'
        ));
    }
}
