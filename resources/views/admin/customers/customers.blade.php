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
                        <div class="table-responsive">
                            <table class="table">
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
                                    <tr>
                                        <th scope="row">Ali Danish</th>
                                        <td>Male</td>
                                        <td>42</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>+90 578 555 21 21</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="{{URL::asset('admin/customer-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Koray İldeş</th>
                                        <td>Male</td>
                                        <td>30</td>
                                        <td>Ankara</td>
                                        <td>Turkiye</td>
                                        <td>+90 578 555 21 21</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="{{URL::asset('admin/customer-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Sena Solmaz</th>
                                        <td>female</td>
                                        <td>26</td>
                                        <td>Kocaeli</td>
                                        <td>Turkiye</td>
                                        <td>+90 578 555 21 21</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="{{URL::asset('admin/customer-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Ali Danish</th>
                                        <td>Male</td>
                                        <td>42</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>+90 578 555 21 21</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="{{URL::asset('admin/customer-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Koray İldeş</th>
                                        <td>Male</td>
                                        <td>30</td>
                                        <td>Ankara</td>
                                        <td>Turkiye</td>
                                        <td>+90 578 555 21 21</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="{{URL::asset('admin/customer-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Sena Solmaz</th>
                                        <td>female</td>
                                        <td>26</td>
                                        <td>Kocaeli</td>
                                        <td>Turkiye</td>
                                        <td>+90 578 555 21 21</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="{{URL::asset('admin/customer-details')}}">
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
    $(".manageCustomersLi").addClass("activeClass");
    $(".manageCustomers").addClass("md-active");
</script>
@endsection