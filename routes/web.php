<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataPengunjungController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerhitunganController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/prediksi', 'prediksi');
    Route::get('/fasilitas', 'fasilitas');
    Route::get('/about-us', 'about');
    Route::get('/visi-misi', 'vm');
});


Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('data-pengunjung', DataPengunjungController::class);
    Route::resource('data-fasilitas', FasilitasController::class);
    Route::get('perhitungan', [PerhitunganController::class, 'index']);
    Route::get('hitung', [PerhitunganController::class, 'perhitungan']);
    Route::get('hasil', [PerhitunganController::class, 'hasil']);
});
