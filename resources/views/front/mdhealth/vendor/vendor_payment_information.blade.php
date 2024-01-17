@extends('front.layout.layout2')
@section("content")

<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="row">
            <div class="col-md-3">
                @include('front.includes.sidebar-vendor')
            </div>
            <div class="col-md-9">
                <div class="card mb-4">
                    <div class="form-div">
                        <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                            <span>MY Bank Account Details</span>
                            <img src="https://projects.m-staging.in/md-health-testing/front/assets/img/GoldMember.svg" alt="">
                        </h5>
            
                        <form method="POST" action="https://projects.m-staging.in/md-health-testing/store-vendor-bank-details">
                            <input type="hidden" name="_token" value="WQQUUpXonMrPKlvPY868zCpR4IdMNGzg84Ud47gz" autocomplete="off">
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label class="form-label">Your Company IBAN</label>
                                    <div class="input-icon-div">
                                        <input type="text" name="account_number" class="form-control"
                                            placeholder="TR00 0000 0000 0000 0000 0000 00">
                                    </div>
                                </div>
            
                                <div class="form-group mb-4">
                                    <label class="form-label">Company Name</label>
                                    <div class="input-icon-div">
                                        <input type="text" name="bank_name" class="form-control"
                                            placeholder="MDhealth Ltd. Sti.">
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
                                <h5 class="text-dark fsb-1">8668717482 ₺</h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="payment-card bg-green">
                                <h6 class="text-dark fsb-2">Total Completed Payment</h6>
                                <h5 class="text-dark fsb-1">38845.2 ₺</h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="payment-card bg-orange">
                                <h6 class="text-white fsb-2">Total Pending Payment</h6>
                                <h5 class="text-white fsb-1">8668678636.8 ₺</h5>
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
                                    <option value="">List for date</option>
                                    <option value="">List for Price</option>
                                    <option value="">List for Distance</option>
                                </select>
                            </div>
                        </div>
            
                        <div class="transaction-list">
            
                            <div class="treatment-card df-start w-100 mb-3">
                                <div class="row card-row align-items-center">
                                    <div class="col-md-2 df-center px-0">
                                        <img src="https://projects.m-staging.in/md-health-testing/front/assets/img/Memorial.svg"
                                            alt="" style="width: auto;height: 75px;">
                                    </div>
                                    <div class="col-md-6 justify-content-start ps-0">
                                        <div class="trmt-card-body">
                                            <h5 class="dashboard-card-title">Payment ID: ##MD000001</h5>
                                            <h5 class="mb-0 fw-500">13076.1 ₺</h5>
                                        </div>
                                    </div>
            
            
                                    <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                        <div class="trmt-card-footer">
                                            <span class="active">Completed</span>
                                        </div>
                                    </div>
            
                                </div>
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
    $(".mpSalesLi").addClass("activeClass");
    $(".mpSales").addClass("md-active");
</script>
@endsection
