@extends('front.layout.layout2')
@section('content')
<div class="content-wrapper bg-f6">
    
    <!-- SECTION 1 -->
    <div class="searchBar backBtn bg-f6">
        <div class="container pt-4">
            <a href="home-service" class="d-flex align-items-center mb-5 gap-2">
                <img src="{{('front/assets/img/ArrowLeftCircle.png')}}" alt="">
                <p class="mb-0 fs-5 camptonBold">Back Home Services</p>
            </a>
            <div class="homeServicePackage rounded mb-4">
                <div>
                    <img src="{{('front/assets/img/ProvidersLogo.png')}}" alt="">
                </div>
                <div class="d-flex justify-content-between flex-grow-1">
                    <div class="d-flex gap-3">
                        <div class="brdr-right d-flex flex-column justify-content-between py-1">
                            <div class="mb-3">
                                <p class="mb-0 fs-5 camptonBold lh-base">Home Service Provider 1</p>
                                <div class="d-flex gap-2 align-items-center">
                                    <img src="{{('front/assets/img/Location.svg')}}" alt="">
                                    <p class="mb-0 lctn smallFont">Besiktas/Istanbul</p>
                                </div>
                            </div>
                            <div>
                            <div>
                                <p class="mb-0"><span class="text-green fw-bold camptonBold" style="font-size: 1.125rem;">Reviews</span><span class="fw-normal">(480)</span></p>
                                <div class="stars">
                                    <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                    <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                    <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                    <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                    <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                </div>
                                <p class="fs-6 mb-0 camptonBold">Excellent</p>
                            </div>
                            </div>
                        </div>
                        <div>
                                    <p class="mb-0"><span class="text-green fw-bold camptonBold" style="font-size: 1.125rem;">Service</span></p>
                                    <div class="d-flex gap-1 align-items-baseline mb-1">
                                        <img style="width: 11px;" src="{{('front/assets/img/Varlik.svg')}}" alt="">
                                        <p class="mb-0 camptonBook smallFont">Patient Care</p>
                                    </div>
                                    <div class="d-flex gap-1 align-items-baseline mb-1">
                                        <img style="width: 11px;" src="{{('front/assets/img/Varlik.svg')}}" alt="">
                                        <p class="mb-0 camptonBook smallFont boldRed">Ambulance</p>
                                    </div>
                                </div>
                    </div>
                    <div class="d-flex flex-column justify-content-between">
                        <img src="{{('front/assets/img/verifiedBy.svg')}}" alt="">
                    </div>
                </div>
            </div>
            <p class="my-5 text-center fs-4 camptonBold">Purchase <span class="text-green">Service</span></p>
            <div class="packageResult rounded mb-3">
                <div>
                    <div class="d-flex gap-5 align-items-center">
                        <p class="mb-0 fs-5 camptonBold lh-base">Home Patient Care</p>
                        <img src="{{('front/assets/img/verifiedBy.svg')}}" alt="">
                    </div>
                    <div class="d-flex gap-5 mb-4">
                        <div class="d-flex gap-2 align-items-center">
                            <img src="{{('front/assets/img/Location.svg')}}" alt="">
                            <p class="mb-0 lctn">Besiktas/Istanbul</p>
                        </div>
                    </div>
                    <div class="d-flex gap-4">
                        <div class="brdr-right">
                            <p class="mb-0"><span class="text-green fw-bold camptonBold" style="font-size: 1.125rem;">Service Detail</span></p>
                            <div class="d-flex gap-1 align-items-baseline mb-1">
                                <img style="width: 11px;" src="{{('front/assets/img/Varlik.svg')}}" alt="">
                                <p class="mb-0 camptonBook smallFont">Patient Care 24H</p>
                            </div>
                            <div class="d-flex gap-1 align-items-baseline mb-1">
                                <img style="width: 11px;" src="{{('front/assets/img/Varlik.svg')}}" alt="">
                                <p class="mb-0 camptonBook smallFont">Other</p>
                            </div>
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
                            <div class="d-flex justify-content-between flex-grow-1">
                                <div>
                                    <p class="mb-0">
                                        <span class="text-green fw-bold camptonBold" style="font-size: 1.125rem;">Service Price</span>
                                    </p>
                                    <div class="my-2">
                                        <p class="mb-0 fs-5 camptonBold lh-base">2.980,00 ₺ <span class="smallFont fs-6">*(Per 24H)</span></p>
                                    </div>
                                </div>
                                <div class="d-flex gap-2 mb-2">
                                    <button class="btn purchaseBtn" data-bs-toggle="modal" data-bs-target="#treatmentForModal">Purchase Package</button>
                                    <button class="favouriteBtn">
                                        <img src="{{('front/assets/img/white-heart.svg')}}" alt="">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 3 -->
    <div class="bg-f6 scanQr">
        <img src="{{('front/assets/img/appScreenFooter.png')}}" alt="">
    </div>
</div>
@endsection
@section('script')
@endsection
