@extends('front.layout.layout2') @section("content")
<style>
    .mdCard {
        width: 694px;
        height: 297px;
        flex-shrink: 0;
    }
</style>
<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="d-flex gap-3">
            <div class="w-292">
                @include('front.includes.sidebar-user')
            </div>
            <div class="w-761">
                <div class="card mb-4">
                    <h5 class="card-header mb-3 d-flex align-items-center justify-content-between">
                        Your Wallet
                    </h5>
                    <div class="card-body">
                        <div class="mdCard">
                            <div class="mt-3">
                                <p class="mb-0 card-h4 camptonBook lh-1">Available <span class="camptonBold">MD</span>coin</p>
                                <p class="mb-0 coinsMD">500</p>
                                <a class="btn btn-sm inviteBtn df-center mt-3 camptonBold" style="border-color: #000;" data-bs-toggle="modal" data-bs-target="#UseMyMDCoin">Use My MD<span class="camptonBook">coin</span></a>
                            </div>
                            <img src="front/assets/img/mdcoin.png" alt="" style="width: 200px;" />
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="py-1 d-flex justify-content-between align-items-center">
                            <div class="invite-content">
                                <p class="mb-0 camptonBook fs-3 fw-bold lh-sm">invite your friends</p>
                                <p class="mb-0 camptonBold fs-1">
                                    and <span class="text-green"><u>earn</u></span> MD<span class="camptonBook fw-bold">coin</span>.
                                </p>
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
@endsection @section('script')
<script>
    $(".upWalletLi").addClass("activeClass");
    $(".upWallet").addClass("md-active");
</script>
@endsection
