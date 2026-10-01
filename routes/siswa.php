<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

Route::middleware(['auth', 'role:ADMIN,BENDAHARA'])->group(function () {

    Route::get('/data-siswa', [SiswaController::class, 'page'])
        ->name('data-siswa.index');

    Route::get('/data-siswa/create', [SiswaController::class, 'createPage'])
        ->name('data-siswa.create');

    Route::post('/data-siswa', [SiswaController::class, 'storePage'])
        ->name('data-siswa.store');

    Route::get('/data-siswa/{siswa}/edit', [SiswaController::class, 'editPage'])
        ->name('data-siswa.edit');

    Route::put('/data-siswa/{siswa}', [SiswaController::class, 'updatePage'])
        ->name('data-siswa.update');

    Route::delete('/data-siswa/{siswa}', [SiswaController::class, 'destroyPage'])
        ->name('data-siswa.destroy');
});
