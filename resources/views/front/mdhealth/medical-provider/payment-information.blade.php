@extends('front.layout.layout2')
@section("content")
<style>
    .payment-card {
        padding: 25px;
        border-radius: 5px;
    }
    .payment-card  h5{
        font-weight: 900;
        line-height: 20px;
        font-size: 23px;
        margin-bottom: 0;
    }
    .payment-card  h6{
        line-height: 15px;
        font-size: 13px;
        font-weight: 900 !important;
    }
</style>
<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="row">
            <div class="col-md-3">
                @include('front.includes.sidebar')
            </div>
            <div class="col-md-9">
                <div class="card mb-4">
                    <div class="form-div">
                        <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                            <span>MY Bank Account Details</span>
                            <img src="{{asset('front/assets/img/GoldMember.svg')}}" alt="">
                        </h5>

                        <form method="POST" action="{{ route('store.vendor.bank.details') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label class="form-label">Your Company IBAN</label>
                                    <div class="input-icon-div">
                                        <input type="text" name="account_number" class="form-control" placeholder="TR00 0000 0000 0000 0000 0000 00">
                                    </div>
                                </div>
                        
                                <div class="form-group mb-4">
                                    <label class="form-label">Company Name</label>
                                    <div class="input-icon-div">
                                        <input type="text" name="bank_name" class="form-control" placeholder="MDhealth Ltd. Sti.">
                                    </div>
                                </div>
                        
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn save-btn-black">Save Bank Account</button>
                                </div>
                            </div>
                        </form>
                        

                    </div>
                </div>

                <div class="payment-detail-div mb-4 ">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="payment-card bg-warning">
                                <h6 class="text-dark fsb-2">Total Payment</h6>
                                <h5 class="text-dark fsb-1">{{$total_business_amount}} ₺</h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="payment-card bg-green" >
                                <h6 class="text-dark fsb-2">Total Completed Payment</h6>
                                <h5 class="text-dark fsb-1">{{ $total_completed_amount}} ₺</h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="payment-card bg-orange">
                                <h6 class="text-white fsb-2">Total Pending Payment</h6>
                                <h5 class="text-white fsb-1">{{$total_pending_amount}} ₺</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RECENT TRETMENTS -->
                <div class="card">
                    <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                    Transaction 
                    </h5>
                    <div class="card-body">

                        <div class="filter-div">
                            <div class="search-div">
                                <input type="text" placeholder="Search">
                            </div>
                            <div class="list-div">
                                <select name="" id="">
                                    <option value="">List for Date</option>
                                    <option value="">List for Price</option>
                                    <option value="">List for Distance</option>
                                </select>
                            </div>
                        </div>

                        <div class="transaction-list">
                           @if($payment_list)
                           @foreach ($payment_list as $payment)


                           <div class="treatment-card df-start w-100 mb-3">
                            <div class="row card-row align-items-center">
                                <div class="col-md-2 df-center px-0">
                                    <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="">
                                </div>
                                <div class="col-md-6 justify-content-start ps-0">
                                    <div class="trmt-card-body">
                                        <h5 class="dashboard-card-title">Payment ID: #{{!empty($payment['payment_id'])?$payment['payment_id']:''}}</h5>
                                        <h5 class="mb-0 fw-500">{{!empty($payment['amount'])?$payment['amount']:''}} ₺</h5>
                                    </div>
                                </div>
                                @if($payment['payment_status']=='pending')
                                <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                    <div class="trmt-card-footer">
                                        <span class="in-progress">Pending</span>
                                    </div>
                                </div>
                                @endif


                                @if($payment['payment_status']=='completed')
                                <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                    <div class="trmt-card-footer">
                                        <span class="active">Completed</span>
                                    </div>
                                </div>
                               @endif

                            </div>
                        </div>
                               
                           @endforeach
                           @endif


                            {{-- <div class="treatment-card df-start w-100 mb-3">
                                <div class="row card-row align-items-center">
                                    <div class="col-md-2 df-center px-0">
                                        <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="">
                                    </div>
                                    <div class="col-md-6 justify-content-start ps-0">
                                        <div class="trmt-card-body">
                                            <h5 class="dashboard-card-title">Payment ID: #MD3726378</h5>
                                            <h5 class="mb-0 fw-500">34.847,90 ₺</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                        <div class="trmt-card-footer">
                                            <span class="in-progress">Progress</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="treatment-card df-start w-100 mb-3">
                                <div class="row card-row align-items-center">
                                    <div class="col-md-2 df-center px-0">
                                        <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="">
                                    </div>
                                    <div class="col-md-6 justify-content-start ps-0">
                                        <div class="trmt-card-body">
                                            <h5 class="dashboard-card-title">Payment ID: #MD3726378</h5>
                                            <h5 class="mb-0 fw-500">34.847,90 ₺</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                        <div class="trmt-card-footer">
                                            <span class="active">Active</span>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}



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
    $(".mpPaymentLi").addClass("activeClass");
    $(".mpPayment").addClass("md-active");
</script>
@endsection