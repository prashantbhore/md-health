<?php

namespace App\Http\Controllers\admin\membership;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MembershipSettings;

class AdminMembershipController extends Controller
{
     public function index()
     {
        return view('admin.memberships.manage-memberships');
     }


     public function list_membership(Request $request)
     {

        $membershipLits=MembershipSettings::where('vendor_type',$request['vendor_type'])->where('status','active')->get();


        return response()->json(['status'=>'success','membershipLits'=>$membershipLits]);
        
     }


   //   public function store_membership(Request $request){

     

   //    foreach ($request->membership_name as $key => $membershipType){

   //         $membership = new MembershipSettings();
   //         $membership->vendor_type = $request->vendor_type;
     
   //       if($membershipType=='SilverMember'){
   //           $membership->membership_type = 'silver';
   //            $membership->membership_amount = $request->silver_amount;
   //            $membership->commission_percent = $request->silver_percentage;
   //       } 
   //         else if($membershipType=='GoldMember'){
   //          $membership->membership_type = 'gold';
   //          $membership->membership_amount = $request->gold_amount;
   //          $membership->commission_percent = $request->gold_percentage;
   //       }
   //         else if($membershipType=='PlatinumMember'){
   //          $membership->membership_type = 'platinum';
   //          $membership->membership_amount = $request->platinum_amount;
   //           $membership->commission_percent = $request->platinum_percentage;
   //       }

       
     
   //       $membership->save();
   //   }
           
 
   //    return redirect('/admin/manage-memberships')->with('success', 'Membership Added Successfully');           
          
   //   }



   public function store_membership(Request $request){
      foreach ($request->membership_name as $key => $membershipType){
   
          $existingMembership = MembershipSettings::where('vendor_type', $request->vendor_type)
              ->where('membership_type', strtolower($membershipType))
              ->first();

           



          if($existingMembership){

              $existingMembership->membership_amount = $request->{$membershipType . '_amount'};
              $existingMembership->commission_percent = $request->{$membershipType . '_percentage'};
              $existingMembership->save();
          } else {
             
              $membership = new MembershipSettings();
              $membership->vendor_type = $request->vendor_type;
              $membership->membership_type = strtolower($membershipType);
              $membership->membership_amount = $request->{$membershipType . '_amount'};
              $membership->commission_percent = $request->{$membershipType . '_percentage'};
              
              // Check for duplicate entry before attempting to save
              if (!MembershipSettings::where('vendor_type', $membership->vendor_type)
                  ->where('membership_type', $membership->membership_type)
                  ->exists()) {
                  // Save the new record only if a duplicate entry doesn't exist
                  $membership->save();
              } else {
                  // Handle case where the record already exists
                  return redirect('/admin/manage-memberships')->with('error', 'Membership already exists for the selected vendor type.');
              }
          }
      }

      return redirect('/admin/manage-memberships')->with('success', 'Memberships Added/Updated Successfully');
  }




}
