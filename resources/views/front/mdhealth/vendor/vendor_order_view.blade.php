@extends('front.layout.layout2')
@section("content")

<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="row">
            <div class="col-md-3">
                @include('front.includes.sidebar-vendor')
            </div>
            <div class="col-md-9">
                <div class="card mb-4">
                    <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                        Order ID: #MD3726378
                        <a href="{{url('vendor-sales')}}" class="d-flex align-items-center gap-1 text-decoration-none text-dark">
                            <img src="{{asset('front/assets/img/backPage.png')}}" alt="">
                            <p class="mb-0">Back</p>
                        </a>
                    </h5>
                    <div class="card-body">

                        <div class="order-card-div mt-3">
                            <div class="treatment-card df-start w-100 mb-3">
                                <div class="row card-row align-items-center justify-content-evenly">
                                    <div class="col-md-1 df-center ms-3">
                                        <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="">
                                    </div>
                                    <div class="col-md-6 justify-content-start ps-0">
                                        <div class="trmt-card-body">
                                            <h5 class="dashboard-card-title fw-200">Evony Medical Mask 50 Pc.</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                        <div class="trmt-card-footer">
                                            <h6 class="dbrd-order-total">X 1</h6>
                                            <h6 class="fw-700">299,39 ₺</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="treatment-card df-start w-100 mb-3">
                                <div class="row card-row align-items-center justify-content-evenly">
                                    <div class="col-md-1 df-center ms-3">
                                        <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="">
                                    </div>
                                    <div class="col-md-6 justify-content-start ps-0">
                                        <div class="trmt-card-body">
                                            <h5 class="dashboard-card-title fw-200">Braun Electronic Shaver</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                        <div class="trmt-card-footer">
                                            <h6 class="dbrd-order-total">X 1</h6>
                                            <h6 class="fw-700">299,39 ₺</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="card-header d-flex align-items-center justify-content-end mb-3 pt-0">
                                <span class="text-green">TOTAL : </span>
                                1.598, 78 ₺
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
                                    <h6 class="section-heading">Status
                                        <span class="active">Completed</span>
                                    </h6>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group d-flex flex-column mb-3">
                                        <label class="form-label">Cargo Tracking Number</label>
                                        <select name="" id="">
                                            <option value="">Cargo Company</option>
                                            <option value="">Cargo Company 2</option>
                                            <option value="">Cargo Company 3</option>
                                            <option value="">Cargo Company 4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" id="productname" aria-describedby="productname" placeholder="Write Here">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group d-flex flex-column mb-3">
                                        <select name="" id="">
                                            <option value="">Completed</option>
                                            <option value="">Pending</option>
                                            <option value="">Inprogress</option>
                                            <option value="">Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <a href="javascript:void(0);" class="order-completed-btn">Completed</a>
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
@endsection