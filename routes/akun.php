<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;

Route::middleware(['auth', 'role:ADMIN'])->group(function () {

    Route::get('/kelola-akun', [AkunController::class, 'index'])
        ->name('akun.index');

    Route::get('/kelola-akun/create', [AkunController::class, 'create'])
        ->name('akun.create');

    Route::post('/kelola-akun', [AkunController::class, 'store'])
        ->name('akun.store');

    Route::get('/kelola-akun/{user}/edit', [AkunController::class, 'edit'])
        ->name('akun.edit');

    Route::put('/kelola-akun/{user}', [AkunController::class, 'update'])
        ->name('akun.update');

    Route::delete('/kelola-akun/{user}', [AkunController::class, 'destroy'])
        ->name('akun.destroy');

});
