@extends('front.layout.layout')
@section('content')
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
            <img src="{{ 'front/assets/img/Varlik.svg' }}" alt="">
            <h2>Couldn’t find your <span class="text-green text-decoration-underline">treatment</span> package?</h2>
            <div class="card border-0 position-relative">
                <div class="card-body df-center flex-column">
                    <p class="card-text">Contact us with your detail & our team will prepare your desired treatment package!
                    </p>
                    <button class="btn btn-md-black position-absolute" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Make a Request</button>
                </div>
                <img src="{{ 'front/assets/img/doctor.png' }}" class="position-absolute" alt="">
            </div>
        </div>
    </div>
    <div class="py-100px pb-0 md-coin df-center flex-column gap-5">
        <img src="{{ 'front/assets/img/mdcoin.png' }}" alt="">
        <h1><span class="text-green text-decoration-underline">Earn</span> as you spend <span class="text-green">!</span>
        </h1>
        <p>Earn <span>cashback</span> per transaction or <span>invite your friends</span> and spend <span>MD</span>coin for
            your health needs. </p>
    </div>
    <div class="df-center container md-earn">
        <div>
            <h1>2%</h1>
            <img src="{{ 'front/assets/img/img1.png' }}" alt="">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div>
            <h1>4%</h1>
            <img src="{{ 'front/assets/img/img2.png' }}" alt="">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div>
            <h1>3%</h1>
            <img src="{{ 'front/assets/img/img3.png' }}" alt="">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div>
            <h1>5%</h1>
            <img src="{{ 'front/assets/img/img1.png' }}" alt="">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </div>
    <div class="bod-bot pb-5">
        <img src="{{ 'front/assets/img/add.png' }}" alt="">
    </div>

    <!-- SECTION 3: TOP TREATMENT CARDS -->
    <div class="container section-wrapper gap-3 py-5 section-3 d-flex flex-column gap-3">
        <h1><span class="text-green">TOP 5</span> treatments</h1>
        <div class="d-flex gap-3">
            <div class="card">
                <div class="card-body d-flex gap-3 align-items-center justify-content-between">
                    <div>
                        <img src="{{ 'front/assets/img/brain.png' }}" alt="">
                    </div>
                    <div>
                        <h6 class="mb-0">Treatment Name</h6>
                        <p class="mb-0">Treatment Category</p>
                    </div>
                    <div class="treatment-price ms-auto">₺ 18.829,91</div>
                    <img src="{{ 'front/assets/img/ArrowRight.png' }}" alt="">
                </div>
            </div>
            <div>
                <h2>Reviews <span>(480)</span></h2>
                <div class="stars"></div>
            </div>
        </div>
    </div>
        {{-- Make Payment Model box--}}
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3">
                <div>
                    <div class="text-end"><button type="button" class="btn-close m-3" data-bs-dismiss="modal"
                            aria-label="Close"></button></div>

                    <div class="text-center">
                        <h4 class="modal-title" id="exampleModalLabel">Couldn't find your <span
                                class="green-color">treatment</span> package?</h4>
                        <p>Fill the form & get your desired treatment plan</p>
                    </div>
                </div>
                <div class="modal-body">
                    <form class="row g-4">
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label fw-bold">*First Name</label>
                            <input type="email" class="form-control  h-75" id="inputEmail4" placeholder="First Name">
                        </div>
                        <div class="col-md-4">
                            <label for="inputPassword4" class="form-label fw-bold">*Last Name</label>
                            <input type="text" class="form-control h-75" id="inputPassword4" placeholder="Last Name">
                        </div>
                        <div class="col-md-4">
                            <label for="inputAddress" class="form-label fw-bold">*Email</label>
                            <input type="email" class="form-control  h-75" id="inputAddress" placeholder="Optional">
                        </div>

                        <div class="col-md-4">
                            <label for="inputState" class="form-label fw-bold">*Country</label>
                            <select id="inputState" class="form-select h-75">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="inputAddress33" class="form-label fw-bold">*Contact Mobile</label>
                            <input type="tel" class="form-control h-75" id="inputAddress33"
                                placeholder="+Contact Mobile">
                            {{-- <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                    id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Whatsapp</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                    id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Telegram</label>
                            </div> --}}
                        </div>
                        <div class="col-md-4">
                            <label for="inputAddress443" class="form-label fw-bold">*Treatment Name</label>
                            <input type="text" class="form-control h-75" id="inputAddress443"
                                placeholder="Treatment Name">
                        </div>

                        <div class="col-md-12">
                            <label for="inputAddress5" class="form-label fw-bold">*Details</label>
                            <input type="text" class="form-control h-75" id="inputAddress5"
                                placeholder="Please Write your treatment requirement in detail">
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress5" class="form-label fw-bold">*Previes Treatment</label>
                            <input type="text" class="form-control h-75" id="inputAddress5"
                                placeholder="Have you done/received any related treatment before If Yes,Please write the details">
                        </div>
                        <div class="col-md-6">
                            <label for="formFile" class="form-label fw-bold">Upload Your Treatment Documents</label>
                            <input class="form-control h-75" type="file" id="formFile">
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress5" class="form-label fw-bold">When do you need the treatment?</label>
                            <input type="text" class="form-control h-75" id="inputAddress5"
                                placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress5" class="form-label fw-bold">Do you need travel visa?</label>
                            <div class="mt-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                        value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                        value="option2">
                                    <label class="form-check-label" for="inlineCheckbox2">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center ">
                            <button type="submit" class="btn w-50 mt-4 bg-green h-75"
                                >Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
