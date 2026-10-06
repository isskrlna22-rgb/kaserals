<?php

namespace App\Http\Controllers;

use App\Models\PembayaranKas;
use App\Models\Pengeluaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | TOTAL PEMBAYARAN KAS
        |--------------------------------------------------------------------------
        | Hanya pembayaran yang statusnya Diterima
        */

        $totalPembayaran = PembayaranKas::where('status', 'Diterima')
            ->sum('nominal');


        /*
        |--------------------------------------------------------------------------
        | TOTAL PENGELUARAN
        |--------------------------------------------------------------------------
        */

        $totalPengeluaran = Pengeluaran::sum('nominal');


        /*
        |--------------------------------------------------------------------------
        | SALDO KAS
        |--------------------------------------------------------------------------
        */

        $saldo = $totalPembayaran - $totalPengeluaran;


        /*
        |--------------------------------------------------------------------------
        | DATA SISWA
        |--------------------------------------------------------------------------
        */

        $totalSiswa = Siswa::count();


        /*
        |--------------------------------------------------------------------------
        | SISWA SUDAH BAYAR
        |--------------------------------------------------------------------------
        | Siswa dianggap sudah bayar jika mempunyai
        | minimal satu pembayaran dengan status Diterima.
        */

        $sudahBayar = Siswa::whereHas('pembayaranKas', function ($query) {
            $query->where('status', 'Diterima');
        })->count();


        /*
        |--------------------------------------------------------------------------
        | SISWA BELUM BAYAR
        |--------------------------------------------------------------------------
        */

        $belumBayar = $totalSiswa - $sudahBayar;


        /*
        |--------------------------------------------------------------------------
        | PERSENTASE PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        $persentasePembayaran = $totalSiswa > 0
            ? round(($sudahBayar / $totalSiswa) * 100)
            : 0;


        /*
        |--------------------------------------------------------------------------
        | PEMBAYARAN MENUNGGU VERIFIKASI
        |--------------------------------------------------------------------------
        */

        $pembayaranMenunggu = PembayaranKas::with('siswa')
            ->where('status', 'Menunggu')
            ->latest('tanggal')
            ->latest('id_pembayaran')
            ->take(3)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | JUMLAH PEMBAYARAN MENUNGGU
        |--------------------------------------------------------------------------
        */

        $jumlahMenunggu = PembayaranKas::where('status', 'Menunggu')
            ->count();


        /*
        |--------------------------------------------------------------------------
        | MINGGU AKTIF
        |--------------------------------------------------------------------------
        */

        $mingguAktif = PembayaranKas::max('minggu_ke');


        /*
        |--------------------------------------------------------------------------
        | KIRIM DATA KE DASHBOARD
        |--------------------------------------------------------------------------
        */

        return view('dashboard-bendahara', compact(
            'totalPembayaran',
            'totalPengeluaran',
            'saldo',
            'totalSiswa',
            'sudahBayar',
            'belumBayar',
            'persentasePembayaran',
            'pembayaranMenunggu',
            'jumlahMenunggu',
            'mingguAktif'
        ));
    }
}
