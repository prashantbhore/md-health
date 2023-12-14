<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\registration\RegistrationController;
use App\Http\Controllers\api\login\LoginControllers;
use App\Http\Controllers\api\CommonController;
use App\Http\Controllers\api\AppConfigController;
use App\Http\Controllers\api\MedicalProvider\UpdateMedicalProfileController;
use App\Http\Controllers\api\customer\UpdateCustomerProfileController;
use App\Http\Controllers\api\customer\CustomerPackageController;
use App\Http\Controllers\api\customer\CustomerReportController;
use App\Http\Controllers\api\MedicalProvider\AddNewAcommoditionController;
use App\Http\Controllers\api\MedicalProvider\TransportationController;
use App\Http\Controllers\api\MedicalProvider\ToursController;
use App\Http\Controllers\api\MedicalProvider\PackageControllers;
use App\Http\Controllers\api\MedicalProvider\ReportsController;
use App\Models\MedicalProviderReports;

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
// Route::middleware('auth:sanctum')->group(function ()
// {
//customers
//update-customer-list
Route::get('md-update-customer-list', [UpdateCustomerProfileController::class, 'update_customer_list']);

//check-password-exist 
Route::post('md-check-password-exist', [UpdateCustomerProfileController::class, 'check_password_exist']);

//update-customer-profile
Route::post('md-update-customer-profile', [UpdateCustomerProfileController::class, 'update_customer_profile']);

//update-customer-password
Route::post('md-update-customer-password', [UpdateCustomerProfileController::class, 'update_customer_password']);

//medical-provider
//update-medical-profile-list
Route::get('md-update-medical-profile-list', [UpdateMedicalProfileController::class, 'update_medical_profile_list']);

//update-medical-profile
Route::post('md-update-medical-profile', [UpdateMedicalProfileController::class, 'update_medical_provider_profile']);

//delete-provider-images-videos
Route::post('md-delete-provider-images-videos', [UpdateMedicalProfileController::class, 'delete_provider_images_videos']);

//other-services
//add-new-acommodition-hotel
Route::post('md-add-new-acommodition', [AddNewAcommoditionController::class, 'add_new_acommodition']);

//hotel-list
Route::get('md-hotel-list', [AddNewAcommoditionController::class, 'hotel_list']);

//edit-hotel-list
Route::post('md-edit-hotel-list', [AddNewAcommoditionController::class, 'edit_hotel_list']);

//delete-hotel
Route::post('md-delete-hotel', [AddNewAcommoditionController::class, 'delete_hotel']);

//Transportation
//master-brands
Route::get('md-master-brands', [TransportationController::class, 'master_brands']);

//comfort-levels-master
Route::get('md-comfort-levels-master', [TransportationController::class, 'comfort_levels_master']);

//add-transportation-details
Route::post('md-add-transportation-details', [TransportationController::class, 'add_transportation_details']);

//transportation-list
Route::get('md-transportation-list', [TransportationController::class, 'transportation_list']);

//edit-transportation-details
Route::post('md-edit-transportation-details', [TransportationController::class, 'edit_transportation_details']);

//delete-transportation
Route::post('md-delete-transportation', [TransportationController::class, 'delete_transportation']);

//Tour
//add-tour
Route::post('md-add-tour', [ToursController::class, 'add_tour']);

//tour-list
Route::get('md-tour-list', [ToursController::class, 'tour_list']);

//edit-tour-list
Route::post('md-edit-tour-list', [ToursController::class, 'edit_tour_list']);

//delete-tour
Route::post('md-delete-tour', [ToursController::class, 'delete_tour']);

//packages
//treatment-category-list
Route::get('md-treatment-category-list', [PackageControllers::class, 'treatment_category_list']);

//treatment-list
Route::post('md-treatment-list', [PackageControllers::class, 'treatment_list']);

//add-packages
Route::post('md-add-packages', [PackageControllers::class, 'add_packages']);

//get-acommodition-price
Route::post('md-get-acommodition-price', [PackageControllers::class, 'get_acommodition_price']);

//get-transportation-price
Route::post('md-get-transportation-price', [PackageControllers::class, 'get_transportation_price']);

//packages-active-list
Route::get('md-packages-active-list', [PackageControllers::class, 'packages_active_list']);

//packages-deactive-list
Route::get('md-packages-deactive-list', [PackageControllers::class, 'packages_deactive_list']);

//packages-view-active-list
Route::post('md-packages-view-list', [PackageControllers::class, 'packages_view_active_list']);

//packages-view-deactive-list
// Route::post('md-packages-view-deactive-list', [PackageControllers::class, 'packages_view_deactive_list']);

//edit-packages
Route::post('md-edit-packages', [PackageControllers::class, 'edit_packages']);

//activate-to-deactivate-packages
Route::post('md-activate-to-deactivate-packages', [PackageControllers::class, 'activate_to_deactivate_packages']);

//deactivate-to-activate-packages
Route::post('md-deactivate-to-activate-packages', [PackageControllers::class, 'deactivate_to_activate_packages']);

//packages-active-list-count
Route::get('md-packages-active-list-count', [PackageControllers::class, 'packages_active_list_count']);

//packages-active-list-search
Route::post('md-packages-active-list-search', [PackageControllers::class, 'packages_active_list_search']);

//packages-inactive-list-search
Route::post('md-packages-inactive-list-search', [PackageControllers::class, 'packages_inactive_list_search']);

//customer-package-search-filter
Route::post('md-customer-package-search-filter', [CustomerPackageController::class, 'customer_package_search_filter']);

//customer-package-purchase-details
Route::post('md-customer-package-purchase-details', [CustomerPackageController::class, 'customer_package_purchase_details']);

//md-change-patient-information
Route::post('md-change-patient-information', [CustomerPackageController::class, 'change_patient_information']);

//customer-package-purchase-details
Route::post('md-customer-purchase-package', [CustomerPackageController::class, 'customer_purchase_package']);

//customer-purchase-package-active-list
Route::get('md-customer-purchase-package-active-list', [CustomerPackageController::class, 'customer_purchase_package_active_list']);

//customer-purchase-package-completed-list
Route::get('md-customer-purchase-package-completed-list', [CustomerPackageController::class, 'customer_purchase_package_completed_list']);

//customer-purchase-package-cancelled-list
Route::get('md-customer-purchase-package-cancelled-list', [CustomerPackageController::class, 'customer_purchase_package_cancelled_list']);

//customer-change-package-list-active-cancelled
Route::post('md-customer-change-package-list-active-cancelled', [CustomerPackageController::class, 'customer_change_package_list_active_cancelled']);

Route::get('md-change-patient-information-list', [CustomerPackageController::class, 'change_patient_information_list']);

// });



//customer-package-view-search
Route::post('md-packages-view-search', [CustomerPackageController::class, 'packages_view_on_search_result']);

//Medical Provider Add Reports
Route::post('md-provider-add-reports', [ReportsController::class,'add_new_report']);

//Medical Provider All Reports List
Route::get('md-provider-all-reports-list', [ReportsController::class,'provider_all_reports_list']);

//Medical Provider Patient list
Route::get('md-customer-package-purchage-list', [ReportsController::class,'patient_package_purchage_list']);


//Customer All Reports List
Route::get('md-customer-all-reports-list', [CustomerReportController::class,'customer_all_reports_list']);




// });


