<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengeluaranController;

Route::middleware(['auth', 'role:ADMIN,BENDAHARA'])->group(function () {

    // Tampilkan halaman pengeluaran
    Route::get('/data-pengeluaran', [PengeluaranController::class, 'page'])
        ->name('pengeluaran.web.index');

    // Tambah pengeluaran
    Route::post('/data-pengeluaran', [PengeluaranController::class, 'storePage'])
        ->name('pengeluaran.web.store');

    // Ubah pengeluaran
    Route::put('/data-pengeluaran/{pengeluaran}', [PengeluaranController::class, 'updatePage'])
        ->name('pengeluaran.web.update');

    // Hapus pengeluaran
    Route::delete('/data-pengeluaran/{pengeluaran}', [PengeluaranController::class, 'destroyPage'])
        ->name('pengeluaran.web.destroy');

});
