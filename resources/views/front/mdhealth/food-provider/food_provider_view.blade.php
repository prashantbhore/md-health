@extends('front.layout.layout2')
@section("content")

<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="row">
            <div class="col-md-3">
                @include('front.includes.sidebar-food-provider')
            </div>
            <div class="col-md-9">
                <div class="card mb-4">
                    <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                        Order ID: #MD3726378
                        <a href="{{url('food-provider-sales')}}" class="d-flex align-items-center gap-1 text-decoration-none text-dark">
                            <img src="{{asset('front/assets/img/backPage.png')}}" alt="">
                            <p class="mb-0">Back</p>
                        </a>
                    </h5>
                    <div class="card-body">

                        <div class="order-card-div mt-3 order-view-card-div">
                            <div class="treatment-card df-start w-100 mb-3 px-4">
                                <div class="row card-row align-items-center justify-content-evenly ">
                                    <div class="col-md-8 df-center d-flex flex-column align-items-start justify-content-start">
                                        <div class="card-header-div d-flex align-items-center gap-3 mb-2">
                                            <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="">
                                            <div class="trmt-card-body">
                                                <h5 class="dashboard-card-title fw-200">Food Package</h5>
                                            </div>
                                        </div>
                                        <div class="product-details-div">
                                            <p><span class="green-colored-text">Featured : </span> 1500 kcal, Menu 1</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                        <div class="trmt-card-footer">
                                            <h6 class="dbrd-order-total">X 1</h6>
                                            <h6 class="fw-700">299,39 ₺</h6>
                                        </div>
                                        <button class="menu-detail-btn">
                                            <i class="fa fa-chevron-down"></i> Menu Details
                                        </button>
                                    </div>
                                </div>
                                <div class="view-menu-div mt-4">
                                    <div class="view-menu mb-4">
                                        <h6 class="green-colored-text">Day 1 - Menu</h6>
                                        <p>Chicken Soup</p>
                                        <p>Boiled Vegetables</p>
                                        <p>Salad</p>
                                    </div>
                                    <div class="view-menu mb-4">
                                        <h6 class="green-colored-text">Day 1 - Menu</h6>
                                        <p>Chicken Soup</p>
                                        <p>Boiled Vegetables</p>
                                        <p>Salad</p>
                                    </div>
                                </div>
                            </div>
                            <h5 class="card-header d-flex align-items-center justify-content-end mb-3 pt-0 gap-2">
                                <span class="text-green">TOTAL : </span>  1.598, 78 ₺
                            </h5>
                        </div>
                        <div class="py-5">
                            <div class="row card-details">
                                <h6 class="section-heading">Customer Details</h6>
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">First Name</label>
                                    <p>Ali</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Last Name</label>
                                    <p>Danish</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="contactNo">Contact Number</label>
                                    <p>+44 4444 44 44</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email">E-mail</label>
                                    <p>ali.danish@mdhealth.io</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="address">Address</label>
                                    <p class="d-flex flex-column gap-3">
                                        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</span>
                                        <span>City / Country</span>
                                    </p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="address">Invoice Address</label>
                                    <p class="d-flex flex-column gap-3">
                                        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</span>
                                        <span>City / Country</span>
                                    </p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <h6 class="section-heading">Payment History</h6>
                                    <h4>First Payment - 20%</h4>
                                    <h3><b>Payment Date: 12/02/2023</b></h3>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <h6 class="section-heading">Payment Info</h6>
                                    <h5>via Credit / Debit Card</h5>
                                    <h3><b>3D Secure</b></h3>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-12 mb-3 mt-5">
                                    <h6 class="section-heading d-flex gap-4 align-items-center">Subscription:
                                        <div class="green-colored-text heading-date">Start Date <span class="text-dark">12/12/2023</span></div>
                                        <div class="green-colored-text heading-date">Start Date <span class="text-dark">12/12/2023</span></div>
                                    </h6>

                                    <div class="remaining-time-div">
                                        <p>Remaining Time</p>
                                        <div class="bar-graph">
                                            <div data-pourcent="10">
                                                <span class="remaining-text">6 Days</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-12 mb-3 mt-5">
                                    <h6 class="section-heading">Status
                                        <span class="in-progress">In Progress</span>
                                    </h6>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="green-colored-text heading-date fw-600">12/12/2023 <span class="text-dark fw-600">- Today</span></div>
                                    <div class="form-group d-flex flex-column mb-3">
                                        <select name="" id="">
                                            <option value="">Completed</option>
                                            <option value="">In Progress</option>
                                            <option value="">Pending</option>
                                            <option value="">Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group d-flex flex-column mb-3">
                                        <label class="form-label text-dark">13/12/2023</label>
                                        <select name="" id="">
                                            <option value="">Inprogress</option>
                                            <option value="">Completed</option>
                                            <option value="">Pending</option>
                                            <option value="">Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group d-flex flex-column mb-3">
                                        <label class="form-label text-dark">14/12/2023</label>
                                        <select name="" id="">
                                            <option value="">Pending</option>
                                            <option value="">Inprogress</option>
                                            <option value="">Completed</option>
                                            <option value="">Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group d-flex flex-column mb-3">
                                        <label class="form-label text-dark">15/12/2023</label>
                                        <select name="" id="">
                                            <option value="">Pending</option>
                                            <option value="">Inprogress</option>
                                            <option value="">Completed</option>
                                            <option value="">Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group d-flex flex-column mb-3">
                                        <label class="form-label text-dark">16/12/2023</label>
                                        <select name="" id="">
                                            <option value="">Pending</option>
                                            <option value="">Inprogress</option>
                                            <option value="">Completed</option>
                                            <option value="">Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group d-flex flex-column mb-3">
                                        <label class="form-label text-dark">17/12/2023</label>
                                        <select name="" id="">
                                            <option value="">Pending</option>
                                            <option value="">Inprogress</option>
                                            <option value="">Completed</option>
                                            <option value="">Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group d-flex flex-column mb-3">
                                        <label class="form-label text-dark">18/12/2023</label>
                                        <select name="" id="">
                                            <option value="">Pending</option>
                                            <option value="">Inprogress</option>
                                            <option value="">Completed</option>
                                            <option value="">Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group d-flex flex-column mb-3">
                                        <label class="form-label text-dark">19/12/2023</label>
                                        <select name="" id="">
                                            <option value="">Pending</option>
                                            <option value="">Inprogress</option>
                                            <option value="">Completed</option>
                                            <option value="">Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <a href="javascript:void(0);" class="order-completed-btn bg-green">Save Cahnges</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(".mpSalesLi").addClass("activeClass");
    $(".mpSales").addClass("md-active");
</script>

<script>
        $(".view-menu-div").hide();
        $("button").click(function(){
            $(".view-menu-div").toggle(200);
            $(".fa").toggleClass("fa-chevron-up").fadeIn(200);
            $(".fa").toggleClass("fa-chevron-down");
        });
</script>
@endsection