<?php

namespace App\Http\Controllers\Front\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;

class MedicalProviderLogin extends Controller
{
    public function index()
    {
        return !empty(Session::has('MDMedicalProvider*%')) ? redirect('medical-provider-dashboard') :  view('front/mdhealth/authentication/sign-in');
    }
    

    //already admin lagin in browser then direct show dashboard using session
 

    //this function is used for check login details is present in database



//     public function medical_provider_login(Request $request)
//     {
//         return $request;
//         $validator = Validator::make($request->all(), [
//             'email' => 'required',
//             'password' => 'required'
//         ]);

//         // $validation_message = '';

//         // $validation_message = '';

//         // if ($request->password == '') {
//         //     $validation_message .= 'Password field';
//         // }
//         // if ($request->email == '') {
//         //     if ($validation_message == '') {
//         //         $validation_message .= 'email  field';
//         //     } else {
//         //         $validation_message .= ' & email  field';
//         //     }
//         // }


//         if ($validator->fails()) {
//             return $this->sendError('Validation Error.', $validator->errors());
//         }

//         if ($request->platform_type == 'web') {
//             if (Auth::guard('md_health_medical_providers_registers')->attempt([
//                 'email' => $request->email,
//                 'password' => $request->password,
//                 'status' => 'active',
//             ])) {
//                 $customer = Auth::guard('md_health_medical_providers_registers')->user();
//                 $success['token'] =  $customer->createToken('MyApp')->plainTextToken;
//                 $otp = rand(1111, 9999);

//                 CustomerRegistration::where('id', $customer->id)->update([
//                     // 'shop_owner_last_login' => Carbon::now(),
//                     'otp_expiring_time' => time() + 20,
//                     // 'login_otp' => $otp,
//                     'fcm_token' => $request->fcm_token,
//                     'access_token' => $success['token']
//                 ]);

//                 $customer_logs = [];
//                 $customer_logs['customer_id'] = !empty($customer->id) ? $customer->id : '';
//                 $customer_logs['status'] = 'active';
//                 $customer_logs['type'] = 'login';
//                 CustomerLogs::create($customer_logs);

//                 return redirect('/sms-code');
//                 // return response()->json([
//                 //     'status' => 200,
//                 //     'message' => 'Login successfull.',
//                 //     'mobile_number' => $customer->phone,
//                 //     'full_name' => $customer->full_name,
//                 //     'success_token' => $success,
//                 // ]);
//             } else {
//                 $customer = CustomerRegistration::where('status', 'active')
//                     ->select('id')
//                     ->where('email', $request->email)
//                     ->first();
//                 if ($customer) {
//                     $customer_logs = [];
//                     $customer_logs['customer_id'] = !empty($customer->id) ? $customer->id : '';
//                     $customer_logs['status'] = 'inactive';
//                     $customer_logs['type'] = 'login';
//                     CustomerLogs::create($customer_logs);
//                     return redirect('/sign-in-web')->with('error',"Your credencials does not matched.");
//                 }

//                 // return response()->json([
//                 //     'status' => 404,
//                 //     'message' => 'Unauthorised.',
//                 // ]);
//             }
//         } else {
//         if (Auth::guard('md_health_medical_providers_registers')->attempt([
//             'email' => $request->email,
//             'password' => $request->password,
//             'status' => 'active',
//         ])) {
//             $provider_id = Auth::guard('md_health_medical_providers_registers')->user();
//             $success['token'] =  $provider_id->createToken('MyApp')->plainTextToken;

//             MedicalProviderRegistrater::where('id', $provider_id->id)->update([
//                 // 'shop_owner_last_login' => Carbon::now(),
//                 // 'otp_expiring_time' => time() + 20,
//                 // 'login_otp' => $otp,
//                 'fcm_token' => $request->fcm_token,
//                 'access_token' => $success['token']
//             ]);

//             return response()->json([
//                 'status' => 200,
//                 'message' => 'Login successfull.',
//                 'success_token' => $success,
//                 'mobile_no' => $provider_id->mobile_no,
//                 'company_name' => $provider_id->company_name,
//             ]);
//         } else {
//             return response()->json([
//                 'status' => 404,
//                 'message' => 'Unauthorised.',
//             ]);
//         }
//     }
// }

//     public function super_admin_login(Request $request)
//     {
//         $request->validate([
//             'email' => 'required|email',
//             'password' => 'required'
//         ]);

//         $admin_data = array(
//             'email' => $request->get('email'),
//             'password' => $request->get('password')
//         );

      
       
//         if (Auth::guard('superadmin')->attempt($admin_data)){
         

//             $user_id = Auth::guard('superadmin')->user()->id;

//             // dd($user_id);

//             Session::put('md_super_admin*%', $user_id);

//             return redirect('admin/dashboard')->with('success', 'Login successfull!');


//         } else {
            
//             return redirect('/')->with('error', 'Invalid Login Details!');
//         }
//     }



    //destroy login session data using logout function
    // public function logout(Request $request)
    // {
    //     Auth::logout();
    //     Session::flush();
    //     return redirect('/')->with('success', 'Logged out Successfully!');
    // }
    

    // public function change_password_view()
    // {
    //     return view('admin.login.change_password');
    // }

    // public function change_password(Request $request)
    // {
    //     $request->validate([
    //         'old_password' => 'required|string',
    //         'confirm_password' => 'required|string',
    //     ]);

    //     $email = Auth::guard('superadmin')->user()->email;

    //     $user_data = DB::table('md_super_admin')->where('email', '=', $email)->first();

    //     // check old password
    //     if (Hash::check($request->old_password, $user_data->password)) {
    //         $input['password'] = Hash::make($request->confirm_password);
    //         Db::table('md_super_admin')->where('email', '=', $email)->update($input);
    //         Auth::logout();
    //         Session::flush();
    //         return redirect('superadmin')->with('success', 'Password Changed Successfully.');
    //     } else {
    //         return redirect('superadmin/change-password')->with('error', 'Enter correct old password.');
    //     }
    // }

    // public function check_old_password(Request $request)
    // {
    //     $email = Auth::guard('superadmin')->user()->email;
    //     $old_password = Db::table('md_super_admin')->where('email', '=', $email)
    //     ->select('password')
    //     ->first();
        
    //     $check_password = Hash::check($request->old_password, $old_password->password);

    //     return !empty($check_password) ? 'true' : 'false';
    // }
}
