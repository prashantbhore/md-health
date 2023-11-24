<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('admin.authentication.sign-in');
});
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
Route::view('customers', 'admin/customers/customers');
Route::view('customer-details', 'admin/customers/customer-details');

// MANAGE VENDORS
Route::view('vendors', 'admin/vendors/vendors');
Route::view('vendor-details', 'admin/vendors/vendor-details');
Route::view('products-on-sale', 'admin/vendors/products-on-sale');

// MEDICAL TOURISM
Route::view('service-provider', 'admin/medical-tourism/service-provider');
Route::view('service-provider-details', 'admin/medical-tourism/service-provider-details');

// MANAGE CITIES
Route::view('add-cities', 'admin/cities/add-cities');

// MANAGE CITIES
Route::view('add-admins', 'admin/admins/add-admins');
Route::view('edit-admins', 'admin/admins/edit-admins');

// MLM
Route::view('multi-level-marketing', 'admin/multi-level-marketing/multi-level-marketing');
Route::view('earner-details', 'admin/multi-level-marketing/earner-details');

// BRANDS
Route::view('brands', 'admin/brands/brands');

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
Route::view('product-mdshop', 'admin/products-and-categories/products/mdshop');
Route::view('product-mdfood', 'admin/products-and-categories/products/mdfood');
Route::view('product-mdbooking', 'admin/products-and-categories/products/mdbooking');
Route::view('product-home-service', 'admin/products-and-categories/products/home-service');
