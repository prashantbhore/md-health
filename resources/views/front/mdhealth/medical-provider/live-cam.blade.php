@extends('front.layout.layout2')
@section("content")
<style>
    .card {
        width: 1066px;
        height: 659px;
        flex-shrink: 0;
    }

    .live-screen {
        width: 992px;
        height: 506px;
        flex-shrink: 0;
        border-radius: 5px;
        background: #D9D9D9;
    }
</style>
<div class="content-wrapper">
    <div class="container py-100px for-cards my-3">
        <div class="row">
            <div class="col-md-12 df-center">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="card-h1">Live Consultation</div>
                        <a href="{{url('user-message')}}" class="d-flex align-items-center gap-1 text-decoration-none">
                            <img src="{{asset('front/assets/img/backPage.png')}}" alt=""> <span class="card-h1">Back Messages</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="live-screen">

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
    $(".mpMessagesLi").addClass("activeClass");
    $(".mpMessages").addClass("md-active");
</script>
@endsection