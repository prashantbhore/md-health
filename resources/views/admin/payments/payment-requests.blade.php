@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="container2 pb-5">
        <div class="d-flex align-items-center justify-content-between">
            <div class="page-title">Payment Request</div>
            <a href="{{URL::asset('admin/payments')}}" class="page-title"> <img src="{{URL::asset('admin/assets/img/ArrowLeftCircle.png')}}" alt="" class="back-btn" /> Back Payments </a>
        </div>
        <div class="row top-cards">
            <div class="col-md-12">
                <!-- Product Pictures -->
                <div class="card card-details mb-3 products">
                    <div class="card-body">
                        <!--  -->
                        <div class="row mt-3">
                            <div class="col-md-12 mb-3">
                                <label for="name">Receiver Name</label>
                                <input type="text" class="form-control" placeholder="Receiver Name">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="name">Bank Name</label>
                                <input type="text" class="form-control" placeholder="Bank Name">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="name">IBAN</label>
                                <div class="input-group">
                                    <input type="text" class="form-control border-end-0" placeholder="TR" aria-label="IBAN" aria-describedby="ibanNo">
                                    <span class="input-group-text border-start-0 copy-text" id="ibanNo" onclick="copyToClipboard()"><i class="ri-file-copy-line me-1"></i> Copy IBAN</span>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="price">Package Price</label>
                                <div class="input-group">
                                    <input type="text" class="form-control border-end-0" placeholder="Package Price" aria-label="Package Price" aria-describedby="packagePrice">
                                    <span class="input-group-text border-start-0" id="packagePrice">₺</span>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class=" df-end">
                                <div class="card-text">
                                    <p class="text-end">Amount to be Paid</p>
                                    <h4 class="mb-0">1.200,00 ₺</h4>
                                </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3 df-end">
                                <div class="d-flex flex-wrap justify-content-between w-50">
                                    <button type="submit" class="btn md-btn save-btn">Payment Complete</button>
                                    <button type="submit" class="btn md-btn deactivate-btn">Payment Denied</button>
                                    <button type="submit" class="btn md-btn delete-btn">Delete Payment Request</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END -->
            </div>
            <!--  -->
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
                        <div class="table-responsive" style="overflow-x: hidden">
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
@endsection @section('script')
<script>
    $(".paymentsLi").addClass("activeClass");
    $(".payments").addClass("md-active");
</script>
@endsection