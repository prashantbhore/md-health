@extends('front.layout.layout2')
@section("content")
<style>
    .wallet-div .mdCard {
        justify-content: space-between;
    }
    .wallet-div .inviteBtn {
        height: 40px;
    }
</style>
<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="row">
            <div class="col-md-3">
                @include('front.includes.sidebar-user')
            </div>
            <div class="col-md-9">

                <div class="card mb-4">
                    <h5 class="card-header mb-3 d-flex align-items-center justify-content-between">
                        Packages
                        <a href="{{url('user-package')}}" class="fw-800 d-flex align-items-center gap-1 text-decoration-none text-dark mt-3">
                            <img src="{{asset('front/assets/img/backPage.png')}}" alt="">
                            <p class="mb-0">Booked Packages</p>
                        </a>
                    </h5>
                    <div class="card-body">
                        <div class="wallet-div">
                            <div class="">
                                <div class="">
                                    <div class="mdCard align-items-start">
                                        <div class="mdCardContent">
                                            <p class="camptonBold vSmallFont text-center mt-3 mb-5">1 MD<span class="camptonBook vSmallFont">coin</span> = 1 Turkish Lira</p>
                                            <div class="mt-3">
                                                <p class="mb-0 camptonBook fw-bold lh-1">Available <span class="camptonBold">MD</span>coin</p>
                                                <p class="mb-0 camptonBold  fs-1 fw-900">500</p>
                                                <a class="btn btn-sm inviteBtn df-center mt-3 camptonBold" style="border-color: #000;" data-bs-toggle="modal"
                                                        data-bs-target="#UseMyMDCoin" >Use My MD<span class="camptonBook">coin</span></a>
                                            </div>
                                        </div>
                                        <img src="front/assets/img/mdcoin.png" alt="" style="width: 250px;">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="py-1 d-flex justify-content-between align-items-center">
                            <div class="invite-content">
                                <p class="mb-0 camptonBook fs-3 fw-bold lh-sm">invite your friends</p>
                                <p class="mb-0 camptonBold fs-1">and <span class="text-green"><u>earn</u></span> MD<span class="camptonBook fw-bold">coin</span>.</p>
                            </div>
                            <div class="d-flex justify-content-center pe-4">
                                <a href="{{url('user-invite')}}" type="button" class="btn border-dark btn-sm inviteBtn df-center m-3">Invite Friends</a>
                            </div>
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