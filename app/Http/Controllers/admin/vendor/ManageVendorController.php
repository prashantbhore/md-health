<?php

namespace App\Http\Controllers\admin\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cities;
use App\Models\Packages;
use DataTables;
use Crypt;
use DB;
use App\Library\LogActivity;


class ManageVendorController extends Controller
{
    public function index(){
        return view('admin.vendors.vendors');
    }
    
}
