<?php

namespace App\Http\Controllers\api\MedicalProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController as BaseController;
use Validator;
use App\Traits\MediaTrait;
use Str;
use Auth;
use Hash;
use App\Models\CommonUserLoginTable;
use App\Models\MedicalProviderRegistrater;

class AddSystemUserRole extends BaseController
{


//       public function add_system_user(Request $request){


//         $validator = Validator::make($request->all(), [
//             'email' => 'required|string',
//         ]);

//         if ($validator->fails()){
//             return $this->sendError('Validation Error.', $validator->errors());
//         }
          

//         if (!empty($request->email)){
//             return response()->json([
//                 'status' => 200,
//                 'message' => 'System user added successfully.',
//                 'packages_active_list' => $request->email,
//             ]);
//         } else{
//             return response()->json([
//                 'status' => 404,
//                 'message' => 'Something went wrong. systrm user can be added.',
//             ]);
//         }
// }







public function add_system_user(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:common_user_login,email|unique:md_medical_provider_register,email',
        'password' => 'required|min:6',
        'roll_id' => 'required|integer',
    ]);

    $commonUserExist = CommonUserLoginTable::where('status', 'active')
        ->where(function ($query) use ($request) {
            $query->where('email', $request->email)
                ->orWhere('mobile_no', $request->phone);
        })
        ->first();

    if ($commonUserExist) {
        return response()->json(['error' => 'Email or mobile number already exists.'], 400);
    }


    $userData = [
        'email' => $request->email,
        'mobile_no' => $request->phone,
        'user_type' => 'medicalprovider',
        'password' => Hash::make($request->password),
    ];

    $commonUserRegistration = CommonUserLoginTable::create($userData);
    $lastInsertedId = $commonUserRegistration->id;

   
    $providerData = [
        'company_name' => $request->name,
        'roll_id'=>$request->roll_id,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'modified_ip_address' => $request->ip(),
    ];

    $mdProviderRegistration = MedicalProviderRegistrater::create($providerData);

    $providerUniqueId = '#MDPRVDR' . str_pad($mdProviderRegistration->id, 6, '0', STR_PAD_LEFT);

    $updateUniqueId = MedicalProviderRegistrater::where('id', $mdProviderRegistration->id)
        ->update(['provider_unique_id' => $providerUniqueId]);

    $commonUserRegistrationUpdate = CommonUserLoginTable::where('id', $lastInsertedId)
        ->update(['user_id' => $mdProviderRegistration->id, 'status' => 'active']);

    
    return response()->json(['success' => 'User registered successfully.'], 200);
}







}
