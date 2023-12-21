@extends('front.layout.layout')
@section('content')
    <div>
        <div>
            <img src="{{ 'front/assets/img/mdBookings/mdBookingsHeader.png' }}" class="position-absolute banner-img "
                alt="">
            <div class="position-relative  d-flex flex-column  align-items-center banner">
                <p class="green-color banner-p">YOUR SEARCH</p>
                <p class="fw-bold hotel-size"> Results
                </p>
            </div>
        </div>

        <div>
            <div class="container  mt-5">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        {{-- <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button> --}}
                        <div id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                            class="nav-link active  d-flex justify-content-center align-items-center main-mid-seaction">
                            <img src="{{ 'front/assets/img/mdBookings/ic_baseline-hotel.png' }}" alt="">
                            <span class="fs-6 fw-bold mx-1 text-dark"> Hotel</span>
                        </div>
                    </li>
                    <li class="nav-item" role="presentation">
                        {{-- <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button> --}}
                        <div id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            class="nav-link   d-flex justify-content-center align-items-center main-mid-seaction">
                            <img src="{{ 'front/assets/img/mdBookings/bxs_plane-take-off.png' }}" alt="">
                            <span class="fs-6 fw-bold mx-1 text-dark">Flight</span>
                        </div>
                    </li>
                    <li class="nav-item" role="presentation">
                        <div id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                            class="nav-link   d-flex justify-content-center align-items-center main-mid-seaction">
                            <img src="{{ 'front/assets/img/mdBookings/Vector (1).png' }}" alt="">
                            <span class="fs-6 fw-bold mx-1 text-dark">Vehicle</span>
                        </div>
                    </li>
                </ul>
                <div class="tab-content main-mid-seaction-h1 bg-body rounded  " id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="shadow p-3 mb-5 bg-body roundedshadow">
                            <div class="row gap-3 m-1">
                                <div class="col  main-mid-seaction borer-color custom-select">
                                    <div class="d-flex justify-content-center align-items-center h-100 "
                                        id="custom-select-button">
                                        <img src="{{ 'front/assets/img/mdBookings/ic_baseline-hotel.png' }}" alt="">
                                        {{-- <span>Wherer are you going?</span> --}}
                                        <select class="form-control border-0 pointer-cursor" id="floatingSelect"
                                            aria-label="Floating label select example">
                                            <option value="1">Wherer are you going?</option>
                                            <option value="2">One</option>
                                            <option value="3">Two</option>
                                            <option value="4">Three</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col  main-mid-seaction borer-color custom-select">
                                    <div class="d-flex justify-content-center align-items-center h-100 "
                                        id="custom-select-button">
                                        <img src="{{ 'front/assets/img/mdBookings/mdi_person.png' }}" alt="">
                                        {{-- <span>Wherer are you going?</span> --}}
                                        <select class="form-control border-0 w-100" id="floatingSelect"
                                            aria-label="Floating label select example">
                                            <option value="1">2 Adults-1Room</option>
                                            <option value="2">One</option>
                                            <option value="3">Two</option>
                                            <option value="4">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col main-mid-seaction borer-color">

                                    <div id="reportrange"
                                        class="date-range-picker-div d-flex justify-content-center align-items-center h-100 "
                                        name="daterange">
                                        {{-- <i class="fa fa-calendar"></i>&nbsp; --}}
                                        <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt=""
                                            class="mx-2">
                                        <input type="text" name="daterange"
                                            class="form-control w-100 m-0 p-0 border-0 bg-light" value="Daily" />
                                        <span></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <button class="btn-search-pill-food ">Research</button>
                                </div>
                            </div>
                        </div>
                        {{-- <div>
                        <img src="{{ 'front/assets/img/mdBookings/flights.png' }}" alt="" class=" image1">
                    </div> --}}
                    </div>

                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="shadow p-3 mb-5 bg-body roundedshadow">
                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                <div class="row gap-2 m-1">
                                    <div class="col main-mid-seaction borer-color">
                                        <div class="d-flex justify-content-center align-items-center h-100">
                                            <img src="{{ 'front/assets/img/mdBookings/bxs_plane-take-off.png' }}"
                                                alt="">
                                            <span class="ms-1">From </span><span class="fw-bold ms-1">Stockholm</span>
                                        </div>
                                    </div>
                                    <div class="col-1 ">
                                        <div class="d-flex justify-content-center align-items-center h-100">
                                            <img src="{{ 'front/assets/img/mdBookings/flightDir.png' }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col main-mid-seaction borer-color">
                                        <div class="d-flex justify-content-center align-items-center h-100">
                                            <img src="{{ 'front/assets/img/mdBookings/Vector.png' }}" alt="">
                                            <span class="ms-1">To</span><span class="fw-bold ms-1 ">istanbul</span>
                                        </div>
                                    </div>
                                    <div class="col main-mid-seaction ">
                                        <div class="d-flex justify-content-center align-items-center h-100">
                                            <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="">
                                            {{-- <input type="time" id="datePicker" name="calendar"
                                                class="form-control input1 border-0"> --}}
                                            <span class="ms-1">17:12</span>
                                        </div>
                                    </div>
                                    <div class="col main-mid-seaction borer-color">
                                        <div class="d-flex justify-content-center align-items-center h-100">
                                            <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="">
                                            {{-- <input type="time" id="datePicker" name="calendar"
                                                class="form-control input1 border-0"> --}}
                                            <span class="ms-1">21:12</span>
                                        </div>
                                    </div>
                                    <div class="col ">
                                        <button class="btn-search-pill-food ms-1">Search</button>
                                    </div>
                                </div>
                            </div>

                            <div class="w-75 d-flex justify-content-between align-items-center flex-wrap mt-3">
                                <div>One Way</div>
                                <div>
                                    <img src="{{ 'front/assets/img/mdBookings/Rectangle 883.png' }}" alt="">
                                    <span>Two Way</span>
                                </div>
                                <div class="d-flex">
                                    <p class="fw-bold">Fight Details:</p>
                                    <div class="form-floating">
                                        <select class="border-0">
                                            <option data-display="Select" selected>12 Aug</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <p class="fw-bold">Person:</p>
                                    <div class="form-floating">
                                        <select class=" border-0">
                                            <option data-display="Select " selected>12 Aug</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div>
                        <img src="{{ 'front/assets/img/mdBookings/flights.png' }}" alt="" class=" image1">
                    </div> --}}
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div>
                            <div class="container">
                                <div class="shadow p-3 mb-5 bg-body roundedshadow">
                                    <div class="row gap-3 m-1">
                                        <div class="col borer-color main-mid-seaction">
                                            <div class="d-flex justify-content-center align-items-center h-100">
                                                <img src="{{ 'front/assets/img/mdBookings/bxs_plane-take-off.png' }}"
                                                    alt="">
                                                <span>Pick up Location</span>
                                            </div>
                                        </div>
                                        <div class="col borer-color main-mid-seaction">
                                            <div class="d-flex justify-content-center align-items-center h-100">
                                                <img src="{{ 'front/assets/img/mdBookings/Group 64.png' }}"
                                                    alt="">
                                                <span>1712
                                                    <img src="{{ 'front/assets/img/mdBookings/Vector (2).png' }}"
                                                        alt="">
                                                    10.00
                                                    <img src="{{ 'front/assets/img/mdBookings/Arrow - Down Circle.png' }}"
                                                        alt="">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col borer-color main-mid-seaction">
                                            <div class="d-flex justify-content-center align-items-center h-100">
                                                <img src="{{ 'front/assets/img/mdBookings/Vector (2).png' }}"
                                                    alt="">
                                                <span>1712
                                                    <img src="{{ 'front/assets/img/mdBookings/Group 56.png' }}"
                                                        alt="">
                                                    10.00
                                                    <img src="{{ 'front/assets/img/mdBookings/Arrow - Down Circle.png' }}"
                                                        alt="">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col main-mid-seaction">
                                            <button class="btn-search-pill-food ">Search</button>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div>
                                <img src="{{ 'front/assets/img/mdBookings/flights.png' }}" alt=""
                                    class=" image1">
                            </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container shadow-lg p-3 mb-5 bg-body rounded">
            <div class="row">
                <div class="col">
                    <div class="">
                        <img src="{{ 'front/assets/img/mdBookings/image 59.png' }}" class="" alt="">
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex m-0">
                        <div class="">
                            <img src="{{ 'front/assets/img/mdBookings/image 60.png' }}" class="" alt="">
                        </div>
                        <p class="">
                            <span class="md-booking-search-p5" style="color: #000000">Excellent</span>
                            <img src="{{ 'front/assets/img/mdBookings/Rectangle 651.png' }}"
                                class="position-absolute z-index-0 " alt="" style="width:3%;height:4%">
                            <span class="position-relative booking-search-p1 " style="color: #000000" text-center>
                                4.8
                            </span>
                        </p>
                    </div>
                    <div class="d-flex flex-column gap-2">
                        <p class=" md-booking-search-p4 m-0" style="color: #000000">Fiat Fiorino 1.3 mJet</p>
                        <div class="d-flex gap-3 m-0 vehicle-p1">
                            <p class="m-0 ">
                                <span class="">
                                    <img src="{{ 'front/assets/img/mdBookings/seat.png' }}" class=""
                                        alt="">
                                </span>
                                <span class="">7.1</span>
                            </p>
                            <p class="m-0">
                                <span class="">
                                    <img src="{{ 'front/assets/img/mdBookings/petrol.png' }}" class=""
                                        alt="">
                                </span>
                                <span class="">Gasoline</span>
                            </p>

                            <p class="m-0">
                                <span class="">
                                    <img src="{{ 'front/assets/img/mdBookings/Vector (3).png' }}" class=""
                                        alt="">
                                </span>
                                <span class="">No Smoking</span>
                            </p>
                            <p class="m-0">
                                <span class="">
                                    <img src="{{ 'front/assets/img/mdBookings/Vector (4).png' }}" class=""
                                        alt="">
                                </span>
                                <span class="">Wi-Fi</span>
                            </p>
                        </div>
                        <div class="d-flex gap-3 m-0 vehicle-p1">
                            <p class="m-0">
                                <span class="">
                                    <img src="{{ 'front/assets/img/mdBookings/Group 8.png' }}" class=""
                                        alt="">
                                </span>
                                <span class="">1500KM</span>
                            </p>
                            <p class="m-0">
                                <span class="">
                                    <img src="{{ 'front/assets/img/mdBookings/Group.png' }}" class=""
                                        alt="">
                                </span>
                                <span class="">Manual</span>
                            </p>
                        </div>
                        <div>
                            <p class="m-0 vehicle-p2">Vehicle Class</p>
                            <p class="m-0 vehicle-p3">Economy</p>
                        </div>
                    </div>
                </div>
                <div class="col text-end">
                    <div class="">
                        <div class="">
                            <p class="m-0">
                                <span class="md-booking-search-p5">Daily</span>
                                <span class="vehicle-p4">484,90$</span>
                            </p>
                            <p class="m-0 md-booking-search-p6">Toatal Price for 5 days</p>
                            <p class="m-0 md-booking-search-p4" style="color: #000000">2,33456.00$</p>
                        </div>
                        <button class="btn btn-search-pill-booking2 mt-5">Book Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
