<?php

use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => ['auth', 'role:gapoktan']], function() {

    Route::get('gapoktan', function() {
        return view('gapoktan.dashboard.index');
    })->name('gapoktan');

    Route::get('gapoktan/chat', function() {
        return view('gapoktan.chat.index');
    })->name('gapoktan.chat');

    Route::get('gapoktan/produk', function() {
        return view('gapoktan.produk.index');
    })->name('gapoktan.produk');

    Route::resource('gapoktan/kategori-produk', App\Http\Controllers\Gapoktan\CategoryController::class)->except(['show','update']);
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
Route::group(['middleware' => ['auth', 'role:poktan']], function() {

    Route::get('poktan', function() {
        return view('poktan.dashboard.index');
    })->name('poktan');

});

// Petani
Route::group(['middleware' => ['auth', 'role:petani']], function() {

    Route::get('petani', function() {
        return view('petani.dashboard.index');
    })->name('petani');

});

// Pembeli
Route::group(['middleware' => ['auth', 'role:pembeli']], function() {

    Route::get('pembeli', function() {
        return view('costumer.pengaturan.index');
    })->name('pembeli');

    Route::get('pembeli/chat', function() {
        return view('costumer.chat.index');
    })->name('pembeli.chat');

    Route::get('pembeli/alamat', function() {
        return view('costumer.alamat.index');
    })->name('pembeli.alamat');

});



// Route::get('/', function () {
//     return view('pages.landingpage.index');
// });

// Route::get('/home', function () {
//     return view('pages.landingpage.index');
// });

Route::get('/', function () {
    return view('pages.home.index');
})->name('market');

Route::get('/home', function () {
    return view('pages.home.index');
})->name('market');

Route::get('/detail', function () {
    return view('pages.home.detail');
});

Route::get('/thank-you-purchasing', function () {
    return view('pages.checkout.purchasing');
});

Route::get('/checkout', function () {
    return view('pages.checkout.index');
});

Route::get('/payment', function () {
    return view('pages.checkout.payment');
});

Route::get('/kategori-edukasi', function () {
    return view('pages.edukasi.index');
});

// Route::get('/edukasi', function () {
//     return view('pages.edukasi.edukasi');
// });

Route::get('/kegiatan', function () {
    return view('pages.edukasi.kegiatan');
});

Route::get('/semua-kategori', function () {
    return view('pages.edukasi.allcategory');
});

Route::get('/galeri', function () {
    return view('pages.edukasi.gallery');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
