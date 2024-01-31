<?php

namespace App\Http\Controllers\admin\sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerPurchaseDetails;
use App\Models\CustomerPaymentDetails;
use App\Models\MedicalProviderLogo;
use DataTables;
use Crypt;
use DB;
use Carbon\Carbon;

class AdminMdhealthSalesController extends Controller
{

    public function index(){

        $md_health_sales= CustomerPurchaseDetails::where('status','active')
        ->count();


        $active_treatment_list = CustomerPurchaseDetails::with(['customer', 'package.provider', 'package.provider.provider_logo'])
        ->get();

     // dd($active_treatment_list);

      return view('admin.sales.md-health-sales',compact('md_health_sales'));
    }



    public function data_table(Request $request)
    {

      $treatment_list = CustomerPurchaseDetails::with(['customer', 'package.provider', 'package.provider.provider_logo'])
      ->get();
        

        if ($request->ajax()) {
            return DataTables::of($treatment_list)
            
                ->addIndexColumn()

                ->addColumn('id', function ($row){
                    if(!empty($row->order_id)){
                    return ucfirst($row->order_id);
                    }
                })


                ->addColumn('created', function ($row){
                  if (!empty($row->created_at)) {
                      $createdTime = new \Carbon\Carbon($row->created_at);
                      $currentTime = \Carbon\Carbon::now();
                      $diff = $createdTime->diff($currentTime);
              
                      $days = $diff->days;
                      $hours = $diff->h;
                      $minutes = $diff->i;
                      $seconds = $diff->s;
              
                    
                      if ($days > 0) {
                          return $days . ' day' . ($days > 1 ? 's' : '') . ' ago';
                      } elseif ($hours > 0) {
                          return $hours . ' hour' . ($hours > 1 ? 's' : '') . ' ago';
                      } elseif ($minutes > 0) {
                          return $minutes . ' minute' . ($minutes > 1 ? 's' : '') . ' ago';
                      } elseif ($seconds > 0) {
                          return $seconds . ' second' . ($seconds > 1 ? 's' : '') . ' ago';
                      } else {
                          return 'Just now';
                      }
                  }
              })
              
              

                ->addColumn('customer', function ($row){
                  if(!empty($row->customer->full_name)){
                  return ucfirst($row->customer->full_name);
                  }
              })

              ->addColumn('product', function ($row){
                if(!empty($row->package->package_name)){
                return ucfirst($row->package->package_name);
                }
            })

            
          ->addColumn('price', function ($row){
              if (!empty($row->paid_amount)){
                  $formattedPrice = number_format($row->paid_amount, 2);
                  return $formattedPrice;
              }
             })


                
           ->addColumn('status', function ($row) {
            $status = $row->purchase_type;
        
            if ($status == 'completed'){
                $statusBtn = '<div class="completed">Completed</div>';
            } elseif ($status == 'pending') {
                $statusBtn = '<td><div class="pending">Pending</div></td>';
            } elseif ($status == 'in_progress') {
                $statusBtn = '<td><div class="pending">In Progress</div></td>';
            } else {
                $statusBtn = '';
            }
             return $statusBtn;
           })
        
        
                

           ->addColumn('action', function ($row) {
            $redirectLink = '<a href="' . url('admin/sales-details/'.Crypt::encrypt($row->id)) . '">
                                <img src="' . asset('admin/assets/img/re-direct.png') . '" alt="">
                            </a>';
        
                           return $redirectLink;
           })
        

                ->rawColumns(['action','status'])
                ->make(true);
        }
    }


    public function sales_view(Request $request){

      $id=!empty($request->id)?Crypt::decrypt($request->id):'';

      $patient_details=null;
      $latest_payment=null;
      $logo=null;
      if(!empty($id)){
      $patient_details = CustomerPurchaseDetails::where('id', $id)->with('customer','customer.city','customer.country','package.provider.city','paymentDetails','case_manager','hotel','vehical')->first();

      $latest_payment= CustomerPaymentDetails::where('order_id', $patient_details->id)
      ->where('payment_status', 'completed')
      ->orderBy('created_at', 'desc')
      ->first();

      if(!empty($patient_details->package->created_by)){
        $logo=MedicalProviderLogo::where('medical_provider_id',$patient_details->package->created_by)->select('company_logo_image_path')->first();
      }

      }

      dd($patient_details);

      //dd($latest_payment);

       //dd($logo);

      //  dd($patient_details->package->created_by);

    

     


       return view('admin.sales.sales-details',compact('patient_details','latest_payment','logo'));
    }






}
