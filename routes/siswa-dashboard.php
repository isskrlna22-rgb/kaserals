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

});
