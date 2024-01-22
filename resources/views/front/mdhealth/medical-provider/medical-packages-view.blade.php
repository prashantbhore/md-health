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
        min-width: 185px;
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

    .form-select,
    .form-control {
        color: #000;
        font-family: CamptonBook !important;
        font-size: 16px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        letter-spacing: -0.64px;
    }

    .section-btns a {
        border-radius: 5px;
        background: #4CDB06;
        width: 342px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        color: #000;
        font-family: CamptonBold;
        font-size: 16px;
        line-height: normal;
        letter-spacing: -0.64px;
    }
</style>

<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="d-flex gap-3">
            <div class="w-292">
                @include('front.includes.sidebar')
            </div>
            <div class="w-761">
                <div class="card mb-4">
                    <h5 class="card-header d-flex align-items-center justify-content-between" style="margin-bottom: 42px;">
                        <span>{{ !empty($packages_active_list['package_unique_no']) ? $packages_active_list['package_unique_no'] : 'Add Package' }}</span>
                        <a href="{{ url('medical-packages') }}" class="d-flex align-items-center gap-1 text-decoration-none text-dark">
                            <img src="{{ asset('front/assets/img/backPage.png') }}" alt="">
                            <p class="mb-0 card-h1">Back Dashboard</p>
                        </a>
                    </h5>
                    <div class="card-body">
                        <div class="form-div">
                            <form action="{{ url('/md-add-packages') }}" method="post" id="package_add">
                                @csrf
                                <input type="hidden" name="platform_type" value="web">
                                <input type="hidden" name="id" value="{{ !empty($packages_active_list['id']) ? $packages_active_list['id'] : '' }}">
                                <div class="form-group mb-4">
                                    <label class="form-label mb-3">*Package Name</label>
                                    <input type="text" class="form-control" id="package_name" name="package_name" value="{{ !empty($packages_active_list['package_name']) ? $packages_active_list['package_name'] : '' }}" aria-describedby="foodname" placeholder="Package Name">
                                </div>

                                <div class="form-group d-flex flex-column mb-4">
                                    <label class="form-label mb-3">*Treatments Category</label>
                                    <select id="treatment_category_id" name="treatment_category_id" class="form-select" onchange="categoryselect(this.value)">
                                        <option value="" selected disabled>Choose</option>
                                        @if (!empty($treatment_categories))


                                        @foreach ($treatment_categories as $treatment_category)
                                        @php
                                        $isSelected = isset($packages_active_list['treatment_category_id']) && $packages_active_list['treatment_category_id'] == $treatment_category['id'];
                                        @endphp
                                        <option value="{{ $treatment_category['id'] }}" {{ $isSelected ? ' selected' : '' }}>
                                            {{ $treatment_category['product_category_name'] }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group d-flex flex-column mb-4">
                                    <label class="form-label mb-3">*Treatments</label>
                                    <select id="treatment_id" class="form-select" name="treatment_id">
                                        <option value="">Treatments</option>
                                        <!-- Options will be dynamically populated here -->
                                    </select>
                                </div>

                                <div class="multiple-checkbox-div">
                                    <div class="form-group d-flex flex-column mb-5">
                                        <label class="form-label mb-3">Other Services (Selectable)</label>
                                        {{-- <p>Checked Values: <span id="checkedValues"></span></p> --}}
                                        <input type="hidden" name="other_services" id="other_services" value="{{ !empty($packages_active_list['other_services']) ? $packages_active_list['other_services'] : '' }}">
                                        {{-- value="{{!empty($hotel_details['other_services'])?$hotel_details['other_services']:''}}" --}}

                                        <div class="multiple-checks">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" value="Accomodition" id="foraccommodation" {{ !empty($packages_active_list['other_services']) && strpos($packages_active_list['other_services'], 'Accomodition') !== false ? 'checked' : '' }}>
                                                {{-- {{ $hotel_details['accommodation'] ? 'checked' : '' }} --}}
                                                <label class="form-check-label fw-500 fsb-1" for="foraccomodition">Accomodation</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" value="Transportation" id="fortransportation" {{ !empty($packages_active_list['other_services']) && strpos($packages_active_list['other_services'], 'Transportation') !== false ? 'checked' : '' }}>
                                                <label class="form-check-label fw-500 fsb-1" for="fortransportation">Transportation</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" value="Tour" id="fortour" {{ !empty($packages_active_list['other_services']) && strpos($packages_active_list['other_services'], 'Tour') !== false ? 'checked' : '' }}>
                                                <label class="form-check-label fw-500 fsb-1" for="fortour">Tour</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" value="Translation" id="fortranslation" {{ !empty($packages_active_list['other_services']) && strpos($packages_active_list['other_services'], 'Translation') !== false ? 'checked' : '' }}>
                                                <label class="form-check-label fw-500 fsb-1" for="fortranslation">Translation</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" value="Visa Services" id="forvisaservice" {{ !empty($packages_active_list['other_services']) && strpos($packages_active_list['other_services'], 'Visa Services') !== false ? 'checked' : '' }}>
                                                <label class="form-check-label fw-500 fsb-1" for="forvisaservice">Visa
                                                    Services</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" value="Ticket Services" id="forticketservice" {{ !empty($packages_active_list['other_services']) && strpos($packages_active_list['other_services'], 'Ticket Services') !== false ? 'checked' : '' }}>
                                                <label class="form-check-label fw-500 fsb-1" for="forticketservice">Ticket Services</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" value="Ambulance Services" id="forambulanceservice" {{ !empty($packages_active_list['other_services']) && strpos($packages_active_list['other_services'], 'Ambulance Services') !== false ? 'checked' : '' }}>
                                                <label class="form-check-label fw-500 fsb-1" for="forambulanceservice">Ambulance Services</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group mb-5 section-heading-div">
                                    <h6 class="section-heading">Treatment Period in Days</h6>
                                    <input type="text" class="form-control" name="treatment_period_in_days" id="treatment_period_in_days" value="{{ !empty($packages_active_list['treatment_period_in_days']) ? $packages_active_list['treatment_period_in_days'] : '' }}" aria-describedby="foodname" placeholder="1-3 Days">
                                </div>

                                <div class="form-group d-flex flex-column mb-5 section-heading-div">
                                    <h6 class="section-heading">Treatment Price</h6>
                                    <label class="form-label my-3">Treatment Price (VAT Included Price) </label>
                                    <div class="input-icon-div">
                                        <input type="text" class="form-control" name="treatment_price" id="treatment_price" value="{{ !empty($packages_active_list['treatment_price']) ? $packages_active_list['treatment_price'] : '' }}" placeholder="Treatment Price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');">
                                        <span class="input-icon">₺</span>
                                    </div>
                                </div>
                                <div id="accommodationDiv">
                                    <div class="form-group d-flex flex-column mb-3 section-heading-div">
                                        <h6 class="section-heading">Accommodation Details</h6>
                                        <label class="form-label my-3">Hotel Name</label>
                                        <select name="hotel_id" id="hotel_id">
                                            <option value="" selected disabled>Choose</option>


                                            @if (!empty($hotel_details))
                                            @foreach ($hotel_details as $hotel_detail)
                                            @php
                                            $isSelected = isset($packages_active_list['hotel_id']) && $packages_active_list['hotel_id'] == $hotel_detail['id'];
                                            @endphp
                                            <option value="{{ $hotel_detail['id'] }}" {{ $isSelected ? ' selected' : '' }}>
                                                {{ $hotel_detail['hotel_name'] }}
                                            </option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <input type="hidden" id="hotel_details_input" name="hotel_details_input" readonly>
                                    <div class="date-picker-div mb-5">
                                        <label class="form-label mb-3">Reservation Days</label>
                                        <div class="date-picker-card-div">
                                            <div class="input-container w-25" id="date-picker-container">
                                                <!-- <label for="date-from">check-in</label> -->
                                                <input type="text" name="hotel_in_time" id="hotel_in_time" class="form-control date-icon w-100" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" value="{{ !empty($packages_active_list['hotel_in_time']) ? $packages_active_list['hotel_in_time'] : '' }}" />
                                                {{-- <svg class="input-icon" width="18" height="18"
                                                        viewBox="0 0 16 17" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.6347 1.89601e-06C10.9916 -0.00083649 11.2739 0.27646 11.2747 0.646188L11.2755 1.27641C13.5914 1.45791 15.1212 3.03597 15.1237 5.45601L15.1328 12.5397C15.1361 15.1782 13.4785 16.8016 10.8215 16.8058L4.33125 16.8142C1.69084 16.8176 0.012462 15.1555 0.0091418 12.5094L5.57173e-06 5.50895C-0.00330907 3.07295 1.47253 1.49908 3.7884 1.28649L3.78757 0.656271C3.78674 0.286543 4.06066 0.00840671 4.42588 0.00840671C4.79111 0.00756642 5.06503 0.284862 5.06586 0.65459L5.06669 1.24279L9.99723 1.23607L9.9964 0.647868C9.99557 0.27814 10.2695 0.000844092 10.6347 1.89601e-06ZM10.9734 11.9313H10.9651C10.5833 11.9405 10.277 12.2607 10.2853 12.6472C10.2861 13.0338 10.594 13.3522 10.9759 13.3606C11.3652 13.3598 11.6806 13.0396 11.6798 12.6447C11.6798 12.2498 11.3635 11.9313 10.9734 11.9313ZM4.1337 11.9321C3.75187 11.9489 3.45305 12.2691 3.45388 12.6556C3.47131 13.0422 3.78674 13.3447 4.16856 13.327C4.54292 13.3102 4.84091 12.9901 4.82348 12.6035C4.81518 12.2254 4.50723 11.9313 4.1337 11.9321ZM7.55354 11.9279C7.17171 11.9456 6.87372 12.2649 6.87372 12.6514C6.89115 13.038 7.20658 13.3396 7.5884 13.3228C7.96193 13.3052 8.26075 12.9859 8.24332 12.5985C8.23502 12.2212 7.92707 11.9271 7.55354 11.9279ZM4.12955 8.90709C3.74772 8.92389 3.44973 9.24404 3.45056 9.63058C3.46716 10.0171 3.78342 10.3196 4.16524 10.302C4.53877 10.2852 4.83676 9.96501 4.81933 9.57848C4.81103 9.20035 4.50391 8.90625 4.12955 8.90709ZM7.55022 8.87768C7.16839 8.89448 6.86957 9.21463 6.8704 9.60117C6.887 9.9877 7.20326 10.2894 7.58508 10.2726C7.95861 10.2549 8.2566 9.9356 8.24 9.54907C8.23087 9.17094 7.92375 8.87684 7.55022 8.87768ZM10.9701 8.88188C10.5882 8.89028 10.2894 9.20119 10.2902 9.58772V9.59697C10.2985 9.9835 10.614 10.2768 10.9966 10.2684C11.3701 10.2591 11.6681 9.93897 11.6598 9.55243C11.6424 9.1827 11.3428 8.88104 10.9701 8.88188ZM9.99889 2.53012L5.06835 2.53684L5.06918 3.21664C5.06918 3.5788 4.79609 3.8645 4.43086 3.8645C4.06564 3.86534 3.79089 3.58048 3.79089 3.21832L3.79006 2.57129C2.17144 2.73347 1.27581 3.68468 1.2783 5.50727L1.27913 5.7686L13.8462 5.7518V5.45769C13.8105 3.65107 12.9041 2.70322 11.2772 2.56205L11.278 3.20908C11.278 3.5704 10.9966 3.85694 10.6397 3.85694C10.2745 3.85778 9.99972 3.57208 9.99972 3.21076L9.99889 2.53012Z"
                                                            fill="black"></path>
                                                    </svg> --}}
                                            </div>
                                            {{-- <div class="input-container w-50" id="date-picker-container">
                                                    <!-- <label for="date-from">check-out</label> -->
                                                    <input type="text" name="hotel_out_time" id="hotel_out_time"
                                                        class="date-icon w-100"
                                                        value="{{ !empty($packages_active_list['hotel_out_time']) ? $packages_active_list['hotel_out_time'] : '' }}"
                                            value="10/24/1984" />
                                            <svg class="input-icon" width="18" height="18" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.6347 1.89601e-06C10.9916 -0.00083649 11.2739 0.27646 11.2747 0.646188L11.2755 1.27641C13.5914 1.45791 15.1212 3.03597 15.1237 5.45601L15.1328 12.5397C15.1361 15.1782 13.4785 16.8016 10.8215 16.8058L4.33125 16.8142C1.69084 16.8176 0.012462 15.1555 0.0091418 12.5094L5.57173e-06 5.50895C-0.00330907 3.07295 1.47253 1.49908 3.7884 1.28649L3.78757 0.656271C3.78674 0.286543 4.06066 0.00840671 4.42588 0.00840671C4.79111 0.00756642 5.06503 0.284862 5.06586 0.65459L5.06669 1.24279L9.99723 1.23607L9.9964 0.647868C9.99557 0.27814 10.2695 0.000844092 10.6347 1.89601e-06ZM10.9734 11.9313H10.9651C10.5833 11.9405 10.277 12.2607 10.2853 12.6472C10.2861 13.0338 10.594 13.3522 10.9759 13.3606C11.3652 13.3598 11.6806 13.0396 11.6798 12.6447C11.6798 12.2498 11.3635 11.9313 10.9734 11.9313ZM4.1337 11.9321C3.75187 11.9489 3.45305 12.2691 3.45388 12.6556C3.47131 13.0422 3.78674 13.3447 4.16856 13.327C4.54292 13.3102 4.84091 12.9901 4.82348 12.6035C4.81518 12.2254 4.50723 11.9313 4.1337 11.9321ZM7.55354 11.9279C7.17171 11.9456 6.87372 12.2649 6.87372 12.6514C6.89115 13.038 7.20658 13.3396 7.5884 13.3228C7.96193 13.3052 8.26075 12.9859 8.24332 12.5985C8.23502 12.2212 7.92707 11.9271 7.55354 11.9279ZM4.12955 8.90709C3.74772 8.92389 3.44973 9.24404 3.45056 9.63058C3.46716 10.0171 3.78342 10.3196 4.16524 10.302C4.53877 10.2852 4.83676 9.96501 4.81933 9.57848C4.81103 9.20035 4.50391 8.90625 4.12955 8.90709ZM7.55022 8.87768C7.16839 8.89448 6.86957 9.21463 6.8704 9.60117C6.887 9.9877 7.20326 10.2894 7.58508 10.2726C7.95861 10.2549 8.2566 9.9356 8.24 9.54907C8.23087 9.17094 7.92375 8.87684 7.55022 8.87768ZM10.9701 8.88188C10.5882 8.89028 10.2894 9.20119 10.2902 9.58772V9.59697C10.2985 9.9835 10.614 10.2768 10.9966 10.2684C11.3701 10.2591 11.6681 9.93897 11.6598 9.55243C11.6424 9.1827 11.3428 8.88104 10.9701 8.88188ZM9.99889 2.53012L5.06835 2.53684L5.06918 3.21664C5.06918 3.5788 4.79609 3.8645 4.43086 3.8645C4.06564 3.86534 3.79089 3.58048 3.79089 3.21832L3.79006 2.57129C2.17144 2.73347 1.27581 3.68468 1.2783 5.50727L1.27913 5.7686L13.8462 5.7518V5.45769C13.8105 3.65107 12.9041 2.70322 11.2772 2.56205L11.278 3.20908C11.278 3.5704 10.9966 3.85694 10.6397 3.85694C10.2745 3.85778 9.99972 3.57208 9.99972 3.21076L9.99889 2.53012Z" fill="black"></path>
                                            </svg>
                                        </div> --}}
                                        {{-- <div class="input-container w-50" id="date-picker-container">
                                                    <!-- <label for="date-from">check-out</label> -->
                                                    <input type="text" name="vehicle_out_time" id="vehicle_out_time"
                                                        class="date-icon w-100"
                                                        value="{{ !empty($packages_active_list['vehicle_out_time']) ? $packages_active_list['vehicle_out_time'] : '' }}"
                                        value="10/24/1984" />
                                        <svg class="input-icon" width="18" height="18" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.6347 1.89601e-06C10.9916 -0.00083649 11.2739 0.27646 11.2747 0.646188L11.2755 1.27641C13.5914 1.45791 15.1212 3.03597 15.1237 5.45601L15.1328 12.5397C15.1361 15.1782 13.4785 16.8016 10.8215 16.8058L4.33125 16.8142C1.69084 16.8176 0.012462 15.1555 0.0091418 12.5094L5.57173e-06 5.50895C-0.00330907 3.07295 1.47253 1.49908 3.7884 1.28649L3.78757 0.656271C3.78674 0.286543 4.06066 0.00840671 4.42588 0.00840671C4.79111 0.00756642 5.06503 0.284862 5.06586 0.65459L5.06669 1.24279L9.99723 1.23607L9.9964 0.647868C9.99557 0.27814 10.2695 0.000844092 10.6347 1.89601e-06ZM10.9734 11.9313H10.9651C10.5833 11.9405 10.277 12.2607 10.2853 12.6472C10.2861 13.0338 10.594 13.3522 10.9759 13.3606C11.3652 13.3598 11.6806 13.0396 11.6798 12.6447C11.6798 12.2498 11.3635 11.9313 10.9734 11.9313ZM4.1337 11.9321C3.75187 11.9489 3.45305 12.2691 3.45388 12.6556C3.47131 13.0422 3.78674 13.3447 4.16856 13.327C4.54292 13.3102 4.84091 12.9901 4.82348 12.6035C4.81518 12.2254 4.50723 11.9313 4.1337 11.9321ZM7.55354 11.9279C7.17171 11.9456 6.87372 12.2649 6.87372 12.6514C6.89115 13.038 7.20658 13.3396 7.5884 13.3228C7.96193 13.3052 8.26075 12.9859 8.24332 12.5985C8.23502 12.2212 7.92707 11.9271 7.55354 11.9279ZM4.12955 8.90709C3.74772 8.92389 3.44973 9.24404 3.45056 9.63058C3.46716 10.0171 3.78342 10.3196 4.16524 10.302C4.53877 10.2852 4.83676 9.96501 4.81933 9.57848C4.81103 9.20035 4.50391 8.90625 4.12955 8.90709ZM7.55022 8.87768C7.16839 8.89448 6.86957 9.21463 6.8704 9.60117C6.887 9.9877 7.20326 10.2894 7.58508 10.2726C7.95861 10.2549 8.2566 9.9356 8.24 9.54907C8.23087 9.17094 7.92375 8.87684 7.55022 8.87768ZM10.9701 8.88188C10.5882 8.89028 10.2894 9.20119 10.2902 9.58772V9.59697C10.2985 9.9835 10.614 10.2768 10.9966 10.2684C11.3701 10.2591 11.6681 9.93897 11.6598 9.55243C11.6424 9.1827 11.3428 8.88104 10.9701 8.88188ZM9.99889 2.53012L5.06835 2.53684L5.06918 3.21664C5.06918 3.5788 4.79609 3.8645 4.43086 3.8645C4.06564 3.86534 3.79089 3.58048 3.79089 3.21832L3.79006 2.57129C2.17144 2.73347 1.27581 3.68468 1.2783 5.50727L1.27913 5.7686L13.8462 5.7518V5.45769C13.8105 3.65107 12.9041 2.70322 11.2772 2.56205L11.278 3.20908C11.278 3.5704 10.9966 3.85694 10.6397 3.85694C10.2745 3.85778 9.99972 3.57208 9.99972 3.21076L9.99889 2.53012Z" fill="black"></path>
                                        </svg>
                                    </div> --}}
                                    {{-- <div class="input-container w-50" id="date-picker-container">
                                                    <!-- <label for="date-from">check-out</label> -->
                                                    <input type="text" name="tour_out_time" id="tour_out_time"
                                                        class="date-icon w-100"
                                                        value="{{ !empty($packages_active_list['tour_out_time']) ? $packages_active_list['tour_out_time'] : '' }}"
                                    value="10/24/1984" />
                                    <svg class="input-icon" width="18" height="18" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.6347 1.89601e-06C10.9916 -0.00083649 11.2739 0.27646 11.2747 0.646188L11.2755 1.27641C13.5914 1.45791 15.1212 3.03597 15.1237 5.45601L15.1328 12.5397C15.1361 15.1782 13.4785 16.8016 10.8215 16.8058L4.33125 16.8142C1.69084 16.8176 0.012462 15.1555 0.0091418 12.5094L5.57173e-06 5.50895C-0.00330907 3.07295 1.47253 1.49908 3.7884 1.28649L3.78757 0.656271C3.78674 0.286543 4.06066 0.00840671 4.42588 0.00840671C4.79111 0.00756642 5.06503 0.284862 5.06586 0.65459L5.06669 1.24279L9.99723 1.23607L9.9964 0.647868C9.99557 0.27814 10.2695 0.000844092 10.6347 1.89601e-06ZM10.9734 11.9313H10.9651C10.5833 11.9405 10.277 12.2607 10.2853 12.6472C10.2861 13.0338 10.594 13.3522 10.9759 13.3606C11.3652 13.3598 11.6806 13.0396 11.6798 12.6447C11.6798 12.2498 11.3635 11.9313 10.9734 11.9313ZM4.1337 11.9321C3.75187 11.9489 3.45305 12.2691 3.45388 12.6556C3.47131 13.0422 3.78674 13.3447 4.16856 13.327C4.54292 13.3102 4.84091 12.9901 4.82348 12.6035C4.81518 12.2254 4.50723 11.9313 4.1337 11.9321ZM7.55354 11.9279C7.17171 11.9456 6.87372 12.2649 6.87372 12.6514C6.89115 13.038 7.20658 13.3396 7.5884 13.3228C7.96193 13.3052 8.26075 12.9859 8.24332 12.5985C8.23502 12.2212 7.92707 11.9271 7.55354 11.9279ZM4.12955 8.90709C3.74772 8.92389 3.44973 9.24404 3.45056 9.63058C3.46716 10.0171 3.78342 10.3196 4.16524 10.302C4.53877 10.2852 4.83676 9.96501 4.81933 9.57848C4.81103 9.20035 4.50391 8.90625 4.12955 8.90709ZM7.55022 8.87768C7.16839 8.89448 6.86957 9.21463 6.8704 9.60117C6.887 9.9877 7.20326 10.2894 7.58508 10.2726C7.95861 10.2549 8.2566 9.9356 8.24 9.54907C8.23087 9.17094 7.92375 8.87684 7.55022 8.87768ZM10.9701 8.88188C10.5882 8.89028 10.2894 9.20119 10.2902 9.58772V9.59697C10.2985 9.9835 10.614 10.2768 10.9966 10.2684C11.3701 10.2591 11.6681 9.93897 11.6598 9.55243C11.6424 9.1827 11.3428 8.88104 10.9701 8.88188ZM9.99889 2.53012L5.06835 2.53684L5.06918 3.21664C5.06918 3.5788 4.79609 3.8645 4.43086 3.8645C4.06564 3.86534 3.79089 3.58048 3.79089 3.21832L3.79006 2.57129C2.17144 2.73347 1.27581 3.68468 1.2783 5.50727L1.27913 5.7686L13.8462 5.7518V5.45769C13.8105 3.65107 12.9041 2.70322 11.2772 2.56205L11.278 3.20908C11.278 3.5704 10.9966 3.85694 10.6397 3.85694C10.2745 3.85778 9.99972 3.57208 9.99972 3.21076L9.99889 2.53012Z" fill="black"></path>
                                    </svg>
                                </div> --}}
                        </div>
                    </div>

                    <div class="section-btns mb-5">
                        <a>Total Accommodation Price
                            <span id="accommodation_price_span" class="ms-2">{{ !empty($packages_active_list['hotel_acommodition_price']) ? $packages_active_list['hotel_acommodition_price'] : '0' }} <span class="lira">₺</span></span>
                        </a>
                        <input type="hidden" name="hotel_acommodition_price" id="hotel_acommodition_price" value="{{ !empty($packages_active_list['hotel_acommodition_price']) ? $packages_active_list['hotel_acommodition_price'] : '' }}">
                    </div>
                </div>
                <div id="transportationDiv">
                    <div class="form-group d-flex flex-column mb-3 section-heading-div">
                        <h6 class="section-heading">Transportation Details</h6>
                        <label class="form-label my-3">Vehicle</label>
                        <select name="vehicle_id" id="vehicle_id">
                            <option value="" selected disabled>Choose</option>
                            @if (!empty($vehicle_details))
                            @foreach ($vehicle_details as $vehicle_detail)
                            @php
                            $isSelected = isset($packages_active_list['vehicle_id']) && $packages_active_list['vehicle_id'] == $vehicle_detail['id'];
                            @endphp
                            <option value="{{ $vehicle_detail['id'] }}" {{ $isSelected ? ' selected' : '' }}>
                                {{ $vehicle_detail['vehicle_model_name'] }}
                            </option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <input type="hidden" id="vehicle_details_input" name="vehicle_details_input" readonly>

                    <div class="date-picker-div mb-5">
                        <label class="form-label mb-3">Reservation Days</label>
                        <div class="date-picker-card-div">
                            <div class="input-container w-25" id="date-picker-container">
                                <!-- <label for="date-from">check-in</label> -->
                                <input type="text" name="vehicle_in_time" id="vehicle_in_time" class="form-control date-icon w-100" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" value="{{ !empty($packages_active_list['vehicle_in_time']) ? $packages_active_list['vehicle_in_time'] : '' }}" />
                                {{-- <svg class="input-icon" width="18" height="18"
                                                        viewBox="0 0 16 17" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.6347 1.89601e-06C10.9916 -0.00083649 11.2739 0.27646 11.2747 0.646188L11.2755 1.27641C13.5914 1.45791 15.1212 3.03597 15.1237 5.45601L15.1328 12.5397C15.1361 15.1782 13.4785 16.8016 10.8215 16.8058L4.33125 16.8142C1.69084 16.8176 0.012462 15.1555 0.0091418 12.5094L5.57173e-06 5.50895C-0.00330907 3.07295 1.47253 1.49908 3.7884 1.28649L3.78757 0.656271C3.78674 0.286543 4.06066 0.00840671 4.42588 0.00840671C4.79111 0.00756642 5.06503 0.284862 5.06586 0.65459L5.06669 1.24279L9.99723 1.23607L9.9964 0.647868C9.99557 0.27814 10.2695 0.000844092 10.6347 1.89601e-06ZM10.9734 11.9313H10.9651C10.5833 11.9405 10.277 12.2607 10.2853 12.6472C10.2861 13.0338 10.594 13.3522 10.9759 13.3606C11.3652 13.3598 11.6806 13.0396 11.6798 12.6447C11.6798 12.2498 11.3635 11.9313 10.9734 11.9313ZM4.1337 11.9321C3.75187 11.9489 3.45305 12.2691 3.45388 12.6556C3.47131 13.0422 3.78674 13.3447 4.16856 13.327C4.54292 13.3102 4.84091 12.9901 4.82348 12.6035C4.81518 12.2254 4.50723 11.9313 4.1337 11.9321ZM7.55354 11.9279C7.17171 11.9456 6.87372 12.2649 6.87372 12.6514C6.89115 13.038 7.20658 13.3396 7.5884 13.3228C7.96193 13.3052 8.26075 12.9859 8.24332 12.5985C8.23502 12.2212 7.92707 11.9271 7.55354 11.9279ZM4.12955 8.90709C3.74772 8.92389 3.44973 9.24404 3.45056 9.63058C3.46716 10.0171 3.78342 10.3196 4.16524 10.302C4.53877 10.2852 4.83676 9.96501 4.81933 9.57848C4.81103 9.20035 4.50391 8.90625 4.12955 8.90709ZM7.55022 8.87768C7.16839 8.89448 6.86957 9.21463 6.8704 9.60117C6.887 9.9877 7.20326 10.2894 7.58508 10.2726C7.95861 10.2549 8.2566 9.9356 8.24 9.54907C8.23087 9.17094 7.92375 8.87684 7.55022 8.87768ZM10.9701 8.88188C10.5882 8.89028 10.2894 9.20119 10.2902 9.58772V9.59697C10.2985 9.9835 10.614 10.2768 10.9966 10.2684C11.3701 10.2591 11.6681 9.93897 11.6598 9.55243C11.6424 9.1827 11.3428 8.88104 10.9701 8.88188ZM9.99889 2.53012L5.06835 2.53684L5.06918 3.21664C5.06918 3.5788 4.79609 3.8645 4.43086 3.8645C4.06564 3.86534 3.79089 3.58048 3.79089 3.21832L3.79006 2.57129C2.17144 2.73347 1.27581 3.68468 1.2783 5.50727L1.27913 5.7686L13.8462 5.7518V5.45769C13.8105 3.65107 12.9041 2.70322 11.2772 2.56205L11.278 3.20908C11.278 3.5704 10.9966 3.85694 10.6397 3.85694C10.2745 3.85778 9.99972 3.57208 9.99972 3.21076L9.99889 2.53012Z"
                                                            fill="black"></path>
                                                    </svg> --}}
                            </div>

                        </div>
                    </div>

                    <div class="section-btns mb-5">
                        <a>Total Transportation Price <span id="transportation_acommodition_span" class="ms-2">{{ !empty($packages_active_list['transportation_acommodition_price']) ? $packages_active_list['transportation_acommodition_price'] : '0' }}
                                <span class="lira">₺</span></span></a>
                        <input type="hidden" name="transportation_acommodition_price" id="transportation_acommodition_price" value="{{ !empty($packages_active_list['transportation_acommodition_price']) ? $packages_active_list['transportation_acommodition_price'] : '' }}">
                    </div>
                </div>
                <div id="tourDiv">
                    <div class="form-group d-flex flex-column mb-3 section-heading-div">
                        <h6 class="section-heading">Tour Name</h6>
                        <label class="form-label my-3">Tour</label>
                        {{-- {{dd($packages_active_list)}} --}}
                        <select name="tour_id" id="tour_id">
                            <option value="" selected disabled>Choose</option>
                            @if (!empty($tour_details))
                            @foreach ($tour_details as $tour_detail)
                            @php
                            $isSelected = isset($packages_active_list['tour_id']) && $packages_active_list['tour_id'] == $tour_detail['id'];
                            @endphp
                            <option value="{{ $tour_detail['id'] }}" {{ $isSelected ? ' selected' : '' }}>
                                {{ $tour_detail['tour_name'] }}
                            </option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <input type="hidden" id="tour_details_input" name="tour_details_input" readonly>

                    <div class="date-picker-div mb-5">
                        <label class="form-label mb-3">Reservation Days</label>
                        <div class="date-picker-card-div">
                            <div class="input-container w-25" id="date-picker-container">
                                <!-- <label for="date-from">check-in</label> -->
                                <input type="text" name="tour_in_time" id="tour_in_time" class="form-control date-icon w-100" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" value="{{ !empty($packages_active_list['tour_in_time']) ? $packages_active_list['tour_in_time'] : '' }}" value="10/24/1984" />
                                {{-- <svg class="input-icon" width="18" height="18"
                                                        viewBox="0 0 16 17" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.6347 1.89601e-06C10.9916 -0.00083649 11.2739 0.27646 11.2747 0.646188L11.2755 1.27641C13.5914 1.45791 15.1212 3.03597 15.1237 5.45601L15.1328 12.5397C15.1361 15.1782 13.4785 16.8016 10.8215 16.8058L4.33125 16.8142C1.69084 16.8176 0.012462 15.1555 0.0091418 12.5094L5.57173e-06 5.50895C-0.00330907 3.07295 1.47253 1.49908 3.7884 1.28649L3.78757 0.656271C3.78674 0.286543 4.06066 0.00840671 4.42588 0.00840671C4.79111 0.00756642 5.06503 0.284862 5.06586 0.65459L5.06669 1.24279L9.99723 1.23607L9.9964 0.647868C9.99557 0.27814 10.2695 0.000844092 10.6347 1.89601e-06ZM10.9734 11.9313H10.9651C10.5833 11.9405 10.277 12.2607 10.2853 12.6472C10.2861 13.0338 10.594 13.3522 10.9759 13.3606C11.3652 13.3598 11.6806 13.0396 11.6798 12.6447C11.6798 12.2498 11.3635 11.9313 10.9734 11.9313ZM4.1337 11.9321C3.75187 11.9489 3.45305 12.2691 3.45388 12.6556C3.47131 13.0422 3.78674 13.3447 4.16856 13.327C4.54292 13.3102 4.84091 12.9901 4.82348 12.6035C4.81518 12.2254 4.50723 11.9313 4.1337 11.9321ZM7.55354 11.9279C7.17171 11.9456 6.87372 12.2649 6.87372 12.6514C6.89115 13.038 7.20658 13.3396 7.5884 13.3228C7.96193 13.3052 8.26075 12.9859 8.24332 12.5985C8.23502 12.2212 7.92707 11.9271 7.55354 11.9279ZM4.12955 8.90709C3.74772 8.92389 3.44973 9.24404 3.45056 9.63058C3.46716 10.0171 3.78342 10.3196 4.16524 10.302C4.53877 10.2852 4.83676 9.96501 4.81933 9.57848C4.81103 9.20035 4.50391 8.90625 4.12955 8.90709ZM7.55022 8.87768C7.16839 8.89448 6.86957 9.21463 6.8704 9.60117C6.887 9.9877 7.20326 10.2894 7.58508 10.2726C7.95861 10.2549 8.2566 9.9356 8.24 9.54907C8.23087 9.17094 7.92375 8.87684 7.55022 8.87768ZM10.9701 8.88188C10.5882 8.89028 10.2894 9.20119 10.2902 9.58772V9.59697C10.2985 9.9835 10.614 10.2768 10.9966 10.2684C11.3701 10.2591 11.6681 9.93897 11.6598 9.55243C11.6424 9.1827 11.3428 8.88104 10.9701 8.88188ZM9.99889 2.53012L5.06835 2.53684L5.06918 3.21664C5.06918 3.5788 4.79609 3.8645 4.43086 3.8645C4.06564 3.86534 3.79089 3.58048 3.79089 3.21832L3.79006 2.57129C2.17144 2.73347 1.27581 3.68468 1.2783 5.50727L1.27913 5.7686L13.8462 5.7518V5.45769C13.8105 3.65107 12.9041 2.70322 11.2772 2.56205L11.278 3.20908C11.278 3.5704 10.9966 3.85694 10.6397 3.85694C10.2745 3.85778 9.99972 3.57208 9.99972 3.21076L9.99889 2.53012Z"
                                                            fill="black"></path>
                                                    </svg> --}}
                            </div>

                        </div>
                    </div>

                    <div class="section-btns mb-5">
                        <a>Total Tour Price
                            <span id="tour_price_span" class="ms-2">{{ !empty($packages_active_list['tour_price']) ? $packages_active_list['tour_price'] : '0' }}
                                <span class="lira"><span class="lira">₺</span></span></span></a>
                        <input type="hidden" name="tour_price" id="tour_price" value="{{ !empty($packages_active_list['tour_price']) ? $packages_active_list['tour_price'] : '' }}">
                    </div>
                </div>
                <div id="translationDiv">
                    <div class="form-group d-flex flex-column mb-5 section-heading-div">
                        <h6 class="section-heading">Translation Price</h6>
                        <label class="form-label my-3">Translation Price (VAT Included Price) </label>
                        <div class="input-icon-div">
                            <input type="text" class="form-control" name="translation_price" id="translation_price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" value="{{ !empty($packages_active_list['translation_price']) ? $packages_active_list['translation_price'] : '' }}" placeholder="Translation Price">
                            <span class="input-icon">₺</span>
                        </div>
                    </div>
                </div>
                <div id="visaserviceDiv">
                    <div class="form-group mb-3 section-heading-div">
                        <h6 class="section-heading">Visa Service Details</h6>
                        <label class="form-label my-3" for="featureproducts">Please Written Visa Service
                            Details</label>
                        <input type="text" class="form-control" name="visa_details" id="visa_details" value="{{ !empty($packages_active_list['visa_details']) ? $packages_active_list['visa_details'] : '' }}" aria-describedby="foodname" placeholder="Write Here Please">
                    </div>

                    <div class="form-group d-flex flex-column mb-5">
                        <label class="form-label mb-3">Visa Service Price</label>
                        <div class="input-icon-div ">
                            <input type="text" class="form-control" name="visa_service_price" id="visa_service_price" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" value="{{ !empty($packages_active_list['visa_service_price']) ? $packages_active_list['visa_service_price'] : '' }}">
                            <span class="input-icon">₺</span>
                        </div>
                    </div>
                </div>
                <div id="ticketserviceDiv">
                    <div class="form-group d-flex flex-column mb-5 section-heading-div">
                        <h6 class="section-heading">Ticket Service</h6>
                        <label class="form-label my-3">Ticket Price (VAT Included Price) </label>
                        <div class="input-icon-div">
                            <input type="text" class="form-control" name="ticket_price" id="ticket_price" placeholder="Price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" value="{{ !empty($packages_active_list['ticket_price']) ? $packages_active_list['ticket_price'] : '' }}">
                            <span class="input-icon">₺</span>
                        </div>
                    </div>
                </div>
                <div id="ambulanceserviceDiv">
                    <div class="form-group d-flex flex-column mb-5 section-heading-div">
                        <h6 class="section-heading">Ambulance Service</h6>
                        <label class="form-label mb-3">Ambulance Price (One Time Pickup and Drop) </label>
                        <div class="input-icon-div">
                            <input type="text" class="form-control" name="ambulance_service_price" id="ambulance_service_price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" value="{{ !empty($packages_active_list['ambulance_service_price']) ? $packages_active_list['ambulance_service_price'] : '' }}" placeholder="Price">
                            <span class="input-icon">₺</span>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-4 section-heading-div">
                    <h6 class="section-heading">Package Price</h6>
                    <label class="form-label my-3">Discount </label>
                    <div class="input-icon-div">
                        <input type="text" class="form-control" name="package_discount" id="package_discount" maxlength="3" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" value="{{ !empty($packages_active_list['package_discount']) ? $packages_active_list['package_discount'] : '' }}" placeholder="0">
                        <span class="input-icon">%</span>
                    </div>
                </div>

                <div class="form-group d-flex flex-column mb-4">
                    <label class="form-label mb-3">*Price (VAT Included)</label>
                    <div class="input-icon-div">
                        <input type="text" class="form-control" name="package_price" readonly id="package_price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" value="{{ !empty($packages_active_list['package_price']) ? $packages_active_list['package_price'] : '' }}" placeholder="0">
                        <span class="input-icon">₺</span>
                    </div>
                </div>

                <div class="form-group d-flex flex-column mb-5">
                    <label class="form-label mb-3">Sale Price</label>
                    <div class="input-icon-div">
                        <input type="text" class="form-control" name="sale_price" id="sale_price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" readonly value="{{ !empty($packages_active_list['sale_price']) ? $packages_active_list['sale_price'] : '' }}" placeholder="Calculated Automatically">
                        <span class="input-icon">₺</span>
                    </div>
                </div>

                <div class="form-group d-flex flex-column mb-5 section-heading-div">
                    <!-- <h6 class="section-heading">Featured Request</h6> -->
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="featured_product" id="featured_product" {{ (!empty($packages_active_list['featured_product']) && $packages_active_list['featured_product']=="yes") ? 'checked' : '' }}>
                        <label class="section-heading" for="featureproducts">Featured Request</label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="featureproducts">I confirm that all details are correct and meets the <a href="#" class="text-green fw-700 text-decoration-underline camptonBold">Terms & Conditions.</a></label>
                        <input type="checkbox" class="form-check-input" name="featureproducts" id="featureproducts" {{ !empty($packages_active_list['id']) ? 'checked disabled' : '' }}>
                    </div>
                </div>
                <input type="hidden" name="platform_type" value="web">
                <div class="section-btns mb-3 d-flex gap-3">
                    <button type="submit" name="button_type" value="active" class="btn save-btn-black text-black bg-green w-50">Save Changes</button>
                    <button type="submit" name="button_type" value="inactive" class="btn save-btn-black w-50">Deactivate
                        Package</button>
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
{{-- <script>
        $(function() {
            $('input[name="hotel_in_time"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function(start, end, label) {});
        });

        $(function() {
            $('input[name="hotel_out_time"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function(start, end, label) {});
        });

        $(function() {
            $('input[name="vehicle_in_time"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function(start, end, label) {});
        });

        $(function() {
            $('input[name="vehicle_out_time"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function(start, end, label) {});
        });

        $(function() {
            $('input[name="tour_in_time"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function(start, end, label) {});
        });

        $(function() {
            $('input[name="tour_out_time"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function(start, end, label) {});
        });
    </script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        // Add custom validation method for checking if the input contains only spaces
        $.validator.addMethod("noSpace", function(value, element) {
            return $.trim(value).length !== 0;
        }, "This field cannot contain only spaces");

        // Add custom validation method for discount percentage
        $.validator.addMethod("maxDiscount", function(value, element) {
            return parseFloat(value) <= 100;
        }, "Discount percentage cannot be more than 100%");

        // Add validation rules and messages
        $('#package_add').validate({
            rules: {
                package_name: {
                    required: true,
                    noSpace: true // Use the custom validation method for package name
                },
                treatment_category_id: {
                    required: true
                },
                treatment_id: {
                    required: true
                },
                treatment_price: {
                    required: true
                },
                package_discount: {
                    required: true,
                    maxDiscount: true // Use the custom validation method for discount percentage
                },
                featureproducts: {
                    required: true
                }
                // Add more rules for other fields as needed
            },
            messages: {
                package_name: {
                    required: "Please enter a package name",
                    noSpace: "Package name cannot contain only spaces"
                },
                treatment_category_id: {
                    required: "Please select a treatment category"
                },
                treatment_id: {
                    required: "Please select a treatment"
                },
                treatment_price: {
                    required: "Please enter a treatment price"
                },
                package_discount: {
                    required: "Please enter a Discount percentage"
                },
                featureproducts: {
                    required: "Please check the Terms & Conditions box."
                }
                // Add more messages for other fields as needed
            },
            submitHandler: function(form) {
                // If the form is valid, submit it
                form.submit();
            }
        });
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
        // alert(bearer_token);

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
                // Clear existing options
                $('#treatment_id').empty();

                if (response.status === 200) {
                    // Add new options based on the response
                    response.packages_active_list.forEach(function(treatment) {
                        $('#treatment_id').append($('<option>', {
                            value: treatment.id,
                            text: treatment.product_sub_category_name
                        }));
                    });

                    // Pre-select treatment if it exists
                    var selectedTreatment =
                        "{{ isset($packages_active_list['treatment_id']) ? $packages_active_list['treatment_id'] : null }}";
                    if (selectedTreatment) {
                        $('#treatment_id').val(selectedTreatment);
                    }
                } else {
                    console.error('Error:', response.message);
                }
            },
            error: function(xhr) {
                console.error('Error:', xhr);
            }
        });
    }

    // Call categoryselect() initially with the default value
    $(document).ready(function() {
        var defaultValue =
            "{{ isset($packages_active_list['treatment_category_id']) ? $packages_active_list['treatment_category_id'] : null }}";
        if (defaultValue) {
            categoryselect(defaultValue);
        }
    });
</script>

{{-- <script>
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
    </script> --}}
<script>
    $(document).ready(function() {
        // Function to handle checkbox change
        $('.form-check-input').on('change', function() {
            var checkboxId = $(this).attr('id');
            var divId = checkboxId.replace('for', ''); // Remove 'for' from checkbox ID to get div ID

            // Show/hide div based on checkbox state
            if ($(this).is(':checked')) {
                $('#' + divId + 'Div').show();
            } else {
                $('#' + divId + 'Div').hide();
                $('#' + divId + 'Div input[type="text"]').val(''); // Clear input fields
                $('#' + divId + 'Div input[type="select"]').val(''); // Clear select fields
                $('#' + divId + 'Div input[type="hidden"]').val(''); // Clear hidden fields
                $('#' + divId + 'Div textarea').val(''); // Clear textareas
                // Add more selectors if needed for other types of input fields
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
    });
</script>

<script>
    $(document).ready(function() {
        var base_url = $('#base_url').val();

        function updateAccommodationPrice() {
            var hotelDetailsInput = parseFloat($('#vehicle_details_input').val());
            var hotelInTime = parseFloat($('#vehicle_in_time').val());

            if (!isNaN(hotelDetailsInput) && !isNaN(hotelInTime)) {
                var totalPrice = hotelDetailsInput * hotelInTime;
                $('#transportation_acommodition_price').val(totalPrice.toFixed(2));
                $('#transportation_acommodition_span').text(totalPrice.toFixed(2) + ' ₺');
            }
        }

        $('#vehicle_id').on('change', function() {
            var selectedvehicleid = $(this).val();
            // alert(selectedvehicleid);
            const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const bearer_token = '{{ Session::get('login_token') }}';

            if (selectedvehicleid) {
                $.ajax({
                    url: base_url + '/api/md-get-transportation-price',
                    type: 'POST',
                    data: {
                        id: selectedvehicleid
                    },
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'Authorization': 'Bearer ' + bearer_token
                    },
                    success: function(response) {
                        console.log(response);
                        $('#vehicle_details_input').val(response.price.vehicle_per_day_price);
                        updateAccommodationPrice();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                $('#vehicle_details_input').val('');
                $('#transportation_acommodition_price').val('');
                $('#transportation_acommodition_span').text('0 ₺');
            }
        });

        $('#vehicle_details_input, #vehicle_in_time').on('input', function() {
            updateAccommodationPrice();
        });
    });
</script>

<script>
    $(document).ready(function() {
        var base_url = $('#base_url').val();

        function updateAccommodationPrice() {
            var hotelDetailsInput = parseFloat($('#hotel_details_input').val());
            var hotelInTime = parseFloat($('#hotel_in_time').val());

            if (!isNaN(hotelDetailsInput) && !isNaN(hotelInTime)) {
                var totalPrice = hotelDetailsInput * hotelInTime;
                $('#hotel_acommodition_price').val(totalPrice.toFixed(2));
                $('#accommodation_price_span').text(totalPrice.toFixed(2) + ' ₺');
            }
        }

        $('#hotel_id').on('change', function() {
            var selectedHotelId = $(this).val();
            const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const bearer_token = '{{ Session::get('login_token') }}';

            if (selectedHotelId) {
                $.ajax({
                    url: base_url + '/api/md-get-acommodition-price',
                    type: 'POST',
                    data: {
                        id: selectedHotelId
                    },
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'Authorization': 'Bearer ' + bearer_token
                    },
                    success: function(response) {
                        $('#hotel_details_input').val(response.price.hotel_per_night_price);
                        updateAccommodationPrice();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                $('#hotel_details_input').val('');
                $('#hotel_acommodition_price').val('');
                $('#accommodation_price_span').text('0 ₺');
            }
        });

        $('#hotel_details_input, #hotel_in_time').on('input', function() {
            updateAccommodationPrice();
        });
    });
</script>
<script>
    $(document).ready(function() {
        var base_url = $('#base_url').val();

        function updateAccommodationPrice() {
            var hotelDetailsInput = parseFloat($('#tour_details_input').val());
            var hotelInTime = parseFloat($('#tour_in_time').val());

            if (!isNaN(hotelDetailsInput) && !isNaN(hotelInTime)) {
                var totalPrice = hotelDetailsInput * hotelInTime;
                $('#tour_price').val(totalPrice.toFixed(2));
                $('#tour_price_span').text(totalPrice.toFixed(2) + ' ₺');
            }
        }

        $('#tour_id').on('change', function() {
            var selectedtourid = $(this).val();
            const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const bearer_token = '{{ Session::get('login_token') }}';

            if (selectedtourid) {
                $.ajax({
                    url: base_url + '/api/md-get-tour-price',
                    type: 'POST',
                    data: {
                        id: selectedtourid
                    },
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'Authorization': 'Bearer ' + bearer_token
                    },
                    success: function(response) {
                        console.log(response);
                        $('#tour_details_input').val(response.price.tour_price);
                        updateAccommodationPrice();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                $('#tour_details_input').val('');
                $('#tour_price').val('');
                $('#tour_price_span').text('0 ₺');
            }
        });

        $('#tour_details_input, #tour_in_time').on('input', function() {
            updateAccommodationPrice();
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Function to calculate and update package price
        function updatePackagePrice() {
            var treatmentPrice = parseFloat($('#treatment_price').val()) || 0;
            var hotelAccommodationPrice = parseFloat($('#hotel_acommodition_price').val()) || 0;
            var transportationAccommodationPrice = parseFloat($('#transportation_acommodition_price').val()) ||
                0;
            var tourPrice = parseFloat($('#tour_price').val()) || 0;
            var visaServicePrice = parseFloat($('#visa_service_price').val()) || 0;
            var translationPrice = parseFloat($('#translation_price').val()) || 0;
            var ambulanceServicePrice = parseFloat($('#ambulance_service_price').val()) || 0;
            var ticketPrice = parseFloat($('#ticket_price').val()) || 0;

            // Check if any field contains non-numeric values
            if (!($.isNumeric(treatmentPrice) && $.isNumeric(hotelAccommodationPrice) && $.isNumeric(
                        transportationAccommodationPrice) &&
                    $.isNumeric(tourPrice) && $.isNumeric(visaServicePrice) && $.isNumeric(translationPrice) &&
                    $.isNumeric(ambulanceServicePrice) && $.isNumeric(ticketPrice))) {
                // alert('Please enter numbers only.');
                return;
            }

            // Calculate total package price
            var packagePrice = treatmentPrice + hotelAccommodationPrice + transportationAccommodationPrice +
                tourPrice + visaServicePrice + translationPrice + ambulanceServicePrice + ticketPrice;

            // Retrieve package discount percentage
            var packageDiscountPercentage = parseFloat($('#package_discount').val()) || 0;

            // Check if discount percentage is valid
            if (packageDiscountPercentage < 0 || packageDiscountPercentage > 100) {
                // alert('Please enter a discount percentage between 0 and 100.');
                return;
            }

            // Calculate the discount amount
            var packageDiscount = (packageDiscountPercentage / 100) * packagePrice;

            // Calculate the sale price after deducting the discount
            var salePrice = packagePrice - packageDiscount;

            // Ensure sale price doesn't go negative
            salePrice = Math.max(salePrice, 0);

            // Update the package price field
            $('#package_price').val(packagePrice.toFixed(2));

            // Update the sale price field
            $('#sale_price').val(salePrice.toFixed(2));
        }

        // Event listener for changes in dependent fields including package discount
        $('#treatment_price,#other_services, #hotel_acommodition_price, #transportation_acommodition_price, #tour_price, #visa_service_price, #translation_price, #ambulance_service_price, #ticket_price, #package_discount')
            .on('input', function() {
                updatePackagePrice();
            });
    });
</script>
@endsection