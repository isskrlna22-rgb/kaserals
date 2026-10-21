<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\PengaturanSistem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    private function kelasBendahara()
    {
        return PengaturanSistem::where(
            'id_bendahara',
            Auth::id()
        )->pluck('nama_kelas');
    }

    public function index()
    {
        $query = Pengumuman::with('user')->latest('created_at');

        if (Auth::user()->role === 'BENDAHARA') {
            $query->whereIn('nama_kelas', $this->kelasBendahara());
        }

        $pengumuman = $query->get();

        return view('pengumuman.index', compact('pengumuman'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:150',
            'isi' => 'required|string',
        ]);

        $user = Auth::user();

        if ($user->role === 'BENDAHARA') {
            $kelasSaya = $this->kelasBendahara();

            if ($kelasSaya->isEmpty()) {
                abort(403, 'Akun Bendahara belum memiliki kelas.');
            }

            $validated['nama_kelas'] = $kelasSaya->first();
        } elseif ($user->role === 'ADMIN') {
            $validated['nama_kelas'] = $request->validate([
                'nama_kelas' => 'required|string|max:100',
            ])['nama_kelas'];
        } else {
            abort(403, 'Anda tidak memiliki akses.');
        }

        $validated['id_user'] = Auth::id();

        Pengumuman::create($validated);

        return redirect()
            ->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function update(Request $request, Pengumuman $pengumuman)
    {
        $user = Auth::user();

        if (
            $user->role === 'BENDAHARA'
            && !$this->kelasBendahara()->contains($pengumuman->nama_kelas)
        ) {
            abort(403, 'Pengumuman ini bukan milik kelas Anda.');
        }

        if (!in_array($user->role, ['ADMIN', 'BENDAHARA'])) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        $validated = $request->validate([
            'judul' => 'required|string|max:150',
            'isi' => 'required|string',
        ]);

        $pengumuman->update($validated);

        return redirect()
            ->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function destroy(Pengumuman $pengumuman)
    {
        $user = Auth::user();

        if (
            $user->role === 'BENDAHARA'
            && !$this->kelasBendahara()->contains($pengumuman->nama_kelas)
        ) {
            abort(403, 'Pengumuman ini bukan milik kelas Anda.');
        }

        if (!in_array($user->role, ['ADMIN', 'BENDAHARA'])) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        $pengumuman->delete();

        return redirect()
            ->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus.');
    }
}
