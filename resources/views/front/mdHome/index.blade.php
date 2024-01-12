@extends('front.layout.homeService')
@section('content')
<div class="content-wrapper homeServicePage">
        <div id="homeServiceBanner" class="df-center flex-column bg-f6">
            <div class="container">
                <div class="banner-content df-center flex-column">
                    <h6 class="mb-4">HEALTHY CARE FOR EVERYONE</h6>
                    <h2 class="mb-4">Close to you, Close to your feeling</h2>
                    <div>
                        <img src="{{('front/assets/img/homecare.png')}}" alt="">
                    </div>
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
                        <a href="{{url('search-result')}}">
                            <button class="btn btn-search-pill">
                                Search
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 2 -->
        <div class="bg-f6 section-2">
            <div class="container">
                <div class="text-center">
                    <h2 class="titleClass">Best Home <span style="color: #08fc34">Service</span> Packages</h2>
                </div>
                <div class="homeServicePackage rounded mb-4">
                    <div>
                        <img src="{{('front/assets/img/ProvidersLogo.png')}}" alt="">
                    </div>
                    <div class="d-flex justify-content-between flex-grow-1 align-self-stretch">
                        <div class="d-flex flex-column justify-content-between py-2">
                            <div>
                                <p class="mb-0 fs-5 camptonBold lh-base">Home Service Provider 1</p>
                                <p class="mb-0 lh-1 smallFont"><span class="camptonBold">Services:</span> Patient Care, Ambulance</p>
                            </div>
                            <div>
                            <div>
                                <p class="mb-0"><span class="text-green fs-6 fw-bold camptonBold">Reviews</span> <span class="fw-normal">(480)</span></p>
                                <div class="stars">
                                    <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                    <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                    <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                    <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                    <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column justify-content-between">
                            <img src="{{('front/assets/img/verifiedBy.svg')}}" alt="">
                            <a href="{{url('home-pack-details')}}" class="underline">View Services</a>
                        </div>
                    </div>
                </div>
                <div class="homeServicePackage rounded mb-4">
                    <div>
                        <img src="{{('front/assets/img/ProvidersLogo.png')}}" alt="">
                    </div>
                    <div class="d-flex justify-content-between flex-grow-1 align-self-stretch">
                        <div class="d-flex flex-column justify-content-between py-2">
                            <div>
                                <p class="mb-0 fs-5 camptonBold lh-base">Home Service Provider 1</p>
                                <p class="mb-0 lh-1 smallFont"><span class="camptonBold">Services:</span> Patient Care, Ambulance</p>
                            </div>
                            <div>
                            <div>
                                <p class="mb-0"><span class="text-green fs-6 fw-bold camptonBold">Reviews</span> <span class="fw-normal">(480)</span></p>
                                <div class="stars">
                                    <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                    <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                    <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                    <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                    <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column justify-content-between">
                            <img src="{{('front/assets/img/verifiedBy.svg')}}" alt="">
                            <a href="{{url('home-pack-details')}}" class="underline">View Services</a>
                        </div>
                    </div>
                </div>
                <div class="homeServicePackage rounded mb-4">
                    <div>
                        <img src="{{('front/assets/img/ProvidersLogo.png')}}" alt="">
                    </div>
                    <div class="d-flex justify-content-between flex-grow-1 align-self-stretch">
                        <div class="d-flex flex-column justify-content-between py-2">
                            <div>
                                <p class="mb-0 fs-5 camptonBold lh-base">Home Service Provider 1</p>
                                <p class="mb-0 lh-1 smallFont"><span class="camptonBold">Services:</span> Patient Care, Ambulance</p>
                            </div>
                            <div>
                            <div>
                                <p class="mb-0"><span class="text-green fs-6 fw-bold camptonBold">Reviews</span> <span class="fw-normal">(480)</span></p>
                                <div class="stars">
                                    <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                    <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                    <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                    <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                    <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column justify-content-between">
                            <img src="{{('front/assets/img/verifiedBy.svg')}}" alt="">
                            <a href="{{url('home-pack-details')}}" class="underline">View Services</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- SECTION 3: SCAN QR -->
        <div class="bg-f6 scanQr">
            <img src="{{('front/assets/img/appScreenFooter.png')}}" alt="">
        </div>
</div>
@endsection
@section('script')
@endsection