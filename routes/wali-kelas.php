<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WaliKelasController;

Route::middleware(['auth', 'role:WALI_KELAS'])->prefix('wali-kelas')->name('wali-kelas.')->group(function () {

    // Dashboard Wali Kelas
    Route::get('/dashboard', [
        WaliKelasController::class,
        'index'
    ])->name('dashboard');

    // Riwayat Transaksi
    Route::get('/riwayat-transaksi', [
        WaliKelasController::class,
        'riwayatTransaksi'
    ])->name('riwayat-transaksi');

    // Laporan Keuangan
    Route::get('/laporan-keuangan', [
        WaliKelasController::class,
        'laporanKeuangan'
    ])->name('laporan-keuangan');

});
