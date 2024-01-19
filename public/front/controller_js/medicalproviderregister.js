//  alert('hfyuf');
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






$(document).on("click", "#regcustuser", function () {
    var base_url = $("#base_url").val();
    if ($("#mycustomerForm").valid()) {
        var email = $("#email").val();
        var phone = $("#phone").val();
        // var formData = $(this).serialize();
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
        });
        $.ajax({
            url: base_url + "/email-or-mobile-exist",
            method: "POST",
            data: {
                email: email,
                phone: phone,
            },
            success: function (response) {
                console.log(response);
                if (response !== undefined) {
                    if (response.email_exist !== undefined) {
                        $("#error").text("Email already exist");
                    } else if (response.mobile_no_exist !== undefined) {
                        $("#error").text("Phone number already exist");
                    } else if (response.phone_exist !== undefined) {
                        $("#error").text("Phone number already exist");
                    } else {
                        sendOTP();
                    }
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
        });
    }
});

$(document).on("click", "#medproreg", function () {
    if ($("#myFormProvider").valid()) {
        var email = $("#email").val();
        var phone = $("#phone").val();
        // var formData = $(this).serialize();
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
        });
        $.ajax({
            url: base_url + "/email-or-mobile-exist",
            method: "POST",
            data: {
                email: email,
                phone: phone,
            },
            beforeSend: function () {
                // $("#medproreg").attr("disabled", true);
                // $("#medproreg").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Please Wait...');
            },
            success: function (response) {
                $("#medproreg").attr("disabled", false);
                console.log(response);
                if (response !== undefined) {
                    if (response.email_exist !== undefined) {
                        $("#error").text("Email already exist");
                    } else if (response.mobile_no_exist !== undefined) {
                        $("#error").text("Phone number already exist");
                    } else if (response.phone_exist !== undefined) {
                        $("#error").text("Phone number already exist");
                    } else {
                        sendOTP();
                    }
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
        });
    }
});

window.onload = function () {
    render();
};

function render() {
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier("recaptcha-container");
    recaptchaVerifier.render();
}

function sendOTP() {
    let timerDuration = 32;
    countdownTimer(timerDuration);
    var number = $("#phone").val();
    firebase
        .auth()
        .signInWithPhoneNumber(number, window.recaptchaVerifier)
        .then(function (confirmationResult) {
            window.confirmationResult = confirmationResult;
            coderesult = confirmationResult;
            // $("#successAuth").text("Message sent");
            // $("#successAuth").show();
            $("#otpDiv").removeClass("d-none");
            $("#regdiv").hide();
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
            //  else {

            // }
            $("#error").show();
        });
}

function isValidCode(code) {
    return (code.length === 6);
}

function showErrorMessage(message) {
    $('#errorMessage').removeClass('d-none').text(message);
}

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
    coderesult
        .confirm(code)
        .then(function (result) {
            var user = result.user;
            // console.log(user);
            // $("#successOtpAuthot").text("OTP verified");
            // $("#successOtpAuthot").show();
            // recaptchaVerifier.clear();

            // var formData = $('#myFormProvider').serialize();
            var form = document.getElementById("myFormProvider");
            var formData = new FormData(form);
            console.log(formData);
            var csrfToken = $('meta[name="csrf-token"]').attr("content");
            if (user) {
                // alert(user);
                $('#errorMessage').addClass('d-none');
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                    },
                });

                $.ajax({
                    url: base_url + "/md-register-medical-provider",
                    method: "POST",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        // $("#otp-btn").attr("disabled", true);
                        // $("#otp-btn").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Please Wait...');
                    },
                    success: function (response) {
                        // $("#otp-btn").attr("disabled", false);
                        console.log(response);
                        if (response.url !== undefined) {
                            // alert(response.url);
                            window.location.href = base_url + response.url;
                            $("#error").text("");
                        } else {
                            // $('#number').val('');
                            $("#error").text("Credentials do not match");
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    },
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
    var number = $("#phone").val();
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
                // $("#sentSuccess").text("New code sent Successfully.");
                // $("#sentSuccess").show();
                // coderesult = confirmationResult;
                // recaptchaVerifier.clear();
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





$(document).ready(function () {
    // alert("hi");
    // Validation rules and messages
    $("#myForm").validate({
        rules: {
            first_name: "required",
            last_name: "required",
            email: {
                required: true,
                email: true,
            },
            phone: "required",
            gender: "required",
            country_id: "required",
            address: "required",
            password: {
                required: true,
                minlength: 8,
            },
            "re-password": {
                required: true,
                equalTo: "#password",
            },
            UserflexCheckDefault: "required",
        },
        messages: {
            // Define error messages for each field
        },
        submitHandler: function (form) {
            form.submit();
        },
    });
});




$(document).ready(function () {
    $.validator.addMethod(
        "passwordMatch",
        function (value, element) {
            return $("#password").val() === value;
        },
        "Passwords do not match."
    );
    $.validator.addMethod(
        "spaceValidation",
        function (value, element) {
            return value.trim().length !== 0;
        },
        "Field should not contain only spaces."
    );

    $("#myFormProvider").validate({
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
        submitHandler: function (form) {
            form.submit();
        },
        normalizer: function (value) {
            return $.trim(value);
        },
    });
});


$(document).ready(function () {
    $.validator.addMethod(
        "passwordMatch",
        function (value, element) {
            return $("#password").val() === value;
        },
        "Passwords do not match."
    );
    $.validator.addMethod(
        "spaceValidation",
        function (value, element) {
            return value.trim().length !== 0;
        },
        "Field should not contain only spaces."
    );

    $("#mycustomerForm").validate({
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
        submitHandler: function (form) {
            form.submit();
        },
        normalizer: function (value) {
            return $.trim(value);
        },
    });
});

// Upload Icon faded away
$("#company_logo_image_path").on("click", function () {
    $("#up-abs1").fadeOut(2000);
});
$("#company_licence_image_path").on("click", function () {
    $("#up-abs2").fadeOut(2000);
});
