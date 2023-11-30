@extends('admin.layout.layout2')
@section("content")

<section>
    <div class="container df-center" style="height: 100vh;">
        <div class="card signInCard">
            <div class="card-body">
                <div class="df-center flex-column mb-3">
                    <img src="{{URL::asset('admin/assets/img/MDHealth.svg')}}" alt="" style="height: 32px;" class="my-3" />

                    <h4 class="signIn-head mb-3">Sign In to MD<span>health</span></h4>

                    <p class="signIn-para text-center">The device is not yours? Use private or
                        incognito mode to log in.</p>
                </div>

              
                <form action="{{ url('super-admin-login') }}" method="post" id="loginForm" class="container-sm px-5">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" aria-describedby="email">
                    </div>
                
                    <div class="mb-3">
                        <label for="Password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control" id="Password" placeholder="Password">
                            <button type="button" id="togglePassword" class="btn btn-outline-secondary">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember Me</label>
                        </div>
                    </div>
                
                    <button type="submit" class="btn save-btn w-100 df-center">Continue</button>
                    <div class="text-center mt-3">
                        <a href="#" class="mt-3 backto">Back to MDhealth.co</a>
                    </div>
                </form>


            </div>
        </div>

    </div>
</section>


@endsection
@section('script')
<script>
    // jQuery is assumed to be loaded in your project

    $(document).ready(function () {
        $("#togglePassword").click(function () {
            var passwordField = $("#Password");
            var passwordFieldType = passwordField.attr("type");
            if (passwordFieldType === "password") {
                passwordField.attr("type", "text");
            } else {
                passwordField.attr("type", "password");
            }
        });
    });
</script>

@endsection