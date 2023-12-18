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
                        <span>Products</span>
                        <img src="{{asset('front/assets/img/GoldMember.svg')}}" alt="">
                    </h5>
                    <div class="card-body">
                        <div class="white-plate bg-white d-flex align-items-center justify-content-between mb-3">
                            <p class="mb-0">Active Products</p>
                            <h3 class="mb-0">2</h3>
                        </div>
                        <a href="{{url('vendor-add-products')}}" class="black-plate bg-black d-flex align-items-center justify-content-between mb-3">
                            <p class="mb-0">Add New Products</p>
                            <h3 class="mb-0">+</h3>
                        </a>
                        <div class="green-plate bg-green text-green d-flex align-items-center justify-content-between mb-3">
                            <p class="mb-0">Import in bulk</p>
                            <img src="{{asset('front/assets/img/import.svg')}}" alt="">
                        </div>
                    </div>
                </div>

                <!-- RECENT TRETMENTS -->

                <div class="card">
                    <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                        Details
                    </h5>
                    <div class="card-body">
                        <div class="tab-div">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button"
                                        role="tab" aria-controls="user" aria-selected="true">Active</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="medical-provider-tab" data-bs-toggle="tab"
                                        data-bs-target="#medical-provider" type="button" role="tab" aria-controls="medical-provider"
                                        aria-selected="false">Deactive</button>
                                </li>
                            </ul>

                            <div class="filter-div">
                                <div class="search-div">
                                    <input type="text" placeholder="Search">
                                </div>
                                <div class="list-div">
                                    <select name="" id="">
                                        <option value="">List for date</option>
                                        <option value="">List for date 2</option>
                                        <option value="">List for date 3</option>
                                        <option value="">List for date 4</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Tab panes -->
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
                                    <div class="treatment-card df-start w-100 mb-3">
                                        <div class="row card-row">
                                            <div class="col-md-2 df-center px-0">
                                                <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="">
                                            </div>
                                            <div class="col-md-6 justify-content-start ps-0">
                                                <div class="trmt-card-body">
                                                    <h5 class="dashboard-card-title fw-600">Product ID: #MD3726378 <span class="active">Active</span></h5>
                                                    <h5 class="mb-0 fw-500">Product Name</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                                <div class="trmt-card-footer footer-btns">
                                                    <a href="" class="view-btn"><i class="fa fa-eye"></i>
                                                        View </a>
                                                    <a href="" class="close-btn"><i class="fa fa-close"></i>
                                                        Deactivate </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="medical-provider" role="tabpanel" aria-labelledby="medical-provider-tab">
                                    <h1>Shubham</h1>
                                </div>
                                <div class="tab-pane fade" id="vendor" role="tabpanel" aria-labelledby="vendor-tab">
                                    <h1>Shubham 2</h1>
                                </div>
                                <div class="tab-pane fade" id="home-service" role="tabpanel" aria-labelledby="home-service-tab">
                                    <h1>Shubham3</h1>
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
    $(".mpProductsLi").addClass("activeClass");
    $(".mpProducts").addClass("md-active");
</script>
@endsection