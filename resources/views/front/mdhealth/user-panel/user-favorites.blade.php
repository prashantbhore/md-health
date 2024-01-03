@extends('front.layout.layout2')
@section("content")
<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="row">
            <div class="col-md-3">
                @include('front.includes.sidebar-user')
            </div>

            <div class="col-md-9">
                <div class="card mb-4" style="min-height: 470px;">
                    <h5 class="card-header mb-3">
                        <span>My Favorites</span>
                    </h5>
                    <div class="card-body">
                        <div class="card shadow-none mb-3" style="border-radius: 3px;background: #EDEDED;">
                            <div class="card-body d-flex justify-content-between">
                                <div>
                                    <h5 class="card-h1 mb-0">Heart Valve Replacement Surgery <img src="{{asset('front/assets/img/verifiedBy.png')}}" alt="" class="ms-3"/></h5>
                                    <p class="mb-0 d-inline-block card-p1"><img src="{{asset('front/assets/img/Location.svg')}}" alt="" /> Besiktas / Istanbul</p>
                                    <p class="mb-0 d-inline-block card-p1 fst-italic ms-4">Treatment Period 3-5 days</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-center flex-column gap-2">
                                    <div>
                                        <img src="{{asset('front/assets/img/Favourite.svg')}}" alt="" />
                                    </div>
                                    <p class="mb-0 d-inline-block card-p1 fst-italic">Remove Favorite</p>
                                </div>

                            </div>
                        </div>
                        <div class="card shadow-none mb-3" style="border-radius: 3px;background: #EDEDED;">
                            <div class="card-body d-flex justify-content-between">
                                <div>
                                    <h5 class="card-h1 mb-0">Heart Valve Replacement Surgery <img src="{{asset('front/assets/img/verifiedBy.png')}}" alt="" class="ms-3"/></h5>
                                    <p class="mb-0 d-inline-block card-p1"><img src="{{asset('front/assets/img/Location.svg')}}" alt="" /> Besiktas / Istanbul</p>
                                    <p class="mb-0 d-inline-block card-p1 fst-italic ms-4">Treatment Period 3-5 days</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-center flex-column gap-2">
                                    <div>
                                        <img src="{{asset('front/assets/img/Favourite.svg')}}" alt="" />
                                    </div>
                                    <p class="mb-0 d-inline-block card-p1 fst-italic">Remove Favorite</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('script')
<script>
    $(".upFavLi").addClass("activeClass");
    $(".upFav").addClass("md-active");
</script>
@endsection