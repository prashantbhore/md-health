<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Cities;
use App\Models\MakeRequest;
use App\Models\ProductCategory;
use Validator;
use Auth;
use App\Traits\MediaTrait;
use App\Http\Controllers\api\BaseController as BaseController;

class CommonController extends BaseController
{
    //
    // country List
    use MediaTrait;
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

    public function get_country_code_list(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country_id' => 'required', // Ensure that the country_id exists in the countries table
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        // Retrieve the country details including the country code
        $country = Country::find($request->country_id);

        if ($country) {
            return response()->json([
                'status' => 200,
                'message' => 'Country code found.',
                'data' => [
                    'country_id' => $country->id,
                    'country_name' => $country->country_name,
                    'country_code' => $country->country_code,
                ],
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Country not found.',
            ]);
        }
    }

    // cities list

    public function get_cities_list(Request $request)
    {
        // $request->setMethod( 'POST' );
        // dd( $request );
        $validator = Validator::make($request->all(), [
            'country_id' => 'required',
        ]);

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
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $cities = Cities::where('status', 'active')
            ->where('country_id', $request->country_id)
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

    // public function notification_list()
    // {

    //                     $firebaseToken = ['eeaWfJ5aRbGFTWBTLzyciX:APA91bFc5OudH-IZfRZb8b3Brm-WKth3n9WqLq9Ilkck9GH4Qtvoabs_nid7o-BnMZGWs088prKhNiipclIUx_uNTnmgnjwt1CsTCLhoNsCbElSpAmtz3H4SchHK0dS22YJE-vS_9PVF'];

    //                     // $firebaseToken = customer::whereNotNull('device_token')->pluck('device_token')->all();

    //                         $SERVER_API_KEY = 'AAAAfRLNroY:APA91bETDW4x0U8_sGdphiSH8PyFslicneVLKWitwcQq_S9VNhd1R0c2UrboOGCAQNnLLNSK6hZtvbY-kiCSsMOahJX6lp8dUYjSvcQi2N0UN62KZGYpVt2LSD0gdw6B0irBmwHIYClI';

    //                         $data = [
    //                             "registration_ids" => $firebaseToken,
    //                             "notification" => [
    //                                 "title" => 'hiiiiiii',
    //                                 'image'=>'https://buffer.com/cdn-cgi/image/w=1000,fit=contain,q=90,f=auto/library/content/images/size/w1200/2023/10/free-images.jpg',
    //                                 // "body" => strip_tags($notifdata->notification_detail, '<p>'),
    //                                 "content_available" => true,
    //                                 "priority" => "high",
    //                             ]
    //                         ];
    //                         $dataString = json_encode($data);

    //                         $headers = [
    //                             'Authorization: key=' . $SERVER_API_KEY,
    //                             'Content-Type: application/json',
    //                         ];

    //                         $ch = curl_init();

    //                         curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    //                         curl_setopt($ch, CURLOPT_POST, true);
    //                         curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //                         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //                         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //                         curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

    //                         echo $response = curl_exec($ch);
    //         }




    public function get_treatment_list()
    {
        $treatment_list = ProductCategory::where('status', 'active')
            ->select('id', 'product_category_name as treatment_name')
            ->where('main_product_category_id', '1')
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


    public  function make_request_form(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'country' => 'required',
            'contact_no' => 'required',
            'treatment_name' => 'required',
            'details' => 'required',
            'previous_treatment' => 'required',
            'why_do_you_need_treatment' => 'required',
            'travel_visa' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $customer_input = [];
        $customer_input['first_name'] = $request->first_name;
        $customer_input['last_name'] = $request->last_name;
        $customer_input['email'] = $request->email;
        $customer_input['contact_no'] = $request->contact_no;
        $customer_input['country'] = $request->country;
        $customer_input['treatment_name'] = $request->treatment_name;
        $customer_input['details'] = $request->details;
        $customer_input['why_do_you_need_treatment'] = $request->why_do_you_need_treatment;
        $customer_input['travel_visa'] = $request->travel_visa;

        if ($request->has('treatment_image_path')) {
            if ($request->file('treatment_image_path')) {
                $md_provider_input['treatment_image_path'] = $this->verifyAndUpload($request, 'treatment_image_path', 'makereequest/images');
                $original_name = $request->file('treatment_image_path')->getClientOriginalName();
                $md_provider_input['treatment_image_name'] = $original_name;
            }
        }
        $MakeRequest = MakeRequest::create($customer_input);

        if (!empty($MakeRequest)) {
            return response()->json([
                'status' => 200,
                'message' => 'Form submitted successfully.',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong.',
            ]);
        }
    }
}
