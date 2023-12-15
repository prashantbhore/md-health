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
        $countries = Country::get();
        $cities = Cities::get();
        return view('front/mdhealth/authentication/user-account', compact('countries', 'cities'));
    }
}
