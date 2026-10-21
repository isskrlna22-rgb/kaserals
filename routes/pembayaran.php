
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembayaranKasController;

// ========================================
// PEMBAYARAN KAS ADMIN DAN BENDAHARA
// ========================================

Route::middleware(['auth', 'role:ADMIN,BENDAHARA'])->group(function () {

    Route::get('/data-pembayaran', [PembayaranKasController::class, 'page'])
        ->name('pembayaran-kas.index');

    Route::post('/data-pembayaran', [PembayaranKasController::class, 'storePage'])
        ->name('pembayaran-kas.store');

    Route::delete('/data-pembayaran/{pembayaranKas}', [PembayaranKasController::class, 'destroy'])
        ->name('pembayaran-kas.destroy');

});

Route::get('/admin/status-pembayaran', [
    \App\Http\Controllers\SiswaDashboardController::class,
    'adminStatusPembayaran'
])->middleware(['auth', 'role:ADMIN'])
  ->name('admin.status-pembayaran');


Route::get('/bendahara/status-pembayaran', [
    \App\Http\Controllers\SiswaDashboardController::class,
    'bendaharaStatusPembayaran'
])->middleware(['auth', 'role:BENDAHARA'])
  ->name('bendahara.status-pembayaran');


// ========================================
// PEMBAYARAN SISWA
// ========================================

Route::middleware(['auth', 'role:SISWA'])->group(function () {

    Route::get(
        '/dashboard-siswa/pembayaran',
        [PembayaranKasController::class, 'pembayaranSiswa']
    )->name('dashboard.siswa.pembayaran');

    Route::post(
        '/dashboard-siswa/pembayaran',
        [PembayaranKasController::class, 'simpanPembayaranSiswa']
    )->name('dashboard.siswa.pembayaran.simpan');

});
