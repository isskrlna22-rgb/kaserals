<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailPembayaranController;

Route::middleware(['auth', 'role:ADMIN,BENDAHARA'])->group(function () {

    // Halaman Detail Pembayaran
    Route::get('/detail-pembayaran', [
        DetailPembayaranController::class,
        'index'
    ])->name('detail-pembayaran.index');

    // Simpan Detail Pembayaran
    Route::post('/detail-pembayaran', [
        DetailPembayaranController::class,
        'store'
    ])->name('detail-pembayaran.store');

    // Hapus Detail Pembayaran
    Route::delete('/detail-pembayaran/{id}', [
        DetailPembayaranController::class,
        'destroy'
    ])->name('detail-pembayaran.destroy');

});
