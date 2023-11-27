@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="content-wrapper">
        <div class="d-flex align-items-center justify-content-between">
            <div class="page-title">Completed Payments</div>
            <a href="{{URL::asset('/payments')}}" class="page-title">
                <img src="{{URL::asset('admin/assets/img/ArrowLeftCircle.png')}}" alt="" class="back-btn"> Back Payments
            </a>
        </div>
        <div class="row top-cards">
            <div class="col-md-12 my-3">
                <div class="card" style="min-height: calc(100vh - 250px);">
                    <div class="card-body">

                        <div class="w-full d-flex align-items-center justify-content-end gap-2 mb-3 filters">
                            <div class="card-title me-auto">Payment Transaction History</div>
                            <input type="text" class="form-control" placeholder="Search">
                            <select class="form-select form-select-sm">
                                <option selected disabled hidden>All Transactions</option>
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
                                        <th>Receiver Name</th>
                                        <th>Bank Name</th>
                                        <th>IBAN</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <th scope="row">#MD7384</th>
                                        <td>Ali Danish</td>
                                        <td>Akbank T. A.S.</td>
                                        <td>TR00 0000 0000 0000 0000 0000 00</td>
                                        <td>1.000,00 ₺</td>
                                        <td>12/12/2023 - 15:31</td>
                                        <td>
                                            <div class="completed">Completed</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#MD7384</th>
                                        <td>Ali Danish</td>
                                        <td>Akbank T. A.S.</td>
                                        <td>TR00 0000 0000 0000 0000 0000 00</td>
                                        <td>1.000,00 ₺</td>
                                        <td>12/12/2023 - 15:31</td>
                                        <td>
                                            <div class="deleted">Denied</div>
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