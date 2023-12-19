@extends('front.layout.layout2')
@section('content')
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
                <h2 class="homeServiceTitle">Your <span style="color: #08fc34">search</span> results</h2>
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
                                <button class="btn purchaseBtn">Purchase Package</button>
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
                                <button class="btn purchaseBtn">Purchase Package</button>
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
        </div>
    </div>

    <!-- SECTION 4 -->
    <div class="bg-f6 scanQr">
        <img src="{{('front/assets/img/appScreenFooter.png')}}" alt="">
    </div>
</div>
@endsection
@section('script')
@endsection