<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\PembayaranKas;

class StatusPembayaranController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('pembayaranKas')
            ->orderBy('nama')
            ->get();

        $data = $siswa->map(function ($item) {
            return [
                'siswa_id' => $item->id,
                'nis' => $item->nis,
                'nama' => $item->nama,
                'kelas' => $item->kelas,
                'total_pembayaran' => $item->pembayaranKas->sum('nominal'),
                'jumlah_transaksi' => $item->pembayaranKas->count(),
                'status' => $item->pembayaranKas->count() > 0
                    ? 'SUDAH BAYAR'
                    : 'BELUM BAYAR',
            ];
        });

        return response()->json($data);
    }
    public function page()
    {
        $siswa = Siswa::with('pembayaranKas')
            ->orderBy('nama')
            ->get();

        return view('status-pembayaran.index', compact('siswa'));
    }

    public function show(Siswa $siswa)
    {
        $pembayaran = PembayaranKas::where('siswa_id', $siswa->id)
            ->latest('tanggal')
            ->get();

        return response()->json([
            'siswa' => [
                'id' => $siswa->id,
                'nis' => $siswa->nis,
                'nama' => $siswa->nama,
                'kelas' => $siswa->kelas,
            ],
            'total_pembayaran' => $pembayaran->sum('nominal'),
            'jumlah_transaksi' => $pembayaran->count(),
            'status' => $pembayaran->count() > 0
                ? 'SUDAH BAYAR'
                : 'BELUM BAYAR',
            'riwayat' => $pembayaran,
        ]);
    }
}
