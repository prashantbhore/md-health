@extends('front.layout.layout2')
@section('content')
<div class="content-wrapper paymentsPage bg-f6">
    
    <!-- SECTION 1 -->
    <div class="searchBar backBtn bg-f6">
        <div class="container pt-4">
           <div class="d-flex flex-column align-items-center gap-4 py-5">
            <img src="{{('front/assets/img/Varlik.svg')}}" alt="" style="width: 100px;">
            <p class="mb-0 fs-5 camptonBold lh-base">Your payment has been completed successfully</p>
            <img src="{{('front/assets/img/ArrowsDown.png')}}" alt="" class="mb-3">
            <p class="mb-0 fs-6 camptonBold lh-base">Your order no <span class="text-green">#MD829</span></p>
            <p class="vSmallFont camptonBook fw-bold">You can go to the "<span class="camptonBold"><u>packages</u></span>" page or to the <span class="camptonBold"><u>Homepage</u></span> to see your reservations.</p>
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
