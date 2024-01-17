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
use App\Http\Controllers\api\customer\CustomerShopController;
use App\Http\Controllers\api\MedicalProvider\AddNewAcommoditionController;
use App\Http\Controllers\api\MedicalProvider\AddSystemUserRole;
use App\Http\Controllers\api\MedicalProvider\TransportationController;
use App\Http\Controllers\api\MedicalProvider\ToursController;
use App\Http\Controllers\api\MedicalProvider\PackageControllers;
use App\Http\Controllers\api\MedicalProvider\PaymentController;
use App\Http\Controllers\api\MedicalProvider\ReportsController;
use App\Http\Controllers\api\MedicalProvider\SalesController;
use App\Http\Controllers\api\vendor\VendorProductController;
use App\Http\Controllers\api\vendor\VendorSalesController;
use App\Http\Controllers\api\vendor\UpdateVendorProfileController;
use App\Http\Controllers\api\MedicalProvider\MedicalProviderDashboradController;
use App\Http\Controllers\api\food\UpdateFoodProfileController;
use App\Http\Controllers\api\vendor\VendorDashboardController;
use App\Http\Controllers\api\food\FoodPackageController;

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


// get treatment list
// Route::get('md-treatment-list', [CommonController::class, 'get_treatment_list']);

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

//md-food-registration
Route::post('md-food-registration', [RegistrationController::class, 'food_registration']);

//md-food-login
Route::post('md-food-login', [LoginControllers::class, 'food_login']);
//Vendor Registration
Route::post('md-vendor-registration', [RegistrationController::class, 'vendor_registration']);

Route::post('md-vendor-login', [LoginControllers::class, 'vendor_login']);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
Route::middleware('auth:sanctum')->group(function () 
{
    //customers
    Route::post('md-customer-logout', [LoginControllers::class, 'customer_logout']);

    Route::post('md-medical-provider-logout', [LoginControllers::class, 'medical_provider_logout']);


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

    //vendor
    Route::get('md-update-vendor-profile-list', [UpdateVendorProfileController::class, 'update_vendor_profile_list']);

    //update-food-profile
    Route::post('md-update-vendor-profile', [UpdateVendorProfileController::class, 'update_vendor_profile']);
    //food-provider
    //update-food-profile-list
    Route::get('md-update-food-profile-list', [UpdateFoodProfileController::class, 'update_food_profile_list']);

    //update-food-profile
    Route::post('md-update-food-profile', [UpdateFoodProfileController::class, 'update_food_profile']);

    //other-services
    //add-new-acommodition-hotel
    Route::post('md-add-new-acommodition', [AddNewAcommoditionController::class, 'add_new_acommodition']);

    //hotel-list
    Route::get('md-hotel-list', [AddNewAcommoditionController::class, 'hotel_list']);

    //hotel-list-view
    Route::post('md-hotel-list-edit-view', [AddNewAcommoditionController::class, 'hotel_list_edit_view']);

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

    //edit-transportation-details-view
    Route::post('md-edit-transportation-details-view', [TransportationController::class, 'edit_transportation_details_view']);

    //delete-transportation
    Route::post('md-delete-transportation', [TransportationController::class, 'delete_transportation']);

    //Tour
//add-tour
    Route::post('md-add-tour', [ToursController::class, 'add_tour']);

    //tour-list
    Route::get('md-tour-list', [ToursController::class, 'tour_list']);

    //edit-tour-list
    Route::post('md-edit-tour-list', [ToursController::class, 'edit_tour_list']);

    //edit-tour-list-view
    Route::post('md-edit-tour-list-view', [ToursController::class, 'edit_tour_list_view']);

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

    //get-tour-price
    Route::post('md-get-tour-price', [PackageControllers::class, 'get_tour_price']);


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

    //change-patient-information
    Route::post('md-change-patient-information', [CustomerPackageController::class, 'change_patient_information']);

    //change-patient-information-for-myself
    Route::post('md-change-patient-information-for-myself', [CustomerPackageController::class, 'change_patient_information_for_myself']);

    //customer-get-percentage
    Route::post('md-customer-get-percentage', [CustomerPackageController::class, 'customer_get_percentage']);

    //customer-get-purchase-information
    Route::post('md-customer-get-purchase-information', [CustomerPackageController::class, 'customer_get_purchase_information']);

    //customer-package-purchase-details
    Route::post('md-customer-purchase-package', [CustomerPackageController::class, 'customer_purchase_package']);

    //customer-purchase-package-active-list
    Route::get('md-customer-purchase-package-active-list', [CustomerPackageController::class, 'customer_purchase_package_active_list']);

    //customer-purchase-package-active-list-search
    Route::get('md-customer-purchase-package-active-list-search', [CustomerPackageController::class, 'customer_purchase_package_active_list_search']);

    //customer-purchase-package-completed-list
    Route::get('md-customer-purchase-package-completed-list', [CustomerPackageController::class, 'customer_purchase_package_completed_list']);

    //customer-purchase-package-completed-list-search
    Route::get('md-customer-purchase-package-completed-list-search', [CustomerPackageController::class, 'customer_purchase_package_completed_list_search']);

    //customer-purchase-package-cancelled-list
    Route::get('md-customer-purchase-package-cancelled-list', [CustomerPackageController::class, 'customer_purchase_package_cancelled_list']);

    //customer-purchase-cancellation-reason
    Route::post('md-customer-purchase-cancellation-reason', [CustomerPackageController::class, 'customer_purchase_cancellation_reason']);

    //customer-change-package-list-active-cancelled
    Route::post('md-customer-change-package-list-active-cancelled', [CustomerPackageController::class, 'customer_change_package_list_active_cancelled']);

    //change-patient-information-list
    Route::post('md-change-patient-information-list', [CustomerPackageController::class, 'change_patient_information_list']);

    //update-patient-information
    Route::post('md-update-patient-information', [CustomerPackageController::class, 'update_patient_information']);

    //customer-package-details
    Route::post('md-customer-package-details', [CustomerPackageController::class, 'customer_package_details']);

    //customer-my-details
    Route::post('md-customer-my-details', [CustomerPackageController::class, 'customer_my_details']);

    //customer-upload-documents
    Route::post('md-customer-upload-documents', [CustomerPackageController::class, 'customer_upload_documents']);
    
    Route::get('md-customer-documents-list', [CustomerPackageController::class, 'customer_documents_list']);

    //customer-remove-documents
    Route::post('md-customer-remove-documents', [CustomerPackageController::class, 'customer_remove_documents']);



    //customer-pay-now
    Route::post('md-customer-pay-now', [CustomerPackageController::class, 'customer_pay_now']);

    //customer-acommodition-details-view
    Route::post('md-customer-acommodition-details-view', [CustomerPackageController::class, 'customer_acommodition_details_view']);

    //customer-transporatation-details-view
    Route::post('md-customer-transporatation-details-view', [CustomerPackageController::class, 'customer_transporatation_details_view']);

    //customer-tour-details-view
    Route::post('md-customer-tour-details-view', [CustomerPackageController::class, 'customer_tour_details_view']);

    //customer-reviews
    Route::post('md-customer-reviews', [CustomerPackageController::class, 'customer_reviews']);

    //add-package-to-favourite
    Route::post('md-add-package-to-favourite', [CustomerPackageController::class, 'add_package_to_favourite']);

    //customer-favourite-list
    Route::get('md-customer-favourite-list', [CustomerPackageController::class, 'customer_favourite_list']);

    //customer-favourite-list-count
    Route::get('md-customer-favourite-list-count', [CustomerPackageController::class, 'customer_favourite_list_count']);

    //remove-from-favourite
    Route::post('md-remove-from-favourite', [CustomerPackageController::class, 'remove_from_favourite']);


    Route::controller(VendorProductController::class)->group(function () {
        Route::post('add-vendor-product', 'addProduct');
        Route::get('active-product-count', 'active_product_count');
        Route::get('inactive-product-count', 'deactive_product_count');
        Route::get('active-product-list', 'active_product_list');
        Route::get('inactive-product-list', 'inactive_product_list');
        Route::post('vendor-active-product-search', 'active_vendor_search_products');
        Route::post('vendor-inactive-product-search', 'inactive_vendor_search_products');
        Route::post('vendor-product-view', 'vendor_product_view');
        Route::post('md-vendor-product-active-to-deactive', 'product_active_to_deactive');
        Route::post('md-vendor-product-deactive-to-active', 'product_deactive_to_active');
        Route::post('md-delete-vendor-images-videos', 'delete_vendor_images_videos');

        // Route::post('/products/bulk-import','addProductsBulk');
    });






    //customer-package-view-search
    Route::post('md-packages-view-search', [CustomerPackageController::class, 'packages_view_on_search_result']);

    //Medical Provider Add Reports
    Route::post('md-provider-add-reports', [ReportsController::class, 'add_new_report']);

    //Medical Provider All Reports List
    Route::get('md-provider-all-reports-list', [ReportsController::class, 'provider_all_reports_list']);

    //Medical Provider Patient list
    Route::get('md-customer-package-purchage-list', [ReportsController::class, 'patient_package_purchage_list']);

    //Medical Provider Report Search
    Route::post('md-medical-provider-report-search', [ReportsController::class, 'provider_reports_search']);


    //Customer Report Search
    Route::post('md-customer-report-search', [CustomerReportController::class, 'customer_reports_search']);


    //Customer All Reports List
    Route::get('md-customer-all-reports-list', [CustomerReportController::class, 'customer_all_reports_list']);


    //active treatment list
    Route::get('md-provider-active-treatment-list', [SalesController::class, 'active_treatment_list']);


    //completed treatment list
    Route::get('md-provider-completed-treatment-list', [SalesController::class, 'completed_treatment_list']);


    //Cancelled treatment list
    Route::get('md-provider-cancelled-treatment-list', [SalesController::class, 'cancelled_treatment_list']);

    //Patient Details
    Route::post('md-provider-patient-details', [SalesController::class, 'patient_details']);


    //Patient Details
    Route::post('md-provider-treatment-date-status', [SalesController::class, 'treatement_date_status']);

    //Provider Case Manager Listing
    Route::get('md-provider-case-manager-list', [SalesController::class, 'case_manager_list']);


    //Provider sales treatment package details
    Route::post('md-provider-package-details', [SalesController::class, 'package_details']);

    //Provider sales treatment package details chnages and assign case manger
    Route::post('md-provider-assign-treatment-case-manager', [SalesController::class, 'store_package_details_changes']);



    //Provider sales treatment search
    Route::post('md-provider-treatment-search', [SalesController::class, 'treatment_search']);


    //Provider account details saved
    Route::post('md-provider-add-bank-account', [PaymentController::class, 'add_provider_account']);

    //
    Route::get('md-provider-bank-account-list', [PaymentController::class, 'bank_account_list']);

    //Provider Transaction List
    Route::get('md-provider-transaction-list', [PaymentController::class, 'transaction_list_view']);

    //Provider Transaction Search
    Route::post('md-provider-transaction-search', [PaymentController::class, 'search_transactions']);


    //Provider Transaction total Panding
    Route::get('md-provider-transaction-total-pending', [PaymentController::class, 'total_pending_amount']);


    //Provider Transaction total completed
    Route::get('md-provider-transaction-total-completed', [PaymentController::class, 'total_paid_amount']);


    //Provider Transaction total amount
    Route::get('md-provider-transaction-total-business-amount', [PaymentController::class, 'total_business_amount']);



    //Provider Add System User
    Route::post('md-provider-add-system-user', [AddSystemUserRole::class, 'add_system_user']);

    // Mplus04
    //Provider update System User
    Route::post('md-provider-update-system-user', [AddSystemUserRole::class, 'update_system_user']);
    // Mplus04

    //Provider System User List
    Route::get('md-provider-system-user-list', [AddSystemUserRole::class, 'provider_system_user_list']);

    //Provider System User Edit
    Route::post('md-provider-system-user-edit', [AddSystemUserRole::class, 'edit_system_user']);


    //Provider System User delete
    Route::post('md-provider-system-user-delete', [AddSystemUserRole::class, 'delete_system_user']);


    //medical Provider Daily Monthly Summary
    Route::get('md-provider-daily-monthly-summary', [SalesController::class, 'salesSummary']);



   

   



    //Vendor Sales Controller
    Route::controller(VendorSalesController::class)->group(function () {
        Route::get('active-sales-lists', 'activeSales');
        Route::get('completed-sales-lists', 'completedSales');
        Route::get('cancelled-sales-lists', 'cancelledSales');
        Route::post('order-view', 'salesView');
        Route::post('search-sales-active', 'searchSalesActive');
        Route::post('search-sales-completed', 'searchSalesCompleted');
        Route::post('search-sales-cancelled', 'searchSalesCancelled');     
    });


    //Medical Provider Dashboard
    Route::controller(MedicalProviderDashboradController::class)->group(function () {
        Route::get('medical-provider-monthly-order-count', 'monthlyOrders');
        Route::get('medical-provider-monthly-sales-count', 'monthlySales');
        Route::get('medical-provider-package-latest-orders', 'latestOrders');
    });


    //Medical Provider Dashboard
    Route::controller(VendorDashboardController::class)->group(function () {
        Route::get('md-vendor-monthly-order-count', 'monthlyOrders');
        Route::get('md-vendor-monthly-sales-count', 'monthlySales');
        Route::get('md-vendor-package-latest-orders', 'latestOrders');
    });


    //Food Provider 
    Route::controller(FoodPackageController::class)->group(function () {
        Route::post('md-add-food-packages', 'add_food_packages');
        Route::post('md-add-food-packages-with-price', 'add_food_packages_with_price');
        Route::post('md-food-packages-menu-list', 'food_packages_menu_list');
        Route::post('md-food-edit-menu-list', 'food_edit_menu_list');
        Route::post('md-food-edit-menu', 'food_edit_menu');
        Route::post('md-food-delete-menu', 'food_delete_menu');
        Route::post('md-food-active-list', 'food_active_list');
        Route::post('md-food-deactive-list', 'food_deactive_list');
        Route::post('md-food-active-list-to-deactive', 'active_list_to_deactive');
        Route::post('md-food-deactive-list-to-active', 'deactive_list_to_active');
    });



    


});
 //Vendor Prodcut
 Route::controller(VendorProductController::class)->group(function () {
    Route::get('product-category', 'vendor_product_category');
    Route::post('product-sub-category', 'vendor_product_sub_category');
});
  //customer MD Shop

  Route::controller(CustomerShopController::class)->group(function () {
    Route::get('featured-product', 'featured_product_list');
    Route::post('customer-product-view', 'product_view');
    Route::post('vendor-product-lists', 'vendor_product_list');
    Route::post('/shopping-cart/add', 'addToCart');
    Route::get('/shopping-cart/view', 'viewCart');
    Route::post('/shopping-cart/delete-item', 'deleteCartItem');
    Route::get('/shopping-cart/clear', 'clearCart');
    Route::post('filter-product-list', 'filteredProductList');
    Route::post('store-payment-details', 'processPayment');
    Route::post('/follow-vendor', 'followVendor');
    Route::post('/unfollow-vendor', 'unfollowVendor');
    Route::post('/favorites/add', 'addToFavorites');
});


