<?php

namespace App\Http\Controllers;

use App\Models\PembayaranKas;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;

class RiwayatController extends Controller
{
    public function index()
    {
        $pembayaran = PembayaranKas::with('siswa')
            ->get()
            ->map(function ($item) {
                return [
                    'tanggal' => $item->tanggal,
                    'jenis' => 'Pembayaran Kas',
                    'keterangan' => $item->keterangan ?? 'Pembayaran kas',
                    'nominal' => $item->nominal,
                    'tipe' => 'masuk',
                ];
            });

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

        $riwayat = $pembayaran
            ->concat($pemasukan)
            ->concat($pengeluaran)
            ->sortByDesc('tanggal')
            ->values();

        return view('riwayat.index', compact('riwayat'));
    }
}
