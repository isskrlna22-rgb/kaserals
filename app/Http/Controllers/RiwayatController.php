<?php

namespace App\Http\Controllers;

use App\Models\PembayaranKas;
use App\Models\Pemasukan;
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
            ->get()
            ->map(function ($item) {
                return [
                    'tanggal' => $item->tanggal,
                    'jenis' => 'Pembayaran Kas',
                    'keterangan' => $item->keterangan ?? 'Pembayaran kas',
                    'nama_siswa' => $item->siswa?->nama ?? '',
                    'nominal' => (float) $item->nominal,
                    'tipe' => 'masuk',
                ];
            });


        /*
        |--------------------------------------------------------------------------
        | 2. PEMASUKAN
        |--------------------------------------------------------------------------
        */

        $pemasukan = Pemasukan::get()
            ->map(function ($item) {
                return [
                    'tanggal' => $item->tanggal,
                    'jenis' => 'Pemasukan',
                    'keterangan' => $item->sumber ?? 'Pemasukan kas',
                    'nama_siswa' => '',
                    'nominal' => (float) $item->nominal,
                    'tipe' => 'masuk',
                ];
            });


        /*
        |--------------------------------------------------------------------------
        | 3. PENGELUARAN
        |--------------------------------------------------------------------------
        */

        $pengeluaran = Pengeluaran::get()
            ->map(function ($item) {
                return [
                    'tanggal' => $item->tanggal,
                    'jenis' => 'Pengeluaran',
                    'keterangan' => $item->kategori ?? 'Pengeluaran kas',
                    'nama_siswa' => '',
                    'nominal' => (float) $item->nominal,
                    'tipe' => 'keluar',
                ];
            });


        /*
        |--------------------------------------------------------------------------
        | 4. GABUNGKAN SEMUA TRANSAKSI
        |--------------------------------------------------------------------------
        */

        $semuaTransaksi = $pembayaran
            ->concat($pemasukan)
            ->concat($pengeluaran)
            ->sortBy(function ($item) {
                return Carbon::parse($item['tanggal'])->timestamp;
            })
            ->values();


        /*
        |--------------------------------------------------------------------------
        | 5. HITUNG SALDO BERJALAN
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
        | 6. FILTER JENIS
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
        | 7. FILTER TANGGAL
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
        | 8. FILTER SEARCH
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
        | 9. URUTKAN TERBARU DI ATAS
        |--------------------------------------------------------------------------
        */

        $riwayat = $semuaTransaksi
            ->sortByDesc(function ($item) {
                return Carbon::parse($item['tanggal'])->timestamp;
            })
            ->values();


        /*
        |--------------------------------------------------------------------------
        | 10. KIRIM KE VIEW
        |--------------------------------------------------------------------------
        */

        return view('riwayat.index', compact('riwayat'));
    }
}
