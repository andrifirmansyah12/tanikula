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

    Route::get('gapoktan/daftar-poktan', [App\Http\Controllers\Gapoktan\PoktanController::class, 'index'])->name('gapoktan-poktan');
    Route::post('gapoktan/daftar-poktan/store', [App\Http\Controllers\Gapoktan\PoktanController::class, 'store'])->name('gapoktan-poktan-store');
    Route::get('gapoktan/daftar-poktan/fetchall', [App\Http\Controllers\Gapoktan\PoktanController::class, 'fetchAll'])->name('gapoktan-poktan-fetchAll');
    Route::delete('gapoktan/daftar-poktan/delete', [App\Http\Controllers\Gapoktan\PoktanController::class, 'delete'])->name('gapoktan-poktan-delete');
    Route::get('gapoktan/daftar-poktan/edit', [App\Http\Controllers\Gapoktan\PoktanController::class, 'edit'])->name('gapoktan-poktan-edit');
    Route::post('gapoktan/daftar-poktan/update', [App\Http\Controllers\Gapoktan\PoktanController::class, 'update'])->name('gapoktan-poktan-update');

    Route::get('gapoktan/tandur', [App\Http\Controllers\Gapoktan\PlantController::class, 'index'])->name('gapoktan-tandur');
    Route::post('gapoktan/tandur/store', [App\Http\Controllers\Gapoktan\PlantController::class, 'store'])->name('gapoktan-tandur-store');
    Route::get('gapoktan/tandur/fetchall', [App\Http\Controllers\Gapoktan\PlantController::class, 'fetchAll'])->name('gapoktan-tandur-fetchAll');
    Route::delete('gapoktan/tandur/delete', [App\Http\Controllers\Gapoktan\PlantController::class, 'delete'])->name('gapoktan-tandur-delete');
    Route::get('gapoktan/tandur/edit', [App\Http\Controllers\Gapoktan\PlantController::class, 'edit'])->name('gapoktan-tandur-edit');
    Route::post('gapoktan/tandur/update', [App\Http\Controllers\Gapoktan\PlantController::class, 'update'])->name('gapoktan-tandur-update');

    Route::get('gapoktan/panen', [App\Http\Controllers\Gapoktan\HarvestController::class, 'index'])->name('gapoktan-panen');
    Route::post('gapoktan/panen/store', [App\Http\Controllers\Gapoktan\HarvestController::class, 'store'])->name('gapoktan-panen-store');
    Route::get('gapoktan/panen/fetchall', [App\Http\Controllers\Gapoktan\HarvestController::class, 'fetchAll'])->name('gapoktan-panen-fetchAll');
    Route::get('gapoktan/panen/edit', [App\Http\Controllers\Gapoktan\HarvestController::class, 'edit'])->name('gapoktan-panen-edit');

    // Route::resource('gapoktan/kegiatan', App\Http\Controllers\Gapoktan\ActivityController::class)->except(['show','update']);

    Route::get('gapoktan/pengaturan', [App\Http\Controllers\Gapoktan\PengaturanController::class, 'pengaturan'])->name('gapoktan-pengaturan');
    Route::post('gapoktan/pengaturan-image', [App\Http\Controllers\Gapoktan\PengaturanController::class, 'pengaturanImage'])->name('gapoktan.pengaturan.image');
    Route::post('gapoktan/pengaturan-update', [App\Http\Controllers\Gapoktan\PengaturanController::class, 'pengaturanUpdate'])->name('gapoktan.pengaturan.update');
    Route::post('gapoktan/pengaturan-updatePassword', [App\Http\Controllers\Gapoktan\PengaturanController::class, 'pengaturanUpdatePassword'])->name('gapoktan.pengaturan.updatePassword');

    // Route::get('gapoktan/pengaturan', function() {
    //     return view('gapoktan.pengaturan.index');
    // })->name('gapoktan.alamat');

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

    Route::get('poktan/kegiatan', [App\Http\Controllers\Poktan\ActivityController::class, 'index'])->name('poktan-kegiatan');
    Route::post('poktan/kegiatan/store', [App\Http\Controllers\Poktan\ActivityController::class, 'store'])->name('poktan-kegiatan-store');
    Route::get('poktan/kegiatan/fetchall', [App\Http\Controllers\Poktan\ActivityController::class, 'fetchAll'])->name('poktan-kegiatan-fetchAll');
    Route::delete('poktan/kegiatan/delete', [App\Http\Controllers\Poktan\ActivityController::class, 'delete'])->name('poktan-kegiatan-delete');
    Route::get('poktan/kegiatan/edit', [App\Http\Controllers\Poktan\ActivityController::class, 'edit'])->name('poktan-kegiatan-edit');
    Route::post('poktan/kegiatan/update', [App\Http\Controllers\Poktan\ActivityController::class, 'update'])->name('poktan-kegiatan-update');
    Route::get('poktan/kegiatan/checkSlug', [App\Http\Controllers\Poktan\ActivityController::class, 'checkSlug'])->name('poktan-kegiatan-checkSlug');

    Route::get('poktan/daftar-petani', [App\Http\Controllers\Poktan\FarmerController::class, 'index'])->name('poktan-petani');
    Route::post('poktan/daftar-petani/store', [App\Http\Controllers\Poktan\FarmerController::class, 'store'])->name('poktan-petani-store');
    Route::get('poktan/daftar-petani/fetchall', [App\Http\Controllers\Poktan\FarmerController::class, 'fetchAll'])->name('poktan-petani-fetchAll');
    Route::delete('poktan/daftar-petani/delete', [App\Http\Controllers\Poktan\FarmerController::class, 'delete'])->name('poktan-petani-delete');
    Route::get('poktan/daftar-petani/edit', [App\Http\Controllers\Poktan\FarmerController::class, 'edit'])->name('poktan-petani-edit');
    Route::post('poktan/daftar-petani/update', [App\Http\Controllers\Poktan\FarmerController::class, 'update'])->name('poktan-petani-update');

    Route::get('poktan/tandur', [App\Http\Controllers\Poktan\PlantController::class, 'index'])->name('poktan-tandur');
    Route::post('poktan/tandur/store', [App\Http\Controllers\Poktan\PlantController::class, 'store'])->name('poktan-tandur-store');
    Route::get('poktan/tandur/fetchall', [App\Http\Controllers\Poktan\PlantController::class, 'fetchAll'])->name('poktan-tandur-fetchAll');
    Route::delete('poktan/tandur/delete', [App\Http\Controllers\Poktan\PlantController::class, 'delete'])->name('poktan-tandur-delete');
    Route::get('poktan/tandur/edit', [App\Http\Controllers\Poktan\PlantController::class, 'edit'])->name('poktan-tandur-edit');
    Route::post('poktan/tandur/update', [App\Http\Controllers\Poktan\PlantController::class, 'update'])->name('poktan-tandur-update');

    Route::get('poktan/panen', [App\Http\Controllers\Poktan\HarvestController::class, 'index'])->name('poktan-panen');
    Route::post('poktan/panen/store', [App\Http\Controllers\Poktan\HarvestController::class, 'store'])->name('poktan-panen-store');
    Route::get('poktan/panen/fetchall', [App\Http\Controllers\Poktan\HarvestController::class, 'fetchAll'])->name('poktan-panen-fetchAll');
    Route::get('poktan/panen/edit', [App\Http\Controllers\Poktan\HarvestController::class, 'edit'])->name('poktan-panen-edit');

    Route::get('poktan/pengaturan', [App\Http\Controllers\Poktan\PengaturanController::class, 'pengaturan'])->name('poktan-pengaturan');
    Route::post('poktan/pengaturan-image', [App\Http\Controllers\Poktan\PengaturanController::class, 'pengaturanImage'])->name('poktan.pengaturan.image');
    Route::post('poktan/pengaturan-update', [App\Http\Controllers\Poktan\PengaturanController::class, 'pengaturanUpdate'])->name('poktan.pengaturan.update');
    Route::post('poktan/pengaturan-updatePassword', [App\Http\Controllers\Poktan\PengaturanController::class, 'pengaturanUpdatePassword'])->name('poktan.pengaturan.updatePassword');

});

// Petani
Route::group(['middleware' => ['LoginCheck', 'auth', 'role:petani']], function() {

    Route::get('petani', function() {
        return view('petani.dashboard.index');
    })->name('petani');

    Route::get('petani/tandur', [App\Http\Controllers\Petani\PlantController::class, 'index'])->name('petani-tandur');
    Route::post('petani/tandur/store', [App\Http\Controllers\Petani\PlantController::class, 'store'])->name('petani-tandur-store');
    Route::get('petani/tandur/fetchall', [App\Http\Controllers\Petani\PlantController::class, 'fetchAll'])->name('petani-tandur-fetchAll');
    Route::delete('petani/tandur/delete', [App\Http\Controllers\Petani\PlantController::class, 'delete'])->name('petani-tandur-delete');
    Route::get('petani/tandur/edit', [App\Http\Controllers\Petani\PlantController::class, 'edit'])->name('petani-tandur-edit');
    Route::post('petani/tandur/update', [App\Http\Controllers\Petani\PlantController::class, 'update'])->name('petani-tandur-update');

    Route::get('petani/kegiatan', [App\Http\Controllers\Petani\ActivityController::class, 'index'])->name('petani-kegiatan');
    Route::post('petani/kegiatan/store', [App\Http\Controllers\Petani\ActivityController::class, 'store'])->name('petani-kegiatan-store');
    Route::get('petani/kegiatan/fetchall', [App\Http\Controllers\Petani\ActivityController::class, 'fetchAll'])->name('petani-kegiatan-fetchAll');
    Route::delete('petani/kegiatan/delete', [App\Http\Controllers\Petani\ActivityController::class, 'delete'])->name('petani-kegiatan-delete');
    Route::get('petani/kegiatan/edit', [App\Http\Controllers\Petani\ActivityController::class, 'edit'])->name('petani-kegiatan-edit');
    Route::post('petani/kegiatan/update', [App\Http\Controllers\Petani\ActivityController::class, 'update'])->name('petani-kegiatan-update');
    Route::get('petani/kegiatan/checkSlug', [App\Http\Controllers\Petani\ActivityController::class, 'checkSlug'])->name('petani-kegiatan-checkSlug');

    Route::get('petani/panen', [App\Http\Controllers\Petani\HarvestController::class, 'index'])->name('petani-panen');
    Route::post('petani/panen/store', [App\Http\Controllers\Petani\HarvestController::class, 'store'])->name('petani-panen-store');
    Route::get('petani/panen/fetchall', [App\Http\Controllers\Petani\HarvestController::class, 'fetchAll'])->name('petani-panen-fetchAll');
    Route::get('petani/panen/edit', [App\Http\Controllers\Petani\HarvestController::class, 'edit'])->name('petani-panen-edit');

    Route::get('petani/pengaturan', [App\Http\Controllers\Petani\PengaturanController::class, 'pengaturan'])->name('petani-pengaturan');
    Route::post('petani/pengaturan-image', [App\Http\Controllers\Petani\PengaturanController::class, 'pengaturanImage'])->name('petani.pengaturan.image');
    Route::post('petani/pengaturan-update', [App\Http\Controllers\Petani\PengaturanController::class, 'pengaturanUpdate'])->name('petani.pengaturan.update');
    Route::post('petani/pengaturan-updatePassword', [App\Http\Controllers\Petani\PengaturanController::class, 'pengaturanUpdatePassword'])->name('petani.pengaturan.updatePassword');
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

// Login Gapoktan
Route::get('/gapoktan/login', [App\Http\Controllers\Gapoktan\LoginController::class, 'login'])->name('login-gapoktan');
Route::post('/gapoktan/login', [App\Http\Controllers\Gapoktan\LoginController::class, 'loginGapoktan'])->name('login-gapoktan');
Route::get('/gapoktan/register', [App\Http\Controllers\Gapoktan\LoginController::class, 'register'])->name('register-gapoktan');
Route::post('/gapoktan/register', [App\Http\Controllers\Gapoktan\LoginController::class, 'registerGapoktan'])->name('registerGapoktan-gapoktan');
Route::post('/gapoktan/logout', [App\Http\Controllers\Gapoktan\LoginController::class, 'logout'])->name('logout-gapoktan');

// Login Poktan
Route::get('/poktan/login', [App\Http\Controllers\Poktan\LoginController::class, 'login'])->name('login-poktan');
Route::post('/poktan/login', [App\Http\Controllers\Poktan\LoginController::class, 'loginPoktan'])->name('login-poktan');
Route::get('/poktan/register', [App\Http\Controllers\Poktan\LoginController::class, 'register'])->name('register-poktan');
Route::post('/poktan/register', [App\Http\Controllers\Poktan\LoginController::class, 'registerPoktan'])->name('registerPoktan-poktan');
Route::post('/poktan/logout', [App\Http\Controllers\Poktan\LoginController::class, 'logout'])->name('logout-poktan');

// Login Petani
Route::get('/petani/login', [App\Http\Controllers\Petani\LoginController::class, 'login'])->name('login-petani');
Route::post('/petani/login', [App\Http\Controllers\Petani\LoginController::class, 'loginPetani'])->name('login-petani');
Route::get('/petani/register', [App\Http\Controllers\Petani\LoginController::class, 'register'])->name('register-petani');
Route::post('/petani/register', [App\Http\Controllers\Petani\LoginController::class, 'registerPetani'])->name('registerPetani-petani');
Route::post('/petani/logout', [App\Http\Controllers\Petani\LoginController::class, 'logout'])->name('logout-petani');

// Edukasi Page
Route::get('/edukasi', [App\Http\Controllers\Pages\EducationController::class, 'index']);
Route::get('/edukasi/{education:slug}', [App\Http\Controllers\Pages\EducationController::class, 'show']);

Route::get('/', [App\Http\Controllers\Pages\ProductController::class, 'index']);
Route::get('/home', [App\Http\Controllers\Pages\ProductController::class, 'index'])->name('home');
Route::get('/home/{product_slug}', [App\Http\Controllers\Pages\ProductController::class, 'detailProduct']);
Route::get('/product-category/{slug}', [App\Http\Controllers\Pages\ProductController::class, 'viewCategory'])->name('view.category');
Route::get('/product-category/{category_slug}/{product_slug}', [App\Http\Controllers\Pages\ProductController::class, 'productView'])->name('view.product');
Route::post('/add-to-cart', [App\Http\Controllers\Pembeli\CartController::class, 'addProduct']);
Route::get('/cart', [App\Http\Controllers\Pembeli\CartController::class, 'viewCart']);
Route::post('/delete-cart-item', [App\Http\Controllers\Pembeli\CartController::class, 'deleteCartItem']);
Route::post('/update-cart-item', [App\Http\Controllers\Pembeli\CartController::class, 'updateCartItem']);

// Route::get('/thank-you-purchasing', function () {
//     return view('pages.checkout.purchasing');
// });

// Route::get('/keranjang', function () {
//     return view('pages.bag.index');
// });

// Route::get('/payment', function () {
//     return view('pages.checkout.payment');
// });

// Route::get('/kategori-edukasi', function () {
//     return view('pages.edukasi.index');
// });

// Route::get('/semua-kategori', function () {
//     return view('pages.edukasi.allcategory');
// });

// Route::get('/galeri', function () {
//     return view('pages.edukasi.gallery');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
