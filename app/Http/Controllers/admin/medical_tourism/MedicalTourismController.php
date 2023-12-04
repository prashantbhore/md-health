<?php

namespace App\Http\Controllers\admin\medical_tourism;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicalProviderRegistrater;
use DataTables;
use Crypt;
use DB;
use App\Library\LogActivity;


class MedicalTourismController extends Controller
{

  public function index(){
    $medical_providers=MedicalProviderRegistrater::with('city')->where('status','!=','delete')->get();

    // dd($medical_providers);
     return view('admin.medical-tourism.service-provider');
  }


  public function show(){
   
    
    return view('admin.medical-tourism.service-provider-details');
  }



  
  public function data_table(Request $request)
  {
    
  
      $medical_providers=MedicalProviderRegistrater::with('city')->where('status','!=','delete')->get();
  
  
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
                  if(!empty($row->phone)){
                  return ucfirst($row->phone);
                  }
              })
  
  
  
  
  
              ->addColumn('action', function ($row) {
                  $actionBtn = '<a href="' . route('customer.details', ['id' => Crypt::encrypt($row->id)]) . '" class="btn btn-info btn-xs" title="View">
                      <img src="' . asset('admin/assets/img/viewEntry.png') . '" alt="">
                  </a>
                  
                  <a href="javascript:void(0)" data-id="' . $row->id . '" data-table="md_customer_registration" data-flash="Customer Deleted Successfully!" class="btn btn-danger customer-delete btn-xs" title="Delete">
                      <img src="' . asset('admin/assets/img/deleteEntry.png') . '" alt="">
                  </a>';
              

              return $actionBtn;
          })
              
  
  
             
              ->rawColumns(['action'])
              ->make(true);
      }
  }








}
