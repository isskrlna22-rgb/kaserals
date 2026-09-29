<?php

namespace App\Http\Controllers;

use App\Models\PembayaranKas;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        // PEMBAYARAN KAS
        $pembayaran = PembayaranKas::with('siswa')
            ->get()
            ->map(function ($item) {
                return [
                    'tanggal' => $item->tanggal,
                    'jenis' => 'Pembayaran Kas',
                    'keterangan' => $item->keterangan ?? 'Pembayaran kas',
                    'nama_siswa' => $item->siswa->nama ?? '',
                    'nominal' => $item->nominal,
                    'tipe' => 'masuk',
                ];
            });

        // PEMASUKAN
        $pemasukan = Pemasukan::get()
            ->map(function ($item) {
                return [
                    'tanggal' => $item->tanggal,
                    'jenis' => 'Pemasukan',
                    'keterangan' => $item->sumber,
                    'nominal' => $item->nominal,
                    'tipe' => 'masuk',
                ];
            });

        // PENGELUARAN
        $pengeluaran = Pengeluaran::get()
            ->map(function ($item) {
                return [
                    'tanggal' => $item->tanggal,
                    'jenis' => 'Pengeluaran',
                    'keterangan' => $item->kategori,
                    'nominal' => $item->nominal,
                    'tipe' => 'keluar',
                ];
            });

        // FILTER JENIS
        $jenis = $request->input('jenis');

        if ($jenis) {
            $pembayaran = $pembayaran->filter(function ($item) use ($jenis) {
                return $item['jenis'] === $jenis;
            });

            $pemasukan = $pemasukan->filter(function ($item) use ($jenis) {
                return $item['jenis'] === $jenis;
            });

            $pengeluaran = $pengeluaran->filter(function ($item) use ($jenis) {
                return $item['jenis'] === $jenis;
            });
        }

        // FILTER TANGGAL
        $dari = $request->input('dari');
        $sampai = $request->input('sampai');

        if ($dari || $sampai) {
            $filterTanggal = function ($item) use ($dari, $sampai) {
                $tanggal = \Carbon\Carbon::parse($item['tanggal'])->format('Y-m-d');

                if ($dari && $tanggal < $dari) {
                    return false;
                }

                if ($sampai && $tanggal > $sampai) {
                    return false;
                }

                return true;
            };

            $pembayaran = $pembayaran->filter($filterTanggal);
            $pemasukan = $pemasukan->filter($filterTanggal);
            $pengeluaran = $pengeluaran->filter($filterTanggal);
        }

        // FILTER SEARCH
        $search = $request->input('search');

        if ($search) {
            $search = strtolower($search);

            $filterSearch = function ($item) use ($search) {
                return str_contains(
                    strtolower($item['keterangan'] ?? ''),
                    $search
                )
                || str_contains(
                    strtolower($item['nama_siswa'] ?? ''),
                    $search
                )
                || str_contains(
                    (string) $item['nominal'],
                    $search
                );
            };

            $pembayaran = $pembayaran->filter($filterSearch);
            $pemasukan = $pemasukan->filter($filterSearch);
            $pengeluaran = $pengeluaran->filter($filterSearch);
        }

        // GABUNGKAN SEMUA TRANSAKSI
        $riwayat = $pembayaran
            ->concat($pemasukan)
            ->concat($pengeluaran)
            ->sortBy('tanggal')
            ->values();

        // HITUNG SALDO
        $saldo = 0;

        $riwayat = $riwayat->map(function ($item) use (&$saldo) {

            if ($item['tipe'] === 'masuk') {
                $saldo += $item['nominal'];
            } else {
                $saldo -= $item['nominal'];
            }

            $item['saldo'] = $saldo;

            return $item;
        });

        // TRANSAKSI TERBARU DI ATAS
        $riwayat = $riwayat
            ->sortByDesc('tanggal')
            ->values();

        return view('riwayat.index', compact('riwayat'));
    }
}
