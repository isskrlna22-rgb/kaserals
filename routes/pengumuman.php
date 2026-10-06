<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengumumanController;

Route::middleware(['auth', 'role:ADMIN,BENDAHARA'])->group(function () {

    Route::get('/pengumuman', [PengumumanController::class, 'index'])
        ->name('pengumuman.index');

    Route::post('/pengumuman', [PengumumanController::class, 'store'])
        ->name('pengumuman.store');

    Route::put('/pengumuman/{pengumuman}', [PengumumanController::class, 'update'])
        ->name('pengumuman.update');

    Route::delete('/pengumuman/{pengumuman}', [PengumumanController::class, 'destroy'])
        ->name('pengumuman.destroy');

});
