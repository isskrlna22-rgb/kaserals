<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\PembayaranKas;
use App\Models\PengaturanSistem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\abort;

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
    $query = Siswa::with('pembayaranKas');

    // Admin boleh melihat semua siswa.
    if (Auth::user()->role === 'BENDAHARA') {
        $kelasSaya = PengaturanSistem::where(
            'id_bendahara',
            Auth::id()
        )->pluck('nama_kelas');

        $query->whereIn('kelas', $kelasSaya);
    } elseif (Auth::user()->role !== 'ADMIN') {
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }

    $siswa = $query
        ->orderBy('kelas')
        ->orderBy('nama_lengkap')
        ->get();

    return view('verifikasi-pembayaran.index', compact('siswa'));
}

public function update(Request $request, PembayaranKas $pembayaranKas)
{
    $validated = $request->validate([
        'status' => 'required|in:Diterima,Ditolak',
    ]);

    // Ambil siswa pemilik pembayaran.
    $siswa = Siswa::where(
        'id_siswa',
        $pembayaranKas->id_siswa
    )->firstOrFail();

    // Bendahara hanya boleh memverifikasi kelas yang ditugaskan.
    if (Auth::user()->role === 'BENDAHARA') {
        $punyaAkses = PengaturanSistem::where(
            'id_bendahara',
            Auth::id()
        )
        ->where('nama_kelas', $siswa->kelas)
        ->exists();

        abort_unless(
            $punyaAkses,
            403,
            'Anda tidak memiliki akses untuk memverifikasi pembayaran kelas ini.'
        );
    } elseif (Auth::user()->role !== 'ADMIN') {
        abort(403, 'Anda tidak memiliki akses untuk memverifikasi pembayaran.');
    }

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
