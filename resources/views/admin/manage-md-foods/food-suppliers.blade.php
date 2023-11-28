@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="content-wrapper">
        <div class="page-title">Manage Food Supliers</div>
        <div class="row top-cards">
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Pending Food Supliers</div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Company</th>
                                        <th scope="col">Membership Type</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Contact Number</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <th scope="row">#MD8739</th>
                                        <td>Company Name A.S.</td>
                                        <td>Gold</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>+90 563 363 36 34</td>
                                        <td class="df-center-end gap-2">
                                            <a href="{{URL('/food-supplier-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="" />
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="" />
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Active Food Supliers</div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Company</th>
                                        <th scope="col">Membership Type</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Contact Number</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <th scope="row">#MD8739</th>
                                        <td>Company Name A.S.</td>
                                        <td>Gold</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>+90 563 363 36 34</td>
                                        <td class="df-center-end gap-2">
                                            <a href="{{URL('/food-supplier-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="" />
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="" />
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#MD8739</th>
                                        <td>Company Name A.S.</td>
                                        <td>Silver</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>+90 563 363 36 34</td>
                                        <td class="df-center-end gap-2">
                                            <a href="{{URL('/food-supplier-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="" />
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="" />
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#MD8739</th>
                                        <td>Company Name A.S.</td>
                                        <td>Platinum</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>+90 563 363 36 34</td>
                                        <td class="df-center-end gap-2">
                                            <a href="{{URL('/food-supplier-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="" />
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="" />
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
@endsection @section('script')
<script>
    $(".manageMDfoodsLi").addClass("activeClass");
    $(".manageMDfoods").addClass("md-active");
</script>
@endsection
