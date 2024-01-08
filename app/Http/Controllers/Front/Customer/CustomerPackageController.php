<?php

namespace App\Http\Controllers\Front\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\Country;
use App\Models\CustomerRegistration;
use App\Models\Packages;
use App\Models\PatientInformation;
use App\Models\ProductCategory;
use App\Services\ApiService;
use App\Traits\MediaTrait;
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
    public function test(Request $request)
    {

        $token = null;
        $apiUrl = url('/api/md-register-medical-provider');

        $method = 'POST';
        $body = $request->all();
        $plainArray = $body instanceof \Illuminate\Support\Collection  ? $body->toArray() : $body;

        if ($request->hasFile('company_logo_image_path') && $request->hasFile('company_licence_image_path')) {
            $image = [];
            $image_name = [];
            if ($request->hasFile('company_logo_image_path') && $request->file('company_logo_image_path')->isValid()) {
                $image[] = $request->file('company_logo_image_path');
                $image_name[] = 'company_logo_image_path';
            }
            if ($request->hasFile('company_licence_image_path') && $request->file('company_licence_image_path')->isValid()) {
                $image[] = $request->file('company_licence_image_path');
                $image_name[] = 'company_licence_image_path';
            }

            $responseData = $this->apiService->getData($token, $apiUrl, $body, $method, $image, $image_name);
        } else {
            $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);
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

            $counties = Country::where('status', 'active')->get();

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
        $user_id = Session::get('MDCustomer*%');
        // dd( $token );
        $method = 'GET';
        $data = $this->apiService->getData($token, url('/api/md-customer-purchase-package-active-list'), null, $method);
        $data_two = $this->apiService->getData($token, url('/api/md-customer-purchase-package-completed-list'), null, $method);
        $data_three = $this->apiService->getData($token, url('/api/md-customer-purchase-package-cancelled-list'), null, $method);

        $my_active_packages_list = !empty($data['customer_purchase_package_active_list']) ? $data['customer_purchase_package_active_list'] : [];
        $my_completed_packages_list = !empty($data_two['customer_purchase_package_completed_list']) ? $data_two['customer_purchase_package_completed_list'] : [];
        $my_cancelled_packages_list = !empty($data_three['customer_purchase_package_cancelled_list']) ? $data_three['customer_purchase_package_cancelled_list'] : [];
        // dd($my_active_packages_list);


        if (!empty($user_id) && !empty($my_active_packages_list)) {

            $array= [];
            foreach($my_active_packages_list as $key => $active_package){

                $patient_information_list = $this->apiService->getData($token, url('/api/md-change-patient-information-list'), ['id' => $active_package['package_id'],'purchase_id' =>  $active_package['purchase_id']], 'POST');
                $last = count($patient_information_list['PatientInformation']);
                $my_active_packages_list[$key]['patient_information_list'] = !empty($patient_information_list['PatientInformation'])?$patient_information_list['PatientInformation'][$last-1]:'';
            }
        } else {

            foreach($my_active_packages_list as $key => $active_package){

                $my_active_packages_list[$key]['patient_information_list'] = [];
            }
        }

        $counties = Country::where('status','active')->get();
        $cities = Cities::where('status', 'active')->where('country_id', 1)->get();

        return view('front.mdhealth.user-panel.user-package', compact('my_active_packages_list', 'my_completed_packages_list', 'my_cancelled_packages_list' ,'counties','cities'));
    }

    //Mplus02
    public function view_my_active_packages($id)
    {
        $user_id = Session::get('MDCustomer*%');
        $token = Session::get('login_token');

        if (!empty($token)) {

        }

        $data = $this->apiService->getData($token, url('/api/md-customer-package-details'), ['package_id' => $id], 'POST');

        if (!empty($data['status'])) {

            if ($data['status'] == '200') {
                $other_service = explode(',', $data['customer_purchase_package_list']['other_services']);
                $data = $data['customer_purchase_package_list'];
                $data['other_services'] = $other_service;
            }

            if (!empty($user_id)) {

                $patient_info = PatientInformation::where('customer_id', $user_id)->where('package_id', $data['package_id'])->where('purchase_id', $data['purchase_id'])->first();
                // dd($user_id,$data['package_id'],$data['purchase_id']);
                if (!empty($patient_info->id)) {
                    $response = $this->apiService->getData($token, url('/api/md-customer-my-details'), ['patient_id' => $patient_info->id, 'package_id' => $id], 'POST');

                } // dd( $token );
                // dd($token);
                // dd( $patient_info );
                if (!empty($response['status'])) {
                    if ($response['status'] == '200') {
                        $my_details = !empty($response['PatientInformation']) ? $response['PatientInformation'] : [];
                        $treatment_information = !empty($response['treatment_information']) ? $response['treatment_information'] : [];
                    }
                    // dd( $response );
                } else {
                    $my_details = '';
                    $treatment_information = '';
                }
            }
        }

        $documents = $this->apiService->getData($token, url('/api/md-customer-all-reports-list'), null, 'GET');
        $data['documents'] = !empty($documents['provider_report_list']) ? $documents['provider_report_list'] : [];

        if (!empty($data['hotel_id'])) {
            $accomodation_view = $this->apiService->getData($token, url('/api/md-customer-acommodition-details-view'), ['hotel_id' => $data['hotel_id']], 'POST');
            $data['accomodation_view'] = !empty($accomodation_view['hotel_list']) ? $accomodation_view['hotel_list'] : [];
        }

        if (!empty($data['vehicle_id'])) {
            $transportation_view = $this->apiService->getData($token, url('/api/md-customer-transporatation-details-view'), ['vehicle_id' => $data['vehicle_id']], 'POST');
            $other_service = explode(',', $transportation_view['data']['other_services']);
            $data['transportation_view'] = !empty($transportation_view['data']) ? $transportation_view['data'] : [];
            $data['transportation_view']['other_services'] = $other_service;
        }

        // dd($data);
        return view('front.mdhealth.user-panel.user-package-view', compact('data', 'my_details', 'treatment_information'));

    }

    //Mplus02
    public function complete_pending_payment(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'package_id' => 'required',
            'purchase_id' => 'required',
            'package_percentage_price' => 'required',
            'sale_price' => 'required',
            'pending_payment' => 'required',
        ]);
        $data = array('package_id' => $request->package_id,
            'package_percentage_price' => $request->package_percentage_price,
            'sale_price' => $request->sale_price,
            'purchase_id' => $request->purchase_id,
            'pending_payment' => $request->pending_payment,
        );
        // dd($data);
        return view('front.mdhealth.user-panel.user-credit-card-pay', compact('data'));
    }

    //Mplus02
    public function myself_as_patient($package_id)
    {

        // dd('hi');
        $user_id = Session::get('MDCustomer*%');

        if ($user_id != null) {
            $user_data = CustomerRegistration::where('id', $user_id)->where('status', 'active')->first();

            $patient = new PatientInformation();
            $patient->customer_id = $user_data->id;
            $patient->package_id = $package_id;
            $patient->patient_full_name = $user_data->full_name;
            $patient->patient_last_name = $user_data->last_name;
            $patient->patient_first_name = $user_data->first_name;
            $patient->patient_email = $user_data->email;
            $patient->patient_contact_no = $user_data->phone;
            $patient->patient_country_id = $user_data->country_id;
            $patient->patient_city_id = $user_data->city_id;
            $patient->birth_date = $user_data->date_of_birth;
            $patient->address = $user_data->address;
            $patient->created_ip_address = $_SERVER['REMOTE_ADDR'];
            $patient->package_buy_for = 'myself';
            $patient->platform_type = 'web';
            $patient->created_by = $user_data->id;
            $patient->save();

            $providerUniqueId = '#MD' . str_pad($patient->id, 6, '0', STR_PAD_LEFT);

            $patteint = PatientInformation::where('id', $patient->id)->update(['patient_unique_id' => $providerUniqueId]);
            if ($patteint) {

                $id = $package_id;
                Session::put('Patient_id', $patient->id);
                return view('front.mdhealth.purchase', compact('id'));
            } else {

                $counties = Country::all();
                $city_name = 'Select City';
                $treatment_name = 'myself_as_patient_id_not_found';
                $date = '';
                $cities = Cities::where('status', 'active')->where('country_id', 1)->get();
                $treatment_plans = ProductCategory::where('status', 'active')->where('main_product_category_id', '1')->get();
                return view('front.mdhealth.searchResult', compact('cities', 'treatment_plans', 'city_name', 'treatment_name', 'counties', 'date'));
            }
        } else {
            $this->sendError('User not found');
        }
    }

    //Mplus02
    public function sendError($message, $code = 404)
    {
        return response()->json(['error' => $message], $code);
    }

    //Mplus03
    public function customer_reports(Request $request)
    {

        $token = Session::get('login_token');
        // dd( $token );
        $method = 'GET';
        $data = $this->apiService->getData($token, url('api/md-customer-all-reports-list'), null, $method);

        $customer_reports = '';

        if ($data['status'] == '200') {
            if (!empty($data['provider_report_list'])) {
                $customer_reports = $data['provider_report_list'];
            }
        }

        return view('front/mdhealth/user-panel/user-all-reports', compact('customer_reports'));
    }

    //Mplus03
    public function customer_report_search(Request $request)
    {
        $token = Session::get('login_token');

        if ($request['query'] == null) {
            $method = 'GET';
            $data = $this->apiService->getData($token, url('api/md-customer-all-reports-list'), null, $method);
        }

        if ($request['query']) {
            $query = $request['query'];
            $apiUrl = url('api/md-customer-report-search');
            $body = ['search_query' => $query];
            $method = 'POST';
            $data = $this->apiService->getData($token, $apiUrl, $body, $method);
        }

        $customer_reports = '';

        if ($data['status'] == '200') {
            if (!empty($data['provider_report_list'])) {
                $customer_reports = $data['provider_report_list'];
            }
        }

        $htmlResult = '';

        if ($customer_reports) {
            foreach ($customer_reports as $report) {
                $htmlResult .= '<div class="treatment-card df-start w-100 mb-3">';
                $htmlResult .= '<div class="row card-row align-items-center justify-content-evenly m-0">';
                $htmlResult .= '<div class="col-md-2 df-center px-0">';
                $htmlResult .= '<img src="' . (!empty($report['provider_data']['logo_path']) ? $report['provider_data']['logo_path'] : url('/front/assets/img/Memorial.svg')) . '" alt="">';
                $htmlResult .= '</div>';
                $htmlResult .= '<div class="col-md-6 justify-content-start ps-0">';
                $htmlResult .= '<div class="trmt-card-body">';
                $htmlResult .= '<h5 class="dashboard-card-title">' . (!empty($report['provider_data']['company_name']) ? $report['provider_data']['company_name'] : '') . '</h5>';
                $htmlResult .= '<h5 class="mb-0 fw-500 d-flex align-items-center gap-2">';
                $htmlResult .= '<svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15" fill="none">';
                $htmlResult .= '<path d="M4.21458 1.41667V0H8.46458V1.41667H4.21458ZM4.92292 9.73958L4.14375 8.18125C4.08472 8.05139 3.99618 7.95388 3.87812 7.88871C3.76007 7.82354 3.63611 7.79119 3.50625 7.79167H0C0.177083 6.19792 0.867708 4.85492 2.07187 3.76267C3.27604 2.67042 4.69861 2.12453 6.33958 2.125C7.07153 2.125 7.77396 2.24306 8.44687 2.47917C9.11979 2.71528 9.75139 3.05764 10.3417 3.50625L11.3333 2.51458L12.325 3.50625L11.3333 4.49792C11.7111 4.99375 12.0122 5.51626 12.2365 6.06546C12.4608 6.61465 12.6083 7.19006 12.6792 7.79167H9.61562L8.39375 5.34792C8.26389 5.07639 8.05139 4.94062 7.75625 4.94062C7.46111 4.94062 7.24861 5.07639 7.11875 5.34792L4.92292 9.73958ZM6.33958 14.875C4.69861 14.875 3.27604 14.3289 2.07187 13.2366C0.867708 12.1444 0.177083 10.8016 0 9.20833H3.06354L4.28542 11.6521C4.41528 11.9236 4.62778 12.0594 4.92292 12.0594C5.21806 12.0594 5.43055 11.9236 5.56042 11.6521L7.75625 7.26042L8.53542 8.81875C8.59444 8.94861 8.68299 9.04612 8.80104 9.11129C8.9191 9.17646 9.04306 9.20881 9.17292 9.20833H12.6792C12.5021 10.8021 11.8115 12.1448 10.6073 13.2366C9.40312 14.3284 7.98056 14.8745 6.33958 14.875Z" fill="#111111"/>';
                $htmlResult .= '</svg>';
                $htmlResult .= '<span class="fsb-2">' . (!empty($report['report_count']) ? $report['report_count'] : '') . ' Reports</span>';
                $htmlResult .= '</h5></div></div><div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">';
                $htmlResult .= '<div class="trmt-card-footer">';
                $htmlResult .= '<a href="javascript:void(0);" class="fsb-2 fw-600 bg-green text-dark show-reports" id="ViewAllReports"><strong>View All Reports</strong></a>';
                $htmlResult .= '</div></div></div><div class="view-all-reports">';

                if ($report['reports']) {
                    foreach ($report['reports'] as $report_data) {
                        $htmlResult .= '<div class="view-more-reports d-flex justify-content-between">';
                        $htmlResult .= '<div class="view-more-left d-flex align-items-center gap-3">';
                        $htmlResult .= '<div class="icon-div">';
                        $htmlResult .= '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">';
                        $htmlResult .= '<g clip-path="url(#clip0_0_14866)">';
                        $htmlResult .= '<path d="M5.25033 0.583496V4.66683L1.16699 11.6668V13.4168H12.8347V11.6668L8.75199 4.66683V0.583496H5.25033ZM7.00033 2.75016L9.584 7.41683H4.41699L7.00033 2.75016Z" fill="#37B34A"/>';
                        $htmlResult .= '<rect x="6.3335" y="9.75016" width="1.33333" height="3.6665" fill="#37B34A"/>';
                        $htmlResult .= '</g>';
                        $htmlResult .= '</svg>';
                        $htmlResult .= '</div>';
                        $htmlResult .= '<div>';
                        $htmlResult .= '<h5 class="fsb-1">' . (!empty($report_data['report_name']) ? $report_data['report_name'] : '') . '</h5>';
                        $htmlResult .= '<p class="mb-0">' . (!empty($report_data['created_at']) ? date('M d, Y', strtotime($report_data['created_at'])) : '') . '</p>';
                        $htmlResult .= '</div>';
                        $htmlResult .= '</div>';
                        $htmlResult .= '<div class="view-more-right d-flex align-items-center">';
                        $htmlResult .= '<a href="javascript:void(0);" class="fsb-2 fw-600 bg-green text-dark view-report-details" data-report-id="' . (!empty($report_data['id']) ? $report_data['id'] : '') . '">View Details</a>';
                        $htmlResult .= '</div>';
                        $htmlResult .= '</div>';
                    }
                }

                $htmlResult .= '</div></div>';
            }
        }

        return $htmlResult;
    }

}
