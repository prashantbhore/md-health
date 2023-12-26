@extends('front.layout.layout2')
@section("content")
<style>
    .select-name-div {
        box-shadow: 0px 0px 14px 0px rgba(0, 0, 0, 0.25);
        border-radius: 3px;
    }
</style>
<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="row">
            <div class="col-md-3">
                @include('front.includes.sidebar')
            </div>
            <div class="col-md-9">
                <div class="card mb-4">
                    <div class="form-div">
                        <div class="card-body" style="min-height:800px">
                            <h5 class="d-flex align-items-center justify-content-between bg-light fw-700 p-4 mb-3 fsb-1">
                                <span>Message</span>
                                <a href="{{url('medical-message')}}" class="d-flex align-items-center text-dark gap-1 text-decoration-none">
                                    <img src="{{asset('front/assets/img/backPage.png')}}" alt=""> Back Messages
                                </a>
                            </h5>
                            <div class="select-message-div">
                                <div class="select-name-div d-flex justify-content-between align-items-center p-3" id="onclickopen">
                                    <p class="m-0 fw-800 fsb-1 d-flex align-items-center gap-2">
                                        <span class="fw-200 text-secondary">Write to </span><span class="fw-200 text-secondary">|</span> Customer Name Surname
                                    </p>
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                                <div class="show-name-list mt-3">
                                    <div class="select-name-div p-3" id="onclickopen">
                                        <p class="m-0 fw-800 fsb-1 d-flex align-items-center p-1 gap-2">
                                            <span class="fw-200 text-secondary">Write to </span><span class="fw-200 text-secondary">|</span> Customer Name Surname
                                        </p>
                                        <p class="m-0 fw-800 fsb-1 d-flex align-items-center p-1 gap-2">
                                            <span class="fw-200 text-secondary">Write to </span><span class="fw-200 text-secondary">|</span> Customer Name Surname
                                        </p>
                                        <p class="m-0 fw-800 fsb-1 d-flex align-items-center p-1 gap-2">
                                            <span class="fw-200 text-secondary">Write to </span><span class="fw-200 text-secondary">|</span> Customer Name Surname
                                        </p>
                                        <p class="m-0 fw-800 fsb-1 d-flex align-items-center p-1 gap-2">
                                            <span class="fw-200 text-secondary">Write to </span><span class="fw-200 text-secondary">|</span> Customer Name Surname
                                        </p>
                                    </div>
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
    $(".mpMessagesLi").addClass("activeClass");
    $(".mpMessages").addClass("md-active");
</script>

<script>
    $(".show-name-list").hide();
    $("#onclickopen").click(function() {
        $(".show-name-list").toggle(200);
    });
    $("body").click(function() {
        $(".show-name-list").hide();
    });


    const menuShow = () => {
        $(".show-name-list").toggleClass("dblock");
        $(".show-name-list").addClass("scale-in-top");
    };

    const menuHide = () => {
        $(".show-name-list").removeClass("dblock");
        // $(".user-menu").addClass("scale-out-top");
    };

    const userMenu = document.getElementById("user_menu");
    document.onclick = function(e) {
        if (e.target.id !== "dropdownMenuButton1") {
            if (e.target.closest("#user_menu")) {
                return;
            } else {
                userMenu.classList.remove("dblock");
            }
        }
    };
</script>
@endsection