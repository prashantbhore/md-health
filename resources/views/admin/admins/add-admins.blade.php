@extends('admin.layout.layout') @section("content")
<style>
    .error {
        color: red;
    }
   
</style>
<section class="main-content">
    <div class="content-wrapper">
        <div class="page-title">Manage Admins & Roles</div>
        <div class="row top-cards ">
            <div class="col-md-12 my-3">
                <div class="card addCity">
                    <div class="card-body">
                        <div class="card-title">Add New Admins</div>

                        <form id="adminForm" action="{{ route('admin.store') }}" method="post">
                            @csrf
                        
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                </div>
                        
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="email" class="form-control" placeholder="E-mail">
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                        
                                <div class="col-md-6 mb-3">
                                    <select name="adminRole" id="adminRole" class="form-select form-select-sm w-100">
                                        <option selected disabled hidden>Role</option>
                                        <option value="superAdmin">Super Admin</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                        
                                <div class="col-md-12 mb-3">
                                    <button type="submit" class="btn deactivate-btn w-100">Add New Admin</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-body">
                        <!-- Filters -->
                        <div class="w-full d-flex align-items-center justify-content-end gap-2 mb-3 filters">
                            <div class="card-title me-auto">Admins</div>
                            <input type="text" class="form-control" placeholder="Search">

                            <select class="form-select form-select-sm">
                                <option selected disabled hidden>Active Admins</option>
                                <option value="1">Active Orders</option>
                                <option value="2">Denied Orders</option>
                                <option value="3">Completed Orders</option>
                            </select>
                        </div>
                        <div class="table-responsive" style="overflow-x: hidden">
                            <table id="example" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">E-mail</th>
                                        <th>Full Name</th>
                                        <th>Role</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>


                                    {{-- <tr>
                                        <td scope="row">info@mdhealth.io</td>
                                        <td>Gokhan Arslan</td>
                                        <td>Super Admin</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="{{URL::asset('admin/edit-admins')}}">
                                                <img src="{{URL::asset('admin/assets/img/editEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">info@mdhealth.io</td>
                                        <td>Abdul Ghaffar</td>
                                        <td>Super Admin</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="{{URL::asset('admin/edit-admins')}}">
                                                <img src="{{URL::asset('admin/assets/img/editEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">11111@hotmail.com</td>
                                        <td>Mert Akin</td>
                                        <td>Finance</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="{{URL::asset('admin/edit-admins')}}">
                                                <img src="{{URL::asset('admin/assets/img/editEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">22322@gmail.com</td>
                                        <td>Semra Bayir</td>
                                        <td>Customer Support</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="{{URL::asset('admin/edit-admins')}}">
                                                <img src="{{URL::asset('admin/assets/img/editEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td scope="row">Customer Support</td>
                                        <td>Koray Ildes</td>
                                        <td>Admin</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="{{URL::asset('admin/edit-admins')}}">
                                                <img src="{{URL::asset('admin/assets/img/editEntry.png')}}" alt="">
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
<script src="{{url('admin\controller_js\admin_cn_admin.js')}}"></script>
<script>
    $(".adminsLi").addClass("activeClass");
    $(".admins").addClass("md-active");
</script>
<script>
    $(document).ready(function(){
        $("th").each(function(){
            $(this).removeClass('sorting_asc');
        })
  
        
    })
  </script>
@endsection