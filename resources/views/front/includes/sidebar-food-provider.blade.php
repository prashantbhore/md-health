
<!-- Main Stylesheet -->
<link rel="stylesheet" href="{{URL::asset('front/assets/css/vendor.css')}}">

<div class="card panel-left">
    <h5 class="card-header">Food Provider Panel</h5>
    <div class="card-body">
        <ul class="nav flex-column nav-stuff">
            <li class="nav-item mpDashboardLi">
                <a class="nav-link mpDashboard" aria-current="page" href="{{url('food-provider-panel-dashboard')}}">Dashboard</a>
            </li>
            <li class="nav-item mpSalesLi">
                <a class="nav-link mpSales" href="{{url('food-provider-sales')}}">Sales</a>
            </li>
            <li class="nav-item mpFoodsLi">
                <a class="nav-link mpFoods" href="{{url('food-provider-foods')}}">Foods</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Payment Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="food-provider-account">Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Reports</a>
            </li>

            <li class="nav-item">
                <a class="nav-link disabled text-black fw-bold" href="#" tabindex="-1" aria-disabled="true">Version 1.0</a>
            </li>

        </ul>
    </div>
</div>