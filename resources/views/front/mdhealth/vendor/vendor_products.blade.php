@extends('front.layout.layout2')
@section("content")

<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="row">
            <div class="col-md-3">
                @include('front.includes.sidebar-vendor')
            </div>
            <div class="col-md-9">
                <div class="card mb-4">
                    <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                        <span>Products</span>
                        <img src="{{asset('front/assets/img/GoldMember.svg')}}" alt="">
                    </h5>
                    <div class="card-body">
                        <div class="white-plate bg-white d-flex align-items-center justify-content-between mb-3">
                            <p class="mb-0">Active Products</p>
                            <h3 class="mb-0" id="countsofpack">0</h3>
                        </div>
                        <a href="{{url('vendor-add-products')}}" class="black-plate bg-black d-flex align-items-center justify-content-between mb-3">
                            <p class="mb-0">Add New Products</p>
                            <h3 class="mb-0">+</h3>
                        </a>
                        
                        <div>
                            <label for="bulkimport" class="green-plate bg-green text-white d-flex align-items-center justify-content-between mb-3">
                                <input type="file" class="w-100" id="bulkimport" hidden=""> Import in bulk
                                <img src="{{asset('front/assets/img/import.svg')}}" alt="">
                            </label>
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
                                    <button class="nav-link active" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button"
                                        role="tab" aria-controls="user" aria-selected="true">Active</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="medical-provider-tab" data-bs-toggle="tab"
                                        data-bs-target="#medical-provider" type="button" role="tab" aria-controls="medical-provider"
                                        aria-selected="false">Deactive</button>
                                </li>
                            </ul>

                            <div class="filter-div">
                                <div class="search-div">
                                    <input type="text" placeholder="Search" id="searchpackage">
                                </div>
                                {{-- <div class="list-div">
                                    <select name="" id="">
                                        <option value="">List for date</option>
                                        <option value="">List for date 2</option>
                                        <option value="">List for date 3</option>
                                        <option value="">List for date 4</option>
                                    </select>
                                </div> --}}
                            </div>

                            <!-- Tab panes -->
                            <div class="tab-content" id="myTabContent">
                                {{-- ============================ --}}
                                <div id="activelist"></div>
                                {{-- <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
                                    <div class="treatment-card df-start w-100 mb-3">
                                        <div class="row card-row align-items-center">
                                            <div class="col-md-2 df-center px-0">
                                                <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="">
                                            </div>
                                            <div class="col-md-6 justify-content-start ps-0">
                                                <div class="trmt-card-body">
                                                    <h5 class="dashboard-card-title fw-600">Product ID: #MD3726378 <span class="active">Active</span></h5>
                                                    <h5 class="mb-0 fw-500">Product Name</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                                <div class="trmt-card-footer footer-btns">
                                                    <a href="" class="view-btn"><i class="fa fa-eye"></i>
                                                        View </a>
                                                    <a href="" class="close-btn"><i class="fa fa-close"></i>
                                                        Deactivate </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- ============================ --}}
                                <div class="tab-pane fade" id="medical-provider" role="tabpanel" aria-labelledby="medical-provider-tab">
                                    <div id="deactivelist"></div>
                                </div>
                                {{-- <div class="tab-pane fade" id="vendor" role="tabpanel" aria-labelledby="vendor-tab">
                                    <h1>Shubham 2</h1>
                                </div>
                                <div class="tab-pane fade" id="home-service" role="tabpanel" aria-labelledby="home-service-tab">
                                    <h1>Shubham3</h1>
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

 <script type="text/javascript"
     src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
<script>
    $(".mpProductsLi").addClass("activeClass");
    $(".mpProducts").addClass("md-active");
</script>

<script>
    $(document).ready(function() {
        var base_url = $('#base_url').val();
        const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const bearer_token = '{{ Session::get('login_token') }}';

        // Function to fetch count for active packages
        function fetchActiveCount() {
            $.ajax({
                url: base_url + '/api/active-product-count',
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Authorization': 'Bearer ' + bearer_token
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#countsofpack').text(response.active_product_count);
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
                url: base_url + '/api/inactive-product-count',
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Authorization': 'Bearer ' + bearer_token
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#countsofpack').text(response.inactive_product_count);
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
                url: base_url + '/md-vendor-active-list',
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Authorization': 'Bearer ' + bearer_token
                },
                success: function(response) {
                    // if (response.status == 200) {
                    $('#deactivelist').hide();
                    $('#activelist').html(response);
                    $('#activelist').show();
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
                url: base_url + '/md-vendor-deactive-list',
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Authorization': 'Bearer ' + bearer_token
                },
                success: function(response) {
                    // if (response.status == 200) {
                    $('#activelist').hide();
                    $('#deactivelist').html(response);
                    $('#deactivelist').show();
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
            var search_query = $(this).val().trim();
            var type = $('.nav-link[aria-selected="true"]').attr('aria-controls') === 'user' ?
                'active' : 'deactive';

            if (search_query) {
                var url = (type === 'active') ? base_url + '/vendor-active-product-search' :
                    base_url + '/vendor-inactive-product-search';

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        search_query: search_query
                    },
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'Authorization': 'Bearer ' + bearer_token
                    },
                    success: function(response) {
                        // console.log(response);
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
                                $('#activelist').html('<h3>No Data Found</h3>');
                            } else {
                                $('#deactivelist').html('<h3>No Data Found</h3>');
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        if (type === 'active') {
                                $('#activelist').html('<h3>No Data Found</h3>');
                            } else {
                                $('#deactivelist').html('<h3>No Data Found</h3>');
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
</script>

<script>
    function change_status(id, type) {
        var base_url = $('#base_url').val();
        const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const bearer_token = '{{ Session::get('login_token') }}';

        var url = '';

        if (type === 'active') {
            url = base_url + '/api/md-vendor-product-active-to-deactive';
        } else {
            url = base_url + '/api/md-vendor-product-deactive-to-active';
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

{{-- <script>
    $(document).ready(function() {
        $('#searchpackage').on('keyup', function() {
            var package = $(this).val();
            // alert(package);
            const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute(
                'content');
            const bearer_token = '{{ Session::get('login_token') }}';

            var url = '';

            if (type === 'active') {
                url = base_url + '/api/vendor-active-product-search';
            } else {
                url = base_url + '/api/vendor-inactive-product-search';
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
</script> --}}

@endsection