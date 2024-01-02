@section('php')
    {{-- <form method="POST" name="init_form" action="{{ url('api/md-customer-package-purchase-details') }}">
        @csrf
        <input type="hidden" value="{{ $id }}" id="package_id" name="package_id">
        {{ $id }}
    </form> --}}

    @php
        // dd(Session::all());
    @endphp
@endsection
@extends('front.layout.layout2')
@section('content')
    <div class="content-wrapper paymentsPage bg-f6">

        <!-- SECTION 1 -->
        <div class="searchBar backBtn bg-f6">
            <div class="container pt-4">
                <p class="fs-1 camptonBold text-center lh-1"> Purchase Details</p>
                <p id="delete_all_items" class="fs-6 camptonBold text-center deleteAll mb-4">Delete All Items</p>
                <div class="packageResult rounded mb-3">
                    <div class="flex-grow-1">
                        <div class="d-flex gap-2 justify-content-between align-items-center">
                            <p class="mb-0 fs-5 camptonBold lh-base package_name">Heart Valve Replacement Surgery</p>
                            <p class="mb-0 fs-6 camptonBold text-green ">Treatment Price</p>
                        </div>
                        <div class="d-flex gap-5 justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <img src="{{ 'front/assets/img/Location.svg' }}" alt="">
                                <p class="mb-0 lctn city_name">Besiktas/Istanbul</p>
                            </div>
                            <p class="mb-0 fs-5 camptonBold lh-base treatment_price">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    <img src="{{ 'front/assets/img/order.png' }}" alt="">
                </div>
                <div class="other_services_items">
                </div>
                <div class="greenBorder pt-3 mb-4"></div>
                <div class="mb-4 discount-sctn">
                    <div class="d-flex justify-content-between mb-3">
                        <p class="mb-0 fs-6 camptonBold text-green">Select Your Payment Plan</p>
                        <p class="mb-0 fs-6 camptonBold text-green">Total Price <span class="total_price"
                                style="color: #000;">34.560,00
                                ₺</span></p>
                    </div>
                    <div class="discounts">
                        <div class="d-flex align-items-center gap-2">
                            <label class="smallFont camptonBold d-flex align-items-center gap-1">
                                <input type="radio" value="20" name="discount" checked />
                            </label>
                            <div class="d-flex align-items-baseline gap-2">
                                <p class="mb-0 fs-5 camptonBold lh-base twenty"></p>
                                <p class="vSmallFont boldRed mb-0 min_discount_twenty">Min. Requirement</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <label class="smallFont camptonBold d-flex align-items-center gap-1">
                                <input type="radio" value="30" name="discount" />
                            </label>
                            <div class="d-flex align-items-baseline gap-2 ">
                                <p class="mb-0 fs-5 camptonBold lh-base thirty"></p>
                                <p class="vSmallFont text-green camptonBold mb-0 min_discount_thirty"></p>
                            </div>
                        </div>
                        {{-- (5.679,0 ₺) --}}
                        <div class="d-flex align-items-center gap-2">
                            <label class="smallFont camptonBold d-flex align-items-center gap-1">
                                <input type="radio" value="50" name="discount" />
                            </label>
                            <div class="d-flex align-items-baseline gap-2 ">
                                <p class="mb-0 fs-5 camptonBold lh-base fifty"></p>
                                <p class="vSmallFont text-green camptonBold mb-0 min_discount_fifty">Min. Requirement</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <label class="smallFont camptonBold d-flex align-items-center gap-1">
                                <input type="radio" value="100" name="discount" />
                            </label>
                            <div class="d-flex align-items-baseline gap-2 ">
                                <p class="mb-0 fs-5 camptonBold lh-base hundred"></p>
                                <p class="vSmallFont text-green camptonBold mb-0 min_discount_hundred">Min. Requirement</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column align-items-center mb-2">
                    <img src="{{ 'front/assets/img/ArrowsDown.png' }}" alt="" class="mb-3">
                    <p class="mb-2 fs-3 camptonBold lh-base">Next Step</p>
                    <p class="underline smallFont fw-normal camptonBook"><u>Payment</u></p>
                </div>
                <div class="paymentSection mb-5">
                    <div class="row">
                        <div class="col-2">
                            <label class="smallFont camptonBold d-flex align-items-center gap-1">
                                <input type="radio" value="card" name="paymentMethod" checked />
                                Credit or Debit Card
                            </label>
                        </div>
                        <div class="col-2">
                            <label class="smallFont camptonBold d-flex align-items-center gap-1">
                                <input type="radio" value="bank" name="paymentMethod" />
                                Bank Transfer
                            </label>
                        </div>
                        <div class="col-2">
                            <label class="smallFont camptonBold d-flex align-items-center gap-1">
                                <input type="radio" value="wallet" name="paymentMethod" />
                                My Wallet
                            </label>
                        </div>
                    </div>
                </div>
                <div id="card">
                    <div class="row">
                        <div class="col-5 card-details me-5">
                            <form action="" id="creditCardForm">
                                <input type="text" class="mb-3" id="input1" placeholder="Card Holder Name">
                                <input type="text" class="mb-3" id="input2" placeholder="Card Number">
                                <div class="d-flex gap-2 mb-4">
                                    <input type="password" id="input3" placeholder="CVV">
                                    <input type="text" id="input4" placeholder="Valid Till">
                                </div>
                                <!-- <a href="{{ url('payment-status') }}"> -->
                                <!-- <a href="{{ url('payment-status') }}" -->
                                <a href="javascript:void(0)" style="color: #fff; height: unset; padding: 12px 2rem;"
                                    class="btn purchaseBtn" style="color: #fff;">Proceed Payment</a>
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
                                            <img class="visa" src="{{ url('front/assets/img/visa.svg') }}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                            <p class="camptonBold vSmallFont text-center">1 MD<span
                                    class="camptonBook vSmallFont">coin</span> = 1 Turkish Lira</p>
                            <div class="blackBrdr px-5">
                                <div class="mdCard">
                                    <div class="mt-3">
                                        <p class="mb-0 camptonBook fw-bold lh-1">Available <span
                                                class="camptonBold">MD</span>coin</p>
                                        <p class="mb-0 camptonBold fs-3">500</p>
                                        <a class="btn btn-sm inviteBtn df-center mt-3 camptonBold"
                                            style="border-color: #000;">Use My MD<span class="camptonBook">coin</span></a>
                                    </div>
                                    <img src="{{ 'front/assets/img/mdcoin.png' }}" alt="" style="width: 200px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 3 -->
        <div class="bg-f6 scanQr">
            <img src="{{ 'front/assets/img/appScreenFooter.png' }}" alt="">
        </div>
    </div>
@endsection
@section('script')
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
            var packageId = "{{ $id }}";
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
                        var treatmentPriceHtml = purchaseDetails.treatment_price +
                            ' ₺ <span class="smallFont treatment_price_discount"> (' + numberToPercent(
                                percentValue,
                                purchaseDetails
                                .treatment_price) + '₺)</span>';

                        totalPrice = parseFloat(purchaseDetails.treatment_price);

                        otherServices.forEach(function(service) {
                            totalPrice += parseFloat(service.price);
                        });
                        // alert(totalPrice);

                        $('.package_name').text(purchaseDetails.package_name);
                        $('.city_name').text(purchaseDetails.city_name);
                        $('.treatment_price').append(treatmentPriceHtml);

                        otherServices.forEach(function(service) {
                            otherServicesHtml += '<div class="packageResult rounded mb-3">'
                            otherServicesHtml +=
                                '<div class="flex-grow-1 d-flex align-items-center gap-2">'
                            otherServicesHtml += '<label class="">'
                            otherServicesHtml += '<input id=' + service.title +
                                ' type="checkbox" name="checkbox" checked />'
                            otherServicesHtml += '</label>'
                            otherServicesHtml += '<div class="flex-grow-1">'
                            otherServicesHtml +=
                                '<div class="d-flex gap-2 justify-content-between align-items-center">'
                            otherServicesHtml += '<p class="mb-0 fs-5 camptonBold lh-base">' +
                                service.title + '</p>'
                            otherServicesHtml +=
                                '<p class="mb-0 fs-6 camptonBold text-green">Per Night Price</p>'
                            otherServicesHtml += '</div>'
                            otherServicesHtml +=
                                '<div class="d-flex gap-5 justify-content-between">'
                            otherServicesHtml += '<div class="d-flex align-items-center gap-2">'
                            otherServicesHtml += '<p class="mb-0 lctn">3 Stars Hotel</p>'
                            otherServicesHtml += '</div>'
                            otherServicesHtml +=
                                '<p class="mb-0 fs-5 camptonBold lh-base other-service-price">' +
                                service.price + ' ₺ <span class="smallFont">(' +
                                numberToPercent(
                                    percentValue,
                                    service.price) + '₺)</span></p>'
                            otherServicesHtml += '</div>'
                            otherServicesHtml += '</div>'
                            otherServicesHtml += '</div>'
                            otherServicesHtml += '</div>'
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


                // alert(token);
                // var token = '145|QbVxfOaPYonjsIqwVibAdJB0cP82yRzuBk94qajf28c079a3';

                var formData = new FormData();
                formData.append('package_id', packageId);
                formData.append('sale_price', proxyPrice);
                formData.append('paid_amount', totalPrice);
                formData.append('platform_type', 'web');
                formData.append('card_no', cardNo ?? '');
                formData.append('card_expiry_date', cardExpiryDate ?? '');
                formData.append('card_cvv', cardCvv ?? '');
                formData.append('card_name', cardName ?? '');

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
                            window.location.href = baseUrl + '/payment-status'
                        }
                    },
                });
            }

            ////////////////////////////////////////////////////////////////////////////////////////////

            function numberToPercent(percent, number) {
                console.log("///////////number//////////", number);
                return number * (percent / 100);
            };

            function calcOtherServices() {
                treatmentPrice = purchaseDetails.treatment_price;
                // alert(treatmentPrice);
                totalPrice = parseFloat(treatmentPrice);

                $('.other_services_items input[type="checkbox"]').each(function(index) {
                    if ($(this).is(':checked')) {
                        totalPrice += parseFloat(otherServices[index].price);
                    }
                });

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
                } else if (isThirtySelected) {
                    totalPrice = totalPrice *= (30 / 100);
                    totalPrice = totalPrice - (totalPrice * (5 / 100));
                    proxyPrice = proxyPrice - (proxyPrice * (5 / 100));
                } else if (isFiftySelected) {
                    totalPrice = totalPrice *= (50 / 100);
                    totalPrice = totalPrice - (totalPrice * (8 / 100));
                    proxyPrice = proxyPrice - (proxyPrice * (8 / 100));
                } else if (isHundredSelected) {
                    totalPrice = totalPrice - (totalPrice * (10 / 100));
                    proxyPrice = proxyPrice - (proxyPrice * (10 / 100));
                }

                // alert(totalPrice);
                // $('.total_price').empty();
                $('.total_price').text(totalPrice + ' ₺');
            };

            function updateOtherServicesUi() {

                $('.treatment_price').empty();

                otherServices.forEach(function(service) {
                    $('.other-service-price').empty();
                    $('.other-service-price').append(service.price +
                        ' ₺ <span class="smallFont">(' +
                        numberToPercent(
                            percentValue,
                            service.price) + '₺)</span>');
                });


                var treatmentPriceHtml = purchaseDetails.treatment_price +
                    ' ₺ <span class="smallFont treatment_price_discount"> (' + numberToPercent(
                        percentValue,
                        purchaseDetails
                        .treatment_price) + '₺)</span>';
                $('.total_price').text(totalPrice + ' ₺');
                $('.treatment_price').append(treatmentPriceHtml);

            };

            function updateDiscountedPrice() {

                discounts.forEach(function(discounts) {
                    switch (discounts.id) {
                        case 1:
                            $('.twenty').empty();
                            $('.twenty').append("20% " +
                                '<span class="smallFont twentyPercent">(' + twentyAmount +
                                ' ₺)</span>');
                            $('.min_discount_twenty').text(discounts.minimum_discount);
                            calcOtherServices();
                            break;
                        case 2:
                            $('.thirty').empty();
                            $('.thirty').append("30% " +
                                '<span class="smallFont thirtyPercent">(' + thirtyAmount +
                                ' ₺)</span>');
                            $('.min_discount_thirty').text(discounts.minimum_discount);
                            calcOtherServices();
                            break;
                        case 3:
                            $('.fifty').empty();
                            $('.fifty').append("50% " +
                                '<span class="smallFont fiftyPercent">(' + fiftyAmount +
                                ' ₺)</span>');
                            $('.min_discount_fifty').text(discounts.minimum_discount);
                            calcOtherServices();
                            break;
                        case 4:
                            $('.hundred').empty();
                            $('.hundred').append("100% " +
                                '<span class="smallFont hundredPercent">(' + hundredAmount +
                                ' ₺)</span>');
                            $('.min_discount_hundred').text(discounts.minimum_discount);
                            calcOtherServices();
                            break;
                    }
                });
            };

            ////////////////////////////////////////////////////////////////////////////////////////////

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
            } else if (checkedVal === "wallet") {
                $("#card").css('display', 'none');
                $("#wallet").css('display', 'block');
            }
        });
    </script>
@endsection
