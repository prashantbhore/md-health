@section('php')
    @php
        // echo '<pre>';
        // print_r($fav_list);
        // die();
    @endphp
@endsection
@extends('front.layout.layout2')
@section('content')
    <div class="content-wrapper">
        <div class="container py-100px for-cards">
            <div class="row">
                <div class="col-md-3">
                    @include('front.includes.sidebar-user')
                </div>

                <div class="col-md-9">
                    <div class="card mb-4" style="min-height: 470px;">
                        <h5 class="card-header mb-3">
                            <span>My Favorites</span>
                        </h5>
                        <div class="card-body">
                            @if (!empty($fav_list))
                                @foreach ($fav_list as $fav)
                                    <div class="card shadow-none mb-3" style="border-radius: 3px;background: #EDEDED;">
                                        <div class="card-body d-flex justify-content-between">
                                            <div>
                                                <h5 class="card-h1 mb-0">{{ $fav['product_category_name'] }}<img
                                                        src="{{ asset('front/assets/img/verifiedBy.png') }}" alt=""
                                                        class="ms-3" /></h5>
                                                <p class="mb-0 d-inline-block card-p1"><img
                                                        src="{{ asset('front/assets/img/Location.svg') }}" alt="" />
                                                    {{ $fav['city_name'] }}</p>
                                                <p class="mb-0 d-inline-block card-p1 fst-italic ms-4">
                                                    {{ $fav['treatment_period_in_days'] }}</p>
                                            </div>
                                            <div
                                                class="d-flex align-items-center justify-content-center flex-column gap-2 ">
                                                <div>
                                                    <img id="img_{{ $fav['id'] }}"
                                                        class="fav-btn"src="{{ asset('front/assets/img/Favourite.svg') }}"
                                                        alt="" />
                                                </div>
                                                <p
                                                    id="p_{{ $fav['id'] }}"class="mb-0 d-inline-block card-p1 fst-italic fav-btn">
                                                    Remove Favorite
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(".upFavLi").addClass("activeClass");
            $(".upFav").addClass("md-active");

            $(".fav-btn").on('click', function() {
                var id = this.id.split("_")[1];
                alert(id);

                var formData = new FormData();
                formData.append('package_id', packageId);

                $.ajax({
                    url: baseUrl + '/api/md-add-package-to-favourite',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'X-CSRF-TOKEN': csrfToken
                    },
                    beforeSend: function() {
                        $('#fav-btn' + packageId).attr('disabled', true);
                        $('#fav-btn' + packageId).html(
                            '<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>'
                        );
                    },
                    success: function(response) {
                        $('#fav-btn' + packageId).attr('disabled', false);
                        $('#other').html('<img src="front/assets/img/white-heart.svg" alt="">');
                        console.log('Success:', response);
                        // window.location.href = $('#hidden_url').val();
                    },
                    error: function(xhr, status, error) {
                        $('#fav-btn' + packageId).attr('disabled', false);
                        $('#other').html('<img src="front/assets/img/white-heart.svg" alt="">');
                        alert('Error:', error);
                    }
                });
            });
        });
    </script>
@endsection
