<?php

namespace App\Http\Controllers\Front\Registration;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\Country;
use Illuminate\Http\Request;

class MedicalProviderRegistrationController extends Controller
{
    public function index()
    {
        $countries=Country::get();
        $cities=Cities::get();
        // dd($countries);
return view('front/mdhealth/registration/user-account',compact('countries','cities'));




    }
}
