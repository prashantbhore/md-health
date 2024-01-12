@extends('front.layout.layout')
@section('content')
<div class="content-wrapper paymentsPage bg-f6">
    
    <!-- SECTION 1 -->
    <div class="searchBar backBtn bg-f6">
        <div class="container pt-4">
            <p class="fs-1 camptonBold text-center lh-1">Purchase Details</p>
            <p class="fs-6 camptonBold text-center deleteAll mb-4">Delete All Items</p>
            <div class="packageResult rounded mb-3">
                <div class="flex-grow-1">
                    <div class="d-flex gap-2 justify-content-between align-items-center">
                        <p class="mb-0 fs-5 camptonBold lh-base">MDFood Factory</p>
                        <p class="mb-0 fs-5 camptonBold lh-base">Subscription Type</p>
                    </div>
                    <div class="d-flex gap-5 justify-content-between">
                        <!-- <div class="d-flex align-items-center gap-2"> -->
                            <p class="mb-0 lctn camptonBook">1 Week, Beef & Vegetables, Breakfast & Lunch</p>
                            <p class="mb-0 fs-6 camptonBold text-green">Weekly</p>
                        <!-- </div> -->
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <div>
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
                        <div class="d-flex flex-column justify-content-between align-items-end">
                            <div>
                                <div class="d-flex gap-1">
                                    <p class="mb-0 camptonBold">Start Date</p>
                                    <img src="{{('front/assets/img/Line.svg')}}" alt="">
                                    <p class="mb-0 camptonBold">End Date</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="camptonBook mb-0">12/11/2023</p>
                                    <p class="camptonBook mb-0">17/11/2023</p>
                                </div>
                            </div>
                            <div>
                                <p class="mb-0 fs-6 camptonBold text-green">Service Price</p>
                                <p class="mb-0 fs-5 camptonBold lh-1">34.560,00 ₺</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text-center mb-3">
                <div class="col">
                    <img src="{{ 'front/assets/img/mdFoods/Group 17.png' }}" alt="">
                </div>
            </div>
            <div class="packageResult rounded mb-5">
                <div>
                    <p class="mb-0 fs-5 camptonBold lh-base">Address</p>
                    <p class="mb-0 fs-6 camptonBold text-green">Ali Danish</p>
                    <p class="mb-0 lctn camptonBook">48 St Paul St.Baton Rogue, LA 70806</p>
                    <div class="d-flex gap-5">
                        <p class="mb-0 lctn"><span class="camptonBold">Country:</span> USA</p>
                        <p class="mb-0 lctn"><span class="camptonBold">City:</span> Los Angeles</p>
                    </div>
                </div>
                <div>
                    <div class="d-flex align-items-center gap-2">
                        <img src="{{('front/assets/img/change.svg')}}" alt="">
                        <p class="mb-1 boldRed smallFont"><u>Change Receiver Information</u></p>
                    </div>
                </div>
            </div>
            <div class="greenBorder mb-4"></div>
            <p class="fs-6 camptonBold text-green text-end">Total Price <span style="color: #000;">34.560,00 ₺</span></p>
            <div class="d-flex flex-column align-items-center mb-2">
                <img src="{{('front/assets/img/ArrowsDown.png')}}" alt="" class="mb-3">
                <p class="mb-2 fs-3 camptonBold lh-base">Next Step</p>
                <p class="underline smallFont fw-normal camptonBook"><u>Payment</u></p>
            </div>

            <div class="row rev-border mt-5" style="margin-bottom: 2rem"></div>
            <div class="row ">
                <div class="col">
                    <p class=" text-end">
                        <span class="food-search-p2" style="color: #4CDB06">Total Price </span>
                        <span class="food-search-p2">2,899.00$</span>
                    </p>
                </div>
            </div>

            <div class="row text-center mb-5">
                <div class="">
                    <img src="{{ 'front/assets/img/mdBookings/Group 11.png ' }}" class="" alt="">
                </div>
                <h3 class="reservation-p8">Next Step</h3>
                <p class="vehicle-p3"><ins>Payment</ins></p>
            </div>
            <div class="row mb-5">
                <div class="col d-flex gap-5">
                    <div class="form-check">
                        <input class="form-check-input reserv-check" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Credit or Debit Card
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input reserv-check" type="checkbox" value=""
                            id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Bank Transfer
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input reserv-check" type="checkbox" value=""
                            id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            My Wallet
                        </label>
                    </div>
                </div>
            </div>
            <div id="card">
                <div class="row">
                    <div class="col-5 card-details me-5">
                        <form action="">
                            <input type="text" class="mb-3" name="" id="">
                            <input type="text" class="mb-3" name="" id="">
                            <div class="d-flex gap-2 mb-4">
                                <input type="text">
                                <input type="text">
                            </div>
                            <!-- <a> -->
                                <a href="{{url('food-payment-status')}}" class="btn purchaseBtn" style="color: #fff; height: unset; padding: 12px 2rem;">Proceed Payment</a>
                            <!-- </a> -->
                        </form>
                    </div>
                    <div class="modal-body mt-4">
                        <div class="p-3">
                            <div class="row g-4">
                                <div class="col-md-5">
                                    <label for="inputEmail4" class="form-label purchase-details-p3">*Receipent Full Name</label>
                                    <input type="text" class="form-control purchase-form-p1" placeholder="First name"
                                        aria-label="First name" id="inputEmail6">
                                </div>
                                <div class="col-md-7">
                                    <label for="inputEmail5" class="form-label purchase-details-p3">*E-mail *optional</label>
                                    <input type="text" class="form-control purchase-form-p1" placeholder="E-mail"
                                        aria-label="Last name" id="inputEmail5">
                                </div>
                                <div class="col-md-5">
                                    <label for="inputEmail4" class="form-label purchase-details-p3">*Receipent Number</label>
                                    <input type="text" class="form-control purchase-form-p1" placeholder="Contact Number"
                                        aria-label="Last name" id="inputEmail4">
                                </div>
                                <div class="col-md-7">
                                    <label for="inputState" class="form-label purchase-details-p3">*City</label>
                                    <select id="inputState" class="form-select purchase-form-p1">
                                        <option selected>City</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail7" class="form-label purchase-details-p3">*Full Address</label>
                                    <input type="text" class="form-control purchase-form-p1" placeholder="Full Address"
                                        aria-label="Last name" id="inputEmail7">

                                </div>
                                <div class="col-md-12">
                                    <label for="floatingTextarea2" class="form-label purchase-details-p3">*Gift Note *optional</label>
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                        <label for="floatingTextarea2">Gift Note</label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <a class="navbar-brand" href="{{URL('md-food-purchase-details')}}">
                                <button class="btn btn-search-pill-food1 " style="width: 50%" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal1" id="openSecondModal"><span class=""></span><span
                                        class="">Go Payment Page</span></button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
