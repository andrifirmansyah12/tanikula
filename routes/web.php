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

Route::get('/pembeli', function () {
    return view('costumer.dashboard.index');
});

Route::get('/gapoktan', function () {
    return view('gapoktan.dashboard.index');
});

Route::get('/petani', function () {
    return view('petani.dashboard.index');
});

Route::get('/poktan', function () {
    return view('poktan.dashboard.index');
});

Route::get('/admin', function () {
    return view('admin.dashboard.index');
});

Route::get('/', function () {
    return view('pages.landingpage.index');
});

Route::get('/login', function () {
    return view('pages.login.index');
});

Route::get('/beranda', function () {
    return view('pages.home.index');
});

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

Route::get('/edukasi', function () {
    return view('pages.edukasi.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
