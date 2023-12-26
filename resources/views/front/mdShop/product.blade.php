@extends('front.layout.mdShop')
@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<style>
    .product-img-view .myProductsSwiper .swiper-slide img {
        width: 100%;
        height: 408px;
        border-radius: 3px;
        background: #D9D9D9;
    }
    .product-img-view .myProductDotsSwiper .swiper-slide img {
        width: 100%;
        height: 75px;
        border-radius: 3px;
        background: #D9D9D9;
    }
    .myProductDotsSwiper .swiper-slide-thumb-active {
        border: 1px solid #4CDB06;
    }
    .myProductDotsSwiper .swiper-slide-visible{
        border: 1px solid transparent;
        transition: 0.3s;
    }
    .myProductDotsSwiper .swiper-slide-thumb-active {
        border: 1px solid #4CDB06;
        transform: scale(1.1);
    }
    .myProductDotsSwiper {
        padding: 5px;
    }
    .product-content-header h6{
        color: #000;
        font-family: 'Campton';
        font-size: 23px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: -0.92px;
        /* line-height: 25px; */
        margin-bottom: 0px;
    }
    .product-content-header .product-name span {
        color: #4CDB06;
        font-family: 'Campton';
        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        letter-spacing: -0.56px;
        text-decoration-line: underline;
    }
    .product-rating {
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .product-rating p:first-child {
        font-size: 13px;
        font-weight: 600;
    }
    .product-rating p:last-child {
        font-size: 10px;
        font-weight: 500;
    }
    .product-rating i {
        color: #4CDB06;
        font-size: 10px;
    }
</style>

    <div class="content-wrapper mdShop">

        <!-- SECTION 1: PRODUCT VIEW -->
        <div class="product-view">
            <div class="container">
                <div class="page-bradcrumb mb-5">
                    <a href="#">Home Page</a> >
                    <a href="#">Category</a> >
                    <a href="#">Product Name</a>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="product-img-view">
                            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="mb-5 swiper myProductsSwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="" />
                                    </div>
                                   
                                </div>
                            </div>
                            <div thumbsSlider="" class="swiper myProductDotsSwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="" />
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="product-content">
                            <div class="product-content-header">
                                <div class="product-name mb-2">
                                    <h6>Evony Medical Mask 50 pc.</h6>
                                    <span class="text-green">Nivea</span>
                                </div>
                                <div class="product-rating d-flex fsb-1">
                                    <p class="mb-0">5.0</p>
                                    <div class="d-flex gap-1">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p class="mb-0">(120 Reviews)</p>
                                    <span>
                                    299,99 ₺
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </div>

        

        <!-- SECTION 2: SCAN QR -->
        <div class="bg-f6 scanQr">
            <img src="{{('front/assets/img/appScreenFooter.png')}}" alt="">
        </div>
    </div>
</div>
@endsection
@section('script')

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".myProductDotsSwiper", {
      loop: false,
      spaceBetween: 18,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".myProductsSwiper", {
      loop: false,
      spaceBetween: 10,
      thumbs: {
        swiper: swiper,
      },
    });
  </script>

@endsection