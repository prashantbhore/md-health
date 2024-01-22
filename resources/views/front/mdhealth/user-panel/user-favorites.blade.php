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
        <div class="d-flex gap-3">
            <div class="w-292">
                @include('front.includes.sidebar-user')
            </div>
            <div class="w-761">
                    <div class="card panel-right mb-4" >
                        <h5 class="card-header">
                            <span>My Favorites</span>
                        </h5>
                        <div class="card-body">
                            @if (!empty($fav_list))
                                @foreach ($fav_list as $fav)
                                    <div class="card shadow-none mb-3" style="border-radius: 3px;background: #EDEDED;">
                                        <div class="card-body remove-cardb d-flex justify-content-between">
                                            <div>
                                                <h5 class="card-h1 card-h1-fav mb-0">{{ $fav['product_category_name'] }}<img
                                                        src="{{ asset('front/assets/img/verifiedBy.png') }}" alt=""
                                                        class="ms-3" /></h5>
                                                <p class="mb-0 d-inline-block card-p1"><img
                                                        src="{{ asset('front/assets/img/Location.svg') }}" alt="" />
                                                    {{ $fav['city_name'] }}</p>
                                                <p class="mb-0 d-inline-block card-p1 fst-italic ms-4">
                                                    {{ 'Treatment period '.$fav['treatment_period_in_days'].' days' }}</p>
                                            </div>
                                            <div
                                                class="d-flex align-items-center justify-content-center favorites-bt flex-column gap-2 ">
                                                <div>
                                                    <img id="img_{{ $fav['id'] }}"
                                                        class="fav-btn"src="{{ asset('front/assets/img/Favourite.svg') }}"
                                                        alt="" />
                                                </div>
                                                <p
                                                    id="p_{{ $fav['id'] }}"class="mb-0 d-inline-block card-p1 fst-italic fav-btn remove-fav">
                                                    Remove Favorite
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            @else
                                @include('front.includes.no-data-found')
                            @endif
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


            $(".fav-btn").on('click', function() {

                var id = this.id.split("_")[1];
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
                        $('#img_' + id).html(
                            '<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>'
                        );
                    },
                    success: function(response) {
                        $('#img_' + id).attr('disabled', false);
                        $('#img' + id).html(
                            '<img src="front/assets/img/white-heart.svg" alt="">');
                        console.log('Success:', response);
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        $('#img_' + id).attr('disabled', false);
                        $('#img' + id).html(
                            '<img src="front/assets/img/white-heart.svg" alt="">');
                        alert('Error:', error);
                    }
                });
            });
        });
    </script>
@endsection
