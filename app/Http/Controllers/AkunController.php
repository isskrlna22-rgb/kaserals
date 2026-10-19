<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\PengaturanSistem;
use Illuminate\Validation\Rule;
use App\Models\Siswa;

class AkunController extends Controller
{
    /**
     * Menampilkan semua akun.
     */
  public function index()
{
    $akun = User::with('siswa')
        ->latest('created_at')
        ->get();

    $waliKelas = User::where('role', 'WALI_KELAS')->get();

    $pengaturan = PengaturanSistem::first();

    $daftarKelas = Siswa::query()
        ->whereNotNull('kelas')
        ->where('kelas', '!=', '')
        ->select('kelas')
        ->distinct()
        ->orderBy('kelas')
        ->pluck('kelas');

    return view('akun.index', compact(
        'akun',
        'waliKelas',
        'pengaturan',
        'daftarKelas'
    ));
}
    /**
     * Form tambah akun.
     */
    public function create()
    {
        return view('akun.create');
    }

    /**
     * Menyimpan akun baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|in:ADMIN,BENDAHARA,WALI_KELAS,SISWA',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password_hash' => $validated['password'],
            'role' => $validated['role'],
        ]);

        return redirect()
            ->route('akun.index')
            ->with('success', 'Akun berhasil ditambahkan.');
    }

    /**
     * Form edit akun.
     */
    public function edit(User $user)
    {
        return view('akun.edit', compact('user'));
    }

    /**
     * Memperbarui akun.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id_users . ',id_users',
            'password' => 'nullable|string|min:8',
            'role' => 'required|in:ADMIN,BENDAHARA,WALI_KELAS,SISWA',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];

        if (!empty($validated['password'])) {
            $user->password_hash = $validated['password'];
        }

        $user->save();

        return redirect()
            ->route('akun.index')
            ->with('success', 'Akun berhasil diperbarui.');
    }

    /**
     * Menghapus akun.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('akun.index')
            ->with('success', 'Akun berhasil dihapus.');
    }



public function updatePengaturanKelas(Request $request)
{
    $validated = $request->validate([
        'nama_kelas' => [
            'required',
            'string',
            'max:255',
            Rule::exists('siswa', 'kelas'),
        ],
        'id_wali_kelas' => [
            'required',
            Rule::exists('users', 'id_users')
                ->where('role', 'WALI_KELAS'),
        ],
        'nominal_kas' => 'required|integer|min:1',
    ]);

    // Cari pengaturan berdasarkan kelas yang dipilih.
    $pengaturan = PengaturanSistem::where(
        'nama_kelas',
        $validated['nama_kelas']
    )->first();

    // Cegah satu Wali Kelas ditugaskan ke dua kelas berbeda.
    $waliSudahDitugaskan = PengaturanSistem::where(
        'id_wali_kelas',
        $validated['id_wali_kelas']
    )
        ->when(
            $pengaturan,
            fn ($query) => $query->where(
                'id_pengaturan',
                '!=',
                $pengaturan->id_pengaturan
            )
        )
        ->exists();

    if ($waliSudahDitugaskan) {
        return back()
            ->withInput()
            ->withErrors([
                'id_wali_kelas' =>
                    'Wali Kelas tersebut sudah ditugaskan ke kelas lain.',
            ]);
    }

    if (!$pengaturan) {
        $pengaturan = new PengaturanSistem();
    }

    $pengaturan->nama_kelas = $validated['nama_kelas'];
    $pengaturan->id_wali_kelas = $validated['id_wali_kelas'];
    $pengaturan->nominal_kas = $validated['nominal_kas'];
    $pengaturan->save();

    return redirect()
        ->route('akun.index')
        ->with('success', 'Pengaturan kelas berhasil disimpan.');
}
}
