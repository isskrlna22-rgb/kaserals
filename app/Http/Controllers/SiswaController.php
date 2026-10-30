<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\User;

class SiswaController extends Controller
{
    public function index()
    {
        $user = \Illuminate\Support\Facades\Auth::user();

        if ($user->role === 'ADMIN') {
            // Admin dapat melihat semua siswa.
            $siswa = Siswa::all();
        } elseif ($user->role === 'BENDAHARA') {
            // Cari kelas yang ditugaskan kepada bendahara.
            $kelasBendahara = \App\Models\PengaturanSistem::where(
                'id_bendahara',
                $user->id_users
            )->pluck('nama_kelas');

            // Tampilkan siswa dari kelas yang ditangani.
            $siswa = Siswa::whereIn(
                'kelas',
                $kelasBendahara
            )->get();
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return view('siswa.index', compact('siswa'));
    }

    private function pastikanAksesSiswa(Siswa $siswa): void
    {
        $user = \Illuminate\Support\Facades\Auth::user();

        // Admin boleh mengakses semua data siswa.
        if ($user->role === 'ADMIN') {
            return;
        }

        // Bendahara hanya boleh mengakses siswa di kelasnya.
        if ($user->role === 'BENDAHARA') {
            $punyaAkses = \App\Models\PengaturanSistem::where(
                'id_bendahara',
                $user->id_users
            )
                ->where('nama_kelas', $siswa->kelas)
                ->exists();

            if ($punyaAkses) {
                return;
            }
        }

        abort(403, 'Anda tidak memiliki akses ke data siswa ini.');
    }

    public function page()
    {
        $user = \Illuminate\Support\Facades\Auth::user();

        if ($user->role === 'ADMIN') {
            $siswa = Siswa::latest()->get();
        } elseif ($user->role === 'BENDAHARA') {
            $kelasBendahara = \App\Models\PengaturanSistem::where(
                'id_bendahara',
                $user->id_users
            )->pluck('nama_kelas');

            $siswa = Siswa::whereIn('kelas', $kelasBendahara)
                ->latest()
                ->get();
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return view('siswa.index', compact('siswa'));
    }

    public function createPage()
    {
        $user = \Illuminate\Support\Facades\Auth::user();

        if ($user->role === 'ADMIN') {
            $users = User::where('role', 'SISWA')->get();
        } else {
            $users = User::where('role', 'SISWA')
                ->whereDoesntHave('siswa')
                ->get();
        }

        if ($user->role === 'ADMIN') {
            $kelas = \App\Models\PengaturanSistem::pluck('nama_kelas');
        } elseif ($user->role === 'BENDAHARA') {
            $kelas = \App\Models\PengaturanSistem::where(
                'id_bendahara',
                $user->id_users
            )->pluck('nama_kelas');
        } else {
            abort(403, 'Anda tidak memiliki akses.');
        }

        return view('siswa.create', compact('users', 'kelas'));
    }

    public function editPage(Siswa $siswa)
    {
        $this->pastikanAksesSiswa($siswa);

        return view('siswa.edit', compact('siswa'));
    }

    public function updatePage(Request $request, Siswa $siswa)
    {
        $this->pastikanAksesSiswa($siswa);
        $validated = $request->validate([
            'nisn' => 'required|string|max:50|unique:siswa,nisn,' . $siswa->id_siswa . ',id_siswa',
            'nama_lengkap' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:100',
            'no_hp' => 'nullable|string|max:20',
        ]);

        $siswa->update($validated);

        return redirect()
            ->route('data-siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }


    public function destroyPage(Siswa $siswa)
    {
        $this->pastikanAksesSiswa($siswa);

        $siswa->delete();

        return redirect()
            ->route('data-siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }



    public function storePage(Request $request)
    {
        $user = \Illuminate\Support\Facades\Auth::user();

        if ($user->role === 'ADMIN') {
            $daftarKelas = \App\Models\PengaturanSistem::pluck('nama_kelas');
        } elseif ($user->role === 'BENDAHARA') {
            $daftarKelas = \App\Models\PengaturanSistem::where(
                'id_bendahara',
                $user->id_users
            )->pluck('nama_kelas');
        } else {
            abort(403, 'Anda tidak memiliki akses.');
        }

        $validated = $request->validate([
            'id_user' => 'required|exists:users,id_users',
            'nisn' => 'required|string|max:255|unique:siswa,nisn',
            'nama_lengkap' => 'required|string|max:255',
            'kelas' => [
                'required',
                'string',
                'max:50',
                \Illuminate\Validation\Rule::in($daftarKelas->toArray()),
            ],
            'jurusan' => 'required|string|max:100',
            'no_hp' => 'nullable|string|max:20',
        ], [
            'id_user.required' => 'Akun siswa wajib dipilih.',
            'id_user.exists' => 'Akun siswa tidak ditemukan.',
            'nisn.required' => 'NISN wajib diisi.',
            'nisn.unique' => 'NISN sudah terdaftar.',
            'nama_lengkap.required' => 'Nama siswa wajib diisi.',
            'kelas.required' => 'Kelas wajib dipilih.',
            'kelas.in' => 'Kelas yang dipilih tidak tersedia.',
            'jurusan.required' => 'Jurusan wajib diisi.',
        ]);

        \App\Models\Siswa::create($validated);

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
