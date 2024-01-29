<?php

namespace App\Http\Controllers\admin\mlm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CoinStatus;
USE App\Models\MDCoins;
use App\Models\Cities;
use App\Models\Country;
use App\Models\CustomerRegistration;
use DataTables;
use Crypt;
use DB;
use App\Library\LogActivity;

class AdminMlmController extends Controller
{
    public function index()
    {
        $joining_count=CoinStatus::where('wallet_status','your_network')->count();

        $coin_count = MDCoins::where('status', 'active')->select('coins')->sum('coins');
        $joining_coin_integer = intval($coin_count);

      //  $top_earners=MDCoins::where('status', 'active')->with(['customer.city','customer.country'])->get();

        //dd($top_earners);
    
        return view('admin/multi-level-marketing/multi-level-marketing',compact('joining_count','joining_coin_integer'));
    }



    public function data_table(Request $request)
    {
        $top_earners = MDCoins::where('status', 'active')
            ->with(['customer.city', 'customer.country'])
            ->orderBy('coins', 'desc')
            ->get();
    
        if ($request->ajax()){

            return DataTables::of($top_earners)
                ->addIndexColumn()
                ->addColumn('full_name', function ($row) {
                    if (!empty($row->customer->full_name)) {
                        return ucfirst($row->customer->full_name);
                    }
                })
                ->addColumn('network', function ($row) {
                    if (!empty($row->customer_id)) {
                        $networkCount = CoinStatus::where('wallet_status', 'your_network')
                            ->where('customer_id', $row->customer_id)
                            ->count();
    
                        return ucfirst($networkCount);
                    }
                })
                ->addColumn('city_name', function ($row) {
                    if (!empty($row->customer->city->city_name)) {
                        return ucfirst($row->customer->city->city_name);
                    }
                })
                ->addColumn('country_name', function ($row) {
                    if (!empty($row->customer->country->country_name)) {
                        return ucfirst($row->customer->country->country_name);
                    }
                })
                ->addColumn('earnings', function ($row) {
                    if (!empty($row->coins)) {
                        return ucfirst($row->coins);
                    }
                })
                ->addColumn('action', function ($row) {
                    $viewUrl = url('admin/earner-details/'.Crypt::encrypt($row->customer_id));
                    
                    $actionsHtml = '<div class="text-end d-flex justify-content-end gap-2">
                                        <a href="' . $viewUrl . '">
                                            <img src="' . asset('admin/assets/img/viewEntry.png') . '" alt="">
                                        </a>
                                        <a href="javascript:void(0)" data-id="' . $row->id . '" data-table="md_coins" data-flash="Deleted Successfully!" class="customer-coin-delete">
                                            <img src="' . asset('admin/assets/img/deleteEntry.png') . '" alt="">
                                        </a>
                                    </div>';
                    
                    return $actionsHtml;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
    }
    

   
    public function delete_earner(Request $request)
    {
        $id = !empty($request->id) ? $request->id : '';

        
        $old_data =MDCoins::where('id', $id)->first();
    
        $new_data = MDCoins::where('id', $id)->update([
            'status' => 'delete',
            'modified_ip_address' => $_SERVER['REMOTE_ADDR']
        ]);
    
        return response()->json(['message' => $request->flash, 'status' => 'true']);
    } 
    


    public function earner_details(Request $request){

     

        $id=!empty($request->id) ? Crypt::decrypt($request->id):null;

       
        $joining_coin_integer=0;
        if(!empty($id)){

            $reffed_users_ids = CoinStatus::where('customer_id', $id)
            ->where('reffered_customer_id', '!=', null)
            ->pluck('reffered_customer_id')
            ->toArray();

            if(!empty($reffed_users_ids)){
                $coin_count = MDCoins::whereIn('customer_id', $reffed_users_ids)->where('status', 'active')->select('coins')->sum('coins');
                $joining_coin_integer = intval($coin_count);
            }
        }

        return view('admin/multi-level-marketing/earner-details',compact('joining_coin_integer','id'));
    }






    public function earner_data_table(Request $request)
    {

        
        $top_earners = MDCoins::where('status', 'active')->where('customer_id', $request['id'])
            ->with(['earner.city', 'earner.country'])
            ->orderBy('coins', 'desc')
            ->get();
    
        if ($request->ajax()){

            return DataTables::of($top_earners)
                ->addIndexColumn()
                ->addColumn('full_name', function ($row) {
                    if (!empty($row->customer->full_name)) {
                        return ucfirst($row->customer->full_name);
                    }
                })

                ->addColumn('network', function ($row) {
                    if (!empty($row->reffered_customer_id)){
                        $networkCount = CoinStatus::where('wallet_status', 'your_network')
                            ->where('customer_id', $row->reffered_customer_id)
                            ->count();
                
                        // Check if the count is numeric, if not, set to 0
                        return is_numeric($networkCount) ? $networkCount : 0;
                    } else {
                        return 0;
                    }
                })
                


                ->addColumn('city_name', function ($row) {
                    if (!empty($row->customer->city->city_name)) {
                        return ucfirst($row->customer->city->city_name);
                    }
                })
                ->addColumn('country_name', function ($row) {
                    if (!empty($row->customer->country->country_name)) {
                        return ucfirst($row->customer->country->country_name);
                    }
                })
                ->addColumn('earnings', function ($row) {
                    if (!empty($row->coins)) {
                        return ucfirst($row->coins);
                    }
                })
                ->addColumn('action', function ($row) {
                    $viewUrl = url('admin/earner-details/'.Crypt::encrypt($row->customer_id));
                    
                    $actionsHtml = '<div class="text-end d-flex justify-content-end gap-2">
                                  
                                        <a href="javascript:void(0)" data-id="' . $row->id . '" data-table="md_coins" data-flash="Deleted Successfully!" class="customer-coin-delete">
                                            <img src="' . asset('admin/assets/img/deleteEntry.png') . '" alt="">
                                        </a>
                                    </div>';
                    
                    return $actionsHtml;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
    }
    



    






}
