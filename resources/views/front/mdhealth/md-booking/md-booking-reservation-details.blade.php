@extends('front.layout.layout')
@section('content')
    <div>
        <div class="container mt-5 mb-3">
            <div class="row">
                <div class="col d-flex flex-column align-items-center">
                    <h6 class="reservation-p6">Reservaion Details</h6>
                    <p class="reservation-p7"><ins>Delete All Items</ins></p>
                </div>
            </div>
        </div>

        <div class="container ">
            <div class="row  gap-3">
                <div class="col-9 shadow-lg p-1 h-50 bg-body rounded p-2">
                    <div class="row border-bottom">
                        <div class=" d-flex justify-content-between align-items-center">
                            <p class="md-booking-search-p2">Renaissence Hotel Besiktas</p>
                            <div class=" d-flex gap-2">
                                <p class=" d-flex gap-1">
                                    <span class="reservation-p1">Enter Date</span>
                                    <span class="">
                                        <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" class=" "
                                            alt="">
                                    </span>
                                    <span class="">10:12</span>
                                    <span class="">
                                        <img src="{{ 'front/assets/img/mdBookings/Vector (2).png' }}" class=" "
                                            alt="">
                                    </span>
                                    <span class="">14:00</span>
                                </p>
                                <p class="d-flex gap-1">
                                    <span class="reservation-p1" style="color: #F31D1D">Exit Date</span>
                                    <span class="">
                                        <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" class=" "
                                            alt="">
                                    </span>
                                    <span class="">10:12</span>
                                    <span class="">
                                        <img src="{{ 'front/assets/img/mdBookings/Vector (2).png' }}" class=" "
                                            alt="">
                                    </span>
                                    <span class="">14:00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4 ">
                            <div class="">
                                <img src="{{ 'front/assets/img/mdBookings/hotelCardImage.png' }}" class=" w-75 "
                                    alt="">
                            </div>
                        </div>
                        <div class="col d-flex justify-content-center align-items-center gap-3">
                            <div class="">
                                <p class="vehicle-p3">Adult Guests:</p>
                                <div
                                    class="border rounded-pill p-0 m-0 d-flex justify-content-center align-items-center gap-2 p-1">
                                    <img src="{{ 'front/assets/img/mdBookings/Group 10.png ' }}" class=""
                                        alt="">
                                    1
                                    <img src="{{ 'front/assets/img/mdBookings/Group 9.png' }}" class=""
                                        alt="">
                                    {{-- <button type="button" class="btn booking-bt1">-</button>
                                    <span class="">1</span>
                                    <button type="button" class="btn booking-bt1">+</button> --}}
                                </div>
                            </div>
                            <div class="">
                                <p class="vehicle-p3">Child Guests:</p>
                                <div
                                    class="border rounded-pill p-0 m-0 d-flex justify-content-center align-items-center p-1  gap-2">
                                    {{-- <button type="button" class="btn booking-bt1">-</button>
                                    <span class="">1</span>
                                    <button type="button" class="btn booking-bt1">+</button> --}}
                                    <img src="{{ 'front/assets/img/mdBookings/Group 10.png ' }}" class=""
                                        alt="">
                                    1
                                    <img src="{{ 'front/assets/img/mdBookings/Group 9.png' }}" class=""
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col text-end d-flex flex-column justify-content-end align-item-end">
                            <div class=" ">
                                <p class="m-0 md-booking-search-p5">Per Night Price</p>
                                <p class=" m-0">
                                    <span class="food-review-270">Nightx7</span><span
                                        class="reservation-p2">1,000.00$</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="row">
                        <p class="m-0 reservation-p3">Total Price</p>
                        <p class="m-0 reservation-p4">7,000.00$</p>
                        {{-- <p class=""></p> --}}
                    </div>
                    <div class="row bg-dark pt-3 pb-3 mt-3">
                        <p class="m-0 reservation-p5 m-0" style="color: #FFFFFF">invite your friends</p>
                        <p class="m-0 reservation-p4 m-0 text-end">
                            <span class="" style="color: #FFFFFF">and</span>
                            <span class="" style="color: #4CDB06">earn</span>
                            <span class="" style="color: #FFFFFF">MDcoin.</span>
                        </p>
                    </div>
                    <div class="row mt-3">
                        <div class="d-flex justify-content-between m-0">
                            <p class="m-0 food-factory-veg" style="color: #9B9B9B">Reservation</p>
                            <p class="m-0 mid-food-sub" style="color: #000000">7,000.00$</p>
                        </div>
                        <div class="m-0 d-flex justify-content-between ">
                            <p class="m-0  food-factory-veg" style="color: #9B9B9B">Service Fee</p>
                            <p class="m-0"><span class="md-booking-search-p2b mx-1"
                                    style="color: #4CDB06">FREE</span><span class="mid-food-sub"
                                    style="color: #000000">7,000.00$</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rev-border"></div>
        </div>

        <div class="container">
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
                        <input class="form-check-input reserv-check" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Bank Transfer
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input reserv-check" type="checkbox" value="" id="flexCheckDefault">
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
                            <a class="" href="{{URL('md-booking-payment-succ-page')}}" >
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
    </div>
    <div class="md-food-view-footer">
        <img src="{{ 'front/assets/img/appScreenFooter.png' }}" alt="" class="footer-image mt-5">
    </div>
    </div>
@endsection
