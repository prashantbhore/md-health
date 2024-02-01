@extends('front.layout.layout2')
@section('content')
<style>
    /* .section-heading.section-btns a {
        width: 35%;
    } */

    .trmt-card-footer.icon-btns {
        display: flex;
        gap: 14px;
    }

    .section-heading {
        margin-bottom: 42px;
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
        margin-bottom: 100px;
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
                <div class="card mb-4 other-services">
                    <h5 class="card-header d-flex align-items-center justify-content-between">
                        <span>Other Services</span>
                        <img src="{{ asset('front/assets/img/GoldMember.svg') }}" alt=""  >
                    </h5>
                    <div class="card-body">
                        <div>
                            <h6 class="section-heading section-btns justify-content-between align-items-center">
                                <span>Accommodation</span>
                                <a href="{{ url('add-acommodition') }}" class="btn add-btn df-center">Add New Accommodation</a>
                            </h6>
                            @if (!empty($hotel_details))
                            @foreach ($hotel_details as $hotel_detail)
                            <div class="treatment-card df-start w-100 mb-5" id="div_{{ $hotel_detail['id'] }}">
                                <div class="row card-row align-items-center w-100">
                                    <div class="col-md-1 df-center">
                                        <img src="{{ !empty($hotel_detail['hotel_image_path'])?$hotel_detail['hotel_image_path']:asset('front/assets/img/default-img.png') }}" alt="" class="tour-img">
                                    </div>
                                    <div class="col-md-8 justify-content-start">
                                        <div class="trmt-card-body">
                                            <h5 class="dashboard-card-title mb-1">{{ $hotel_detail['hotel_name'] }}
                                            </h5>
                                            {{-- <a class="btn-active veh-status">{{ $hotel_detail['status'] }}</a> --}}
                                            @if ($hotel_detail['status'] == 'active')
                                            <a class="btn-active veh-status">{{ $hotel_detail['status'] }}</a>
                                            @else
                                            <a class="btn-active veh-status" style="background-color:black;">{{ $hotel_detail['status'] }}</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3 d-flex flex-column justify-content-between align-items-end text-end px-0">
                                        <div class="trmt-card-footer icon-btns px-0">
                                            <a href="{{ url('edit-acommodition/' . Crypt::encrypt($hotel_detail['id'])) }}" class="mt-auto view-detail-btn">
                                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.1099 3.4397C18.2009 3.5779 18.2415 3.74329 18.2248 3.90793C18.208 4.07258 18.1349 4.22639 18.0179 4.34341L9.20793 13.1524C9.11781 13.2425 9.00535 13.307 8.8821 13.3393L5.21264 14.2976C5.09134 14.3293 4.96388 14.3286 4.84291 14.2958C4.72194 14.2629 4.61166 14.199 4.52302 14.1104C4.43438 14.0217 4.37046 13.9114 4.33762 13.7905C4.30477 13.6695 4.30413 13.542 4.33577 13.4207L5.2941 9.75224C5.32207 9.64212 5.37485 9.53985 5.44839 9.45324L14.2909 0.616451C14.4257 0.481853 14.6084 0.40625 14.7988 0.40625C14.9893 0.40625 15.172 0.481853 15.3068 0.616451L18.0179 3.32662C18.0523 3.36112 18.0831 3.39901 18.1099 3.4397ZM16.4932 3.83453L14.7988 2.14116L6.63577 10.3042L6.03681 12.5975L8.3301 11.9986L16.4932 3.83453Z" fill="#111111" />
                                                    <path d="M16.3712 14.6963C16.6331 12.4576 16.7167 10.2016 16.6213 7.94965C16.6192 7.89659 16.6281 7.84368 16.6474 7.79421C16.6667 7.74475 16.696 7.69979 16.7334 7.66215L17.6764 6.71915C17.7022 6.69323 17.7349 6.67531 17.7706 6.66754C17.8063 6.65976 17.8435 6.66246 17.8777 6.67532C17.9119 6.68817 17.9417 6.71063 17.9634 6.74C17.9852 6.76936 17.998 6.80439 18.0003 6.84086C18.1778 9.51579 18.1105 12.2014 17.7991 14.864C17.5729 16.8018 16.0166 18.3207 14.0875 18.5364C10.7384 18.9072 7.35866 18.9072 4.00962 18.5364C2.08145 18.3207 0.524161 16.8018 0.297994 14.864C-0.0993313 11.4671 -0.0993313 8.0355 0.297994 4.63861C0.524161 2.70086 2.08049 1.1819 4.00962 0.966274C6.55147 0.684411 9.11248 0.61613 11.6657 0.762149C11.7023 0.764772 11.7373 0.777813 11.7667 0.799727C11.796 0.82164 11.8185 0.851508 11.8314 0.885793C11.8443 0.920079 11.8471 0.957345 11.8395 0.993179C11.8319 1.02901 11.8141 1.06191 11.7884 1.08798L10.8368 2.03865C10.7995 2.07578 10.755 2.10489 10.7061 2.12417C10.6571 2.14346 10.6047 2.15251 10.5522 2.15077C8.42155 2.07835 6.28849 2.16002 4.16966 2.39515C3.55052 2.46368 2.97256 2.73893 2.52914 3.17643C2.08572 3.61394 1.80274 4.18815 1.72591 4.80632C1.34167 8.09179 1.34167 11.4108 1.72591 14.6963C1.80274 15.3145 2.08572 15.8887 2.52914 16.3262C2.97256 16.7637 3.55052 17.039 4.16966 17.1075C7.38487 17.4669 10.7122 17.4669 13.9284 17.1075C14.5475 17.039 15.1255 16.7637 15.5689 16.3262C16.0123 15.8887 16.2943 15.3145 16.3712 14.6963Z" fill="#111111" />
                                                </svg>
                                            </a>
                                            <span onclick="acommodition_delete('{{ $hotel_detail['id'] }}')" class="mt-auto view-detail-btn">
                                                <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.57433 12.2245L10.0497 9.75M10.0497 9.75L12.5242 7.2755M10.0497 9.75L7.57433 7.2755M10.0497 9.75L12.5242 12.2245M10.0488 18.5C14.8815 18.5 18.7988 14.5826 18.7988 9.75C18.7988 4.91738 14.8815 1 10.0488 1C5.2162 1 1.29883 4.91738 1.29883 9.75C1.29883 14.5826 5.2162 18.5 10.0488 18.5Z" stroke="#F24E1E" stroke-width="0.875" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <!-- <div class="no-data">No Accommodations Added</div> -->
                            <div class="no-data-vendor">
                                <img src="{{ asset('front/assets/img/No-Data-Found-1.svg') }}" alt="" class="">
                            </div>
                            @endif
                        </div>
                        <div>
                            <h6 class="section-heading section-btns justify-content-between align-items-center">
                                <span>Transportation</span>
                                <a href="{{ url('add-new-vehical') }}" class="btn add-btn df-center">Add New Vehicle</a>
                            </h6>
                            @if (!empty($vehicle_details))
                            @foreach ($vehicle_details as $vehicle_detail)
                            <div class="treatment-card df-start w-100 mb-4" id="divt_{{ $vehicle_detail['id'] }}">
                                <div class="row card-row align-items-center w-100">
                                    <div class="col-md-1 df-center">
                                        <img src="{{ !empty($vehicle_detail['vehicle_image_path'])?url( '/' ) . Storage::url($vehicle_detail['vehicle_image_path']):asset('front/assets/img/default-img.png') }}" alt="image" class="transport-img">
                                    </div>
                                    <div class="col-md-8 justify-content-start">
                                        <div class="trmt-card-body">
                                            <h5 class="dashboard-card-title mb-1">
                                                {{ $vehicle_detail['vehicle_model_name'] }}
                                            </h5>
                                            {{-- <a class="active veh-status">{{ $vehicle_detail['status'] }}</a> --}}
                                            @if ($vehicle_detail['status'] == 'active')
                                            <a class="btn-active veh-status">{{ $vehicle_detail['status'] }}</a>
                                            @else
                                            <a class="btn-active veh-status" style="background-color:black;">{{ $vehicle_detail['status'] }}</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3 d-flex flex-column justify-content-between align-items-end text-end px-0">
                                        <div class="trmt-card-footer icon-btns px-0">
                                            <a href="{{ url('edit-vehicle/' . Crypt::encrypt($vehicle_detail['id'])) }}" class="mt-auto view-detail-btn">
                                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.1099 3.4397C18.2009 3.5779 18.2415 3.74329 18.2248 3.90793C18.208 4.07258 18.1349 4.22639 18.0179 4.34341L9.20793 13.1524C9.11781 13.2425 9.00535 13.307 8.8821 13.3393L5.21264 14.2976C5.09134 14.3293 4.96388 14.3286 4.84291 14.2958C4.72194 14.2629 4.61166 14.199 4.52302 14.1104C4.43438 14.0217 4.37046 13.9114 4.33762 13.7905C4.30477 13.6695 4.30413 13.542 4.33577 13.4207L5.2941 9.75224C5.32207 9.64212 5.37485 9.53985 5.44839 9.45324L14.2909 0.616451C14.4257 0.481853 14.6084 0.40625 14.7988 0.40625C14.9893 0.40625 15.172 0.481853 15.3068 0.616451L18.0179 3.32662C18.0523 3.36112 18.0831 3.39901 18.1099 3.4397ZM16.4932 3.83453L14.7988 2.14116L6.63577 10.3042L6.03681 12.5975L8.3301 11.9986L16.4932 3.83453Z" fill="#111111" />
                                                    <path d="M16.3712 14.6963C16.6331 12.4576 16.7167 10.2016 16.6213 7.94965C16.6192 7.89659 16.6281 7.84368 16.6474 7.79421C16.6667 7.74475 16.696 7.69979 16.7334 7.66215L17.6764 6.71915C17.7022 6.69323 17.7349 6.67531 17.7706 6.66754C17.8063 6.65976 17.8435 6.66246 17.8777 6.67532C17.9119 6.68817 17.9417 6.71063 17.9634 6.74C17.9852 6.76936 17.998 6.80439 18.0003 6.84086C18.1778 9.51579 18.1105 12.2014 17.7991 14.864C17.5729 16.8018 16.0166 18.3207 14.0875 18.5364C10.7384 18.9072 7.35866 18.9072 4.00962 18.5364C2.08145 18.3207 0.524161 16.8018 0.297994 14.864C-0.0993313 11.4671 -0.0993313 8.0355 0.297994 4.63861C0.524161 2.70086 2.08049 1.1819 4.00962 0.966274C6.55147 0.684411 9.11248 0.61613 11.6657 0.762149C11.7023 0.764772 11.7373 0.777813 11.7667 0.799727C11.796 0.82164 11.8185 0.851508 11.8314 0.885793C11.8443 0.920079 11.8471 0.957345 11.8395 0.993179C11.8319 1.02901 11.8141 1.06191 11.7884 1.08798L10.8368 2.03865C10.7995 2.07578 10.755 2.10489 10.7061 2.12417C10.6571 2.14346 10.6047 2.15251 10.5522 2.15077C8.42155 2.07835 6.28849 2.16002 4.16966 2.39515C3.55052 2.46368 2.97256 2.73893 2.52914 3.17643C2.08572 3.61394 1.80274 4.18815 1.72591 4.80632C1.34167 8.09179 1.34167 11.4108 1.72591 14.6963C1.80274 15.3145 2.08572 15.8887 2.52914 16.3262C2.97256 16.7637 3.55052 17.039 4.16966 17.1075C7.38487 17.4669 10.7122 17.4669 13.9284 17.1075C14.5475 17.039 15.1255 16.7637 15.5689 16.3262C16.0123 15.8887 16.2943 15.3145 16.3712 14.6963Z" fill="#111111" />
                                                </svg>
                                            </a>
                                            <span onclick="vehicle_delete('{{ $vehicle_detail['id'] }}')" class="mt-auto view-detail-btn">
                                                <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.57433 12.2245L10.0497 9.75M10.0497 9.75L12.5242 7.2755M10.0497 9.75L7.57433 7.2755M10.0497 9.75L12.5242 12.2245M10.0488 18.5C14.8815 18.5 18.7988 14.5826 18.7988 9.75C18.7988 4.91738 14.8815 1 10.0488 1C5.2162 1 1.29883 4.91738 1.29883 9.75C1.29883 14.5826 5.2162 18.5 10.0488 18.5Z" stroke="#F24E1E" stroke-width="0.875" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <!-- <div class="no-data">No Vehicles Added</div> -->
                            <div class="no-data-vendor">
                                <img src="{{ asset('front/assets/img/No-Data-Found-1.svg') }}" alt="" class="">
                            </div>
                            @endif

                        </div>
                        <div>
                            <h6 class="section-heading section-btns justify-content-between align-items-center">
                                <span>Tour</span>
                                <a href="{{ url('add-tour') }}" class="btn add-btn df-center">Add
                                    New Tour</a>
                            </h6>
                            @if (!empty($tour_details))
                            @foreach ($tour_details as $tour_detail)
                            <div class="treatment-card df-start w-100 mb-4" id="divtr_{{ $tour_detail['id'] }}">
                                <div class="row card-row align-items-center w-100">
                                    <div class="col-md-1 df-center">
                                        <img src="{{ !empty($tour_detail['tour_image_path']) ? $tour_detail['tour_image_path'] : asset('front/assets/img/default-img.png') }}" alt="" class="tour-img">
                                    </div>
                                    <div class="col-md-8 justify-content-start">
                                        <div class="trmt-card-body">
                                            <h5 class="dashboard-card-title mb-1">{{ $tour_detail['tour_name'] }}
                                            </h5>
                                            @if ($tour_detail['status'] == 'active')
                                            <a class="btn-active veh-status">{{ $tour_detail['status'] }}</a>
                                            @else
                                            <a class="btn-active veh-status" style="background-color:black;">{{ $tour_detail['status'] }}</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3 d-flex flex-column justify-content-between align-items-end text-end px-0">
                                        <div class="trmt-card-footer icon-btns px-0">
                                            <a href="{{ url('edit-tour/' . Crypt::encrypt($tour_detail['id'])) }}" class="mt-auto view-detail-btn">
                                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.1099 3.4397C18.2009 3.5779 18.2415 3.74329 18.2248 3.90793C18.208 4.07258 18.1349 4.22639 18.0179 4.34341L9.20793 13.1524C9.11781 13.2425 9.00535 13.307 8.8821 13.3393L5.21264 14.2976C5.09134 14.3293 4.96388 14.3286 4.84291 14.2958C4.72194 14.2629 4.61166 14.199 4.52302 14.1104C4.43438 14.0217 4.37046 13.9114 4.33762 13.7905C4.30477 13.6695 4.30413 13.542 4.33577 13.4207L5.2941 9.75224C5.32207 9.64212 5.37485 9.53985 5.44839 9.45324L14.2909 0.616451C14.4257 0.481853 14.6084 0.40625 14.7988 0.40625C14.9893 0.40625 15.172 0.481853 15.3068 0.616451L18.0179 3.32662C18.0523 3.36112 18.0831 3.39901 18.1099 3.4397ZM16.4932 3.83453L14.7988 2.14116L6.63577 10.3042L6.03681 12.5975L8.3301 11.9986L16.4932 3.83453Z" fill="#111111" />
                                                    <path d="M16.3712 14.6963C16.6331 12.4576 16.7167 10.2016 16.6213 7.94965C16.6192 7.89659 16.6281 7.84368 16.6474 7.79421C16.6667 7.74475 16.696 7.69979 16.7334 7.66215L17.6764 6.71915C17.7022 6.69323 17.7349 6.67531 17.7706 6.66754C17.8063 6.65976 17.8435 6.66246 17.8777 6.67532C17.9119 6.68817 17.9417 6.71063 17.9634 6.74C17.9852 6.76936 17.998 6.80439 18.0003 6.84086C18.1778 9.51579 18.1105 12.2014 17.7991 14.864C17.5729 16.8018 16.0166 18.3207 14.0875 18.5364C10.7384 18.9072 7.35866 18.9072 4.00962 18.5364C2.08145 18.3207 0.524161 16.8018 0.297994 14.864C-0.0993313 11.4671 -0.0993313 8.0355 0.297994 4.63861C0.524161 2.70086 2.08049 1.1819 4.00962 0.966274C6.55147 0.684411 9.11248 0.61613 11.6657 0.762149C11.7023 0.764772 11.7373 0.777813 11.7667 0.799727C11.796 0.82164 11.8185 0.851508 11.8314 0.885793C11.8443 0.920079 11.8471 0.957345 11.8395 0.993179C11.8319 1.02901 11.8141 1.06191 11.7884 1.08798L10.8368 2.03865C10.7995 2.07578 10.755 2.10489 10.7061 2.12417C10.6571 2.14346 10.6047 2.15251 10.5522 2.15077C8.42155 2.07835 6.28849 2.16002 4.16966 2.39515C3.55052 2.46368 2.97256 2.73893 2.52914 3.17643C2.08572 3.61394 1.80274 4.18815 1.72591 4.80632C1.34167 8.09179 1.34167 11.4108 1.72591 14.6963C1.80274 15.3145 2.08572 15.8887 2.52914 16.3262C2.97256 16.7637 3.55052 17.039 4.16966 17.1075C7.38487 17.4669 10.7122 17.4669 13.9284 17.1075C14.5475 17.039 15.1255 16.7637 15.5689 16.3262C16.0123 15.8887 16.2943 15.3145 16.3712 14.6963Z" fill="#111111" />
                                                </svg>
                                            </a>
                                            <span onclick="tour_delete('{{ $tour_detail['id'] }}')" class="mt-auto view-detail-btn">
                                                <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.57433 12.2245L10.0497 9.75M10.0497 9.75L12.5242 7.2755M10.0497 9.75L7.57433 7.2755M10.0497 9.75L12.5242 12.2245M10.0488 18.5C14.8815 18.5 18.7988 14.5826 18.7988 9.75C18.7988 4.91738 14.8815 1 10.0488 1C5.2162 1 1.29883 4.91738 1.29883 9.75C1.29883 14.5826 5.2162 18.5 10.0488 18.5Z" stroke="#F24E1E" stroke-width="0.875" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <!-- <div class="no-data">No Tours Added</div> -->
                            <div class="no-data-vendor">
                                <img src="{{ asset('front/assets/img/No-Data-Found-1.svg') }}" alt="" class="">
                            </div>
                            @endif

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
    $(".mpOtherServicesLi").addClass("activeClass");
    $(".mpOtherServices").addClass("md-active");
</script>
<script>
    function acommodition_delete(id) {
        var base_url = $('#base_url').val();
        const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const bearer_token = '{{ Session::get('login_token') }}';
        // alert(base_url);
        $.ajax({
            url: base_url + '/api/md-delete-hotel',
            type: 'POST',
            data: {
                hotel_id: id,
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
    function vehicle_delete(id) {
        // alert(id);
        // Get the CSRF token from the meta tag
        var base_url = $('#base_url').val();
        const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const bearer_token = '{{ Session::get('login_token') }}';
        // Your AJAX call
        $.ajax({
            url: base_url + '/api/md-delete-transportation',
            type: 'POST',
            data: {
                transportation_id: id,
            },
            headers: {
                'X-CSRF-TOKEN': token,
                'Authorization': 'Bearer ' + bearer_token
            },
            success: function(response) {
                if (response.status == 200) {
                    $('#divt_' + id).css('display', 'none');
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
    function tour_delete(id) {
        // alert(id);
        // Get the CSRF token from the meta tag
        var base_url = $('#base_url').val();
        const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const bearer_token = '{{ Session::get('login_token') }}';
        // Your AJAX call
        $.ajax({
            url: base_url + '/api/md-delete-tour',
            type: 'POST',
            data: {
                tour_id: id,
            },
            headers: {
                'X-CSRF-TOKEN': token,
                'Authorization': 'Bearer ' + bearer_token
            },
            success: function(response) {
                if (response.status == 200) {
                    $('#divtr_' + id).css('display', 'none');
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
@endsection