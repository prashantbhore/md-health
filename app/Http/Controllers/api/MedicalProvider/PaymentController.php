<?php

namespace App\Http\Controllers\api\MedicalProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController as BaseController;
use App\Models\CustomerPurchaseDetails;
use Validator;
use App\Traits\MediaTrait;
use App\Models\MedicalProviderAccountDetails;
use App\Models\MedicalProviderLogo;
use Str;
use Auth;
use Storage;

class PaymentController extends BaseController{


    public function add_provider_account(Request $request){
       
        $validator = Validator::make($request->all(), [
            'account_number' => 'required|string|min:10|max:20',
            'bank_name' => 'required|string|min:2|max:50',
        ], [
            'account_number.required' => 'The account number is required.',
            'account_number.string' => 'The account number must be a string.',
            'account_number.min' => 'The account number must be at least :min characters.',
            'account_number.max' => 'The account number must not exceed :max characters.',
            'bank_name.required' => 'The bank name is required.',
            'bank_name.string' => 'The bank name must be a string.',
            'bank_name.min' => 'The bank name must be at least :min characters.',
            'bank_name.max' => 'The bank name must not exceed :max characters.',
        ]);
        
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
       
        // $input['medical_provider_id'] = Auth::user()->id;

        $input['medical_provider_id'] = 1;

        $input['account_number'] = $request->account_number;
        $input['bank_name'] =  $request->bank_name;

        $AddAccountNumber = MedicalProviderAccountDetails::create($input);



        if (!empty($AddAccountNumber)){
            return response()->json([
                'status' => 200,
                'message' => 'account details saved successfully',
                
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong.account details does not saved.',
            ]);
        }
    }

    public function transaction_list_view(){
        //$provider_id=Auth::user()->id;
        $provider_id = 1; // Replace this with the actual provider ID
    
        $customer_transaction_details = CustomerPurchaseDetails::where('status', 'active')
            ->where('provider_id', $provider_id)->with('provider_logo')
            ->get();
    
        if ($customer_transaction_details->isNotEmpty()) {
            $order_details = [];
    
            foreach ($customer_transaction_details as $transaction) {
                $order_id = !empty($transaction->order_id) ? $transaction->order_id : '';
                $provider_logo = !empty($transaction->provider_logo->company_logo_image_path) ?url(Storage::url($transaction->provider_logo->company_logo_image_path)) : '';
    
                $completed_payments = !empty($transaction->paid_amount) ? $transaction->paid_amount : 0;
                $pending_payments = !empty($transaction->pending_payment) ? $transaction->pending_payment : 0;
    
           
                if (!isset($order_details[$transaction->id])) {
                    $order_details[$transaction->id] = [
                        'transaction_id' => $transaction->id,
                        'order_id' => $order_id,
                        'provider_logo' => $provider_logo,
                        'completed_amount' => 0,
                        'pending_amount' => 0,
                    ];
                }
    
             
                $order_details[$transaction->id]['completed_amount'] += $completed_payments;
                $order_details[$transaction->id]['pending_amount'] += $pending_payments;
    
            }
    
            $formatted_order_details = array_values($order_details);
    
            return response()->json([
                'status' => 200,
                'message' => 'Transaction list found',
                'order_details' => $formatted_order_details,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Transaction list not found',
            ]);
        }
    }





    public function search_transactions(Request $request) {

        //$provider_id=Auth::user()->id;

        $provider_id = 1; // Replace this with the actual provider ID
    
        $validator = Validator::make($request->all(), [
            'search_query' => 'required|string|min:2', // Add validation rules for the search query
        ], [
            'search_query.required' => 'The search query is required.',
        ]);
    
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
    
        $search_query = $request->search_query;
    
        $customer_transaction_details = CustomerPurchaseDetails::where('status', 'active')
            ->where('provider_id', $provider_id)
            ->where(function ($query) use ($search_query){
                $query->where('order_id', 'like', "%$search_query%")
                    ->orWhere('purchase_type', 'like', "%$search_query%");
            })
            ->with('provider_logo')
            ->get();
    
        if ($customer_transaction_details->isNotEmpty()) {
            $order_details = [];
    
            foreach ($customer_transaction_details as $transaction) {
                $order_id = !empty($transaction->order_id) ? $transaction->order_id : '';
                $provider_logo = !empty($transaction->provider_logo->company_logo_image_path) ? url(Storage::url($transaction->provider_logo->company_logo_image_path)) : '';
    
                $completed_payments = !empty($transaction->paid_amount) ? $transaction->paid_amount : 0;
                $pending_payments = !empty($transaction->pending_payment) ? $transaction->pending_payment : 0;
    
                if (!isset($order_details[$transaction->id])) {
                    $order_details[$transaction->id] = [
                        'transaction_id' => $transaction->id,
                        'order_id' => $order_id,
                        'provider_logo' => $provider_logo,
                        'completed_amount' => 0,
                        'pending_amount' => 0,
                    ];
                }
    
                $order_details[$transaction->id]['completed_amount'] += $completed_payments;
                $order_details[$transaction->id]['pending_amount'] += $pending_payments;
            }
    
            $formatted_order_details = array_values($order_details);
    
            return response()->json([
                'status' => 200,
                'message' => 'Transaction search results found',
                'order_details' => $formatted_order_details,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No transactions found for the specified search query',
            ]);
        }
    }



    public function total_pending_amount(){
        //$provider_id=Auth::user()->id;
        $provider_id = 1; // Replace this with the actual provider ID
    
        $total_pending_amount = CustomerPurchaseDetails::where('status', 'active')
            ->where('provider_id', $provider_id)
            ->sum('pending_payment');



        if(!empty($total_pending_amount)){    
            return response()->json([
                'status' => 200,
                'message' => 'Total pending amount retrieved successfully',
                'total_pending_amount' => $total_pending_amount,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Total pending amount can not be retrived',
            ]);
        }
    }



public function total_paid_amount(){
    //$provider_id=Auth::user()->id;
    $provider_id = 1; // Replace this with the actual provider ID

    $total_completed_amount = CustomerPurchaseDetails::where('status', 'active')
        ->where('provider_id', $provider_id)
        ->sum('paid_amount');



        if(!empty($total_completed_amount)){    
            return response()->json([
                'status' => 200,
                'message' => 'Total completed amount retrieved successfully',
                'total_pending_amount' => $total_completed_amount,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Total completed amount can not be retrived',
            ]);
        }
}




public function total_business_amount(){

    //$provider_id=Auth::user()->id;
    $provider_id = 1; // Replace this with the actual provider ID

    $total_completed_amount = CustomerPurchaseDetails::where('status', 'active')
        ->where('provider_id', $provider_id)
        ->sum('paid_amount');


    $total_pending_amount = CustomerPurchaseDetails::where('status', 'active')
            ->where('provider_id', $provider_id)
            ->sum('pending_payment');    

    $total_business_amount= $total_completed_amount + $total_pending_amount ;       



        if(!empty($total_business_amount)){    
            return response()->json([
                'status' => 200,
                'message' => 'Total business amount retrieved successfully',
                'total_pending_amount' => $total_business_amount,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Total business amount can not be retrived',
            ]);
        }
}








}