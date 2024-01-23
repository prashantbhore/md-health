@extends('front.layout.mdShop')
@section('content')
    @php
        if (Session::get('login_token') != null) {
            $user = true;
        } else {
            $user = false;
        }

    @endphp
    <div class="content-wrapper mdShop">
        <!-- SECTION 1 -->
        <div class="container">
            <div class="tab-card rounded mb-3 position-relative">
                <!-- Product Title Section -->
                <div class="product-title-section">
                    <div class="d-flex gap-2">
                        <div class="bg-f6 d-flex p-2 gap-1" style="border-radius: 3px;">
                            <span class="bg-green campton" style="border-radius: 3px; padding: 2px;">4.7</span>
                            <p class="mb-0 campton">{{ $vendor['company_name'] }}</p>
                        </div>
                        <img src="{{ 'front/assets/img/evony.png' }}" alt=""
                            style="width: 70px; object-fit: contain;">
                    </div>
                    <div class="bg-green p-2 d-flex gap-4" style="border-radius: 3px;">
                        <div class="d-flex align-items-center gap-1">
                            <img src="{{ 'front/assets/img/Follow.svg' }}" alt="">
                            <p class="mb-0 camptonBold follow_unfollow" onclick="follow_unfollow();">
                                {{ !empty(Session::get('login_token')) ? 'Unfollow' : 'Follow' }}</p>
                        </div>
                        <p class="mb-0">120 Followers</p>
                    </div>
                </div>
                <!-- Nav pills -->
                <ul class="nav nav-pills bg-f6">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="pill" href="#allProducts">All Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="pill" href="#aboutUs">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" disabled style="color: #8a8a8a;">Posts <span class="smallFont">(Coming
                                Soon)</span></a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="allProducts">
                            <div class="row">
                                <div class="col-3">
                                    <div class="white-box">
                                        <p class="campton underline">Filters</p>
                                        <div class="mb-4">
                                            <p class="text-green vSmallFont camptonBold">Price</p>
                                            <div class="price-range-slider">
                                                <div id="slider-range" class="range-bar"></div>
                                                <!-- <p class="range-value">
                                                    <input type="text" id="amount" readonly>
                                                </p> -->
                                                <div class="range-value mb-4">
                                                    <div class="d-flex mt-1">
                                                        <input type="text" id="iniRange" class="campton" readonly>
                                                        <input type="text" id="endRange" class="text-end campton"
                                                            readonly>
                                                    </div>
                                                    <!-- <p id="iniRange"></p> -->
                                                    <!-- <p id="endRange"></p> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <p class="text-green vSmallFont camptonBold underline">Reviews</p>
                                            <div class="d-flex align-items-center gap-2">
                                                <label class="smallFont camptonBold d-flex align-items-center gap-1">
                                                    <input type="radio" value="20" name="rating" checked />
                                                </label>
                                                <div class="d-flex align-items-baseline gap-2">
                                                    <p class="mb-0 smallFont camptonBold lh-base">5.0</p>
                                                    <div class="d-flex align-items-center gap-1">
                                                        <i class="fa fa-star text-green vSmallFont"></i>
                                                        <i class="fa fa-star text-green vSmallFont"></i>
                                                        <i class="fa fa-star text-green vSmallFont"></i>
                                                        <i class="fa fa-star text-green vSmallFont"></i>
                                                        <i class="fa fa-star text-green vSmallFont"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <label class="smallFont camptonBold d-flex align-items-center gap-1">
                                                    <input type="radio" value="20" name="rating" />
                                                </label>
                                                <div class="d-flex align-items-baseline gap-2">
                                                    <p class="mb-0 smallFont camptonBold lh-base">4.0</p>
                                                    <div class="d-flex align-items-center gap-1">
                                                        <i class="fa fa-star text-green vSmallFont"></i>
                                                        <i class="fa fa-star text-green vSmallFont"></i>
                                                        <i class="fa fa-star text-green vSmallFont"></i>
                                                        <i class="fa fa-star text-green vSmallFont"></i>
                                                        <i class="fa fa-star vSmallFont"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <label class="smallFont camptonBold d-flex align-items-center gap-1">
                                                    <input type="radio" value="20" name="rating" />
                                                </label>
                                                <div class="d-flex align-items-baseline gap-2">
                                                    <p class="mb-0 smallFont camptonBold lh-base">3.0</p>
                                                    <div class="d-flex align-items-center gap-1">
                                                        <i class="fa fa-star text-green vSmallFont"></i>
                                                        <i class="fa fa-star text-green vSmallFont"></i>
                                                        <i class="fa fa-star text-green vSmallFont"></i>
                                                        <i class="fa fa-star vSmallFont"></i>
                                                        <i class="fa fa-star vSmallFont"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <label class="smallFont camptonBold d-flex align-items-center gap-1">
                                                    <input type="radio" value="20" name="rating" />
                                                </label>
                                                <div class="d-flex align-items-baseline gap-2">
                                                    <p class="mb-0 smallFont camptonBold lh-base">2.0</p>
                                                    <div class="d-flex align-items-center gap-1">
                                                        <i class="fa fa-star text-green vSmallFont"></i>
                                                        <i class="fa fa-star text-green vSmallFont"></i>
                                                        <i class="fa fa-star vSmallFont"></i>
                                                        <i class="fa fa-star vSmallFont"></i>
                                                        <i class="fa fa-star vSmallFont"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <label class="smallFont camptonBold d-flex align-items-center gap-1">
                                                    <input type="radio" value="20" name="rating" />
                                                </label>
                                                <div class="d-flex align-items-baseline gap-2">
                                                    <p class="mb-0 smallFont camptonBold lh-base">1.0</p>
                                                    <div class="d-flex align-items-center gap-1">
                                                        <i class="fa fa-star text-green vSmallFont"></i>
                                                        <i class="fa fa-star vSmallFont"></i>
                                                        <i class="fa fa-star vSmallFont"></i>
                                                        <i class="fa fa-star vSmallFont"></i>
                                                        <i class="fa fa-star vSmallFont"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <p class="text-green vSmallFont camptonBold underline">Brands</p>
                                            <div class="d-flex align-items-center gap-2">
                                                <label class="smallFont camptonBold d-flex align-items-center gap-1">
                                                    <input type="checkbox" value="20" name="discount" />
                                                </label>
                                                <div class="d-flex align-items-baseline gap-2">
                                                    <p class="mb-0 smallFont campton lh-base">Brand 1</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <label class="smallFont camptonBold d-flex align-items-center gap-1">
                                                    <input type="checkbox" value="20" name="discount" />
                                                </label>
                                                <div class="d-flex align-items-baseline gap-2">
                                                    <p class="mb-0 smallFont campton lh-base">Brand 2</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <label class="smallFont camptonBold d-flex align-items-center gap-1">
                                                    <input type="checkbox" value="20" name="discount" />
                                                </label>
                                                <div class="d-flex align-items-baseline gap-2">
                                                    <p class="mb-0 smallFont campton lh-base">Brand 3</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <p class="text-green vSmallFont camptonBold underline">Delivery</p>
                                            <div class="d-flex align-items-center gap-2">
                                                <label class="smallFont camptonBold d-flex align-items-center gap-1">
                                                    <input type="checkbox" value="20" name="discount" checked />
                                                </label>
                                                <div class="d-flex align-items-baseline gap-2">
                                                    <p class="mb-0 smallFont campton lh-base">Free Shipping</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <label class="smallFont camptonBold d-flex align-items-center gap-1">
                                                    <input type="checkbox" value="20" name="discount" />
                                                </label>
                                                <div class="d-flex align-items-baseline gap-2">
                                                    <p class="mb-0 smallFont campton lh-base">Same Day Delivery</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="row">
                                         {{-- mplus04 --}}
                                        {!! !empty($html) ? $html : '' !!}
                                        {{-- <div class="col-4">
                                        <a href="{{url('product')}}" class="mt-4 card-link">
                                            <div class="card" >
                                                <img src="{{('front/assets/img/productPic.svg')}}" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="mb-1">Product Name</h5>
                                                    <p class="mb-5 camptonBook">Product Description</p>
                                                    <!-- <a href="#" class="mt-4"> -->
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <p class="camptonBold fs-4 text-green mb-0">1.290,00 ₺</p>
                                                            <img src="{{('front/assets/img/ArrowRight.svg')}}" alt="">
                                                        </div>
                                                    <!-- </a> -->
                                                </div>
                                            </div>
                                        </a> --}}
                                        {{-- <a href="{{url('product')}}" class="mt-4 card-link">
                                            <div class="card" >
                                                <img src="{{('front/assets/img/productPic.svg')}}" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="mb-1">Product Name</h5>
                                                    <p class="mb-5 camptonBook">Product Description</p>
                                                    <!-- <a href="#" class="mt-4"> -->
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <p class="camptonBold fs-4 text-green mb-0">1.290,00 ₺</p>
                                                            <img src="{{('front/assets/img/ArrowRight.svg')}}" alt="">
                                                        </div>
                                                    <!-- </a> -->
                                                </div>
                                            </div>
                                        </a>
                                        <a href="{{url('product')}}" class="mt-4 card-link">
                                            <div class="card" >
                                                <img src="{{('front/assets/img/productPic.svg')}}" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="mb-1">Product Name</h5>
                                                    <p class="mb-5 camptonBook">Product Description</p>
                                                    <!-- <a href="#" class="mt-4"> -->
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <p class="camptonBold fs-4 text-green mb-0">1.290,00 ₺</p>
                                                            <img src="{{('front/assets/img/ArrowRight.svg')}}" alt="">
                                                        </div>
                                                    <!-- </a> -->
                                                </div>
                                            </div>
                                        </a> --}}
                                        {{-- </div> --}}
                                        {{-- <div class="col-4">
                                        <a href="{{url('product')}}" class="mt-4 card-link">
                                            <div class="card" >
                                                <img src="{{('front/assets/img/productPic.svg')}}" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="mb-1">Product Name</h5>
                                                    <p class="mb-5 camptonBook">Product Description</p>
                                                    <!-- <a href="#" class="mt-4"> -->
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <p class="camptonBold fs-4 text-green mb-0">1.290,00 ₺</p>
                                                            <img src="{{('front/assets/img/ArrowRight.svg')}}" alt="">
                                                        </div>
                                                    <!-- </a> -->
                                                </div>
                                            </div>
                                        </a>
                                        <a href="{{url('product')}}" class="mt-4 card-link">
                                            <div class="card" >
                                                <img src="{{('front/assets/img/productPic.svg')}}" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="mb-1">Product Name</h5>
                                                    <p class="mb-5 camptonBook">Product Description</p>
                                                    <!-- <a href="#" class="mt-4"> -->
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <p class="camptonBold fs-4 text-green mb-0">1.290,00 ₺</p>
                                                            <img src="{{('front/assets/img/ArrowRight.svg')}}" alt="">
                                                        </div>
                                                    <!-- </a> -->
                                                </div>
                                            </div>
                                        </a>
                                        <a href="{{url('product')}}" class="mt-4 card-link">
                                            <div class="card" >
                                                <img src="{{('front/assets/img/productPic.svg')}}" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="mb-1">Product Name</h5>
                                                    <p class="mb-5 camptonBook">Product Description</p>
                                                    <!-- <a href="#" class="mt-4"> -->
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <p class="camptonBold fs-4 text-green mb-0">1.290,00 ₺</p>
                                                            <img src="{{('front/assets/img/ArrowRight.svg')}}" alt="">
                                                        </div>
                                                    <!-- </a> -->
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="{{url('product')}}" class="mt-4 card-link">
                                            <div class="card" >
                                                <img src="{{('front/assets/img/productPic.svg')}}" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="mb-1">Product Name</h5>
                                                    <p class="mb-5 camptonBook">Product Description</p>
                                                    <!-- <a href="#" class="mt-4"> -->
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <p class="camptonBold fs-4 text-green mb-0">1.290,00 ₺</p>
                                                            <img src="{{('front/assets/img/ArrowRight.svg')}}" alt="">
                                                        </div>
                                                    <!-- </a> -->
                                                </div>
                                            </div>
                                        </a>
                                        <a href="{{url('product')}}" class="mt-4 card-link">
                                            <div class="card" >
                                                <img src="{{('front/assets/img/productPic.svg')}}" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="mb-1">Product Name</h5>
                                                    <p class="mb-5 camptonBook">Product Description</p>
                                                    <!-- <a href="#" class="mt-4"> -->
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <p class="camptonBold fs-4 text-green mb-0">1.290,00 ₺</p>
                                                            <img src="{{('front/assets/img/ArrowRight.svg')}}" alt="">
                                                        </div>
                                                    <!-- </a> -->
                                                </div>
                                            </div>
                                        </a>
                                        <a href="{{url('product')}}" class="mt-4 card-link">
                                            <div class="card" >
                                                <img src="{{('front/assets/img/productPic.svg')}}" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="mb-1">Product Name</h5>
                                                    <p class="mb-5 camptonBook">Product Description</p>
                                                    <!-- <a href="#" class="mt-4"> -->
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <p class="camptonBold fs-4 text-green mb-0">1.290,00 ₺</p>
                                                            <img src="{{('front/assets/img/ArrowRight.svg')}}" alt="">
                                                        </div>
                                                    <!-- </a> -->
                                                </div>
                                            </div>
                                        </a>
                                    </div> --}}
                                     {{-- mplus04 --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                         {{-- mplus04 --}}
                        <div class="tab-pane fade" id="aboutUs">
                            <p class="campton">About</p>
                            <p class="camptonBook">
                                {{ !empty($product_data[0]['vendor_about']) ? $product_data[0]['vendor_about'] : '' }}</p>
                        </div>
                         {{-- mplus04 --}}
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center mt-4">
                <img src="{{ 'front/assets/img/mdShopAd.png' }}" alt="" style="z-index: 1;">
            </div>
        </div>

        <!-- SECTION 2: SCAN QR -->
        <div class="bg-f6 scanQr">
            <img src="{{ 'front/assets/img/appScreenFooter.png' }}" alt="">
        </div>
    </div>
    <!-- </div> -->
    <div class="modal fade loginFirstModal" id="loginFirstModal" tabindex="-1" aria-labelledby="serviceForModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered position-relative">
            <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close"> -->
            <!-- </button> -->
            <div class="modal-content bg-f6">
                <img class="closeModal" data-bs-dismiss="modal" src="{{ 'front/assets/img/closeModal.png' }}"
                    alt="">
                <img src="{{ 'front/assets/img/Oops.svg' }}" alt="">
                <div class="d-flex align-items-center flex-column">
                    <p class="camptonBook fw-bold text-center mt-4">Excited to explore more? It's time to join <span
                            class="camptonBold">MD</span> family.</p>
                    <a href="{{ url('/user-account') }}" type="button" class="btn btn-sm btn-md df-center mb-4">Get
                        Started</a>
                    <p class="camptonBook fw-bold text-center mt-4">Already<span class="camptonBold">MD</span> member?</p>
                    <a href="{{ url('/sign-in-web') }}" type="button" class="btn btn-sm whiteBtn df-center mb-5">Sign
                        In</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        const lightbox = GLightbox({
            ...options
        });
    </script>
    <script>
        let checkedVal;
        $('input[type=radio]').click(function() {
            checkedVal = $('input[name="paymentMethod"]:checked').val();
            if (checkedVal === "card") {
                $("#card").css('display', 'block');
                $("#wallet").css('display', 'none');
            } else if (checkedVal === "wallet") {
                $("#card").css('display', 'none');
                $("#wallet").css('display', 'block');
            }
        });
    </script>
    <script>
        $(function() {
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 100,
                values: [0, 100],
                slide: function(event, ui) {
                    // $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                    $("#iniRange").val("$" + ui.values[0]);
                    $("#endRange").val("$" + ui.values[1]);
                }
            });
            // $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
            //   " - $" + $( "#slider-range" ).slider( "values", 1 ) );
            $("#iniRange").val($("#slider-range").slider("values", 0) + "₺")
            $("#endRange").val($("#slider-range").slider("values", 1) + "₺")
        });
    </script>
 {{-- mplus04 --}}
    <script>
        //    function follow_unfollow(){
        //     login='{{ !empty(Session::get('login_token')) }}';
        //     if(!(login)){
        //         // alert(login);
        //         window.location.href = base_url + '/sign-in-web';
        //     }else{

        //     }
        //     }
    </script>
    <script>
        $('.follow_unfollow').click(function(e) {
            e.preventDefault();
            var user = "{{ $user }}";
            var id = this.id;
            // alert(id);
            // $('.treatmentForModal_'+id).modal('hide');
            if (user == '1') {
                $('#treatmentForModal_' + id).modal('show');
            } else {
                $('.treatmentForModal_' + id).modal('hide');
                $('#loginFirstModal').modal('show');
            }
        });
    </script>
     {{-- mplus04 --}}
@endsection
