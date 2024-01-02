@extends('front.layout.layout2')
@section("content")
<style>
.wallat-view{
    text-align: center;
    display: flex;
    gap: 50px;
}
.wallet-circle-div p.circle {
    width: 71px;
    height: 71px;
    border: 2px solid black;
    border-radius: 100%;
    font-size: 21px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.wallet-circle-div {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
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
 .section-heading {
    margin-bottom: 10px !important;
}
.share-with-div a {
    font-size: 13px !important;
}
.wallet-invite-div .form-group input{
    border-radius: 25px;
}
.section-btns a{
    border-radius: 25px;
}
.wallet-invite-div .section-heading {
    margin-bottom: 20px !important;
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
                        <a href="{{url('user-wallet')}}" class="fw-800 d-flex align-items-center gap-1 text-decoration-none text-dark mt-3">
                            <img src="{{asset('front/assets/img/backPage.png')}}" alt="">
                            <p class="mb-0">Back Wallet</p>
                        </a>
                    </h5>
                    <div class="card-body mb-4">
                        <div class="wallat-view mb-4">
                            <div class="wallet-circle-div wallet-network">
                                <p class="fsb-1 circle mb-1">12</p>
                                <p class="mb-0 fsb-2 fw-800">Your Network</p>
                            </div>
                            <div class="wallet-circle-div wallet-pending">
                                <p class="fsb-1 circle mb-1">28</span>
                                <p class="mb-0 fsb-2 fw-800">Pending Invite</p>
                            </div>
                            <div class="wallet-circle-div wallet-left">
                                <p class="fsb-1 circle mb-1">2</p>
                                <p class="mb-0 fsb-2 fw-800">Invites Left</p>
                            </div>
                        </div>
                        <p class="fsb-2 fst-italic text-danger fw-600 mb-5">*You can invite up to 10 friends monthly.</p>
                        
                        <h6 class="section-heading">Your Invite URL</h6>
                        <p class="fsb-2 fst-italic fw-600 mb-5">https://mdhealt.io/invite/refferral?=MD383hd83d</p>

                        <h6 class="section-heading">Share With</h6>
                        <div class="share-with-div d-flex gap-5">
                            <a href="#" class="fsb-2 fw-600 fs-6 text-green d-flex flex-column align-items-center text-decoration-none gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none">
                                    <path d="M19.0498 4.91006C18.133 3.98399 17.041 3.24973 15.8374 2.75011C14.6339 2.25049 13.3429 1.99552 12.0398 2.00006C6.5798 2.00006 2.1298 6.45006 2.1298 11.9101C2.1298 13.6601 2.5898 15.3601 3.4498 16.8601L2.0498 22.0001L7.2998 20.6201C8.7498 21.4101 10.3798 21.8301 12.0398 21.8301C17.4998 21.8301 21.9498 17.3801 21.9498 11.9201C21.9498 9.27006 20.9198 6.78006 19.0498 4.91006ZM12.0398 20.1501C10.5598 20.1501 9.1098 19.7501 7.8398 19.0001L7.5398 18.8201L4.4198 19.6401L5.2498 16.6001L5.0498 16.2901C4.22755 14.977 3.79094 13.4593 3.7898 11.9101C3.7898 7.37006 7.4898 3.67006 12.0298 3.67006C14.2298 3.67006 16.2998 4.53006 17.8498 6.09006C18.6173 6.85402 19.2255 7.76272 19.6392 8.76348C20.0529 9.76425 20.2638 10.8372 20.2598 11.9201C20.2798 16.4601 16.5798 20.1501 12.0398 20.1501ZM16.5598 13.9901C16.3098 13.8701 15.0898 13.2701 14.8698 13.1801C14.6398 13.1001 14.4798 13.0601 14.3098 13.3001C14.1398 13.5501 13.6698 14.1101 13.5298 14.2701C13.3898 14.4401 13.2398 14.4601 12.9898 14.3301C12.7398 14.2101 11.9398 13.9401 10.9998 13.1001C10.2598 12.4401 9.7698 11.6301 9.6198 11.3801C9.4798 11.1301 9.5998 11.0001 9.7298 10.8701C9.8398 10.7601 9.9798 10.5801 10.0998 10.4401C10.2198 10.3001 10.2698 10.1901 10.3498 10.0301C10.4298 9.86006 10.3898 9.72006 10.3298 9.60006C10.2698 9.48006 9.7698 8.26006 9.5698 7.76006C9.3698 7.28006 9.1598 7.34006 9.0098 7.33006H8.5298C8.3598 7.33006 8.0998 7.39006 7.8698 7.64006C7.6498 7.89006 7.0098 8.49006 7.0098 9.71006C7.0098 10.9301 7.89981 12.1101 8.0198 12.2701C8.1398 12.4401 9.7698 14.9401 12.2498 16.0101C12.8398 16.2701 13.2998 16.4201 13.6598 16.5301C14.2498 16.7201 14.7898 16.6901 15.2198 16.6301C15.6998 16.5601 16.6898 16.0301 16.8898 15.4501C17.0998 14.8701 17.0998 14.3801 17.0298 14.2701C16.9598 14.1601 16.8098 14.1101 16.5598 13.9901Z" fill="#111111"/>
                                </svg>
                                Whatsapp
                            </a>
                            <a href="#" class="fsb-2 fw-600 fs-6 text-green d-flex flex-column align-items-center text-decoration-none gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                    <path d="M10.5 0C4.704 0 0 4.704 0 10.5C0 16.296 4.704 21 10.5 21C16.296 21 21 16.296 21 10.5C21 4.704 16.296 0 10.5 0ZM15.372 7.14C15.2145 8.799 14.532 12.831 14.1855 14.6895C14.0385 15.477 13.7445 15.7395 13.4715 15.771C12.8625 15.8235 12.4005 15.372 11.8125 14.9835C10.8885 14.3745 10.3635 13.9965 9.471 13.4085C8.4315 12.726 9.1035 12.348 9.702 11.739C9.8595 11.5815 12.5475 9.135 12.6 8.9145C12.6073 8.8811 12.6063 8.84643 12.5972 8.81349C12.588 8.78056 12.571 8.75035 12.5475 8.7255C12.4845 8.673 12.4005 8.694 12.327 8.7045C12.2325 8.7255 10.7625 9.702 7.896 11.634C7.476 11.9175 7.098 12.0645 6.762 12.054C6.384 12.0435 5.67 11.844 5.1345 11.6655C4.473 11.4555 3.9585 11.34 4.0005 10.9725C4.0215 10.7835 4.284 10.5945 4.7775 10.395C7.8435 9.0615 9.8805 8.1795 10.899 7.7595C13.818 6.5415 14.4165 6.3315 14.8155 6.3315C14.8995 6.3315 15.099 6.3525 15.225 6.4575C15.33 6.5415 15.3615 6.657 15.372 6.741C15.3615 6.804 15.3825 6.993 15.372 7.14Z" fill="#111111"/>
                                </svg>
                                Telegram
                            </a>
                            <a href="#" class="fsb-2 fw-600 fs-6 text-green d-flex flex-column align-items-center text-decoration-none gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                    <path d="M5.25 9.625C5.25 7.1505 5.25 5.91238 6.01913 5.14413C6.78738 4.375 8.0255 4.375 10.5 4.375H13.125C15.5995 4.375 16.8376 4.375 17.6059 5.14413C18.375 5.91238 18.375 7.1505 18.375 9.625V14C18.375 16.4745 18.375 17.7126 17.6059 18.4809C16.8376 19.25 15.5995 19.25 13.125 19.25H10.5C8.0255 19.25 6.78738 19.25 6.01913 18.4809C5.25 17.7126 5.25 16.4745 5.25 14V9.625Z" stroke="#111111" stroke-width="1.875"/>
                                    <path d="M5.25 16.625C4.55381 16.625 3.88613 16.3484 3.39384 15.8562C2.90156 15.3639 2.625 14.6962 2.625 14V8.75C2.625 5.45038 2.625 3.80012 3.6505 2.7755C4.67512 1.75 6.32538 1.75 9.625 1.75H13.125C13.8212 1.75 14.4889 2.02656 14.9812 2.51884C15.4734 3.01113 15.75 3.67881 15.75 4.375" stroke="#111111" stroke-width="1.875"/>
                                </svg>
                                Whatsapp
                            </a>
                        </div>
                    </div>

                    <div class="card-body invite-form-div mb-4">
                        <h6 class="section-heading">Invite Friends</h6>

                        <form action="">

                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="E-Mail">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="E-Mail">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="E-Mail">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="E-Mail">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="E-Mail">
                            </div>

                            <div class="section-btns ">
                                <a href="javascript:void(0);" class="black-plate bg-black text-white fw-700 w-100">Send Invite Request</a>
                            </div>

                        </form>

                        
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