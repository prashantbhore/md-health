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
                            <p class="mb-0">Orders (Monthly)</p>
                            <h3 class="mb-0">{{$monthly_orders['monthly_orders']}}</h3>
                        </div>
                        <div class="black-plate bg-black text-green d-flex align-items-center justify-content-between mb-3">
                            <p class="mb-0">Sales (Monthly)</p>
                            <h3 class="mb-0">{{$monthly_sales_count['monthly_sales']}} ₺</h3>
                        </div>
                    </div>
                </div>

                <!-- RECENT TRETMENTS -->
                <div class="card">
                    <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                        Recent Treatment Orders
                    </h5>
                    <div class="card-body">
                         @foreach ($recent_orders as $order)

                           {{dd($orders)}}
                             
                       
                        <div class="treatment-card df-start w-100 mb-3">
                            <div class="row card-row align-items-center">
                                <div class="col-md-2 df-center px-0">
                                    <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="">
                                </div>
                                <div class="col-md-6 justify-content-start ps-0">
                                    <div class="trmt-card-body">
                                        <h5 class="dashboard-card-title">Treatment No: #{{!empty($order->order_id)?$order->order_id:''}}<span class="pending">{{!empty($order->purchase_type)?$order->purchase_type:''}}</span></h5>
                                        <h5 class="mb-0 fw-500">{{!empty($order->purchase_type)?$order->purchase_type:''}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                    <div class="trmt-card-footer">
                                        <h6 class="dbrd-order-total"><strong>Total Price:</strong> <span class="">34.473,98 ₺</span></h6>
                                        <h6 class="fw-700">Order ID: #MD3726378</h6>
                                        <a href="{{url('treatment-order-details')}}" class="mt-auto view-detail-btn"><strong>View Details</strong></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach


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