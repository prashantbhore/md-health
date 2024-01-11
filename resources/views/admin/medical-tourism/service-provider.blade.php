@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="content-wrapper">
        <div class="page-title">Manage Medical Tourism Provider</div>
        <div class="row top-cards">
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-body">
                        <!-- Filters -->
                        <div class="w-full d-flex align-items-center justify-content-end gap-2 mb-3 filters">
                            <div class="card-title me-auto">MMT Providers</div>
                            <input type="text" class="form-control" placeholder="Search">

                            <select class="form-select form-select-sm">
                                <option selected disabled hidden>Active Orders</option>
                                <option value="1">Active Orders</option>
                                <option value="2">Denied Orders</option>
                                <option value="3">Completed Orders</option>
                            </select>
                        </div>
                        <div class="table-responsive" style="overflow-x: hidden">
                            <table id="example" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th>Hospital Name</th>
                                        <th>TAX No</th>
                                        <th>City</th>
                                        {{-- <th>Country</th> --}}
                                        <th>Contact Number</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>

                                    {{-- <tr>
                                        <th scope="row">#MD7384</th>
                                        <td>Memorial Hastaneleri</td>
                                        <td>3834938493</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>+90 578 555 21 21</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="{{URL::asset('admin/service-provider-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#MD7384</th>
                                        <td>Acıbadem Hastaneleri</td>
                                        <td>4943934943</td>
                                        <td>Ankara</td>
                                        <td>Turkiye</td>
                                        <td>+90 578 555 21 21</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="{{URL::asset('admin/service-provider-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#MD7384</th>
                                        <td>Estethica Klinik</td>
                                        <td>19282929392</td>
                                        <td>Kocaeli</td>
                                        <td>Turkiye</td>
                                        <td>+90 578 555 21 21</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="{{URL::asset('admin/service-provider-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                 
                                    <tr>
                                        <th scope="row">#MD7384</th>
                                        <td>Memorial Hastaneleri</td>
                                        <td>3834938493</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>+90 578 555 21 21</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="{{URL::asset('admin/service-provider-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#MD7384</th>
                                        <td>Acıbadem Hastaneleri</td>
                                        <td>4943934943</td>
                                        <td>Ankara</td>
                                        <td>Turkiye</td>
                                        <td>+90 578 555 21 21</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="{{URL::asset('admin/service-provider-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#MD7384</th>
                                        <td>Estethica Klinik</td>
                                        <td>19282929392</td>
                                        <td>Kocaeli</td>
                                        <td>Turkiye</td>
                                        <td>+90 578 555 21 21</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="{{URL::asset('admin/service-provider-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr> --}}
                                 

                           
                                </tbody>
                            </table>
                            {{-- <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                </ul>
                            </nav> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script src="{{url('admin\controller_js\admin_cn_medical_tourism.js')}}"></script>
<script>
    $(".medicalTourismLi").addClass("activeClass");
    $(".medicalTourism").addClass("md-active");
</script>
@endsection