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
    .product-content-header {
        border-bottom: 1px solid #CDCDCD;
        padding-bottom: 5px;
        margin-bottom: 15px;
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
    .product-price {
        color: #000;
        font-family: Campton;
        font-size: 30px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }
    .product-buttons {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 10px;
    }
    .product-buttons a:first-child {
        border-radius: 5px;
        background: #4CDB06;
        padding: 10px 20px;
        width: 85%;
        text-align: center;
        color: #000;
        font-family: 'Campton';
        font-size: 15px;
        font-style: normal;
        font-weight: 600;
        text-decoration: none;
    }
    .product-buttons a:nth-child(2) {
        background-color: #F55C5C;
    padding: 10px;
    border-radius: 5px;
    width: 12%;
    text-align: center;
    }
    .product-buttons a:last-child {
        border-radius: 3px;
        background: #DEDEDE;
        width: 100%;
        padding: 6px 6px 6px 10px;
        color: #000;
        font-family: 'Campton';
        font-size: 11px;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 5px;
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
                                </div>
                                <h3 class="product-price"> 299,99 ₺ </h3>
                            </div>
                            <div class="product-buttons">
                                <a href="javascript:void(0);">Add To Cart</a>
                                <a href="javascript:void(0);">
                                    <img src="{{('front/assets/img/white-heart.svg')}}" alt="">
                                </a>
                                <a href="javascript:void(0);">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                        <path d="M0.5625 5.625H7.875L8.4375 6.75H1.125L0.5625 5.625ZM1.3125 7.875H8.625L9.1875 9H1.875L1.3125 7.875ZM13.5 13.875C14.1225 13.875 14.625 13.3725 14.625 12.75C14.625 12.1275 14.1225 11.625 13.5 11.625C12.8775 11.625 12.375 12.1275 12.375 12.75C12.375 13.3725 12.8775 13.875 13.5 13.875ZM14.625 7.125H12.75V9H16.095L14.625 7.125ZM6 13.875C6.6225 13.875 7.125 13.3725 7.125 12.75C7.125 12.1275 6.6225 11.625 6 11.625C5.3775 11.625 4.875 12.1275 4.875 12.75C4.875 13.3725 5.3775 13.875 6 13.875ZM15 6L17.25 9V12.75H15.75C15.75 13.995 14.745 15 13.5 15C12.255 15 11.25 13.995 11.25 12.75H8.25C8.25 13.995 7.2375 15 6 15C4.755 15 3.75 13.995 3.75 12.75H2.25V10.125H3.75V11.25H4.32C4.7325 10.7925 5.3325 10.5 6 10.5C6.6675 10.5 7.2675 10.7925 7.68 11.25H11.25V4.5H2.25C2.25 3.6675 2.9175 3 3.75 3H12.75V6H15Z" fill="#111111"/>
                                    </svg>
                                    Fast Delivery
                                </a>
                            </div>
                            <div class="product-content-div">
                                <h4 class="text-green fsb-1">Product Spesifications</h4>
                                <ul>
                                    <li>Lorem ipsum dolor sit amet</li>
                                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</li>
                                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do ur adipiscing elit, sed do</li>
                                </ul>
                                <h6 class="fsb-1">Lorem Ipsum</h6>
                                <p>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="right-side-div">
                            <div class="product-request">
                                <div class="product-div1">
                                    <p class="fsw-1 mb-0">
                                        <span>4.7</span>
                                        evony medikal
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
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