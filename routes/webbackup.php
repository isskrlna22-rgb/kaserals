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

Route::get('/dashboard', [DashboardController::class, 'view'])
    ->middleware(['auth'])
    ->name('dashboard');

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

    // Halaman Data Siswa
    Route::get('/data-siswa', [SiswaController::class, 'page'])
        ->name('data-siswa.index');

    // Halaman Tambah Siswa
    Route::get('/data-siswa/create', [SiswaController::class, 'createPage'])
        ->name('data-siswa.create');

    // Simpan dari form web
    Route::post('/data-siswa', [SiswaController::class, 'storePage'])
        ->name('data-siswa.store');

    Route::get('/data-siswa/{siswa}/edit', [SiswaController::class, 'editPage'])
        ->name('data-siswa.edit');

    Route::put('/data-siswa/{siswa}', [SiswaController::class, 'updatePage'])
        ->name('data-siswa.update');

    Route::delete('/data-siswa/{siswa}', [SiswaController::class, 'destroyPage'])
        ->name('data-siswa.destroy');


    Route::get('/data-pemasukan', [PemasukanController::class, 'page'])
        ->name('pemasukan.web.index');

    Route::post('/data-pemasukan', [PemasukanController::class, 'storePage'])
        ->name('pemasukan.web.store');

    Route::get('/data-pengeluaran', [PengeluaranController::class, 'page'])
        ->middleware(['auth', 'role:ADMIN,BENDAHARA'])
        ->name('pengeluaran.web.index');

    Route::post('/data-pengeluaran', [PengeluaranController::class, 'storePage'])
        ->middleware(['auth', 'role:ADMIN,BENDAHARA'])
        ->name('pengeluaran.web.store');

    Route::get('/status-pembayaran', [StatusPembayaranController::class, 'page'])
        ->middleware(['auth', 'role:ADMIN,BENDAHARA,KETUA_KELAS,GURU_PEMBIMBING'])
        ->name('status-pembayaran.index');


    Route::get('/riwayat-transaksi', [RiwayatController::class, 'index'])
        ->middleware(['auth', 'role:ADMIN,BENDAHARA,KETUA_KELAS,GURU_PEMBIMBING'])
        ->name('riwayat.index');
});

Route::middleware(['auth', 'role:ADMIN,BENDAHARA,KETUA_KELAS,GURU_PEMBIMBING'])->group(function () {

    Route::get('/laporan-keuangan', [LaporanController::class, 'page'])
        ->name('laporan.index');


    Route::get('/laporan-keuangan/export/pdf', [LaporanExportController::class, 'exportPdf'])
        ->name('laporan.export.pdf');
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


Route::get('/data-siswa', [SiswaController::class, 'page'])
    ->middleware(['auth', 'role:ADMIN,BENDAHARA'])
    ->name('data-siswa.index');

Route::get('/data-pembayaran', [PembayaranKasController::class, 'page'])
    ->middleware(['auth', 'role:ADMIN,BENDAHARA'])
    ->name('pembayaran-kas.index');

Route::post('/data-pembayaran', [PembayaranKasController::class, 'storePage'])
    ->middleware(['auth', 'role:ADMIN,BENDAHARA'])
    ->name('pembayaran-kas.store');


require __DIR__ . '/auth.php';
