<?php

namespace App\Http\Controllers;

use App\Models\Cities;

class GetCityController extends Controller
{
    public function get_cities_of_country($country_id)
    {
        // dd($country_id);
        $cities = Cities::where('country_id', $country_id)->get();
        if ($cities->isEmpty()) {
            return response()->json([
                'message' => 'no cities found',
            ], 404);
        }
        $new_city[] = [];
        foreach ($cities as $key => $city) {
            $new_city[$key]['id'] = $city->id;
            $new_city[$key]['city_name'] = $city->city_name;
        }
        $cities = $new_city;
        // dd($cities);
        // Assuming you have a blade partial for cities dropdown options
        return response()->json([
            'message' => 'cities found',
            'cities' => $cities,
        ]);
    }
}
