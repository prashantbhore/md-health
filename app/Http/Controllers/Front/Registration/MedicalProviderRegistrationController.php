<?php

namespace App\Http\Controllers\Front\Registration;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\CommonUserLoginTable;
use App\Models\Country;
use App\Models\MedicalProviderLicense;
use App\Models\MedicalProviderLogo;
use App\Models\MedicalProviderRegistrater;
use App\Traits\MediaTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Session;

class MedicalProviderRegistrationController extends Controller
{
    use MediaTrait;
    public function index()
    {
        $countries = Country::get();
        $cities = Cities::get();
        return view('front/mdhealth/authentication/user-account', compact('countries', 'cities'));
    }


    public function md_register_medical_provider(request $request)
    {
        $email_exist = MedicalProviderRegistrater::where('status', 'active')
            ->where('email', $request->email)
            ->first();
        $email_exist_common = CommonUserLoginTable::where('status', 'active')
            ->where('email', $request->email)
            ->first();

        if ($email_exist || $email_exist_common) {
                return redirect('/user-account')->with('error', "Email id already exist.");

        } else {
            $phone_exist = MedicalProviderRegistrater::where('status', 'active')
                ->where('mobile_no', $request->phone)
                ->first();
            $phone_exist_common = CommonUserLoginTable::where('status', 'active')
                ->where('mobile_no', $request->phone)
                ->first();

            if ($phone_exist || $phone_exist_common) {
                    return redirect('/user-account')->with('error', "Mobile number already exist.");
            }
        }

        $commonData = [];
        $commonData['email'] = $request->email;
        $commonData['mobile_no'] = $request->phone;
        $commonData['user_type'] = 'medicalprovider';
        $commonData['password'] = Hash::make($request->password);
        $common_data_registration = CommonUserLoginTable::create($commonData);
        $lastInsertedId = $common_data_registration->id;
        // return $lastInsertedId;

        $md_provider_input = [];
        $md_provider_input['company_name'] = $request->company_name;
        $md_provider_input['city_id'] = $request->city_id;
        $md_provider_input['email'] = $request->email;
        $md_provider_input['mobile_no'] = $request->phone;
        $md_provider_input['tax_no'] = $request->tax_no;
        $md_provider_input['company_address'] = $request->company_address;
        $md_provider_input['password'] = Hash::make($request->password);
        $md_provider_input['modified_ip_address'] = $request->ip();
        $md_provider_registration = MedicalProviderRegistrater::create($md_provider_input);

        $MedicalProviderRegistrater = MedicalProviderRegistrater::select('id')->get();
        if (!empty($MedicalProviderRegistrater)) {
            foreach ($MedicalProviderRegistrater as $key => $value) {
                $length = strlen($value->id);
                if ($length == 1) {
                    $provider_unique_id = '#MDPRVDR00000' . $value->id;
                } elseif ($length == 2) {
                    $provider_unique_id = '#MDPRVDR0000' . $value->id;
                } elseif ($length == 3) {
                    $provider_unique_id = '#MDPRVDR000' . $value->id;
                } elseif ($length == 4) {
                    $provider_unique_id = '#MDPRVDR00' . $value->id;
                } elseif ($length == 5) {
                    $provider_unique_id = '#MDPRVDR0' . $value->id;
                } else {
                    $provider_unique_id = '#MDPRVDR' . $value->id;
                }
                // dd($MedicalProviderRegistrater);
            }
                $update_unique_id = MedicalProviderRegistrater::where('id', $value->id)->update(['provider_unique_id' => $provider_unique_id]);
                $common_data_registrationid = CommonUserLoginTable::where('id', $lastInsertedId)->update(['user_id' => $value->id,'status'=>'active']);

                $user_data = array(
                    'email' => $request->get('email'),
                    'mobile_no' => $request->get('phone'),
                    'password' => $request->get('password')
                );
                $email = $request->email;
                $password = $request->password;
                if (Auth::guard('md_health_medical_providers_registers')->attempt($user_data)) {
                    if (
                        Auth::guard('md_health_medical_providers_registers')->attempt([
                            'email' => $request->email,
                            'password' => $request->password,
                            'status' => 'active',
                        ])
                    ) {
                        // $user_id = Auth::guard('md_customer_registration')->user()->id;
                        $providers = Auth::guard('md_health_medical_providers_registers')->user();
                        $otp = rand(1111, 9999);
                        $id = $providers->id;
                        MedicalProviderRegistrater::where('id', $providers->id)->update([
                            'otp_expiring_time' => time() + 20,
                            'registration_otp' => $otp,
                        ]);
                        CommonUserLoginTable::where('id', $lastInsertedId)->update([
                            // 'otp_expiring_time' => time() + 20,
                            'registration_otp' => $otp,
                        ]);
                        return redirect('sms-code')->with([
                            // 'error' => "OTP does not match.",
                            'email' => $email,
                            'password' => $password,
                        ]);
                        // return view('front/mdhealth/authentication/sms-code', compact('password','email'));

                    } else {
                        return redirect('/sign-in-web')->with('error', "Your credencials does not matched.");
                    }
                }
           

           


            if ($request->has('company_logo_image_path')) {
                if ($request->file('company_logo_image_path')) {
                    $md_provider_input_image_logo['company_logo_image_path'] = $this->verifyAndUpload($request, 'company_logo_image_path', 'company/company_logo');
                    $original_name = $request->file('company_logo_image_path')->getClientOriginalName();
                    $md_provider_input_image_logo['company_logo_image_name'] = $original_name;
                }
            }
            MedicalProviderLogo::create($md_provider_input_image_logo);


            if ($request->has('company_licence_image_path')) {
                if ($request->file('company_licence_image_path')) {
                    $md_provider_input_image_license['company_licence_image_path'] = $this->verifyAndUpload($request, 'company_licence_image_path', 'company/licence');
                    $original_name = $request->file('company_licence_image_path')->getClientOriginalName();
                    $md_provider_input_image_license['company_licence_image_name'] = $original_name;
                }
            }

            MedicalProviderLicense::create($md_provider_input_image_license);



            if (!empty($md_provider_registration)) {
                if ($request->platform_type != 'ios' && $request->platform_type != 'android') {
                    return redirect('/medical-provider-dashboard')->with('success', "Profile created successfully.");
                }

            } else {
                if ($request->platform_type != 'ios' && $request->platform_type != 'android') {
                    return redirect('/user-account')->with('success', "Profile not completed.");
                }

            }
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        return redirect('/')->with('success', 'Logout Successfully!');
    }
}


 // $user_data = array(
            //     'email' => $request->get('email'),
            //     'mobile_no' => $request->get('phone'),
            //     'password' => $request->get('password')
            // );

            // login by Auth
            // if (Auth::guard('md_health_medical_providers_registers')->attempt($user_data)) {
            //     if (Auth::guard('md_health_medical_providers_registers')->user()->status != 'active') {
            //         Auth::logout();
            //         Session::flush();
            //         return redirect('/')->with('error', 'Contact to admin to login.');
            //     } else {
            //         // Auth::login($user_data);
            //         $user_id = Auth::guard('md_health_medical_providers_registers')->user()->id;
            //         $user_email = Auth::guard('md_health_medical_providers_registers')->user()->email;

            //         Session::put('MDMedicalProvider*%', $user_id);
            //         Session::put('email', $user_email);
            //         // return redirect('admin/dashboard')->with('success', 'Login successfully!');
            //     }
            // } else {
            //     return redirect('/user-account')->with('error', 'Invalid Login Details!');

            // }
