<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemasukanController;

Route::middleware(['auth', 'role:ADMIN,BENDAHARA'])->group(function () {

    // Halaman Pemasukan
    Route::get('/data-pemasukan', [PemasukanController::class, 'page'])
        ->name('pemasukan.web.index');

    // Simpan Pemasukan
    Route::post('/data-pemasukan', [PemasukanController::class, 'storePage'])
        ->name('pemasukan.web.store');

});
