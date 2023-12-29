@extends('front.layout.layout2')
@section('content')
    <style>
        .treatment-dashboard-tab .btn-md {
            width: unset;
            height: unset;
        }

        .treatment-dashboard-tab .nav.nav-tabs {
            justify-content: space-between;
            gap: 25px;
        }

        .treatment-dashboard-tab .btn-md {
            width: unset;
            height: unset;
        }

        .treatment-dashboard-tab .nav-link1 {
            border-radius: 25px;
            padding: 15px 40px;
            border: 1px solid #000000 !important;
            width: 240px;
        }

        .treatment-dashboard-tab .nav-link1.active1,
        .treatment-dashboard-tab .nav-link1:hover {
            border-bottom: 0;
            background-color: #3db303;
            border: 1px solid #3db303 !important;
        }

        .user-reservation-btn1 {
            width: 190px;
            height: 35px;
            flex-shrink: 0;
            border-radius: 5px;
            background: #000;
            border: none;
            color: #FFF;
            text-align: center;
            font-family: Campton;
            font-size: 14px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            letter-spacing: -0.56px;
        }
        .user-reservation-btn2{
            width: 173px;
height: 35px;
flex-shrink: 0;
border-radius: 5px;
background: #F3771D;
border: none;

color: #FFF;
text-align: center;
font-family: Campton;
font-size: 14px;
font-style: normal;
font-weight: 500;
line-height: normal;

        }
        .user-res-p1 {
            color: #000;
            font-family: Campton;
            font-size: 20px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            letter-spacing: -0.8px;
        }

        .user-res-p2 {
            color: #000;
            font-family: Campton;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            /* letter-spacing: -0.56px; */
        }

        .user-res-p3 {
           color: #000;
font-family: Campton;
font-size: 14px;
font-style: normal;
font-weight: 500;
line-height: normal;
letter-spacing: -0.56px;
        }

        .user-res-p4 {
            color: #000;
            font-family: Campton;
            font-size: 16px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            letter-spacing: -0.64px;
        }

    </style>
    <div class="content-wrapper">
        <div class="container py-100px for-cards">
            <div class="row">
                <div class="col-md-3">
                    @include('front.includes.sidebar-user')
                </div>
                <div class="col-md-9">

                    <div class="card py-2 px-5">
                        <div class=" d-flex align-items-center justify-content-between">
                            <h4 class="md-booking-search-p4" style="color: #000000">
                                Reservations
                            </h4>
                            <div class=""><img src="{{ 'front/assets/img/user/Group 18.png' }}" alt=""></div>
                        </div>
                    </div>

                    <div class="tab-div treatment-dashboard-tab mt-5">
                        {{-- Tab --}}
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item " role="presentation">
                                <button class=" nav-link1 active1 btn btn-md btn-text" id="patient-details-tab"
                                    data-bs-toggle="tab" data-bs-target="#patient-details" type="button" role="tab"
                                    aria-controls="patient-details" aria-selected="true">Hotel</button>
                            </li>
                            <li class="nav-item " role="presentation">
                                <button class=" nav-link1 btn btn-md btn-text" id="patient-package-details-tab"
                                    data-bs-toggle="tab" data-bs-target="#patient-package-details" type="button"
                                    role="tab" aria-controls="patient-package-details" aria-selected="true">In
                                    Vehicle</button>
                            </li>
                            <li class="  nav-item" role="presentation">
                                <button class="btn btn-md btn-text nav-link1" id="patient-message-tab" data-bs-toggle="tab"
                                    data-bs-target="#patient-message" role="tab" aria-controls="patient-message"
                                    aria-selected="true">
                                    Flight Ticket's</button>
                            </li>
                        </ul>
                        {{-- Tab planes --}}
                        <div class="card">

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="patient-details" role="tabpanel"
                                    aria-labelledby="patient-details-tab">
                                    <div class="tab-div ">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs d-flex justify-content-evenly" id="myTab"
                                            role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="saleactive-tab" data-bs-toggle="tab"
                                                    data-bs-target="#saleactive" type="button" role="tab"
                                                    aria-controls="saleactive" aria-selected="true">Active</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="sale-completed-tab" data-bs-toggle="tab"
                                                    data-bs-target="#sale-completed" type="button" role="tab"
                                                    aria-controls="sale-completed" aria-selected="false">Completed</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="sale-cancelled-tab" data-bs-toggle="tab"
                                                    data-bs-target="#sale-cancelled" type="button" role="tab"
                                                    aria-controls="sale-cancelled" aria-selected="false">Cancelled</button>
                                            </li>
                                        </ul>

                                        <div class="container filter-div">
                                            <div class="search-div">
                                                <input type="text" placeholder="Search">
                                            </div>
                                            <div class="list-div">
                                                <select name="" id="">
                                                    <option value="">All Orders</option>
                                                    <option value="">In Progress</option>
                                                    <option value="">Pending</option>
                                                    <option value="">Shipping</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Tab panes -->
                                        <div class="container tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="saleactive" role="tabpanel"
                                                aria-labelledby="saleactive-tab">
                                                <div class="row mb-5">
                                                    <div class="col-8">
                                                        <div class="row">
                                                            <div class="col">
                                                                <img src="{{ 'front/assets/img/user/Rectangle 233.png' }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="col-9 d-flex flex-column justify-content-between">
                                                                {{-- <div class="d-flex flex-column justify-content-between"> --}}
                                                                <div class="d-flex align-items-center gap-2 m-0">
                                                                    <h6 class="m-0 user-res-p1">Renaissence Instanbul</h6>
                                                                    <span>
                                                                        <img src="{{ 'front/assets/img/mdBookings/bi_star-fill.png' }}"
                                                                            alt="">
                                                                    </span>
                                                                    <p class="m-0 user-res-p2">4 Stars Hotel</p>
                                                                </div>
                                                                <div class="d-flex gap-2 m-0 user-res-p3">
                                                                    <span>
                                                                        <img src="{{ 'front/assets/img/mdFoods/mdi_location.png' }}"
                                                                            alt="">
                                                                    </span>
                                                                    <p class="m-0">Besiktas / Instanbul</p>
                                                                    <p class="m-0">
                                                                        <span>
                                                                            <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}"
                                                                                alt="">
                                                                        </span>
                                                                        <span>12 Dec 2023 - 19 Dec 2023</span>
                                                                    </p>
                                                                </div>
                                                                <div class="m-0">
                                                                    <button class=" user-reservation-btn1">Book
                                                                        Details</button>
                                                                </div>
                                                                {{-- </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col d-flex flex-column justify-content-end align-items-end">
                                                        {{-- <div class=" d-flex flex-column justify-content-end"> --}}
                                                            <p class="m-0"><span
                                                                    class="user-res-p4">Reviews</span><span
                                                                    class="user-res-p2">(29)</span></p>
                                                            <div class="">
                                                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}"
                                                                    alt="">
                                                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}"
                                                                    alt="">
                                                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}"
                                                                    alt="">
                                                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}"
                                                                    alt="">
                                                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill (1).png' }}"
                                                                    alt="">
                                                            </div>
                                                        {{-- </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="sale-completed" role="tabpanel"
                                                aria-labelledby="sale-completed-tab">
                                                <div class="row mb-5">
                                                    <div class="col-8">
                                                        <div class="row">
                                                            <div class="col">
                                                                <img src="{{ 'front/assets/img/user/Rectangle 233.png' }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="col-9 d-flex flex-column">
                                                                {{-- <div class="d-flex flex-column justify-content-between"> --}}
                                                                <div class="d-flex align-items-center gap-2 m-0">
                                                                    <h6 class="m-0 user-res-p1">Renaissence Instanbul</h6>
                                                                    <span>
                                                                        <img src="{{ 'front/assets/img/mdBookings/bi_star-fill.png' }}"
                                                                            alt="">
                                                                    </span>
                                                                    <p class="m-0 user-res-p2">4 Stars Hotel</p>
                                                                </div>
                                                                <div class="d-flex gap-2 m-0 user-res-p2">
                                                                    <span>
                                                                        <img src="{{ 'front/assets/img/mdFoods/mdi_location.png' }}"
                                                                            alt="">
                                                                    </span>
                                                                    <p class="m-0">Besiktas / Instanbul</p>
                                                                    <p class="m-0">
                                                                        <span>
                                                                            <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}"
                                                                                alt="">
                                                                        </span>
                                                                        <span>12 Dec 2023 - 19 Dec 2023</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col d-flex flex-column justify-content-end align-items-end">
                                                        <button class="user-reservation-btn2">Write Review</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="sale-cancelled" role="tabpanel"
                                                aria-labelledby="sale-cancelled-tab">
                                                <div class="row mb-5">
                                                    <div class="col-8">
                                                        <div class="row">
                                                            <div class="col">
                                                                <img src="{{ 'front/assets/img/user/Rectangle 233.png' }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="col-9 d-flex flex-column justify-content-between">
                                                                <div class="">
                                                                <div class="d-flex align-items-center gap-2 m-0">
                                                                    <h6 class="m-0 user-res-p1">Renaissence Instanbul</h6>
                                                                    <span>
                                                                        <img src="{{ 'front/assets/img/mdBookings/bi_star-fill.png' }}"
                                                                            alt="">
                                                                    </span>
                                                                    <p class="m-0 user-res-p2">4 Stars Hotel</p>
                                                                </div>
                                                                <div class="d-flex gap-2 m-0 user-res-p2">
                                                                    <span>
                                                                        <img src="{{ 'front/assets/img/mdFoods/mdi_location.png' }}"
                                                                            alt="">
                                                                    </span>
                                                                    <p class="m-0">Besiktas / Instanbul</p>
                                                                    <p class="m-0">
                                                                        <span>
                                                                            <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}"
                                                                                alt="">
                                                                        </span>
                                                                        {{-- <span>12 Dec 2023 - 19 Dec 2023</span> --}}
                                                                    </p>
                                                                </div>
                                                                </div>
                                                                <p class="user-res-p3">
                                                                    <span class="">Status:</span>
                                                                    <span class="" style="color: #F31D1D">Cancelled</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col d-flex flex-column justify-content-end align-items-end">
                                                        <button class="user-reservation-btn2">Write Review</button>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="patient-package-details" role="tabpanel"
                                    aria-labelledby="patient-package-details-tab">
                                    <div class="py-3">
                                        rt
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="patient-message" role="tabpanel"
                                    aria-labelledby="patient-message-tab">
                                    <div class="py-3">
                                        ik
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="patient-message" role="tabpanel"
                                aria-labelledby="patient-message-tab">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Change Patient Information -->
@endsection
@section('script')
    <script>
        $(".upPackageLi").addClass("activeClass");
        $(".upPackage").addClass("md-active");
    </script>
@endsection
