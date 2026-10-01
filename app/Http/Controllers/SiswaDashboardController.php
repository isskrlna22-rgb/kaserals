<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\PembayaranKas;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;

class SiswaDashboardController extends Controller
{
    // Untuk halaman Dashboard Siswa
    public function page()
    {
        $user = Auth::user();

        $siswa = Siswa::where('user_id', $user->id)->first();

        if (!$siswa) {
            abort(404, 'Data siswa belum terhubung dengan akun ini.');
        }

        // Pembayaran kas milik siswa yang login
        $pembayaran = PembayaranKas::where('siswa_id', $siswa->id)
            ->latest('tanggal')
            ->get();

        // Total pembayaran siswa
        $totalPembayaranSiswa = $pembayaran->sum('nominal');

        // Jumlah transaksi pembayaran siswa
        $jumlahPembayaran = $pembayaran->count();

        // Pembayaran terakhir
        $pembayaranTerakhir = $pembayaran->first();

        // Status pembayaran siswa
        $statusPembayaran = $pembayaran->isNotEmpty()
            ? 'SUDAH BAYAR'
            : 'BELUM BAYAR';

        // Informasi keuangan seluruh kas kelas
        $totalPembayaranKas = PembayaranKas::sum('nominal');
        $totalPemasukan = Pemasukan::sum('nominal');
        $totalPengeluaran = Pengeluaran::sum('nominal');

        // Saldo kas kelas
        $saldoKas = $totalPembayaranKas
            + $totalPemasukan
            - $totalPengeluaran;

        return view('dashboard-siswa', compact(
            'siswa',
            'pembayaran',
            'totalPembayaranSiswa',
            'jumlahPembayaran',
            'pembayaranTerakhir',
            'statusPembayaran',
            'totalPemasukan',
            'totalPengeluaran',
            'saldoKas'
        ));
    }

    // API/data JSON Dashboard Siswa
    public function index()
    {
        $user = Auth::user();

        $siswa = Siswa::where('user_id', $user->id)->first();

        if (!$siswa) {
            return response()->json([
                'message' => 'Data siswa belum terhubung dengan akun ini.',
            ], 404);
        }

        $pembayaran = PembayaranKas::where('siswa_id', $siswa->id)
            ->latest('tanggal')
            ->get();

        $totalPembayaran = PembayaranKas::sum('nominal');
        $totalPemasukan = Pemasukan::sum('nominal');
        $totalPengeluaran = Pengeluaran::sum('nominal');

        $saldo = $totalPembayaran
            + $totalPemasukan
            - $totalPengeluaran;

        return response()->json([
            'siswa' => [
                'id' => $siswa->id,
                'nis' => $siswa->nis,
                'nama' => $siswa->nama,
                'kelas' => $siswa->kelas,
            ],

            'pembayaran' => [
                'total' => $pembayaran->sum('nominal'),
                'jumlah_transaksi' => $pembayaran->count(),
                'status' => $pembayaran->count() > 0
                    ? 'SUDAH BAYAR'
                    : 'BELUM BAYAR',
            ],

            'riwayat_pembayaran' => $pembayaran,

            'informasi_kas' => [
                'total_pemasukan' => $totalPemasukan,
                'total_pengeluaran' => $totalPengeluaran,
                'saldo_kas' => $saldo,
            ],
        ]);
    }
}
