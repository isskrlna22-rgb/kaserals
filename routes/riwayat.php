<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RiwayatController;

Route::middleware([
    'auth',
    'role:ADMIN,BENDAHARA,KETUA_KELAS,GURU_PEMBIMBING'
])->group(function () {

    Route::get('/riwayat-transaksi', [RiwayatController::class, 'index'])
        ->name('riwayat.index');

});
