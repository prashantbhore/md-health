@extends('front.layout.layout2')
@section('content')
<div class="content-wrapper paymentsPage bg-f6">
    
    <!-- SECTION 1 -->
    <div class="searchBar backBtn bg-f6">
        <div class="container pt-4">
            <p class="fs-1 camptonBold text-center lh-1">Purchase Details</p>
            <p class="fs-6 camptonBold text-center deleteAll mb-4">Delete All Items</p>
            <div class="packageResult rounded mb-3">
                <div class="flex-grow-1">
                    <div class="d-flex gap-2 justify-content-between align-items-center">
                        <p class="mb-0 fs-5 camptonBold lh-base">MDFood Factory</p>
                        <p class="mb-0 fs-6 camptonBold text-green">Service Price</p>
                    </div>
                    <div>
                        <p class="mb-0"><span class="text-green fw-bold camptonBold"
                                style="font-size: 1.125rem;">Package Includes</span></p>
                        <div class="d-flex gap-1 align-items-baseline mb-1">
                            <img style="width: 11px;" src="{{ 'front/assets/img/Varlik.svg' }}"
                                alt="">
                            <p class="mb-0 camptonBook smallFont">Breakfast</p>
                        </div>
                        <div class="d-flex gap-1 align-items-baseline mb-1">
                            <img style="width: 11px;" src="{{ 'front/assets/img/Varlik.svg' }}"
                                alt="">
                            <p class="mb-0 camptonBook smallFont">Dinner</p>
                        </div>
                        <div class="d-flex gap-1 align-items-baseline mb-1">
                            <img style="width: 11px;" src="{{ 'front/assets/img/Varlik.svg' }}"
                                alt="">
                            <p class="mb-0 camptonBook smallFont">No-Gluten</p>
                        </div>
                        <div class="d-flex gap-1 align-items-baseline mb-1">
                            <img style="width: 11px;" src="{{ 'front/assets/img/Varlik.svg' }}"
                                alt="">
                            <p class="mb-0 camptonBook smallFont">Zero Sugar Dessert</p>
                        </div>
                    </div>
                    <div class="d-flex gap-5 justify-content-between">
                        <div class="d-flex align-items-center gap-2">
                            <p class="mb-0 lctn">1 Week, Beef & Vegetables, Breakfast & Lunch</p>
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
            </div>
            <div class="d-flex justify-content-center mb-3">
                <img src="{{('front/assets/img/order.png')}}" alt="">
            </div>
            <div class="greenBorder mb-4"></div>
            <p class="fs-6 camptonBold text-green text-end">Total Price <span style="color: #000;">34.560,00 ₺</span></p>
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

    <!-- SECTION 3 -->
    <div class="bg-f6 scanQr">
        <img src="{{('front/assets/img/appScreenFooter.png')}}" alt="">
    </div>
</div>
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
