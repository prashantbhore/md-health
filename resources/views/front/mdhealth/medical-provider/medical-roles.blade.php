@extends('front.layout.layout2')
@section('content')
<style>
    .form-select,
    .form-control {
        color: #000;
        font-family: CamptonBook !important;
        font-size: 16px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        letter-spacing: -0.64px;
    }

    .green-plate,
    .black-plate,
    .white-plate {
        height: 63px;
        padding: 0 2rem;
    }

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
        min-width: 200px;
        display: flex;
        align-items: center;
    }

    .multiple-checks .form-check-input {
        margin-top: 0;
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
        font-family: 'Campton';
        font-size: 16px;
        font-weight: 500;
        line-height: normal;
        letter-spacing: -0.64px;
    }

    .roles-card .roles-card-footer {
        display: flex;
        gap: 16px;
        align-items: center;
    }

    .multiple-checks .form-check-label {
        font-size: 15px;
    }

    .form-control::placeholder {
        font-family: "Campton";
    }
    .no-data {
        height: 150px;
        font-family: "CamptonBook";
        color: #979797;
        font-weight: 400;
        letter-spacing: -0.56px;
        font-size: 16px;
        border-radius: 3px;
        border: 1px solid #F6F6F6;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 16px;
        background: #F6F6F6;
    }
</style>
<div class="content-wrapper">
    <div class="container py-100px for-cards">
    <div class="d-flex gap-3">
            <div class="w-292">
                @include('front.includes.sidebar')
            </div>
            <div class="w-761">
                <div class="card mb-4">
                    <div class="form-div">
                        <h5 class="card-header d-flex align-items-center justify-content-between mb-5">
                            <span>Roles</span>
                            <img src="{{ asset('front/assets/img/GoldMember.svg') }}" alt="">
                        </h5>
                        <div class="card-body">
                            <form action="{{ url('roles-add') }}" method="post" id="rolesprivilages">
                                @csrf
                                <input type="hidden" name="id" value="{{ !empty($system_users['id']) ? $system_users['id'] : '' }}">
                                <div class="form-group mb-4">
                                    <label class="form-label mb-3">E-Mail Address</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter E-Mail Address" value="{{ !empty($system_users['email']) ? $system_users['email'] : '' }}">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label mb-3">Phone Number</label>
                                    <input type="text" class="form-control" name="mobile_no" id="mobile_no" placeholder="Enter Phone Number" value="{{ !empty($system_users['mobile_no']) ? $system_users['mobile_no'] : '' }}">
                                </div>

                                <div class="form-group mb-4 {{ !empty($system_users['id']) ? ' d-none' : '' }}">
                                    <label class="form-label mb-3">Enter Password</label>
                                    <input type="text" class="form-control" name="password" id="password" placeholder="**********" value="{{ !empty($system_users['password']) ? $system_users['password'] : '' }}">
                                </div>

                                <div class="form-group mb-4">
                                    <label class="form-label mb-3">Full Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Full Name" value="{{ !empty($system_users['name']) ? $system_users['name'] : '' }}">
                                </div>

                                <div class="form-group d-flex flex-column mb-5">
                                    <label class="form-label mb-3">Role</label>
                                    <select name="roll_id" class="form-select" id="roll_id">
                                        <option value="">Choose Role</option>
                                        <option value="2" {{ !empty($system_users['roll_id']) && $system_users['roll_id'] == 2 ? 'selected' : 'gdfvg' }}>
                                            Super Admin</option>
                                        <option value="3" {{ !empty($system_users['roll_id']) && $system_users['roll_id'] == 3 ? 'selected' : 'dv' }}>
                                            Case Manager</option>
                                        <option value="4" {{ !empty($system_users['roll_id']) && $system_users['roll_id'] == 4 ? 'selected' : 'dv' }}>
                                            Finance</option>
                                    </select>

                                </div>

                                <div class="multiple-checkbox-div mb-5">
                                    <div class="form-group d-flex flex-column">
                                        <div class="multiple-checks">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="fordashboard" {{ !empty($system_users['previlages']) && strpos($system_users['previlages'], 'Dashboard') !== false ? 'checked' : '' }} value="Dashboard">
                                                <label class="form-check-label fw-500 fsb-1" for="fordashboard">Dashboard</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="forsales" {{ !empty($system_users['previlages']) && strpos($system_users['previlages'], 'Sales') !== false ? 'checked' : '' }} value="Sales">
                                                <label class="form-check-label fw-500 fsb-1" for="forsales">Sales</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="forpackages" {{ !empty($system_users['previlages']) && strpos($system_users['previlages'], 'Packages') !== false ? 'checked' : '' }} value="Packages">
                                                <label class="form-check-label fw-500 fsb-1" for="forpackages">Packages</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="forpaymentinfo" {{ !empty($system_users['previlages']) && strpos($system_users['previlages'], 'Payment Information') !== false ? 'checked' : '' }} value="Payment Information">
                                                <label class="form-check-label fw-500 fsb-1" for="forpaymentinfo">Payment Information</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="formessages" {{ !empty($system_users['previlages']) && strpos($system_users['previlages'], 'Messages') !== false ? 'checked' : '' }} value="Messages">
                                                <label class="form-check-label fw-500 fsb-1" for="formessages">Messages</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="forroles" {{ !empty($system_users['previlages']) && strpos($system_users['previlages'], 'Roles') !== false ? 'checked' : '' }} value="Roles">
                                                <label class="form-check-label fw-500 fsb-1" for="forroles">Roles</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="forotherservices" {{ !empty($system_users['previlages']) && strpos($system_users['previlages'], 'Other Services') !== false ? 'checked' : '' }} value="Other Services">
                                                <label class="form-check-label fw-500 fsb-1" for="forotherservices">Other Services</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="foraccount" {{ !empty($system_users['previlages']) && strpos($system_users['previlages'], 'Account') !== false ? 'checked' : '' }} value="Account">
                                                <label class="form-check-label fw-500 fsb-1" for="foraccount">Account</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="forreports" {{ !empty($system_users['previlages']) && strpos($system_users['previlages'], 'Reports') !== false ? 'checked' : '' }} value="Reports">
                                                <label class="form-check-label fw-500 fsb-1" for="forreports">Reports</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="formembership" {{ !empty($system_users['previlages']) && strpos($system_users['previlages'], 'Membership') !== false ? 'checked' : '' }} value="Membership">
                                                <label class="form-check-label fw-500 fsb-1" for="formembership">Membership</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="previlages" id="previlages" value="{{ !empty($system_users['previlages']) ? $system_users['previlages'] : '' }}">

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

                                {{-- <div class="roles-card df-start w-100 mb-3">
                                        <h6 class="mb-0">your-personnel@mail.com | Super Admin</h6>
                                        <div class="roles-card-footer">
                                            <a href="#" class="mt-auto view-detail-btn">
                                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M18.1099 3.4397C18.2009 3.5779 18.2415 3.74329 18.2248 3.90793C18.208 4.07258 18.1349 4.22639 18.0179 4.34341L9.20793 13.1524C9.11781 13.2425 9.00535 13.307 8.8821 13.3393L5.21264 14.2976C5.09134 14.3293 4.96388 14.3286 4.84291 14.2958C4.72194 14.2629 4.61166 14.199 4.52302 14.1104C4.43438 14.0217 4.37046 13.9114 4.33762 13.7905C4.30477 13.6695 4.30413 13.542 4.33577 13.4207L5.2941 9.75224C5.32207 9.64212 5.37485 9.53985 5.44839 9.45324L14.2909 0.616451C14.4257 0.481853 14.6084 0.40625 14.7988 0.40625C14.9893 0.40625 15.172 0.481853 15.3068 0.616451L18.0179 3.32662C18.0523 3.36112 18.0831 3.39901 18.1099 3.4397ZM16.4932 3.83453L14.7988 2.14116L6.63577 10.3042L6.03681 12.5975L8.3301 11.9986L16.4932 3.83453Z"
                                                        fill="#111111" />
                                                    <path
                                                        d="M16.3712 14.6963C16.6331 12.4576 16.7167 10.2016 16.6213 7.94965C16.6192 7.89659 16.6281 7.84368 16.6474 7.79421C16.6667 7.74475 16.696 7.69979 16.7334 7.66215L17.6764 6.71915C17.7022 6.69323 17.7349 6.67531 17.7706 6.66754C17.8063 6.65976 17.8435 6.66246 17.8777 6.67532C17.9119 6.68817 17.9417 6.71063 17.9634 6.74C17.9852 6.76936 17.998 6.80439 18.0003 6.84086C18.1778 9.51579 18.1105 12.2014 17.7991 14.864C17.5729 16.8018 16.0166 18.3207 14.0875 18.5364C10.7384 18.9072 7.35866 18.9072 4.00962 18.5364C2.08145 18.3207 0.524161 16.8018 0.297994 14.864C-0.0993313 11.4671 -0.0993313 8.0355 0.297994 4.63861C0.524161 2.70086 2.08049 1.1819 4.00962 0.966274C6.55147 0.684411 9.11248 0.61613 11.6657 0.762149C11.7023 0.764772 11.7373 0.777813 11.7667 0.799727C11.796 0.82164 11.8185 0.851508 11.8314 0.885793C11.8443 0.920079 11.8471 0.957345 11.8395 0.993179C11.8319 1.02901 11.8141 1.06191 11.7884 1.08798L10.8368 2.03865C10.7995 2.07578 10.755 2.10489 10.7061 2.12417C10.6571 2.14346 10.6047 2.15251 10.5522 2.15077C8.42155 2.07835 6.28849 2.16002 4.16966 2.39515C3.55052 2.46368 2.97256 2.73893 2.52914 3.17643C2.08572 3.61394 1.80274 4.18815 1.72591 4.80632C1.34167 8.09179 1.34167 11.4108 1.72591 14.6963C1.80274 15.3145 2.08572 15.8887 2.52914 16.3262C2.97256 16.7637 3.55052 17.039 4.16966 17.1075C7.38487 17.4669 10.7122 17.4669 13.9284 17.1075C14.5475 17.039 15.1255 16.7637 15.5689 16.3262C16.0123 15.8887 16.2943 15.3145 16.3712 14.6963Z"
                                                        fill="#111111" />
                                                </svg>
                                            </a>
                                            <a href="#" class="mt-auto view-detail-btn">
                                                <svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.57433 12.2245L10.0497 9.75M10.0497 9.75L12.5242 7.2755M10.0497 9.75L7.57433 7.2755M10.0497 9.75L12.5242 12.2245M10.0488 18.5C14.8815 18.5 18.7988 14.5826 18.7988 9.75C18.7988 4.91738 14.8815 1 10.0488 1C5.2162 1 1.29883 4.91738 1.29883 9.75C1.29883 14.5826 5.2162 18.5 10.0488 18.5Z"
                                                        stroke="#F24E1E" stroke-width="0.875" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div> --}}
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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
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
        const bearer_token = '{{ Session::get('
        login_token ') }}';
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