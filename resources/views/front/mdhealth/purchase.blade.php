@section('php')
    {{-- <form method="POST" name="init_form" action="{{ url('api/md-customer-package-purchase-details') }}">
@csrf
<input type="hidden" value="{{ $id }}" id="package_id" name="package_id">
{{ $id }}
</form> --}}

    @php
        // $mybin = PhpBIN::getInstance('BinList');
        // var_dump($mybin->getInfo("580116"));
        // die;
        // dd(Session::all());
        // dd(Session::all());
    @endphp
@endsection
@extends('front.layout.layout2')
@section('content')
    <style>
        .footer-2 {
            display: none;
        }

        .package_name {
            color: #000;
            font-family: Campton;
            font-size: 20px;

            font-weight: 600;
            line-height: normal;
            letter-spacing: -0.8px;
        }

        .city_name {
            color: #000;
            font-family: CamptonBook;
            font-size: 14px;

            font-weight: 400;
            line-height: normal;
            letter-spacing: -0.56px;
        }

        .t_price {
            color: #4CDB06;
            font-family: Campton;
            font-size: 18px;
            font-weight: 600;
            line-height: normal;
            letter-spacing: -0.72px;
        }

        .t_price_sm {
            color: #4CDB06;
            font-family: Campton;
            font-size: 12px;
            letter-spacing: -0.48px;
        }

        .error {
            color: red;
        }
    </style>
    <div class="content-wrapper paymentsPage bg-f6">

        <!-- SECTION 1 -->
        <div class="searchBar backBtn bg-f6">
            <div class="container pt-4">
                <p class="fs-1 camptonBold text-center lh-1 f-s30"> Purchase Details</p>
                <p id="delete_all_items" class="fs-6 camptonSemiBold text-center deleteAll mb-4">Delete All Items</p>
                <div class="packageResult rounded mb-3">
                    <div class="flex-grow-1">
                        <div class="d-flex gap-2 justify-content-between align-items-center">
                            <p class="mb-0  lh-base package_name">Heart Valve Replacement Surgery</p>
                            <p class="mb-0 t_price">Treatment Price</p>
                        </div>
                        <div class="d-flex gap-5 justify-content-between">
                            <div class="d-flex gap-2 align-items-center">
                                <img src="{{ url('front/assets/img/Location.svg') }}" alt="">
                                <p class="mb-0 lctn city_name">Besiktas/Istanbul</p>
                            </div>
                            <p class="mb-0 fs-5 camptonBold lh-base treatment_price">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    <img src="{{ url('front/assets/img/order.png') }}" alt="">
                </div>
                <div class="other_services_items">
                </div>
                <div class="greenBorder pt-3 mb-4 mb30"></div>
                <div class="mb-4 discount-sctn">
                    <div class="d-flex justify-content-between mb-4">
                        <p class="mb-0 t_price">Select Your Payment Plan</p>
                        <p class="mb-0 t_price fnt20">Total Price <span class="total_price" style="color: #000;">34.560,00
                                <span class="lira">₺</span> </span></p>
                    </div>
                    <div class="discounts d-flex flex-column gap-3">
                        <div class="d-flex align-items-center gap-2">
                            <label class="smallFont camptonBold d-flex align-items-center gap-1">
                                <input type="radio" value="20" name="discount" checked />
                            </label>
                            <div class="d-flex align-items-baseline gap-2">
                                <p class="mb-0 fs-5 camptonSemiBold lh-base twenty"></p>
                                <p class="vSmallFont boldRed mb-0 min_discount_twenty">Min. Requirement</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <label class="smallFont camptonSemiBold d-flex align-items-center gap-1">
                                <input type="radio" value="30" name="discount" />
                            </label>
                            <div class="d-flex align-items-baseline gap-2 ">
                                <p class="mb-0 fs-5 camptonSemiBold lh-base thirty"></p>
                                <p class="vSmallFont text-green camptonSemiBold mb-0 min_discount_thirty"></p>
                            </div>
                        </div>
                        {{-- (5.679,0 ₺) --}}
                        <div class="d-flex align-items-center gap-2">
                            <label class="smallFont camptonSemiBold d-flex align-items-center gap-1">
                                <input type="radio" value="50" name="discount" />
                            </label>
                            <div class="d-flex align-items-baseline gap-2 ">
                                <p class="mb-0 fs-5 camptonSemiBold lh-base fifty"></p>
                                <p class="t_price_sm mb-0 min_discount_fifty">Min. Requirement</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <label class="smallFont camptonSemiBold d-flex align-items-center gap-1">
                                <input type="radio" value="100" name="discount" />
                            </label>
                            <div class="d-flex align-items-baseline gap-2 ">
                                <p class="mb-0 fs-5 camptonSemiBold lh-base hundred"></p>
                                <p class="t_price_sm mb-0 min_discount_hundred">Min. Requirement</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column align-items-center mb-6">
                    {{-- {{ dd(url('front/assets/img/ArrowsDown.png')) }} --}}
                    <img src="{{ url('front/assets/img/ArrowsDown.png') }}" alt="" class="mb-3">
                    <p class="mb-2 fs-3 camptonBold lh-base next-step">Next Step</p>
                    <p class="underline smallFont fw-normal camptonBook"><u>Payment</u></p>
                </div>
                <!-- PAYMENT SECTION -->
                <div class="paymentSection mb-6">
                    <div class="row">
                        <div class="col-3">
                            <label class="smallFont d-flex align-items-center gap-2">
                                <input type="radio" value="card" name="paymentMethod" checked />
                                Credit or Debit Card
                            </label>
                        </div>
                        <div class="col-2">
                            <label class="smallFont d-flex align-items-center gap-2">
                                <input type="radio" value="bank" name="paymentMethod" />
                                Bank Transfer
                            </label>
                        </div>
                        <div class="col-2 mrg-68">
                            <label class="smallFont d-flex align-items-center gap-2">
                                <input type="radio" value="wallet" name="paymentMethod" />
                                My Wallet
                            </label>
                        </div>
                    </div>
                </div>



                <!-- CREDIT CARD DETAILS -->
                <div id="card">
                    <div class="row">
                        <div class="col-5 card-details me-8">
                            <form id="purchase_by_mdcoins" action="{{ url('/purchase-by-mdcoins') }}" method="POST">
                                @csrf
                            </form>
                            <form id="procced_to_pay_form" action="{{ url('/sandbox') }}" method="POST">
                                @csrf
                                <input type="hidden" name="package_id" id="package_id" value="{{ $id }}">
                                <input type="hidden" name="patient_id" id="patient_id" value="{{ $patient_id }}">
                                <input type="hidden" name="payment_percent" id="payment_percent" value="">
                                <input type="hidden" name="total_paying_price" id="total_paying_price" value="">
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
                                    <input type="text" onkeypress="return /[0-9 ]/i.test(event.key)" name="input2"
                                        class="form-control" id="input2" placeholder="Card Number">
                                    <h5 id="verifyinput2" class="mt-4" style="color: red;">
                                        Please enter card number
                                    </h5>
                                </div>
                                <div class="d-flex gap-3 mb-4-input">
                                    <div class="w-50"><input type="text" id="input4" name="input4"
                                            class="form-control " placeholder="00/00">
                                        <h5 id="verifyinput4" class="mt-0" style="color: red;">
                                            Please enter expiry date
                                        </h5>
                                    </div>
                                    <div class="w-50">
                                        <input type="password" id="input3" name="input3" class="form-control"
                                            placeholder="CVV" onkeypress="return /[0-9 ]/i.test(event.key)">
                                        <h5 id="verifyinput3" class="mt-0" style="color: red;">
                                            Please enter CVV
                                        </h5>
                                    </div>
                                </div>

                                <!-- <a href="{{ url('payment-status') }}"> -->
                                <!-- <a href="{{ url('payment-status') }}" -->
                                <a href="javascript:void(0)" style="color: #fff; height: unset; padding: 12px 2rem;"
                                    class="btn purchaseBtn purchaseBtn-new" style="color: #fff;">Proceed Payment</a>
                                <!-- </a> -->
                            </form>
                        </div>
                        <div class="col-5">
                            <div class="creditCardContainer">
                                <div>
                                    <img src="{{ url('front/assets/img/MDHealth_light.svg') }}" alt="">
                                </div>
                                <div>
                                    <p class="cardNumber">1234 1234 1234 1234</p>
                                    <div class="d-flex justify-content-between align-self-end">
                                        <div>
                                            <p class="cardholder">John Smith</p>
                                            <p class="validity">02/24</p>
                                        </div>
                                        <div>
                                            <img class="visa" src="" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CREDIT CARD DETAILS END-->

                <!-- BANK TRANSFER -->
                {{-- Mplus03 --}}
                <div id="bank" class="bank-transfer-details">
                    <form action="{{ url('bank-payment') }}" method="post" id="bank_transfer_form">
                        @csrf
                        <input type="hidden" name="package_id" id="package_id" value="{{ $id }}">
                        <input type="hidden" name="patient_id" id="patient_id" value="{{ $patient_id }}">

                        <input type="hidden" name="bank_name" id="bank_name" value="">
                        <input type="hidden" name=" receiver_name" id="receiver_name" value="">
                        <input type="hidden" name="iban" id="iban" value="">


                        <div class="row gy-4">
                            <div class="col-md-12 mb-3">
                                <label for="Bank Informations" class="form-label mb-3" style="font-size: 29px;">Bank
                                    Informations</label>
                                <select name="bank-informations" id="bank-informations" class="form-select">
                                    <option value="">Select Bank</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="Bank Name" class="form-label mb-0">Bank Name</label>
                                <p class="mb-0 card-h1" id="receiver-bank_name"></p>
                            </div>


                            <div class="col-md-12">
                                <label for="Receiver Name" class="form-label mb-0">Receiver Name</label>
                                <p class="mb-0 card-h1" id="receiver-name"></p>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="Description" class="form-label mb-0">Description</label>
                                <p class="mb-0 card-h1">Please write "<span class="text-green"
                                        id="receiver-package_id">MD736</span>"" in the description section.</p>
                            </div>

                            <input type="hidden" name="package_id" id="package_id" value="{{ $id }}">
                            <input type="hidden" name="patient_id" id="patient_id" value="{{ $patient_id }}">
                            <div class="col-md-12">
                                <label for="Payment transaction ID" class="form-label">Payment transaction ID</label>
                                <input type="text" name="transaction_id" class="form-control text-black camptonBook"
                                    placeholder="Payment transaction ID">
                            </div>

                            @php
                                use Stevebauman\Location\Facades\Location;
                                $location = Location::get();
                            @endphp


                            {{-- <div class="col-md-12">
                            <p class="mb-0 text-red card-p1">This is not available in your country!</p>
                        </div> --}}
                            <div class="col-md-12">
                                <button type="submit" class="btn submit-btn">Completed Payment</button>
                            </div>

                        </div>
                    </form>
                </div>
                {{-- <!-- BANK TRANSFER END -->


                            <div class="col-md-12">
                                <label for="IBAN" class="form-label mb-0">IBAN</label>
                                <p class="mb-0 card-h1" id="receiver-account">TR00 0000 0000 0000 0000 0000 00</p>
                                <h6 class="copy-iban card-h3 text-green" id="copy-iban-btn">
                                    <span class="align-bottom">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17"
                                            viewBox="0 0 16 17" fill="none">
                                            <path
                                                d="M3.25 7.75C3.25 5.629 3.25 4.56775 3.90925 3.90925C4.56775 3.25 5.629 3.25 7.75 3.25H10C12.121 3.25 13.1823 3.25 13.8408 3.90925C14.5 4.56775 14.5 5.629 14.5 7.75V11.5C14.5 13.621 14.5 14.6823 13.8408 15.3408C13.1823 16 12.121 16 10 16H7.75C5.629 16 4.56775 16 3.90925 15.3408C3.25 14.6823 3.25 13.621 3.25 11.5V7.75Z"
                                                stroke="#4CDB06" stroke-width="1.875" />
                                            <path
                                                d="M3.25 13.75C2.65326 13.75 2.08097 13.5129 1.65901 13.091C1.23705 12.669 1 12.0967 1 11.5V7C1 4.17175 1 2.75725 1.879 1.879C2.75725 1 4.17175 1 7 1H10C10.5967 1 11.169 1.23705 11.591 1.65901C12.0129 2.08097 12.25 2.65326 12.25 3.25"
                                                stroke="#4CDB06" stroke-width="1.875" />
                                        </svg>
                                    </span>
                                    <a href="javascript:void(0);" onclick="copyIBAN()">Copy IBAN</a>
                                </h6>
                            </div>


                            <div class="col-md-12 mb-3">
                                <label for="Description" class="form-label mb-0">Description</label>
                                <p class="mb-0 card-h1">Please write "<span class="text-green"
                                        id="receiver-package_id">MD736</span>"" in the description section.</p>
                            </div>
                            <form action="php" method="POST">
                                <input type="hidden" name="package_id" id="package_id" value="{{ $id }}">
                                <input type="hidden" name="patient_id" id="patient_id" value="{{ $patient_id }}">
                                <div class="col-md-12">
                                    <label for="Payment transaction ID" class="form-label">Payment transaction ID</label>
                                    <input type="text" name="transaction_id"
                                        class="form-control text-black camptonBook" placeholder="Payment transaction ID">
                                </div>
                                <div class="col-md-12">
                                    <p class="mb-0 text-red card-p1">This is not available in your country!</p>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn submit-btn">Completed Payment</button>
                                </div>
                            </form>
                        </div>
                    </form>
                </div>
                <!-- BANK TRANSFER END --> --}}

                <!-- WALLET DETAILS -->
                <div id="wallet">
                    <div class="row">
                        <div class="col-6 text-end px-5 align-self-end mt-4">
                            <p class="mb-0 camptonBook fs-5 fw-bold lh-sm">invite your friends</p>
                            <p class="mb-0 camptonBold fs-3">and <span class="text-green"><u>earn</u></span> MD<span
                                    class="camptonBook fw-bold">coin</span>.</p>
                            <div class="d-flex align-items-center justify-content-end mt-2">
                                <a href="{{ url('#') }}" type="button"
                                    class="btn btn-sm inviteBtn df-center mt-3 mb-5">Invite Friends</a>
                            </div>
                        </div>
                        <div class="col-6">
                            <p class="card-h3 text-center">1 MD<span class="camptonBook vSmallFont">coin</span> = 1
                                Turkish Lira</p>
                            <div class="blackBrdr px-5">
                                <div class="mdCard">
                                    <div class="mt-5">
                                        <!-- <p class="mb-0 card-h3 camptonBook lh-1"><span class="camptonBold">1 MD</span> Coin <span class="camptonBold">= 1 Turkish Lira</span></p>     -->
                                        <p class="mb-0 card-h4 camptonBook lh-1">Available <span
                                                class="camptonBold">MD</span>coin</p>
                                        <p class="mb-0 coinsMD"></p>
                                        <a class="btn btn-sm inviteBtn df-center mt-3 camptonBold" id="purchase_by_coins"
                                            style="border-color: #000;" data-bs-toggle="modal"
                                            data-bs-target="#UseMyMDCoin">Use My MD<span
                                                class="camptonBook">coin</span></a>
                                    </div>
                                    <img src="{{ asset('front/assets/img/mdcoin.png') }}" alt=""
                                        style="width: 200px;" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- WALLET DETAILS END -->

            </div>
        </div>

        <!-- SECTION 3 -->
        <div class="bg-f6 scanQr">
            <img src="{{ url('front/assets/img/appScreenFooter.png') }}" alt="">
        </div>
    </div>
    @include('front.includes.footer')
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
            var packageId = "{{ $id }}";
            var patientId = "{{ $patient_id }}";
            var formData = new FormData();
            formData.append('package_id', packageId);
            getData();

            ///////////////////////////////////////////////////////////////////////////////

            $('.other_services_items').on('change', 'input[type="checkbox"]', function() {

                calcOtherServices();
                updateDiscountedPrice();

            });

            $('.discounts').on('change', 'input[type="radio"]', function() {
                if ($(this).is(':checked')) {
                    console.log($(this).attr('value') + ' is checked');
                    console.log($(this).attr('value'));
                    switch ($(this).attr('value')) {
                        case "20":
                            isTwentySelected = true;
                            isThirtySelected = false;
                            isFiftySelected = false;
                            isHundredSelected = false;
                            percentValue = 20;
                            updateOtherServicesUi();
                            updateDiscountedPrice();
                            break;
                        case "30":
                            isTwentySelected = false;
                            isThirtySelected = true;
                            isFiftySelected = false;
                            isHundredSelected = false;
                            percentValue = 30;
                            updateOtherServicesUi();
                            updateDiscountedPrice();
                            break;
                        case "50":
                            isTwentySelected = false;
                            isThirtySelected = false;
                            isFiftySelected = true;
                            isHundredSelected = false;
                            percentValue = 50;
                            updateOtherServicesUi();
                            updateDiscountedPrice();
                            break;
                        case "100":
                            isTwentySelected = false;
                            isThirtySelected = false;
                            isFiftySelected = false;
                            isHundredSelected = true;
                            percentValue = 100;
                            updateOtherServicesUi();
                            updateDiscountedPrice();
                            break;
                    }
                }
                console.log(isTwentySelected + "<br>" + isThirtySelected + "<br>" + isFiftySelected +
                    "<br>" + isHundredSelected);
            });

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

                var additionalData = {
                    'package_id': packageId,
                    'patient_id': patientId,
                    'sale_price': proxyPrice,
                    'paid_amount': totalPrice,
                    'platform_type': 'web',
                    'card_no': cardNo || '',
                    'card_expiry_date': cardExpiryDate || '',
                    'card_cvv': cardCvv || '',
                    'card_name': cardName || '',
                    'pending_amount': pendingAmount,
                    'percentage': percentage,
                    'other_services': checkedTitles,
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

            $(document).ready(function() {
                checkedTitles = []; // Array to store initially checked service titles

                // Loop through all checkboxes initially
                $('.form-check-input').each(function() {
                    // Check if the current checkbox is checked
                    if ($(this).prop('checked')) {
                        // Find the corresponding service title and add it to the array
                        var title = $(this).siblings('.d-flex').find('.card-h4').text();
                        checkedTitles.push(title);
                    }
                });

                // Output the initially checked service titles (for demonstration)
                console.log(checkedTitles);

                // Attach click event listener to checkboxes
                $(document).on('click', '.form-check-input', function() {
                    // Reset the array before re-populating it
                    checkedTitles = [];

                    // Loop through all checkboxes again
                    $('.form-check-input').each(function() {
                        // Check if the current checkbox is checked
                        if ($(this).prop('checked')) {
                            // Find the corresponding service title and add it to the array
                            var title = $(this).siblings('.d-flex').find('.card-h4').text();
                            checkedTitles.push(title);
                        }
                    });

                    // Output the updated checked service titles (for demonstration)
                    console.log(checkedTitles);
                    // Now you can do whatever you want with the checkedTitles array
                });
            });

            ////////////////////////////////////////////////////////////////////////////////

            function getData() {

                // alert(token);
                $.ajax({
                    url: baseUrl + '/api/md-customer-package-purchase-details',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'X-CSRF-TOKEN': csrfToken
                    },

                    success: function(response) {
                        console.log('Success:', response);
                        if (response.status == '404') {
                            window.location.href = baseUrl + '/health-search-result';
                        }
                        var otherServicesHtml = '';
                        purchaseDetails = response.purchase_details;
                        otherServices = response.other_services;
                        discounts = response.discounts;
                        var treatmentPriceHtml = numberToDiscount(
                                parseInt(purchaseDetails.package_discount == '' ? 0 : purchaseDetails
                                    .package_discount),
                                purchaseDetails
                                .treatment_price) +
                            ' ₺<span class="smallFont treatment_price_discount"> (' + purchaseDetails
                            .treatment_price + ' ₺)</span>';

                        totalPrice = parseFloat(purchaseDetails.treatment_price);

                        otherServices.forEach(function(service) {
                            totalPrice += parseFloat(numberToDiscount(parseInt(purchaseDetails
                                .package_discount == '' ? 0 : purchaseDetails
                                .package_discount), service.price));
                        });
                        // alert(totalPrice);

                        $('.package_name').text(purchaseDetails.package_name);
                        $('.city_name').text(purchaseDetails.city_name);
                        $('.treatment_price').append(treatmentPriceHtml);

                        otherServices.forEach(function(service) {
                            checkedTitles.push(service.title)
                            if (service.title == 'Accommodation') {
                                otherServicesHtml += '<div class="card purchase-details-card">'
                                otherServicesHtml +=
                                    ' <div class="card-body d-flex flex-column justify-content-center">'
                                otherServicesHtml += '<div class="row">'
                                otherServicesHtml += '<div class="col-md-9">'

                                otherServicesHtml += '<div class="form-check df-start">'
                                otherServicesHtml +=
                                    '<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>'
                                otherServicesHtml += '<div class="d-flex flex-column gap-1">'
                                otherServicesHtml +=
                                    '<label class="form-check-label card-h4 ms-3 mb-0" for="flexCheckDefault">'
                                otherServicesHtml += service.title
                                otherServicesHtml += '</label>'
                                if (purchaseDetails.hotel_stars.length != '') {

                                    otherServicesHtml +=
                                        ' <label class="form-check-label card-p1 ms-3 mb-0" for="flexCheckDefault">'
                                    otherServicesHtml += purchaseDetails.hotel_stars +
                                        ' Stars Hotel'
                                    otherServicesHtml += '</label>'
                                }
                                otherServicesHtml += '</div>'
                                otherServicesHtml += '</div>'
                                otherServicesHtml += '</div>'
                                otherServicesHtml += ' <div class="col-md-3 ">'
                                otherServicesHtml += '<div class="df-end">'
                                otherServicesHtml +=
                                    '<div class="d-flex align-items-end flex-column">'

                                otherServicesHtml +=
                                    '<h5 class="t_price mb-0 text-start">' + service.title +
                                    ' Price</h5>'
                                otherServicesHtml += '<h5 class="card-h4 mt-0">' +
                                    numberToDiscount(
                                        parseInt(purchaseDetails.package_discount == '' ? 0 :
                                            purchaseDetails.package_discount), service
                                        .price) +
                                    '<span class="lira"> ₺</span> <span class="card-h1">*(' +
                                    service
                                    .price + ' <span class="lira">₺</span>) </span></h5>'
                                otherServicesHtml += '</div>'
                                otherServicesHtml += ' </div>'
                                otherServicesHtml += '</div>'

                                otherServicesHtml += '</div>'
                                otherServicesHtml += '</div>'
                                otherServicesHtml += '</div>'
                            } else {
                                otherServicesHtml += '<div class="card purchase-details-card">'
                                otherServicesHtml +=
                                    ' <div class="card-body d-flex flex-column justify-content-center">'
                                otherServicesHtml += '<div class="row">'
                                otherServicesHtml += '<div class="col-md-9">'
                                otherServicesHtml += '<div class="form-check df-start">'
                                otherServicesHtml +=
                                    '<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>'
                                otherServicesHtml += '<div class="d-flex flex-column gap-1">'
                                otherServicesHtml +=
                                    '<label class="form-check-label card-h4 ms-3 mb-0" for="flexCheckDefault">'
                                otherServicesHtml += service.title
                                otherServicesHtml += '</label>'
                                if (service.title == 'Transportation') {
                                    otherServicesHtml +=
                                        ' <label class="form-check-label card-p1 ms-3 mb-0" for="flexCheckDefault">'
                                    otherServicesHtml += purchaseDetails.brand_name +
                                        ' ' + purchaseDetails.vehicle_model_name +
                                        ' ' + purchaseDetails.vehicle_level_name
                                    otherServicesHtml += '</label>'
                                } else if (service.title == 'Tour Details') {

                                    otherServicesHtml +=
                                        ' <label class="form-check-label card-p1 ms-3 mb-0" for="flexCheckDefault">'
                                    otherServicesHtml += purchaseDetails.tour_name
                                    otherServicesHtml += '</label>'
                                }
                                otherServicesHtml += '</div>'
                                otherServicesHtml += '</div>'
                                otherServicesHtml += '</div>'
                                otherServicesHtml += ' <div class="col-md-3 ">'
                                otherServicesHtml += '<div class="df-end">'
                                otherServicesHtml +=
                                    '<div class="d-flex align-items-end flex-column">'

                                otherServicesHtml +=
                                    '<h5 class="t_price mb-0 text-start">' + service.title +
                                    ' Price</h5>'
                                otherServicesHtml += '<h5 class="card-h4 mt-0">' +
                                    numberToDiscount(
                                        parseFloat(purchaseDetails.package_discount == '' ? 0 :
                                            purchaseDetails.package_discount), parseFloat(
                                            service
                                            .price)) +
                                    '<span class="lira"> ₺</span> <span class="card-h1">*(' +
                                    service
                                    .price + ' <span class="lira">₺</span>) </span></h5>'
                                otherServicesHtml += '</div>'
                                otherServicesHtml += ' </div>'
                                otherServicesHtml += '</div>'

                                otherServicesHtml += '</div>'
                                otherServicesHtml += '</div>'
                                otherServicesHtml += '</div>'
                            }


                            // otherServicesHtml += '<div class="packageResult rounded mb-3">'
                            // otherServicesHtml +=
                            //     '<div class="flex-grow-1 d-flex align-items-center gap-2">'
                            // otherServicesHtml += '<label class="">'
                            // otherServicesHtml += '<input id=' + service.title +
                            //     ' type="checkbox" name="checkbox" checked />'
                            // otherServicesHtml += '</label>'
                            // otherServicesHtml += '<div class="flex-grow-1">'
                            // otherServicesHtml +=
                            //     '<div class="d-flex gap-2 justify-content-between align-items-center">'
                            // otherServicesHtml += '<p class="mb-0 fs-5 camptonBold lh-base">' +
                            //     service.title + '</p>'
                            // otherServicesHtml +=
                            //     '<p class="mb-0 fs-6 camptonBold text-green">Per Night Price</p>'
                            // otherServicesHtml += '</div>'
                            // otherServicesHtml +=
                            //     '<div class="d-flex gap-5 justify-content-between">'
                            // otherServicesHtml += '<div class="d-flex align-items-center gap-2">'
                            // // otherServicesHtml += '<p class="mb-0 lctn">3 Stars Hotel</p>'
                            // otherServicesHtml += '</div>'
                            // otherServicesHtml +=
                            // '<p class="mb-0 fs-5 camptonBold lh-base other-service-price">' +
                            // numberToDiscount(
                            //     parseInt(purchaseDetails.package_discount),
                            //     service.price) + ' ₺ <span class="smallFont">(' + service
                            // .price +
                            // '₺)</span></p>'
                            // otherServicesHtml += '</div>'
                            // otherServicesHtml += '</div>'
                            // otherServicesHtml += '</div>'
                            // otherServicesHtml += '</div>'
                        });
                        $('.other_services_items').append(otherServicesHtml);
                        calcOtherServices();
                        updateDiscountedPrice();

                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }


            function makePurchase() {


                var formData = new FormData();
                // var patientId = "{{ Session::get('Patient_id') }}";
                // alert(patientId);
                var pendingAmount = proxyPrice - totalPrice;
                formData.append('package_id', packageId);
                formData.append('patient_id', patientId);
                formData.append('sale_price', proxyPrice);
                formData.append('paid_amount', totalPrice);
                formData.append('platform_type', 'web');
                formData.append('card_no', cardNo ?? '');
                formData.append('card_expiry_date', cardExpiryDate ?? '');
                formData.append('card_cvv', cardCvv ?? '');
                formData.append('card_name', cardName ?? '');
                formData.append('pending_amount', pendingAmount);

                if (isTwentySelected) {
                    formData.append('percentage', '20%');
                } else if (isThirtySelected) {
                    formData.append('percentage', '30%');
                } else if (isFiftySelected) {
                    formData.append('percentage', '50%');
                } else if (isHundredSelected) {
                    formData.append('percentage', '100%');
                }

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
                            window.location.href = baseUrl + '/payment-status';
                        }
                    },
                });
            }

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
                console.log(percent);
                number = number * (percent / 100);
                console.log("///////////number//////////", number);
                return number;
            };

            function numberToDiscount(percent, number) {
                console.log(percent);
                if (percent <= 0) {
                    return number;
                }
                number -= number * (percent / 100);
                console.log("///////////number//////////", number);
                return number;
            };

            function calcOtherServices() {
                treatmentPrice = numberToDiscount(parseInt(purchaseDetails.package_discount == '' ? 0 :
                        purchaseDetails.package_discount), purchaseDetails
                    .treatment_price);

                totalPrice = parseFloat(treatmentPrice);


                $('.other_services_items input[type="checkbox"]').each(function(index) {
                    if ($(this).is(':checked')) {
                        totalPrice += parseFloat(numberToDiscount(parseInt(purchaseDetails
                            .package_discount == '' ? 0 : purchaseDetails
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
                        parseInt(purchaseDetails.package_discount == '' ? 0 : purchaseDetails.package_discount),
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
            alert(percentage);
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
