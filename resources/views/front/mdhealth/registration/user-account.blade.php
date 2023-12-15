@extends('front.layout.layout')
@section("content")
<style>
    .navbar {
        display: none;
    }
</style>
<div class="content-wrapper">
    <div class="container text-center my-5 registration">
        <h3 class="mb-3 form-heading">Select Account Type</h3>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button" role="tab" aria-controls="user" aria-selected="true">User</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="medical-provider-tab" data-bs-toggle="tab" data-bs-target="#medical-provider" type="button" role="tab" aria-controls="medical-provider" aria-selected="false">Medical Provider</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="vendor-tab" data-bs-toggle="tab" data-bs-target="#vendor" type="button" role="tab" aria-controls="vendor" aria-selected="false">Vendor</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link disabled" id="home-service-tab" data-bs-toggle="tab" data-bs-target="#home-service" type="button" role="tab" aria-controls="home-service" aria-selected="false">Home Service</button>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
                <div class="row pt-4">
                    <div class="col-md-6 bod-right pt-4">
                        <div class="d-flex align-items-center gap-3 pt-5 pb-4">
                            <a href="{{url('/')}}">
                                <img src="{{('front/assets/img/back.svg')}}" alt="">
                            </a>
                            <h1 class="reg-title mb-0">Create User Account</h1>
                        </div>
                        <div class="form text-start px-5">
                <form action="{{ url('api/md-customer-register') }}" method="post" id="myForm">
                    @csrf
                    <input type="hidden" name="platform_type" value="web">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="firstName" class="form-label">*First Name</label>
                                        <input type="text" class="form-control" name="first_name" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="lastName" class="form-label">*Last Name</label>
                                        <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">*E-mail</label>
                                        <input type="text" class="form-control" name="email" placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">*Phone</label>
                                        <input type="text" class="form-control" name="phone" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">*Gender</label>
                                        <input type="text" class="form-control" name="gender" placeholder="Gender">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="country_id" class="form-label">*Country</label>
                                        <select name="country_id" id="country_id" class="form-select">
                                            <option value="">Choose</option>
                                            <option value="1">Istanbul</option>
                                            <option value="2">Ankara</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="address" class="form-label">*Address</label>
                                        <textarea name="address" id="address" cols="" rows="5" class="form-control" placeholder="Enter Address"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">*Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Minimum 8 characters">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="re-password" class="form-label">*Re-Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Minimum 8 characters">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="UserflexCheckDefault">
                                        <label class="form-check-label" for="UserflexCheckDefault">
                                            I accept <a href="#">Terms and Condition</a> & I agree to the <a href="#">User Data Consent</a>.
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center d-flex flex-column gap-3">
                                    <button type="submit" class="btn btn-md w-100" style="height: 47px;">Create Account</button>
                                    <label for="" class="mt-auto">Already have an account?</label>
                                    <a href="#" class="text-black fw-bold">Sign In</a>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>

            </div>
            <div class="tab-pane fade" id="medical-provider" role="tabpanel" aria-labelledby="medical-provider-tab">
                <div class="row pt-4">
                    <div class="col-md-6 bod-right pt-4">
                        <div class="d-flex align-items-center gap-3 pt-5 pb-4">
                            <a href="{{url('/')}}"><img src="{{('front/assets/img/back.svg')}}" alt=""></a>
                            <h1 class="reg-title mb-0">Create Provider Account</h1>
                        </div>
                        <div class="form text-start px-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="CompanyName" class="form-label">*Company Name</label>
                                        <input type="text" class="form-control" placeholder="Company Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="city" class="form-label">*City</label>
                                        <select name="city" id="city" class="form-select">
                                            <option value="">Choose</option>
                                            <option value="">Istanbul</option>
                                            <option value="">Ankara</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">*E-mail</label>
                                        <input type="text" class="form-control" placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">*Phone</label>
                                        <input type="text" class="form-control" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="TAXNumber" class="form-label">*TAX Number</label>
                                        <input type="text" class="form-control" placeholder="TAX Number">
                                    </div>
                                </div>
                                <!-- <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">*Gender</label>
                                        <input type="text" class="form-control" placeholder="Gender">
                                    </div>
                                </div> -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">*Country</label>
                                        <select name="country" id="country" class="form-select">
                                            <option value="">Choose</option>
                                            <option value="">Istanbul</option>
                                            <option value="">Ankara</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="*Company Address" class="form-label">*Company Address</label>
                                        <textarea name="" id="" cols="" rows="5" class="form-control" placeholder="Company Address"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">*Password</label>
                                        <input type="text" class="form-control" placeholder="Minimum 8 characters">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="re-password" class="form-label">*Re-Password</label>
                                        <input type="password" class="form-control" placeholder="Minimum 8 characters">
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="*Upload Company Logo" class="form-label">*Upload Company Logo</label>
                                        <input type="file" class="form-control" placeholder="*Upload Company Logo">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="*Upload Company License" class="form-label">*Upload Company License</label>
                                        <input type="file" class="form-control" placeholder="*Upload Company License">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="UserflexCheckDefault">
                                        <label class="form-check-label" for="UserflexCheckDefault">
                                            I accept <a href="#">Terms and Condition</a> & I agree to the <a href="#">User Data Consent</a>.
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-md w-100" style="height: 47px;">Create Account</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>
            </div>
            <div class="tab-pane fade" id="vendor" role="tabpanel" aria-labelledby="vendor-tab">
                <div class="row pt-4">
                    <div class="col-md-6 bod-right pt-4">
                        <div class="d-flex align-items-center gap-3 pt-5 pb-4">
                            <a href="{{url('/')}}">
                                <img src="{{('front/assets/img/back.svg')}}" alt="">
                            </a>
                            <h1 class="reg-title mb-0">Create Provider Account</h1>
                        </div>
                        <div class="form text-start px-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="CompanyName" class="form-label">*Company Name</label>
                                        <input type="text" class="form-control" placeholder="Company Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="city" class="form-label">*City</label>
                                        <select name="city" id="city" class="form-select">
                                            <option value="">Choose</option>
                                            <option value="">Istanbul</option>
                                            <option value="">Ankara</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">*E-mail</label>
                                        <input type="text" class="form-control" placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">*Phone</label>
                                        <input type="text" class="form-control" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="TAXNumber" class="form-label">*TAX Number</label>
                                        <input type="text" class="form-control" placeholder="TAX Number">
                                    </div>
                                </div>
                                <!-- <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">*Gender</label>
                                        <input type="text" class="form-control" placeholder="Gender">
                                    </div>
                                </div> -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">*Country</label>
                                        <select name="country" id="country" class="form-select">
                                            <option value="">Choose</option>
                                            <option value="">Istanbul</option>
                                            <option value="">Ankara</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="*Company Address" class="form-label">*Company Address</label>
                                        <textarea name="" id="" cols="" rows="5" class="form-control" placeholder="Company Address"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">*Password</label>
                                        <input type="text" class="form-control" placeholder="Minimum 8 characters">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="re-password" class="form-label">*Re-Password</label>
                                        <input type="text" class="form-control" placeholder="Minimum 8 characters">
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="*Upload Company Logo" class="form-label">*Upload Company Logo</label>
                                        <input type="file" class="form-control" placeholder="*Upload Company Logo">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="*Upload Company License" class="form-label">*Upload Company License</label>
                                        <input type="file" class="form-control" placeholder="*Upload Company License">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="UserflexCheckDefault">
                                        <label class="form-check-label" for="UserflexCheckDefault">
                                            I accept <a href="#">Terms and Condition</a> & I agree to the <a href="#">User Data Consent</a>.
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-md w-100" style="height: 47px;">Create Account</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>
            </div>
            <div class="tab-pane fade" id="home-service" role="tabpanel" aria-labelledby="home-service-tab"></div>
        </div>
    </div>

</div>
@endsection
@section('script')
<script>  
  $(document).ready(function() {
    // Validation rules and messages
    $("#myForm").validate({
      rules: {
        first_name: "required",
        last_name: "required",
        email: {
          required: true,
          email: true
        },
        phone: "required",
        gender: "required",
        country_id: "required",
        address: "required",
        password: {
          required: true,
          minlength: 8
        },
        're-password': {
          required: true,
          equalTo: "#password"
        },
        UserflexCheckDefault: "required"
      },
      messages: {
        // Define error messages for each field
      },
      submitHandler: function(form) {
        form.submit();
      }
    });
  });
</script>

@endsection