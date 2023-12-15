@extends('front.layout.layout')
@section("content")
<style>
    .navbar {
        display: none;
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
                    <form action="{{url('api/md-medical-provider-login')}}" method="post">
                        @csrf
                        <input type="hidden" name="platform_type" value="web">
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
                            <a href="{{url('sms-code')}}" class="btn btn-md btn-text w-100 mb-3 df-center" style="height: 47px;">Sign In</a>
                        </div>
                        <div class="text-center">
                            <a href="#" class="btn-text">Back to MDhealth.co</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection