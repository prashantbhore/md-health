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
        input[type="file"] {
            color: #000 !important;
            line-height: 2 !important;
        }
    </style>
    <div class="content-wrapper" id="regdiv">
        <div class="container text-center my-5 authentication">
            <h3 class="mb-3 form-heading">Select Account Type</h3>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a href="{{ url('') }}" class="nav-link">User</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('medical-provider-login') }}" class="nav-link active">Medical Provider</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('vendor-login') }}" class="nav-link">Vendor</a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0);" class="nav-link">Home Service</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content" id="myTabContent">

                {{-- hfeffihfdfiufhhedwyug3rwhfgdwgjgd? --}}
               
                {{-- hfeffihfdfiufhhedwyug3rwhfgdwgjgd? --}}

                <div class="login-form">
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
                                        <div class="mb-3 hide-eye-div">
                                            <label for="password" class="form-label">*Password</label>
                                            <input type="password" class="form-control" placeholder="Minimum 8 characters" id="txtPassword" name="txtPassword">
                                            <span toggle="#txtPassword" class="fa fa-fw fa-eye field-icon toggle-password "></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3 hide-eye-div">
                                            <label for="re-password" class="form-label">*Re-Password</label>
                                            <input type="password" class="form-control" placeholder="Minimum 8 characters" id="txtRePassword" name="txtRePassword">
                                            <span toggle="#txtRePassword" class="fa fa-fw fa-eye field-icon toggle-password "></span>
                                        </div>
                                    </div>
                                    <hr style="height:1px;background-color: #4CDB06;opacity:1" >
                                    <div class="col-md-12">
                                        <div class="mb-3 hide-eye-div">
                                            <label for="*Upload Company Logo" class="form-label">*Upload Company
                                                Logo</label>
                                            <input type="file" class="form-control"
                                                placeholder="*Upload Company Logo">
                                            <span class="fa fa-cloud-upload"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3 hide-eye-div">
                                            <label for="*Upload Company License" class="form-label">*Upload Company
                                                License</label>
                                            <input type="file" class="form-control"
                                                placeholder="*Upload Company License">
                                            <span class="fa fa-cloud-upload"></span>
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
            </div>
        </div>

    </div>


    {{-- otp --}}


    <div class="container py-100px df-center sign-in-form d-none" id="otpDiv">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center gap-4">
                    <div class="pt-3">
                        <img src="{{ asset('front/assets/img/otpLogo.png') }}" alt="">
                    </div>
                    <h2 class="mb-0">SMS Code</h2>
                    <p>Enter the 4 digit code sent to your mobile phone</p>
                    {{-- <form action="{{ url('otp-verify') }}" method="post" id="otpForm"> --}}
                    {{-- <input type="text" id="verification" class="form-control" placeholder="Verification code">
                            <button type="button" class="btn btn-danger mt-3" onclick="verify()">Verify code</button>
                        </form> --}}
                    <form>
                        <div class="alert alert-success" id="successOtpAuthot" style="display: none;"></div>
                        <div class="alert alert-success" id="successOtpAuthot" style="display: none;"></div>
                        <div class="alert alert-success" id="successAuth" style="display: none;"></div>
                        <div class="w-100 df-center mb-3 sms-input gap-3">
                            <input type="hidden" name="email" value="{{ session('email') }}">
                            <input type="hidden" name="password" value="{{ session('password') }}">
                            <input type="hidden" name="login_type"
                                value="{{ session('login_type') ? session('login_type') : '' }}">
                            <input type="text" name="otp[]" minlength="1" maxlength="1" id="ot1"
                                onkeypress="return /[0-9]/i.test(event.key)" class="form-control">
                            <input type="text" name="otp[]" minlength="1" maxlength="1" id="ot2"
                                onkeypress="return /[0-9]/i.test(event.key)" class="form-control">
                            <input type="text" name="otp[]" minlength="1" maxlength="1" id="ot3"
                                onkeypress="return /[0-9]/i.test(event.key)" class="form-control">
                            <input type="text" name="otp[]" minlength="1" maxlength="1" id="ot4"
                                onkeypress="return /[0-9]/i.test(event.key)" class="form-control">
                            <input type="text" name="otp[]" minlength="1" maxlength="1" id="ot5"
                                onkeypress="return /[0-9]/i.test(event.key)" class="form-control">
                            <input type="text" name="otp[]" minlength="1" maxlength="1" id="ot6"
                                onkeypress="return /[0-9]/i.test(event.key)" class="form-control">
                        </div>
                        <button class="btn btn-md btn-text w-75 mb-3" type="button" onclick="verify()"
                            style="height: 47px;">Sign
                            In</button>
                    </form>



                    <h6 class="mb-0 d-flex align-items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <g clip-path="url(#clip0_0_28401)">
                                <path
                                    d="M12 2C17.523 2 22 6.477 22 12C22 17.523 17.523 22 12 22C6.477 22 2 17.523 2 12C2 6.477 6.477 2 12 2ZM12 4C9.87827 4 7.84344 4.84285 6.34315 6.34315C4.84285 7.84344 4 9.87827 4 12C4 14.1217 4.84285 16.1566 6.34315 17.6569C7.84344 19.1571 9.87827 20 12 20C14.1217 20 16.1566 19.1571 17.6569 17.6569C19.1571 16.1566 20 14.1217 20 12C20 9.87827 19.1571 7.84344 17.6569 6.34315C16.1566 4.84285 14.1217 4 12 4ZM12 6C12.2449 6.00003 12.4813 6.08996 12.6644 6.25272C12.8474 6.41547 12.9643 6.63975 12.993 6.883L13 7V11.586L15.707 14.293C15.8863 14.473 15.9905 14.7144 15.9982 14.9684C16.006 15.2223 15.9168 15.4697 15.7488 15.6603C15.5807 15.8508 15.3464 15.9703 15.0935 15.9944C14.8406 16.0185 14.588 15.9454 14.387 15.79L14.293 15.707L11.293 12.707C11.1376 12.5514 11.0378 12.349 11.009 12.131L11 12V7C11 6.73478 11.1054 6.48043 11.2929 6.29289C11.4804 6.10536 11.7348 6 12 6Z"
                                    fill="#F31D1D" />
                            </g>
                            <defs>
                                <clipPath id="clip0_0_28401">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <span class="text-danger">32 sec</span>
                    </h6>
                    <div>
                        <a href="#" class="text-secondary">Resend Code In</a>
                    </div>

                </div>
            </div>
        </div>

        <!-- LOADER  -->
        <div class="card d-none">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center gap-4">
                    <div class="pt-3">
                        <img src="{{ asset('front/assets/img/otpLogo.png') }}" alt="">
                    </div>
                    <h2 class="mb-0">Verification</h2>
                    <p>Enter the 4 digit code sent to your mobile phone</p>
                    <div class="w-100 df-center">
                        <img src="{{ asset('front/assets/img/heart-rate.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
      

        $(document).on('click', '#regcustuser', function() {

            if ($('#mycustomerForm').valid()) {
                var email = $('#email').val();
                var phone = $('#phone').val();
                // var formData = $(this).serialize();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
                $.ajax({
                    url: 'http://127.0.0.1:8000/email-or-mobile-exist',
                    method: 'POST',
                    data: {
                        email: email,
                        phone: phone
                    },
                    success: function(response) {
                        console.log(response);
                        if (response !== undefined) {
                            if (response.email_exist !== undefined) {
                                $('#error').text('Email already exist');
                            } else if (response.mobile_no_exist !== undefined) {
                                $('#error').text('Phone number already exist');
                            } else if (response.phone_exist !== undefined) {
                                $('#error').text('Phone number already exist');
                            } else {
                                sendOTP();
                            }

                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
        });

        $(document).on('click', '#medproreg', function() {

            if ($('#myFormProvider').valid()) {
                var email = $('#email').val();
                var phone = $('#phone').val();
                // var formData = $(this).serialize();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
                $.ajax({
                    url: 'http://127.0.0.1:8000/email-or-mobile-exist',
                    method: 'POST',
                    data: {
                        email: email,
                        phone: phone
                    },
                    success: function(response) {
                        console.log(response);
                        if (response !== undefined) {
                            if (response.email_exist !== undefined) {
                                $('#error').text('Email already exist');
                            } else if (response.mobile_no_exist !== undefined) {
                                $('#error').text('Phone number already exist');
                            } else if (response.phone_exist !== undefined) {
                                $('#error').text('Phone number already exist');
                            } else {
                                sendOTP();
                            }

                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
        });


        window.onload = function() {
            render();
            // renderSecondForm();
        };

        function render() {
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();

        }

        // function renderSecondForm() {
        //     window.recaptchaVerifier2 = new firebase.auth.RecaptchaVerifier('recaptcha-container2');
        //     recaptchaVerifier2.render();
        // }

        function sendOTP() {
            var number = $("#phone").val();
            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;
                $("#successAuth").text("Message sent");
                $("#successAuth").show();
                $("#otpDiv").removeClass('d-none');
                $("#regdiv").hide();
            }).catch(function(error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }

        function verify(e) {
            var code1 = $("#ot1").val();
            var code2 = $("#ot2").val();
            var code3 = $("#ot3").val();
            var code4 = $("#ot4").val();
            var code5 = $("#ot5").val();
            var code6 = $("#ot6").val();
            var code = code1 + code2 + code3 + code4 + code5 + code6;

            coderesult.confirm(code)
                .then(function(result) {
                    var user = result.user;
                    $("#successOtpAuthot").text("OTP verified");
                    $("#successOtpAuthot").show();
                    // var user_type = $('#user_type').val();
                    // console.log(user_type);
                    // alert(user_type);
                    // var password = $('#password').val();
                    // var formData = $('#mycustomerForm').serialize();
                    var formData = $('#myFormProvider').serialize();
                    // $('#form1').(serialize);
                    console.log(formData);
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        }
                    });

                    $.ajax({
                        // url: 'http://127.0.0.1:8000/md-customer-register',
                        url: 'http://127.0.0.1:8000/md-register-medical-provider',
                        method: 'POST',
                        data: formData,
                        //  {
                        //     // email: email, 
                        //     formData: formData, 
                        //     password: password 
                        // },
                        success: function(response) {
                            console.log(response);
                            if (response.url !== undefined) {
                                // alert(response.url);
                                window.location.href = 'http://127.0.0.1:8000' + response.url;
                                $('#error').text('');
                            } else {
                                // $('#number').val('');
                                $('#error').text('Credentials do not match');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });

                    e.preventDefault();
                })
                .catch(function(error) {
                    $("#error").text(error.message);
                    $("#error").show();
                });
        }
    </script>
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
                    // company_logo_image_path: {
                    //     required: true,
                    // },
                    // company_licence_image_path: {
                    //     required: true,
                    // },
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

    <script>
        $(document).ready(function() {
            $.validator.addMethod("passwordMatch", function(value, element) {
                return $('#password').val() === value;
            }, "Passwords do not match.");
            $.validator.addMethod("spaceValidation", function(value, element) {
                return value.trim().length !== 0;
            }, "Field should not contain only spaces.");


            $('#mycustomerForm').validate({
                rules: {
                    first_name: {
                        required: true,
                        spaceValidation: true,
                    },
                    last_name: {
                        required: true,
                        spaceValidation: true,
                    },
                    city_id: {
                        required: true,
                    },
                    country_id: {
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
                    date_of_birth: {
                        required: true,
                        spaceValidation: true,
                    },
                    address: {
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
                    gender: {
                        required: true,
                    },
                    UserflexCheckDefault: {
                        required: true,
                    },

                },
                messages: {
                    first_name: {
                        required: "Please enter the first name.",
                        spaceValidation: "Company name should not contain only spaces.",
                    },
                    last_name: {
                        required: "Please enter the last name.",
                        spaceValidation: "Company name should not contain only spaces.",
                    },
                    city_id: {
                        required: "Please select a city.",
                    },
                    country_id: {
                        required: "Please select a country.",
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
                    date_of_birth: {
                        required: "Please enter the Date of Birth.",
                        spaceValidation: "Date of Birth should not contain only spaces.",
                    },
                    address: {
                        required: "Please enter the address.",
                        spaceValidation: "Address should not contain only spaces.",
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
                    gender: {
                        required: "Please select gender.",
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

    <script>
        $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
        });
    </script>
   
@endsection
