@section('css')
@endsection
@extends('front.layout.layout2')
@section('content')
    <style>
        .no-data {
            border: solid #b8b8b8 1px;
            height: 150px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 20px;
            line-height: 150px;
            font-size: 25px;
            color: #a0a0a0;
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
                        <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                            <span>Packages</span>
                            <img src="{{ asset('front/assets/img/GoldMember.svg') }}" alt="">
                        </h5>
                        <div class="card-body">
                            <div class="white-plate bg-white d-flex align-items-center justify-content-between mb-3">
                                <p class="mb-0 fsb-2 fw-600">Active Packages</p>
                                <h3 class="mb-0 fsb-2 fw-600" id="countsofpack">0</h3>
                            </div>
                            <a href="{{ url('medical-packages-view') }}"
                                class="black-plate bg-black d-flex align-items-center justify-content-between mb-3">
                                <p class="mb-0 fsb-2 fw-600">Add New Packages</p>
                                <h3 class="mb-0 fsb-2 fw-600">+</h3>
                            </a>
                            <div
                                class="green-plate bg-green text-green d-flex align-items-center justify-content-between mb-3">
                                <p class="mb-0 fsb-2 fw-600">Create Campaign</p>
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
                                        <input type="text" name="searchpackage" id="searchpackage" placeholder="Search">
                                    </div>
                                    {{-- <div class="list-div">
                                        <select name="" id="">
                                            <option value="">List for Date</option>
                                            <option value="">List for Stars</option>
                                            <option value="">List for Price</option>
                                            <option value="">List for Distance</option>
                                        </select>
                                    </div> --}}
                                </div>

                                <!-- Tab panes -->
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="user" role="tabpanel"
                                        aria-labelledby="user-tab">
                                        <div id="activelist"></div>
                                        {{-- {!! $html1 !!} --}}
                                        {{-- @foreach ($packages_active_list as $package_active_list)
                                            <div class="treatment-card df-start w-100 mb-3" id="div_{{$package_active_list['id']}}">
                                                <div class="row card-row align-items-center">
                                                    <div class="col-md-2 df-center px-0">
                                                        <img src="{{ asset('front/assets/img/Memorial.svg') }}"
                                                            alt="">
                                                    </div>
                                                    <div class="col-md-6 justify-content-start ps-0">
                                                        <div class="trmt-card-body">
                                                            <h5 class="dashboard-card-title fw-600">Package
                                                                No:{{ !empty($package_active_list['package_unique_no']) ? $package_active_list['package_unique_no'] : '' }}<span
                                                                    class="active">Active</span></h5>
                                                            <h5 class="mb-0 fw-500">
                                                                {{ !empty($package_active_list['package_name']) ? $package_active_list['package_name'] : '' }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                                        <div class="trmt-card-footer footer-btns">
                                                            <a href="{{ url('edit-package/' . Crypt::encrypt($package_active_list['id'])) }}"
                                                                class="view-btn"><i class="fa fa-eye"></i>
                                                                View </a>
                                                            <a href="javascript:void(0);" onclick="change_status('{{ $package_active_list['id'] }}', 'active')" class="close-btn"><i class="fa fa-close"></i>
                                                                Deactivate </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach --}}

                                    </div>
                                    <div class="tab-pane fade" id="medical-provider" role="tabpanel"
                                        aria-labelledby="medical-provider-tab">
                                        <div id="deactivelist"></div>
                                        {{-- {!! $html2 !!} --}}
                                        {{-- @foreach ($packages_deactive_list as $package_deactive_list)
                                            <div class="treatment-card df-start w-100 mb-3" id="div_{{$package_deactive_list['id']}}">
                                                <div class="row card-row align-items-center">
                                                    <div class="col-md-2 df-center px-0">
                                                        <img src="{{ asset('front/assets/img/Memorial.svg') }}"
                                                            alt="">
                                                    </div>
                                                    <div class="col-md-6 justify-content-start ps-0">
                                                        <div class="trmt-card-body">
                                                            <h5 class="dashboard-card-title fw-600">Package No:
                                                                {{ !empty($package_deactive_list['package_unique_no']) ? $package_deactive_list['package_unique_no'] : '' }}<span
                                                                    class="cancel">Deactive</span></h5>
                                                            <h5 class="mb-0 fw-500">
                                                                {{ !empty($package_deactive_list['package_name']) ? $package_deactive_list['package_name'] : '' }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                                        <div class="trmt-card-footer footer-btns">
                                                            <a href="{{ url('edit-package/' . Crypt::encrypt($package_deactive_list['id'])) }}"
                                                                class="view-btn"><i class="fa fa-eye"></i>
                                                                View </a>
                                                                <a href="javascript:void(0);" onclick="change_status('{{ $package_deactive_list['id'] }}', 'deactive')" class="close-btn">
                                                                    <i class="fa fa-close"></i>
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
@endsection
@section('script')
    <script>
        $(".mpPackagesLi").addClass("activeClass");
        $(".mpPackages").addClass("md-active");
    </script>

    <script>
        // $(document).load(function() {
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
                                    $('#activelist').html(response);
                                } else {
                                    $('#deactivelist').html(response);
                                }
                            } else {
                                if (type === 'active') {
                                    $('#activelist').html('<h3>No Data Found</h3>');
                                } else {
                                    $('#deactivelist').html('<h3>No Data Found</h3>');
                                }
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
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
        // });
    </script>

    <script>
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
