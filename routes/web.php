<?php

use App\Http\Controllers\admin\admin\AdminController;
use App\Http\Controllers\admin\product\ProductMDhealthPackageController;
use App\Http\Controllers\Front\Login\CommonLoginController;
use App\Http\Controllers\Front\Customer\CustomerPackageController;
use App\Http\Controllers\Front\Login\MedicalProviderLogin;
use App\Http\Controllers\Front\MedicalProvider\OtherServicesController;
use App\Http\Controllers\Front\MedicalProvider\PackageController;
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
use App\Http\Controllers\api\MedicalProvider\UpdateMedicalProfileController;
use App\Http\Controllers\Front\MedicalProvider\SalesController;
use App\Http\Controllers\Front\MedicalProvider\UpdateProfileController;

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

Route::get('/', [CustomerPackageController::class, 'customer_home']);




// Super Admin authentication

Route::get('/admin-panel', [LoginController::class, 'index']);

Route::post('super-admin-login', [LoginController::class, 'super_admin_login']);

Route::get('logout', [LoginController::class, 'logout']);


//Home Service Routes
Route::get('home-service', function () {
    return view('front.mdHome.index');
});

Route::get('search-result', function () {
    return view('front.mdHome.searchResult');
});

Route::get('homeService-purchase', function () {
    return view('front.mdHome.purchase');
});

Route::get('home-pack-details', function () {
    return view('front.mdHome.homePackDetails');
});

Route::get('payment-status', function () {
    return view('front.mdHome.paymentStatus');
});

Route::get('buy-service', function () {
    return view('front.mdHome.buyService');
});

//mdHealth Routes
Route::any('health-search-result', [CustomerPackageController::class, 'customer_package_search_filter']);

Route::any('health-pack-details', [CustomerPackageController::class, 'packages_view_on_search_result']);

Route::any('purchase-package/{id}', [CustomerPackageController::class, 'purchase_package'])->name('purchase-package');

//mdShop Routes
Route::get('mdShop', function () {
    return view('front.mdShop.index');
});

Route::get('cart', function () {
    return view('front.mdShop.cart');
});

Route::get('product', function () {
    return view('front.mdShop.product');
});

Route::get('payment-status-shop', function () {
    return view('front.mdShop.paymentStatus');
});

Route::get('view-products', function () {
    return view('front.mdShop.allProducts');
});

// mdFood Routes
Route::get('mdFoods', function () {
    return view('front.mdFoods.index');
});

Route::get('foods-search-result', function () {
    return view('front.mdFoods.searchResult');
});

Route::get('food-pack-details', function () {
    return view('front.mdFoods.foodPackDetails');
});

Route::get('purchase-food-pack', function () {
    return view('front.mdFoods.purchase');
});

Route::get('food-payment-status', function () {
    return view('front.mdFoods.paymentStatus');
});

// mdBooking Routes
Route::get('mdBooking', function () {
    return view('front.mdBooking.index');
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

    Route::controller(CityController::class)->group(function(){
        Route::get('/add-cities', 'index');
        Route::post('/add-cities', 'store')->name('add-city');
        Route::get('/city-data-table', 'data_table');
        Route::get('/cities/{id}/edit', 'edit_city');
        Route::get('city-delete', 'delete_city');
    });


    // Route::view('add-cities', 'admin/cities/add-cities');

    // MANAGE CITIES

    Route::controller(AdminController::class)->group(function (){
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
// Route::view('medical-provider-login', 'front/mdhealth/authentication/medical-provider-login');
Route::view('vendor-login', 'front/mdhealth/authentication/vendor-login');
Route::view('food-login', 'front/mdhealth/authentication/food-login');

#Sign In
Route::view('sign-in-web', 'front/mdhealth/authentication/sign-in');
#SMS Code
Route::view('sms-code', 'front/mdhealth/authentication/sms-code');
// Route::post('md-register-medical-provider', [RegistrationController::class, 'md_register_medical_provider']);
Route::controller(MedicalProviderRegistrationController::class)->group(function () {
    Route::get('user-account', 'index');
    Route::get('medical-provider-login', 'indexmedpro');
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
    Route::post('/email-to-mobile', 'email_to_mobile');
    Route::post('/email-password-exist', 'email_password_exist');
    Route::post('/email-or-mobile-exist', 'email_or_mobile_exist');
});
//     Route::post('/otp-verify','otp_verify_for_register');
//     Route::post('/email-to-mobile','email_to_mobile');
//     Route::post('/email-password-exist','email_password_exist');

//  });
// AUTHENTICATION

Route::group(['middleware' => ['prevent-back-history', 'IsMedicalProvider']], function () {

    Route::controller(MedicalProviderLogin::class)->group(function () {
        Route::get('/medical-provider-dashboard', 'dashboard_view');
        // Route::get('/logout', 'logout');
        // Route::get('/login/change_password', 'change_password_view');
        // Route::post('/reset-password', 'reset_password');
        // Route::post('/check-old-password', 'check_old_password');
    });
    Route::controller(UpdateProfileController::class)->group(function () {
        //update-medical-profile-list

        Route::get('medical-account', 'update_medical_profile_list');

        //update-medical-profile
        Route::post('md-update-medical-profile', 'update_medical_provider_profile');
        //delete-provider-images-videos
        Route::post('md-delete-provider-images-videos', 'delete_provider_images_videos');

        // Route::get('/login/change_password', 'change_password_view');
        // Route::post('/reset-password', 'reset_password');
        // Route::post('/check-old-password', 'check_old_password');
    });

    Route::controller(OtherServicesController::class)->group(function () {
        Route::get('medical-other-services', 'index');
        Route::get('/add-acommodition', 'add_acommodition');
        Route::get('/add-tour', 'add_tour');
        Route::post('/saveStarRating', 'saveStarRating')->name('saveStarRating');
        Route::post('/md-add-new-acommodition', 'md_add_new_acommodition');
        Route::post('/md-add-tour', 'md_add_tour');
        Route::post('/md-add-transportation-details', 'md_add_transportation_details');
        Route::get('/edit-acommodition/{id}', 'edit_acommodition');
        Route::get('/edit-vehicle/{id}', 'edit_vehicle');
        Route::get('/edit-tour/{id}', 'edit_tour');
        Route::get('/add-new-vehical', 'add_new_vehical');
        // Route::post('/delete-acommodition/{id}', 'delete_acommodition');
        // Route::post('/check-old-password', 'check_old_password');
    });
    Route::controller(PackageController::class)->group(function () {
       Route::get('medical-packages', 'package_list');
       Route::get('md-packages-active-list', 'active_package_list');
       Route::get('md-packages-deactive-list', 'deactive_package_list');
       Route::get('medical-packages-view', 'index');
       Route::post('md-add-packages', 'md_add_packages');
        Route::get('/edit-package/{id}', 'edit_package');
        // Route::get('/add-tour', 'add_tour');
        // // Route::get('/login/change_password', 'change_password_view');
        // Route::post('/saveStarRating', 'saveStarRating')->name('saveStarRating');
        // Route::get('/edit-acommodition/{id}', 'edit_acommodition');
        // Route::get('/edit-vehicle/{id}', 'edit_vehicle');
        // Route::get('/edit-tour/{id}', 'edit_tour');
        // Route::get('/add-new-vehical', 'add_new_vehical');
        // Route::post('/delete-acommodition/{id}', 'delete_acommodition');
        // Route::post('/check-old-password', 'check_old_password');
    });
});
Route::group(['middleware' => ['prevent-back-history', 'IsCustomer']], function () {

    Route::controller(UserRegistrationController::class)->group(function () {
        // Route::get('/medical-provider-dashboard', 'dashboard_view');
        Route::get('/my-profile', 'edit_customer');
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




// Route::view('medical-packages', 'front/mdhealth/medical-provider/packages');
// Route::view('medical-packages-view', 'front/mdhealth/medical-provider/medical-packages-view');
// Route::view('medical-account', 'front/mdhealth/medical-provider/account');
// Route::view('medical-other-services', 'front/mdhealth/medical-provider/other-services');
// Route::view('add-acommodition', 'front/mdhealth/medical-provider/add-acommodition');
// Route::view('add-tour', 'front/mdhealth/medical-provider/add-tour');
Route::view('payment-information', 'front/mdhealth/medical-provider/payment-information');
Route::view('medical-roles', 'front/mdhealth/medical-provider/medical-roles');
Route::view('medical-messages', 'front/mdhealth/medical-provider/messages');
Route::view('add-new-message', 'front/mdhealth/medical-provider/add-new-message');
Route::view('person-message', 'front/mdhealth/medical-provider/person-message');
Route::view('live-consultation-appoinment', 'front/mdhealth/medical-provider/live-consultation-appoinment');
Route::view('reports', 'front/mdhealth/medical-provider/reports');
Route::view('reports', 'front/mdhealth/medical-provider/reports');

#Sales

Route::controller(SalesController::class)->group(function(){
    Route::get('medical-provider-sales','index');
   // Route::post('treatment-order-details/{id}','sales_view');
    Route::match(['get', 'post'], 'treatment-order-details/{id}','sales_view');

    //Route::post('store-date-status','status_date_change')->name('status.date.store');

    Route::match(['get', 'post'], 'store-date-status','status_date_change')->name('status.date.store');


});



// USER PANEL
#User Profile
// Route::view('user-profile', 'front/mdhealth/user-panel/user-profile');
Route::view('user-package', 'front/mdhealth/user-panel/user-package');
Route::view('user-reservation', 'front/mdhealth/user-panel/user-reservation');
Route::view('user-credit-card-pay', 'front/mdhealth/user-panel/user-credit-card-pay');
Route::view('user-payment-successfull', 'front/mdhealth/user-panel/user-payment-successfull');
Route::any('my-packages-list', [CustomerPackageController::class, 'my_packages']);
// Route::any('my-profile', [CustomerPackageController::class, 'my_profile']);
// Route::any('user-package-view/{{$id}}', [CustomerPackageController::class, 'view_my_active_packages']);
Route::get('view-my-active-packages/{id}', [CustomerPackageController::class, 'view_my_active_packages'])->name('view-my-active-packages');

Route::view('user-wallet', 'front/mdhealth/user-panel/user-wallet');
Route::view('user-invite', 'front/mdhealth/user-panel/user-invite');
Route::view('user-message', 'front/mdhealth/user-panel/user-message');
Route::view('user-person-message', 'front/mdhealth/user-panel/user-person-message');
Route::view('user-reports', 'front/mdhealth/user-panel/user-reports');
Route::view('user-all-reports', 'front/mdhealth/user-panel/user-all-reports');

// MD BOOKING PAGE KD
Route::view('md-booking-home-page', 'front/mdhealth/md-booking/md-booking-home-page');
Route::view('md-booking-search-hotel-page', 'front/mdhealth/md-booking/md-booking-search-hotel');
Route::view('md-booking-search-flight-page', 'front/mdhealth/md-booking/md-booking-search-flight');
Route::view('md-booking-search-vehicle-page', 'front/mdhealth/md-booking/md-booking-search-vehicle');
Route::view('md-booking-reservation-details-page', 'front/mdhealth/md-booking/md-booking-reservation-details');
Route::view('md-booking-payment-succ-page', 'front/mdhealth/md-booking/md-booking-payment-successful');
Route::view('md-booking-flight-ticket-page', 'front/mdhealth/md-booking/md-booking-flight-ticket');
Route::view('md-booking-sub-flight-ticket-page', 'front/mdhealth/md-booking/md-booking-sub-flight-ticket');


//MD FOOD PAGE KD
Route::view('md-food-home-page', 'front/mdhealth/md-food/md-food-page');
Route::view('md-food-search-page', 'front/mdhealth/md-food/md-food-search');
Route::view('md-food-search-view', 'front/mdhealth/md-food/md-food-view');
Route::view('md-food-purchase-details', 'front/mdhealth/md-food/md-food-purchase-details');


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

// Medical Provider Panel
Route::view('medical-dashboard', 'front/mdhealth/medical-provider');
