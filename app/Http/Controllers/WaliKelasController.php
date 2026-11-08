<?php

namespace App\Http\Controllers;

use App\Models\PembayaranKas;
use App\Models\DetailPembayaran;
use App\Models\Pengeluaran;
use App\Models\Siswa;
use App\Models\PengaturanSistem;
use Illuminate\Support\Facades\Auth;

class WaliKelasController extends Controller
{
    /**
     * Mengambil kelas wali kelas yang sedang login.
     */
    private function ambilKelasWali()
    {
        $user = Auth::user();

        $pengaturan = PengaturanSistem::where(
            'id_wali_kelas',
            $user->id_users
        )->first();

        return $pengaturan?->nama_kelas;
    }

    /**
     * Query pembayaran berdasarkan kelas wali kelas.
     */
    private function queryPembayaranKelas(?string $kelas)
    {
        return PembayaranKas::whereHas('siswa', function ($query) use ($kelas) {
            if ($kelas) {
                $query->where('kelas', $kelas);
            } else {
                $query->whereRaw('1 = 0');
            }
        });
    }

    /**
     * Dashboard Wali Kelas.
     */
    public function index()
    {
        $waliKelas = Auth::user();
        $kelas = $this->ambilKelasWali();

        $pembayaranQuery = $this->queryPembayaranKelas($kelas);

        // Total nominal hanya dari detail pembayaran
        // yang memiliki transaksi berstatus Diterima.
        $totalKasDiterima = DetailPembayaran::whereHas(
            'pembayaranKas',
            function ($query) use ($kelas) {
                $query->whereHas('siswa', function ($siswaQuery) use ($kelas) {
                    if ($kelas) {
                        $siswaQuery->where('kelas', $kelas);
                    } else {
                        $siswaQuery->whereRaw('1 = 0');
                    }
                });

                $query->whereHas('transaksi', function ($transaksiQuery) {
                    $transaksiQuery->where('status', 'Diterima');
                });
            }
        )->sum('nominal');
        $totalPengeluaran = Pengeluaran::where(
            'nama_kelas',
            $kelas
        )->sum('nominal');

        $saldoKas = $totalKasDiterima - $totalPengeluaran;

        $jumlahPembayaranDiterima = (clone $pembayaranQuery)
            ->whereHas('transaksi', function ($query) {
                $query->where('status', 'Diterima');
            })
            ->count();

        $jumlahMenunggu = (clone $pembayaranQuery)
            ->whereHas('transaksi', function ($query) {
                $query->where('status', 'Menunggu');
            })
            ->count();

        $jumlahDitolak = (clone $pembayaranQuery)
            ->whereHas('transaksi', function ($query) {
                $query->where('status', 'Ditolak');
            })
            ->count();

        // Ambil seluruh siswa pada kelas wali kelas.
        $siswaKelas = $kelas
            ? Siswa::where('kelas', $kelas)
            ->with('pembayaranKas.transaksi')
            ->get()
            : collect();

        // Ambil minggu terakhir yang tercatat di detail pembayaran.
        $mingguTerakhir = $kelas
            ? (int) DetailPembayaran::whereHas('siswa', function ($query) use ($kelas) {
                $query->where('kelas', $kelas);
            })->max('minggu_ke')
            : 0;

        // Hitung siswa yang memiliki minggu belum dibayar.
        $jumlahMenunggak = $siswaKelas->filter(function ($siswa) use ($mingguTerakhir) {
            if ($mingguTerakhir < 1) {
                return false;
            }

            for ($minggu = 1; $minggu <= $mingguTerakhir; $minggu++) {
                $sudahLunas = DetailPembayaran::where('id_siswa', $siswa->id_siswa)
                    ->where('minggu_ke', $minggu)
                    ->whereHas('pembayaranKas.transaksi', function ($query) {
                        $query->where('status', 'Diterima');
                    })
                    ->exists();

                if (! $sudahLunas) {
                    return true;
                }
            }

            return false;
        })->count();

        $pembayaranTerbaru = (clone $pembayaranQuery)
            ->with(['siswa', 'transaksi', 'detailPembayaran'])
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
     * Riwayat Transaksi.
     */

    public function riwayatTransaksi()
    {
        $waliKelas = Auth::user();
        $kelas = $this->ambilKelasWali();

        $pembayaran = $this->queryPembayaranKelas($kelas)
            ->with([
                'siswa',
                'transaksi',
                'detailPembayaran',
            ])
            ->orderByDesc('tanggal')
            ->orderByDesc('id_pembayaran')
            ->get();

        $pengeluaran = $kelas
            ? Pengeluaran::with('user')
            ->where('nama_kelas', $kelas)
            ->orderByDesc('tanggal')
            ->get()
            : collect();

        return view('wali-kelas.riwayat-transaksi', compact(
            'waliKelas',
            'kelas',
            'pembayaran',
            'pengeluaran'
        ));
    }


    /**
     * Laporan Keuangan.
     */
    public function laporanKeuangan()
    {
        $waliKelas = Auth::user();
        $kelas = $this->ambilKelasWali();

        $pembayaranQuery = $this->queryPembayaranKelas($kelas);

        $totalKasDiterima = DetailPembayaran::whereHas(
            'pembayaranKas',
            function ($query) use ($kelas) {
                $query->whereHas('siswa', function ($siswaQuery) use ($kelas) {
                    if ($kelas) {
                        $siswaQuery->where('kelas', $kelas);
                    } else {
                        $siswaQuery->whereRaw('1 = 0');
                    }
                });

                $query->whereHas('transaksi', function ($transaksiQuery) {
                    $transaksiQuery->where('status', 'Diterima');
                });
            }
        )->sum('nominal');


        $totalPengeluaran = $kelas
            ? Pengeluaran::where('nama_kelas', $kelas)->sum('nominal')
            : 0;

        $saldoKas = $totalKasDiterima - $totalPengeluaran;

        $jumlahPembayaranDiterima = (clone $pembayaranQuery)
            ->whereHas('transaksi', function ($query) {
                $query->where('status', 'Diterima');
            })
            ->count();


        $jumlahMenunggu = (clone $pembayaranQuery)
            ->whereHas('transaksi', function ($query) {
                $query->where('status', 'Menunggu');
            })
            ->count();

        $pembayaran = (clone $pembayaranQuery)
            ->with(['siswa', 'transaksi', 'detailPembayaran'])
            ->orderByDesc('tanggal')
            ->orderByDesc('id_pembayaran')
            ->get();

        $pengeluaran = $kelas
            ? Pengeluaran::with('user')
            ->where('nama_kelas', $kelas)
            ->orderByDesc('tanggal')
            ->get()
            : collect();

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
