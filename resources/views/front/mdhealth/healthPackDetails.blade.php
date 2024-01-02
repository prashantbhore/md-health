@extends('front.layout.layout2')
@section('content')
    <div class="content-wrapper bg-f6">
        {{-- {{ dd($packageDetails) }} --}}

        @php
            // dd($packageDetailsuse);
            if (!function_exists('get_twenty_percent')) {
                function get_twenty_percent($number)
                {
                    return $number * (20 / 100);
                }
            }

        @endphp

        <!-- SECTION 1 -->
        <div class="searchBar backBtn bg-f6">
            <div class="container pt-4">
                <a href="health-search-result" class="d-flex align-items-center mb-5 gap-2">
                    <img src="{{ 'front/assets/img/ArrowLeftCircle.png' }}" alt="">
                    <p class="mb-0 fs-5 camptonBold">Back Treatments</p>
                </a>
                <div class="packageResult rounded mb-3">
                    <div>
                        <div class="d-flex gap-2 align-items-center">
                            <p class="mb-0 fs-5 camptonBold lh-base">{{ $packageDetails['package_name'] }}</p>
                            <img src="{{ 'front/assets/img/verifiedBy.svg' }}" alt="">
                        </div>
                        <div class="d-flex gap-5 mb-4">
                            <div class="d-flex gap-2 align-items-center">
                                <img src="{{ 'front/assets/img/Location.svg' }}" alt="">
                                <p class="mb-0 lctn">{{ $packageDetails['city_name'] }}</p>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <img src="{{ 'front/assets/img/Diaganose.svg' }}" alt="">
                                <p class="mb-0 lctn fst-italic">{{ $packageDetails['treatment_period_in_days'] }}</p>
                            </div>
                        </div>
                        <div class="d-flex gap-4">
                            <div class="brdr-right">
                                <p class="mb-0"><span class="text-green fw-bold camptonBold"
                                        style="font-size: 1.125rem;">Package Includes</span></p>

                                @foreach ($packageDetails['other_services'] as $service)
                                    @if (!empty($service))
                                        <div class="d-flex gap-1 align-items-baseline mb-1">
                                            <img style="width: 11px;" src="{{ 'front/assets/img/Varlik.svg' }}"
                                                alt="">
                                            <p class="mb-0 camptonBook smallFont">{{ $service }}</p>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="brdr-right">
                                <p class="mb-0"><span class="text-green fw-bold camptonBold"
                                        style="font-size: 1.125rem;">Reviews</span><span class="fw-normal">(480)</span></p>
                                <div class="stars">
                                    <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 16px;" alt="">
                                    <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 16px;" alt="">
                                    <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 16px;" alt="">
                                    <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 16px;" alt="">
                                    <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 16px;" alt="">
                                </div>
                                <p class="fs-6 camptonBold">Excellent</p>
                            </div>
                            <div class="d-flex flex-column align-items-end gap-4">
                                <div>
                                    <p class="mb-0">
                                        <span class="text-green fw-bold camptonBold" style="font-size: 1.125rem;">Package
                                            Price</span>
                                    </p>
                                    <div class="my-2">
                                        <p class="mb-0 fs-5 camptonBold lh-base">{{ $packageDetails['treatment_price'] }} ₺
                                            <span
                                                class="smallFont fs-6">*{{ '(' . get_twenty_percent($packageDetails['treatment_price']) . ' ₺)' }}</span>
                                        </p>
                                        <p class="camptonBook">*20% of the price is paid before booking.</p>
                                    </div>
                                    <div class="d-flex gap-2 mb-2">
                                        <button class="btn purchaseBtn" data-bs-toggle="modal"
                                            data-bs-target="#treatmentForModal_{{ $packageDetails['id'] }}">Purchase
                                            Package</button>
                                        <button class="favouriteBtn">
                                            <img src="{{ 'front/assets/img/white-heart.svg' }}" alt="">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade treatmentForModal" id="treatmentForModal_{{ $packageDetails['id'] }}" tabindex="-1"
                    aria-labelledby="treatmentForModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered position-relative">
                        <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close"> -->
                        <!-- </button> -->
                        <div class="modal-content">
                            <img class="closeModal" data-bs-dismiss="modal" src="{{ 'front/assets/img/closeModal.png' }}"
                                alt="">
                            <img src="{{ 'front/assets/img/step1.svg' }}" alt="">
                            <p class="camptonBook fw-bold text-center mt-4">Who is this treatment for?</p>
                            <div class="d-flex align-items-center flex-column">
                                <a href="{{ url('purchase-package/' . $packageDetails['id']) }}" type="button"
                                    class="btn btn-sm btn-md df-center mt-4">Myself</a>
                                <a href="{{ url('#') }}" data-bs-dismiss="modal" data-bs-toggle="modal"
                                    data-bs-target="#treatmentForModal2_{{ $packageDetails['id'] }}" type="button"
                                    class="btn btn-sm whiteBtn df-center mt-3 mb-5">Other</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade treatmentForModal2" id="treatmentForModal2_{{ $packageDetails['id'] }}"
                    tabindex="-1" aria-labelledby="treatmentForModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered position-relative">
                        <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close"> -->
                        <!-- </button> -->
                        <div class="modal-content">
                            <img class="closeModal" data-bs-dismiss="modal"
                                src="{{ 'front/assets/img/modalClose.png' }}" alt="">
                            <p class="camptonBold fs-4 fw-bold text-center mt-4">Change Patient Information</p>
                            <p class="camptonBook text-center">Fill the patient detail.</p>
                            <div class="modal-body">
                                <form id="other_form" class="row g-4">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{ $packageDetails['id'] }}">
                                    <input type="hidden" name="platform_type" value="web">
                                    <input type="hidden" name="package_buy_for" value="other">
                                    <div class="col-md-4">
                                        <label for="inputEmail4" class="form-label fw-bold">*Patient Full Name</label>
                                        <input type="email" name="patient_full_name" class="form-control  h-75"
                                            id="inputEmail4" placeholder="Full Name">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputPassword4" class="form-label fw-bold">*Relationship To
                                            You</label>
                                        <input type="text" name="patient_relation" class="form-control h-75"
                                            id="inputPassword4" placeholder="Relationship To You">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputAddress" class="form-label fw-bold">*Patient E-mail</label>
                                        <input type="email" name="patient_email" class="form-control  h-75"
                                            id="inputAddress" placeholder="Email">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputAddress" class="form-label fw-bold">*Patient Contact
                                            Number</label>
                                        <input type="email" name="patient_contact_no" class="form-control  h-75"
                                            id="inputAddress" placeholder="Contact Number">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label fw-bold">*Patient Country</label>
                                        <select name="patient_country_id" id="inputState" class="form-select h-75">
                                            <option selected>Country</option>
                                            @foreach ($counties as $country)
                                                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label fw-bold">*Patient City</label>
                                        <select name="patient_city_id" id="inputState" class="form-select h-75">
                                            <option selected>City</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $country->id }}">{{ $city->city_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <p class="mt-5 mb-0 camptonBook">*You can also change the patient information from
                                        <span class="camptonBold">panel</span> <span
                                            class="camptonBold text-green">></span> <span
                                            class="camptonBold">packages</span>
                                    </p>
                                    <div class="col-12 text-center ">
                                        <a href="javascript:void(0)" id="other" class="btn purchaseBtn my-4"
                                            style="padding: 10px 6rem">
                                            <span class="fw-bold">Step 2:</span> <span class="camptonBook">Payment
                                                Page</span>
                                        </a>
                                    </div>
                                </form>
                                <input type="hidden" value="{{ url('purchase-package/' . $packageDetails['id']) }}"
                                    id="hidden_url">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Model -->

                <div class="tab-card rounded mb-3">
                    <!-- Nav pills -->
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="pill" href="#home">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#menu1">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#menu2">Photos/Videos</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active container" id="home">
                            <div class="overview mt-4">
                                <div class="row">
                                    <div class="col-8 ps-0">
                                        <p>{{ $packageDetails['overview'] }}</p>
                                    </div>
                                    <div class="col-4 pe-0">
                                        <img src="{{ 'front/assets/img/Overview.png' }}" alt="Image">
                                    </div>
                                    <!-- <div class="col-12 px-0">
                                                                                                                    <p>

                                                                                                                    </p>
                                                                                                                </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="menu1">
                            <div class="reviews mt-4">
                                <div class="d-flex align-items-center gap-3">
                                    <p class="mb-0 fs-1 camptonBold">4,8</p>
                                    <p class="mb-0 u"><u>480 Reviews</u></p>
                                </div>
                                <div class="stars mb-5">
                                    <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 30px;"
                                        alt="">
                                    <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 30px;"
                                        alt="">
                                    <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 30px;"
                                        alt="">
                                    <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 30px;"
                                        alt="">
                                    <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 30px;"
                                        alt="">
                                </div>
                                <div class="review mb-4">
                                    <div class="mb-4">
                                        <div class="stars d-inline me-2">
                                            <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 15px;"
                                                alt="">
                                            <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 15px;"
                                                alt="">
                                            <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 15px;"
                                                alt="">
                                            <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 15px;"
                                                alt="">
                                            <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 15px;"
                                                alt="">
                                        </div>
                                        <p class="d-inline camptonBook">Lorem ipsum dolor sit, amet consectetur adipisicing
                                            elit. Dignissimos beatae quia vero eaque officia, aperiam quas accusantium neque
                                            non ducimus explicabo eligendi. Cupiditate sit recusandae tempora quia velit,
                                            asperiores odio.</p>
                                    </div>

                                    <div class="mb-4">
                                        <p class="mb-1 fs-6 camptonBold">Ali G. / <span
                                                class="fst-italic camptonBook">Heart Valve Replacement Surgery</span></p>
                                        <p class="fs-6 fst-italic">12/12/2023</p>
                                    </div>
                                </div>
                                <div class="review mb-4">
                                    <div class="mb-4">
                                        <div class="stars d-inline me-2">
                                            <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 15px;"
                                                alt="">
                                            <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 15px;"
                                                alt="">
                                            <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 15px;"
                                                alt="">
                                            <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 15px;"
                                                alt="">
                                            <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 15px;"
                                                alt="">
                                        </div>
                                        <p class="d-inline camptonBook">Lorem ipsum dolor sit, amet consectetur adipisicing
                                            elit. Dignissimos beatae quia vero eaque officia, aperiam quas accusantium neque
                                            non ducimus explicabo eligendi. Cupiditate sit recusandae tempora quia velit,
                                            asperiores odio.</p>
                                    </div>

                                    <div class="mb-4">
                                        <p class="mb-1 fs-6 camptonBold">Ali G. / <span
                                                class="fst-italic camptonBook">Heart Valve Replacement Surgery</span></p>
                                        <p class="fs-6 fst-italic">12/12/2023</p>
                                    </div>
                                </div>
                                <div class="review mb-4">
                                    <div class="mb-4">
                                        <div class="stars d-inline me-2">
                                            <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 15px;"
                                                alt="">
                                            <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 15px;"
                                                alt="">
                                            <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 15px;"
                                                alt="">
                                            <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 15px;"
                                                alt="">
                                            <img src="{{ 'front/assets/img/star-green.svg' }}" style="width: 15px;"
                                                alt="">
                                        </div>
                                        <p class="d-inline camptonBook">Lorem ipsum dolor sit, amet consectetur adipisicing
                                            elit. Dignissimos beatae quia vero eaque officia, aperiam quas accusantium neque
                                            non ducimus explicabo eligendi. Cupiditate sit recusandae tempora quia velit,
                                            asperiores odio.</p>
                                    </div>

                                    <div class="mb-4">
                                        <p class="mb-1 fs-6 camptonBold">Ali G. / <span
                                                class="fst-italic camptonBook">Heart Valve Replacement Surgery</span></p>
                                        <p class="fs-6 fst-italic">12/12/2023</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="menu2">
                            <div class="gallery">
                                <a href="{{ 'front/assets/img/galleryImg1.png' }}" class="glightbox">
                                    <img src="{{ 'front/assets/img/galleryImg1.png' }}" alt="image" />
                                </a>
                                <a href="{{ 'front/assets/img/galleryImg2.png' }}" class="glightbox">
                                    <img src="{{ 'front/assets/img/galleryImg2.png' }}" alt="image" />
                                </a>
                                <a href="{{ 'front/assets/img/galleryImg3.png' }}" class="glightbox">
                                    <img src="{{ 'front/assets/img/galleryImg3.png' }}" alt="image" />
                                </a>
                                <a href="{{ 'front/assets/img/galleryImg4.png' }}" class="glightbox">
                                    <img src="{{ 'front/assets/img/galleryImg4.png' }}" alt="image" />
                                </a>
                                <a href="{{ 'front/assets/img/galleryImg5.png' }}" class="glightbox">
                                    <img src="{{ 'front/assets/img/galleryImg5.png' }}" alt="image" />
                                </a>
                                <a href="{{ 'front/assets/img/galleryImg3.png' }}" class="glightbox">
                                    <img src="{{ 'front/assets/img/galleryImg3.png' }}" alt="image" />
                                </a>
                                <a href="{{ 'front/assets/img/galleryImg4.png' }}" class="glightbox">
                                    <img src="{{ 'front/assets/img/galleryImg4.png' }}" alt="image" />
                                </a>
                                <a href="{{ 'front/assets/img/galleryImg5.png' }}" class="glightbox">
                                    <img src="{{ 'front/assets/img/galleryImg5.png' }}" alt="image" />
                                </a>
                                <a href="{{ 'front/assets/img/galleryImg1.png' }}" class="glightbox">
                                    <img src="{{ 'front/assets/img/galleryImg1.png' }}" alt="image" />
                                </a>
                                <a href="{{ 'front/assets/img/galleryImg2.png' }}" class="glightbox">
                                    <img src="{{ 'front/assets/img/galleryImg2.png' }}" alt="image" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 3 -->
        <div class="bg-f6 scanQr">
            <img src="{{ 'front/assets/img/appScreenFooter.png' }}" alt="">
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        var baseUrl = $('#base_url').val();
        var token = "{{ Session::get('login_token') }}";

        $(document).ready(function() {

            const lightbox = GLightbox({
                ...options
            });

            $('#other').click(function(e) {
                e.preventDefault();
                $('#other_form').submit();
            });

            $('#other_form').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: baseUrl + '/api/md-change-patient-information',
                    type: 'POST',
                    data: formData,
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    success: function(response) {
                        console.log('Success:', response);
                        window.location.href = $('#hidden_url').val();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>
@endsection
