<?php

namespace App\Http\Controllers\admin\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\SuperAdmin;
use DB;
use Hash;
use Auth;


class LoginController extends Controller
{
    public function index()
    {
        return !empty(Session::has('md_super_admin*%')) ? redirect('superadmin/dashboard') :  view('admin.authentication.sign-in');
    }

    //already admin lagin in browser then direct show dashboard using session
    public function dashboard_view()
    {
        return !empty(Session::has('md_super_admin*%')) ? view('admin.dashboard.dashboard') : redirect('superadmin');
    }

    //this function is used for check login details is present in database


    public function super_admin_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );

      
       
        if (Auth::guard('superadmin')->attempt($admin_data)){
         

            $user_id = Auth::guard('superadmin')->user()->id;

            // dd($user_id);

            Session::put('md_super_admin*%', $user_id);

            return redirect('admin/dashboard')->with('success', 'Login successfull!');


        } else {
            
            return redirect('/')->with('error', 'Invalid Login Details!');
        }
    }



    //destroy login session data using logout function
    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        return redirect('superadmin')->with('success', 'Logged out Successfully!');
    }
    

    public function change_password_view()
    {
        return view('admin.login.change_password');
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string',
            'confirm_password' => 'required|string',
        ]);

        $email = Auth::guard('superadmin')->user()->email;

        $user_data = DB::table('md_super_admin')->where('email', '=', $email)->first();

        // check old password
        if (Hash::check($request->old_password, $user_data->password)) {
            $input['password'] = Hash::make($request->confirm_password);
            Db::table('md_super_admin')->where('email', '=', $email)->update($input);
            Auth::logout();
            Session::flush();
            return redirect('superadmin')->with('success', 'Password Changed Successfully.');
        } else {
            return redirect('superadmin/change-password')->with('error', 'Enter correct old password.');
        }
    }

    public function check_old_password(Request $request)
    {
        $email = Auth::guard('superadmin')->user()->email;
        $old_password = Db::table('md_super_admin')->where('email', '=', $email)
        ->select('password')
        ->first();
        
        $check_password = Hash::check($request->old_password, $old_password->password);

        return !empty($check_password) ? 'true' : 'false';
    }
}
