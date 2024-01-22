@extends('front.layout.layout2')
@section('content')
<style>
    .greenCheck input[type="checkbox"],
    .greenCheck input[type="checkbox"]::before {
        border-radius: 50% !important;
        height: 12px;
        width: 12px;
    }

    .purchaseBtn {
        width: 195px;
        height: 41px;
        flex-shrink: 0;
        color: #000;
        font-family: Campton;
        font-size: 14px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        letter-spacing: -0.56px;
    }

    .red {
        color: red;
    }

    body {
        background-color: #F6F6F6;
        background: #F6F6F6;
    }

    .form-floating>label {
        padding: 0.75rem 0.75rem;
    }

    .packageResult,
    .tab-card {
        padding: 18px 32px;
        border-radius: 5px;
    }

    .scanQr {
        height: 60vh;
    }

    .treatmentForModal2 .form-control,
    .treatmentForModal2 .form-select {
        border: 2px solid #d6d6d6;
    border-radius: 5px;
    padding: 10px 16px;
    height: 48px;
    font-size: 16px;
    }
</style>
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

    if (Session::get('login_token') != null) {
    $user = true;
    } else {
    $user = false;
    }

    if (Session::get('MDCustomer*%') != null) {
    $isCustomer = true;
    } else {
    $isCustomer = false;
    }

    if (!function_exists('extractNumericRange')) {
    function extractNumericRange($inputString)
    {
    // Use regular expression to match the numeric range
    preg_match('/\b\d+-\d+\b/', $inputString, $matches);

    // Check if a match is found
    if (!empty($matches)) {
    return $matches[0];
    }

    // Return null if no match is found
    return null;
    }
    }
    // dd($provider_gallery);
    @endphp

    <!-- SECTION 1 -->
    <div class="searchBar backBtn bg-f6">
        <div class="container pt-5 px-0">
            <a href="#" onclick="window.history.back()" class="d-flex align-items-center mb-5 gap-2">
                <img src="{{ 'front/assets/img/ArrowLeftCircle.png' }}" alt="" style="width:25px">
                <p class="mb-0 back-treat">Back Treatments</p>
            </a>
            <div class="packageResult package-results-div mb-3 position-relative">
                <div>
                    <div class="d-flex gap-4 align-items-center mb-2">
                        <p class="mb-0 card-h4">
                            {{ !empty($packageDetails['package_name']) ? $packageDetails['package_name'] : '' }}
                        </p>
                        <img src="{{ 'front/assets/img/verifiedBy.svg' }}" alt="">
                    </div>
                    <div class="d-flex gap-5 mb-4">
                        <div class="d-flex gap-2 align-items-center">
                            <img src="{{ 'front/assets/img/Location.svg' }}" alt="">
                            <p class="mb-0 card-p1 fst-italic">
                                {{ !empty($packageDetails['city_name']) ? $packageDetails['city_name'] : '' }}
                            </p>
                        </div>
                        <div class="d-flex align-items-center gap-1">
                            <img src="{{ 'front/assets/img/Diaganose.svg' }}" alt="">
                            <p class="mb-0 card-p1 fst-italic">
                                {{ !empty($packageDetails['treatment_period_in_days']) ? 'Treatment Period ' .extractNumericRange($packageDetails['treatment_period_in_days']) . ' Days' : '' }}
                            </p>
                        </div>
                    </div>
                    <div class="d-flex gap-4 package-results-details">
                        <div class="brdr-right">
                            <p class="packageResult-title mb-3">Package Includes</p>
                            @if (!empty($packageDetails['other_services']))
                            @foreach ($packageDetails['other_services'] as $service)
                            @if (!empty($service))
                            <div class="d-flex gap-1 align-items-baseline mb-1 packageservices-list">
                                <img style="width: 11px;" src="{{ 'front/assets/img/Varlik.svg' }}" alt="">
                                <p class="mb-2 card-p1">{{ $service }}</p>
                            </div>
                            @endif
                            @endforeach
                            @endif
                        </div>
                        <div class="brdr-right">
                            <p class="packageResult-title mb-2">Reviews <span class=""> (0)</span></p>
                            <div class="stars d-flex gap-2 mb-2">
                                <i class="fa fa-star text-green"></i>
                                <i class="fa fa-star text-green"></i>
                                <i class="fa fa-star text-green"></i>
                                <i class="fa fa-star text-green"></i>
                                <i class="fa fa-star text-green"></i>
                            </div>
                            <p class="card-h3 review-type">Excellent</p>
                        </div>
                        <div class="d-flex flex-column align-items-end gap-4 ">
                            <div>
                                <p class="packageResult-title mb-3">Package Price</p>
                                <div class="my-2">
                                    <p class="mb-2 card-h4">
                                        {{ !empty($packageDetails['sale_price']) ? $packageDetails['sale_price'] : '' }}
                                        <span class="lira">₺</span>
                                        <span class="card-h1">*{{ '(' . get_twenty_percent(!empty($packageDetails['sale_price']) ? $packageDetails['sale_price'] : 0) . ' ₺)' }}</span>
                                    </p>
                                    <p class=" mb-3 camptonBook packageResult-offer">*20% of the price is paid before
                                        booking.</p>
                                </div>
                                <div class="d-flex gap-2 mb-2">
                                    @if ($isCustomer == true && $user == true)
                                    <button class="btn purchaseBtn" id="{{ $packageDetails['id'] }}">Purchase
                                        Package</button>
                                    <button class="favouriteBtn" id="fav-btn_{{ $packageDetails['id'] }}">
                                        <img src="{{ 'front/assets/img/white-heart.svg' }}" alt="">
                                    </button>
                                    @elseif($user == false)
                                    <button class="btn purchaseBtn" id="{{ $packageDetails['id'] }}">Purchase
                                        Package</button>
                                    <button class="favouriteBtn" id="fav-btn_{{ $packageDetails['id'] }}">
                                        <img src="{{ 'front/assets/img/white-heart.svg' }}" alt="">
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade treatmentForModal" id="treatmentForModal_{{ $packageDetails['id'] }}" tabindex="-1" aria-labelledby="treatmentForModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered position-relative">
                    <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close"> -->
                    <!-- </button> -->
                    <div class="modal-content">
                        <img class="closeModal" data-bs-dismiss="modal" src="{{ 'front/assets/img/closeModal.png' }}" alt="">
                        <img src="{{ 'front/assets/img/step1.svg' }}" alt="">
                        <p class="camptonBook fw-bold text-center mt-4">Who is this treatment for?</p>
                        <div class="d-flex align-items-center flex-column">
                            <a href="{{ url('myself_as_patient/' . $packageDetails['id']) }}" type="button" class="btn btn-sm btn-md df-center mt-4">Myself</a>
                            <a href="{{ url('#') }}" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#treatmentForModal2_{{ $packageDetails['id'] }}" type="button" class="btn btn-sm whiteBtn df-center mt-3 mb-5">Other</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade treatmentForModal2" id="treatmentForModal2_{{ $packageDetails['id'] }}" tabindex="-1" aria-labelledby="treatmentForModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered position-relative" style="width:704px">
                    <div class="modal-content p-3">
                    <div>
                <div class="text-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <!-- <img src="{{ 'front/assets/img/modalClose.png' }}" alt=""> -->
                    </button>
                </div>

                <div class="text-center" style="margin-top: -8px;">
                    <h4 class="modal-title  modal-h1 mb-2" id="exampleModalLabel">Change Patient Information</h4>
                    <p class="mb-4 card-p2">Fill the form & get your desired treatment plan</p>
                </div>
            </div>
                        <!-- <img class="closeModal" data-bs-dismiss="modal" src="{{ 'front/assets/img/modalClose.png' }}" alt="">
                        <p class="modal-h1 mt-4 text-center">Change Patient Information</p>
                        <p class="card-p1 text-center">Fill the patient detail.</p> -->
                        <div class="modal-body">
                            <form id="other_form" class="row g-4">
                                @csrf
                                <input type="hidden" name="package_id" value="{{ $packageDetails['id'] }}">
                                <input type="hidden" name="platform_type" value="web">
                                <input type="hidden" name="package_buy_for" value="other">
                                <div class="col-md-4">
                                    <label for="patient_full_name" class="form-label fw-bold">*Patient Full
                                        Name</label>
                                    <input type="text" name="patient_full_name" class="form-control  " id="patient_full_name" placeholder="Full Name">
                                </div>
                                <div class="col-md-4">
                                    <label for="patient_relation" class="form-label fw-bold">*Relationship To
                                        You</label>
                                    <input type="text" name="patient_relation" class="form-control " id="patient_relation" placeholder="Relationship To You">
                                </div>
                                <div class="col-md-4">
                                    <label for="patient_email" class="form-label fw-bold">*Patient E-mail</label>
                                    <input type="email" name="patient_email" class="form-control  " id="patient_email" placeholder="Email">
                                </div>
                                <div class="col-md-4">
                                    <label for="patient_contact_no" class="form-label fw-bold">*Patient Contact
                                        Number</label>
                                    <input type="tel" name="patient_contact_no" class="form-control  " id="patient_contact_no" placeholder="Contact Number">
                                </div>

                                <div class="col-md-4">
                                    <label for="patient_country_id" class="form-label fw-bold">*Patient
                                        Country</label>
                                    <select name="patient_country_id" id="patient_country_id" class="form-select ">
                                        <option value="" selected>Country</option>
                                        @foreach ($counties as $country)
                                        <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="patient_city_id" class="form-label fw-bold">*Patient City</label>
                                    <select name="patient_city_id" id="patient_city_id" class="form-select ">
                                        <option value="" selected>City</option>
                                        @foreach ($cities as $city)
                                        <option value="{{ $country->id }}">{{ $city->city_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <p class="mt-5 mb-0 camptonBook">*You can also change the patient information from
                                    <span class="camptonBold">panel</span> <span class="camptonBold text-green">></span> <span class="camptonBold">packages</span>
                                </p>
                                <div class="col-12 df-center">
                                    <a href="javascript:void(0)" id="other" class="btn purchaseBtn my-4 df-center">
                                        <span class="fw-bold">Step 2:</span> <span class="camptonBook">Payment
                                            Page</span>
                                    </a>
                                </div>
                            </form>
                            <input type="hidden" value="{{ url('purchase-package/' . $packageDetails['id']) }}" id="hidden_url">
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Model -->

            <div class="tab-card rounded mb-3">
                <!-- Nav pills -->
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link card-p1 active" data-bs-toggle="pill" href="#home">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link card-p1" data-bs-toggle="pill" href="#menu1">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link card-p1" data-bs-toggle="pill" href="#menu2">Photos/Videos</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active container" id="home">
                        <div class="overview mt-4">
                            <div class="row">
                                <div class="col-12 ps-0">
                                    <p>{{ !empty($packageDetails['overview']) ? $packageDetails['overview'] : '' }}</p>
                                </div>
                                {{-- <div class="col-4 pe-0">
                                        <img src="{{ 'front/assets/img/Overview.png' }}" alt="Image">
                            </div> --}}
                            <!-- <div class="col-12 px-0">
                                                                                                                                                                                                                                                                            <p>

                                                                                                                                                                                                                                                                            </p>
                                                                                                                                                                                                                                                                        </div> -->
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="menu1">
                    <div class="reviews mt-4 mb-5">
                        <div class="d-flex align-items-center gap-3">
                            <p class="mb-0 fs-1 camptonBold">4,8</p>
                            <p class="mb-2 card-p1"><u>480 Reviews</u></p>
                        </div>
                        <div class="stars d-flex gap-2 mb-5">
                            <i class="fa fa-star text-green"></i>
                            <i class="fa fa-star text-green"></i>
                            <i class="fa fa-star text-green"></i>
                            <i class="fa fa-star text-green"></i>
                            <i class="fa fa-star text-green"></i>
                        </div>
                        <div class="review mb-4">
                            <div class="mb-4">
                                <div class="stars d-inline gap-1 me-2">
                                    <i class="fa fa-star text-green"></i>
                                    <i class="fa fa-star text-green"></i>
                                    <i class="fa fa-star text-green"></i>
                                    <i class="fa fa-star text-green"></i>
                                    <i class="fa fa-star text-dark"></i>
                                </div>
                                <p class="d-inline card-p1">Lorem ipsum dolor sit, amet consectetur adipisicing
                                    elit. Dignissimos beatae quia vero eaque officia, aperiam quas accusantium neque
                                    non ducimus explicabo eligendi. Cupiditate sit recusandae tempora quia velit,
                                    asperiores odio.</p>
                            </div>

                            <div class="mb-4">
                                <p class="mb-1 fs-6 camptonBold reviewauthor">Ali G. / <span class="fst-italic camptonBook">Heart Valve Replacement Surgery</span></p>
                                <p class="fs-6 fst-italic reviewdate">12/12/2023</p>
                            </div>
                        </div>
                        <div class="review mb-4">
                            <div class="mb-4">
                                <div class="stars d-inline gap-1 me-2">
                                    <i class="fa fa-star text-green"></i>
                                    <i class="fa fa-star text-green"></i>
                                    <i class="fa fa-star text-green"></i>
                                    <i class="fa fa-star text-green"></i>
                                    <i class="fa fa-star text-dark"></i>
                                </div>
                                <p class="d-inline camptonBook">Lorem ipsum dolor sit, amet consectetur adipisicing
                                    elit. Dignissimos beatae quia vero eaque officia, aperiam quas accusantium neque
                                    non ducimus explicabo eligendi. Cupiditate sit recusandae tempora quia velit,
                                    asperiores odio.</p>
                            </div>

                            <div class="mb-4">
                                <p class="mb-1 fs-6 camptonBold reviewauthor">Ali G. / <span class="fst-italic camptonBook">Heart Valve Replacement Surgery</span></p>
                                <p class="fs-6 fst-italic reviewdate">12/12/2023</p>
                            </div>
                        </div>
                        <div class="review mb-4">
                            <div class="mb-4">
                                <div class="stars d-inline gap-1 me-2">
                                    <i class="fa fa-star text-green"></i>
                                    <i class="fa fa-star text-green"></i>
                                    <i class="fa fa-star text-green"></i>
                                    <i class="fa fa-star text-green"></i>
                                    <i class="fa fa-star text-dark"></i>
                                </div>
                                <p class="d-inline camptonBook">Lorem ipsum dolor sit, amet consectetur adipisicing
                                    elit. Dignissimos beatae quia vero eaque officia, aperiam quas accusantium neque
                                    non ducimus explicabo eligendi. Cupiditate sit recusandae tempora quia velit,
                                    asperiores odio.</p>
                            </div>

                            <div class="mb-4">
                                <p class="mb-1 fs-6 camptonBold reviewauthor">Ali G. / <span class="fst-italic camptonBook">Heart Valve Replacement Surgery</span></p>
                                <p class="fs-6 fst-italic reviewdate">12/12/2023</p>
                            </div>
                        </div>
                    </div>
                    <div class="reviews-button m-5 pt-5 pb-2">
                        <ul class="pagination p-0 border-0 justify-content-center gap-1">
                            <li class="page-item active"><a class="page-link " href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade" id="menu2">
                    @if (!empty($provider_gallery))
                    <div class="gallery">
                        @foreach ($provider_gallery as $image)
                        <a href="{{ $image }}" class="glightbox">
                            <img src="{{ $image }}" alt="image" />
                        </a>
                        @endforeach
                    </div>
                    @endif
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

<div class="modal fade loginFirstModal" id="loginFirstModal" tabindex="-1" aria-labelledby="serviceForModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered position-relative">
        <!-- <button type="button" data-bs-dismiss="modal" aria-label="Close"> -->
        <!-- </button> -->
        <div class="modal-content bg-f6">
            <img class="closeModal" data-bs-dismiss="modal" src="{{ 'front/assets/img/closeModal.png' }}" alt="">
            <img src="{{ 'front/assets/img/Oops.svg' }}" alt="">
            <div class="d-flex align-items-center flex-column">
                <p class="camptonBook fw-bold text-center mt-4">Excited to explore more? It's time to join <span class="camptonBold">MD</span> family.</p>
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript">
    var baseUrl = $('#base_url').val();
    var token = "{{ Session::get('login_token') }}";

    $(document).ready(function() {

        // const lightbox = GLightbox({
        //     ...options
        // });
        var user = "{{ $user }}";
        var baseUrl = $('#base_url').val();
        var token = "{{ Session::get('login_token') }}";
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $('#other').click(function(e) {
            e.preventDefault();
            $('#other_form').submit();
        });

        $('#other_form').validate({
            rules: {
                patient_full_name: {
                    required: true,
                },
                patient_relation: {
                    required: true,
                },
                patient_email: {
                    required: true,
                    email: true,
                },
                patient_contact_no: {
                    required: true,
                },
                patient_country_id: {
                    required: true,
                },
                patient_city_id: {
                    required: true,
                },

            },
            messages: {
                patient_full_name: {
                    required: "Please enter patient full name",
                },
                patient_relation: {
                    required: "Please enter patient relation",
                },
                patient_email: {
                    required: "Please enter patient email",
                },
                patient_contact_no: {
                    required: "Please enter patient contact no",
                },
                patient_country_id: {
                    required: "Please select patient country",
                },
                patient_city_id: {
                    required: "Please select patient city",
                },

            },
            submitHandler: function(form) {
                var formData = $(form).serialize();
                $.ajax({
                    url: baseUrl + '/api/md-change-patient-information',
                    type: 'POST',
                    data: formData,
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'X-CSRF-TOKEN': csrfToken
                    },
                    beforeSend: function() {
                        $('#other').attr('disabled', true);
                        $('#other').html(
                            '<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Please Wait...'
                        );
                    },
                    success: function(response) {
                        $('#other').attr('disabled', false);
                        // $('#other').html('<span class="fw-bold">Step 2:</span> <span class="camptonBook">Payment Page</span>');
                        console.log('Success:', response);
                        var url = $('#hidden_url').val() + '/' + response.id.patient_id;

                        window.location.href = url;
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
                return false;
            }
        });


        $('.favouriteBtn').on('click', function() {

            if (user == '1') {

                var packageId = $(this).attr('id').split("_")[1];
                // alert(packageId);
                var formData = new FormData();
                formData.append('package_id', packageId);

                $.ajax({
                    url: baseUrl + '/api/md-add-package-to-favourite',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'X-CSRF-TOKEN': csrfToken
                    },
                    beforeSend: function() {
                        $('#fav-btn' + packageId).attr('disabled', true);
                        $('#fav-btn' + packageId).html(
                            '<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>'
                        );
                    },
                    success: function(response) {
                        $('#fav-btn' + packageId).attr('disabled', false);
                        $('#other').html(
                            '<img src="front/assets/img/white-heart.svg" alt="">');
                        console.log('Success:', response);

                    },
                    error: function(xhr, status, error) {
                        $('#fav-btn' + packageId).attr('disabled', false);
                        $('#other').html(
                            '<img src="front/assets/img/white-heart.svg" alt="">');
                        alert('Error:', error);
                    }
                });
            } else {
                $('#loginFirstModal').modal('show');
            }
        });


        $('.purchaseBtn').click(function(e) {
            e.preventDefault();
            // alert('hi');

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

    });
</script>
@endsection