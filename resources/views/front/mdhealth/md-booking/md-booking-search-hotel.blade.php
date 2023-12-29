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
                <div class="tab-content  bg-body rounded  " id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="shadow p-3 mb-5 bg-body roundedshadow">
                            <div class="row g-0 gap-3 ">
                                {{-- <div class="col  main-mid-seaction borer-color custom-select">
                                    <div class="d-flex justify-content-center align-items-center h-100 "
                                        id="custom-select-button">
                                        <img src="{{ 'front/assets/img/mdBookings/ic_baseline-hotel.png' }}" alt="">

                                        <select class="form-control border-0 pointer-cursor" id="floatingSelect"
                                            aria-label="Floating label select example">
                                            <option value="1">Wherer are you going?</option>
                                            <option value="2">One</option>
                                            <option value="3">Two</option>
                                            <option value="4">Three</option>
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="col">
                                    <div class="form-floating booking-box-h" style="padding: 0">
                                        <img src="{{ 'front/assets/img/mdBookings/ic_baseline-hotel.png' }}" alt="" class="position-absolute booking-img2" >
                                        <select class="form-select position-relative booking-select1" id="floatingSelect " aria-label="Floating label select example"
                                            style="padding:0 2rem 0">
                                            <option data-display="Select" selected>Wherer are you going?</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                        {{-- <label for="floatingSelect" class="mid-food-sub"> Food Type</label> --}}
                                    </div>
                                </div>
                                {{-- <div class="col  main-mid-seaction borer-color custom-select">
                                    <div class="d-flex justify-content-center align-items-center h-100 "
                                        id="custom-select-button">
                                        <img src="{{ 'front/assets/img/mdBookings/mdi_person.png' }}" alt="">
                                        <select class="form-control border-0 w-100" id="floatingSelect"
                                            aria-label="Floating label select example">
                                            <option value="1">2 Adults-1Room</option>
                                            <option value="2">One</option>
                                            <option value="3">Two</option>
                                            <option value="4">Three</option>
                                        </select>
                                    </div>
                                </div> --}}

                                <div class="col">
                                    <div class="col">
                                        <div class="form-floating booking-box-h" style="padding: 0">
                                            <img src="{{ 'front/assets/img/mdBookings/mdi_person.png' }}" alt="" class="position-absolute booking-img2" >

                                            <select class="form-select position-relative booking-select1" id="floatingSelect " aria-label="Floating label select example"
                                                style="padding:0 2rem 0">
                                                <option data-display="Select" selected>2 Adults-1Room</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            {{-- <label for="floatingSelect" class="mid-food-sub"> Food Type</label> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col main-mid-seaction borer-color booking-box-h">

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
                                    <a href="{{url('md-booking-search-hotel-page')}}">
                                        <button class="btn-search-pill-booking3" style="height: 57px">Search</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        {{-- <div>
                        <img src="{{ 'front/assets/img/mdBookings/flights.png' }}" alt="" class=" image1">
                    </div> --}}
                    </div>

                    {{-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="shadow p-3 mb-5 bg-body roundedshadow">
                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                <div class="row gap-2 m-1">
                                    <div class="col main-mid-seaction borer-color booking-box-h">
                                        <div class="d-flex justify-content-center align-items-center h-100">
                                            <img src="{{ 'front/assets/img/mdBookings/bxs_plane-take-off.png' }}"
                                                alt="">
                                            <span class="ms-1">From</span>
                                        </div>
                                    </div>
                                    <div class="col-1 ">
                                        <div class="d-flex justify-content-center align-items-center h-100">
                                            <img src="{{ 'front/assets/img/mdBookings/flightDir.png' }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col main-mid-seaction borer-color booking-box-h">
                                        <div class="d-flex justify-content-center align-items-center h-100">
                                            <img src="{{ 'front/assets/img/mdBookings/Vector.png' }}" alt="">
                                            <span class="ms-1">To</span>
                                        </div>
                                    </div>
                                    <div class="col main-mid-seaction booking-box-h">
                                        <div class="d-flex justify-content-center align-items-center h-100">
                                            <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="">
                                            <input type="time" id="datePicker" name="calendar"
                                                class="form-control input1 border-0">

                                        </div>
                                    </div>
                                    <div class="col main-mid-seaction borer-color booking-box-h">
                                        <div class="d-flex justify-content-center align-items-center h-100">
                                            <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="">
                                            <input type="time" id="datePicker" name="calendar"
                                                class="form-control input1 border-0">

                                        </div>
                                    </div>
                                    <div class="col ">
                                        <button class="btn btn-search-pill-food ms-1" style="height: 57px">Search</button>
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

                    </div> --}}
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="shadow p-3 mb-5 bg-body roundedshadow">
                            <div class="">
                                <div class="row g-0 gap-3">
                                    <div class="col border booking-box-h">
                                        <div class="d-flex flex-column justify-content-center align-items-start h-100">
                                            <div class="ms-1">
                                                <img src="{{ 'front/assets/img/mdBookings/bxs_plane-take-off.png' }}"
                                                    alt="">
                                                <span class="ms-1">From</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1 ">
                                        <div class="d-flex  justify-content-center align-items-center h-100">
                                            <img src="{{ 'front/assets/img/mdBookings/flightDir.png' }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col border booking-box-h">
                                        <div class="d-flex flex-column justify-content-center align-items-start h-100">
                                            <div class="ms-1">
                                                <img src="{{ 'front/assets/img/mdBookings/Vector.png' }}" alt="">
                                                <span class="">To</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col booking-box-h">
                                        <div class="d-flex flex-column justify-content-center align-items-start h-100">
                                            <div class="ms-1">
                                                <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}"
                                                    alt="">
                                                {{-- <input type="time" id="datePicker" name="calendar"
                                                class="form-control input1 border-0"> --}}
                                                <span class="ms-1">17:12</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col border booking-box-h">
                                        <div class="d-flex flex-column justify-content-center align-items-start h-100">
                                            <div class="ms-1">
                                                <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}"
                                                    alt="">
                                                {{-- <input type="time" id="datePicker" name="calendar"
                                                class="form-control input1 border-0"> --}}
                                                <span class="ms-1">21:12</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col ">
                                        <a class="" href="{{ URL('md-booking-search-flight-page') }}">
                                            <button class="btn btn-search-pill-booking3"
                                                style="height: 57px">Search</button>
                                        </a>
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
                        <div>
                            <img src="{{ 'front/assets/img/mdBookings/flights.png' }}" alt="" class=" image1">
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div>
                            <div class="container">
                                <div class="shadow p-3 mb-5 bg-body roundedshadow">
                                    <div class="row g-0 gap-3">
                                        <div class="col borer-color main-mid-seaction booking-box-h">
                                            <div class="d-flex flex-column justify-content-center align-items-start h-100">
                                                <div class="ms-1">
                                                <img src="{{ 'front/assets/img/mdBookings/bxs_plane-take-off.png' }}"
                                                    alt="">
                                                <span>Pick up Location</span>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col borer-color main-mid-seaction booking-box-h">
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
                                        <div class="col borer-color main-mid-seaction booking-box-h">
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
                                            <button class="btn-search-pill-booking3" style="height: 57px">Search</button>
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

        <div class="container mt-5 shadow-lg  mb-5 bg-body rounded">
            <div class="row m-0">
                <div class="col text-end w-100 ">
                    <span class="md-booking-search-p5" style="color: #000000">Excellent</span>
                    <img src="{{ 'front/assets/img/mdBookings/Rectangle 651.png' }}" class="position-absolute z-index-0 "
                        alt="" style="width:3%;height:4%">
                    <span class="position-relative booking-search-p1 " style="color: #000000" text-center>
                        4.8
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <img src="{{ 'front/assets/img/mdBookings/Rectangle 233.png' }}" class="" alt="">
                </div>
                <div class="col border-end mx-4 ms-0">
                    <p class="m-0 p-0 food-factory">Renaissence Hotel Besiktas</p>
                    <p class="m-0 p-0">
                        <span class="">
                            <img src="{{ 'front/assets/img/mdFoods/mdi_location.png' }}" class="" alt="">
                        </span>
                        <span class="md-booking-search-p3">Distance to hospital</span>
                        <span class="md-booking-search-p2">3.7KM</span>
                    </p>
                    <p class="md-booking-search-p3">
                        <span class="">
                            <img src="{{ 'front/assets/img/mdBookings/bi_star-fill.png' }}" class=""
                                alt="">
                        </span>
                        <span class="">4 star Hotel</span>
                    </p>
                    <p class="m-0 md-booking-search-p4">Standart Room</p>
                    <p class="md-booking-search-p3">
                        Television,Suitable for wheelchair use,Cable TV Series, Mini bar,Housekeeping
                    </p>
                </div>
                <div class="col">
                    <p class="m-0 md-booking-search-p5">Per Night Price</p>
                    <p class="food-search-p3">1,2999.00$</p>
                    <p class="m-0 md-booking-search-p6">Total Price for 7 days</p>
                    <p class="md-booking-search-p4" style="color: #000000">9,9999.00$</p>
                    <p class="">
                        <a class="" href="{{URL('md-booking-reservation-details-page')}}" >
                            <button class="btn btn-search-pill-food1">Book Hotel</button>
                            </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="container mt-5 shadow-lg  mb-5 bg-body rounded">
            <div class="row m-0">
                <div class="col text-end w-100 ">
                    <span class="md-booking-search-p5" style="color: #000000">Excellent</span>
                    <img src="{{ 'front/assets/img/mdBookings/Rectangle 651.png' }}" class="position-absolute z-index-0 "
                        alt="" style="width:3%;height:4%">
                    <span class="position-relative booking-search-p1 " style="color: #000000" text-center>
                        4.8
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <img src="{{ 'front/assets/img/mdBookings/Rectangle 233.png' }}" class="" alt="">
                </div>
                <div class="col border-end mx-4 ms-0">
                    <p class="m-0 p-0 food-factory">Renaissence Hotel Besiktas</p>
                    <p class="m-0 p-0">
                        <span class="">
                            <img src="{{ 'front/assets/img/mdFoods/mdi_location.png' }}" class="" alt="">
                        </span>
                        <span class="md-booking-search-p3">Distance to hospital</span>
                        <span class="md-booking-search-p2">3.7KM</span>
                    </p>
                    <p class="md-booking-search-p3">
                        <span class="">
                            <img src="{{ 'front/assets/img/mdBookings/bi_star-fill.png' }}" class=""
                                alt="">
                        </span>
                        <span class="">4 star Hotel</span>
                    </p>
                    <p class="m-0 md-booking-search-p4">Standart Room</p>
                    <p class="md-booking-search-p3">
                        Television,Suitable for wheelchair use,Cable TV Series, Mini bar,Housekeeping
                    </p>
                </div>
                <div class="col">
                    <p class="m-0 md-booking-search-p5">Per Night Price</p>
                    <p class="food-search-p3">1,2999.00$</p>
                    <p class="m-0 md-booking-search-p6">Total Price for 7 days</p>
                    <p class="md-booking-search-p4" style="color: #000000">9,9999.00$</p>
                    <p class="">
                        <a class="" href="{{URL('md-booking-reservation-details-page')}}" >
                            <button class="btn btn-search-pill-food1">Book Hotel</button>
                            </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="container mt-5 shadow-lg  mb-5 bg-body rounded">
            <div class="row m-0">
                <div class="col text-end w-100 ">
                    <span class="md-booking-search-p5" style="color: #000000">Excellent</span>
                    <img src="{{ 'front/assets/img/mdBookings/Rectangle 651.png' }}" class="position-absolute z-index-0 "
                        alt="" style="width:3%;height:4%">
                    <span class="position-relative booking-search-p1 " style="color: #000000" text-center>
                        4.8
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <img src="{{ 'front/assets/img/mdBookings/Rectangle 233.png' }}" class="" alt="">
                </div>
                <div class="col border-end mx-4 ms-0">
                    <p class="m-0 p-0 food-factory">Renaissence Hotel Besiktas</p>
                    <p class="m-0 p-0">
                        <span class="">
                            <img src="{{ 'front/assets/img/mdFoods/mdi_location.png' }}" class="" alt="">
                        </span>
                        <span class="md-booking-search-p3">Distance to hospital</span>
                        <span class="md-booking-search-p2">3.7KM</span>
                    </p>
                    <p class="md-booking-search-p3">
                        <span class="">
                            <img src="{{ 'front/assets/img/mdBookings/bi_star-fill.png' }}" class=""
                                alt="">
                        </span>
                        <span class="">4 star Hotel</span>
                    </p>
                    <p class="m-0 md-booking-search-p4">Standart Room</p>
                    <p class="md-booking-search-p3">
                        Television,Suitable for wheelchair use,Cable TV Series, Mini bar,Housekeeping
                    </p>
                </div>
                <div class="col">
                    <p class="m-0 md-booking-search-p5">Per Night Price</p>
                    <p class="food-search-p3">1,2999.00$</p>
                    <p class="m-0 md-booking-search-p6">Total Price for 7 days</p>
                    <p class="md-booking-search-p4" style="color: #000000">9,9999.00$</p>
                    <p class="">
                        <a class="" href="{{URL('md-booking-reservation-details-page')}}" >
                        <button class="btn btn-search-pill-food1">Book Hotel</button>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="md-food-view-footer">
            <img src="{{ 'front/assets/img/appScreenFooter.png' }}" alt="" class="footer-image mt-5">
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
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                    .format('YYYY-MM-DD'));
            });
        });
    </script>
@endsection
