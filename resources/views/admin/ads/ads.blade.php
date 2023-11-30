@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="container2 pb-5">
        <div class="page-title">Ads & Promo</div>
        <div class="row top-cards">
            <div class="col-md-5">
                <div class="card card-details ads">
                    <div class="card-body">
                        <div class="card-title">New Promo</div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="*Choose Page" class="mb-2">*Choose Page</label>
                                <select name="" id="choosePage" class="form-select">
                                    <option value="" selected disabled>MDhealth Home Page Advertise Area</option>
                                    <option value="">Home Service Advertise Area</option>
                                    <option value="">MDfood Advertise Area</option>
                                    <option value="">MDbooking Advertise Area</option>
                                    <option value="">MDbooking Flight Advertise Area</option>
                                    <option value="">MDbooking Hotel Advertise Area</option>
                                    <option value="">MDbooking Vehicle Advertise Area</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="MDhealth URL" class="mb-2">MDhealth URL</label>
                                <input type="text" class="form-control" placeholder="URL">

                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="*Upload Advertise" class="mb-2 d-block">*Upload Advertise</label>
                                <!-- <img src="{{URL::asset('admin/assets/img/uploadHere.png')}}" alt=""> -->
                                <div class="d-flex align-items-end gap-2">
                                    <div class="image-upload">
                                        <label for="file-input" style="cursor:pointer">
                                            <img src="{{URL::asset('admin/assets/img/uploadHere.png')}}" />
                                        </label>

                                        <input id="file-input" type="file" />
                                    </div>
                                    <p class="upload-file-text">*Please upload 1066x223px picture.</p>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="*Time" class="mb-2 d-block">*Time</label>
                                <input type="text" name="daterange" value="01/01/2018 - 01/15/2018" class="form-control" />


                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="d-flex flex-wrap gap-3 ">
                                    <button type="submit" class="btn md-btn save-btn">Publish Promo</button>
                                    <button type="submit" class="btn md-btn deactivate-btn">Schedule Promo</button>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 promo">
                <div class="card card-details mb-3">
                    <div class="card-body">
                        <p class="card-title mb-3">Featured Request</p>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="card shadow-none">
                                    <div class="card-body d-flex align-items-center w-full justify-content-between" style="background: #F6F6F6;">
                                        <div class="d-flex gap-2">
                                            <img src="{{URL::asset('admin/assets/img/productsPic.png')}}" alt="">
                                            <div class="d-flex flex-column">
                                                <h4 class="mb-0">Hearth Valve Replacement Surgery</h4>
                                                <p class="fw-bold">Vendor :<span class="fw-light">evony medikal</span></p>
                                            </div>
                                        </div>
                                        <div class="in-progress">Pending</div>

                                        <div class="d-flex gap-2 actionText">
                                            <div class="d-flex flex-column gap-1">
                                                <a href="#">
                                                    <img src="{{URL::asset('admin/assets/img/view.png')}}" alt="">
                                                </a>
                                                <p>View</p>
                                            </div>
                                            <div class="d-flex flex-column gap-1">
                                                <a href="#">
                                                    <img src="{{URL::asset('admin/assets/img/accept.png')}}" alt="">
                                                </a>
                                                <p>Accept</p>
                                            </div>
                                            <div class="d-flex flex-column gap-1">
                                                <a href="#">
                                                    <img src="{{URL::asset('admin/assets/img/reject.png')}}" alt="">
                                                </a>
                                                <p>Reject</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="card shadow-none">
                                    <div class="card-body d-flex align-items-center w-full justify-content-between" style="background: #F6F6F6;">
                                        <div class="d-flex gap-2">
                                            <img src="{{URL::asset('admin/assets/img/productsPic.png')}}" alt="">
                                            <div class="d-flex flex-column">
                                                <h4 class="mb-0">Hearth Valve Replacement Surgery</h4>
                                                <p class="fw-bold">Vendor :<span class="fw-light">evony medikal</span></p>
                                            </div>
                                        </div>
                                        <div class="in-progress">Pending</div>

                                        <div class="d-flex gap-2 actionText">
                                            <div class="d-flex flex-column gap-1">
                                                <a href="#">
                                                    <img src="{{URL::asset('admin/assets/img/view.png')}}" alt="">
                                                </a>
                                                <p>View</p>
                                            </div>
                                            <div class="d-flex flex-column gap-1">
                                                <a href="#">
                                                    <img src="{{URL::asset('admin/assets/img/accept.png')}}" alt="">
                                                </a>
                                                <p>Accept</p>
                                            </div>
                                            <div class="d-flex flex-column gap-1">
                                                <a href="#">
                                                    <img src="{{URL::asset('admin/assets/img/reject.png')}}" alt="">
                                                </a>
                                                <p>Reject</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="card card-details">
                    <div class="card-body">
                        <div class="mb-3 d-flex align-items-center justify-content-between w-full filters">
                            <p class="card-title">Featured History</p>
                            <select class="form-select form-select-sm w-25">
                                <option selected>All Featured</option>
                                <option value="1">Active Orders</option>
                                <option value="2">Completed Orders</option>
                                <option value="3">Denied Orders</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="card shadow-none">
                                    <div class="card-body d-flex align-items-center w-full justify-content-between" style="background: #F6F6F6;">
                                        <div class="d-flex gap-2">
                                            <img src="{{URL::asset('admin/assets/img/productsPic.png')}}" alt="">
                                            <div class="d-flex flex-column">
                                                <h4 class="mb-0">Product ID: #MD3726378</h4>
                                                <p class="fw-bold">Vendor :<span class="fw-light">evony medikal</span></p>
                                            </div>
                                        </div>
                                        <div class="completed">Active</div>

                                        <div class="d-flex gap-2 actionText">
                                            <div class="d-flex flex-column gap-1">
                                                <a href="#">
                                                    <img src="{{URL::asset('admin/assets/img/view.png')}}" alt="">
                                                </a>
                                                <p>View</p>
                                            </div>

                                            <div class="d-flex flex-column gap-1">
                                                <a href="#">
                                                    <img src="{{URL::asset('admin/assets/img/reject.png')}}" alt="">
                                                </a>
                                                <p>Reject</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="card shadow-none">
                                    <div class="card-body d-flex align-items-center w-full justify-content-between" style="background: #F6F6F6;">
                                        <div class="d-flex gap-2">
                                            <img src="{{URL::asset('admin/assets/img/productsPic.png')}}" alt="">
                                            <div class="d-flex flex-column">
                                                <h4 class="mb-0">Product ID: #MD3726378</h4>
                                                <p class="fw-bold">Vendor :<span class="fw-light">evony medikal</span></p>
                                            </div>
                                        </div>
                                        <div class="deleted">Deactive</div>

                                        <div class="d-flex gap-2 actionText">
                                            <div class="d-flex flex-column gap-1">
                                                <a href="#">
                                                    <img src="{{URL::asset('admin/assets/img/renew.png')}}" alt="">
                                                </a>
                                                <p>View</p>
                                            </div>

                                            <div class="d-flex flex-column gap-1">
                                                <a href="#">
                                                    <img src="{{URL::asset('admin/assets/img/reject.png')}}" alt="">
                                                </a>
                                                <p>Reject</p>
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
</section>
@endsection
@section('script')
<script>
    $(".adsLi").addClass("activeClass");
    $(".ads").addClass("md-active");
    $('.drp-buttons .applyBtn').removeClass('btn-primary');
</script>
<script>
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            applyButtonClasses: "save-btn",
            showISOWeekNumbers: true
        })
    });
</script>

@endsection