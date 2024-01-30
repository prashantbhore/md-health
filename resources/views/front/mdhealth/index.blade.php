@php
// $treatment_plans = App\Models\ProductCategory::where('status', 'active')
// ->join('md_product_category', 'md_packages.treatment_category_id', '=', 'md_product_category.id')
// ->select('md_product_category.*')
// ->get();

$treatment_plans = App\Models\ProductCategory::where('md_packages.status', 'active')
->join('md_packages', 'md_packages.treatment_category_id', '=', 'md_product_category.id')
->where('md_product_category.status', 'active')
->select('md_product_category.*')
->distinct()
->get();
$cities = App\Models\Packages::where('md_packages.status', 'active')
->join('md_medical_provider_register', 'md_packages.created_by', '=', 'md_medical_provider_register.id')
->where('md_master_cities.status', 'active')
->join('md_master_cities', 'md_master_cities.id', '=', 'md_medical_provider_register.city_id')
->select('md_master_cities.*')
->distinct()
->get();
// dd($treatment_plans,$cities);
if (Session::get('login_token') != null) {
$is_logged_in = true;
} else {
$is_logged_in = false;
}
// dd(Session::all());
@endphp

@extends('front.layout.layout')
@section('content')

<div class="bg-f6">
    <div class="content-wrapper bg-f6">
        <!-- =============================================================================================================
                                                                1 : BANNER SECTION
             ============================================================================================================= -->
        <div class="banner-section">
            <div class="container">
                <div class="banner-content df-center flex-column pt-150px pb-100px">
                    <h6>A NEW APPROACH IN MODERN TREATMENT</h6>
                    <h2 class="mb-0">PLAN YOUR TREATMENT</h2>
                    <h1 class="mt-0">NOW</h1>
                </div>
                <div>
                    <form method="POST" action="{{ url('health-search-result') }}" class="w-100">
                        @csrf
                        <!-- SEARCH TREATMENT BAR -->
                        <div class="search-bar d-flex align-items-center p-3">
                            <!-- Treatments -->
                            <div class="form-floating pe-3 position-relative">
                                <img src="{{ 'front/assets/img/Icon-treatment.png' }}" alt="" class="mx-2 pill-calender">
                                <input type="hidden" name="platform_type" value="web">
                                <select class="form-select" style="padding-left:35px" name="treatment_name" id="floatingSelect" aria-label="Floating label select example">
                                    <option value="">Select Treatment</option>
                                    @foreach ($treatment_plans as $treatment_plan)
                                    <option>{{ $treatment_plan->product_category_name }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Treatments</label>
                            </div>
                            <!-- City -->
                            <div class="form-floating">
                                <select class="form-select border-end-0 bod-3" name="city_name" id="floatingSelect" aria-label="Floating label select example">
                                    <option data-display="Select" selected>Select City</option>
                                    @if(!empty($cities))
                                    @foreach ($cities as $city)
                                      <option>{{$city->city_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <label for="floatingSelect">City</label>
                            </div>
                            <!-- Treatment Date -->
                            <!-- <div class="border booking-box-h no-border-left form-floating pe-3">
                                    <div id="reportrange" class="date-range-picker-div d-flex justify-content-center align-items-center h-100 " name="daterange">
                                        <input type="text" name="hoteldaterange" class="form-control fsb-1 fw-500 m-0 p-0 border-0" value="" />
                                        <span></span>
                                    </div>
                                    <label for="floatingSelect">Treatment Date</label>

                                </div> -->
                            <div class="form-floating pe-3 position-relative">
                                <input type="text" class="form-select bod-n-3" style="background-image: none;padding-left:32px" name="daterange" value="" />
                                <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="" class="mx-2 pill-calender">
                                <label for="floatingSelect">Treatment Date</label>
                            </div>
                            <button type="submit" class="btn btn-search-pill">Search</button>
                        </div>
                        <!-- END -->
                    </form>
                </div>
            </div>
        </div>

        <!-- =============================================================================================================
                                                                        2 : MAKE REQUEST FORM
                     ============================================================================================================= -->
        <div class="container section-wrapper df-center flex-column gap-5 py-100px pb-0 section-2">
            <img src="{{ 'front/assets/img/Varlik.svg' }}" alt="">
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
    <div class="py-100px pb-0 md-coin df-center flex-column gap-5 bg-f6 section-3 mb-5">
        <div>
            <img src="front/assets/img/mdcoin.png" alt="">
        </div>
        <h1 style="font-size: 83px;" class="position-relative">
            <span class="text-green bb-green camptonBold">Earn</span> as you spend<span class="text-green">!</span>
        </h1>
        <p class="mb-5 camptonBook text-center fs-18" style="font-weight: 400;">Earn <span class="camptonBold">cashback</span> per transaction or <span class="camptonBold">invite your
                friends</span> and spend <span class="camptonBold">MD</span>coin
            for
            your health needs. </p>
    </div>
    <div class="bg-f6">
        <div class="df-center container md-earn">
            <div>
                <div class="mb-2">
                    <h1>2%</h1>
                    <img src="{{ 'front/assets/img/img1.png' }}" alt="">
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div>
                <div class="mb-2">
                    <h1>4%</h1>
                    <img src="{{ 'front/assets/img/img2.png' }}" alt="">
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div>
                <div class="mb-2">
                    <h1>3%</h1>
                    <img src="{{ 'front/assets/img/img3.png' }}" alt="">
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div>
                <div class="mb-2">
                    <h1>5%</h1>
                    <img src="{{ 'front/assets/img/img1.png' }}" alt="">
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>
    </div>
    <div class="bg-f6">
        <div class="container">
            <div class="bod-bot pb-5">
                <img src="{{ 'front/assets/img/add.png' }}" alt="">
            </div>
        </div>
    </div>

    <!-- SECTION 3: TOP TREATMENT CARDS -->
    <div class="bg-f6">
        <div class="container section-wrapper treatment-section gap-3 py-5 section-3 d-flex flex-column gap-3">
            <h1><span class="text-green">TOP 5</span> treatments</h1>
            <div class="top5-card me-md-4 d-flex justify-content-between align-items-center">
                <div class="card">
                    <div class="card-body d-flex gap-3 align-items-center justify-content-between position-relative">
                        <div class="bg-black p-2 rounded-circle">
                            <img src="{{ 'front/assets/img/brain.svg' }}" alt="">
                        </div>
                        <div>
                            <h6 class="mb-0">Treatment Name</h6>
                            <p class="mb-0">Treatment Category</p>
                        </div>
                        <div class="treatment-price ms-md-auto">₺ 18.829,91</div>
                        <img class="position-absolute arrow" src="{{ 'front/assets/img/round-arrow.svg' }}" alt="">
                    </div>
                </div>
                <div class="rating">
                    <p class="mb-0"><span class="text-green fs-4 fw-bold camptonBold">Reviews</span> <span class="fw-normal">(480)</span></p>
                    <div class="stars">
                        <img src="{{ 'front/assets/img/star-green.svg' }}" alt="">
                        <img src="{{ 'front/assets/img/star-green.svg' }}" alt="">
                        <img src="{{ 'front/assets/img/star-green.svg' }}" alt="">
                        <img src="{{ 'front/assets/img/star-green.svg' }}" alt="">
                        <img src="{{ 'front/assets/img/star-green.svg' }}" alt="">
                    </div>
                </div>
            </div>
            <div class="top5-card me-md-4 d-flex justify-content-between  align-items-center">
                <div class="card">
                    <div class="card-body d-flex gap-3 align-items-center justify-content-between position-relative">
                        <div class="bg-black p-2 rounded-circle">
                            <img src="{{ 'front/assets/img/heart.svg' }}" alt="">
                        </div>
                        <div>
                            <h6 class="mb-0">Treatment Name</h6>
                            <p class="mb-0">Treatment Category</p>
                        </div>
                        <div class="treatment-price ms-md-auto">₺ 18.829,91</div>
                        <img class="position-absolute arrow" src="{{ 'front/assets/img/round-arrow.svg' }}" alt="">
                    </div>
                </div>
                <div class="rating">
                    <p class="mb-0"><span class="text-green fs-4 fw-bold camptonBold">Reviews</span> <span class="fw-normal">(480)</span></p>
                    <div class="stars">
                        <img src="{{ 'front/assets/img/star-green.svg' }}" alt="">
                        <img src="{{ 'front/assets/img/star-green.svg' }}" alt="">
                        <img src="{{ 'front/assets/img/star-green.svg' }}" alt="">
                        <img src="{{ 'front/assets/img/star-green.svg' }}" alt="">
                        <img src="{{ 'front/assets/img/star-green.svg' }}" alt="">
                    </div>
                </div>
            </div>
            <div class="top5-card me-md-4 d-flex justify-content-between  align-items-center">
                <div class="card">
                    <div class="card-body d-flex gap-3 align-items-center justify-content-between position-relative">
                        <div class="bg-black p-2 rounded-circle">
                            <img src="{{ 'front/assets/img/eye.svg' }}" alt="">
                        </div>
                        <div>
                            <h6 class="mb-0">Treatment Name</h6>
                            <p class="mb-0">Treatment Category</p>
                        </div>
                        <div class="treatment-price ms-md-auto">₺ 18.829,91</div>
                        <img class="position-absolute arrow" src="{{ 'front/assets/img/round-arrow.svg' }}" alt="">
                    </div>
                </div>
                <div class="rating">
                    <p class="mb-0"><span class="text-green fs-4 fw-bold camptonBold">Reviews</span> <span class="fw-normal">(520)</span></p>
                    <div class="stars">
                        <img src="{{ 'front/assets/img/star-green.svg' }}" alt="">
                        <img src="{{ 'front/assets/img/star-green.svg' }}" alt="">
                        <img src="{{ 'front/assets/img/star-green.svg' }}" alt="">
                        <img src="{{ 'front/assets/img/star-green.svg' }}" alt="">
                        <img src="{{ 'front/assets/img/star-black.svg' }}" alt="">
                    </div>
                </div>
            </div>
            <div class="top5-card me-md-4 d-flex justify-content-between  align-items-center">
                <div class="card">
                    <div class="card-body d-flex gap-3 align-items-center justify-content-between position-relative">
                        <div class="bg-black p-2 rounded-circle">
                            <img src="{{ 'front/assets/img/eye.svg' }}" alt="">
                        </div>
                        <div>
                            <h6 class="mb-0">Treatment Name</h6>
                            <p class="mb-0">Treatment Category</p>
                        </div>
                        <div class="treatment-price ms-md-auto">₺ 18.829,91</div>
                        <img class="position-absolute arrow" src="{{ 'front/assets/img/round-arrow.svg' }}" alt="">
                    </div>
                </div>
                <div class="rating">
                    <p class="mb-0"><span class="text-green fs-4 fw-bold camptonBold">Reviews</span> <span class="fw-normal">(400)</span></p>
                    <div class="stars">
                        <img src="{{ 'front/assets/img/star-green.svg' }}" alt="">
                        <img src="{{ 'front/assets/img/star-green.svg' }}" alt="">
                        <img src="{{ 'front/assets/img/star-green.svg' }}" alt="">
                        <img src="{{ 'front/assets/img/star-green.svg' }}" alt="">
                        <img src="{{ 'front/assets/img/star-black.svg' }}" alt="">
                    </div>
                </div>
            </div>
            <div class="top5-card me-md-4 d-flex justify-content-between  align-items-center">
                <div class="card">
                    <div class="card-body d-flex gap-3 align-items-center justify-content-between position-relative">
                        <div class="bg-black p-2 rounded-circle">
                            <img src="{{ 'front/assets/img/mouth.svg' }}" alt="">
                        </div>
                        <div>
                            <h6 class="mb-0">Treatment Name</h6>
                            <p class="mb-0">Treatment Category</p>
                        </div>
                        <div class="treatment-price ms-md-auto">₺ 18.829,91</div>
                        <img class="position-absolute arrow" src="{{ 'front/assets/img/round-arrow.svg' }}" alt="">
                    </div>
                </div>
                <div class="rating">
                    <p class="mb-0"><span class="text-green fs-4 fw-bold camptonBold">Reviews</span> <span class="fw-normal">(480)</span></p>
                    <div class="stars">
                        <img src="{{ 'front/assets/img/star-green.svg' }}" alt="">
                        <img src="{{ 'front/assets/img/star-green.svg' }}" alt="">
                        <img src="{{ 'front/assets/img/star-green.svg' }}" alt="">
                        <img src="{{ 'front/assets/img/star-black.svg' }}" alt="">
                        <img src="{{ 'front/assets/img/star-black.svg' }}" alt="">
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>




<!-- SECTION 4 -->
<div class="bg-green df-center" style="height: 155px;">
    <div class="py-5 text-center">
        <p class="mb-0 card-h8">We made the treatment reliable and easier for you</p>
        <p class="mb-0 card-p8">Get your treatment packages in Turkiye withing few
            clicks
            from professional healthcare providers.</p>
    </div>
</div>

<!-- SECTION 5 -->
<div class="bg-e6">
    <div class="container download-section d-flex justify-content-around">
        <div>
            <img src="{{ 'front/assets/img/appScreen.png' }}" alt="">
        </div>
        <div class="part2 section-2">
            <div class="mb-4">
                <h2 class="mb-0 pb-0">Download</h2>
                <h2 class="my-0"><span class="camptonBold text-green">MD</span><span class="text-green camptonBook">health</span> <span class="camptonBold">Mobile</span></h2>
                <p class="clr-grey camptonBook fs-5 fw-bolder">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="d-flex align-items-center gap-4">
                <img class="align-self-center" src="{{asset('front/assets/img/playStore.png')}}" alt="">
                <p class="camptonBold fs-5">or</p>
                <div>
                    <img src="{{asset('front/assets/img/qrCode.png')}}" alt="">
                    <p class="scanQR">scan the QR Code</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SECTION 6 -->
<div class="bg-black position-relative section6">
    <div class="container medical-pckg">
        <p class="mb-0">Find your <span class="text-green">medical</span> package <span class="fw-normal camptonBook">&</span></p>
        <p class="fnpp">flight to Turkiye!</p>
        <a class="bookButton df-center">Book Now</a>
    </div>
    <img src="{{ 'front/assets/img/flight.png' }}" alt="">
</div>
<!-- <img class="position-absolute" src="{{ 'front/assets/img/flight.png' }}" alt=""> -->
</div>
{{-- Make Payment Model box --}}


<!-- SECTION 7: Testimonials -->
<div class="bg-f6">
    <div class="container testimonial section-2">
        <div class="text-center mb-5">
            <h2 class="camptonBook mb-0 pb-0">What our users</h2>
            <h2 class="my-0 py-0 text-green">have to say</h2>
        </div>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <p class="test-p1">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                    </p>
                    <div class="d-flex gap-2 align-items-center">
                        <div class="bg-grey d-flex justify-content-center align-items-center rounded-circle p-1">
                            <img src="{{ 'front/assets/img/user-light.svg' }}" alt="">
                        </div>
                        <p class="mb-0 camptonBook fw-bolder">John Smith</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <p class="test-p1">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                    </p>
                    <div class="d-flex gap-2 align-items-center">
                        <div class="bg-grey d-flex justify-content-center align-items-center rounded-circle p-1">
                            <img src="{{ 'front/assets/img/user-light.svg' }}" alt="">
                        </div>
                        <p class="mb-0 camptonBook fw-bolder">John Smith</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <p class="test-p1">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                    </p>
                    <div class="d-flex gap-2 align-items-center">
                        <div class="bg-grey d-flex justify-content-center align-items-center rounded-circle p-1">
                            <img src="{{ 'front/assets/img/user-light.svg' }}" alt="">
                        </div>
                        <p class="mb-0 camptonBook fw-bolder">John Smith</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <p class="test-p1">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                    </p>
                    <div class="d-flex gap-2 align-items-center">
                        <div class="bg-grey d-flex justify-content-center align-items-center rounded-circle p-1">
                            <img src="{{ 'front/assets/img/user-light.svg' }}" alt="">
                        </div>
                        <p class="mb-0 camptonBook fw-bolder">John Smith</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <p class="test-p1">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                    </p>
                    <div class="d-flex gap-2 align-items-center">
                        <div class="bg-grey d-flex justify-content-center align-items-center rounded-circle p-1">
                            <img src="{{ 'front/assets/img/user-light.svg' }}" alt="">
                        </div>
                        <p class="mb-0 camptonBook fw-bolder">John Smith</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <p class="test-p1">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                    </p>
                    <div class="d-flex gap-2 align-items-center">
                        <div class="bg-grey d-flex justify-content-center align-items-center rounded-circle p-1">
                            <img src="{{ 'front/assets/img/user-light.svg' }}" alt="">
                        </div>
                        <p class="mb-0 camptonBook fw-bolder">John Smith</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <p class="test-p1">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                    </p>
                    <div class="d-flex gap-2 align-items-center">
                        <div class="bg-grey d-flex justify-content-center align-items-center rounded-circle p-1">
                            <img src="{{ 'front/assets/img/user-light.svg' }}" alt="">
                        </div>
                        <p class="mb-0 camptonBook fw-bolder">John Smith</p>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>

<!-- SECTION 8: SCAN QR -->
<div class="bg-f6 scanQr">
    <img src="{{ 'front/assets/img/appScreenFooter.png' }}" alt="">
</div>
<!-- Modals -->
<!-- MAKE REQUEST MODAL -->
<div class="modal fade request-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" style="width:704px">
        <div class="modal-content p-3">
            <div>
                <div class="text-end">
                    <button type="button" class="btn-close m-3" data-bs-dismiss="modal" aria-label="Close">
                        <!-- <img src="{{ 'front/assets/img/modalClose.png' }}" alt=""> -->
                    </button>
                </div>

                <div class="text-center" style="margin-top: -8px;">
                    <h4 class="modal-title mb-2" id="exampleModalLabel">Couldn't find your <span class="green-color">treatment</span> package?</h4>
                    <p class="mb-4">Fill the form & get your desired treatment plan</p>
                </div>
            </div>
            <div class="modal-body">
                <form id="request_your_treatment" class="row g-3">
                    <div class="col-md-4 mb-3">
                        <label for="inputEmail4" class="form-label fw-bold">*First Name</label>
                        <input type="email" class="form-control  " id="first_name" placeholder="First Name">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="inputPassword4" class="form-label fw-bold">*Last Name</label>
                        <input type="text" class="form-control " id="inputPassword4" placeholder="Last Name">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="inputAddress" class="form-label fw-bold">*Email</label>
                        <input type="email" class="form-control  " id="inputAddress" placeholder="Optional">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="inputState" class="form-label fw-bold">*Country</label>
                        <select id="inputState" class="form-select ">
                            <option selected disabled>Choose</option>
                            <option>Turkey</option>
                            <option>India</option>
                            <option>China</option>
                            <option>USA</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="inputAddress33" class="form-label fw-bold">*Contact Mobile</label>
                        <input type="tel" class="form-control " id="inputAddress33" placeholder="+ Contact Mobile">
                        {{-- <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                    id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Whatsapp</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                    id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Telegram</label>
                            </div> --}}
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="inputAddress443" class="form-label fw-bold">*Treatment Name</label>
                        <input type="text" class="form-control " id="inputAddress443" placeholder="Treatment Name">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="inputAddress5" class="form-label fw-bold">*Details</label>
                        <!-- <input type="text" class="form-control "  id="inputAddress5" placeholder="Please Write your treatment requirement in detail"> -->
                        <textarea name="" id="" cols="" style="height: 66px;" class="form-control" id="inputAddress5" placeholder="Please write your treatment requirement in detail"></textarea>
                    </div>
                    <div class="col-md-6 mb-3 position-relative">
                        <label for="inputAddress5" class="form-label fw-bold">*Previous Treatment</label>
                        <!-- <input type="text" class="form-control " id="inputAddress5" placeholder="Have you done/received any related treatment before If Yes,Please write the details"> -->
                        <div class="form-control position-relative" style="height:101px">
                            <textarea name="" id="" class="form-control border-0 p-0" id="pre-treat" style="resize:none;" placeholder="Have you done / received any releted treatment before"></textarea>
                            <span class="epic-span">If Yes, please write the detail</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="formFile" class="form-label fw-bold">Upload Your Treatment Documents</label>
                        <input type="file" id="formFile">
                        <img src="{{ 'front/assets/img/uploadFile.png' }}" alt="" class="pe-2">
                        <span class="Campton fst-italic fs-14 align-top">*Optional</span>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="inputAddress5" class="form-label fw-bold">*When do you need the
                            treatment?</label>
                        <input type="text" class="form-control " id="inputAddress5" placeholder="Write in week or month">
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="inputAddress5" class="form-label fw-bold">*Do you need travel visa?</label>
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
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn save-btn-green">Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
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
</script>
@endsection


{{-- singleDatePicker: true, --}}
{{-- showDropdowns: true, --}}