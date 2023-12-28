@extends('front.layout.mdFoods')
@section('content')
    <div class="bg-f6">
        {{-- Food Page Banner --}}
        <div class="md-food-banner">
            <div class="sub-food-banner">
                <div class="banner-p1 position-relative z-index-1">HEALTHY MEAL FOR YOU</div>
                <div class="mid-sub-food-banner">
                    <p class="banner-p2 position-relative z-index-1">PLAN YOUR</p>
                    <img src="{{ 'front/assets/img/mdFoods/foodsBanner.png' }}" alt="" class="position-relative z-index-1">
                    <p class="banner-p2 position-relative z-index-1">DIET MEAL</p>
                </div>
                <div class="banner-p3 position-relative z-index-1">NOW</div>
            </div>
        </div>
        <!-- <div class="d-flex justify-content-center">
            <div class="search-bar d-flex align-items-center p-3 gap-3">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option data-display="Select" selected>Cardiac Arrest</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label for="floatingSelect">Treatments</label>
                </div>
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option data-display="Select" selected>Beef & Vegetables</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label for="floatingSelect">Food Type</label>
                </div>
                <div class="form-floating">
                        <input type="text" class="form-select" name="daterange" value="" />
                    <label for="floatingSelect">Subscription Type</label>
                </div>
                <a href="{{url('health-search-result')}}">
                    <button class="btn btn-search-pill">Search</button>
                </a>
            </div>
        </div> -->
        <div class="container shadow-lg bg-body rounded mid-sect-height">
            <div class="row  align-items-center h-100 ms-2">
                <div class="col h-75 borer-color">
                    <div class="d-flex flex-column gap-2">
                        <p class="green-color mb-0 fw-bold"> Calaries</p>
                        <div class="d-flex align-items-center">
                            {{-- <img src="{{ 'front/assets/img/mdFoods/Ellipse 165.png' }}" alt="" class="">
                            <span><img src="{{ 'front/assets/img/mdFoods/Vector 140.png' }}" alt=""
                                    class=""></span> --}}
                            <input type="range" class="range1" min="50" max="250" step="0.5" value="50"
                                id="customRange3">
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="">50kcal</p>
                            <p class="">250kcal</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating ">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                            style="height: 75px">
                            <option data-display="Select" selected>Beef & Vegetables</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <label for="floatingSelect" class="mid-food-sub"> Food Type</label>
                    </div>
                </div>
                <div class="col  main-mid-seaction borer-color">
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
                <div class="col ">
                    <button class="btn btn-search-pill-food ms-1"><a href="{{ url('foods-search-result') }}"
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
