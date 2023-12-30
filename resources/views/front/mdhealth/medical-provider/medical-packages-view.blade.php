@extends('front.layout.layout2')
@section('content')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <style>
        .multiple-checks {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .multiple-checks .form-check {
            width: 185px;
        }

        .daterangepicker select.monthselect {
            margin-right: 5%;
            width: 50%;
        }

        .daterangepicker select.yearselect {
            width: 50%;
        }

        .daterangepicker select.monthselect,
        .daterangepicker select.yearselect {
            font-size: 13px;
            padding: 3px 5px;
            border-radius: 5px;
            cursor: default;
            font-weight: 600;
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
                        <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                            <span>#MD3726378</span>
                            <a href="{{ url('medical-packages') }}"
                                class="d-flex align-items-center gap-1 text-decoration-none text-dark">
                                <img src="{{ asset('front/assets/img/backPage.png') }}" alt="">
                                <p class="mb-0">Back Dashboard</p>
                            </a>
                        </h5>
                        <div class="card-body">
                            <div class="form-div">
                                <form action="{{ url('/md-add-packages') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="platform_type" value="web">
                                    <div class="form-group mb-3">
                                        <label class="form-label">*Package Name</label>
                                        <input type="text" class="form-control" id="package_name" name="package_name"
                                            aria-describedby="foodname" placeholder="Package Name">
                                    </div>

                                    <div class="form-group d-flex flex-column mb-3">
                                        <label class="form-label">*Treatments Category</label>

                                        <select id="treatment_category_id" name="treatment_category_id" class="form-select"
                                            onchange="categoryselect(this.value)">
                                            <option value="" selected disabled>Choose</option>
                                            @foreach ($treatment_categories as $treatment_category)
                                                <option value="{{ $treatment_category['id'] }}">
                                                    {{ $treatment_category['product_category_name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group d-flex flex-column mb-3">
                                        <label class="form-label">*Treatments</label>
                                        <select id="treatment_id" name="treatment_id">
                                            <option value="">Treatments</option>
                                            <!-- Options will be dynamically populated here -->
                                        </select>
                                    </div>

                                    <div class="multiple-checkbox-div">
                                        <div class="form-group d-flex flex-column mb-5">
                                            <label class="form-label">Other Services (Selectable)</label>
                                            <p>Checked Values: <span id="checkedValues"></span></p>
                                            <input type="text" name="other_services" id="other_services" >
                                            {{-- value="{{!empty($hotel_details['other_services'])?$hotel_details['other_services']:''}}" --}}
                                        
                                            <div class="multiple-checks">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" value="Accomodition" id="foraccommodation">
                                                    {{-- {{ $hotel_details['accommodation'] ? 'checked' : '' }} --}}
                                                    <label class="form-check-label fw-500 fsb-1"
                                                        for="foraccomodition">Accomodition</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" value="Transportation" id="fortransportation">
                                                    <label class="form-check-label fw-500 fsb-1"
                                                        for="fortransportation">Transportation</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" value="Tour" id="fortour">
                                                    <label class="form-check-label fw-500 fsb-1" for="fortour">Tour</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" value="Translation" id="fortranslation">
                                                    <label class="form-check-label fw-500 fsb-1"
                                                        for="fortranslation">Translation</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" value="Visa Services" id="forvisaservice">
                                                    <label class="form-check-label fw-500 fsb-1" for="forvisaservice">Visa
                                                        Services</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" value="Ticket Services" id="forticketservice">
                                                    <label class="form-check-label fw-500 fsb-1"
                                                        for="forticketservice">Ticket Services</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" value="Ambulance Services"
                                                        id="forambulanceservice">
                                                    <label class="form-check-label fw-500 fsb-1"
                                                        for="forambulanceservice">Ambulance Services</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group mb-5 section-heading-div">
                                        <h6 class="section-heading">Treatment Period in Days</h6>
                                        <input type="text" class="form-control" id="foodname"
                                            aria-describedby="foodname" placeholder="1-3 Days">
                                    </div>

                                    <div class="form-group d-flex flex-column mb-5 section-heading-div">
                                        <h6 class="section-heading">Treatment Price</h6>
                                        <label class="form-label">Treatment Price (VAT Included Price) </label>
                                        <div class="input-icon-div">
                                            <input type="text" class="form-control" placeholder="Treatment Price">
                                            <span class="input-icon">₺</span>
                                        </div>
                                    </div>
                                    <div id="accommodationDiv">
                                        <div class="form-group d-flex flex-column mb-3 section-heading-div">
                                            <h6 class="section-heading">Acommodition Details</h6>
                                            <label class="form-label">Hotel Name</label>
                                            <select name="" id="">
                                                <option value="">Choose Hotel</option>
                                                <option value="">Choose Hotel 2</option>
                                                <option value="">Choose Hotel 3</option>
                                                <option value="">Choose Hotel 4</option>
                                            </select>
                                        </div>

                                        <div class="date-picker-div mb-5">
                                            <label class="form-label">Reservation Date</label>
                                            <div class="date-picker-card-div">
                                                <div class="input-container w-50" id="date-picker-container">
                                                    <!-- <label for="date-from">check-in</label> -->
                                                    <input type="text" name="check-in" class="date-icon w-100"
                                                        value="10/24/1984" />
                                                    <svg class="input-icon" width="18" height="18"
                                                        viewBox="0 0 16 17" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.6347 1.89601e-06C10.9916 -0.00083649 11.2739 0.27646 11.2747 0.646188L11.2755 1.27641C13.5914 1.45791 15.1212 3.03597 15.1237 5.45601L15.1328 12.5397C15.1361 15.1782 13.4785 16.8016 10.8215 16.8058L4.33125 16.8142C1.69084 16.8176 0.012462 15.1555 0.0091418 12.5094L5.57173e-06 5.50895C-0.00330907 3.07295 1.47253 1.49908 3.7884 1.28649L3.78757 0.656271C3.78674 0.286543 4.06066 0.00840671 4.42588 0.00840671C4.79111 0.00756642 5.06503 0.284862 5.06586 0.65459L5.06669 1.24279L9.99723 1.23607L9.9964 0.647868C9.99557 0.27814 10.2695 0.000844092 10.6347 1.89601e-06ZM10.9734 11.9313H10.9651C10.5833 11.9405 10.277 12.2607 10.2853 12.6472C10.2861 13.0338 10.594 13.3522 10.9759 13.3606C11.3652 13.3598 11.6806 13.0396 11.6798 12.6447C11.6798 12.2498 11.3635 11.9313 10.9734 11.9313ZM4.1337 11.9321C3.75187 11.9489 3.45305 12.2691 3.45388 12.6556C3.47131 13.0422 3.78674 13.3447 4.16856 13.327C4.54292 13.3102 4.84091 12.9901 4.82348 12.6035C4.81518 12.2254 4.50723 11.9313 4.1337 11.9321ZM7.55354 11.9279C7.17171 11.9456 6.87372 12.2649 6.87372 12.6514C6.89115 13.038 7.20658 13.3396 7.5884 13.3228C7.96193 13.3052 8.26075 12.9859 8.24332 12.5985C8.23502 12.2212 7.92707 11.9271 7.55354 11.9279ZM4.12955 8.90709C3.74772 8.92389 3.44973 9.24404 3.45056 9.63058C3.46716 10.0171 3.78342 10.3196 4.16524 10.302C4.53877 10.2852 4.83676 9.96501 4.81933 9.57848C4.81103 9.20035 4.50391 8.90625 4.12955 8.90709ZM7.55022 8.87768C7.16839 8.89448 6.86957 9.21463 6.8704 9.60117C6.887 9.9877 7.20326 10.2894 7.58508 10.2726C7.95861 10.2549 8.2566 9.9356 8.24 9.54907C8.23087 9.17094 7.92375 8.87684 7.55022 8.87768ZM10.9701 8.88188C10.5882 8.89028 10.2894 9.20119 10.2902 9.58772V9.59697C10.2985 9.9835 10.614 10.2768 10.9966 10.2684C11.3701 10.2591 11.6681 9.93897 11.6598 9.55243C11.6424 9.1827 11.3428 8.88104 10.9701 8.88188ZM9.99889 2.53012L5.06835 2.53684L5.06918 3.21664C5.06918 3.5788 4.79609 3.8645 4.43086 3.8645C4.06564 3.86534 3.79089 3.58048 3.79089 3.21832L3.79006 2.57129C2.17144 2.73347 1.27581 3.68468 1.2783 5.50727L1.27913 5.7686L13.8462 5.7518V5.45769C13.8105 3.65107 12.9041 2.70322 11.2772 2.56205L11.278 3.20908C11.278 3.5704 10.9966 3.85694 10.6397 3.85694C10.2745 3.85778 9.99972 3.57208 9.99972 3.21076L9.99889 2.53012Z"
                                                            fill="black"></path>
                                                    </svg>
                                                </div>
                                                <div class="input-container w-50" id="date-picker-container">
                                                    <!-- <label for="date-from">check-out</label> -->
                                                    <input type="text" name="check-out" class="date-icon w-100"
                                                        value="10/24/1984" />
                                                    <svg class="input-icon" width="18" height="18"
                                                        viewBox="0 0 16 17" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.6347 1.89601e-06C10.9916 -0.00083649 11.2739 0.27646 11.2747 0.646188L11.2755 1.27641C13.5914 1.45791 15.1212 3.03597 15.1237 5.45601L15.1328 12.5397C15.1361 15.1782 13.4785 16.8016 10.8215 16.8058L4.33125 16.8142C1.69084 16.8176 0.012462 15.1555 0.0091418 12.5094L5.57173e-06 5.50895C-0.00330907 3.07295 1.47253 1.49908 3.7884 1.28649L3.78757 0.656271C3.78674 0.286543 4.06066 0.00840671 4.42588 0.00840671C4.79111 0.00756642 5.06503 0.284862 5.06586 0.65459L5.06669 1.24279L9.99723 1.23607L9.9964 0.647868C9.99557 0.27814 10.2695 0.000844092 10.6347 1.89601e-06ZM10.9734 11.9313H10.9651C10.5833 11.9405 10.277 12.2607 10.2853 12.6472C10.2861 13.0338 10.594 13.3522 10.9759 13.3606C11.3652 13.3598 11.6806 13.0396 11.6798 12.6447C11.6798 12.2498 11.3635 11.9313 10.9734 11.9313ZM4.1337 11.9321C3.75187 11.9489 3.45305 12.2691 3.45388 12.6556C3.47131 13.0422 3.78674 13.3447 4.16856 13.327C4.54292 13.3102 4.84091 12.9901 4.82348 12.6035C4.81518 12.2254 4.50723 11.9313 4.1337 11.9321ZM7.55354 11.9279C7.17171 11.9456 6.87372 12.2649 6.87372 12.6514C6.89115 13.038 7.20658 13.3396 7.5884 13.3228C7.96193 13.3052 8.26075 12.9859 8.24332 12.5985C8.23502 12.2212 7.92707 11.9271 7.55354 11.9279ZM4.12955 8.90709C3.74772 8.92389 3.44973 9.24404 3.45056 9.63058C3.46716 10.0171 3.78342 10.3196 4.16524 10.302C4.53877 10.2852 4.83676 9.96501 4.81933 9.57848C4.81103 9.20035 4.50391 8.90625 4.12955 8.90709ZM7.55022 8.87768C7.16839 8.89448 6.86957 9.21463 6.8704 9.60117C6.887 9.9877 7.20326 10.2894 7.58508 10.2726C7.95861 10.2549 8.2566 9.9356 8.24 9.54907C8.23087 9.17094 7.92375 8.87684 7.55022 8.87768ZM10.9701 8.88188C10.5882 8.89028 10.2894 9.20119 10.2902 9.58772V9.59697C10.2985 9.9835 10.614 10.2768 10.9966 10.2684C11.3701 10.2591 11.6681 9.93897 11.6598 9.55243C11.6424 9.1827 11.3428 8.88104 10.9701 8.88188ZM9.99889 2.53012L5.06835 2.53684L5.06918 3.21664C5.06918 3.5788 4.79609 3.8645 4.43086 3.8645C4.06564 3.86534 3.79089 3.58048 3.79089 3.21832L3.79006 2.57129C2.17144 2.73347 1.27581 3.68468 1.2783 5.50727L1.27913 5.7686L13.8462 5.7518V5.45769C13.8105 3.65107 12.9041 2.70322 11.2772 2.56205L11.278 3.20908C11.278 3.5704 10.9966 3.85694 10.6397 3.85694C10.2745 3.85778 9.99972 3.57208 9.99972 3.21076L9.99889 2.53012Z"
                                                            fill="black"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="section-btns mb-5">
                                            <a href="javascript:void(0);"
                                                class="green-plate bg-green text-dark fw-700 fsb-1">Total Accomodition
                                                Price <span>0 ₺</span></a>
                                        </div>
                                    </div>
                                    <div id="transportationDiv">
                                        <div class="form-group d-flex flex-column mb-3 section-heading-div">
                                            <h6 class="section-heading">Transportation Details</h6>
                                            <label class="form-label">Vehicle</label>
                                            <select name="" id="">
                                                <option value="">Choose Vehicle</option>
                                                <option value="">Choose Vehicle 2</option>
                                                <option value="">Choose Vehicle 3</option>
                                                <option value="">Choose Vehicle 4</option>
                                            </select>
                                        </div>

                                        <div class="date-picker-div mb-5">
                                            <label class="form-label">Reservation Date</label>
                                            <div class="date-picker-card-div">
                                                <div class="input-container w-50" id="date-picker-container">
                                                    <!-- <label for="date-from">check-in</label> -->
                                                    <input type="text" name="check-in2" class="date-icon w-100"
                                                        value="10/24/1984" />
                                                    <svg class="input-icon" width="18" height="18"
                                                        viewBox="0 0 16 17" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.6347 1.89601e-06C10.9916 -0.00083649 11.2739 0.27646 11.2747 0.646188L11.2755 1.27641C13.5914 1.45791 15.1212 3.03597 15.1237 5.45601L15.1328 12.5397C15.1361 15.1782 13.4785 16.8016 10.8215 16.8058L4.33125 16.8142C1.69084 16.8176 0.012462 15.1555 0.0091418 12.5094L5.57173e-06 5.50895C-0.00330907 3.07295 1.47253 1.49908 3.7884 1.28649L3.78757 0.656271C3.78674 0.286543 4.06066 0.00840671 4.42588 0.00840671C4.79111 0.00756642 5.06503 0.284862 5.06586 0.65459L5.06669 1.24279L9.99723 1.23607L9.9964 0.647868C9.99557 0.27814 10.2695 0.000844092 10.6347 1.89601e-06ZM10.9734 11.9313H10.9651C10.5833 11.9405 10.277 12.2607 10.2853 12.6472C10.2861 13.0338 10.594 13.3522 10.9759 13.3606C11.3652 13.3598 11.6806 13.0396 11.6798 12.6447C11.6798 12.2498 11.3635 11.9313 10.9734 11.9313ZM4.1337 11.9321C3.75187 11.9489 3.45305 12.2691 3.45388 12.6556C3.47131 13.0422 3.78674 13.3447 4.16856 13.327C4.54292 13.3102 4.84091 12.9901 4.82348 12.6035C4.81518 12.2254 4.50723 11.9313 4.1337 11.9321ZM7.55354 11.9279C7.17171 11.9456 6.87372 12.2649 6.87372 12.6514C6.89115 13.038 7.20658 13.3396 7.5884 13.3228C7.96193 13.3052 8.26075 12.9859 8.24332 12.5985C8.23502 12.2212 7.92707 11.9271 7.55354 11.9279ZM4.12955 8.90709C3.74772 8.92389 3.44973 9.24404 3.45056 9.63058C3.46716 10.0171 3.78342 10.3196 4.16524 10.302C4.53877 10.2852 4.83676 9.96501 4.81933 9.57848C4.81103 9.20035 4.50391 8.90625 4.12955 8.90709ZM7.55022 8.87768C7.16839 8.89448 6.86957 9.21463 6.8704 9.60117C6.887 9.9877 7.20326 10.2894 7.58508 10.2726C7.95861 10.2549 8.2566 9.9356 8.24 9.54907C8.23087 9.17094 7.92375 8.87684 7.55022 8.87768ZM10.9701 8.88188C10.5882 8.89028 10.2894 9.20119 10.2902 9.58772V9.59697C10.2985 9.9835 10.614 10.2768 10.9966 10.2684C11.3701 10.2591 11.6681 9.93897 11.6598 9.55243C11.6424 9.1827 11.3428 8.88104 10.9701 8.88188ZM9.99889 2.53012L5.06835 2.53684L5.06918 3.21664C5.06918 3.5788 4.79609 3.8645 4.43086 3.8645C4.06564 3.86534 3.79089 3.58048 3.79089 3.21832L3.79006 2.57129C2.17144 2.73347 1.27581 3.68468 1.2783 5.50727L1.27913 5.7686L13.8462 5.7518V5.45769C13.8105 3.65107 12.9041 2.70322 11.2772 2.56205L11.278 3.20908C11.278 3.5704 10.9966 3.85694 10.6397 3.85694C10.2745 3.85778 9.99972 3.57208 9.99972 3.21076L9.99889 2.53012Z"
                                                            fill="black"></path>
                                                    </svg>
                                                </div>
                                                <div class="input-container w-50" id="date-picker-container">
                                                    <!-- <label for="date-from">check-out</label> -->
                                                    <input type="text" name="check-out2" class="date-icon w-100"
                                                        value="10/24/1984" />
                                                    <svg class="input-icon" width="18" height="18"
                                                        viewBox="0 0 16 17" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.6347 1.89601e-06C10.9916 -0.00083649 11.2739 0.27646 11.2747 0.646188L11.2755 1.27641C13.5914 1.45791 15.1212 3.03597 15.1237 5.45601L15.1328 12.5397C15.1361 15.1782 13.4785 16.8016 10.8215 16.8058L4.33125 16.8142C1.69084 16.8176 0.012462 15.1555 0.0091418 12.5094L5.57173e-06 5.50895C-0.00330907 3.07295 1.47253 1.49908 3.7884 1.28649L3.78757 0.656271C3.78674 0.286543 4.06066 0.00840671 4.42588 0.00840671C4.79111 0.00756642 5.06503 0.284862 5.06586 0.65459L5.06669 1.24279L9.99723 1.23607L9.9964 0.647868C9.99557 0.27814 10.2695 0.000844092 10.6347 1.89601e-06ZM10.9734 11.9313H10.9651C10.5833 11.9405 10.277 12.2607 10.2853 12.6472C10.2861 13.0338 10.594 13.3522 10.9759 13.3606C11.3652 13.3598 11.6806 13.0396 11.6798 12.6447C11.6798 12.2498 11.3635 11.9313 10.9734 11.9313ZM4.1337 11.9321C3.75187 11.9489 3.45305 12.2691 3.45388 12.6556C3.47131 13.0422 3.78674 13.3447 4.16856 13.327C4.54292 13.3102 4.84091 12.9901 4.82348 12.6035C4.81518 12.2254 4.50723 11.9313 4.1337 11.9321ZM7.55354 11.9279C7.17171 11.9456 6.87372 12.2649 6.87372 12.6514C6.89115 13.038 7.20658 13.3396 7.5884 13.3228C7.96193 13.3052 8.26075 12.9859 8.24332 12.5985C8.23502 12.2212 7.92707 11.9271 7.55354 11.9279ZM4.12955 8.90709C3.74772 8.92389 3.44973 9.24404 3.45056 9.63058C3.46716 10.0171 3.78342 10.3196 4.16524 10.302C4.53877 10.2852 4.83676 9.96501 4.81933 9.57848C4.81103 9.20035 4.50391 8.90625 4.12955 8.90709ZM7.55022 8.87768C7.16839 8.89448 6.86957 9.21463 6.8704 9.60117C6.887 9.9877 7.20326 10.2894 7.58508 10.2726C7.95861 10.2549 8.2566 9.9356 8.24 9.54907C8.23087 9.17094 7.92375 8.87684 7.55022 8.87768ZM10.9701 8.88188C10.5882 8.89028 10.2894 9.20119 10.2902 9.58772V9.59697C10.2985 9.9835 10.614 10.2768 10.9966 10.2684C11.3701 10.2591 11.6681 9.93897 11.6598 9.55243C11.6424 9.1827 11.3428 8.88104 10.9701 8.88188ZM9.99889 2.53012L5.06835 2.53684L5.06918 3.21664C5.06918 3.5788 4.79609 3.8645 4.43086 3.8645C4.06564 3.86534 3.79089 3.58048 3.79089 3.21832L3.79006 2.57129C2.17144 2.73347 1.27581 3.68468 1.2783 5.50727L1.27913 5.7686L13.8462 5.7518V5.45769C13.8105 3.65107 12.9041 2.70322 11.2772 2.56205L11.278 3.20908C11.278 3.5704 10.9966 3.85694 10.6397 3.85694C10.2745 3.85778 9.99972 3.57208 9.99972 3.21076L9.99889 2.53012Z"
                                                            fill="black"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="section-btns mb-5">
                                            <a href="javascript:void(0);"
                                                class="green-plate bg-green text-dark fw-700 fsb-1">Total Transportation
                                                Price <span>0 ₺</span></a>
                                        </div>
                                    </div>
                                    <div id="tourDiv">
                                        <div class="form-group d-flex flex-column mb-3 section-heading-div">
                                            <h6 class="section-heading">Tour Name</h6>
                                            <label class="form-label">Vehicle</label>
                                            <select name="" id="">
                                                <option value="">Tour Name</option>
                                                <option value="">Tour Name 2</option>
                                                <option value="">Tour Name 3</option>
                                                <option value="">Tour Name 4</option>
                                            </select>
                                        </div>

                                        <div class="date-picker-div mb-5">
                                            <label class="form-label">Reservation Date</label>
                                            <div class="date-picker-card-div">
                                                <div class="input-container w-50" id="date-picker-container">
                                                    <!-- <label for="date-from">check-in</label> -->
                                                    <input type="text" name="check-in3" class="date-icon w-100"
                                                        value="10/24/1984" />
                                                    <svg class="input-icon" width="18" height="18"
                                                        viewBox="0 0 16 17" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.6347 1.89601e-06C10.9916 -0.00083649 11.2739 0.27646 11.2747 0.646188L11.2755 1.27641C13.5914 1.45791 15.1212 3.03597 15.1237 5.45601L15.1328 12.5397C15.1361 15.1782 13.4785 16.8016 10.8215 16.8058L4.33125 16.8142C1.69084 16.8176 0.012462 15.1555 0.0091418 12.5094L5.57173e-06 5.50895C-0.00330907 3.07295 1.47253 1.49908 3.7884 1.28649L3.78757 0.656271C3.78674 0.286543 4.06066 0.00840671 4.42588 0.00840671C4.79111 0.00756642 5.06503 0.284862 5.06586 0.65459L5.06669 1.24279L9.99723 1.23607L9.9964 0.647868C9.99557 0.27814 10.2695 0.000844092 10.6347 1.89601e-06ZM10.9734 11.9313H10.9651C10.5833 11.9405 10.277 12.2607 10.2853 12.6472C10.2861 13.0338 10.594 13.3522 10.9759 13.3606C11.3652 13.3598 11.6806 13.0396 11.6798 12.6447C11.6798 12.2498 11.3635 11.9313 10.9734 11.9313ZM4.1337 11.9321C3.75187 11.9489 3.45305 12.2691 3.45388 12.6556C3.47131 13.0422 3.78674 13.3447 4.16856 13.327C4.54292 13.3102 4.84091 12.9901 4.82348 12.6035C4.81518 12.2254 4.50723 11.9313 4.1337 11.9321ZM7.55354 11.9279C7.17171 11.9456 6.87372 12.2649 6.87372 12.6514C6.89115 13.038 7.20658 13.3396 7.5884 13.3228C7.96193 13.3052 8.26075 12.9859 8.24332 12.5985C8.23502 12.2212 7.92707 11.9271 7.55354 11.9279ZM4.12955 8.90709C3.74772 8.92389 3.44973 9.24404 3.45056 9.63058C3.46716 10.0171 3.78342 10.3196 4.16524 10.302C4.53877 10.2852 4.83676 9.96501 4.81933 9.57848C4.81103 9.20035 4.50391 8.90625 4.12955 8.90709ZM7.55022 8.87768C7.16839 8.89448 6.86957 9.21463 6.8704 9.60117C6.887 9.9877 7.20326 10.2894 7.58508 10.2726C7.95861 10.2549 8.2566 9.9356 8.24 9.54907C8.23087 9.17094 7.92375 8.87684 7.55022 8.87768ZM10.9701 8.88188C10.5882 8.89028 10.2894 9.20119 10.2902 9.58772V9.59697C10.2985 9.9835 10.614 10.2768 10.9966 10.2684C11.3701 10.2591 11.6681 9.93897 11.6598 9.55243C11.6424 9.1827 11.3428 8.88104 10.9701 8.88188ZM9.99889 2.53012L5.06835 2.53684L5.06918 3.21664C5.06918 3.5788 4.79609 3.8645 4.43086 3.8645C4.06564 3.86534 3.79089 3.58048 3.79089 3.21832L3.79006 2.57129C2.17144 2.73347 1.27581 3.68468 1.2783 5.50727L1.27913 5.7686L13.8462 5.7518V5.45769C13.8105 3.65107 12.9041 2.70322 11.2772 2.56205L11.278 3.20908C11.278 3.5704 10.9966 3.85694 10.6397 3.85694C10.2745 3.85778 9.99972 3.57208 9.99972 3.21076L9.99889 2.53012Z"
                                                            fill="black"></path>
                                                    </svg>
                                                </div>
                                                <div class="input-container w-50" id="date-picker-container">
                                                    <!-- <label for="date-from">check-out</label> -->
                                                    <input type="text" name="check-out3" class="date-icon w-100"
                                                        value="10/24/1984" />
                                                    <svg class="input-icon" width="18" height="18"
                                                        viewBox="0 0 16 17" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.6347 1.89601e-06C10.9916 -0.00083649 11.2739 0.27646 11.2747 0.646188L11.2755 1.27641C13.5914 1.45791 15.1212 3.03597 15.1237 5.45601L15.1328 12.5397C15.1361 15.1782 13.4785 16.8016 10.8215 16.8058L4.33125 16.8142C1.69084 16.8176 0.012462 15.1555 0.0091418 12.5094L5.57173e-06 5.50895C-0.00330907 3.07295 1.47253 1.49908 3.7884 1.28649L3.78757 0.656271C3.78674 0.286543 4.06066 0.00840671 4.42588 0.00840671C4.79111 0.00756642 5.06503 0.284862 5.06586 0.65459L5.06669 1.24279L9.99723 1.23607L9.9964 0.647868C9.99557 0.27814 10.2695 0.000844092 10.6347 1.89601e-06ZM10.9734 11.9313H10.9651C10.5833 11.9405 10.277 12.2607 10.2853 12.6472C10.2861 13.0338 10.594 13.3522 10.9759 13.3606C11.3652 13.3598 11.6806 13.0396 11.6798 12.6447C11.6798 12.2498 11.3635 11.9313 10.9734 11.9313ZM4.1337 11.9321C3.75187 11.9489 3.45305 12.2691 3.45388 12.6556C3.47131 13.0422 3.78674 13.3447 4.16856 13.327C4.54292 13.3102 4.84091 12.9901 4.82348 12.6035C4.81518 12.2254 4.50723 11.9313 4.1337 11.9321ZM7.55354 11.9279C7.17171 11.9456 6.87372 12.2649 6.87372 12.6514C6.89115 13.038 7.20658 13.3396 7.5884 13.3228C7.96193 13.3052 8.26075 12.9859 8.24332 12.5985C8.23502 12.2212 7.92707 11.9271 7.55354 11.9279ZM4.12955 8.90709C3.74772 8.92389 3.44973 9.24404 3.45056 9.63058C3.46716 10.0171 3.78342 10.3196 4.16524 10.302C4.53877 10.2852 4.83676 9.96501 4.81933 9.57848C4.81103 9.20035 4.50391 8.90625 4.12955 8.90709ZM7.55022 8.87768C7.16839 8.89448 6.86957 9.21463 6.8704 9.60117C6.887 9.9877 7.20326 10.2894 7.58508 10.2726C7.95861 10.2549 8.2566 9.9356 8.24 9.54907C8.23087 9.17094 7.92375 8.87684 7.55022 8.87768ZM10.9701 8.88188C10.5882 8.89028 10.2894 9.20119 10.2902 9.58772V9.59697C10.2985 9.9835 10.614 10.2768 10.9966 10.2684C11.3701 10.2591 11.6681 9.93897 11.6598 9.55243C11.6424 9.1827 11.3428 8.88104 10.9701 8.88188ZM9.99889 2.53012L5.06835 2.53684L5.06918 3.21664C5.06918 3.5788 4.79609 3.8645 4.43086 3.8645C4.06564 3.86534 3.79089 3.58048 3.79089 3.21832L3.79006 2.57129C2.17144 2.73347 1.27581 3.68468 1.2783 5.50727L1.27913 5.7686L13.8462 5.7518V5.45769C13.8105 3.65107 12.9041 2.70322 11.2772 2.56205L11.278 3.20908C11.278 3.5704 10.9966 3.85694 10.6397 3.85694C10.2745 3.85778 9.99972 3.57208 9.99972 3.21076L9.99889 2.53012Z"
                                                            fill="black"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="section-btns mb-5">
                                            <a href="javascript:void(0);"
                                                class="green-plate bg-green text-dark fw-700 fsb-1">Total Tour Price
                                                <span>0 ₺</span></a>
                                        </div>
                                    </div>
                                    <div id="translationDiv">
                                        <div class="form-group d-flex flex-column mb-5 section-heading-div">
                                            <h6 class="section-heading">Translation Price</h6>
                                            <label class="form-label">Translation Price (VAT Included Price) </label>
                                            <div class="input-icon-div">
                                                <input type="text" class="form-control"
                                                    placeholder="Translation Price">
                                                <span class="input-icon">₺</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="visaserviceDiv">
                                        <div class="form-group mb-3 section-heading-div">
                                            <h6 class="section-heading">Visa Service Details</h6>
                                            <label class="form-label" for="featureproducts">Please Written Visa Service
                                                Details</label>
                                            <input type="text" class="form-control" id="foodname"
                                                aria-describedby="foodname" placeholder="Write Here Please">
                                        </div>

                                        <div class="form-group d-flex flex-column mb-5">
                                            <label class="form-label">Visa Service Price</label>
                                            <div class="input-icon-div ">
                                                <input type="text" class="form-control" placeholder="Price">
                                                <span class="input-icon">₺</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="ticketserviceDiv">
                                        <div class="form-group d-flex flex-column mb-5 section-heading-div">
                                            <h6 class="section-heading">Ticket Service</h6>
                                            <label class="form-label">Ticket Price (VAT Included Price) </label>
                                            <div class="input-icon-div">
                                                <input type="text" class="form-control" placeholder="Price">
                                                <span class="input-icon">₺</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="ambulanceserviceDiv">
                                        <div class="form-group d-flex flex-column mb-5 section-heading-div">
                                            <h6 class="section-heading">Ambulance Service</h6>
                                            <label class="form-label">Ambulance Price (One Time Pickup and Drop) </label>
                                            <div class="input-icon-div">
                                                <input type="text" class="form-control" placeholder="Price">
                                                <span class="input-icon">₺</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 section-heading-div">
                                        <h6 class="section-heading">Package Price</h6>
                                        <label class="form-label">Discount </label>
                                        <div class="input-icon-div">
                                            <input type="text" class="form-control" placeholder="0">
                                            <span class="input-icon">%</span>
                                        </div>
                                    </div>

                                    <div class="form-group d-flex flex-column mb-3">
                                        <label class="form-label">*Price (VAT Included)</label>
                                        <div class="input-icon-div">
                                            <input type="text" class="form-control" placeholder="0">
                                            <span class="input-icon">₺</span>
                                        </div>
                                    </div>

                                    <div class="form-group d-flex flex-column mb-5">
                                        <label class="form-label">Sale Price</label>
                                        <div class="input-icon-div">
                                            <input type="text" class="form-control"
                                                placeholder="Calculated Automatically">
                                            <span class="input-icon">₺</span>
                                        </div>
                                    </div>

                                    <div class="form-group d-flex flex-column mb-5 section-heading-div">
                                        <h6 class="section-heading">Featured Request</h6>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="featureproducts">
                                            <label class="form-check-label text-secondary" for="featureproducts">I confirm
                                                that all details are correct and meets the <a href="#"
                                                    class="text-green fw-700">Terms & Conditions.</a></label>
                                        </div>
                                    </div>

                                    <div class="section-btns mb-3">
                                        <button type="submit" name="button_type" value="active"
                                            class="green-plate bg-green text-dark fw-700 fsb-1">Save Changes</button>
                                        <button type="submit"  name="button_type" value="inactive"
                                            class="black-plate bg-black text-white fw-500 fsb-1">Deactivate Package</button>
                                    </div>

                                </form>
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
        $(".mpPackagesLi").addClass("activeClass");
        $(".mpPackages").addClass("md-active");
    </script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $(function() {
            $('input[name="check-in"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function(start, end, label) {});
        });

        $(function() {
            $('input[name="check-out"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function(start, end, label) {});
        });

        $(function() {
            $('input[name="check-in2"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function(start, end, label) {});
        });

        $(function() {
            $('input[name="check-out2"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function(start, end, label) {});
        });

        $(function() {
            $('input[name="check-in3"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function(start, end, label) {});
        });

        $(function() {
            $('input[name="check-out3"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function(start, end, label) {});
        });
    </script>
     <script>
        $(document).ready(function() {
            function updateCheckedValues() {
                const checkedValues = $('.form-check-input:checked').map(function() {
                    return $(this).val();
                }).get().join(', ');
                $('#checkedValues').text(checkedValues);
                $('#other_services').val(checkedValues);
            }
            $('.form-check-input').change(updateCheckedValues);
            updateCheckedValues();
        });
    </script>

    <script>
        function categoryselect(value) {
            var base_url = $('#base_url').val();
            const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const bearer_token = '{{ Session::get('login_token') }}'; 
            // var url= base_url + 'api/md-treatment-list'
            // alert(url);
            $.ajax({
                url: base_url + '/api/md-treatment-list',
                type: 'POST',
                data: {
                    id: value,
                },
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Authorization': 'Bearer ' + bearer_token
                },
                success: function(response) {
                    console.log(response);
                    // alert(response);
                    if (response.status === 200) {
                        // Clear existing options
                        $('#treatment_id').empty();

                        // Add new options based on the response
                        response.packages_active_list.forEach(function(treatment) {
                            $('#treatment_id').append($('<option>', {
                                value: treatment.id,
                                text: treatment.product_sub_category_name
                            }));
                        });
                    } else {
                        console.error('Error:', response.message);
                    }
                },
                error: function(xhr) {
                    console.error('Error:', xhr);
                }
            });
        }
    </script>

    {{-- // Pre-select the treatment on edit
    // $(document).ready(function() {
    //     var selectedTreatment = "{{ $selected_treatment_id }}"; 
    //     $('#comfort_level_id').val(selectedTreatment).change();
    // }); --}}
    <script>
        // Function to handle checkbox change
        $('.form-check-input').on('change', function() {
            var checkboxId = $(this).attr('id');
            var divId = checkboxId.replace('for', ''); // Remove 'for' from checkbox ID to get div ID

            // Show/hide div based on checkbox state
            if ($(this).is(':checked')) {
                $('#' + divId + 'Div').show();
            } else {
                $('#' + divId + 'Div').hide();
            }
        });

        // Handle checkbox states on page load
        $('.form-check-input').each(function() {
            var checkboxId = $(this).attr('id');
            var divId = checkboxId.replace('for', ''); // Remove 'for' from checkbox ID to get div ID

            if ($(this).is(':checked')) {
                $('#' + divId + 'Div').show();
            } else {
                $('#' + divId + 'Div').hide();
            }
        });
    </script>
@endsection
