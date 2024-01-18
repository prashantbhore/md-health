<?php

use App\Http\Controllers\Front\MedicalProvider\MedicalProviderReports;
use App\Http\Controllers\Front\MedicalProvider\RolesController;
use App\Http\Controllers\admin\admin\AdminController;
use App\Http\Controllers\admin\ads_and_promo\AdsPromoController;
use App\Http\Controllers\admin\product\ProductMDhealthPackageController;
use App\Http\Controllers\Front\Login\CommonLoginController;
use App\Http\Controllers\Front\Customer\CustomerPackageController;
use App\Http\Controllers\Front\Login\MedicalProviderLogin;
use App\Http\Controllers\Front\MedicalProvider\OtherServicesController;
use App\Http\Controllers\Front\MedicalProvider\PackageController;
use App\Http\Controllers\Front\Registration\MedicalProviderRegistrationController;
use App\Http\Controllers\Front\Registration\UserRegistrationController;
use App\Http\Controllers\Front\Mdhome\MdHomeController;
use App\Http\Controllers\Front\MdBooking\MdBookingController;
use App\Http\Controllers\Front\MdFood\MdFoodsController;
use App\Http\Controllers\Front\MdShop\MdShoppingController;
use App\Http\Controllers\Front\Registration\VendorRegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\master\CityController;
use App\Http\Controllers\admin\BaseController;
use App\Http\Controllers\admin\customer\CustomerController;
use App\Http\Controllers\admin\login\LoginController;
use App\Http\Controllers\admin\master\BrandController;
use App\Http\Controllers\admin\master\countryController;
use App\Http\Controllers\admin\medical_tourism\MedicalTourismController;
use App\Http\Controllers\admin\product\MDfoodController;
use App\Http\Controllers\admin\product\MDhealthController;
use App\Http\Controllers\admin\product\MDHomeServiceController;
use App\Http\Controllers\admin\product\MDshopController;
use App\Http\Controllers\admin\product\ProductCategoryController;
use App\Http\Controllers\admin\product\ProductController;
use App\Http\Controllers\admin\review\reviewController;
use App\Http\Controllers\admin\vendor\ManageVendorController;
use App\Http\Controllers\api\MedicalProvider\UpdateMedicalProfileController;
use App\Http\Controllers\Front\MedicalProvider\SalesController;
use App\Http\Controllers\Front\MedicalProvider\UpdateProfileController;
use App\Http\Controllers\Front\Vendor\VendorProductController;
use App\Http\Controllers\Front\MedicalProvider\MedicalProviderDashboradController;
use App\Http\Controllers\Front\MedicalProvider\PaymentController;
use App\Http\Controllers\Front\Registration\FoodProviderController;
use App\Http\Controllers\Front\Vendor\UpdateVendorProfileController;
use App\Http\Controllers\Front\FoodProvider\UpdateFoodProviderAccount;
use App\Http\Controllers\Front\Vendor\VendorSalesController;
use App\Models\MedicalProviderLogo;

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






// ===============================================================================================
// =============================Admin Routes Start=================================================
// =================================================================================================
// Super Admin Routes Start From Here By Mplus03

Route::get('common-delete', [BaseController::class, 'delete']);

Route::post('change-status', [BaseController::class, 'status'])->name('change-status');

Route::get('/super-admin', [LoginController::class, 'index']);

Route::post('super-admin-login', [LoginController::class, 'super_admin_login']);

Route::get('logout', [LoginController::class, 'logout']);

Route::group(['prefix' => 'admin', 'middleware' => ['prevent-back-history', 'superadmin']], function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard.dashboard');
    });

    Route::view('sign-in', 'admin/authentication/sign-in');

    //Admin DASHBOARD
    Route::view('dashboard', 'admin/dashboard/dashboard');

    //Admin SALES
    Route::view('sales', 'admin/sales/sales');
    Route::view('sales-details', 'admin/sales/sales-details');
    Route::view('md-profit', 'admin/sales/md-profit');
    Route::view('md-booking-sales', 'admin/sales/md-booking-sales');

    //Admin MANAGE CUSTOMERS

    Route::controller(CustomerController::class)->group(function () {
        Route::get('customers', 'index');
        Route::get('/customer-data-table', 'data_table');
        Route::get('admin/customer-details/{id}', 'show')->name('customer.details');
        Route::get('customer-delete', 'delete_customer');
        Route::get('customer-details/{id}', 'show');
    });



    Route::view('customer-details', 'admin/customers/customer-details');

    //Admin MANAGE VENDORS
   
   
  
    
    

    Route::view('products-on-sale', 'admin/vendors/products-on-sale');



    Route::view('approved-vendor-details', 'admin/vendors/approved-vendor-details');

    Route::view('pending-vendor-details', 'admin/vendors/pending-vendor-details');

    Route::view('rejected-vendor-details', 'admin/vendors/rejected-vendor-details');


    Route::controller(ManageVendorController::class)->group(function (){
       // Route::get('vendors','index');

        Route::get('pending-vendors', 'pending_vendors');

        Route::get('pending-vendors-data-table','pending_vendor_data_table');


        Route::get('approved-vendors', 'approved_vendors');

        Route::get('approved-vendors-data-table','approved_vendor_data_table');

        Route::get('rejected-vendors','rejected_vendors');

        Route::get('rejected-vendors-data-table','rejected_vendor_data_table');

        Route::get('vendor-delete','vendor_delete');

        Route::get('view-vendor-details/{id}/{vendor_type}','vendor_view')->name('view.vendor.details');


        Route::post('vendor-store', 'store')->name('vendor.store');

        Route::post('approve-vendor', 'approve_vendor')->name('approve.vendor');

        Route::post('reject-vendor','reject_vendor')->name('reject.vendor');

        Route::post('delete-vendor','delete_vendor')->name('delete.vendor');


      



    });



    //Admin MEDICAL TOURISM

    // Route::controller(MedicalTourismController::class)->group(function () {
    //     Route::get('service-provider', 'index');
    //     // Route::get('service-provider-details','show');
    //     Route::get('medical-tourism-data-table', 'data_table');
    //     Route::get('medical-tourism-details/{id}', 'show')->name('medical_tourism.details');
    //     Route::get('medical-tourism-delete', 'delete_medical_tourism');
    //     Route::get('medical-tourism-delete-logo', 'delete_logo');
    //     Route::get('medical-tourism-delete-license', 'delete_license');
    //     Route::get('medical-tourism-delete-gallery', 'delete_gallery');
    //     Route::post('medical-tourism-store', 'store')->name('medical.tourism.store');
    //     Route::post('verification-status-chnage', 'verification_status');
    //     Route::post('vendor-status-chnage', 'status');
    //     //Route::post('vendor-delete', 'vendor_delete');
    //     Route::post('/admin-delete-package','package_delete');
    // });



    //Admin  MANAGE Country

    Route::controller(countryController::class)->group(function () {
        Route::get('add-country', 'index');
        Route::post('/add-country', 'store')->name('add-country');
        Route::get('/country-data-table', 'data_table');
        Route::get('/country/{id}/edit', 'edit_country');
        Route::get('country-delete', 'country_delete');
    });




    //Admin  MANAGE CITIES

    Route::controller(CityController::class)->group(function () {
        Route::get('/add-cities', 'index');
        Route::post('/add-cities', 'store')->name('add-city');
        Route::get('/city-data-table', 'data_table');
        Route::get('/cities/{id}/edit', 'edit_city');
        Route::get('city-delete', 'delete_city');
    });

    //Admin  MANAGE CITIES



    //Admin  MANAGE CITIES

    Route::controller(AdminController::class)->group(function () {
        Route::get('add-admins', 'index');
        Route::post('admin-store', 'store')->name('admin.store');
        Route::get('/admin-data-table', 'data_table');
        Route::get('/edit-admins/{id}/edit', 'edit_admin');
    });




    //Admin  MLM
    Route::view('multi-level-marketing', 'admin/multi-level-marketing/multi-level-marketing');
    Route::view('earner-details', 'admin/multi-level-marketing/earner-details');

    //Admin BRANDS

    Route::controller(BrandController::class)->group(function () {
        Route::get('brands', 'index');
        Route::post('/add-brands', 'store')->name('add-brand');
        Route::get('/brand-data-table', 'data_table');
        Route::get('brand-delete', 'delete_brand');
        Route::get('/brand/{id}/edit', 'edit_brand');
    });




    //Admim PRODUCTS AND CATEGORIES

    Route::controller(ProductController::class)->group(function () {
        Route::get('products-and-categories', 'index');
    });

    #Admin Categories
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

    #Admin Products
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

    //Admin PAYMENTS
    Route::view('payments', 'admin/payments/payments');
    Route::view('completed-payments', 'admin/payments/completed-payments');
    Route::view('bank-accounts', 'admin/payments/bank-accounts');
    Route::view('payment-requests', 'admin/payments/payment-requests');

    //Admin REVIEWS




    Route::controller(reviewController::class)->group(function () {
        Route::get('pending-reviews', 'pendingReview');
        Route::get('published-reviews', 'publishedReview');
    });



    //Admin NOTIFICATIONS
    Route::view('notifications', 'admin/notifications/notifications');

    //Admin ADS & PROMO

    Route::controller(AdsPromoController::class)->group(function () {
        Route::get('ads-promo','index')->name('filter.ads');
        Route::post('ads-store-promo','store')->name('store.ads');

        Route::get('ads-edit/{id}','edit');

        Route::get('ads-delete/{id}','delete')->name('ads.delete');


    });

   



    Route::view('featured', 'admin/ads/featured');
    //Admin MANAGE REQUEST
    Route::view('manage-request', 'admin/manage-request/manage-request');

    //Admin MANAGE MD FOODS
    Route::view('food-suppliers', 'admin/manage-md-foods/food-suppliers');
    Route::view('food-supplier-details', 'admin/manage-md-foods/food-supplier-details');
});


// Super Admin Routes End Here From Here By Mplus03


// ===============================================================================================
// =============================Admin Routes Start=================================================
// =================================================================================================








//Home Service Routes
Route::get(
    'home-service',
    [MdhomeController::class, 'home']
    // return view('front.mdHome.index');
);

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


//mdShop Routes
// {{-- mplus04 --}}
Route::get('mdShop', [MdShoppingController::class, 'mdshop_home']);
Route::post('get-product', [MdShoppingController::class, 'get_product']);
Route::get('featured-product', [MdShoppingController::class, 'featured_product']);
Route::get('product/{id}', [MdShoppingController::class, 'product_view']);
Route::get('view-products/{id}', [MdShoppingController::class, 'view_all_products']);
Route::get('cart', [MdShoppingController::class, 'cart']);
Route::get('view-products', [MdShoppingController::class, 'catgorywisefilter']);

// Route::get('cart', function () {
//     return view('front.mdShop.cart');
// });

// Route::get('product', function () {
//     return view('front.mdShop.product');
// });

Route::get('payment-status-shop', function () {
    return view('front.mdShop.paymentStatus');
});

// Route::get('view-products', function () {
//     return view('front.mdShop.categorisedProduct');
// });
// {{-- mplus04 --}}




// mdFood Routes
Route::get('mdFoods', [MdFoodsController::class, 'mdfood_home']);

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


// FRONT ROUTES
#User Account
// Route::view('user-account', 'front/mdhealth/authentication/user-account');
// Route::view('medical-provider-login', 'front/mdhealth/authentication/medical-provider-login');
// Route::view('vendor-login', 'front/mdhealth/authentication/vendor-login');


#Sign In
Route::view('sign-in-web', 'front/mdhealth/authentication/sign-in');
#SMS Code
Route::view('sms-code', 'front/mdhealth/authentication/sms-code');
// Route::post('md-register-medical-provider', [RegistrationController::class, 'md_register_medical_provider']);
Route::controller(MedicalProviderRegistrationController::class)->group(function () {
    Route::get('user-account', 'index');
    Route::post('md-city-list', 'get_cities_list');
    Route::get('medical-provider-login', 'indexmedpro');
    Route::get('vendor-login', 'vendor_login');
    Route::post('/md-register-medical-provider', 'md_register_medical_provider');
    Route::get('/logout', 'logout');
});
Route::controller(UserRegistrationController::class)->group(function (){
    // Route::get('user-account', 'index');
    Route::post('/md-customer-register', 'customer_register');
    // Route::get('/logout','logout');

});
Route::controller(VendorRegistrationController::class)->group(function () {
    // Route::get('user-account', 'index');
    Route::post('/md-vendor-register', 'vendor_register');
    // Route::get('/logout','logout');

});
Route::controller(CommonLoginController::class)->group(function () {
    Route::post('user-login', 'user_login');
    Route::post('/otp-verify', 'otp_verify_for_register');
    Route::post('/number-to-mobile', 'number_to_mobile');
    Route::post('/number-password-exist', 'number_password_exist');
    Route::post('/email-or-mobile-exist', 'email_or_mobile_exist');
});
//     Route::post('/otp-verify','otp_verify_for_register');
//     Route::post('/email-to-mobile','email_to_mobile');
//     Route::post('/email-password-exist','email_password_exist');

//  });
// AUTHENTICATION

Route::group(['middleware' => ['prevent-back-history', 'IsMedicalProvider']], function () {

    Route::controller(UpdateProfileController::class)->group(function () {
        Route::get('medical-account', 'update_medical_profile_list');
        Route::post('md-update-medical-profile', 'update_medical_provider_profile');
        Route::post('md-delete-provider-images-videos', 'delete_provider_images_videos');
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
        Route::post('/delete-acommodition/{id}', 'delete_acommodition');
    });

    Route::controller(PackageController::class)->group(function () {
        Route::get('medical-packages', 'package_list');
        Route::get('md-packages-active-list', 'active_package_list');
        Route::get('md-packages-deactive-list', 'deactive_package_list');
        Route::get('medical-packages-view', 'index');
        Route::post('md-add-packages', 'md_add_packages');
        Route::get('/edit-package/{id}', 'edit_package');
        Route::post('/md-packages-active-list-search', 'md_packages_active_list_search');
        Route::post('/md-packages-inactive-list-search', 'md_packages_inactive_list_search');

    });
    // Mplus04
    Route::controller(RolesController::class)->group(function () {
        Route::get('/medical-roles', 'index');
        Route::post('/roles-add', 'roles_add');
        Route::get('/edit-role/{id}', 'edit_role');
    });
    // Mplus04

    //Code By  Mplus03
    Route::controller(PaymentController::class)->group(function () {
        Route::get('payment-information', 'index');
        Route::post('store-vendor-bank-details', 'storeBankDetails')->name('store.vendor.bank.details');
    });

    Route::controller(MedicalProviderReports::class)->group(function () {
        Route::get('reports', 'index');
        Route::post('provider-reports-list', 'report_list');
        Route::post('add-reports', 'addReport')->name('add.report');
    });


    #Sales By Mplus03

    Route::controller(SalesController::class)->group(function () {
        Route::get('medical-provider-sales', 'index');
        Route::match(['get', 'post'], 'treatment-order-details/{id}', 'sales_view');
        Route::match(['get', 'post'], 'store-date-status', 'status_date_change')->name('status.date.store');
        Route::match(['get', 'post'], 'assign-case-manager', 'assign_case_manager')->name('assign.case.manager');
        Route::match(['get', 'post'], 'sales-search', 'sales_search')->name('sales.search');
    });


    #Medical Provider Dashboard By Mplus03
    Route::controller(MedicalProviderDashboradController::class)->group(function () {
        Route::get('medical-provider-dashboard', 'index');
    });


});


Route::group(['middleware' => ['prevent-back-history', 'IsVendor']], function (){

    Route::controller(VendorProductController::class)->group(function () {
        Route::get('/vendor-dashboard', 'vendor_dashboard');
        Route::get('/vendor-products', 'vendor_products');
        Route::get('/vendor-add-products', 'vendor_add_products');
        Route::post('add-vendor-product', 'add_vendor_product');
        Route::get('md-vendor-active-list', 'active_product_list');
        Route::get('md-vendor-deactive-list', 'deactive_product_list');
        Route::get('/edit-product/{id}', 'edit_product');
        Route::post('vendor-active-product-search', 'active_vendor_search_products');
        Route::post('vendor-inactive-product-search', 'inactive_vendor_search_products');
    });

    Route::controller(UpdateVendorProfileController::class)->group(function (){
        Route::get('vendor-account', 'update_vendor_profile_list');
        Route::post('md-update-vendor-profile', 'update_vendor_profile');
        Route::post('md-delete-vendor-images-videos', 'delete_vendor_images_videos');

    });



    Route::controller(VendorSalesController::class)->group(function (){
        
        Route::get('vendor-sales','index');

    });

    // Route::view('vendor-sales', 'front/mdhealth/vendor/vendor_sales');

    Route::view('vendor-order-view', 'front/mdhealth/vendor/vendor_order_view');
    //Route::view('vendor-order-view', 'front/mdhealth/vendor/vendor_order_view');








});


//Mplus02
Route::get('/', [CustomerPackageController::class, 'customer_home']);
Route::any('health-search-result', [CustomerPackageController::class, 'customer_package_search_filter']);
Route::any('health-pack-details', [CustomerPackageController::class, 'packages_view_on_search_result']);


// Route::any('myself_as_patient/{id}', [CustomerPackageController::class, 'myself_as_patient'])->name('myself_as_patient');
Route::any('test', [CustomerPackageController::class, 'test']);
Route::post('complete_3ds', [CustomerPackageController::class, 'complete_3ds']);

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

    //Customer Report Controller Code By Mpluss03
    Route::any('user-all-reports', [CustomerPackageController::class, 'customer_reports']);
    Route::post('user-all-reports-search', [CustomerPackageController::class, 'customer_report_search']);



    //Mplus02
    Route::post('purchase-by-mdcoins',[CustomerPackageController::class,'purchase_by_mdcoins']);
    Route::any('myself_as_patient/{id}', [CustomerPackageController::class, 'myself_as_patient'])->name('myself_as_patient');
    Route::post('user-credit-card-pay', [CustomerPackageController::class, 'complete_pending_payment']);
    Route::get('view-my-active-packages/{id}/{purchase_id}', [CustomerPackageController::class, 'view_my_active_packages'])->name('view-my-active-packages');
    Route::any('my-packages-list', [CustomerPackageController::class, 'my_packages']);
    Route::any('purchase-package/{id}/{patient_id}', [CustomerPackageController::class, 'purchase_package'])->name('purchase-package');
    Route::any('user-favorites', [CustomerPackageController::class, 'user_favorites']);
    Route::any('sandbox', [CustomerPackageController::class, 'sandbox']);

});







//Food Vendor Route Starts By Mplus03

Route::get('food-provider-register', [FoodProviderController::class, 'index']);
Route::post('create-food-provider-account', [FoodProviderController::class, 'food_vendor_register']);

Route::group(['middleware' => ['prevent-back-history', 'isFoodVendor']], function () {


    Route::view('food-provider-panel-dashboard', 'front/mdhealth/food-provider/food_provider_panel_dashboard');
    Route::view('food-provider-sales', 'front/mdhealth/food-provider/food_provider_sales');
    Route::view('food-provider-view', 'front/mdhealth/food-provider/food_provider_view');
    Route::view('food-provider-foods', 'front/mdhealth/food-provider/food_provider_foods');
    Route::view('food-provider-foods-view', 'front/mdhealth/food-provider/food_provider_foods_view');



    Route::get('food-provider-account', [UpdateFoodProviderAccount::class, 'update_food_profile_list']);

    Route::post('update-food-provider-account', [UpdateFoodProviderAccount::class, 'update_food_profile']);

    Route::post('md-delete-food-provider-images-videos', [UpdateFoodProviderAccount::class, 'delete_food_provider_images_videos']);



});

//Food Vendor Route Ends By Mplus03


Route::any('purchase-package/{id}', [CustomerPackageController::class, 'purchase_package'])->name('purchase-package');




// MEDICAL PROVIDER

Route::view('medical-messages', 'front/mdhealth/medical-provider/messages');
Route::view('add-new-message', 'front/mdhealth/medical-provider/add-new-message');
Route::view('person-message', 'front/mdhealth/medical-provider/person-message');
Route::view('live-consultation-appoinment', 'front/mdhealth/medical-provider/live-consultation-appoinment');


// USER PANEL
#User Profile
Route::view('user-reservation', 'front/mdhealth/user-panel/user-reservation');

Route::view('user-payment-successfull', 'front/mdhealth/user-panel/user-payment-successfull');

Route::view('user-wallet', 'front/mdhealth/user-panel/user-wallet');
Route::view('user-invite', 'front/mdhealth/user-panel/user-invite');
Route::view('user-message', 'front/mdhealth/user-panel/user-message');
Route::view('user-person-message', 'front/mdhealth/user-panel/user-person-message');
Route::view('user-live-appoinment', 'front/mdhealth/user-panel/live-consultation-appoinment');

Route::view('user-reports', 'front/mdhealth/user-panel/user-reports');



// MD BOOKING PAGE KD
// 'front/mdhealth/md-booking/md-booking-home-page'
Route::any('md-booking-home-page', [MdBookingController::class, 'mdbooking_home']);
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







// Medical Provider Panel
Route::view('medical-dashboard', 'front/mdhealth/medical-provider');

Route::view('live-cam', 'front/mdhealth/medical-provider/live-cam');

// USER PANEL
#Orders
Route::view('user-orders', 'front/mdhealth/user-panel/user-orders');

Route::view('membership', 'front/mdhealth/medical-provider/membership');
Route::view('welcome', 'welcome');

