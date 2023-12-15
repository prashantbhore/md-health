@extends('front.layout.layout2')
@section("content")
<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="row">
            <div class="col-md-3">
                @include('front.includes.sidebar-user')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                        <span>Your Profile</span>
                        <img src="{{asset('front/assets/img/GoldMember.svg')}}" alt="">
                    </h5>
                    <div class="card-body">
                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(".upProfileLi").addClass("activeClass");
    $(".upProfile").addClass("md-active");
</script>
@endsection