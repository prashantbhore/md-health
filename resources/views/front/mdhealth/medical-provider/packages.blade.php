@extends('front.layout.layout2')
@section("content")

<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="row">
            <div class="col-md-3">
            @include('front.includes.sidebar')
            </div>
            <div class="col-md-9">
                <div class="card mb-4">
                    <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                        <span>Packages</span>
                        <img src="{{asset('front/assets/img/GoldMember.svg')}}" alt="">
                    </h5>
                    <div class="card-body">
                        <div class="white-plate bg-white d-flex align-items-center justify-content-between mb-3">
                            <p class="mb-0 fsb-2 fw-600">Active Packages</p>
                            <h3 class="mb-0 fsb-2 fw-600">2</h3>
                        </div>
                        <a href="{{url('medical-packages-view')}}" class="black-plate bg-black d-flex align-items-center justify-content-between mb-3">
                            <p class="mb-0 fsb-2 fw-600">Add New Packages</p>
                            <h3 class="mb-0 fsb-2 fw-600">+</h3>
                        </a>
                        <div class="green-plate bg-green text-green d-flex align-items-center justify-content-between mb-3">
                            <p class="mb-0 fsb-2 fw-600">Create Campaign</p>
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
                                        <option value="">List for Date</option>
                                        <option value="">List for Stars</option>
                                        <option value="">List for Price</option>
                                        <option value="">List for Distance</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Tab panes -->
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
                                    <div class="treatment-card df-start w-100 mb-3">
                                        <div class="row card-row align-items-center">
                                            <div class="col-md-2 df-center px-0">
                                                <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="">
                                            </div>
                                            <div class="col-md-6 justify-content-start ps-0">
                                                <div class="trmt-card-body">
                                                    <h5 class="dashboard-card-title fw-600">Package No: #MD3726378<span class="active">Active</span></h5>
                                                    <h5 class="mb-0 fw-500">Heart Valve Replacement Package</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                                <div class="trmt-card-footer footer-btns">
                                                    <a href="{{url('medical-packages-view')}}" class="view-btn"><i class="fa fa-eye"></i>
                                                        View </a>
                                                    <a href="" class="close-btn"><i class="fa fa-close"></i>
                                                        Deactivate </a>
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
                                                    <h5 class="dashboard-card-title fw-600">Package No: #MD3726378<span class="active">Active</span></h5>
                                                    <h5 class="mb-0 fw-500">Heart Valve Replacement Package</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                                <div class="trmt-card-footer footer-btns">
                                                    <a href="{{url('medical-packages-view')}}" class="view-btn"><i class="fa fa-eye"></i>
                                                        View </a>
                                                    <a href="" class="close-btn"><i class="fa fa-close"></i>
                                                        Deactivate </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="medical-provider" role="tabpanel" aria-labelledby="medical-provider-tab">
                                    <div class="treatment-card df-start w-100 mb-3">
                                        <div class="row card-row align-items-center">
                                            <div class="col-md-2 df-center px-0">
                                                <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="">
                                            </div>
                                            <div class="col-md-6 justify-content-start ps-0">
                                                <div class="trmt-card-body">
                                                    <h5 class="dashboard-card-title fw-600">Package No: #MD3726378<span class="cancel">Deactive</span></h5>
                                                    <h5 class="mb-0 fw-500">Heart Valve Replacement Package</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                                <div class="trmt-card-footer footer-btns">
                                                    <a href="{{url('medical-packages-view')}}" class="view-btn"><i class="fa fa-eye"></i>
                                                        View </a>
                                                    <a href="" class="close-btn"><i class="fa fa-close"></i>
                                                        Deactivate </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    $(".mpPackagesLi").addClass("activeClass");
    $(".mpPackages").addClass("md-active");
</script>
@endsection