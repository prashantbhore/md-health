<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\registration\RegistrationController;
use App\Http\Controllers\API\CommonController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('unauthorized-user', function () {
    return response()->json(['status' => 401, 'message' => 'unauthorized user'], 401);
})->name('unauthorized-user');

// dynamic app url
Route::post('app-base-url', [AppConfigController::class, 'fun_app_get_base_url']);

// get country list
Route::get('md-country-list', [CommonController::class, 'get_country_list']);
// get city list
Route::post('md-city-list', [CommonController::class, 'get_cities_list']);

// customer register
Route::post('md-customer-register', [RegistrationController::class, 'customer_register']);

//otp-verify-for-register
Route::post('md-otp-verify-for-register', [RegistrationController::class, 'otp_verify_for_register']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
