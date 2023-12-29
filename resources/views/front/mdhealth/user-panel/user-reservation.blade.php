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
            background-color: transparent
        }


        .treatment-dashboard-tab .nav-link1 {
            background-color: transparent;
        }

        .treatment-dashboard-tab .nav-link1.active,
        .treatment-dashboard-tab .nav-link1:hover {
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

        .user-reservation-btn2 {
            width: 173px;
            height: 35px;
            flex-shrink: 0;
            border-radius: 5px;
            background: #F3771D;
            border: none;
            opacity: 1;
            color: #FFF;
            text-align: center;
            font-family: Campton;
            font-size: 14px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;

        }

        .user-res-btn2 {
            width: 190px;
            height: 35px;
            flex-shrink: 0;
            border-radius: 5px;
            background: #F31D1D;
            border: none;
            color: #FFF;
            text-align: center;
            font-family: Campton;
            font-size: 14px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            letter-spacing: -0.56px;
            opacity: 1;
        }

        .user-res-btn3 {
            width: 405px;
            height: 57px;
            flex-shrink: 0;
            width: 405px;
            border-radius: 3px;
            background: #F31D1D;
            height: 57px;
            flex-shrink: 0;
            color: #FFF;
            font-family: Campton;
            font-size: 16px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            letter-spacing: -1.12px;
            border: none
        }

        .user-res-btn4 {
            width: 312px;
            height: 36px;
            flex-shrink: 0;
            border-radius: 5px;
            background: #4CDB06;
            color: #000;
            font-family: Campton;
            font-size: 13px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            letter-spacing: -0.52px;
            border: none
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

        .user-res-p5 {
            color: #000;
            font-family: Campton;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            letter-spacing: -0.56px;
        }

        .user-res-p6 {
            color: #000;
            font-family: Campton;
            font-size: 12px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            letter-spacing: -0.48px;
        }

        .user-res-p7 {
            color: #000002;
            font-family: Campton;
            font-size: 16px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            letter-spacing: -0.64px;
        }

        .user-res-p8 {
            color: #979797;
            font-family: Campton;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            letter-spacing: -0.64px;
        }

        .user-res-p9 {
            color: #000002;
            text-align: center;
            font-family: Campton;
            font-size: 23px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            letter-spacing: -0.92px;
        }

        .user-res-p10 {
            color: #000;
            font-family: Campton;
            font-size: 16px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            letter-spacing: -1.12px;
        }

        .btn-close {
            position: absolute;
            top: 15px;
            left: 36rem;
            right: 15px;
            width: 24px;
            height: 24px;
            flex-shrink: 0;
            color: #000;
            text-align: center;
            font-family: Campton;
            font-size: 13px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            letter-spacing: -0.52px;
            background-color: #949494;
            border-radius: 50%
        }

        #TransportationView .acmdn-hotel-details {
            margin-bottom: 40px;
        }

        #TransportationView .acmdn-repsntve-img {
            margin-bottom: 120px;
        }

        #UserVehicleView .modal-content, #TransportationView .modal-content {
            background-image: url('../front/assets/img/user/Frame 136.png');
            background-position: right;
            background-repeat: no-repeat;
            background-size: contain;
            border-radius: 10px;
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
                                <button class=" nav-link1 active btn btn-md btn-text" id="patient-details-tab"
                                    data-bs-toggle="tab" data-bs-target="#patient-details" type="button" role="tab"
                                    aria-controls="patient-details" aria-selected="true">Hotel</button>
                            </li>
                            <li class="nav-item " role="presentation">
                                <button class=" nav-link1 btn btn-md btn-text" id="patient-package-details-tab"
                                    data-bs-toggle="tab" data-bs-target="#patient-package-details" type="button"
                                    role="tab" aria-controls="patient-package-details" aria-selected="true">
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
                                {{-- Hotel --}}
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
                                                                    <button
                                                                        class=" user-reservation-btn1 menu-detail-btn">Book
                                                                        Details</button>
                                                                </div>
                                                                {{-- </div> --}}
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div
                                                        class="col d-flex flex-column justify-content-end align-items-end">
                                                        {{-- <div class=" d-flex flex-column justify-content-end"> --}}
                                                        <p class="m-0"><span class="user-res-p4">Reviews</span><span
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
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <div class="view-menu-div1 mt-4">
                                                            <p class="user-res-p4" style="color: #4CDB06">Hotel Full
                                                                Address</p>
                                                            <p class="user-res-p2">Lorem ipsum dolor sit amet, consectetur
                                                                adipiscing elit,
                                                                sed do eiusmod tempor incididunt ut labore et dolore magna
                                                                aliqua.
                                                                Ut enim ad minim Besiktas / Istanbul</p>

                                                            <div class="row">
                                                                <div class="col">
                                                                    <p class="user-res-p4" style="color: #4CDB06">Hotel
                                                                        Enter Date</p>
                                                                    <p class="user-res-p5">
                                                                        <span class="" style="color:#4CDB06">Enter
                                                                            Date:</span><span class="">12 December
                                                                            2023 /14:00</span>
                                                                    </p>
                                                                    <p class="user-res-p5">
                                                                        <span class="" style="color: #F31D1D">Exit
                                                                            Date:</span><span class="">19 December
                                                                            2023 /14:00</span>
                                                                    </p>
                                                                </div>
                                                                <div class="col user-res-p4">
                                                                    <p class="" style="color: #4CDB06">Total Price
                                                                    </p>
                                                                    <p class="">1,500.00$</p>
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <p class="user-res-p4" style="color: #4CDB06">Room Details
                                                                </p>
                                                                <div class=" d-flex gap-5">
                                                                    <div class="user-res-p6">
                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/user/Vector (1).png' }}"
                                                                                    alt="">
                                                                            </span>
                                                                            <span class="">Television</span>
                                                                        </p>
                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/user/tabler_disabled.png' }}"
                                                                                    alt="">
                                                                            </span>
                                                                            <span class="">Suitable for whellchair
                                                                                use</span>
                                                                        </p>
                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/user/material-symbols_cable.png' }}"
                                                                                    alt="">
                                                                            </span>
                                                                            <span class="">Cable TV service</span>
                                                                        </p>
                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/user/mdi_refrigerator-bottom.png' }}"
                                                                                    alt="">
                                                                            </span>
                                                                            <span class="">Minibar</span>
                                                                        </p>
                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/user/game-icons_vacuum-cleaner (1).png' }}"
                                                                                    alt="">
                                                                            </span>
                                                                            <span class="">Daily Hosekeeping</span>
                                                                        </p>
                                                                    </div>
                                                                    <div class="user-res-p6">
                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/user/fluent_food-16-filled.png' }}"
                                                                                    alt="">
                                                                            </span>
                                                                            <span class="">Breakfast & Dinner</span>
                                                                        </p>
                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/user/map_spa (1).png' }}"
                                                                                    alt="">
                                                                            </span>
                                                                            <span class="">Sauna & Spa</span>
                                                                        </p>
                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/user/tabler_smoking-no.png' }}"
                                                                                    alt="">
                                                                            </span>
                                                                            <span class="">No Smoking</span>
                                                                        </p>
                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/user/logos_wifi.png' }}"
                                                                                    alt="">
                                                                            </span>
                                                                            <span class="">Wi-Fi</span>
                                                                        </p>
                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/user/ion_fitness-outline.png' }}"
                                                                                    alt="">
                                                                            </span>
                                                                            <span class="">Fitness Center</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-end">
                                                                <button class="user-res-btn2" data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModal12">Cancellation
                                                                    Request</button>
                                                            </div>
                                                        </div>
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
                                                    <div
                                                        class="col d-flex flex-column justify-content-end align-items-end">
                                                        <button class="user-reservation-btn2" data-bs-toggle="modal"
                                                            data-bs-target="#TransportationView" data-bs-dismiss="modal">Write Review</button>
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
                                                                        <h6 class="m-0 user-res-p1">Renaissence Instanbul
                                                                        </h6>
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
                                                                    <span class=""
                                                                        style="color: #F31D1D">Cancelled</span>
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

                                {{-- Vehicle --}}
                                <div class="tab-pane fade" id="patient-package-details" role="tabpanel"
                                    aria-labelledby="patient-package-details-tab">
                                    <div class="tab-div ">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs d-flex justify-content-evenly" id="myTab"
                                            role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="saleactive-tab1" data-bs-toggle="tab"
                                                    data-bs-target="#saleactive1" type="button" role="tab"
                                                    aria-controls="saleactive1" aria-selected="true">Active</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="sale-completed-tab2" data-bs-toggle="tab"
                                                    data-bs-target="#sale-completed2" type="button" role="tab"
                                                    aria-controls="sale-completed2"
                                                    aria-selected="false">Completed</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="sale-cancelled-tab3" data-bs-toggle="tab"
                                                    data-bs-target="#sale-cancelled3" type="button" role="tab"
                                                    aria-controls="sale-cancelled3"
                                                    aria-selected="false">Cancelled</button>
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
                                            <div class="tab-pane fade show active" id="saleactive1" role="tabpanel"
                                                aria-labelledby="saleactive-tab1">
                                                <div class="row mb-5">
                                                    <div class="col-8">
                                                        <div class="row">
                                                            <div class="col">
                                                                <img src="{{ 'front/assets/img/user/image 39.png' }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="col-8 d-flex flex-column justify-content-between">
                                                                {{-- <div class="d-flex flex-column justify-content-between"> --}}
                                                                <div class="d-flex align-items-center gap-2 m-0">
                                                                    <h6 class="m-0 user-res-p1">Garenta Rental</h6>
                                                                    {{-- <span>
                                                                        <img src="{{ 'front/assets/img/mdBookings/bi_star-fill.png' }}"
                                                                            alt="">
                                                                    </span> --}}
                                                                    {{-- <p class="m-0 user-res-p2">4 Stars Hotel</p> --}}
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
                                                                    <button
                                                                        class=" user-reservation-btn1 menu-detail-btn2">Reservation
                                                                        Details</button>
                                                                </div>
                                                                {{-- </div> --}}
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div
                                                        class="col d-flex flex-column justify-content-end align-items-end">
                                                        {{-- <div class=" d-flex flex-column justify-content-end"> --}}
                                                        <p class="m-0"><span class="user-res-p4">Reviews</span><span
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
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <div class="view-menu-div2 mt-4">
                                                            <p class="user-res-p4" style="color: #4CDB06">Acent Full
                                                                Adress</p>
                                                            <p class="user-res-p2">Lorem ipsum dolor sit amet, consectetur
                                                                adipiscing elit, sed do eiusmod tempor incididunt ut labore
                                                                et dolore magna aliqua. Ut enim ad minim Besiktas / Istanbul
                                                            </p>

                                                            <div class="row">
                                                                <div class="col">
                                                                    <p class="user-res-p4" style="color: #4CDB06">Vehicle
                                                                        Delivery Date</p>
                                                                    <p class="user-res-p5">
                                                                        <span class="" style="color:#4CDB06">Pick-Up
                                                                            Date:</span><span class="">12 December
                                                                            2023 /14:00</span>
                                                                    </p>
                                                                    <p class="user-res-p5">
                                                                        <span class="" style="color: #F31D1D">Return
                                                                            Date:</span><span class="">19 December
                                                                            2023 /14:00</span>
                                                                    </p>
                                                                </div>
                                                                <div class="col user-res-p4">
                                                                    <p class="" style="color: #4CDB06">Total Price
                                                                    </p>
                                                                    <p class="">1,500.00$</p>
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <p class="user-res-p4" style="color: #4CDB06">Vehicle
                                                                    Details
                                                                </p>
                                                                <div class=" d-flex gap-5">
                                                                    <div class="user-res-p6">
                                                                        <p class="">
                                                                            Economy
                                                                        </p>
                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/mdBookings/seat.png' }}"
                                                                                    alt="">
                                                                            </span>
                                                                            <span class="">7+1</span>
                                                                        </p>

                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/mdBookings/petrol.png' }}"
                                                                                    alt="">
                                                                            </span>
                                                                            <span class="">Gasoline</span>
                                                                        </p>
                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/user/tabler_smoking-no.png' }}"
                                                                                    alt="">
                                                                            </span>
                                                                            <span class="">No Smoking</span>
                                                                        </p>
                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/user/logos_wifi.png' }}"
                                                                                    alt="">
                                                                            </span>
                                                                            <span class="">Wi-Fi</span>
                                                                        </p>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="text-end">
                                                                <button class="user-res-btn2" data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModal21">Cancellation
                                                                    Request</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="sale-completed2" role="tabpanel"
                                                aria-labelledby="sale-completed-tab2">
                                                <div class="row mb-5">
                                                    <div class="col-9">
                                                        <div class="row">
                                                            <div class="col">
                                                                <img src="{{ 'front/assets/img/user/image 39.png' }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="col-8 d-flex flex-column">
                                                                {{-- <div class="d-flex flex-column justify-content-between"> --}}
                                                                <div class="d-flex align-items-center gap-2 m-0">
                                                                    <h6 class="m-0 user-res-p1">Garenta Rental</h6>
                                                                </div>
                                                                <div class="d-flex gap-2 m-0 user-res-p2">
                                                                    <span>
                                                                        <img src="{{ 'front/assets/img/mdFoods/image 39.png' }}"
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
                                                    <div
                                                        class="col-3 d-flex flex-column justify-content-end align-items-end">
                                                        <button class="user-reservation-btn2"  data-bs-toggle="modal"
                                                        data-bs-target="#UserVehicleView">Write Review</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="sale-cancelled3" role="tabpanel"
                                                aria-labelledby="sale-cancelled-tab3">
                                                <div class="row mb-5">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col">
                                                                <img src="{{ 'front/assets/img/user/image 39.png' }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="col-8 d-flex flex-column justify-content-between">
                                                                <div class="">
                                                                    <div class="d-flex align-items-center gap-2 m-0">
                                                                        <h6 class="m-0 user-res-p1">Garenta Rental
                                                                        </h6>
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
                                                                <p class="user-res-p3">
                                                                    <span class="">Status:</span>
                                                                    <span class=""
                                                                        style="color: #F31D1D">Cancelled</span>
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
    {{-- Model Boxes --}}
    {{-- Hote Model box 1 --}}
    <div class="modal fade" id="exampleModal12" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="width:48%;">
            <div class="modal-content ">
                <div class="position-relative overflow-hidden" style="height: 15rem">
                    <img src="{{ 'front/assets/img/user/Group 20.png' }}" alt="" class="position-relative"
                        style="top: -15rem;left:-1rem">
                    <button type="button btn-close z-index-1" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body m-0">
                    <label for="floatingTextarea2 user-res-p7">Cancellation
                        Detail</label>
                    <div class="form-floating mt-2">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2 user-res-p8">Please write
                            your treatment
                            cancellation request in detail</label>
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label user-res-p7" for="flexCheckDefault">
                            I confirm that I wish cancel my reservation
                        </label>
                    </div>
                    <div class=" text-center mt-3 mb-3">
                        <button class="user-res-btn3" data-bs-toggle="modal" data-bs-target="#exampleModalkd"
                            data-bs-dismiss="modal">Submit Cancel
                            Request</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Hotel Model Box 2 --}}
    <div class="modal fade" id="exampleModalkd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="width: 38rem">
            <div class="modal-content">
                <div class="">
                    <button type="button" class="btn-close" style="left:unset;top:14px;right:14px"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mt-4 mb-4">
                    <div class="d-flex flex-column justify-content-center align-items-center ">
                        <p class="">
                            <img src="{{ 'front/assets/img/user/md-red@.png' }}" alt="" class="">
                        </p>
                        <p class="user-res-p9">We received your <span style="color: #F31D1D">cancellation request</span>
                        </p>
                        <p class="user-res-p7">our customer supports will contact
                            you for your cancellation request soon.</p>
                        <div class=" text-center mt-5 mb-3">
                            <button class="user-res-btn3" data-bs-dismiss="modal">Done</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Hotel Model Box 3 --}}
    <div class="modal fade" id="TransportationView" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="width: 47%">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title fsb-1" id="">Write Review</h5>
                    <button type="button btn-close z-index-1" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close" style='opacity:1'></button>
                </div>
                <div class="modal-body">
                    <div class="acommodition-content">
                        <div class="mb-3">
                            <h6 class="user-res-p10 m-0">Cleanliness</h6>
                            {{-- <h6 class="fsb-2 fw-500">Mercedes Vito or Volkswagen
                                                                        Transporter</h6> --}}
                            <div class="m-0">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                            </div>
                        </div>
                        <div class="mb-3">
                            <h6 class="user-res-p10 m-0">Comfort</h6>
                            <div class="m-0">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                            </div>
                            {{-- <h6 class="fsb-2 fw-500">Min 2022 Model</h6> --}}
                        </div>
                        <div class="mb-3">
                            <h6 class="user-res-p10 m-0">Food Quality</h6>
                            <div class="m-0">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                            </div>
                            {{-- <h6 class="fsb-2 fw-500">Economy</h6> --}}

                            {{-- <ul style="padding: 0;list-style: none;"
                                                                        class="mt-2">
                                                                        <li>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="20" height="20"
                                                                                viewBox="0 0 20 20" fill="none">
                                                                                <path
                                                                                    d="M7.49967 15.8334H12.4997V17.5001H7.49967C5.19967 17.5001 3.33301 15.6334 3.33301 13.3334V5.83343H4.99967V13.3334C4.99967 14.7168 6.11634 15.8334 7.49967 15.8334ZM8.68301 4.50843C9.33301 3.85843 9.33301 2.8001 8.68301 2.1501C8.03301 1.5001 6.97467 1.5001 6.32467 2.1501C5.67467 2.8001 5.67467 3.85843 6.32467 4.50843C6.97467 5.16676 8.02467 5.16676 8.68301 4.50843ZM9.58301 7.5001C9.58301 6.58343 8.83301 5.83343 7.91634 5.83343H7.49967C6.58301 5.83343 5.83301 6.58343 5.83301 7.5001V12.5001C5.83301 13.8834 6.94967 15.0001 8.33301 15.0001H12.558L15.4747 17.9168L16.6663 16.7251L12.4413 12.5001H9.58301V7.5001Z"
                                                                                    fill="#111111" />
                                                                            </svg>
                                                                            7+1
                                                                        </li>
                                                                        <li>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="20" height="20"
                                                                                viewBox="0 0 20 20" fill="none">
                                                                                <path
                                                                                    d="M5 1.66675H7.5C7.73333 1.66675 7.94167 1.75841 8.09167 1.90841L9.825 3.65008L10.4917 2.99175C10.8333 2.66675 11.25 2.50008 11.6667 2.50008H16.6667C17.0833 2.50008 17.5 2.66675 17.8417 2.99175L18.675 3.82508C19 4.16675 19.1667 4.58341 19.1667 5.00008V15.8334C19.1667 16.2754 18.9911 16.6994 18.6785 17.0119C18.3659 17.3245 17.942 17.5001 17.5 17.5001H9.16667C8.72464 17.5001 8.30072 17.3245 7.98816 17.0119C7.67559 16.6994 7.5 16.2754 7.5 15.8334V6.66675C7.5 6.25008 7.66667 5.83341 7.99167 5.49175L8.65 4.82508L7.15833 3.33341H5V1.66675ZM11.6667 4.16675V5.83341H16.6667V4.16675H11.6667ZM12.0083 9.16675L10.3417 7.50008H9.16667V8.67508L10.8333 10.3417V12.9917L9.16667 14.6584V15.8334H10.3417L12.0083 14.1667H14.6583L16.325 15.8334H17.5V14.6584L15.8333 12.9917V10.3417L17.5 8.67508V7.50008H16.325L14.6583 9.16675H12.0083ZM12.5 10.8334H14.1667V12.5001H12.5V10.8334Z"
                                                                                    fill="#111111" />
                                                                            </svg>
                                                                            Gasoline
                                                                        </li>
                                                                        <li>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="15" height="15"
                                                                                viewBox="0 0 20 20" fill="none">
                                                                                <path
                                                                                    d="M6.66667 10.8333V14.1667M13.3333 4.16667V4.58333C13.3333 5.02536 13.5089 5.44928 13.8215 5.76184C14.134 6.07441 14.558 6.25 15 6.25C15.442 6.25 15.866 6.42559 16.1785 6.73816C16.4911 7.05072 16.6667 7.47464 16.6667 7.91667V8.33333M2.5 2.5L17.5 17.5M14.1667 10.8333H16.6667C16.8877 10.8333 17.0996 10.9211 17.2559 11.0774C17.4122 11.2337 17.5 11.4457 17.5 11.6667V13.3333C17.5 13.5667 17.4042 13.7775 17.25 13.9283M14.1667 14.1667H3.33333C3.11232 14.1667 2.90036 14.0789 2.74408 13.9226C2.5878 13.7663 2.5 13.5543 2.5 13.3333V11.6667C2.5 11.4457 2.5878 11.2337 2.74408 11.0774C2.90036 10.9211 3.11232 10.8333 3.33333 10.8333H10.8333"
                                                                                    stroke="#111111"
                                                                                    stroke-width="1.66667"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round" />
                                                                            </svg>
                                                                            No Smoking
                                                                        </li>
                                                                        <li>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="15" height="15"
                                                                                viewBox="0 0 16 12" fill="none">
                                                                                <g clip-path="url(#clip0_0_29559)">
                                                                                    <path fill-rule="evenodd"
                                                                                        clip-rule="evenodd"
                                                                                        d="M12.4214 1.95638C11.3285 0.7545 9.75232 0 7.99998 0C6.24763 0 4.67146 0.7545 3.57859 1.95638H12.4213H12.4214ZM3.57865 9.99438C4.67152 11.1962 6.2477 11.9508 8.00004 11.9508C9.75238 11.9508 11.3286 11.1962 12.4214 9.99438H3.57865ZM2.65464 2.46444C1.18908 2.46444 0.000976562 3.65269 0.000976562 5.1185V6.83225C0.000976562 8.298 1.18908 9.48625 2.65464 9.48625H13.3453C14.8109 9.48625 15.999 8.298 15.999 6.83225V5.1185C15.999 3.65269 14.8109 2.46444 13.3453 2.46444H2.65464ZM15.726 5.08819C15.726 3.78988 14.6737 2.73744 13.3756 2.73744H10.7219C9.4238 2.73744 8.37149 3.78988 8.37149 5.08813V6.87012C8.37149 8.16844 7.31919 9.22087 6.0211 9.22087H13.3756C14.6736 9.22087 15.7259 8.16838 15.7259 6.87012V5.08813L15.726 5.08819ZM6.50641 5.24731V7.75731H7.26457V5.24731H6.50641ZM6.43055 4.45494C6.43055 4.5746 6.47808 4.68936 6.56268 4.77398C6.64728 4.85859 6.76203 4.90613 6.88168 4.90613C7.00133 4.90613 7.11607 4.85859 7.20068 4.77398C7.28528 4.68936 7.33281 4.5746 7.33281 4.45494C7.33281 4.33528 7.28528 4.22051 7.20068 4.1359C7.11607 4.05129 7.00133 4.00375 6.88168 4.00375C6.76203 4.00375 6.64728 4.05129 6.56268 4.1359C6.47808 4.22051 6.43055 4.33528 6.43055 4.45494ZM1.3733 4.09481L2.35137 7.75731H2.98067L3.7162 5.22463L4.45161 7.75737H5.10365L6.06659 4.09481H5.33106L4.77007 6.50619L4.07253 4.09481H3.39774L2.70014 6.4455L2.16946 4.09481H1.3733ZM9.57703 4.09481V7.75731H10.3807V6.32419H12.2005V5.58106H10.3807V4.83794H12.3217V4.09481H9.57703ZM12.8676 5.24738V7.75737H13.6258V5.24738H12.8676ZM12.7994 4.44737C12.7994 4.56704 12.8469 4.6818 12.9315 4.76641C13.0161 4.85103 13.1309 4.89856 13.2505 4.89856C13.3702 4.89856 13.4849 4.85103 13.5695 4.76641C13.6541 4.6818 13.7016 4.56704 13.7016 4.44737C13.7016 4.32771 13.6541 4.21295 13.5695 4.12834C13.4849 4.04372 13.3702 3.99619 13.2505 3.99619C13.1309 3.99619 13.0161 4.04372 12.9315 4.12834C12.8469 4.21295 12.7994 4.32771 12.7994 4.44737Z"
                                                                                        fill="black" />
                                                                                </g>
                                                                                <defs>
                                                                                    <clipPath id="clip0_0_29559">
                                                                                        <rect width="16"
                                                                                            height="12"
                                                                                            fill="white" />
                                                                                    </clipPath>
                                                                                </defs>
                                                                            </svg>
                                                                            Wi-Fi
                                                                        </li>
                                                                    </ul> --}}
                        </div>
                        <div class="mb-3">
                            <h6 class="user-res-p10 m-0">Behavior / Professionalism
                            </h6>
                            <div class="m-0">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                            </div>
                        </div>

                        <div class="mb-3">
                            <h6 class="user-res-p10 m-0">Do you recommend this
                                hotel?
                            </h6>
                            <div class=" d-flex gap-2 m-0">
                                <div class="p-0 m-0">
                                    <p class="m-0 p-0">1</p>
                                    <p class="m-0 p-0">
                                        <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}">
                                    </p>
                                </div>
                                <div class="p-0 m-0">
                                    <p class="m-0 p-0">2</p>
                                    <p class="m-0 p-0">
                                        <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}">
                                    </p>
                                </div>
                                <div class="p-0 m-0">
                                    <p class="m-0 p-0">3</p>
                                    <p class="m-0 p-0">
                                        <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}">
                                    </p>
                                </div>
                                <div class="p-0 m-0">
                                    <p class="m-0 p-0">4</p>
                                    <p class="m-0 p-0">
                                        <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}">
                                    </p>
                                </div>
                                <div class="p-0 m-0">
                                    <p class="m-0 p-0">5</p>
                                    <p class="m-0 p-0">
                                        <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}">
                                    </p>
                                </div>
                                <div class="p-0 m-0">
                                    <p class="m-0 p-0">6</p>
                                    <p class="m-0 p-0">
                                        <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}">
                                    </p>
                                </div>
                                <div class="p-0 m-0">
                                    <p class="m-0 p-0">7</p>
                                    <p class="m-0 p-0">
                                        <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}">
                                    </p>
                                </div>
                                <div class="p-0 m-0">
                                    <p class="m-0 p-0">8</p>
                                    <p class="m-0 p-0">
                                        <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}">
                                    </p>
                                </div>
                                <div class="p-0 m-0">
                                    <p class="m-0 p-0">9</p>
                                    <p class="m-0 p-0">
                                        <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}">
                                    </p>
                                </div>
                                <div class="p-0 m-0">
                                    <p class="m-0 p-0">10</p>
                                    <p class="m-0 p-0">
                                        <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}">
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <p class=""><span class="user-res-p10">Extra
                                    Notes</span><span class="user-res-p3">*Optional</span></p>
                            <div class="form-floating" style="width: 312px">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2" class="user-res-p8 ">Please share you feedback
                                    & experience.</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="user-res-btn4" data-bs-toggle="modal" data-bs-target="#hotelcompletedmodel2"
                                data-bs-dismiss="modal">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Hotel Model Box 4 --}}
    <div class="modal fade" id="hotelcompletedmodel2" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="width:48%;">
            <div class="modal-content ">
                <div class="position-relative overflow-hidden" style="height: 15rem">
                    <img src="{{ 'front/assets/img/user/Group 24.png' }}" alt="" class="position-relative"
                        style="top: -15rem;left:-1rem">
                    <button type="button btn-close z-index-1" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close" style='opacity:1'></button>
                </div>
                <div class="model-body text-center">
                    <p class="mt-3">
                        <img src="{{ 'front/assets/img/user/lucide_party-popper.png' }}" alt="" class="">
                    </p>
                    <p class="user-res-p9">You received 5 MD<span style="font-weight: 400;">coin!</span></p>
                    <p class="user-res-p4">go to My Wallet</p>
                    <button class="user-res-btn3 mt-3 mb-5" style="background: #4CDB06">Done</button>
                </div>

            </div>
        </div>
    </div>
    {{-- Vehicle Model Box 1 --}}
    <div class="modal fade" id="exampleModal21" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="width:48%;">
            <div class="modal-content ">
                <div class="position-relative overflow-hidden" style="height: 15rem">
                    <img src="{{ 'front/assets/img/user/Group 20.png' }}" alt="" class="position-relative"
                        style="top: -15rem;left:-1rem">
                    <button type="button btn-close z-index-1" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body m-0">
                    <label for="floatingTextarea2 user-res-p7">Cancellation
                        Detail</label>
                    <div class="form-floating mt-2">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2 user-res-p8">Please write
                            your treatment
                            cancellation request in detail</label>
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label user-res-p7" for="flexCheckDefault">
                            I confirm that I wish cancel my reservation
                        </label>
                    </div>
                    <div class=" text-center mt-3 mb-3">
                        <button class="user-res-btn3" data-bs-toggle="modal" data-bs-target="#exampleModal25"
                            data-bs-dismiss="modal">Submit Cancel
                            Request</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Vehicle Model Box 2 --}}
    <div class="modal fade" id="exampleModal25" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="width: 38rem">
            <div class="modal-content">
                <div class="">
                    <button type="button" class="btn-close" style="left:unset;top:14px;right:14px"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mt-4 mb-4">
                    <div class="d-flex flex-column justify-content-center align-items-center ">
                        <p class="">
                            <img src="{{ 'front/assets/img/user/md-red@.png' }}" alt="" class="">
                        </p>
                        <p class="user-res-p9">We received your <span style="color: #F31D1D">cancellation request</span>
                        </p>
                        <p class="user-res-p7">our customer supports will contact
                            you for your cancellation request soon.</p>
                        <div class=" text-center mt-5 mb-3">
                            <button class="user-res-btn3" data-bs-dismiss="modal">Done</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Vehicle Model Box 3 --}}
    <div class="modal fade" id="UserVehicleView" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="width: 47%">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title fsb-1" id="">Write Review</h5>
                    <button type="button btn-close z-index-1" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close" style='opacity:1'></button>
                </div>
                <div class="modal-body">
                    <div class="acommodition-content">
                        <div class="mb-3">
                            <h6 class="user-res-p10 m-0">Cleanliness</h6>
                            <div class="m-0">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                            </div>
                        </div>
                        <div class="mb-3">
                            <h6 class="user-res-p10 m-0">Comfort</h6>
                            <div class="m-0">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                            </div>
                            {{-- <h6 class="fsb-2 fw-500">Min 2022 Model</h6> --}}
                        </div>
                        <div class="mb-3">
                            <h6 class="user-res-p10 m-0">Food Quality</h6>
                            <div class="m-0">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                            </div>
                        </div>
                        <div class="mb-3">
                            <h6 class="user-res-p10 m-0">Behavior / Professionalism
                            </h6>
                            <div class="m-0">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                                <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="">
                            </div>
                        </div>

                        <div class="mb-3">
                            <h6 class="user-res-p10 m-0">Do you recommend this
                                hotel?
                            </h6>
                            <div class=" d-flex gap-2 m-0">
                                <div class="p-0 m-0">
                                    <p class="m-0 p-0">1</p>
                                    <p class="m-0 p-0">
                                        <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}">
                                    </p>
                                </div>
                                <div class="p-0 m-0">
                                    <p class="m-0 p-0">2</p>
                                    <p class="m-0 p-0">
                                        <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}">
                                    </p>
                                </div>
                                <div class="p-0 m-0">
                                    <p class="m-0 p-0">3</p>
                                    <p class="m-0 p-0">
                                        <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}">
                                    </p>
                                </div>
                                <div class="p-0 m-0">
                                    <p class="m-0 p-0">4</p>
                                    <p class="m-0 p-0">
                                        <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}">
                                    </p>
                                </div>
                                <div class="p-0 m-0">
                                    <p class="m-0 p-0">5</p>
                                    <p class="m-0 p-0">
                                        <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}">
                                    </p>
                                </div>
                                <div class="p-0 m-0">
                                    <p class="m-0 p-0">6</p>
                                    <p class="m-0 p-0">
                                        <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}">
                                    </p>
                                </div>
                                <div class="p-0 m-0">
                                    <p class="m-0 p-0">7</p>
                                    <p class="m-0 p-0">
                                        <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}">
                                    </p>
                                </div>
                                <div class="p-0 m-0">
                                    <p class="m-0 p-0">8</p>
                                    <p class="m-0 p-0">
                                        <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}">
                                    </p>
                                </div>
                                <div class="p-0 m-0">
                                    <p class="m-0 p-0">9</p>
                                    <p class="m-0 p-0">
                                        <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}">
                                    </p>
                                </div>
                                <div class="p-0 m-0">
                                    <p class="m-0 p-0">10</p>
                                    <p class="m-0 p-0">
                                        <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}">
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <p class=""><span class="user-res-p10">Extra
                                    Notes</span><span class="user-res-p3">*Optional</span></p>
                            <div class="form-floating" style="width: 312px">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2" class="user-res-p8 ">Please share you feedback
                                    & experience.</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="user-res-btn4" data-bs-toggle="modal" data-bs-target="#UserVehicleView2"
                                data-bs-dismiss="modal">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Vehicle Model Box 4 --}}
    <div class="modal fade" id="UserVehicleView2" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="width:48%;">
            <div class="modal-content ">
                <div class="position-relative overflow-hidden" style="height: 15rem">
                    <img src="{{ 'front/assets/img/user/Group 24.png' }}" alt="" class="position-relative"
                        style="top: -15rem;left:-1rem">
                    <button type="button btn-close z-index-1" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close" style='opacity:1'></button>
                </div>
                <div class="model-body text-center">
                    <p class="mt-3">
                        <img src="{{ 'front/assets/img/user/lucide_party-popper.png' }}" alt="" class="">
                    </p>
                    <p class="user-res-p9">You received 5 MD<span style="font-weight: 400;">coin!</span></p>
                    <p class="user-res-p4">go to My Wallet</p>
                    <button class="user-res-btn3 mt-3 mb-5" style="background: #4CDB06">Done</button>
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
    <script>
        $(".view-menu-div1").hide();
        $("button").click(function() {
            $(".view-menu-div1").toggle(200);
            $(".fa").toggleClass("fa-chevron-up").fadeIn(200);
            $(".fa").toggleClass("fa-chevron-down");
        });
    </script>
    <script>
        $(".view-menu-div2").hide();
        $("button").click(function() {
            $(".view-menu-div2").toggle(200);
            $(".fa").toggleClass("fa-chevron-up").fadeIn(200);
            $(".fa").toggleClass("fa-chevron-down");
        });
    </script>
@endsection
