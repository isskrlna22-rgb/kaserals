<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengeluaranController;

Route::middleware(['auth', 'role:ADMIN,BENDAHARA'])->group(function () {

    Route::get('/data-pengeluaran', [PengeluaranController::class, 'page'])
        ->name('pengeluaran.web.index');

    Route::post('/data-pengeluaran', [PengeluaranController::class, 'storePage'])
        ->name('pengeluaran.web.store');

});
