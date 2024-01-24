<?php

namespace App\Http\Controllers\Front\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ApiService;
use Illuminate\Support\Facades\Session;

class WalletController extends Controller
{

    public function __construct( ApiService $apiService ) {
        $this->apiService = $apiService;
    }

    public function index(){

        // $token = Session::get( 'login_token' );

        // $apiUrl = url('api/send-invitation-link');
        // $method = 'GET';
        // $body = null;

        // $data= $this->apiService->getData( $token, $apiUrl, $body, $method);


        // $invitation_link=$data['invitation_link'];

       

       return view('front.mdhealth.user-panel.user-wallet');
    }



    public function user_invite(){

        $token = Session::get( 'login_token' );

        $apiUrl = url('api/send-invitation-link');
        $method = 'GET';
        $body = null;

        $data= $this->apiService->getData( $token, $apiUrl, $body, $method);


        $invitation_link=$data['invitation_link'];

      return view('front.mdhealth.user-panel.user-invite',compact('invitation_link'));
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
