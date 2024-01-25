@extends('front.layout.layout2')
@section('content')
<style>
    .stars-div .fa {
        font-size: 20px;
    }

    .stars-div .fa-star {
        color: #4CDB06;
    }

    .stars-div .fa-star-o {
        color: #B9B9B9;
    }



    .form-group .prev-img-div img {
    height: 128px;
    width: 142px;
    object-fit: contain;
    margin-top: 15px;
    border-radius: 3px;
}

    .multiple-checkbox-div .multiple-checks {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .multiple-checkbox-div .multiple-checks .form-check {
        min-width: 200px;
    }

    .multiple-checkbox-div .multiple-checks .form-check .form-check-label svg {
        margin-right: 3px;
    }
    .form-control,
    .form-select {
        color: #000;
        font-family: "Campton" !important;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        letter-spacing: -0.64px;
    }

    select {
        color: #878787 !important;
    }
    .up-abs {
    top: 47px;
    right: 16px;
}
</style>
<div class="content-wrapper">
    <div class="container py-100px for-cards">
    <div class="d-flex gap-3">
            <div class="w-292">
                @include('front.includes.sidebar')
            </div>
            <div class="w-761">
                <div class="card mb-4">
                    <h5 class="card-header d-flex align-items-center justify-content-between mb-5">
                        <span>Add New Vehicle</span>
                        <a href="{{ url('medical-other-services') }}" class="d-flex align-items-center gap-1 text-decoration-none">
                            <img src="{{ asset('front/assets/img/backPage.png') }}" alt="">
                            <p class="mb-0 card-h1">Back</p>
                        </a>
                    </h5>
                    <div class="card-body">
                        <div class="form-div">
                            {{-- @if (!empty($transportation_details['id']))

                                <form action="{{ url('api/md-edit-transportation-details') }}" method="post"
                            enctype="multipart/form-data" id="add_acommodition">
                            @else --}}
                            <form action="{{ url('md-add-transportation-details') }}" method="post" enctype="multipart/form-data" id="add_acommodition" class="from-prevent-multiple-submits">
                                {{-- @endif --}}
                                @csrf
                                <input type="hidden" name="transportation_id" value="{{ !empty($transportation_details['id']) ? $transportation_details['id'] : '' }}">

                                <div class="input-group mb-4">
                                    <div class="form-group d-flex flex-column w-100">
                                        <label class="form-label mb-3">Vehicle Brand</label>
                                        <select id="vehicle_brand_id" name="vehicle_brand_id" class="form-select">
                                            <option value="" selected disabled>Choose</option>
                                            @foreach ($vehicle_details as $vehicle_detail)
                                            @php
                                            $isSelected = isset($transportation_details['brand_id']) && $transportation_details['brand_id'] == $vehicle_detail['id'];
                                            @endphp
                                            <option value="{{ $vehicle_detail['id'] }}" {{ $isSelected ? ' selected' : '' }}>
                                                {{ $vehicle_detail['brand_name'] }}
                                            </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="input-group mb-4">
                                    <div class="form-group d-flex flex-column w-100">
                                        <label class="form-label mb-3">Vehicle Model</label>
                                        <input type="text" class="form-control" placeholder="Enter Vehicle Model Name" name="vehicle_model_name" id="vehicle_model_name" value="{{ !empty($transportation_details['vehicle_model_name']) ? $transportation_details['vehicle_model_name'] : '' }}">


                                    </div>
                                </div>

                                <div class="input-group mb-4">
                                    <div class="form-group d-flex flex-column w-100">
                                        <label class="form-label mb-3">Comfort Level</label>

                                        <select id="comfort_level_id" name="comfort_level_id" class="form-select">
                                            <option value="" selected disabled>Choose</option>
                                            @foreach ($comfort_level_details as $comfort_level_detail)
                                            @php
                                            $isSelected = isset($transportation_details['level_id']) && $transportation_details['level_id'] == $comfort_level_detail['id'];
                                            @endphp
                                            <option value="{{ $comfort_level_detail['id'] }}" {{ $isSelected ? ' selected' : '' }}>
                                                {{ $comfort_level_detail['vehicle_level_name'] }}
                                            </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                {{-- {{dd($transportation_details)}} --}}
                                <div class="form-group mb-5 position-relative">
                                    <label class="form-label mb-3">Vehicle Picture</label>
                                    <div class="form-group mb-3">
                                        <input type="file" name="vehicle_image_path" id="vehicle_image_path" placeholder="Vehicle Picture" class="form-control text-dark" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                                        <img src="{{asset('front/assets/img/uploadType.png')}}" alt="" id="up-abs1" class="up-abs" />

                                    </div>
                                    <div class="prev-img-div">
                                        <img src="{{ !empty($transportation_details['vehicle_image_path']) ? $transportation_details['vehicle_image_path'] : 'front/assets/img/uploadHere.png' }}" alt="image" id="pic">
                                        <input type="hidden" name="old_image" id="old_image" value="{{ !empty($transportation_details['vehicle_image_path']) ? $transportation_details['vehicle_image_path'] : '' }}">
                                    </div>
                                </div>

                                <div class="form-group mb-4 section-heading-div">
                                    <label class="form-label mb-3">Vehicle Per Day Price (VAT Included)</label>
                                    <div class="input-icon-div">
                                        <input type="text" class="form-control" placeholder="0" name="vehicle_per_day_price" id="vehicle_per_day_price" value="{{ !empty($transportation_details['vehicle_per_day_price']) ? $transportation_details['vehicle_per_day_price'] : '' }}">
                                        <span class="input-icon me-4">₺</span>
                                    </div>
                                </div>
                                {{-- {{dd($transportation_details)}} --}}
                                <div class="multiple-checkbox-div mb-5">
                                    <div class="form-group d-flex flex-column">
                                        <label class="form-label mb-4">Other Services</label>
                                        <div class="multiple-checks">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" value="No Smoking" id="fornosmoking" {{ !empty($transportation_details['other_services']) && strpos($transportation_details['other_services'], 'No Smoking') !== false ? 'checked' : '' }}>
                                                <label class="form-check-label fw-500 fsb-1" for="fornosmoking">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6.66667 10.8333V14.1667M13.3333 4.16667V4.58333C13.3333 5.02536 13.5089 5.44928 13.8215 5.76184C14.134 6.07441 14.558 6.25 15 6.25C15.442 6.25 15.866 6.42559 16.1785 6.73816C16.4911 7.05072 16.6667 7.47464 16.6667 7.91667V8.33333M2.5 2.5L17.5 17.5M14.1667 10.8333H16.6667C16.8877 10.8333 17.0996 10.9211 17.2559 11.0774C17.4122 11.2337 17.5 11.4457 17.5 11.6667V13.3333C17.5 13.5667 17.4042 13.7775 17.25 13.9283M14.1667 14.1667H3.33333C3.11232 14.1667 2.90036 14.0789 2.74408 13.9226C2.5878 13.7663 2.5 13.5543 2.5 13.3333V11.6667C2.5 11.4457 2.5878 11.2337 2.74408 11.0774C2.90036 10.9211 3.11232 10.8333 3.33333 10.8333H10.8333" stroke="#111111" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    No Smoking</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" value="Wi-Fi" id="forwifi" {{ !empty($transportation_details['other_services']) && strpos($transportation_details['other_services'], 'Wi-Fi') !== false ? 'checked' : '' }}>
                                                <label class="form-check-label fw-500 fsb-1" for="forwifi">
                                                    <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_353_6343)">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4214 1.95638C11.3285 0.7545 9.75232 0 7.99998 0C6.24763 0 4.67146 0.7545 3.57859 1.95638H12.4213H12.4214ZM3.57865 9.99438C4.67152 11.1962 6.2477 11.9508 8.00004 11.9508C9.75238 11.9508 11.3286 11.1962 12.4214 9.99438H3.57865ZM2.65464 2.46444C1.18908 2.46444 0.000976562 3.65269 0.000976562 5.1185V6.83225C0.000976562 8.298 1.18908 9.48625 2.65464 9.48625H13.3453C14.8109 9.48625 15.999 8.298 15.999 6.83225V5.1185C15.999 3.65269 14.8109 2.46444 13.3453 2.46444H2.65464ZM15.726 5.08819C15.726 3.78988 14.6737 2.73744 13.3756 2.73744H10.7219C9.4238 2.73744 8.37149 3.78988 8.37149 5.08813V6.87012C8.37149 8.16844 7.31919 9.22087 6.0211 9.22087H13.3756C14.6736 9.22087 15.7259 8.16838 15.7259 6.87012V5.08813L15.726 5.08819ZM6.50641 5.24731V7.75731H7.26457V5.24731H6.50641ZM6.43055 4.45494C6.43055 4.5746 6.47808 4.68936 6.56268 4.77398C6.64728 4.85859 6.76203 4.90613 6.88168 4.90613C7.00133 4.90613 7.11607 4.85859 7.20068 4.77398C7.28528 4.68936 7.33281 4.5746 7.33281 4.45494C7.33281 4.33528 7.28528 4.22051 7.20068 4.1359C7.11607 4.05129 7.00133 4.00375 6.88168 4.00375C6.76203 4.00375 6.64728 4.05129 6.56268 4.1359C6.47808 4.22051 6.43055 4.33528 6.43055 4.45494ZM1.3733 4.09481L2.35137 7.75731H2.98067L3.7162 5.22463L4.45161 7.75737H5.10365L6.06659 4.09481H5.33106L4.77007 6.50619L4.07253 4.09481H3.39774L2.70014 6.4455L2.16946 4.09481H1.3733ZM9.57703 4.09481V7.75731H10.3807V6.32419H12.2005V5.58106H10.3807V4.83794H12.3217V4.09481H9.57703ZM12.8676 5.24738V7.75737H13.6258V5.24738H12.8676ZM12.7994 4.44737C12.7994 4.56704 12.8469 4.6818 12.9315 4.76641C13.0161 4.85103 13.1309 4.89856 13.2505 4.89856C13.3702 4.89856 13.4849 4.85103 13.5695 4.76641C13.6541 4.6818 13.7016 4.56704 13.7016 4.44737C13.7016 4.32771 13.6541 4.21295 13.5695 4.12834C13.4849 4.04372 13.3702 3.99619 13.2505 3.99619C13.1309 3.99619 13.0161 4.04372 12.9315 4.12834C12.8469 4.21295 12.7994 4.32771 12.7994 4.44737Z" fill="black" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_353_6343">
                                                                <rect width="16" height="12" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                    Wi-Fi</label>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <p>Checked Values: <span id="checkedValues"></span></p> --}}
                                    <input type="hidden" name="other_services" id="other_services" value="{{ !empty($hotel_details['other_services']) ? $hotel_details['other_services'] : '' }}">
                                    <input type="hidden" name="button_type" id="button_type" value="active">
                                    <input type="hidden" name="platform_type" id="platform_type" value="web">
                                </div>

                                <div class="section-btns mb-4 d-flex gap-3">
                                    <button type="submit" name="button_type" value="active" class="btn save-btn-black text-black bg-green w-50 camptonBold from-prevent-multiple-submits">Save Vehicle</button>
                                    <button type="submit" name="button_type" value="inactive" class="btn save-btn-black w-50 camptonBold from-prevent-multiple-submits">Deactive Vehicle</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery Validate plugin -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>
    $(".mpOtherServicesLi").addClass("activeClass");
    $(".mpOtherServices").addClass("md-active");
</script>
<script>
    (function() {
        $('.from-prevent-multiple-submits').on('submit', function() {
            $('.from-prevent-multiple-submits').attr('disabled', 'true');
            setTimeout(function() {
                $('.from-prevent-multiple-submits').attr('disabled', false);
            }, 3000);
        })
    })();
</script>

<script>
    $(document).ready(function() {
        function updateCheckedValues() {
            const checkedValues = $('.form-check-input:checked').map(function() {
                return $(this).val();
            }).get().join(', ');
            $('#checkedValues').text(checkedValues);
            $('#other_services').val(checkedValues);
        }
        $('.form-check-input').change(updateCheckedValues);
        updateCheckedValues();
    });
</script>

<script>
    $(document).ready(function() {
        $('#add_acommodition').validate({
            rules: {
                vehicle_brand_id: {
                    required: true
                },
                vehicle_model_name: {
                    required: true
                },
                comfort_level_id: {
                    required: true
                },
                vehicle_per_day_price: {
                    required: true,
                    number: true
                }
                // Add rules for other fields if needed
            },
            messages: {
                vehicle_brand_id: {
                    required: "Please select a vehicle brand"
                },
                vehicle_model_name: {
                    required: "Please enter the vehicle model name"
                },
                comfort_level_id: {
                    required: "Please select a comfort level"
                },
                vehicle_per_day_price: {
                    required: "Please enter the vehicle per day price",
                    number: "Please enter a valid number"
                }
                // Add custom error messages for other fields if needed
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid').addClass('is-valid');
            },
            submitHandler: function(form) {
                // If the form is valid, you can submit it
                form.submit();
            }
        });
    });
</script>
@endsection