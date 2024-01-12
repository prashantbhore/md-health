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
                            {{-- <input type="text" class="form-control" placeholder="Search"> --}}
                            
                            {{-- <select class="form-select form-select-sm">
                                <option selected>All</option>
                                <option value="2">Active</option>
                                <option value="3">Deactive</option>
                            </select> --}}
                        </div>
                        <div class="table-responsive" style="overflow-x: hidden">
                            <table id="example"  class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                        <th>City</th>
                                        <th>Country</th>
                                        <th>Contact Number</th>
                                        <th style="width: 50px;">Action</th>
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