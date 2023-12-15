@extends('front.layout.layout2')
@section("content")
<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="row">
            <div class="col-md-3">
                @include('front.includes.sidebar')
            </div>
            <div class="col-md-9">
                <div class="card">
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