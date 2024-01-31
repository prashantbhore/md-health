@extends('front.layout.layout2') @section('content')
<style>
    .treatment-dashboard-tab .btn-md {
        width: unset;
        height: unset;
    }

    .treatment-dashboard-tab .btn-md {
        width: unset;
        height: unset;
    }

    #floatingTextarea2 {
        width: 312px;
        height: 120px;
        flex-shrink: 0;
        border-radius: 5px;
        border: 2px solid #d6d6d6;
    }

    .user-reservation-btn1 {
        width: 190px;
        height: 35px;
        flex-shrink: 0;
        border-radius: 5px;
        background: #000;
        border: none;
        color: #fff;
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
        background: #f3771d;
        border: none;
        opacity: 1;
        color: #fff;
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
        background: #f31d1d;
        border: none;
        color: #fff;
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
        background: #f31d1d;
        height: 57px;
        flex-shrink: 0;
        color: #fff;
        font-family: Campton;
        font-size: 16px;

        font-weight: 500;
        line-height: normal;
        letter-spacing: -1.12px;
        border: none;
    }

    .user-res-btn4 {
        width: 312px;
        height: 36px;
        flex-shrink: 0;
        border-radius: 5px;
        background: #4cdb06;
        color: #000;
        font-family: Campton;
        font-size: 13px;

        font-weight: 500;
        line-height: normal;
        letter-spacing: -0.52px;
        border: none;
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
        color: #f31d1d;
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
        border-radius: 50%;
    }

    body {
        background-color: #f6f6f6;
        background: #f6f6f6;
    }
</style>
<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="d-flex gap-3">
            <div class="w-292">
                @include('front.includes.sidebar-user')
            </div>
            <div class="w-761">
                <div class="card">
                    <h5 class="card-header mb-3 pb-2">
                        Reservations
                        <a href="{{ url('my-packages-list') }}" class="fw-800 d-flex align-items-center gap-1 text-decoration-none text-black float-end m-auto">
                            <img src="{{ 'front/assets/img/user/Group 18.png' }}" alt="" />
                        </a>
                    </h5>
                </div>

                <div class="treatment-dashboard-tab">
                    <!-- RESERVATION TABS -->
                    <ul class="nav nav-tabs reservations-nav df-between py-4 border-bottom-0" id="myTab" role="tablist">
                        <!-- HOTEL -->
                        <li class="nav-item" role="presentation">
                            <button class="btn bookButton text-black active" id="patient-details-tab" data-bs-toggle="tab" data-bs-target="#patient-details" type="button" role="tab" aria-controls="patient-details" aria-selected="true">Hotel</button>
                        </li>
                        <!-- VEHICLE -->
                        <li class="nav-item" role="presentation">
                            <button class="btn bookButton text-black" id="patient-package-details-tab" data-bs-toggle="tab" data-bs-target="#patient-package-details" type="button" role="tab" aria-controls="patient-package-details" aria-selected="true">Vehicle</button>
                        </li>
                        <!-- FLIGHT TICKET -->
                        <li class="nav-item" role="presentation">
                            <button class="btn bookButton text-black" id="patient-message-tab" data-bs-toggle="tab" data-bs-target="#patient-message" role="tab" aria-controls="patient-message" aria-selected="true">Flight Ticket's</button>
                        </li>
                    </ul>
                    <!-- END -->

                    <!-- RESERVATIONS TAB CONTENT -->
                    <div class="card reservations-box">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <!-- HOTEL RESERVATIONS -->
                                <div class="tab-pane fade show active" id="patient-details" role="tabpanel" aria-labelledby="patient-details-tab">
                                    <div class="tab-div">
                                        <!-- HOTEL NAV TABS -->
                                        <ul class="nav nav-tabs d-flex gap-5" id="myTab" role="tablist">
                                            <!-- ACTIVE -->
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="saleactive-tab" data-bs-toggle="tab" data-bs-target="#saleactive" type="button" role="tab" aria-controls="saleactive" aria-selected="true">Active</button>
                                            </li>
                                            <!-- COMPLETED -->
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="sale-completed-tab" data-bs-toggle="tab" data-bs-target="#sale-completed" type="button" role="tab" aria-controls="sale-completed" aria-selected="false">
                                                    Completed
                                                </button>
                                            </li>
                                            <!-- CANCELLED -->
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="sale-cancelled-tab" data-bs-toggle="tab" data-bs-target="#sale-cancelled" type="button" role="tab" aria-controls="sale-cancelled" aria-selected="false">
                                                    Cancelled
                                                </button>
                                            </li>
                                        </ul>
                                        <!-- END -->

                                        <!-- HOTEL FILTERS -->
                                        <div class="container filter-div">
                                            <!-- SEARCH -->
                                            <div class="search-div">
                                                <input type="text" placeholder="Search" />
                                            </div>
                                            <!-- SORT BY -->
                                            <div class="list-div">
                                                <select name="" id="">
                                                    <option value="">List for Date</option>
                                                    <option value="">List for Stars</option>
                                                    <option value="">List for Price</option>
                                                    <option value="">List for Distance</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- FILTERS END -->

                                        <!-- HOTEL TAB CONTENT -->
                                        <div class="container tab-content" id="myTabContent">
                                            <!-- ACTIVE HOTEL RESERVATIONS -->
                                            <div class="tab-pane fade show active" id="saleactive" role="tabpanel" aria-labelledby="saleactive-tab">
                                                <div class="card shadow-none mb-4 pkgCard">
                                                    <div class="card-body d-flex gap-3 w-100 p-4">
                                                        <!-- Hotel Image -->
                                                        <div class="df-center">
                                                            <img src="{{ asset('front/assets/img/user/Rectangle_233.png') }}" alt="" />
                                                        </div>
                                                        <!-- End -->

                                                        <div class="df-column">
                                                            <h6 class="card-h1 d-flex align-items-center gap-3">
                                                                <span>Renaissence Instanbul</span>
                                                                <p class="card-p1 mb-0 df-start gap-1"><img src="{{ 'front/assets/img/mdBookings/bi_star-fill.png' }}" alt="" /> <span>4 Stars Hotel</span></p>
                                                            </h6>

                                                            <div class="d-flex align-items-center gap-3 mb-3">
                                                                <p class="card-p1 mb-0 d-flex align-items-center gap-1">
                                                                    <span class="mdi mdi-map-marker"></span> Besiktas / Instanbul
                                                                </p>
                                                                <p class="card-p1 mb-0 d-flex align-items-center gap-1">
                                                                    <!-- <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="" /> -->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                                        <g clip-path="url(#clip0_270_3302)">
                                                                            <path d="M3.9711 0C4.10106 0 4.22569 0.0516249 4.31758 0.143518C4.40948 0.23541 4.4611 0.360044 4.4611 0.49V1.4063H9.723V0.4963C9.723 0.366344 9.77462 0.24171 9.86652 0.149818C9.95841 0.0579249 10.083 0.0063 10.213 0.0063C10.343 0.0063 10.4676 0.0579249 10.5595 0.149818C10.6514 0.24171 10.703 0.366344 10.703 0.4963V1.4063H12.6C12.9712 1.4063 13.3272 1.5537 13.5897 1.8161C13.8522 2.0785 13.9998 2.43442 14 2.8056V12.6007C13.9998 12.9719 13.8522 13.3278 13.5897 13.5902C13.3272 13.8526 12.9712 14 12.6 14H1.4C1.02882 14 0.672829 13.8526 0.410298 13.5902C0.147767 13.3278 0.000185591 12.9719 0 12.6007L0 2.8056C0.000185591 2.43442 0.147767 2.0785 0.410298 1.8161C0.672829 1.5537 1.02882 1.4063 1.4 1.4063H3.4811V0.4893C3.48129 0.359465 3.53299 0.235012 3.62487 0.14327C3.71674 0.0515286 3.84126 -1.32484e-07 3.9711 0ZM0.98 5.4194V12.6007C0.98 12.6559 0.990864 12.7105 1.01197 12.7614C1.03308 12.8124 1.06401 12.8587 1.10302 12.8977C1.14202 12.9367 1.18832 12.9676 1.23927 12.9887C1.29023 13.0098 1.34484 13.0207 1.4 13.0207H12.6C12.6552 13.0207 12.7098 13.0098 12.7607 12.9887C12.8117 12.9676 12.858 12.9367 12.897 12.8977C12.936 12.8587 12.9669 12.8124 12.988 12.7614C13.0091 12.7105 13.02 12.6559 13.02 12.6007V5.4292L0.98 5.4194ZM4.6669 10.2333V11.3995H3.5V10.2333H4.6669ZM7.5831 10.2333V11.3995H6.4169V10.2333H7.5831ZM10.5 10.2333V11.3995H9.3331V10.2333H10.5ZM4.6669 7.4494V8.6156H3.5V7.4494H4.6669ZM7.5831 7.4494V8.6156H6.4169V7.4494H7.5831ZM10.5 7.4494V8.6156H9.3331V7.4494H10.5ZM3.4811 2.3856H1.4C1.34484 2.3856 1.29023 2.39646 1.23927 2.41757C1.18832 2.43868 1.14202 2.46961 1.10302 2.50862C1.06401 2.54762 1.03308 2.59392 1.01197 2.64487C0.990864 2.69583 0.98 2.75044 0.98 2.8056V4.4401L13.02 4.4499V2.8056C13.02 2.75044 13.0091 2.69583 12.988 2.64487C12.9669 2.59392 12.936 2.54762 12.897 2.50862C12.858 2.46961 12.8117 2.43868 12.7607 2.41757C12.7098 2.39646 12.6552 2.3856 12.6 2.3856H10.703V3.0359C10.703 3.16586 10.6514 3.29049 10.5595 3.38238C10.4676 3.47428 10.343 3.5259 10.213 3.5259C10.083 3.5259 9.95841 3.47428 9.86652 3.38238C9.77462 3.29049 9.723 3.16586 9.723 3.0359V2.3856H4.4611V3.0296C4.4611 3.15956 4.40948 3.28419 4.31758 3.37608C4.22569 3.46798 4.10106 3.5196 3.9711 3.5196C3.84114 3.5196 3.71651 3.46798 3.62462 3.37608C3.53272 3.28419 3.4811 3.15956 3.4811 3.0296V2.3856Z" fill="#111111" />
                                                                        </g>
                                                                        <defs>
                                                                            <clipPath id="clip0_270_3302">
                                                                                <rect width="14" height="14" fill="white" />
                                                                            </clipPath>
                                                                        </defs>
                                                                    </svg>
                                                                    12 Dec 2023 - 19 Dec 2023
                                                                </p>
                                                            </div>

                                                            <div>
                                                                <button class="user-reservation-btn1 menu-detail-btn">Book Details</button>
                                                            </div>
                                                        </div>
                                                        <div class="ms-auto mt-auto">
                                                            <p class="mb-1 text-end"><span class="user-res-p4">Reviews</span><span class="user-res-p2"> (29)</span></p>
                                                            <div class="reviewsStar">
                                                                <span class="fa fa-star filled"></span>
                                                                <span class="fa fa-star filled"></span>
                                                                <span class="fa fa-star filled"></span>
                                                                <span class="fa fa-star filled"></span>
                                                                <span class="fa fa-star"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END -->

                                                <!-- HOTEL RESERVATION DETAILS -->
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <div class="view-menu-div1 mt-4">
                                                            <p class="card-h1 text-green mb-3">Hotel Full Address</p>
                                                            <p class="card-p1 mb-4">
                                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim Besiktas / Istanbul
                                                            </p>

                                                            <div class="row mb-3">
                                                                <div class="col">
                                                                    <p class="card-h1 text-green mb-3">Hotel Enter Date</p>
                                                                    <p class="card-h3 mb-0 text-green">Enter Date: <span class="card-p1 text-black">12 December 2023 /14:00</span></p>
                                                                    <p class="card-h3 text-red">Exit Date: <span class="card-p1 text-black">19 December 2023 /14:00</span></p>
                                                                </div>
                                                                <div class="col card-h1">
                                                                    <p class="mb-2 card-h1 text-green">Total Price</p>
                                                                    <p class="">1,500.00 <span class="lira">₺</span></p>
                                                                </div>
                                                            </div>
                                                            <!-- ROOM DETAILS -->
                                                            <div class="">
                                                                <p class="card-h1 text-green">Room Details</p>
                                                                <div class="d-flex gap-5">
                                                                    <div class="user-res-p6">
                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/user/Vector (1).png' }}" alt="" />
                                                                            </span>
                                                                            <span class="">Television</span>
                                                                        </p>
                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/user/tabler_disabled.png' }}" alt="" />
                                                                            </span>
                                                                            <span class="">Suitable for whellchair use</span>
                                                                        </p>
                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/user/material-symbols_cable.png' }}" alt="" />
                                                                            </span>
                                                                            <span class="">Cable TV service</span>
                                                                        </p>
                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/user/mdi_refrigerator-bottom.png' }}" alt="" />
                                                                            </span>
                                                                            <span class="">Minibar</span>
                                                                        </p>
                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/user/game-icons_vacuum-cleaner (1).png' }}" alt="" />
                                                                            </span>
                                                                            <span class="">Daily Hosekeeping</span>
                                                                        </p>
                                                                    </div>
                                                                    <div class="user-res-p6">
                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/user/fluent_food-16-filled.png' }}" alt="" />
                                                                            </span>
                                                                            <span class="">Breakfast & Dinner</span>
                                                                        </p>
                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/user/map_spa (1).png' }}" alt="" />
                                                                            </span>
                                                                            <span class="">Sauna & Spa</span>
                                                                        </p>
                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/user/tabler_smoking-no.png' }}" alt="" />
                                                                            </span>
                                                                            <span class="">No Smoking</span>
                                                                        </p>
                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/user/logos_wifi.png' }}" alt="" />
                                                                            </span>
                                                                            <span class="">Wi-Fi</span>
                                                                        </p>
                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/user/ion_fitness-outline.png' }}" alt="" />
                                                                            </span>
                                                                            <span class="">Fitness Center</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-end">
                                                                <button class="user-res-btn2 camptonBook" data-bs-toggle="modal" data-bs-target="#cancelRequest">Cancellation Request</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END -->
                                            </div>

                                            <!-- COMPLETED HOTEL RESERVATIONS -->
                                            <div class="tab-pane fade" id="sale-completed" role="tabpanel" aria-labelledby="sale-completed-tab">
                                                <div class="card shadow-none mb-4 pkgCard">
                                                    <div class="card-body d-flex gap-3 w-100 p-4 position-relative">
                                                        <!-- Hotel Image -->
                                                        <div class="df-center">
                                                            <img src="{{ 'front/assets/img/user/Rectangle_233.png' }}" alt="" />
                                                        </div>

                                                        <div class="df-column">
                                                            <h6 class="card-h1 d-flex align-items-center gap-3">
                                                                <span>Renaissence Instanbul</span>
                                                                <p class="card-p1 mb-0 df-start gap-1"><img src="{{ 'front/assets/img/mdBookings/bi_star-fill.png' }}" alt="" /> <span>4 Stars Hotel</span></p>
                                                            </h6>

                                                            <div class="d-flex align-items-center gap-3 mb-3">
                                                                <p class="card-p1 mb-0 d-flex align-items-center gap-1">
                                                                    <span class="mdi mdi-map-marker"></span> Besiktas / Instanbul
                                                                </p>
                                                                <p class="card-p1 mb-0 d-flex align-items-center gap-1">
                                                                    <!-- <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="" /> -->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                                        <g clip-path="url(#clip0_270_3302)">
                                                                            <path d="M3.9711 0C4.10106 0 4.22569 0.0516249 4.31758 0.143518C4.40948 0.23541 4.4611 0.360044 4.4611 0.49V1.4063H9.723V0.4963C9.723 0.366344 9.77462 0.24171 9.86652 0.149818C9.95841 0.0579249 10.083 0.0063 10.213 0.0063C10.343 0.0063 10.4676 0.0579249 10.5595 0.149818C10.6514 0.24171 10.703 0.366344 10.703 0.4963V1.4063H12.6C12.9712 1.4063 13.3272 1.5537 13.5897 1.8161C13.8522 2.0785 13.9998 2.43442 14 2.8056V12.6007C13.9998 12.9719 13.8522 13.3278 13.5897 13.5902C13.3272 13.8526 12.9712 14 12.6 14H1.4C1.02882 14 0.672829 13.8526 0.410298 13.5902C0.147767 13.3278 0.000185591 12.9719 0 12.6007L0 2.8056C0.000185591 2.43442 0.147767 2.0785 0.410298 1.8161C0.672829 1.5537 1.02882 1.4063 1.4 1.4063H3.4811V0.4893C3.48129 0.359465 3.53299 0.235012 3.62487 0.14327C3.71674 0.0515286 3.84126 -1.32484e-07 3.9711 0ZM0.98 5.4194V12.6007C0.98 12.6559 0.990864 12.7105 1.01197 12.7614C1.03308 12.8124 1.06401 12.8587 1.10302 12.8977C1.14202 12.9367 1.18832 12.9676 1.23927 12.9887C1.29023 13.0098 1.34484 13.0207 1.4 13.0207H12.6C12.6552 13.0207 12.7098 13.0098 12.7607 12.9887C12.8117 12.9676 12.858 12.9367 12.897 12.8977C12.936 12.8587 12.9669 12.8124 12.988 12.7614C13.0091 12.7105 13.02 12.6559 13.02 12.6007V5.4292L0.98 5.4194ZM4.6669 10.2333V11.3995H3.5V10.2333H4.6669ZM7.5831 10.2333V11.3995H6.4169V10.2333H7.5831ZM10.5 10.2333V11.3995H9.3331V10.2333H10.5ZM4.6669 7.4494V8.6156H3.5V7.4494H4.6669ZM7.5831 7.4494V8.6156H6.4169V7.4494H7.5831ZM10.5 7.4494V8.6156H9.3331V7.4494H10.5ZM3.4811 2.3856H1.4C1.34484 2.3856 1.29023 2.39646 1.23927 2.41757C1.18832 2.43868 1.14202 2.46961 1.10302 2.50862C1.06401 2.54762 1.03308 2.59392 1.01197 2.64487C0.990864 2.69583 0.98 2.75044 0.98 2.8056V4.4401L13.02 4.4499V2.8056C13.02 2.75044 13.0091 2.69583 12.988 2.64487C12.9669 2.59392 12.936 2.54762 12.897 2.50862C12.858 2.46961 12.8117 2.43868 12.7607 2.41757C12.7098 2.39646 12.6552 2.3856 12.6 2.3856H10.703V3.0359C10.703 3.16586 10.6514 3.29049 10.5595 3.38238C10.4676 3.47428 10.343 3.5259 10.213 3.5259C10.083 3.5259 9.95841 3.47428 9.86652 3.38238C9.77462 3.29049 9.723 3.16586 9.723 3.0359V2.3856H4.4611V3.0296C4.4611 3.15956 4.40948 3.28419 4.31758 3.37608C4.22569 3.46798 4.10106 3.5196 3.9711 3.5196C3.84114 3.5196 3.71651 3.46798 3.62462 3.37608C3.53272 3.28419 3.4811 3.15956 3.4811 3.0296V2.3856Z" fill="#111111" />
                                                                        </g>
                                                                        <defs>
                                                                            <clipPath id="clip0_270_3302">
                                                                                <rect width="14" height="14" fill="white" />
                                                                            </clipPath>
                                                                        </defs>
                                                                    </svg>
                                                                    12 Dec 2023 - 19 Dec 2023
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="ms-auto mt-auto pbs-16">
                                                            <button class="user-reservation-btn2" data-bs-toggle="modal" data-bs-target="#ReviewModal" data-bs-dismiss="modal">Write Review</button>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <!-- END -->

                                            <!-- CANCELLED HOTEL RESERVATIONS -->
                                            <div class="tab-pane fade" id="sale-cancelled" role="tabpanel" aria-labelledby="sale-cancelled-tab">
                                                <div class="card shadow-none mb-4 pkgCard">
                                                    <div class="card-body d-flex gap-3 w-100 p-4">
                                                        <!-- Hotel Image -->
                                                        <div class="df-center">
                                                            <img src="{{ asset('front/assets/img/user/Rectangle_233.png') }}" alt="" />
                                                        </div>
                                                        <!-- End -->

                                                        <div class="df-column position-relative">
                                                            <h6 class="card-h1 d-flex align-items-center gap-3">
                                                                <span>Renaissence Instanbul</span>
                                                                <p class="card-p1 mb-0 df-start gap-1"><img src="{{ 'front/assets/img/mdBookings/bi_star-fill.png' }}" alt="" /> <span>4 Stars Hotel</span></p>
                                                            </h6>

                                                            <div class="d-flex align-items-center gap-3 mb-3">
                                                                <p class="card-p1 mb-0 d-flex align-items-center gap-1">
                                                                    <span class="mdi mdi-map-marker"></span> Besiktas / Instanbul
                                                                </p>
                                                                <p class="card-p1 mb-0 d-flex align-items-center gap-1">
                                                                    <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="" />
                                                                    12 Dec 2023 - 19 Dec 2023
                                                                </p>
                                                            </div>

                                                            <div class="mt-auto position-absolute bottom-0">
                                                                <div class="card-h3">Status: <span class="text-red">Cancelled</span></div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END -->
                                        </div>
                                    </div>
                                </div>
                                <!-- HOTEL RESERVATIONS END -->


                                <!-- VEHICLE RESERVATIONS -->
                                <div class="tab-pane fade" id="patient-package-details" role="tabpanel" aria-labelledby="patient-package-details-tab">
                                    <div class="tab-div">
                                        <!-- VEHICLE NAV TABS -->
                                        <ul class="nav nav-tabs d-flex justify-content-evenly" id="myTab" role="tablist">
                                            <!-- ACTIVE  -->
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="saleactive-tab1" data-bs-toggle="tab" data-bs-target="#saleactive1" type="button" role="tab" aria-controls="saleactive1" aria-selected="true">Active</button>
                                            </li>
                                            <!-- COMPLETED -->
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="sale-completed-tab2" data-bs-toggle="tab" data-bs-target="#sale-completed2" type="button" role="tab" aria-controls="sale-completed2" aria-selected="false">Completed</button>
                                            </li>
                                            <!-- CANCELLED -->
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="sale-cancelled-tab3" data-bs-toggle="tab" data-bs-target="#sale-cancelled3" type="button" role="tab" aria-controls="sale-cancelled3" aria-selected="false">Cancelled</button>
                                            </li>
                                        </ul>
                                        <!-- END -->

                                        <!-- VEHCILE FILTERS -->
                                        <div class="container filter-div">
                                            <!-- SEARCH -->
                                            <div class="search-div">
                                                <input type="text" placeholder="Search" />
                                            </div>
                                            <!-- SORT BY -->
                                            <div class="list-div">
                                                <select name="" id="">
                                                    <option value="">List for Date</option>
                                                    <option value="">List for Stars</option>
                                                    <option value="">List for Price</option>
                                                    <option value="">List for Distance</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- FILTERS END -->

                                        <!-- VEHICLE TAB CONTENT -->
                                        <div class="container tab-content" id="myTabContent">
                                            <!-- ACTIVE VEHICLE RESERVATIONS -->
                                            <div class="tab-pane fade show active" id="saleactive1" role="tabpanel" aria-labelledby="saleactive-tab1">
                                                <div class="card shadow-none mb-4 pkgCard">
                                                    <div class="card-body d-flex gap-3 w-100 p-4">
                                                        <!-- Hotel Image -->
                                                        <div class="df-center">
                                                            <img src="{{ asset('front/assets/img/user/image_39.png') }}" alt="" />
                                                        </div>
                                                        <!-- End -->

                                                        <div class="df-column">
                                                            <h6 class="card-h1 d-flex align-items-center gap-3">
                                                                <span>Garenta Rental</span>
                                                                <p class="card-p1 mb-0 df-start gap-1"><img src="{{ 'front/assets/img/mdBookings/bi_star-fill.png' }}" alt="" /> <span>4 Stars Hotel</span></p>
                                                            </h6>

                                                            <div class="d-flex align-items-center gap-3 mb-3">
                                                                <p class="card-p1 mb-0 d-flex align-items-center gap-1">
                                                                    <span class="mdi mdi-map-marker"></span> Besiktas / Instanbul
                                                                </p>
                                                                <p class="card-p1 mb-0 d-flex align-items-center gap-1">
                                                                    <!-- <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="" /> -->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                                        <g clip-path="url(#clip0_270_3302)">
                                                                            <path d="M3.9711 0C4.10106 0 4.22569 0.0516249 4.31758 0.143518C4.40948 0.23541 4.4611 0.360044 4.4611 0.49V1.4063H9.723V0.4963C9.723 0.366344 9.77462 0.24171 9.86652 0.149818C9.95841 0.0579249 10.083 0.0063 10.213 0.0063C10.343 0.0063 10.4676 0.0579249 10.5595 0.149818C10.6514 0.24171 10.703 0.366344 10.703 0.4963V1.4063H12.6C12.9712 1.4063 13.3272 1.5537 13.5897 1.8161C13.8522 2.0785 13.9998 2.43442 14 2.8056V12.6007C13.9998 12.9719 13.8522 13.3278 13.5897 13.5902C13.3272 13.8526 12.9712 14 12.6 14H1.4C1.02882 14 0.672829 13.8526 0.410298 13.5902C0.147767 13.3278 0.000185591 12.9719 0 12.6007L0 2.8056C0.000185591 2.43442 0.147767 2.0785 0.410298 1.8161C0.672829 1.5537 1.02882 1.4063 1.4 1.4063H3.4811V0.4893C3.48129 0.359465 3.53299 0.235012 3.62487 0.14327C3.71674 0.0515286 3.84126 -1.32484e-07 3.9711 0ZM0.98 5.4194V12.6007C0.98 12.6559 0.990864 12.7105 1.01197 12.7614C1.03308 12.8124 1.06401 12.8587 1.10302 12.8977C1.14202 12.9367 1.18832 12.9676 1.23927 12.9887C1.29023 13.0098 1.34484 13.0207 1.4 13.0207H12.6C12.6552 13.0207 12.7098 13.0098 12.7607 12.9887C12.8117 12.9676 12.858 12.9367 12.897 12.8977C12.936 12.8587 12.9669 12.8124 12.988 12.7614C13.0091 12.7105 13.02 12.6559 13.02 12.6007V5.4292L0.98 5.4194ZM4.6669 10.2333V11.3995H3.5V10.2333H4.6669ZM7.5831 10.2333V11.3995H6.4169V10.2333H7.5831ZM10.5 10.2333V11.3995H9.3331V10.2333H10.5ZM4.6669 7.4494V8.6156H3.5V7.4494H4.6669ZM7.5831 7.4494V8.6156H6.4169V7.4494H7.5831ZM10.5 7.4494V8.6156H9.3331V7.4494H10.5ZM3.4811 2.3856H1.4C1.34484 2.3856 1.29023 2.39646 1.23927 2.41757C1.18832 2.43868 1.14202 2.46961 1.10302 2.50862C1.06401 2.54762 1.03308 2.59392 1.01197 2.64487C0.990864 2.69583 0.98 2.75044 0.98 2.8056V4.4401L13.02 4.4499V2.8056C13.02 2.75044 13.0091 2.69583 12.988 2.64487C12.9669 2.59392 12.936 2.54762 12.897 2.50862C12.858 2.46961 12.8117 2.43868 12.7607 2.41757C12.7098 2.39646 12.6552 2.3856 12.6 2.3856H10.703V3.0359C10.703 3.16586 10.6514 3.29049 10.5595 3.38238C10.4676 3.47428 10.343 3.5259 10.213 3.5259C10.083 3.5259 9.95841 3.47428 9.86652 3.38238C9.77462 3.29049 9.723 3.16586 9.723 3.0359V2.3856H4.4611V3.0296C4.4611 3.15956 4.40948 3.28419 4.31758 3.37608C4.22569 3.46798 4.10106 3.5196 3.9711 3.5196C3.84114 3.5196 3.71651 3.46798 3.62462 3.37608C3.53272 3.28419 3.4811 3.15956 3.4811 3.0296V2.3856Z" fill="#111111" />
                                                                        </g>
                                                                        <defs>
                                                                            <clipPath id="clip0_270_3302">
                                                                                <rect width="14" height="14" fill="white" />
                                                                            </clipPath>
                                                                        </defs>
                                                                    </svg>
                                                                    12 Dec 2023 - 19 Dec 2023
                                                                </p>
                                                            </div>

                                                            <div>
                                                                <!-- <button class="user-reservation-btn1 menu-detail-btn">Book Details</button> -->
                                                                <button class="user-reservation-btn1 menu-detail-btn2">Reservation Details</button>
                                                            </div>
                                                        </div>
                                                        <div class="ms-auto mt-auto">
                                                            <p class="mb-1 text-end"><span class="user-res-p4">Reviews</span><span class="user-res-p2"> (29)</span></p>
                                                            <div class="reviewsStar">
                                                                <span class="fa fa-star filled"></span>
                                                                <span class="fa fa-star filled"></span>
                                                                <span class="fa fa-star filled"></span>
                                                                <span class="fa fa-star filled"></span>
                                                                <span class="fa fa-star"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- VEHICLE RESERVATION DETAILS -->
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <div class="view-menu-div1 mt-4">
                                                            <p class="card-h1 text-green mb-3">Acent Full Address</p>
                                                            <p class="card-p1 mb-4">
                                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim Besiktas / Istanbul
                                                            </p>

                                                            <div class="row mb-3">
                                                                <div class="col">
                                                                    <p class="card-h1 text-green mb-3">Vehicle Delivery Date</p>
                                                                    <p class="card-h3 mb-0 text-green">Pick-Up Date: <span class="card-p1 text-black">12 December 2023 /14:00</span></p>
                                                                    <p class="card-h3 text-red">Return Date: <span class="card-p1 text-black">19 December 2023 /14:00</span></p>
                                                                </div>
                                                                <div class="col card-h1">
                                                                    <p class="mb-2 card-h1 text-green">Total Price</p>
                                                                    <p class="">1,500.00 <span class="lira">₺</span></p>
                                                                </div>
                                                            </div>
                                                            <!-- DETAILS -->
                                                            <div class="">
                                                                <p class="card-h1 text-green">Vehicle Details</p>
                                                                <div class="d-flex gap-5">
                                                                    <div class="user-res-p6">
                                                                        <p class="">
                                                                            Economy
                                                                        </p>
                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/mdBookings/seat.png' }}" alt="" />
                                                                            </span>
                                                                            <span class="">7+1</span>
                                                                        </p>

                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/mdBookings/petrol.png' }}" alt="" />
                                                                            </span>
                                                                            <span class="">Gasoline</span>
                                                                        </p>
                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/user/tabler_smoking-no.png' }}" alt="" />
                                                                            </span>
                                                                            <span class="">No Smoking</span>
                                                                        </p>
                                                                        <p class="">
                                                                            <span class="">
                                                                                <img src="{{ 'front/assets/img/user/logos_wifi.png' }}" alt="" />
                                                                            </span>
                                                                            <span class="">Wi-Fi</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-end">
                                                                <button class="user-res-btn2 camptonBook" data-bs-toggle="modal" data-bs-target="#cancelRequest">Cancellation Request</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END -->

                                            <!-- COMPLETED VEHICLE RESERVATIONS -->
                                            <div class="tab-pane fade" id="sale-completed2" role="tabpanel" aria-labelledby="sale-completed-tab2">
                                                <div class="card shadow-none mb-4 pkgCard">
                                                    <div class="card-body d-flex gap-3 w-100 p-4 position-relative">
                                                        <!-- Hotel Image -->
                                                        <div class="df-center">
                                                            <img src="{{ asset('front/assets/img/user/image_39.png') }}" alt="" />
                                                        </div>
                                                        <!-- End -->

                                                        <div class="df-column">
                                                            <h6 class="card-h1 d-flex align-items-center gap-3">
                                                                <span>Garenta Rental</span>
                                                                <p class="card-p1 mb-0 df-start gap-1"><img src="{{ 'front/assets/img/mdBookings/bi_star-fill.png' }}" alt="" /> <span>4 Stars Hotel</span></p>
                                                            </h6>

                                                            <div class="d-flex align-items-center gap-3 mb-3">
                                                                <p class="card-p1 mb-0 d-flex align-items-center gap-1">
                                                                    <span class="mdi mdi-map-marker"></span> Besiktas / Instanbul
                                                                </p>
                                                                <p class="card-p1 mb-0 d-flex align-items-center gap-1">
                                                                    <!-- <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="" /> -->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                                        <g clip-path="url(#clip0_270_3302)">
                                                                            <path d="M3.9711 0C4.10106 0 4.22569 0.0516249 4.31758 0.143518C4.40948 0.23541 4.4611 0.360044 4.4611 0.49V1.4063H9.723V0.4963C9.723 0.366344 9.77462 0.24171 9.86652 0.149818C9.95841 0.0579249 10.083 0.0063 10.213 0.0063C10.343 0.0063 10.4676 0.0579249 10.5595 0.149818C10.6514 0.24171 10.703 0.366344 10.703 0.4963V1.4063H12.6C12.9712 1.4063 13.3272 1.5537 13.5897 1.8161C13.8522 2.0785 13.9998 2.43442 14 2.8056V12.6007C13.9998 12.9719 13.8522 13.3278 13.5897 13.5902C13.3272 13.8526 12.9712 14 12.6 14H1.4C1.02882 14 0.672829 13.8526 0.410298 13.5902C0.147767 13.3278 0.000185591 12.9719 0 12.6007L0 2.8056C0.000185591 2.43442 0.147767 2.0785 0.410298 1.8161C0.672829 1.5537 1.02882 1.4063 1.4 1.4063H3.4811V0.4893C3.48129 0.359465 3.53299 0.235012 3.62487 0.14327C3.71674 0.0515286 3.84126 -1.32484e-07 3.9711 0ZM0.98 5.4194V12.6007C0.98 12.6559 0.990864 12.7105 1.01197 12.7614C1.03308 12.8124 1.06401 12.8587 1.10302 12.8977C1.14202 12.9367 1.18832 12.9676 1.23927 12.9887C1.29023 13.0098 1.34484 13.0207 1.4 13.0207H12.6C12.6552 13.0207 12.7098 13.0098 12.7607 12.9887C12.8117 12.9676 12.858 12.9367 12.897 12.8977C12.936 12.8587 12.9669 12.8124 12.988 12.7614C13.0091 12.7105 13.02 12.6559 13.02 12.6007V5.4292L0.98 5.4194ZM4.6669 10.2333V11.3995H3.5V10.2333H4.6669ZM7.5831 10.2333V11.3995H6.4169V10.2333H7.5831ZM10.5 10.2333V11.3995H9.3331V10.2333H10.5ZM4.6669 7.4494V8.6156H3.5V7.4494H4.6669ZM7.5831 7.4494V8.6156H6.4169V7.4494H7.5831ZM10.5 7.4494V8.6156H9.3331V7.4494H10.5ZM3.4811 2.3856H1.4C1.34484 2.3856 1.29023 2.39646 1.23927 2.41757C1.18832 2.43868 1.14202 2.46961 1.10302 2.50862C1.06401 2.54762 1.03308 2.59392 1.01197 2.64487C0.990864 2.69583 0.98 2.75044 0.98 2.8056V4.4401L13.02 4.4499V2.8056C13.02 2.75044 13.0091 2.69583 12.988 2.64487C12.9669 2.59392 12.936 2.54762 12.897 2.50862C12.858 2.46961 12.8117 2.43868 12.7607 2.41757C12.7098 2.39646 12.6552 2.3856 12.6 2.3856H10.703V3.0359C10.703 3.16586 10.6514 3.29049 10.5595 3.38238C10.4676 3.47428 10.343 3.5259 10.213 3.5259C10.083 3.5259 9.95841 3.47428 9.86652 3.38238C9.77462 3.29049 9.723 3.16586 9.723 3.0359V2.3856H4.4611V3.0296C4.4611 3.15956 4.40948 3.28419 4.31758 3.37608C4.22569 3.46798 4.10106 3.5196 3.9711 3.5196C3.84114 3.5196 3.71651 3.46798 3.62462 3.37608C3.53272 3.28419 3.4811 3.15956 3.4811 3.0296V2.3856Z" fill="#111111" />
                                                                        </g>
                                                                        <defs>
                                                                            <clipPath id="clip0_270_3302">
                                                                                <rect width="14" height="14" fill="white" />
                                                                            </clipPath>
                                                                        </defs>
                                                                    </svg>
                                                                    12 Dec 2023 - 19 Dec 2023
                                                                </p>
                                                            </div>

                                                            <div>
                                                                <!-- <button class="user-reservation-btn1 menu-detail-btn">Book Details</button> -->
                                                            </div>
                                                        </div>
                                                        <div class="ms-auto mt-auto pbs-16">
                                                            <!-- <button class="user-reservation-btn2" data-bs-toggle="modal" data-bs-target="#UserVehicleView">Write Review</button> -->
                                                            <button class="user-reservation-btn2" data-bs-toggle="modal" data-bs-target="#ReviewModalVehicle">Write Review</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- END -->

                                            <!-- CANCELLED VEHCILE RESERVATIONS -->
                                            <div class="tab-pane fade" id="sale-cancelled3" role="tabpanel" aria-labelledby="sale-cancelled-tab3">
                                                <div class="card shadow-none mb-4 pkgCard">
                                                    <div class="card-body d-flex gap-3 w-100 p-4">
                                                        <!-- Hotel Image -->
                                                        <div class="df-center">
                                                            <img src="{{ asset('front/assets/img/user/image_39.png') }}" alt="" />
                                                        </div>
                                                        <!-- End -->

                                                        <div class="df-column position-relative">
                                                            <h6 class="card-h1 d-flex align-items-center gap-3">
                                                                <span>Garenta Rental</span>
                                                                <p class="card-p1 mb-0 df-start gap-1"><img src="{{ 'front/assets/img/mdBookings/bi_star-fill.png' }}" alt="" /> <span>4 Stars Hotel</span></p>
                                                            </h6>

                                                            <div class="d-flex align-items-center gap-3 mb-3">
                                                                <p class="card-p1 mb-0 d-flex align-items-center gap-1">
                                                                    <span class="mdi mdi-map-marker"></span> Besiktas / Instanbul
                                                                </p>
                                                                <p class="card-p1 mb-0 d-flex align-items-center gap-1">
                                                                    <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="" />
                                                                    12 Dec 2023 - 19 Dec 2023
                                                                </p>
                                                            </div>

                                                            <div class="mt-auto position-absolute bottom-0">
                                                                <div class="card-h3">Status: <span class="text-red">Cancelled</span></div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END -->
                                        </div>
                                    </div>
                                </div>
                                <!-- VEHICLE RESERVATIONS END -->


                                <!-- FLIGHT RESERVATIONS -->
                                <div class="tab-pane fade" id="patient-message" role="tabpanel" aria-labelledby="patient-message-tab">
                                    <div class="tab-div">
                                        <!-- FLIGHT NAV TABS -->
                                        <ul class="nav nav-tabs d-flex justify-content-evenly" id="myTab" role="tablist">
                                            <!-- ACTIVE -->
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="saleactive-tab" data-bs-toggle="tab" data-bs-target="#userflight1" type="button" role="tab" aria-controls="userflight1" aria-selected="true">Active</button>
                                            </li>
                                            <!-- COMPLETED -->
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="sale-userflight-tab2" data-bs-toggle="tab" data-bs-target="#userflight2" type="button" role="tab" aria-controls="userflight2" aria-selected="false">Completed</button>
                                            </li>
                                            <!-- CANCELLED -->
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="sale-userflight-tab3" data-bs-toggle="tab" data-bs-target="#userflight33" type="button" role="tab" aria-controls="userflight33" aria-selected="false">Cancelled</button>
                                            </li>
                                        </ul>
                                        <!-- END -->

                                        <!-- FLIGHT FILTERS -->
                                        <div class="container filter-div">
                                            <!-- SEARCH FLIGHTS -->
                                            <div class="search-div">
                                                <input type="text" placeholder="Search" />
                                            </div>
                                            <!-- SORT BY -->
                                            <div class="list-div">
                                                <select name="" id="">
                                                    <option value="">List for Date</option>
                                                    <option value="">List for Stars</option>
                                                    <option value="">List for Price</option>
                                                    <option value="">List for Distance</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- FITLERS END -->

                                        <!-- FLIGHTS TAB CONTENT -->
                                        <div class="container tab-content" id="myTabContent">
                                            <!-- ACTIVE FLIGHTS -->
                                            <div class="tab-pane fade show active" id="userflight1" role="tabpanel" aria-labelledby="saleactive-tab1">
                                                <div class="card shadow-none mb-4 pkgCard">
                                                    <div class="card-body d-flex gap-3 w-100 p-3">
                                                        <!-- Flex Item 1 -->
                                                        <div class="text-center">
                                                            <p class="user-res-p6 m-0" style="font-weight: 400;">
                                                                Stockholm Airport
                                                            </p>
                                                            <p class="m-0 user-res-p1">ARN</p>
                                                            <p class="m-0">
                                                                <img src="{{ 'front/assets/img/mdBookings/Group 5.png' }}" alt="" />
                                                            </p>
                                                            <p class="m-0 user-res-p1">IST</p>
                                                            <p class="m-0 user-res-p6" style="font-weight: 400;">
                                                                Istanbul Airport
                                                            </p>
                                                        </div>
                                                        <!-- Flex Item 2 -->
                                                        <div class="d-flex flex-column justify-content-between ms-5">
                                                            <p class="user-res-p1 ">
                                                                <span class="">
                                                                    <img src="{{ 'front/assets/img/mdBookings/fligthTo.png' }}" alt="" />
                                                                </span>
                                                                <span class="">Stockholm </span>
                                                                <span class="" style="color: #4cdb06;">to </span>
                                                                <span>Istanbul</span>
                                                            </p>
                                                            <p class="user-res-p5">
                                                                <span>
                                                                    <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="" />
                                                                </span>
                                                                <span class="m-0">12 Dec 2023 - 16:30</span>
                                                            </p>
                                                            <div class="">
                                                                <button class="user-reservation-btn1 menu-detail-btn2">Ticket Details</button>
                                                            </div>
                                                        </div>
                                                        <!-- Flex Item 3 -->
                                                        <div class="ms-auto">
                                                            <img src="{{ 'front/assets/img/mdBookings/airlinesLogo.png' }}" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- DETAILS -->
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <div class="view-menu-div2 mt-4">
                                                            <div class="d-flex mb-4" style="gap: 4rem;">
                                                                <div class="">
                                                                    <p class="m-0 user-res-p4" style="color: #4cdb06;">PNR No</p>
                                                                    <p class="m-0 user-res-p9">TK38473</p>
                                                                </div>
                                                                <div class="">
                                                                    <p class="m-0 user-res-p4" style="color: #4cdb06;">Seat</p>
                                                                    <p class="m-0 user-res-p9">9 F</p>
                                                                </div>
                                                                <div class="">
                                                                    <p class="m-0 user-res-p4" style="color: #4cdb06;">
                                                                        Ticket Price
                                                                    </p>
                                                                    <p class="m-0 user-res-p9">2.100,00 <span class="lira">₺</span></p>
                                                                </div>
                                                            </div>
                                                            <p class="user-res-p4 mb-3" style="color: #4cdb06;">Flight Info</p>
                                                            <div class="d-flex gap-4 m-0">
                                                                <p class="user-res-p5"><span style="color: #4cdb06;">Departure Time: </span> 12 December 2023 - 16:30</p>
                                                                <p class="user-res-p5"><span style="color: #f31d1d;">Departure Airport: </span> Stockholm Airport (ARN)</p>
                                                            </div>
                                                            <div class="mb-4">
                                                                <p class="m-0 user-res-p4" style="color: #4cdb06;">Airport Address</p>
                                                                <p class="user-res-p7">190 45 Stockholm-Arlanda, Sweden</p>
                                                            </div>
                                                            {{--
                                                                <p class="">
                                                                    --}}
                                                            <img src="{{ 'front/assets/img/user/Group 26.png' }}" alt="" style="width: 100%;" />
                                                            {{--
                                                                </p>
                                                                --}}
                                                            <div class="text-end mt-4">
                                                                <button class="user-res-btn2" data-bs-toggle="modal" data-bs-target="#cancelRequest">Cancellation Request</button>
                                                                <!-- <button class="user-res-btn2" data-bs-toggle="modal" data-bs-target="#FlightModelBox1">Cancellation Request</button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ACTIVE FLIGHTS END -->

                                            <!-- COMPLETED FLIGHTS -->
                                            <div class="tab-pane fade" id="userflight2" role="tabpanel" aria-labelledby="sale-userflight-tab2">
                                                <div class="card shadow-none mb-4 pkgCard">
                                                    <div class="card-body d-flex gap-3 w-100 p-3">
                                                        <!-- Flex Item 1 -->
                                                        <div class="text-center">
                                                            <p class="user-res-p6 m-0" style="font-weight: 400;">
                                                                Stockholm Airport
                                                            </p>
                                                            <p class="m-0 user-res-p1">ARN</p>
                                                            <p class="m-0">
                                                                <img src="{{ 'front/assets/img/mdBookings/Group 5.png' }}" alt="" />
                                                            </p>
                                                            <p class="m-0 user-res-p1">IST</p>
                                                            <p class="m-0 user-res-p6" style="font-weight: 400;">
                                                                Istanbul Airport
                                                            </p>
                                                        </div>
                                                        <!-- Flex Item 2 -->
                                                        <div class="d-flex flex-column  ms-5">
                                                            <p class="user-res-p1 mb-2">
                                                                <span class="">
                                                                    <img src="{{ 'front/assets/img/mdBookings/fligthTo.png' }}" alt="" />
                                                                </span>
                                                                <span class="">Stockholm </span>
                                                                <span class="" style="color: #4cdb06;">to </span>
                                                                <span>Istanbul</span>
                                                            </p>
                                                            <p class="user-res-p5">
                                                                <span>
                                                                    <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="" />
                                                                </span>
                                                                <span class="m-0">12 Dec 2023 - 16:30</span>
                                                            </p>
                                                            <div class="">
                                                                <!-- <button class="user-reservation-btn1 menu-detail-btn2">Ticket Details</button> -->
                                                            </div>
                                                        </div>
                                                        <!-- Flex Item 3 -->
                                                        <div class="ms-auto mt-auto">
                                                            <!-- <img src="{{ 'front/assets/img/mdBookings/airlinesLogo.png' }}" alt="" /> -->
                                                            <button class="user-reservation-btn2" data-bs-toggle="modal" data-bs-target="#ReviewModalFlight">Write Review</button>

                                                        </div>
                                                    </div>





                                                </div>
                                            </div>
                                            <!-- COMPLETED FLIGHTS END -->

                                            <!-- CANCELLED FLIGHTS -->
                                            <div class="tab-pane fade" id="userflight33" role="tabpanel" aria-labelledby="sale-userflight-tab3">
                                                <div class="card shadow-none mb-4 pkgCard">
                                                    <div class="card-body d-flex gap-3 w-100 p-3">
                                                        <!-- Flex Item 1 -->
                                                        <div class="text-center">
                                                            <p class="user-res-p6 m-0" style="font-weight: 400;">
                                                                Stockholm Airport
                                                            </p>
                                                            <p class="m-0 user-res-p1">ARN</p>
                                                            <p class="m-0">
                                                                <img src="{{ 'front/assets/img/mdBookings/Group 5.png' }}" alt="" />
                                                            </p>
                                                            <p class="m-0 user-res-p1">IST</p>
                                                            <p class="m-0 user-res-p6" style="font-weight: 400;">
                                                                Istanbul Airport
                                                            </p>
                                                        </div>
                                                        <!-- Flex Item 2 -->
                                                        <div class="d-flex flex-column  ms-5">
                                                            <p class="user-res-p1 mb-2">
                                                                <span class="">
                                                                    <img src="{{ 'front/assets/img/mdBookings/fligthTo.png' }}" alt="" />
                                                                </span>
                                                                <span class="">Stockholm </span>
                                                                <span class="" style="color: #4cdb06;">to </span>
                                                                <span>Istanbul</span>
                                                            </p>
                                                            <p class="user-res-p5">
                                                                <span>
                                                                    <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="" />
                                                                </span>
                                                                <span class="m-0">12 Dec 2023 - 16:30</span>
                                                            </p>
                                                            <div class="mt-auto">
                                                                <div class="card-h3">Status: <span class="text-red">Cancelled</span></div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- CANCELLED FLIGHTS END -->
                                        </div>
                                    </div>



                                </div>
                                <!-- FLIGHTS TAB CONTENT END -->
                            </div>
                        </div>
                        <!-- FLIGHT RESERVATIONS END -->


                        <!-- <div class="tab-pane fade" id="patient-message" role="tabpanel" aria-labelledby="patient-message-tab"></div> -->
                    </div>
                </div>
            </div>
            <!-- RESERVATIONS TAB CONTENT END -->
        </div>
    </div>
</div>
</div>

{{-- Model Boxes --}} {{-- Hote Model box 1 --}}
<!-- REQUEST CANCEL BOOKING MODAL -->
<div class="modal fade" id="cancelRequest" tabindex="-1" aria-labelledby="cancelRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">

            <div class="modal-header border-0">
                <!-- <img src="{{ 'front/assets/img/user/Group 20.png' }}" alt="" class="position-relative" style="top: -15rem; left: -1rem;" /> -->
                <button type="button" class="btn-close p-0 position-absolute" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="#">
                    <div class="mb-3">
                        <label for="Cancellation Detail" class="form-label card-h1 fw-500">Cancellation Detail</label>
                        <textarea name="" id="" cols="" rows="" class="form-control" style="height: 121px;" placeholder="Please write your treatment cancellation request in detail"></textarea>
                    </div>
                    <div class="form-check mb-5">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                        <label class="form-check-label card-h1" for="flexCheckDefault">
                            I confirm that I wish cancel my reservation
                        </label>
                    </div>
                    <div class="text-center">
                        <button class="user-res-btn3" data-bs-toggle="modal" data-bs-target="#exampleModalkd" data-bs-dismiss="modal">Submit Cancel Request</button>
                    </div>
                </form>



            </div>
        </div>
    </div>
</div>
<!-- END -->

{{-- Hotel Model Box 2 --}}
<div class="modal fade" id="exampleModalkd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="width: 38rem;">
        <div class="modal-content">
            <div class="">
                <button type="button" class="btn-close" style="left: unset; top: 14px; right: 14px;" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mt-4 mb-4">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <p class="">
                        <img src="{{ 'front/assets/img/user/md-red@.png' }}" alt="" class="" />
                    </p>
                    <p class="user-res-p9">We received your <span style="color: #f31d1d;">cancellation request</span></p>
                    <p class="user-res-p7">our customer supports will contact you for your cancellation request soon.</p>
                    <div class="text-center mt-5 mb-3">
                        <button class="user-res-btn3" data-bs-dismiss="modal">Done</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Hotel Model Box 3 --}}
<!-- Write Review MODAL -->
<div class="modal fade" id="ReviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header border-0 p-5 pb-0">
                <h5 class="modal-title modal-h1 text-start camptonExtraBold" id="">Write Review</h5>
                <button type="button" class="btn-close p-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5">
                <div class="acommodition-content">
                    <div class="mb-4">
                        <h6 class="card-h1 mb-2">Cleanliness</h6>
                        <div class="reviewsStar">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h6 class="card-h1 mb-2">Comfort</h6>
                        <div class="reviewsStar">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        {{--
                                        <h6 class="fsb-2 fw-500">Min 2022 Model</h6>
                                        --}}
                    </div>
                    <div class="mb-4">
                        <h6 class="card-h1 mb-2">Food Quality</h6>
                        <div class="reviewsStar">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h6 class="card-h1 mb-2">Behavior / Professionalism</h6>
                        <div class="reviewsStar">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h6 class="card-h1 mb-1">Do you recommend this hotel?</h6>
                        <div class="d-flex" style="gap: 9px;">
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">1</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">2</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">3</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">4</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">5</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">6</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">7</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">8</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">9</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">10</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <p class=""><span class="user-res-p10">Extra Notes</span><span class="user-res-p3 fst-italix"> *Optional</span></p>
                        <div class="form-floating" style="width: 312px;">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px;"></textarea>
                            <label for="floatingTextarea2" class="user-res-p8 camptonBook">Please share you feedback & experience.</label>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn review-sub-btn" data-bs-toggle="modal" data-bs-target="#hotelcompletedmodel2" data-bs-dismiss="modal">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END -->

<!-- REVIEW MODAL VEHICLE -->
<div class="modal fade" id="ReviewModalVehicle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header border-0 p-5 pb-0">
                <h5 class="modal-title modal-h1 text-start camptonExtraBold" id="">Write Review</h5>
                <button type="button" class="btn-close p-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5">
                <div class="acommodition-content">
                    <div class="mb-4">
                        <h6 class="card-h1 mb-2">Cleanliness</h6>
                        <div class="reviewsStar">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h6 class="card-h1 mb-2">Comfort</h6>
                        <div class="reviewsStar">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        {{--
                                        <h6 class="fsb-2 fw-500">Min 2022 Model</h6>
                                        --}}
                    </div>
                    <div class="mb-4">
                        <h6 class="card-h1 mb-2">Vehicle Quality</h6>
                        <div class="reviewsStar">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h6 class="card-h1 mb-2">Behavior / Professionalism</h6>
                        <div class="reviewsStar">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h6 class="card-h1 mb-1">Do you recommend this vehicle?</h6>
                        <div class="d-flex" style="gap: 9px;">
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">1</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">2</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">3</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">4</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">5</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">6</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">7</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">8</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">9</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">10</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <p class=""><span class="user-res-p10">Extra Notes</span><span class="user-res-p3 fst-italix"> *Optional</span></p>
                        <div class="form-floating" style="width: 312px;">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px;"></textarea>
                            <label for="floatingTextarea2" class="user-res-p8 camptonBook">Please share you feedback & experience.</label>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn review-sub-btn" data-bs-toggle="modal" data-bs-target="#hotelcompletedmodel2" data-bs-dismiss="modal">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END -->
<!-- REVIEW MODAL FLIGHT -->
<div class="modal fade" id="ReviewModalFlight" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header border-0 p-5 pb-0">
                <h5 class="modal-title modal-h1 text-start camptonExtraBold" id="">Write Review</h5>
                <button type="button" class="btn-close p-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5">
                <div class="acommodition-content">
                    <div class="mb-4">
                        <h6 class="card-h1 mb-2">Cleanliness</h6>
                        <div class="reviewsStar">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h6 class="card-h1 mb-2">Comfort</h6>
                        <div class="reviewsStar">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        {{--
                                        <h6 class="fsb-2 fw-500">Min 2022 Model</h6>
                                        --}}
                    </div>
                    <div class="mb-4">
                        <h6 class="card-h1 mb-2">Flight Quality</h6>
                        <div class="reviewsStar">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h6 class="card-h1 mb-2">Behavior / Professionalism</h6>
                        <div class="reviewsStar">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h6 class="card-h1 mb-1">Do you recommend this vehicle?</h6>
                        <div class="d-flex" style="gap: 9px;">
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">1</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">2</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">3</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">4</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">5</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">6</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">7</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">8</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">9</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="mb-0 campton">10</p>
                                <p class="mb-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <p class=""><span class="user-res-p10">Extra Notes</span><span class="user-res-p3 fst-italix"> *Optional</span></p>
                        <div class="form-floating" style="width: 312px;">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px;"></textarea>
                            <label for="floatingTextarea2" class="user-res-p8 camptonBook">Please share you feedback & experience.</label>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn review-sub-btn" data-bs-toggle="modal" data-bs-target="#hotelcompletedmodel2" data-bs-dismiss="modal">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END -->

{{-- Hotel Model Box 4 --}}
<div class="modal fade" id="hotelcompletedmodel2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="width: 48%;">
        <div class="modal-content">
            <div class="position-relative overflow-hidden" style="height: 15rem;">
                <img src="{{ 'front/assets/img/user/Group 24.png' }}" alt="" class="position-relative" style="top: -15rem; left: -1rem;" />
                <button type="button btn-close z-index-1" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="opacity: 1;"></button>
            </div>
            <div class="model-body text-center">
                <p class="mt-3">
                    <img src="{{ 'front/assets/img/user/lucide_party-popper.png' }}" alt="" class="" />
                </p>
                <p class="user-res-p9">You received 5 MD<span style="font-weight: 400;">coin!</span></p>
                <p class="user-res-p4">go to My Wallet</p>
                <button class="user-res-btn3 mt-3 mb-5" style="background: #4cdb06;">Done</button>
            </div>
        </div>
    </div>
</div>
{{-- Vehicle Model Box 1 --}}
<div class="modal fade" id="exampleModal21" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="width: 48%;">
        <div class="modal-content">
            <div class="position-relative overflow-hidden" style="height: 15rem;">
                <img src="{{ 'front/assets/img/user/Group 20.png' }}" alt="" class="position-relative" style="top: -15rem; left: -1rem;" />
                <button type="button btn-close z-index-1" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-0">
                <label for="floatingTextarea2 user-res-p7">Cancellation Detail</label>
                <div class="form-floating mt-2">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px;"></textarea>
                    <label for="floatingTextarea2 user-res-p8">Please write your treatment cancellation request in detail</label>
                </div>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label user-res-p7" for="flexCheckDefault">
                        I confirm that I wish cancel my reservation
                    </label>
                </div>
                <div class="text-center mt-3 mb-3">
                    <button class="user-res-btn3" data-bs-toggle="modal" data-bs-target="#exampleModal25" data-bs-dismiss="modal">Submit Cancel Request</button>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Vehicle Model Box 2 --}}
<div class="modal fade" id="exampleModal25" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="width: 38rem;">
        <div class="modal-content">
            <div class="">
                <button type="button" class="btn-close" style="left: unset; top: 14px; right: 14px;" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mt-4 mb-4">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <p class="">
                        <img src="{{ 'front/assets/img/user/md-red@.png' }}" alt="" class="" />
                    </p>
                    <p class="user-res-p9">We received your <span style="color: #f31d1d;">cancellation request</span></p>
                    <p class="user-res-p7">our customer supports will contact you for your cancellation request soon.</p>
                    <div class="text-center mt-5 mb-3">
                        <button class="user-res-btn3" data-bs-dismiss="modal">Done</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Vehicle Model Box 3 --}}
<div class="modal fade" id="UserVehicleView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="width: 47%;">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title fsb-1" id="">Write Review</h5>
                <button type="button btn-close z-index-1" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="opacity: 1;"></button>
            </div>
            <div class="modal-body">
                <div class="acommodition-content">
                    <div class="mb-3">
                        <h6 class="user-res-p10 m-0">Cleanliness</h6>
                        <div class="m-0">
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <h6 class="user-res-p10 m-0">Comfort</h6>
                        <div class="m-0">
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                        </div>
                        {{--
                                        <h6 class="fsb-2 fw-500">Min 2022 Model</h6>
                                        --}}
                    </div>
                    <div class="mb-3">
                        <h6 class="user-res-p10 m-0">Food Quality</h6>
                        <div class="m-0">
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <h6 class="user-res-p10 m-0">Behavior / Professionalism</h6>
                        <div class="m-0">
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                        </div>
                    </div>

                    <div class="mb-3">
                        <h6 class="user-res-p10 m-0">Do you recommend this hotel?</h6>
                        <div class="d-flex gap-2 m-0">
                            <div class="p-0 m-0">
                                <p class="m-0 p-0">1</p>
                                <p class="m-0 p-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="m-0 p-0">2</p>
                                <p class="m-0 p-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="m-0 p-0">3</p>
                                <p class="m-0 p-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="m-0 p-0">4</p>
                                <p class="m-0 p-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="m-0 p-0">5</p>
                                <p class="m-0 p-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="m-0 p-0">6</p>
                                <p class="m-0 p-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="m-0 p-0">7</p>
                                <p class="m-0 p-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="m-0 p-0">8</p>
                                <p class="m-0 p-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="m-0 p-0">9</p>
                                <p class="m-0 p-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="m-0 p-0">10</p>
                                <p class="m-0 p-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <p class=""><span class="user-res-p10">Extra Notes</span><span class="user-res-p3">*Optional</span></p>
                        <div class="form-floating" style="width: 312px;">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px;"></textarea>
                            <label for="floatingTextarea2" class="user-res-p8">Please share you feedback & experience.</label>
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
    <div class="modal-dialog modal-lg modal-dialog-centered" style="width: 48%;">
        <div class="modal-content">
            <div class="position-relative overflow-hidden" style="height: 15rem;">
                <img src="{{ 'front/assets/img/user/Group 24.png' }}" alt="" class="position-relative" style="top: -15rem; left: -1rem;" />
                <button type="button btn-close z-index-1" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="opacity: 1;"></button>
            </div>
            <div class="model-body text-center">
                <p class="mt-3">
                    <img src="{{ 'front/assets/img/user/lucide_party-popper.png' }}" alt="" class="" />
                </p>
                <p class="user-res-p9">You received 5 MD<span style="font-weight: 400;">coin!</span></p>
                <p class="user-res-p4">go to My Wallet</p>
                <button class="user-res-btn3 mt-3 mb-5" style="background: #4cdb06;">Done</button>
            </div>
        </div>
    </div>
</div>
{{-- Flight Model Box 1 --}}
<div class="modal fade" id="FlightModelBox1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="width: 48%;">
        <div class="modal-content">
            <div class="position-relative overflow-hidden" style="height: 15rem;">
                <img src="{{ 'front/assets/img/user/Group 20.png' }}" alt="" class="position-relative" style="top: -15rem; left: -1rem;" />
                <button type="button btn-close z-index-1" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="opacity: 1;"></button>
            </div>
            <div class="modal-body m-0">
                <label for="floatingTextarea2 user-res-p7">Cancellation Detail</label>
                <div class="form-floating mt-2">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px;"></textarea>
                    <label for="floatingTextarea2 user-res-p8">Please write your treatment cancellation request in detail</label>
                </div>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label user-res-p7" for="flexCheckDefault">
                        I confirm that I wish cancel my reservation
                    </label>
                </div>
                <div class="text-center mt-3 mb-3">
                    <button class="user-res-btn3" data-bs-toggle="modal" data-bs-target="#UserFlightView2" data-bs-dismiss="modal">Submit Cancel Request</button>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Flight Model Box 2 --}}
<div class="modal fade" id="UserFlightView2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="width: 38rem;">
        <div class="modal-content">
            <div class="">
                <button type="button" class="btn-close" style="left: unset; top: 14px; right: 14px;" data-bs-dismiss="modal" aria-label="Close" style="opacity: 1;"></button>
            </div>
            <div class="modal-body mt-4 mb-4">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <p class="">
                        <img src="{{ 'front/assets/img/user/md-red@.png' }}" alt="" class="" />
                    </p>
                    <p class="user-res-p9">We received your <span style="color: #f31d1d;">cancellation request</span></p>
                    <p class="user-res-p7">our customer supports will contact you for your cancellation request soon.</p>
                    <div class="text-center mt-5 mb-3">
                        <button class="user-res-btn3" data-bs-dismiss="modal">Done</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Flight Model Box 3 --}}
<div class="modal fade" id="UserFlightView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="width: 47%;">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title fsb-1" id="">Write Review</h5>
                <button type="button btn-close z-index-1" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="opacity: 1;"></button>
            </div>
            <div class="modal-body">
                <div class="acommodition-content">
                    <div class="mb-3">
                        <h6 class="user-res-p10 m-0">Cleanliness</h6>
                        <div class="m-0">
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <h6 class="user-res-p10 m-0">Comfort</h6>
                        <div class="m-0">
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                        </div>
                        {{--
                                        <h6 class="fsb-2 fw-500">Min 2022 Model</h6>
                                        --}}
                    </div>
                    <div class="mb-3">
                        <h6 class="user-res-p10 m-0">Food Quality</h6>
                        <div class="m-0">
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <h6 class="user-res-p10 m-0">Behavior / Professionalism</h6>
                        <div class="m-0">
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                            <img src="{{ 'front/assets/img/user/Vector star (1).png' }}" alt="" />
                        </div>
                    </div>

                    <div class="mb-3">
                        <h6 class="user-res-p10 m-0">Do you recommend this hotel?</h6>
                        <div class="d-flex gap-2 m-0">
                            <div class="p-0 m-0">
                                <p class="m-0 p-0">1</p>
                                <p class="m-0 p-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="m-0 p-0">2</p>
                                <p class="m-0 p-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="m-0 p-0">3</p>
                                <p class="m-0 p-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="m-0 p-0">4</p>
                                <p class="m-0 p-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="m-0 p-0">5</p>
                                <p class="m-0 p-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="m-0 p-0">6</p>
                                <p class="m-0 p-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="m-0 p-0">7</p>
                                <p class="m-0 p-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="m-0 p-0">8</p>
                                <p class="m-0 p-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="m-0 p-0">9</p>
                                <p class="m-0 p-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                            <div class="p-0 m-0">
                                <p class="m-0 p-0">10</p>
                                <p class="m-0 p-0">
                                    <img src="{{ 'front/assets/img/user/Ellipse 153.png' }}" />
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <p class=""><span class="user-res-p10">Extra Notes</span><span class="user-res-p3">*Optional</span></p>
                        <div class="form-floating" style="width: 312px;">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px;"></textarea>
                            <label for="floatingTextarea2" class="user-res-p8">Please share you feedback & experience.</label>
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
    <div class="modal-dialog modal-lg modal-dialog-centered" style="width: 48%;">
        <div class="modal-content">
            <div class="position-relative overflow-hidden" style="height: 15rem;">
                <img src="{{ 'front/assets/img/user/Group 24.png' }}" alt="" class="position-relative" style="top: -15rem; left: -1rem;" />
                <button type="button btn-close z-index-1" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="opacity: 1;"></button>
            </div>
            <div class="model-body text-center">
                <p class="mt-3">
                    <img src="{{ 'front/assets/img/user/lucide_party-popper.png' }}" alt="" class="" />
                </p>
                <p class="user-res-p9">You received 5 MD<span style="font-weight: 400;">coin!</span></p>
                <p class="user-res-p4">go to My Wallet</p>
                <button class="user-res-btn3 mt-3 mb-5" style="background: #4cdb06;">Done</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<!-- Change Patient Information -->
@endsection @section('script')
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
</div>
</div>