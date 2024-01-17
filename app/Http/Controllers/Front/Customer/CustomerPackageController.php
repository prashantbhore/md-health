<?php

namespace App\Http\Controllers\Front\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\Country;
use App\Models\CustomerLogs;
use App\Models\CustomerRegistration;
use App\Models\CustomerPurchaseDetails;
use App\Models\CustomerPaymentDetails;
use App\Models\MDCoins;
use App\Models\Packages;
use App\Models\PatientInformation;
use App\Models\ProductCategory;
use App\Services\ApiService;
use App\Traits\MediaTrait;
use Auth;
use Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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

    public function sandbox(Request $controller_request)
    {
        // dd($controller_request->all());
        $validator = Validator::make($controller_request->all(),
            [
                'package_id' => 'required',
                'sale_price'  => 'required',
                'paid_amount'  => 'required',
                'platform_type'  => 'required',
                'pending_amount'  => 'required',
                'percentage'  => 'required',
                'patient_id' => 'required',
                'payment_percent' => 'required',
                'total_paying_price' => 'required',
                'card_name' => 'required',
                'card_number' => 'required',
                'cvv' => 'required',
                'validity' => 'required',
            ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        Session::put('payment_request', $controller_request->all());
        // dd(Session::get('payment_request'));
        $bin_number = substr($controller_request->card_number, 0, 6);
        $user_id = Auth::guard('md_customer_registration')->user()->id;
        $user_data = CustomerRegistration::where('id', $user_id)->where('status', 'active')->first();
        $user_login_info = CustomerLogs::where('customer_id', $user_id)->where('status', 'active')->first();
        $country_data = Country::where('id', $user_data->country_id)->first();
        $city_data = Cities::where('id', $user_data->city_id)->first();
        // dd($country_data,$city_data);
        $user_country = $country_data->country_name;
        $user_city = $city_data->city_name;
        // dd($user_city,$user_country);
        $user_last_login = $user_login_info->created_at->format('Y-m-d H:i:s');
        $user_email = $user_data->email;
        $user_mobile_no = $user_data->phone;
        $user_registration_date = $user_data->created_at->format('Y-m-d H:i:s');
        $user_address = $user_data->address;
        $identity_number_rand = mt_rand(10000, 99999);
        $identity_number = $user_id . $identity_number_rand;
        $package_id = $controller_request->package_id;
        $package_info = Packages::where('id', $package_id)->first();
        $package_name = $package_info->package_name;
        $patient_id = $controller_request->patient_id;
        $total_paying_price = $controller_request->total_paying_price;
        $card_name = $controller_request->card_name;
        $card_number = $controller_request->card_number;
        $cvv = $controller_request->cvv;
        $validity = $controller_request->validity;

        $conversation_id = mt_rand(100000000, 999999999);
        if ($controller_request->payment_percent != '100') {
            $installment = 2;
        } else {
            $installment = 1;
        }
        if (!str_contains($validity, '/')) {
            return $this->sendError('please enter card validity date in proper format month/year');
        } else {
            $expire_month = explode('/', $validity)[0];
            $current_year = date("Y"); // Get the current year as a four-digit number (e.g., 2024)
            $expire_year = explode('/', $validity)[1];
            $current_year = substr($current_year, 0, 2);
            $expire_year = $current_year . $expire_year;
        }
        if (!empty($user_data)) {
            if (!empty($user_data->first_name) && !empty($user_data->last_name)) {
                $user_first_name = $user_data->first_name;
                $user_last_name = $user_data->last_name;
            } else if (!empty($user_data->full_name)) {
                if (str_contains($user_data->full_name, ' ')) {
                    $user_first_name = explode(' ', $user_data->full_name)[0];
                    $user_last_name = explode(' ', $user_data->full_name)[1];
                } else {
                    return $this->sendError('User first and last name not found');
                }
            }
        } else {
            return $this->sendError('User data not found');
        }

        $live_base_url = 'https://api.iyzipay.com';
        $sandbox_base_url = 'https://sandbox-api.iyzipay.com';
        $sandbox_api_key = 'sandbox-BOhpAyMe4ewgstkrnmQbhLnrI7kMlTfD';
        $sandbox_secret_key = 'sandbox-5F4PXtaQLl8nxj4m2r8HRcQ9xT3NCe2S';
        $options = new \Iyzipay\Options();
        $options->setApiKey($sandbox_api_key);
        $options->setSecretKey($sandbox_secret_key);
        $options->setBaseUrl($sandbox_base_url);

        //create bin request
        $request = new \Iyzipay\Request\RetrieveBinNumberRequest();
        $request->setLocale(\Iyzipay\Model\Locale::EN);
        $request->setBinNumber($bin_number);
        $payment = \Iyzipay\Model\BinNumber::retrieve($request, $options);
        $payment_response = (array) $payment;
        foreach ($payment_response as $key => $response) {
            // echo $key;
            $json_response = $response;
            // print_r($response);
            break;

        }
        $json_response = json_decode($json_response, true);
        // dd($payment_response);
        if ($json_response['status'] == 'success') {
            //init 3DS
            $request = new \Iyzipay\Request\CreatePaymentRequest();
            $request->setLocale(\Iyzipay\Model\Locale::EN);
            $request->setConversationId($conversation_id);
            $request->setPrice($total_paying_price);
            $request->setPaidPrice($total_paying_price);
            $request->setCurrency(\Iyzipay\Model\Currency::TL);
            $request->setInstallment($installment);
            $request->setBasketId("B" . $package_id);
            $request->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);
            $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
            $request->setCallbackUrl(url('/complete_3ds'));

            $paymentCard = new \Iyzipay\Model\PaymentCard();
            $paymentCard->setCardHolderName($user_first_name . ' ' . $user_last_name);
            $paymentCard->setCardNumber($card_number); //dummy "5528790000000008"
            $paymentCard->setExpireMonth($expire_month);
            $paymentCard->setExpireYear($expire_year); //dummy "2030"
            $paymentCard->setCvc($cvv);
            $paymentCard->setRegisterCard(0);
            $request->setPaymentCard($paymentCard);

            $buyer = new \Iyzipay\Model\Buyer();
            $buyer->setId("BY" . $user_id);
            $buyer->setName($user_first_name);
            $buyer->setSurname($user_last_name);
            $buyer->setGsmNumber($user_mobile_no);
            $buyer->setEmail($user_email);
            $buyer->setIdentityNumber($identity_number);
            $buyer->setLastLoginDate($user_last_login);
            $buyer->setRegistrationDate($user_registration_date);
            $buyer->setRegistrationAddress($user_address);
            $buyer->setIp($_SERVER['REMOTE_ADDR']);
            $buyer->setCity($user_city);
            $buyer->setCountry($user_country);
            $buyer->setZipCode("34732");
            $request->setBuyer($buyer);

            $shippingAddress = new \Iyzipay\Model\Address();
            $shippingAddress->setContactName($user_first_name . ' ' . $user_last_name);
            $shippingAddress->setCity($user_city);
            $shippingAddress->setCountry($user_country);
            $shippingAddress->setAddress($user_address);
            $shippingAddress->setZipCode("34742");
            $request->setShippingAddress($shippingAddress);

            $billingAddress = new \Iyzipay\Model\Address();
            $billingAddress->setContactName($user_first_name . ' ' . $user_last_name);
            $billingAddress->setCity($user_city);
            $billingAddress->setCountry($user_country);
            $billingAddress->setAddress($user_address);
            $billingAddress->setZipCode("34742");
            $request->setBillingAddress($billingAddress);

            $basketItems = array();
            $firstBasketItem = new \Iyzipay\Model\BasketItem();
            $firstBasketItem->setId("BI" . $package_id);
            $firstBasketItem->setName($package_name);
            $firstBasketItem->setCategory1("Medical Treatment Package");
            // $firstBasketItem->setCategory2("Accessories");
            $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
            $firstBasketItem->setPrice($total_paying_price);
            $basketItems[0] = $firstBasketItem;

            // $secondBasketItem = new \Iyzipay\Model\BasketItem();
            // $secondBasketItem->setId("BI102");
            // $secondBasketItem->setName("Game code");
            // $secondBasketItem->setCategory1("Game");
            // $secondBasketItem->setCategory2("Online Game Items");
            // $secondBasketItem->setItemType(\Iyzipay\Model\BasketItemType::VIRTUAL);
            // $secondBasketItem->setPrice("0.5");
            // $basketItems[1] = $secondBasketItem;

            // $thirdBasketItem = new \Iyzipay\Model\BasketItem();
            // $thirdBasketItem->setId("BI103");
            // $thirdBasketItem->setName("Usb");
            // $thirdBasketItem->setCategory1("Electronics");
            // $thirdBasketItem->setCategory2("Usb / Cable");
            // $thirdBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
            // $thirdBasketItem->setPrice("0.2");
            // $basketItems[2] = $thirdBasketItem;

            $request->setBasketItems($basketItems);
            // $request->setConversationData('hi');
            # make request
            // dd($request);
            $threedsInitialize = \Iyzipay\Model\ThreedsInitialize::create($request, $options);
            $threedsInitialize_array = (array) $threedsInitialize;

            # print result
            // echo "<pre>";
            foreach ($threedsInitialize_array as $key => $response) {
                // echo $key;
                $three_json_response = $response;
                // print_r($response);
                break;
            }
            // echo($three_json_response);die;
            print_r($threedsInitialize);
            // $three_json_response = json_decode($three_json_response, true);
            // echo'<pre>';print_r( $three_json_response['threeDSHtmlContent'] );
        } else {
            dd('invalid card');
        }
        //

    }

    public function complete_3ds(Request $request)
    {
        // dd($request->all());
        // dd(Session::get('payment_request'));
        //ezzzzzz
        // dd($request->all());

        $apiKey = 'sandbox-BOhpAyMe4ewgstkrnmQbhLnrI7kMlTfD';
        $secretKey = 'sandbox-5F4PXtaQLl8nxj4m2r8HRcQ9xT3NCe2S';
        $options = new \Iyzipay\Options();
        $options->setApiKey($apiKey);
        $options->setSecretKey($secretKey);
        $options->setBaseUrl('https://sandbox-api.iyzipay.com');

        $three_ds_request = new \Iyzipay\Request\CreateThreedsPaymentRequest();
        $three_ds_request->setLocale(\Iyzipay\Model\Locale::EN);
        $three_ds_request->setConversationId($request->conversationId);
        $three_ds_request->setPaymentId($request->paymentId);
        $three_ds_request->setConversationData($request->conversationData);

        # make request
        $threedsPayment = \Iyzipay\Model\ThreedsPayment::create($three_ds_request, $options);

        # print result
        $threeds_payment_array = (array) $threedsPayment;

        # print result
        // echo "<pre>";
        foreach ($threeds_payment_array as $key => $response) {
            // echo $key;
            $three_json_response = $response;
            // print_r($response);
            break;
        }

        $three_json_response = json_decode($three_json_response, true);
        // echo $three_json_response['threeDSHtmlContent'];
        // echo "<pre>";
        // print_r($three_json_response);die;
        if (!empty($three_json_response)) {
            if ($three_json_response['status'] == 'success') {
                $repsonse_data = $this->apiService->getData(Session::get('login_token'), url('/api/md-customer-purchase-package'), Session::get('payment_request'), 'POST');
                Session::forget('payment_request');
                if (!empty($repsonse_data)) {
                    if ($repsonse_data['status'] == '200') {
                        return view('front.mdhealth.user-panel.user-payment-successfull');
                    } else {
                        echo "Something went wrong, payment not completed, err code: API_03";
                    }
                } else {
                    echo "Something went wrong, payment not completed, err code: API_02";
                }
            } else {
                echo "Something went wrong, payment not completed, err code: API_01";
            }
        } else {
            echo "Something went wrong, payment not completed, err code: API_00";
        }
    }

    //Mplus02

    public function customer_home()
    {
        return view('front.mdhealth.index');
    }

    public function generateAuthorizationString($apiKey, $secretKey, $requestData)
    {
        $requestString = $this->generateRequestString($requestData);

        $iyziRndValue = $randomNumber = mt_rand(100000000, 999999999);
        $_SERVER['HTTP_X_IYZI_RND'] = $iyziRndValue;

        $concatenatedString = $apiKey . $_SERVER['HTTP_X_IYZI_RND'] . $secretKey . $requestString;

        $hashSha256 = sha1($concatenatedString, true);

        $hashInBase64 = base64_encode($hashSha256);

        $authorization = 'IYZWS' . ' ' . $apiKey . ':' . $hashInBase64;

        return $authorization;
    }

    public function generateRequestString($requestData)
    {
        $jsonString = json_encode($requestData);

        $jsonString = str_replace('"', '', $jsonString);
        $jsonString = str_replace(' ', '', $jsonString);
        $jsonString = str_replace(':', '=', $jsonString);
        $jsonString = str_replace('{', '[', $jsonString);
        $jsonString = str_replace('}', ']', $jsonString);
        echo $jsonString;
        return $jsonString;
    }

    //Mplus02

    public function test(Request $request)
    {
        // echo phpinfo();
        // die;
        dd(phpinfo());
        $token = null;
        $sandbox_base_url = 'https://sandbox-api.iyzipay.com';
        $live_base_url = 'https://api.iyzipay.com';
        $apiKey = 'sandbox-BOhpAyMe4ewgstkrnmQbhLnrI7kMlTfD';
        $secretKey = 'sandbox-5F4PXtaQLl8nxj4m2r8HRcQ9xT3NCe2S';

        $url0 = $sandbox_base_url . '/payment/iyzipos/installment';
        $url1 = $sandbox_base_url . '/payment/bin/check';
        $url2 = $sandbox_base_url . '/payment/iyzipos/checkoutform/initialize/auth/ecom';

        $method = 'POST';

        $body0 = [
            'price' => '1000',
            'binNumber' => '535805',
        ];
        $body1 = ['locale' => 'en', 'binNumber' => '535843'];
        // $body2 = [
        //     'locale' => 'en',
        //     'conversationId' => '123456789', // Replace with your unique conversation ID
        //     'price' => '10.01',
        //     'paidPrice' => '10.01',
        //     'currency' => 'TRY',
        //     'installment' => 1,
        //     'paymentChannel' => 'WEB',
        //     'basketId' => 'B67832',
        //     'paymentGroup' => 'PRODUCT',
        //     'paymentCard' => [
        //         'cardHolderName' => 'Mehmet Test',
        //         'cardNumber' => '5526080000000006',
        //         'expireYear' => '2028',
        //         'expireMonth' => '11',
        //         'cvc' => '245',
        //         'registerCard' => 0,
        // ],
        //     'buyer' => [
        //         'id' => 'BY789',
        //         'name' => 'John',
        //         'surname' => 'Doe',
        //         'identityNumber' => '11111111111',
        //         'email' => 'test@testtt.com',
        //         'gsmNumber' => '+905393623333',
        //         'registrationDate' => '2013-04-21 15:12:09',
        //         'lastLoginDate' => '2015-10-05 12:43:35',
        //         'registrationAddress' => 'Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1',
        //         'city' => 'Istanbul',
        //         'country' => 'Turkey',
        //         'zipCode' => '34732',
        //         'ip' => '85.34.78.112',
        // ],
        //     'shippingAddress' => [
        //         'address' => 'Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1',
        //         'zipCode' => '34742',
        //         'contactName' => 'Jane Doe',
        //         'city' => 'Istanbul',
        //         'country' => 'Turkey',
        // ],
        //     'billingAddress' => [
        //         'address' => 'Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1',
        //         'zipCode' => '34742',
        //         'contactName' => 'Jane Doe',
        //         'city' => 'Istanbul',
        //         'country' => 'Turkey',
        // ],
        //     'basketItems' => [
        //         [
        //             'id' => 'BI101',
        //             'price' => '10.01',
        //             'name' => 'Binocular',
        //             'category1' => 'Collectibles',
        //             'category2' => 'Accessories',
        //             'itemType' => 'PHYSICAL',
        // ],
        // ],
        // ];
        // $body2 = [
        //     'price' =>'1000',
        //     'paidPrice'=>'1100',
        //     'currency'=>'TRY',
        //     'installment'=>'2',
        //     'cardNumber'=>'1234123412341234',
        //     'expireYear'=>'25',
        //     'expireMonth'=>'02',
        //     'cvc'=>'123',
        //     'cardHolderName'=>'Test',
        //     'id'=>'21',
        //     'name'=>'Test',
        //     'surname'=>'SurTest',
        //     'identityNumber'=>'454jjjss',
        //     'city'=>'Antaliya',
        //     'country'=>'Turkey',
        //     'email'=>'email@test.com',
        //     'ip'=>$_SERVER[ 'REMOTE_ADDR' ],
        //     'registrationAddress'=>'test Address',
        //     'contactName'=>'test name',
        //     'city'=>'Antaliya',
        //     'country'=>'Turkey',
        //     'address'=>'test Address',
        //     'contactName'=>'test name',
        //     'city'=>'Antaliya',
        //     'country'=>'Turkey',
        //     'address'=>'test Address'
        // ];

        $authorization = $this->generateAuthorizationString($apiKey, $secretKey, $body1);

        $headers = [
            'Authorization' => $authorization,
            'x-iyzi-rnd' => $_SERVER['HTTP_X_IYZI_RND'],
            'Content-Type' => 'application/json',
        ];

        $apiRequest = Http::withHeaders($headers);

        $responseData = $response = $apiRequest->{
            $method}
        ($url1, $body1 ?? null);
        // dd( $response->json() );
        try {
            if (empty($response->json())) {

                throw new \Exception($response);
            } else {
                return $response->json();
            }
            //  echo $response;
        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
        }
        dd($responseData);

        $authorization = $this->generateAuthorizationString($apiKey, $secretKey, $body1);

        $headers = [
            'Authorization' => $authorization,
            'x-iyzi-rnd' => $_SERVER['HTTP_X_IYZI_RND'],
            'Content-Type' => 'application/json',
        ];

        $apiRequest = Http::withHeaders($headers);

        $responseData = $response = $apiRequest->{
            $method}
        ($url1, $body1 ?? null);
        // dd( $response->json() );
        try {
            if (empty($response->json())) {

                throw new \Exception($response);
            } else {
                return $response->json();
            }
            //  echo $response;
        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
        }
        echo ($responseData);
        die;

        $authorization = $this->generateAuthorizationString($apiKey, $secretKey, $body2);

        $headers = [
            'Authorization' => $authorization,
            'x-iyzi-rnd' => $_SERVER['HTTP_X_IYZI_RND'],
            'Content-Type' => 'application/json',
        ];

        $apiRequest = Http::withHeaders($headers);

        $responseData2 = $response = $apiRequest->{
            $method}
        ($url2, $body2 ?? null);
        // dd( $response->json() );
        try {
            if (empty($response->json())) {

                throw new \Exception($response);
            } else {
                return $response->json();
            }
            //  echo $response;
        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
        }
        dd($responseData2);
    }

    //Mplus02

    public function purchase_package($id, $patient_id)
    {

        return view('front.mdhealth.purchase', compact('id', 'patient_id'));
    }

    //Mplus02

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
            // dd( 'hi' );
            $counties = Country::all();
            $city_name = !empty($request->city_name) ? $request->city_name : '';
            $treatment_name = !empty($request->treatment_name) ? $request->treatment_name : '';
            $date = $request->daterange ?? '';
            $cities = Cities::where('status', 'active')->where('country_id', 1)->get();
            $treatment_plans = ProductCategory::where('status', 'active')->where('main_product_category_id', '1')->get();
            // dd( $treatment_name, $city_name );
            return view('front.mdhealth.searchResult', compact('cities', 'treatment_plans', 'city_name', 'treatment_name', 'counties', 'date'));

        }

    }

    //Mplus02

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

    //Mplus02

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
        // dd( $my_active_packages_list );

        // if ( !empty( $user_id ) && !empty( $my_active_packages_list ) ) {

        //     $array = [];
        //     foreach ( $my_active_packages_list as $key => $active_package ) {

        //         $patient_information_list = $this->apiService->getData( $token, url( '/api/md-change-patient-information-list' ), [ 'id' => $active_package[ 'package_id' ], 'purchase_id' =>  $active_package[ 'purchase_id' ] ], 'POST' );
        //         $last = count( $patient_information_list[ 'PatientInformation' ] );
        //         $my_active_packages_list[ $key ][ 'patient_information_list' ] = !empty( $patient_information_list[ 'PatientInformation' ] )?$patient_information_list[ 'PatientInformation' ][ $last-1 ]:'';
        //     }
        // } else {

        //     foreach ( $my_active_packages_list as $key => $active_package ) {

        //         $my_active_packages_list[ $key ][ 'patient_information_list' ] = [];
        //     }
        // }

        $counties = Country::where('status', 'active')->get();
        $cities = Cities::where('status', 'active')->where('country_id', 1)->get();

        return view('front.mdhealth.user-panel.user-package', compact('my_active_packages_list', 'my_completed_packages_list', 'my_cancelled_packages_list', 'counties', 'cities'));
    }

    //Mplus02

    public function view_my_active_packages($id, $purchase_id)
    {
        $user_id = Session::get('MDCustomer*%');
        $token = Session::get('login_token');

        if (!empty($token) && !empty($id) && !empty($purchase_id)) {
            $data = $this->apiService->getData($token, url('/api/md-customer-package-details'), ['package_id' => $id, 'purchase_id' => $purchase_id], 'POST');

            if (!empty($data['status'])) {

                if ($data['status'] == '200') {
                    $other_service = explode(',', $data['customer_purchase_package_list']['other_services']);
                    $data = $data['customer_purchase_package_list'];
                    $data['other_services'] = $other_service;
                }

                if (!empty($user_id)) {

                    $patient_info = PatientInformation::where('customer_id', $user_id)->where('package_id', $data['package_id'])->where('purchase_id', $data['purchase_id'])->first();
                    // dd( $user_id, $data[ 'package_id' ], $data[ 'purchase_id' ] );
                    // dd( $patient_info );
                    if (!empty($patient_info->id)) {
                        $response = $this->apiService->getData($token, url('/api/md-customer-my-details'), ['patient_id' => $patient_info->id, 'package_id' => $id], 'POST');

                    }
                    // dd( $token );
                    // dd( $token );
                    // dd( $patient_info );
                    if (!empty($response['status'])) {
                        if ($response['status'] == '200') {
                            $my_details = !empty($response['PatientInformation']) ? $response['PatientInformation'] : [];
                            $treatment_information = !empty($response['treatment_information']) ? $response['treatment_information'] : [];
                        }
                    } else {
                        $my_details = '';
                        $treatment_information = '';
                    }
                }
            }
            // dd($data);
            $documents = $this->apiService->getData($token, url('/api/md-customer-upload-documents'), ['package_id' => $data['package_id']], 'POST');
            $data['documents'] = !empty($documents['data']) ? $documents['data'] : [];
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
        } else {
            $data = [];
            $my_details = [];
            $treatment_information = [];
        }
        // dd( $my_details );
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
        // dd( $data );
        return view('front.mdhealth.user-panel.user-credit-card-pay', compact('data'));
    }

    //Mplus02

    public function myself_as_patient($package_id)
    {

        // dd( 'hi' );
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
                $patient_id = $patient->id;
                return view('front.mdhealth.purchase', compact('id', 'patient_id'));
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
        // dd($code);
        return response()->json($code);
    }

    //Mplus02

    public function user_favorites()
    {
        $user_id = Session::get('MDCustomer*%');
        $token = Session::get('login_token');

        if (!empty($token)) {
            $data = $this->apiService->getData($token, url('/api/md-customer-favourite-list'), [], 'GET');
            if (!empty($data)) {
                if ($data['status'] == '200') {
                    $fav_list = !empty($data['data']) ? $data['data'] : [];
                } else {
                    $fav_list = [];
                }
            } else {
                $fav_list = [];
            }
        } else {
            $fav_list = [];
        }

        return view('front.mdhealth.user-panel.user-favorites', compact('fav_list'));
    }

    //Mplus02

    public function purchase_by_mdcoins(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_id' => 'required',
            'paid_amount' => 'required',
            'percentage' => 'required',
            'platform_type' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $user_id = Auth::guard('md_customer_registration')->user()->id;
        if (!empty($user_id)) {
            $coins_data = MDCoins::where('customer_id', $user_id)->where('status', 'active')->first();
            $avilable_coins = $coins_data->coins;
            if (!empty($avilable_coins)) {
                try {
                    $decrypted = Crypt::decrypt($avilable_coins);
                } catch (Illuminate\Contracts\Encryption\DecryptException) {
                    return  redirect()->back()->withErrors('Somthing went wrong , err code: CRYPT_00')->withInput();
                }
                //$avilable_coins == $request->avilable_coins
                if (true) {

                    if ($avilable_coins > $request->paid_amount) {
                        $balance_coins = floatval($avilable_coins) - floatval($request->paid_amount);
                        $hashed_coins = Crypt::encrypt($balance_coins);
                        $coins_data->update(['coins' => $hashed_coins]);

                        if (!empty($request->purchase_id)) {
                            $purchase_details = [];
                            $purchase_details['payment_percentage'] = $request->package_percentage_price;
                            $purchase_details['paid_amount'] = $request->paid_amount;
                            $purchase_details['pending_payment'] = $request->pending_amount;
                            // $package_percentage_price = $request->package_percentage_price;
                            // $purchase_details['purchase_type'] = 'pending';
                            $purchase_details['created_by'] = $user_id;
                            $purchase_details_data = CustomerPurchaseDetails::where('id', $request->purchase_id)->update($purchase_details);

                            if (!empty($purchase_details_data)) {
                                if ($request->pending_amount == $request->paid_amount) {
                                    $payment_status_delete = [
                                        'status' => 'delete',
                                    ];

                                    CustomerPaymentDetails::where('order_id', $request->purchase_id)
                                        ->where('payment_status', 'pending')
                                        ->update($payment_status_delete);

                                    // When package_total_price and paid_amount are equal
                                    $payment_details_pending = [
                                        'payment_percentage' => $request->package_percentage_price,
                                        'paid_amount' => $request->pending_amount,
                                        'payment_status' => 'completed',
                                        'pending_payment' => 0, // Assuming no pending amount for completed status
                                    ];

                                    $CustomerPayamentDetails = CustomerPaymentDetails::where('order_id', $request->purchase_id)
                                        ->update($payment_details_pending);
                                    if (!empty($CustomerPayamentDetails)) {
                                        return response()->json([
                                            'status' => 200,
                                            'message' => 'payment completed.',
                                        ]);
                                    } else {
                                        return response()->json([
                                            'status' => 404,
                                            'message' => 'Something went wrong .payment not completed.',
                                        ]);
                                    }
                                } else {

                                    return response()->json([
                                        'status' => 404,
                                        'message' => 'Something went wrong .payment not completed.',
                                    ]);

                                }
                            }
                        } else {
                            $purchase_details = [];

                            $purchase_details['customer_id'] = $user_id;
                            $purchase_details['package_id'] = $request->package_id;
                            $packages = Packages::where('status', 'active')
                                ->select(
                                    'hotel_id',
                                    'vehicle_id',
                                    'tour_id',
                                    'visa_service_price',
                                    'translation_price',
                                    'ambulance_service_price',
                                    'ticket_price',
                                    'created_by',
                                    'sale_price',
                                    'treatment_price',
                                    'hotel_acommodition_price',
                                    'transportation_acommodition_price',
                                    'visa_service_price',
                                    'tour_price'
                                )
                                ->where('id', $request->package_id)
                                ->first();
                            $purchase_details['package_treatment_price'] = !empty($packages->treatment_price) ? $packages->treatment_price : 0;
                            $purchase_details['package_hotel_price'] = !empty($packages->hotel_acommodition_price) ? $packages->hotel_acommodition_price : 0;
                            $purchase_details['package_transportation_price'] = !empty($packages->transportation_acommodition_price) ? $packages->hotel_acommodition_price : 0;
                            $purchase_details['hotel_id'] = !empty($packages->hotel_id) ? $packages->hotel_id : 0;
                            $purchase_details['vehicle_id'] = !empty($packages->vehicle_id) ? $packages->vehicle_id : 0;
                            $purchase_details['tour_id'] = !empty($packages->tour_id) ? $packages->tour_id : 0;
                            $purchase_details['provider_id'] = !empty($packages->created_by) ? $packages->created_by : '';
                            $purchase_details['package_total_price'] = $request->sale_price;
                            $purchase_details['paid_amount'] = $request->paid_amount;
                            $pending_amount = $request->sale_price - $request->paid_amount;
                            $purchase_details['pending_payment'] = $pending_amount;
                            $purchase_details['payment_percentage'] = $request->percentage;
                            $purchase_details['purchase_type'] = 'pending';
                            $purchase_details['created_by'] = $user_id;

                            $purchase_details_data = CustomerPurchaseDetails::create($purchase_details);

                            $CustomerPurchaseDetails = CustomerPurchaseDetails::select('id')->get();
                            if (!empty($CustomerPurchaseDetails)) {
                                foreach ($CustomerPurchaseDetails as $key => $value) {
                                    $length = strlen($value->id);
                                    if ($length == 1) {
                                        $order_unique_id = '#MD00000' . $value->id;
                                    } elseif ($length == 2) {
                                        $order_unique_id = '#MD0000' . $value->id;
                                    } elseif ($length == 3) {
                                        $order_unique_id = '#MD000' . $value->id;
                                    } elseif ($length == 4) {
                                        $order_unique_id = '#MD00' . $value->id;
                                    } elseif ($length == 5) {
                                        $order_unique_id = '#MD0' . $value->id;
                                    } else {
                                        $order_unique_id = '#MD' . $value->id;
                                    }
                                    $update_unique_id = CustomerPurchaseDetails::where('id', $value->id)->update(['order_id' => $order_unique_id]);
                                }
                            }

                            if (!empty($update_unique_id)) {
                                $payment_details_pending = [];
                                $payment_details_pending['order_id'] = !empty($purchase_details_data->id) ? $purchase_details_data->id : 0;
                                $payment_details_pending['customer_id'] = !empty($purchase_details_data->customer_id) ? $purchase_details_data->customer_id : 0;
                                $payment_details_pending['package_id'] = $request->package_id;
                                $payment_details_pending['provider_id'] = !empty($packages->created_by) ? $packages->created_by : 0;
                                $payment_details_pending['payment_percentage'] = !empty($purchase_details_data->payment_percentage) ? $packages->payment_percentage : '';
                                $payment_details_pending['paid_amount'] = !empty($purchase_details_data->paid_amount) ? $purchase_details_data->paid_amount : 0;
                                $payment_details_pending['payment_status'] = 'completed';

                                // Calculate remaining amount after 'pending' payment
                                $payment_details_pending['pending_payment'] = $pending_amount;

                                // Copy the array for completed entry
                                $payment_details_completed = $payment_details_pending;

                                // Update 'completed' entry with remaining amount and status
                                $payment_details_completed['pending_payment'] = $request->pending_amount;

                                // No pending amount for completed
                                $payment_details_completed['payment_status'] = 'pending';

                                $payment_pending = CustomerPaymentDetails::create($payment_details_pending);

                                // Store 'completed' entry only if there's a remaining amount
                                if ($request->pending_amount > 0) {
                                    $payment_completed = CustomerPaymentDetails::create($payment_details_completed);
                                }

                                if (!empty($request->patient_id)) {
                                    $purchase_id = [];
                                    $purchase_id = [
                                        'purchase_id' => $purchase_details_data->id,
                                    ];

                                    PatientInformation::where('id', $request->patient_id)
                                        ->where('status', 'active')
                                        ->update($purchase_id);
                                }
                            }
                            if (!empty($purchase_details_data->id)) {

                                $CustomerPurchaseDetails = CustomerPurchaseDetails::where('status', 'active')
                                    ->where('id', $purchase_details_data->id)
                                    ->select('order_id')
                                    ->first();
                            }

                            if (!empty($payment_completed) || !empty($payment_pending)) {
                                return view('front.mdhealth.user-panel.user-payment-successfull');
                            } else {
                                return redirect()->back()->withErrors('Something went wrong Payment Not Completed')->withInput();
                            }
                        }

                    } else {
                        return $this->sendError('Not Enough Coins');
                    }

                } else {
                    return redirect()->back()->withErrors('Coins Tampered Payment Not Completed')->withInput();
                }

            } else {
                return $this->sendError('Couldn\'t get your Coins');
            }
        }
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
                $htmlResult .= '<img src="' . !empty($report['provider_data']['logo_path']) ? $report['provider_data']['logo_path'] : url('/front/assets/img/Memorial.svg') . '" alt="">';
                $htmlResult .= '</div>';

                $htmlResult .= ' <div class="col-md-6 justify-content-start ps-0">';
                $htmlResult .= ' <div class="trmt-card-body">';
                $htmlResult .= '<h5 class="dashboard-card-title">' . !empty($report['provider_data']['company_name']) ? $report['provider_data']['company_name'] : '' . '</h5>';
                $htmlResult .= '<h5 class="mb-0 fw-500 d-flex align-items-center gap-2">';
                $htmlResult .= ' <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15" fill="none">';
                $htmlResult .= ' <path d="M4.21458 1.41667V0H8.46458V1.41667H4.21458ZM4.92292 9.73958L4.14375 8.18125C4.08472 8.05139 3.99618 7.95388 3.87812 7.88871C3.76007 7.82354 3.63611 7.79119 3.50625 7.79167H0C0.177083 6.19792 0.867708 4.85492 2.07187 3.76267C3.27604 2.67042 4.69861 2.12453 6.33958 2.125C7.07153 2.125 7.77396 2.24306 8.44687 2.47917C9.11979 2.71528 9.75139 3.05764 10.3417 3.50625L11.3333 2.51458L12.325 3.50625L11.3333 4.49792C11.7111 4.99375 12.0122 5.51626 12.2365 6.06546C12.4608 6.61465 12.6083 7.19006 12.6792 7.79167H9.61562L8.39375 5.34792C8.26389 5.07639 8.05139 4.94062 7.75625 4.94062C7.46111 4.94062 7.24861 5.07639 7.11875 5.34792L4.92292 9.73958ZM6.33958 14.875C4.69861 14.875 3.27604 14.3289 2.07187 13.2366C0.867708 12.1444 0.177083 10.8016 0 9.20833H3.06354L4.28542 11.6521C4.41528 11.9236 4.62778 12.0594 4.92292 12.0594C5.21806 12.0594 5.43055 11.9236 5.56042 11.6521L7.75625 7.26042L8.53542 8.81875C8.59444 8.94861 8.68299 9.04612 8.80104 9.11129C8.9191 9.17646 9.04306 9.20881 9.17292 9.20833H12.6792C12.5021 10.8021 11.8115 12.1448 10.6073 13.2366C9.40312 14.3284 7.98056 14.8745 6.33958 14.875Z" fill="#111111"/>';
                $htmlResult .= '</svg>';
                $htmlResult .= '<span class="fsb-2">' . !empty($report['report_count']) ? $report['report_count'] : '' . 'Reports</span>';
                $htmlResult .= ' </h5>';
                $htmlResult .= '</div>';
                $htmlResult .= '</div>';
                $htmlResult .= '<div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">';
                $htmlResult .= '<div class="trmt-card-footer">';
                $htmlResult .= ' <a href="javascript:void(0);" class="fsb-2 fw-600 bg-green text-dark show-reports" id="ViewAllReports"><strong>View All Reports</strong></a>';
                $htmlResult .= '</div>';
                $htmlResult .= '</div>';
                $htmlResult .= '</div>';
                $htmlResult .= '<div class="view-all-reports">';

                if ($report['reports']) {
                    foreach ($report['reports'] as $report_data) {

                        $htmlResult .= '<div class="view-more-reports d-flex justify-content-between">';
                        $htmlResult .= '<div class="view-more-left d-flex align-items-center gap-3">';
                        $htmlResult .= '<div class="icon-div">';
                        $htmlResult .= '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">';
                        $htmlResult .= '<g clip-path="url(#clip0_0_14866)">';
                        $htmlResult .= '<path d="M5.25033 0.583496V4.66683L1.16699 11.6668V13.4168H12.8337V11.6668L8.75033 4.66683V0.583496M10.5003 7.5835C6.41699 5.8335 7.00033 9.91683 3.50033 8.16683M3.50033 0.583496H10.5003M8.75033 10.5002C8.90503 10.5002 9.05341 10.4387 9.1628 10.3293C9.2722 10.2199 9.33366 10.0715 9.33366 9.91683C9.33366 9.76212 9.2722 9.61375 9.1628 9.50435C9.05341 9.39495 8.90503 9.3335 8.75033 9.3335C8.59562 9.3335 8.44724 9.39495 8.33785 9.50435C8.22845 9.61375 8.16699 9.76212 8.16699 9.91683C8.16699 10.0715 8.22845 10.2199 8.33785 10.3293C8.44724 10.4387 8.59562 10.5002 8.75033 10.5002ZM5.25033 11.6668C5.40504 11.6668 5.55341 11.6054 5.6628 11.496C5.7722 11.3866 5.83366 11.2382 5.83366 11.0835C5.83366 10.9288 5.7722 10.7804 5.6628 10.671C5.55341 10.5616 5.40504 10.5002 5.25033 10.5002C5.09562 10.5002 4.94724 10.5616 4.83785 10.671C4.72845 10.7804 4.66699 10.9288 4.66699 11.0835C4.66699 11.2382 4.72845 11.3866 4.83785 11.496C4.94724 11.6054 5.09562 11.6668 5.25033 11.6668Z" stroke="#111111" stroke-width="1.16667"/>';
                        $htmlResult .= ' </g><defs><clipPath id="clip0_0_14866"><rect width="14" height="14" fill="white"/></clipPath></defs>';
                        $htmlResult .= '</svg>';
                        $htmlResult .= ' </div>';
                        $htmlResult .= ' <div class="view-more-content">';
                        $htmlResult .= '<h5 class="dashboard-card-title">' . !empty($report_data['report_title']) ? $report_data['report_title'] : '' . '</h5>';

                        $timestamp = strtotime($report_data['created_at']);

                        $formattedDate = date('d/m/Y', $timestamp);

                        $htmlResult .= '<h5 class="mb-0 fsb-1 fw-600">' . !empty($formattedDate) ? $formattedDate : '' . '</h5>';
                        $htmlResult .= '</div>';
                        $htmlResult .= '</div>';

                        $htmlResult .= '<div class="view-more-right d-flex gap-2">';
                        $htmlResult .= '<a href="' . !empty($report_data['report_path']) ? $report_data['report_path'] : '' . '" class="view-more-view" target="_blank">';
                        $htmlResult .= '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">';
                        $htmlResult .= '<path d="M2.91699 7.00016C2.91699 7.00016 4.40158 4.0835 7.00033 4.0835C9.59849 4.0835 11.0837 7.00016 11.0837 7.00016C11.0837 7.00016 9.59849 9.91683 7.00033 9.91683C4.40158 9.91683 2.91699 7.00016 2.91699 7.00016Z" stroke="#111111" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round"/>';
                        $htmlResult .= '<path d="M12.25 9.91667V11.0833C12.25 11.3928 12.1271 11.6895 11.9083 11.9083C11.6895 12.1271 11.3928 12.25 11.0833 12.25H2.91667C2.60725 12.25 2.3105 12.1271 2.09171 11.9083C1.87292 11.6895 1.75 11.3928 1.75 11.0833V9.91667M12.25 4.08333V2.91667C12.25 2.60725 12.1271 2.3105 11.9083 2.09171C11.6895 1.87292 11.3928 1.75 11.0833 1.75H2.91667C2.60725 1.75 2.3105 1.87292 2.09171 2.09171C1.87292 2.3105 1.75 2.60725 1.75 2.91667V4.08333M7 7.58333C7.15471 7.58333 7.30308 7.52187 7.41248 7.41248C7.52187 7.30308 7.58333 7.15471 7.58333 7C7.58333 6.84529 7.52187 6.69692 7.41248 6.58752C7.30308 6.47812 7.15471 6.41667 7 6.41667C6.84529 6.41667 6.69692 6.47812 6.58752 6.58752C6.47812 6.69692 6.41667 6.84529 6.41667 7C6.41667 7.15471 6.47812 7.30308 6.58752 7.41248C6.69692 7.52187 6.84529 7.58333 7 7.58333Z" stroke="#111111" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round"/>';
                        $htmlResult .= '</svg>';
                        $htmlResult .= 'View';
                        $htmlResult .= '</a>';
                        $htmlResult .= '<a href="#" class="view-more-view" onclick="printDocument(' . !empty($report_data['report_path']) ? $report_data['report_path'] : '' . ')">';
                        $htmlResult .= '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">';
                        $htmlResult .= '<path d="M4.08366 5.83317C3.96829 5.83317 3.8555 5.86738 3.75958 5.93148C3.66365 5.99558 3.58888 6.08668 3.54473 6.19327C3.50058 6.29986 3.48903 6.41715 3.51153 6.53031C3.53404 6.64346 3.5896 6.7474 3.67118 6.82898C3.75276 6.91056 3.8567 6.96612 3.96986 6.98863C4.08301 7.01114 4.2003 6.99958 4.30689 6.95543C4.41348 6.91128 4.50459 6.83652 4.56868 6.74059C4.63278 6.64466 4.66699 6.53188 4.66699 6.4165C4.66699 6.26179 4.60553 6.11342 4.49614 6.00402C4.38674 5.89463 4.23837 5.83317 4.08366 5.83317ZM11.0837 3.49984H10.5003V1.74984C10.5003 1.59513 10.4389 1.44675 10.3295 1.33736C10.2201 1.22796 10.0717 1.1665 9.91699 1.1665H4.08366C3.92895 1.1665 3.78058 1.22796 3.67118 1.33736C3.56178 1.44675 3.50033 1.59513 3.50033 1.74984V3.49984H2.91699C2.45286 3.49984 2.00774 3.68421 1.67956 4.0124C1.35137 4.34059 1.16699 4.78571 1.16699 5.24984V8.74984C1.16699 9.21397 1.35137 9.65909 1.67956 9.98727C2.00774 10.3155 2.45286 10.4998 2.91699 10.4998H3.50033V12.2498C3.50033 12.4045 3.56178 12.5529 3.67118 12.6623C3.78058 12.7717 3.92895 12.8332 4.08366 12.8332H9.91699C10.0717 12.8332 10.2201 12.7717 10.3295 12.6623C10.4389 12.5529 10.5003 12.4045 10.5003 12.2498V10.4998H11.0837C11.5478 10.4998 11.9929 10.3155 12.3211 9.98727C12.6493 9.65909 12.8337 9.21397 12.8337 8.74984V5.24984C12.8337 4.78571 12.6493 4.34059 12.3211 4.0124C11.9929 3.68421 11.5478 3.49984 11.0837 3.49984ZM4.66699 2.33317H9.33366V3.49984H4.66699V2.33317ZM9.33366 11.6665H4.66699V9.33317H9.33366V11.6665ZM11.667 8.74984C11.667 8.90455 11.6055 9.05292 11.4961 9.16232C11.3867 9.27171 11.2384 9.33317 11.0837 9.33317H10.5003V8.74984C10.5003 8.59513 10.4389 8.44675 10.3295 8.33736C10.2201 8.22796 10.0717 8.1665 9.91699 8.1665H4.08366C3.92895 8.1665 3.78058 8.22796 3.67118 8.33736C3.56178 8.44675 3.50033 8.59513 3.50033 8.74984V9.33317H2.91699C2.76228 9.33317 2.61391 9.27171 2.50451 9.16232C2.39512 9.05292 2.33366 8.90455 2.33366 8.74984V5.24984C2.33366 5.09513 2.39512 4.94675 2.50451 4.83736C2.61391 4.72796 2.76228 4.6665 2.91699 4.6665H11.0837C11.2384 4.6665 11.3867 4.72796 11.4961 4.83736C11.6055 4.94675 11.667 5.09513 11.667 5.24984V8.74984Z" fill="#111111"/>';
                        $htmlResult .= '</svg>';
                        $htmlResult .= 'Print';
                        $htmlResult .= '</a>';

                        $htmlResult .= '</div>';
                        $htmlResult .= '</div>';
                    }
                }
                $htmlResult .= '</div>';
                $htmlResult .= '</div>';
            }

        }
        return $htmlResult;

    }

}
