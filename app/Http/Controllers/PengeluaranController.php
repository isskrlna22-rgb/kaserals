<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengeluaranController extends Controller
{
    // =========================
    // API
    // =========================

    public function index()
    {
        $pengeluaran = Pengeluaran::latest()->get();

        return response()->json($pengeluaran);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nominal' => 'required|numeric|min:0',
            'tanggal' => 'required|date',
            'kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $validated['user_id'] = Auth::id();

        $pengeluaran = Pengeluaran::create($validated);

        return response()->json([
            'message' => 'Pengeluaran berhasil dicatat.',
            'data' => $pengeluaran,
        ], 201);
    }

    public function show(Pengeluaran $pengeluaran)
    {
        return response()->json($pengeluaran);
    }

    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $validated = $request->validate([
            'nominal' => 'required|numeric|min:0',
            'tanggal' => 'required|date',
            'kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $pengeluaran->update($validated);

        return response()->json([
            'message' => 'Pengeluaran berhasil diperbarui.',
            'data' => $pengeluaran,
        ]);
    }

    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();

        return response()->json([
            'message' => 'Pengeluaran berhasil dihapus.',
        ]);
    }


    // =========================
    // WEB
    // =========================

    public function page()
    {
        $pengeluaran = Pengeluaran::latest('tanggal')->get();

        return view('pengeluaran.index', compact('pengeluaran'));
    }

    public function storePage(Request $request)
    {
        $validated = $request->validate([
            'nominal' => 'required|numeric|min:1',
            'tanggal' => 'required|date',
            'kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $validated['user_id'] = Auth::id();

        Pengeluaran::create($validated);

        return redirect()
            ->route('pengeluaran.web.index')
            ->with('success', 'Pengeluaran berhasil dicatat.');
    }
}
