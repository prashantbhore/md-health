@extends('front.layout.layout2')
@section("content")
<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="row">
            <div class="col-md-3">
                @include('front.includes.sidebar-user')
            </div>
            <div class="col-md-9">
                <div class="card mb-4">
                    <h5 class="card-header">Your Profile</h5>
                    <div class="card-body">
                        <form action="action" class="user-profile-form">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="First Name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" placeholder="First Name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Last Name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="E-mail" class="form-label">E-mail</label>
                                    <input type="text" class="form-control" placeholder="E-mail">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" placeholder="Phone">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Country" class="form-label">Country</label>
                                    <input type="text" class="form-control" placeholder="Country">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="City" class="form-label">City</label>
                                    <input type="text" class="form-control" placeholder="City">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Address" class="form-label">Address</label>
                                    <textarea name="" id="" cols="" rows="3" class="form-control" placeholder="Address"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <button class="btn btn-md w-100 rounded btn-text" style="height: 48px;">Save Changes</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Password -->
                <div class="card">
                    <h5 class="card-header">Password</h5>
                    <div class="card-body">
                        <form action="action" class="user-profile-form">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="Password" class="form-label">Password</label>
                                    <input type="text" class="form-control" placeholder="*********">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="New Password" class="form-label">New Password</label>
                                    <input type="text" class="form-control" placeholder="*********">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Re-New Password" class="form-label">Re-New Password</label>
                                    <input type="text" class="form-control" placeholder="*********">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <button class="btn btn-md w-100 rounded btn-text" style="height: 48px;">Change Password</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(".upProfileLi").addClass("activeClass");
    $(".upProfile").addClass("md-active");
</script>
@endsection