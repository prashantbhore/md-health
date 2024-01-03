@extends('front.layout.layout2')
@section("content")
<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="row">
            <div class="col-md-3">
                @include('front.includes.sidebar')
            </div>
            <div class="col-md-9">
                <div class="card mb-4">
                    <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                        <span>Sale</span>
                        <img src="{{asset('front/assets/img/GoldMember.svg')}}" alt="">
                    </h5>
                    <div class="card-body">
                        <div class="white-plate bg-white d-flex align-items-center justify-content-between mb-3">
                            <p class="mb-0 fw-700 fsb-1">Sales (Daily)</p>
                            <h3 class="mb-0 fw-900 fsb-1">79.938,92 ₺</h3>
                        </div>
                        <div class="black-plate bg-black text-green d-flex align-items-center justify-content-between mb-3">
                            <p class="mb-0 fw-400 fsb-1">Sales (Monthly)</p>
                            <h3 class="mb-0 fw-600 fsb-1">349,938,07 ₺</h3>
                        </div>
                    </div>
                </div>
                <div class="card card-body">
                    <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                        <span>All Sales</span>
                    </h5>
                    <div class="tab-div medical-sales-tab">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="saleactive-tab" data-bs-toggle="tab" data-bs-target="#saleactive" type="button"
                                    role="tab" aria-controls="saleactive" aria-selected="true">Active</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="sale-inprogress-tab" data-bs-toggle="tab" data-bs-target="#sale-inprogress" type="button"
                                    role="tab" aria-controls="sale-inprogress" aria-selected="true">Completed</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="sale-cancelled-tab" data-bs-toggle="tab"
                                    data-bs-target="#sale-cancelled" type="button" role="tab" aria-controls="sale-cancelled"
                                    aria-selected="false">Cancelled</button>
                            </li>
                        </ul>

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

                        <!-- Tab panes -->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="saleactive" role="tabpanel" aria-labelledby="saleactive-tab">
                               
                                @if(!empty($active_sales))
                                @foreach ($active_sales as $activeSale)
                                 
                                  {{-- {{dd($activeSale)}} --}}

                                <div class="treatment-card df-start w-100 mb-3">

                                    <div class="row card-row align-items-center">
                                        <div class="col-md-2 df-center px-0">
                                            <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="">
                                        </div>

                                        <div class="col-md-6 justify-content-start ps-0">
                                            <div class="trmt-card-body">
                                                <h5 class="dashboard-card-title">Treatment No: {{ !empty($activeSale['order_id']) ? $activeSale['order_id'] : '' }}
                                                    <span class="{{ !empty($activeSale['purchase_type']) ? ($activeSale['purchase_type'] == 'pending' ? 'pending' : 'in-progress') : '' }}">
                                                        {{ !empty($activeSale['purchase_type']) ? ucfirst($activeSale['purchase_type']) : '' }}
                                                    </span>
                                                </h5>
                                                <h5 class="mb-0 fw-500">{{!empty($activeSale['customer']['full_name'])?$activeSale['customer']['full_name']:''}}</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                            <div class="trmt-card-footer">
                                                <h6 class="dbrd-order-total"><strong>Total Price:</strong> <span class=""> {{!empty($activeSale['package_total_price'])?$activeSale['package_total_price']:''}} ₺</span></h6>
                                                
                                                <a href="{{ url('treatment-order-details/' . (!empty($activeSale['id']) ?Crypt::encrypt($activeSale['id']): '')) }}" class="mt-auto view-detail-btn"><strong>View Details</strong></a>

                                            </div>
                                        </div>
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
                                                <h5 class="dashboard-card-title">Treatment No: #MD3726378<span class="pending">Pending</span></h5>
                                                <h5 class="mb-0 fw-500">Heart Valve Replacement Surgery</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                            <div class="trmt-card-footer">
                                                <h6 class="dbrd-order-total"><strong>Total Price:</strong> <span class="">34.473,98 ₺ ₺</span></h6>
                                                
                                                <a href="{{url('treatment-order-details')}}" class="mt-auto view-detail-btn"><strong>View Details</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                {{-- <div class="treatment-card df-start w-100 mb-3">
                                    <div class="row card-row align-items-center">
                                        <div class="col-md-2 df-center px-0">
                                            <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="">
                                        </div>
                                        <div class="col-md-6 justify-content-start ps-0">
                                            <div class="trmt-card-body">
                                                <h5 class="dashboard-card-title">Treatment No: #MD3726378<span class="pending">Pending</span></h5>
                                                <h5 class="mb-0 fw-500">Heart Valve Replacement Surgery</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                            <div class="trmt-card-footer">
                                                <h6 class="dbrd-order-total"><strong>Total Price:</strong> <span class="">34.473,98 ₺ ₺</span></h6>
                                                
                                                <a href="{{url('treatment-order-details')}}" class="mt-auto view-detail-btn"><strong>View Details</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                {{-- <div class="treatment-card df-start w-100 mb-3">
                                    <div class="row card-row align-items-center">
                                        <div class="col-md-2 df-center px-0">
                                            <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="">
                                        </div>
                                        <div class="col-md-6 justify-content-start ps-0">
                                            <div class="trmt-card-body">
                                                <h5 class="dashboard-card-title">Treatment No: #MD3726378<span class="pending">Pending</span></h5>
                                                <h5 class="mb-0 fw-500">Heart Valve Replacement Surgery</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                            <div class="trmt-card-footer">
                                                <h6 class="dbrd-order-total"><strong>Total Price:</strong> <span class="">34.473,98 ₺ ₺</span></h6>
                                                
                                                <a href="{{url('treatment-order-details')}}" class="mt-auto view-detail-btn"><strong>View Details</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                {{-- <div class="treatment-card df-start w-100 mb-3">
                                    <div class="row card-row align-items-center">
                                        <div class="col-md-2 df-center px-0">
                                            <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="">
                                        </div>
                                        <div class="col-md-6 justify-content-start ps-0">
                                            <div class="trmt-card-body">
                                                <h5 class="dashboard-card-title">Treatment No: #MD3726378<span class="pending">Pending</span></h5>
                                                <h5 class="mb-0 fw-500">Heart Valve Replacement Surgery</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                            <div class="trmt-card-footer">
                                                <h6 class="dbrd-order-total"><strong>Total Price:</strong> <span class="">34.473,98 ₺ ₺</span></h6>
                                                
                                                <a href="{{url('treatment-order-details')}}" class="mt-auto view-detail-btn"><strong>View Details</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                            </div>

                            <div class="tab-pane fade" id="sale-inprogress" role="tabpanel" aria-labelledby="sale-inprogress-tab">
                                @if(!empty($completed_sales))
                                @foreach ($completed_sales as $completedSale)

                                <div class="treatment-card df-start w-100 mb-3">
                                    <div class="row card-row align-items-center">
                                        <div class="col-md-2 df-center px-0">
                                            <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="">
                                        </div>
                                        <div class="col-md-6 justify-content-start ps-0">
                                            <div class="trmt-card-body">
                                                <h5 class="dashboard-card-title">Treatment No:{{!empty($completedSale['order_id'])?$completedSale['order_id']:''}}<span class="active">{{!empty($completedSale['purchase_type'])?ucfirst($completedSale['purchase_type']):''}}</span></h5>
                                                <h5 class="mb-0 fw-500">{{!empty($completedSale['customer']['full_name'])?$completedSale['customer']['full_name']:''}}</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                            <div class="trmt-card-footer">
                                                <h6 class="dbrd-order-total"><strong>Total Price:</strong> <span class="">{{!empty($completedSale['package_total_price'])?$completedSale['package_total_price']:''}} ₺</span></h6>
                                                
                                                <a href="{{ url('treatment-order-details/' . (!empty($completedSale['id']) ?Crypt::encrypt($completedSale['id']): '')) }}" class="mt-auto view-detail-btn"><strong>View Details</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                                @endif


                            </div>



                            {{-- <div class="tab-pane fade" id="sale-completed" role="tabpanel" aria-labelledby="sale-completed-tab">

                                <div class="treatment-card df-start w-100 mb-3">
                                    <div class="row card-row align-items-center">
                                        <div class="col-md-2 df-center px-0">
                                            <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="">
                                        </div>
                                        <div class="col-md-6 justify-content-start ps-0">
                                            <div class="trmt-card-body">
                                                <h5 class="dashboard-card-title">Treatment No: #MD3726378<span class="active">Completed</span></h5>
                                                <h5 class="mb-0 fw-500">Raju Singh</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                            <div class="trmt-card-footer">
                                                <h6 class="dbrd-order-total"><strong>Total Price:</strong> <span class="">34.473,98 ₺</span></h6>
                                                
                                                <a href="{{url('treatment-order-details')}}" class="mt-auto view-detail-btn"><strong>View Details</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div> --}}













                            <div class="tab-pane fade" id="sale-cancelled" role="tabpanel" aria-labelledby="sale-cancelled-tab">
                               
                                @if(!empty($cancelled_sales))
                                @foreach ($cancelled_sales as $completedSale)

                                <div class="treatment-card df-start w-100 mb-3">
                                    <div class="row card-row align-items-center">
                                        <div class="col-md-2 df-center px-0">
                                            <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="">
                                        </div>
                                        <div class="col-md-6 justify-content-start ps-0">
                                            <div class="trmt-card-body">
                                                <h5 class="dashboard-card-title">Treatment No:{{!empty($completedSale['order_id'])?$completedSale['order_id']:''}}<span class="cancel">{{!empty($completedSale['purchase_type'])?ucfirst($completedSale['purchase_type']):''}}</span></h5>
                                                <h5 class="mb-0 fw-500">{{!empty($completedSale['customer']['full_name'])?$completedSale['customer']['full_name']:''}}</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                            <div class="trmt-card-footer">
                                                <h6 class="dbrd-order-total"><strong>Total Price:</strong> <span class="">{{!empty($completedSale['package_total_price'])?$completedSale['package_total_price']:''}} ₺</span></h6>
                                                
                                                <a href="{{ url('treatment-order-details/' . (!empty($completedSale['id']) ?Crypt::encrypt($completedSale['id']): '')) }}" class="mt-auto view-detail-btn"><strong>View Details</strong></a>
                                            </div>
                                        </div>
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
                                                <h5 class="dashboard-card-title">Treatment No: #MD3726378<span class="cancel">Cancel</span></h5>
                                                <h5 class="mb-0 fw-500">Raju Singh</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                            <div class="trmt-card-footer">
                                                <h6 class="dbrd-order-total"><strong>Total Price:</strong> <span class="">34.473,98 ₺</span></h6>
                                                
                                                <a href="{{url('treatment-order-details')}}" class="mt-auto view-detail-btn"><strong>View Details</strong></a>
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
</div>
@endsection
@section('script')
<script>
    $(".mpSalesLi").addClass("activeClass");
    $(".mpSales").addClass("md-active");
</script>
@endsection