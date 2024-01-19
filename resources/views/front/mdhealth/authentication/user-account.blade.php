@extends('front.layout.layout') @section('content')
    <style>
        .navbar,
        .footer {
            display: none;
        }

        .mdi-eye-off::before,
        .mdi-eye::before {
            font-size: 19px;
        }


        input[type="file"] {
            color: #979797 !important;
            line-height: 2 !important;
        }

        body {
            background: #f6f6f6;
        }

        .form-control,
        .form-select {
            background-color: #f6f6f6;
        }


        select:required:invalid {
            color: gray;
        }

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            background-color: #f6f6f6;
        }

        #recaptcha-container {
            position: absolute;
            left: 285px;
            bottom: 275px;
        }

        .pill-calender {
            top: 43px;
            left: 16px;
        }

        .daterangepicker,
        .daterangepicker .calendar-table {
            background: #f6f6f6;
            background-color: #f6f6f6;
        }

        .authentication .tab-content .form-check-input {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
        }
    </style>
    <div class="position-relative">
        <div class="content-wrapper" id="regdiv">
            <div class="container text-center my-4 authentication pt-3">
                <div class="w-100 position-relative" style="margin-bottom:2rem;">
                    <h3 class="text-center form-heading">Select Account Type</h3>
                    <h1 class="my-0 form-heading p-abs">Go Super Admin Panel</h1>
                </div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs mb-5" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a href="{{ url('user-account') }}" class="nav-link active">User</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('medical-provider-login') }}" class="nav-link">Medical Provider</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('vendor-login') }}" class="nav-link">Vendor</a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0);" class="nav-link">Home Service</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('food-provider-register') }}" class="nav-link">Food Provider</a>
                    </li>
                </ul>

                <!-- Tab panes -->

                <!-- Tab panes -->
                <div class="tab-content position-relative" id="myTabContent">
                    <div class="login-form pb-100px" id="medical-provider" role="tabpanel"
                        aria-labelledby="medical-provider-tab">
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-xl-6 bod-right pt-4">
                                <!-- Form Heading -->
                                <div class="d-flex align-items-center gap-4 pt-5" style="padding-bottom: 2rem;">
                                    <a href="{{ url('/') }}">
                                        <img src="{{ 'front/assets/img/back.svg' }}" alt="" />
                                    </a>
                                    <h1 class="reg-title my-0 pb-3">Create User Account</h1>
                                </div>
                                <!-- Form -->
                                <div class="form text-start">
                                    <form id="mycustomerForm">
                                        {{-- action="{{ url('/md-customer-register') }}" method="post" --}}
                                        <input type="hidden" name="platform_type" value="web" />
                                        <input type="hidden" name="user_type" value="customer" />
                                        <div class="row gy-4">
                                            <div class="col-md-6">
                                                <label for="firstName" class="form-label">*First Name</label>
                                                <input type="text" class="form-control " name="first_name"
                                                    id="first_name" placeholder="First Name" />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="lastName" class="form-label">*Last Name</label>
                                                <input type="text" class="form-control " name="last_name" id="last_name"
                                                    placeholder="Last Name" />
                                            </div>
                                            <div class="col-md-6 position-relative">
                                                <label for="dob" class="form-label">*Date of Birth</label>
                                                <input class="form-control dobj" style="padding-left:32px;"
                                                    name="date_of_birth" id="date_of_birth" placeholder="Date of Birth" />
                                                <img src="{{ 'front/assets/img/mdBookings/Calendar.png' }}" alt=""
                                                    class="mx-2 pill-calender">

                                            </div>
                                            <div class="col-md-6">
                                                <label for="gender" class="form-label">*Gender</label>
                                                <select required name="gender" id="gender" class="form-select">
                                                    <option value="" selected disabled>Choose</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Prefer not to say">Prefer not to say</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="email" class="form-label">*E-mail</label>
                                                <input type="text" class="form-control " name="email" id="email"
                                                    placeholder="E-mail" autocomplete="off" />
                                            </div>
                                            <div class="col-md-12">
                                                <label for="phone" class="form-label">*Phone</label>
                                                <input type="text" class="form-control " name="phone" id="phone"
                                                    placeholder="Phone" />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="country_id" class="form-label">*Country</label>
                                                <select required name="country_id" id="country_id" class="form-select ">
                                                    <option value="" selected disabled>Choose</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->country_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="city_id" class="form-label">*City</label>
                                                <select required name="city_id" id="city_id" class="form-select ">
                                                    <option value="" selected disabled hidden>Choose</option>
                                                    {{-- @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->city_name }} </option>
                                                @endforeach --}}
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="address" class="form-label">*Address</label>
                                                <textarea name="address" id="address" cols="" rows="5" class="form-control camptonBook "
                                                    placeholder="Enter Address"></textarea>
                                            </div>

                                            <div class="col-md-12 position-relative">
                                                <div class="hide-eye-div">
                                                    <label for="password" class="form-label">*Password</label>
                                                    <input type="password" name="password" class="form-control "
                                                        id="password" placeholder="Minimum 8 characters" />
                                                    <span toggle="#password"
                                                        class="mdi mdi-eye field-icon toggle-password"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-3 position-relative">
                                                <div class="hide-eye-div">
                                                    <label for="re-password" class="form-label">*Re-Password</label>
                                                    <input type="password" name="repassword" class="form-control "
                                                        id="repassword" placeholder="Minimum 8 characters" />
                                                    <span toggle="#repassword"
                                                        class="mdi mdi-eye field-icon toggle-password"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-check tc d-flex gap-3">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="UserflexCheckDefault" />
                                                    <label class="form-check-label" for="UserflexCheckDefault">
                                                        I accept <a href="#"
                                                            class="text-decoration-underline camptonBold">Terms and
                                                            Condition</a> & I agree to the <a href="#"
                                                            class="text-decoration-underline">User Data Consent.</a>
                                                    </label>
                                                </div>
                                            </div>
                                            {{-- <div id="recaptcha-container" class="df-center"></div> --}}
                                            <span id="error" class="text-danger"></span>
                                            <div class="col-md-12 text-center d-flex flex-column gap-3 py-100px">
                                                <button type="button" class="btn cont-btn w-100 mb-4 df-center"
                                                    id="regcustuser">Create Account</button>
                                                <label for="" class="mt-auto">Already have an account?</label>
                                                <a href="{{ url('sign-in-web') }}" class="signIn-link">Sign In</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="d-flex flex-column align-items-start justify-content-start pt-300px ps-5">
                                    <div class="mb-2">
                                        <img src="{{ asset('front/assets/img/MDHealth.svg') }}" alt="" />
                                    </div>
                                    <h5 class="text-h1 my-0">Get your reliable & affordable</h5>
                                    <h4 class="text-green-h1b my-2">Treatment Packages</h4>
                                    <p class="text-p1-gray my-0">We are partnered with the top health service providers and
                                        vendors that gives you the best health experience!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- otp --}}

        <div class="container py-100px df-center sign-in-form d-none" id="otpDiv">
            <div class="card" style="background: #f6f6f6;">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center gap-4">
                        <div class="pt-3">
                            <img src="{{ asset('front/assets/img/otpLogo.png') }}" alt="" />
                        </div>
                        <h2 class="my-0">SMS Code</h2>
                        <p>Enter the 6 digit code sent to your mobile phone</p>
                        {{--
                <form action="{{ url('otp-verify') }}" method="post" id="otpForm">
                    --}} {{-- <input type="text" id="verification" class="form-control" placeholder="Verification code" />
                    <button type="button" class="btn btn-danger mt-3" onclick="verify()">Verify code</button>
                </form>
                --}}
                        <form>
                            <div class="alert alert-success" id="successOtpAuthot" style="display: none;"></div>
                            <div class="alert alert-success" id="successOtpAuthot" style="display: none;"></div>
                            {{-- <div class="alert alert-success" id="successAuth" style="display: none;"></div> --}}
                            <div class="w-100 df-center mb-3 sms-input gap-3">
                                <input type="hidden" name="email" value="{{ session('email') }}" />
                                <input type="hidden" name="password" value="{{ session('password') }}" />
                                <input type="hidden" name="login_type"
                                    value="{{ session('login_type') ? session('login_type') : '' }}" />
                                {{-- <input type="text" name="otp[]" minlength="1" maxlength="1" id="ot1" onkeypress="return /[0-9]/i.test(event.key)" class="form-control" />
                        <input type="text" name="otp[]" minlength="1" maxlength="1" id="ot2" onkeypress="return /[0-9]/i.test(event.key)" class="form-control" />
                        <input type="text" name="otp[]" minlength="1" maxlength="1" id="ot3" onkeypress="return /[0-9]/i.test(event.key)" class="form-control" />
                        <input type="text" name="otp[]" minlength="1" maxlength="1" id="ot4" onkeypress="return /[0-9]/i.test(event.key)" class="form-control" />
                        <input type="text" name="otp[]" minlength="1" maxlength="1" id="ot5" onkeypress="return /[0-9]/i.test(event.key)" class="form-control" />
                        <input type="text" name="otp[]" minlength="1" maxlength="1" id="ot6" onkeypress="return /[0-9]/i.test(event.key)" class="form-control" /> --}}
                                <input type="text" name="otp[]" minlength="1" maxlength="1" id="ot1"
                                    oninput="handleInput(this, 'ot2')" onkeydown="handleBackspace(event, 'ot1')"
                                    class="form-control">
                                <input type="text" name="otp[]" minlength="1" maxlength="1" id="ot2"
                                    oninput="handleInput(this, 'ot3')" onkeydown="handleBackspace(event, 'ot1')"
                                    class="form-control">
                                <input type="text" name="otp[]" minlength="1" maxlength="1" id="ot3"
                                    oninput="handleInput(this, 'ot4')" onkeydown="handleBackspace(event, 'ot2')"
                                    class="form-control">
                                <input type="text" name="otp[]" minlength="1" maxlength="1" id="ot4"
                                    oninput="handleInput(this, 'ot5')" onkeydown="handleBackspace(event, 'ot3')"
                                    class="form-control">
                                <input type="text" name="otp[]" minlength="1" maxlength="1" id="ot5"
                                    oninput="handleInput(this, 'ot6')" onkeydown="handleBackspace(event, 'ot4')"
                                    class="form-control">
                                <input type="text" name="otp[]" minlength="1" maxlength="1" id="ot6"
                                    oninput="handleInput(this, '')" onkeydown="handleBackspace(event, 'ot5')"
                                    class="form-control">
                            </div>
                            <div id="errorMessage" class="text-danger d-none"></div>
                            <div class="d-flex justify-content-center">
                                <button class="btn cont-btn w-75 mb-4 df-center" id="login_otp_btn" type="button"
                                    onclick="verify()">Sign In</button>
                            </div>
                        </form>
                        <script>
                            function handleInput(current, nextId) {
                                if (current.value.length === current.maxLength && nextId) {
                                    document.getElementById(nextId).focus();
                                }
                            }

                            function handleBackspace(event, currentId) {
                                if (event.code === 'Backspace' && event.target.value.length === 0 && currentId) {
                                    document.getElementById(currentId).focus();
                                }
                            }
                        </script>

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
                            <span class="text-danger" id="timer">32 sec</span>
                        </h6>
                        <div>
                            <a href="javascript:void(0);" class="text-secondary" id="resendotp"
                                onclick="resendCode();">Resend Code In</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- LOADER  -->
            <div class="card d-none">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center gap-4">
                        <div class="pt-3">
                            <img src="{{ asset('front/assets/img/otpLogo.png') }}" alt="" />
                        </div>
                        <h2 class="mb-0">Verification</h2>
                        <p>Enter the 6 digit code sent to your mobile phone</p>
                        <div class="w-100 df-center">
                            <img src="{{ asset('front/assets/img/heart-rate.png') }}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="recaptcha-container"></div>
    </div>
@endsection

@section('script')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src={{ asset('front/controller_js/userregister.js') }}></script>
@endsection
