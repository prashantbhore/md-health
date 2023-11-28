@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="content-wrapper pb-5">
        <div class="page-title">Manage Vendors</div>
        <div class="row top-cards">
            <div class="col-md-12 mb-3">
                <!-- Pending Vendors -->
                <div class="card card-details mb-3">
                    <div class="card-body">
                        <p class="card-title mb-3">Pending Vendors</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th>Company</th>
                                        <th>Membership Type</th>
                                        <th>City</th>
                                        <th>Country</th>
                                        <th>Contact Number</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <th scope="row">#MD7384</th>
                                        <td>Company Name A.S.</td>
                                        <td>Gold</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>+90 578 555 21 21</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="{{URL::asset('admin/vendor-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END -->
            </div>

            <!-- Active Vendors -->
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-body">
                        <!-- Filters -->
                        <div class="w-full d-flex align-items-center justify-content-end gap-2 mb-3 filters">
                            <div class="card-title me-auto">Active Vendors</div>
                            <input type="text" class="form-control" placeholder="Search">

                            <select class="form-select form-select-sm">
                                <option selected disabled hidden>Membership Type</option>
                                <option value="1">Silver Members</option>
                                <option value="2">Gold Members</option>
                                <option value="3">Platinium Members</option>
                            </select>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th>Company</th>
                                        <th>Membership Type</th>
                                        <th>City</th>
                                        <th>Country</th>
                                        <th>Contact Number</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <th scope="row">#MD7384</th>
                                        <td>Company Name A.S.</td>
                                        <td>Gold</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>+90 578 555 21 21</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="{{URL::asset('admin/vendor-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#MD7384</th>
                                        <td>Company Name Ltd. Sti.</td>
                                        <td>Silver</td>
                                        <td>Ankara</td>
                                        <td>Turkiye</td>
                                        <td>+90 578 555 21 21</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="{{URL::asset('admin/vendor-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#MD7384</th>
                                        <td>Company Name A.S.</td>
                                        <td>Platinum</td>
                                        <td>Kocaeli</td>
                                        <td>Turkiye</td>
                                        <td>+90 578 555 21 21</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="{{URL::asset('admin/vendor-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#MD7384</th>
                                        <td>Company Name A.S.</td>
                                        <td>Gold</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>+90 578 555 21 21</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="{{URL::asset('admin/vendor-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#MD7384</th>
                                        <td>Company Name Ltd. Sti.</td>
                                        <td>Silver</td>
                                        <td>Ankara</td>
                                        <td>Turkiye</td>
                                        <td>+90 578 555 21 21</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="{{URL::asset('admin/vendor-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#MD7384</th>
                                        <td>Company Name A.S.</td>
                                        <td>Platinum</td>
                                        <td>Kocaeli</td>
                                        <td>Turkiye</td>
                                        <td>+90 578 555 21 21</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="{{URL::asset('admin/vendor-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                </ul>
                            </nav>
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
    $(".manageVendorsLi").addClass("activeClass");
    $(".manageVendors").addClass("md-active");
</script>
@endsection