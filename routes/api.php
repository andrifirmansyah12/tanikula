<?php

use App\Http\Controllers\Api\Customer\CartApiController;
use App\Http\Controllers\Api\Customer\LoginCustomerApiController;
use App\Http\Controllers\Api\Customer\RegisterCustomerApiController;
use App\Http\Controllers\Api\Gapoktan\ActivityApiController;
use App\Http\Controllers\Api\Gapoktan\ActivityCategoryApiController;
use App\Http\Controllers\Api\Gapoktan\EducationApiController;
use App\Http\Controllers\Api\Gapoktan\EducationCategoryApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// All
Route::resource('product', ProductApiController::class);
Route::resource('product-category', ProductCategoryApiController::class);


// ------ Customer -----------
Route::post('register-customer', [RegisterCustomerApiController::class, 'register']);
Route::post('login-customer', [LoginCustomerApiController::class, 'login']);
// Cart
Route::resource('cart', CartApiController::class);
Route::get('cart/user_id/{user_id}', [CartApiController::class, 'indexByid']);

// ------ Gapoktan -----------
// Education
Route::resource('education', EducationApiController::class);
Route::resource('education-category', EducationCategoryApiController::class);
// Activity
Route::resource('activity', ActivityApiController::class);
Route::get('activity/search/{name}', [ActivityApiController::class, 'search']);
Route::resource('activity-category', ActivityCategoryApiController::class);
