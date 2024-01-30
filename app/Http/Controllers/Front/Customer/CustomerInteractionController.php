<?php

namespace App\Http\Controllers\Front\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;
// use plugNmeetConnect;
require __DIR__ . "/plugNmeetConnect.php";

class CustomerInteractionController extends Controller
{
    public function live_cam(Request $request)
    {

        $config = new \stdClass();
        $config->plugnmeet_server_url = "https://meet.examonline.com.tr"; // host.docker.internal
        $config->plugnmeet_api_key = "APIyrBpGtazKGI";
        $config->plugnmeet_secret = "N5tXGXSIwZrxWBphtj7Axu9q2a0sbFmZZ0L4";

        $connect = new \plugNmeetConnect($config);
        // dd(Session::all());
        if($request->requestType === 'api'){
            // dd('hi');
            $userId =  Auth::user()->id;
        }else{
            $user = Session::get("user");
            if(empty($user)){
                return redirect()->back()->with('error','User Session Not Found');
            }
            if (!empty($user->provider_unique_id)) {
                $userId = str_replace('#','',$user->provider_unique_id);
            } else {
    
                $userId = $user->id;
            }
        }
        $roomId = "room01"; // must be unique. You can also use $connect->getUUID();
        $max_participants = 0; // value 0 means no limit (unlimited)
        $user_full_name = !empty($user->first_name) ? $user->first_name: (!empty($user->company_name)?$user->company_name:'user' );
        // $userId = "Your-Unique-User-Id-1"; // must be unique for each user.
        $isAdmin = true;
        // dd($userId,$user_full_name);
        $roomMetadata = array(
            "room_features" => array(
                "allow_webcams" => true,
                "mute_on_start" => false,
                "allow_screen_share" => true,
                "allow_rtmp" => true,
                "allow_view_other_webcams" => true,
                "allow_view_other_users_list" => true,
                "admin_only_webcams" => false,
                "enable_analytics" => true,
                "room_duration" => 0, // in minutes. 0 = no limit/unlimited
            ),
            "recording_features" => array(
                "is_allow" => true,
                "is_allow_cloud" => true,
                "is_allow_local" => true,
                "enable_auto_cloud_recording" => false,
            ),
            "chat_features" => array(
                "allow_chat" => true,
                "allow_file_upload" => true,
            ),
            "shared_note_pad_features" => array(
                "allowed_shared_note_pad" => true,
            ),
            "whiteboard_features" => array(
                "allowed_whiteboard" => true,
                //"preload_file" => "https://mydomain.com/text_book.pdf"
            ),
            "external_media_player_features" => array(
                "allowed_external_media_player" => true,
            ),
            "waiting_room_features" => array(
                "is_active" => false,
            ),
            "breakout_room_features" => array(
                "is_allow" => true,
                "allowed_number_rooms" => 2,
            ),
            "display_external_link_features" => array(
                "is_allow" => true,
            ),
            "ingress_features" => array(
                "is_allow" => true,
            ),
            "speech_to_text_translation_features" => array(
                "is_allow" => true,
                "is_allow_translation" => true,
            ),
            "end_to_end_encryption_features" => array(
                "is_enabled" => false,
            ),
            "default_lock_settings" => array(
                "lock_microphone" => false,
                "lock_webcam" => false,
                "lock_screen_sharing" => true,
                "lock_whiteboard" => true,
                "lock_shared_notepad" => true,
                "lock_chat" => false,
                "lock_chat_send_message" => false,
                "lock_chat_file_share" => false,
                "lock_private_chat" => false, // user can always send private message to moderator
            ),
        );
        $isRoomActive = false;
        $output = new \stdClass();
        $output->status = false;

        try {
            $res = $connect->isRoomActive($roomId);
            $isRoomActive = $res->getStatus();
            $output->status = true;
            $output->msg = $res->getResponseMsg();
        } catch (Exception $e) {
            $output->msg = $e->getMessage();
        }

        if (!$isRoomActive && $output->status) {
            try {
                $create = $connect->createRoom($roomId, "Test room", "Welcome to room", $max_participants, "", $roomMetadata);

                $isRoomActive = $create->getStatus();
                $output->status = $create->getStatus();
                $output->msg = $create->getResponseMsg();
            } catch (Exception $e) {
                $output->msg = $e->getMessage();
            }
        }

        if ($isRoomActive && $output->status) {
            try {
                $join = $connect->getJoinToken($roomId, $user_full_name, $userId, $isAdmin);

                if ($join->getStatus()) {
                    $output->token = "<br>" . $join->getToken();
                    $output->url = "<br>" . $config->plugnmeet_server_url . "?access_token=" . $join->getToken();
                    // or you can set cookie name `pnm_access_token` with that token & redirect
                }
                $output->status = $join->getStatus();
                $output->msg = $join->getResponseMsg();
            } catch (Exception $e) {
                $output->msg = $e->getMessage();
            }
        }

        // echo "<pre>";
        // print_r($output);
        $output = (array) $output;
        // echo"<pre>";print_r($output);die;
        $url = trim(strip_tags($output['url']));
        // echo $output['url'];die;
        if ($request->requestType === 'api') {
            return response()->json([
                'status' => 200,
                'message' => 'Here is your video call url.',
                'url' => $url
            ]);
        } else {
            return view('front/mdhealth/medical-provider/live-consultation-appoinment',compact('url'));
        }
       
    }
}
