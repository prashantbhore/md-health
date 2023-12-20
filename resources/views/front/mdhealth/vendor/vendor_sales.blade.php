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
                        <span>Sale</span>
                        <img src="{{asset('front/assets/img/GoldMember.svg')}}" alt="">
                    </h5>

                        <div class="card-body">
                        <div class="tab-div vendor-sales-tab">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="saleactive-tab" data-bs-toggle="tab" data-bs-target="#saleactive" type="button"
                                        role="tab" aria-controls="saleactive" aria-selected="true">Active</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="sale-completed-tab" data-bs-toggle="tab"
                                        data-bs-target="#sale-completed" type="button" role="tab" aria-controls="sale-completed"
                                        aria-selected="false">Completed</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="sale-cancelled-tab" data-bs-toggle="tab"
                                        data-bs-target="#sale-cancelled" type="button" role="tab" aria-controls="sale-cancelled"
                                        aria-selected="false">Cancelled</button>
                                </li>
                            </ul>

                            <div class="filter-div">
                                <div class="search-div">
                                    <input type="text" placeholder="Search">
                                </div>
                                <div class="list-div">
                                    <select name="" id="">
                                        <option value="">All Orders</option>
                                        <option value="">In Progress</option>
                                        <option value="">Pending</option>
                                        <option value="">Shipping</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Tab panes -->
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="saleactive" role="tabpanel" aria-labelledby="saleactive-tab">
                                    <div class="treatment-card df-start w-100 mb-3">
                                        <div class="row card-row align-items-center">
                                            <div class="col-md-2 df-center px-0">
                                                <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="">
                                            </div>
                                            <div class="col-md-6 justify-content-start ps-0">
                                                <div class="trmt-card-body">
                                                    <h5 class="dashboard-card-title">Ali Danish <span class="in-progress">In Progress</span></h5>
                                                    <h5 class="mb-0 fw-500">Product Name</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                                <div class="trmt-card-footer">
                                                    <h6 class="dbrd-order-total"><strong>Total Price:</strong> <span class="">34.473,98</span></h6>
                                                    <h6 class="fw-700">Order ID: #MD3726378</h6>
                                                    <a href="{{url('vendor-order-view')}}" class="mt-auto view-detail-btn"><strong>View Details</strong></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="treatment-card df-start w-100 mb-3">
                                        <div class="row card-row align-items-center">
                                            <div class="col-md-2 df-center px-0">
                                                <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="">
                                            </div>
                                            <div class="col-md-6 justify-content-start ps-0">
                                                <div class="trmt-card-body">
                                                    <h5 class="dashboard-card-title">Ali Danish <span class="pending">Pending</span></h5>
                                                    <h5 class="mb-0 fw-500">Heart Valve Replacement Surgery</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                                <div class="trmt-card-footer">
                                                    <h6 class="dbrd-order-total"><strong>Total Price:</strong> <span class="">34.473,98 ₺</span></h6>
                                                    <h6 class="fw-700">Order ID: #MD3726378</h6>
                                                    <a href="{{url('treatment-order-details')}}" class="mt-auto view-detail-btn"><strong>View Details</strong></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="treatment-card df-start w-100 mb-3">
                                        <div class="row card-row align-items-center">
                                            <div class="col-md-2 df-center px-0">
                                                <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="">
                                            </div>
                                            <div class="col-md-6 justify-content-start ps-0">
                                                <div class="trmt-card-body">
                                                    <h5 class="dashboard-card-title">Ali Danish <span class="pending">Pending</span></h5>
                                                    <h5 class="mb-0 fw-500">Heart Valve Replacement Surgery</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                                <div class="trmt-card-footer">
                                                    <h6 class="dbrd-order-total"><strong>Total Price:</strong> <span class="">34.473,98 ₺</span></h6>
                                                    <h6 class="fw-700">Order ID: #MD3726378</h6>
                                                    <a href="{{url('treatment-order-details')}}" class="mt-auto view-detail-btn"><strong>View Details</strong></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="treatment-card df-start w-100 mb-3">
                                        <div class="row card-row align-items-center">
                                            <div class="col-md-2 df-center px-0">
                                                <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="">
                                            </div>
                                            <div class="col-md-6 justify-content-start ps-0">
                                                <div class="trmt-card-body">
                                                    <h5 class="dashboard-card-title">Ali Danish <span class="pending">Pending</span></h5>
                                                    <h5 class="mb-0 fw-500">Heart Valve Replacement Surgery</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                                <div class="trmt-card-footer">
                                                    <h6 class="dbrd-order-total"><strong>Total Price:</strong> <span class="">34.473,98 ₺</span></h6>
                                                    <h6 class="fw-700">Order ID: #MD3726378</h6>
                                                    <a href="{{url('treatment-order-details')}}" class="mt-auto view-detail-btn"><strong>View Details</strong></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="treatment-card df-start w-100 mb-3">
                                        <div class="row card-row align-items-center">
                                            <div class="col-md-2 df-center px-0">
                                                <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="">
                                            </div>
                                            <div class="col-md-6 justify-content-start ps-0">
                                                <div class="trmt-card-body">
                                                    <h5 class="dashboard-card-title">Ali Danish <span class="pending">Pending</span></h5>
                                                    <h5 class="mb-0 fw-500">Heart Valve Replacement Surgery</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                                <div class="trmt-card-footer">
                                                    <h6 class="dbrd-order-total"><strong>Total Price:</strong> <span class="">34.473,98 ₺</span></h6>
                                                    <h6 class="fw-700">Order ID: #MD3726378</h6>
                                                    <a href="{{url('treatment-order-details')}}" class="mt-auto view-detail-btn"><strong>View Details</strong></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="sale-completed" role="tabpanel" aria-labelledby="sale-completed-tab">
                                    <div class="treatment-card df-start w-100 mb-3">
                                        <div class="row card-row align-items-center">
                                            <div class="col-md-2 df-center px-0">
                                                <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="">
                                            </div>
                                            <div class="col-md-6 justify-content-start ps-0">
                                                <div class="trmt-card-body">
                                                    <h5 class="dashboard-card-title">Ali Danish <span class="active">Completed</span></h5>
                                                    <h5 class="mb-0 fw-500">Product Name</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                                <div class="trmt-card-footer">
                                                    <h6 class="dbrd-order-total"><strong>Total Price:</strong> <span class="">34.473,98</span></h6>
                                                    <h6 class="fw-700">Order ID: #MD3726378</h6>
                                                    <a href="{{url('treatment-order-details')}}" class="mt-auto view-detail-btn"><strong>View Details</strong></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="sale-cancelled" role="tabpanel" aria-labelledby="sale-cancelled-tab">
                                    <h1>Shubham 2</h1>
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