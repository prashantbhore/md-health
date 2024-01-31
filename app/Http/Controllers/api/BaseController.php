<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class BaseController extends Controller
{
    //
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
        $response = [
            'status' => 200,
            'message' => $message,
            'data'    => $result,
        ];
        return response()->json($response);
    }

    public function notification_list($firebaseToken, $title)
    {

        $firebaseToken = [$firebaseToken];

        // $firebaseToken = customer::whereNotNull('device_token')->pluck('device_token')->all();

        $SERVER_API_KEY = 'AAAAfRLNroY:APA91bETDW4x0U8_sGdphiSH8PyFslicneVLKWitwcQq_S9VNhd1R0c2UrboOGCAQNnLLNSK6hZtvbY-kiCSsMOahJX6lp8dUYjSvcQi2N0UN62KZGYpVt2LSD0gdw6B0irBmwHIYClI';

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $title,
                // 'image'=>$image,
                // "body" => strip_tags($notifdata->notification_detail, '<p>'),
                "content_available" => true,
                "priority" => "high",
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);
    }



    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'status' => $code,
            'message' => $error,
        ];
        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }
}
