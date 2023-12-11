<?php


use App\Http\Controllers\admin\product\ProductMDhealthPackageController;
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

Route::get('clear', function (){
    \Artisan::call('route:clear');
    \Artisan::call('cache:clear');
    \Artisan::call('view:clear');
    \Artisan::call('config:clear');
    return 'clear';
});

Route::get('common-delete', [BaseController::class, 'delete']);

Route::post('change-status', [BaseController::class,'status'])->name('change-status');

// Route::get('/', function (){
//     return view('admin.authentication.sign-in');
// });



// Super Admin authentication 

Route::get('/', [LoginController::class, 'index']);

Route::post('super-admin-login', [LoginController::class, 'super_admin_login']);

Route::get('logout', [LoginController::class, 'logout']);








// Route::group(['prefix' => 'admin'], function () {

Route::group(['prefix' => 'admin', 'middleware' => ['prevent-back-history', 'superadmin']], function () {

    Route::get('/dashboard', function (){
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
    
    Route::controller(CustomerController::class)->group(function (){
       Route::get('customers', 'index');
       Route::get('/customer-data-table','data_table');
       Route::get('admin/customer-details/{id}','show')->name('customer.details');
       Route::get('customer-delete','delete_customer');
       Route::get('customer-details/{id}','show');
    });



    Route::view('customer-details', 'admin/customers/customer-details');

    // MANAGE VENDORS
    Route::view('vendors', 'admin/vendors/vendors');
    Route::view('vendor-details', 'admin/vendors/vendor-details');
    Route::view('products-on-sale', 'admin/vendors/products-on-sale');

    // MEDICAL TOURISM


    Route::controller(MedicalTourismController::class)->group(function (){
        Route::get('service-provider', 'index');
       // Route::get('service-provider-details','show');
        Route::get('medical-tourism-data-table','data_table');
        Route::get('medical-tourism-details/{id}','show')->name('medical_tourism.details');
        Route::get('medical-tourism-delete','delete_medical_tourism');
        Route::get('medical-tourism-delete-logo','delete_logo');
        Route::get('medical-tourism-delete-license','delete_license');
        Route::get('medical-tourism-delete-gallery','delete_gallery');
        Route::post('medical-tourism-store','store')->name('medical.tourism.store');
        Route::post('verification-status-chnage','verification_status');
        Route::post('vendor-status-chnage','status');
        Route::post('vendor-delete','vendor_delete');
 });
 


  
   

    // MANAGE CITIES

    Route::controller(CityController::class)->group(function (){
        Route::get('/add-cities', 'index');
        Route::post('/add-cities', 'store')->name('add-city');
        Route::get('/city-data-table','data_table');
        Route::get('/cities/{id}/edit','edit_city');
        Route::get('city-delete','delete_city');
    });


    // Route::view('add-cities', 'admin/cities/add-cities');

    // MANAGE CITIES
    Route::view('add-admins', 'admin/admins/add-admins');
    Route::view('edit-admins', 'admin/admins/edit-admins');

    // MLM
    Route::view('multi-level-marketing', 'admin/multi-level-marketing/multi-level-marketing');
    Route::view('earner-details', 'admin/multi-level-marketing/earner-details');

    // BRANDS

    Route::controller(BrandController::class)->group(function (){
        Route::get('brands', 'index');
        Route::post('/add-brands', 'store')->name('add-brand');
        Route::get('/brand-data-table','data_table');
        Route::get('brand-delete','delete_brand');
        Route::get('/brand/{id}/edit','edit_brand');
    });


   

    // PRODUCTS AND CATEGORIES

    Route::controller(ProductController::class)->group(function (){
        Route::get('products-and-categories','index');
    });


 

    # Categories


    
    Route::controller(MDhealthController::class)->group(function (){
        Route::get('category-mdhealth','index');
        Route::post('category-mdhealth-store','store')->name('category.mdhealth.store');
        Route::get('/md-health-data-table','data_table');
        Route::get('product-category-delete','delete_product_category');
        Route::get('/product-category/{id}/edit','edit_product');
    });


    Route::controller(MDshopController::class)->group(function (){
        Route::get('category-mdshop','index');
        Route::post('category-mdshop-store','store')->name('category.mdshop.store');
        Route::get('/md-shop-data-table','data_table');
    });


    Route::controller(MDfoodController::class)->group(function (){
        Route::get('category-mdfood', 'index');
        Route::post('category-mdfood-store','store')->name('category.mdfood.store');
        Route::get('/md-food-data-table','data_table');
    });



    Route::controller(MDHomeServiceController::class)->group(function (){
        Route::get('category-home-service', 'index');
        Route::post('category-md-home-service-store','store')->name('category.md.home.service.store');
        Route::get('/md-home-service-data-table','data_table');
    });










   


    

    Route::view('category-mdbooking', 'admin/products-and-categories/categories/mdbooking');
   
    # Products


    Route::controller(ProductMDhealthPackageController::class)->group(function(){
       Route::get('product-mdhealth','index');
       Route::get('/md-health-package-data-table','data_table');
       Route::get('md-health-package-delete','delete_md_health_package_delete');
       Route::get('product-details/{id}','show');
       Route::post('package-status-chnage','status');
       Route::post('package-delete','package_delete');
       Route::post('package-store','store')->name('package.store');
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
