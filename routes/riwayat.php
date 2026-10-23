<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RiwayatController;

Route::middleware([
    'auth',
    'role:ADMIN,BENDAHARA,WALI_KELAS'
])->group(function () {

    Route::get('/riwayat-transaksi', [RiwayatController::class, 'index'])
        ->name('riwayat.index');
});
