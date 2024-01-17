@extends('front.layout.mdShop')
@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<style>
    body {
        font-family: 'Campton';
    }

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

    .myProductDotsSwiper .swiper-slide-visible {
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

    .product-content-header h6 {
        color: #000;
        font-size: 23px;

        font-weight: 500;
        letter-spacing: -0.92px;
        /* line-height: 25px; */
        margin-bottom: 0px;
    }

    .product-content-header .product-name span {
        color: #4CDB06;
        font-size: 14px;

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
        font-size: 30px;

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
        font-size: 15px;

        font-weight: 600;
        text-decoration: none;
    }

    .product-buttons a {
        cursor: pointer;
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
        font-size: 11px;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .product-request span {
        border-radius: 3px;
        background: #4CDB06;
        font-size: 10px;
        font-weight: 900;
        padding: 2px 8px;
    }

    .product-request .product-div1-heading {
        border-radius: 3px;
        padding: 5px 10px;
        background: rgba(217, 217, 217, 0.30);
    }

    .product-follow-div {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .product-follow-logo {
        padding: 8px 12px;
        border-radius: 3px;
        background: rgba(217, 217, 217, 0.30);
    }

    .product-follow p:first-child {
        font-size: 14px;
    }

    .product-follow p:last-child {
        font-size: 10px;
    }

    .product-div1 {
        border-radius: 5px;
        background: #FFF;
        box-shadow: 0px 0px 24px 0px rgba(0, 0, 0, 0.25);
        padding: 15px 15px 45px 15px;
        position: relative;
        margin-bottom: 40px;
    }

    .product-div2 {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 20px;
        color: #fff;
        border-radius: 5px;
        background: #000;
        box-shadow: 0px 0px 24px 0px rgba(0, 0, 0, 0.25);
    }

    .product-btn {
        border-radius: 3px;
        background: #000;
        font-size: 12px;
        color: #4CDB06;
        text-decoration: none;
        padding: 10px 15px;
        position: absolute;
        bottom: -15px;
        width: 165px;
        left: 50px;
        text-align: center;
    }

    .product-div3 img {
        height: 65px;
        width: 265px;
        object-fit: contain;
        border-radius: 5px;
        box-shadow: 0px 0px 24px 0px rgba(0, 0, 0, 0.25);
    }

    .product-content-div ul {
        padding-left: 18px;
    }
</style>

<div class="content-wrapper mdShop">

    <!-- SECTION 1: PRODUCT VIEW -->
    <div class="product-view">
        <div class="container">
            <div class="page-bradcrumb mb-5">
                <a href="{{URL('mdShop')}}">Home Page</a> >
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
                        <div class="product-buttons mb-4">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#yourCartModal">Add To Cart</a>
                            <a>
                                <img src="{{('front/assets/img/white-heart.svg')}}" alt="">
                            </a>
                            <a>
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                    <path d="M0.5625 5.625H7.875L8.4375 6.75H1.125L0.5625 5.625ZM1.3125 7.875H8.625L9.1875 9H1.875L1.3125 7.875ZM13.5 13.875C14.1225 13.875 14.625 13.3725 14.625 12.75C14.625 12.1275 14.1225 11.625 13.5 11.625C12.8775 11.625 12.375 12.1275 12.375 12.75C12.375 13.3725 12.8775 13.875 13.5 13.875ZM14.625 7.125H12.75V9H16.095L14.625 7.125ZM6 13.875C6.6225 13.875 7.125 13.3725 7.125 12.75C7.125 12.1275 6.6225 11.625 6 11.625C5.3775 11.625 4.875 12.1275 4.875 12.75C4.875 13.3725 5.3775 13.875 6 13.875ZM15 6L17.25 9V12.75H15.75C15.75 13.995 14.745 15 13.5 15C12.255 15 11.25 13.995 11.25 12.75H8.25C8.25 13.995 7.2375 15 6 15C4.755 15 3.75 13.995 3.75 12.75H2.25V10.125H3.75V11.25H4.32C4.7325 10.7925 5.3325 10.5 6 10.5C6.6675 10.5 7.2675 10.7925 7.68 11.25H11.25V4.5H2.25C2.25 3.6675 2.9175 3 3.75 3H12.75V6H15Z" fill="#111111" />
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
                                <p class="fsw-1 product-div1-heading">
                                    <span>4.7</span>
                                    evony medikal
                                </p>
                                <div class="product-follow-div">
                                    <div class="product-follow-logo">
                                        <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.33333 8.34626C10.1069 8.34626 10.8487 8.6603 11.3957 9.21931C11.9427 9.77831 12.25 10.5365 12.25 11.327V11.9232C12.25 12.2394 12.1271 12.5427 11.9083 12.7663C11.6895 12.9899 11.3928 13.1155 11.0833 13.1155H2.91667C2.60725 13.1155 2.3105 12.9899 2.09171 12.7663C1.87292 12.5427 1.75 12.2394 1.75 11.9232V11.327C1.75 10.5365 2.05729 9.77831 2.60427 9.21931C3.15125 8.6603 3.89312 8.34626 4.66667 8.34626H9.33333ZM12.4915 5.41377C12.5962 5.30571 12.7374 5.24265 12.8862 5.23749C13.0349 5.23233 13.1799 5.28547 13.2916 5.38602C13.4032 5.48658 13.4731 5.62694 13.4868 5.77839C13.5005 5.92984 13.457 6.08091 13.3653 6.20069L13.3163 6.25733L11.6667 7.94326C11.5662 8.0459 11.4326 8.10756 11.2908 8.11667C11.149 8.12578 11.0089 8.08171 10.8967 7.99274L10.8418 7.94326L10.017 7.10029C9.91127 6.99326 9.84956 6.84897 9.84452 6.69696C9.83947 6.54496 9.89146 6.39673 9.98985 6.28262C10.0882 6.1685 10.2256 6.09714 10.3738 6.08313C10.522 6.06912 10.6698 6.11352 10.787 6.20725L10.8418 6.25733L11.2542 6.67881L12.4915 5.41377ZM7 1.19238C7.77355 1.19238 8.51541 1.50643 9.06239 2.06543C9.60938 2.62444 9.91667 3.38261 9.91667 4.17316C9.91667 4.96372 9.60938 5.72189 9.06239 6.28089C8.51541 6.8399 7.77355 7.15394 7 7.15394C6.22645 7.15394 5.48459 6.8399 4.93761 6.28089C4.39062 5.72189 4.08333 4.96372 4.08333 4.17316C4.08333 3.38261 4.39062 2.62444 4.93761 2.06543C5.48459 1.50643 6.22645 1.19238 7 1.19238Z" fill="black" />
                                        </svg>
                                    </div>
                                    <div class="product-follow">
                                        <p class="mb-0 fsb-1">Follow</p>
                                        <p class="mb-0 fsb-2">120 Followers</p>
                                    </div>
                                </div>
                                <a href="{{URL('view-products')}}" class="product-btn">
                                    View All Products
                                </a>
                            </div>

                            <div class="product-div2 mb-4">
                                <svg width="28" height="28" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.97404 1.37575C6.13494 1.28639 6.31595 1.2395 6.5 1.2395C6.68405 1.2395 6.86506 1.28639 7.02596 1.37575L11.0966 3.63666C11.181 3.68359 11.2513 3.75223 11.3002 3.83547C11.3492 3.9187 11.375 4.01351 11.375 4.11008V8.5707C11.375 8.76389 11.3233 8.95354 11.2253 9.12002C11.1272 9.2865 10.9865 9.42375 10.8176 9.51754L7.02596 11.6246C6.86506 11.714 6.68405 11.7609 6.5 11.7609C6.31595 11.7609 6.13494 11.714 5.97404 11.6246L2.18237 9.51754C2.01357 9.42379 1.87288 9.28663 1.77489 9.12026C1.67689 8.95388 1.62514 8.76434 1.625 8.57125V4.11008C1.625 4.01351 1.65081 3.9187 1.69976 3.83547C1.74871 3.75223 1.81902 3.68359 1.90342 3.63666L5.97404 1.37575Z" stroke="#4CDB06" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M4.0625 2.4375L8.9375 5.14583V7.04167M3.25 6.67767L4.875 7.58333" stroke="#4CDB06" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M1.625 3.7915L6.5 6.49984M6.5 6.49984L11.375 3.7915M6.5 6.49984V11.9165" stroke="#4CDB06" stroke-linejoin="round" />
                                </svg>
                                <h6 class="fsb-2 mb-0">Free Shipping</h6>
                            </div>
                            <div class="product-div3">
                                <img src="{{('front/assets/img/product/adv-1.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center mt-4">
            <img src="{{('front/assets/img/mdShopAd.png')}}" alt="" style="z-index: 1;">
        </div>
    </div>

    <!-- SECTION 2: MOST SALES -->
    <p class="titleClass text-center mt-4">Other <span class="text-green">Products</span></p>
    <div class="product-card-container container">
        <div class="row product-row">
            <div class="col-3">
                <a href="{{url('product')}}" class="mt-4 card-link">
                    <div class="card">
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
                <a href="{{url('product')}}" class="mt-4 card-link">
                    <div class="card">
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
                <a href="{{url('product')}}" class="mt-4 card-link">
                    <div class="card">
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
                <a href="{{url('product')}}" class="mt-4 card-link">
                    <div class="card">
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
        <div class="white-box container" style="border-radius: 5px;">
            <div class="p-3" id="">
                <div class="reviews mt-4">
                    <div class="d-flex align-items-center gap-3">
                        <p class="mb-0 fs-1 camptonBold">4,8</p>
                        <p class="mb-0 u"><u>480 Reviews</u></p>
                    </div>
                    <div class="stars mb-5">
                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 30px;" alt="">
                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 30px;" alt="">
                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 30px;" alt="">
                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 30px;" alt="">
                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 30px;" alt="">
                    </div>
                    <div class="review mb-4">
                        <div class="mb-4">
                            <div class="stars d-inline me-2">
                                <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                            </div>
                            <p class="d-inline camptonBook">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos beatae quia vero eaque officia, aperiam quas accusantium neque non ducimus explicabo eligendi. Cupiditate sit recusandae tempora quia velit, asperiores odio.</p>
                        </div>
                        <div class="mb-4">
                            <p class="mb-1 fs-6 camptonBold">Ali G. / <span class="fst-italic camptonBook">Heart Valve Replacement Surgery</span></p>
                            <p class="fs-6 fst-italic">12/12/2023</p>
                        </div>
                    </div>
                    <div class="review mb-4">
                        <div class="mb-4">
                            <div class="stars d-inline me-2">
                                <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                            </div>
                            <p class="d-inline camptonBook">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos beatae quia vero eaque officia, aperiam quas accusantium neque non ducimus explicabo eligendi. Cupiditate sit recusandae tempora quia velit, asperiores odio.</p>
                        </div>

                        <div class="mb-4">
                            <p class="mb-1 fs-6 camptonBold">Ali G. / <span class="fst-italic camptonBook">Heart Valve Replacement Surgery</span></p>
                            <p class="fs-6 fst-italic">12/12/2023</p>
                        </div>
                    </div>
                    <div class="review mb-4">
                        <div class="mb-4">
                            <div class="stars d-inline me-2">
                                <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                            </div>
                            <p class="d-inline camptonBook">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos beatae quia vero eaque officia, aperiam quas accusantium neque non ducimus explicabo eligendi. Cupiditate sit recusandae tempora quia velit, asperiores odio.</p>
                        </div>

                        <div class="mb-4">
                            <p class="mb-1 fs-6 camptonBold">Ali G. / <span class="fst-italic camptonBook">Heart Valve Replacement Surgery</span></p>
                            <p class="fs-6 fst-italic">12/12/2023</p>
                        </div>
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
<!-- Modals -->
<div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered position-relative">
        <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close"> -->
        <!-- </button> -->
        <div class="modal-content">
            <p class="camptonBook fw-bold text-center mt-4">Who is this meal for?</p>
            <div class="d-flex align-items-center flex-column">
                <a href="{{url('purchase-food-pack')}}" type="button" class="btn btn-sm btn-md df-center mt-4">Myself</a>
                <a src="" data-bs-dismiss="modal" type="button" class="btn btn-sm whiteBtn df-center mt-3 mb-5">Gift</a>
            </div>
        </div>
    </div>
</div>

<!-- YOUR CART MODAL  -->
<div class="modal fade" id="yourCartModal" tabindex="-1" aria-labelledby="yourCartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" style="max-width: 366px;">
        <div class="modal-content border-0" style="height: 261px;">
            <div class="modal-header border-bottom-0 justify-content-center position-relative">
                <!-- <h5 class="modal-title card-h1" id="yourCartModalLabel">Your Cart</h5> -->
                <img src="{{('front/assets/img/your-cart.png')}}" alt="" class="position-absolute">
            </div>
            <div class="modal-body d-flex align-items-end border-top">
                <div>
                    <div class="d-flex gap-3">
                        <div>
                            <img src="{{('front/assets/img/productsPic.png')}}" alt="">
                        </div>
                        <div>
                            <h5 class="card-h1 mb-0 camptonBook">Evony Medical Mask 50 pc.</h5>
                            <p class="card-h4 text-green d-inline-block">1x</p>
                            <p class="card-h4 d-inline-block">299,99 <span class="lira">₺</span></p>
                        </div>
                    </div>
                    <div class="border-0 df-center justify-content-between gap-3">
                        <button type="button" class="btn bg-green card-h1" style="width: 149px;height:32px">Go to Cart</button>
                        <button type="button" class="btn bg-black card-h1 text-light camptonBook" style="width: 149px;height:32px" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>


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