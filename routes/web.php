<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PembayaranKasController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SiswaDashboardController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\LaporanExportController;
use App\Http\Controllers\StatusPembayaranController;

Route::get('/', function () {
    return view('welcome');
});


// ================= PROFILE =================

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


// ================= TEST ADMIN =================

Route::get('/test-admin', function () {
    return 'Akses Admin berhasil!';
})->middleware(['auth', 'role:ADMIN']);


// ================= DATA SISWA =================

Route::middleware(['auth', 'role:ADMIN,BENDAHARA'])->group(function () {

    Route::apiResource('siswa', SiswaController::class);

});


// ================= PEMBAYARAN KAS =================

Route::apiResource('pembayaran-kas', PembayaranKasController::class)
    ->middleware(['auth', 'role:ADMIN,BENDAHARA'])
    ->names('pembayaran-kas.api');


// ================= PENGELUARAN =================

Route::apiResource('pengeluaran', PengeluaranController::class)
    ->middleware(['auth', 'role:ADMIN,BENDAHARA']);


// ================= PENGUMUMAN =================

Route::apiResource('pengumuman', PengumumanController::class)
    ->middleware(['auth', 'role:ADMIN,BENDAHARA']);


// ================= DASHBOARD API =================

Route::get('/api/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth']);


// ================= LAPORAN =================

Route::get('/api/laporan', [LaporanController::class, 'index'])
    ->middleware([
        'auth',
        'role:ADMIN,BENDAHARA,WALI_KELAS,SISWA'
    ]);


// ================= DASHBOARD SISWA =================

Route::get('/api/siswa/dashboard', [SiswaDashboardController::class, 'index'])
    ->middleware(['auth', 'role:SISWA']);


// ================= FILE ROUTES =================

require __DIR__ . '/dashboard.php';
require __DIR__ . '/siswa.php';
require __DIR__ . '/pembayaran.php';
require __DIR__ . '/detail-pembayaran.php';
require __DIR__ . '/pengeluaran.php';
require __DIR__ . '/pengumuman.php';
require __DIR__ . '/riwayat.php';
require __DIR__ . '/laporan.php';
require __DIR__ . '/siswa-dashboard.php';


// ================= VERIFIKASI PEMBAYARAN =================

require __DIR__ . '/verifikasi-pembayaran.php';


require __DIR__ . '/auth.php';
