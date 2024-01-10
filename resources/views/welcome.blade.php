<!DOCTYPE html>
<html>

<head>
    <title>Laravel Phone Number Authentication using Firebase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

    <div class="container">
        <h1>Laravel Phone Number Authentication using Firebase</h1>

        <div class="alert alert-danger" id="error" style="display: none;"></div>

        <div id="phoneForm">
            <div class="card">
                <div class="card-header">
                    Enter Phone Number
                </div>
                <div class="card-body">
                    <div class="alert alert-success" id="sentSuccess" style="display: none;"></div>
                    <form>
                        <label>Phone Number:</label>
                        <input type="text" id="number" class="form-control" placeholder="+91********">
                        <button type="button" class="btn btn-success" onclick="phoneSendAuth();">Send Code</button>
                    </form>
                </div>
            </div>
        </div>

        <div id="otpForm" style="display: none;">
            <div class="card" style="margin-top: 10px">
                <div class="card-header">
                    Enter Verification code
                </div>
                <div class="card-body">
                    <div class="alert alert-success" id="successRegsiter" style="display: none;"></div>
                    <form>
                        <input type="text" id="verificationCode" class="form-control"
                            placeholder="Enter verification code">
                        <button type="button" class="btn btn-success" onclick="codeverify();">Verify Code</button>
                        <button type="button" class="btn btn-secondary" onclick="resendCode();">Resend Code</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="recaptcha-container"></div>

    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>


    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyCi9vOusfNsRY2NgWUk8fDOjri9L8dALY8",
            authDomain: "sweedesinew.firebaseapp.com",
            databaseURL: "https://sweedesinew.firebaseio.com",
            projectId: "sweedesinew",
            storageBucket: "sweedesinew.appspot.com",
            messagingSenderId: "537186381446",
            appId: "1:537186381446:web:777955e71e5e61c8d62b07"
        };

         // Initialize Firebase
         firebase.initializeApp(firebaseConfig);

var recaptchaVerifier;
var confirmationResult;

// Initialize RecaptchaVerifier
recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');

function phoneSendAuth() {
    var number = $("#number").val();

    firebase.auth().signInWithPhoneNumber(number, recaptchaVerifier).then(function(result) {
        confirmationResult = result;
        console.log(confirmationResult);

        $("#sentSuccess").text("Message Sent Successfully.");
        $("#sentSuccess").show();

        // Hide phone form, show OTP form
        $("#phoneForm").hide();
        $("#otpForm").show();

    }).catch(function(error) {
        $("#error").text(error.message);
        $("#error").show();
    });
}

function codeverify() {
    var code = $("#verificationCode").val();

    confirmationResult.confirm(code).then(function(result) {
        var user = result.user;
        console.log(user);

        $("#successRegsiter").text("You are registered successfully.");
        $("#successRegsiter").show();

    }).catch(function(error) {
        $("#error").text(error.message);
        $("#error").show();
    });
}

function resendCode() {
    var number = $("#number").val();
    var containerId = 'recaptcha-container';
    var container = document.getElementById(containerId);

    if (!container) {
        $("#error").text("reCAPTCHA container is missing.");
        $("#error").show();
        return;
    }

    try {
        // Clear any existing content in the container
        container.innerHTML = '';

        // Reinitialize the reCAPTCHA verifier
        recaptchaVerifier = new firebase.auth.RecaptchaVerifier(containerId);

        // Send a new verification code
        firebase.auth().signInWithPhoneNumber(number, recaptchaVerifier)
            .then(function(result) {
                confirmationResult = result;
                console.log(confirmationResult);

                $("#sentSuccess").text("New code sent Successfully.");
                $("#sentSuccess").show();

                // Update the confirmation result if needed
                confirmationResult = confirmationResult;
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
</body>

</html>