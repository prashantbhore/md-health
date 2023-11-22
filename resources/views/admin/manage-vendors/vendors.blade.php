@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="container2 pb-5">
        <div class="d-flex align-items-center justify-content-between">
            <div class="page-title">Manage Vendors</div>
            <a href="{{URL::asset('/customers')}}" class="page-title">
                <img src="{{URL::asset('admin/assets/img/ArrowLeftCircle.png')}}" alt="" class="back-btn"> Back Customers
            </a>
        </div>
        <div class="row top-cards">
            <div class="col-md-12 mb-3">
    


                <!-- Logs Activity -->
                <div class="card card-details mb-3" style="min-height: 380px;">
                    <div class="card-body">
                        <p class="card-title mb-3">Logs Activity</p>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td scope="row">Login</td>
                                    <td class="log-success">Successful</td>
                                    <td class="text-end">12 Dec 2023 - 15:31:08</td>
                                </tr>
                                <tr>
                                    <td scope="row">Login</td>
                                    <td class="log-unsuccess">Unsuccessful</td>
                                    <td class="text-end">12 Dec 2023 - 15:31:08</td>
                                </tr>
                                <tr>
                                    <td scope="row">Sign Up</td>
                                    <td class="log-success">Successful</td>
                                    <td class="text-end">12 Dec 2023 - 15:31:08</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END -->
            </div>

        
        </div>

    </div>
</section>
@endsection
@section('script')
<script>
    $(".manageVendorsLi").addClass("activeClass");
    $(".manageVendors").addClass("md-active");
</script>
@endsection