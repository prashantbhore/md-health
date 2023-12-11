@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="content-wrapper">
        <div class="d-flex align-items-center justify-content-between">
            <div class="page-title">Manage Admins & Roles</div>
            <a href="{{URL::asset('admin/add-admins')}}" class="page-title"> <img src="{{URL::asset('admin/assets/img/ArrowLeftCircle.png')}}" alt="" class="back-btn" /> Back Admins</a>
        </div>

        <div class="row top-cards">
            <div class="col-md-12 my-3">
                <div class="card addCity">
                    <div class="card-body">
                        <div class="card-title">Add New Admins</div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                <form action="{{route('admin.store')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{!empty($admin->id)?$admin->id:''}}">
                                    <div class="col-md-12 mb-3">
                                        <input type="text" name="name" value="{{!empty($admin->name)?$admin->name:''}}" class="form-control" placeholder="Name"/>
                                    </div>
                                  
                                    <div class="col-md-12 mb-3">
                                        <input type="text" name="email" value="{{!empty($admin->email)?$admin->email:''}}" class="form-control" placeholder="E-mail" />
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <select name="adminRole" id="adminRole" class="form-select form-select-sm w-100">
                                            <option value="" disabled hidden>Select Role</option>
                                            <option value="superadmin" {{ old('adminRole', $admin->userType) == 'superadmin' ? 'selected' : '' }}>Super Admin</option>
                                            <option value="admin" {{ old('adminRole', $admin->userType) == 'admin' ? 'selected' : '' }}>Admin</option>
                                        </select>
                                    </div>
                                    


                                   
                                </div>
                            </div>

                            <div class="col-md-6 mb-3 d-flex gap-2">
                                <button type="submit" class="btn save-btn fw-bold fs-14">Save Changes</button>
                                <button type="submit" class="btn delete-btn fw-bold fs-14">Delete Admin</button>
                            </div>
                        </form>  
                        </div>
                    </div>
                </div>
            </div>

            <!-- Logs Activity -->
            <div class="card card-details mb-3">
                <div class="card-body">
                    <p class="card-title mb-3">Admin Logs Activity</p>
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
        </div>
    </div>
</section>
@endsection @section('script')
<script>
    $(".adminsLi").addClass("activeClass");
    $(".admins").addClass("md-active");
</script>
@endsection
