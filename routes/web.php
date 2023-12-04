<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\master\CityController;

use App\Http\Controllers\admin\BaseController;
use App\Http\Controllers\admin\customer\CustomerController;
use App\Http\Controllers\admin\login\LoginController;
use App\Http\Controllers\admin\master\BrandController;
use App\Http\Controllers\admin\medical_tourism\MedicalTourismController;

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

Route::post('change-status', [BaseController::class, 'status'])->name('change-status');

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

        Route::get('service-provider-details','show');
    
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
    Route::view('products-and-categories', 'admin/products-and-categories/products-and-categories');
    # Categories
    Route::view('category-mdhealth', 'admin/products-and-categories/categories/mdhealth');
    Route::view('category-mdshop', 'admin/products-and-categories/categories/mdshop');
    Route::view('category-mdfood', 'admin/products-and-categories/categories/mdfood');
    Route::view('category-mdbooking', 'admin/products-and-categories/categories/mdbooking');
    Route::view('category-home-service', 'admin/products-and-categories/categories/home-service');
    # Products
    Route::view('product-mdhealth', 'admin/products-and-categories/products/mdhealth');
    Route::view('product-details', 'admin/products-and-categories/products/product-details');

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
