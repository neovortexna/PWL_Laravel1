<?php

use App\Http\Controllers\SuratKeluarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasukController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('surat-masuk', SuratMasukController::class)
    ->parameters(['surat-masuk' => 'id']);

Route::get('/surat-masuk/{id}', [SuratMasukController::class, 'show'])
    ->name('surat-masuk.show');

Route::resource('surat-keluar', SuratKeluarController::class)
    ->parameters(['surat-keluar' => 'id']);