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
                <h2 class="mb-0">SMS Code</h2>
                <p>Enter the 4 digit code sent to your mobile phone</p>
                <div class="w-100 df-center mb-3 sms-input gap-3">
                    <input type="text" minlength="1" maxlength="1" onkeypress="return /[0-9]/i.test(event.key)" class="form-control">
                    <input type="text" minlength="1" maxlength="1" onkeypress="return /[0-9]/i.test(event.key)" class="form-control">
                    <input type="text" minlength="1" maxlength="1" onkeypress="return /[0-9]/i.test(event.key)" class="form-control">
                    <input type="text" minlength="1" maxlength="1" onkeypress="return /[0-9]/i.test(event.key)" class="form-control">
                </div>
                <button class="btn btn-md btn-text w-75 mb-3" style="height: 47px;">Sign In</button>

                <h6 class="mb-0 d-flex align-items-center gap-1">
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
                    <img src="{{asset('front/assets/img/otpLogo.png')}}" alt="">
                </div>
                <h2 class="mb-0">Verification</h2>
                <p>Enter the 4 digit code sent to your mobile phone</p>
                <div class="w-100 df-center">
                    <img src="{{asset('front/assets/img/heart-rate.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection