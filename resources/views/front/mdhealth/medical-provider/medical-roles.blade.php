@extends('front.layout.layout2')
@section('content')
    <style>
        .payment-card {
            padding: 25px;
            border-radius: 5px;
        }

        .payment-card h5 {
            font-weight: 900;
            line-height: 20px;
            font-size: 23px;
            margin-bottom: 0;
        }

        .payment-card h6 {
            line-height: 15px;
            font-size: 13px;
            font-weight: 600 !important;
        }

        .multiple-checkbox-div .multiple-checks {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .multiple-checkbox-div .multiple-checks .form-check {
            width: 189px;
        }

        .roles-card {
            padding: 15px;
            border: 2px solid #D6D6D6;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: baseline;
        }

        .roles-card h6 {
            color: #878787;
        }

        .roles-card .roles-card-footer {
            display: flex;
            gap: 7px;
        }
    </style>
    <div class="content-wrapper">
        <div class="container py-100px for-cards">
            <div class="row">
                <div class="col-md-3">
                    @include('front.includes.sidebar')
                </div>
                <div class="col-md-9">
                    <div class="card mb-4">
                        <div class="form-div">
                            <h5 class="card-header d-flex align-items-center justify-content-between mb-4">
                                <span>Roles</span>
                                <img src="{{ asset('front/assets/img/GoldMember.svg') }}" alt="">
                            </h5>
                            <div class="card-body">
                                <form action="{{ url('roles-add') }}" method="post" id="rolesprivilages">
                                    @csrf
                                    <input type="hidden" name="id"
                                        value="{{ !empty($system_users['id']) ? $system_users['id'] : '' }}">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Your Personnel E-Mail Address</label>
                                        <input type="text" class="form-control" name="email" id="email"
                                            placeholder="your-personnel@mail.com"
                                            value="{{ !empty($system_users['email']) ? $system_users['email'] : '' }}">
                                    </div>

                                    <div class="form-group mb-3{{ !empty($system_users['id']) ? ' d-none' : '' }}">
                                        <label class="form-label">Enter Password</label>
                                        <input type="text" class="form-control" name="password" id="password"
                                            placeholder="Password@2023"
                                            value="{{ !empty($system_users['password']) ? $system_users['password'] : '' }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label">Your Personnel Full Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Full Name"
                                            value="{{ !empty($system_users['name']) ? $system_users['name'] : '' }}">
                                    </div>

                                    <div class="form-group d-flex flex-column mb-5">
                                        <label class="form-label">Role</label>
                                        <select name="roll_id" id="roll_id">
                                            <option value="">Choose Role</option>
                                            <option value="2"
                                                {{ !empty($system_users['roll_id']) && $system_users['roll_id'] == 2 ? 'selected' : 'gdfvg' }}>
                                                Super Admin</option>
                                            <option value="3"
                                                {{ !empty($system_users['roll_id']) && $system_users['roll_id'] == 3 ? 'selected' : 'dv' }}>
                                                Case Manager</option>
                                            <option value="4"
                                                {{ !empty($system_users['roll_id']) && $system_users['roll_id'] == 4 ? 'selected' : 'dv' }}>
                                                Finance</option>
                                        </select>

                                    </div>

                                    <div class="multiple-checkbox-div mb-5">
                                        <div class="form-group d-flex flex-column">
                                            <div class="multiple-checks">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="fordashboard"
                                                        {{ !empty($system_users['previlages']) && strpos($system_users['previlages'], 'Dashboard') !== false ? 'checked' : '' }}
                                                        value="Dashboard">
                                                    <label class="form-check-label fw-500 fsb-1"
                                                        for="fordashboard">Dashboard</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="forsales"
                                                        {{ !empty($system_users['previlages']) && strpos($system_users['previlages'], 'Sales') !== false ? 'checked' : '' }}
                                                        value="Sales">
                                                    <label class="form-check-label fw-500 fsb-1"
                                                        for="forsales">Sales</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="forpackages"
                                                        {{ !empty($system_users['previlages']) && strpos($system_users['previlages'], 'Packages') !== false ? 'checked' : '' }}
                                                        value="Packages">
                                                    <label class="form-check-label fw-500 fsb-1"
                                                        for="forpackages">Packages</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="forpaymentinfo"
                                                        {{ !empty($system_users['previlages']) && strpos($system_users['previlages'], 'Payment Information') !== false ? 'checked' : '' }}
                                                        value="Payment Information">
                                                    <label class="form-check-label fw-500 fsb-1"
                                                        for="forpaymentinfo">Payment Information</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="formessages"
                                                        {{ !empty($system_users['previlages']) && strpos($system_users['previlages'], 'Messages') !== false ? 'checked' : '' }}
                                                        value="Messages">
                                                    <label class="form-check-label fw-500 fsb-1"
                                                        for="formessages">Messages</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="forroles"
                                                        {{ !empty($system_users['previlages']) && strpos($system_users['previlages'], 'Roles') !== false ? 'checked' : '' }}
                                                        value="Roles">
                                                    <label class="form-check-label fw-500 fsb-1"
                                                        for="forroles">Roles</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="forotherservices"
                                                        {{ !empty($system_users['previlages']) && strpos($system_users['previlages'], 'Other Services') !== false ? 'checked' : '' }}
                                                        value="Other Services">
                                                    <label class="form-check-label fw-500 fsb-1"
                                                        for="forotherservices">Other Services</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="foraccount"
                                                        {{ !empty($system_users['previlages']) && strpos($system_users['previlages'], 'Account') !== false ? 'checked' : '' }}
                                                        value="Account">
                                                    <label class="form-check-label fw-500 fsb-1"
                                                        for="foraccount">Account</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="forreports"
                                                        {{ !empty($system_users['previlages']) && strpos($system_users['previlages'], 'Reports') !== false ? 'checked' : '' }}
                                                        value="Reports">
                                                    <label class="form-check-label fw-500 fsb-1"
                                                        for="forreports">Reports</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="formembership"
                                                        {{ !empty($system_users['previlages']) && strpos($system_users['previlages'], 'Membership') !== false ? 'checked' : '' }}
                                                        value="Membership">
                                                    <label class="form-check-label fw-500 fsb-1"
                                                        for="formembership">Membership</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="previlages" id="previlages"
                                        value="{{ !empty($system_users['previlages']) ? $system_users['previlages'] : '' }}">

                                    <div class="section-btns mb-5">
                                        <button class="btn save-btn-black">Save
                                            Personnel</button>
                                    </div>
                                </form>
                                <div class="white-plate d-flex align-items-center mb-3 border-0 bg-f6">
                                    <p class="mb-0 fsb-1">Your Personnels</p>
                                </div>

                                <div class="roles-history-list">
                                    {!! !empty($html) ? $html : '' !!}

                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>

    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
    <script>
        $(".mpRolesLi").addClass("activeClass");
        $(".mpRoles").addClass("md-active");
    </script>

    <script>
        // $(document).ready(function() {
        function updateCheckedValues() {
            const checkedValues = $('.form-check-input:checked').map(function() {
                return $(this).val();
            }).get().join(', ');
            // $('#checkedValues').text(checkedValues);
            $('#previlages').val(checkedValues);
        }
        $('.form-check-input').change(updateCheckedValues);
        updateCheckedValues();
        // });
    </script>

    <script>
        function delete_role(id) {
            // alert(id);
            // Get the CSRF token from the meta tag
            var base_url = $('#base_url').val();
            const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const bearer_token = '{{ Session::get('login_token') }}';
            // Your AJAX call
            $.ajax({
                url: base_url + '/api/md-provider-system-user-delete',
                type: 'POST',
                data: {
                    id: id,
                },
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Authorization': 'Bearer ' + bearer_token
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#div_' + id).css('display', 'none');
                        toastr.options = {
                            "positionClass": "toast-bottom-right",
                            "timeOut": "5000",
                        };
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                    console.log('Success:', response.message);
                },
                error: function(xhr) {
                    console.error('Error:', xhr);
                }
            });

        }
    </script>

    <script>
        $(document).ready(function() {
            $('#rolesprivilages').validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 8 // Example: Minimum 8 characters
                    },
                    name: {
                        required: true
                    },
                    roll_id: {
                        required: true
                    }
                    // Define rules for other fields here
                },
                messages: {
                    email: {
                        required: "Please enter your email",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        required: "Please enter a password",
                        minlength: "Password must be at least 8 characters long" // Example: Custom message for minlength
                    },
                    name: {
                        required: "Please enter your full name"
                    },
                    roll_id: {
                        required: "Please choose a role"
                    }
                    // Define custom messages for other fields here
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });

            $('#submitBtn').click(function() {
                $('#rolesprivilages').valid();
            });
        });
    </script>
@endsection
