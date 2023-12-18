@extends('front.layout.layout')
@section("content")
<div class="content-wrapper">
    <div class="banner-section df-center flex-column">
        <div class="container">
            <div class="banner-content df-center flex-column">
                <h6>A NEW APPROACH IN MODERN TREATMENT</h6>
                <h2>PLAN YOUR TREATMENT</h2>
                <h1 class="mb-5">NOW</h1>
                <div class="search-bar d-flex align-items-center p-3 gap-3">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option data-display="Select" selected>Cardiac Arrest</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <label for="floatingSelect">Treatments</label>
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
                        <label for="floatingSelect">Treatment Date</label>
                    </div>
                    <button class="btn btn-search-pill">Search</button>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 2: MAKE REQUEST FORM -->
    <div class="bg-f6">
        <div class="section-wrapper df-center flex-column gap-5 py-100px pb-0 section-2">
            <img src="{{('front/assets/img/Varlik.svg')}}" alt="">
            <h2>Couldn’t find your <span class="text-green text-decoration-underline">treatment</span> package?</h2>
    
            <div class="card border-0 position-relative">
                <div class="card-body df-center flex-column">
                    <p class="card-text">Contact us with your detail & our team will prepare your desired treatment package!</p>
                    <button class="btn btn-md-black position-absolute">Make a Request</button>
                    <img src="{{('front/assets/img/doctor.png')}}" class="position-absolute" alt="">
                </div>
            </div>
            <div class="py-100px pb-0 md-coin df-center flex-column gap-5">
                <img src="{{('front/assets/img/mdcoin.png')}}" alt="">
                <h1><span class="text-green text-decoration-underline">Earn</span> as you spend <span class="text-green">!</span></h1>
                <p>Earn <span>cashback</span> per transaction or <span>invite your friends</span> and spend <span>MD</span>coin for your health needs. </p>
            </div>
            <div class="df-center container md-earn">
                <div>
                    <h1>2%</h1>
                    <img src="{{('front/assets/img/img1.png')}}" alt="">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div>
                    <h1>4%</h1>
                    <img src="{{('front/assets/img/img2.png')}}" alt="">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div>
                    <h1>3%</h1>
                    <img src="{{('front/assets/img/img3.png')}}" alt="">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div>
                    <h1>5%</h1>
                    <img src="{{('front/assets/img/img1.png')}}" alt="">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <div class="bod-bot pb-5">
                <img src="{{('front/assets/img/add.png')}}" alt="">
            </div>
        </div>
    </div>

    <!-- SECTION 3: TOP TREATMENT CARDS -->
    <div class="bg-f6">
        <div class="container section-wrapper treatment-section gap-3 py-5 section-3 d-flex flex-column gap-3">
            <h1><span class="text-green">TOP 5</span> treatments</h1>
            <div class="d-flex justify-content-around align-items-center">
                <div class="card">
                    <div class="card-body d-flex gap-3 align-items-center justify-content-between position-relative">
                        <div class="bg-black p-2 rounded-circle">
                            <img src="{{('front/assets/img/brain.svg')}}" alt="">
                        </div>
                        <div>
                            <h6 class="mb-0">Treatment Name</h6>
                            <p class="mb-0">Treatment Category</p>
                        </div>
                        <div class="treatment-price ms-auto">₺ 18.829,91</div>
                        <img class="position-absolute arrow" src="{{('front/assets/img/round-arrow.svg')}}"  alt="">
                    </div>
                </div>
                <div>
                    <p class="mb-0"><span class="text-green fs-4 fw-bold camptonBold">Reviews</span> <span class="fw-normal">(480)</span></p>
                    <div class="stars">
                        <img src="{{('front/assets/img/star-green.svg')}}" alt="">
                        <img src="{{('front/assets/img/star-green.svg')}}" alt="">
                        <img src="{{('front/assets/img/star-green.svg')}}" alt="">
                        <img src="{{('front/assets/img/star-green.svg')}}" alt="">
                        <img src="{{('front/assets/img/star-green.svg')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around align-items-center">
                <div class="card">
                    <div class="card-body d-flex gap-3 align-items-center justify-content-between position-relative">
                        <div class="bg-black p-2 rounded-circle">
                            <img src="{{('front/assets/img/heart.svg')}}" alt="">
                        </div>
                        <div>
                            <h6 class="mb-0">Treatment Name</h6>
                            <p class="mb-0">Treatment Category</p>
                        </div>
                        <div class="treatment-price ms-auto">₺ 18.829,91</div>
                        <img class="position-absolute arrow" src="{{('front/assets/img/round-arrow.svg')}}"  alt="">
                    </div>
                </div>
                <div>
                    <p class="mb-0"><span class="text-green fs-4 fw-bold camptonBold">Reviews</span> <span class="fw-normal">(480)</span></p>
                    <div class="stars">
                        <img src="{{('front/assets/img/star-green.svg')}}" alt="">
                        <img src="{{('front/assets/img/star-green.svg')}}" alt="">
                        <img src="{{('front/assets/img/star-green.svg')}}" alt="">
                        <img src="{{('front/assets/img/star-green.svg')}}" alt="">
                        <img src="{{('front/assets/img/star-green.svg')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around align-items-center">
                <div class="card">
                    <div class="card-body d-flex gap-3 align-items-center justify-content-between position-relative">
                        <div class="bg-black p-2 rounded-circle">
                            <img src="{{('front/assets/img/eye.svg')}}" alt="">
                        </div>
                        <div>
                            <h6 class="mb-0">Treatment Name</h6>
                            <p class="mb-0">Treatment Category</p>
                        </div>
                        <div class="treatment-price ms-auto">₺ 18.829,91</div>
                        <img class="position-absolute arrow" src="{{('front/assets/img/round-arrow.svg')}}"  alt="">
                    </div>
                </div>
                <div>
                    <p class="mb-0"><span class="text-green fs-4 fw-bold camptonBold">Reviews</span> <span class="fw-normal">(520)</span></p>
                    <div class="stars">
                        <img src="{{('front/assets/img/star-green.svg')}}" alt="">
                        <img src="{{('front/assets/img/star-green.svg')}}" alt="">
                        <img src="{{('front/assets/img/star-green.svg')}}" alt="">
                        <img src="{{('front/assets/img/star-green.svg')}}" alt="">
                        <img src="{{('front/assets/img/star-black.svg')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around align-items-center">
                <div class="card">
                    <div class="card-body d-flex gap-3 align-items-center justify-content-between position-relative">
                        <div class="bg-black p-2 rounded-circle">
                            <img src="{{('front/assets/img/eye.svg')}}" alt="">
                        </div>
                        <div>
                            <h6 class="mb-0">Treatment Name</h6>
                            <p class="mb-0">Treatment Category</p>
                        </div>
                        <div class="treatment-price ms-auto">₺ 18.829,91</div>
                        <img class="position-absolute arrow" src="{{('front/assets/img/round-arrow.svg')}}"  alt="">
                    </div>
                </div>
                <div>
                    <p class="mb-0"><span class="text-green fs-4 fw-bold camptonBold">Reviews</span> <span class="fw-normal">(400)</span></p>
                    <div class="stars">
                        <img src="{{('front/assets/img/star-green.svg')}}" alt="">
                        <img src="{{('front/assets/img/star-green.svg')}}" alt="">
                        <img src="{{('front/assets/img/star-green.svg')}}" alt="">
                        <img src="{{('front/assets/img/star-green.svg')}}" alt="">
                        <img src="{{('front/assets/img/star-black.svg')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around align-items-center">
                <div class="card">
                    <div class="card-body d-flex gap-3 align-items-center justify-content-between position-relative">
                        <div class="bg-black p-2 rounded-circle">
                            <img src="{{('front/assets/img/mouth.svg')}}" alt="">
                        </div>
                        <div>
                            <h6 class="mb-0">Treatment Name</h6>
                            <p class="mb-0">Treatment Category</p>
                        </div>
                        <div class="treatment-price ms-auto">₺ 18.829,91</div>
                        <img class="position-absolute arrow" src="{{('front/assets/img/round-arrow.svg')}}"  alt="">
                    </div>
                </div>
                <div>
                    <p class="mb-0"><span class="text-green fs-4 fw-bold camptonBold">Reviews</span> <span class="fw-normal">(480)</span></p>
                    <div class="stars">
                        <img src="{{('front/assets/img/star-green.svg')}}" alt="">
                        <img src="{{('front/assets/img/star-green.svg')}}" alt="">
                        <img src="{{('front/assets/img/star-green.svg')}}" alt="">
                        <img src="{{('front/assets/img/star-black.svg')}}" alt="">
                        <img src="{{('front/assets/img/star-black.svg')}}" alt="">
                    </div>
                </div>
            </div>
    
    
        </div>
    </div>

    <!-- SECTION 4 -->
    <div class="bg-green">
        <div class="container py-5 text-center">
            <p class="mb-0 camptonBold fs-2 fw-bold">We made the treatment reliable and easier for you</p>
            <p class="mb-0 fs-4 fw-bolder camptonBook text-white">Get your treatment packages in Turkiye withing few clicks from professional healthcare providers.</p>
        </div>
    </div>

    <!-- SECTION 5 -->
    <div class="bg-e6">
        <div class="container download-section d-flex justify-content-around">
            <div>
                <img src="{{('front/assets/img/appScreen.png')}}" alt="">
            </div>
            <div class="part2">
                <div class="mb-4">
                    <p class="fs3 camptonBold mb-0">Download</p>
                    <p class="fs3"><span class="camptonBold text-green">MD</span><span class="text-green">health</span> <span class="camptonBold">Mobile</span></p>
                    <p class="clr-grey camptonBook fs-5 fw-bolder">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae veniam necessitatibus molestias dolorem aut harum placeat esse, .</p>
                </div>
                <div class="d-flex align-items-center gap-4">
                    <img class="align-self-center" src="{{('front/assets/img/playstore.png')}}" alt="">
                    <p class="camptonBook fw-bolder fs-5">or</p>
                    <div>
                        <img src="{{('front/assets/img/qrCode.png')}}" alt="">
                        <p class="camptonBook fs-5">scan the QR Code</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 6 -->
    <div class="bg-black position-relative section6">
        <div class="container medical-pckg">
            <p class="fs-1 camptonBold clr-white mb-0">Find your <span class="text-green">medical</span> package <span class="fw-normal camptonBook">&</span></p>
            <p class="fs-1 camptonBook clr-white mb-0">flight to Turkiye!</p>
            <div class="bg-black">
                <p class="clr-white">Book Now</p>
            </div>
        </div>
        <img class="position-absolute" src="{{('front/assets/img/flight.png')}}" alt="">
    </div>

    <!-- SECTION 7: Testimonials -->
    <div class="bg-f6">
        <div class="container testimonial">
            <div class="text-center mb-8">
                <p class="mb-0">What our users</p>
                <p class="mb-0">have to say</p>
            </div>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                <div class="swiper-slide">Slide 1</div>
                <div class="swiper-slide">Slide 2</div>
                <div class="swiper-slide">Slide 3</div>
                <div class="swiper-slide">Slide 4</div>
                <div class="swiper-slide">Slide 5</div>
                <div class="swiper-slide">Slide 6</div>
                <div class="swiper-slide">Slide 7</div>
                <div class="swiper-slide">Slide 8</div>
                <div class="swiper-slide">Slide 9</div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection