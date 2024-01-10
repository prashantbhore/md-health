<?php

namespace App\Http\Controllers\admin\medical_tourism;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicalProviderRegistrater;
use App\Models\MedicalProviderLogo;
use App\Models\MedicalProviderLicense;
use App\Models\ProviderImagesVideos;
use App\Models\Cities;
use DataTables;
use Crypt;
use DB;
use App\Library\LogActivity;


class MedicalTourismController extends Controller
{

  public function index(){

    // $medical_providers=MedicalProviderRegistrater::with('city')
    // ->where('status', '!=', 'delete')
    // ->get();


//     $result = DB::table('md_medical_provider_register')
//     ->join('md_master_cities', 'md_medical_provider_register.city_id', '=', 'md_master_cities.id')
//     ->where('md_medical_provider_register.status', '!=', 'delete')
//     ->select('md_medical_provider_register.id')
//     ->get();


// return $result ;

   // dd($medical_providers);


     return view('admin.medical-tourism.service-provider');
  }


  public function show(Request $request){

      $id=Crypt::decrypt($request->id);

        $medical_provider=MedicalProviderRegistrater::with(['city','providerPackages'])
        ->where('id',$id)
        ->first();

        //dd($medical_provider);

       $medical_provider_logo=MedicalProviderLogo::where('status','active')->where('medical_provider_id',$id)->first();

       $medical_provider_license=MedicalProviderLicense::where('status','active')->where('medical_provider_id',$id)->first();

      $gallary=ProviderImagesVideos::where('status','active')->where('provider_id',$id)->get();



     return view('admin.medical-tourism.service-provider-details',compact('medical_provider','medical_provider_logo','medical_provider_license','gallary'));
  }



  
  public function data_table(Request $request)
  {
    
  
    $medical_providers=MedicalProviderRegistrater::with('city')
    ->where('status', '!=', 'delete')
    ->get();
  
  
      if ($request->ajax()) {
          return DataTables::of($medical_providers)
              
                
            
              ->addColumn('id', function ($row){
                if(!empty($row->id)){
                return ucfirst($row->id);
                }
            })
  
    
          
            
              ->addColumn('hospital', function ($row){
                  if(!empty($row->company_name)){
                  return ucfirst($row->company_name);
                  }
              })

              ->addColumn('tax_no', function ($row){
                if(!empty($row->tax_no)){
                return ucfirst($row->tax_no);
                }
            })

              ->addColumn('city', function ($row){
                  if(!empty($row->city->city_name)){
                  return ucfirst($row->city->city_name);
                  }
              })

              

              ->addColumn('phone', function ($row){
                  if(!empty($row->mobile_no)){
                  return ucfirst($row->mobile_no);
                  }
              })
  
             
        //       ->addColumn('action', function ($row) {
        //           $actionBtn = '<a href="' . route('medical_tourism.details', ['id' => Crypt::encrypt($row->id)]) . '" class="btn btn-info btn-xs" title="View">
        //               <img src="' . asset('admin/assets/img/viewEntry.png') . '" alt="">
        //           </a>
                  
        //           <a href="javascript:void(0)" data-id="' . $row->id . '" data-table="md_customer_registration" data-flash="Medical Tourism Deleted Successfully!" class="btn btn-danger medical-tourism-delete btn-xs" title="Delete">
        //               <img src="' . asset('admin/assets/img/deleteEntry.png') . '" alt="">
        //           </a>';
              

        //       return $actionBtn;
        //   })



          
          ->addColumn('action', function ($row){
       
            $actionBtn= '<div class="text-end d-flex align-items-center justify-content-end gap-3">
            <a href="' . route('medical_tourism.details', ['id' => Crypt::encrypt($row->id)]) . '" class="btn btn-info btn-xs" title="View">
            <img src="' . asset('admin/assets/img/viewEntry.png') . '" alt="">
        </a>
        
        <a href="javascript:void(0)" data-id="' . $row->id . '" data-table="md_customer_registration" data-flash="Medical Tourism Deleted Successfully!" class="btn btn-danger medical-tourism-delete btn-xs" title="Delete">
            <img src="' . asset('admin/assets/img/deleteEntry.png') . '" alt="">
        </a>
                            </div>';

            return $actionBtn;
        })
              
  
  
             
              ->rawColumns(['action'])
              ->make(true);
      }
  }



  public function delete_medical_tourism(Request $request)
  {
      $id = !empty($request->id) ? $request->id : '';
  
     
      
      $old_data =MedicalProviderRegistrater::where('id', $id)->first();
  
      $new_data = MedicalProviderRegistrater::where('id', $id)->update([
          'status' => 'delete',
          'modified_ip_address' => $_SERVER['REMOTE_ADDR']
      ]);
  
     // LogActivity::AdminLog(json_encode($new_data), json_encode($old_data), $request->table, 'delete', 'admin');
      return response()->json(['message' => $request->flash, 'status' => 'true']);
  }
  




//Logo Delete
    public function delete_logo(Request $request){

        $id = !empty($request->id) ? $request->id : '';
        $old_data =MedicalProviderLogo::where('id', $id)->first();
       $new_data = MedicalProviderLogo::where('id', $id)->update([
            'status' => 'delete',
            'modified_ip_address' => $_SERVER['REMOTE_ADDR']
        ]);
       return response()->json(['message' => $request->flash, 'status' => 'true']);

    }


    //License Delete

    public function delete_license(Request $request){

        $id = !empty($request->id) ? $request->id : '';

        $old_data =MedicalProviderLicense::where('id', $id)->first();
    
        $new_data = MedicalProviderLicense::where('id', $id)->update([
            'status' => 'delete',
            'modified_ip_address' => $_SERVER['REMOTE_ADDR']
        ]);


        return response()->json(['message' => $request->flash, 'status' => 'true']);

    }



    public function delete_gallery(Request $request){

  

        $id = !empty($request->id) ? $request->id : '';

    

        $old_data =ProviderImagesVideos::where('id', $id)->first();
    
        $new_data = ProviderImagesVideos::where('id', $id)->update([
            'status' => 'delete',
            'modified_ip_address' => $_SERVER['REMOTE_ADDR']
        ]);

        return response()->json(['message' => $request->flash, 'status' => 'true']);

    }


    public function store(Request $request){
       
        $input['company_overview'] =!empty($request->overview)?$request->overview:'';
        $provider=MedicalProviderRegistrater::find($request->id)->update($input);

       if(!empty($provider)){
        return redirect()->back()->with('success', 'Provider Overview Updated Successfully!');
       }else{
        return redirect()->back()->with('fail', 'Provider Overview Not Updated Successfully!');
       }

    }




    public function verification_status(Request $request){

      
        
        $input['verified'] =!empty($request->status)?$request->status:'';
   
        $provider=MedicalProviderRegistrater::find($request->id)->update($input);

         if($provider){
           return response()->json(['message' => 'Verification Status Changed to '.$request->status, 'status' => 'true']);
         }

    }


    // public function status(Request $request){

    //     dd($request->all());

    // }



    public function status(Request $request)
    {
        $id = !empty($request->id) ? $request->id: '';

        $old_data = MedicalProviderRegistrater::where('id', $id)->first();
        $status =MedicalProviderRegistrater::where('id', $id)->value('status');

        if ($status == 'active') {
            $block_status = MedicalProviderRegistrater::where('id', $id)->update([
                'status' => 'inactive',
                'modified_ip_address' => $_SERVER['REMOTE_ADDR']
            ]);
            return response()->json(['message' =>'Vendor Status Change To Inactive' , 'status' => 'true']);
        } else {

            $active_status = MedicalProviderRegistrater::where('id', $id)->update([
                'status' => 'active',
                 'modified_ip_address' => $_SERVER['REMOTE_ADDR']
            ]);

            return response()->json(['message' =>'Vendor Status Change To Active' , 'status' => 'true']);
          
        }
       
        
    }
   
    public function vendor_delete(Request $request)
    {
        $id = !empty($request->id) ? $request->id : '';
        $old_data = MedicalProviderRegistrater::where('id', $id)->first();
        $new_data = MedicalProviderRegistrater::where('id', $id)->update([
            'status' => 'delete',
            'modified_ip_address' => $_SERVER['REMOTE_ADDR']
        ]);
        return response()->json(['message' =>'Vendor Is Deleted', 'status' => 'true']);
    }

    public function package_delete(Request $request)
    {
        $id = !empty($request->productId) ? $request->productId : '';
        $old_data = Packages::where('id', $id)->first();
        $new_data = Packages::where('id', $id)->update([
            'status' => 'delete',
            'modified_ip_address' => $_SERVER['REMOTE_ADDR']
        ]);
        return response()->json(['message' =>'Package Is Deleted', 'status' => 'true']);
    }







}
