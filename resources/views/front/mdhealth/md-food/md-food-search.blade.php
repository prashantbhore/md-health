@extends('front.layout.layout')
@section('content')
    <div>
        <div class="container shadow-lg bg-body rounded mt-5 p-2">
            <div class="row  align-items-center h-100 ms-2">
                <div class="col h-75">
                    <div class="form-floating ">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                            style="height: 75px">
                            <option data-display="Select" selected>Max 1500 kcal</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <label for="floatingSelect" class="mid-food-sub">Calaries</label>
                    </div>
                </div>
                <div class="col h-75">
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
                <div class="col main-mid-seaction borer-color">

                    <label for="floatingSelect" class="mid-food-sub mb-1">Subscription Type</label>
                    {{-- <div class="d-flex gap-2 m-0 p-0" id="custom-select-button">
                        <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="">
                        <input type="date" id="datePicker" name="calendar" class="form-control w-100 m-0 p-0 border-0 bg-light"  style="border:1px solid black ">
                    </div> --}}
                    <div id="reportrange" class="date-range-picker-div d-flex gap-2 m-0 p-0" name="daterange"
                        {{-- style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%" --}}
                        >
                        {{-- <i class="fa fa-calendar"></i>&nbsp; --}}
                        <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt="">
                        <input type="text" name="daterange" class="form-control w-100 m-0 p-0 border-0 bg-light" value="Daily"/>
                        <span></span>
                    </div>
                </div>
                <div class="col h-75">
                    {{-- <a href="{{url('md-food-search-page')}}" class="nav-link"> --}}
                        <button class="btn btn-search-pill-food ms-1">Search</button>
                    {{-- </a> --}}
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col text-center">
                    <p><span class="mid-food-sen1">Your</span> <span class="mid-food-sen2">Search</span><span class="mid-food-sen1">Result</span></p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row gap-3">
                <div class="col">
                    <div class="row mb-3">
                        <div class="col">
                            <img src="{{ 'front/assets/img/mdFoods/foodsAdd.png' }}" alt=""class="">
                        </div>
                    </div>
                    <div class="row shadow-lg bg-body rounded p-2 food-search-w">
                        <div class="col">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <p class="m-0 p-0 food-factory">MDFood Factory</p>
                                    <p class="m-0 p-0"><span>
                                            <img src="{{ 'front/assets/img/mdFoods/material-symbols_avg-time.png' }}"
                                                alt="" class="">
                                        </span><span class="food-factory-veg1">Daily,Weekly,Monthly or Yearly</span></p>
                                </div>
                                <div class="col-6 text-end">
                                    <img src="{{ 'front/assets/img/verifiedBy.png' }}" alt="" class="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <p class="green-color food-review">Package Includes</p>
                                    <p class="m-0 p-0"><span><img src="{{ 'front/assets/img/mdFoods/Varlık 4@.png' }}"
                                                alt="" class=""></span><span class="ms-2">Breakfast</span>
                                    </p>
                                    <p class="m-0 p-0"><span><img src="{{ 'front/assets/img/mdFoods/Varlık 4@.png' }}"
                                                alt="" class=""></span><span class="ms-2">Dinner</span></p>
                                    <p class="m-0 p-0"><span><img src="{{ 'front/assets/img/mdFoods/Varlık 4@.png' }}"
                                                alt="" class=""></span><span class="ms-2">No Gluten</span>
                                    </p>
                                    <p class="m-0 p-0"><span><img src="{{ 'front/assets/img/mdFoods/Varlık 4@.png' }}"
                                                alt="" class=""></span><span class="ms-2">Zeto sugar
                                            Dessert</span></p>
                                </div>
                                <div class="col-3 border-start">
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
                                    <p class="fw-bold">Excellent</p>
                                </div>
                                <div class="col-5 border-start">
                                    <p class="m-0 p-0"><span class="green-color food-review">Meal Service Price
                                            (Monthly)</span>
                                    </p>
                                    <p class="food-search-p1">
                                        4.980,00%
                                        <img src="{{ 'front/assets/img/mdFoods/Vector 101.png' }}" alt=""
                                            class="">
                                    </p>
                                    <br>
                                    <p class=""><span class="food-search-p2">2.820,00%</span><span
                                            class="food-search-p3">(120,20% per meal)</span></p>
                                    <p class="food-search-p4">*This package is the basic package it include meat and
                                        vegetables</p>
                                    <div class="">
                                        <button class="btn btn-search-pill-food1">Purchase Meal Service</button>
                                        <img src="{{ 'front/assets/img/mdFoods/Group 3.png' }}" alt=""
                                            class="">
                                    </div>
                                    <a href="{{url('md-food-search-view')}}" class="nav-link"><p class="text-end food-search-p5"><ins>View Menu</ins></p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mt-4">
                    <div class="row mb-3">
                        <div class="col shadow-lg bg-body rounded p-3">
                            <h5 class="fw-bold">Supplier Rating</h5>
                            <div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class=""><span> <img src="{{ 'front/assets/img/mdFoods/Ellipse 18.png' }}"
                                                alt="" class=""></span><span
                                            class="ms-2 food-factory-veg">Excellent(4-5)</span></p>
                                    <p class="">(23)</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class=""><span> <img src="{{ 'front/assets/img/mdFoods/Ellipse 18.png' }}"
                                                alt="" class=""></span><span
                                            class="ms-2 food-factory-veg">Excellent(4-5)</span></p>
                                    <p class="">(23)</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class=""><span> <img src="{{ 'front/assets/img/mdFoods/Ellipse 18.png' }}"
                                                alt="" class=""></span><span
                                            class="ms-2 food-factory-veg">Excellent(4-5)</span></p>
                                    <p class="">(23)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col shadow-lg bg-body rounded p-3">
                            <h5 class="fw-bold">Services</h5>
                            <div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class=""><span> <img src="{{ 'front/assets/img/mdFoods/Ellipse 18.png' }}"
                                                alt="" class=""></span><span
                                            class="ms-2 food-factory-veg">Full Packages</span></p>
                                    <p class="">(23)</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class=""><span> <img src="{{ 'front/assets/img/mdFoods/Ellipse 18.png' }}"
                                                alt="" class=""></span><span
                                            class="ms-2 food-factory-veg">Transporting</span></p>
                                    <p class="">(23)</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class=""><span> <img src="{{ 'front/assets/img/mdFoods/Ellipse 18.png' }}"
                                                alt="" class=""></span><span
                                            class="ms-2 food-factory-veg">Accomodation</span></p>
                                    <p class="">(23)</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class=""><span> <img src="{{ 'front/assets/img/mdFoods/Ellipse 18.png' }}"
                                                alt="" class=""></span><span
                                            class="ms-2 food-factory-veg">Accomodation</span></p>
                                    <p class="">(23)</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class=""><span> <img src="{{ 'front/assets/img/mdFoods/Ellipse 18.png' }}"
                                                alt="" class=""></span><span
                                            class="ms-2 food-factory-veg">Accomodation</span></p>
                                    <p class="">(23)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col shadow-lg bg-body rounded p-3">
                            <h5 class="fw-bold">Price</h5>
                            <div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class=""><span> <img src="{{ 'front/assets/img/mdFoods/Ellipse 18.png' }}"
                                                alt="" class=""></span><span
                                            class="ms-2 food-factory-veg">10,000.00$</span></p>
                                    <p class="">(23)</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class=""><span> <img src="{{ 'front/assets/img/mdFoods/Ellipse 18.png' }}"
                                                alt="" class=""></span><span
                                            class="ms-2 food-factory-veg">20,000.00$</span></p>
                                    <p class="">(23)</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="food-factory-veg"><span> <img
                                                src="{{ 'front/assets/img/mdFoods/Ellipse 18.png' }}" alt=""
                                                class=""></span><span class="ms-2 ">30,000.00$</span></p>
                                    <p class="">(23)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="container shadow-lg bg-body rounded mt-5">
                <div class="row">
                    <div class="col-md-8">
                        <div class="d-flex align-items-center flex-wrap gap-4 p-2">
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
                    <div class="col-md-4 text-end p-2">
                        <img src="{{ 'front/assets/img/verifiedBy.png' }}" alt="" class="">
                    </div>
                </div>
            </div>
            <div class="container shadow-lg bg-body rounded mt-3">
                <div class="row">
                    <div class="col-md-8">
                        <div class="d-flex align-items-center flex-wrap gap-4 p-2">
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
                    <div class="col-md-4 text-end p-2">
                        <img src="{{ 'front/assets/img/verifiedBy.png' }}" alt="" class="">
                    </div>
                </div>
            </div>
            <div class="container shadow-lg bg-body rounded mt-3">
                <div class="row">
                    <div class="col-md-8">
                        <div class="d-flex align-items-center flex-wrap gap-4 p-2">
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
                    <div class="col-md-4 text-end p-2">
                        <img src="{{ 'front/assets/img/verifiedBy.png' }}" alt="" class="">
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <img src="{{ 'front/assets/img/appScreenFooter.png' }}" alt="" class="footer-image mt-5">
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
