@extends('front.layout.layout2')
@section('content')
<style>
    .pending {
        width: 94px;
        height: 19px;
        flex-shrink: 0;
        padding: unset;
        color: #000;
        text-align: center;
        font-family: Campton;
        font-size: 10px;
        font-weight: 600;
        line-height: normal;
        letter-spacing: -0.4px;
    }
</style>
<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="d-flex gap-3">
            <div class="w-292">
                @include('front.includes.sidebar')
            </div>
            <div class="w-761">
                <div class="card mb-4" style="min-height: 245px;">

                    <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                        <span>Sale</span>
                        <img src="{{ asset('front/assets/img/GoldMember.svg') }}" alt="">
                    </h5>

                    <div class="card-body">
                        <div class="white-plate bg-white d-flex align-items-center justify-content-between mb-3">
                            <p class="my-0">Sales (Daily)</p>
                            <h3 class="my-0">{{ $daily_sales_amount }} <span class="lira">₺</span></h3>
                        </div>
                        
                        <div class="black-plate bg-black text-green d-flex align-items-center justify-content-between mb-3">
                            <p class="my-0">Sales (Monthly)</p>
                            <h3 class="my-0">{{ $monthly_sales_amount }} <span class="lira">₺</span></h3>
                        </div>
                    </div>

                </div>

                <!-- ALL SALES -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-header d-flex align-items-center justify-content-between mb-3 p-0">
                            <span>All Sales</span>
                        </h5>
                        <div class="tab-div medical-sales-tab">
                            <!-- SALES STATUS -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <!-- ACTIVE SALES -->
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="saleactive-tab" data-bs-toggle="tab" data-bs-target="#saleactive" type="button" role="tab" aria-controls="saleactive" aria-selected="true">Active</button>
                                </li>
                                <!-- COMPLETED SALES -->
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="sale-inprogress-tab" data-bs-toggle="tab" data-bs-target="#sale-inprogress" type="button" role="tab" aria-controls="sale-inprogress" aria-selected="true">Completed</button>
                                </li>
                                <!-- CANCELLED SALES -->
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="sale-cancelled-tab" data-bs-toggle="tab" data-bs-target="#sale-cancelled" type="button" role="tab" aria-controls="sale-cancelled" aria-selected="false">Cancelled</button>
                                </li>
                            </ul>

                            <!-- SALES FILTER -->
                            <div class="filter-div">
                                <!-- SEARCH -->
                                <div class="search-div">
                                    <input type="text" placeholder="Search" id="liveSearchInput">
                                </div>
                                <!-- SORTY BY -->
                                <div class="list-div">
                                    <select name="" id="" class="form-select filter-list">
                                        <option value="">List for date</option>
                                        <option value="">List for Price</option>
                                        <option value="">List for Distance</option>
                                    </select>
                                </div>
                            </div>

                            <!-- SALES CONTENT -->
                            <div class="tab-content" id="myTabContent">
                                <!-- ACTIVE SALES -->
                                <div class="tab-pane fade show active" id="saleactive" role="tabpanel" aria-labelledby="saleactive-tab">
                                    <div id="searchResultsContainer">
                                    </div>
                                    @if (!empty($active_sales))
                                    @foreach ($active_sales as $activeSale)
                                    {{-- {{dd($activeSale)}} --}}
                                    <div class="card shadow-none mb-4" style="border-radius: 3px;background: #F6F6F6;min-height:75px">
                                        <div class="p-3 d-flex gap-3">
                                            @php
                                            $id = Auth::guard('md_health_medical_providers_registers')->user()->id;
                                            $provider_logo = \App\Models\MedicalProviderLogo::where('status', 'active')
                                            ->where('medical_provider_id', $id)
                                            ->first();
                                            // $provider_logo = \App\Models\MedicalProviderLogo::where('status', 'active')
                                            // ->where('medical_provider_id', Auth::user()->id)
                                            // ->first();
                                            @endphp
                                            <div class="card-img-div">
                                                <img src="{{ !empty($provider_logo->company_logo_image_path) ? url('/') . Storage::url($provider_logo->company_logo_image_path) : asset('front/assets/img/default-img.png') }}" alt="" class="md-img-2">
                                            </div>
                                            <div>
                                                <div class="d-flex gap-3">
                                                    <h5 class="card-h1 mb-2">Treatment No: {{ !empty($activeSale['order_id']) ? $activeSale['order_id'] : '' }}</h5>
                                                    <p class="pending ms-3 mb-0 df-center">{{ !empty($activeSale['purchase_type']) ? ucfirst($activeSale['purchase_type']) : '' }}</p>
                                                </div>
                                                <p class="mb-0 pkg-name">{{ !empty($activeSale['customer']['full_name']) ? $activeSale['customer']['full_name'] : '' }}</p>
                                            </div>

                                            <div class="ms-auto d-flex flex-column justify-content-end align-items-end">
                                                <h5 class="card-h3 mb-0">Total Price: <span class="card-p1">{{ !empty($activeSale['package']['sale_price']) ? $activeSale['package']['sale_price'] : '' }}<span class="lira">₺</span></span></h5>
                                                <a href="{{ url('treatment-order-details/' . (!empty($activeSale['id']) ? Crypt::encrypt($activeSale['id']) : '')) }}" class="mt-auto view-det"><strong>View Details</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    @include('front.includes.no-data-found')
                                    @endif
                                </div>
                                <!-- ACTIVE SALES END -->

                                <!-- COMPLETED SALES -->
                                <div class="tab-pane fade" id="sale-inprogress" role="tabpanel" aria-labelledby="sale-inprogress-tab">
                                    @if (!empty($completed_sales))
                                    @foreach ($completed_sales as $completedSale)
                                    <div class="card shadow-none mb-4" style="border-radius: 3px;background: #F6F6F6;">
                                        <div class="p-3 d-flex gap-3">
                                            @php
                                            $provider_logo = \App\Models\MedicalProviderLogo::where('status', 'active')
                                            ->where('medical_provider_id', Auth::guard('md_health_medical_providers_registers')->user()->id)
                                            ->first();
                                            @endphp
                                            <div class="card-img-div">
                                                <img src="{{ !empty($provider_logo->company_logo_image_path) ? url('/') . Storage::url($provider_logo->company_logo_image_path) : asset('front/assets/img/default-img.png') }}" alt="" class="md-img-2">
                                            </div>

                                            <div>
                                                <div class="d-flex gap-3">
                                                    <h5 class="card-h1 mb-2">Treatment No: {{ !empty($completedSale['order_id']) ? $completedSale['order_id'] : '' }}</h5>
                                                    <p class="pending bg-green ms-3 mb-0 df-center">{{ !empty($completedSale['purchase_type']) ? ucfirst($completedSale['purchase_type']) : '' }}</p>
                                                </div>
                                                <p class="mb-0 pkg-name">{{ !empty($completedSale['customer']['full_name']) ? $completedSale['customer']['full_name'] : '' }}</p>
                                            </div>

                                            <div class="ms-auto d-flex flex-column justify-content-end align-items-end">
                                                <h5 class="card-h3 mb-0">Total Price: <span class="card-p1">{{ !empty($completedSale['package']['sale_price']) ? $completedSale['package']['sale_price'] : '' }} <span class="lira fw-lighter">₺</span></span></h5>
                                                <a href="{{ url('treatment-order-details/' . (!empty($completedSale['id']) ? Crypt::encrypt($completedSale['id']) : '')) }}" class="mt-auto view-det"><strong>View Details</strong></a>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    @include('front.includes.no-data-found')
                                    @endif


                                </div>
                                <!-- COMPLETED SALES END -->


                                <!-- CANCELLED SALES -->
                                <div class="tab-pane fade" id="sale-cancelled" role="tabpanel" aria-labelledby="sale-cancelled-tab">
                                    @if (!empty($cancelled_sales))
                                    @foreach ($cancelled_sales as $completedSale)
                                    <div class="card shadow-none mb-4" style="border-radius: 3px;background: #F6F6F6;">
                                        <div class="p-3 d-flex gap-3">
                                            @php
                                            if(!empty(Auth::guard('md_health_medical_providers_registers')->user()->id)){
                                            $provider_logo = \App\Models\MedicalProviderLogo::where('status', 'active')
                                            ->where('medical_provider_id', Auth::guard('md_health_medical_providers_registers')->user()->id)
                                            ->first();
                                            }
                                            @endphp

                                            <div class="card-img-div">
                                                <img src="{{ !empty($provider_logo->company_logo_image_path) ? url('/') . Storage::url($provider_logo->company_logo_image_path) : asset('front/assets/img/default-img.png') }}" alt="" class="md-img-2">
                                            </div>

                                            <div>
                                                <div class="d-flex gap-3">
                                                    <h5 class="card-h1 mb-2">Treatment No: {{ !empty($completedSale['order_id']) ? $completedSale['order_id'] : '' }}</h5>
                                                    <p class="pending bg-red text-white camptonBook ms-3 mb-0 df-center">{{ !empty($completedSale['purchase_type']) ? ucfirst($completedSale['purchase_type']) : '' }}</p>
                                                </div>
                                                <p class="mb-0 pkg-name">{{ !empty($completedSale['customer']['full_name']) ? $completedSale['customer']['full_name'] : '' }}</p>
                                            </div>

                                            <div class="ms-auto d-flex flex-column justify-content-end align-items-end">
                                                <h5 class="card-h3 mb-0">Total Price: <span class="card-p1">{{ !empty($completedSale['package']['sale_price']) ? $completedSale['package']['sale_price'] : '' }} <span class="lira fw-lighter">₺</span></span></h5>
                                                <a href="{{ url('treatment-order-details/' . (!empty($completedSale['id']) ? Crypt::encrypt($completedSale['id']) : '')) }}" class="mt-auto view-det"><strong>View Details</strong></a>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    @include('front.includes.no-data-found')
                                    @endif
                                </div>
                                <!-- CANCELLED SALES END -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ALL SALES END -->
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

<script>
    $(document).ready(function() {
        $('#liveSearchInput').on('input', function() {
            let query = $(this).val();
            var base_url = $("#base_url").val();

            $.ajax({
                url: base_url + "/sales-search",
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: {
                    query: query
                },
                success: function(html) {
                    // Update only if the search box is not empty
                    if (query.trim() !== "") {
                        $('#searchResultsContainer').html(html);
                    } else {
                        // Clear the results when the search box is empty
                        $('#searchResultsContainer').html("");
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>
<script>
    const element = document.querySelector('.filter-list');
    const choices = new Choices(element, {
        // searchEnabled: true,
    });
</script>
@endsection