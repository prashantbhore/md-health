@extends('front.layout.mdShop')
@section('content')
    <div class="content-wrapper mdShop">
        <!-- SECTION 1 -->
        <div class="backBtn bg-f6"  style="position: relative; margin-top: 2rem;">
            <div class="container pt-4">
                <p class="fs-1 camptonBold text-center lh-1">Your Cart</p>
                <p class="fs-6 camptonBold text-center deleteAll mb-4">Delete All Items</p>
                <div class="row">
                    <div class="col-9">
                        <div class="white-box rounded mb-3" style="padding: 0.5rem 0.75rem;">
                            <div class="d-flex align-items-center justify-content-between flex-grow-1" style="border-bottom: 1.5px solid #ededed; padding-bottom: 0.5rem;">
                                <p class="mb-0 vSmallFont campton"><span class="text-green camptonBold">Vendor:</span> Evony Medical</p>
                                <div class="d-flex align-items-center gap-1">
                                    <img src="{{('front/assets/img/shipment.svg')}}" alt="">
                                    <p class="mb-0 vSmallFont campton text-green">Free Shipping</p>
                                </div>
                            </div>
                            <div style="padding-top: 0.5rem;" class="d-flex justify-content-between">
                                <div class="d-flex">
                                    <img src="{{('front/assets/img/proPic.svg')}}" alt="" class="me-3">
                                    <div class="d-flex flex-column justify-content-around">
                                        <p class="campton smallFont mb-0">Evony Medical Mask 50 pc.</p>
                                        <div class="addRemoveBtn">
                                            <img src="{{('front/assets/img/Decrement.svg')}}" alt="">
                                            <span class="vSmallFont campton">1</span>
                                            <img src="{{('front/assets/img/Increment.svg')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="align-self-end">
                                    <p class="mb-0 camptonBold lh-1 fs-4 text-end">299,99 ₺</p>
                                    <p class="mb-0 vSmallFont camptonBold text-center deleteAll">Delete Products</p>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="packageResult rounded mb-3">
                            <div class="flex-grow-1">
                                <div class="d-flex gap-2 justify-content-between align-items-center">
                                    <p class="mb-0 fs-5 camptonBold lh-base">Home Patient Service</p>
                                    <p class="mb-0 fs-6 camptonBold text-green">Service Price</p>
                                </div>
                                <div class="d-flex gap-5 justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                        <p class="mb-0 lctn">Service Provider Name</p>
                                    </div>
                                    <p class="mb-0 fs-5 camptonBold lh-base">32.430,00 ₺ <span class="smallFont">(3.679,00 ₺)</span></p>
                                </div>
                                <div class="greenBorder pt-3 mb-4"></div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="camptonBold vSmallFont">Appointment Date: <span class="camptonBook">12/12/2023</span></p>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{('front/assets/img/change.svg')}}" alt="">
                                        <p class="mb-1 boldRed smallFont"><u>Change Appointment Date</u></p>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-3">
                        <div class="white-box rounded mb-3">
                            <div class="p-3">
                                <p class="mb-0 fs-6 camptonBold text-green lh-1">Total Price</p>
                                <p class="mb-0 fs-4 camptonBold">299,99 ₺</p>
                            </div>
                            <img src="{{('front/assets/img/Invite.png')}}" alt="" style="width: 100%;">
                            <div class="p-3">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0 vSmallFont camptonBook">Products</p>
                                    <p class="mb-0 vSmallFont camptonBold">299,99 ₺</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0 vSmallFont camptonBook">Shipping Fee</p>
                                    <div class="d-flex gap-2 align-items-center">
                                        <p class="mb-0 vSmallFont camptonBold text-green">FREE</p>
                                        <p class="mb-0 vSmallFont camptonBold red-strike">29,99 ₺</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    <img src="{{('front/assets/img/order.png')}}" alt="">
                </div>
                <div class="greenBorder mb-4"></div>
                <div class="d-flex flex-column align-items-center mb-2">
                    <img src="{{('front/assets/img/ArrowsDown.png')}}" alt="" class="mb-3">
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
                        <!-- <div class="col-2">
                            <p class="vSmallFont camptonBold">Bank Transfer</p>
                        </div>
                        <div class="col-2">
                            <p class="vSmallFont camptonBold">My Wallet</p>
                        </div> -->
                    </div>
                </div>
                <div id="card">
                    <div class="row">
                        <div class="col-5 card-details me-5">
                            <form action="">
                                <input type="text" class="mb-3" name="" id="">
                                <input type="text" class="mb-3" name="" id="">
                                <div class="d-flex gap-2 mb-4">
                                    <input type="text">
                                    <input type="text">
                                </div>
                                <!-- <a> -->
                                    <a href="{{url('payment-status')}}" class="btn purchaseBtn" style="color: #fff; height: unset; padding: 12px 2rem;">Proceed Payment</a>
                                <!-- </a> -->
                            </form>
                        </div>
                        <div class="col-5">
                            <div class="creditCardContainer">
                                <div>
                                    <img src="{{('front/assets/img/MDHealth_light.svg')}}" alt="">
                                </div>
                                <div>
                                    <p class="cardNumber">1234 1234 1234 1234</p>
                                    <div class="d-flex justify-content-between align-self-end">
                                        <div>
                                            <p class="cardholder">John Smith</p>
                                            <p class="validity">02/24</p>
                                        </div>
                                        <div>
                                            <img class="visa" src="{{('front/assets/img/visa.svg')}}" alt="">
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
                            <p class="mb-0 camptonBold fs-3">and <span class="text-green"><u>earn</u></span> MD<span class="camptonBook fw-bold">coin</span>.</p>
                            <div class="d-flex align-items-center justify-content-end mt-2">
                                <a href="{{url('#')}}" type="button" class="btn btn-sm inviteBtn df-center mt-3 mb-5">Invite Friends</a>
                            </div>
                        </div>
                        <div class="col-6">
                            <p class="camptonBold vSmallFont text-center">1 MD<span class="camptonBook vSmallFont">coin</span> = 1 Turkish Lira</p>
                            <div class="blackBrdr px-5">
                                <div class="mdCard">
                                    <div class="mt-3">
                                        <p class="mb-0 camptonBook fw-bold lh-1">Available <span class="camptonBold">MD</span>coin</p>
                                        <p class="mb-0 camptonBold fs-3">500</p>
                                        <a class="btn btn-sm inviteBtn df-center mt-3 camptonBold" style="border-color: #000;">Use My MD<span class="camptonBook">coin</span></a>
                                    </div>
                                    <img src="{{('front/assets/img/mdcoin.png')}}" alt="" style="width: 200px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 2: SCAN QR -->
        <div class="bg-f6 scanQr">
            <img src="{{('front/assets/img/appScreenFooter.png')}}" alt="">
        </div>
    </div>
<!-- </div> -->
@endsection
@section('script')
<script type="text/javascript">
  const lightbox = GLightbox({ ...options });
</script>
<script>
    let checkedVal;
    $('input[type=radio]').click(function(){
        checkedVal = $('input[name="paymentMethod"]:checked').val();
        if(checkedVal === "card"){
            $("#card").css('display', 'block');
            $("#wallet").css('display', 'none');
        }else if(checkedVal === "wallet"){
            $("#card").css('display', 'none');
            $("#wallet").css('display', 'block');
        }
    });
</script>
@endsection