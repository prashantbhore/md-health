@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="content-wrapper">
        <div class="d-flex align-items-center justify-content-between">
            <div class="page-title">Bank Accounts</div>
            <a href="{{URL::asset('admin/payments')}}" class="page-title">
                <img src="{{URL::asset('admin/assets/img/ArrowLeftCircle.png')}}" alt="" class="back-btn"> Back Payments
            </a>
        </div>
        <div class="row top-cards">
            <div class="col-md-12 my-3">
                <div class="card bank-accounts" style="min-height: calc(100vh - 250px);">
                    <div class="card-body">
                        <div class="w-full d-flex align-items-center justify-content-end gap-2 mb-3 filters">
                            <div class="card-title me-auto">MD Bank Accounts</div>
                            <div data-bs-toggle="modal" data-bs-target="#addNewBankAccountModal" class="btn btn-sm bg-black text-green px-3">+ Add New Bank Account</div>
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
                                        <td class="text-end d-flex align-items-center justify-content-end gap-3">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#addNewBankAccountModal" class="deleteImg mt-0">Edit</a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntryBlack.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#MD7384</th>
                                        <td>Ali Danish</td>
                                        <td>Akbank T. A.S.</td>
                                        <td>TR00 0000 0000 0000 0000 0000 00</td>
                                        <td>1.000,00 ₺</td>
                                        <td>12/12/2023 - 15:31</td>
                                        <td class="text-end d-flex align-items-center justify-content-end gap-3">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#addNewBankAccountModal" class="deleteImg mt-0">Edit</a>

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

    <!-- Add/Edit Bank Account Modal -->
    <div class="modal fade " id="addNewBankAccountModal" tabindex="-1" aria-labelledby="addNewBankAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body px-4">
                    <h4 class="mb-4 md-fw-bold text-center">Add New Bank Account</h4>

                    <form>
                        <div class="mb-3">
                            <label for="brand" class="form-label">*Bank Name</label>
                            <input type="text" class="form-control" placeholder="Bank Name">
                        </div>
                        <div class="mb-3">
                            <label for="brand" class="form-label">*IBAN</label>
                            <input type="text" class="form-control" placeholder="TR">
                        </div>


                        <div class="mb-3 text-center">
                            <button type="submit" class="btn save-btn w-75">Add Bank Account</button>
                        </div>

                    </form>
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