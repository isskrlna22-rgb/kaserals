<?php

namespace App\Http\Controllers;

use App\Models\PembayaranKas;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | 1. PEMBAYARAN KAS
        |--------------------------------------------------------------------------
        */

        $pembayaran = PembayaranKas::with('siswa')
            ->where('status', 'Diterima')
            ->get()
            ->map(function ($item) {
                return [
                    'tanggal' => $item->tanggal,
                    'jenis' => 'Pembayaran Kas',
                    'keterangan' => $item->keterangan ?? 'Pembayaran kas',
                    'nama_siswa' => $item->siswa?->nama_lengkap ?? '',
                    'nominal' => (float) $item->nominal,
                    'tipe' => 'masuk',
                ];
            });

        /*
        |--------------------------------------------------------------------------
        | 2. PENGELUARAN
        |--------------------------------------------------------------------------
        */

        $pengeluaran = Pengeluaran::get()
            ->map(function ($item) {
                return [
                    'tanggal' => $item->tanggal,
                    'jenis' => 'Pengeluaran',
                    'keterangan' => $item->keterangan
                        ?? $item->kategori
                        ?? 'Pengeluaran kas',
                    'nama_siswa' => '',
                    'nominal' => (float) $item->nominal,
                    'tipe' => 'keluar',
                ];
            });

        /*
        |--------------------------------------------------------------------------
        | 3. GABUNGKAN TRANSAKSI
        |--------------------------------------------------------------------------
        */

        $semuaTransaksi = $pembayaran
            ->concat($pengeluaran)
            ->sortBy(function ($item) {
                return Carbon::parse($item['tanggal'])->timestamp;
            })
            ->values();

        /*
        |--------------------------------------------------------------------------
        | 4. HITUNG SALDO BERJALAN
        |--------------------------------------------------------------------------
        */

        $saldo = 0;

        $semuaTransaksi = $semuaTransaksi->map(function ($item) use (&$saldo) {

            if ($item['tipe'] === 'masuk') {
                $saldo += $item['nominal'];
            } else {
                $saldo -= $item['nominal'];
            }

            $item['saldo'] = $saldo;

            return $item;
        });

        /*
        |--------------------------------------------------------------------------
        | 5. FILTER JENIS TRANSAKSI
        |--------------------------------------------------------------------------
        */

        $jenis = $request->input('jenis');

        if ($jenis) {
            $semuaTransaksi = $semuaTransaksi->filter(function ($item) use ($jenis) {
                return $item['jenis'] === $jenis;
            });
        }

        /*
        |--------------------------------------------------------------------------
        | 6. FILTER TANGGAL
        |--------------------------------------------------------------------------
        */

        $dari = $request->input('dari');
        $sampai = $request->input('sampai');

        if ($dari || $sampai) {

            $semuaTransaksi = $semuaTransaksi->filter(function ($item) use ($dari, $sampai) {

                $tanggal = Carbon::parse($item['tanggal'])->format('Y-m-d');

                if ($dari && $tanggal < $dari) {
                    return false;
                }

                if ($sampai && $tanggal > $sampai) {
                    return false;
                }

                return true;
            });
        }

        /*
        |--------------------------------------------------------------------------
        | 7. FILTER PENCARIAN
        |--------------------------------------------------------------------------
        */

        $search = trim($request->input('search', ''));

        if ($search) {

            $search = strtolower($search);

            $semuaTransaksi = $semuaTransaksi->filter(function ($item) use ($search) {

                return str_contains(
                    strtolower($item['keterangan'] ?? ''),
                    $search
                )
                ||
                str_contains(
                    strtolower($item['nama_siswa'] ?? ''),
                    $search
                )
                ||
                str_contains(
                    strtolower($item['jenis'] ?? ''),
                    $search
                )
                ||
                str_contains(
                    (string) $item['nominal'],
                    $search
                );
            });
        }

        /*
        |--------------------------------------------------------------------------
        | 8. URUTKAN TRANSAKSI TERBARU
        |--------------------------------------------------------------------------
        */

        $riwayat = $semuaTransaksi
            ->sortByDesc(function ($item) {
                return Carbon::parse($item['tanggal'])->timestamp;
            })
            ->values();

        /*
        |--------------------------------------------------------------------------
        | 9. KIRIM KE VIEW
        |--------------------------------------------------------------------------
        */

        return view('riwayat.index', compact(
            'riwayat'
        ));
    }
}
