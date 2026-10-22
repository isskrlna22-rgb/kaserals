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

       $pembayaranQuery = \App\Models\PembayaranKas::with(['siswa', 'transaksi'])
    ->whereHas('transaksi', function ($query) {
        $query->where('status', 'Diterima');
    });

if ($user->role === 'BENDAHARA') {
    $pembayaranQuery->whereHas('siswa', function ($query) use ($kelasSaya) {
        $query->whereIn('kelas', $kelasSaya);
    });
}

$pembayaran = $pembayaranQuery
    ->orderByDesc('tanggal')
    ->get();

$detailPembayaran = $queryDetail->latest()->get();
$siswa = $querySiswa->orderBy('nama_lengkap')->get();

       return view('detail-pembayaran.index', compact(
    'detailPembayaran',
    'siswa',
    'pembayaran'
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
        'nominal' => 'required|numeric|min:1',
    ]);

    DetailPembayaran::create([
        'id_pembayaran' => null,
        'id_siswa' => $validated['id_siswa'],
        'minggu_ke' => $validated['minggu_ke'],
        'nominal' => $validated['nominal'],
    ]);

    return redirect()
        ->route('detail-pembayaran.index')
        ->with('success', 'Detail pembayaran berhasil ditambahkan.');
}

public function update(Request $request, string $id)
{
    $detailPembayaran = DetailPembayaran::findOrFail($id);

    $validated = $request->validate([
        'id_siswa' => 'required|exists:siswa,id_siswa',
        'minggu_ke' => 'required|string|max:50',
        'nominal' => 'required|numeric|min:1',
    ]);

    $detailPembayaran->update($validated);

    return response()->json([
        'success' => true,
        'message' => 'Detail pembayaran berhasil diperbarui.',
        'data' => $detailPembayaran->fresh(),
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
