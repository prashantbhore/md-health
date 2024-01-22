@extends('front.layout.layout2')
@section('content')
<style>
    #serviceForModal2 .form-control {
        border: 2px solid #d6d6d6;
    border-radius: 5px;
    padding: 10px 16px;
    height: 48px;
    font-size: 16px;
    }
</style>
<div class="content-wrapper bg-f6">

    <!-- SECTION 1 -->
    <div class="searchBar bg-f6">
        <div class="container pt-5">
            <div class="search-bar d-flex align-items-center p-3 gap-3 mb-5">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option data-display="Select" selected>Cardiac Arrest</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label for="floatingSelect">Service Type</label>
                </div>
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option data-display="Select" selected>Istanbul</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label for="floatingSelect">City</label>
                </div>
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option data-display="Select" selected>12 Aug</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label for="floatingSelect">Date</label>
                </div>
                <button class="btn btn-search-pill">Search</button>
            </div>
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
                        <img style="width: 100%;" src="{{('front/assets/img/homeServiceAd.png')}}" alt="">
                        <img class="position-absolute" style="right: 40px; bottom: 0;" src="{{('front/assets/img/careTaker.png')}}" alt="">
                    </div>
                    <div class="packageResult rounded mb-3">
                        <div>
                            <div class="d-flex gap-2 align-items-center">
                                <p class="mb-0 fs-5 camptonBold lh-base">Home Service Provider 1</p>
                                <img src="{{('front/assets/img/verifiedBy.svg')}}" alt="">
                            </div>
                            <div class="d-flex gap-5 mb-4">
                                <div class="d-flex gap-2 align-items-center">
                                    <img src="{{('front/assets/img/Location.svg')}}" alt="">
                                    <p class="mb-0 lctn">Besiktas/Istanbul</p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="{{('front/assets/img/Diaganose.svg')}}" alt="">
                                    <p class="mb-0 lctn">24H</p>
                                </div>
                            </div>
                            <div class="d-flex gap-4">
                                <div class="brdr-right">
                                    <p class="mb-0"><span class="text-green fs-5 fw-bold camptonBold">Reviews</span> <span class="fw-normal">(480)</span></p>
                                    <div class="stars">
                                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                    </div>
                                    <p class="fs-6 camptonBold">Excellent</p>
                                </div>
                                <div>
                                    <p class="mb-0"><span class="text-green fs-5 fw-bold camptonBold">Service Price</span></p>
                                    <p class="mb-0 fs-6 camptonBold lh-base red-strike">34.980,00 ₺</p>
                                    <p class="mb-0 fs-5 camptonBold lh-base">19.950,00 ₺ <span class="fs-6">(Per 24H)</span></p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex gap-2 mb-2">
                                <button data-bs-toggle="modal" data-bs-target="#serviceForModal" class="btn purchaseBtn">Purchase Package</button>
                                <button class="favouriteBtn">
                                    <img src="{{('front/assets/img/white-heart.svg')}}" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="packageResult rounded mb-3">
                        <div>
                            <div class="d-flex gap-2 align-items-center">
                                <p class="mb-0 fs-5 camptonBold lh-base">Ambulance Service</p>
                                <img src="{{('front/assets/img/verifiedBy.svg')}}" alt="">
                            </div>
                            <div class="d-flex gap-5 mb-4">
                                <div class="d-flex gap-2 align-items-center">
                                    <img src="{{('front/assets/img/Location.svg')}}" alt="">
                                    <p class="mb-0 lctn">Besiktas/Istanbul</p>
                                </div>
                                <!-- <div class="d-flex align-items-center">
                                    <img src="{{('front/assets/img/Diaganose.svg')}}" alt="">
                                    <p class="mb-0 lctn">24H</p>
                                </div> -->
                            </div>
                            <div class="d-flex gap-4">
                                <div class="brdr-right">
                                    <p class="mb-0"><span class="text-green fs-5 fw-bold camptonBold">Reviews</span> <span class="fw-normal">(480)</span></p>
                                    <div class="stars">
                                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                    </div>
                                    <p class="fs-6 camptonBold">Excellent</p>
                                </div>
                                <div>
                                    <p class="mb-0"><span class="text-green fs-5 fw-bold camptonBold">Service Price</span></p>
                                    <p class="mb-0 fs-6 camptonBold lh-base red-strike">34.980,00 ₺</p>
                                    <p class="mb-0 fs-5 camptonBold lh-base">19.950,00 ₺ <span class="fs-6">(Per 24H)</span></p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex gap-2 mb-2">
                                <button data-bs-toggle="modal" data-bs-target="#serviceForModal" class="btn purchaseBtn">Purchase Package</button>
                                <button class="favouriteBtn">
                                    <img src="{{('front/assets/img/white-heart.svg')}}" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="packageFilter rounded mb-3">
                        <p class="fs-5 camptonBold lh-base">Provider Rating</p>
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
        </div>
    </div>

    <!-- SECTION 4 -->
    <div class="bg-f6 scanQr">
        <img src="{{('front/assets/img/appScreenFooter.png')}}" alt="">
    </div>

    <!-- Modal -->
    <div class="modal fade" id="serviceForModal" tabindex="-1" aria-labelledby="serviceForModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered position-relative">
            <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close"> -->
                <!-- </button> -->
            <div class="modal-content">
                <img class="closeModal" data-bs-dismiss="modal" src="{{('front/assets/img/closeModal.png')}}" alt="">
                <img src="{{('front/assets/img/step1.svg')}}" alt="">
                <p class="camptonBook fw-bold text-center mt-4">Who is this treatment for?</p>
                <div class="d-flex align-items-center flex-column">
                    <a href="{{url('homeService-purchase')}}" type="button" class="btn btn-sm btn-md df-center mt-4">Myself</a>
                    <a href="{{url('#')}}" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#serviceForModal2" type="button" class="btn btn-sm whiteBtn df-center mt-3 mb-5">Other</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="serviceForModal2" tabindex="-1" aria-labelledby="serviceForModal2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered position-relative">
            <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close"> -->
                <!-- </button> -->
            <div class="modal-content">
                <img class="closeModal" data-bs-dismiss="modal" src="{{('front/assets/img/modalClose.png')}}" alt="">
                <p class="card-h1 mt-4 text-center">Change Patient Information</p>
                <p class="card-p1 text-center">Fill the patient detail.</p>
                <div class="modal-body">
                    <form class="row g-4">
                            <div class="col-md-4">
                                <label for="inputEmail4" class="form-label fw-bold">*Patient Full Name</label>
                                <input type="email" class="form-control  h-75" id="inputEmail4" placeholder="Full Name">
                            </div>
                            <div class="col-md-4">
                                <label for="inputPassword4" class="form-label fw-bold">*Relationship To You</label>
                                <input type="text" class="form-control h-75" id="inputPassword4" placeholder="Relationship To You">
                            </div>
                            <div class="col-md-4">
                                <label for="inputAddress" class="form-label fw-bold">*Patient E-mail</label>
                                <input type="email" class="form-control  h-75" id="inputAddress"  placeholder="Email">
                            </div>
                            <div class="col-md-4">
                                <label for="inputAddress" class="form-label fw-bold">*Patient Contact Number</label>
                                <input type="email" class="form-control  h-75" id="inputAddress"  placeholder="Contact Number">
                            </div>
    
                            <div class="col-md-4">
                                <label for="inputState" class="form-label fw-bold">*Patient Country</label>
                                <select id="inputState" class="form-select h-75">
                                    <option selected>Country</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="inputState" class="form-label fw-bold">*Patient City</label>
                                <select id="inputState" class="form-select h-75">
                                    <option selected>City</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="inputEmail4" class="form-label fw-bold">*Full Address</label>
                                <input type="email" class="form-control  h-75" id="inputEmail4" placeholder="Full Address">
                            </div>
                            <p class="mt-5 mb-0 camptonBook">*You can also change the patient information from <span class="camptonBold">panel</span> <span class="camptonBold text-green">></span> <span class="camptonBold">packages</span></p>
                            <div class="col-12 df-center">
                                <a href="{{url('homeService-purchase')}}" type="submit" class="btn purchaseBtn my-4 df-center">
                                    <span class="fw-bold">Step 2:</span> <span class="camptonBook">Payment Page</span> 
                                </a>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection