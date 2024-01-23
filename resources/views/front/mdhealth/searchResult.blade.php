@extends('front.layout.layout2')
@section('content')

<style>
    .greenCheck input[type="checkbox"],
    .greenCheck input[type="checkbox"]::before {
        border-radius: 50% !important;
        height: 12px;
        width: 12px;
    }

    .purchaseBtn {
        width: 195px;
        height: 41px;
        flex-shrink: 0;
        color: #000;
        font-family: Campton;
        font-size: 14px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        letter-spacing: -0.56px;
    }

    .red {
        color: red;
    }

    body {
        background-color: #F6F6F6;
        background: #F6F6F6;
    }

    .form-floating>label {
        padding: 0.75rem 0.75rem;
    }

    .packageResult {
        padding: 18px 32px;
        border-radius: 5px;
    }

    .scanQr {
        height: 60vh;
    }

    .treatmentForModal2 .form-control,
    .treatmentForModal2 .form-select {
        border: 2px solid #d6d6d6;
        border-radius: 5px;
        padding: 10px 16px;
        height: 48px;
        font-size: 16px;
    }
</style>
<div class="content-wrapper bg-f6">


    @php

    // dd($date);
    if (!function_exists('get_twenty_percent')) {
    function get_twenty_percent($number)
    {
    return floatval($number) * (20 / 100);
    }
    }

    if (Session::get('login_token') != null) {
    $user = true;
    } else {
    $user = false;
    }
    // $isCustomer = null;
    if (Session::get('MDCustomer*%') != null) {
    $isCustomer = true;
    } else {
    $isCustomer = false;
    }

    if (!function_exists('extractNumericRange')) {
    function extractNumericRange($inputString)
    {
    // Use regular expression to match the numeric range
    preg_match('/\b\d+-\d+\b/', $inputString, $matches);

    // Check if a match is found
    if (!empty($matches)) {
    return $matches[0];
    }

    // Return null if no match is found
    return null;
    }
    }

    // dd($packages[0]['brand_name']);
    // dd($treatment_name, $city_name);

    @endphp
    @section('style')

    @endsection

    <form method="POST" action="{{ url('health-search-result') }}">
        @csrf
        {{-- {{dd($packages)}} --}}
        <!-- SECTION 1 -->
        <div class="searchBar bg-f6">
            <div class="container pt-5 px-0">
                <!-- SEARCH PILL BAR -->
                <div class="search-bar d-flex align-items-center justify-content-between p-3 mb-5">
                    <div class="form-floating pe-3 position-relative">
                        <img src="{{ 'front/assets/img/Icon-treatment.png' }}" alt="" class="mx-2 pill-calender">
                        <select class="form-select" style="padding-left:35px" id="floatingSelect" name="treatment_name" aria-label="Floating label select example">
                            @if ($treatment_name == 'Select Treatment')
                            <option value="Select Treatment" selected>Select Treatment</option>
                            @endif
                            @foreach ($treatment_plans as $treatment_plan)
                            @if ($treatment_plan->product_category_name == $treatment_name)
                            <option value="{{ $treatment_plan->product_category_name }}" selected>
                                {{ $treatment_plan->product_category_name }}
                            </option>
                            @else
                            <option>{{ $treatment_plan->product_category_name }}</option>
                            @endif
                            @endforeach
                        </select>
                        </select>
                        <label for="floatingSelect">Service Type</label>
                    </div>
                    <div class="form-floating">
                        <select class="form-select border-end-0 bod-3" id="floatingSelect" name="city_name" aria-label="Floating label select example">
                            @if ($city_name == 'Select City')
                            <option value="Select City" selected>Select City</option>
                            @endif
                            @foreach ($cities as $city)
                            @if ($city->city_name == $city_name)
                            <option data-display="Select" value="{{ $city->city_name }}" selected>
                                {{ $city->city_name }}
                            </option>
                            @else
                            <option>{{ $city->city_name }}</option>
                            @endif
                            @endforeach
                        </select>
                        <label for="floatingSelect">City</label>
                    </div>
                    <div class="form-floating pe-3 position-relative">
                        <input type="text" class="form-select bod-n-3" style="background-image: none;padding-left:32px" name="daterange" value="{{ $date }}" />
                        <img src="{{ asset('front/assets/img/mdBookings/Calendar.png') }}" alt="" class="mx-2 pill-calender">
                        <label for="floatingSelect">Treatment Date</label>
                    </div>
                    <button class="btn btn-search-pill">Search</button>
                </div>
                <!-- END -->
                <input type="hidden" name="platform_type" value="web">
            </div>
        </div>
    </form>
</div>
</div>

<!-- SECTION 2 -->
<div class="section-2 bg-f6 pb-5">
    <div class="container">
        <div class="text-center">
            <h2 class="titleClass">Your <span class="text-green">search</span> results</h2>
        </div>
    </div>
</div>

<!-- SECTION 4 -->
<div class="packageResults">
    <div class="container">
        <div class="d-flex gap-3">
            <!-- TREATMENT CARDS -->
            <div class="w-761">
                <!-- MDBooking Adv. Image -->
                <div class="mb-3 position-relative">
                    <img style="width: 100%;" src="{{ 'front/assets/img/mdHealthAd.png' }}" alt="">
                    <img class="position-absolute" style="right: 0; bottom: 0;" src="{{ 'front/assets/img/plane.svg' }}" alt="">
                </div>

                @if (!empty($packages))
                @foreach ($packages as $key => $package_list)
                <div class="packageResult package-results-div mb-3 position-relative">
                    <div>
                        <div class="d-flex gap-4 align-items-center mb-2">
                            <p class="mb-0 card-h4">{{ $packages[$key]['package_name'] }}</p>
                            <img src="{{ 'front/assets/img/verifiedBy.svg' }}" alt="">
                        </div>
                        <div class="d-flex gap-5 mb-4">
                            <div class="d-flex gap-2 align-items-center">
                                <img src="{{ 'front/assets/img/Location.svg' }}" alt="">
                                <p class="mb-0 card-p1 fst-italic">{{ $packages[$key]['city_name'] }}</p>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <img src="{{ 'front/assets/img/Diaganose.svg' }}" alt="">
                                <p class="mb-0 card-p1 fst-italic">
                                    {{ !empty($packages[$key]['treatment_period_in_days']) ? 'Treatment Period ' . extractNumericRange($packages[$key]['treatment_period_in_days']) . ' days ' : '' }}
                                </p>
                            </div>
                        </div>
                        <div class="d-flex gap-4 package-results-details">
                            <div class="brdr-right">
                                <p class="packageResult-title mb-3">Package Includes</p>
                                @if (!empty($package_list['other_services']))
                                @foreach ($package_list['other_services'] as $index => $other_service)
                                @if (!empty($package_list['other_services'][$index]))
                                <div class="d-flex gap-1 align-items-baseline mb-1 packageservices-list">
                                    <img style="width: 11px;" src="{{ 'front/assets/img/Varlik.svg' }}" alt="">
                                    @if ($package_list['other_services'][$index] == 'Ambulance Services')
                                    <p class="mb-2 card-p1">
                                        {{ $package_list['other_services'][$index] }}
                                    </p>

                                    @elseif($package_list['other_services'][$index] == 'Accomodition')
                                    <p class="mb-2 card-p1">
                                        {{ $package_list['other_services'][$index] }}
                                        <span class="gray-p1"> (*{{ !empty($packages[$key]['hotel_stars']) ? $packages[$key]['hotel_stars'].' ' : '' }}Stars)</span>
                                    </p>

                                    @elseif($package_list['other_services'][$index] == ' Transportation')
                                    <p class="mb-2 card-p1">
                                        {{ $package_list['other_services'][$index] }}
                                        <span class="gray-p1"> (*{{ $packages[$key]['brand_name']  .' '. $packages[$key]['vehicle_model_id'] }})</span>
                                    </p>

                                    @elseif($package_list['other_services'][$index] == ' Tour')
                                    <p class="mb-2 card-p1">
                                        {{ $package_list['other_services'][$index] }}
                                        <span class="gray-p1"> (*{{ !empty($packages[$key]['tour_name']) ? $packages[$key]['tour_name'] : '' }})</span>
                                    </p>
                                    @else
                                    <p class="mb-2 card-p1">
                                        {{ $package_list['other_services'][$index] }}
                                    </p>
                                    @endif
                                </div>
                                @endif



                                <!-- <div class="d-flex gap-1 align-items-baseline mb-1">
                                                                                                                                                                                                                                                                                                                                    <img style="width: 11px;" src="{{ 'front/assets/img/Varlik.svg' }}" alt="">
                                                                                                                                                                                                                                                                                                                                </div> -->
                                @endforeach
                                @endif
                            </div>
                            <div class="brdr-right">
                                <p class="packageResult-title mb-0">Reviews<span class=""> (0)</span></p>
                                <div class="stars mb-2">
                                    <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 16px;" alt="">
                                    <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 16px;" alt="">
                                    <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 16px;" alt="">
                                    <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 16px;" alt="">
                                    <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 16px;" alt="">
                                </div>
                                <p class="card-h3">Excellent</p>
                            </div>
                            <div class="d-flex flex-column align-items-end gap-4 ">
                                <div>
                                    <p class="packageResult-title mb-3">Package Price</p>
                                    <div class="my-2">

                                        <strikethrough class="mb-2 strike strikePrice">
                                            {{ !empty($package_list['package_price']) ? $package_list['package_price'] : '' }} <span class="lira">₺</span>
                                        </strikethrough>
                                        <p class="mb-3 card-h4">
                                            {{ !empty($package_list['sale_price']) ? $package_list['sale_price'] : '' }}
                                            <span class="lira">₺</span> <span class="card-h1">*{{ '(' . get_twenty_percent(!empty($package_list['sale_price']) ? $package_list['sale_price'] : 0) . ' ₺)' }} </span>
                                        </p>
                                        {{-- <p class="camptonBook">*20% of the price is paid before booking.</p> --}}
                                    </div>
                                    <div class="d-flex gap-2 mb-2">

                                        @if ($isCustomer == true && $user == true)
                                        <button class="btn purchaseBtn" id="{{ $package_list['id'] }}" data-bs-toggle="modal">Purchase
                                            Package</button>

                                        @if($package_list['favourite_check']=='yes')
                                        <button class="favouriteBtn" id="fav-btn_{{ $package_list['id'] }}">
                                            <img src="{{ 'front/assets/img/white-heart.svg' }}" alt="">
                                        </button>
                                        @endif

                                        @if($package_list['favourite_check'] == 'no')
                                        <button class="favouriteBtn" id="fav-btn_{{ $package_list['id']}}" style="background-color: gray;">
                                            <img src="{{ 'front/assets/img/white-heart.svg' }}" alt="">
                                        </button>
                                        @endif

                                        @elseif($user == false)
                                        <button class="btn purchaseBtn" id="{{ $package_list['id'] }}" data-bs-toggle="modal">Purchase
                                            Package</button>

                                        @if($package_list['favourite_check']=='yes')
                                        <button class="favouriteBtn" id="fav-btn_{{ $package_list['id'] }}">
                                            <img src="{{ 'front/assets/img/white-heart.svg' }}" alt="">
                                        </button>
                                        @endif

                                        @if($package_list['favourite_check'] == 'no')
                                        <button class="favouriteBtn" id="fav-btn_{{ $package_list['id']}}" style="background-color: gray;">
                                            <img src="{{ 'front/assets/img/white-heart.svg' }}" alt="">
                                        </button>
                                        @endif

                                        @endif

                                    </div>
                                </div>
                                <form method="POST" id="myForm_{{ $package_list['id'] }}" action="{{ url('health-pack-details') }}" class="mt-auto">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $package_list['id'] }}">
                                    <a href="javascript:void(0)" id="submit_btn_{{ $package_list['id'] }}" class="view_btn card-h1 fs-13 text-decoration-underline text-black details-abs" style="font-family: Campton !important">View All Details</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade treatmentForModal" id="treatmentForModal_{{ $package_list['id'] }}" tabindex="-1" aria-labelledby="treatmentForModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered position-relative">
                        <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close"> -->
                        <!-- </button> -->
                        <div class="modal-content">
                            <img class="closeModal" style="cursor:pointer" data-bs-dismiss="modal" src="{{ 'front/assets/img/closeModal.png' }}" alt="">
                            <img src="{{ 'front/assets/img/step1.svg' }}" alt="">
                            <p class="card-h1 text-center mt-4">Who is this treatment for?</p>
                            <div class="d-flex align-items-center flex-column">
                                <a href="{{ url('myself_as_patient/' . $package_list['id']) }}" type="button" class="btn btn-sm btn-md df-center mt-4">Myself</a>
                                <a href="{{ url('#') }}" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#treatmentForModal2_{{ $package_list['id'] }}" type="button" class="btn btn-sm whiteBtn df-center mt-3 mb-5">Other</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade treatmentForModal2" id="treatmentForModal2_{{ $package_list['id'] }}" tabindex="-1" aria-labelledby="treatmentForModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered position-relative" style="width:704px">
                        <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close"> -->
                        <!-- </button> -->
                        <div class="modal-content p-4">

                            <div>
                                <div class="text-end">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <!-- <img src="{{ 'front/assets/img/modalClose.png' }}" alt=""> -->
                                    </button>
                                </div>

                                <div class="text-center" style="margin-top: -8px;">
                                    <h4 class="modal-title modal-h1 mb-2" id="exampleModalLabel">Change Patient Information</h4>
                                    <p class="mb-4 card-p2">Fill the patient detail.</p>
                                </div>
                            </div>
                            <!-- <img class="closeModal" data-bs-dismiss="modal" src="{{ 'front/assets/img/modalClose.png' }}" alt="">
                            <p class="modal-h1 mt-4 text-center">Change Patient Information</p>
                            <p class="card-p1 text-center">Fill the patient detail.</p> -->
                            <div class="modal-body">
                                <form id="other_form" class="row g-4">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{ $package_list['id'] }}">
                                    <input type="hidden" name="platform_type" value="web">
                                    <input type="hidden" name="package_buy_for" value="other">
                                    <div class="col-md-4">
                                        <label for="patient_full_name" class="form-label fw-bold">*Patient
                                            Full
                                            Name</label>
                                        <input type="text" name="patient_full_name" class="form-control  " id="patient_full_name" placeholder="Full Name">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="patient_relation" class="form-label fw-bold">*Relationship
                                            To You</label>
                                        <input type="text" name="patient_relation" class="form-control " id="patient_relation" placeholder="Relationship To You">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="patient_email" class="form-label fw-bold">*Patient
                                            E-mail</label>
                                        <input type="email" name="patient_email" class="form-control  " id="patient_email" placeholder="Email">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="patient_contact_no" class="form-label fw-bold">*Patient
                                            Contact Number</label>
                                        <input type="tel" name="patient_contact_no" class="form-control  " id="patient_contact_no" placeholder="Contact Number">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="patient_country_id" class="form-label fw-bold">*Patient
                                            Country</label>
                                        <select name="patient_country_id" id="patient_country_id" class="form-select ">
                                            <option value="" selected>Country</option>
                                            @foreach ($counties as $country)
                                            <option value="{{ $country->id }}">
                                                {{ $country->country_name }}
                                            </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="patient_city_id" class="form-label fw-bold">*Patient
                                            City</label>
                                        <select name="patient_city_id" id="patient_city_id" class="form-select ">
                                            <option value="" selected>City</option>
                                            @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->city_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <p class="mt-5 mb-0 card-p1 fw-bold">*You can also change the patient
                                        information from <span class="card-h1">panel</span> <span class="camptonBold text-green">></span> <span class="card-h1">packages</span></p>
                                    <div class="col-12 df-center">
                                        <a href="javascript:void(0)" id="other" class="btn purchaseBtn my-4 df-center">
                                            <span class="fw-bold">Step 2: </span> <span class="camptonBook ms-1">Payment Page</span>
                                        </a>
                                    </div>
                                </form>
                                <input type="hidden" value="{{ url('purchase-package/' . $package_list['id']) }}" id="hidden_url">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Model -->
                @endforeach
                @endif




            </div>
            <!-- FILTERS -->
            <div class="w-292">
                <div class="packageFilter rounded mb-3">
                    <p class="card-h4">Supplier Rating</p>
                    <div>
                        <form action="" class="filter greenCheck">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-2 align-items-center mb-2">
                                    <input type="checkbox" id="" name="" value="">
                                    <label for="vehicle1" class="card-p1">Excellent (4-5)</label><br>
                                </div>
                                <p class="mb-1">(23)</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-2 align-items-center mb-2">
                                    <input type="checkbox" id="" name="" value="">
                                    <label for="vehicle2" class="card-p1">Good (4-5)</label><br>
                                </div>
                                <p class="mb-1">(14)</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-2 align-items-center mb-2">
                                    <input type="checkbox" id="" name="" value="">
                                    <label for="vehicle3" class="card-p1">Normal (4-5)</label>
                                </div>
                                <p class="mb-1">(8)</p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="packageFilter rounded mb-3">
                    <p class="card-h4">Services</p>
                    <div>
                        <form action="" class="filter greenCheck">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-1 align-items-center mb-2">
                                    <input type="checkbox" id="" name="" value="">
                                    <label for="vehicle1" class="card-p1">Full Package</label><br>
                                </div>
                                <p class="mb-1">(23)</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-1 align-items-center mb-2">
                                    <input type="checkbox" id="" name="" value="">
                                    <label for="vehicle2" class="card-p1">Transporting</label><br>
                                </div>
                                <p class="mb-1">(14)</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-1 align-items-center mb-2">
                                    <input type="checkbox" id="" name="" value="">
                                    <label for="vehicle3" class="card-p1">Accomodation</label>
                                </div>
                                <p class="mb-1">(8)</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-1 align-items-center mb-2">
                                    <input type="checkbox" id="" name="" value="">
                                    <label for="vehicle3" class="card-p1">Translate</label>
                                </div>
                                <p class="mb-1">(8)</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-1 align-items-center mb-2">
                                    <input type="checkbox" id="" name="" value="">
                                    <label for="vehicle3" class="card-p1">Tour</label>
                                </div>
                                <p class="mb-1">(8)</p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="packageFilter rounded mb-3">
                    <p class="card-h4">Price</p>
                    <div>
                        <form action="" class="filter greenCheck">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-1 align-items-center">
                                    <input type="checkbox" id="" name="" value="">
                                    <label for="vehicle1">10,000 <span class="lira">₺</span> - 20,000 <span class="lira">₺</span></label><br>
                                </div>
                                <p class="mb-1">(23)</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-1 align-items-center">
                                    <input type="checkbox" id="" name="" value="">
                                    <label for="vehicle2">20,001 <span class="lira">₺</span> - 50,000 <span class="lira">₺</span></label><br>
                                </div>
                                <p class="mb-1">(14)</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-1 align-items-center">
                                    <input type="checkbox" id="" name="" value="">
                                    <label for="vehicle2">50,001 <span class="lira">₺</span> - 70,000 <span class="lira">₺</span></label><br>
                                </div>
                                <p class="mb-1">(14)</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-1 align-items-center">
                                    <input type="checkbox" id="" name="" value="">
                                    <label for="vehicle2">70,001 <span class="lira">₺</span> - 90,000 <span class="lira">₺</span></label><br>
                                </div>
                                <p class="mb-1">(14)</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="modal fade request-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" style="width:704px">
                <div class="modal-content p-3">
                    <div>
                        <div class="text-end">
                            <button type="button" class="btn-close m-3" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>

                        <div class="text-center mb-4">
                            <h4 class="modal-title" id="exampleModalLabel">Couldn't find your <span style="color: #08fc34">treatment</span> package?</h4>
                            <p>Fill the form & get your desired treatment plan</p>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form class="row g-4">
                            <div class="col-md-4">
                                <label for="inputEmail4" class="form-label fw-bold">*First Name</label>
                                <input type="email" class="form-control  h-75" id="inputEmail4" placeholder="First Name">
                            </div>
                            <div class="col-md-4">
                                <label for="inputPassword4" class="form-label fw-bold">*Last Name</label>
                                <input type="text" class="form-control h-75" id="inputPassword4" placeholder="Last Name">
                            </div>
                            <div class="col-md-4">
                                <label for="inputAddress" class="form-label fw-bold">*Email</label>
                                <input type="email" class="form-control  h-75" id="inputAddress" placeholder="Optional">
                            </div>

                            <div class="col-md-4">
                                <label for="inputState" class="form-label fw-bold">*Country</label>
                                <select id="inputState" class="form-select h-75">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="inputAddress33" class="form-label fw-bold">*Contact Mobile</label>
                                <input type="tel" class="form-control h-75" id="inputAddress33" placeholder="+Contact Mobile">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Whatsapp</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Telegram</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="inputAddress443" class="form-label fw-bold">*Treatment Name</label>
                                <input type="text" class="form-control h-75" id="inputAddress443" placeholder="Treatment Name">
                            </div>

                            <div class="col-md-12">
                                <label for="inputAddress5" class="form-label fw-bold">*Details</label>
                                <input type="text" class="form-control h-75" id="inputAddress5" placeholder="Please Write your treatment requirement in detail">
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress5" class="form-label fw-bold">*Previes Treatment</label>
                                <input type="text" class="form-control h-75" id="inputAddress5" placeholder="Have you done/received any related treatment before If Yes,Please write the details">
                            </div>
                            <div class="col-md-6">
                                <label for="formFile" class="form-label fw-bold">Upload Your Treatment
                                    Documents</label>
                                <input class="form-control h-75" type="file" id="formFile">
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress5" class="form-label fw-bold">When do you need the
                                    treatment?</label>
                                <input type="text" class="form-control h-75" id="inputAddress5" placeholder="Apartment, studio, or floor">
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress5" class="form-label fw-bold">Do you need travel visa?</label>
                                <div class="mt-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                        <label class="form-check-label" for="inlineCheckbox2">No</label>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 text-center ">
                                <button type="submit" class="btn save-btn-green">Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =============================================================================================================
                                                                     MAKE REQUEST FORM
        ============================================================================================================= -->
    <div class="container section-wrapper df-center flex-column gap-5 py-100px section-2">
        <h2 class="position-relative">Couldn’t find your <span class="text-green bb-green1">treatment</span>
            package?</h2>
        <div class="card border-0 position-relative">
            <div class="card-body df-center flex-column">
                <p class="card-text">Contact us with your detail & our team will prepare your desired <br> treatment
                    package!
                </p>
                <button class="btn btn-md-black position-absolute" data-bs-toggle="modal" data-bs-target="#exampleModal">Make a Request</button>
                <img src="{{ 'front/assets/img/doctor.png' }}" class="position-absolute doctorImg" alt="">
            </div>
            <!-- exampleModal -->
        </div>
    </div>
</div>

<!-- SECTION 4 -->
<div class="bg-f6 scanQr">
    <img src="{{ 'front/assets/img/appScreenFooter.png' }}" alt="">
</div>


</div>

<div class="modal fade loginFirstModal" id="loginFirstModal" tabindex="-1" aria-labelledby="serviceForModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered position-relative">
        <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close"> -->
        <!-- </button> -->
        <div class="modal-content bg-f6">
            <img class="closeModal" data-bs-dismiss="modal" src="{{ 'front/assets/img/closeModal.png' }}" alt="">
            <img src="{{ 'front/assets/img/Oops.svg' }}" alt="">
            <div class="d-flex align-items-center flex-column">
                <p class="camptonBook fw-bold text-center mt-4">Excited to explore more? It's time to join <span class="camptonBold">MD</span> family.</p>
                <a href="{{ url('/user-account') }}" type="button" class="btn btn-sm btn-md df-center mb-4">Get
                    Started</a>
                <p class="camptonBook fw-bold text-center mt-4">Already<span class="camptonBold">MD</span> member?</p>
                <a href="{{ url('/sign-in-web') }}" type="button" class="btn btn-sm whiteBtn df-center mb-5">Sign
                    In</a>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
{{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> --}}
<script type="text/javascript">
    $(document).ready(function() {

        var baseUrl = $('#base_url').val();
        var token = "{{ Session::get('login_token') }}";
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var user = "{{ $user }}";
        $(".view_btn").click(function() {
            var id = this.id.split("_")[2];
            $("#myForm_" + id).submit();
            // alert("hi"+id);
        });

        $('#other').click(function(e) {
            e.preventDefault();
            $('#other_form').submit();
        });

        $('.favouriteBtn').on('click', function() {
            if (user == '1') {

                var packageId = $(this).attr('id').split("_")[1];
                // alert(packageId);
                var formData = new FormData();
                formData.append('package_id', packageId);

                $.ajax({
                    url: baseUrl + '/api/md-add-package-to-favourite',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'X-CSRF-TOKEN': csrfToken
                    },
                    beforeSend: function() {
                        $('#fav-btn' + packageId).attr('disabled', true);
                        $('#fav-btn' + packageId).html(
                            '<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>'
                        );
                    },
                    success: function(response) {

                        $('#fav-btn' + packageId).attr('disabled', false);
                        $('#other').html(
                            '<img src="front/assets/img/white-heart.svg" alt="">');



                        $('#fav-btn_' + packageId).css('background-color', '');

                        console.log('Success:', response);

                        toastr.success(response.message, 'Success', {
                            positionClass: 'toast-bottom-right',
                            backgroundcolor: '#006400',
                        });

                    },

                    error: function(xhr, status, error) {
                        $('#fav-btn' + packageId).attr('disabled', false);
                        $('#other').html(
                            '<img src="front/assets/img/white-heart.svg" alt="">');
                        alert('Error:', error);
                    }
                });
            } else {
                $('#loginFirstModal').modal('show');
            }
        });

        $('#other_form').validate({
            rules: {
                patient_full_name: {
                    required: true,
                },
                patient_relation: {
                    required: true,
                },
                patient_email: {
                    required: true,
                    email: true,
                },
                patient_contact_no: {
                    required: true,
                },
                patient_country_id: {
                    required: true,
                },
                patient_city_id: {
                    required: true,
                },

            },
            messages: {
                patient_full_name: {
                    required: "Please enter patient full name",
                },
                patient_relation: {
                    required: "Please enter patient relation",
                },
                patient_email: {
                    required: "Please enter patient email",
                },
                patient_contact_no: {
                    required: "Please enter patient contact no",
                },
                patient_country_id: {
                    required: "Please select patient country",
                },
                patient_city_id: {
                    required: "Please select patient city",
                },

            },
            submitHandler: function(form) {
                var formData = $(form).serialize();
                console.log(formData);
                $.ajax({
                    url: baseUrl + '/api/md-change-patient-information',
                    type: 'POST',
                    data: formData,
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'X-CSRF-TOKEN': csrfToken
                    },
                    beforeSend: function() {
                        $('#other').attr('disabled', true);
                        $('#other').html(
                            '<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Please Wait...'
                        );
                    },
                    success: function(response) {
                        $('#other').attr('disabled', false);
                        // $('#other').html('<span class="fw-bold">Step 2:</span> <span class="camptonBook">Payment Page</span>');
                        console.log('Success:', response);
                        var url = $('#hidden_url').val() + '/' + response.id.patient_id;

                        window.location.href = url;
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
                return false;
            }
        });





        //md-add-package-to-favourite

        $('.purchaseBtn').click(function(e) {
            e.preventDefault();

            var id = this.id;
            // alert(id);
            // $('.treatmentForModal_'+id).modal('hide');
            if (user == '1') {
                $('#treatmentForModal_' + id).modal('show');
            } else {
                $('.treatmentForModal_' + id).modal('hide');
                $('#loginFirstModal').modal('show');
            }
        });

        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left',
                singleDatePicker: true,
                locale: {
                    format: 'DD/MM/YYYY'
                }
                // $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            }, function(start, end, label) {});
        });
    });
</script>
@endsection