<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use App\Models\States;
use App\Models\Districts;
use App\Models\Cities;
use Crypt;
use App\Library\LogActivity;
use Illuminate\Support\Facades\Schema;


class BaseController extends Controller
{
    
    public function delete(Request $request)
    {
        $id = !empty($request->id) ? $request->id : '';
        $old_data = DB::table($request->table)->where('id', $id)->first();
        $new_data = DB::table($request->table)->where('id', $id)->update([
            'status' => 'delete',
            'modified_by' => Auth::guard('admin')->user()->id,
            'modified_ip_address' => $_SERVER['REMOTE_ADDR']
        ]);

        LogActivity::AdminLog(json_encode($new_data), json_encode($old_data), $request->table, 'delete', 'admin');
        return response()->json(['message' => $request->flash, 'status' => 'true']);
    }

    public function status(Request $request)
    {
        $id = !empty($request->id) ? Crypt::decrypt($request->id) : '';
        $old_data = DB::table($request->table)->where('id', $id)->first();
        $status = DB::table($request->table)->where('id', $id)->value('status');

        if ($status == 'active') {
            $block_status = DB::table($request->table)->where('id', $id)->update([
                'status' => 'inactive',
                'modified_by' => Auth::guard('admin')->user()->id,
                'modified_ip_address' => $_SERVER['REMOTE_ADDR']
            ]);
            LogActivity::AdminLog(json_encode($block_status), json_encode($old_data), $request->table, 'status', 'admin');
        } else {

            $active_status = DB::table($request->table)->where('id', $id)->update([
                'status' => 'active',
                'modified_by' => Auth::guard('admin')->user()->id,
                'modified_ip_address' => $_SERVER['REMOTE_ADDR']
            ]);
            LogActivity::AdminLog(json_encode($active_status), json_encode($old_data), $request->table, 'status', 'admin');
        }
        return response()->json(['message' => $request->flash, 'status' => 'true']);
    }

    // {
    //     if (!empty(Auth::guard('athletekar_user')->user()->user_id)) {
    //         $id = Auth::guard('athletekar_user')->user()->user_id;
    //         $all = 19;
    //         $Null_fields = Athletekar_school::where('id', '=', $id)
    //             ->where('status', '!=', 'delete')
    //             ->select('school_name', 'school_principal_name', 'school_phone', 'school_email', 'state_id', 'district_id', 'city_id', 'school_address', 'pincode', 'school_sports', 'school_about', 'school_logo_path', 'school_banner_path', 'website_url', 'facebook_link', 'instagram_link', 'linkedin_link', 'twitter_link')
    //             ->get();

    //         $total_fields = 0;
    //         foreach ($Null_fields as $Null_fields_data) {
    //             if ($Null_fields_data['school_name'] != null) {
    //                 $total_fields++;
    //             }
    //             if ($Null_fields_data['school_principal_name'] != null) {
    //                 $total_fields++;
    //             }
    //             if ($Null_fields_data['school_phone'] != null) {
    //                 $total_fields++;
    //             }
    //             if ($Null_fields_data['school_email'] != null) {
    //                 $total_fields++;
    //             }
    //             if ($Null_fields_data['state_id'] != null) {
    //                 $total_fields++;
    //             }
    //             if ($Null_fields_data['district_id'] != null) {
    //                 $total_fields++;
    //             }
    //             if ($Null_fields_data['city_id'] != null) {
    //                 $total_fields++;
    //             }
    //             if ($Null_fields_data['school_address'] != null) {
    //                 $total_fields++;
    //             }
    //             if ($Null_fields_data['pincode'] != null) {
    //                 $total_fields++;
    //             }
    //             if ($Null_fields_data['school_sports'] != null) {
    //                 $total_fields++;
    //             }
    //             if ($Null_fields_data['school_about'] != null) {
    //                 $total_fields++;
    //             }
    //             if ($Null_fields_data['school_logo_path'] != null) {
    //                 $total_fields++;
    //             }
    //             if ($Null_fields_data['school_banner_path'] != null) {
    //                 $total_fields++;
    //             }
    //             if ($Null_fields_data['website_url'] != null) {
    //                 $total_fields++;
    //             }
    //             if ($Null_fields_data['facebook_link'] != null) {
    //                 $total_fields++;
    //             }
    //             if ($Null_fields_data['instagram_link'] != null) {
    //                 $total_fields++;
    //             }
    //             if ($Null_fields_data['linkedin_link'] != null) {
    //                 $total_fields++;
    //             }
    //             if ($Null_fields_data['twitter_link'] != null) {
    //                 $total_fields++;
    //             }
    //         }

    //         $schoolGallery = Athletekar_school_gallery::where('status', '!=', 'delete')
    //             ->where('school_id', '=', $id)
    //             ->select('id', 'school_gallery_image_path', 'school_gallery_image_name')
    //             ->count();

    //         if ($schoolGallery > 0) {
    //             $total_fields++;
    //         }

    //         $percentage = intval(($total_fields / $all) * 100);

    //         return response()->json(['message' => 'Percentage found', 'data' => $percentage, 'status' => 'true']);
    //         // return $percentage;
    //     } else {
    //         return response()->json(['message' => 'User is not logged in yet.', 'status' => 'false']);
    //     }
    // }
}
