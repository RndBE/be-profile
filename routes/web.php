<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AdminTagController;
use App\Http\Controllers\UserAboutController;
use App\Http\Controllers\AdminKlienController;
use App\Http\Controllers\UserProdukController;
use App\Http\Controllers\UserProyekController;
use App\Http\Controllers\UserSolusiController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminProjekController;
use App\Http\Controllers\AdminSolusiController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\UserBerandaController;
use App\Http\Controllers\AdminCarouselController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminSubSolusiController;
use App\Http\Controllers\AdminTestimoniController;
use App\Http\Controllers\UserSertifikasiController;
use App\Http\Controllers\AdminSolusiProdukController;
use App\Http\Controllers\AdminFiturSubSolusiController;
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

// Route::get('/', function () {
//     return view('User.beranda.index');
// });

Route::resource('/', UserBerandaController::class);

Route::get('/proyek/{slug}', [UserProyekController::class, 'show'])->name('proyek.show');
Route::resource('/proyek', UserProyekController::class);
Route::get('/solusi/{slug}/{subSlug?}', [UserSolusiController::class, 'show'])->name('solusi.show');
// Route::get('/solusi/{slug}', [UserSolusiController::class, 'show'])->name('solusi.show');
Route::get('/detail-produk/{slug}', [UserProdukController::class, 'show'])->name('detail-produk.show');
Route::resource('/tentang-kami', UserAboutController::class);
Route::resource('/sertifikasi', UserSertifikasiController::class);


// Route::resource('/solusi', UserSolusiController::class);

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
    Route::resource('/solutions', AdminSolusiController::class);
    Route::resource('/sub-solutions', AdminSubSolusiController::class);
    Route::delete('/sub-solutions/{id}/remove-image', [AdminSubSolusiController::class, 'removeImage'])->name('sub-solutions.remove-image');
    Route::resource('/fitur-sub-solutions', AdminFiturSubSolusiController::class);

    Route::resource('/produk', AdminProdukController::class);
    Route::resource('/solusi-produk', AdminSolusiProdukController::class);

    Route::resource('/tentang-kami', TentangKamiController::class);

});

