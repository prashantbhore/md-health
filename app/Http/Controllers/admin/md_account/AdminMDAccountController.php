<?php

namespace App\Http\Controllers\admin\md_account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminMDAccountController extends Controller
{
     public function index(){
        return view('admin.payments.bank-accounts');
     }
}
