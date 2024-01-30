@extends('front.layout.layout2')
@section('content')
    <style>
        .pending {
            width: 94px;
            height: 19px;
            flex-shrink: 0;
            padding: unset;
            color: #000;
            text-align: center;
            font-family: Campton;
            font-size: 10px;
            font-weight: 600;
            line-height: normal;
            letter-spacing: -0.4px;
        }
    </style>
    <div class="content-wrapper">
        <div class="container py-100px for-cards">
            <div class="d-flex gap-3">
                <div class="w-292">
                    @include('front.includes.sidebar')
                </div>
                <div class="w-761">
                    <div class="card mb-4" style="min-height: 245px;">
                        <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                            <span>Dashboard</span>
                            @if (!empty($membership))
                                @if ($membership->membership_type == 'silver')
                                    <img src="{{ asset('front/assets/img/silver-md.png') }}" alt="" height="24px">
                                @elseif($membership->membership_type == 'gold')
                                    <img src="{{ asset('front/assets/img/gold-dashboard.png') }}" alt="" height="24px">
                                @elseif($membership->membership_type == 'platinum')
                                    <img src="{{ asset('front/assets/img/platinum-md.png') }}" alt="" height="24px">
                                @else
                                    <p>Unknown Membership Type: {{ $membership->membership_type }}</p>
                                @endif
                            @endif
                            {{-- <img src="{{asset('front/assets/img/GoldMember.svg')}}" alt=""> --}}
                        </h5>
                        <div class="card-body">
                            <div class="green-plate bg-green d-flex align-items-center justify-content-between mb-3">
                                <p class="my-0">Orders (Monthly)</p>
                                <h3 class="my-0">
                                    {{ !empty($monthly_orders['monthly_orders']) ? $monthly_orders['monthly_orders'] : 0 }}</h3>
                            </div>
                            <div
                                class="black-plate bg-black text-green d-flex align-items-center justify-content-between mb-3">
                                <p class="my-0">Sales (Monthly)</p>
                                <h3 class="my-0">
                                    {{ !empty($monthly_sales_count['monthly_sales']) ? $monthly_sales_count['monthly_sales'] : 0 }}
                                    <span class="lira">₺</span></h3>
                            </div>
                        </div>
                    </div>

                    <!-- RECENT TRETMENTS -->
                    <div class="card" style="min-height: 215px;">
                        <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                            Recent Treatment Orders
                        </h5>
                        <div class="card-body">
                            @if ($recent_orders)
                                @foreach ($recent_orders as $order)
                                    {{-- {{dd($order)}} --}}

                                    {{-- {{dd($order)}} --}}
                                    <!--  -->
                                    <div class="card shadow-none mb-4" style="border-radius: 3px;background: #F6F6F6;">
                                        <div class="p-3 d-flex gap-3">
                                            <div class="card-img-div">
                                                <img src="{{ !empty($provider_logo->company_logo_image_path) ? url('/') . Storage::url($provider_logo->company_logo_image_path) : asset('front/assets/img/Memorial.svg') }}"
                                                    alt="" class="md-img-2">
                                            </div>
                                            <div>
                                                <div class="d-flex gap-3">
                                                    <h5 class="card-h1 mb-2">Treatment No:
                                                        #{{ !empty($order['order_id']) ? $order['order_id'] : '' }}</h5>
                                                    <p class="pending ms-3 mb-0 df-center">
                                                        {{ !empty($order['purchase_type']) ? $order['purchase_type'] : '' }}</p>
                                                </div>
                                                <p class="mb-0 pkg-name">
                                                    {{ !empty($order['package']['package_name']) ? $order['package']['package_name'] : '' }}
                                                </p>
                                            </div>
                                            <div class="ms-auto d-flex flex-column justify-content-end align-items-end">
                                                <h5 class="card-h3 mb-0">Total Price: <span
                                                        class="card-p1">{{ !empty($order['package']['sale_price']) ? $order['package']['sale_price'] : '' }}
                                                        <span class="lira fw-lighter">₺</span></span></h5>
                                                <a href="{{ url('treatment-order-details/' . (!empty($order['id']) ? Crypt::encrypt($order['id']) : '')) }}"
                                                    class="mt-auto view-det">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                @include('front.includes.no-data-found')
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
