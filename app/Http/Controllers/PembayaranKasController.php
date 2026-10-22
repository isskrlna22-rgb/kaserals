<?php

namespace App\Http\Controllers;

use App\Models\PembayaranKas;
use App\Models\Siswa;
use App\Models\PengaturanSistem;
use App\Models\DetailPembayaran;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranKasController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN PEMBAYARAN KAS
    |--------------------------------------------------------------------------
    */

    public function page()
    {
        $querySiswa = Siswa::query();
        $queryPembayaran = PembayaranKas::with('siswa');
        $queryHariIni = PembayaranKas::with('siswa')
            ->whereDate('tanggal', now()->toDateString());

        if (Auth::user()->role === 'BENDAHARA') {
            $kelasSaya = PengaturanSistem::where(
                'id_bendahara',
                Auth::id()
            )->pluck('nama_kelas');

            $querySiswa->whereIn('kelas', $kelasSaya);

            $filterKelas = function ($query) use ($kelasSaya) {
                $query->whereIn('kelas', $kelasSaya);
            };

            $queryPembayaran->whereHas('siswa', $filterKelas);
            $queryHariIni->whereHas('siswa', $filterKelas);
        } elseif (Auth::user()->role !== 'ADMIN') {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        $siswa = $querySiswa
            ->orderBy('nama_lengkap')
            ->get();

        $pembayaran = $queryPembayaran
            ->latest('tanggal')
            ->latest('id_pembayaran')
            ->get();

        $transaksiHariIni = $queryHariIni
            ->latest('id_pembayaran')
            ->get();

       $totalHariIni = DetailPembayaran::whereDate(
    'created_at',
    now()->toDateString()
)
    ->whereHas('pembayaranKas', function ($query) {
        $query->whereDate('tanggal', now()->toDateString());
    })
    ->whereHas('pembayaranKas.transaksi', function ($query) {
        $query->where('status', 'Diterima');
    })
    ->sum('nominal');

        return view('pembayaran-kas.index', compact(
            'siswa',
            'pembayaran',
            'transaksiHariIni',
            'totalHariIni'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | SIMPAN PEMBAYARAN DARI HALAMAN
    |--------------------------------------------------------------------------
    */


public function storePage(Request $request)
{
   $validated = $request->validate([
    'id_siswa' => 'required|exists:siswa,id_siswa',
    'nominal' => 'required|numeric|min:1',
    'metode_pembayaran' => 'required|in:Tunai,Transfer',
    'bukti_transfer' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    'keterangan' => 'nullable|string',
]);

    if (
        $validated['metode_pembayaran'] === 'Transfer'
        && !$request->hasFile('bukti_transfer')
    ) {
        return back()
            ->withErrors([
                'bukti_transfer' => 'Bukti transfer wajib diupload jika memilih metode Transfer.',
            ])
            ->withInput();
    }

    if ($request->hasFile('bukti_transfer')) {
        $validated['bukti_transfer'] = $request
            ->file('bukti_transfer')
            ->store('bukti-transfer', 'public');
    }

    $validated['tanggal'] = now()->toDateString();

 DB::transaction(function () use ($validated) {
    $pembayaran = PembayaranKas::create([
        'id_siswa' => $validated['id_siswa'],
        'metode_pembayaran' => $validated['metode_pembayaran'],
        'bukti_transfer' => $validated['bukti_transfer'] ?? null,
        'tanggal' => $validated['tanggal'],
        'keterangan' => $validated['keterangan'] ?? null,
    ]);

 

    DetailPembayaran::create([
    'id_pembayaran' => $pembayaran->id_pembayaran,
    'id_siswa' => $pembayaran->id_siswa,
    'minggu_ke' => null,
    'nominal' => $validated['nominal'],
]);

    Transaksi::create([
        'id_pembayaran' => $pembayaran->id_pembayaran,
        'id_siswa' => $pembayaran->id_siswa,
        'status' => $validated['metode_pembayaran'] === 'Transfer'
            ? 'Menunggu'
            : 'Diterima',
    ]);
});
    return redirect()
        ->route('pembayaran-kas.index')
        ->with('success', 'Pembayaran kas berhasil dicatat.');
}


    /*
    |--------------------------------------------------------------------------
    | API INDEX
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $pembayaran = PembayaranKas::with('siswa')
            ->latest('id_pembayaran')
            ->get();

        return response()->json($pembayaran);
    }


    /*
    |--------------------------------------------------------------------------
    | DETAIL DATA
    |--------------------------------------------------------------------------
    */
    public function show(PembayaranKas $pembayaranKas)
    {
        return response()->json(
            $pembayaranKas->load('siswa')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

public function update(
    Request $request,
    PembayaranKas $pembayaranKas
) {
    $validated = $request->validate([
        'id_siswa' => 'required|exists:siswa,id_siswa',
        'metode_pembayaran' => 'required|in:Tunai,Transfer',
        'bukti_transfer' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'tanggal' => 'required|date',
        'keterangan' => 'nullable|string',
    ]);

    if (
        $validated['metode_pembayaran'] === 'Transfer'
        && !$request->hasFile('bukti_transfer')
    ) {
        $validated['bukti_transfer'] = $pembayaranKas->bukti_transfer;
    }

    if ($request->hasFile('bukti_transfer')) {
        $validated['bukti_transfer'] = $request
            ->file('bukti_transfer')
            ->store('bukti-transfer', 'public');
    }

    DB::transaction(function () use ($pembayaranKas, $validated) {
        $pembayaranKas->update($validated);

        // Status tetap dikelola di tabel transaksi.
        $transaksi = Transaksi::where(
            'id_pembayaran',
            $pembayaranKas->id_pembayaran
        )->first();

        if ($transaksi) {
            $transaksi->update([
                'id_siswa' => $validated['id_siswa'],
            ]);
        }
    });

    return response()->json([
        'message' => 'Data pembayaran berhasil diperbarui.',
        'data' => $pembayaranKas->fresh()->load('siswa', 'transaksi'),
    ]);
}



    /*
    |--------------------------------------------------------------------------
    | HAPUS
    |--------------------------------------------------------------------------
    */
    public function destroy(PembayaranKas $pembayaranKas)
    {
        $pembayaranKas->delete();

        return redirect()
            ->route('pembayaran-kas.index')
            ->with('success', 'Pembayaran kas berhasil dihapus.');
    }


public function simpanPembayaranSiswa(Request $request)
{
    $validated = $request->validate([
        'nominal' => 'required|numeric|min:1',
        'metode_pembayaran' => 'required|in:Tunai,Transfer',
        'keterangan' => 'nullable|string',
        'bukti_transfer' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    if (
        $validated['metode_pembayaran'] === 'Transfer'
        && !$request->hasFile('bukti_transfer')
    ) {
        return back()
            ->withErrors([
                'bukti_transfer' => 'Bukti transfer wajib diupload.',
            ])
            ->withInput();
    }

    $user = Auth::user();

    $siswa = Siswa::where('id_user', $user->id_users)
        ->firstOrFail();

    $buktiTransfer = null;

    if ($request->hasFile('bukti_transfer')) {
        $buktiTransfer = $request
            ->file('bukti_transfer')
            ->store('bukti-transfer', 'public');
    }

    DB::transaction(function () use (
        $validated,
        $siswa,
        $buktiTransfer
    ) {
        $pembayaran = PembayaranKas::create([
            'id_siswa' => $siswa->id_siswa,
            'metode_pembayaran' => $validated['metode_pembayaran'],
            'bukti_transfer' => $buktiTransfer,
            'tanggal' => now()->toDateString(),
            'keterangan' => $validated['keterangan'] ?? null,
        ]);

DetailPembayaran::create([
    'id_pembayaran' => $pembayaran->id_pembayaran,
    'id_siswa' => $siswa->id_siswa,
    'minggu_ke' => null,
    'nominal' => $validated['nominal'],
]);

        Transaksi::create([
            'id_pembayaran' => $pembayaran->id_pembayaran,
            'id_siswa' => $siswa->id_siswa,
            'status' => 'Menunggu',
        ]);
    });

    return redirect()
        ->route('dashboard.siswa.pembayaran')
        ->with(
            'success',
            'Pembayaran berhasil dikirim dan menunggu verifikasi bendahara.'
        );
}

}
