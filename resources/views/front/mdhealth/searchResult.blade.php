@extends('front.layout.layout2')
@section('content')
<div class="content-wrapper bg-f6">


@php


    if(!function_exists('get_twenty_percent')){
        function get_twenty_percent($number){
            return $number * (20/100);
        }
    }

@endphp

 <form method="POST" action="{{ url('health-search-result') }}">
 @csrf
{{-- {{dd($packages)}} --}}
    <!-- SECTION 1 -->
    <div class="searchBar bg-f6">
        <div class="container pt-5">
            <div class="search-bar d-flex align-items-center p-3 gap-3 mb-5">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" name="treatment_name" aria-label="Floating label select example">
                        <option data-display="Select" value="{{$treatment_name}}" selected>{{$treatment_name}}</option>
                            @foreach($treatment_plans as $treatment_plan){
                                    <option>{{$treatment_plan->product_category_name}}</option>
                                }@endforeach
                            </select>
                    </select>
                    <label for="floatingSelect">Service Type</label>
                </div>
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" name="city_name" aria-label="Floating label select example">
                        <option data-display="Select" value="{{$city_name}}" selected>{{$city_name}}</option>
                        @foreach($cities as $city){
                                    <option>{{$city->city_name}}</option>
                                }@endforeach
                    </select>
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
                                <input type="text" class="form-select" name="daterange" value="" />
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
                                                <button class="btn purchaseBtn" data-bs-toggle="modal" data-bs-target="#treatmentForModal_{{$package_list['id']}}">Purchase Package</button>
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
                        <div class="modal fade" id="treatmentForModal_{{$package_list['id']}}" tabindex="-1" aria-labelledby="treatmentForModal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered position-relative">
                                <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close"> -->
                                    <!-- </button> -->
                                <div class="modal-content">
                                    <img class="closeModal" data-bs-dismiss="modal" src="{{('front/assets/img/closeModal.png')}}" alt="">
                                    <img src="{{('front/assets/img/step1.svg')}}" alt="">
                                    <p class="camptonBook fw-bold text-center mt-4">Who is this treatment for?</p>
                                    <div class="d-flex align-items-center flex-column">
                                        <a href="{{url('purchase-package/'.$package_list['id'])}}" type="button" class="btn btn-sm btn-md df-center mt-4">Myself</a>
                                        <a href="{{url('#')}}" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#treatmentForModal2_{{$package_list['id']}}" type="button" class="btn btn-sm whiteBtn df-center mt-3 mb-5">Other</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="treatmentForModal2_{{$package_list['id']}}" tabindex="-1" aria-labelledby="treatmentForModal" aria-hidden="true">
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
                                                            <option value="{{$country->id}}">{{$city->city_name}}</option>
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
                            <form action="" class="filter">
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
                            <form action="" class="filter">
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
                            <form action="" class="filter">
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
@endsection
@section('script')

<script type="text/javascript">
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
                url: '/api/md-change-patient-information',
                type: 'POST',
                data: formData,
                success: function(response) {
                    console.log('Success:', response);
                    window.location.href = $('#hidden_url').val();
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>

@endsection
