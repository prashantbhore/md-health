@php

     $previllages= App\Models\MedicalProviderRegistrater::where('status','active')
       ->select('previllages')
        ->where('roll_id','!=',null)
        ->where('id',Auth::guard('md_health_medical_providers_registers')->user()->id)
        ->first();
        // dd($previllages);

@endphp
<div class="card panel-left">
    <h5 class="card-header">Service Provider Panel</h5>
    <div class="card-body">
        <ul class="nav flex-column nav-stuff"  style="min-height: 520px;">
            <li class="nav-item mpDashboardLi 
            {{ !empty($previllages) && strpos($previllages, 'Dashboard') == false ? 'd-none' : '' }}">
                <a class="nav-link mpDashboard" aria-current="page" href="{{url('medical-provider-dashboard')}}">Dashboard</a>
            </li>
            <li class="nav-item mpSalesLi 
             {{ !empty($previllages) && strpos($previllages, 'Sales') == false ? 'd-none' : '' }}">
                <a class="nav-link mpSales" href="{{url('medical-provider-sales')}}">Sales</a>
            </li>
            <li class="nav-item mpPackagesLi 
             {{ !empty($previllages) && strpos($previllages, 'Packages') == false ? 'd-none' : '' }}">
                <a class="nav-link mpPackages" href="{{url('medical-packages')}}">Packages</a>
            </li>
            <li class="nav-item mpPaymentLi 
             {{ !empty($previllages) && strpos($previllages, 'Payment Information') == false ? 'd-none' : '' }}">
                <a class="nav-link mpPayment " href="{{url('payment-information')}}">Payment Information</a>
            </li>
            <li class="nav-item mpMessagesLi 
             {{ !empty($previllages) && strpos($previllages, 'Messages') == false ? 'd-none' : '' }}">
                <a class="nav-link mpMessages" href="{{url('medical-messages')}}">Messages</a>
            </li>
            <li class="nav-item mpRolesLi 
             {{ !empty($previllages) && strpos($previllages, 'Roles') == false ? 'd-none' : '' }}">
                <a class="nav-link mpRoles " href="{{url('medical-roles')}}">Roles</a>
            </li>
            <li class="nav-item mpOtherServicesLi 
             {{ !empty($previllages) && strpos($previllages, 'Other Services') == false ? 'd-none' : '' }}">
                <a class="nav-link mpOtherServices" href="{{url('medical-other-services')}}">Other Services</a>
            </li>
            <li class="nav-item mpAccountLi 
             {{ !empty($previllages) && strpos($previllages, 'Account') == false ? 'd-none' : '' }}">
                <a class="nav-link mpAccount" href="{{url('medical-account')}}">Account</a>
            </li>
            <li class="nav-item mpReportsLi 
             {{ !empty($previllages) && strpos($previllages, 'Reports') == false ? 'd-none' : '' }}">
                <a class="nav-link mpReports" href="{{url('reports')}}">Reports</a>
            </li>
            <li class="nav-item mpMembershipLi 
             {{ !empty($previllages) && strpos($previllages, 'Membership') == false ? 'd-none' : '' }}">
                <a class="nav-link mpMembership" href="{{url('membership')}}">Membership</a>
            </li>

            <li class="nav-item mt-auto">
            <a class="nav-link disabled text-black fw-bold verNo" href="#" tabindex="-1" aria-disabled="true">MD Health - Version 1.0</a>
            </li>

        </ul>
    </div>
</div>