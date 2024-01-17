@extends('front.layout.mdShop')
@section('content')
 {{-- mplus04 --}}
    @php
        if (Session::get('login_token') != null) {
            $user = true;
        } else {
            $user = false;
        }

    @endphp
     {{-- mplus04 --}}
    <div class="content-wrapper mdShop">
        <!-- SECTION 1: HERO SECTION -->
        <div>
            <p class="hero-text">MEDICAL SHOP FOR YOUR HEALTH</p>
            <div class="d-flex justify-content-evenly hero-container container">
                <div class="d-flex flex-column gap-4">
                    <img src="{{ URL('front/assets/img/evony.png') }}" alt="" style="width: 140px;">
                    <p class="campton fs-4 mb-0">Evony Medical Mask 50 pc.</p>
                    <div>
                        <p class="mb-0 fs-5 camptonBold lh-base"><span class="red-strike">379,00 ₺</span> <span
                                class="camptonBook vSmallFont">(%10 Discount)</span></p>
                        <p class="mb-0 fs-4 camptonBold lh-base">299,99 ₺</p>
                    </div>
                    <a href="{{ url('user-account') }}" type="button" style="border-radius: 4px;"
                        class="btn btn-sm btn-md df-center">Buy Now</a>
                </div>
                <div>
                    <img src="{{ URL('front/assets/img/Mask.png') }}" alt="">
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <img src="{{ 'front/assets/img/mdShopAd.png' }}" alt="" style="z-index: 1;">
            </div>
        </div>
        <!-- SECTION 2: MOST SALES -->
        <p class="titleClass text-center">MOST <span class="text-green">SALES</span></p>
        <div class="product-card-container container">
             {{-- mplus04 --}}
            <div class="row product-row" id="product_list">

                {{-- <div class="col-3">
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
                <div class="col-3">
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
                <div class="col-3">
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
                <div class="col-3">
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
                <div class="col-3">
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
                <div class="col-3">
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
                <div class="col-3">
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
                <div class="col-3">
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

        <!-- SECTION 3: SCAN QR -->
        <div class="bg-f6 scanQr">
            <img src="{{ 'front/assets/img/appScreenFooter.png' }}" alt="">
        </div>
    </div>
    </div>
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
 {{-- mplus04 --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            var base_url = $('#base_url').val();
            // url= base_url + '/featured-product',
            // alert(url);
            const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
            // $('#product_list').html();
            $('#product_list').hide();
            $.ajax({
                url: base_url + '/featured-product',
                // url: base_url + '/api/filter-product-list', // Replace with your server endpoint
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': token,
                },
                success: function(response) {
                    console.log(response);
                    $('#product_list').html(response);
                    $('#product_list').show();
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });
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
