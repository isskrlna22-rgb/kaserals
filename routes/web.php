<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PembayaranKasController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\StatusPembayaranController;
use App\Http\Controllers\SiswaDashboardController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\LaporanExportController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/test-admin', function () {
    return 'Akses Admin berhasil!';
})->middleware(['auth', 'role:ADMIN']);

Route::middleware(['auth', 'role:ADMIN,BENDAHARA'])->group(function () {

    // API Data Siswa
    Route::apiResource('siswa', SiswaController::class);

});

Route::middleware(['auth', 'role:ADMIN,BENDAHARA,KETUA_KELAS,GURU_PEMBIMBING'])->group(function () {

});

Route::apiResource('pembayaran-kas', PembayaranKasController::class)
    ->middleware(['auth', 'role:ADMIN,BENDAHARA'])
    ->names('pembayaran-kas.api');

Route::apiResource('pemasukan', PemasukanController::class)
    ->middleware(['auth', 'role:ADMIN,BENDAHARA']);

Route::apiResource('pengeluaran', PengeluaranController::class)
    ->middleware(['auth', 'role:ADMIN,BENDAHARA']);

Route::apiResource('pengumuman', PengumumanController::class)
    ->middleware(['auth', 'role:ADMIN,BENDAHARA']);

Route::get('/api/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth']);

Route::get('/api/laporan', [LaporanController::class, 'index'])
    ->middleware(['auth', 'role:ADMIN,BENDAHARA,KETUA_KELAS,GURU_PEMBIMBING']);


Route::get('/api/status-pembayaran/{siswa}', [StatusPembayaranController::class, 'show'])
    ->middleware(['auth', 'role:ADMIN,BENDAHARA,KETUA_KELAS,GURU_PEMBIMBING']);

Route::get('/api/siswa/dashboard', [SiswaDashboardController::class, 'index'])
    ->middleware(['auth', 'role:SISWA']);

require __DIR__ . '/dashboard.php';
require __DIR__ . '/siswa.php';
require __DIR__ . '/pembayaran.php';
require __DIR__ . '/pemasukan.php';
require __DIR__ . '/pengeluaran.php';
require __DIR__ . '/status-pembayaran.php';
require __DIR__ . '/riwayat.php';
require __DIR__ . '/laporan.php';
require __DIR__.'/siswa-dashboard.php';

require __DIR__ . '/auth.php';

