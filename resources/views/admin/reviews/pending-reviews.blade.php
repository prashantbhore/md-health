@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="content-wrapper">
        <div class="page-title">Reviews</div>
        <div class="row top-cards productsPage">
            <div class="col-md-3 mb-3">
                <!-- <a href="{{URL('admin/category-mdhealth')}}" class="text-decoration-none text-dark"> -->
                <div class="card position-relative bg-yellow">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2">
                            <div class="card-text d-flex flex-column">
                                <p class="text-black">Pending Reviews</p>
                                <h4 class="mb-0">12</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- </a> -->
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{URL('admin/published-reviews')}}" class="text-decoration-none text-dark">
                    <div class="card bg-green position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div class="card-text d-flex flex-column">
                                    <p class="text-black">Published Reviews</p>
                                    <h4>79</h4>
                                </div>
                                <span class="link-open">
                                    <img src="{{URL::asset('admin/assets/img/link-open.png')}}" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-12 my-3">
                <div class="card md-shadow-light">
                    <div class="card-body">
                        <div class="w-full d-flex align-items-center justify-content-end gap-2 mb-3 filters">
                            <div class="card-title me-auto">Pending Reviews</div>
                            <input type="text" class="form-control" placeholder="Search">

                            <select class="form-select form-select-sm">
                                <option selected>All</option>
                                <option value="1">Medical Service Provider</option>
                                <option value="2">Food Provider</option>
                                <option value="3">Vendor</option>
                                <option value="3">Home Service</option>
                            </select>
                        </div>


                        @if($pendingReviews)
                        @foreach ($pendingReviews as $review)

                        {{-- {{dd($review->created_at)}} --}}
                            
                      
                        <div class="card md-shadow-light reviewsCard mb-3">
                                <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="Writer">Writer :</label>
                                        <p class="mb-0">{{!empty($review->customer->full_name)?$review->customer->full_name:''}}</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="Company">Company :</label>
                                        <p class="mb-0">{{!empty($review->product->provider->company_name)?$review->product->provider->company_name:''}}</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="Subject">Subject :</label>
                                        <p class="mb-0">{{!empty($review->product->package_name)?$review->product->package_name:''}}</p>
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
                                        {{-- <p class="mb-0">12/12/2023 - 15:50</p> --}}
                                        <p class="mb-0">{{!empty($review->created_at)?$review->created_at:''}}</p>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="Review">Review :</label>
                                        <p class="mb-0 d-block">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="d-flex flex-wrap gap-3 w-50">
                                            <button type="submit" class="btn md-btn save-btn">Publish Reviews</button>
                                            <button type="submit" class="btn md-btn deactivate-btn">Reject Reviews</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif


                        {{-- <div class="card md-shadow-light reviewsCard mb-3">
                            <div class="card-body">
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
                                    <div class="col-md-12 mb-3">
                                        <div class="d-flex flex-wrap gap-3 w-50">
                                            <button type="submit" class="btn md-btn save-btn">Publish Reviews</button>
                                            <button type="submit" class="btn md-btn deactivate-btn">Reject Reviews</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="card md-shadow-light reviewsCard mb-3">
                            <div class="card-body">
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
                                    <div class="col-md-12 mb-3">
                                        <div class="d-flex flex-wrap gap-3 w-50">
                                            <button type="submit" class="btn md-btn save-btn">Publish Reviews</button>
                                            <button type="submit" class="btn md-btn deactivate-btn">Reject Reviews</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> --}}

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