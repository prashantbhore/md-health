@php
    // dd($data);
@endphp

@extends('front.layout.layout2')
@section('content')
    <style>
        .creditCardContainer {
            position: absolute;
            width: 290px;
            right: -100px;
            gap: 10rem;
            padding: 55px 25px 50px 30px;
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
            font-size: 13px;
        }

        #bank .package-footer-order .pckg-bnk-card label {
            font-size: 13px;
        }

        #bank .package-footer-order .pckg-bnk-card:first-child p {
            font-size: 30px;
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
    </style>
    <div class="content-wrapper">
        <div class="container py-100px for-cards">
            <div class="row">
                <div class="col-md-3">
                    @include('front.includes.sidebar-user')
                </div>
                <div class="col-md-9">

                    <div class="card">
                        <h5 class="card-header mb-3">
                            Packages
                            <a href="{{ url('my-packages-list') }}"
                                class="fw-800 d-flex align-items-center gap-1 text-decoration-none text-dark mt-3">
                                <img src="{{ asset('front/assets/img/backPage.png') }}" alt="">
                                <p class="mb-0">Booked Packages</p>
                            </a>
                        </h5>
                        <div class="card-body">
                            <div class="package-payment-div">
                                <div class="paymentSection mb-5 ms-1">
                                    <div class="row">
                                        <div class="col-4">
                                            <label
                                                class="smallFont camptonBold d-flex align-items-center gap-1 fsb-2 fw-600">
                                                <input type="radio" value="card" name="paymentMethod" checked="">
                                                Credit or Debit Card
                                            </label>
                                        </div>
                                        <div class="col-4">
                                            <label
                                                class="smallFont camptonBold d-flex align-items-center gap-1 fsb-2 fw-600">
                                                <input type="radio" value="bank" name="paymentMethod">
                                                Bank Transfer
                                            </label>
                                        </div>
                                        <div class="col-4">
                                            <label
                                                class="smallFont camptonBold d-flex align-items-center gap-1 fsb-2 fw-600">
                                                <input type="radio" value="wallet" name="paymentMethod">
                                                My Wallet
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div id="card">
                                    <div class="row">
                                        <div class="col-8">
                                            <form action="" id="creditCardForm">
                                                <p class="fsb-2 fw-700 mb-1">Remaining Amount: <span
                                                        class="fsb-1">{{ !empty($data['package_percentage_price']) ? $data['package_percentage_price'] : '' }}</span>
                                                </p>
                                                <p class="fsb-2 fw-700 mb-4">Amount To Be Paid: <span
                                                        class="fsb-1">{{ !empty($data['pending_payment']) ? $data['pending_payment'] : '' }}
                                                        ₺</span></p>
                                                <input type="text" class="form-control mb-4" name=""
                                                    id="input1" placeholder="Enter Name">
                                                <input type="text" class="form-control mb-4" name=""
                                                    id="input2" placeholder="Enter Card Number">
                                                <div class="d-flex gap-2 mb-5">
                                                    <input type="text" id="input4" class="form-control"
                                                        placeholder="Enter End Date">
                                                    <input type="password" id="input3" class="form-control"
                                                        placeholder="Enter CVV">
                                                </div>
                                                <!-- <a> -->
                                                <a href="#" class="btn purchaseBtn fsb-2"
                                                    style="color: #fff; height: unset; padding: 12px 2rem;">Proceed
                                                    Payment</a>
                                                <!-- </a> -->
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
                                    <p class="fsb-2 fw-700 mb-1">Remaining Amount: <span class="fsb-1">80%</span></p>
                                    <p class="fsb-2 fw-700 mb-4">Amount To Be Paid: <span class="fsb-1">15.783,90 ₺</span>
                                    </p>

                                    <div class="package-bank-details">
                                        <div class="pckg-bnk-card mb-3">
                                            <label for="" class="fsb-2">Bank Name</label>
                                            <p class="fsb-1 fw-900">T.C. Garanti Bankasi</p>
                                        </div>
                                        <div class="pckg-bnk-card mb-3">
                                            <label for="" class="fsb-2">IBAN</label>
                                            <p class="fsb-1 fw-900">TR00 1234 1234 1234 1234 1234 12</p>
                                        </div>
                                        <div class="pckg-bnk-card mb-3">
                                            <label for="" class="fsb-2">Receiver Name</label>
                                            <p class="fsb-1 fw-900">MD Saglik Teknoloji A.S.</p>
                                        </div>
                                    </div>

                                    <div class="package-footer-order">
                                        <div class="pckg-bnk-card mb-5">
                                            <label for="" class="fsb-2">Bank Name</label>
                                            <p class="fsb-1 fw-900 text-green">MD9283-02</p>
                                        </div>
                                        <div class="pckg-bnk-card mb-5">
                                            <p class="fsb-1 fw-900 text-red">Attention!</p>
                                            <p class="fsb-2">Please make sure to write the above <b class="fsb-1">Order
                                                    ID</b> in the payment description.</p>
                                        </div>
                                    </div>
                                </div>

                                <div id="wallet">
                                    <div class="">
                                        <div class="">
                                            <p class="camptonBold vSmallFont text-center">1 MD<span
                                                    class="camptonBook vSmallFont">coin</span> = 1 Turkish Lira</p>
                                            <div class="">
                                                <div class="mdCard">
                                                    <div class="mt-3">
                                                        <p class="mb-0 camptonBook fw-bold lh-1">Available <span
                                                                class="camptonBold">MD</span>coin</p>
                                                        <p class="mb-0 camptonBold fs-3">500</p>
                                                        <a class="btn btn-sm inviteBtn df-center mt-3 camptonBold"
                                                            style="border-color: #000;" data-bs-toggle="modal"
                                                            data-bs-target="#UseMyMDCoin">Use My MD<span
                                                                class="camptonBook">coin</span></a>
                                                    </div>
                                                    <img src="front/assets/img/mdcoin.png" alt=""
                                                        style="width: 200px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" text-center px-5 align-self-end mt-4">
                                            <p class="mb-0 camptonBook fs-5 fw-bold lh-sm">invite your friends</p>
                                            <p class="mb-0 camptonBold fs-3">and <span
                                                    class="text-green"><u>earn</u></span> MD<span
                                                    class="camptonBook fw-bold">coin</span>.</p>
                                            <div class="mt-2 d-flex justify-content-center">
                                                <a href="{{ url('user-invite') }}" type="button"
                                                    class="btn btn-sm inviteBtn df-center mt-3 mb-5">Invite Friends</a>
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
