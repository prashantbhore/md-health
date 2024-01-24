@section('css')
    @endsection @extends('front.layout.layout2') @section('content')
    <style>
        .no-data {
            height: 150px;
            font-family: "CamptonBook";
            color: #979797;
            font-weight: 400;
            letter-spacing: -0.56px;
            font-size: 16px;
            border-radius: 3px;
            /* border: 1px solid #f6f6f6; */
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            /* background: #f6f6f6; */
        }

        .trmt-card-body .dashboard-card-title {
            font-size: 16px
        }

        .status-label {
            width: 94px !important;
            height: 19px !important;
            flex-shrink: 0;
            color: #000;
            text-align: center;
            font-family: Campton;
            font-size: 10px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            letter-spacing: -0.4px;
            padding: unset !important;
        }
    </style>
    <style>
        .no-data {
            height: 362px;
            font-family: "CamptonBook";
            color: #979797;
            font-weight: 400;
            letter-spacing: -0.56px;
            font-size: 16px;
            border-radius: 3px;
            /* border: 1px solid #F6F6F6; */
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            /* background: #F6F6F6; */
        }

        .no-data img {
            width: 150px;
            height: auto;
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
                        <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                            <span>Packages</span>
                            <img src="{{ asset('front/assets/img/GoldMember.svg') }}" alt="" />
                        </h5>
                        <div class="card-body">
                            <div class="white-plate bg-white d-flex align-items-center justify-content-between mb-3">
                                <p class="my-0" id="packname">Active Packages</p>
                                <h3 class="my-0" id="countsofpack">0</h3>
                            </div>
                            <a href="{{ url('medical-packages-view') }}"
                                class="black-plate bg-black d-flex align-items-center justify-content-between mb-3">
                                <p class="my-0">Add New Packages</p>
                                <h3 class="my-0">+</h3>
                            </a>
                            <div id="compaign"
                                class="green-plate bg-green text-green d-flex align-items-center justify-content-between mb-3">
                                <p class="my-0">Create Campaign</p>
                            </div>
                        </div>
                    </div>

                    <!-- RECENT TRETMENTS -->
                    <div class="card">
                        <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                            Details
                        </h5>
                        <div class="card-body">
                            <div class="tab-div">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="user-tab" data-bs-toggle="tab"
                                            data-bs-target="#user" type="button" role="tab" aria-controls="user"
                                            aria-selected="true">Active</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="medical-provider-tab" data-bs-toggle="tab"
                                            data-bs-target="#medical-provider" type="button" role="tab"
                                            aria-controls="medical-provider" aria-selected="false">Deactive</button>
                                    </li>
                                </ul>

                                <div class="filter-div">
                                    <div class="search-div">
                                        <input type="text" name="searchpackage" id="searchpackage"
                                            placeholder="Search" />
                                    </div>
                           
                                <!-- <div class="list-div">
                                    <select name="" id="">
                                        <option value="">List for date</option>
                                        <option value="">List for Stars</option>
                                        <option value="">List for Price</option>
                                        <option value="">List for Distance</option>
                                    </select>
                                </div> -->
                               
                                </div>

                                <!-- Tab panes -->
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="user" role="tabpanel"
                                        aria-labelledby="user-tab">
                                        <div id="activelist"></div>
                                        {{-- {!! $html1 !!} --}} {{-- @foreach ($packages_active_list as $package_active_list)
                                    <div class="card shadow-none mb-4 pkgCard mb-4" id="div_{{$package_active_list['id']}}">
                                        <div class="card-body d-flex gap-3 w-100 p-4">
                                            <div class="df-center">
                                                <img src="{{ asset('front/assets/img/Memorial.svg') }}" alt="" />
                                            </div>
                                            <div class="df-column">
                                                <h5 class="mb-0">Package No:{{ !empty($package_active_list['package_unique_no']) ? $package_active_list['package_unique_no'] : '' }}<span class="active camptonBold">Active</span></h5>
                                                <h5 class="card-p1">
                                                    {{ !empty($package_active_list['package_name']) ? $package_active_list['package_name'] : '' }}
                                                </h5>
                                            </div>
                                            <div class="ms-auto pkgMsg">
                                                <div class="trmt-card-footer footer-btns">
                                                    <a href="{{ url('edit-package/' . Crypt::encrypt($package_active_list['id'])) }}" class="view-btn">
                                                    <img src="{{ asset('front/assets/img/view.png') }}" alt="" /> View </a>
                                                    <a href="javascript:void(0);" onclick="change_status('{{ $package_active_list['id'] }}', 'active')" class="close-btn">
                                                    <img src="{{ asset('front/assets/img/reject.png') }}" alt="" /> Deactivate </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach --}}
                                    </div>
                                    <div class="tab-pane fade" id="medical-provider" role="tabpanel"
                                        aria-labelledby="medical-provider-tab">
                                        <div id="deactivelist"></div>
                                        {{-- {!! $html2 !!} --}} {{-- @foreach ($packages_deactive_list as $package_deactive_list)
                                    <div class="card shadow-none mb-4 pkgCard w-100" id="div_{{$package_deactive_list['id']}}">
                                        <div class="card-body d-flex gap-3 w-100 p-4">
                                            <div class="df-center">
                                                <img src="{{ asset('front/assets/img/Memorial.svg') }}" alt="" />
                                            </div>
                                            <div class="df-coloumn">
                                                    <h5 class="mb-0">
                                                        Package No: {{ !empty($package_deactive_list['package_unique_no']) ? $package_deactive_list['package_unique_no'] : '' }}<span class="cancel status-label df-center">Deactive</span>
                                                    </h5>
                                                    <h5 class="card-h1 d-inline-block">
                                                        {{ !empty($package_deactive_list['package_name']) ? $package_deactive_list['package_name'] : '' }}
                                                    </h5>
                                            </div>
                                            <div class="ms-auto pkgMsg">
                                                <div class="trmt-card-footer footer-btns">
                                                    <a href="{{ url('edit-package/' . Crypt::encrypt($package_deactive_list['id'])) }}" class="view-btn">
                                                        <img src="{{('front/assets/img/view.png')}}" alt="" />
                                                        View
                                                    </a>
                                                    <a href="javascript:void(0);" onclick="change_status('{{ $package_deactive_list['id'] }}', 'deactive')" class="close-btn">
                                                        <img src="{{('front/assets/img/re-activate.png')}}" alt="" />
                                                        Activate
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection @section('script')
    <script>
        $(".mpPackagesLi").addClass("activeClass");
        $(".mpPackages").addClass("md-active");
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>

    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {
            var base_url = $('#base_url').val();
            const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const bearer_token = '{{ Session::get('login_token') }}';

            // Function to fetch count for active packages
            function fetchActiveCount() {
                $.ajax({
                    url: base_url + '/api/md-packages-active-list',
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'Authorization': 'Bearer ' + bearer_token
                    },
                    success: function(response) {
                        if (response.status == 200) {
                            $('#countsofpack').text(response.packages_active_list.length);
                            $('#packname').text("Active Packages");
                            $('#compaign').removeClass("d-none");
                            // console.log('Active tab API response:', response.packages_active_list.length);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        // Handle errors
                    }
                });
            }

            // Function to fetch count for deactive packages
            function fetchDeactiveCount() {
                $.ajax({
                    url: base_url + '/api/md-packages-deactive-list',
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'Authorization': 'Bearer ' + bearer_token
                    },
                    success: function(response) {
                        if (response.status == 200) {
                            $('#countsofpack').text(response.packages_deactive_list.length);
                            $('#packname').text("Deactive Packages");
                            $('#compaign').addClass("d-none");
                            // console.log('Deactive tab API response:', response.packages_deactive_list.length);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        // Handle errors
                    }
                });
            }


            // Function to fetch count for active packages
            function fetchActiveDiv() {
                $.ajax({
                    url: base_url + '/md-packages-active-list',
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'Authorization': 'Bearer ' + bearer_token
                    },
                    success: function(response) {
                        // if (response.status == 200) {
                        $('#activelist').html(response);
                        console.log('Active tab API response:', response);
                        // }
                        fetchActiveCount();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        // Handle errors
                    }
                });
            }

            // Function to fetch count for deactive packages
            function fetchDeactiveDiv() {
                $.ajax({
                    url: base_url + '/md-packages-deactive-list',
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'Authorization': 'Bearer ' + bearer_token
                    },
                    success: function(response) {
                        // if (response.status == 200) {
                        $('#deactivelist').html(response);
                        console.log('Deactive tab API response:', response);
                        // }
                        fetchDeactiveCount();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        // Handle errors
                    }
                });
            }

            // Fetch counts for active and deactive tabs on page load
            // fetchDeactiveCount();
            fetchActiveCount();
            fetchActiveDiv();

            // Event listener for tab button clicks
            $('.nav-link').click(function() {
                if ($(this).attr('aria-selected') === 'true') {
                    var tabId = $(this).attr('aria-controls');
                    if (tabId === 'user') {
                        fetchActiveCount();
                        fetchActiveDiv();
                    } else if (tabId === 'medical-provider') {
                        fetchDeactiveCount();
                        fetchDeactiveDiv();
                    }
                }
            });
            // Search package function
            $('#searchpackage').on('keyup', function() {
                var package = $(this).val().trim();
                var type = $('.nav-link[aria-selected="true"]').attr('aria-controls') === 'user' ?
                    'active' : 'deactive';

                if (package) {
                    var url = (type === 'active') ? base_url + '/md-packages-active-list-search' :
                        base_url + '/md-packages-inactive-list-search';

                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            package_name: package
                        },
                        headers: {
                            'X-CSRF-TOKEN': token,
                            'Authorization': 'Bearer ' + bearer_token
                        },
                        success: function(response) {
                            if (response) {
                                if (type === 'active') {
                                    $('#activelist').hide();
                                    $('#deactivelist').hide();
                                    $('#activelist').html(response);
                                    $('#activelist').show();
                                } else {
                                    $('#deactivelist').hide();
                                    $('#activelist').hide();
                                    $('#deactivelist').html(response);
                                    $('#deactivelist').show();
                                }
                            } else {
                                if (type === 'active') {
                                    $('#activelist').html('<div class="no-data">\
        <img src="{{ asset('front/assets/img/No-Data-Found-1.svg') }}" alt="" class="">\
    </div>');
                                } else {
                                    $('#deactivelist').html('<div class="no-data">\
        <img src="{{ asset('front/assets/img/No-Data-Found-1.svg') }}" alt="" class="">\
    </div>');
                                }
                            }
                        },
                        error: function(xhr, status, error) {
                            if (type === 'active') {
                                $('#activelist').html('<div class="no-data">\
        <img src="{{ asset('front/assets/img/No-Data-Found-1.svg') }}" alt="" class="">\
    </div>');
                            } else {
                                $('#deactivelist').html('<div class="no-data">\
        <img src="{{ asset('front/assets/img/No-Data-Found-1.svg') }}" alt="" class="">\
    </div>');
                            }
                        }
                    });
                } else {
                    if (type === 'active') {
                        fetchActiveDiv();
                    } else {
                        fetchDeactiveDiv();
                    }
                }
            });
        });



        function change_status(id, type) {
            var base_url = $('#base_url').val();
            const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const bearer_token = '{{ Session::get('login_token') }}';

            var url = '';

            if (type === 'active') {
                url = base_url + '/api/md-activate-to-deactivate-packages';
            } else {
                url = base_url + '/api/md-deactivate-to-activate-packages';
            }
            // alert(type);
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    id: id,
                },
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Authorization': 'Bearer ' + bearer_token
                },
                success: function(response) {
                    if (response.status === 200) {
                        toastr.options = {
                            "positionClass": "toast-bottom-right",
                            "timeOut": "5000",
                        };

                        toastr.success(response.message);

                        // Move the package to the corresponding tab
                        movePackageToTab(id, type);
                    } else {
                        toastr.error(response.message);
                    }

                },
                error: function(xhr) {
                    console.error('Error:', xhr);
                }
            });
            if (type == 'active') {
                var val = $('#countsofpack').text();
                value = val - 1;
                var val = $('#countsofpack').text(value);
            } else {
                var val = $('#countsofpack').text();
                value = val - 1;
                var val = $('#countsofpack').text(value);
            }
        }

        function movePackageToTab(id, type) {
            var sourceTabId = type === 'active' ? '#user' : '#medical-provider';
            var targetTabId = type === 'active' ? '#medical-provider' : '#user';
            $('#div_' + id).remove();
            // Find the package element in the source tab
            var packageElement = $('#' + sourceTabId + ' #div_' + id);

            // Remove existing tab-pane fade classes
            packageElement.removeClass('tab-pane fade show active').addClass('tab-pane fade');

            // Remove existing card status classes
            packageElement.find('.active, .cancel').removeClass('active cancel');

            // Update card status based on type
            var statusClass = type === 'active' ? 'active' : 'cancel';
            packageElement.find('.dashboard-card-title span').addClass(statusClass);

            // Detach the package element and append it to the target tab
            $(targetTabId + ' .tab-content').append(packageElement.detach());
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#searchpackage').on('keyup', function() {
                var package = $(this).val();
                // alert(package);
                const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute(
                    'content');
                const bearer_token = '{{ Session::get('login_token') }}';


                var url = '';

                if (type === 'active') {
                    url = base_url + '/api/md-packages-active-list-search';
                } else {
                    url = base_url + '/api/md-packages-inactive-list-search';
                }
                if (package) {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            package_name: package
                        },
                        headers: {
                            'X-CSRF-TOKEN': token,
                            'Authorization': 'Bearer ' + bearer_token
                        },
                        success: function(response) {
                            console.log(response);

                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {

                }
            });
        });
    </script>
@endsection
