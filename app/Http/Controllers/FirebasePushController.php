<?php

namespace App\Http\Controllers;

use App\Models\MedicalProviderLogo;
use App\Models\Messages;
use Auth;
use Illuminate\Http\Request;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Validator;

class FirebasePushController extends Controller
{
    protected $notification;
    public function __construct()
    {
        $this->notification = Firebase::messaging();
    }

    public function setToken(Request $request)
    {
        $token = $request->fcm_token;
        Auth::guard('md_customer_registration')->user()->update([
            'fcm_token' => $token,
        ]);
        // $request->user()->update([
        //     'fcm_token' => $token,
        // ]);

        return response()->json([
            'message' => 'Successfully Updated FCM Token',
        ]);
    }

    public function notification(Request $request)
    {
        $user = Auth::guard('md_customer_registration')->user();
        $user_id = $user->id;
        $conversation_id = $request->conversation_id;
        $FcmToken = $user->fcm_token;
        $title = $request->title;
        $body = $request->body;

        $message = CloudMessage::fromArray([
            'token' => $FcmToken,
            'notification' => [
                'title' => $title,
                'body' => $body,
            ],
        ]);

        $get_messages = Messages::where('conversation_id', $conversation_id)->where('sender_id', $user_id)->first();
        if ($get_messages->count() > 0) {
            $get_messages->latest_message = $body;
            $get_messages->save();
        }

        $this->notification->send($message);

    }

    public function update_last_messages(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'conversation_id' => 'required',
                'sender_type' => 'required',
                'last_read_message' => 'required',
            ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'conversation not found');
        }

        $messages = Messages::where('conversation_id', $request->conversation_id)
            ->where('sender_type', $request->sender_type)
            ->where('sender_id', $request->sender_id)
            ->first();

        $messages->last_read_message = $request->last_read_message;
    }

    public function get_conversations(Request $request){
        $user = Auth::guard('md_customer_registration')->user();

        $messages = Messages::where('sender_id',$user->id)
        ->where('sender_type',$request->sender_type)
        ->distinct('conversation_id');

        $conversations = [];
        foreach($messages as $message){

            if($request->sender_type == 'customer'){
                $conversation_id = $message->conversation_id;
                $provider_id = explode('_',$conversation_id)[2];
                $logo = MedicalProviderLogo::where('medical_provider_id',$provider_id)->first();
                $latest_message = false;
                if(!empty($message->last_read_message) || !empty($message->latest_message)){

                    if($message->last_read_message != $message->latest_message){
                        $latest_message =  $message->latest_message;
                    }
                }
                $conversations[] = [
                    'converstion_id' => $conversation_id,
                    'logo' => $logo,
                    'latest_message' => $latest_message,
                ];
            }
        }
    }

}
