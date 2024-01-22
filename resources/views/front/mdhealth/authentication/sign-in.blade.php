@extends('front.layout.layout')
@section('content')
    <style>
        .navbar,
        footer {
            display: none;
        }

        body,
        .form-control,
        .form-control:focus {
        background: #f6f6f6;
    }

        #recaptcha-container {
            bottom: 350px;
        }

        .mdi-eye-off::before,
        .mdi-eye::before {
            font-size: 19px;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #D6D6D6 !important;
        }
    </style>
    <div class="container py-100px df-center sign-in-form" id="logDiv">
        <div class="card sign-in-card" style="background: #f6f6f6;">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center gap-4">
                    <div class="pt-3">
                        <img src="{{ asset('front/assets/img/otpLogo.png') }}" alt="">
                    </div>
                    <h2 class="my-0">Sign In to MD<span>health</span></h2>
                    <p>The device is not yours? Use private or incognito mode to log in.</p>

                    <div class="w-100 df-center">
                        {{-- <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>
                        <div class="alert alert-success" id="successAuth" style="display: none;"></div> --}}
                        {{-- <span class="alert alert-danger" id="error" ></span> --}}

                        <form id="loginForm">
                            {{-- action="{{ url('user-login') }}" method="post" --}}
                            {{-- @csrf --}}
                            <input type="hidden" name="platform_type" value="web">
                            <input type="hidden" name="login_type" value="login">
                            <div class="mb-3">
                                <label for="number" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="number" id="number"
                                    placeholder="Phone Number">
                                {{-- --}}
                            </div>
                            <div class="mb-3 hide-eye-div">
                                <label for="Password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Password">
                                <span toggle="#password" class="mdi mdi-eye field-icon toggle-password "></span>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Remember Me
                                </label>
                            </div>
                            {{-- <input type="hidden" id="number" class="form-control" placeholder="+91 ********"> --}}

                            <span id="error" class="text-danger"></span>
                            <span id="success" class="text-success"></span>
                            <div class="pt-100px">
                                <button class="btn cont-btn w-100 mb-4 df-center" type="button"
                                    id="signup">Continue</button>
                            </div>
                            <div class="text-center">
                                <a href="{{ url('/') }}" class="btn-text text-black text-decoration-underline">Back to
                                    MDhealth.co</a>
                            </div>
                            {{-- <button type="button" class="btn btn-primary mt-3" onclick="sendOTP();">Send OTP</button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container py-100px df-center sign-in-form d-none" id="otpDiv">
        <div class="card" style="min-height: 650px;background: #f6f6f6;">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center gap-4">
                    <div class="pt-3">
                        <img src="{{ asset('front/assets/img/otpLogo.png') }}" alt="">
                    </div>

                    <h2 class="my-0">SMS Code</h2>

                    <p>Enter the 6 digit code sent to your mobile phone</p>

                    {{-- <form action="{{ url('otp-verify') }}" method="post" id="otpForm"> --}}
                    {{-- <input type="text" id="verification" class="form-control" placeholder="Verification code">
                            <button type="button" class="btn btn-danger mt-3" onclick="verify()">Verify code</button>
                        </form> --}}
                    <form>
                        {{-- <div class="alert alert-success" id="successOtpAuthot" style="display: none;"></div>
                        <div class="alert alert-success" id="successOtpAuthot" style="display: none;"></div>
                        <div class="alert alert-success" id="successAuth" style="display: none;"></div> --}}
                        <div class="w-100 df-center mb-5 sms-input gap-3">
                            <input type="hidden" name="email" value="{{ session('email') }}">
                            <input type="hidden" name="password" value="{{ session('password') }}">
                            <input type="hidden" name="login_type"
                                value="{{ session('login_type') ? session('login_type') : '' }}">
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
                </div>
                <div class="d-flex align-items-center justify-content-center mt-auto">
                    <button class="btn cont-btn mb-5 df-center" id="verifyBtn" type="button" onclick="verify()"
                        style="height: 49px;width:475px">Sign
                        In</button>
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


                <h6 class="mb-0 df-center gap-1">
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
                <div class="df-center">
                    <a href="javascript:void(0);" class="text-secondary" id="resendotp" onclick="resendCode();">Resend
                        Code In</a>
                </div>

            </div>
        </div>
    </div>
    <div id="recaptcha-container"></div>

    <!-- LOADER  -->
    <div class="card d-none">
        <div class="card-body">
            <div class="d-flex flex-column align-items-center gap-4">
                <div class="pt-3">
                    <img src="{{ asset('front/assets/img/otpLogo.png') }}" alt="">
                </div>
                <h2 class="mb-0">Verification</h2>
                <p>Enter the 6 digit code sent to your mobile phone</p>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src={{ asset('front\controller_js\signin.js') }}></script>
@endsection
