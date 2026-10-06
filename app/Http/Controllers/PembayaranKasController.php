<?php

namespace App\Http\Controllers;

use App\Models\PembayaranKas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PembayaranKasController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN PEMBAYARAN KAS
    |--------------------------------------------------------------------------
    */
    public function page()
    {
        $siswa = Siswa::orderBy('nama_lengkap')->get();

        $pembayaran = PembayaranKas::with('siswa')
            ->latest('tanggal')
            ->latest('id_pembayaran')
            ->get();

        $transaksiHariIni = PembayaranKas::with('siswa')
            ->whereDate('tanggal', now()->toDateString())
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
}
