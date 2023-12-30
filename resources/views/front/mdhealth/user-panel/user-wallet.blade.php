@extends('front.layout.layout2')
@section("content")
<style>
.wallat-view{
    text-align: center;
    display: flex;
    gap: 10px;
}
.wallet-circle-div p.circle {
    width: 71px;
    height: 71px;
    border: 2px solid black;
    border-radius: 100%;
    font-size: 21px;
}
.wallet-circle-div.wallet-network p.circle {
    border: 2px solid #4CDB06;
    
}
.wallet-circle-div.wallet-pending p.circle {
    border: 2px solid #F3771D;
    color: #F3771D;
}
.wallet-circle-div.wallet-left p.circle {
    border: 2px solid #F55C5C;
    color: #F55C5C;
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
                    <h5 class="card-header mb-3 d-flex align-items-center justify-content-between">
                    Your Wallet
                        <a href="{{url('')}}" class="fw-800 d-flex align-items-center gap-1 text-decoration-none text-dark mt-3">
                            <img src="{{asset('front/assets/img/backPage.png')}}" alt="">
                            <p class="mb-0">Back Wallet</p>
                        </a>
                    </h5>
                    <div class="card-body">
                        <div class="wallat-view">
                            <div class="wallet-circle-div wallet-network">
                                <p class="fsb-1 circle">12</p>
                                <p class="mb-0 msb-2 fw-600">Your Network</p>
                            </div>
                            <div class="wallet-circle-div wallet-pending">
                                <p class="fsb-1 circle">28</span>
                                <p class="mb-0 msb-2 fw-600">Pending Invite</p>
                            </div>
                            <div class="wallet-circle-div wallet-left">
                                <p class="fsb-1 circle">2</p>
                                <p class="mb-0 msb-2 fw-600">Invites Left</p>
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
        $(".upWalletLi").addClass("activeClass");
        $(".upWallet").addClass("md-active");
    </script>
    @endsection