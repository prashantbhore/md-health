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
    return view('admin.dashboard.dashboard');
});

// DASHBOARD
Route::view('dashboard', 'admin/dashboard/dashboard');

// SALES
Route::view('sales', 'admin/sales/sales');
Route::view('sales-details', 'admin/sales/sales-details');
Route::view('md-profit', 'admin/sales/md-profit');
Route::view('md-booking-sales', 'admin/sales/md-booking-sales');

// MANAGE CUSTOMERS
Route::view('customers', 'admin/manage-customers/customers');
Route::view('customer-details', 'admin/manage-customers/customer-details');

// MANAGE VENDORS
Route::view('vendors', 'admin/manage-vendors/vendors');