@extends('front.layout.layout2')
@section('content')
<div class="content-wrapper bg-f6">


@php

    // dd($date);
    if(!function_exists('get_twenty_percent')){
        function get_twenty_percent($number){
            return floatval($number) * (20/100);
        }
    }

    if (Session::get('login_token') != null) {
        $user = true;
    } else {
        $user = false;
    }

    // dd($packages);

@endphp

<style>
    .custom-dropdown .dropdown-header {
        padding: 10px 10px 10px 40px;
    }
    .custom-dropdown {
        position: unset;
        z-index: 1;
    }
    .custom-dropdown .dropdown-list {
        width: 285px;
        left: 0;
    }
    .filter-label {
        color: #A3A3A3;
        font-size: 14px;
        font-weight: 500;
    }
    .custom-dropdown-div.form-floating>label{
        opacity: .65;
        transform: scale(.85) translateY(-0.5rem) translateX(0.15rem);
    }
    .for-custom-dropdown-div {
        padding-top: 1.225rem;
        padding-bottom: 0.625rem;
        position: relative;
    }
    .for-custom-dropdown-div svg {
        position: absolute;
        z-index: 0;
    }
    .search-bar .form-floating:nth-child(2) {
        padding: 8px 10px 10px 12px;
    }
    .search-bar .form-floating:nth-child(2) .for-custom-dropdown-div {
        padding-top: 8px;
    }
</style>

 <form method="POST" action="{{ url('health-search-result') }}">
 @csrf
{{-- {{dd($packages)}} --}}
    <!-- SECTION 1 -->
    <div class="searchBar bg-f6">
        <div class="container pt-5 px-0">
            <div class="search-bar d-flex align-items-center justify-content-between p-3 gap-3 mb-5">
                <div class="form-floating position-relative booking-box-h border d-flex flex-column custom-dropdown-div" style="padding: 0">
                    <!-- <select class="form-select" id="floatingSelect" name="treatment_name" aria-label="Floating label select example">
                        <option data-display="Select" value="{{$treatment_name}}" selected>{{$treatment_name}}</option>
                            @foreach($treatment_plans as $treatment_plan){
                                    <option>{{$treatment_plan->product_category_name}}</option>
                                }@endforeach
                            </select>
                    </select>
                    <label for="floatingSelect">Service Type</label> -->
                    
                    <div class="for-custom-dropdown-div d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="20" viewBox="0 0 20 20" fill="none"><g clip-path="url(#clip0_0_22639)"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.99875 1.25C8.19753 1.24978 8.39122 1.31275 8.55187 1.42981C8.71252 1.54688 8.83181 1.71197 8.8925 1.90125L13 14.7375L14.6075 9.715C14.6679 9.52569 14.7869 9.36047 14.9473 9.24319C15.1077 9.12591 15.3013 9.06263 15.5 9.0625H17.0625C17.3111 9.0625 17.5496 9.16127 17.7254 9.33709C17.9012 9.5129 18 9.75136 18 10C18 10.2486 17.9012 10.4871 17.7254 10.6629C17.5496 10.8387 17.3111 10.9375 17.0625 10.9375H16.1838L13.8925 18.0988C13.8317 18.2877 13.7126 18.4525 13.5522 18.5694C13.3918 18.6863 13.1985 18.7493 13 18.7493C12.8015 18.7493 12.6082 18.6863 12.4478 18.5694C12.2874 18.4525 12.1683 18.2877 12.1075 18.0988L8.00625 5.2825L5.14375 14.345C5.08469 14.5317 4.96864 14.6953 4.81187 14.8127C4.6551 14.9301 4.4655 14.9955 4.26968 14.9996C4.07387 15.0038 3.88168 14.9465 3.72009 14.8358C3.5585 14.7251 3.43564 14.5666 3.36875 14.3825L1.78875 10.0375L1.70125 10.2975C1.6391 10.4841 1.51983 10.6464 1.36033 10.7615C1.20083 10.8766 1.00918 10.9386 0.8125 10.9388H-1.0625C-1.31114 10.9388 -1.5496 10.84 -1.72541 10.6642C-1.90123 10.4883 -2 10.2499 -2 10.0013C-2 9.75261 -1.90123 9.51415 -1.72541 9.33834C-1.5496 9.16252 -1.31114 9.06375 -1.0625 9.06375H0.1375L0.86 6.8925C0.921249 6.70756 1.03859 6.5463 1.19571 6.43113C1.35283 6.31595 1.54194 6.25259 1.73673 6.24984C1.93153 6.24709 2.12234 6.30509 2.28265 6.41579C2.44296 6.52648 2.56481 6.68437 2.63125 6.8675L4.1875 11.1488L7.10625 1.90625C7.16601 1.71624 7.28473 1.5502 7.4452 1.4322C7.60568 1.3142 7.79956 1.25039 7.99875 1.25Z" fill="#111111"/></g><defs><clipPath id="clip0_0_22639"><rect width="20" height="20" fill="white"/></clipPath></defs></svg>

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
                    </div>
                    <label for="floatingSelect">Treatment</label>
                </div>
                <div class="form-floating position-relative booking-box-h border d-flex flex-column custom-dropdown-div">
                    <!-- <select class="form-select" id="floatingSelect" name="city_name" aria-label="Floating label select example">
                        <option data-display="Select" value="{{$city_name}}" selected>{{$city_name}}</option>
                        @foreach($cities as $city){
                                    <option>{{$city->city_name}}</option>
                                }@endforeach
                    </select> -->
                    <div class="for-custom-dropdown-div d-flex align-items-center">
                        <div class="custom-dropdown">
                            <div class="dropdown-header fsb-1 fw-500 ps-0" tabindex="0">Select an option</div>
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
                    </div>
                    <label for="floatingSelect">City</label>
                </div>
                <div class="form-floating">
                    <!-- <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                                                                                    <option data-display="Select" selected>12 Aug</option>
                                                                                                    <option value="1">One</option>
                                                                                                    <option value="2">Two</option>
                                                                                                    <option value="3">Three</option>
                                                                                                </select> -->
                    <!-- <div class="datepickerContainer"> -->
                    <input type="text" class="form-select" name="daterange" value="{{$date}}" style="background-image: none;" />
                    <!-- </div> -->
                    <label for="floatingSelect">Treatment Date</label>
                </div>
                <button class="btn btn-search-pill">Search</button>
            </div>
            <input type="hidden" name="platform_type" value="web">
                            </form>
        </div>
    </div>

    <!-- SECTION 2 -->
    <div class="section-2 bg-f6">
        <div class="container">
            <div class="text-center">
                <h2 class="titleClass">Your <span style="color: #08fc34">search</span> results</h2>
            </div>
        </div>
    </div>

    <!-- SECTION 4 -->
    <div class="packageResults">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="mb-3 position-relative">
                        <img style="width: 100%;" src="{{('front/assets/img/mdHealthAd.png')}}" alt="">
                        <img class="position-absolute" style="right: 0; bottom: 0;" src="{{('front/assets/img/plane.svg')}}" alt="">
                    </div>
                    @php
                    if(!empty($packages)){
                        @endphp
                        @foreach($packages as $key => $package_list)
                        <div class="packageResult rounded mb-3">
                            <div>
                                <div class="d-flex gap-2 align-items-center">
                                    <p class="mb-0 fs-5 camptonBold lh-base">{{$packages[$key]['package_name']}}</p>
                                    <img src="{{('front/assets/img/verifiedBy.svg')}}" alt="">
                                </div>
                                <div class="d-flex gap-5 mb-4">
                                    <div class="d-flex gap-2 align-items-center">
                                        <img src="{{('front/assets/img/Location.svg')}}" alt="">
                                        <p class="mb-0 lctn">{{$packages[$key]['city_name']}}</p>

                                    </div>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="{{('front/assets/img/Diaganose.svg')}}" alt="">
                                        <p class="mb-0 lctn fst-italic">{{$packages[$key]['treatment_period_in_days']}}</p>
                                    </div>
                                </div>
                                <div class="d-flex gap-4">
                                    <div class="brdr-right">
                                        <p class="mb-0"><span class="text-green fw-bold camptonBold" style="font-size: 1.125rem;">Package Includes</span></p>
                                        @if(!empty($package_list['other_services']))
                                        @foreach($package_list['other_services'] as $key => $other_service)
                                            @if(!empty($package_list['other_services'][$key]))
                                                <div class="d-flex gap-1 align-items-baseline mb-1">
                                                <img style="width: 11px;" src="{{('front/assets/img/Varlik.svg')}}" alt="">
                                                <p class="mb-0 camptonBook smallFont">{{$package_list['other_services'][$key]}}</p>
                                                </div>
                                            @endif



                                        <!-- <div class="d-flex gap-1 align-items-baseline mb-1">
                                            <img style="width: 11px;" src="{{('front/assets/img/Varlik.svg')}}" alt="">
                                            <p class="mb-0 camptonBook smallFont boldRed">Ambulance</p>
                                        </div> -->
                                        @endforeach
                                        @endif
                                    </div>
                                    <div class="brdr-right">
                                        <p class="mb-0"><span class="text-green fw-bold camptonBold" style="font-size: 1.125rem;">Reviews</span><span class="fw-normal">(480)</span></p>
                                        <div class="stars">
                                            <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                            <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                            <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                            <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                            <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                        </div>
                                        <p class="fs-6 camptonBold">Excellent</p>
                                    </div>
                                    <div class="d-flex flex-column align-items-end gap-4">
                                        <div>
                                            <p class="mb-0">
                                                <span class="text-green fw-bold camptonBold" style="font-size: 1.125rem;">Package Price</span>
                                            </p>
                                            <div class="my-2">
                                                <p class="mb-0 fs-5 camptonBold lh-base">{{$package_list['package_price']}} ₺ <span class="smallFont fs-6">*{{"(".get_twenty_percent($package_list['package_price'])."₺)"}}</span></p>
                                                <p class="camptonBook">*20% of the price is paid before booking.</p>
                                            </div>
                                            <div class="d-flex gap-2 mb-2">
                                                <button class="btn purchaseBtn"  id="{{$package_list['id']}}"data-bs-toggle="modal" >Purchase Package</button>
                                                <button class="favouriteBtn">
                                                    <img src="{{('front/assets/img/white-heart.svg')}}" alt="">
                                                </button>
                                            </div>
                                        </div>
                                        <form method="POST" id="myForm_{{$package_list['id']}}" action="{{ url('health-pack-details') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$package_list['id']}}">
                                        <a href="javascript:void(0)" id="submit_btn_{{$package_list['id']}}" class="underline smallFont view_btn">View All Details</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade treatmentForModal" id="treatmentForModal_{{$package_list['id']}}" tabindex="-1" aria-labelledby="treatmentForModal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered position-relative">
                                <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close"> -->
                                    <!-- </button> -->
                                <div class="modal-content">
                                    <img class="closeModal" data-bs-dismiss="modal" src="{{('front/assets/img/closeModal.png')}}" alt="">
                                    <img src="{{('front/assets/img/step1.svg')}}" alt="">
                                    <p class="camptonBook fw-bold text-center mt-4">Who is this treatment for?</p>
                                    <div class="d-flex align-items-center flex-column">
                                        <a href="{{url('myself_as_patient/'.$package_list['id'])}}" type="button" class="btn btn-sm btn-md df-center mt-4">Myself</a>
                                        <a href="{{url('#')}}" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#treatmentForModal2_{{$package_list['id']}}" type="button" class="btn btn-sm whiteBtn df-center mt-3 mb-5">Other</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade treatmentForModal2" id="treatmentForModal2_{{$package_list['id']}}" tabindex="-1" aria-labelledby="treatmentForModal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered position-relative">
                                <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close"> -->
                                    <!-- </button> -->
                                <div class="modal-content">
                                    <img class="closeModal" data-bs-dismiss="modal" src="{{('front/assets/img/modalClose.png')}}" alt="">
                                    <p class="camptonBold fs-4 fw-bold text-center mt-4">Change Patient Information</p>
                                    <p class="camptonBook text-center">Fill the patient detail.</p>
                                    <div class="modal-body">
                                        <form id="other_form" class="row g-4">
                                            @csrf
                                            <input type="hidden" name="package_id" value="{{$package_list['id']}}">
                                            <input type="hidden" name="platform_type" value="web">
                                            <input type="hidden" name="package_buy_for" value="other">
                                                <div class="col-md-4">
                                                    <label for="inputEmail4" class="form-label fw-bold">*Patient Full Name</label>
                                                    <input type="email" name="patient_full_name" class="form-control  h-75" id="inputEmail4" placeholder="Full Name">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="inputPassword4" class="form-label fw-bold">*Relationship To You</label>
                                                    <input type="text" name="patient_relation" class="form-control h-75" id="inputPassword4" placeholder="Relationship To You">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="inputAddress" class="form-label fw-bold">*Patient E-mail</label>
                                                    <input type="email" name="patient_email" class="form-control  h-75" id="inputAddress"  placeholder="Email">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="inputAddress" class="form-label fw-bold">*Patient Contact Number</label>
                                                    <input type="email" name="patient_contact_no" class="form-control  h-75" id="inputAddress"  placeholder="Contact Number">
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="inputState" class="form-label fw-bold">*Patient Country</label>
                                                    <select name="patient_country_id" id="inputState" class="form-select h-75">
                                                        <option selected>Country</option>
                                                        @foreach($counties as $country)
                                                            <option value="{{$country->id}}">{{$country->country_name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="inputState" class="form-label fw-bold">*Patient City</label>
                                                    <select name="patient_city_id" id="inputState" class="form-select h-75">
                                                        <option selected>City</option>
                                                        @foreach($cities as $city)
                                                            <option value="{{$city->id}}">{{$city->city_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <p class="mt-5 mb-0 camptonBook">*You can also change the patient information from <span class="camptonBold">panel</span> <span class="camptonBold text-green">></span> <span class="camptonBold">packages</span></p>
                                                <div class="col-12 text-center ">
                                                    <a href="javascript:void(0)" id="other"  class="btn purchaseBtn my-4" style="padding: 10px 6rem">
                                                        <span class="fw-bold">Step 2:</span> <span class="camptonBook">Payment Page</span>
                                                    </a>
                                                </div>
                                            </form>
                                            <input type="hidden" value="{{url('purchase-package/'.$package_list['id'])}}" id="hidden_url">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Model -->
                    @endforeach
                    @php
                    }
                    @endphp


                </div>
                <div class="col-4">
                    <div class="packageFilter rounded mb-3">
                        <p class="fs-5 camptonBold lh-base">Supplier Rating</p>
                        <div>
                            <form action="" class="filter greenCheck">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex gap-1 align-items-center">
                                        <input type="checkbox" id="" name="" value="">
                                        <label for="vehicle1">Excellent (4-5)</label><br>
                                    </div>
                                    <p class="mb-1">(23)</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex gap-1 align-items-center">
                                        <input type="checkbox" id="" name="" value="">
                                        <label for="vehicle2">Good (4-5)</label><br>
                                    </div>
                                    <p class="mb-1">(14)</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex gap-1 align-items-center">
                                        <input type="checkbox" id="" name="" value="">
                                        <label for="vehicle3">Normal (4-5)</label>
                                    </div>
                                    <p class="mb-1">(8)</p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="packageFilter rounded mb-3">
                        <p class="fs-5 camptonBold lh-base">Services</p>
                        <div>
                            <form action="" class="filter greenCheck">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex gap-1 align-items-center">
                                        <input type="checkbox" id="" name="" value="">
                                        <label for="vehicle1">Full Package</label><br>
                                    </div>
                                    <p class="mb-1">(23)</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex gap-1 align-items-center">
                                        <input type="checkbox" id="" name="" value="">
                                        <label for="vehicle2">Transporting</label><br>
                                    </div>
                                    <p class="mb-1">(14)</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex gap-1 align-items-center">
                                        <input type="checkbox" id="" name="" value="">
                                        <label for="vehicle3">Accomodation</label>
                                    </div>
                                    <p class="mb-1">(8)</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex gap-1 align-items-center">
                                        <input type="checkbox" id="" name="" value="">
                                        <label for="vehicle3">Translate</label>
                                    </div>
                                    <p class="mb-1">(8)</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex gap-1 align-items-center">
                                        <input type="checkbox" id="" name="" value="">
                                        <label for="vehicle3">Tour</label>
                                    </div>
                                    <p class="mb-1">(8)</p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="packageFilter rounded mb-3">
                        <p class="fs-5 camptonBold lh-base">Price</p>
                        <div>
                            <form action="" class="filter greenCheck">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex gap-1 align-items-center">
                                        <input type="checkbox" id="" name="" value="">
                                        <label for="vehicle1">10,000 ₺ - 20,000 ₺</label><br>
                                    </div>
                                    <p class="mb-1">(23)</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex gap-1 align-items-center">
                                        <input type="checkbox" id="" name="" value="">
                                        <label for="vehicle2">20,001 ₺ - 50,000 ₺</label><br>
                                    </div>
                                    <p class="mb-1">(14)</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex gap-1 align-items-center">
                                        <input type="checkbox" id="" name="" value="">
                                        <label for="vehicle2">50,001 ₺ - 70,000 ₺</label><br>
                                    </div>
                                    <p class="mb-1">(14)</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex gap-1 align-items-center">
                                        <input type="checkbox" id="" name="" value="">
                                        <label for="vehicle2">70,001 ₺ - 90,000 ₺</label><br>
                                    </div>
                                    <p class="mb-1">(14)</p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3">
                <div>
                    <div class="text-end">
                        <button type="button" class="btn-close m-3" data-bs-dismiss="modal"
                            aria-label="Close">
                        </button>
                    </div>

                    <div class="text-center">
                        <h4 class="modal-title" id="exampleModalLabel">Couldn't find your <span
                                style="color: #08fc34">treatment</span> package?</h4>
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
                            <input type="tel" class="form-control h-75" id="inputAddress33"
                                placeholder="+Contact Mobile">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                    id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Whatsapp</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                    id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Telegram</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="inputAddress443" class="form-label fw-bold">*Treatment Name</label>
                            <input type="text" class="form-control h-75" id="inputAddress443"
                                placeholder="Treatment Name">
                        </div>

                        <div class="col-md-12">
                            <label for="inputAddress5" class="form-label fw-bold">*Details</label>
                            <input type="text" class="form-control h-75" id="inputAddress5"
                                placeholder="Please Write your treatment requirement in detail">
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress5" class="form-label fw-bold">*Previes Treatment</label>
                            <input type="text" class="form-control h-75" id="inputAddress5"
                                placeholder="Have you done/received any related treatment before If Yes,Please write the details">
                        </div>
                        <div class="col-md-6">
                            <label for="formFile" class="form-label fw-bold">Upload Your Treatment Documents</label>
                            <input class="form-control h-75" type="file" id="formFile">
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress5" class="form-label fw-bold">When do you need the treatment?</label>
                            <input type="text" class="form-control h-75" id="inputAddress5"
                                placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress5" class="form-label fw-bold">Do you need travel visa?</label>
                            <div class="mt-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                        value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                        value="option2">
                                    <label class="form-check-label" for="inlineCheckbox2">No</label>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 text-center ">
                            <button type="submit" class="btn w-50 mt-4"
                                style="height: 50px;background-color:#08fc34">Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>

    <!-- SECTION 4 -->
    <div class="bg-f6 scanQr">
        <img src="{{('front/assets/img/appScreenFooter.png')}}" alt="">
    </div>


</div>

<div class="modal fade loginFirstModal" id="loginFirstModal" tabindex="-1" aria-labelledby="serviceForModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered position-relative">
        <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close"> -->
            <!-- </button> -->
        <div class="modal-content bg-f6">
            <img class="closeModal" data-bs-dismiss="modal" src="{{('front/assets/img/closeModal.png')}}" alt="">
            <img src="{{('front/assets/img/Oops.svg')}}" alt="">
            <div class="d-flex align-items-center flex-column">
                <p class="camptonBook fw-bold text-center mt-4">Excited to explore more? It's time to join <span class="camptonBold">MD</span> family.</p>
                <a href="{{url('/user-account')}}" type="button" class="btn btn-sm btn-md df-center mb-4">Get Started</a>
                <p class="camptonBook fw-bold text-center mt-4">Already<span class="camptonBold">MD</span> member?</p>
                <a href="{{url('/sign-in-web')}}"  type="button" class="btn btn-sm whiteBtn df-center mb-5">Sign In</a>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
{{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> --}}
<script type="text/javascript">

    var baseUrl = $('#base_url').val();
    var token = "{{ Session::get('login_token') }}";

    $(document).ready(function(){
        $(".view_btn").click(function(){
        var id = this.id.split("_")[2];
        $("#myForm_"+id).submit();
        // alert("hi"+id);
        });

        $('#other').click(function(e) {
            e.preventDefault();
            $('#other_form').submit();
        });

        $('#other_form').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: baseUrl + '/api/md-change-patient-information',
                type: 'POST',
                data: formData,
                headers: {
                        'Authorization': 'Bearer ' + token
                },
                success: function(response) {
                    console.log('Success:', response);
                    window.location.href = $('#hidden_url').val();
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });

        $('.purchaseBtn').click(function(e){
            e.preventDefault();
            var user = "{{$user}}";
            var id = this.id;
            // alert(id);
            // $('.treatmentForModal_'+id).modal('hide');
            if(user == '1'){
                $('#treatmentForModal_'+id).modal('show');
            }else{
                $('.treatmentForModal_'+id).modal('hide');
                $('#loginFirstModal').modal('show');
            }
        });
    });
</script>
<script>
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left',
            locale: {
                format: 'DD/MM/YYYY'
            }
            // $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
        }, function(start, end, label) {});
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
