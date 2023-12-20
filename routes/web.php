<?php

use App\Http\Controllers\admin\admin\AdminController;
use App\Http\Controllers\admin\product\ProductMDhealthPackageController;
use App\Http\Controllers\Front\Login\CommonLoginController;
use App\Http\Controllers\Front\Login\MedicalProviderLogin;
use App\Http\Controllers\Front\Registration\MedicalProviderRegistrationController;
use App\Http\Controllers\Front\Registration\UserRegistrationController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\master\CityController;
use App\Http\Controllers\admin\BaseController;
use App\Http\Controllers\admin\customer\CustomerController;
use App\Http\Controllers\admin\login\LoginController;
use App\Http\Controllers\admin\master\BrandController;
use App\Http\Controllers\admin\medical_tourism\MedicalTourismController;
use App\Http\Controllers\admin\product\MDfoodController;
use App\Http\Controllers\admin\product\MDhealthController;
use App\Http\Controllers\admin\product\MDHomeServiceController;
use App\Http\Controllers\admin\product\MDshopController;
use App\Http\Controllers\admin\product\ProductCategoryController;
use App\Http\Controllers\admin\product\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Laravel Development Admin
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
    return 'storage linked';
});

Route::get('clear', function () {
    \Artisan::call('route:clear');
    \Artisan::call('cache:clear');
    \Artisan::call('view:clear');
    \Artisan::call('config:clear');
    return 'clear';
});

Route::get('common-delete', [BaseController::class, 'delete']);

Route::post('change-status', [BaseController::class, 'status'])->name('change-status');

Route::get('/', function () {
    return view('front.mdhealth.index');
});



// Super Admin authentication

Route::get('/admin-panel', [LoginController::class, 'index']);

Route::post('super-admin-login', [LoginController::class, 'super_admin_login']);

Route::get('logout', [LoginController::class, 'logout']);

Route::get('home-service', function () {
    return view('front.mdHome.index');
});

Route::get('search-result', function () {
    return view('front.mdHome.searchResult');
});

Route::get('health-search-result', function () {
    return view('front.mdHealth.searchResult');
});

Route::get('health-pack-details', function () {
    return view('front.mdHealth.healthPackDetails');
});

Route::get('purchase-package', function () {
    return view('front.mdHealth.purchase');
});

Route::get('home-pack-details', function () {
    return view('front.mdHome.homePackDetails');
});

Route::get('buy-service', function () {
    return view('front.mdHome.buyService');
});
// Route::group(['prefix' => 'admin'], function () {

Route::group(['prefix' => 'admin', 'middleware' => ['prevent-back-history', 'superadmin']], function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard.dashboard');
    });



    // AUTHENTICATION



    Route::view('sign-in', 'admin/authentication/sign-in');

    // DASHBOARD
    Route::view('dashboard', 'admin/dashboard/dashboard');

    // SALES
    Route::view('sales', 'admin/sales/sales');
    Route::view('sales-details', 'admin/sales/sales-details');
    Route::view('md-profit', 'admin/sales/md-profit');
    Route::view('md-booking-sales', 'admin/sales/md-booking-sales');

    // MANAGE CUSTOMERS

    Route::controller(CustomerController::class)->group(function () {
        Route::get('customers', 'index');
        Route::get('/customer-data-table', 'data_table');
        Route::get('admin/customer-details/{id}', 'show')->name('customer.details');
        Route::get('customer-delete', 'delete_customer');
        Route::get('customer-details/{id}', 'show');
    });



    Route::view('customer-details', 'admin/customers/customer-details');

    // MANAGE VENDORS
    Route::view('vendors', 'admin/vendors/vendors');
    Route::view('vendor-details', 'admin/vendors/vendor-details');
    Route::view('products-on-sale', 'admin/vendors/products-on-sale');

    // MEDICAL TOURISM


    Route::controller(MedicalTourismController::class)->group(function () {
        Route::get('service-provider', 'index');
        // Route::get('service-provider-details','show');
        Route::get('medical-tourism-data-table', 'data_table');
        Route::get('medical-tourism-details/{id}', 'show')->name('medical_tourism.details');
        Route::get('medical-tourism-delete', 'delete_medical_tourism');
        Route::get('medical-tourism-delete-logo', 'delete_logo');
        Route::get('medical-tourism-delete-license', 'delete_license');
        Route::get('medical-tourism-delete-gallery', 'delete_gallery');
        Route::post('medical-tourism-store', 'store')->name('medical.tourism.store');
        Route::post('verification-status-chnage', 'verification_status');
        Route::post('vendor-status-chnage', 'status');
        Route::post('vendor-delete', 'vendor_delete');
    });




    // MANAGE CITIES

    Route::controller(CityController::class)->group(function () {
        Route::get('/add-cities', 'index');
        Route::post('/add-cities', 'store')->name('add-city');
        Route::get('/city-data-table', 'data_table');
        Route::get('/cities/{id}/edit', 'edit_city');
        Route::get('city-delete', 'delete_city');
    });


    // Route::view('add-cities', 'admin/cities/add-cities');

    // MANAGE CITIES

    Route::controller(AdminController::class)->group(function () {

        Route::get('add-admins', 'index');
        Route::post('admin-store', 'store')->name('admin.store');
        Route::get('/admin-data-table', 'data_table');
        Route::get('/edit-admins/{id}/edit', 'edit_admin');
    });







    // Route::view('edit-admins', 'admin/admins/edit-admins');

    // MLM
    Route::view('multi-level-marketing', 'admin/multi-level-marketing/multi-level-marketing');
    Route::view('earner-details', 'admin/multi-level-marketing/earner-details');

    // BRANDS

    Route::controller(BrandController::class)->group(function () {
        Route::get('brands', 'index');
        Route::post('/add-brands', 'store')->name('add-brand');
        Route::get('/brand-data-table', 'data_table');
        Route::get('brand-delete', 'delete_brand');
        Route::get('/brand/{id}/edit', 'edit_brand');
    });




    // PRODUCTS AND CATEGORIES

    Route::controller(ProductController::class)->group(function () {
        Route::get('products-and-categories', 'index');
    });



    # Categories



    Route::controller(MDhealthController::class)->group(function () {
        Route::get('category-mdhealth', 'index');
        Route::post('category-mdhealth-store', 'store')->name('category.mdhealth.store');
        Route::get('/md-health-data-table', 'data_table');
        Route::get('product-category-delete', 'delete_product_category');
        Route::get('/product-category/{id}/edit', 'edit_product');
    });


    Route::controller(MDshopController::class)->group(function () {
        Route::get('category-mdshop', 'index');
        Route::post('category-mdshop-store', 'store')->name('category.mdshop.store');
        Route::get('/md-shop-data-table', 'data_table');
    });


    Route::controller(MDfoodController::class)->group(function () {
        Route::get('category-mdfood', 'index');
        Route::post('category-mdfood-store', 'store')->name('category.mdfood.store');
        Route::get('/md-food-data-table', 'data_table');
    });



    Route::controller(MDHomeServiceController::class)->group(function () {
        Route::get('category-home-service', 'index');
        Route::post('category-md-home-service-store', 'store')->name('category.md.home.service.store');
        Route::get('/md-home-service-data-table', 'data_table');
    });


    Route::view('category-mdbooking', 'admin/products-and-categories/categories/mdbooking');

    # Products
    Route::controller(ProductMDhealthPackageController::class)->group(function () {
        Route::get('product-mdhealth', 'index');
        Route::get('/md-health-package-data-table', 'data_table');
        Route::get('md-health-package-delete', 'delete_md_health_package_delete');
        Route::get('product-details/{id}', 'show');
        Route::post('package-status-chnage', 'status');
        Route::post('package-delete', 'package_delete');
        Route::post('package-store', 'store')->name('package.store');
    });

    Route::view('product-mdshop', 'admin/products-and-categories/products/mdshop');

    Route::view('product-mdfood', 'admin/products-and-categories/products/mdfood');

    Route::view('product-mdbooking', 'admin/products-and-categories/products/mdbooking');
    Route::view('product-home-service', 'admin/products-and-categories/products/home-service');

    // PAYMENTS
    Route::view('payments', 'admin/payments/payments');
    Route::view('completed-payments', 'admin/payments/completed-payments');
    Route::view('bank-accounts', 'admin/payments/bank-accounts');
    Route::view('payment-requests', 'admin/payments/payment-requests');

    // REVIEWS
    Route::view('pending-reviews', 'admin/reviews/pending-reviews');
    Route::view('published-reviews', 'admin/reviews/published-reviews');

    // NOTIFICATIONS
    Route::view('notifications', 'admin/notifications/notifications');

    // ADS & PROMO
    Route::view('ads', 'admin/ads/ads');
    // MANAGE REQUEST
    Route::view('manage-request', 'admin/manage-request/manage-request');

    // MANAGE MD FOODS
    Route::view('food-suppliers', 'admin/manage-md-foods/food-suppliers');
    Route::view('food-supplier-details', 'admin/manage-md-foods/food-supplier-details');
});

// FRONT ROUTES
#User Account
// Route::view('user-account', 'front/mdhealth/authentication/user-account');
#Sign In
Route::view('sign-in-web', 'front/mdhealth/authentication/sign-in');
#SMS Code
Route::view('sms-code', 'front/mdhealth/authentication/sms-code');
// Route::post('md-register-medical-provider', [RegistrationController::class, 'md_register_medical_provider']);
Route::controller(MedicalProviderRegistrationController::class)->group(function () {
    Route::get('user-account', 'index');
    Route::post('/md-register-medical-provider', 'md_register_medical_provider');
    Route::get('/logout', 'logout');
});
Route::controller(UserRegistrationController::class)->group(function () {
    // Route::get('user-account', 'index');
    Route::post('/md-customer-register', 'customer_register');
    // Route::get('/logout','logout');

});
Route::controller(CommonLoginController::class)->group(function () {
    Route::post('user-login', 'user_login');
    Route::post('/otp-verify', 'otp_verify_for_register');
    //     // Route::get('/logout','logout');

});
// AUTHENTICATION

Route::group(['middleware' => ['prevent-back-history', 'IsMedicalProvider']], function () {

    Route::controller(MedicalProviderLogin::class)->group(function () {
        Route::get('/medical-provider-dashboard', 'dashboard_view');
        // Route::get('/logout', 'logout');
        // Route::get('/login/change_password', 'change_password_view');
        // Route::post('/reset-password', 'reset_password');
        // Route::post('/check-old-password', 'check_old_password');
    });
    // Route::controller(LoginController::class)->group(function () {
    //     Route::get('/dashboard', 'dashboard_view')->name('dashboard');
    //     Route::get('/logout', 'logout');
    //     Route::get('/login/change_password', 'change_password_view');
    //     Route::post('/reset-password', 'reset_password');
    //     Route::post('/check-old-password', 'check_old_password');
    // });

});
Route::group(['middleware' => ['prevent-back-history', 'IsCustomer']], function () {

    Route::controller(UserRegistrationController::class)->group(function () {
        // Route::get('/medical-provider-dashboard', 'dashboard_view');
        Route::get('/user-profile', 'edit_customer');
        // Route::get('/login/change_password', 'change_password_view');
        Route::post('/update-customer-profile', 'update_customer_profile');
        Route::post('/md-check-password-exist', 'check_password_exist');
        Route::post('/reset-customer-password', 'update_customer_password');
        // Route::post('/check-old-password', 'check_old_password');
    });
    // Route::controller(LoginController::class)->group(function () {
    //     Route::get('/dashboard', 'dashboard_view')->name('dashboard');
    //     Route::get('/logout', 'logout');
    //     Route::get('/login/change_password', 'change_password_view');
    //     Route::post('/reset-password', 'reset_password');
    //     Route::post('/check-old-password', 'check_old_password');
    // });

});
// MEDICAL PROVIDER
#Dashboard
// Route::view('medical-provider-dashboard', 'front/mdhealth/medical-provider/dashboard');
#Treatment Details
Route::view('treatment-order-details', 'front/mdhealth/medical-provider/treatment-order-details');
Route::view('medical-packages', 'front/mdhealth/medical-provider/packages');
Route::view('medical-packages-view', 'front/mdhealth/medical-provider/medical-packages-view');
Route::view('medical-account', 'front/mdhealth/medical-provider/account');

#Sales
Route::view('medical-provider-sales', 'front/mdhealth/medical-provider/sales');


// USER PANEL
#User Profile
// Route::view('user-profile', 'front/mdhealth/user-panel/user-profile');


// MD BOOKING PAGE
Route::view('md-booking-home-page', 'front/mdhealth/md-booking-home-page');
//MD FOOD PAGE
Route::view('md-food-home-page', 'front/mdhealth/md-food-page');
// Shubham
// Vendor Panel
Route::view('vendor-dashboard', 'front/mdhealth/vendor/vendor_dashboard');
Route::view('vendor-products', 'front/mdhealth/vendor/vendor_products');
Route::view('vendor-add-products', 'front/mdhealth/vendor/vendor_add_products');
Route::view('vendor-sales', 'front/mdhealth/vendor/vendor_sales');
Route::view('vendor-order-view', 'front/mdhealth/vendor/vendor_order_view');
Route::view('vendor-order-view', 'front/mdhealth/vendor/vendor_order_view');

// MDFood Provider Panel
Route::view('food-provider-panel-dashboard', 'front/mdhealth/food-provider/food_provider_panel_dashboard');
Route::view('food-provider-sales', 'front/mdhealth/food-provider/food_provider_sales');
Route::view('food-provider-view', 'front/mdhealth/food-provider/food_provider_view');
Route::view('food-provider-foods', 'front/mdhealth/food-provider/food_provider_foods');
Route::view('food-provider-foods-view', 'front/mdhealth/food-provider/food_provider_foods_view');
