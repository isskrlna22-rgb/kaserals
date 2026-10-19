<?php

namespace App\Http\Controllers;

use App\Models\PembayaranKas;
use App\Models\Pengeluaran;
use App\Models\Siswa;
use App\Models\PengaturanSistem;
use Illuminate\Support\Facades\Auth;

class WaliKelasController extends Controller
{
    /**
     * Dashboard Wali Kelas
     */

public function index()
{
    $user = Auth::user();
    $waliKelas = $user;

    // Ambil kelas yang ditugaskan kepada Wali Kelas login.
    $pengaturan = PengaturanSistem::where(
        'id_wali_kelas',
        $user->id_users
    )->first();

    $kelas = $pengaturan?->nama_kelas;

    // Dasar query: hanya pembayaran siswa di kelas Wali Kelas.
    $pembayaranQuery = PembayaranKas::whereHas(
        'siswa',
        function ($query) use ($kelas) {
            if ($kelas) {
                $query->where('kelas', $kelas);
            } else {
                $query->whereRaw('1 = 0');
            }
        }
    );

    $totalKasDiterima = (clone $pembayaranQuery)
        ->where('status', 'Diterima')
        ->sum('nominal');

    $totalPengeluaran = Pengeluaran::sum('nominal');
    $saldoKas = $totalKasDiterima - $totalPengeluaran;

    $jumlahPembayaranDiterima = (clone $pembayaranQuery)
        ->where('status', 'Diterima')
        ->count();

    $jumlahMenunggu = (clone $pembayaranQuery)
        ->where('status', 'Menunggu')
        ->count();

    $jumlahDitolak = (clone $pembayaranQuery)
        ->where('status', 'Ditolak')
        ->count();

    $jumlahMenunggak = Siswa::where('kelas', $kelas)
        ->whereHas('pembayaranKas', function ($query) {
            $query->whereIn('status', ['Menunggu', 'Ditolak']);
        })
        ->count();

    $pembayaranTerbaru = (clone $pembayaranQuery)
        ->with('siswa')
        ->orderByDesc('tanggal')
        ->orderByDesc('id_pembayaran')
        ->take(5)
        ->get();

    $totalPemasukan = $totalKasDiterima;

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

    // Ambil kelas yang ditugaskan kepada Wali Kelas yang login.
    $pengaturan = PengaturanSistem::where(
        'id_wali_kelas',
        $waliKelas->id_users
    )->first();

    $kelas = $pengaturan?->nama_kelas;

    // Ambil pembayaran dari siswa kelas tersebut saja.
    $queryPembayaran = PembayaranKas::with('siswa');

    if ($kelas) {
        $queryPembayaran->whereHas('siswa', function ($query) use ($kelas) {
            $query->where('kelas', $kelas);
        });
    } else {
        // Jangan tampilkan transaksi jika Wali Kelas belum ditugaskan.
        $queryPembayaran->whereRaw('1 = 0');
    }

    $pembayaran = $queryPembayaran
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
    $waliKelas = Auth::user();

    $pengaturan = PengaturanSistem::where(
        'id_wali_kelas',
        $waliKelas->id_users
    )->first();

    $kelas = $pengaturan?->nama_kelas;

    $pembayaranQuery = PembayaranKas::whereHas(
        'siswa',
        function ($query) use ($kelas) {
            if ($kelas) {
                $query->where('kelas', $kelas);
            } else {
                $query->whereRaw('1 = 0');
            }
        }
    );

    $totalKasDiterima = (clone $pembayaranQuery)
        ->where('status', 'Diterima')
        ->sum('nominal');

    $totalPengeluaran = Pengeluaran::sum('nominal');
    $saldoKas = $totalKasDiterima - $totalPengeluaran;

    $jumlahPembayaranDiterima = (clone $pembayaranQuery)
        ->where('status', 'Diterima')
        ->count();

    $jumlahMenunggu = (clone $pembayaranQuery)
        ->where('status', 'Menunggu')
        ->count();

    $pembayaran = (clone $pembayaranQuery)
        ->with('siswa')
        ->orderByDesc('tanggal')
        ->orderByDesc('id_pembayaran')
        ->get();

    $pengeluaran = Pengeluaran::with('user')
        ->orderByDesc('tanggal')
        ->get();

    return view('wali-kelas.laporan-keuangan', compact(
        'waliKelas',
        'kelas',
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
