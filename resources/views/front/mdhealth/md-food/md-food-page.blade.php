@extends('front.layout.layout')
@section('content')
    <div>
        {{-- Food Page Banner --}}
        <div class="md-food-banner">
            <div class="sub-food-banner">
                <div class="banner-p1">HEALTHY MEAL FOR YOU</div>
                <div class="mid-sub-food-banner">
                    <p class="banner-p2">PLAN YOUR</p>
                    <img src="{{ 'front/assets/img/mdFoods/foodsBanner.png' }}" alt="" class="">
                    <p class="banner-p2">DIET MEAL</p>
                </div>
                <div class="banner-p3">NOW</div>
            </div>
        </div>

        <div class="container shadow-lg bg-body rounded p-3">
            <div class="row g-0 gap-3">
                <div class="col booking-box-h">
                    <div class="d-flex flex-column gap-2">
                        <p class="green-color mb-0 fw-bold" style="font-size: small"> Calaries</p>
                        <div class="d-flex align-items-center">
                            <input type="range" class="range1" min="50" max="250" step="0.5" value="50"
                                id="customRange3">
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="" style="font-size: small">50kcal</p>
                            <p class="" style="font-size: small">250kcal</p>
                        </div>
                    </div>
                </div>
                <div class="col booking-box-h">
                    <div class="form-floating ">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                            >
                            <option data-display="Select" selected>Beef & Vegetables</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <label for="floatingSelect" class="mid-food-sub"> Food Type</label>
                    </div>
                </div>
                <div class="col booking-box-h border" style="padding-left: 6px">
                    <label for="floatingSelect" class="mid-food-sub mb-1">Subscription Type</label>
                    {{-- <div class="d-flex gap-2 m-0 p-0" id="custom-select-button">
                        <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="">
                        <input type="date" id="datePicker" name="calendar" class="form-control w-100 m-0 p-0 border-0 bg-light"  style="border:1px solid black ">
                    </div> --}}
                    <div id="reportrange" class="date-range-picker-div d-flex gap-2 m-0 p-0" name="daterange"
                        {{-- style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%" --}}>
                        {{-- <i class="fa fa-calendar"></i>&nbsp; --}}
                        <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="">
                        <input type="text" name="daterange" class="form-control w-100 m-0 p-0 border-0 bg-light"
                            value="Daily" />
                        <span></span>
                    </div>
                </div>
                <div class="col">
                    <button class="btn-search-pill-booking3" style="height: 57px"><a href="{{ url('md-food-search-page') }}"
                            class="nav-link">Search</a></button>
                </div>
            </div>
        </div>

        <div class="container mid-food-m">
            <div class="row">
                <div class="col text-center">
                    <p><span class="mid-food-sen1">Most Used Food</span> <span class="mid-food-sen2">Providers</span></p>
                </div>
            </div>
        </div>

        <div class="container shadow-lg bg-body rounded  food-mid-sect2">
            <div class="row">
                <div class="col-md-8">
                    <div class="d-flex align-items-center flex-wrap gap-4">
                        <img src="{{ 'front/assets/img/mdFoods/Rectangle 661.png' }}" alt=""
                            class="food-mid-sect-img1">
                        <div class="">
                            <div class="">
                                <p class="m-0 p-0 food-factory">MDFood Factory</p>
                                <p class="mt-0 food-factory-veg">Vegetable ,Beefs,Vegan & Vegetarian kitchen</p>
                            </div>

                            <p class="m-0 p-0"><span class="green-color food-review">Reviews</span><span
                                    class="food-review-270">(270)</span></p>
                            <div class="mt-0">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt="" class="">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt="" class="">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt="" class="">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt="" class="">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill (1).png' }}" alt=""
                                    class="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-end">
                    <img src="{{ 'front/assets/img/verifiedBy.png' }}" alt="" class="">
                </div>
            </div>
        </div>
        <div class="container shadow-lg bg-body rounded  food-mid-sect2">
            <div class="row">
                <div class="col-md-8">
                    <div class="d-flex align-items-center flex-wrap gap-4">
                        <img src="{{ 'front/assets/img/mdFoods/Rectangle 661.png' }}" alt=""
                            class="food-mid-sect-img1">
                        <div class="">
                            <div class="">
                                <p class="m-0 p-0 food-factory">MDFood Factory</p>
                                <p class="mt-0 food-factory-veg">Vegetable ,Beefs,Vegan & Vegetarian kitchen</p>
                            </div>
                            <p class="m-0 p-0"><span class="green-color food-review">Reviews</span><span
                                    class="food-review-270">(270)</span></p>
                            <div class="mt-0">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt=""
                                    class="">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt=""
                                    class="">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt=""
                                    class="">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt=""
                                    class="">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill (1).png' }}" alt=""
                                    class="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-end">
                    <img src="{{ 'front/assets/img/verifiedBy.png' }}" alt="" class="">
                </div>
            </div>
        </div>
        <div class="container shadow-lg bg-body rounded  food-mid-sect2 food-footer-m">
            <div class="row">
                <div class="col-md-8">
                    <div class="d-flex align-items-center flex-wrap gap-4">
                        <img src="{{ 'front/assets/img/mdFoods/Rectangle 661.png' }}" alt=""
                            class="food-mid-sect-img1">
                        <div class="">
                            <div class="">
                                <p class="m-0 p-0 food-factory">MDFood Factory</p>
                                <p class="mt-0 food-factory-veg">Vegetable ,Beefs,Vegan & Vegetarian kitchen</p>
                            </div>

                            <p class="m-0 p-0"><span class="green-color food-review">Reviews</span><span
                                    class="food-review-270">(270)</span></p>
                            <div class="mt-0">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt=""
                                    class="">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt=""
                                    class="">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt=""
                                    class="">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt=""
                                    class="">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill (1).png' }}" alt=""
                                    class="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-end">
                    <img src="{{ 'front/assets/img/verifiedBy.png' }}" alt="" class="">
                </div>
            </div>
        </div>
        <div class="mt-3 ">
            <img src="{{ 'front/assets/img/appScreenFooter.png' }}" alt="" class="footer-image">
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                    .format('YYYY-MM-DD'));
            });
        });
    </script>
@endsection
