<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\PembayaranKas;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;

class SiswaDashboardController extends Controller
{
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
