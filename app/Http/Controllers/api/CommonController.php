<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Cities;

use App\Models\ProductCategory;
use Validator;
use Auth;
use App\Http\Controllers\api\BaseController as BaseController;

class CommonController extends BaseController {
    //
    // country List

    public function get_country_list() {
        $countries = Country::where( 'status', 'active' )->select( 'id', 'country_name' )->orderBy( 'country_name' )->get();

        if ( !empty( $countries ) ) {
            return response()->json( [
                'status' => 200,
                'message' => 'Country list found.',
                'data' => $countries,
            ] );
        } else {
            return response()->json( [
                'status' => 404,
                'message' => 'Country list is empty.',
            ] );
        }
    }

    // cities list

    public function get_cities_list( Request $request ) {
        // $request->setMethod( 'POST' );
        // dd( $request );
        $validator = Validator::make( $request->all(), [
            'country_id' => 'required',
        ] );

        // $validation_message = '';

        // if ( $request->state_id == ''
        // ) {
        //     $validation_message .= 'State field';
        // }

        // if ( $validator->fails() ) {
        //    return response()->json( [
        //         'status' => 404,
        //         'message' =>  $validation_message .' is required.',
        // ] );
        // }
        if ( $validator->fails() ) {
            return $this->sendError( 'Validation Error.', $validator->errors() );
        }

        $cities = Cities::where( 'status', 'active' )
        ->where( 'country_id', $request->country_id )
        ->orderBy( 'city_name' )
        ->select( 'id', 'city_name' )
        ->get();

        if ( !empty( $cities ) ) {
            return response()->json( [
                'status' => 200,
                'message' => 'City list found.',
                'data' => $cities,
            ] );
        } else {
            return response()->json( [
                'status' => 404,
                'message' => 'City list is empty.',
            ] );
        }
    }


    
    public function get_treatment_list()
    {
        $treatment_list=ProductCategory::where('status','active')
        ->select('id','product_category_name as treatment_name')
        ->where('main_product_category_id','1')
        ->get();

        // if(!empty($treatment_list)){
        //     foreach($treatment_list as $key=>$val)
        //     {
        //         $treatment_list['id'] = !empty($val->id) ? $val->id : '';

        //         $treatment_list['treatment_name']=!empty($val->treatment_name)? $val->treatment_name:'';
        //     }
        // }

        if (!empty($treatment_list)) {
            return response()->json([
                'status' => 200,
                'message' => 'Treatment list found.',
                'treatment_list' => $treatment_list,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Treatment list is empty.',
            ]);
        }
    }
}
