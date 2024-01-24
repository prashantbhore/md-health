@extends('front.layout.layout2')
@section("content")
<style>
    .payment-card {
        padding: 16px;
        border-radius: 5px;
    }

    .payment-card h5 {
        color: #000;
        font-family: Campton;
        font-size: 23px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }

    .payment-card h6 {
        color: #000;
        font-family: Campton !important;
        font-size: 13px;
        font-weight: 600;
        line-height: normal;
        letter-spacing: -0.52px;
    }

    .in-progress {
        border-radius: 2px;
        background: #F3771D;
        color: #FFF;
        text-align: center;
        font-family: Campton;
        font-size: 10px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        letter-spacing: -0.4px;
    }

    .in-progress,
    .active {
        width: 94px !important;
        height: 19px !important;
        flex-shrink: 0;

    }
</style>
<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="d-flex gap-3">
            <div class="w-292">
                @include('front.includes.sidebar')
            </div>
            <div class="w-761">
                <div class="card mb-4">
                    <div class="form-div">
                        <h5 class="card-header d-flex align-items-center justify-content-between mb-4">
                            <span>MY Bank Account Details</span>
                            <img src="{{asset('front/assets/img/GoldMember.svg')}}" alt="">
                        </h5>

                        {{-- {{dd($medical_provider_bank_details)}} --}}

                        <form method="POST" action="{{ route('store.vendor.bank.details') }}" id="paymentinfo">
                            @csrf
                            <input type="hidden" name="id" value="{{!empty($medical_provider_bank_details['id'])?$medical_provider_bank_details['id']:''}}">
                            <div class="card-body">
                                <div class="form-group mb-4">
                                    <label class="form-label mb-3">Your Company IBAN</label>
                                    <div class="input-icon-div">
                                        <input type="text" name="account_number" class="form-control tr-prefix-input" value="{{!empty($medical_provider_bank_details['account_number'])?$medical_provider_bank_details['account_number']:''}}">
                                    </div>
                                </div>

                                <div class="form-group mb-5">
                                    <label class="form-label mb-3">Company Name</label>
                                    <div class="input-icon-div">
                                        <input type="text" name="bank_name" class="form-control" placeholder="MDhealth Ltd. Sti." value="{{!empty($medical_provider_bank_details['bank_name'])?$medical_provider_bank_details['bank_name']:''}}">
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <button type="submit" class="btn save-btn-black">{{!empty($medical_provider_bank_details['id'])?'Update':'Save'}} Bank Account</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>

                <div class="payment-detail-div mb-4 ">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="payment-card bg-warning">
                                <h6 class="text-dark fsb-2">Total Payment</h6>
                                <h5 class="text-dark fsb-1">{{$total_business_amount}} <span class="lira ps-1">₺</span></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="payment-card bg-green">
                                <h6 class="text-dark fsb-2">Total Completed Payment</h6>
                                <h5 class="text-dark fsb-1">{{ $total_completed_amount}} <span class="lira">₺</span></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="payment-card bg-orange">
                                <h6 class="text-white fsb-2">Total Pending Payment</h6>
                                <h5 class="text-white fsb-1">{{$total_pending_amount}} <span class="lira">₺</span></h5>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RECENT TRETMENTS -->
                <div class="card">
                    <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                        Transaction
                    </h5>
                    <div class="card-body">

                        <div class="filter-div">
                            <div class="search-div">
                                <input type="text" placeholder="Search" id="liveSearchInput">
                            </div>

                            {{-- <div class="list-div">
                                <select name="" id="">
                                    <option value="">List for date</option>
                                    <option value="">List for Price</option>
                                    <option value="">List for Distance</option>
                                </select>
                            </div> --}}

                        </div>

                        <div class="transaction-list" id="paymentList">
                            @if($payment_list)
                            @foreach ($payment_list as $payment)


                            <div class="card shadow-none mb-4 pkgCard" style="min-height: 75px;">
                                <div class="card-body d-flex align-items-center gap-3 w-100 p-4">
                                    <div class="df-center">
                                        <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="" class="md-img-sm">
                                    </div>
                                    <div class="df-coloumn">
                                        <div class="trmt-card-body">
                                            <h5 class="mb-0 fs-13">Payment ID: #{{!empty($payment['payment_id'])?$payment['payment_id']:''}}</h5>
                                            <h6 class="my-0 card-h1">{{!empty($payment['amount'])?$payment['amount']:''}} <span class="lira">₺</span></h6>
                                        </div>
                                    </div>
                                    @if($payment['payment_status']=='pending')
                                    <div class="d-flex align-items-center gap-3 mb-3 ms-auto">
                                        <div class="trmt-card-footer">
                                            <span class="in-progress df-center">Pending</span>
                                        </div>
                                    </div>
                                    @endif


                                    @if($payment['payment_status']=='completed')
                                    <div class="d-flex align-items-center gap-3 mb-3 ms-auto">
                                        <div class="trmt-card-footer">
                                            <span class=" df-center">Completed</span>
                                        </div>
                                    </div>
                                    @endif

                                </div>
                            </div>



                            @endforeach
                            @else
                            @include('front.includes.no-data-found')
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    <script>
        $(".mpPaymentLi").addClass("activeClass");
        $(".mpPayment").addClass("md-active");
    </script>

    <script>
        $(document).ready(function() {
            $('#liveSearchInput').on('input', function() {

                let query = $(this).val();

                var base_url = $("#base_url").val();

                $.ajax({
                    url: base_url + "/medical-provider-payment-search",
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    data: {
                        query: query
                    },
                    success: function(html) {
                        // Update only if the search box is not empty
                        if (query.trim() !== "") {
                            $('#searchResultsContainer').html(html);
                        } else {
                            // Clear the results when the search box is empty
                            $('#searchResultsContainer').html("");
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var trPrefixInput = document.querySelector('.tr-prefix-input');
    
            trPrefixInput.addEventListener('input', function() {
                if (!trPrefixInput.value.startsWith('TR')) {
                    trPrefixInput.value = 'TR' + trPrefixInput.value;
                }
            });
        });
    </script>
    <!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include jQuery Validation Plugin -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#paymentinfo").validate({
                rules: {
                    account_number: {
                        required: true,
                        minlength: 26,
                        // maxlength: 34,
                    },
                    bank_name: {
                        required: true,
                    }
                },
                messages: {
                    account_number: {
                        required: "Please enter IBAN number",
                        minlength: "Please enter at least 24 digits",
                        // maxlength: "Please enter at most 34 digits",
                    },
                    bank_name: {
                        required: "Please enter bank name",
                    }
                }
            });
        });
    </script>
    @endsection