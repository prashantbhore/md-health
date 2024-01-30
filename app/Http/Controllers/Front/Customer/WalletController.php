<?php

namespace App\Http\Controllers\Front\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ApiService;
use Illuminate\Support\Facades\Session;
use App\Models\MDCoins;
use App\Models\CoinStatus;
use Auth;

class WalletController extends Controller
{

    public function __construct( ApiService $apiService ) {
        $this->apiService = $apiService;
    }

    public function index(){

     

        $total_coins =MDCoins::where('customer_id', Auth::guard('md_customer_registration')->user()->id)
        ->where('status', 'active')->select('coins')->first();

       

       return view('front.mdhealth.user-panel.user-wallet',compact('total_coins'));
    }



    public function user_invite(){

        $token = Session::get( 'login_token' );

        $apiUrl = url('api/send-invitation-link');
        $method = 'GET';
        $body = null;

        $data= $this->apiService->getData( $token, $apiUrl, $body, $method);


        $invitation_link=$data['invitation_link'];

        //dd(Auth::guard('md_customer_registration')->user()->id);

        $your_network_count = CoinStatus::where('customer_id', Auth::guard('md_customer_registration')->user()->id)
        ->where('wallet_status','your_netowrk')
        ->count();

        // dd($your_network_count);

       

        $pending_invite_count = CoinStatus::where('customer_id', Auth::guard('md_customer_registration')->user()->id)
        ->where('wallet_status', 'pending_invite')
        ->count();


        $left_invite_count =MDCoins::where('customer_id', Auth::guard('md_customer_registration')->user()->id)
        ->where('status', 'active')->select('invitation_count')->first();

       // dd($left_invite_count->invitation_count);


       


      return view('front.mdhealth.user-panel.user-invite',compact('invitation_link','your_network_count','pending_invite_count','left_invite_count'));
    }


    public function send_invitation_link(Request $request){

        $token = Session::get('login_token');
        $apiUrl = url('api/send-invitation');
        $method = 'POST';
    
        $invitation_link = $request->invitation_link;
        $requested_emails = $request->requested_email;
    
        $successMessages = [];
        $errorMessages = [];
    
        foreach ($requested_emails as $email) {
            if ($email != null) {
                $body = [
                    'invitation_link' => $invitation_link,
                    'requested_email' => $email,
                ];
    
                $data = $this->apiService->getData($token, $apiUrl, $body, $method);

              
    
                    $successMessages= 'Invitation sent successfully';
                
            }
        }


      
    
       
        // if (!empty($errorMessages)){
        //     return redirect('/user-invite')->with('error', 'Some invitations failed to send.')->withErrors($errorMessages);
        // }
    
       
        if (!empty($successMessages)) {
            return redirect('/user-invite')->with('success', $successMessages);
        }
    
       
        return redirect('/user-invite')->with('error', 'No invitations were sent.');
    }
    
    
    



}
