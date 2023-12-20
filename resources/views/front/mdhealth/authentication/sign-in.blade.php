@extends('front.layout.layout')
@section("content")
<style>
    .navbar {
        display: none;
    }
    .error{
        color: red !important;
        font-size: 14px !important;
    }
</style>
<div class="container py-100px df-center sign-in-form">
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-column align-items-center gap-4">
                <div class="pt-3">
                    <img src="{{asset('front/assets/img/otpLogo.png')}}" alt="">
                </div>
                <h2 class="mb-0">Sign In to MD<span>health</span></h2>
                <p>The device is not yours? Use private or incognito mode to log in.</p>
                <div class="w-100 df-center">
                    <form action="{{url('user-login')}}" method="post" id="loginForm">
                        @csrf
                        <input type="hidden" name="platform_type" value="web">
                        <input type="hidden" name="login_type" value="login">
                        <div class="mb-3">
                            <label for="E-mail" class="form-label">E-mail</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="E-mail">
                        </div>
                        <div class="mb-3">
                            <label for="Password" class="form-label">Password</label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Remember Me
                            </label>
                        </div>
                        <div>
                            <button class="btn btn-md btn-text w-100 mb-3 df-center" style="height: 47px;">Sign In</button>
                        </div>
                        <div class="text-center">
                            <a href="#" class="btn-text">Back to MDhealth.co</a>
                        </div>
                        <input type="text" id="number" class="form-control" placeholder="+91 ********">
            <div id="recaptcha-container"></div>
            <button type="button" class="btn btn-primary mt-3" onclick="sendOTP();">Send OTP</button>
            <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>
            <div class="alert alert-success" id="successAuth" style="display: none;"></div>
        
                    </form>
                   
                </div>
                <form>
                    <input type="text" id="verification" class="form-control" placeholder="Verification code">
                    <button type="button" class="btn btn-danger mt-3" onclick="verify()">Verify code</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $('#loginForm').validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address"
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
</script>
{{-- <script>
 <script src="https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js"></script>
  
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  const firebaseConfig = {
    apiKey: "AIzaSyCi9vOusfNsRY2NgWUk8fDOjri9L8dALY8",
    authDomain: "sweedesinew.firebaseapp.com",
    databaseURL: "https://sweedesinew.firebaseio.com",
    projectId: "sweedesinew",
    storageBucket: "sweedesinew.appspot.com",
    messagingSenderId: "537186381446",
    appId: "1:537186381446:web:777955e71e5e61c8d62b07"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
</script> --}}
<script>
    window.onload = function() {
    render();
  };

  function render() {
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
    recaptchaVerifier.render();
  }

  function sendOTP() {
    var number = $("#number").val();
    firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
      window.confirmationResult = confirmationResult;
      coderesult = confirmationResult;
      localStorage.setItem('coderesult', JSON.stringify(coderesult));
    //   sessionStorage.setItem('key', coderesult);
      window.location.href = base_url + "/sms-code";
      console.log(coderesult);
      $("#successAuth").text("Message sent");
      $("#successAuth").show();
    }).catch(function(error) {
      $("#error").text(error.message);
      $("#error").show();
    });
  }
</script>

@endsection