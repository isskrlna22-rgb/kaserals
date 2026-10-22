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

        $totalPengeluaran = Pengeluaran::sum('nominal');
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

        $jumlahMenunggak = Siswa::where('kelas', $kelas)
            ->whereHas('pembayaranKas', function ($query) {
                $query->whereHas('transaksi', function ($transaksiQuery) {
                    $transaksiQuery->whereIn(
                        'status',
                        ['Menunggu', 'Ditolak']
                    );
                });
            })
            ->count();

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
            ->with(['siswa', 'transaksi', 'detailPembayaran'])
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

        $totalPengeluaran = Pengeluaran::sum('nominal');
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
