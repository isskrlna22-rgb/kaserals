<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerifikasiPembayaranController;

Route::middleware([
    'auth',
    'role:ADMIN,BENDAHARA'
])->group(function () {

    Route::get(
        '/verifikasi-pembayaran',
        [VerifikasiPembayaranController::class, 'page']
    )->name('verifikasi-pembayaran.index');

    Route::put(
        '/verifikasi-pembayaran/{pembayaranKas}',
        [VerifikasiPembayaranController::class, 'update']
    )->name('verifikasi-pembayaran.update');

});
