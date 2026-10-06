<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\PembayaranKas;
use Illuminate\Http\Request;

class VerifikasiPembayaranController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('pembayaranKas')
            ->orderBy('nama_lengkap')
            ->get();

        $data = $siswa->map(function ($item) {
            $pembayaranDiterima = $item->pembayaranKas
                ->where('status', 'Diterima');

            return [
                'id_siswa' => $item->id_siswa,
                'nisn' => $item->nisn,
                'nama_lengkap' => $item->nama_lengkap,
                'kelas' => $item->kelas,
                'total_pembayaran' => $pembayaranDiterima->sum('nominal'),
                'jumlah_transaksi' => $pembayaranDiterima->count(),
                'status' => $pembayaranDiterima->count() > 0
                    ? 'SUDAH BAYAR'
                    : 'BELUM BAYAR',
            ];
        });

        return response()->json($data);
    }

    public function page()
    {
        $siswa = Siswa::with('pembayaranKas')
            ->orderBy('nama_lengkap')
            ->get();

        return view('verifikasi-pembayaran.index', compact('siswa'));
    }

    public function show(Siswa $siswa)
    {
        $pembayaran = PembayaranKas::where(
            'id_siswa',
            $siswa->id_siswa
        )
        ->latest('tanggal')
        ->get();

        $pembayaranDiterima = $pembayaran
            ->where('status', 'Diterima');

        return response()->json([
            'siswa' => [
                'id_siswa' => $siswa->id_siswa,
                'nisn' => $siswa->nisn,
                'nama_lengkap' => $siswa->nama_lengkap,
                'kelas' => $siswa->kelas,
            ],
            'total_pembayaran' => $pembayaranDiterima->sum('nominal'),
            'jumlah_transaksi' => $pembayaranDiterima->count(),
            'status' => $pembayaranDiterima->count() > 0
                ? 'SUDAH BAYAR'
                : 'BELUM BAYAR',
            'riwayat' => $pembayaran,
        ]);
    }
    public function update(Request $request, PembayaranKas $pembayaranKas)
{
    $validated = $request->validate([
        'status' => 'required|in:Diterima,Ditolak',
    ]);

    $pembayaranKas->update([
        'status' => $validated['status'],
    ]);

    $pesan = $validated['status'] === 'Diterima'
        ? 'Pembayaran berhasil diterima.'
        : 'Pembayaran berhasil ditolak.';

    return redirect()
        ->route('verifikasi-pembayaran.index')
        ->with('success', $pesan);
}
}
