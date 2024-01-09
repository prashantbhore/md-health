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
                            <h3 class="mb-0">{{!empty($monthly_orders['monthly_orders'])?$monthly_orders['monthly_orders']:0}}</h3>
                        </div>
                        <div class="black-plate bg-black text-green d-flex align-items-center justify-content-between mb-3">
                            <p class="mb-0">Sales (Monthly)</p>
                            <h3 class="mb-0">{{!empty($monthly_sales_count['monthly_sales'])?$monthly_sales_count['monthly_sales']:0}} ₺</h3>
                        </div>
                    </div>
                </div>

                <!-- RECENT TRETMENTS -->
                <div class="card" style="min-height: 218px;">
                    <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                        Recent Treatment Orders
                    </h5>
                    <div class="card-body">
                        @if($recent_orders)
                        @foreach ($recent_orders as $order)

                        {{-- {{dd($order)}} --}}

                        {{-- {{dd($order)}} --}}
                        <!--  -->
                        <div class="card shadow-none" style="border-radius: 3px;background: #F6F6F6;">
                            <div class="p-3 d-flex gap-3">
                                <div class="card-img-div">
                                    <img src="{{!empty($provider_logo->company_logo_image_path)?url('/').Storage::url($provider_logo->company_logo_image_path):asset('front/assets/img/Memorial.svg')}}" alt="">
                                </div>
                                <div>
                                    <h5 class="card-h1">Treatment No: #{{!empty($order['order_id'])?$order['order_id']:''}} <span class="pending ms-3">{{!empty($order['purchase_type'])?$order['purchase_type']:''}}</span></h5>
                                    <p class="mb-0 pkg-name">{{!empty($order['package']['package_name'])?$order['package']['package_name']:''}}</p>
                                </div>
                                <div class="ms-auto d-flex flex-column justify-content-end align-items-end">
                                    <h5 class="card-h3 mb-0">Total Price: <span class="card-p1">{{!empty($order['package']['sale_price'])?$order['package']['sale_price']:''}} ₺</span></h5>
                                    <a href="{{ url('treatment-order-details/' . (!empty($order['id']) ?Crypt::encrypt($order['id']): '')) }}" class="mt-auto view-det">View Details</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
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