@extends('front.layout.layout2')
@section('content')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link rel="stylesheet" href="{{ URL::asset('admin/commonarea/plugins/summernote/summernote.css') }}">
<style>
    .form-control::placeholder {
        font-family: "Campton";
    }

    .form-select,
    .form-control {
        color: #000;
        font-family: CamptonBook !important;
        font-size: 16px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        letter-spacing: -0.64px;
    }

    #pic2 {
        height: 150px;
    }

    .video-div {
        height: 100px;
        width: 175px;
        margin-top: 15px;
    }

    .prev-img-div.video-card i {
        position: absolute;
        top: 50%;
        bottom: 50%;
        left: 50%;
        right: 50%;
        font-size: 45px;
        border-radius: initial;
        display: flex;
        align-items: center;
        justify-content: space-around;
    }

    .multiple-upload-images .preview-img {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .multiple-upload-images .preview-img .prev-img-div img {
        height: 100px;
        width: 140px;
        object-fit: contain;
        margin-top: 15px;
    }

    .form-group .prev-img-div img {
        height: 150px;
        width: auto;
        object-fit: contain;
        margin-top: 15px;
        border-radius: 3px;
    }

    .prev-img-div img {
        height: 150px;
        width: auto;
        object-fit: contain;
        margin-top: 15px;
        border-radius: 3px;
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
                        <span>Account</span>
                    </h5>
                    <div class="card-body">
                        <div class="form-div">
                            <form action="{{ url('md-update-medical-profile') }}" method="post" enctype="multipart/form-data" id="accountmedpro" class="from-prevent-multiple-submits">
                                @csrf
                                <div class="form-group mb-4">
                                    <label class="form-label mb-3">Company Name</label>
                                    <input type="text" name="company_name" value="{{ $medical_provider_list->company_name }}" class="form-control" id="company_name" aria-describedby="foodname" placeholder="Memorial Hospitals Ltd. Sti.">
                                </div>

                                <div class="form-group mb-4">
                                    <label class="form-label mb-3">Company Address</label>
                                    <input type="text" name="company_address" value="{{ $medical_provider_list->company_address }}" class="form-control" id="company_address" aria-describedby="foodname" placeholder="Company Full Address">
                                </div>

                                <div class="input-group mb-4 d-flex justify-content-between">
                                    <div class="form-group d-flex flex-column w-50 pe-2">
                                        <label class="form-label mb-3">Country</label>
                                        <select name="country_id" id="country_id" class="form-select">
                                            @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" {{ $country->id == $medical_provider_list->country_id ? 'selected' : '' }}>
                                                {{ $country->country_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group d-flex flex-column w-50 ps-2">
                                        <label class="form-label mb-3">City</label>
                                        <select name="city_id" id="city_id" class="form-select">
                                            @foreach ($cities as $city)
                                            <option value="{{ $city->id }}" {{ $city->id == $medical_provider_list->city_id ? 'selected' : '' }}>
                                                {{ $city->city_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="form-label mb-3">TAX Number</label>
                                    <input type="text" name="tax_no" value="{{ $medical_provider_list->tax_no }}" class="form-control" id="tax_no" aria-describedby="foodname" placeholder="TAX Number">
                                </div>

                                <div class="form-group mb-4">
                                    <label class="form-label mb-3">Authorized Person Full Name</label>
                                    <input type="text" name="authorisation_full_name" value="{{ $medical_provider_list->authorisation_full_name }}" class="form-control" id="authorisation_full_name" aria-describedby="foodname" placeholder="Authorized Person Full Name">
                                </div>

                                <div class="form-group mb-4">
                                    <label class="form-label mb-3">Company Email</label>
                                    <input type="text" name="email" value="{{ $medical_provider_list->email }}" class="form-control" id="email" aria-describedby="foodname" placeholder="Company Full Address">
                                </div>



                                <div class="form-group mb-4">
                                    <label class="form-label mb-3">Authorized Person Mobile Contact</label>
                                    <input type="text" name="mobile_no" value="{{ $medical_provider_list->mobile_no }}" class="form-control" id="foodname" aria-describedby="foodname" placeholder="+90">
                                </div>

                                {{-- <div class="form-group mb-4">
                                    <label class="form-label mb-3">Company Overview</label>
                                    <textarea class="form-control" name="company_overview" value="" id="company_overview" rows="4" style="height: 150px;" placeholder="Company Overview" data-gramm="false" wt-ignore-input="true">{{ $medical_provider_list->company_overview }}</textarea>


                        </div> --}}


                        <div class="form-group mb-4">
                            <label class="form-label mb-3">Company Overview</label>
                            <textarea class="form-control summernote summernote-1" name="company_overview" id="company_overview" rows="4" style="height: 150px;" placeholder="Company Overview" data-gramm="false" wt-ignore-input="true">{{ $medical_provider_list->company_overview }}</textarea>
                        </div>





                        <div class="multiple-upload-images">
                            <h6 class="section-heading">Company Logo</h6>
                            <div class="form-group my-3">
                                <input type="file" id="company_logo_image_path" class="form-control" name="company_logo_image_path" oninput="pic1.src=window.URL.createObjectURL(this.files[0])">
                            </div>
                            <div class="prev-img-div">
                                <img src="{{ !empty($MedicalProviderLogo['company_logo_image_path']) &&
                                            Storage::exists($MedicalProviderLogo['company_logo_image_path'])
                                                ? url('/') . Storage::url($MedicalProviderLogo['company_logo_image_path'])
                                                : URL::asset('front/assets/img/default-img.png') }}" {{-- 
                                            src="{{ !empty($MedicalProviderLogo['company_logo_image_path']) ? $MedicalProviderLogo['company_logo_image_path'] : 'front/assets/img/default-img.png' }}" --}} alt="image" id="pic1">
                                <input type="hidden" name="old_image" id="old_image" value="{{ !empty($MedicalProviderLogo['company_logo_image_path']) ? $MedicalProviderLogo['company_logo_image_path'] : '' }}">
                            </div>

                        </div>
                        {{-- {{dd($MedicalProviderLogo)}} --}}
                        <div class="multiple-upload-images">
                            <h6 class="section-heading">Company License</h6>
                            <div class="form-group my-3">
                                <input type="file" id="company_licence_image_path" class="form-control" name="company_licence_image_path" oninput="pic2.src=window.URL.createObjectURL(this.files[0])">
                            </div>
                            <div class="prev-img-div">
                                <img src="{{ !empty($MedicalProviderLicense['company_licence_image_path']) &&
                                            Storage::exists($MedicalProviderLicense['company_licence_image_path'])
                                                ? url('/') . Storage::url($MedicalProviderLicense['company_licence_image_path'])
                                                : URL::asset('front/assets/img/default-img.png') }}" {{-- mpany_licence_image_path'] : 'front/assets/img/default-img.png' }}" --}} alt="image" id="pic2">
                                <input type="hidden" name="old_image" id="old_image" value="{{ !empty($MedicalProviderLicense['company_licence_image_path']) ? $MedicalProviderLicense['company_licence_image_path'] : '' }}">
                            </div>
                        </div>

                        <div class="multiple-upload-images">
                            <h6 class="section-heading">Product Pictures</h6>
                            <div class="form-group">
                                <input type="file" id="provider_image_path" class="form-control" name="provider_image_path[]" multiple="">
                            </div>
                            <div class="preview-img gallery d-flex flex-wrap gap-3 ">

                                @foreach ($ProviderImagesVideos as $ProviderImagesVideo)
                                @php
                                $fileExtension = pathinfo($ProviderImagesVideo->provider_image_path, PATHINFO_EXTENSION);
                                @endphp

                                @if ($fileExtension === 'mp4')
                                <div class="prev-img-div" id="img_div_{{ $ProviderImagesVideo->id }}">
                                    <a href="{{ !empty($ProviderImagesVideo->provider_image_path) 
                                                                        ? url('/') . Storage::url($ProviderImagesVideo->provider_image_path)
                                                                        : '' }}" class="glightbox" >

                                        <video width="320" height="240" controls autoplay>
                                            <source src="{{ !empty($ProviderImagesVideo->provider_image_path) &&
                                                                    Storage::exists($ProviderImagesVideo->provider_image_path)
                                                                        ? url('/') . Storage::url($ProviderImagesVideo->provider_image_path)
                                                                        : '' }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </a>
                                    <a href="javascript:void(0);" onclick="deleteClientLogo({{ $ProviderImagesVideo->id }})" class="clear-btn">
                                        <div>X</div>
                                    </a>
                                </div>
                                <!-- <a href="{{ URL::asset($ProviderImagesVideo->provider_image_path) }}"
                                                        class="glightbox">
                                                        <div class="prev-img-div video-card"
                                                            id="img_div_{{ $ProviderImagesVideo->id }}">
                                                            <video class="video-div " controls>
                                                                <source
                                                                    src="{{ !empty($ProviderImagesVideo->provider_image_path) &&
                                                                    Storage::exists($ProviderImagesVideo->provider_image_path)
                                                                        ? url('/') . Storage::url($ProviderImagesVideo->provider_image_path)
                                                                        : '' }}"
                                                                    type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                    </a> -->

                                <!-- </div> -->
                                @else

                                <div class="prev-img-div" id="img_div_{{ $ProviderImagesVideo->id }}">
                                <a href="{{ !empty($ProviderImagesVideo->provider_image_path) &&
                                                                    Storage::exists($ProviderImagesVideo->provider_image_path)
                                                                        ? url('/') . Storage::url($ProviderImagesVideo->provider_image_path)
                                                                        : '' }}" class="glightbox" >
                                    <img src="{{ !empty($ProviderImagesVideo->provider_image_path) &&
                                                                    Storage::exists($ProviderImagesVideo->provider_image_path)
                                                                        ? url('/') . Storage::url($ProviderImagesVideo->provider_image_path)
                                                                        : '' }}" alt="image" />
                                </a>

                                <!-- <a href="{{ !empty($ProviderImagesVideo->provider_image_path) &&
                                            Storage::exists($ProviderImagesVideo->provider_image_path)
                                                ? url('/') . Storage::url($ProviderImagesVideo->provider_image_path)
                                                : '' }}"
                                                class="glightbox">
                                                <img src="{{ !empty($ProviderImagesVideo->provider_image_path) &&
                                                Storage::exists($ProviderImagesVideo->provider_image_path)
                                                    ? url('/') . Storage::url($ProviderImagesVideo->provider_image_path)
                                                    : '' }}"
                                                    alt="{{ !empty($ProviderImagesVideo->provider_image_name) ? $ProviderImagesVideo->provider_image_name : '' }}" />
                                            </a> -->
                                <a href="javascript:void(0);" class="clear-btn" onclick="deleteClientLogo({{ $ProviderImagesVideo->id }})">
                                    <div>X</div>
                                </a>
                                </div>
                                @endif
                                @endforeach

                            </div>

                        </div>

                        <div class="section-btns mb-4">
                            <button type="submit" id="medproacc" class="btn save-btn-black from-prevent-multiple-submits" onclick="disableButtonAndCallback()">Save
                                Changes</button>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label fst-italic fsb-2">*Please make sure the photo/video meets
                                the MDhealth policy.</label>
                        </div>

                        </form>
                    </div>
                </div>

                {{-- <div class="multiple-upload-images">
                            <h6 class="section-heading">Product Pictures</h6>
                            <div class="form-group">
                                <input type="file" id="provider_image_path" class="form-control" name="provider_image_path[]" multiple="">
                            </div>
                            <div class="preview-img gallery">

                                @foreach ($ProviderImagesVideos as $ProviderImagesVideo)
                                @php
                                $fileExtension = pathinfo($ProviderImagesVideo->provider_image_path, PATHINFO_EXTENSION);
                                @endphp

                                @if ($fileExtension === 'mp4')
                                <div class="prev-img-div video-card" id="img_div_{{ $ProviderImagesVideo->id }}">
                <video class="video-div" controls>
                    <source src="{{ !empty($ProviderImagesVideo->provider_image_path) &&
                                                                Storage::exists($ProviderImagesVideo->provider_image_path)
                                                                    ? url('/') . Storage::url($ProviderImagesVideo->provider_image_path)
                                                                    : '' }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <a href="javascript:void(0);" onclick="deleteClientLogo({{ $ProviderImagesVideo->id }})" class="clear-btn">
                    <div>X</div>
                </a>
            </div>
            @else
            <div class="prev-img-div" id="img_div_{{ $ProviderImagesVideo->id }}">
                <a href="{{ !empty($ProviderImagesVideo->provider_image_path) &&
                                                        Storage::exists($ProviderImagesVideo->provider_image_path)
                                                            ? url('/') . Storage::url($ProviderImagesVideo->provider_image_path)
                                                            : '' }}" class="glightbox">
                    <img src="{{ !empty($ProviderImagesVideo->provider_image_path) &&
                                                            Storage::exists($ProviderImagesVideo->provider_image_path)
                                                                ? url('/') . Storage::url($ProviderImagesVideo->provider_image_path)
                                                                : '' }}" alt="{{ !empty($ProviderImagesVideo->provider_image_name) ? $ProviderImagesVideo->provider_image_name : '' }}" />
                </a>
                <a href="javascript:void(0);" class="clear-btn" onclick="deleteClientLogo({{ $ProviderImagesVideo->id }})">
                    <div>X</div>
                </a>
            </div>
            @endif
            @endforeach

        </div>

    </div> --}}

    {{-- <div class="section-btns mb-4">
                            <button type="submit" id="medproacc" class="btn save-btn-black from-prevent-multiple-submits">Save
                                Changes</button>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label fst-italic fsb-2">*Please make sure the photo/video meets
                                the MDhealth policy.</label>
                        </div>

                        </form>
                    </div>
                </div> --}}
</div>
</div>
</div>
</div>
</div>
@endsection

@section('script')
<script>
    tinymce.init({
        selector: 'textarea#company_overview'
    });
</script>
{{-- <script>
    $(document).ready(function() {
        $('#company_overview').summernote({
            height: 150 
        });
    });
</script> --}}

<script src="{{ URL::asset('admin/commonarea/plugins/summernote/summernote.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.summernote-1').summernote({
            height: 200,
        }).on('summernote.keyup', function() {
            var text = $(".summernote-1").summernote("code").replace(/&nbsp;|<\/?[^>]+(>|$)/g, "")
                .trim();
            //alert(text);
            if (text.length == 0) {
                $('.section_1_description-error').show();
            } else {
                $('.section_1_description-error').hide();
            }
        });
    });
</script>




<script>
    $(".mpAccountLi").addClass("activeClass");
    $(".mpAccount").addClass("md-active");
</script>
<script type="text/javascript">
    const lightbox = GLightbox({
        ...options
    });
</script>
<!-- CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<!-- JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
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
    function deleteClientLogo(client_logo_id) {

        if (client_logo_id != "") {
            if (confirm("Do you really want to delete this image ?")) {
                $.ajax({
                    url: base_url + "/md-delete-provider-images-videos",
                    // url: "http://127.0.0.1:8000/md-delete-provider-images-videos",

                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    type: "POST",
                    data: {
                        provider_id: client_logo_id
                    },
                    success: function(response) {
                        if (response.status == 200) {
                            $('#img_div_' + client_logo_id).css('display', 'none');

                            toastr.options = {
                                "positionClass": "toast-bottom-right",
                                "timeOut": "5000",
                            };

                            toastr.success(response.message);


                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function(response) {
                        console.log("Error:", response);
                    },
                });
            }
        }
    }
</script>
<script>
    function success_toast(title = '', message = '') {
        // alert(message);
        $.toast({
            heading: title,
            text: message,
            icon: 'success',
            loader: true, // Change it to false to disable loader
            loaderBg: '#9EC600', // To change the background,
            position: "bottom-right"
        });
    }

    function fail_toast(title = '', message = '') {
        $.toast({
            heading: title,
            text: message,
            icon: 'error',
            loader: true, // Change it to false to disable loader
            loaderBg: '#9EC600', // To change the background,
            position: "bottom-right"
        });
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>


<script>
    $(document).ready(function() {
        $('#accountmedpro').validate({
            rules: {
                company_name: {
                    required: true,
                    minlength: 2,
                    nowhitespace: true
                },
                company_address: {
                    required: true,
                    minlength: 2,
                    nowhitespace: true
                },
                country_id: "required",
                city_id: "required",
                tax_no: {
                    required: true,
                    minlength: 2
                },
                authorisation_full_name: {
                    required: true,
                    minlength: 2,
                    nowhitespace: true
                },
                company_overview: {
                    required: true,
                    // minlength: 10
                }
                // Add validation rules for other fields as needed
            },
            messages: {
                // Define error messages for each field if required
            },
            errorPlacement: function(error, element) {
                error.appendTo(element.parent());
            }
        });

        // Adding a custom method for disallowing spaces
        $.validator.addMethod("nowhitespace", function(value, element) {
            return value.trim().length !== 0;
        }, "Spaces are not allowed");
    });
    // }

    function fail_toast(title = '', message = '') {
        $.toast({
            heading: title,
            text: message,
            icon: 'error',
            loader: true, // Change it to false to disable loader
            loaderBg: '#9EC600', // To change the background,
            position: "bottom-right"
        });
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        $('#accountmedpro').validate({
            rules: {
                company_name: {
                    required: true,
                    minlength: 2,
                    nowhitespace: true
                },
                company_address: {
                    required: true,
                    minlength: 2,
                    nowhitespace: true
                },
                country_id: "required",
                city_id: "required",
                tax_no: {
                    required: true,
                    minlength: 2
                },
                authorisation_full_name: {
                    required: true,
                    minlength: 2,
                    // Adding a custom rule for disallowing spaces
                    nowhitespace: true
                },
                company_overview: {
                    required: true,
                    minlength: 10
                }
                // Add validation rules for other fields as needed
            },
            messages: {
                // Define error messages for each field if required
            },
            errorPlacement: function(error, element) {
                error.appendTo(element.parent());
            }
        });

        // Adding a custom method for disallowing spaces
        $.validator.addMethod("nowhitespace", function(value, element) {
            return value.trim().length !== 0;
        }, "Spaces are not allowed");
    });
</script>
@endsection