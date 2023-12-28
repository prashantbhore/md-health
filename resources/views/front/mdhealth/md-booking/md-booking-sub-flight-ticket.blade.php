@extends('front.layout.layout')
@section('content')
    <div>
        <div class="container text-center mt-5 mb-5">
            <h6 class="reservation-p6" style="text-align: center">Payment Details</h6>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-8 mx-4">
                    <div class="row shadow-lg p-2 mb-3 bg-body rounded">
                        <div class="col">
                            <p class="border-bottom md-booking-search-p6">Contact Details</p>
                            <form class="row g-3">
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label vehicle-p3">*E-mail Address</label>
                                    <input type="email" class="form-control flight-detail-form-height" id="inputEmail4"
                                        placeholder="Your e-mail address">
                                </div>
                                <div class="col-md-6 ">
                                    <label for="inputPassword4" class="form-label vehicle-p3">*Mobile Phone</label>
                                    <div class="d-flex form-control flight-detail-form-height">
                                        <select class="flight-ticket-select1" id="autoSizingSelect">
                                            <option selected>+91</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                        <input type="text" class="flight-ticket-input1" id="inputPassword4"
                                            placeholder="Mobile Phone Number">
                                    </div>
                                </div>
                            </form>
                            <p class="flight-detail-form-p1 mt-4">*We will send you your fight and ticket information via
                                e-mail free SMS.</p>
                        </div>
                    </div>
                    <div class="row shadow-lg p-2 mb-3 bg-body rounded">
                        {{-- <form class="row g-3"> --}}
                        <div class="border-bottom d-flex justify-content-between align-items-center">
                            <p class=" md-booking-search-p6">1. Adult</p>
                            <a data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false"
                                aria-controls="collapseExample">
                                View all details
                            </a>
                        </div>
                        <form class="row g-3 collapse" id="collapseExample1">
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label vehicle-p3">*First Name</label>
                                <input type="email" class="form-control flight-detail-form-height" id="inputEmail4"
                                    placeholder="First Name">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label vehicle-p3">*Last Name</label>
                                <input type="email" class="form-control flight-detail-form-height" id="inputEmail4"
                                    placeholder="Last Name">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label vehicle-p3">*Birth Date</label>
                                <div class="d-flex gap-2">
                                    <select class="form-select flight-detail-form-height" id="autoSizingSelect">
                                        <option selected>DD</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select flight-detail-form-height" id="autoSizingSelect">
                                        <option selected>MM</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select flight-detail-form-height" id="autoSizingSelect">
                                        <option selected>YYYY</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label vehicle-p3">*TC ID Number</label>
                                <input type="email" class="form-control flight-detail-form-height" id="inputEmail4"
                                    placeholder="TC ID Number">
                                <p class="text-end">
                                    <input class="form-check-input reserv-check" type="checkbox" value=""
                                        id="flexCheckDefault">
                                    <label class="form-check-label flight-detail-form-p2" for="flexCheckDefault">
                                        Not a Turkish Citizen
                                    </label>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label vehicle-p3">*Gender</label>
                                <select class="form-select flight-detail-form-height" id="autoSizingSelect">
                                    <option selected>Male</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <p class="flight-detail-form-p2 mt-4"> <span class="mx-1 ">Allowed Luggage
                                        Capacity</span>
                                    <span class="">
                                        <img src="{{ 'front/assets/img/mdBookings/suitcase.png' }}" alt="">
                                    </span>
                                    <span class="">1 X 15KG</span>
                                </p>
                            </div>
                        </form>
                    </div>
                    <div class="row shadow-lg p-2 mb-3 bg-body rounded">
                        <div class="col border-bottom d-flex justify-content-between align-items-center">
                            <p class="m md-booking-search-p6">2. Adult</p>
                            <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                                aria-controls="collapseExample">
                                View all details
                            </a>
                        </div>
                        <form class="row g-3 collapse" id="collapseExample">
                            {{-- <p class="border-bottom md-booking-search-p6">2. Adult</p> --}}
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label vehicle-p3">*First Name</label>
                                <input type="email" class="form-control flight-detail-form-height" id="inputEmail4"
                                    placeholder="First Name">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label vehicle-p3">*Last Name</label>
                                <input type="email" class="form-control flight-detail-form-height" id="inputEmail4"
                                    placeholder="Last Name">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label vehicle-p3">*Birth Date</label>
                                <div class="d-flex gap-2">
                                    <select class="form-select flight-detail-form-height" id="autoSizingSelect">
                                        <option selected>DD</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select flight-detail-form-height" id="autoSizingSelect">
                                        <option selected>MM</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select flight-detail-form-height" id="autoSizingSelect">
                                        <option selected>YYYY</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label vehicle-p3">*TC ID Number</label>
                                <input type="email" class="form-control flight-detail-form-height" id="inputEmail4"
                                    placeholder="TC ID Number">
                                <p class="text-end">
                                    <input class="form-check-input reserv-check" type="checkbox" value=""
                                        id="flexCheckDefault">
                                    <label class="form-check-label flight-detail-form-p2" for="flexCheckDefault">
                                        Not a Turkish Citizen
                                    </label>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label vehicle-p3">*Gender</label>
                                <select class="form-select flight-detail-form-height" id="autoSizingSelect">
                                    <option selected>Male</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <p class="flight-detail-form-p2 mt-4"> <span class="mx-1 ">Allowed Luggage
                                        Capacity</span>
                                    <span class="">
                                        <img src="{{ 'front/assets/img/mdBookings/suitcase.png' }}" alt="">
                                    </span>
                                    <span class="">1 X 15KG</span>
                                </p>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="row">
                        <button class="btn btn-search-pill-reservation1" style="width:100%">Continue Payment Page</button>
                    </div> --}}
                </div>
                <div class="col h-75 text-center">
                    <div class="row shadow-lg  bg-body rounded p-2 mb-3">
                        <div class="d-flex justify-content-between m-0">
                            <p class="m-0 md-booking-search-p3">2 Adult</p>
                            <p class="m-0 vehicle-p4">2,4000.00$</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="md-booking-search-p3">Luggage 15KG</p>
                            <p class="md-booking-search-p2" style="color: #4CDB06">FREE</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="md-booking-search-p2" style="color: #4CDB06">TOTAL PRICE</p>
                            <p class="md-booking-search-p2">2,4000.00$</p>
                        </div>
                    </div>
                    <div class="row shadow-lg  bg-body rounded p-2">
                        <div class="txt-center">
                            <h4 class="flight-detail-form-p5">FLIGHT INFORMATION</h4>
                            <p class="md-booking-search-p3">Via</p>
                            <div class="">
                                <img src="{{ 'front/assets/img/mdBookings/airlinesLogo.png' }}" alt="">
                            </div>
                            <div class="mt-2">
                                <p class="m-0 md-booking-search-p2 m-0" style="color: #9B9B9B">Departure</p>
                                <p class="m-0 md-booking-search-p3 m-0" style="color: #9B9B9B">12 December 2023, Thursday
                                </p>
                                <p class="m-0 md-booking-search-p3 m-0">Skockholm Airport</p>
                                <div class="d-flex justify-content-center align-items-center m-0">
                                    <p class="flight-detail-form-p3 m-0">18:20</p>
                                </div>

                                <p class="m-0 md-booking-search-p4" style="color: #000000">ARN</p>
                                <div class="d-flex justify-content-center align-items-center">
                                    <p class="flight-detail-form-p4 m-0"></p>
                                </div>
                                <p class="m-0">
                                    <img src="{{ 'front/assets/img/mdBookings/fa6-solid_plane.png' }}" alt="">
                                </p>
                                <p class="m-0 md-booking-search-p4" style="color: #000000">IST</p>
                                <p class="m-0 md-booking-search-p3">Instanbul Airport</p>
                                <div class="d-flex justify-content-center align-items-center m-0">
                                    <p class="flight-detail-form-p3 m-0" style="background-color: #F31D1D;color:white ">
                                        20:30
                                    </p>
                                </div>
                                <p class="m-0 md-booking-search-p3" style="color: #9B9B9B">12 December 2023, Thursday</p>
                                <p class="m-0 md-booking-search-p2" style="color: #9B9B9B">Arrial</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <h5 class="flight-detail-form-p6"><ins>Change Fligh</ins>t</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container shadow-lg p-5 mb-3 mt-5 bg-body rounde">
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
        <div class="md-food-view-footer">
            <img src="{{ 'front/assets/img/appScreenFooter.png' }}" alt="" class="footer-image mt-5">
        </div>
    </div>
@endsection
@section('script')
    <script>
        var myCollapsible = document.getElementById('collapseExample1')
        var myCollapsible1 = document.getElementById('collapseExample')
        var bsCollapse = new bootstrap.Collapse(myCollapsible, {
            toggle: false
        })
        myCollapsible1.addEventListener('hidden.bs.collapse', function() {
            toggle: false
            // do something...
        })
    </script>
@endsection
