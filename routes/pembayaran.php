<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembayaranKasController;

Route::middleware(['auth', 'role:ADMIN,BENDAHARA'])->group(function () {

    // Halaman Pembayaran Kas
    Route::get('/data-pembayaran', [PembayaranKasController::class, 'page'])
        ->name('pembayaran-kas.index');

    // Simpan Pembayaran Kas
    Route::post('/data-pembayaran', [PembayaranKasController::class, 'storePage'])
        ->name('pembayaran-kas.store');

    // Hapus Pembayaran Kas
    Route::delete('/data-pembayaran/{pembayaranKas}', [PembayaranKasController::class, 'destroy'])
        ->name('pembayaran-kas.destroy');

});
