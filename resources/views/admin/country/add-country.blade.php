@extends('admin.layout.layout') @section("content")
<style>

</style>

<section class="main-content cityPage">
    <div class="content-wrapper">
        <div class="page-title">Manage Country</div>
        <div class="row top-cards ">
            <div class="col-md-12 my-3">
                <div class="card addCity">
                    <div class="card-body">
                        <div class="card-title"> Country Name</div>

                        <form id="yourFormId" action="{{route('add-city')}}" method="post">
                            @csrf

                            <input type="hidden" name="id" value="{{!empty($city->id)?$city->id:''}}">

                            <div class="row">
                               

                                <div class="col-md-6 mb-3">
                                    <input type="text" name="city" class="form-control" placeholder="Country Name" value="{{!empty($city->city_name)?$city->city_name:''}}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <button type="submit" class="btn deactivate-btn w-100">Add Country</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>

            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive" style="overflow-x: hidden">
                            <!-- Filters -->
                            <div class="w-full d-flex align-items-center justify-content-end gap-2 mb-3 filters">
                                <div class="card-title me-auto">Country List</div>
                                
                            {{-- <input type="text" class="form-control" placeholder="Search"> --}}

                             {{-- <input type="search" class="form-control form-control-sm" placeholder aria-controls="example"> --}}

                                <select class="form-select form-select-sm">
                                    <option selected >All</option>
                                    <option value="1">Active </option>
                                    <option value="1">Deactive </option>

                                </select>
                            </div>
                            <table id="example" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="w-25">Country ID</th>
                                        <th scope="col" class="w-25">Country Name</th>
                                        <th class="w-25">Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                               
                                    <tr>
                                        <th scope="row">+91</th>
                                        <td>India</td>
                                        <td>Active</td>
                                       
                                        <td class="text-end">
                                            <a href="{{URL('admin/sales-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/re-direct.png')}}" alt="">
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

{{-- <script>
 $(document).ready(function() {
        $('#example').DataTable();
    });
    </script> --}}

<!-- <script src="{{url('admin\controller_js\admin_cn_city.js')}}"></script> -->

<script>
    $(".contryLi").addClass("activeClass");
    $(".contry").addClass("md-active");
</script>


@endsection