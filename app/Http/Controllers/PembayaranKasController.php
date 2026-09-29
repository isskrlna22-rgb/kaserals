<?php

namespace App\Http\Controllers;

use App\Models\PembayaranKas;
use Illuminate\Http\Request;
use App\Models\Siswa;

class PembayaranKasController extends Controller
{
    public function index()
    {
        $pembayaran = PembayaranKas::with('siswa')
            ->latest()
            ->get();

        return response()->json($pembayaran);
    }
    public function show(PembayaranKas $pembayaranKas)
    {
        return response()->json(
            $pembayaranKas->load('siswa')
        );
    }

    public function update(
        Request $request,
        PembayaranKas $pembayaranKas
    ) {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'nominal' => 'required|numeric|min:0',
            'periode' => 'required|string|max:50',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $pembayaranKas->update($validated);

        return response()->json([
            'message' => 'Pembayaran kas berhasil diperbarui.',
            'data' => $pembayaranKas->load('siswa'),
        ]);
    }

    public function destroy(PembayaranKas $pembayaranKas)
    {
        $pembayaranKas->delete();

        return response()->json([
            'message' => 'Pembayaran kas berhasil dihapus.',
        ]);
    }

    public function page()
    {
        $siswa = Siswa::orderBy('nama')->get();

        $pembayaran = PembayaranKas::with('siswa')
            ->latest('tanggal')
            ->get();

        return view('pembayaran-kas.index', compact('siswa', 'pembayaran'));
    }

    public function storePage(Request $request)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'nominal' => 'required|numeric|min:1',
            'periode' => 'required|string|max:50',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        PembayaranKas::create($validated);

        return redirect()
            ->route('pembayaran-kas.index')
            ->with('success', 'Pembayaran kas berhasil dicatat.');
    }
}
