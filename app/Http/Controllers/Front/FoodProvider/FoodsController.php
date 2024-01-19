<?php

namespace App\Http\Controllers\Front\FoodProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FoodsController extends Controller
{
    public function index(){
        return view('front/mdhealth/food-provider/food_provider_foods');
    }
    public function add_food(){
        return view('front/mdhealth/food-provider/food_provider_foods_view');
    }
}
