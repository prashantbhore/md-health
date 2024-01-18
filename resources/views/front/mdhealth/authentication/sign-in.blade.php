@extends('front.layout.layout')
@section('content')
<style>
    .navbar {
        display: none;
    }

    #recaptcha-container {
        bottom: 290px;
    }
</style>
<div class="container py-100px df-center sign-in-form" id="logDiv">
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-column align-items-center gap-4">
                <div class="pt-3">
                    <img src="{{ asset('front/assets/img/otpLogo.png') }}" alt="">
                </div>
                <h2 class="mb-0">Sign In to MD<span>health</span></h2>
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
                            <input type="text" class="form-control" name="number" id="number" placeholder="Phone Number">
                            {{-- --}}
                        </div>
                        <div class="mb-3 hide-eye-div">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password "></span>
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
                            <button class="btn btn-md btn-text w-100 mb-3 df-center" type="button" id="signup" style="height: 47px;">Continue...</button>
                        </div>
                        <div class="text-center">
                            <a href="{{ url('/') }}" class="btn-text">Back to MDhealth.co</a>
                        </div>
                        {{-- <button type="button" class="btn btn-primary mt-3" onclick="sendOTP();">Send OTP</button> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container py-100px df-center sign-in-form d-none" id="otpDiv">
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-column align-items-center gap-4">
                <div class="pt-3">
                    <img src="{{ asset('front/assets/img/otpLogo.png') }}" alt="">
                </div>
                <h2 class="mb-0">SMS Code</h2>
                <p>Enter the 6 digit code sent to your mobile phone</p>
                {{-- <form action="{{ url('otp-verify') }}" method="post" id="otpForm"> --}}
                {{-- <input type="text" id="verification" class="form-control" placeholder="Verification code">
                            <button type="button" class="btn btn-danger mt-3" onclick="verify()">Verify code</button>
                        </form> --}}
                <form>
                    {{-- <div class="alert alert-success" id="successOtpAuthot" style="display: none;"></div>
                        <div class="alert alert-success" id="successOtpAuthot" style="display: none;"></div>
                        <div class="alert alert-success" id="successAuth" style="display: none;"></div> --}}
                    <div class="w-100 df-center mb-3 sms-input gap-3">
                        <input type="hidden" name="email" value="{{ session('email') }}">
                        <input type="hidden" name="password" value="{{ session('password') }}">
                        <input type="hidden" name="login_type" value="{{ session('login_type') ? session('login_type') : '' }}">
                        <input type="text" name="otp[]" minlength="1" maxlength="1" id="ot1" oninput="moveToNext(this, 'ot2')" onkeypress="return /[0-9]/i.test(event.key)" class="form-control">
                        <input type="text" name="otp[]" minlength="1" maxlength="1" id="ot2" oninput="moveToNext(this, 'ot3')" onkeypress="return /[0-9]/i.test(event.key)" class="form-control">
                        <input type="text" name="otp[]" minlength="1" maxlength="1" id="ot3" oninput="moveToNext(this, 'ot4')" onkeypress="return /[0-9]/i.test(event.key)" class="form-control">
                        <input type="text" name="otp[]" minlength="1" maxlength="1" id="ot4" oninput="moveToNext(this, 'ot5')" onkeypress="return /[0-9]/i.test(event.key)" class="form-control">
                        <input type="text" name="otp[]" minlength="1" maxlength="1" id="ot5" oninput="moveToNext(this, 'ot6')" onkeypress="return /[0-9]/i.test(event.key)" class="form-control">
                        <input type="text" name="otp[]" minlength="1" maxlength="1" id="ot6" onkeypress="return /[0-9]/i.test(event.key)" class="form-control">
                    </div>
            </div>
            <div class="d-flex align-items-center justify-content-center mt-3">
                <button class="btn btn-md btn-text w-75 mb-3" id="verifyBtn" type="button" onclick="verify()" style="height: 47px;">Sign
                    In</button>
            </div>
            </form>
            <script>
                function moveToNext(current, nextId) {
                    if (current.value.length === current.maxLength) {
                        document.getElementById(nextId).focus();
                    }
                }
            </script>


            <h6 class="mb-0 df-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <g clip-path="url(#clip0_0_28401)">
                        <path d="M12 2C17.523 2 22 6.477 22 12C22 17.523 17.523 22 12 22C6.477 22 2 17.523 2 12C2 6.477 6.477 2 12 2ZM12 4C9.87827 4 7.84344 4.84285 6.34315 6.34315C4.84285 7.84344 4 9.87827 4 12C4 14.1217 4.84285 16.1566 6.34315 17.6569C7.84344 19.1571 9.87827 20 12 20C14.1217 20 16.1566 19.1571 17.6569 17.6569C19.1571 16.1566 20 14.1217 20 12C20 9.87827 19.1571 7.84344 17.6569 6.34315C16.1566 4.84285 14.1217 4 12 4ZM12 6C12.2449 6.00003 12.4813 6.08996 12.6644 6.25272C12.8474 6.41547 12.9643 6.63975 12.993 6.883L13 7V11.586L15.707 14.293C15.8863 14.473 15.9905 14.7144 15.9982 14.9684C16.006 15.2223 15.9168 15.4697 15.7488 15.6603C15.5807 15.8508 15.3464 15.9703 15.0935 15.9944C14.8406 16.0185 14.588 15.9454 14.387 15.79L14.293 15.707L11.293 12.707C11.1376 12.5514 11.0378 12.349 11.009 12.131L11 12V7C11 6.73478 11.1054 6.48043 11.2929 6.29289C11.4804 6.10536 11.7348 6 12 6Z" fill="#F31D1D" />
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
                <a href="javascript:void(0);" class="text-secondary" id="resendotp" onclick="resendCode();">Resend Code In</a>
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
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script> --}}
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script>
    function countdownTimer(duration) {
        $('#resendotp').hide();
        let timer = duration,
            minutes, seconds;
        const timerDisplay = $('#timer');
        const timerInterval = setInterval(function() {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            timerDisplay.text(minutes + ":" + seconds);

            if (--timer < 0) {
                timer = duration;
                clearInterval(timerInterval);
                $('#resendotp').show();
                timerDisplay.text("Timer completed!");
            }
        }, 1000);
    }

    // Set the timer duration in seconds
    // let timerDuration = 32;

    // countdownTimer(timerDuration);
</script>


<script>
    $(document).ready(function() {
        $('#loginForm').validate({
            rules: {
                number: {
                    required: true,
                    // email: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                number: {
                    required: "Please enter your Phone Number with country code",
                    // email: "Please enter a valid email address"
                },
                password: {
                    required: "Please enter your password"
                }
            },
            submitHandler: function(form) {
                // Perform form submission if all validation passes
                form.submit();
            }
        });
    });

    // $(document).on('blur', '#number', function() {
    //     var base_url = $('#base_url').val();
    //     var number = $(this).val();
    //     var csrfToken = $('meta[name="csrf-token"]').attr('content');
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': csrfToken
    //         }
    //     });
    //     $.ajax({
    //         url: base_url + '/number-to-mobile',
    //         method: 'POST',
    //         data: {
    //             number: number
    //         },
    //         success: function(response) {
    //             console.log(response.mobile_no);
    //             if (response.mobile_no !== undefined) {
    //                 // alert(response.mobile_no);
    //                 $('#number').val(response.mobile_no);
    //                 $('#error').text('');
    //             } else {
    //                 $('#number').val('');
    //                 $('#error').text('Credentials do not match');
    //             }
    //         },
    //         error: function(xhr, status, error) {
    //             console.error(error);
    //         }
    //     });
    // });

    $(document).on('click', '#signup', function() {
        var base_url = $('#base_url').val();
        // alert(base_url);

        if ($('#loginForm').valid()) {
            var number = $('#number').val();
            var password = $('#password').val();

            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });
            $.ajax({
                url: base_url + '/number-password-exist',
                method: 'POST',
                data: {
                    number: number,
                    password: password
                },
                beforeSend: function() {
                    $('#signup').attr('disabled', true);
                    $('#signup').html(
                        '<i class="fa fa-spinner" aria-hidden="true"></i> Please Wait...');
                },
                success: function(response) {
                    $('#signup').attr('enable', true);
                    if (response.user_exist !== undefined) {
                        // alert(JSON.stringify(response.user_exist));
                        sendOTP();
                        $('#success').text('Message Sent Successfully');
                    } else {
                        $('#error').text('Credentials do not match');
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
    };

    function render() {
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
    }


    function sendOTP() {
        let timerDuration = 32;
        countdownTimer(timerDuration);
        var number = $("#number").val();
        firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
            window.confirmationResult = confirmationResult;
            coderesult = confirmationResult;
            $("#successAuth").text("Message sent");
            $("#successAuth").show();
            $("#otpDiv").removeClass('d-none');
            $("#logDiv").hide();
            recaptchaVerifier.clear();
                })
                .catch(function(error) {
                    $("#error").text(error.message);
                    if (error.message == "TOO_MANY_ATTEMPTS_TRY_LATER") {
                        $("#error").text("Too many attempts try again later");
                    }
                    if (error.message == "TOO_SHORT") {
                        $("#error").text("Mobile number short or missing country code");
                    }
                    //  else {

                    // }
                    $("#error").show();
        });
    }

    function verify(e) {
        $('#verifyBtn').attr('disabled', true);
        $('#verifyBtn').html(
            '<i class="fa fa-spinner" aria-hidden="true"></i> Please Wait...');
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
                $("#successOtpAuthot").text("Auth is successful");
                $("#successOtpAuthot").show();
                var number = $('#number').val();
                var password = $('#password').val();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });

                $.ajax({
                    url: base_url + '/otp-verify',
                    method: 'POST',
                    data: {
                        number: number,
                        login_type: 'login',
                        password: password
                    },
                    success: function(response) {
                        $('#verifyBtn').attr('enable', true);
                        console.log(response);
                        if (response.url !== undefined) {
                            // alert(response.url);
                            window.location.href = base_url + response.url;

                            toastr.options = {
                                "positionClass": "toast-bottom-right",
                                "timeOut": "5000",
                            };

                            toastr.success(response.message);
                            recaptchaVerifier.clear();
                            //$('#error').text('');
                        } else {
                            // $('#number').val('');
                            toastr.options = {
                                "positionClass": "toast-bottom-right",
                                "timeOut": "5000",
                            };
                            toastr.error('Credentials do not match');
                            //toastr.success(response.message);
                            //$('#error').text('Credentials do not match');
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

    function resendCode() {
        let timerDuration = 32;
        countdownTimer(timerDuration);
        var number = $("#number").val();
        var containerId = 'recaptcha-container';
        var container = document.getElementById(containerId);

        if (!container) {
            $("#error").text("reCAPTCHA container is missing.");
            $("#error").show();
            return;
        }

        try {
            container.innerHTML = '';
            recaptchaVerifier = new firebase.auth.RecaptchaVerifier(containerId);
            recaptchaVerifier.render();

            firebase.auth().signInWithPhoneNumber(number, recaptchaVerifier)
                .then(function(result) {
                    var user = result.user;
                    $("#successOtpAuthot").text("Auth is successful");
                    $("#successOtpAuthot").show();
                    var number = $('#number').val();
                    var password = $('#password').val();
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        }
                    });

                    $.ajax({
                        url: base_url + '/otp-verify',
                        method: 'POST',
                        data: {
                            number: number,
                            login_type: 'login',
                            password: password
                        },
                        success: function(response) {
                            $('#verifyBtn').attr('enable', true);
                            console.log(response);
                            if (response.url !== undefined) {
                                // alert(response.url);
                                window.location.href = base_url + response.url;

                                toastr.options = {
                                    "positionClass": "toast-bottom-right",
                                    "timeOut": "5000",
                                };

                                toastr.success(response.message);
                                // recaptchaVerifier.clear();
                                //$('#error').text('');
                            } else {
                                // $('#number').val('');
                                toastr.options = {
                                    "positionClass": "toast-bottom-right",
                                    "timeOut": "5000",
                                };
                                toastr.error('Credentials do not match');
                                //toastr.success(response.message);
                                //$('#error').text('Credentials do not match');
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
        } catch (error) {
            $("#error").text("Error initializing reCAPTCHA: " + error.message);
            $("#error").show();
        }
    }
</script>
@endsection