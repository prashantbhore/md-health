<?php

namespace App\Http\Controllers\admin\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerRegistration;
use App\Models\CustomerLogs;
use DataTables;
use Crypt;
use DB;
use App\Library\LogActivity;
use Carbon\Carbon;


class CustomerController extends Controller
{

    public function index(){

        return view('admin.customers.customers');
    }





    public function data_table(Request $request)
    {
        $query = CustomerRegistration::with('country')->with('city');

            if ($request->status == 'all') {
                $query->where('status', '!=', 'delete');
            } elseif ($request->status == 'active') {
                $query->where('status', 'active');
            } elseif ($request->status == 'inactive') {
                $query->where('status', 'inactive');
            }

           
            $customers = $query->get();
        
       
        $customers = $query->get();
    
    
        if ($request->ajax()){
            return DataTables::of($customers)
            ->addIndexColumn()



            ->addColumn('id', function ($row){
                if(!empty($row->id)){
                return ucfirst($row->id);
                }
            })
                
    
            ->addColumn('name', function ($row) {
                $fullName = '';
            
                if (!empty($row->first_name)) {
                    $fullName .= ucfirst($row->first_name);
                }
            
                if (!empty($row->last_name)) {
                    $fullName .= ' ' . ucfirst($row->last_name);
                }
            
                return $fullName;
            })
            
              
               
    
    
                // ->addColumn('age', function ($row){
                //     return ucfirst(0);
                // })


                
                ->addColumn('country', function ($row){
                    if(!empty($row->country->country_name)){
                    return ucfirst($row->country->country_name);
                    }
                })


                ->addColumn('city', function ($row){
                    if(!empty($row->city->city_name)){
                    return ucfirst($row->city->city_name);
                    }
                })

                ->addColumn('phone', function ($row){
                    if(!empty($row->phone)){
                    return ucfirst($row->phone);
                    }
                })



                ->addColumn('status', function ($row){
                    $status = $row->status;
                
                    if ($status == 'active') {
                        $statusBtn = '<a href="javascript:void(0)" data-id="' . Crypt::encrypt($row->id) . '" data-table="md_customer_registration" data-flash="Status Changed Successfully!" class="md-change-status activateLink mt-0 activate-btn">Activate</a>';
                    } else {
                        $statusBtn = '<a href="javascript:void(0)" data-id="' . Crypt::encrypt($row->id) . '" data-table="md_customer_registration" data-flash="Status Changed Successfully!" class="md-change-status deleteImg mt-0 deactivate-btn">Deactivate</a>';
                    }
                
                    return $statusBtn;
                })
    
    
                ->addColumn('action', function ($row){
                    $actionBtn= '<div class="text-end d-flex align-items-center justify-content-end gap-3">
                    <a href="' . route('customer.details', ['id' => Crypt::encrypt($row->id)]) . '" class="btn btn-info btn-xs" title="View">
                        <img src="' . asset('admin/assets/img/viewEntry.png') . '" alt="">
                    </a>
                    
                    <a href="javascript:void(0)" data-id="' . $row->id . '" data-table="md_customer_registration" data-flash="Customer Deleted Successfully!" class="btn btn-danger customer-delete btn-xs" title="Delete">
                        <img src="' . asset('admin/assets/img/deleteEntry.png') . '" alt="">
                    </a>
                    </div>';
                

                  return $actionBtn;
               })

                
                ->rawColumns(['action','status'])
                ->make(true);
        }
    }
    


    public function delete_customer(Request $request)
    {
        $id = !empty($request->id) ? $request->id : '';
    
       
        
        $old_data =CustomerRegistration::where('id', $id)->first();
    
        $new_data = CustomerRegistration::where('id', $id)->update([
            'status' => 'delete',
            'modified_ip_address' => $_SERVER['REMOTE_ADDR']
        ]);
    
       // LogActivity::AdminLog(json_encode($new_data), json_encode($old_data), $request->table, 'delete', 'admin');
        return response()->json(['message' => $request->flash, 'status' => 'true']);
    } 



    public function show(Request $request){


        $id=Crypt::decrypt($request->id);

        $customer = CustomerRegistration::with(['country', 'city', 'customerOrders.package','customerOrders.paymentDetails.purchage'])->find($id);

        //dd($customer->date_of_birth);
        $age=0;

        if(!empty($customer->date_of_birth)){
        $dateOfBirth = Carbon::createFromFormat('d/m/Y', $customer->date_of_birth);
        $today = Carbon::now();

         $age = $dateOfBirth->diffInYears($today);
        }
    // Now, $age contains the age of the customer
   // dd($age);


        //dd($customer);

        $logs=CustomerLogs::where('customer_id',$id)->get();

   
       
         return view('admin.customers.customer-details',compact('customer','logs','age'));
        

       
    }












}
