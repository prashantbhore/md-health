@extends('front.layout.mdShop')
@section('content')
    <div class="content-wrapper mdShop">
        <!-- SECTION 1: HERO SECTION -->
        <div>
            <p class="hero-text">MEDICAL SHOP FOR YOUR HEALTH</p>
            <div class="d-flex justify-content-evenly hero-container container">
                <div class="d-flex flex-column gap-4">
                    <img src="{{URL('front/assets/img/evony.png')}}" alt="" style="width: 140px;">
                    <p class="campton fs-4 mb-0">Evony Medical Mask 50 pc.</p>
                    <div>
                        <p class="mb-0 fs-5 camptonBold lh-base"><span class="red-strike">379,00 ₺</span> <span class="camptonBook vSmallFont">(%10 Discount)</span></p>
                        <p class="mb-0 fs-4 camptonBold lh-base">299,99 ₺</p>
                    </div>
                    <a href="{{url('user-account')}}" type="button" style="border-radius: 4px;" class="btn btn-sm btn-md df-center">Buy Now</a>
                </div>
                <div>
                    <img src="{{URL('front/assets/img/Mask.png')}}" alt="">
                </div>
            </div>
        </div>

        <!-- SECTION 2: MOST SALES -->
        <p class="titleClass text-center">MOST <span class="text-green">SALES</span></p>
        <div class="product-card-container container">
            <div class="row product-row">
                <div class="col-3">
                    <a href="#" class="mt-4 card-link">
                        <div class="card" >
                            <img src="{{('front/assets/img/productPic.svg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="mb-1">Product Name</h5>
                                <p class="mb-5 camptonBook">Product Description</p>
                                <!-- <a href="#" class="mt-4"> -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="camptonBold fs-4 text-green mb-0">1.290,00 ₺</p>
                                        <img src="{{('front/assets/img/ArrowRight.svg')}}" alt="">
                                    </div>
                                <!-- </a> -->
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="#" class="mt-4 card-link">
                        <div class="card" >
                            <img src="{{('front/assets/img/productPic.svg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="mb-1">Product Name</h5>
                                <p class="mb-5 camptonBook">Product Description</p>
                                <!-- <a href="#" class="mt-4"> -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="camptonBold fs-4 text-green mb-0">1.290,00 ₺</p>
                                        <img src="{{('front/assets/img/ArrowRight.svg')}}" alt="">
                                    </div>
                                <!-- </a> -->
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="#" class="mt-4 card-link">
                        <div class="card" >
                            <img src="{{('front/assets/img/productPic.svg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="mb-1">Product Name</h5>
                                <p class="mb-5 camptonBook">Product Description</p>
                                <!-- <a href="#" class="mt-4"> -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="camptonBold fs-4 text-green mb-0">1.290,00 ₺</p>
                                        <img src="{{('front/assets/img/ArrowRight.svg')}}" alt="">
                                    </div>
                                <!-- </a> -->
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="#" class="mt-4 card-link">
                        <div class="card" >
                            <img src="{{('front/assets/img/productPic.svg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="mb-1">Product Name</h5>
                                <p class="mb-5 camptonBook">Product Description</p>
                                <!-- <a href="#" class="mt-4"> -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="camptonBold fs-4 text-green mb-0">1.290,00 ₺</p>
                                        <img src="{{('front/assets/img/ArrowRight.svg')}}" alt="">
                                    </div>
                                <!-- </a> -->
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="#" class="mt-4 card-link">
                        <div class="card" >
                            <img src="{{('front/assets/img/productPic.svg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="mb-1">Product Name</h5>
                                <p class="mb-5 camptonBook">Product Description</p>
                                <!-- <a href="#" class="mt-4"> -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="camptonBold fs-4 text-green mb-0">1.290,00 ₺</p>
                                        <img src="{{('front/assets/img/ArrowRight.svg')}}" alt="">
                                    </div>
                                <!-- </a> -->
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="#" class="mt-4 card-link">
                        <div class="card" >
                            <img src="{{('front/assets/img/productPic.svg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="mb-1">Product Name</h5>
                                <p class="mb-5 camptonBook">Product Description</p>
                                <!-- <a href="#" class="mt-4"> -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="camptonBold fs-4 text-green mb-0">1.290,00 ₺</p>
                                        <img src="{{('front/assets/img/ArrowRight.svg')}}" alt="">
                                    </div>
                                <!-- </a> -->
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="#" class="mt-4 card-link">
                        <div class="card" >
                            <img src="{{('front/assets/img/productPic.svg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="mb-1">Product Name</h5>
                                <p class="mb-5 camptonBook">Product Description</p>
                                <!-- <a href="#" class="mt-4"> -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="camptonBold fs-4 text-green mb-0">1.290,00 ₺</p>
                                        <img src="{{('front/assets/img/ArrowRight.svg')}}" alt="">
                                    </div>
                                <!-- </a> -->
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="#" class="mt-4 card-link">
                        <div class="card" >
                            <img src="{{('front/assets/img/productPic.svg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="mb-1">Product Name</h5>
                                <p class="mb-5 camptonBook">Product Description</p>
                                <!-- <a href="#" class="mt-4"> -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="camptonBold fs-4 text-green mb-0">1.290,00 ₺</p>
                                        <img src="{{('front/assets/img/ArrowRight.svg')}}" alt="">
                                    </div>
                                <!-- </a> -->
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- SECTION 3: SCAN QR -->
        <div class="bg-f6 scanQr">
            <img src="{{('front/assets/img/appScreenFooter.png')}}" alt="">
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection