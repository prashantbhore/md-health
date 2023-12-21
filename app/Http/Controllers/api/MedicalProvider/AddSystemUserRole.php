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
use App\Models\MedicalProviderRole;

class AddSystemUserRole extends BaseController
{

public function add_system_user(Request $request)
{

    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:common_user_login,email|unique:md_medical_provider_register,email',
        'password' => 'required|min:6',
        'roll_id' => 'required|integer',
        'previlages' => 'required|integer',
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
       // 'created_by' =>Auth::guard('md_health_medical_providers_registers')->user()->id,
        'created_by'=>1,
    ];

    $commonUserRegistration = CommonUserLoginTable::create($userData);
    $lastInsertedId = $commonUserRegistration->id;

   
    $providerData = [
        'company_name' => $request->name,
        'roll_id'=>$request->roll_id,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'modified_ip_address' => $request->ip(),
        //'created_by' =>Auth::guard('md_health_medical_providers_registers')->user()->id,
        'created_by'=>1,
    ];

    $mdProviderRegistration = MedicalProviderRegistrater::create($providerData);

    $providerUniqueId = '#MDPRVDR' . str_pad($mdProviderRegistration->id, 6, '0', STR_PAD_LEFT);

    $updateUniqueId = MedicalProviderRegistrater::where('id', $mdProviderRegistration->id)
        ->update(['provider_unique_id' => $providerUniqueId]);

    $commonUserRegistrationUpdate = CommonUserLoginTable::where('id', $lastInsertedId)
        ->update(['user_id' => $mdProviderRegistration->id, 'status' => 'active']);

        $role = MedicalProviderRole::find($request->roll_id);
        $role->privilege =  $request->privileges;
        $role->save();
        
 if (!empty($commonUserRegistrationUpdate )){
            return response()->json([
                'status' => 200,
                'message' => 'System user added successfully.',
               
            ]);
        } else{
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. system user can be added.',
            ]);
}
}

public function provider_system_user_list(){

       //$provider_id = Auth::guard('md_health_medical_providers_registers')->user()->id;
       $provider_id = 1;
        $sytem_user_list=MedicalProviderRegistrater::where('roll_id','!=',1)->where('status','active')->where('created_by',$provider_id)->with('role')->get();

        if (!empty( $sytem_user_list)){


            $selected_data = [];

            foreach ( $sytem_user_list as $system_user){
                $selected_data[] = [
                    'id' => $system_user->id,
                    'provider_unique_id' => $system_user->provider_unique_id,
                    'company_name' => $system_user->company_name,
                    'email' => $system_user->email,
                    'role_name' => $system_user->role->role_name,
                ];
            }



            return response()->json([
                'status' => 200,
                'message' => 'System user list found.',
                'system_user' => $selected_data,
               
            ]);
        } else{
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong. systrm user list not found',
            ]);
    }
}



public function edit_system_user(Request $request)
{
    $validator = Validator::make($request->all(), [
        'id' => 'required|string',
    ]);

    if ($validator->fails()) {
        return $this->sendError('Validation Error.', $validator->errors());
    }


    //$provider_id = Auth::guard('md_health_medical_providers_registers')->user()->id;

    $provider_id = 1;

    $sytem_user_list = MedicalProviderRegistrater::where('roll_id', '!=', 1)
        ->where('status', 'active')
        ->where('created_by', $provider_id)
        ->with('role')
        ->where('id', $request->id)
        ->first(); 

    if (!is_null($sytem_user_list)) {
        $selected_data = [
            'id' => $sytem_user_list->id,
            'provider_unique_id' => $sytem_user_list->provider_unique_id,
            'company_name' => $sytem_user_list->company_name,
            'email' => $sytem_user_list->email,
            'role_id' => $sytem_user_list->role->id,
            'role_name' => $sytem_user_list->role->role_name,
        ];

        return response()->json([
            'status' => 200,
            'message' => 'System user retrieved successfully.',
            'system_user' => $selected_data,
        ]);
    } else {
        return response()->json([
            'status' => 404,
            'message' => 'System user not found or something went wrong.',
        ]);
    }
}




public function delete_system_user(Request $request)
{
    $validator = Validator::make($request->all(), [
        'id' => 'required|string',
    ]);

    if ($validator->fails()) {
        return $this->sendError('Validation Error.', $validator->errors());
    }

    $provider_id = 1;
    $system_user = MedicalProviderRegistrater::where('id', $request->id)->update('status','delete');
    

    if (!is_null($system_user)) {
        return response()->json([
            'status' => 200,
            'message' => 'System user deleted successfully.',
        ]);
    } else {
        return response()->json([
            'status' => 404,
            'message' => 'System user not found or you do not have permission to delete.',
        ]);
    }
}










}

