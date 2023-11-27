<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\registration\RegistrationController;
use App\Http\Controllers\api\login\LoginControllers;
use App\Http\Controllers\API\CommonController;
use App\Http\Controllers\api\AppConfigController;
use App\Http\Controllers\api\MedicalProvider\UpdateMedicalProfileController;
use App\Http\Controllers\api\customer\UpdateCustomerProfileController;


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

//md-customer-login
Route::post('md-customer-login', [LoginControllers::class, 'customer_login']);

// register-medical-provider
Route::post('md-register-medical-provider', [RegistrationController::class, 'md_register_medical_provider']);

//md-medical-provider-login
Route::post('md-medical-provider-login', [LoginControllers::class, 'medical_provider_login']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
Route::middleware('auth:sanctum')->group(function (){
    //update-medical-profile-list
    Route::get('md-update-customer-list', [UpdateCustomerProfileController::class, 'update_customer_list']);

    //check-password-medical-provider 
    Route::post('md-check-password-exist', [UpdateCustomerProfileController::class, 'check_password_exist']);

    //update-customer-profile
    Route::post('md-update-customer-profile', [UpdateCustomerProfileController::class, 'update_customer_profile']);

    //update-customer-password
    Route::post('md-update-customer-password', [UpdateCustomerProfileController::class, 'update_customer_password']);

    //update-medical-profile-list
    Route::get('md-update-medical-profile-list', [UpdateMedicalProfileController::class, 'update_medical_profile_list']);

    //update-medical-profile
    Route::post('md-update-medical-profile', [UpdateMedicalProfileController::class, 'update_medical_provider_profile']);

    //delete-provider-images-videos
    Route::post('md-delete-provider-images-videos', [UpdateMedicalProfileController::class, 'delete_provider_images_videos']);
});
