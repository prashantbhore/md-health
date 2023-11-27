@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="container2 pb-5">
        <div class="page-title">Notifications</div>
        <div class="row top-cards">
            <div class="col-md-6">
                <div class="card card-details">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="*Notifications Title" class="mb-2">*Notifications Title</label>
                                <input type="text" class="form-control" placeholder="Title">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="*Notifications Description" class="mb-2">*Notifications Description</label>
                                <textarea name="" id="" cols="30" rows="5" class="form-control" placeholder="Description"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="*Platforms" class="mb-2">*Platforms</label>
                                <div class="d-flex align-items-center gap-3 form-checks">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Android">
                                        <label class="form-check-label" for="Android">
                                            Android
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="IOS">
                                        <label class="form-check-label" for="IOS">
                                            IOS
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Web">
                                        <label class="form-check-label" for="Web">
                                            Web
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="*Target Category" class="mb-2">*Target Category</label>
                                <div class="d-flex flex-wrap align-items-center gap-3 form-checks">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="MedicalServiceProvider">
                                        <label class="form-check-label" for="MedicalServiceProvider">
                                            Medical Service Provider
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Customer">
                                        <label class="form-check-label" for="Customer">
                                            Customer
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="FoodServiceProvider">
                                        <label class="form-check-label" for="FoodServiceProvider">
                                            Food Service Provider
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="HomeServiceProvider">
                                        <label class="form-check-label" for="HomeServiceProvider">
                                            Home Service Provider
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="All">
                                        <label class="form-check-label" for="All">
                                            All
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="*Target Audience" class="mb-2">*Target Audience</label>
                                <div class="d-flex align-items-center gap-3 form-checks">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Woman">
                                        <label class="form-check-label" for="Woman">
                                            Woman
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Man">
                                        <label class="form-check-label" for="Man">
                                            Man
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="All">
                                        <label class="form-check-label" for="All">
                                            All
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="d-flex flex-wrap gap-3 ">
                                    <button type="submit" class="btn md-btn save-btn">Publish Notifications</button>
                                    <button type="submit" class="btn md-btn deactivate-btn">Schedule Notification</button>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-details" style="min-height: 621px;">
                    <div class="card-body">
                        <div class="mb-3 d-flex align-items-center justify-content-between w-full filters">
                            <p class="card-title ">Notifications History</p>
                            <select class="form-select form-select-sm w-35">
                                <option selected>All Notifications</option>
                                <option value="1"><span class="md-fw-bold">MD</span>health</option>
                                <option value="2"><span class="md-fw-bold">MD</span>shop</option>
                                <option value="3"><span class="md-fw-bold">MD</span>booking</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="card shadow-none">
                                    <div class="card-body d-flex w-full justify-content-between" style="background: #F6F6F6;">
                                        <div class="card-ls w-75">
                                            <h6 class="mb-1">Notification Name</h6>
                                            <h6 class="mb-1">Delivered: <span class="fw-light">2239</span></h6>
                                            <h6 class="mb-3">Notification Details: <span class="fw-light">Android, IOS, Woman</span></h6>
                                            <h6>Description: <span class="fw-light">Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </span></h6>
                                        </div>
                                        <div class="card-rs text-end">
                                            <div class="mb-3">
                                                <a href="#" class="text-decoration-none mb-3">
                                                    <span class="deleteCard">Delete Product</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.4" d="M12 2C17.515 2 22 6.486 22 12C22 17.514 17.515 22 12 22C6.486 22 2 17.514 2 12C2 6.486 6.486 2 12 2Z" fill="#F55C5C" />
                                                        <path d="M15.282 16H13.544L11.707 13.426L9.87 16H8.132L10.695 12.304L8.176 8.52H10.002L11.707 11.105L13.401 8.52H15.227L12.708 12.304L15.282 16Z" fill="black" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="completed w-100">On Air</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="card shadow-none">
                                    <div class="card-body d-flex w-full justify-content-between" style="background: #F6F6F6;">
                                        <div class="card-ls w-75">
                                            <h6 class="mb-1">Notification Name</h6>
                                            <h6 class="mb-1">Delivered: <span class="fw-light">2239</span></h6>
                                            <h6 class="mb-3">Notification Details: <span class="fw-light">All</span></h6>
                                            <h6>Description: <span class="fw-light">Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </span></h6>
                                        </div>
                                        <div class="card-rs text-end">
                                            <div class="mb-3">
                                                <a href="#" class="text-decoration-none mb-3">
                                                    <span class="deleteCard text-black">Resend</span>
                                                 <img src="{{URL::asset('admin/assets/img/reload.png')}}" alt="">
                                                </a>
                                            </div>
                                            <div class="completed w-100">On Air</div>
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
    $(".notificationsLi").addClass("activeClass");
    $(".notifications").addClass("md-active");
</script>
@endsection