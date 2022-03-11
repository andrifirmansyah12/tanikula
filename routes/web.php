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

Route::get('admin', function() {
    return view('admin.dashboard.index');
})->middleware('role:admin')->name('admin');

Route::get('gapoktan', function() {
    return view('gapoktan.dashboard.index');
})->middleware('role:gapoktan')->name('gapoktan');

Route::get('poktan', function() {
    return view('poktan.dashboard.index');
})->middleware('role:poktan')->name('poktan');

Route::get('petani', function() {
    return view('petani.dashboard.index');
})->middleware('role:petani')->name('petani');

Route::get('pembeli', function() {
    return view('costumer.dashboard.index');
})->middleware('role:pembeli')->name('pembeli');

Route::get('/', function () {
    return view('pages.landingpage.index');
});

Route::get('/home', function () {
    return view('pages.landingpage.index');
});

Route::get('/market', function () {
    return view('pages.home.index');
})->middleware('role:pembeli')->name('market');

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
