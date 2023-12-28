@extends('front.layout.layout')
@section('content')
    <div class="">
        <div class="containerb text-center mt-5 mb-5">
            <h4 class="mid-food-sen2" style="color: #000002">Purchase Details</h4>
            <p class="food-search-p1" style="color: #F31D1D;position: static; "><ins>Delete All Items</ins></p>
        </div>

        <div class="container">
            <div class="row shadow-lg p-2 mb-3 bg-body rounded">
                <div class="col">
                    <h4 class="food-search-p2">MDFood Factory</h4>
                    <p class="food-factory-veg1" style="font-style: normal">1 Week,Beef & Vegetables, Breakfast & Lunch</p>
                    <div class="">
                        <p class="m-0 food-search-p1" style="color: #4CDB06;position: static;">Package Includes</p>
                        <p class="m-0 food-factory-veg1" style="font-style: normal">
                            <span class="">
                                <img src="{{ 'front/assets/img/mdFoods/Varlık 4@.png' }}" alt="">
                            </span>
                            <span class="">Breakfast</span>
                        </p>
                        <p class="m-0 food-factory-veg1" style="font-style: normal">
                            <span class="">
                                <img src="{{ 'front/assets/img/mdFoods/Varlık 4@.png' }}" alt="">
                            </span>
                            <span class="">Dinner</span>
                        </p>
                        <p class="m-0 food-factory-veg1" style="font-style: normal">
                            <span class="">
                                <img src="{{ 'front/assets/img/mdFoods/Varlık 4@.png' }}" alt="">
                            </span>
                            <span class="">No-Gluten</span>
                        </p>
                        <p class="m-0 food-factory-veg1" style="font-style: normal">
                            <span class="">
                                <img src="{{ 'front/assets/img/mdFoods/Varlık 4@.png' }}" alt="">
                            </span>
                            <span class="">Zero Sugar Dessert</span>
                        </p>
                    </div>
                </div>
                <div class="col text-end">
                    <h4 class="m-0 purchase-details-p1">Subscription Type</h4>
                    <p class="m-0 purchase-meal-p1">Weekly</p>
                    <div class="d-flex justify-content-end align-items-end flex-column">
                        <p class="m-0 ">
                            <span class="purchase-details-p2">Start Date</span>
                            <span class="">
                                <img src="{{ 'front/assets/img/mdFoods/Vector 1012.png' }}" alt="">
                            </span>
                            <span class="purchase-details-p2">End Date</span>
                        </p>
                        <div class="d-flex justify-content-between " style="width: 66%;">
                            <p class="purchase-details-p3">12/11/23</p>
                            <p class="purchase-details-p3">17/11/23</p>
                        </div>
                    </div>
                    <br />
                    <div class="">
                        <p class="m-0 purchase-details-p4">Service Price</p>
                        <p class="m-0 food-search-p2">2,899.00$</p>
                    </div>
                </div>
            </div>

            <div class="row text-center mb-3">
                <div class="col">
                    <img src="{{ 'front/assets/img/mdFoods/Group 17.png' }}" alt="">
                </div>
            </div>
            <div class="row shadow-lg p-2 mb-3 bg-body rounded mt-3">
                <div class="col">
                    <h5 class="m-0 purchase-details-p1">Address</h5>
                    <p class="m-0 purchase-meal-p1">Ali Danish</p>
                    <p class="m-0 mid-food-sub" style="color: #000000">48 St Paul St.Baton Rouge,LA 70806</p>
                    <div class="m-0">
                        <p class="m-0 ">
                            <span class="purchase-details-p2">Country:</span>
                            <span class="mid-food-sub" style="color: #000000">USA</span>
                        </p>
                        <p class="m-0">
                            <span class="purchase-details-p2">City:</span>
                            <span class="mid-food-sub" style="color: #000000">Los Angles</span>
                        </p>
                    </div>
                    <div class="text-end">
                        <p class="m-0 mid-food-sub" style="color: #F31D1D">
                            <span>
                                <img src="{{ 'front/assets/img/mdFoods/material-symbols_change-circle-outline.png' }}"
                                    alt="">
                            </span>
                            <span data-bs-toggle="modal"
                            data-bs-target="#exampleModal2" class="pointer1"><ins>Change Receiver information</ins></span>
                        </p>
                    </div>
                </div>
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
            <div class="row ">
                <div class="col-6">
                    <form class="row g-3">
                        <div class="col-12 mb-4">
                            {{-- <label for="inputAddress" class="form-label">Address</label> --}}
                            <input type="text" class="form-control reserv-form-w " id="inputAddress"
                                placeholder="John Smith">
                        </div>
                        <div class="col-12 mb-4">
                            {{-- <label for="inputAddress" class="form-label">Address</label> --}}
                            <input type="text" class="form-control reserv-form-w" id="inputAddress"
                                placeholder="1234 1234 4567 7890">
                        </div>
                        <div class="col-md-6 mb-4">
                            {{-- <label for="inputEmail4" class="form-label">Email</label> --}}
                            <input type="text" class="form-control reserv-form-w" id="inputEmail4"
                                placeholder="02/12">
                        </div>
                        <div class="col-md-6 mb-4">
                            {{-- <label for="inputPassword4" class="form-label">Password</label> --}}
                            <input type="text" class="form-control reserv-form-w" id="inputPassword4"
                                placeholder="000">
                        </div>
                        <div class="col-md-6">
                            {{-- <label for="inputPassword4" class="form-label">Password</label> --}}
                            {{-- <input type="text" class="form-control" id="inputPassword4" placeholder="000"> --}}
                            <a class="" href="{{ URL('md-booking-payment-succ-page') }}">
                                <button class="btn btn-search-pill-reservation1">Proceed Payment</button>
                            </a>
                        </div>
                    </form>
                </div>
                <div class="col text-end">
                    <img src="{{ 'front/assets/img/mdBookings/Group 12.png ' }}" class="" alt="">
                </div>
            </div>

        </div>
        <div class="md-food-view-footer">
            <img src="{{ 'front/assets/img/appScreenFooter.png' }}" alt="" class="footer-image mt-5">
        </div>


        {{-- Model Box --}}

        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content m-0 p-0">
                    <div class="modal-header border-0 m-0 p-0 position-relative overflow-hidden">
                        {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
                        <img src="{{ 'front/assets/img/mdFoods/Group 15.png' }}" alt="" class=" img1">
                        <button type="button" class="btn-close position-absolute purchase-meal-btn1" data-bs-dismiss="modal"
                            aria-label="Close" id="myModal1" style="background-color: #FFFFFF;border-radius:50%"></button>
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
