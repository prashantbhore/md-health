@extends('front.layout.layout')
@section("content")
<div class="content-wrapper">
    <div class="container py-100px for-cards order-details">
        <div class="row">
            <div class="col-md-3">
                @include('front.includes.sidebar')
            </div>
            <div class="col-md-9">
                <div class="card mb-4">
                    <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <span class="text-green">Treatment No: </span>#MD3726378
                            <h6>Hearth Valve Replacement Surgery</h6>
                        </div>
                        <a href="{{url('medical-provider-dashboard')}}" class="d-flex align-items-center gap-1 text-decoration-none">
                            <img src="{{asset('front/assets/img/backPage.png')}}" alt="">
                            <p class="mb-0">Back Dashboard</p>
                        </a>
                    </h5>
                    <div class="card-body">

                        <div class="df-between">
                            <button class="btn btn-md btn-text" style="height: 47px;width:228px;">Patient Details</button>
                            <button class="btn btn-md bg-transparent border-dark btn-text" style="height: 47px;width:228px;">Package Details</button>
                            <button class="btn btn-md btn-text btn-msg" style="height: 47px;"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                    <path d="M7 7.875H14M7 11.375H10.0625M9.1875 17.0625L7.875 15.75H5.25C4.55381 15.75 3.88613 15.4734 3.39384 14.9812C2.90156 14.4889 2.625 13.8212 2.625 13.125V6.125C2.625 5.42881 2.90156 4.76113 3.39384 4.26884C3.88613 3.77656 4.55381 3.5 5.25 3.5H15.75C16.4462 3.5 17.1139 3.77656 17.6062 4.26884C18.0984 4.76113 18.375 5.42881 18.375 6.125V9.625" stroke="#111111" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M15.7501 19.2497L18.6814 16.3762C18.8611 16.2017 19.0041 15.9931 19.1019 15.7625C19.1996 15.5319 19.2502 15.284 19.2506 15.0335C19.251 14.7831 19.2013 14.535 19.1042 14.3041C19.0072 14.0732 18.8649 13.8641 18.6857 13.689C18.3201 13.3315 17.8293 13.1308 17.3179 13.1298C16.8064 13.1288 16.3149 13.3276 15.9479 13.6838L15.7519 13.8763L15.5567 13.6838C15.1911 13.3265 14.7005 13.126 14.1893 13.125C13.6781 13.124 13.1867 13.3226 12.8197 13.6785C12.6399 13.8529 12.4969 14.0615 12.399 14.2921C12.3012 14.5227 12.2505 14.7705 12.25 15.021C12.2495 15.2715 12.2992 15.5195 12.3962 15.7505C12.4931 15.9814 12.6354 16.1906 12.8145 16.3657L15.7501 19.2497Z" stroke="#111111" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round" />
                                </svg> Message</button>
                        </div>
                        <div class="py-5">
                            <div class="row card-details">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">First Name</label>
                                    <p>Ali</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Last Name</label>
                                    <p>Danish</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="contactNo">Contact Number</label>
                                    <p>+44 4444 44 44</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email">E-mail</label>
                                    <p>ali.danish@mdhealth.io</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="address">Address</label>
                                    <p class="d-flex flex-column gap-3">
                                        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</span>
                                        <span>City / Country</span>
                                    </p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="address">Invoice Address</label>
                                    <p class="d-flex flex-column gap-3">
                                        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</span>
                                        <span>City / Country</span>
                                    </p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <h4>First Payment - 20%</h4>
                                    <h3>Payment Date: 12/02/2023</h3>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <h4>Payment Info</h4>
                                    <h5>via Credit / Debit Card ( **** **** **** 9892 )</h5>
                                    <h3>3D Secure - 20% Payment</h3>
                                </div>

                                <!-- <div class="col-md-6">
                                    <div class="btn-label df-center">Remaining: 27.837,85 ₺</div>
                                </div> -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        
        </div>
    </div>
</div>
</div>
@endsection
@section('script')
<script>
    $(".mpDashboardLi").addClass("activeClass");
    $(".mpDashboard").addClass("md-active");
</script>
@endsection