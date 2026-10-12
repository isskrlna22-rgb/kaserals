<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilePhotoController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'foto_profil' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $user = $request->user();

        $path = $request->file('foto_profil')
            ->store('foto-profil', 'public');

        if ($user->foto_profil) {
            Storage::disk('public')->delete($user->foto_profil);
        }

        $user->foto_profil = $path;
        $user->save();

        return back()->with('success', 'Foto profil berhasil diperbarui!');
    }
}
