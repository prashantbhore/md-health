@extends('front.layout.layout2')
@section("content")
<style>
    .reports-div {
        border-bottom: 1px solid #A5A5A5;
        padding-bottom: 15px;
        margin-bottom: 20px;
    }
    .form-group input.form-control {
        color: #000 !important;
    }
    .form-group .prev-img-div img {
        height: 150px;
        width: 150px;
        object-fit: contain;
        margin-top: 15px;
    }
</style>
<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="row">
            <div class="col-md-3">
                @include('front.includes.sidebar')
            </div>
            <div class="col-md-9">
                <div class="card mb-4">
                    <div class="form-div">
                        <h5 class="card-header d-flex align-items-center justify-content-between mb-4">
                            <span>Reports</span>
                            <img src="{{asset('front/assets/img/GoldMember.svg')}}" alt="">
                        </h5>
                        <div class="card-body mb-3">

                            <div class="reports-div section-heading-div">
                                <h6 class="section-heading">Add New Reports</h6>
                            </div>
                            
                            <div class="form-group  mb-3 ">
                                <label class="form-label">Report Title</label>
                                <input type="text" class="form-control" placeholder="Write Here Please">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Enter Password</label>
                                <input type="text" class="form-control" placeholder="Password@2023">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Your Personnel Full Name</label>
                                <input type="text" class="form-control" placeholder="Full Name">
                            </div>

                            <div class="form-group d-flex flex-column mb-5">
                                <label class="form-label">Patient</label>
                                <select name="" id="">
                                    <option value="">Choose Patient</option>
                                    <option value="">Patient 1</option>
                                    <option value="">Patient 2</option>
                                    <option value="">Patient 3</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Hotel Picture</label>
                                <div class="form-group">
                                    <input type="file" class="form-control text-dark">
                                </div>
                                <div class="prev-img-div">
                                    <img src="front/assets/img/homepage/img-2.jpg" alt="image">
                                </div>
                            </div>

                            <div class="section-btns mb-5">
                                <a href="javascript:void(0);" class="black-plate bg-black text-white fw-700 w-100">Upload Reports</a>
                            </div>

                            <div class="white-plate d-flex align-items-center mb-3 border-0 bg-f6">
                                <p class="mb-0 fsb-1">Your Personnels</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="form-div">
                        <h5 class="card-header d-flex align-items-center justify-content-between mb-4">
                            <span>Reports</span>
                            <img src="{{asset('front/assets/img/GoldMember.svg')}}" alt="">
                        </h5>
                        <div class="card-body">

                            
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
    $(".mpReportsLi").addClass("activeClass");
    $(".mpReports").addClass("md-active");
</script>
@endsection