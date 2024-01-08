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
   
// return 'asdsa';
    // $request->validate([
    //     'name' => 'required|string',
    //     'email' => 'required|email|unique:common_user_login,email|unique:md_medical_provider_register,email',
    //     'password' => 'required|min:6',
    //     'roll_id' => 'required|integer',
    //     'previlages' => 'required|integer',
    // ]);

    // dd($request);

    // $commonUserExist = CommonUserLoginTable::where('status', 'active')
    //     ->where(function ($query) use ($request) {
    //         $query->where('email', $request->email)
    //             ->orWhere('mobile_no', $request->phone);
    //     })
    //     ->first();
    //    dd($commonUserExist);
    // if ($commonUserExist) {
    //     return response()->json([
    //         'status' => 404,
    //         'message' => 'Email or mobile number already exists.',
           
    //     ]);
    // }
    // dd($request);
    $email_exist = CommonUserLoginTable::where('email', $request->email)->first();
    if ($email_exist) {
        return response()->json([
            'status' => 404,
            'message' => 'Email already exist.',
        ]);
    } 

    $userData = [
        'email' => $request->email,
        'mobile_no' => $request->phone,
        'user_type' => 'medicalprovider',
        'password' => Hash::make($request->password),
       // 'created_by' =>Auth::guard('md_health_medical_providers_registers')->user()->id,
        'created_by'=>Auth::user()->id,
        // 'created_by'=>Auth::user()->id,
    ];



    $commonUserRegistration = CommonUserLoginTable::create($userData);
    // dd($commonUserRegistration);
    // dd($commonUserRegistration);
    $lastInsertedId = $commonUserRegistration->id;
   
    $providerData = [
        'company_name' => $request->name,
        'roll_id'=>$request->roll_id,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'previllages'=>$request->previlages,
        'modified_ip_address' => $request->ip(),
        //'created_by' =>Auth::guard('md_health_medical_providers_registers')->user()->id,
        'created_by'=>Auth::user()->id,
        // 'created_by'=>Auth::user()->id,
    ];

    $mdProviderRegistration = MedicalProviderRegistrater::create($providerData);
    
    $providerUniqueId = '#MDPRVDR' . str_pad($mdProviderRegistration->id, 6, '0', STR_PAD_LEFT);
    $updateUniqueId = MedicalProviderRegistrater::where('id', $mdProviderRegistration->id)
    ->update(['provider_unique_id' => $providerUniqueId]);
    
    $commonUserRegistrationUpdate = CommonUserLoginTable::where('id', $lastInsertedId)
    ->update(['user_id' => $mdProviderRegistration->id, 'status' => 'active']);
   

    // // $roleId = $request->roll_id;
    // $roleId = $mdProviderRegistration->id;

    // $privileges = $request->previlages; // Ensure correct spelling here
    
    // // $role = MedicalProviderRole::find($roleId);
    // $role = MedicalProviderRegistrater::find($roleId);
    
    // if ($role) {
    //     $role->update(['privilege' => $privileges]); 
    // }
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


// Mplus04
public function update_system_user(Request $request)
{
    // dd($request);
    $userId = $request->input('id');
// return $userId;
    // Validate the incoming request data
    // $request-> $request->validate([
    //     'email' => 'required|email',
    //     'name' => 'required',
    //     // 'password' => 'required|min:6',
    //     'roll_id' => 'required|exists:medical_provider_roles,id',
    //     'privileges' => 'required',
    // ]);
    // Fetch the user by ID
    $user = CommonUserLoginTable::where('user_id', $userId)->first();
    $user2 = MedicalProviderRegistrater::where('id', $userId)->first();
    $email_exist = CommonUserLoginTable::where('email', $request->email)->first();
    // if ($email_exist) {
    //     return response()->json([
    //         'status' => 404,
    //         'message' => 'Email already exist.',
    //     ]);
    // } 
    // else {
    //     return response()->json([
    //         'status' => 404,
    //         'message' => 'User not found.',
    //     ]);
    // }
        // Check if the user exists
        
        if ($user) {
        // Update user data
        $userData = [
            'email' => $request->email,
            'name' => $request->name,
            // 'user_type' => 'medicalprovider',
            // 'password' => Hash::make($request->password']),
            'created_by' => Auth::user()->id,
        ];

        $user->update($userData);
        $user2->update($userData);
      

        // Update user role and privileges
        $roleId = $request->roll_id;
        $privileges = $request->previlages;

        // dd($request);
        // $role = MedicalProviderRole::find($roleId);
        $role = MedicalProviderRegistrater::find($userId);

        if ($role) {
            $role->update(['previllages' => $privileges]);
           
        }

        return response()->json([
            'status' => 200,
            'message' => 'User updated successfully.',
        ]);
    } else {
        return response()->json([
            'status' => 404,
            'message' => 'User not found.',
        ]);
    }
}
// Mplus04


public function provider_system_user_list(){

       //$provider_id = Auth::guard('md_health_medical_providers_registers')->user()->id;
       $provider_id =Auth::user()->id;
    //    $provider_id =Auth::user()->id;
        $sytem_user_list=MedicalProviderRegistrater::where('roll_id','!=',1)
        ->where('status','active')
        ->where('created_by',$provider_id)
        ->with('role')
        ->get();

        if (!empty( $sytem_user_list)){


            $selected_data = [];

            foreach ( $sytem_user_list as $system_user){
                // dd($system_user);
                // $selected_data[]= [
                // // dd($system_user);
                $selected_data[]= [
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
        'id' => 'required',
        // 'id' => 'required',
    ]);

    if ($validator->fails()) {
        return $this->sendError('Validation Error.', $validator->errors());
    }


    //$provider_id = Auth::guard('md_health_medical_providers_registers')->user()->id;

    $provider_id = Auth::user()->id;
    // $provider_id = Auth::user()->id;

    $sytem_user_list = MedicalProviderRegistrater::where('roll_id', '!=', 1)
        ->select('id','company_name',
        'provider_unique_id',
        'previllages',
        'email',
        'roll_id')
        ->where('status', 'active')
        ->where('created_by', $provider_id)
        ->with('role')
        ->where('id', $request->id)
        ->first(); 
        
// dd($sytem_user_list);
    if (!is_null($sytem_user_list)) {
        $selected_data = [
            'id' => $sytem_user_list->id,
            'provider_unique_id' => $sytem_user_list->provider_unique_id,
            'name' => $sytem_user_list->company_name,
            'email' => $sytem_user_list->email,
            'previlages' => $sytem_user_list->previllages,
            'roll_id' => $sytem_user_list->role->id,
            'role_name' => $sytem_user_list->company_name,
        ];
// dd($selected_data);
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
        'id' => 'required',
    ]);

    if ($validator->fails()) {
        return $this->sendError('Validation Error.', $validator->errors());
    }

    $provider_id = Auth::user()->id;
    // $provider_id = Auth::user()->id;
    $system_user = MedicalProviderRegistrater::where('id', $request->id)->update(['status' => 'delete']);
    $system_user2 = CommonUserLoginTable::where('user_id', $request->id)->update(['status' => 'delete']);

    // dd($system_user2);

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
