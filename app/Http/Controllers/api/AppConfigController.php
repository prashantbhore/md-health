<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\api\BaseController as BaseController;

class AppConfigController extends BaseController
{
    public function fun_app_get_base_url(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'app_key' => 'required|max:19',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if ($request->app_key == "%mdhealth-development*app#key%") {
            $data = array(
                'app_main_url' => url('/') . "/api/",
            );
            return $this->sendResponse($data, 'Base url found.');
        } else {
            return $this->sendError('Please enter valid app key', "", '403');
        }
    }
}
