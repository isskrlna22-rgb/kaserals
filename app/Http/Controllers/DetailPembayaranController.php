<?php

namespace App\Http\Controllers;

use App\Models\DetailPembayaran;
use App\Models\Siswa;
use App\Models\PengaturanSistem;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

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
        'id_pembayaran' => 'required|exists:pembayaran_kas,id_pembayaran',
        'id_siswa' => 'required|exists:siswa,id_siswa',
        'minggu_ke' => 'required|integer|min:1',
        'nominal' => 'required|numeric|min:1',
    ]);

    $pembayaran = \App\Models\PembayaranKas::with('transaksi')
        ->findOrFail($validated['id_pembayaran']);

    // Pastikan siswa sesuai dengan pembayaran.
    if ((int) $pembayaran->id_siswa !== (int) $validated['id_siswa']) {
        return back()->withInput()->withErrors([
            'id_siswa' => 'Siswa tidak sesuai dengan pembayaran yang dipilih.',
        ]);
    }

    // Pastikan pembayaran sudah diterima.
    if ($pembayaran->transaksi?->status !== 'Diterima') {
        return back()->withInput()->withErrors([
            'id_pembayaran' => 'Pembayaran belum diterima.',
        ]);
    }

    // Cari detail yang sudah dibuat saat pembayaran dicatat.
    $detail = DetailPembayaran::where(
        'id_pembayaran',
        $validated['id_pembayaran']
    )->first();

    // Jika detail sudah memiliki minggu, jangan diproses ulang.
    if ($detail && $detail->minggu_ke !== null) {
        return back()->withInput()->withErrors([
            'id_pembayaran' => 'Detail pembayaran ini sudah lengkap.',
        ]);
    }

    // Periksa apakah siswa sudah tercatat pada minggu yang sama.
    $duplikat = DetailPembayaran::where(
        'id_siswa',
        $validated['id_siswa']
    )
        ->where('minggu_ke', $validated['minggu_ke'])
        ->when($detail, function ($query) use ($detail) {
            $query->where('id_detail', '!=', $detail->id_detail);
        })
        ->exists();

    if ($duplikat) {
        return back()->withInput()->withErrors([
            'minggu_ke' => 'Pembayaran siswa untuk minggu tersebut sudah tercatat.',
        ]);
    }

    // Jika detail sudah ada, perbarui.
    if ($detail) {
        $detail->update([
            'id_siswa' => $validated['id_siswa'],
            'minggu_ke' => $validated['minggu_ke'],
            'nominal' => $validated['nominal'],
        ]);
    } else {
        // Jika belum ada, buat detail baru.
        DetailPembayaran::create($validated);
    }

    return redirect()
        ->route('detail-pembayaran.index')
        ->with('success', 'Detail pembayaran berhasil disimpan.');
}


    /**
 * Menghapus detail pembayaran.
 */
public function destroy(int $id): RedirectResponse
{
    $user = Auth::user();

    if (!in_array($user->role, ['ADMIN', 'BENDAHARA'])) {
        abort(403, 'Anda tidak memiliki akses untuk menghapus detail pembayaran.');
    }

    $detail = DetailPembayaran::findOrFail($id);

    $detail->delete();

    return redirect()
        ->route('detail-pembayaran.index')
        ->with('success', 'Detail pembayaran berhasil dihapus.');
}
}

