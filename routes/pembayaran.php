<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembayaranKasController;

Route::middleware(['auth', 'role:ADMIN,BENDAHARA'])->group(function () {

    Route::get('/data-pembayaran', [PembayaranKasController::class, 'page'])
        ->name('pembayaran-kas.index');

    Route::post('/data-pembayaran', [PembayaranKasController::class, 'storePage'])
        ->name('pembayaran-kas.store');

    Route::delete('/data-pembayaran/{pembayaranKas}', [PembayaranKasController::class, 'destroyPage'])
        ->name('pembayaran-kas.destroy');

    Route::get('/data-pembayaran', [PembayaranKasController::class, 'page'])
        ->middleware(['auth', 'role:ADMIN,BENDAHARA'])
        ->name('pembayaran-kas.index');

    Route::post('/data-pembayaran', [PembayaranKasController::class, 'storePage'])
        ->middleware(['auth', 'role:ADMIN,BENDAHARA'])
        ->name('pembayaran-kas.store');
});
