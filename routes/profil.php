
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilePhotoController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    // Halaman profil
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    // Update informasi profil
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    // Hapus akun
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Update foto profil
    Route::patch('/profile/photo', [ProfilePhotoController::class, 'update'])
        ->name('profile.photo.update');

});
