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

        .paymentSection label {
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
                            <a href="{{ url('my-packages-list') }}"
                                class=" d-flex align-items-center gap-1 text-decoration-none text-black float-end m-auto card-h1 mb-4">
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
                                            {{-- <form action="" id="creditCardForm" class="card-details wd100"> --}}
                                            <form id="purchase_by_mdcoins" action="{{ url('/purchase-by-mdcoins') }}"
                                                method="POST">
                                                @csrf
                                            </form>
                                            <form id="procced_to_pay_form" class="card-details wd100"
                                                action="{{ url('/sandbox') }}" method="POST">
                                                @csrf
                                                <h1 class="card-h1 mb-2">Remaining Amount: <span
                                                        class="camptonExtraBold fs-18">{{ !empty($data['package_percentage_price']) ? $data['package_percentage_price'] : '' }}</span>
                                                </h1>

                                                <h1 class="card-h1 mb-4 mt-0">Amount To Be Paid: <span
                                                        class="camptonExtraBold fs-18">{{ !empty($data['pending_payment']) ? $data['pending_payment'] : '' }}
                                                        <span class="lira">₺</span></span></h1>
                                                <input type="hidden" name="package_id" id="package_id"
                                                    value="{{ $data['package_id'] }}">
                                                <input type="hidden" name="patient_id" id="patient_id"
                                                    value="{{ $data['patient_id'] }}">
                                                <input type="hidden" name="payment_percent" id="payment_percent"
                                                    value="">
                                                <input type="hidden" name="total_paying_price" id="total_paying_price"
                                                    value="">
                                                <input type="hidden" name="card_name" id="card_name" value="">
                                                <input type="hidden" name="card_number" id="card_number" value="">
                                                <input type="hidden" name="cvv" id="cvv" value="">
                                                <input type="hidden" name="validity" id="validity" value="">

                                                <div class="mb-4-input">
                                                    <input type="text" name="input1" class="form-control"
                                                        onkeypress="return /^[A-Za-z\s]*$/.test(event.key)" id="input1"
                                                        placeholder="Card Holder Name">
                                                    <h5 id="verifyinput1" class="mt-4" style="color: red;">
                                                        Please enter card holder name
                                                    </h5>
                                                </div>
                                                <div class="mb-4-input">
                                                    <input type="text" onkeypress="return /[0-9 ]/i.test(event.key)"
                                                        name="input2" class="form-control" id="input2"
                                                        placeholder="Card Number">
                                                    <h5 id="verifyinput2" class="mt-4" style="color: red;">
                                                        Please enter card number
                                                    </h5>
                                                </div>
                                                <div class="d-flex gap-3 mb-4-input">
                                                    <div class="w-50"><input type="text" id="input4"
                                                            name="input4" class="form-control " placeholder="00/00">
                                                        <h5 id="verifyinput4" class="mt-0" style="color: red;">
                                                            Please enter expiry date
                                                        </h5>
                                                    </div>
                                                    <div class="w-50">
                                                        <input type="password" id="input3" name="input3"
                                                            class="form-control" placeholder="CVV"
                                                            onkeypress="return /[0-9 ]/i.test(event.key)">
                                                        <h5 id="verifyinput3" class="mt-0" style="color: red;">
                                                            Please enter CVV
                                                        </h5>
                                                    </div>
                                                </div>

                                                <!-- <a href="{{ url('payment-status') }}"> -->
                                                <!-- <a href="{{ url('payment-status') }}" -->
                                                <a href="javascript:void(0)"
                                                    style="color: #fff; height: unset; padding: 12px 2rem;"
                                                    class="btn purchaseBtn purchaseBtn-new" style="color: #fff;">Proceed
                                                    Payment</a>
                                                <!-- </a> -->
                                            </form>
                                            {{-- <div class="row g-4">
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


                                        </form> --}}
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
                                                        <img class="visa" src=""
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="bank">
                                    <p class="card-h1 mb-2">Remaining Amount: <span
                                            class="camptonExtraBold fs-18">80%</span></p>
                                    <p class="card-h1 mb-5">Amount To Be Paid: <span
                                            class="camptonExtraBold fs-18">15.783,90 <span class="lira"> ₺</span></span>
                                    </p>

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
                                            <p class="card-h4 camptonBook">Please make sure to write the above <b
                                                    class="fsb-1">Order ID</b> in the payment description.</p>
                                        </div>
                                    </div>
                                </div>

                                <div id="wallet">
                                    <div class="">
                                        <div class="">
                                            <p class="card-h1 text-center">1 MD<span
                                                    class="camptonBook card-p1">coin</span> = 1 Turkish Lira</p>
                                            <div class="">
                                                <div class="mdCard">
                                                    <div class="mt-3">
                                                        <p class="mb-0 card-h4 camptonBook lh-1">Available <span
                                                                class="camptonBold">MD</span>coin</p>
                                                        <p class="mb-0 coinsMD">500</p>
                                                        <a class="btn btn-sm inviteBtn df-center mt-3 camptonBold"
                                                            style="border-color: #000;" {{-- data-bs-toggle="modal" --}}
                                                            id="purchase_by_coins" {{-- data-bs-target="#UseMyMDCoin" --}}>Use My MD<span
                                                                class="camptonBook">coin</span></a>
                                                    </div>
                                                    <img src="front/assets/img/mdcoin.png" alt=""
                                                        style="width: 200px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" text-center px-5 align-self-end mt-4">
                                            <p class="mb-0 card-h8 campton">invite your friends</p>
                                            <p class="mb-0 andInv">and <span class="text-green camptonBold">earn</span>
                                                <span class="camptonBold">MD</span><span
                                                    class="camptonBook fw-bold">coin</span>.
                                            </p>
                                            <div class="mt-2 d-flex justify-content-center">
                                                <a href="{{ url('user-invite') }}" type="button"
                                                    class="btn inviteBtn2 df-center my-5">Invite Friends</a>
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
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                // Function to validate input fields
                function validateInputFields() {
                    var isValid = true;
                    // Validate Card Holder Name
                    var cardHolderName = $('#input1').val().trim();
                    if (cardHolderName === '') {
                        $('#input1').css('border-color', 'red');
                        $('#verifyinput1').show();
                        isValid = false;
                    } else {
                        $('#input1').css('border-color', '#ced4da'); // Default border color
                        $('#verifyinput1').hide();
                    }
                    // Validate Card Number
                    var cardNumber = $('#input2').val().trim();
                    if (cardNumber === '') {
                        $('#input2').css('border-color', 'red');
                        $('#verifyinput2').show();
                        isValid = false;
                    } else {
                        $('#input2').css('border-color', '#ced4da'); // Default border color
                        $('#verifyinput2').hide();
                    }
                    // Validate Expiry Date
                    var expiryDate = $('#input4').val().trim();
                    if (expiryDate === '') {
                        $('#input4').css('border-color', 'red');
                        $('#verifyinput4').show();
                        isValid = false;
                    } else {
                        $('#input4').css('border-color', '#ced4da'); // Default border color
                        $('#verifyinput4').hide();
                    }
                    // Validate CVV
                    var cvv = $('#input3').val().trim();
                    if (cvv === '') {
                        $('#input3').css('border-color', 'red');
                        $('#verifyinput3').show();
                        isValid = false;
                    } else {
                        $('#input3').css('border-color', '#ced4da'); // Default border color
                        $('#verifyinput3').hide();
                    }
                    return isValid;
                }

                // Proceed Payment button click event
                $('.purchaseBtn').click(function() {
                    if (validateInputFields()) {
                        // Proceed with the payment
                        $('#procced_to_pay_form').submit();
                    }
                });

                // Focusout event to change border color to gray when focus is lost
                $('input[type="text"], input[type="password"]').focusout(function() {
                    $(this).css('border-color', '#ced4da');
                });
            });
        </script>



        <script>
            $(document).ready(function() {

                var baseUrl = $('#base_url').val();
                var token = "{{ Session::get('login_token') }}";
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                var totalPrice = 0;
                var proxyPrice = 0;
                var isTwentySelected = true;
                var isThirtySelected = false;
                var isFiftySelected = false;
                var isHundredSelected = false;
                var cardNo;
                var totaltoShowPrice;
                var cardExpiryDate;
                var cardCvv;
                var cardName;
                var twentyAmount;
                var thirtyAmount;
                var fiftyAmount;
                var hundredAmount;
                var purchaseDetails;
                var discounts;
                var percentValue = 20;
                var otherServices;
                var checkedTitles = [];
                var packageId = "{{ $data['package_id'] }}";
                var patientId = "{{ $data['patient_id'] }}";
                var formData = new FormData();
                formData.append('package_id', packageId);
                // getData();

                ///////////////////////////////////////////////////////////////////////////////

               

                $('#procced_to_pay_form input').on('input', function() {

                    var inputValue = $(this).val();

                    switch ($(this).attr('id')) {
                        case 'input1':
                            $('.cardholder').text(inputValue);
                            cardName = $(this).val().toString();
                            $('#card_name').val(cardName);
                            break;
                        case 'input2':
                            $('.cardNumber').text(inputValue);
                            cardNo = $(this).val().toString();
                            // cardNo.replace(/\s/g, '');
                            // alert('cardNo: '+cardNo)
                            $('#card_number').val(cardNo);
                            // Replace with the actual BIN
                            // var cardType = getCardType(cardNo);
                            var cardType2 = getCardIssuer(cardNo);
                            var cardNumberInput = $(this).val();

                            // Format the card number
                            var formattedCardNumber = formatCardNumber(cardNumberInput)
                            formattedCardNumber.replace(/\D/g, '');
                            // Update the input field value
                            // $(this).val(formattedCardNumber);
                            // alert(formattedCardNumber);
                            // Update the paragraph content
                            $('#input2').val(formattedCardNumber);
                            $('.cardNumber').text(formattedCardNumber);

                            console.log('Card Type:', cardType2);
                            break;
                        case 'input3':
                            cardCvv = $(this).val().toString();
                            $('#cvv').val(cardCvv);
                            break;
                        case 'input4':
                            $('.validity').text(inputValue);
                            cardExpiryDate = $(this).val().toString();
                            $('#validity').val(cardExpiryDate);
                            var inputValue = $(this).val();

                            // Remove all non-numeric characters
                            var numericValue = inputValue.replace(/\D/g, '');

                            // Format the value as MM/YY
                            var formattedValue = formatValidityDate(numericValue);

                            // Update the input field with the formatted value
                            $(this).val(formattedValue);
                            break;
                    }
                });

                $('.purchaseBtn').click(function(event) {
                    // makePurchase();
                    $('card_name').val($('#input1').val());
                    $('card_number').val($('#input2').val());
                    $('cvv').val($('#input3').val());
                    $('validity').val($('#input4').val());
                    var form = $('#procced_to_pay_form');

                    // Additional data
                    // var pendingAmount = proxyPrice - totalPrice;

                    // if (isTwentySelected) {
                    //     var percentage = '20';
                    // } else if (isThirtySelected) {
                    //     var percentage = '30';
                    // } else if (isFiftySelected) {
                    //     var percentage = '50';
                    // } else if (isHundredSelected) {
                    //     var percentage = '100';
                    // }

                    var additionalData = {
                        'package_id': packageId,
                        'patient_id': patientId,
                        'purchase_id':"{{ $data['purchase_id'] }}",
                        // 'sale_price': proxyPrice,
                        'paid_amount': "{{ $data['pending_payment'] }}",
                        'platform_type': 'web',
                        'card_no': cardNo || '',
                        'card_expiry_date': cardExpiryDate || '',
                        'card_cvv': cardCvv || '',
                        'card_name': cardName || '',
                        'pending_amount': "{{ $data['pending_payment'] }}",
                        'total_paying_price':"{{ $data['pending_payment'] }}",
                        'percentage': "{{ $data['package_percentage_price'] }}",
                        // 'other_services': checkedTitles,
                    };

                    // Add additional data to the form
                    $.each(additionalData, function(name, value) {
                        form.append($('<input>').attr({
                            type: 'hidden',
                            name: name,
                            value: value
                        }));
                    });

                    event.preventDefault();

                    // Reset previous error messages
                    $("h5[id^='verify']").hide();

                    // Validate Card Holder Name
                    var input1 = $("#input1").val().trim();
                    if (input1 === "") {
                        $("#verifyinput1").show();
                        return;
                    }

                    // Validate Card Number
                    var input2 = $("#input2").val().trim();
                    if (input2 === "") {
                        $("#verifyinput2").show();
                        return;
                    }

                    // Validate CVV
                    var input3 = $("#input3").val().trim();
                    if (input3.length < 1 || input3.length > 3) {
                        $("#verifyinput3").show();
                        return;
                    }

                    // Validate Expiry Date
                    var input4 = $("#input4").val().trim();
                    if (input4 === "") {
                        $("#verifyinput4").show();
                        return;
                    }

                    // If all validations pass, submit the form
                    $("#procced_to_pay_form").submit();
                    // Submit the form
                })

                $('#purchase_by_coins').click(function() {
                    // makePurchase();
                    var form = $('#purchase_by_mdcoins');

                    // Additional data
                    var pendingAmount = proxyPrice - totalPrice;

                    if (isTwentySelected) {
                        var percentage = '20';
                    } else if (isThirtySelected) {
                        var percentage = '30';
                    } else if (isFiftySelected) {
                        var percentage = '50';
                    } else if (isHundredSelected) {
                        var percentage = '100';
                    }
                    // $('#card_number').val(cardNo);

                    var additionalData = {
                        'package_id': packageId,
                        'patient_id': patientId,
                        'sale_price': proxyPrice,
                        'paid_amount': totalPrice,
                        'platform_type': 'web',
                        'pending_amount': pendingAmount,
                        'percentage': percentage
                    };

                    // Add additional data to the form
                    $.each(additionalData, function(name, value) {
                        form.append($('<input>').attr({
                            type: 'hidden',
                            name: name,
                            value: value
                        }));
                    });

                    // Submit the form
                    form.submit();
                });

                

                ////////////////////////////////////////////////////////////////////////////////

               

                ///////////////////////////////////Mplus03/////////////////////////////////////////////////

                function getBankList() {
                    $.ajax({
                        url: baseUrl + '/api/md-helath-bank-list',
                        type: 'GET',
                        processData: false,
                        contentType: false,
                        headers: {
                            'Authorization': 'Bearer ' + token,
                            'X-CSRF-TOKEN': csrfToken
                        },
                        success: function(response) {
                            console.log('Success:', response.bank_list);
                            $('#bank-informations').empty();

                            for (var i = 0; i < response.bank_list.length; i++) {
                                var bankName = response.bank_list[i].bank_name;
                                if (bankName) {
                                    $('#bank-informations').append('<option value="' + bankName + '">' +
                                        bankName + '</option>');
                                }
                            }

                            calcOtherServices();
                            updateDiscountedPrice();
                        },

                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                        }
                    });
                }



                function getBankData(selectedBank) {



                    var packageId = $("#package_id").val();
                    $.ajax({
                        url: baseUrl + '/api/md-helath-bank-details',
                        type: 'GET',
                        data: {
                            bank_name: selectedBank,
                            package_id: packageId
                        },
                        headers: {
                            'Authorization': 'Bearer ' + token,
                            'X-CSRF-TOKEN': csrfToken
                        },
                        success: function(response) {
                            console.log('Success:', response.package_details.package_unique_no);
                            if (response.message === "Bank Details Found") {

                                var form = $('#bank_transfer_form');

                                // Additional data
                                var pendingAmount = proxyPrice - totalPrice;

                                if (isTwentySelected) {
                                    var percentage = '20';
                                } else if (isThirtySelected) {
                                    var percentage = '30';
                                } else if (isFiftySelected) {
                                    var percentage = '50';
                                } else if (isHundredSelected) {
                                    var percentage = '100';
                                }
                                // $('#card_number').val(cardNo);

                                var additionalData = {
                                    'package_id': packageId,
                                    'patient_id': patientId,
                                    'sale_price': proxyPrice,
                                    'paid_amount': totalPrice,
                                    'platform_type': 'web',
                                    'pending_amount': pendingAmount,
                                    'percentage': percentage,
                                    'other_services': checkedTitles

                                };

                                // Add additional data to the form
                                $.each(additionalData, function(name, value) {
                                    form.append($('<input>').attr({
                                        type: 'hidden',
                                        name: name,
                                        value: value
                                    }));
                                });


                                $("#bank_name").val(response.bank_details.bank_name);
                                $("#receiver_name").val(response.bank_details.account_holder_name);
                                $("#iban").val(response.bank_details.account_number);

                                $("#bank_transfer_payment_percent").val(percentage.toString());
                                $("#bank_transfer_total_paying_price").val(proxyPrice.toString());






                                $("#receiver-bank_name").text(response.bank_details.bank_name);
                                $("#receiver-name").text(response.bank_details.account_holder_name);
                                $("#receiver-account").text(response.bank_details.account_number);
                                $("#receiver-package_id").text(response.package_details.package_unique_no);


                            } else {
                                console.error("Error: Bank details not found");
                            }
                        },
                        error: function(error) {
                            console.error("Error fetching bank details:", error);
                        }
                    });
                }


                $(document).on('change', '#bank-informations', function() {
                    var selectedBank = $(this).val();
                    getBankData(selectedBank);
                });


                $(document).on('click', 'input[name="paymentMethod"][value="bank"]', function() {

                    var selectedBank = $('#bank-informations').val();

                    if (selectedBank) {
                        getBankData(selectedBank);
                    }
                });


                // $(document).ready(function(){
                getBankList();
                var initialSelectedBank = $('#bank-informations').val();
                if (initialSelectedBank) {
                    getBankData(initialSelectedBank);
                }
                // });


                //Copy Account Number       

                function copyIBAN() {
                    // Get the account number element
                    var accountNumberElement = document.getElementById("receiver-account");

                    // Create a range to select the text
                    var range = document.createRange();
                    range.selectNode(accountNumberElement);

                    // Create a selection
                    var selection = window.getSelection();
                    selection.removeAllRanges();
                    selection.addRange(range);

                    // Execute the copy command using the Clipboard API
                    try {
                        document.execCommand("copy");
                        // Optionally, provide some feedback to the user
                        alert("IBAN copied to clipboard!");
                    } catch (err) {
                        console.error("Unable to copy to clipboard:", err);
                    } finally {
                        // Deselect the text
                        selection.removeAllRanges();
                    }
                }

                //Copy Account Number Js Ends






                ////////////////////////////////////////////////////////////////////////////////////////////

                function formatValidityDate(value) {
                    // Ensure value is not empty
                    if (value.length === 0) {
                        return '';
                    }

                    // Ensure the first two characters represent a valid month
                    var month = value.slice(0, 2);
                    if (parseInt(month) > 12) {
                        month = '12';
                    }

                    // Add a slash after the first two characters
                    if (value.length >= 2) {
                        return month + '/' + value.slice(2, 4);
                    }

                    return month;
                }

                function numberToPercent(percent, number) {
                    console.log("///////////number//////////", number);
                    return number * (percent / 100);
                };

                function numberToDiscount(percent, number) {
                    console.log("///////////number//////////", number);
                    return number -= number * (percent / 100);
                };

                function calcOtherServices() {
                    treatmentPrice = numberToDiscount(parseInt(purchaseDetails.package_discount), purchaseDetails
                        .treatment_price);

                    totalPrice = parseFloat(treatmentPrice);


                    $('.other_services_items input[type="checkbox"]').each(function(index) {
                        if ($(this).is(':checked')) {
                            totalPrice += parseFloat(numberToDiscount(parseInt(purchaseDetails
                                .package_discount), otherServices[index].price));
                        }
                    });
                    // alert(totalPrice);
                    totaltoShowPrice = totalPrice;
                    proxyPrice = totalPrice;

                    twentyAmount = proxyPrice * (20 / 100);
                    thirtyAmount = proxyPrice * (30 / 100);
                    thirtyAmount = thirtyAmount - (thirtyAmount * (5 / 100));
                    fiftyAmount = proxyPrice * (50 / 100);
                    fiftyAmount = fiftyAmount - (fiftyAmount * (8 / 100));
                    hundredAmount = proxyPrice * (100 / 100);
                    hundredAmount = hundredAmount - (hundredAmount * (10 / 100));

                    if (isTwentySelected) {
                        totalPrice = totalPrice *= (20 / 100);
                        $('#payment_percent').val('20');
                    } else if (isThirtySelected) {
                        totalPrice = totalPrice *= (30 / 100);
                        totalPrice = totalPrice - (totalPrice * (5 / 100));
                        proxyPrice = proxyPrice - (proxyPrice * (5 / 100));
                        $('#payment_percent').val('30');
                    } else if (isFiftySelected) {
                        totalPrice = totalPrice *= (50 / 100);
                        totalPrice = totalPrice - (totalPrice * (8 / 100));
                        proxyPrice = proxyPrice - (proxyPrice * (8 / 100));
                        $('#payment_percent').val('50');
                    } else if (isHundredSelected) {
                        totalPrice = totalPrice - (totalPrice * (10 / 100));
                        proxyPrice = proxyPrice - (proxyPrice * (10 / 100));
                        $('#payment_percent').val('100');
                    }

                    // alert(totalPrice);
                    // $('.total_price').empty();
                    $('#payment_percent').val();
                    $("#total_paying_price").val(totalPrice);
                    $('.total_price').text(totaltoShowPrice + ' ₺');
                };

                function updateOtherServicesUi() {

                    $('.treatment_price').empty();

                    // otherServices.forEach(function(service) {
                    //     $('.other-service-price').empty();
                    //     $('.other-service-price').append(service.price +
                    //         ' ₺ <span class="smallFont">(' +
                    //         numberToPercent(
                    //             percentValue,
                    //             service.price) + '₺)</span>');
                    // });


                    var treatmentPriceHtml = numberToDiscount(
                            parseInt(purchaseDetails.package_discount),
                            purchaseDetails
                            .treatment_price) +
                        ' ₺ <span class="smallFont treatment_price_discount"> (' + purchaseDetails.treatment_price +
                        '₺)</span>';
                    $("#total_paying_price").val(totalPrice);
                    $('.total_price').text(totaltoShowPrice + ' ₺');
                    $('.treatment_price').append(treatmentPriceHtml);

                };

                function updateDiscountedPrice() {

                    discounts.forEach(function(discounts) {
                        switch (discounts.id) {
                            case 1:
                                $('.twenty').empty();
                                $('.twenty').append("20% " +
                                    '<span class="smallFont twentyPercent">(' + parseFloat(twentyAmount)
                                    .toFixed(2) +
                                    ' ₺)</span>');
                                $('.min_discount_twenty').text(discounts.minimum_discount);
                                calcOtherServices();
                                break;
                            case 2:
                                $('.thirty').empty();
                                $('.thirty').append("30% " +
                                    '<span class="smallFont thirtyPercent">(' + parseFloat(thirtyAmount)
                                    .toFixed(2) +
                                    ' ₺)</span>');
                                $('.min_discount_thirty').text(discounts.minimum_discount);
                                calcOtherServices();
                                break;
                            case 3:
                                $('.fifty').empty();
                                $('.fifty').append("50% " +
                                    '<span class="smallFont fiftyPercent">(' + parseFloat(fiftyAmount)
                                    .toFixed(2) +
                                    ' ₺)</span>');
                                $('.min_discount_fifty').text(discounts.minimum_discount);
                                calcOtherServices();
                                break;
                            case 4:
                                $('.hundred').empty();
                                $('.hundred').append("100% " +
                                    '<span class="smallFont hundredPercent">(' + parseFloat(hundredAmount)
                                    .toFixed(2) +
                                    ' ₺)</span>');
                                $('.min_discount_hundred').text(discounts.minimum_discount);
                                calcOtherServices();
                                break;
                        }
                    });
                };

                function getCardIssuer(iin) {
                    const cardPatterns = [{
                            name: 'VISA',
                            expression: '^4[0-9]{5,}$'
                        },
                        {
                            name: 'MASTERCARD',
                            expression: '^5[1-5][0-9]{3,}$'
                        },
                        {
                            name: 'AMEX',
                            expression: '^3[47][0-9]{5,}$'
                        },
                        {
                            name: 'DISCOVER',
                            expression: '^6(?:011|5[0-9]{2})[0-9]{3,}$'
                        },
                        {
                            name: 'DINERS',
                            expression: '^3(?:0[0-5]|[68][0-9])[0-9]{4,}$'
                        },
                        {
                            name: 'JCB',
                            expression: '^(?:2131|1800|35[0-9]{3})[0-9]{3,}$'
                        },
                        {
                            name: 'MAESTRO',
                            expression: '^(5[06-8]|6\\d)\\d{10,17}$'
                        },
                        {
                            name: 'LASER',
                            expression: '^(6304|6706|6771|6709)\\d{8}(\\d{4}|\\d{6,7})?$'
                        },
                        {
                            name: 'UNKNOWN',
                            expression: '.*'
                        }
                    ];

                    for (const pattern of cardPatterns) {
                        const regex = new RegExp(pattern.expression);
                        if (regex.test(iin)) {
                            switch (pattern.name) {
                                case 'DISCOVER':
                                    $('.visa').attr('src', "{{ url('front/assets/img/discover.png') }}");
                                    break;
                                case 'AMEX':
                                    $('.visa').attr('src', "{{ url('front/assets/img/american-express.png') }}");
                                    break;
                                case 'MASTERCARD':
                                    $('.visa').attr('src', "{{ url('front/assets/img/mastercard.png') }}");
                                    break;
                                case 'MAESTRO':
                                    $('.visa').attr('src', "{{ url('front/assets/img/mastercard.png') }}");
                                    break;
                                case 'VISA':
                                    $('.visa').attr('src', "{{ url('front/assets/img/visa.svg') }}");
                                    break;
                                case 'JCB':
                                    $('.visa').attr('src', "{{ url('front/assets/img/jcb.png') }}");
                                    break;
                                case 'DINERS':
                                    $('.visa').attr('src', "{{ url('front/assets/img/dinners.png') }}");
                                    break;
                                default:
                                    $('.visa').attr('src', "");
                                    break;
                            }
                            return pattern.name;
                        }
                    }
                    return 'UNKNOWN';
                }

                $("#verifyinput1").hide();
                let input1Error = true;
                $("#input1").keyup(function() {
                    validateCardName();
                });

                function validateCardName() {
                    let usernameValue = $("#input1").val();
                    if (usernameValue.length == "") {
                        $("#verifyinput1").show();
                        input1Error = false;
                        return false;
                    } else if (usernameValue.length < 4 || usernameValue.length > 30) {
                        $("#verifyinput1").show();
                        $("#verifyinput1").html(
                            "The length of the card holder name should be between 4 and 30 characters.");
                        input1Error = false;
                        return false;
                    } else {
                        $("#verifyinput1").hide();
                    }
                }

                $("#verifyinput2").hide();
                let input2Error = true;
                $("#input2").keyup(function() {
                    validateCardNumber();
                });

                function validateCardNumber() {
                    let usernameValue = $("#input2").val().replace(/\D/g, '');
                    if (usernameValue.length == "") {
                        $("#verifyinput2").show();
                        input2Error = false;
                        return false;
                    } else if (usernameValue.length < 4 || usernameValue.length >= 17) {
                        $("#verifyinput2").show();
                        $("#verifyinput2").html("The length of the card number should be between 12 and 16 digits.");
                        input2Error = false;
                        return false;
                    } else {
                        $("#verifyinput2").hide();
                    }
                }

                $("#verifyinput3").hide();
                let input3Error = true;
                $("#input3").keyup(function() {
                    validateCardCvv();
                });

                function validateCardCvv() {
                    let usernameValue = $("#input3").val();
                    if (usernameValue.length == "") {
                        $("#verifyinput3").show();
                        input3Error = false;
                        return false;
                    } else if (usernameValue.length < 1 || usernameValue.length > 3) {
                        $("#verifyinput3").show();
                        $("#verifyinput3").html("The length of the cvv should be between 1 and 3 digits.");
                        input3Error = false;
                        return false;
                    } else {
                        $("#verifyinput3").hide();
                    }
                }

                $("#verifyinput4").hide();
                let input4Error = true;
                $("#input4").keyup(function() {
                    validateCardValidity();
                });

                function validateCardValidity() {
                    let usernameValue = $("#input4").val();
                    if (usernameValue.length == "") {
                        $("#verifyinput4").show();
                        input4Error = false;
                        return false;
                    } else if (usernameValue.length < 1 || usernameValue.length > 6) {
                        $("#verifyinput4").show();
                        $("#verifyinput4").html("Please enter date in 00/00 format");
                        input4Error = false;
                        return false;
                    } else {
                        $("#verifyinput4").hide();
                    }
                }

                function formatCardNumber(cardNumber) {
                    return cardNumber.replace(/(\d{4})(?=\d)/g, '$1 ');
                }

                // Example usage


                // Display the result
                // console.log('Card Type:', cardType);


                ////////////////////////////////////////////////////////////////////////////////////////////
                // alert(percentage);
            });
        </script>
        <script type="text/javascript">
            const lightbox = GLightbox({
                ...options
            });
        </script>
        <script>
            let checkedVal;
            $('input[type=radio]').click(function() {
                checkedVal = $('input[name="paymentMethod"]:checked').val();
                if (checkedVal === "card") {
                    $("#card").css('display', 'block');
                    $("#wallet").css('display', 'none');
                    $("#bank").css('display', 'none');
                } else if (checkedVal === "wallet") {
                    $("#card").css('display', 'none');
                    $("#bank").css('display', 'none');
                    $("#wallet").css('display', 'block');
                } else if (checkedVal == "bank") {
                    $("#card").css('display', 'none');
                    $("#wallet").css('display', 'none');
                    $("#bank").css('display', 'block');
                }
            });
        </script>
    @endsection
