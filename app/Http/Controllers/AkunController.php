<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        return view('akun.index', compact('akun'));
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
}
