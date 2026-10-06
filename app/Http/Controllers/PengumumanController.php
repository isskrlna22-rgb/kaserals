<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    // =========================
    // TAMPIL HALAMAN
    // =========================
    public function index()
    {
        $pengumuman = Pengumuman::with('user')
            ->latest('created_at')
            ->get();

        return view('pengumuman.index', compact('pengumuman'));
    }


    // =========================
    // SIMPAN PENGUMUMAN
    // =========================
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:150',
            'isi' => 'required|string',
        ]);

       $validated['id_user'] = Auth::id();

        Pengumuman::create($validated);

        return redirect()
            ->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil ditambahkan.');
    }


    // =========================
    // UPDATE PENGUMUMAN
    // =========================
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:150',
            'isi' => 'required|string',
        ]);

        $pengumuman->update($validated);

        return redirect()
            ->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil diperbarui.');
    }


    // =========================
    // HAPUS PENGUMUMAN
    // =========================
    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();

        return redirect()
            ->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus.');
    }
}
