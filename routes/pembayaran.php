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

        // Halaman pembayaran milik siswa
Route::get(
    '/dashboard-siswa/pembayaran',
    [PembayaranKasController::class, 'pembayaranSiswa']
)->name('dashboard.siswa.pembayaran');

// Menyimpan pembayaran milik siswa
Route::post(
    '/dashboard-siswa/pembayaran',
    [PembayaranKasController::class, 'simpanPembayaranSiswa']
)->name('dashboard.siswa.pembayaran.simpan');
});
