<?php

namespace App\Http\Controllers\Front\Login;

use App\Http\Controllers\Controller;
use App\Models\CommonUserLoginTable;
use App\Models\CustomerRegistration;
use App\Models\MedicalProviderRegistrater;
use Illuminate\Http\Request;
use Auth;
use Session;

class CommonLoginController extends Controller
{
    public function user_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $email = $request->email;
        $password = $request->password;
        $login_type = $request->login_type;

        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );

        if (Auth::guard('commonuser')->attempt($user_data)) {
            $user_id = Auth::guard('commonuser')->user()->id;
            $user_type = Auth::guard('commonuser')->user()->user_type;

            if ($user_type == 'medicalprovider') {
                if (
                    Auth::guard('md_health_medical_providers_registers')->attempt([
                        'email' => $request->email,
                        'password' => $request->password,
                        'status' => 'active',
                    ])
                ) {
                    $providers = Auth::guard('md_health_medical_providers_registers')->user();
                    $otp = rand(1111, 9999);
                    $id = $providers->id;


                    MedicalProviderRegistrater::where('id', $providers->id)->update([
                        'otp_expiring_time' => time() + 20,
                        'login_otp' => $otp,
                    ]);
                    CommonUserLoginTable::where('id', $user_id)->update([
                        // 'otp_expiring_time' => time() + 20,
                        'login_otp' => $otp,
                    ]);
                    return redirect('sms-code')->with([
                        // 'error' => "OTP does not match.",
                        'email' => $email,
                        'password' => $password,
                        'login_type' => $login_type,
                    ]);
                    // return view('front/mdhealth/authentication/sms-code', compact('password','email'));

                } else {
                    return redirect('/sign-in-web')->with('error', "Your credencials does not matched.");
                }
            }

            elseif ($user_type == 'customer') {
                if (
                    Auth::guard('md_customer_registration')->attempt([
                        'email' => $request->email,
                        'password' => $request->password,
                        'status' => 'active',
                    ])
                ) {
                    $customers = Auth::guard('md_customer_registration')->user();
                    $otp = rand(1111, 9999);
                    $id = $customers->id;


                    CustomerRegistration::where('id', $customers->id)->update([
                        'otp_expiring_time' => time() + 20,
                        'login_otp' => $otp,
                    ]);
                    CommonUserLoginTable::where('id', $user_id)->update([
                        // 'otp_expiring_time' => time() + 20,
                        'login_otp' => $otp,
                    ]);
                    return redirect('sms-code')->with([
                        // 'error' => "OTP does not match.",
                        'email' => $email,
                        'password' => $password,
                        'login_type' => $login_type,
                    ]);
                    // return view('front/mdhealth/authentication/sms-code', compact('password','email'));

                } else {
                    return redirect('/sign-in-web')->with('error', "Your credencials does not matched.");
                }
            }
        } else {
            return redirect('/sign-in-web')->with('error', 'Invalid Login Details!');
        }
    }






    public function otp_verify_for_register(request $request)
    {
        $otpverify = implode('', $request->input('otp'));
        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );
        $email = $request->email;
        $password = $request->password;
        $login_type = $request->login_type;
        // dd($request.'<br>'.$otpverify);
        if (Auth::guard('commonuser')->attempt($user_data)) {
            $user_id = Auth::guard('commonuser')->user()->id;
            $user_type = Auth::guard('commonuser')->user()->user_type;

            if ($user_type == 'medicalprovider') {
                if (
                    Auth::guard('md_health_medical_providers_registers')->attempt([
                        'email' => $request->email,
                        'password' => $request->password,
                        'status' => 'active',
                    ])
                ) {
                    $providers = Auth::guard('md_health_medical_providers_registers')->user();

                    if ($login_type == 'login') {
                        $otpcheck = MedicalProviderRegistrater::where('id', $providers->id)
                            ->where('Login_otp', $otpverify)
                            ->where('status', 'active')
                            // ->where('otp_expiring_time', '>=', now())
                            ->first();

                        if ($otpcheck) {
                            // dd($otpcheck);
                            $user_id = Auth::guard('md_health_medical_providers_registers')->user()->id;
                            $user_email = Auth::guard('md_health_medical_providers_registers')->user()->email;
                            $user = Auth::guard('md_health_medical_providers_registers')->user();

                            Session::put('MDMedicalProvider*%', $user_id);
                            Session::put('email', $user_email);
                            Session::put('user', $user);
                            return redirect('/medical-provider-dashboard')->with('success', "Login successfully.");
                        } else {
                            return redirect('sms-code')->with([
                                'error' => "OTP does not match.",
                                'email' => $request->email,
                                'password' => $request->password,
                            ]);
                        }
                    } else {

                        $otpcheck = MedicalProviderRegistrater::where('id', $providers->id)
                            ->where('registration_otp', $otpverify)
                            ->where('status', 'active')
                            // ->where('otp_expiring_time', '>=', now())
                            ->first();

                        if ($otpcheck) {
                            // dd($otpcheck);
                            $user_id = Auth::guard('md_health_medical_providers_registers')->user()->id;
                            $user_email = Auth::guard('md_health_medical_providers_registers')->user()->email;
                            $user = Auth::guard('md_health_medical_providers_registers')->user();

                            Session::put('MDMedicalProvider*%', $user_id);
                            Session::put('email', $user_email);
                            Session::put('user', $user);
                            return redirect('/medical-provider-dashboard')->with('success', "Profile created successfully.");
                        } else {
                            return redirect('sms-code')->with([
                                'error' => "OTP does not match.",
                                'email' => $request->email,
                                'password' => $request->password,
                            ]);
                        }

                    }
                }
            }



            elseif ($user_type == 'customer') {
                if (
                    Auth::guard('md_customer_registration')->attempt([
                        'email' => $request->email,
                        'password' => $request->password,
                        'status' => 'active',
                    ])
                ) {
                    $providers = Auth::guard('md_customer_registration')->user();

                    if ($login_type == 'login') {
                        $otpcheck = CustomerRegistration::where('id', $providers->id)
                            ->where('Login_otp', $otpverify)
                            ->where('status', 'active')
                            // ->where('otp_expiring_time', '>=', now())
                            ->first();

                        if ($otpcheck) {
                            // dd($otpcheck);
                            $user_id = Auth::guard('md_customer_registration')->user()->id;
                            $user_email = Auth::guard('md_customer_registration')->user()->email;
                            $user = Auth::guard('md_customer_registration')->user();

                            Session::put('MDCustomer*%', $user_id);
                            Session::put('email', $user_email);
                            Session::put('user', $user);
                            return redirect('/user-profile')->with('success', "Login successfully.");
                        } else {
                            return redirect('sms-code')->with([
                                'error' => "OTP does not match.",
                                'email' => $request->email,
                                'password' => $request->password,
                            ]);
                        }
                    } else {

                        $otpcheck = CustomerRegistration::where('id', $providers->id)
                            ->where('registration_otp', $otpverify)
                            ->where('status', 'active')
                            // ->where('otp_expiring_time', '>=', now())
                            ->first();

                        if ($otpcheck) {
                            // dd($otpcheck);
                            $user_id = Auth::guard('md_customer_registration')->user()->id;
                            $user_email = Auth::guard('md_customer_registration')->user()->email;
                            $user = Auth::guard('md_customer_registration')->user();

                            Session::put('MDCustomer*%', $user_id);
                            Session::put('email', $user_email);
                            Session::put('user', $user);
                            return redirect('/user-profile')->with('success', "Profile created successfully.");
                        } else {
                            return redirect('sms-code')->with([
                                'error' => "OTP does not match.",
                                'email' => $request->email,
                                'password' => $request->password,
                            ]);
                        }

                    }
                }
            }
        }

        return redirect('/sign-in-web')->with('error', 'Invalid Login Details!');
    }

}
