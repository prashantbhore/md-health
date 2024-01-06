<?php

namespace App\Http\Controllers\Front\Customer;

use App\Http\Controllers\Controller;
use App\Models\PatientInformation;
use App\Models\CustomerRegistration;
use App\Models\Cities;
use App\Models\Country;
use App\Models\Packages;
use App\Models\ProductCategory;
use App\Services\ApiService;
use App\Traits\MediaTrait;
use Auth;
use Illuminate\Http\Request;
use Session;
use Storage;
use Validator;

class CustomerPackageController extends Controller
{
    use MediaTrait;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function customer_home()
    {

        return view('front.mdhealth.index');
    }
    public function test(Request $request){

        $token = null;
        $apiUrl = url( '/api/md-register-medical-provider' );

        $method = 'POST';
        $body = $request->all();
        $plainArray = $body instanceof \Illuminate\Support\Collection ? $body->toArray() : $body;

        if($request->hasFile('company_logo_image_path') && $request->hasFile('company_licence_image_path')){
            $image=[];
            $image_name=[];
            if ($request->hasFile('company_logo_image_path') && $request->file('company_logo_image_path')->isValid()) {
                $image[] = $request->file('company_logo_image_path');
                $image_name[] = 'company_logo_image_path';
            }
            if ($request->hasFile('company_licence_image_path') && $request->file('company_licence_image_path')->isValid()) {
                $image[] = $request->file('company_licence_image_path');
                $image_name[] = 'company_licence_image_path';
            }

            $responseData = $this->apiService->getData($token,$apiUrl,$body,$method,$image,$image_name);
        }
        else{
            $responseData = $this->apiService->getData($token,$apiUrl,$body,$method);
        }
    }

    public function purchase_package($id)
    {

        return view('front.mdhealth.purchase', compact('id'));
    }

    public function customer_package_search_filter(Request $request)
    {
        // return 'asd ';
        // return dd( $request );
        $packages = Packages::select(
            'md_packages.id',
            'md_packages.package_unique_no',
            'md_packages.package_name',
            'md_packages.treatment_period_in_days',
            'md_packages.other_services',
            'md_packages.package_price',
            'md_packages.sale_price',
            'md_product_category.product_category_name',
            'md_product_sub_category.product_sub_category_name',
            'md_master_cities.city_name'
        )
        // ->where( 'md_packages.status', 'active' )
        // ->where( 'md_product_category.status', 'active' )
        // ->where( 'md_product_sub_category.status', 'active' )
        // ->where( 'md_packages.purchase_status', 'not_purchased' )
        // ->leftjoin( 'md_customer_purchase_details', 'md_customer_purchase_details.package_id', '=', 'md_packages.id' )
            ->leftjoin('md_product_category', 'md_packages.treatment_category_id', '=', 'md_product_category.id')
            ->leftjoin('md_product_sub_category', 'md_packages.treatment_id', '=', 'md_product_sub_category.id')
            ->leftjoin('md_medical_provider_register', 'md_medical_provider_register.id', '=', 'md_packages.created_by')
            ->leftjoin('md_master_cities', 'md_medical_provider_register.city_id', '=', 'md_master_cities.id');

        if (!empty($request->treatment_name)) {
            $packages = $packages->where('md_product_category.product_category_name', 'like', '%' . $request->treatment_name . '%');
        }
        if (!empty($request->city_name)) {
            $packages = $packages->orWhere('md_master_cities.city_name', 'like', '%' . $request->city_name . '%');
        }
        $packages = $packages->get();
        if (!empty($packages)) {
            foreach ($packages as $key => $value) {
                $packages[$key]['id'] = !empty($value->id) ? $value->id : '';
                $packages[$key]['package_unique_no'] = !empty($value->package_unique_no) ? $value->package_unique_no : '';
                $packages[$key]['package_name'] = !empty($value->package_name) ? $value->package_name : '';
                $packages[$key]['treatment_period_in_days'] = !empty($value->treatment_period_in_days) ? $value->treatment_period_in_days : '';
                $packages[$key]['other_services'] = !empty($value->other_services) ? explode(',', $value->other_services) : '';
                $packages[$key]['package_price'] = !empty($value->package_price) ? $value->package_price : '';
                $packages[$key]['sale_price'] = !empty($value->sale_price) ? $value->sale_price : '';
                $packages[$key]['product_category_name'] = !empty($value->product_category_name) ? $value->product_category_name : '';
                $packages[$key]['product_sub_category_name'] = !empty($value->product_sub_category_name) ? $value->product_sub_category_name : '';
                $packages[$key]['city_name'] = !empty($value->city_name) ? $value->city_name : '';
            }
        }

        // print_r( $request );

        if ($packages->count() > 0) {
            $cities = Cities::where('status', 'active')->where('country_id', 1)->get();
            $treatment_plans = ProductCategory::where('status', 'active')->where('main_product_category_id', '1')->get();

            $treatment_name = $request->treatment_name ?? 'Select Treatment';
            // $city_name = $packages[ 0 ][ 'city_name' ] ?? 'Select City' ?? $request->city_name;
            $date = $request->daterange ?? '';
            $city_name = $request->city_name ?? 'Select City';

            $counties = Country::all();

            return view('front.mdhealth.searchResult', compact('packages', 'cities', 'treatment_plans', 'city_name', 'treatment_name', 'counties', 'date'));

        } else {
            $counties = Country::all();
            $city_name = $request->city_name ?? 'Select City';
            $treatment_name = $request->treatment_name ?? 'Select Treatment';
            $date = $request->daterange ?? '';
            $cities = Cities::where('status', 'active')->where('country_id', 1)->get();
            $treatment_plans = ProductCategory::where('status', 'active')->where('main_product_category_id', '1')->get();
            return view('front.mdhealth.searchResult', compact('cities', 'treatment_plans', 'city_name', 'treatment_name', 'counties', 'date'));

        }

    }

    public function packages_view_on_search_result(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $id = $request->id;

        $packages_view = Packages::with(['provider', 'providerGallery', 'provider.city'])->where('id', $id)->first();

        if (!empty($packages_view)) {

            $provider_gallery = [];
            foreach ($packages_view->providerGallery as $val) {
                $provider_gallery[] = !empty($val->provider_image_path) ? url(Storage::url($val->provider_image_path)) : '';
            }

            $packageDetails = [

                'id' => !empty($packages_view->id) ? $packages_view->id : '',
                'package_unique_no' => !empty($packages_view->package_unique_no) ? $packages_view->package_unique_no : '',
                'city_id' => !empty($packages_view->provider->city->id) ? $packages_view->provider->city->id : '',
                'review_stars' => !empty($packages_view->review->start) ? $packages_view->review->start : '',
                'total_reviews' => !empty($packages_view->review_count) ? $packages_view->review_count : '',
                'verbose_review' => !empty($packages_view->review_words) ? $packages_view->review_words : '',
                'overview' => !empty($packages_view->provider->company_overview) ? $packages_view->provider->company_overview : '',
                'package_name' => !empty($packages_view->package_name) ? $packages_view->package_name : '',
                'treatment_category_id' => !empty($packages_view->treatment_category_id) ? $packages_view->treatment_category_id : '',
                'treatment_id' => !empty($packages_view->treatment_id) ? $packages_view->treatment_id : '',
                'other_services' => !empty($packages_view->other_services) ? explode(',', $packages_view->other_services) : '',
                'treatment_period_in_days' => !empty($packages_view->treatment_period_in_days) ? $packages_view->treatment_period_in_days : '',
                'treatment_price' => !empty($packages_view->treatment_price) ? $packages_view->treatment_price : '',

                'city_name' => !empty($packages_view->provider->city->city_name) ? $packages_view->provider->city->city_name : '',
            ];

            if (!empty($packageDetails)) {

                // $request->cookie()->put( 'request_data', [ $packageDetails, [ 'package_id'=>$request->id ] ] );
                // $cookieValue = json_encode( [ $packageDetails, [ 'package_id' => $request->id ] ] );
                // $cookie = \Illuminate\Support\Facades\Cookie::make( 'request_data', $cookieValue, $minutes );

                // // Attach the cookie to the response
                // $response->withCookie( $cookie );

                $cities = Cities::where('status', 'active')->where('country_id', 1)->get();
                $counties = Country::all();

                return view('front.mdhealth.healthPackDetails', compact('packageDetails', 'cities', 'counties'));

            } else {
                return view('front.mdhealth.searchResult');

            }

        } else {
            return view('front.mdhealth.searchResult');
        }
    }

    public function my_packages(Request $request)
    {
        $token = Session::get('login_token');
        // dd( $token );
        $method = 'GET';
        $data = $this->apiService->getData($token, url('/api/md-customer-purchase-package-active-list'), null, $method);
        $data_two = $this->apiService->getData($token, url('/api/md-customer-purchase-package-completed-list'), null, $method);
        $data_three = $this->apiService->getData($token, url('/api/md-customer-purchase-package-cancelled-list'), null, $method);
        // dd( $data );
        $my_active_packages_list = $data['customer_purchase_package_active_list'];
        $my_completed_packages_list = $data_two['customer_purchase_package_completed_list'];
        $my_cancelled_packages_list = $data_three['customer_purchase_package_cancelled_list'];

        return view('front.mdhealth.user-panel.user-package', compact('my_active_packages_list', 'my_completed_packages_list', 'my_cancelled_packages_list'));
    }

    public function view_my_active_packages($id)
    {

        $token = Session::get('login_token');
        $data = $this->apiService->getData($token, url('/api/md-customer-package-details'), ['package_id' => $id], 'POST');

        if ($data['status'] == '200') {

            $other_service = array_map(fn($item) => $item['title'], $data['other_services']);
            $data = $data['customer_purchase_package_list'];
            $data['other_services'] = $other_service;
        }
        // $data = $data[ 'customer_purchase_package_list' ];
        // $data[ 'other_services' ] = $other_service;
        // dd( Auth::user()->id );
        $user_id = Session::get('MDCustomer*%');
        if (!empty($id)) {
            $patient_info = PatientInformation::where('customer_id',$user_id)->where('package_id',$data['package_id'])->where('purchase_id',$data['purchase_id'])->first();
            $response = $this->apiService->getData($token, url('/api/md-customer-my-details'), ['patient_id' => $patient_info->id, 'package_id' => $id], 'POST');
            // dd( $token );
            // dd($token);
            // dd( $response );
            if ($response['status'] == '200') {

                $my_details = $response['PatientInformation'];
                $treatment_information = $response['treatment_information'];

            } else {
                $my_details = '';
                $treatment_information = '';
            }
            //  dd( $response );

            //md-customer-upload-documents
        }

        // $data = [];
        // $response = $this->apiService->getData( $token,  url( '/api/md-customer-change-package-list-active-cancelled' ), [ 'id'=>$id ], 'POST' );
        // dd( $data );

        return view('front.mdhealth.user-panel.user-package-view', compact('data', 'my_details', 'treatment_information'));

    }

    public function complete_pending_payment(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'package_id' => 'required',
            'purchase_id' => 'required',
            'package_percentage_price' => 'required',
            'sale_price' => 'required',
            'pending_payment' => 'required',
        ]);

        if($validator->fails()){
            $this->sendError('Validation Error' . $validator->errors());
        }

        $data = array('package_id' => $request->package_id,
            'package_percentage_price' => $request->package_percentage_price,
            'sale_price' => $request->sale_price,
            'purchase_id' => $request->purchase_id,
            'pending_payment' => $request->pending_payment,
        );
        // dd($data);
        return view('front.mdhealth.user-panel.user-credit-card-pay', compact('data'));
    }

    public function myself_as_patient($package_id){

        // dd('hi');
        $user_id = Session::get('MDCustomer*%');

        if ($user_id != null) {
            $user_data = CustomerRegistration::where('id',$user_id)->where('status','active')->first();

            $patient = new PatientInformation();
            $patient->customer_id = $user_data->id;
            $patient->package_id = $package_id;
            $patient->patient_full_name = $user_data->full_name;
            $patient->patient_last_name = $user_data->first_name;
            $patient->patient_first_name = $user_data->last_name;
            $patient->patient_email = $user_data->email;
            $patient->patient_contact_no = $user_data->phone;
            $patient->patient_country_id = $user_data->country_id;
            $patient->patient_city_id = $user_data->city_id;
            $patient->birth_date = $user_data->date_of_birth;
            $patient->address = $user_data->address;
            $patient->created_ip_address = $_SERVER['REMOTE_ADDR'];;
            $patient->package_buy_for = 'myself';
            $patient->platform_type = 'web';
            $patient->created_by = $user_data->id;
            $patient->save();

            $providerUniqueId = '#MD' . str_pad($patient->id, 6, '0', STR_PAD_LEFT);
            $patteint = PatientInformation::where('id', $patient->id)->update(['patient_unique_id' => $providerUniqueId]);
            if($patteint){

                $id = $package_id;
                Session::put('Patient_id',$patient->id);
                return view('front.mdhealth.purchase', compact('id'));
            }else{

                $counties = Country::all();
                $city_name = 'Select City';
                $treatment_name = 'myself_as_patient_id_not_found';
                $date = '';
                $cities = Cities::where('status', 'active')->where('country_id', 1)->get();
                $treatment_plans = ProductCategory::where('status', 'active')->where('main_product_category_id', '1')->get();
                return view('front.mdhealth.searchResult', compact('cities', 'treatment_plans', 'city_name', 'treatment_name', 'counties', 'date'));
            }
        }else{
            $this->sendError('User not found');
        }
    }

    public function sendError($message, $code = 404)
    {
        return response()->json(['error' => $message], $code);
    }

//Code By Mplus03
    public function customer_reports(Request $request)
    {


        $token = Session::get('login_token');
        // dd( $token );
        $method = 'GET';

        $data = $this->apiService->getData($token, url('api/md-customer-all-reports-list'), null, $method);

        $customer_reports='';


        if ($data['status'] == '200'){
        if(!empty($data['provider_report_list'])){
        $customer_reports = $data['provider_report_list'];
        }
       }



        return view('front/mdhealth/user-panel/user-all-reports',compact('customer_reports'));

    }




    public function customer_report_search(Request $request)
    {

       

        $token = Session::get('login_token');

        // dd( $token );
        if($request['query']==null){
        $method = 'GET';
        $data = $this->apiService->getData($token, url('api/md-customer-all-reports-list'), null, $method);
        }

        if($request['query']){
            $query=$request['query'];
            $apiUrl = url('api/md-customer-report-search');
            $body=[ 'search_query' => $query,];
            $method = 'POST';
            $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);
            
            dd($request['$responseData']);
        }



        
        $customer_reports='';

        if ($data['status'] == '200'){
        if(!empty($data['provider_report_list'])){
        $customer_reports = $data['provider_report_list'];
        }
       }

        
        return view('front/mdhealth/user-panel/user-all-reports',compact('customer_reports'));
    }
 
 










}
