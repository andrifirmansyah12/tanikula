<?php

// use Illuminate\Support\Facades\Route;

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

// Admin
Route::group(['middleware' => ['auth', 'role:admin']], function() {

    Route::get('admin', function() {
        return view('admin.dashboard.index');
    })->name('admin');

});

// Gapoktan
Route::group(['middleware' => ['LoginCheck', 'auth', 'role:gapoktan']], function() {

    Route::get('gapoktan', function() {
        return view('gapoktan.dashboard.index');
    })->name('gapoktan');

    Route::get('gapoktan/chat', function() {
        return view('gapoktan.chat.index');
    })->name('gapoktan.chat');

    Route::get('gapoktan/edukasi', [App\Http\Controllers\Gapoktan\EducationController::class, 'index'])->name('gapoktan-edukasi');
    Route::post('gapoktan/edukasi/store', [App\Http\Controllers\Gapoktan\EducationController::class, 'store'])->name('gapoktan-edukasi-store');
    Route::get('gapoktan/edukasi/fetchall', [App\Http\Controllers\Gapoktan\EducationController::class, 'fetchAll'])->name('gapoktan-edukasi-fetchAll');
    Route::delete('gapoktan/edukasi/delete', [App\Http\Controllers\Gapoktan\EducationController::class, 'delete'])->name('gapoktan-edukasi-delete');
    Route::get('gapoktan/edukasi/edit', [App\Http\Controllers\Gapoktan\EducationController::class, 'edit'])->name('gapoktan-edukasi-edit');
    Route::post('gapoktan/edukasi/update', [App\Http\Controllers\Gapoktan\EducationController::class, 'update'])->name('gapoktan-edukasi-update');
    Route::get('gapoktan/edukasi/checkSlug', [App\Http\Controllers\Gapoktan\EducationController::class, 'checkSlug'])->name('gapoktan-edukasi-checkSlug');

    Route::get('gapoktan/kategori-edukasi', [App\Http\Controllers\Gapoktan\EducationCategoryController::class, 'index'])->name('gapoktan-kategoriEdukasi');
    Route::post('gapoktan/kategori-edukasi/store', [App\Http\Controllers\Gapoktan\EducationCategoryController::class, 'store'])->name('gapoktan-kategoriEdukasi-store');
    Route::get('gapoktan/kategori-edukasi/fetchall', [App\Http\Controllers\Gapoktan\EducationCategoryController::class, 'fetchAll'])->name('gapoktan-kategoriEdukasi-fetchAll');
    Route::delete('gapoktan/kategori-edukasi/delete', [App\Http\Controllers\Gapoktan\EducationCategoryController::class, 'delete'])->name('gapoktan-kategoriEdukasi-delete');
    Route::get('gapoktan/kategori-edukasi/edit', [App\Http\Controllers\Gapoktan\EducationCategoryController::class, 'edit'])->name('gapoktan-kategoriEdukasi-edit');
    Route::post('gapoktan/kategori-edukasi/update', [App\Http\Controllers\Gapoktan\EducationCategoryController::class, 'update'])->name('gapoktan-kategoriEdukasi-update');
    Route::get('gapoktan/kategori-edukasi/checkSlug', [App\Http\Controllers\Gapoktan\EducationCategoryController::class, 'checkSlug'])->name('gapoktan-kategoriEdukasi-checkSlug');

    Route::get('gapoktan/kegiatan', [App\Http\Controllers\Gapoktan\ActivityController::class, 'index'])->name('gapoktan-kegiatan');
    Route::post('gapoktan/kegiatan/store', [App\Http\Controllers\Gapoktan\ActivityController::class, 'store'])->name('gapoktan-kegiatan-store');
    Route::get('gapoktan/kegiatan/fetchall', [App\Http\Controllers\Gapoktan\ActivityController::class, 'fetchAll'])->name('gapoktan-kegiatan-fetchAll');
    Route::delete('gapoktan/kegiatan/delete', [App\Http\Controllers\Gapoktan\ActivityController::class, 'delete'])->name('gapoktan-kegiatan-delete');
    Route::get('gapoktan/kegiatan/edit', [App\Http\Controllers\Gapoktan\ActivityController::class, 'edit'])->name('gapoktan-kegiatan-edit');
    Route::post('gapoktan/kegiatan/update', [App\Http\Controllers\Gapoktan\ActivityController::class, 'update'])->name('gapoktan-kegiatan-update');
    Route::get('gapoktan/kegiatan/checkSlug', [App\Http\Controllers\Gapoktan\ActivityController::class, 'checkSlug'])->name('gapoktan-kegiatan-checkSlug');

    Route::get('gapoktan/kategori-kegiatan', [App\Http\Controllers\Gapoktan\ActivityCategoryController::class, 'index'])->name('gapoktan-kategoriKegiatan');
    Route::post('gapoktan/kategori-kegiatan/store', [App\Http\Controllers\Gapoktan\ActivityCategoryController::class, 'store'])->name('gapoktan-kategoriKegiatan-store');
    Route::get('gapoktan/kategori-kegiatan/fetchall', [App\Http\Controllers\Gapoktan\ActivityCategoryController::class, 'fetchAll'])->name('gapoktan-kategoriKegiatan-fetchAll');
    Route::delete('gapoktan/kategori-kegiatan/delete', [App\Http\Controllers\Gapoktan\ActivityCategoryController::class, 'delete'])->name('gapoktan-kategoriKegiatan-delete');
    Route::get('gapoktan/kategori-kegiatan/edit', [App\Http\Controllers\Gapoktan\ActivityCategoryController::class, 'edit'])->name('gapoktan-kategoriKegiatan-edit');
    Route::post('gapoktan/kategori-kegiatan/update', [App\Http\Controllers\Gapoktan\ActivityCategoryController::class, 'update'])->name('gapoktan-kategoriKegiatan-update');
    Route::get('gapoktan/kategori-kegiatan/checkSlug', [App\Http\Controllers\Gapoktan\ActivityCategoryController::class, 'checkSlug'])->name('gapoktan-kategoriKegiatan-checkSlug');

    Route::get('gapoktan/kategori-produk', [App\Http\Controllers\Gapoktan\ProductCategoryController::class, 'index'])->name('gapoktan-kategoriProduk');
    Route::post('gapoktan/kategori-produk/store', [App\Http\Controllers\Gapoktan\ProductCategoryController::class, 'store'])->name('gapoktan-kategoriProduk-store');
    Route::get('gapoktan/kategori-produk/fetchall', [App\Http\Controllers\Gapoktan\ProductCategoryController::class, 'fetchAll'])->name('gapoktan-kategoriProduk-fetchAll');
    Route::delete('gapoktan/kategori-produk/delete', [App\Http\Controllers\Gapoktan\ProductCategoryController::class, 'delete'])->name('gapoktan-kategoriProduk-delete');
    Route::get('gapoktan/kategori-produk/edit', [App\Http\Controllers\Gapoktan\ProductCategoryController::class, 'edit'])->name('gapoktan-kategoriProduk-edit');
    Route::post('gapoktan/kategori-produk/update', [App\Http\Controllers\Gapoktan\ProductCategoryController::class, 'update'])->name('gapoktan-kategoriProduk-update');
    Route::get('gapoktan/kategori-produk/checkSlug', [App\Http\Controllers\Gapoktan\ProductCategoryController::class, 'checkSlug'])->name('gapoktan-kategoriProduk-checkSlug');

    Route::get('gapoktan/produk', [App\Http\Controllers\Gapoktan\ProductController::class, 'index'])->name('gapoktan-produk');
    Route::post('gapoktan/produk/store', [App\Http\Controllers\Gapoktan\ProductController::class, 'store'])->name('gapoktan-produk-store');
    Route::get('gapoktan/produk/fetchall', [App\Http\Controllers\Gapoktan\ProductController::class, 'fetchAll'])->name('gapoktan-produk-fetchAll');
    Route::delete('gapoktan/produk/delete', [App\Http\Controllers\Gapoktan\ProductController::class, 'delete'])->name('gapoktan-produk-delete');
    Route::get('gapoktan/produk/edit', [App\Http\Controllers\Gapoktan\ProductController::class, 'edit'])->name('gapoktan-produk-edit');
    Route::post('gapoktan/produk/update', [App\Http\Controllers\Gapoktan\ProductController::class, 'update'])->name('gapoktan-produk-update');
    Route::get('gapoktan/produk/checkSlug', [App\Http\Controllers\Gapoktan\ProductController::class, 'checkSlug'])->name('gapoktan-produk-checkSlug');

    Route::resource('gapoktan/kegiatan', App\Http\Controllers\Gapoktan\ActivityController::class)->except(['show','update']);

    Route::get('gapoktan/pengaturan', function() {
        return view('gapoktan.pengaturan.index');
    })->name('gapoktan.alamat');

    Route::get('gapoktan/daftar-poktan', function() {
        return view('gapoktan.poktan.index');
    })->name('gapoktan.poktan');

    Route::get('gapoktan/daftar-petani', function() {
        return view('gapoktan.petani.index');
    })->name('gapoktan.petani');
});

// Poktan
Route::group(['middleware' => ['LoginCheck', 'auth', 'role:poktan']], function() {

    Route::get('poktan', function() {
        return view('poktan.dashboard.index');
    })->name('poktan');

    // Edukasi
    Route::get('poktan/edukasi', [App\Http\Controllers\Poktan\EducationController::class, 'index'])->name('poktan-edukasi');
    Route::post('poktan/edukasi/store', [App\Http\Controllers\Poktan\EducationController::class, 'store'])->name('poktan-edukasi-store');
    Route::get('poktan/edukasi/fetchall', [App\Http\Controllers\Poktan\EducationController::class, 'fetchAll'])->name('poktan-edukasi-fetchAll');
    Route::delete('poktan/edukasi/delete', [App\Http\Controllers\Poktan\EducationController::class, 'delete'])->name('poktan-edukasi-delete');
    Route::get('poktan/edukasi/edit', [App\Http\Controllers\Poktan\EducationController::class, 'edit'])->name('poktan-edukasi-edit');
    Route::post('poktan/edukasi/update', [App\Http\Controllers\Poktan\EducationController::class, 'update'])->name('poktan-edukasi-update');
    Route::get('poktan/edukasi/checkSlug', [App\Http\Controllers\Poktan\EducationController::class, 'checkSlug'])->name('poktan-edukasi-checkSlug');


});

// Petani
Route::group(['middleware' => ['LoginCheck', 'auth', 'role:petani']], function() {

    Route::get('petani', function() {
        return view('petani.dashboard.index');
    })->name('petani');

});

// Pembeli
Route::group(['middleware' => ['LoginCheck', 'auth', 'role:pembeli']], function() {

    Route::get('pembeli', [App\Http\Controllers\Pembeli\PengaturanController::class, 'pengaturan'])->name('pembeli');
    Route::post('pembeli-image', [App\Http\Controllers\Pembeli\PengaturanController::class, 'pengaturanImage'])->name('pembeli.pengaturan.image');
    Route::post('pembeli-update', [App\Http\Controllers\Pembeli\PengaturanController::class, 'pengaturanUpdate'])->name('pembeli.pengaturan.update');

    // Route::get('pembeli', function() {
    //     return view('costumer.pengaturan.index');
    // })->name('pembeli');

    Route::get('pembeli/chat', function() {
        return view('costumer.chat.index');
    })->name('pembeli.chat');

    Route::get('pembeli/alamat', function() {
        return view('costumer.alamat.index');
    })->name('pembeli.alamat');

});

// Login Pembeli
Route::get('/login', [App\Http\Controllers\Pembeli\LoginController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Pembeli\LoginController::class, 'loginPembeli'])->name('loginPembeli-pembeli');
Route::get('/register', [App\Http\Controllers\Pembeli\LoginController::class, 'register'])->name('register-pembeli');
Route::post('/register', [App\Http\Controllers\Pembeli\LoginController::class, 'registerPembeli'])->name('registerPembeli-pembeli');
Route::get('/forgot-password', [App\Http\Controllers\Pembeli\LoginController::class, 'forgotPassword'])->name('forgotPassword-pembeli');
Route::post('/forgot-password', [App\Http\Controllers\Pembeli\LoginController::class, 'forgotPasswordEmail'])->name('forgotPasswordEmail-pembeli');
Route::get('/reset-password/{email}/{token}', [App\Http\Controllers\Pembeli\LoginController::class, 'reset'])->name('resetPassword-pembeli');
Route::post('/reset-password', [App\Http\Controllers\Pembeli\LoginController::class, 'resetPassword'])->name('resetPassword');
Route::post('/logout', [App\Http\Controllers\Pembeli\LoginController::class, 'logout'])->name('logout');
Route::get('/account/verify/{token}', [App\Http\Controllers\Pembeli\LoginController::class, 'verifyAccount'])->name('user.verify');

// Login Gapoktan Poktan dan Petani
Route::get('/srimakmur/login', [App\Http\Controllers\Gapoktan\LoginController::class, 'login'])->name('login-srimakmur');
Route::post('/srimakmur/login', [App\Http\Controllers\Gapoktan\LoginController::class, 'loginSrimakmur'])->name('login-srimakmur');
Route::get('/srimakmur/register', [App\Http\Controllers\Gapoktan\LoginController::class, 'register'])->name('register-srimakmur');
Route::post('/srimakmur/register', [App\Http\Controllers\Gapoktan\LoginController::class, 'registerSrimakmur'])->name('registerSrimakmur-srimakmur');
Route::post('/srimakmur/logout', [App\Http\Controllers\Gapoktan\LoginController::class, 'logout'])->name('logout-srimakmur');

// Edukasi Page
Route::get('/edukasi', [App\Http\Controllers\Pages\EducationController::class, 'index']);
Route::get('/edukasi/{education:slug}', [App\Http\Controllers\Pages\EducationController::class, 'show']);

Route::get('/', function () {
    return view('pages.home.index');
})->name('home');

Route::get('/home', function () {
    return view('pages.home.index');
})->name('home');

Route::get('/detail', function () {
    return view('pages.home.detail');
});

Route::get('/thank-you-purchasing', function () {
    return view('pages.checkout.purchasing');
});

Route::get('/keranjang', function () {
    return view('pages.bag.index');
});

Route::get('/payment', function () {
    return view('pages.checkout.payment');
});

Route::get('/kategori-edukasi', function () {
    return view('pages.edukasi.index');
});

Route::get('/semua-kategori', function () {
    return view('pages.edukasi.allcategory');
});

Route::get('/galeri', function () {
    return view('pages.edukasi.gallery');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
