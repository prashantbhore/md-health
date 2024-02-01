@section('php')
    @php
        // echo '<pre>';
        // print_r($fav_list);
        // die();
    @endphp
@endsection
@extends('front.layout.layout2')
@section('content')
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
                    @include('front.includes.sidebar-user')
                </div>
                <div class="w-761">
                    <div class="card panel-right mb-4">
                        <h5 class="card-header">
                            <span>My Favourites</span>
                        </h5>
                        <div class="filter-div">
                            <div class="search-div " style="margin-right: 30px">
                                <select name="filter_id" id="filter_id">
                                    <option value="All">All</option>
                                    <option value="md_health">MDHealth</option>
                                    <option value="MDShop">MDShop</option>
                                    <option value="MDFood">MDFood</option>
                                    <option value="MDHomeServices">MDHomeServices</option>
                                    <option value="MDFlight">MDFlight</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="favdiv"> {!! $html !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script>
 $(document).ready(function() {
    var baseUrl = $('#base_url').val();
    var token = "{{ Session::get('login_token') }}";
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $(".upFavLi").addClass("activeClass");
    $(".upFav").addClass("md-active");

    // Function to handle AJAX call
    function removeFromFavourite(id) {
        
        var formData = new FormData();
        formData.append('id', id);

        $.ajax({
            url: baseUrl + '/api/md-remove-from-favourite',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'Authorization': 'Bearer ' + token,
                'X-CSRF-TOKEN': csrfToken
            },
            beforeSend: function() {
                $('#img_' + id).attr('disabled', true);
                $('#img_' + id).html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
            },
            success: function(response) {
                $('#img_' + id).attr('disabled', false);
                $('#img_' + id).html('<img src="front/assets/img/white-heart.svg" alt="">');
                console.log('Success:', response);
                // window.location.reload();
            },
            error: function(xhr, status, error) {
                $('#img_' + id).attr('disabled', false);
                $('#img_' + id).html('<img src="front/assets/img/white-heart.svg" alt="">');
                // console.error('Error:', error);
            }
        });
    }

    // Click event for favourite button
    $(".fav-btn").on('click', function() {
        var id = this.id.split("_")[1];
        removeFromFavourite(id); // Call the function with the ID
    });




        $('#filter_id').change(function() {
            var selectedVendorId = $(this).val();

            $.ajax({
                url: baseUrl + '/md-customer-favourite-list-web',
                type: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    module_type: selectedVendorId
                },
                success: function(response) {
                    console.log(response);
                    if (response !== undefined && response.trim().length > 0) {
                        $('#favdiv').html(response);
                    } else {
                        $('#favdiv').html('<div class="no-data"><img src="{{ asset('front/assets/img/No-Data-Found-1.svg') }}" alt="" class=""></div>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    $('#favdiv').html('<div class="no-data"><img src="{{ asset('front/assets/img/No-Data-Found-1.svg') }}" alt="" class=""></div>');
                }
            });
        });
    });

    function removeFromFavourite(id) {
        var baseUrl = $('#base_url').val();
        var token = "{{ Session::get('login_token') }}";
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var formData = new FormData();
        formData.append('id', id);

        $.ajax({
            url: baseUrl + '/api/md-remove-from-favourite',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'Authorization': 'Bearer ' + token,
                'X-CSRF-TOKEN': csrfToken
            },
            beforeSend: function() {
                $('#img_' + id).attr('disabled', true);
                $('#img_' + id).html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
            },
            success: function(response) {
                $('#img_' + id).attr('disabled', false);
                $('#img_' + id).html('<img src="front/assets/img/white-heart.svg" alt="">');
                console.log('Success:', response);
                window.location.reload();
            },
            error: function(xhr, status, error) {
                $('#img_' + id).attr('disabled', false);
                $('#img_' + id).html('<img src="front/assets/img/white-heart.svg" alt="">');
                console.error('Error:', error);
            }
        });
    }

</script>

   
@endsection
