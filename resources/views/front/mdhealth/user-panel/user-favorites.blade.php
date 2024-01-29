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
                    <div class="card panel-right mb-4">
                        <h5 class="card-header">
                            <span>My Favorites</span>
                        </h5>
                        <div class="filter-div">
                            <div class="search-div " style="margin-right: 30px">
                                {{-- <select name="filter_id" id="filter_id">
                                    <option value="">All</option>
                                    @if (!empty($vendorsdata))
                                    @foreach ($vendorsdata as $vendor)
                                    <option value="{{$vendor}}">{{$vendor}}</option>
                                    @endforeach
                                    @else
                                        @include('front.includes.no-data-found')
                                    @endif
                                </select> --}}
                                <select name="filter_id" id="filter_id">
                                    <option value="All">All</option>

                                    <option value="MDHealth">MDHealth</option>
                                    <option value="MDShop">MDShop</option>
                                    <option value="MDFood">MDFood</option>
                                    <option value="MDHomeServices">MDHomeServices</option>
                                    <option value="MDFlight">MDFlight</option>

                                </select>
                            </div>
                            {{-- <div class="filter-div">
                            <div class="search-div">
                                <select name="filter_id" id="filter_id">
                                    <option value="">All</option>
                                    @if (!empty($vendorsdata))
                                    @foreach ($vendorsdata as $vendor)
                                    <option value="{{$vendor['vendors_id']}}">{{$vendor['vendors_name']}}</option>
                                    @endforeach
                                    @else
                                        @include('front.includes.no-data-found')
                                    @endif
                                   
                                </select>
                            </div> --}}
                            {{-- <div class="search-div">
                                <input type="text" name="searchpackage" id="searchpackage"
                                    placeholder="Search" />
                            </div> --}}

                            {{-- <div class="list-div">
                            
                        </div>  --}}

                        </div>
                        <div class="card-body">
                            @if (!empty($fav_list))
                                @foreach ($fav_list as $fav)
                                    {{-- {{dd($fav)}} --}}
                                    <div class="card shadow-none mb-3" style="border-radius: 3px;background: #EDEDED;"
                                        id="alldiv">
                                        <div class="card-body remove-cardb d-flex justify-content-between">
                                            <div>
                                                <h5 class="card-h1 card-h1-fav mb-0">{{ $fav['package_name'] }}<img
                                                        src="{{ asset('front/assets/img/verifiedBy.png') }}" alt=""
                                                        class="ms-3" /></h5>
                                                <p class="mb-0 d-inline-block card-p1"><img
                                                        src="{{ asset('front/assets/img/Location.svg') }}" alt="" />
                                                    {{ $fav['city_name'] }}</p>
                                                <p class="mb-0 d-inline-block card-p1 fst-italic ms-4">
                                                    {{ 'Treatment period ' . $fav['treatment_period_in_days'] . ' days' }}</p>
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
                            {{-- medical --}}
                            @if (!empty($fav_list))
                                @foreach ($fav_list as $fav)
                                    {{-- {{dd($fav)}} --}}
                                    <div class="card shadow-none mb-3" style="border-radius: 3px;background: #EDEDED;"
                                        id="medicaldiv">
                                        <div class="card-body remove-cardb d-flex justify-content-between">
                                            <div>
                                                <h5 class="card-h1 card-h1-fav mb-0">{{ $fav['package_name'] }}<img
                                                        src="{{ asset('front/assets/img/verifiedBy.png') }}" alt=""
                                                        class="ms-3" /></h5>
                                                <p class="mb-0 d-inline-block card-p1"><img
                                                        src="{{ asset('front/assets/img/Location.svg') }}"
                                                        alt="" />
                                                    {{ $fav['city_name'] }}</p>
                                                <p class="mb-0 d-inline-block card-p1 fst-italic ms-4">
                                                    {{ 'Treatment period ' . $fav['treatment_period_in_days'] . ' days' }}</p>
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
                            {{-- shop --}}
                            @if (!empty($fav_list1))
                                @foreach ($fav_list1 as $fav)
                                    {{-- {{dd($fav)}} --}}
                                    <div class="card shadow-none mb-3" style="border-radius: 3px;background: #EDEDED;"
                                        id="shopdiv">
                                        <div class="card-body remove-cardb d-flex justify-content-between">
                                            <div>
                                                <h5 class="card-h1 card-h1-fav mb-0">{{ $fav['package_name'] }}<img
                                                        src="{{ asset('front/assets/img/verifiedBy.png') }}" alt=""
                                                        class="ms-3" /></h5>
                                                <p class="mb-0 d-inline-block card-p1"><img
                                                        src="{{ asset('front/assets/img/Location.svg') }}"
                                                        alt="" />
                                                    {{ $fav['city_name'] }}</p>
                                                <p class="mb-0 d-inline-block card-p1 fst-italic ms-4">
                                                    {{ 'Treatment period ' . $fav['treatment_period_in_days'] . ' days' }}</p>
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
                            {{-- food --}}
                            @if (!empty($fav_list2))
                                @foreach ($fav_list2 as $fav)
                                    {{-- {{dd($fav)}} --}}
                                    <div class="card shadow-none mb-3" style="border-radius: 3px;background: #EDEDED;"
                                        id="fooddiv">
                                        <div class="card-body remove-cardb d-flex justify-content-between">
                                            <div>
                                                <h5 class="card-h1 card-h1-fav mb-0">{{ $fav['package_name'] }}<img
                                                        src="{{ asset('front/assets/img/verifiedBy.png') }}" alt=""
                                                        class="ms-3" /></h5>
                                                <p class="mb-0 d-inline-block card-p1"><img
                                                        src="{{ asset('front/assets/img/Location.svg') }}"
                                                        alt="" />
                                                    {{ $fav['city_name'] }}</p>
                                                <p class="mb-0 d-inline-block card-p1 fst-italic ms-4">
                                                    {{ 'Treatment period ' . $fav['treatment_period_in_days'] . ' days' }}</p>
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
                             {{-- homeservice --}}
                             @if (!empty($fav_list3))
                             @foreach ($fav_list3 as $fav)
                                 {{-- {{dd($fav)}} --}}
                                 <div class="card shadow-none mb-3" style="border-radius: 3px;background: #EDEDED;"
                                     id="homeservicediv">
                                     <div class="card-body remove-cardb d-flex justify-content-between">
                                         <div>
                                             <h5 class="card-h1 card-h1-fav mb-0">{{ $fav['package_name'] }}<img
                                                     src="{{ asset('front/assets/img/verifiedBy.png') }}" alt=""
                                                     class="ms-3" /></h5>
                                             <p class="mb-0 d-inline-block card-p1"><img
                                                     src="{{ asset('front/assets/img/Location.svg') }}"
                                                     alt="" />
                                                 {{ $fav['city_name'] }}</p>
                                             <p class="mb-0 d-inline-block card-p1 fst-italic ms-4">
                                                 {{ 'Treatment period ' . $fav['treatment_period_in_days'] . ' days' }}</p>
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
                             {{-- flight --}}
                             @if (!empty($fav_list4))
                             @foreach ($fav_list4 as $fav)
                                 {{-- {{dd($fav)}} --}}
                                 <div class="card shadow-none mb-3" style="border-radius: 3px;background: #EDEDED;"
                                     id="flightdiv">
                                     <div class="card-body remove-cardb d-flex justify-content-between">
                                         <div>
                                             <h5 class="card-h1 card-h1-fav mb-0">{{ $fav['package_name'] }}<img
                                                     src="{{ asset('front/assets/img/verifiedBy.png') }}" alt=""
                                                     class="ms-3" /></h5>
                                             <p class="mb-0 d-inline-block card-p1"><img
                                                     src="{{ asset('front/assets/img/Location.svg') }}"
                                                     alt="" />
                                                 {{ $fav['city_name'] }}</p>
                                             <p class="mb-0 d-inline-block card-p1 fst-italic ms-4">
                                                 {{ 'Treatment period ' . $fav['treatment_period_in_days'] . ' days' }}</p>
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
    <script>
        $(document).ready(function() {
            var baseUrl = $('#base_url').val();
            var token = "{{ Session::get('login_token') }}";
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $('#filter_id').change(function() {
                var selectedVendorId = $(this).val();
                // alert(selectedVendorId);`
                if (selectedVendorId=='All') {
                    $('#alldiv').show();
                    $('#medicaldiv').hide();
                    $('#shopdiv').hide();
                    $('#fooddiv').hide();
                    $('#homeservicediv').hide();
                    $('#flightdiv').hide();
                }
                if (selectedVendorId=='MDHealth') {
                    $('#alldiv').hide();
                    $('#medicaldiv').show();
                    $('#shopdiv').hide();
                    $('#fooddiv').hide();
                    $('#homeservicediv').hide();
                    $('#flightdiv').hide();
                }
                if (selectedVendorId=='MDShop') {
                    $('#alldiv').hide();
                    $('#medicaldiv').hide();
                    $('#shopdiv').show();
                    $('#fooddiv').hide();
                    $('#homeservicediv').hide();
                    $('#flightdiv').hide();
                }
                if (selectedVendorId=='MDFood') {
                    $('#alldiv').hide();
                    $('#medicaldiv').hide();
                    $('#shopdiv').hide();
                    $('#fooddiv').show();
                    $('#homeservicediv').hide();
                    $('#flightdiv').hide();
                }
                if (selectedVendorId=='MDHomeServices') {
                    $('#alldiv').hide();
                    $('#medicaldiv').hide();
                    $('#shopdiv').hide();
                    $('#fooddiv').hide();
                    $('#homeservicediv').show();
                    $('#flightdiv').hide();
                }
                if (selectedVendorId=='MDFlight') {
                    $('#alldiv').hide();
                    $('#medicaldiv').hide();
                    $('#shopdiv').hide();
                    $('#fooddiv').hide();
                    $('#homeservicediv').hide();
                    $('#flightdiv').show();
                }
                    // $.ajax({
                    //     url: baseUrl + '/md-customer-favourite-list-web',
                    //     type: 'POST',
                    //     headers: {
                    //         'Authorization': 'Bearer ' + token,
                    //         'X-CSRF-TOKEN': csrfToken
                    //     },
                    //     data: {
                    //         vendor_id: selectedVendorId
                    //     },
                    //     success: function(response) {
                    //         // Handle success response
                    //         console.log(response);
                    //     },
                    //     error: function(xhr, status, error) {
                    //         // Handle error response
                    //         console.error(xhr.responseText);
                    //     }
                    // });
               
            });
        });
    </script>
@endsection
