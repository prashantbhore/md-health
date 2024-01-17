<?php

namespace App\Http\Controllers\admin\ads_and_promo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdsPromoController extends Controller
{
    public function index(){
        return view('admin.ads.ads-promo');
    }
}
