<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminTagController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\WhatsappController;
use App\Http\Controllers\UserAboutController;
use App\Http\Controllers\AdminKlienController;
use App\Http\Controllers\UserProdukController;
use App\Http\Controllers\UserProyekController;
use App\Http\Controllers\UserSolusiController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminProjekController;
use App\Http\Controllers\AdminSolusiController;
use App\Http\Controllers\SertifikasiController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\UserBerandaController;
use App\Http\Controllers\AdminCarouselController;
use App\Http\Controllers\AdminKomponenController;
use App\Http\Controllers\UserPublikasiController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminPublikasiController;
use App\Http\Controllers\AdminSubSolusiController;
use App\Http\Controllers\AdminTestimoniController;
use App\Http\Controllers\AdminKeunggulanController;
use App\Http\Controllers\SertifikasiAtasController;
use App\Http\Controllers\UserSertifikasiController;
use App\Http\Controllers\AdminSpesifikasiController;
use App\Http\Controllers\Auth\CustomLoginController;
use App\Http\Controllers\AdminSolusiProdukController;
use App\Http\Controllers\AdminKategoriTopikController;
use App\Http\Controllers\AdminSeriPerangkatController;
use App\Http\Controllers\AdminFiturSubSolusiController;
use App\Http\Controllers\AdminKategoriProjekController;
use App\Http\Controllers\UserBandingkanPerangkatController;
use App\Http\Controllers\AdminKategoriSpesifikasiController;
use App\Http\Controllers\AdminSeriPerangkatSpesifikasiController;

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
Route::get('/detail-produk/{slug}', [UserProdukController::class, 'show'])->name('detail-produk.show');
Route::resource('/tentang-kami', UserAboutController::class);
Route::resource('/sertifikasi', UserSertifikasiController::class);
Route::resource('/bandingkan-perangkat', UserBandingkanPerangkatController::class);
Route::resource('/publikasi', UserPublikasiController::class);
Route::get('/publikasi/{slug}', [UserPublikasiController::class, 'show'])->name('publikasi.show');
Route::get('/search/searchall', [UserPublikasiController::class, 'search'])->name('searchall');
Route::post('/send-whatsapp', [WhatsappController::class, 'sendMessage'])->name('send.whatsapp');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
// Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/login', function () {
    return redirect('/');
});

Route::get('/openbeacon', [CustomLoginController::class, 'showLoginForm'])->name('openbeacon');
Route::post('/openbeacon', [CustomLoginController::class, 'login'])->name('login');
Route::post('/logout', [CustomLoginController::class, 'logout'])->name('logout');

Route::prefix('/admin')->middleware('auth')->group(function () {
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
    Route::resource('/komponen', AdminKomponenController::class);
    Route::resource('/keunggulan', AdminKeunggulanController::class);
    Route::resource('/seri-perangkat', AdminSeriPerangkatController::class);
    Route::resource('/kategori-spesifikasi', AdminKategoriSpesifikasiController::class);
    Route::resource('/spesifikasi', AdminSpesifikasiController::class);
    Route::resource('/seri-perangkat-spesifikasi', AdminSeriPerangkatSpesifikasiController::class);

    Route::resource('/tentang-kami', TentangKamiController::class);
    Route::resource('/sertifikasi', SertifikasiController::class);
    Route::resource('/sertifikasi-atas', SertifikasiAtasController::class);

    Route::resource('/artikel', AdminPublikasiController::class);
    Route::post('/ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');

    Route::delete('/artikel/{id}/remove-image', [AdminPublikasiController::class, 'removeImage'])->name('artikel.remove-image');
    Route::resource('/kategori-topik', AdminKategoriTopikController::class);

    Route::resource('/iklan', IklanController::class);

});

Route::fallback(function () {
    return redirect()->back();
});

