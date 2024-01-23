<?php

namespace App\Http\Controllers\Front\MedicalProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\CustomerPurchaseDetails;
use App\Models\MembershipSettings;

class MedicalProviderMembershipController extends Controller
{
  public function index()
  {
      $provider_id = null;
  
      if (!empty(Auth::guard('md_health_medical_providers_registers')->user()->id)){
          $provider_id = Auth::guard('md_health_medical_providers_registers')->user()->id;
      }
  
      $provider_amount = 0;
  
      if ($provider_id != null) {
          $provider_amount = CustomerPurchaseDetails::where('status', 'active')
              ->where('provider_id', $provider_id)
              ->sum('paid_amount');
      }
  
    // Fetch the current membership
$membership = MembershipSettings::where('vendor_type', 'medical_service_provider')
->where(function ($query) use ($provider_amount) {
    $query->where('membership_type', 'silver') // Ensure Silver membership is always included
        ->orWhere(function ($subquery) use ($provider_amount) {
            $subquery->where('membership_amount', '<=', $provider_amount)
                ->orWhereNull('membership_amount'); // Include cases where membership_amount is null
        });
})
->orderBy('membership_amount', 'desc') // Order by descending to get the highest membership first
->first();

// Fetch the next achievable membership
$next_membership_amount = 0;
if (!empty($membership) && $membership->membership_type != 'platinum') {
$next_membership = MembershipSettings::where('vendor_type', 'medical_service_provider')
    ->where('membership_amount', '>', $membership->membership_amount)
    ->orderBy('membership_amount')
    ->first();

if ($next_membership) {
    $next_membership_amount = max(0, $next_membership->membership_amount - $provider_amount);
}
} else {
$next_membership = null;
}

// Set progress percentage to 100% if the current membership is platinum
$progress_percentage = ($membership && $membership->membership_type == 'platinum') ? 100 : ($provider_amount / ($next_membership ? $next_membership->membership_amount : 1)) * 100;
$progress_percentage = min(100, $progress_percentage); // Ensure it does not exceed 100%

    return view('front.mdhealth.medical-provider.membership', compact(
    'provider_amount',
    'membership',
    'next_membership_amount',
    'progress_percentage',
    ));
}
  


}
