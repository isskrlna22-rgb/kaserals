<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusPembayaranController;

Route::middleware([
    'auth',
    'role:ADMIN,BENDAHARA,KETUA_KELAS,GURU_PEMBIMBING'
])->group(function () {

    Route::get('/status-pembayaran', [StatusPembayaranController::class, 'page'])
        ->name('status-pembayaran.index');

});
