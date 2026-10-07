<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasukController; //dipanggil controller SuratMasukControllers

Route::get('/', function () {
    return view('welcome');
   //return redirect('https://www.youtube.com/');
});

// route dasar
/*Route::get('/surat-masuk', function () {
    return 'Halaman surat masuk';
});

// route dengan parameter
Route::get('/surat-masuk/{id}', function ($id) {
    return 'Halaman surat masuk ' . $id;
});

//nama router jika ingin menambahkan nama pada route
Route::get('/surat-masuk/{id}', function ($id) {
    return 'Halaman surat masuk ' . $id;
})->name('surat-masuk.show');*/

Route::get('/surat-masuk', [SuratMasukController::class, 'index'])->name('surat-masuk.index');
Route::get('/surat-masuk/{id}', [SuratMasukController::class, 'show'])->name('surat-masuk.show');