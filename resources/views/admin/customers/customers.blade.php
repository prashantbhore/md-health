@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="content-wrapper">
        <div class="page-title">Manage Customers</div>
        <div class="row top-cards">
            <div class="col-md-12 my-3">
                <div class="card" style="min-height: calc(100vh - 250px);">
                    <div class="card-body">

                        <div class="w-full d-flex align-items-center justify-content-end gap-2 mb-3 filters">
                            <div class="card-title me-auto">Customers</div>
                            <input type="text" class="form-control" placeholder="Search">
                            <select class="form-select form-select-sm">
                                <option selected>All Orders</option>
                                <option value="1"><span class="md-fw-bold">MD</span>health</option>
                                <option value="2"><span class="md-fw-bold">MD</span>shop</option>
                                <option value="3"><span class="md-fw-bold">MD</span>booking</option>
                            </select>
                            <select class="form-select form-select-sm">
                                <option selected>Active Orders</option>
                                <option value="2">Completed Orders</option>
                                <option value="3">Denied Orders</option>
                            </select>
                        </div>
                        <div class="table-responsive" style="overflow-x: hidden">
                            <table id="example"  class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                        <th>City</th>
                                        <th>Country</th>
                                        <th>Contact Number</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>

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
<script src="{{url('admin\controller_js\admin_cn_customer.js')}}"></script>
<script>
    $(".manageCustomersLi").addClass("activeClass");
    $(".manageCustomers").addClass("md-active");
</script>
@endsection