// {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
// {{-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script> --}}
// {/* {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
// {/* {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}} */}
function countdownTimer(duration) {
    $('#resendotp').hide();
    let timer = duration,
        minutes, seconds;
    const timerDisplay = $('#timer');
    const timerInterval = setInterval(function () {
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

$(document).ready(function () {
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
        submitHandler: function (form) {
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

$(document).on('click', '#signup', function () {
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
            beforeSend: function () {
                // $('#signup').attr('disabled', true);
                // $('#signup').html(
                //     '<i class="fa fa-spinner" aria-hidden="true"></i> Please Wait...');
            },
            success: function (response) {
                // $('#signup').attr('enable', true);
                if (response.user_exist !== undefined) {
                    // alert(JSON.stringify(response.user_exist));
                    sendOTP();
                    // $('#success').text('Message Sent Successfully');
                } else {
                    $('#error').text('Credentials do not match');
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }
});


window.onload = function () {
    render();
};

function render() {
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
    recaptchaVerifier.render();
}
//     window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('#signup', {
//   'size': 'invisible',
//   'callback': (response) => {
//     onSignInSubmit();
//   }
// });

// function onSignInSubmit(){alert('frfggg');}

function sendOTP() {
    let timerDuration = 32;
    countdownTimer(timerDuration);
    var number = $("#number").val();
    firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
        window.confirmationResult = confirmationResult;
        coderesult = confirmationResult;
        // $("#successAuth").text("Message sent");
        // $("#successAuth").show();
        $("#otpDiv").removeClass('d-none');
        $("#logDiv").hide();
        recaptchaVerifier.clear();
    })
        .catch(function (error) {
            $("#error").text(error.message);
            if (error.message == "TOO_MANY_ATTEMPTS_TRY_LATER") {
                $("#error").text("Too many attempts try again later");
            }
            if (error.message == "TOO_SHORT") {
                $("#error").text("Mobile number short or missing country code");
            }
            if (error.message == "INVALID_CODE") {
                $("#error").text("OTP does not match.");
            }

            $("#error").show();
        });
}

function isValidCode(code) {
    return (code.length === 6);
}

function showErrorMessage(message) {
    $('#errorMessage').removeClass('d-none').text(message);
}
// $('#verifyBtn').attr('disabled', true);
// $('#verifyBtn').html('<i class="fa fa-spinner" aria-hidden="true"></i> Please Wait...');
function verify(e) {
    var code1 = $("#ot1").val();
    var code2 = $("#ot2").val();
    var code3 = $("#ot3").val();
    var code4 = $("#ot4").val();
    var code5 = $("#ot5").val();
    var code6 = $("#ot6").val();
    var code = code1 + code2 + code3 + code4 + code5 + code6;
    if (!isValidCode(code)) {
        showErrorMessage('Please enter the correct code.');
        return;
    }
    coderesult.confirm(code)
        .then(function (result) {

            var user = result.user;
            // console.log(user);

            var number = $('#number').val();
            var password = $('#password').val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            if (user) {
                // alert(user);
                $('#errorMessage').addClass('d-none');
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
                    success: function (response) {
                        // $('#verifyBtn').attr('enable', true);
                        console.log(response);
                        if (response.url !== undefined) {
                            window.location.href = base_url + response.url;
                            toastr.options = {
                                "positionClass": "toast-bottom-right",
                                "timeOut": "5000",
                            };
                            toastr.success(response.message);
                            recaptchaVerifier.clear();
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
                    error: function (xhr, status, error) {
                        console.error('tggg', error);
                    }
                });

            } else {
                // e.preventDefault();
                // Display an error message for unsuccessful code verification
                showErrorMessage('Code verification failed. Please try again.');
                // e.preventDefault();
                return;
            }

        })
        .catch(function (error) {
            showErrorMessage('Code verification failed. Please try again.');
            return;
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
    $('#recaptcha-container').show();

    if (!container) {
        $("#error").text("reCAPTCHA container is missing.");
        $("#error").show();
        return;
    }

    try {
        container.innerHTML = '';
        recaptchaVerifier = new firebase.auth.RecaptchaVerifier(containerId);
        recaptchaVerifier.render();

        firebase
            .auth()
            .signInWithPhoneNumber(number, window.recaptchaVerifier)
            .then(function (confirmationResult) {
                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;

                $("#otpDiv").removeClass("d-none");
                $("#regdiv").hide();
                $('#recaptcha-container').hide();

            })
            .catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
            });
    } catch (error) {
        $("#error").text("Error initializing reCAPTCHA: " + error.message);
        $("#error").show();
    }
}

