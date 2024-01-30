<?php

namespace App\Http\Controllers;

use App\Models\CustomerNotifications;
use App\Models\CustomerPurchaseDetails;
use App\Models\CustomerRegistration;
use App\Models\MedicalProviderLogo;
use App\Models\MedicalProviderRegistrater;
use App\Models\Messages;
use App\Models\Packages;
use Auth;
use Illuminate\Http\Request;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Laravel\Firebase\Facades\Firebase;
use App\Events\NewMessage;
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
        $user = Auth::guard('md_customer_registration')->user();
        if (empty($user)) {
            $user = Auth::guard('md_health_medical_providers_registers')->user();
        }
        $user->update([
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
        // dd($request->sender_type);
        $sender_type = $request->sender_type;
        $convrsation_id = $request->conversation_id;
        $create_new_notification = new CustomerNotifications();
        $create_new_notification->convrsation_id = $request->conversation_id;
        if ($sender_type == 'medicalprovider') {
            $sender_type = 'customer';
            $customer_id = explode('_', $convrsation_id)[0];
            $create_new_notification->customer_id = $customer_id;
            $create_new_notification->package_id = CustomerPurchaseDetails::where('customer_id', $customer_id)
                ->where('conversation_id', explode('_', $convrsation_id)[1])
                ->first()
                ->package_id;
            $create_new_notification->purchase_id = CustomerPurchaseDetails::where('customer_id', $customer_id)
                ->where('conversation_id', explode('_', $convrsation_id)[1])
                ->first()
                ->id;

            $create_new_notification->notification_description = $request->body;
            $create_new_notification->notification_for = $sender_type;

        } elseif ($sender_type == 'customer') {
            $sender_type = 'medicalprovider';
            $customer_id = explode('_', $convrsation_id)[0];
            $create_new_notification->provider_id = explode('_', $convrsation_id)[2];
            $create_new_notification->package_id = CustomerPurchaseDetails::where('customer_id', $customer_id)
                ->where('conversation_id', explode('_', $convrsation_id)[1])
                ->first()
                ->package_id;
            $create_new_notification->purchase_id = CustomerPurchaseDetails::where('customer_id', $customer_id)
                ->where('conversation_id', explode('_', $convrsation_id)[1])
                ->first()
                ->purchase_id;
            $create_new_notification->notification_description = $request->body;
            $create_new_notification->notification_for = $sender_type;
        }

        $create_new_notification->save();

        $user = Auth::guard('md_customer_registration')->user();
        if (empty($user)) {
            $user = Auth::guard('md_health_medical_providers_registers')->user();
        }
        $user_id = $user->id;
        $conversation_id = $request->conversation_id;
        $FcmToken = $user->fcm_token;
        $title = $request->title;
        $body = $request->body;
        // dd($FcmToken);
        $message = CloudMessage::fromArray([
            'token' => $FcmToken,
            'notification' => [
                'title' => $title,
                'body' => $body,
            ],
        ]);

        if ($sender_type == 'customer') {
            // getting provider_id
            $user_id = explode('_', $conversation_id)[0];
        } else if ($sender_type == 'medicalprovider') {
            //getting customer_id
            $user_id = explode('_', $conversation_id)[2];
        }

        $get_messages = Messages::where('conversation_id', $conversation_id)->where('sender_id', $user_id)->first();

        if ($get_messages->count() > 0) {
            $get_messages->latest_message = $body;
            $get_messages->save();
        }
        
        event(new NewMessage($message));
        $this->notification->send($message);

    }

    public function update_last_messages(Request $request)
    {
        $user = Auth::guard('md_customer_registration')->user();
        if (empty($user)) {
            $user = Auth::guard('md_health_medical_providers_registers')->user();
        }
        $user_id = $user->id;

        $validator = Validator::make($request->all(),
            [
                'conversation_id' => 'required',
                'sender_type' => 'required',
                'last_read_message' => 'required',
            ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'conversation not found');
        }

        $messages = Messages::where('conversation_id', $request->conversation_id)->where('sender_id', $user_id)->first();

        $messages->last_read_message = $request->last_read_message;
        $messages->save();
    }

    public function get_conversations(Request $request)
    {
        $user = Auth::guard('md_customer_registration')->user();
        if (!empty($user)) {

            $sender_type = 'customer';
            $messages = Messages::where('sender_id', $user->id)
                ->where('sender_type', $sender_type)
                ->distinct('conversation_id')->get();

            // dd($messages);
        } else {
            // dd($user);
            $user = Auth::guard('md_health_medical_providers_registers')->user();
            $sender_type = 'medicalprovider';
            if (!empty($user)) {
                $messages = Messages::where('sender_id', $user->id)
                    ->where('sender_type', $sender_type)
                    ->distinct('conversation_id')->get();

            }
        }

        $conversations = [];
        foreach ($messages as $message) {

            if ($sender_type == 'customer') {
                $conversation_id = $message->conversation_id;
                $provider_id = explode('_', $conversation_id)[2];
                $package_id = CustomerPurchaseDetails::where('customer_id', $user->id)
                    ->where('conversation_id', explode('_', $conversation_id)[1])
                    ->first()
                    ->package_id;
                $package_name = Packages::where('id', $package_id)->first()->package_name;
                // dd($package_name);
                $provider_name = MedicalProviderRegistrater::where('id', $provider_id)->first();
                // dd($provider_name);
                $logo = MedicalProviderLogo::where('medical_provider_id', $provider_id)->first();
                $latest_message = false;
                $is_latest_new = false;
                if (!empty($message->last_read_message) || !empty($message->latest_message)) {

                    if ($message->last_read_message != $message->latest_message) {
                        $latest_message = $message->latest_message;
                        $is_latest_new = true;
                    } else {
                        $latest_message = $message->last_read_message;
                    }
                }
                $conversations[] = [
                    'written_by' => $package_name,
                    'converstion_id' => $conversation_id,
                    'logo' => $logo->company_logo_image_path,
                    'latest_message' => $latest_message,
                    'is_latest_message' => $is_latest_new,
                ];

                return view('front.mdhealth.user-panel.user-message', compact('conversations'));

            } else if ($sender_type == 'medicalprovider') {
                $conversation_id = $message->conversation_id;
                $user_id = explode('_', $conversation_id)[0];
                $user_name = CustomerRegistration::where('id', $user_id)->first()->full_name;
                // $logo = MedicalProviderLogo::where('medical_provider_id',$provider_id)->first();
                $latest_message = false;
                $is_latest_new = false;
                if (!empty($message->last_read_message) || !empty($message->latest_message)) {

                    if ($message->last_read_message != $message->latest_message) {
                        $latest_message = $message->latest_message;
                        $is_latest_new = true;
                    } else {
                        $latest_message = $message->last_read_message;
                    }
                }
                $conversations[] = [
                    'converstion_id' => $conversation_id,
                    'written_by' => $user_name,
                    // 'logo' => $logo,
                    'latest_message' => $latest_message,
                    'is_latest_message' => $is_latest_new,
                ];

                return view('front.mdhealth.medical-provider.messages', compact('conversations'));
            }

        }
    }

    public function get_notifications_list()
    {
        $user = Auth::guard('md_customer_registration')->user();
        $user_type = 'customer';
        if (empty($user)) {
            $user = Auth::guard('md_health_medical_providers_registers')->user();
            $user_type = 'medicalprovider';
            $user_id = $user->id;
            $notifications = CustomerNotifications::where('notification_for', $user_type)
                ->where('provider_id', $user_id)
                ->where('status', 'active')->get();
        } else {

            $user_id = $user->id;
            $notifications = CustomerNotifications::where('notification_for', $user_type)
                ->where('customer_id', $user_id)
                ->where('status', 'active')->get();
        }
        // dd($notifications);
        // $data = [];
        // foreach($notifications as $notification)
        // {
        //     $data['convrsation_id'] = $notification->convrsation_id;
        //     $data['package_id'] = $notification->package_id;
        //     $data['notification_description'] = $notification->notification_description;
        //     $data['notification_for'] = $notification->notification_for;
        //     $data['purchase_id'] = !empty($notification->purchase_id)?$notification->purchase_id:'';
        //     $data['customer_id'] = !empty($notification->customer_id)?$notification->customer_id:'';
        //     $data['provider_id'] = !empty($notification->provider_id) ? $notification->provider_id: '';
            
        // }die;
        // dd($data);

        return view('front/mdhealth/user-panel/user-notifications',compact('notifications'));

    }

}
