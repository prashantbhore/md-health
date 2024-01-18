@php
@endphp
@extends('front.layout.layout2')
@section('content')
<style>
      .mdi-eye-off::before,
    .mdi-eye::before {
        font-size: 19px;
    }

</style>
<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="d-flex gap-3">
            <div class="w-292">
            @include('front.includes.sidebar-user')
            </div>
            <div class="w-761">
                <div class="card mb-4">
                    <h5 class="card-header mb-3">Your Profile</h5>
                    <div class="card-body">
                        <form action="{{ url('update-customer-profile') }}" class="user-profile-form" method="post" id="updatecustpro">
                            <div class="row gx-5 gy-4">
                                @csrf
                                <div class="col-md-6">
                                    <label for="First Name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ !empty($customer_list) ? ($customer_list->first_name ? $customer_list->first_name : '') : '' }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="Last Name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ !empty($customer_list) ? ($customer_list->last_name ? $customer_list->last_name : '') : '' }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="City" class="form-label">Date of Birth</label>
                                    @if (!empty($customer_list))
                                    <input type="text" class="form-control" placeholder="Date of Birth" name="date_of_birth" value="{{ $customer_list->date_of_birth ? $customer_list->date_of_birth : '' }}">
                                    @else
                                    <input type="text" class="form-control" placeholder="Date of Birth" name="date_of_birth" value="">
                                    @endif

                                </div>
                                <div class="col-md-6">
                                    <label for="Country" class="form-label">Gender</label>
                                    <select name="gender" id="gender" class="form-select">
                                        {{-- <option value="" disabled>Choose</option> --}}
                                        @if (!empty($customer_list))
                                        <option value="Male" {{ $customer_list->gender == 'Male' ? 'selected' : '' }}>
                                            Male
                                        </option>
                                        <option value="Female" {{ $customer_list->gender == 'Female' ? 'selected' : '' }}>
                                            Female</option>
                                        <option value="Preffered Not To Say" {{ $customer_list->gender == 'Preffered Not To Say' ? 'selected' : '' }}>
                                            Preffered Not To Say</option>
                                        @else
                                        <option value="Male"> Male </option>
                                        <option value="Female">Female</option>
                                        <option value="Preffered Not To Say">Preffered Not To Say</option>

                                        @endif


                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="E-mail" class="form-label">E-mail</label>
                                    <input type="text" class="form-control" placeholder="E-mail" name="email" value="{{ !empty($customer_list) ? ($customer_list->email ? $customer_list->email : '') : '' }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="Phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{ !empty($customer_list) ? ($customer_list->phone ? $customer_list->phone : '') : '' }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="Country" class="form-label">Country</label>
                                    <select name="country_id" id="country_id" class="form-select">
                                        {{-- <option value="" disabled>Choose</option> --}}

                                        @if (!empty($countries))
                                        @foreach ($countries as $country)
                                        @if (!empty($customer_list))
                                        <option value="{{ $country->id }}" {{ $country->id == $customer_list->country_id ? 'selected' : '' }}>
                                            {{ $country->country_name }}
                                        </option>
                                        @else
                                        <option value="{{ $country->id }}">
                                            {{ $country->country_name }}
                                        </option>
                                        @endif
                                        @endforeach
                                        @else
                                        <option value="" disabled>Choose</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="City" class="form-label">City</label>
                                    <select name="city_id" id="city_id" class="form-select">
                                        {{-- <option value="" disabled>Choose</option> --}}
                                        @if (!empty($cities))
                                        @foreach ($cities as $city)
                                        @if (!empty($customer_list))
                                        <option value="{{ $city->id }}" {{ $city->id == $customer_list->city_id ? 'selected' : '' }}>
                                            {{ $city->city_name }}
                                        </option>
                                        @else
                                        <option value="{{ $city->id }}">
                                            {{ $city->city_name }}
                                        </option>
                                        @endif
                                        @endforeach
                                        @else
                                        <option value="" disabled>Choose</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="col-md-12 mb-4">
                                    <label for="Address" class="form-label">Address</label>
                                    <textarea name="address" id="" cols="" rows="3" class="form-control" placeholder="Address"> {{ !empty($customer_list) ? ($customer_list->address ? $customer_list->address : '') : '' }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-md w-100 rounded btn-text submit" type="submit" style="height: 48px;">Save Changes</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Password -->
                <div class="card">
                    <h5 class="card-header mb-4">Password</h5>
                    <div class="card-body">
                        <form action="{{ url('reset-customer-password') }}" class="user-profile-form" id="changePasswordForm" method="post">
                            <div class="row gx-5 gy-4">
                                @csrf
                                <div class="col-md-12 position-relative">
                                <div class="hide-eye-div">
                                    <label for="oldPassword" class="form-label">Old Password</label>
                                    <input type="password" class="form-control w-100 bg-white text-start md-pad" placeholder="*********" name="oldPassword" id="oldPassword">
                                    <span toggle="#oldPassword" class="mdi mdi-eye field-icon toggle-password"></span>
                                </div>
                                </div>
                                <div class="col-md-6 mb-4 position-relative">
                                    <div class="hide-eye-div">
                                        <label for="newPassword" class="form-label">New Password</label>
                                        <input type="password" class="form-control" placeholder="*********" name="newPassword" id="newPassword">
                                        <span toggle="#newPassword" class="mdi mdi-eye field-icon toggle-password"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 position-relative">
                                    <div class="hide-eye-div">
                                        <label for="confirmPassword" class="form-label">Re-New Password</label>
                                        <input type="password" class="form-control" placeholder="*********" name="confirmPassword" id="confirmPassword">
                                        <span toggle="#confirmPassword" class="mdi mdi-eye field-icon toggle-password"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-md w-100 rounded btn-text" id="passchange" style="height: 48px;">Change Password</button>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


<script>
    var base_url = $('#base_url').val();
    $("#changePasswordForm").validate({
        ignore: ".note-editor *",
        debug: false,
        rules: {
            newPassword: {
                required: true,
                minlength: 8,
                // maxlength: 20,
                notEqualTo: "#oldPassword",
            },
            oldPassword: {
                required: true,
                remote: {
                    url: base_url + "/md-check-password-exist",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    type: "post",
                    data: {
                        password: function() {
                            return $("#oldPassword").val();
                        },
                    },
                },
            },
            confirmPassword: {
                required: true,
                minlength: 8,
                // maxlength: 20,
                equalTo: "#newPassword",
            },
        },
        messages: {
            newPassword: {
                required: "* Please enter new password.",
                minlength: "* Password must contain atleast 8 characters.",
                // maxlength: "* Password must not be longer than 20 characters.",
                notEqualTo: "* New password and old password should not match.",
            },
            oldPassword: {
                required: "* Please enter old password.",
                remote: "* Please enter correct old password."
            },
            confirmPassword: {
                required: "* Please confirm new password.",
                minlength: "* Password must contain atleast 8 characters.",
                // maxlength: "* Password must not be longer than 20 characters.",
                equalTo: "* New password and confirm password should match.",
            },
        },
        submitHandler: function(form) {
            // Disable the submit button to prevent multiple submissions
            $("#passchange").attr("disabled", true);
            // Submit the form
            form.submit();
        },
    });
</script>

<script>
    $(document).ready(function() {
        $("#updatecustpro").validate({
            rules: {
                first_name: {
                    required: true,
                    minlength: 1,
                    nowhitespace: true,
                },
                last_name: {
                    required: true,
                    minlength: 1,
                    nowhitespace: true,
                },
                email: {
                    required: true,
                    email: true,
                    nowhitespace: true,
                },
                phone: {
                    required: true,
                    minlength: 1,
                    nowhitespace: true,
                },
                country_id: {
                    required: true,
                },
                city_id: {
                    required: true,
                },
                gender: {
                    required: true,
                },
                date_of_birth: {
                    required: true,
                },
                address: {
                    required: true,
                    minlength: 1,
                    // nowhitespace: true,
                },
            },
            messages: {
                first_name: {
                    required: "Please enter your first name",
                    minlength: "First name must contain at least 1 character",
                    nowhitespace: "Spaces are not allowed",
                },
                last_name: {
                    required: "Please enter your last name",
                    minlength: "Last name must contain at least 1 character",
                    nowhitespace: "Spaces are not allowed",
                },
                email: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email address",
                    nowhitespace: "Spaces are not allowed",
                },
                phone: {
                    required: "Please enter your phone number",
                    minlength: "Phone number must contain at least 1 character",
                    nowhitespace: "Spaces are not allowed",
                },
                country_id: {
                    required: "Please select your country",
                },
                city_id: {
                    required: "Please select your city",
                },
                gender: {
                    required: "Please select your gender",
                },
                date_of_birth: {
                    required: "Please enter your date of birth",
                },
                address: {
                    required: "Please enter your address",
                    minlength: "Address must contain at least 1 character",
                    nowhitespace: "Spaces are not allowed",
                },
            },
            submitHandler: function(form) {
                form.submit();
            },
        });

        // Custom method to disallow whitespace
        $.validator.addMethod("nowhitespace", function(value, element) {
            return this.optional(element) || /^\S+$/i.test(value);
        }, "Spaces are not allowed");


        // $(function() {
        //     $('input[name="date_of_birth"]').daterangepicker({
        //         opens: 'left',
        //         singleDatePicker: true,
        //         showDropdowns: true,
        //         locale: {
        //             format: 'DD/MM/YYYY'
        //         }
        //         // $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
        //     }, function(start, end, label) {});
        // });
        $(function() {
    var dateOfBirth = "{{ $customer_list->date_of_birth ? $customer_list->date_of_birth : '' }}";

    // Convert string to Date object
    var startDate = dateOfBirth ? new Date(dateOfBirth) : null;

    $('input[name="date_of_birth"]').daterangepicker({
        opens: 'left',
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'DD-MMM-YYYY'
        },
        startDate: startDate // Set the initial date
    }, function(start, end, label) {});
});

    });
</script>
<script>
   
</script>


@endsection