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
        
        font-weight: 500;
        line-height: normal;
        letter-spacing: -0.52px;
        border: none
    }

    .user-res-p1 {
        color: #000;
        font-family: Campton;
        font-size: 20px;
        
        font-weight: 600;
        line-height: normal;
        letter-spacing: -0.8px;
    }

    .user-res-p2 {
        color: #000;
        font-family: Campton;
        font-size: 14px;
        
        font-weight: 400;
        line-height: normal;
        /* letter-spacing: -0.56px; */
    }

    .user-res-p3 {
        color: #000;
        font-family: Campton;
        font-size: 14px;
        
        font-weight: 500;
        line-height: normal;
        letter-spacing: -0.56px;
    }

    .user-res-p4 {
        color: #000;
        font-family: Campton;
        font-size: 16px;
        
        font-weight: 600;
        line-height: normal;
        letter-spacing: -0.64px;
    }

    .user-res-p5 {
        color: #000;
        font-family: Campton;
        font-size: 14px;
        
        font-weight: 400;
        line-height: normal;
        letter-spacing: -0.56px;
    }

    .user-res-p6 {
        color: #000;
        font-family: Campton;
        font-size: 12px;
        
        font-weight: 500;
        line-height: normal;
        letter-spacing: -0.48px;
    }

    .user-res-p7 {
        color: #000002;
        font-family: Campton;
        font-size: 16px;
        
        font-weight: 500;
        line-height: normal;
        letter-spacing: -0.64px;
    }

    .user-res-p8 {
        color: #979797;
        font-family: Campton;
        font-size: 16px;
        
        font-weight: 400;
        line-height: normal;
        letter-spacing: -0.64px;
    }

    .user-res-p9 {
        color: #000002;
        text-align: center;
        font-family: Campton;
        font-size: 23px;
        
        font-weight: 700;
        line-height: normal;
        letter-spacing: -0.92px;
    }

    .user-res-p10 {
        color: #000;
        font-family: Campton;
        font-size: 16px;
        
        font-weight: 700;
        line-height: normal;
        letter-spacing: -1.12px;
    }

    .user-res-p11 {
        color: #F31D1D;
        font-family: Campton;
        font-size: 14px;
        
        font-weight: 700;
        line-height: normal;
        letter-spacing: -0.56px;
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

    #UserVehicleView .modal-content,
    #TransportationView .modal-content {
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
                            <button class=" nav-link1 active btn btn-md btn-text" id="patient-details-tab" data-bs-toggle="tab" data-bs-target="#patient-details" type="button" role="tab" aria-controls="patient-details" aria-selected="true">Hotel</button>
                        </li>
                        <li class="nav-item " role="presentation">
                            <button class=" nav-link1 btn btn-md btn-text" id="patient-package-details-tab" data-bs-toggle="tab" data-bs-target="#patient-package-details" type="button" role="tab" aria-controls="patient-package-details" aria-selected="true">
                                Vehicle</button>
                        </li>
                        <li class="  nav-item" role="presentation">
                            <button class="btn btn-md btn-text nav-link1" id="patient-message-tab" data-bs-toggle="tab" data-bs-target="#patient-message" role="tab" aria-controls="patient-message" aria-selected="true">
                                Flight Ticket's</button>
                        </li>
                    </ul>
                    {{-- Tab planes --}}
                    <div class="card">

                        <div class="tab-content" id="myTabContent">
                            {{-- Hotel --}}
                            <div class="tab-pane fade show active" id="patient-details" role="tabpanel" aria-labelledby="patient-details-tab">
                                <div class="tab-div ">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs d-flex justify-content-evenly" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="saleactive-tab" data-bs-toggle="tab" data-bs-target="#saleactive" type="button" role="tab" aria-controls="saleactive" aria-selected="true">Active</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="sale-completed-tab" data-bs-toggle="tab" data-bs-target="#sale-completed" type="button" role="tab" aria-controls="sale-completed" aria-selected="false">Completed</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="sale-cancelled-tab" data-bs-toggle="tab" data-bs-target="#sale-cancelled" type="button" role="tab" aria-controls="sale-cancelled" aria-selected="false">Cancelled</button>
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
                                        <div class="tab-pane fade show active" id="saleactive" role="tabpanel" aria-labelledby="saleactive-tab">
                                            <div class="row mb-5">
                                                <div class="col-8">
                                                    <div class="row">
                                                        <div class="col">
                                                            <img src="{{ 'front/assets/img/user/Rectangle 233.png' }}" alt="">
                                                        </div>
                                                        <div class="col-9 d-flex flex-column justify-content-between">
                                                            {{-- <div class="d-flex flex-column justify-content-between"> --}}
                                                            <div class="d-flex align-items-center gap-2 m-0">
                                                                <h6 class="m-0 user-res-p1">Renaissence Instanbul</h6>
                                                                <span>
                                                                    <img src="{{ 'front/assets/img/mdBookings/bi_star-fill.png' }}" alt="">
                                                                </span>
                                                                <p class="m-0 user-res-p2">4 Stars Hotel</p>
                                                            </div>
                                                            <div class="d-flex gap-2 m-0 user-res-p3">
                                                                <span>
                                                                    <img src="{{ 'front/assets/img/mdFoods/mdi_location.png' }}" alt="">
                                                                </span>
                                                                <p class="m-0">Besiktas / Instanbul</p>
                                                                <p class="m-0">
                                                                    <span>
                                                                        <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="">
                                                                    </span>
                                                                    <span>12 Dec 2023 - 19 Dec 2023</span>
                                                                </p>
                                                            </div>
                                                            <div class="m-0">
                                                                <button class=" user-reservation-btn1 menu-detail-btn">Book
                                                                    Details</button>
                                                            </div>
                                                            {{-- </div> --}}
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col d-flex flex-column justify-content-end align-items-end">
                                                    {{-- <div class=" d-flex flex-column justify-content-end"> --}}
                                                    <p class="m-0"><span class="user-res-p4">Reviews</span><span class="user-res-p2">(29)</span></p>
                                                    <div class="">
                                                        <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt="">
                                                        <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt="">
                                                        <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt="">
                                                        <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt="">
                                                        <img src="{{ 'front/assets/img/mdFoods/bi_star-fill (1).png' }}" alt="">
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
                                                                            <img src="{{ 'front/assets/img/user/Vector (1).png' }}" alt="">
                                                                        </span>
                                                                        <span class="">Television</span>
                                                                    </p>
                                                                    <p class="">
                                                                        <span class="">
                                                                            <img src="{{ 'front/assets/img/user/tabler_disabled.png' }}" alt="">
                                                                        </span>
                                                                        <span class="">Suitable for whellchair
                                                                            use</span>
                                                                    </p>
                                                                    <p class="">
                                                                        <span class="">
                                                                            <img src="{{ 'front/assets/img/user/material-symbols_cable.png' }}" alt="">
                                                                        </span>
                                                                        <span class="">Cable TV service</span>
                                                                    </p>
                                                                    <p class="">
                                                                        <span class="">
                                                                            <img src="{{ 'front/assets/img/user/mdi_refrigerator-bottom.png' }}" alt="">
                                                                        </span>
                                                                        <span class="">Minibar</span>
                                                                    </p>
                                                                    <p class="">
                                                                        <span class="">
                                                                            <img src="{{ 'front/assets/img/user/game-icons_vacuum-cleaner (1).png' }}" alt="">
                                                                        </span>
                                                                        <span class="">Daily Hosekeeping</span>
                                                                    </p>
                                                                </div>
                                                                <div class="user-res-p6">
                                                                    <p class="">
                                                                        <span class="">
                                                                            <img src="{{ 'front/assets/img/user/fluent_food-16-filled.png' }}" alt="">
                                                                        </span>
                                                                        <span class="">Breakfast & Dinner</span>
                                                                    </p>
                                                                    <p class="">
                                                                        <span class="">
                                                                            <img src="{{ 'front/assets/img/user/map_spa (1).png' }}" alt="">
                                                                        </span>
                                                                        <span class="">Sauna & Spa</span>
                                                                    </p>
                                                                    <p class="">
                                                                        <span class="">
                                                                            <img src="{{ 'front/assets/img/user/tabler_smoking-no.png' }}" alt="">
                                                                        </span>
                                                                        <span class="">No Smoking</span>
                                                                    </p>
                                                                    <p class="">
                                                                        <span class="">
                                                                            <img src="{{ 'front/assets/img/user/logos_wifi.png' }}" alt="">
                                                                        </span>
                                                                        <span class="">Wi-Fi</span>
                                                                    </p>
                                                                    <p class="">
                                                                        <span class="">
                                                                            <img src="{{ 'front/assets/img/user/ion_fitness-outline.png' }}" alt="">
                                                                        </span>
                                                                        <span class="">Fitness Center</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-end">
                                                            <button class="user-res-btn2" data-bs-toggle="modal" data-bs-target="#exampleModal12">Cancellation
                                                                Request</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="sale-completed" role="tabpanel" aria-labelledby="sale-completed-tab">
                                            <div class="row mb-5">
                                                <div class="col-8">
                                                    <div class="row">
                                                        <div class="col">
                                                            <img src="{{ 'front/assets/img/user/Rectangle 233.png' }}" alt="">
                                                        </div>
                                                        <div class="col-9 d-flex flex-column">
                                                            {{-- <div class="d-flex flex-column justify-content-between"> --}}
                                                            <div class="d-flex align-items-center gap-2 m-0">
                                                                <h6 class="m-0 user-res-p1">Renaissence Instanbul</h6>
                                                                <span>
                                                                    <img src="{{ 'front/assets/img/mdBookings/bi_star-fill.png' }}" alt="">
                                                                </span>
                                                                <p class="m-0 user-res-p2">4 Stars Hotel</p>
                                                            </div>
                                                            <div class="d-flex gap-2 m-0 user-res-p2">
                                                                <span>
                                                                    <img src="{{ 'front/assets/img/mdFoods/mdi_location.png' }}" alt="">
                                                                </span>
                                                                <p class="m-0">Besiktas / Instanbul</p>
                                                                <p class="m-0">
                                                                    <span>
                                                                        <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="">
                                                                    </span>
                                                                    <span>12 Dec 2023 - 19 Dec 2023</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col d-flex flex-column justify-content-end align-items-end">
                                                    <button class="user-reservation-btn2" data-bs-toggle="modal" data-bs-target="#TransportationView" data-bs-dismiss="modal">Write Review</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="sale-cancelled" role="tabpanel" aria-labelledby="sale-cancelled-tab">
                                            <div class="row mb-5">
                                                <div class="col-8">
                                                    <div class="row">
                                                        <div class="col">
                                                            <img src="{{ 'front/assets/img/user/Rectangle 233.png' }}" alt="">
                                                        </div>
                                                        <div class="col-9 d-flex flex-column justify-content-between">
                                                            <div class="">
                                                                <div class="d-flex align-items-center gap-2 m-0">
                                                                    <h6 class="m-0 user-res-p1">Renaissence Instanbul
                                                                    </h6>
                                                                    <span>
                                                                        <img src="{{ 'front/assets/img/mdBookings/bi_star-fill.png' }}" alt="">
                                                                    </span>
                                                                    <p class="m-0 user-res-p2">4 Stars Hotel</p>
                                                                </div>
                                                                <div class="d-flex gap-2 m-0 user-res-p2">
                                                                    <span>
                                                                        <img src="{{ 'front/assets/img/mdFoods/mdi_location.png' }}" alt="">
                                                                    </span>
                                                                    <p class="m-0">Besiktas / Instanbul</p>
                                                                    <p class="m-0">
                                                                        <span>
                                                                            <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="">
                                                                        </span>
                                                                        {{-- <span>12 Dec 2023 - 19 Dec 2023</span> --}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <p class="user-res-p3">
                                                                <span class="">Status:</span>&nbsp;&nbsp;
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

                            {{-- Vehicle --}}
                            <div class="tab-pane fade" id="patient-package-details" role="tabpanel" aria-labelledby="patient-package-details-tab">
                                <div class="tab-div ">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs d-flex justify-content-evenly" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="saleactive-tab1" data-bs-toggle="tab" data-bs-target="#saleactive1" type="button" role="tab" aria-controls="saleactive1" aria-selected="true">Active</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="sale-completed-tab2" data-bs-toggle="tab" data-bs-target="#sale-completed2" type="button" role="tab" aria-controls="sale-completed2" aria-selected="false">Completed</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="sale-cancelled-tab3" data-bs-toggle="tab" data-bs-target="#sale-cancelled3" type="button" role="tab" aria-controls="sale-cancelled3" aria-selected="false">Cancelled</button>
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
                                        <div class="tab-pane fade show active" id="saleactive1" role="tabpanel" aria-labelledby="saleactive-tab1">
                                            <div class="row mb-5">
                                                <div class="col-8">
                                                    <div class="row">
                                                        <div class="col">
                                                            <img src="{{ 'front/assets/img/user/image 39.png' }}" alt="">
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
                                                                    <img src="{{ 'front/assets/img/mdFoods/mdi_location.png' }}" alt="">
                                                                </span>
                                                                <p class="m-0">Besiktas / Instanbul</p>
                                                                <p class="m-0">
                                                                    <span>
                                                                        <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="">
                                                                    </span>
                                                                    <span>12 Dec 2023 - 19 Dec 2023</span>
                                                                </p>
                                                            </div>
                                                            <div class="m-0">
                                                                <button class=" user-reservation-btn1 menu-detail-btn2">Reservation
                                                                    Details</button>
                                                            </div>
                                                            {{-- </div> --}}
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col d-flex flex-column justify-content-end align-items-end">
                                                    {{-- <div class=" d-flex flex-column justify-content-end"> --}}
                                                    <p class="m-0"><span class="user-res-p4">Reviews</span><span class="user-res-p2">(29)</span></p>
                                                    <div class="">
                                                        <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt="">
                                                        <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt="">
                                                        <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt="">
                                                        <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt="">
                                                        <img src="{{ 'front/assets/img/mdFoods/bi_star-fill (1).png' }}" alt="">
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
                                                                            <img src="{{ 'front/assets/img/mdBookings/seat.png' }}" alt="">
                                                                        </span>
                                                                        <span class="">7+1</span>
                                                                    </p>

                                                                    <p class="">
                                                                        <span class="">
                                                                            <img src="{{ 'front/assets/img/mdBookings/petrol.png' }}" alt="">
                                                                        </span>
                                                                        <span class="">Gasoline</span>
                                                                    </p>
                                                                    <p class="">
                                                                        <span class="">
                                                                            <img src="{{ 'front/assets/img/user/tabler_smoking-no.png' }}" alt="">
                                                                        </span>
                                                                        <span class="">No Smoking</span>
                                                                    </p>
                                                                    <p class="">
                                                                        <span class="">
                                                                            <img src="{{ 'front/assets/img/user/logos_wifi.png' }}" alt="">
                                                                        </span>
                                                                        <span class="">Wi-Fi</span>
                                                                    </p>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="text-end">
                                                            <button class="user-res-btn2" data-bs-toggle="modal" data-bs-target="#exampleModal21">Cancellation
                                                                Request</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="sale-completed2" role="tabpanel" aria-labelledby="sale-completed-tab2">
                                            <div class="row mb-5">
                                                <div class="col-9">
                                                    <div class="row">
                                                        <div class="col">
                                                            <img src="{{ 'front/assets/img/user/image 39.png' }}" alt="">
                                                        </div>
                                                        <div class="col-8 d-flex flex-column">
                                                            {{-- <div class="d-flex flex-column justify-content-between"> --}}
                                                            <div class="d-flex align-items-center gap-2 m-0">
                                                                <h6 class="m-0 user-res-p1">Garenta Rental</h6>
                                                            </div>
                                                            <div class="d-flex gap-2 m-0 user-res-p2">
                                                                <span>
                                                                    <img src="{{ 'front/assets/img/mdFoods/image 39.png' }}" alt="">
                                                                </span>
                                                                <p class="m-0">Besiktas / Instanbul</p>
                                                                <p class="m-0">
                                                                    <span>
                                                                        <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="">
                                                                    </span>
                                                                    <span>12 Dec 2023 - 19 Dec 2023</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-3 d-flex flex-column justify-content-end align-items-end">
                                                    <button class="user-reservation-btn2" data-bs-toggle="modal" data-bs-target="#UserVehicleView">Write Review</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="sale-cancelled3" role="tabpanel" aria-labelledby="sale-cancelled-tab3">
                                            <div class="row mb-5">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col">
                                                            <img src="{{ 'front/assets/img/user/image 39.png' }}" alt="">
                                                        </div>
                                                        <div class="col-8 d-flex flex-column justify-content-between">
                                                            <div class="">
                                                                <div class="d-flex align-items-center gap-2 m-0">
                                                                    <h6 class="m-0 user-res-p1">Garenta Rental
                                                                    </h6>
                                                                </div>
                                                                <div class="d-flex gap-2 m-0 user-res-p2">
                                                                    <span>
                                                                        <img src="{{ 'front/assets/img/mdFoods/mdi_location.png' }}" alt="">
                                                                    </span>
                                                                    <p class="m-0">Besiktas / Instanbul</p>
                                                                    <p class="m-0">
                                                                        <span>
                                                                            <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="">
                                                                        </span>
                                                                        <span>12 Dec 2023 - 19 Dec 2023</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <p class="user-res-p3">
                                                                <span class="">Status:</span>&nbsp;&nbsp;
                                                                <span class="" style="color: #F31D1D">Cancelled</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Flight --}}
                            <div class="tab-pane fade" id="patient-message" role="tabpanel" aria-labelledby="patient-message-tab">
                                <div class="tab-div ">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs d-flex justify-content-evenly" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="saleactive-tab" data-bs-toggle="tab" data-bs-target="#userflight1" type="button" role="tab" aria-controls="userflight1" aria-selected="true">Active</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="sale-userflight-tab2" data-bs-toggle="tab" data-bs-target="#userflight2" type="button" role="tab" aria-controls="userflight2" aria-selected="false">Completed</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="sale-userflight-tab3" data-bs-toggle="tab" data-bs-target="#userflight33" type="button" role="tab" aria-controls="userflight33" aria-selected="false">Cancelled</button>
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
                                        <div class="tab-pane fade show active" id="userflight1" role="tabpanel" aria-labelledby="saleactive-tab1">
                                            <div class="row mb-5">
                                                <div class="col-8">
                                                    <div class="row">
                                                        <div class="col text-center">
                                                            {{-- <img src="{{ 'front/assets/img/user/image 39.png' }}"
                                                            alt=""> --}}
                                                            <p class="user-res-p6 m-0" style="font-weight: 400">
                                                                Stockholm Airport</p>
                                                            <p class="m-0 user-res-p1">ARN</p>
                                                            <p class="m-0">
                                                                <img src="{{ 'front/assets/img/mdBookings/Group 5.png' }}" alt="">
                                                            </p>
                                                            <p class="m-0 user-res-p1">IST</p>
                                                            <p class="m-0 user-res-p6" style="font-weight: 400">
                                                                Istanbul Airport</p>
                                                        </div>
                                                        <div class="col-8 d-flex flex-column justify-content-between">
                                                            {{-- <div class="d-flex flex-column justify-content-between"> --}}
                                                            <div class="d-flex flex-column align-items-start gap-2 m-0 ">
                                                                {{-- <h6 class="m-0 user-res-p1">Garenta Rental</h6> --}}
                                                                <p class="user-res-p1">
                                                                    <span class="">
                                                                        <img src="{{ 'front/assets/img/mdBookings/fligthTo.png' }}" alt="">
                                                                    </span>
                                                                    <span class="">Stockholm </span>
                                                                    <span class="" style="color: #4CDB06">to
                                                                    </span>
                                                                    <span>Istanbul</span>
                                                                </p>
                                                                <p class="user-res-p5">
                                                                    <span>
                                                                        <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="">
                                                                    </span>
                                                                    <span class="m-0">12 Dec 2023 - 16:30</span>
                                                                </p>
                                                            </div>

                                                            <div class="m-0">
                                                                <button class=" user-reservation-btn1 menu-detail-btn2">Ticket
                                                                    Details</button>
                                                            </div>
                                                            {{-- </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col d-flex flex-column align-items-end">
                                                    <p class="m-0">
                                                        <img src="{{ 'front/assets/img/mdBookings/airlinesLogo.png' }}" alt="">
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <div class="view-menu-div2 mt-4">
                                                        <div class="d-flex gap-5 mb-4">
                                                            <div class="">
                                                                <p class="m-0 user-res-p4" style="color: #4CDB06">PNR
                                                                    No</p>
                                                                <p class="m-0 user-res-p9">TK38473</p>
                                                            </div>
                                                            <div class="">
                                                                <p class="m-0 user-res-p4" style="color: #4CDB06">Seat
                                                                </p>
                                                                <p class="m-0 user-res-p9">9 F</p>
                                                            </div>
                                                            <div class="">
                                                                <p class="m-0 user-res-p4" style="color: #4CDB06">
                                                                    Ticket Price</p>
                                                                <p class="m-0 user-res-p9">2.100,00 ₺</p>
                                                            </div>
                                                        </div>
                                                        <p class="user-res-p4 m-0 " style="color: #4CDB06">Flight Info
                                                        </p>
                                                        <div class="d-flex gap-2 m-0">
                                                            <p class="user-res-p5"><span style="color: #4CDB06">Departure Time: </span> 12
                                                                December 2023 - 16:30</p>
                                                            <p class="user-res-p5"><span style="color: #F31D1D">Departure Airport: </span>
                                                                Stockholm Airport (ARN)</p>
                                                        </div>
                                                        <div class="">
                                                            <p class="m-0 user-res-p4" style="color: #4CDB06">Airport
                                                                Address</p>
                                                            <p class="user-res-p7">190 45 Stockholm-Arlanda, Sweden</p>
                                                        </div>
                                                        {{-- <p class=""> --}}
                                                        <img src="{{ 'front/assets/img/user/Group 26.png' }}" alt="" style="width: 100%">
                                                        {{-- </p> --}}
                                                        <div class="text-end mt-4">
                                                            <button class="user-res-btn2" data-bs-toggle="modal" data-bs-target="#FlightModelBox1">Cancellation
                                                                Request</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="userflight2" role="tabpanel" aria-labelledby="sale-userflight-tab2">
                                            <div class="row mb-4">
                                                {{-- <div class="col"> --}}
                                                {{-- <div class="row"> --}}
                                                <div class="col text-center">
                                                    {{-- <img src="{{ 'front/assets/img/user/image 39.png' }}"
                                                    alt=""> --}}
                                                    <p class="user-res-p6 m-0" style="font-weight: 400">
                                                        Stockholm Airport</p>
                                                    <p class="m-0 user-res-p1">ARN</p>
                                                    <p class="m-0">
                                                        <img src="{{ 'front/assets/img/mdBookings/Group 5.png' }}" alt="">
                                                    </p>
                                                    <p class="m-0 user-res-p1">IST</p>
                                                    <p class="m-0 user-res-p6" style="font-weight: 400">
                                                        Istanbul Airport</p>
                                                </div>
                                                <div class="col-6 d-flex flex-column justify-content-between">
                                                    {{-- <div class="d-flex flex-column justify-content-between"> --}}
                                                    <div class="d-flex flex-column align-items-start gap-2 m-0 ">
                                                        {{-- <h6 class="m-0 user-res-p1">Garenta Rental</h6> --}}
                                                        <p class="user-res-p1">
                                                            <span class="">
                                                                <img src="{{ 'front/assets/img/mdBookings/fligthTo.png' }}" alt="">
                                                            </span>
                                                            <span class="">Stockholm </span>
                                                            <span class="" style="color: #4CDB06">to
                                                            </span>
                                                            <span>Istanbul</span>
                                                        </p>
                                                        <p class="user-res-p5">
                                                            <span>
                                                                <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="">
                                                            </span>
                                                            <span class="m-0">12 Dec 2023 - 16:30</span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col d-flex flex-column justify-content-between align-items-end">
                                                    <p class="m-0 text-end">
                                                        <img src="{{ 'front/assets/img/mdBookings/airlinesLogo.png' }}" alt="">
                                                    </p>
                                                    <div class="">
                                                        <button class="user-reservation-btn2" data-bs-toggle="modal" data-bs-target="#UserFlightView">Write Review</button>
                                                    </div>
                                                </div>
                                                {{-- </div> --}}
                                                {{-- </div> --}}

                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="userflight33" role="tabpanel" aria-labelledby="sale-userflight-tab3">
                                            <div class="row mb-4">
                                                <div class="col text-center">
                                                    <p class="user-res-p6 m-0" style="font-weight: 400">
                                                        Stockholm Airport</p>
                                                    <p class="m-0 user-res-p1">ARN</p>
                                                    <p class="m-0">
                                                        <img src="{{ 'front/assets/img/mdBookings/Group 5.png' }}" alt="">
                                                    </p>
                                                    <p class="m-0 user-res-p1">IST</p>
                                                    <p class="m-0 user-res-p6" style="font-weight: 400">
                                                        Istanbul Airport</p>
                                                </div>
                                                <div class="col-9 d-flex flex-column justify-content-between">
                                                    {{-- <div class="d-flex flex-column justify-content-between"> --}}
                                                    <div class="d-flex flex-column align-items-start m-0 ">
                                                        {{-- <h6 class="m-0 user-res-p1">Garenta Rental</h6> --}}
                                                        <p class="user-res-p1 m-0 mb-2">
                                                            <span class="">
                                                                <img src="{{ 'front/assets/img/mdBookings/fligthTo.png' }}" alt="">
                                                            </span>
                                                            <span class="">Stockholm </span>
                                                            <span class="" style="color: #4CDB06">to
                                                            </span>
                                                            <span>Istanbul</span>
                                                        </p>
                                                        <p class="user-res-p5 m-0">
                                                            <span>
                                                                <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="">
                                                            </span>
                                                            <span class="m-0">12 Dec 2023 - 16:30</span>
                                                        </p>
                                                    </div>
                                                    <p class=""><span class="user-res-p3">Status:&nbsp;&nbsp;</span><span class="user-res-p11">Cancelled</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="patient-message" role="tabpanel" aria-labelledby="patient-message-tab">
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
                    <img src="{{ 'front/assets/img/user/Group 20.png' }}" alt="" class="position-relative" style="top: -15rem;left:-1rem">
                    <button type="button btn-close z-index-1" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <button class="user-res-btn3" data-bs-toggle="modal" data-bs-target="#exampleModalkd" data-bs-dismiss="modal">Submit Cancel
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
                    <button type="button" class="btn-close" style="left:unset;top:14px;right:14px" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mt-4 mb-4">
                    <div class="d-flex flex-column justify-content-center align-items-center ">
                        <p class="">
                            <img src="{{ 'front/assets/img/user/md-red@.png' }}" alt="" class="">
                        </p>
                        <p class="user-res-p9">We received your <span style="color: #F31D1D">cancellation
                                request</span>
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
    <div class="modal fade" id="TransportationView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="width: 47%">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title fsb-1" id="">Write Review</h5>
                    <button type="button btn-close z-index-1" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style='opacity:1'></button>
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
                            <button class="user-res-btn4" data-bs-toggle="modal" data-bs-target="#hotelcompletedmodel2" data-bs-dismiss="modal">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Hotel Model Box 4 --}}
    <div class="modal fade" id="hotelcompletedmodel2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="width:48%;">
            <div class="modal-content ">
                <div class="position-relative overflow-hidden" style="height: 15rem">
                    <img src="{{ 'front/assets/img/user/Group 24.png' }}" alt="" class="position-relative" style="top: -15rem;left:-1rem">
                    <button type="button btn-close z-index-1" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style='opacity:1'></button>
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
                    <img src="{{ 'front/assets/img/user/Group 20.png' }}" alt="" class="position-relative" style="top: -15rem;left:-1rem">
                    <button type="button btn-close z-index-1" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <button class="user-res-btn3" data-bs-toggle="modal" data-bs-target="#exampleModal25" data-bs-dismiss="modal">Submit Cancel
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
                    <button type="button" class="btn-close" style="left:unset;top:14px;right:14px" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mt-4 mb-4">
                    <div class="d-flex flex-column justify-content-center align-items-center ">
                        <p class="">
                            <img src="{{ 'front/assets/img/user/md-red@.png' }}" alt="" class="">
                        </p>
                        <p class="user-res-p9">We received your <span style="color: #F31D1D">cancellation
                                request</span>
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
    <div class="modal fade" id="UserVehicleView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="width: 47%">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title fsb-1" id="">Write Review</h5>
                    <button type="button btn-close z-index-1" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style='opacity:1'></button>
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
                            <button class="user-res-btn4" data-bs-toggle="modal" data-bs-target="#UserVehicleView2" data-bs-dismiss="modal">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Vehicle Model Box 4 --}}
    <div class="modal fade" id="UserVehicleView2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="width:48%;">
            <div class="modal-content ">
                <div class="position-relative overflow-hidden" style="height: 15rem">
                    <img src="{{ 'front/assets/img/user/Group 24.png' }}" alt="" class="position-relative" style="top: -15rem;left:-1rem">
                    <button type="button btn-close z-index-1" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style='opacity:1'></button>
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
    {{-- Flight Model Box 1 --}}
    <div class="modal fade" id="FlightModelBox1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="width:48%;">
            <div class="modal-content ">
                <div class="position-relative overflow-hidden" style="height: 15rem">
                    <img src="{{ 'front/assets/img/user/Group 20.png' }}" alt="" class="position-relative" style="top: -15rem;left:-1rem">
                    <button type="button btn-close z-index-1" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="opacity: 1"></button>
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
                        <button class="user-res-btn3" data-bs-toggle="modal" data-bs-target="#UserFlightView2" data-bs-dismiss="modal">Submit Cancel
                            Request</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Flight Model Box 2 --}}
    <div class="modal fade" id="UserFlightView2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="width: 38rem">
            <div class="modal-content">
                <div class="">
                    <button type="button" class="btn-close" style="left:unset;top:14px;right:14px" data-bs-dismiss="modal" aria-label="Close" style="opacity: 1"></button>
                </div>
                <div class="modal-body mt-4 mb-4">
                    <div class="d-flex flex-column justify-content-center align-items-center ">
                        <p class="">
                            <img src="{{ 'front/assets/img/user/md-red@.png' }}" alt="" class="">
                        </p>
                        <p class="user-res-p9">We received your <span style="color: #F31D1D">cancellation
                                request</span>
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
    {{-- Flight Model Box 3 --}}
    <div class="modal fade" id="UserFlightView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="width: 47%">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title fsb-1" id="">Write Review</h5>
                    <button type="button btn-close z-index-1" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style='opacity:1'></button>
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
                            <button class="user-res-btn4" data-bs-toggle="modal" data-bs-target="#UserFlight2View2" data-bs-dismiss="modal">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Flight Model Box 4 --}}
    <div class="modal fade" id="UserFlight2View2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="width:48%;">
            <div class="modal-content ">
                <div class="position-relative overflow-hidden" style="height: 15rem">
                    <img src="{{ 'front/assets/img/user/Group 24.png' }}" alt="" class="position-relative" style="top: -15rem;left:-1rem">
                    <button type="button btn-close z-index-1" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style='opacity:1'></button>
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
</div>

<!-- Change Patient Information -->
@endsection
@section('script')
<script>
    $(".upReservationsLi").addClass("activeClass");
    $(".upReservations").addClass("md-active");
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