@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="content-wrapper">
        <div class="page-title">Manage Customers</div>
        <div class="row top-cards">
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Customers</div>
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
                                            <a href="{{URL::asset('/customer-details')}}">
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
                                            <a href="{{URL::asset('/customer-details')}}">
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
                                            <a href="{{URL::asset('/customer-details')}}">
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
                                            <a href="{{URL::asset('/customer-details')}}">
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
                                            <a href="{{URL::asset('/customer-details')}}">
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
                                            <a href="{{URL::asset('/customer-details')}}">
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