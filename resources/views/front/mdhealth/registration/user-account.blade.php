@extends('front.layout.layout')
@section('content')
    <style>
        .navbar {
            display: none;
        }
        .error {
            color: red !important; 
            font-size: 14px !important;
        }
    </style>
    <div class="content-wrapper">
        <div class="container text-center my-5 registration">
            <h3 class="mb-3 form-heading">Select Account Type</h3>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button"
                        role="tab" aria-controls="user" aria-selected="true">User</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="medical-provider-tab" data-bs-toggle="tab"
                        data-bs-target="#medical-provider" type="button" role="tab" aria-controls="medical-provider"
                        aria-selected="false">Medical Provider</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="vendor-tab" data-bs-toggle="tab" data-bs-target="#vendor" type="button"
                        role="tab" aria-controls="vendor" aria-selected="false">Vendor</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link disabled" id="home-service-tab" data-bs-toggle="tab"
                        data-bs-target="#home-service" type="button" role="tab" aria-controls="home-service"
                        aria-selected="false">Home Service</button>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
                    <div class="row pt-4">
                        <div class="col-md-6 bod-right pt-4">
                            <div class="d-flex align-items-center gap-3 pt-5 pb-4">
                                <a href="{{ url('/') }}">
                                    <img src="{{ 'front/assets/img/back.svg' }}" alt="">
                                </a>
                                <h1 class="reg-title mb-0">Create User Account</h1>
                            </div>
                            <div class="form text-start px-5">
                                <form action="{{ url('api/md-customer-register') }}" method="post" id="myForm">
                                    @csrf
                                    <input type="hidden" name="platform_type" value="web">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstName" class="form-label">*First Name</label>
                                                <input type="text" class="form-control" name="first_name"
                                                    placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="lastName" class="form-label">*Last Name</label>
                                                <input type="text" class="form-control" name="last_name"
                                                    placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">*E-mail</label>
                                                <input type="text" class="form-control" name="email"
                                                    placeholder="E-mail">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">*Phone</label>
                                                <input type="text" class="form-control" name="phone"
                                                    placeholder="Phone">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="gender" class="form-label">*Gender</label>
                                                <input type="text" class="form-control" name="gender"
                                                    placeholder="Gender">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="country_id" class="form-label">*Country</label>
                                                <select name="country_id" id="country_id" class="form-select">
                                                    <option value="">Choose</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->country_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="address" class="form-label">*Address</label>
                                                <textarea name="address" id="address" cols="" rows="5" class="form-control"
                                                    placeholder="Enter Address"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="password" class="form-label">*Password</label>
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="Minimum 8 characters">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="re-password" class="form-label">*Re-Password</label>
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="Minimum 8 characters">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="UserflexCheckDefault">
                                                <label class="form-check-label" for="UserflexCheckDefault">
                                                    I accept <a href="#">Terms and Condition</a> & I agree to the <a
                                                        href="#">User Data Consent</a>.
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center d-flex flex-column gap-3">
                                            <button type="submit" class="btn btn-md w-100" style="height: 47px;">Create
                                                Account</button>
                                            <label for="" class="mt-auto">Already have an account?</label>
                                            <a href="#" class="text-black fw-bold">Sign In</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                    </div>

                </div>
                <div class="tab-pane fade" id="medical-provider" role="tabpanel" aria-labelledby="medical-provider-tab">
                    <div class="row pt-4">
                        <div class="col-md-6 bod-right pt-4">
                            <div class="d-flex align-items-center gap-3 pt-5 pb-4">
                                <a href="{{ url('/') }}"><img src="{{ 'front/assets/img/back.svg' }}"
                                        alt=""></a>
                                <h1 class="reg-title mb-0">Create Provider Account</h1>
                            </div>
                            <div class="form text-start px-5">
                                <form id="myFormProvider" action="{{ url('/api/md-register-medical-provider') }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="CompanyName" class="form-label">*Company Name</label>
                                                <input type="text" class="form-control" name="company_name"
                                                    id="company_name" placeholder="Company Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="city_id" class="form-label">*City</label>
                                                <select id="city_id" name="city_id" class="form-select">
                                                    <option value="" selected disabled>Choose</option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                                    @endforeach
                                                    {{-- <option value="">India</option> --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">*E-mail</label>
                                                <input type="text" class="form-control" name="email" id="email"
                                                    placeholder="E-mail">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">*Phone</label>
                                                <input type="text" class="form-control" name="phone" id="phone"
                                                    placeholder="Phone">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="TAXNumber" class="form-label">*TAX Number</label>
                                                <input type="text" class="form-control" name="tax_no" id="tax_no"
                                                    placeholder="TAX Number">
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="gender" class="form-label">*Gender</label>
                                                             <select name="gender" id="gender" class="form-select">
                                                                <option value="">Choose</option>
                                                                <option value="male">Male</option>
                                                                <option value="female">Female</option>
                                                            </select>
                                                        </div>
                                                    </div> -->
                                        {{-- <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">*Country</label>
                                        <select name="providerCompanyName" id="country"  class="form-select">
                                            <option value="">Choose</option>
                                            @foreach ($countries as $country)
                                            <option value="{{$country->id}}">{{$country->country_name}}</option>
                                            @endforeach
                                          
                                        </select>
                                    </div>
                                </div> --}}
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="*Company Address" class="form-label">*Company Address</label>
                                                <textarea name="company_address" id="company_address" cols="" rows="5" class="form-control"
                                                    placeholder="Company Address"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="password" class="form-label">*Password</label>
                                                <input type="text" class="form-control" name="password"
                                                    id="password" placeholder="Minimum 8 characters">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="re-password" class="form-label">*Re-Password</label>
                                                <input type="password" class="form-control" name="repassword"
                                                    id="repassword" placeholder="Minimum 8 characters">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="*Upload Company Logo" class="form-label">*Upload Company
                                                    Logo</label>
                                                <input type="file" class="form-control" name="company_logo_image_path"
                                                    id="company_logo_image_path" placeholder="*Upload Company Logo">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="*Upload Company License" class="form-label">*Upload Company
                                                    License</label>
                                                <input type="file" class="form-control"
                                                    name="company_licence_image_path" id="company_licence_image_path"
                                                    placeholder="*Upload Company License">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="UserflexCheckDefault">
                                                <label class="form-check-label" for="UserflexCheckDefault">
                                                    I accept <a href="#">Terms and Condition</a> & I agree to the <a
                                                        href="#">User Data Consent</a>.
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-md w-100" type="submit" style="height: 47px;">Create
                                                Account</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
                <div class="tab-pane fade" id="vendor" role="tabpanel" aria-labelledby="vendor-tab">
                    <div class="row pt-4">
                        <div class="col-md-6 bod-right pt-4">
                            <div class="d-flex align-items-center gap-3 pt-5 pb-4">
                                <a href="{{ url('/') }}">
                                    <img src="{{ 'front/assets/img/back.svg' }}" alt="">
                                </a>
                                <h1 class="reg-title mb-0">Create Provider Account</h1>
                            </div>
                            <div class="form text-start px-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="CompanyName" class="form-label">*Company Name</label>
                                            <input type="text" class="form-control" placeholder="Company Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="city" class="form-label">*City</label>
                                            <select name="city" id="city" class="form-select">
                                                <option value="">Choose</option>
                                                <option value="">Istanbul</option>
                                                <option value="">Ankara</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">*E-mail</label>
                                            <input type="text" class="form-control" placeholder="E-mail">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">*Phone</label>
                                            <input type="text" class="form-control" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="TAXNumber" class="form-label">*TAX Number</label>
                                            <input type="text" class="form-control" placeholder="TAX Number">
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="gender" class="form-label">*Gender</label>
                                                            <input type="text" class="form-control" placeholder="Gender">
                                                        </div>
                                                    </div> -->
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="gender" class="form-label">*Country</label>
                                            <select name="country" id="country" class="form-select">
                                                <option value="">Choose</option>
                                                <option value="">Istanbul</option>
                                                <option value="">Ankara</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="*Company Address" class="form-label">*Company Address</label>
                                            <textarea name="" id="" cols="" rows="5" class="form-control"
                                                placeholder="Company Address"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">*Password</label>
                                            <input type="text" class="form-control"
                                                placeholder="Minimum 8 characters">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="re-password" class="form-label">*Re-Password</label>
                                            <input type="text" class="form-control"
                                                placeholder="Minimum 8 characters">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="*Upload Company Logo" class="form-label">*Upload Company
                                                Logo</label>
                                            <input type="file" class="form-control"
                                                placeholder="*Upload Company Logo">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="*Upload Company License" class="form-label">*Upload Company
                                                License</label>
                                            <input type="file" class="form-control"
                                                placeholder="*Upload Company License">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="UserflexCheckDefault">
                                            <label class="form-check-label" for="UserflexCheckDefault">
                                                I accept <a href="#">Terms and Condition</a> & I agree to the <a
                                                    href="#">User Data Consent</a>.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-md w-100" style="height: 47px;">Create Account</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
                <div class="tab-pane fade" id="home-service" role="tabpanel" aria-labelledby="home-service-tab"></div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // Validation rules and messages
            $("#myForm").validate({
                rules: {
                    first_name: "required",
                    last_name: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    phone: "required",
                    gender: "required",
                    country_id: "required",
                    address: "required",
                    password: {
                        required: true,
                        minlength: 8
                    },
                    're-password': {
                        required: true,
                        equalTo: "#password"
                    },
                    UserflexCheckDefault: "required"
                },
                messages: {
                    // Define error messages for each field
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {
            $.validator.addMethod("passwordMatch", function(value, element) {
                return $('#password').val() === value;
            }, "Passwords do not match.");
            $.validator.addMethod("spaceValidation", function(value, element) {
                return value.trim().length !== 0;
            }, "Field should not contain only spaces.");


            $('#myFormProvider').validate({
                    rules: {
                        company_name: {
                            required: true,
                            spaceValidation: true,
                        },
                        city_id: {
                            required: true,
                        },
                        email: {
                            required: true,
                            email: true,
                            spaceValidation: true,
                        },
                        phone: {
                            required: true,
                            spaceValidation: true,
                        },
                        tax_no: {
                            required: true,
                            spaceValidation: true,
                        },
                        company_address: {
                            required: true,
                            spaceValidation: true,
                        },
                        password: {
                            required: true,
                            minlength: 8,
                            spaceValidation: true,
                        },
                        repassword: {
                            required: true,
                            equalTo: "#password",
                            minlength: 8,
                            spaceValidation: true,
                        },
                        company_logo_image_path: {
                            required: true,
                        },
                        company_licence_image_path: {
                            required: true,
                        },
                        UserflexCheckDefault: {
                            required: true,
                        },

                    },
                    messages: {
                        company_name: {
                            required: "Please enter the company name.",
                            spaceValidation: "Company name should not contain only spaces.",
                        },
                        city_id: {
                            required: "Please select a city.",
                        },
                        email: {
                            required: "Please enter your email.",
                            email: "Please enter a valid email address.",
                            spaceValidation: "Email should not contain only spaces.",
                        },
                        phone: {
                            required: "Please enter your phone number.",
                            spaceValidation: "Phone number should not contain only spaces.",
                        },
                        tax_no: {
                            required: "Please enter the tax number.",
                            spaceValidation: "Tax number should not contain only spaces.",
                        },
                        company_address: {
                            required: "Please enter the company address.",
                            spaceValidation: "Company address should not contain only spaces.",
                        },
                        password: {
                            required: "Please enter a password.",
                            minlength: "Password must be at least 8 characters long.",
                            spaceValidation: "Password should not contain only spaces.",
                        },
                        repassword: {
                            required: "Please re-enter the password.",
                            equalTo: "Passwords do not match.",
                            minlength: "Password must be at least 8 characters long.",
                            spaceValidation: "Password should not contain only spaces.",
                        },
                        company_logo_image_path: {
                            required: "Please upload the company logo.",
                        },
                        company_licence_image_path: {
                            required: "Please upload the company license.",
                        },
                        UserflexCheckDefault: {
                            required: "Please accept the terms and conditions.",
                        },
                    },
                    submitHandler: function(form) {
                        form.submit();
        },
        normalizer: function(value) {
            return $.trim(value);
        },
            });
        });
    </script>

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var token = $('meta[name="csrf-token"]').attr('content');
        $('#myFormProvider').on('submit', function(event) {
            event.preventDefault();

            // Serialize form data
            var formData = $(this).serialize();
console.log(foemData);
            // AJAX request
            $.ajax({
                url: '/api/md-register-medical-provider', // Replace with your Laravel API endpoint
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token // Include CSRF token in headers
                },
                data: formData,
                success: function(response) {
                    // Handle success response
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script> --}}
@endsection
