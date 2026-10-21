<?php

namespace App\Http\Controllers;

use App\Models\DetailPembayaran;
use App\Models\Siswa;
use App\Models\PengaturanSistem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DetailPembayaranController extends Controller
{
    /**
     * Menampilkan halaman Detail Pembayaran.
     */

public function index()
{
    $user = Auth::user();

    $queryDetail = DetailPembayaran::with('siswa');
    $querySiswa = Siswa::query();

    if ($user->role === 'BENDAHARA') {
        $kelasSaya = PengaturanSistem::where(
            'id_bendahara',
            $user->id_users
        )->pluck('nama_kelas');

        $queryDetail->whereHas('siswa', function ($query) use ($kelasSaya) {
            $query->whereIn('kelas', $kelasSaya);
        });

        $querySiswa->whereIn('kelas', $kelasSaya);
    } elseif ($user->role !== 'ADMIN') {
        abort(403, 'Anda tidak memiliki akses ke detail pembayaran.');
    }

    $detailPembayaran = $queryDetail->latest()->get();
    $siswa = $querySiswa->orderBy('nama_lengkap')->get();

    return view('detail-pembayaran.index', compact(
        'detailPembayaran',
        'siswa'
    ));
}

    /**
     * Menyimpan detail pembayaran.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_siswa' => 'required|exists:siswa,id_siswa',
            'minggu_ke' => 'required|string|max:50',
            'nominal' => 'required|numeric|min:0',
        ]);

        DetailPembayaran::create($validated);

        return redirect()
            ->route('detail-pembayaran.index')
            ->with('success', 'Detail pembayaran berhasil ditambahkan.');
    }

    /**
     * Menampilkan satu detail pembayaran.
     */
    public function show(string $id)
    {
        $detailPembayaran = DetailPembayaran::with('siswa')
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $detailPembayaran
        ]);
    }

    /**
     * Mengubah detail pembayaran.
     */
    public function update(Request $request, string $id)
    {
        $detailPembayaran = DetailPembayaran::findOrFail($id);

        $validated = $request->validate([
            'id_siswa' => 'required|exists:siswa,id_siswa',
            'minggu_ke' => 'required|string|max:50',
            'nominal' => 'required|numeric|min:0',
        ]);

        $detailPembayaran->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Detail pembayaran berhasil diperbarui.',
            'data' => $detailPembayaran
        ]);
    }

    /**
     * Menghapus detail pembayaran.
     */
  public function destroy(string $id)
{
    $detailPembayaran = DetailPembayaran::findOrFail($id);

    $detailPembayaran->delete();

    return redirect()
        ->route('detail-pembayaran.index')
        ->with('success', 'Detail pembayaran berhasil dihapus.');
}
}
