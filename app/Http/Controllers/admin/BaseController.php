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

        //LogActivity::AdminLog(json_encode($new_data), json_encode($old_data), $request->table, 'delete', 'admin');
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
                'modified_by' => Auth::guard('superadmin')->user()->id,
                'modified_ip_address' => $_SERVER['REMOTE_ADDR']
            ]);
           // LogActivity::AdminLog(json_encode($block_status), json_encode($old_data), $request->table, 'status', 'admin');
        } else {

            $active_status = DB::table($request->table)->where('id', $id)->update([
                'status' => 'active',
                'modified_by' => Auth::guard('superadmin')->user()->id,
                'modified_ip_address' => $_SERVER['REMOTE_ADDR']
            ]);
           // LogActivity::AdminLog(json_encode($active_status), json_encode($old_data), $request->table, 'status', 'admin');
        }
        return response()->json(['message' => $request->flash, 'status' => 'true']);
    }




}
