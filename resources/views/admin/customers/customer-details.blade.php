@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="container2 pb-5">
        <div class="d-flex align-items-center justify-content-between">
            <div class="page-title">Customers ID #273929</div>
            <a href="{{URL::asset('admin/customers')}}" class="page-title">
                <img src="{{URL::asset('admin/assets/img/ArrowLeftCircle.png')}}" alt="" class="back-btn"> Back Customers
            </a>
        </div>
        <div class="row top-cards">
            <div class="col-md-6">
                <!-- Patient Details -->
                <div class="card card-details mb-3" style="min-height: 380px;">
                    <div class="card-body">
                        <p class="card-title mb-3">Patient Details</p>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">First Name</label>
                                <p>{{!empty($customer->first_name)?$customer->first_name:''}}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Last Name</label>
                                <p>{{!empty($customer->last_name)?$customer->last_name:''}}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="contactNo">Contact Number</label>
                                <p>{{!empty($customer->phone)?$customer->phone:''}}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email">E-mail</label>
                                <p>{{!empty($customer->email)?$customer->email:''}}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="address">Address</label>
                                <p class="d-flex flex-column gap-3">
                                    <span>{{!empty($customer->address)?$customer->address:''}}</span>
                                    <span>{{!empty($customer->city->city_name)?$customer->city->city_name:''}}/ {{!empty($customer->country->country_name)?$customer->country->country_name:''}}</span>
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="address">Invoice Address</label>
                                <p class="d-flex flex-column gap-3">
                                    <span>{{!empty($customer->address)?$customer->address:''}}</span>
                                    <span>{{!empty($customer->city->city_name)?$customer->city->city_name:''}}/ {{!empty($customer->country->country_name)?$customer->country->country_name:''}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END -->


                <!-- Logs Activity -->
                <div class="card card-details mb-3" style="min-height: 380px;">
                    <div class="card-body">
                        <p class="card-title mb-3">Logs Activity</p>
                        <div class="table-responsive">
                            <table class="table">
                            @if(!empty($logs))
                               @foreach ($logs as $log)
                                <tr>
                                    <td scope="row">{{!empty($log->type)?ucfirst($log->type):''}}</td>
                                    <td class="log-success">{{!empty($log->status)&&$log->status=='active'?'Successful':'Unsuccessful'}}</td>
                                    <td class="text-end">{{!empty($log->created_at)?$log->created_at:''}}</td>
                                </tr>
                               @endforeach 
                            @endif   

                              

                            </table>
                        </div>
                    </div>
                </div>
                <!-- END -->
            </div>

            <div class="col-md-6">
                <div class="card card-details" style="min-height: 776px;">
                    <div class="card-body">
                        <div class="mb-3 d-flex align-items-center justify-content-between w-full filters">
                            <p class="card-title ">Order History</p>
                            <select class="form-select form-select-sm w-25">
                                <option selected>All Orders</option>
                                <option value="1"><span class="md-fw-bold">MD</span>health</option>
                                <option value="2"><span class="md-fw-bold">MD</span>shop</option>
                                <option value="3"><span class="md-fw-bold">MD</span>booking</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                @if(!empty($customer->customerOrders))
                                @foreach ($customer->customerOrders as $orders)

                                    {{-- {{dd($orders)}} --}}
                              
                                <div class="card shadow-none">
                                    <div class="card-body d-flex w-full justify-content-between" style="background: #F6F6F6;">
                                        <div class="card-ls">
                                            <h6>{{!empty($orders->package->package_name)?$orders->package->package_name:''}}</h6>
                                            <p>{{ !empty($orders->paymentDetails->purchage->created_at) ? $orders->paymentDetails->purchage->created_at->format('Y-m-d') : '' }}</p>

                                            <p class="mt-auto">Platform: <span class="md-fw-bold ms-1">MD</span>health</p>
                                        </div>
                                        <div class="card-rs text-end">
                                      <a href="{{URL::asset('admin/sales-details')}}">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" class="mb-2">
                                                <path opacity="0.4" d="M12 4C17.515 4 22 8.486 22 14C22 19.514 17.515 24 12 24C6.486 24 2 19.514 2 14C2 8.486 6.486 4 12 4Z" fill="black" />
                                                <path d="M10.558 9.77893C10.749 9.77893 10.941 9.85193 11.087 9.99793L14.574 13.4679C14.715 13.6089 14.794 13.7999 14.794 13.9999C14.794 14.1989 14.715 14.3899 14.574 14.5309L11.087 18.0029C10.794 18.2949 10.32 18.2949 10.027 18.0009C9.73497 17.7069 9.73597 17.2319 10.029 16.9399L12.982 13.9999L10.029 11.0599C9.73597 10.7679 9.73497 10.2939 10.027 9.99993C10.173 9.85193 10.366 9.77893 10.558 9.77893Z" fill="black" />
                                            </svg>
                                      </a>
                                            <h6>{{!empty($orders->package->sale_price)?$orders->package->sale_price:''}} ₺</h6>

                                            @php
                                                $purchaseType = $orders->paymentDetails->purchage->purchase_type;
                                            @endphp

                                            @if(!empty($purchaseType))
                                                @php
                                                    $class = [
                                                        'completed' => 'completed',
                                                        'in_progress' => 'in-progress',
                                                        'pending' => 'pending',
                                                        'active' => 'active',
                                                        'cancelled' => 'cancelled',
                                                    ][$purchaseType];
                                                @endphp

                                                <div class="{{ $class }}">{{ $purchaseType }}</div>
                                            @endif

                                           
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
@section('script')
<script>
    $(".manageCustomersLi").addClass("activeClass");
    $(".manageCustomers").addClass("md-active");
</script>
@endsection