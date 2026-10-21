<?php

namespace App\Http\Controllers;

use App\Models\PembayaranKas;
use App\Models\Siswa;
use App\Models\PengaturanSistem;
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

    $totalHariIni = $transaksiHariIni->sum('nominal');

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

        /*
    |--------------------------------------------------------------------------
    | TANGGAL OTOMATIS
    |--------------------------------------------------------------------------
    */
        $validated['tanggal'] = now()->toDateString();

        /*
    |--------------------------------------------------------------------------
    | BUKTI TRANSFER
    |--------------------------------------------------------------------------
    */
        if (
            $request->metode_pembayaran === 'Transfer'
            && !$request->hasFile('bukti_transfer')
        ) {
            return back()
                ->withErrors([
                    'bukti_transfer' =>
                    'Bukti transfer wajib diupload jika memilih metode Transfer.'
                ])
                ->withInput();
        }

        if ($request->hasFile('bukti_transfer')) {
            $validated['bukti_transfer'] =
                $request->file('bukti_transfer')
                ->store('bukti-transfer', 'public');
        }

        /*
    |--------------------------------------------------------------------------
    | STATUS OTOMATIS
    |--------------------------------------------------------------------------
    */
        if ($request->metode_pembayaran === 'Transfer') {
            $validated['status'] = 'Menunggu';
        } else {
            $validated['status'] = 'Diterima';
        }

        /*
    |--------------------------------------------------------------------------
    | MINGGU KE
    |--------------------------------------------------------------------------
    */
        $validated['minggu_ke'] = 1;

        /*
    |--------------------------------------------------------------------------
    | SIMPAN KE DATABASE
    |--------------------------------------------------------------------------
    */
        PembayaranKas::create($validated);

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
            'minggu_ke' => 'required|integer|min:1',
            'nominal' => 'required|numeric|min:0',
            'status' => 'required|in:Menunggu,Diterima,Ditolak',
            'metode_pembayaran' => 'required|in:Tunai,Transfer',
            'bukti_transfer' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        if ($request->hasFile('bukti_transfer')) {
            $validated['bukti_transfer'] =
                $request->file('bukti_transfer')
                ->store('bukti-transfer', 'public');
        }

        $pembayaranKas->update($validated);

        return response()->json([
            'message' => 'Pembayaran kas berhasil diperbarui.',
            'data' => $pembayaranKas->load('siswa'),
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
        $request->validate([
            'nominal' => 'required|numeric|min:1',
            'metode_pembayaran' => 'required|in:Tunai,Transfer',
            'keterangan' => 'nullable|string',
            'bukti_transfer' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $user = Auth::user();

        $siswa = Siswa::where('id_user', $user->id_users)->first();

        if (!$siswa) {
            abort(404, 'Data siswa belum terhubung dengan akun ini.');
        }

        if (
            $request->metode_pembayaran === 'Transfer'
            && !$request->hasFile('bukti_transfer')
        ) {
            return back()
                ->withErrors([
                    'bukti_transfer' => 'Bukti transfer wajib diupload.'
                ])
                ->withInput();
        }

        $data = [
            'id_siswa' => $siswa->id_siswa,
            'nominal' => $request->nominal,
            'metode_pembayaran' => $request->metode_pembayaran,
            'keterangan' => $request->keterangan,
            'tanggal' => now()->toDateString(),
            'minggu_ke' => 1,
            'status' => 'Menunggu',
        ];

        if ($request->hasFile('bukti_transfer')) {
            $data['bukti_transfer'] = $request
                ->file('bukti_transfer')
                ->store('bukti-transfer', 'public');
        }

        PembayaranKas::create($data);

        return redirect()
            ->route('dashboard.siswa.pembayaran')
            ->with('success', 'Pembayaran berhasil dikirim dan menunggu verifikasi bendahara.');
    }
}
