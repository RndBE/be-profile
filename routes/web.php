<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminCarouselController;
use App\Http\Controllers\AdminDashboardController;

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
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('/admin')->middleware('auth')->group(function () {

    // Route::get('/logout', [AdminAuthController::class, 'logout']);

    Route::resource('/dashboard', AdminDashboardController::class);
    Route::resource('/carousel', AdminCarouselController::class);
    // Route::get('/abaout', [AdminAboutController::class, 'index']);
    // Route::put('/abaout/update', [AdminAboutController::class, 'update']);

    // Route::resource('/produk', AdminProdukController::class);

    // Route::resource('/posts/blog', AdminBlogController::class);
    // Route::resource('/posts/kategori', AdminKategoriController::class);

    // Route::resource('/pesan', AdminPesanController::class);

    // Route::resource('/service', AdminServiceController::class);
    // Route::resource('/banner', AdminBannerController::class);
    // Route::resource('/user', AdminUserController::class);
});

