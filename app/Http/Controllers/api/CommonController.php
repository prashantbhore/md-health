<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Cities;
use Validator;
use Auth;

class CommonController extends Controller
{
    //
    // country List
    public function get_country_list()
    {
        $countries = Country::where('status', 'active')->select('id', 'country_name')->orderBy('country_name')->get();

        if (!empty($countries)) {
            return response()->json([
                'status' => 200,
                'message' => 'Country list found.',
                'data' => $countries,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Country list is empty.',
            ]);
        }
    }

    // cities list
    public function get_cities_list(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'state_id' => 'required',
        ]);

        $validation_message = '';

        if ($request->state_id == ''
        ) {
            $validation_message .= 'State field';
        }

        if ($validator->fails()) {
           return response()->json([
                'status' => 404,
                'message' =>  $validation_message .' is required.',
            ]);
        }

        $cities = Cities::where('status', 'active')
        ->where('country_id',$request->country_id)
        ->orderBy('city_name')
        ->select('id', 'city_name')
        ->get();

        if (!empty($cities)) {
            return response()->json([
                'status' => 200,
                'message' => 'City list found.',
                'data' => $cities,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'City list is empty.',
            ]);
        }
    }
}
