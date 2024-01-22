@php
// dd($data);
@endphp

@extends('front.layout.layout2')
@section('content')
<style>
    .inviteBtn {
        border-color: #000;
        width: 168px;
        height: 47px;
        flex-shrink: 0;
        color: #000;
        text-align: center;
        font-family: Campton;
        font-size: 15px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        letter-spacing: -0.6px;
    }

    .warning {
        color: #F3002C;
        font-family: Campton;
        font-size: 23px;
        font-weight: 700;
        line-height: normal;
        letter-spacing: -1.61px;
    }

    .cardNumber {
        color: #FFF;
        font-family: Campton;
        font-size: 20px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }

    .creditCardContainer {
        position: absolute;
        right: -145px;
        /* gap: 10rem; */
        /* padding: 55px 25px 50px 30px; */

        width: 297px;
        height: 461px;
        /* transform: rotate(90deg); */
        flex-shrink: 0;
    }

    .creditCardContainer .visa {
        transform: unset;
    }

    .purchaseBtn {
        letter-spacing: 0;
    }

    #card {
        padding-bottom: 200px;
    }

    #card p span {
        font-weight: 900 !important;
    }

    #bank .package-bank-details {
        border-bottom: 1px solid #4CDB06;
        margin-bottom: 35px;
        padding-bottom: 35px;
    }

    #bank .package-bank-details .pckg-bnk-card label {
        color: #949494;
        text-align: center;
        font-family: Campton;
        font-size: 13px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        letter-spacing: -0.91px;
    }

    #bank .package-footer-order .pckg-bnk-card label {
        font-size: 13px;
    }

    #bank .package-footer-order .pckg-bnk-card:first-child p {
        color: #4CDB06;
        font-family: Campton;
        font-size: 30px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
    }

    #bank .package-footer-order .pckg-bnk-card:last-child p:first-child {
        font-size: 23px;
    }

    #bank .package-footer-order .pckg-bnk-card:last-child p:last-child {
        font-size: 20px;
    }

    #wallet .mdCard {
        margin: 0 100px;
    }

    .paymentSection label{
        cursor: pointer;
    }
</style>
<div class="content-wrapper">
    <div class="container py-100px for-cards">
    <div class="d-flex gap-3">
            <div class="w-292">
            @include('front.includes.sidebar-user')
            </div>
            <div class="w-761">
                <div class="card">
                    <h5 class="card-header mb-3">
                        Packages
                        <a href="{{ url('my-packages-list') }}" class=" d-flex align-items-center gap-1 text-decoration-none text-black float-end m-auto card-h1 mb-4">
                            <img src="{{ asset('front/assets/img/backPage.png') }}" alt="">
                            <p class="mb-0">Booked Packages</p>
                        </a>
                    </h5>
                    <div class="card-body">
                        <div class="package-payment-div">
                            <div class="paymentSection mb-5 ms-1">
                                <div class="row">
                                    <div class="col-4">
                                        <label class="smallFont camptonBold d-flex align-items-center gap-1 fsb-2 fw-600">
                                            <input type="radio" value="card" name="paymentMethod" checked="">
                                            Credit or Debit Card
                                        </label>
                                    </div>
                                    <div class="col-4">
                                        <label class="smallFont camptonBold d-flex align-items-center gap-1 fsb-2 fw-600">
                                            <input type="radio" value="bank" name="paymentMethod">
                                            Bank Transfer
                                        </label>
                                    </div>
                                    <div class="col-4">
                                        <label class="smallFont camptonBold d-flex align-items-center gap-1 fsb-2 fw-600">
                                            <input type="radio" value="wallet" name="paymentMethod">
                                            My Wallet
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div id="card">
                                <div class="row">
                                    <div class="col-8">
                                        <form action="" id="creditCardForm" class="card-details wd100">

                                            <h1 class="card-h1 mb-2">Remaining Amount: <span class="camptonExtraBold fs-18">{{ !empty($data['package_percentage_price']) ? $data['package_percentage_price'] : '' }}</span></h1>

                                            <h1 class="card-h1 mb-4 mt-0">Amount To Be Paid: <span class="camptonExtraBold fs-18">{{ !empty($data['pending_payment']) ? $data['pending_payment'] : '' }} <span class="lira">₺</span></span></h1>

                                            <div class="row g-4">
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control w-100" name="" id="input1" placeholder="Enter Name">
                                                </div>

                                                <div class="col-md-12">
                                                    <input type="text" class="form-control w-100" name="" id="input2" placeholder="Enter Card Number">
                                                </div>

                                                <div class="col-md-6">
                                                    <input type="text" class="form-control w-100" name="" id="input4" placeholder="Enter End Date">
                                                </div>

                                                <div class="col-md-6">
                                                    <input type="password" class="form-control w-100" name="" id="input3" placeholder="Enter CVV">
                                                </div>

                                                <div class="col-md-12">
                                                    <a href="#" class="btn purchaseBtn purchaseBtn-new-user fsb-2" style="color: #fff; height: unset; padding: 12px 2rem;">Proceed Payment</a>
                                                </div>
                                            </div>


                                        </form>
                                    </div>
                                    <div class="col-4 position-relative">
                                        <div class="creditCardContainer">
                                            <div>
                                                <a href="{{ url('/') }}">
                                                    <img src="front/assets/img/MDHealth_light.svg" alt="">
                                                </a>
                                            </div>
                                            <div class="d-flex flex-column gap-5">
                                                <div class="d-flex flex-column">
                                                    <p class="cardNumber">1234 1234 1234 1234</p>
                                                    <div>
                                                        <p class="cardholder">John Smith</p>
                                                        <p class="validity">02/24</p>
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <img class="visa" src="front/assets/img/visa.svg" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="bank">
                                <p class="card-h1 mb-2">Remaining Amount: <span class="camptonExtraBold fs-18">80%</span></p>
                                <p class="card-h1 mb-5">Amount To Be Paid: <span class="camptonExtraBold fs-18">15.783,90 <span class="lira"> ₺</span></span></p>

                                <div class="package-bank-details">
                                    <div class="pckg-bnk-card mb-4">
                                        <label for="Bank Name">Bank Name</label>
                                        <p class="card-h4 camptonBook">T.C. Garanti Bankasi</p>
                                    </div>

                                    <div class="pckg-bnk-card mb-4">
                                        <label for="IBAN">IBAN</label>
                                        <p class="card-h4 camptonBook">TR00 1234 1234 1234 1234 1234 12</p>
                                    </div>

                                    <div class="pckg-bnk-card mb-4">
                                        <label for="Receiver Name">Receiver Name</label>
                                        <p class="card-h4 camptonBook">MD Saglik Teknoloji A.S.</p>
                                    </div>
                                </div>

                                <div class="package-footer-order">
                                    <div class="pckg-bnk-card mb-5">
                                        <label for="Order ID" class="card-h3">Order ID</label>
                                        <p>MD9283-02</p>
                                    </div>

                                    <div class="pckg-bnk-card mb-5">
                                        <p class="warning mb-0">Attention!</p>
                                        <p class="card-h4 camptonBook">Please make sure to write the above <b class="fsb-1">Order ID</b> in the payment description.</p>
                                    </div>
                                </div>
                            </div>

                            <div id="wallet">
                                <div class="">
                                    <div class="">
                                        <p class="card-h1 text-center">1 MD<span class="camptonBook card-p1">coin</span> = 1 Turkish Lira</p>
                                        <div class="">
                                            <div class="mdCard">
                                                <div class="mt-3">
                                                    <p class="mb-0 card-h4 camptonBook lh-1">Available <span class="camptonBold">MD</span>coin</p>
                                                    <p class="mb-0 coinsMD">500</p>
                                                    <a class="btn btn-sm inviteBtn df-center mt-3 camptonBold" style="border-color: #000;" data-bs-toggle="modal" data-bs-target="#UseMyMDCoin">Use My MD<span class="camptonBook">coin</span></a>
                                                </div>
                                                <img src="front/assets/img/mdcoin.png" alt="" style="width: 200px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" text-center px-5 align-self-end mt-4">
                                        <p class="mb-0 card-h8 campton">invite your friends</p>
                                        <p class="mb-0 andInv">and <span class="text-green camptonBold">earn</span> <span class="camptonBold">MD</span><span class="camptonBook fw-bold">coin</span>.</p>
                                        <div class="mt-2 d-flex justify-content-center">
                                            <a href="{{ url('user-invite') }}" type="button" class="btn inviteBtn2 df-center my-5">Invite Friends</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Change Patient Information -->
    <div class="modal fade" id="UseMyMDCoin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <p class="fsb-2 mb-0 fw-600 text-center">You don't have sufficient coin for the purchase.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Change Patient Information -->
    @endsection
    @section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    {{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            let checkedVal;
            var baseUrl = $('#base_url').val();
            var token = "{{ Session::get('login_token') }}";
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $(".upPackageLi").addClass("activeClass");
            $(".upPackage").addClass("md-active");
            $('input[type=radio]').click(function() {
                checkedVal = $('input[name="paymentMethod"]:checked').val();
                if (checkedVal === "card") {
                    $("#card").css('display', 'block');
                    $("#wallet").css('display', 'none');
                    $("#bank").css('display', 'none');
                } else if (checkedVal === "wallet") {
                    $("#card").css('display', 'none');
                    $("#wallet").css('display', 'block');
                    $("#bank").css('display', 'none');
                } else if (checkedVal === "bank") {
                    $("#card").css('display', 'none');
                    $("#wallet").css('display', 'none');
                    $("#bank").css('display', 'block');
                }
            });

            $('#creditCardForm input').on('input', function() {

                var inputValue = $(this).val();

                switch ($(this).attr('id')) {
                    case 'input1':
                        $('.cardholder').text(inputValue);
                        cardName = $(this).val().toString();
                        break;
                    case 'input2':
                        $('.cardNumber').text(inputValue);
                        cardNo = $(this).val().toString()
                        break;
                    case 'input3':
                        cardCvv = $(this).val().toString();
                        break;
                    case 'input4':
                        $('.validity').text(inputValue);
                        cardExpiryDate = $(this).val().toString();
                        break;
                }
            });

            $('.purchaseBtn').click(function() {
                makePurchase();
            })

            //////////////////////////////////////////////////////////////////////

            function makePurchase() {


                // alert(token);
                // var token = '145|QbVxfOaPYonjsIqwVibAdJB0cP82yRzuBk94qajf28c079a3';

                var formData = new FormData();
                var packageId = "{{ !empty($data['package_id']) ? $data['package_id'] : '' }}";
                var purchaseId = "{{ !empty($data['purchase_id']) ? $data['purchase_id'] : '' }}";
                var proxyPrice = "{{ !empty($data['sale_price']) ? $data['sale_price'] : '' }}";
                var percentage =
                    "{{ !empty($data['package_percentage_price']) ? $data['package_percentage_price'] : '' }}";
                var paidAmount = "{{ !empty($data['pending_payment']) ? $data['pending_payment'] : '' }}";
                // alert(proxyPrice);
                formData.append('package_id', packageId);
                formData.append('purchase_id', purchaseId);
                formData.append('sale_price', proxyPrice);
                formData.append('paid_amount', paidAmount);
                formData.append('percentage', percentage);
                formData.append('pending_amount', paidAmount);
                formData.append('platform_type', 'web');
                formData.append('card_no', cardNo ?? '');
                formData.append('card_expiry_date', cardExpiryDate ?? '');
                formData.append('card_cvv', cardCvv ?? '');
                formData.append('card_name', cardName ?? '');
                console.log(formData);
                $.ajax({
                    url: baseUrl + '/api/md-customer-purchase-package',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        if (response.status == "200") {
                            // alert('success');
                            window.location.href = baseUrl + '/payment-status';
                        }
                    },
                });
            }

        });
    </script>
    @endsection