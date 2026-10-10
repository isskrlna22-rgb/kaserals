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

        // Ambil data siswa yang terhubung dengan akun login
        $siswa = Siswa::where('id_user', $user->id_users)->first();

        if (!$siswa) {
            abort(404, 'Data siswa belum terhubung dengan akun ini.');
        }

        // Ambil transaksi pembayaran milik siswa
        $pembayaran = PembayaranKas::where('id_siswa', $siswa->id_siswa)
            ->orderByDesc('tanggal')
            ->get();

        // Hitung pembayaran yang sudah diterima
        $pembayaranDiterima = $pembayaran->where('status', 'Diterima');

        $totalPembayaranSiswa = $pembayaranDiterima->sum('nominal');
        $jumlahPembayaran = $pembayaranDiterima->count();

        $pembayaranTerakhir = $pembayaran->first();

        $statusPembayaran = $pembayaranDiterima->isNotEmpty()
            ? 'SUDAH BAYAR'
            : 'BELUM BAYAR';

        // Hitung total pembayaran seluruh kelas
        $totalPembayaranKas = PembayaranKas::where('status', 'Diterima')
            ->sum('nominal');

        // Hitung pengeluaran dan saldo kelas
        $totalPengeluaran = \App\Models\Pengeluaran::sum('nominal');
        $saldoKas = $totalPembayaranKas - $totalPengeluaran;

        // Ambil pengumuman terbaru dari database
        $pengumumanTerbaru = \App\Models\Pengumuman::latest()->first();

        $pengumuman = $pengumumanTerbaru
            ? ($pengumumanTerbaru->judul
                ?? $pengumumanTerbaru->isi
                ?? 'Ada pengumuman terbaru.')
            : 'Belum ada pengumuman terbaru.';

        // Hitung periode yang belum dibayar
        $mingguTerakhir = (int) (
            PembayaranKas::max('minggu_ke') ?? 0
        );

        $mingguDibayar = $pembayaranDiterima
            ->pluck('minggu_ke')
            ->unique()
            ->count();

        $tertunggakPeriode = max(
            0,
            $mingguTerakhir - $mingguDibayar
        );

        return view('dashboard-siswa', compact(
            'siswa',
            'pembayaran',
            'totalPembayaranSiswa',
            'jumlahPembayaran',
            'pembayaranTerakhir',
            'statusPembayaran',
            'totalPembayaranKas',
            'totalPengeluaran',
            'saldoKas',
            'pengumuman',
            'tertunggakPeriode'
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

        $pembayaran = PembayaranKas::where('id_siswa', $siswa->id_siswa)
            ->latest('tanggal')
            ->latest('id_pembayaran')
            ->get();

        return view('siswa.pembayaran', compact(
            'siswa',
            'pembayaran'
        ));
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
    // =========================
    // STATUS PEMBAYARAN UNTUK ADMIN
    // =========================

    public function adminStatusPembayaran()
    {
        $siswa = Siswa::orderBy('nama_lengkap')->get();

        $semuaPembayaran = PembayaranKas::latest('tanggal')
            ->get()
            ->groupBy('id_siswa');

        $dataStatus = $siswa->map(function ($item) use ($semuaPembayaran) {
            $pembayaran = $semuaPembayaran->get(
                $item->id_siswa,
                collect()
            );

            $diterima = $pembayaran->where('status', 'Diterima');

            return [
                'id_siswa' => $item->id_siswa,
                'nama_lengkap' => $item->nama_lengkap,
                'nisn' => $item->nisn,
                'kelas' => $item->kelas,
                'total_dibayar' => $diterima->sum('nominal'),
                'jumlah_transaksi' => $diterima->count(),
                'pembayaran_terakhir' => $pembayaran->first(),
                'status_pembayaran' => $diterima->isNotEmpty()
                    ? 'SUDAH BAYAR'
                    : 'BELUM BAYAR',
            ];
        });

        return view('admin.status-bayar-pribadi', compact('dataStatus'));
    }

public function infoKas()
{
    $user = \Illuminate\Support\Facades\Auth::user();

    if (!$user) {
        return redirect()->route('login');
    }

    $siswa = \App\Models\Siswa::where('id_user', $user->id_users)
        ->firstOrFail();

    $pembayaran = \App\Models\PembayaranKas::where(
        'id_siswa',
        $siswa->id_siswa
    )
        ->orderByDesc('tanggal')
        ->orderByDesc('id_pembayaran')
        ->get();

    return view('siswa.info-kas', compact('siswa', 'pembayaran'));
}
}
