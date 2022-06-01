<?php

use App\Http\Controllers\Api\Customer\CartApiController;
use App\Http\Controllers\Api\Customer\LoginCustomerApiController;
use App\Http\Controllers\Api\Customer\ProductCustomerApiController;
use App\Http\Controllers\Api\Customer\RegisterCustomerApiController;
use App\Http\Controllers\Api\Customer\WishlistApiController;
use App\Http\Controllers\Api\Gapoktan\ActivityApiController;
use App\Http\Controllers\Api\Gapoktan\ActivityCategoryApiController;
use App\Http\Controllers\Api\Gapoktan\EducationApiController;
use App\Http\Controllers\Api\Gapoktan\EducationCategoryApiController;
use App\Http\Controllers\Api\Gapoktan\GapoktanApiController;
use App\Http\Controllers\Api\Gapoktan\LoginGapoktanApiController;
use App\Http\Controllers\Api\Gapoktan\PoktanApiController;
use App\Http\Controllers\Api\Petani\FarmerApiController;
use App\Http\Controllers\Api\Petani\LoginPetaniApiController;
use App\Http\Controllers\Api\Petani\PlantApiController;
use App\Http\Controllers\Api\PhotoProductApiControlller;
use App\Http\Controllers\Api\Poktan\LoginPoktanApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\ProductCategoryApiController;
use App\Http\Controllers\Api\UserApiController;
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
    
    // All
    Route::resource('product', ProductApiController::class);
    Route::get('product/search/{name}', [ProductApiController::class, 'search']);
    Route::resource('product-category', ProductCategoryApiController::class);
    Route::resource('product-photo', PhotoProductApiControlller::class);
    Route::post('product-photo/delete-where-id-product', [PhotoProductApiControlller::class, 'deleteWhereProductId']);
    
    // ------ Customer -----------
    // Cart
    Route::resource('cart', CartApiController::class);
    Route::get('cart/user_id/{user_id}', [CartApiController::class, 'indexByid']);
    
    // ------ Gapoktan -----------
    // Activity
    Route::resource('activity', ActivityApiController::class);
    Route::get('activity/search/{name}', [ActivityApiController::class, 'search']);
    Route::resource('activity-category', ActivityCategoryApiController::class);
    //Education
    Route::resource('education-category', EducationCategoryApiController::class);
    Route::resource('education', EducationApiController::class);
    Route::post('education/update/file', [EducationApiController::class, 'updateWFile']);
    // Poktan
    Route::resource('poktan', PoktanApiController::class);
    //Gapoktan
    Route::resource('gapoktan', GapoktanApiController::class);
    Route::post('gapoktan/update/image', [GapoktanApiController::class, 'updatePhoto']);

    //Petani
    Route::resource('plant', PlantApiController::class);
    Route::get('plant/farmer/{id}', [PlantApiController::class, 'indexByIdUser']);
    Route::put('plant/harvest-date/{id}', [PlantApiController::class, 'addHarvestDate']);
    Route::resource('farmer', FarmerApiController::class);
    
    // user
    Route::resource('user', UserApiController::class);
    
});



// ------ Customer -----------
Route::resource('product-customer', ProductCustomerApiController::class);
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

// ------ Gapoktan -----------
Route::post('login-poktan', [LoginPoktanApiController::class, 'login']);


// ------ Petani -----------
Route::post('login-petani', [LoginPetaniApiController::class, 'login']);