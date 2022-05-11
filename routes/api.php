<?php

use App\Http\Controllers\Api\Customer\CartApiController;
use App\Http\Controllers\Api\Customer\LoginCustomerApiController;
use App\Http\Controllers\Api\Customer\RegisterCustomerApiController;
use App\Http\Controllers\Api\Customer\WishlistApiController;
use App\Http\Controllers\Api\Gapoktan\ActivityApiController;
use App\Http\Controllers\Api\Gapoktan\ActivityCategoryApiController;
use App\Http\Controllers\Api\Gapoktan\EducationApiController;
use App\Http\Controllers\Api\Gapoktan\EducationCategoryApiController;
use App\Http\Controllers\Api\Gapoktan\LoginGapoktanApiController;
use App\Http\Controllers\Api\Petani\LoginPetaniApiController;
use App\Http\Controllers\Api\Petani\PlantApiController;
use App\Http\Controllers\Api\Poktan\LoginPoktanApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\ProductCategoryApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->group(function () {
    // Route::get('get-user', [PassportAuthController::class, 'userInfo']);
    // Route::resource('products', [ProductController::class]);

    // ------ Customer -----------
    // Cart
    Route::resource('cart', CartApiController::class);
    Route::get('cart/user_id/{user_id}', [CartApiController::class, 'indexByid']);

    // ------ Gapoktan -----------
    // Activity
    Route::resource('activity', ActivityApiController::class);
    Route::get('activity/search/{name}', [ActivityApiController::class, 'search']);
    Route::resource('activity-category', ActivityCategoryApiController::class);

    //Petani
    Route::resource('plant', PlantApiController::class);
 
});

// All
Route::resource('product', ProductApiController::class);
Route::get('product/search/{name}', [ProductApiController::class, 'search']);
Route::resource('product-category', ProductCategoryApiController::class);

// ------ Customer -----------
Route::post('register-customer', [RegisterCustomerApiController::class, 'register']);
Route::post('login-customer', [LoginCustomerApiController::class, 'login']);
// // Cart
// Route::resource('cart', CartApiController::class);
// Route::get('cart/user_id/{user_id}', [CartApiController::class, 'indexByid']);
// Wishlist
Route::resource('wishlist', WishlistApiController::class);
Route::get('wishlist/user_id/{user_id}', [WishlistApiController::class, 'indexByid']);

// ------ Gapoktan -----------
Route::post('login-gapoktan', [LoginGapoktanApiController::class, 'login']);
// Education
Route::resource('education', EducationApiController::class);
Route::resource('education-category', EducationCategoryApiController::class);


// ------ Gapoktan -----------
Route::post('login-poktan', [LoginPoktanApiController::class, 'login']);


// ------ Petani -----------
Route::post('login-petani', [LoginPetaniApiController::class, 'login']);