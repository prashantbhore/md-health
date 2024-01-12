@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="container2 pb-5">
        <div class="page-title">Featured List</div>
        <div class="row top-cards">
           
            <div class="col-md-6 promo">
                <div class="col-md-12 card card-details mb-3">
                    <div class="card-body">
                    
                        <div class="mb-3 d-flex align-items-center justify-content-between w-full filters">
                            <p class="card-title">Pending Request</p>
                            <select class="form-select form-select-sm w-25">
                            <option selected>All Type</option>
                                <option value="1">Medical Service Provider</option>
                                <option value="2">Food Provider</option>
                                <option value="3">Product Vendor </option>
                                <option value="4">Home Service</option>
                            </select>
                        </div>

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
                
                
            </div>

            <div class="col-md-6 promo">
              
                <div class="col-md-12 card card-details">
                    <div class="card-body">
                        <div class="mb-3 d-flex align-items-center justify-content-between w-full filters">
                            <p class="card-title flex-grow-1">Featured History</p>
                            <select class="form-select form-select-sm w-25">
                            <option selected>All Type</option>
                                <option value="1">Medical Service Provider</option>
                                <option value="2">Food Provider</option>
                                <option value="3">Product Vendor </option>
                                <option value="4">Home Service</option>
                            </select>
                            <select class="form-select form-select-sm w-25 ms-3">
                            <option selected>Select Status</option>
                                <option value="1">Active</option>
                                <option value="2">Deactive</option>
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
                                                <p class="fw-bold">Vendor : <span class="fw-light">Evony Medical</span></p>
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
                                                <p class="fw-bold">Vendor : <span class="fw-light">Evony Medical</span></p>
                                            </div>
                                        </div>
                                        <div class="deleted">Deactive</div>

                                        <div class="d-flex gap-2 actionText">
                                            <div class="d-flex flex-column gap-1">
                                                <a href="#">
                                                    <img src="{{URL::asset('admin/assets/img/renew.png')}}" alt="">
                                                </a>
                                                <p>Renew</p>
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
    $(".featuredLi").addClass("activeClass");
    $(".featured").addClass("md-active");
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