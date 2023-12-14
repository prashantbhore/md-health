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

    <!-- SECTION 3: TOP TREATMENT CARDS -->
    <div class="container section-wrapper gap-3 py-5 section-3 d-flex flex-column gap-3">
        <h1><span class="text-green">TOP 5</span> treatments</h1>
        <div class="d-flex gap-3">
            <div class="card">
                <div class="card-body d-flex gap-3 align-items-center justify-content-between">
                    <div>
                        <img src="{{('front/assets/img/brain.png')}}" alt="">
                    </div>
                    <div>
                        <h6 class="mb-0">Treatment Name</h6>
                        <p class="mb-0">Treatment Category</p>
                    </div>
                    <div class="treatment-price ms-auto">₺ 18.829,91</div>
                    <img src="{{('front/assets/img/ArrowRight.png')}}"  alt="">
                </div>
            </div>
            <div>
                <h2>Reviews <span>(480)</span></h2>
                <div class="stars"></div>
            </div>
        </div>


    </div>

</div>
@endsection
@section('script')

@endsection