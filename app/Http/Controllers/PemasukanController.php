<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PemasukanController extends Controller
{
    public function index()
    {
        $pemasukan = Pemasukan::latest()->get();

        return response()->json($pemasukan);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'nominal' => 'required|numeric|min:0',
            'tanggal' => 'required|date',
            'sumber' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

     $validated['user_id'] = $validated['user_id'] ?? Auth::id();

        $pemasukan = Pemasukan::create($validated);

        return response()->json([
            'message' => 'Pemasukan berhasil dicatat.',
            'data' => $pemasukan,
        ], 201);
    }

    public function show(Pemasukan $pemasukan)
    {
        return response()->json($pemasukan);
    }

    public function update(Request $request, Pemasukan $pemasukan)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'nominal' => 'required|numeric|min:0',
            'tanggal' => 'required|date',
            'sumber' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $pemasukan->update($validated);

        return response()->json([
            'message' => 'Pemasukan berhasil diperbarui.',
            'data' => $pemasukan,
        ]);
    }

    public function destroy(Pemasukan $pemasukan)
    {
        $pemasukan->delete();

        return response()->json([
            'message' => 'Pemasukan berhasil dihapus.',
        ]);
    }
}
