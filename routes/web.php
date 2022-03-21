<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuTamuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/bukutamu/master', [BukuTamuController::class, 'showBukuTamu'])->name('show.bukutamu');
    Route::get('/bukutamu/master/{id}', [BukuTamuController::class, 'showUpdateBukuTamu'])->name('show.update.bukutamu');
    Route::post('/bukutamu/master/{id}', [BukuTamuController::class, 'updateBukuTamu'])->name('update.bukutamu');

    Route::get('/bukutamu/janji', [BukuTamuController::class, 'showJanjiTamu'])->name('show.janjitamu');
    Route::post('/bukutamu/janji', [BukuTamuController::class, 'storeJanjiTamu'])->name('store.janjitamu');
    Route::get('/bukutamu/janji/{id}', [BukuTamuController::class, 'detailJanjiTamu'])->name('detail.janjitamu');
    Route::get('/bukutamu/janji/{id}/{action}', [BukuTamuController::class, 'updateJanjiTamu'])->name('update.janjitamu');
});

    Route::get('/bukutamu', [BukuTamuController::class, 'indexBukuTamu'])->name('index.bukutamu');
    Route::post('/bukutamu', [BukuTamuController::class, 'storeBukuTamu'])->name('store.bukutamu');
    Route::post('/bukutamu/{id}', [BukuTamuController::class, 'storeUpdateBukuTamu'])->name('store.update.bukutamu');
    Route::get('/bukutamu/{id}/{nilai}', [BukuTamuController::class, 'storePenilaianTamu'])->name('store.penilaiantamu');
    Route::get('/bukutamu/{nama}', [BukuTamuController::class, 'fetchBukuTamu'])->name('fetch.bukutamu');

    Route::get('/test', [BukuTamuController::class, 'test'])->name('');

