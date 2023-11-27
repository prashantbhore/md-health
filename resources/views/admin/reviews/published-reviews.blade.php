@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="content-wrapper">
        <div class="page-title">Reviews</div>
        <div class="row top-cards productsPage">
            <div class="col-md-3 mb-3">
                <a href="{{URL('/pending-reviews')}}" class="text-decoration-none text-dark">
                    <div class="card position-relative bg-yellow">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div class="card-text d-flex flex-column">
                                    <p class="text-black">Pending Reviews</p>
                                    <h4 class="mb-0">12</h4>
                                </div>
                                <span class="link-open">
                                    <img src="{{URL::asset('admin/assets/img/link-open.png')}}" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card bg-green position-relative">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2">
                            <div class="card-text d-flex flex-column">
                                <p class="text-black">Published Reviews</p>
                                <h4>79</h4>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 my-3">
                <div class="card md-shadow-light">
                    <div class="card-body">
                        <div class="w-full d-flex align-items-center justify-content-end gap-2 mb-3 filters">
                            <div class="card-title me-auto">Published Reviews</div>
                            <input type="text" class="form-control" placeholder="Search">

                            <select class="form-select form-select-sm">
                                <option selected disabled hidden>Status</option>
                                <option value="1">Active Orders</option>
                                <option value="2">Denied Orders</option>
                                <option value="3">Completed Orders</option>
                            </select>
                        </div>

                        <div class="card md-shadow-light reviewsCard mb-3 position-relative">
                            <div class="card-body">
                                <div class="position-absolute" style="right: 12px;top:12px;">
                                    <a href="#">
                                        <img src="{{URL::asset('admin/assets/img/closeSquare.png')}}" alt="">
                                    </a>
                                </div>
                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <label for="Writer">Writer :</label>
                                        <p class="mb-0">Ali Danish</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="Company">Company :</label>
                                        <p class="mb-0">Memorial Hospital</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="Subject">Subject :</label>
                                        <p class="mb-0">Hearth Valve Replacement Surgery</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="The Score">The Score :</label>
                                        <p class="mb-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                                                <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(76,219,6,1)"></path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                                                <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(76,219,6,1)"></path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                                                <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(76,219,6,1)"></path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                                                <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(76,219,6,1)"></path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                                                <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path>
                                            </svg>
                                        </p>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="Date">Date :</label>
                                        <p class="mb-0">12/12/2023 - 15:50</p>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="Review">Review :</label>
                                        <p class="mb-0 d-block">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="card md-shadow-light reviewsCard mb-3 position-relative">
                            <div class="card-body">
                                <div class="position-absolute" style="right: 12px;top:12px;">
                                    <a href="#">
                                        <img src="{{URL::asset('admin/assets/img/closeSquare.png')}}" alt="">
                                    </a>
                                </div>
                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <label for="Writer">Writer :</label>
                                        <p class="mb-0">Ali Danish</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="Company">Company :</label>
                                        <p class="mb-0">Memorial Hospital</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="Subject">Subject :</label>
                                        <p class="mb-0">Hearth Valve Replacement Surgery</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="The Score">The Score :</label>
                                        <p class="mb-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                                                <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(76,219,6,1)"></path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                                                <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(76,219,6,1)"></path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                                                <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(76,219,6,1)"></path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                                                <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(76,219,6,1)"></path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                                                <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path>
                                            </svg>
                                        </p>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="Date">Date :</label>
                                        <p class="mb-0">12/12/2023 - 15:50</p>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="Review">Review :</label>
                                        <p class="mb-0 d-block">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="card md-shadow-light reviewsCard mb-3 position-relative">
                            <div class="card-body">
                                <div class="position-absolute" style="right: 12px;top:12px;">
                                    <a href="#">
                                        <img src="{{URL::asset('admin/assets/img/closeSquare.png')}}" alt="">
                                    </a>
                                </div>
                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <label for="Writer">Writer :</label>
                                        <p class="mb-0">Ali Danish</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="Company">Company :</label>
                                        <p class="mb-0">Memorial Hospital</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="Subject">Subject :</label>
                                        <p class="mb-0">Hearth Valve Replacement Surgery</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="The Score">The Score :</label>
                                        <p class="mb-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                                                <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(76,219,6,1)"></path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                                                <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(76,219,6,1)"></path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                                                <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(76,219,6,1)"></path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                                                <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(76,219,6,1)"></path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                                                <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path>
                                            </svg>
                                        </p>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="Date">Date :</label>
                                        <p class="mb-0">12/12/2023 - 15:50</p>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="Review">Review :</label>
                                        <p class="mb-0 d-block">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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
    $(".reviewsLi").addClass("activeClass");
    $(".reviews").addClass("md-active");
</script>
@endsection