<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminTagController;
use App\Http\Controllers\AdminKlienController;
use App\Http\Controllers\AdminProjekController;
use App\Http\Controllers\AdminCarouselController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminTestimoniController;
use App\Http\Controllers\AdminKategoriProjekController;

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
    return view('User.beranda.index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('/admin')->middleware('auth')->group(function () {

    // Route::get('/logout', [AdminAuthController::class, 'logout']);

    Route::resource('/dashboard', AdminDashboardController::class);
    Route::resource('/carousel', AdminCarouselController::class);
    Route::resource('/klien', AdminKlienController::class);
    Route::resource('/tag', AdminTagController::class);
    Route::resource('/kategori_projek', AdminKategoriProjekController::class);
    Route::resource('/projek', AdminProjekController::class);
    Route::delete('/projek/{id}/remove-image', [AdminProjekController::class, 'removeImage'])->name('projek.remove-image');
    Route::resource('/testimoni', AdminTestimoniController::class);

});

