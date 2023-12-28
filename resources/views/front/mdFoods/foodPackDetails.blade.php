@extends('front.layout.layout')
@section('content')
    <div>

        <div class="container d-flex mt-5 mb-5 gap-2">
            {{-- <div class="d-flex "> --}}
                <a href="{{url('md-food-search-page')}}" class="nav-link">
            <img src="{{ 'front/assets/img/mdFoods/Arrow - Down Circle.png' }}" alt="">
                </a>
            <h4>Back Treatments</h4>
            {{-- </div> --}}
        </div>

        <div class="container">
            <div class="row shadow-lg bg-body rounded p-2">
                <div class="col">
                    <div class="row mb-3">
                        <div class="col">
                            <p class="m-0 p-0 food-factory">Heart Valve Replacement Surgery</p>
                            <p class="m-0 p-0"><span>
                                    <img src="{{ 'front/assets/img/mdFoods/mdi_location.png' }}" alt=""
                                        class="">
                                </span><span class="food-factory-veg1">Bisiktas /Instanbul</span></p>
                        </div>
                        <div class="col-6 text-end">
                            <img src="{{ 'front/assets/img/verifiedBy.png' }}" alt="" class="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 ">
                            <p class="green-color food-review">Package Includes</p>
                            <p class="m-0 p-0"><span><img src="{{ 'front/assets/img/mdFoods/Varlık 4@.png' }}"
                                        alt="" class=""></span><span class="ms-2">Accomodation</span>
                                <span class="md-food-view-stars">(*3 stars)</span>
                            </p>
                            <p class="m-0 p-0"><span><img src="{{ 'front/assets/img/mdFoods/Varlık 4@.png' }}"
                                        alt="" class=""></span><span class="ms-2">Dinner</span></p>
                            <p class="m-0 p-0"><span><img src="{{ 'front/assets/img/mdFoods/Varlık 4@.png' }}"
                                        alt="" class=""></span><span class="ms-2">No Gluten</span>
                            </p>
                            <p class="m-0 p-0"><span><img src="{{ 'front/assets/img/mdFoods/Varlık 4@.png' }}"
                                        alt="" class=""></span><span class="ms-2">Zeto sugar
                                    Dessert</span></p>
                            <p class="m-0 p-0"><span><img src="{{ 'front/assets/img/mdFoods/Varlık 4@.png' }}"
                                        alt="" class=""></span><span class="ms-2">Zeto sugar
                                    Dessert</span></p>
                            <p class="m-0 p-0"><span><img src="{{ 'front/assets/img/mdFoods/Varlık 4@.png' }}"
                                        alt="" class=""></span><span
                                    class="ms-2 text-danger fw-bold">Ambulance</span></p>
                        </div>
                        <div class="col-2 border-start">
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
                            <p class="fw-bold">Excellent</p>
                        </div>
                        <div class="col border-start">
                            <p class="m-0 p-0"><span class="green-color food-review">Package Price
                                </span>
                            </p>
                            {{-- <p class="food-search-p1">
                            4.980,00%
                            <img src="{{ 'front/assets/img/mdFoods/Vector 101.png' }}" alt=""
                                class="">
                        </p>
                        <br> --}}
                            <p class=""><span class="food-search-p2">2.820,00%</span><span
                                    class="food-search-p3">(120,20% per meal)</span></p>
                            {{-- <p class="food-search-p4">*This package is the basic package it include meat and
                            vegetables</p> --}}
                            <div class="mt-5">
                                <a href="{{url('purchase-food-pack')}}">
                                    <button class="btn btn-search-pill-food1">Purchase Meal Service</button>
                                </a>
                                <img src="{{ 'front/assets/img/mdFoods/Group 3.png' }}" alt="" class="">
                            </div>
                            {{-- <p class="text-end food-search-p5"><ins>View Menu</ins></p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5 shadow-lg bg-body rounded p-2 mb-5 " style="height: 100%">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="mx-5 tablinks btn1 active1" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true" onclick="openCity(event, 'Overview')" >Overview</button>
                    <button class=" mx-5 tablinks btn1" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false" onclick="openCity(event, 'Review')">Review</button>
                    <button class=" mx-5 tablinks btn1" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                        type="button" role="tab" aria-controls="nav-contact" aria-selected="false" onclick="openCity(event, 'Photos/Videos')">Photos/Videos</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active p-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <p class="m-2 food-view-p1">
                        <img src="{{ 'front/assets/img/mdFoods/Rectangle 644.png' }}" alt=""
                            class="food-view-img1">
                    <p> *************Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                        ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient m
                        ontes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,</p>
                    sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, a
                    <p>rcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede
                        mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean v
                        ulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend
                        ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus
                        viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies
                        nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas
                        tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem</p>
                    <p> neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas
                        nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante
                        . Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh
                        . Donec sodales sagittis magna. Sed consequ
                        ulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend
                        ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus
                        viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies</p>
                    nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas
                    tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem
                    neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas
                    nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante
                    . Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh
                    . Donec sodales sagittis magna. Sed consequ
                    </p>
                </div>

                <div class="tab-pane fade p-3" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <p class="">
                        <span class="food-view-p2">4,8</span>
                        <span class="food-view-p1"><ins>480 Reviews</ins></span>
                    </p>
                    <div class="">
                        <div class="">
                            <p class="">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt=""
                                    class="md-food-view-stars1">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt=""
                                    class="md-food-view-stars1">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt=""
                                    class="md-food-view-stars1">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt=""
                                    class="md-food-view-stars1">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt=""
                                    class="md-food-view-stars1">
                            </p>
                        </div>
                        <p class="">
                            <span class="">
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
                            </span>
                            <span class="">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                                ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient m
                                ontes, nascetur ridiculus mus.
                            </span>
                        </p>
                        <div class="">
                            <p class=""><span class="food-review">Ali G.</span>
                                <span class="food-view-p3">Heart Valve Replacement Surgery</span>
                            </p>
                            <p class="food-view-p3">12/12/2023</p>
                        </div>
                    </div>
                    <div class="food-view-border"></div>
                    <div class="">
                        <div class="">
                            <p class="">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt=""
                                    class="md-food-view-stars1">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt=""
                                    class="md-food-view-stars1">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt=""
                                    class="md-food-view-stars1">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt=""
                                    class="md-food-view-stars1">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt=""
                                    class="md-food-view-stars1">
                            </p>
                        </div>
                        <p class="">
                            <span class="">
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
                            </span>
                            <span class="">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                                ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient m
                                ontes, nascetur ridiculus mus.
                            </span>
                        </p>
                        <div class="">
                            <p class=""><span class="food-review">Ali G.</span>
                                <span class="food-view-p3">Heart Valve Replacement Surgery</span>
                            </p>
                            <p class="food-view-p3">12/12/2023</p>
                        </div>
                    </div>
                    <div class="food-view-border"></div>
                    <div class="">
                        <div class="">
                            <p class="">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt=""
                                    class="md-food-view-stars1">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt=""
                                    class="md-food-view-stars1">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt=""
                                    class="md-food-view-stars1">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt=""
                                    class="md-food-view-stars1">
                                <img src="{{ 'front/assets/img/mdFoods/bi_star-fill.png' }}" alt=""
                                    class="md-food-view-stars1">
                            </p>
                        </div>
                        <p class="">
                            <span class="">
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
                            </span>
                            <span class="">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                                ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient m
                                ontes, nascetur ridiculus mus.
                            </span>
                        </p>
                        <div class="">
                            <p class=""><span class="food-review">Ali G.</span>
                                <span class="food-view-p3">Heart Valve Replacement Surgery</span>
                            </p>
                            <p class="food-view-p3">12/12/2023</p>
                        </div>
                    </div>
                    <div class="food-view-border"></div>
                </div>
                <div class="tab-pane fade p-3" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="d-flex gap-4 flex-wrap">
                        <img src="{{ 'front/assets/img/mdFoods/Group 4.png' }}" alt="">
                        <img src="{{ 'front/assets/img/mdFoods/Rectangle 557.png' }}" alt="">
                        <img src="{{ 'front/assets/img/mdFoods/Group 4.png' }}" alt="">
                        <img src="{{ 'front/assets/img/mdFoods/Rectangle 557.png' }}" alt="">
                        <img src="{{ 'front/assets/img/mdFoods/Group 4.png' }}" alt="">
                        <img src="{{ 'front/assets/img/mdFoods/Rectangle 557.png' }}" alt="">
                        <img src="{{ 'front/assets/img/mdFoods/Group 4.png' }}" alt="">
                        <img src="{{ 'front/assets/img/mdFoods/Rectangle 557.png' }}" alt="">
                        <img src="{{ 'front/assets/img/mdFoods/Group 4.png' }}" alt="">
                        <img src="{{ 'front/assets/img/mdFoods/Rectangle 557.png' }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="md-food-view-footer">
            <img src="{{ 'front/assets/img/appScreenFooter.png' }}" alt="" class="footer-image mt-5">
        </div>
    </div>
@endsection
@section('script')
<script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active1", "");
      }
      document.getElementById('nav-home-tab').style.display = "block";
      evt.currentTarget.className += " active1";
    }
    </script>
@endsection
