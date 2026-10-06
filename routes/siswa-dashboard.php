<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaDashboardController;

Route::middleware(['auth'])->group(function () {

    // Halaman Dashboard Siswa
    Route::get(
        '/dashboard-siswa',
        [SiswaDashboardController::class, 'page']
    )->name('dashboard.siswa');

    // Data JSON Dashboard Siswa
    Route::get(
        '/dashboard-siswa/data',
        [SiswaDashboardController::class, 'index']
    )->name('dashboard.siswa.data');

    Route::get(
        '/dashboard-siswa/pembayaran',
        [SiswaDashboardController::class, 'pembayaran']
    )->name('dashboard.siswa.pembayaran');

    Route::get(
        '/dashboard-siswa/status-pembayaran',
        [SiswaDashboardController::class, 'statusPembayaran']
    )->name('dashboard.siswa.status');

    Route::get(
    '/dashboard-siswa/riwayat',
    [SiswaDashboardController::class, 'riwayat']
)->name('dashboard.siswa.riwayat');
});
