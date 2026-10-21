<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\PengaturanSistem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengeluaranController extends Controller
{
    // =========================
    // API
    // =========================

    public function index()
    {
        $pengeluaran = Pengeluaran::with('user')
            ->latest()
            ->get();

        return response()->json($pengeluaran);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nominal' => 'required|numeric|min:1',
            'tanggal' => 'required|date',
            'kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $validated['id_user'] = Auth::id();

        $pengeluaran = Pengeluaran::create($validated);

        return response()->json([
            'message' => 'Pengeluaran berhasil dicatat.',
            'data' => $pengeluaran->load('user'),
        ], 201);
    }

    public function show(Pengeluaran $pengeluaran)
    {
        return response()->json(
            $pengeluaran->load('user')
        );
    }

    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $validated = $request->validate([
            'nominal' => 'required|numeric|min:1',
            'tanggal' => 'required|date',
            'kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $pengeluaran->update($validated);

        return response()->json([
            'message' => 'Pengeluaran berhasil diperbarui.',
            'data' => $pengeluaran->load('user'),
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
    $query = Pengeluaran::with('user');

    if (Auth::user()->role === 'BENDAHARA') {
        $kelasSaya = PengaturanSistem::where(
            'id_bendahara',
            Auth::id()
        )->pluck('nama_kelas');

        $query->whereIn('nama_kelas', $kelasSaya);
    } elseif (Auth::user()->role !== 'ADMIN') {
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }

    $pengeluaran = $query
        ->latest('tanggal')
        ->get();

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

    $user = Auth::user();

    if ($user->role === 'BENDAHARA') {
        $kelasSaya = PengaturanSistem::where(
            'id_bendahara',
            $user->id_users
        )->pluck('nama_kelas');

        if ($kelasSaya->count() !== 1) {
            abort(403, 'Pastikan akun Bendahara memiliki tepat satu kelas tugas.');
        }

        $validated['nama_kelas'] = $kelasSaya->first();

    } elseif ($user->role === 'ADMIN') {
        $request->validate([
            'nama_kelas' => 'required|string|exists:pengaturan_sistems,nama_kelas',
        ]);

        $validated['nama_kelas'] = $request->nama_kelas;

    } else {
        abort(403, 'Anda tidak memiliki akses untuk mencatat pengeluaran.');
    }

    $validated['id_user'] = $user->id_users;

    Pengeluaran::create($validated);

    return redirect()
        ->route('pengeluaran.web.index')
        ->with('success', 'Pengeluaran berhasil dicatat.');
}

    // =========================
    // WEB - UPDATE
    // =========================

    public function updatePage(
        Request $request,
        Pengeluaran $pengeluaran
    ) {
        $validated = $request->validate([
            'nominal' => 'required|numeric|min:1',
            'tanggal' => 'required|date',
            'kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $pengeluaran->update($validated);

        return redirect()
            ->route('pengeluaran.web.index')
            ->with('success', 'Pengeluaran berhasil diperbarui.');
    }

    // =========================
    // WEB - DELETE
    // =========================

    public function destroyPage(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();

        return redirect()
            ->route('pengeluaran.web.index')
            ->with('success', 'Pengeluaran berhasil dihapus.');
    }
}
