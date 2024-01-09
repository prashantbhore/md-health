@extends('front.layout.layout')
@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css">

    <div class="page-wrapper">
        <div class="md-booking-banner-div">
            <img src="{{ 'front/assets/img/mdBookings/mdBookingsHeader.png' }}" class="position-absolute banner-img "
                alt="">
            <div class="position-relative  d-flex flex-column  align-items-center banner">
                <p class="green-color banner-p">YOUR SEARCH</p>
                <p class="fw-bold hotel-size"> RESULTS </p>
            </div>
        </div>

        <div class="md-booking-middle-content result-page ">
            <div class="container mt-5">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        {{-- <button class="nav-link " id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button> --}}
                        <div id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                            class="nav-link  d-flex justify-content-center align-items-center main-mid-seaction">
                            <img src="{{ 'front/assets/img/mdBookings/ic_baseline-hotel.png' }}" alt="">
                            <span class="fs-6 fw-bold mx-1 text-dark"> Hotel</span>
                        </div>
                    </li>
                    <li class="nav-item" role="presentation">
                        {{-- <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button> --}}
                        <div id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            class="nav-link active d-flex justify-content-center align-items-center main-mid-seaction">
                            <img src="{{ 'front/assets/img/mdBookings/bxs_plane-take-off.png' }}" alt="">
                            <span class="fs-6 fw-bold mx-1 text-dark">Flight</span>
                        </div>
                    </li>
                    <li class="nav-item" role="presentation">
                        <div id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                            class="nav-link d-flex justify-content-center align-items-center main-mid-seaction">
                            <img src="{{ 'front/assets/img/mdBookings/Vector (1).png' }}" alt="">
                            <span class="fs-6 fw-bold mx-1 text-dark">Vehicle</span>
                        </div>
                    </li>
                </ul>
                <div class="tab-content main-mid-seaction-h1 rounded  " id="myTabContent">
                    <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="md-booking-serach-filter p-3 mb-2 bg-white">


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-floating booking-box-h border d-flex align-items-center" style="padding: 0">
                                        <img src="{{ 'front/assets/img/mdBookings/ic_baseline-hotel.png' }}" alt="" class="position-absolute booking-img2">
                                        
                                            <div class="custom-dropdown">
                                                <div class="dropdown-header fsb-1 fw-500" tabindex="0">Select an option</div>
                                                    <ul class="dropdown-list search-dropdown">
                                                        <span>
                                                            <input type="text" class="dropdown-search">
                                                            <button class="btn">
                                                                <i class="fa fa-search"></i>
                                                            </button>
                                                        </span>
                                                        <li data-value="option1">Maharashtra</li>
                                                        <li data-value="option2">Delhi</li>
                                                        <li data-value="option3">Vizag</li>
                                                        <li data-value="option4">Bengaluru</li>
                                                    </ul>
                                            </div>
                                        {{-- <label for="floatingSelect" class="mid-food-sub"> Food Type</label> --}}
                                    </div>
                                </div>
                                <div class="col-md-3 pe-0">
                                    <div class="form-floating booking-box-h border no-border-right  d-flex align-items-center" style="padding: 0">
                                        <img src="{{ 'front/assets/img/mdBookings/mdi_person.png' }}" alt="" class="position-absolute booking-img2">

                                        <div class="custom-dropdown">
                                            <div class="dropdown-header fsb-1 fw-500 d-flex align-items-center justify-content-between" tabindex="0">Select an option
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.4" d="M22 12C22 17.515 17.514 22 12 22C6.486 22 2 17.515 2 12C2 6.486 6.486 2 12 2C17.514 2 22 6.486 22 12Z" fill="black"></path>
                                                    <path d="M16.2211 10.5575C16.2211 10.7485 16.1481 10.9405 16.0021 11.0865L12.5321 14.5735C12.3911 14.7145 12.2001 14.7935 12.0001 14.7935C11.8011 14.7935 11.6101 14.7145 11.4691 14.5735L7.99707 11.0865C7.70507 10.7935 7.70507 10.3195 7.99907 10.0265C8.29307 9.73448 8.76807 9.73548 9.06007 10.0285L12.0001 12.9815L14.9401 10.0285C15.2321 9.73548 15.7061 9.73448 16.0001 10.0265C16.1481 10.1725 16.2211 10.3655 16.2211 10.5575Z" fill="black"></path>
                                                </svg>
                                            </div>
                                            <ul class="dropdown-list">
                                                <li data-value="option1">Adult
                                                    <div class="dropdown-counter">
                                                        <button type="button" id="sub" class="sub">-</button>
                                                        <span class="count-span">1</span>
                                                        <button type="button" id="add" class="add">+</button>
                                                    </div>
                                                </li>
                                                <li data-value="option2">Children
                                                    <div class="dropdown-counter">
                                                        <button type="button" id="sub" class="sub">-</button>
                                                        <span class="count-span">1</span>
                                                        <button type="button" id="add" class="add">+</button>
                                                    </div>
                                                </li>
                                                <li data-value="option3">Room
                                                    <div class="dropdown-counter">
                                                        <button type="button" id="sub" class="sub">-</button>
                                                        <span class="count-span">1</span>
                                                        <button type="button" id="add" class="add">+</button>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        {{-- <label for="floatingSelect" class="mid-food-sub"> Food Type</label> --}}
                                    </div>
                                </div>
                                <div class="col-md-3 ps-0">
                                    <div class="border booking-box-h no-border-left ">
                                        <div id="reportrange" class="date-range-picker-div d-flex justify-content-center align-items-center h-100 " name="daterange">
                                            {{-- <i class="fa fa-calendar"></i>&nbsp; --}}
                                            <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="" class="mx-2">
                                            <input type="text" name="hoteldaterange" class="form-control fsb-1 fw-500 m-0 p-0 border-0" value="" />
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    {{-- hhhh --}}
                                    <a class="" href="{{URL('md-booking-search-hotel-page')}}">
                                        <button class="btn-search-pill-booking3 " style="height: 57px">Search</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="md-booking-serach-filter p-3 mb-2 bg-white">
                            <div class="">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="d-flex flex-column justify-content-center align-items-start h-100 border booking-box-h">
                                                <div class="ms-1 d-flex">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                                        <path d="M3.75 22.5H26.25V25H3.75V22.5ZM26.8863 10.6588C26.7176 10.1524 26.3548 9.7337 25.8775 9.49483C25.4003 9.25596 24.8476 9.21645 24.3412 9.385L18.75 11.25L8.75 7.5L6.25 8.75L13.75 13.75L8.75 16.25L3.75 13.75L2.5 15L7.5 20L25.6838 13.1813C26.1716 12.9981 26.5695 12.6329 26.7937 12.1625C27.018 11.6921 27.0512 11.1531 26.8863 10.6588Z" fill="#111111" />
                                                    </svg>
                                                    <input type="text" name="text" class="form-control border-0" value="" placeholder="From" />
                                                </div>
                                            </div>
                                            <div class="d-flex  justify-content-center align-items-center h-100">
                                                <img src="{{ 'front/assets/img/mdBookings/flightDir.png' }}" alt="">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center align-items-start h-100 border booking-box-h">
                                                <div class="ms-2 d-flex align-items-center gap-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 18 17" fill="none">
                                                        <path d="M15.2715 11.6092C15.6454 11.6967 16.0351 11.6184 16.3585 11.3908C16.682 11.1632 16.914 10.804 17.0058 10.3889V10.3878C17.0524 10.1772 17.0614 9.95828 17.0324 9.74369C17.0034 9.5291 16.9369 9.32303 16.8367 9.13724C16.7365 8.95146 16.6046 8.78961 16.4485 8.66096C16.2923 8.5323 16.1151 8.43936 15.9269 8.38745L11.7322 7.22458L7.00591 0.230932L4.96724 0L7.65399 6.76272L3.57574 6.30188L1.45641 2.37193L0.191406 2.6901L1.32807 8.35564L15.2715 11.6092ZM0.749656 14.3845H17.2497V16.4372H0.749656V14.3845Z" fill="#111111" />
                                                    </svg>
                                                    <input type="text" name="text" class="form-control border-0" value="" placeholder="To" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="d-flex flex-column justify-content-center align-items-start h-100 border booking-box-h">
                                                <div class="ms-2 flighttime">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 16 17" fill="none">
                                                        <path d="M10.6347 1.89601e-06C10.9916 -0.00083649 11.2739 0.27646 11.2747 0.646188L11.2755 1.27641C13.5914 1.45791 15.1212 3.03597 15.1237 5.45601L15.1328 12.5397C15.1361 15.1782 13.4785 16.8016 10.8215 16.8058L4.33125 16.8142C1.69084 16.8176 0.012462 15.1555 0.0091418 12.5094L5.57173e-06 5.50895C-0.00330907 3.07295 1.47253 1.49908 3.7884 1.28649L3.78757 0.656271C3.78674 0.286543 4.06066 0.00840671 4.42588 0.00840671C4.79111 0.00756642 5.06503 0.284862 5.06586 0.65459L5.06669 1.24279L9.99723 1.23607L9.9964 0.647868C9.99557 0.27814 10.2695 0.000844092 10.6347 1.89601e-06ZM10.9734 11.9313H10.9651C10.5833 11.9405 10.277 12.2607 10.2853 12.6472C10.2861 13.0338 10.594 13.3522 10.9759 13.3606C11.3652 13.3598 11.6806 13.0396 11.6798 12.6447C11.6798 12.2498 11.3635 11.9313 10.9734 11.9313ZM4.1337 11.9321C3.75187 11.9489 3.45305 12.2691 3.45388 12.6556C3.47131 13.0422 3.78674 13.3447 4.16856 13.327C4.54292 13.3102 4.84091 12.9901 4.82348 12.6035C4.81518 12.2254 4.50723 11.9313 4.1337 11.9321ZM7.55354 11.9279C7.17171 11.9456 6.87372 12.2649 6.87372 12.6514C6.89115 13.038 7.20658 13.3396 7.5884 13.3228C7.96193 13.3052 8.26075 12.9859 8.24332 12.5985C8.23502 12.2212 7.92707 11.9271 7.55354 11.9279ZM4.12955 8.90709C3.74772 8.92389 3.44973 9.24404 3.45056 9.63058C3.46716 10.0171 3.78342 10.3196 4.16524 10.302C4.53877 10.2852 4.83676 9.96501 4.81933 9.57848C4.81103 9.20035 4.50391 8.90625 4.12955 8.90709ZM7.55022 8.87768C7.16839 8.89448 6.86957 9.21463 6.8704 9.60117C6.887 9.9877 7.20326 10.2894 7.58508 10.2726C7.95861 10.2549 8.2566 9.9356 8.24 9.54907C8.23087 9.17094 7.92375 8.87684 7.55022 8.87768ZM10.9701 8.88188C10.5882 8.89028 10.2894 9.20119 10.2902 9.58772V9.59697C10.2985 9.9835 10.614 10.2768 10.9966 10.2684C11.3701 10.2591 11.6681 9.93897 11.6598 9.55243C11.6424 9.1827 11.3428 8.88104 10.9701 8.88188ZM9.99889 2.53012L5.06835 2.53684L5.06918 3.21664C5.06918 3.5788 4.79609 3.8645 4.43086 3.8645C4.06564 3.86534 3.79089 3.58048 3.79089 3.21832L3.79006 2.57129C2.17144 2.73347 1.27581 3.68468 1.2783 5.50727L1.27913 5.7686L13.8462 5.7518V5.45769C13.8105 3.65107 12.9041 2.70322 11.2772 2.56205L11.278 3.20908C11.278 3.5704 10.9966 3.85694 10.6397 3.85694C10.2745 3.85778 9.99972 3.57208 9.99972 3.21076L9.99889 2.53012Z" fill="black"/>
                                                    </svg>
                                                    {{-- <input type="time" id="datePicker" name="calendar"
                                                            class="form-control input1 border-0"> --}}
                                                            <input type="text" name="flightfrom" class="form-control fsb-1 fw-500 border-0 ps-0  " value="" placeholder="" />
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center align-items-start h-100 border booking-box-h">
                                                <div class="ms-2 flighttime">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 16 17" fill="none">
                                                        <path d="M10.6347 1.89601e-06C10.9916 -0.00083649 11.2739 0.27646 11.2747 0.646188L11.2755 1.27641C13.5914 1.45791 15.1212 3.03597 15.1237 5.45601L15.1328 12.5397C15.1361 15.1782 13.4785 16.8016 10.8215 16.8058L4.33125 16.8142C1.69084 16.8176 0.012462 15.1555 0.0091418 12.5094L5.57173e-06 5.50895C-0.00330907 3.07295 1.47253 1.49908 3.7884 1.28649L3.78757 0.656271C3.78674 0.286543 4.06066 0.00840671 4.42588 0.00840671C4.79111 0.00756642 5.06503 0.284862 5.06586 0.65459L5.06669 1.24279L9.99723 1.23607L9.9964 0.647868C9.99557 0.27814 10.2695 0.000844092 10.6347 1.89601e-06ZM10.9734 11.9313H10.9651C10.5833 11.9405 10.277 12.2607 10.2853 12.6472C10.2861 13.0338 10.594 13.3522 10.9759 13.3606C11.3652 13.3598 11.6806 13.0396 11.6798 12.6447C11.6798 12.2498 11.3635 11.9313 10.9734 11.9313ZM4.1337 11.9321C3.75187 11.9489 3.45305 12.2691 3.45388 12.6556C3.47131 13.0422 3.78674 13.3447 4.16856 13.327C4.54292 13.3102 4.84091 12.9901 4.82348 12.6035C4.81518 12.2254 4.50723 11.9313 4.1337 11.9321ZM7.55354 11.9279C7.17171 11.9456 6.87372 12.2649 6.87372 12.6514C6.89115 13.038 7.20658 13.3396 7.5884 13.3228C7.96193 13.3052 8.26075 12.9859 8.24332 12.5985C8.23502 12.2212 7.92707 11.9271 7.55354 11.9279ZM4.12955 8.90709C3.74772 8.92389 3.44973 9.24404 3.45056 9.63058C3.46716 10.0171 3.78342 10.3196 4.16524 10.302C4.53877 10.2852 4.83676 9.96501 4.81933 9.57848C4.81103 9.20035 4.50391 8.90625 4.12955 8.90709ZM7.55022 8.87768C7.16839 8.89448 6.86957 9.21463 6.8704 9.60117C6.887 9.9877 7.20326 10.2894 7.58508 10.2726C7.95861 10.2549 8.2566 9.9356 8.24 9.54907C8.23087 9.17094 7.92375 8.87684 7.55022 8.87768ZM10.9701 8.88188C10.5882 8.89028 10.2894 9.20119 10.2902 9.58772V9.59697C10.2985 9.9835 10.614 10.2768 10.9966 10.2684C11.3701 10.2591 11.6681 9.93897 11.6598 9.55243C11.6424 9.1827 11.3428 8.88104 10.9701 8.88188ZM9.99889 2.53012L5.06835 2.53684L5.06918 3.21664C5.06918 3.5788 4.79609 3.8645 4.43086 3.8645C4.06564 3.86534 3.79089 3.58048 3.79089 3.21832L3.79006 2.57129C2.17144 2.73347 1.27581 3.68468 1.2783 5.50727L1.27913 5.7686L13.8462 5.7518V5.45769C13.8105 3.65107 12.9041 2.70322 11.2772 2.56205L11.278 3.20908C11.278 3.5704 10.9966 3.85694 10.6397 3.85694C10.2745 3.85778 9.99972 3.57208 9.99972 3.21076L9.99889 2.53012Z" fill="black"/>
                                                    </svg>
                                                    {{-- <input type="time" id="datePicker" name="calendar"
                                                            class="form-control input1 border-0"> --}}
                                                            <input type="text" name="flightto" class="form-control fsb-1 fw-500 border-0 ps-0  " value="" placeholder="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="" href="{{ URL('md-booking-search-flight-page') }}">
                                            <button class="btn btn-search-pill-booking3" style="height: 57px">Search</button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="w-75 d-flex justify-content-between align-items-center flex-wrap mt-3 md-booking-footer-details">
                                <div class="d-flex align-items-center gap-2 greenCheck">
                                    <input type="checkbox" id="oneway" name="" value="">
                                    <label class="fsb-2" for="oneway">One Way</label>
                                </div>
                                <div class="d-flex align-items-center gap-2 greenCheck">
                                    <input type="checkbox" id="twoway" name="" value="">
                                    <label class="fsb-2" for="twoway">Two Way</label>
                                </div>
                                <div class="d-flex gap-1">
                                    <p class="fsb-1 mb-0 fw-bold">Flight Details:</p>
                                    <div class="form-floating">
                                        <div class="custom-dropdown">
                                            <div class="dropdown-header fsb-2 fw-500" tabindex="0">First Class
                                                <i class="fa fa-chevron-down ms-2"></i>
                                            </div>
                                            <ul class="dropdown-list">
                                                <li data-value="option1">Economy</li>
                                                <li data-value="option2">Business</li>
                                                <li data-value="option3">First Class</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex gap-1">
                                    <p class="fsb-1 mb-0 fw-bold">Person:</p>
                                    <div class="form-floating">
                                        <div class="custom-dropdown">
                                            <div class="dropdown-header fsb-2 fw-500" tabindex="0">10 Adult
                                                <i class="fa fa-chevron-down ms-2"></i>
                                            </div>
                                            <ul class="dropdown-list">
                                                <li data-value="option1">Adult
                                                    <div class="dropdown-counter">
                                                        <button type="button" id="sub" class="sub">-</button>
                                                        <span class="count-span">1</span>
                                                        <button type="button" id="add" class="add">+</button>
                                                    </div>
                                                </li>
                                                <li data-value="option2">Children
                                                    <div class="dropdown-counter">
                                                        <button type="button" id="sub" class="sub">-</button>
                                                        <span class="count-span">1</span>
                                                        <button type="button" id="add" class="add">+</button>
                                                    </div>
                                                </li>
                                                <li data-value="option3">Room
                                                    <div class="dropdown-counter">
                                                        <button type="button" id="sub" class="sub">-</button>
                                                        <span class="count-span">1</span>
                                                        <button type="button" id="add" class="add">+</button>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade vehical-tab-div" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="md-booking-serach-filter p-3 mb-2 bg-white">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="d-flex flex-column justify-content-center align-items-start h-100 border booking-box-h">
                                        <div class="ms-2 flighttime">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                                <path d="M3.75 22.5H26.25V25H3.75V22.5ZM26.8863 10.6588C26.7176 10.1524 26.3548 9.7337 25.8775 9.49483C25.4003 9.25596 24.8476 9.21645 24.3412 9.385L18.75 11.25L8.75 7.5L6.25 8.75L13.75 13.75L8.75 16.25L3.75 13.75L2.5 15L7.5 20L25.6838 13.1813C26.1716 12.9981 26.5695 12.6329 26.7937 12.1625C27.018 11.6921 27.0512 11.1531 26.8863 10.6588Z" fill="#111111" />
                                            </svg>
                                            <input type="text" placeholder="Pick up Location" class="form-control fsb-1 fw-500 border-0 ps-0  ">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 pe-0">
                                    <div class="main-mid-seaction booking-box-h">
                                        <div class="d-flex flex-column justify-content-center align-items-start h-100 border booking-box-h">
                                            <div class="vehical-date d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 16 17" fill="none">
                                                    <path d="M10.6347 1.89601e-06C10.9916 -0.00083649 11.2739 0.27646 11.2747 0.646188L11.2755 1.27641C13.5914 1.45791 15.1212 3.03597 15.1237 5.45601L15.1328 12.5397C15.1361 15.1782 13.4785 16.8016 10.8215 16.8058L4.33125 16.8142C1.69084 16.8176 0.012462 15.1555 0.0091418 12.5094L5.57173e-06 5.50895C-0.00330907 3.07295 1.47253 1.49908 3.7884 1.28649L3.78757 0.656271C3.78674 0.286543 4.06066 0.00840671 4.42588 0.00840671C4.79111 0.00756642 5.06503 0.284862 5.06586 0.65459L5.06669 1.24279L9.99723 1.23607L9.9964 0.647868C9.99557 0.27814 10.2695 0.000844092 10.6347 1.89601e-06ZM10.9734 11.9313H10.9651C10.5833 11.9405 10.277 12.2607 10.2853 12.6472C10.2861 13.0338 10.594 13.3522 10.9759 13.3606C11.3652 13.3598 11.6806 13.0396 11.6798 12.6447C11.6798 12.2498 11.3635 11.9313 10.9734 11.9313ZM4.1337 11.9321C3.75187 11.9489 3.45305 12.2691 3.45388 12.6556C3.47131 13.0422 3.78674 13.3447 4.16856 13.327C4.54292 13.3102 4.84091 12.9901 4.82348 12.6035C4.81518 12.2254 4.50723 11.9313 4.1337 11.9321ZM7.55354 11.9279C7.17171 11.9456 6.87372 12.2649 6.87372 12.6514C6.89115 13.038 7.20658 13.3396 7.5884 13.3228C7.96193 13.3052 8.26075 12.9859 8.24332 12.5985C8.23502 12.2212 7.92707 11.9271 7.55354 11.9279ZM4.12955 8.90709C3.74772 8.92389 3.44973 9.24404 3.45056 9.63058C3.46716 10.0171 3.78342 10.3196 4.16524 10.302C4.53877 10.2852 4.83676 9.96501 4.81933 9.57848C4.81103 9.20035 4.50391 8.90625 4.12955 8.90709ZM7.55022 8.87768C7.16839 8.89448 6.86957 9.21463 6.8704 9.60117C6.887 9.9877 7.20326 10.2894 7.58508 10.2726C7.95861 10.2549 8.2566 9.9356 8.24 9.54907C8.23087 9.17094 7.92375 8.87684 7.55022 8.87768ZM10.9701 8.88188C10.5882 8.89028 10.2894 9.20119 10.2902 9.58772V9.59697C10.2985 9.9835 10.614 10.2768 10.9966 10.2684C11.3701 10.2591 11.6681 9.93897 11.6598 9.55243C11.6424 9.1827 11.3428 8.88104 10.9701 8.88188ZM9.99889 2.53012L5.06835 2.53684L5.06918 3.21664C5.06918 3.5788 4.79609 3.8645 4.43086 3.8645C4.06564 3.86534 3.79089 3.58048 3.79089 3.21832L3.79006 2.57129C2.17144 2.73347 1.27581 3.68468 1.2783 5.50727L1.27913 5.7686L13.8462 5.7518V5.45769C13.8105 3.65107 12.9041 2.70322 11.2772 2.56205L11.278 3.20908C11.278 3.5704 10.9966 3.85694 10.6397 3.85694C10.2745 3.85778 9.99972 3.57208 9.99972 3.21076L9.99889 2.53012Z" fill="black"></path>
                                                </svg>
                                                <input type="text" name="vehicalfrom" class="form-control border-0 pe-0" value="" placeholder="From" />
                                                <input type="time" name="flighttimeout" class="form-control fsb-1 fw-500 border-0 ps-0  flex-row-reverse" value="" placeholder="" />
                                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.4" d="M22 12C22 17.515 17.514 22 12 22C6.486 22 2 17.515 2 12C2 6.486 6.486 2 12 2C17.514 2 22 6.486 22 12Z" fill="black"/>
                                                    <path d="M16.2211 10.5575C16.2211 10.7485 16.1481 10.9405 16.0021 11.0865L12.5321 14.5735C12.3911 14.7145 12.2001 14.7935 12.0001 14.7935C11.8011 14.7935 11.6101 14.7145 11.4691 14.5735L7.99707 11.0865C7.70507 10.7935 7.70507 10.3195 7.99907 10.0265C8.29307 9.73448 8.76807 9.73548 9.06007 10.0285L12.0001 12.9815L14.9401 10.0285C15.2321 9.73548 15.7061 9.73448 16.0001 10.0265C16.1481 10.1725 16.2211 10.3655 16.2211 10.5575Z" fill="black"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 pe-0">
                                    <div class="main-mid-seaction booking-box-h">
                                        <div class="d-flex flex-column justify-content-center align-items-start h-100 border booking-box-h">
                                            <div class="vehical-date d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 16 17" fill="none">
                                                    <path d="M10.6347 1.89601e-06C10.9916 -0.00083649 11.2739 0.27646 11.2747 0.646188L11.2755 1.27641C13.5914 1.45791 15.1212 3.03597 15.1237 5.45601L15.1328 12.5397C15.1361 15.1782 13.4785 16.8016 10.8215 16.8058L4.33125 16.8142C1.69084 16.8176 0.012462 15.1555 0.0091418 12.5094L5.57173e-06 5.50895C-0.00330907 3.07295 1.47253 1.49908 3.7884 1.28649L3.78757 0.656271C3.78674 0.286543 4.06066 0.00840671 4.42588 0.00840671C4.79111 0.00756642 5.06503 0.284862 5.06586 0.65459L5.06669 1.24279L9.99723 1.23607L9.9964 0.647868C9.99557 0.27814 10.2695 0.000844092 10.6347 1.89601e-06ZM10.9734 11.9313H10.9651C10.5833 11.9405 10.277 12.2607 10.2853 12.6472C10.2861 13.0338 10.594 13.3522 10.9759 13.3606C11.3652 13.3598 11.6806 13.0396 11.6798 12.6447C11.6798 12.2498 11.3635 11.9313 10.9734 11.9313ZM4.1337 11.9321C3.75187 11.9489 3.45305 12.2691 3.45388 12.6556C3.47131 13.0422 3.78674 13.3447 4.16856 13.327C4.54292 13.3102 4.84091 12.9901 4.82348 12.6035C4.81518 12.2254 4.50723 11.9313 4.1337 11.9321ZM7.55354 11.9279C7.17171 11.9456 6.87372 12.2649 6.87372 12.6514C6.89115 13.038 7.20658 13.3396 7.5884 13.3228C7.96193 13.3052 8.26075 12.9859 8.24332 12.5985C8.23502 12.2212 7.92707 11.9271 7.55354 11.9279ZM4.12955 8.90709C3.74772 8.92389 3.44973 9.24404 3.45056 9.63058C3.46716 10.0171 3.78342 10.3196 4.16524 10.302C4.53877 10.2852 4.83676 9.96501 4.81933 9.57848C4.81103 9.20035 4.50391 8.90625 4.12955 8.90709ZM7.55022 8.87768C7.16839 8.89448 6.86957 9.21463 6.8704 9.60117C6.887 9.9877 7.20326 10.2894 7.58508 10.2726C7.95861 10.2549 8.2566 9.9356 8.24 9.54907C8.23087 9.17094 7.92375 8.87684 7.55022 8.87768ZM10.9701 8.88188C10.5882 8.89028 10.2894 9.20119 10.2902 9.58772V9.59697C10.2985 9.9835 10.614 10.2768 10.9966 10.2684C11.3701 10.2591 11.6681 9.93897 11.6598 9.55243C11.6424 9.1827 11.3428 8.88104 10.9701 8.88188ZM9.99889 2.53012L5.06835 2.53684L5.06918 3.21664C5.06918 3.5788 4.79609 3.8645 4.43086 3.8645C4.06564 3.86534 3.79089 3.58048 3.79089 3.21832L3.79006 2.57129C2.17144 2.73347 1.27581 3.68468 1.2783 5.50727L1.27913 5.7686L13.8462 5.7518V5.45769C13.8105 3.65107 12.9041 2.70322 11.2772 2.56205L11.278 3.20908C11.278 3.5704 10.9966 3.85694 10.6397 3.85694C10.2745 3.85778 9.99972 3.57208 9.99972 3.21076L9.99889 2.53012Z" fill="black"></path>
                                                </svg>
                                                <input type="text" name="vehicalfrom" class="form-control border-0 pe-0" value="" placeholder="From" />
                                                <input type="time" name="flighttimeout" class="form-control border-0 ps-0 flex-row-reverse" value="" placeholder="" />
                                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.4" d="M22 12C22 17.515 17.514 22 12 22C6.486 22 2 17.515 2 12C2 6.486 6.486 2 12 2C17.514 2 22 6.486 22 12Z" fill="black"/>
                                                    <path d="M16.2211 10.5575C16.2211 10.7485 16.1481 10.9405 16.0021 11.0865L12.5321 14.5735C12.3911 14.7145 12.2001 14.7935 12.0001 14.7935C11.8011 14.7935 11.6101 14.7145 11.4691 14.5735L7.99707 11.0865C7.70507 10.7935 7.70507 10.3195 7.99907 10.0265C8.29307 9.73448 8.76807 9.73548 9.06007 10.0285L12.0001 12.9815L14.9401 10.0285C15.2321 9.73548 15.7061 9.73448 16.0001 10.0265C16.1481 10.1725 16.2211 10.3655 16.2211 10.5575Z" fill="black"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 ">
                                    <button class="btn btn-search-pill-booking3" style="height: 57px">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col food-review">Search Results</div>
                <div class="col">
                    <div class="d-flex align-items-end justify-content-end"> <select
                            class="form-select form-select-sm w-25" aria-label=".form-select-sm example">
                            <option selected>List for stars</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select></div>
                </div>
            </div>
        </div>

        <div class="container mt-5 shadow-lg  mb-5 bg-body rounded pt-3">
            <div class="row ">
                <div class="col-2 text-center ">
                    <div class=" ">
                        <p class="m-0 p-0 md-booking-search-p3">Skockhail Airport</p>
                        <h5 class="m-0 p-0 md-booking-search-p8">ARN</h5>
                        <p class="m-0 p-0">
                            <img src="{{ 'front/assets/img/mdBookings/Group 5.png' }}" class=" " alt="">
                        </p>
                        <h5 class="m-0 p-0 md-booking-search-p8">IST</h5>
                        <p class="m-0 p-0 md-booking-search-p3">Instanbul Airport</p>
                    </div>
                </div>
                <div class="col ">
                    <div class="row ">
                        <div class="col text-start ">
                            <div class=" text-center md-booking-flight-w border-bottom pb-4">
                                <p class="m-0">
                                    <img src="{{ 'front/assets/img/mdBookings/dirArrows.png' }}" class=" "
                                        alt="">
                                </p>
                                <p class="m-0">
                                    <span class="md-booking-search-p7" style="margin-left: -2rem">Stockholm-</span>
                                    <span class="md-booking-search-p8">ARN</span>
                                    <span class="food-search-p5" style="color: #4CDB06">18:20</span>
                                    <span class="mx-3">
                                        <img src="{{ 'front/assets/img/mdBookings/fligthTo.png' }}" class=" "
                                            alt="">
                                    </span>
                                    <span class="food-search-p5" style="color: #F31D1D">20:30</span>
                                    <span class="md-booking-search-p8">IST-</span>
                                    <span class="md-booking-search-p7">instanbul</span>
                                </p>
                                <p class="m-0 food-review-270">2 Hour 10 Min </p>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col">
                            <div class="d-flex gap-3 mt-4">
                                <p class="md-booking-search-p6 mb-0">Direct Flight</p>
                                <p class=" m-0">
                                    <span class="">
                                        <img src="{{ 'front/assets/img/mdBookings/suitcase.png' }}" class=" "
                                            alt="">
                                    </span>
                                    <span class="md-booking-search-p3 m-0">1 X 15KG</span>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-3 text-end">
                    <div class="d-flex flex-column gap-2 flex-wrap">
                        <div>
                            <img src="{{ 'front/assets/img/mdBookings/airlinesLogo.png' }}" class=" "
                                alt="">
                        </div>
                        <div class="">
                            <p class="m-0 md-booking-search-p8">1,200.00$</p>
                            <p class="md-booking-search-p3">Total 2,400.00$</p>
                        </div>
                        <p class="">
                            <a class="" href="{{ URL('md-booking-flight-ticket-page') }}">
                                <button class="btn btn-search-pill-booking1">Buy Ticket</button>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5 shadow-lg  mb-5 bg-body rounded pt-3">
            <div class="row ">
                <div class="col-2 text-center ">
                    <div class=" ">
                        <p class="m-0 p-0 md-booking-search-p3">Skockhail Airport</p>
                        <h5 class="m-0 p-0 md-booking-search-p8">ARN</h5>
                        <p class="m-0 p-0">
                            <img src="{{ 'front/assets/img/mdBookings/Group 5.png' }}" class=" " alt="">
                        </p>
                        <h5 class="m-0 p-0 md-booking-search-p8">IST</h5>
                        <p class="m-0 p-0 md-booking-search-p3">Instanbul Airport</p>
                    </div>
                </div>
                <div class="col ">
                    <div class="row ">
                        <div class="col text-start ">
                            <div class=" text-center md-booking-flight-w border-bottom pb-4">
                                <p class="m-0">
                                    <img src="{{ 'front/assets/img/mdBookings/dirArrows.png' }}" class=" "
                                        alt="">
                                </p>
                                <p class="m-0">
                                    <span class="md-booking-search-p7" style="margin-left: -2rem">Stockholm-</span>
                                    <span class="md-booking-search-p8">ARN</span>
                                    <span class="food-search-p5" style="color: #4CDB06">18:20</span>
                                    <span class="mx-3">
                                        <img src="{{ 'front/assets/img/mdBookings/fligthTo.png' }}" class=" "
                                            alt="">
                                    </span>
                                    <span class="food-search-p5" style="color: #F31D1D">20:30</span>
                                    <span class="md-booking-search-p8">IST-</span>
                                    <span class="md-booking-search-p7">instanbul</span>
                                </p>
                                <p class="m-0 food-review-270">2 Hour 10 Min </p>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col">
                            <div class="d-flex gap-3 mt-4">
                                <p class="md-booking-search-p6 mb-0">Direct Flight</p>
                                <p class=" m-0">
                                    <span class="">
                                        <img src="{{ 'front/assets/img/mdBookings/suitcase.png' }}" class=" "
                                            alt="">
                                    </span>
                                    <span class="md-booking-search-p3 m-0">1 X 15KG</span>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-3 text-end">
                    <div class="d-flex flex-column gap-2 flex-wrap">
                        <div>
                            <img src="{{ 'front/assets/img/mdBookings/Group 7.png' }}" class=" " alt="">
                        </div>
                        <div class="">
                            <p class="m-0 md-booking-search-p8">1,200.00$</p>
                            <p class="md-booking-search-p3">Total 2,400.00$</p>
                        </div>
                        <p class="">
                            <button class="btn btn-search-pill-booking1">Buy Ticket</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="md-booking-footer mt-3">
            <img src="{{ 'front/assets/img/appScreenFooter.png' }}" alt="" class="footer-image">
        </div>
    </div>
@endsection
@section('script')
    <script>
        document.getElementById('custom-select-button').addEventListener('click', function() {
            document.getElementById('selectWithOptions').click();
        });
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $(function() {
            $(function() {
            $('input[name="hoteldaterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
            });
        });
        $(function() {
            $('input[name="flightfrom"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            })
        });
        $(function() {
            $('input[name="flightto"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            })
        });
        $(function() {
            $('input[name="vehicalfrom"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            })
        });
    </script>

    <script>
        $("#mdHealth").addClass('md-booking-home-page');
    </script>
    <script>
    $(document).ready(function () {
    $('.dropdown-header').on('click keypress', function (e) {
        if (e.type === 'click' || (e.type === 'keypress' && e.key === 'Enter')) {
        const dropdownList = $(this).next('.dropdown-list');
        dropdownList.slideToggle();
        }
    });

    $('.dropdown-list li').on('click', function () {
        const selectedValue = $(this).data('value');
        const header = $(this).parent().prev('.dropdown-header');
        header.text($(this).text()).click(); // Close dropdown after selection
        // Do something with the selected value if needed
        console.log('Selected value:', selectedValue);
    });
    });
</script>
@endsection
