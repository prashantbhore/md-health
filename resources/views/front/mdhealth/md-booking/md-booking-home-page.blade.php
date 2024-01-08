@extends('front.layout.layout')
@section('content')

<style>
    .md-booking-serach-filter .select2-container .select2-selection--single {
        height: calc(3.5rem + 2px) !important;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .md-booking-serach-filter .select2-container {
        width: 100% !important;
    }

    .md-booking-serach-filter .select2-container--default .select2-selection--single .select2-selection__rendered {
        padding-left: 40px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        display: flex;
        position: unset !important;
        height: unset !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        position: unset !important;
    }

    .md-booking-serach-filter .select2-results {
        cursor: pointer !important;
    }

    .md-booking-serach-filter .select2-container--default .select2-selection--single {
        border: 1px solid #ced4da;
    }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css">

<div class="page-wrapper">
    {{-- banner --}}
    <div class="md-booking-banner-div pb-5">
        <img src="{{ 'front/assets/img/mdBookings/mdBookingsHeader.png' }}" class="position-absolute banner-img " alt="">
        <div class="position-relative  d-flex flex-column  align-items-center banner">
            <p class="green-color banner-p">BOOK RELIABLE & AFFORDABLE</p>
            <p class="fw-bold hotel-size"> HOTEL <span class="green-color">/ </span>FLIGHT<span class="green-color">/
                </span>VEHICLE
            </p>
            <p class="green-color banner-p">IN SECONDS</p>
        </div>
    </div>

    {{-- middle seaction --}}
    <div class="md-booking-middle-content">
        <div class="container mt-5">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    {{-- <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button> --}}
                    <div id="home-tab" data-bs-toggle="tab" data-bs-target="#home" class="nav-link active  d-flex justify-content-center align-items-center main-mid-seaction">
                        <img src="{{ 'front/assets/img/mdBookings/ic_baseline-hotel.png' }}" alt="">
                        <span class="fs-6 fw-bold mx-1 text-dark"> Hotel</span>
                    </div>
                </li>
                <li class="nav-item" role="presentation">
                    {{-- <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button> --}}
                    <div id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" class="nav-link   d-flex justify-content-center align-items-center main-mid-seaction">
                        <img src="{{ 'front/assets/img/mdBookings/bxs_plane-take-off.png' }}" alt="">
                        <span class="fs-6 fw-bold mx-1 text-dark">Flight</span>
                    </div>
                </li>
                <li class="nav-item" role="presentation">
                    <div id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" class="nav-link   d-flex justify-content-center align-items-center main-mid-seaction">
                        <img src="{{ 'front/assets/img/mdBookings/Vector (1).png' }}" alt="">
                        <span class="fs-6 fw-bold mx-1 text-dark">Vehicle</span>
                    </div>
                </li>
            </ul>
            <div class="tab-content main-mid-seaction-h1 bg-body rounded  " id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="md-booking-serach-filter p-3 mb-5">


                        <div class="row g-0 gap-3 ">
                            <div class="col">
                                <div class="form-floating booking-box-h" style="padding: 0">
                                    <img src="{{ 'front/assets/img/mdBookings/ic_baseline-hotel.png' }}" alt="" class="position-absolute booking-img2">
                                    <select id="SelExample">
                                        <option value="0">Delhi</option>
                                        <option value="1">Hyderabad</option>
                                        <option value="2">Vizag</option>
                                        <option value="3">Kochi</option>
                                        <option value="4">Anantapur</option>
                                        <option value="5">Dharmavaram</option>
                                        <option value="6">Bengaluru</option>
                                        <option value="7">Lucknow</option>
                                        <option value="8">Madurai</option>
                                    </select>
                                    {{-- <label for="floatingSelect" class="mid-food-sub"> Food Type</label> --}}
                                </div>
                            </div>
                            <div class="col">
                                <div class="col">
                                    <div class="form-floating booking-box-h" style="padding: 0">
                                        <img src="{{ 'front/assets/img/mdBookings/mdi_person.png' }}" alt="" class="position-absolute booking-img2">

                                        <select class="form-select position-relative booking-select1" id="floatingSelect " aria-label="Floating label select example" style="padding:0 2rem 0">
                                            <option data-display="Select" selected>2 Adults-1Room</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                            <option value="3">four</option>
                                        </select>
                                        {{-- <label for="floatingSelect" class="mid-food-sub"> Food Type</label> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col borer-color booking-box-h">
                                <div id="reportrange" class="date-range-picker-div d-flex justify-content-center align-items-center h-100 " name="daterange">
                                    {{-- <i class="fa fa-calendar"></i>&nbsp; --}}
                                    <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="" class="mx-2">
                                    <input type="text" name="daterange" class="form-control  m-0 p-0 border-0" value="Daily" />
                                    <span></span>
                                </div>
                            </div>
                            <div class="col">
                                {{-- hhhh --}}
                                <a class="" href="{{URL('md-booking-search-hotel-page')}}">
                                    <button class="btn-search-pill-booking3 " style="height: 57px">Search</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="md-booking-serach-filter p-3 mb-5">
                        <div class="">
                            <div class="row g-0 gap-3">
                                <div class="col border booking-box-h">
                                    <div class="d-flex flex-column justify-content-center align-items-start h-100">
                                        <div class="ms-1 d-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 30 30" fill="none">
                                                <path d="M3.75 22.5H26.25V25H3.75V22.5ZM26.8863 10.6588C26.7176 10.1524 26.3548 9.7337 25.8775 9.49483C25.4003 9.25596 24.8476 9.21645 24.3412 9.385L18.75 11.25L8.75 7.5L6.25 8.75L13.75 13.75L8.75 16.25L3.75 13.75L2.5 15L7.5 20L25.6838 13.1813C26.1716 12.9981 26.5695 12.6329 26.7937 12.1625C27.018 11.6921 27.0512 11.1531 26.8863 10.6588Z" fill="#111111" />
                                            </svg>
                                            <input type="text" name="flightfrom" class="form-control border-0" value="" placeholder="From" />
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
                                        <div class="ms-1 d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 18 17" fill="none">
                                                <path d="M15.2715 11.6092C15.6454 11.6967 16.0351 11.6184 16.3585 11.3908C16.682 11.1632 16.914 10.804 17.0058 10.3889V10.3878C17.0524 10.1772 17.0614 9.95828 17.0324 9.74369C17.0034 9.5291 16.9369 9.32303 16.8367 9.13724C16.7365 8.95146 16.6046 8.78961 16.4485 8.66096C16.2923 8.5323 16.1151 8.43936 15.9269 8.38745L11.7322 7.22458L7.00591 0.230932L4.96724 0L7.65399 6.76272L3.57574 6.30188L1.45641 2.37193L0.191406 2.6901L1.32807 8.35564L15.2715 11.6092ZM0.749656 14.3845H17.2497V16.4372H0.749656V14.3845Z" fill="#111111" />
                                            </svg>
                                            <input type="text" name="flightto" class="form-control border-0" value="" placeholder="To" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col border booking-box-h">
                                    <div class="d-flex flex-column justify-content-center align-items-start h-100">
                                        <div class="ms-1">
                                            <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="">
                                            {{-- <input type="time" id="datePicker" name="calendar"
                                                    class="form-control input1 border-0"> --}}
                                            <span class="ms-1">17:12</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col border booking-box-h">
                                    <div class="d-flex flex-column justify-content-center align-items-start h-100">
                                        <div class="ms-1">
                                            <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="">
                                            {{-- <input type="time" id="datePicker" name="calendar"
                                                    class="form-control input1 border-0"> --}}
                                            <span class="ms-1">21:12</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col ">
                                    <a class="" href="{{ URL('md-booking-search-flight-page') }}">
                                        <button class="btn btn-search-pill-booking3" style="height: 57px">Search</button>
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
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div>
                        <div class="">
                            <div class="md-booking-serach-filter mb-5">
                                <div class="row g-0 gap-3 p-3">
                                    <div class="col borer-color main-mid-seaction booking-box-h">

                                        <div class="d-flex flex-column justify-content-center align-items-start h-100">
                                            <div class="ms-1">
                                                <img src="{{ 'front/assets/img/mdBookings/bxs_plane-take-off.png' }}" alt="">
                                                <span>Pick up Location</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col borer-color main-mid-seaction booking-box-h">
                                        <div class="d-flex justify-content-center align-items-center h-100">
                                            <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="">
                                            <span>1712
                                                <img src="{{ 'front/assets/img/mdBookings/Vector (2).png' }}" alt="">
                                                10.00
                                                <img src="{{ 'front/assets/img/mdBookings/Arrow - Down Circle.png' }}" alt="">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col borer-color main-mid-seaction booking-box-h">
                                        <div class="d-flex justify-content-center align-items-center h-100">
                                            <img src="{{ 'front/assets/img/mdBookings/Vector (2).png' }}" alt="">
                                            <span>1712
                                                <img src="{{ 'front/assets/img/mdBookings/Group 56.png' }}" alt="">
                                                10.00
                                                <img src="{{ 'front/assets/img/mdBookings/Arrow - Down Circle.png' }}" alt="">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-search-pill-booking3" style="height: 57px">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md-booking-middle-img">
                <img src="{{ 'front/assets/img/mdBookings/flights.png' }}" alt="" class=" image1">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                .format('YYYY-MM-DD'));
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
</script>
{{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            const picker = datepicker('#datePicker', {
                // Options
            });

            // Open the date picker on button click
            document.getElementById('datePicker').addEventListener('click', function() {
                picker.show();
            });
        });
    </script> --}}
{{-- <script type="text/javascript">
        $('#datePicker').datepicker({
            format: 'DD - dd MM yyyy',
        })
    </script> --}}

<script>
    $("#mdHealth").addClass('md-booking-home-page');
</script>

<script>
    $(document).ready(function() {

        // Initialize select2
        $("#SelExample").select2();
        $("#SelExample").select2("val", "4");
        $('#SelExample option:selected').text('Vizag');
        // Read selected option
        $('#but_read').click(function() {
            var username = $('#SelExample option:selected').text();
            var userid = $('#SelExample').val();

            $('#result').text("id : " + userid + ", name : " + username);
        });
    });
</script>

<script>
    $('.add').click(function() {
        var th = $(this).closest('.wrap').find('.count');
        th.val(+th.val() + 1);
    });
    $('.sub').click(function() {
        var th = $(this).closest('.wrap').find('.count');
        if (th.val() > 0) th.val(+th.val() - 1);
    });
</script>
@endsection