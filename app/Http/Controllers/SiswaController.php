<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::latest()->get();

        return response()->json($siswa);
    }

    public function page()
    {
        $siswa = Siswa::latest()->get();

        return view('siswa.index', compact('siswa'));
    }

    public function createPage()
    {
        return view('siswa.create');
    }

    public function editPage(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    public function updatePage(Request $request, Siswa $siswa)
    {
        $validated = $request->validate([
            'nisn' => 'required|string|max:50|unique:siswa,nisn,' . $siswa->id_siswa . ',id_siswa',
            'nama_lengkap' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'no_hp' => 'nullable|string|max:20',
        ]);

        $siswa->update($validated);

        return redirect()
            ->route('data-siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroyPage(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()
            ->route('data-siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }

    public function storePage(Request $request)
    {
        $validated = $request->validate([
            'nisn' => 'required|string|max:50|unique:siswa,nisn',
            'nama_lengkap' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'no_hp' => 'nullable|string|max:20',
        ]);

        Siswa::create($validated);

        return redirect()
            ->route('data-siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_user' => 'nullable|exists:users,id_users',
            'nisn' => 'required|string|max:50|unique:siswa,nisn',
            'nama_lengkap' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'no_hp' => 'nullable|string|max:20',
        ]);

        $siswa = Siswa::create($validated);

        return response()->json([
            'message' => 'Data siswa berhasil ditambahkan.',
            'data' => $siswa,
        ], 201);
    }

    public function show(Siswa $siswa)
    {
        return response()->json($siswa);
    }

    public function update(Request $request, Siswa $siswa)
    {
        $validated = $request->validate([
            'id_user' => 'nullable|exists:users,id_users',
            'nisn' => 'required|string|max:50|unique:siswa,nisn,' . $siswa->id_siswa . ',id_siswa',
            'nama_lengkap' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'no_hp' => 'nullable|string|max:20',
        ]);

        $siswa->update($validated);

        return response()->json([
            'message' => 'Data siswa berhasil diperbarui.',
            'data' => $siswa,
        ]);
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return response()->json([
            'message' => 'Data siswa berhasil dihapus.',
        ]);
    }
}
