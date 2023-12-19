<?php

namespace App\Http\Controllers\api\MedicalProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController as BaseController;
use Validator;
use App\Traits\MediaTrait;
use App\Models\MedicalProviderAccountDetails;
use Str;
use Auth;

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



}