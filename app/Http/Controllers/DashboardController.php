<?php

namespace App\Http\Controllers;

use App\Models\PembayaranKas;
use App\Models\Pengeluaran;
use App\Models\Siswa;
use App\Models\Pengumuman;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\DetailPembayaran;
use App\Models\PengaturanSistem;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Tentukan kelas berdasarkan akun bendahara yang login.
        $kelasSaya = collect();

        if ($user->role === 'BENDAHARA') {
            $kelasSaya = PengaturanSistem::where(
                'id_bendahara',
                $user->id_users
            )->pluck('nama_kelas');

            if ($kelasSaya->isEmpty()) {
                abort(403, 'Akun bendahara belum memiliki kelas tugas.');
            }
        }

        // Filter siswa sesuai kelas bendahara.
        $querySiswa = Siswa::query();

        if ($user->role === 'BENDAHARA') {
            $querySiswa->whereIn('kelas', $kelasSaya);
        }

        $totalSiswa = $querySiswa->count();

        // Jumlah pengguna: admin melihat seluruh pengguna.
        $totalPengguna = User::count();

        // Filter transaksi berdasarkan kelas yang dikelola.
        $queryTransaksi = Transaksi::query();

        if ($user->role === 'BENDAHARA') {
            $queryTransaksi->whereHas('siswa', function ($query) use ($kelasSaya) {
                $query->whereIn('kelas', $kelasSaya);
            });
        }

        $totalPembayaran = DetailPembayaran::whereHas(
            'pembayaranKas.transaksi',
            function ($query) {
                $query->where('status', 'Diterima');
            }
        )->when($user->role === 'BENDAHARA', function ($query) use ($kelasSaya) {
            $query->whereHas('siswa', function ($q) use ($kelasSaya) {
                $q->whereIn('kelas', $kelasSaya);
            });
        })->sum('nominal');

        // Pengeluaran bendahara hanya untuk kelas tugasnya.
        $queryPengeluaran = Pengeluaran::query();

        if ($user->role === 'BENDAHARA') {
            $queryPengeluaran->whereIn('nama_kelas', $kelasSaya);
        }

        $totalPengeluaran = $queryPengeluaran->sum('nominal');
        $saldo = $totalPembayaran - $totalPengeluaran;

        $jumlahMenunggu = (clone $queryTransaksi)
            ->where('status', 'Menunggu')
            ->count();

        $jumlahPengumuman = Pengumuman::count();

        // Transaksi pembayaran terbaru.
        $pembayaranTerbaruQuery = Transaksi::with([
            'siswa',
            'pembayaran.detailPembayaran',
        ]);

        if ($user->role === 'BENDAHARA') {
            $pembayaranTerbaruQuery->whereHas('siswa', function ($query) use ($kelasSaya) {
                $query->whereIn('kelas', $kelasSaya);
            });
        }

        $pembayaranTerbaru = $pembayaranTerbaruQuery
            ->latest('id_transaksi')
            ->take(10)
            ->get()
            ->map(function ($item) {
                return [
                    'nama' => $item->siswa?->nama_lengkap ?? '-',
                    'nominal' => $item->pembayaran?->detailPembayaran?->nominal ?? 0,
                    'metode' => $item->pembayaran?->metode_pembayaran ?? '-',
                    'status' => $item->status,
                    'tipe' => 'Pembayaran Kas',
                    'tanggal' => $item->pembayaran?->tanggal ?? $item->created_at,
                ];
            });

        // Pengeluaran terbaru.
        $pengeluaranTerbaruQuery = Pengeluaran::query();

        if ($user->role === 'BENDAHARA') {
            $pengeluaranTerbaruQuery->whereIn('nama_kelas', $kelasSaya);
        }

        $pengeluaranTerbaru = $pengeluaranTerbaruQuery
            ->latest('tanggal')
            ->latest('id_pengeluaran')
            ->take(10)
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
            ->sortByDesc('tanggal')
            ->take(5)
            ->values();

        // Jumlah siswa yang sudah membayar.
        $querySudahBayar = Siswa::whereHas(
            'pembayaranKas.transaksi',
            function ($query) {
                $query->where('status', 'Diterima');
            }
        );

        if ($user->role === 'BENDAHARA') {
            $querySudahBayar->whereIn('kelas', $kelasSaya);
        }

        $sudahBayar = $querySudahBayar->count();
        $belumBayar = max(0, $totalSiswa - $sudahBayar);

        $persentasePembayaran = $totalSiswa > 0
            ? round(($sudahBayar / $totalSiswa) * 100)
            : 0;

        // Pembayaran yang masih menunggu verifikasi.
        $pembayaranMenungguQuery = Transaksi::with([
            'siswa',
            'pembayaran',
        ])->where('status', 'Menunggu');

        if ($user->role === 'BENDAHARA') {
            $pembayaranMenungguQuery->whereHas('siswa', function ($query) use ($kelasSaya) {
                $query->whereIn('kelas', $kelasSaya);
            });
        }

        $pembayaranMenunggu = $pembayaranMenungguQuery
            ->latest('id_transaksi')
            ->take(3)
            ->get();

        // Periode pembayaran kelas.
        $mingguAktif = DetailPembayaran::whereHas('siswa', function ($query) use ($user, $kelasSaya) {
            if ($user->role === 'BENDAHARA') {
                $query->whereIn('kelas', $kelasSaya);
            }
        })->max('minggu_ke') ?? 0;

        return view('dashboard-bendahara', compact(
            'totalSiswa',
            'totalPengguna',
            'totalPembayaran',
            'totalPengeluaran',
            'saldo',
            'sudahBayar',
            'belumBayar',
            'persentasePembayaran',
            'pembayaranMenunggu',
            'jumlahMenunggu',
            'jumlahPengumuman',
            'mingguAktif',
            'transaksiTerbaru'
        ));
    }
}
