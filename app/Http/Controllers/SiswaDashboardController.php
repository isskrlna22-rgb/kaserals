<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\PembayaranKas;
use App\Models\Pengeluaran;
use App\Models\PengaturanSistem;
use App\Models\DetailPembayaran;
use App\Models\Transaksi;

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

        // Ambil pembayaran siswa beserta status transaksi dan detailnya
        $pembayaran = PembayaranKas::with([
            'siswa',
            'transaksi',
            'detailPembayaran',
        ])
            ->where('id_siswa', $siswa->id_siswa)
            ->orderByDesc('tanggal')
            ->orderByDesc('id_pembayaran')
            ->get();

        // Hitung nominal dan status berdasarkan tabel yang sesuai
        $pembayaranDiterima = $pembayaran->filter(function ($item) {
            return $item->transaksi?->status === 'Diterima';
        });

        $totalPembayaranSiswa = $pembayaranDiterima->sum(function ($item) {
            return $item->detailPembayaran?->nominal ?? 0;
        });

        $jumlahPembayaran = $pembayaranDiterima->count();

        $pembayaranTerakhir = $pembayaranDiterima->first()
            ?? $pembayaran->first();

        $statusPembayaran = $pembayaranDiterima->isNotEmpty()
            ? 'SUDAH BAYAR'
            : 'BELUM BAYAR';

        // Total pembayaran kas yang sudah diterima seluruh kelas
        $totalPembayaranKas = DetailPembayaran::whereHas(
            'pembayaranKas.transaksi',
            function ($query) {
                $query->where('status', 'Diterima');
            }
        )->sum('nominal');

        // Total pengeluaran dan saldo kas
        $totalPengeluaran = Pengeluaran::sum('nominal');
        $saldoKas = $totalPembayaranKas - $totalPengeluaran;

        // Pengumuman terbaru
        $pengumumanTerbaru = \App\Models\Pengumuman::latest()->first();

        $pengumuman = $pengumumanTerbaru
            ? ($pengumumanTerbaru->judul
                ?? $pengumumanTerbaru->isi
                ?? 'Ada pengumuman terbaru.')
            : 'Belum ada pengumuman terbaru.';

        // Periode pembayaran berdasarkan detail yang tersedia
        $mingguTerakhir = (int) (
            DetailPembayaran::max('minggu_ke') ?? 0
        );

        $mingguDibayar = $pembayaranDiterima
            ->map(function ($item) {
                return $item->detailPembayaran?->minggu_ke;
            })
            ->filter()
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

        $pembayaran = PembayaranKas::with([
            'transaksi',
            'detailPembayaran',
        ])
            ->where('id_siswa', $siswa->id_siswa)
            ->orderByDesc('tanggal')
            ->orderByDesc('id_pembayaran')
            ->get();

        // Hanya transaksi yang sudah diterima yang dihitung sebagai pembayaran lunas.
        $pembayaranDiterima = $pembayaran->filter(function ($item) {
            return $item->transaksi?->status === 'Diterima';
        });

        $totalPembayaranSiswa = $pembayaranDiterima->sum(function ($item) {
            return (float) ($item->detailPembayaran?->nominal ?? 0);
        });

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

        $pembayaran = PembayaranKas::with([
            'transaksi',
            'detailPembayaran',
        ])
            ->where('id_siswa', $siswa->id_siswa)
            ->orderByDesc('tanggal')
            ->orderByDesc('id_pembayaran')
            ->get();

        return view('siswa.riwayat', compact(
            'siswa',
            'pembayaran'
        ));
    }

    // =========================
    // STATUS PEMBAYARAN UNTUK ADMIN
    // =========================


    public function adminStatusPembayaran()
    {
        // Ambil seluruh siswa dari semua kelas
        $siswa = Siswa::orderBy('kelas')
            ->orderBy('nama_lengkap')
            ->get();

        // Ambil semua pembayaran dan kelompokkan berdasarkan siswa
        $semuaPembayaran = PembayaranKas::orderByDesc('tanggal')
            ->orderByDesc('id_pembayaran')
            ->get()
            ->groupBy('id_siswa');

        // Siapkan status pembayaran setiap siswa
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

        return view('admin.status-bayar', compact('dataStatus'));
    }


    public function bendaharaStatusPembayaran()
    {
        // Ambil kelas yang ditugaskan kepada Bendahara yang login
        $kelasSaya = PengaturanSistem::where(
            'id_bendahara',
            Auth::id()
        )->pluck('nama_kelas');

        // Ambil hanya siswa dari kelas yang ditugaskan
        $siswa = Siswa::whereIn('kelas', $kelasSaya)
            ->orderBy('kelas')
            ->orderBy('nama_lengkap')
            ->get();

        // Ambil pembayaran milik siswa di kelas tersebut
        $idSiswa = $siswa->pluck('id_siswa');

        $semuaPembayaran = PembayaranKas::whereIn('id_siswa', $idSiswa)
            ->orderByDesc('tanggal')
            ->orderByDesc('id_pembayaran')
            ->get()
            ->groupBy('id_siswa');

        // Siapkan status pembayaran setiap siswa
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

        return view('bendahara.status-bayar', compact('dataStatus'));
    }


    public function infoKas()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $siswa = Siswa::where('id_user', $user->id_users)
            ->firstOrFail();

        // Ambil pembayaran siswa beserta detail dan status transaksinya
        $pembayaran = PembayaranKas::with([
            'transaksi',
            'detailPembayaran',
        ])
            ->where('id_siswa', $siswa->id_siswa)
            ->orderByDesc('tanggal')
            ->orderByDesc('id_pembayaran')
            ->get();

        // Ambil pengumuman terbaru
        $pengumuman = \App\Models\Pengumuman::latest('created_at')
            ->first();

        // Total kas dari semua pembayaran yang sudah diterima
        $totalPembayaran = DetailPembayaran::whereHas(
            'pembayaranKas.transaksi',
            function ($query) {
                $query->where('status', 'Diterima');
            }
        )->sum('nominal');

        // Total pengeluaran kas
        $totalPengeluaran = Pengeluaran::sum('nominal');

        // Saldo kas
        $saldoKas = $totalPembayaran - $totalPengeluaran;

        // Total pengeluaran bulan ini
        $pengeluaranBulanIni = Pengeluaran::whereMonth(
            'created_at',
            now()->month
        )
            ->whereYear('created_at', now()->year)
            ->sum('nominal');

        return view('siswa.info-kas', compact(
            'siswa',
            'pembayaran',
            'pengumuman',
            'saldoKas',
            'pengeluaranBulanIni'
        ));
    }
}
