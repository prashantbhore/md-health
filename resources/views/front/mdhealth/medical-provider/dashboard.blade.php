@extends('front.layout.layout2')
@section("content")
<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="row">
            <div class="col-md-3">
                @include('front.includes.sidebar')
            </div>
            <div class="col-md-9">
                <div class="card mb-4">
                    <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                        <span>Dashboard</span>
                        <img src="{{asset('front/assets/img/GoldMember.svg')}}" alt="">
                    </h5>
                    <div class="card-body">
                        <div class="green-plate bg-green d-flex align-items-center justify-content-between mb-3">
                            <p class="mb-0">Orders(Monthly)</p>
                            <h3 class="mb-0">32</h3>
                        </div>
                        <div class="black-plate bg-black text-green d-flex align-items-center justify-content-between mb-3">
                            <p class="mb-0">Sales(Monthly)</p>
                            <h3 class="mb-0">349,938,07 ₺</h3>
                        </div>
                    </div>
                </div>

                <!-- RECENT TRETMENTS -->
                <div class="card">
                    <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                        Recent Treatment Orders
                    </h5>
                    <div class="card-body">
                        <div class="treatment-card df-start w-100">
                            <div class="row w-100">
                                <div class="col-md-2 df-center px-0">
                                    <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="">
                                </div>
                                <div class="col-md-5 justify-content-start ps-0">
                                    <h6 class="mb-0">Treatment No: #MD3726378 <span class="pending">Pending</span></h6>
                                    <p class="mb-0">Heart Valve Replacement Surgery</p>
                                </div>
                                <div class="col-md-5 d-flex flex-column justify-content-between align-items-end text-end">
                                    <h6>Total Price: <span class="fw-light">34.473,98 ₺<</span></h6>
                                    <a href="{{url('treatment-order-details')}}" class="mt-auto">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(".mpDashboardLi").addClass("activeClass");
    $(".mpDashboard").addClass("md-active");
</script>
@endsection