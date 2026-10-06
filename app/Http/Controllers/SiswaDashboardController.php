<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\PembayaranKas;
use App\Models\Pengeluaran;

class SiswaDashboardController extends Controller
{
    // =========================
    // DASHBOARD SISWA
    // =========================

    public function page()
    {
        $user = Auth::user();

        $siswa = Siswa::where('id_user', $user->id_users)->first();

        if (!$siswa) {
            abort(404, 'Data siswa belum terhubung dengan akun ini.');
        }

        // Semua pembayaran siswa
        $pembayaran = PembayaranKas::where('id_siswa', $siswa->id_siswa)
            ->latest('tanggal')
            ->get();

        // Hanya pembayaran yang sudah diterima
        $pembayaranDiterima = $pembayaran->where('status', 'Diterima');

        // Total pembayaran siswa
        $totalPembayaranSiswa = $pembayaranDiterima->sum('nominal');

        // Jumlah transaksi siswa
        $jumlahPembayaran = $pembayaranDiterima->count();

        // Pembayaran terakhir
        $pembayaranTerakhir = $pembayaran->first();

        // Status pembayaran siswa
        $statusPembayaran = $pembayaranDiterima->isNotEmpty()
            ? 'SUDAH BAYAR'
            : 'BELUM BAYAR';

        // Total kas kelas
        $totalPembayaranKas = PembayaranKas::where('status', 'Diterima')
            ->sum('nominal');

        $totalPengeluaran = Pengeluaran::sum('nominal');

        // Saldo kas kelas
        $saldoKas = $totalPembayaranKas - $totalPengeluaran;

        return view('dashboard-siswa', compact(
            'siswa',
            'pembayaran',
            'totalPembayaranSiswa',
            'jumlahPembayaran',
            'pembayaranTerakhir',
            'statusPembayaran',
            'totalPengeluaran',
            'saldoKas'
        ));
    }


    // =========================
    // STATUS PEMBAYARAN
    // =========================

    public function statusPembayaran()
    {
        $user = Auth::user();

        $siswa = Siswa::where('id_user', $user->id_users)->first();

        if (!$siswa) {
            abort(404, 'Data siswa belum terhubung dengan akun ini.');
        }

        $pembayaran = PembayaranKas::where('id_siswa', $siswa->id_siswa)
            ->latest('tanggal')
            ->get();

        $pembayaranDiterima = $pembayaran->where('status', 'Diterima');

        $totalPembayaranSiswa = $pembayaranDiterima->sum('nominal');
        $jumlahPembayaran = $pembayaranDiterima->count();

        $statusPembayaran = $pembayaranDiterima->isNotEmpty()
            ? 'SUDAH BAYAR'
            : 'BELUM BAYAR';

        return view('siswa.status-pembayaran', compact(
            'siswa',
            'pembayaran',
            'totalPembayaranSiswa',
            'jumlahPembayaran',
            'statusPembayaran'
        ));
    }


    // =========================
    // API / DATA JSON
    // =========================

    public function index()
    {
        $user = Auth::user();

        $siswa = Siswa::where('id_user', $user->id_users)->first();

        if (!$siswa) {
            return response()->json([
                'message' => 'Data siswa belum terhubung dengan akun ini.',
            ], 404);
        }

        $pembayaran = PembayaranKas::where('id_siswa', $siswa->id_siswa)
            ->latest('tanggal')
            ->get();

        $pembayaranDiterima = $pembayaran->where('status', 'Diterima');

        $totalPembayaranKas = PembayaranKas::where('status', 'Diterima')
            ->sum('nominal');

        $totalPengeluaran = Pengeluaran::sum('nominal');

        $saldo = $totalPembayaranKas - $totalPengeluaran;

        return response()->json([
            'siswa' => [
                'id_siswa' => $siswa->id_siswa,
                'nisn' => $siswa->nisn,
                'nama_lengkap' => $siswa->nama_lengkap,
                'kelas' => $siswa->kelas,
            ],

            'pembayaran' => [
                'total' => $pembayaranDiterima->sum('nominal'),
                'jumlah_transaksi' => $pembayaranDiterima->count(),
                'status' => $pembayaranDiterima->isNotEmpty()
                    ? 'SUDAH BAYAR'
                    : 'BELUM BAYAR',
            ],

            'riwayat_pembayaran' => $pembayaran,

            'informasi_kas' => [
                'total_pembayaran' => $totalPembayaranKas,
                'total_pengeluaran' => $totalPengeluaran,
                'saldo_kas' => $saldo,
            ],
        ]);
    }

        public function pembayaran()
{
    $user = Auth::user();

    $siswa = Siswa::where('id_user', $user->id_users)->first();

    if (!$siswa) {
        abort(404, 'Data siswa belum terhubung dengan akun ini.');
    }

    return view('siswa.pembayaran', compact('siswa'));
}

public function riwayat()
{
    $user = Auth::user();

    $siswa = Siswa::where('id_user', $user->id_users)->first();

    if (!$siswa) {
        abort(404, 'Data siswa belum terhubung dengan akun ini.');
    }

    $pembayaran = PembayaranKas::where('id_siswa', $siswa->id_siswa)
        ->latest('tanggal')
        ->get();

    return view('siswa.riwayat', compact('siswa', 'pembayaran'));

    }
}
