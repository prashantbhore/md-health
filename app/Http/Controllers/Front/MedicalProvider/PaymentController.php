<?php

namespace App\Http\Controllers\Front\MedicalProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ApiService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Crypt;
use Auth;


class PaymentController extends Controller
{

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(){
        
        $token = Session::get('login_token');

        $apiUrl = url('api/md-provider-transaction-total-pending');
        $method = 'GET';
        $body=null;

        $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);


        $total_pending_amount =  '';
        if ( $responseData[ 'status' ] == '200' ){
            $total_pending_amount=$responseData['total_pending_amount']; 
        }


        $apiUrl = url('api/md-provider-transaction-total-completed');
        $method = 'GET';
        $body=null;

        $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);

        $total_completed_amount =  '';
        if ( $responseData[ 'status' ] == '200' ){
            $total_completed_amount=$responseData['total_completed_amount']; 
        }


        


        $apiUrl = url('api/md-provider-transaction-total-business-amount');
        $method = 'GET';
        $body=null;

        $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);


        $total_business_amount = '';
        if ( $responseData[ 'status' ] == '200' ){
            $total_business_amount=$responseData['total_business_amount'];  
        }



        $apiUrl = url('api/md-provider-bank-account-list');
        $method = 'GET';
        $body=null;

        $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);

        $medical_provider_bank_details= '';
        if ( $responseData[ 'status' ] == '200' ){
            $medical_provider_bank_details=$responseData['data'];
        }



        $apiUrl = url('api/md-provider-transaction-list');
        $method = 'GET';
        $body=null;

        $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);

        $payment_list= '';
        if ( $responseData[ 'status' ] == '200' ){
            $payment_list=$responseData['payment_list'];
        }

        return view('front.mdhealth.medical-provider.payment-information',compact('total_pending_amount','total_completed_amount','total_business_amount','payment_list','medical_provider_bank_details'));
    }




    public function storeBankDetails(Request $request){

        $token = Session::get('login_token');

        $apiUrl = url('api/md-provider-add-bank-account');



        $account_number = $request->account_number;

        $bank_name= $request->bank_name;

         $id=$request->id;

        
       $body=['account_number' =>  $account_number,
                'bank_name' =>  $bank_name,
                'id'=>$id,
            ];

       $method = 'POST';


        $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);

      
      
      return redirect('payment-information')->with( 'success', 'Account Deatils Saved Successfully');
       
    }


    public function peymentsearch(Request $request){

        dd($request->all());


        $token = Session::get('login_token');

        $apiUrl = url('api/md-provider-transaction-search');



        $account_number = $request->account_number;

        $bank_name= $request->bank_name;

         $id=$request->id;

        
       $body=['account_number' =>  $account_number,
                'bank_name' =>  $bank_name,
                'id'=>$id,
            ];

       $method = 'POST';


        $responseData = $this->apiService->getData($token, $apiUrl, $body, $method);
      
    }


    
}
