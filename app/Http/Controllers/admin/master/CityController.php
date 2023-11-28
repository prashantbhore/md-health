<?php

namespace App\Http\Controllers\admin\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cities;
use App\Models\Country;

class CityController extends Controller
{

    public function index(){
        return view('admin.cities.add-cities');
    }


}
