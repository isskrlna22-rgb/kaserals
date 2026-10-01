<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LaporanExportController;

Route::middleware([
    'auth',
    'role:ADMIN,BENDAHARA,KETUA_KELAS,GURU_PEMBIMBING'
])->group(function () {

    // ================= HALAMAN LAPORAN =================

    Route::get(
        '/laporan-keuangan',
        [LaporanController::class, 'page']
    )->name('laporan.index');


    // ================= EXPORT PDF =================

    Route::get(
        '/laporan-keuangan/export/pdf',
        [LaporanExportController::class, 'exportPdf']
    )->name('laporan.export.pdf');


    // ================= EXPORT EXCEL =================

    Route::get(
        '/laporan-keuangan/export/excel',
        [LaporanExportController::class, 'exportExcel']
    )->name('laporan.export.excel');
});
