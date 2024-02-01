<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cities;

class GetCityController extends Controller {
    public function get_cities_of_country( $country_id ) {
        $cities = Cities::where( 'country_id', $country_id )->get();
        // Assuming you have a blade partial for cities dropdown options
        return request()->json( [
            'cities' => $cities
        ] );
    }
}
