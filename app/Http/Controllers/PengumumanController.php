<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::latest()->get();

        return response()->json($pengumuman);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        $validated['user_id'] = Auth::id();

        $pengumuman = Pengumuman::create($validated);

        return response()->json([
            'message' => 'Pengumuman berhasil ditambahkan.',
            'data' => $pengumuman,
        ], 201);
    }

    public function show(Pengumuman $pengumuman)
    {
        return response()->json($pengumuman);
    }

    public function update(Request $request, Pengumuman $pengumuman)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        $pengumuman->update($validated);

        return response()->json([
            'message' => 'Pengumuman berhasil diperbarui.',
            'data' => $pengumuman,
        ]);
    }

    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();

        return response()->json([
            'message' => 'Pengumuman berhasil dihapus.',
        ]);
    }
}
