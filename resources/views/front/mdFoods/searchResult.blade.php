@extends('front.layout.layout2')
@section('content')
<div class="content-wrapper bg-f6">

    <!-- SECTION 1 -->
    <div class="searchBar bg-f6">
        <div class="container pt-5 px-0">
            <div class="search-bar d-flex align-items-center justify-content-between p-3 gap-3 mb-5">
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
                <h2 class="titleClass">Your <span style="color: #4cdb06">search</span> results</h2>
            </div>
        </div>
    </div>

    <!-- SECTION 3 -->
    <div class="packageResults">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="mb-3 position-relative">
                        <img style="width: 100%;" src="{{('front/assets/img/foodsAd.png')}}" alt="">
                        <img class="position-absolute" style="right: 40px; bottom: 20px;" src="{{('front/assets/img/foodsAdOverlay.png')}}" alt="">
                    </div>
                    <div class="foodsPackage rounded mb-3">
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0 fs-5 camptonBold lh-base">MDFood Factory</p>
                                <img src="{{ 'front/assets/img/verifiedBy.svg' }}" alt="">
                            </div>
                            <div class="d-flex mb-4">
                                <div class="d-flex align-items-center gap-1">
                                    <img src="{{ 'front/assets/img/Diaganose.svg' }}" alt="">
                                    <p class="mb-0 lctn fst-italic">Daily, Weekly, Monthly or Yearly</p>
                                </div>
                            </div>
                            <div class="d-flex gap-4">
                                <div class="brdr-right">
                                    <p class="mb-0"><span class="text-green fw-bold camptonBold"
                                            style="font-size: 1.125rem;">Package Includes</span></p>
                                    <div class="d-flex gap-1 align-items-baseline mb-1">
                                        <img style="width: 11px;" src="{{ 'front/assets/img/Varlik.svg' }}"
                                            alt="">
                                        <p class="mb-0 camptonBook smallFont">Breakfast</p>
                                    </div>
                                    <div class="d-flex gap-1 align-items-baseline mb-1">
                                        <img style="width: 11px;" src="{{ 'front/assets/img/Varlik.svg' }}"
                                            alt="">
                                        <p class="mb-0 camptonBook smallFont">Dinner</p>
                                    </div>
                                    <div class="d-flex gap-1 align-items-baseline mb-1">
                                        <img style="width: 11px;" src="{{ 'front/assets/img/Varlik.svg' }}"
                                            alt="">
                                        <p class="mb-0 camptonBook smallFont">No-Gluten</p>
                                    </div>
                                    <div class="d-flex gap-1 align-items-baseline mb-1">
                                        <img style="width: 11px;" src="{{ 'front/assets/img/Varlik.svg' }}"
                                            alt="">
                                        <p class="mb-0 camptonBook smallFont">Zero Sugar Dessert</p>
                                    </div>
                                </div>
                                <div class="brdr-right">
                                    <p class="mb-0"><span class="text-green fw-bold camptonBold"
                                            style="font-size: 1.125rem;">Reviews</span><span class="fw-normal">(480)</span></p>
                                    <div class="stars">
                                        <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 16px;" alt="">
                                        <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 16px;" alt="">
                                        <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 16px;" alt="">
                                        <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 16px;" alt="">
                                        <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 16px;" alt="">
                                    </div>
                                    <p class="fs-6 camptonBold">Excellent</p>
                                </div>
                                <div class="d-flex flex-column flex-grow-1 gap-4">
                                    <div>
                                        <p class="mb-0">
                                            <span class="text-green fw-bold camptonBold" style="font-size: 1.125rem;">Meal Service Price (Monthly)</span>
                                        </p>
                                        <div class="my-2">
                                            <p class="mb-0 fs-5 camptonBold lh-base red-strike">4,980,00 ₺</p>
                                            <p class="mb-0 fs-5 camptonBold lh-base">2,820,00 ₺
                                                <span
                                                    class="smallFont fs-6">(120,90 ₺ per meal)</span>
                                            </p>
                                            <p class="food-search-p4">*This package is the basic package it include meat and vegetables</p>                                
                                        </div>
                                        <div class="d-flex gap-2 mb-2">
                                            <button class="btn purchaseBtn" data-bs-toggle="modal"
                                                data-bs-target="#foodForModal1">Purchase Meal Service</button>
                                            <button class="favouriteBtn">
                                                <img src="{{ 'front/assets/img/white-heart.svg' }}" alt="">
                                            </button>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <a href="{{url('food-pack-details')}}" id="" class="underline smallFont text-end view_btn">View Menu</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="packageFilter rounded mb-3">
                        <p class="fs-5 camptonBold lh-base">Supplier Rating</p>
                        <div>
                            <form action="" class="filter greenCheck">
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
                            <form action="" class="filter greenCheck">
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
                            <form action="" class="filter greenCheck">
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
    <div class="bg-f6" style="margin-top: 15rem; margin-bottom: 10rem;">
        <div class="container">
            <div class="text-center">
                <h2 class="titleClass">Best Meal <span style="color: #4cdb06">Providers</span></h2>
            </div>
            <div class="foodsPackage rounded mb-4">
                <div>
                    <img src="{{('front/assets/img/ProvidersLogo.png')}}" alt="">
                </div>
                <div class="d-flex justify-content-between flex-grow-1 align-self-stretch">
                    <div class="d-flex flex-column justify-content-between py-2">
                        <div>
                            <p class="mb-0 fs-5 camptonBold lh-base">MDFood Factory</p>
                            <p class="mb-0 lh-1 smallFont camptonBook">Vegetables, Beef, Vegan & Vegetarian Kitchen</p>
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
                        <img src="{{('front/assets/img/verifiedByMdFoods.svg')}}" alt="">
                        <!-- <a href="{{url('home-pack-details')}}" class="underline">View Services</a> -->
                    </div>
                </div>
            </div>
            <div class="foodsPackage rounded mb-4">
                <div>
                    <img src="{{('front/assets/img/ProvidersLogo.png')}}" alt="">
                </div>
                <div class="d-flex justify-content-between flex-grow-1 align-self-stretch">
                    <div class="d-flex flex-column justify-content-between py-2">
                        <div>
                            <p class="mb-0 fs-5 camptonBold lh-base">Diet Restaurant</p>
                            <p class="mb-0 lh-1 smallFont camptonBook">Vegetables, Beef, Vegan & Vegetarian Kitchen</p>
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
                        <img src="{{('front/assets/img/verifiedByMdFoods.svg')}}" alt="">
                        <!-- <a href="{{url('home-pack-details')}}" class="underline">View Services</a> -->
                    </div>
                </div>
            </div>
            <div class="foodsPackage rounded mb-4">
                <div>
                    <img src="{{('front/assets/img/ProvidersLogo.png')}}" alt="">
                </div>
                <div class="d-flex justify-content-between flex-grow-1 align-self-stretch">
                    <div class="d-flex flex-column justify-content-between py-2">
                        <div>
                            <p class="mb-0 fs-5 camptonBold lh-base">Veggie's & Fish</p>
                            <p class="mb-0 lh-1 smallFont camptonBook">Vegetables, Beef, Vegan & Vegetarian Kitchen</p>
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
                        <img src="{{('front/assets/img/verifiedByMdFoods.svg')}}" alt="">
                        <!-- <a href="{{url('home-pack-details')}}" class="underline">View Services</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <!-- SECTION 5 -->
    <div class="bg-f6 scanQr">
        <img src="{{('front/assets/img/appScreenFooter.png')}}" alt="">
    </div>

    <!-- Modals -->
    <div class="modal fade" id="foodForModal1" tabindex="-1" aria-labelledby="foodForModal1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered position-relative">
            <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close"> -->
                <!-- </button> -->
            <div class="modal-content bg-f6">
                <img class="closeModal" data-bs-dismiss="modal" src="{{('front/assets/img/closeModal.png')}}" alt="">
                <img src="{{('front/assets/img/step1.svg')}}" alt="">
                <div class="d-flex justify-content-center py-4">
                    <form action="" class="p-3 mdFoodsPurchaseFoodModal1">
                        <div class="form-floating mb-4">
                            <select class="form-select" name="food_type" id="floatingSelect"
                                aria-label="Floating label select example">
                                <option data-display="Select" selected>Select Type</option>
                                    <option>Beef & Vegetables</option>
                            </select>
                            <label for="floatingSelect">Food Type</label>
                        </div>
                        <div class="form-floating mb-4">
                            <select class="form-select" name="calories" id="floatingSelect"
                                aria-label="Floating label select example">
                                <option data-display="Select" selected>Select Calories</option>
                                    <option>Max 1500 kCal</option>
                            </select>
                            <label for="floatingSelect">Calories (Per Day)</label>
                        </div>
                        <div class="form-floating mb-4">
                            <div class="form-select unselect">
                                <div class="d-flex gap-1 align-items-center">
                                    <input type="checkbox" id="" name="" value="">
                                    <label for="vehicle1">Breakfast</label><br>
                                </div>
                                <div class="d-flex gap-1 align-items-center">
                                    <input type="checkbox" id="" name="" value="">
                                    <label for="vehicle1">Lunch</label><br>
                                </div>
                                <div class="d-flex gap-1 align-items-center">
                                    <input type="checkbox" id="" name="" value="">
                                    <label for="vehicle1">Dinner</label><br>
                                </div>
                            </div>
                            <label for="floatingSelect">Meals</label>
                        </div>
                        <div class="form-floating mb-4">
                            <select class="form-select" name="subscription" id="floatingSelect"
                                aria-label="Floating label select example">
                                <option data-display="Select" selected>Select Subscription</option>
                                    <option>1 Week</option>
                            </select>
                            <label for="floatingSelect">Subscription Type</label>
                        </div>
                        <p class="fs-6 camptonBold text-green text-end">Price: <span style="color: #000;">2.820,00 ₺</span></p>
                        <a type="submit" class="btn purchaseBtn my-4 df-center" data-bs-toggle="modal" data-bs-target="#foodForModal2" data-bs-dismiss="modal">
                            <span class="fw-bold">Step 2:</span> <span class="camptonBook">Who is this meal for?</span> 
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="foodForModal2" tabindex="-1" aria-labelledby="foodForModal2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered position-relative">
            <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close"> -->
                <!-- </button> -->
            <div class="modal-content">
                <img class="closeModal" data-bs-dismiss="modal" src="{{('front/assets/img/closeModal.png')}}" alt="">
                <img src="{{('front/assets/img/step1.svg')}}" alt="">
                <p class="camptonBook fw-bold text-center mt-4">Who is this treatment for?</p>
                <div class="d-flex align-items-center flex-column">
                    <a href="{{url('purchase-food-pack')}}" type="button" class="btn btn-sm btn-md df-center mt-4">Myself</a>
                    <a data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#foodForModal3" type="button" class="btn btn-sm whiteBtn df-center mt-3 mb-5">Gift</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="foodForModal3" tabindex="-1" aria-labelledby="foodForModal3" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered position-relative">
            <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close"> -->
                <!-- </button> -->
            <div class="modal-content">
                <img class="closeModal" data-bs-dismiss="modal" src="{{('front/assets/img/modalClose.png')}}" alt="">
                <img src="{{('front/assets/img/giftMeal.svg')}}" alt="">
                <div class="modal-body">
                    <form class="row g-4">
                            <div class="col-md-4 mb-3">
                                <label for="inputEmail4" class="form-label fw-bold">*Recipient Full Name</label>
                                <input type="email" class="form-control  h-75" id="inputEmail4" placeholder="Full Name">
                            </div>
                            <div class="col-md-8 mb-3">
                                <label for="inputAddress" class="form-label fw-bold">*E-mail</label>
                                <input type="email" class="form-control  h-75" id="inputAddress"  placeholder="Email">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="inputPassword4" class="form-label fw-bold">*Recipient Number</label>
                                <input type="number" class="form-control h-75" id="inputPassword4" placeholder="Contact Number">
                            </div>
                            <div class="col-md-8 mb-3">
                                <label for="inputState" class="form-label fw-bold">*City</label>
                                <select id="inputState" class="form-select h-75">
                                    <option selected>City</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="inputEmail4" class="form-label fw-bold">*Full Address</label>
                                <input type="email" class="form-control  h-75" id="inputEmail4" placeholder="Full Address">
                            </div>
                            <div class="col-md-12">
                                <label for="inputEmail4" class="form-label fw-bold">*Gift Note</label>
                                <!-- <input type="email" class="form-control  h-75" id="inputEmail4" placeholder="Full Address"> -->
                                <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="col-12 text-center ">
                                <a href="{{url('purchase-food-pack')}}" type="submit" class="btn purchaseBtn my-4 df-center">
                                    <span class="fw-bold">Go</span> <span class="camptonBook">Payment Page</span> 
                                </a>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection