@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="content-wrapper">
        <div class="page-title">Payments</div>
        <div class="row top-cards productsPage">
            <div class="col-md-3 mb-3">
                <!-- <a href="{{URL('/category-mdhealth')}}" class="text-decoration-none text-dark"> -->
                <div class="card position-relative bg-yellow">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2">
                            <div class="card-text d-flex flex-column">
                                <p class="text-black">Pending Payments</p>
                                <h4 class="mb-0">9.827,00 ₺</h4>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- </a> -->
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{URL('admin/completed-payments')}}" class="text-decoration-none text-dark">
                    <div class="card bg-green position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div class="card-text d-flex flex-column">
                                    <p class="text-black">Completed Payments</p>
                                    <h4>34.938,09 ₺</h4>
                                </div>
                                <span class="link-open">
                                    <img src="{{URL::asset('admin/assets/img/link-open.png')}}" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-3 ms-auto">
                <a href="{{URL('admin/bank-accounts')}}" class="text-decoration-none text-dark">
                    <div class="card bg-black position-relative" style="min-height: 89px;">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div class="card-text d-flex flex-column">
                                    <p>Bank Accounts</p>
                                </div>
                                <span class="link-open">
                                    <img src="{{URL::asset('admin/assets/img/link-open.png')}}" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-body">
                        <div class="w-full d-flex align-items-center justify-content-end gap-2 mb-3 filters">
                            <div class="card-title me-auto">Payment Requests</div>
                            <input type="text" class="form-control" placeholder="Search">

                            <select class="form-select form-select-sm">
                                <option selected disabled hidden>Active</option>
                                <option value="1">Active Orders</option>
                                <option value="2">Denied Orders</option>
                                <option value="3">Completed Orders</option>
                            </select>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th>Company Name</th>
                                        <th>Completed</th>
                                        <th>Amount to be Paid</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>#MD7384</td>
                                        <td>Memorial Hospital</td>
                                        <td>4</td>
                                        <td>34.879.97 ₺</td>
                                        <td class="text-end d-flex align-items-center justify-content-end gap-2">
                                            <a href="{{URL('admin/payment-requests')}}">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntryBlack.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#MD7384</td>
                                        <td>Braun Electronics</td>
                                        <td>5</td>
                                        <td>23.979.97 ₺</td>
                                        <td class="text-end d-flex align-items-center justify-content-end gap-2">
                                            <a href="{{URL('admin/payment-requests')}}">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntryBlack.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#MD7384</td>
                                        <td>Memorial Hospital</td>
                                        <td>4</td>
                                        <td>34.879.97 ₺</td>
                                        <td class="text-end d-flex align-items-center justify-content-end gap-2">
                                            <a href="{{URL('admin/payment-requests')}}">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntryBlack.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

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
    $(".paymentsLi").addClass("activeClass");
    $(".payments").addClass("md-active");
</script>
@endsection