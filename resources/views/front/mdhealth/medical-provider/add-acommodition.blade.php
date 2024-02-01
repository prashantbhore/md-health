@extends('front.layout.layout2')
@section('content')
<style>
    .form-control::placeholder {
        font-family: "Campton";
    }

    .stars-div .fa {
        font-size: 20px;
    }

    .stars-div .fa-star {
        color: #4CDB06;
    }

    .stars-div .fa-star-o {
        color: #B9B9B9;
    }

    .star-rating .fa.fa-star {
        color: #B9B9B9;
        cursor: pointer;
        width: 18px;
        height: 17px;
        flex-shrink: 0;
        font-size: 1.5rem;
    }

    .star-rating .fa.fa-star.selected {
        color: #4CDB06;
    }

    .form-group input.form-control {
        color: #000 !important;
    }

    .form-group .prev-img-div img {
    height: 128px;
    width: 142px;
    object-fit: contain;
    margin-top: 15px;
    border-radius: 3px;
}
    .multiple-checkbox-div .multiple-checks {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }



    .multiple-checkbox-div .multiple-checks .form-check .form-check-label svg {
        margin-right: 3px;
    }

    .multiple-checkbox-div .multiple-checks {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .multiple-checkbox-div .multiple-checks .form-check {
        min-width: 200px;
    }

    .multiple-checkbox-div .multiple-checks .form-check .form-check-label svg {
        margin-right: 3px;
    }

    .multiple-checks .form-check-label {
        color: #000;
        font-family: Campton;
        font-weight: 500;
        line-height: normal;
        letter-spacing: -0.48px;
    }

    .form-control,
    .form-select {
        color: #000;
        font-family: "Campton" !important;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        letter-spacing: -0.64px;
    }

    .up-abs {
    top: 47px;
    right: 16px;
}
</style>
<!-- Include jQuery -->


<div class="content-wrapper">
    <div class="container py-100px for-cards">
    <div class="d-flex gap-3">
            <div class="w-292">
                @include('front.includes.sidebar')
            </div>
            <div class="w-761">
                <div class="card mb-4">
                    <h5 class="card-header d-flex align-items-center justify-content-between mb-5">
                        <span>Add New Accommodation</span>
                        <a href="{{ url('medical-other-services') }}" class="d-flex align-items-center gap-1 text-decoration-none">
                            <img src="{{ asset('front/assets/img/backPage.png') }}" alt="">
                            <p class="mb-0 card-h1">Back</p>
                        </a>
                    </h5>
                    <div class="card-body">
                        <div class="form-div">

                            <form action="{{ url('md-add-new-acommodition') }}" method="post" enctype="multipart/form-data" id="add_acommodition" class="from-prevent-multiple-submits">
                                @csrf

                                <input type="hidden" name="hotel_id" value="{{ !empty($hotel_details['id']) ? $hotel_details['id'] : '' }}">
                                <div class="form-group mb-4">
                                    <label class="form-label mb-3">Hotel Name</label>
                                    <input type="text" class="form-control" name="hotel_name" id="hotel_name" value="{{ !empty($hotel_details['hotel_name']) ? $hotel_details['hotel_name'] : '' }}" aria-describedby="foodname" placeholder="Please Write Here">
                                </div>

                                <div class="form-group mb-4">
                                    <label class="form-label mb-3">Hotel Address</label>
                                    <input type="text" class="form-control" name="hotel_address" id="hotel_address" value="{{ !empty($hotel_details['hotel_address']) ? $hotel_details['hotel_address'] : '' }}" aria-describedby="foodname" placeholder="Please Write Here">
                                </div>

                                {{-- <div class="form-group mb-4">
                                    <label class="form-label mb-3">Hotel Stars (Selectable)</label>
                                    <div class="stars-div">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div> --}}



                                <!-- Display Selected Stars Count -->
                                {{-- <div id="selectedStarsCount"></div> --}}
                                <div class="form-group mb-4">
                                    <label class="form-label mb-3">Hotel Stars (Selectable)</label>
                                    <div class="form-group">
                                        <input type="hidden" name="hotel_stars" id="hotel_stars" value="{{ !empty($hotel_details['hotel_stars']) ? $hotel_details['hotel_stars'] : '' }}">
                                        <div class="star-rating d-flex gap-3">
                                            <i class="fa fa-star" data-value="1"></i>
                                            <i class="fa fa-star" data-value="2"></i>
                                            <i class="fa fa-star" data-value="3"></i>
                                            <i class="fa fa-star" data-value="4"></i>
                                            <i class="fa fa-star" data-value="5"></i>
                                        </div>
                                    </div>
                                </div>




                                <div class="form-group mb-5 position-relative" >
                                    <label class="form-label mb-3">Hotel Picture</label>
                                    <div class="form-group mb-3 ">
                                        <input type="file"  name="hotel_image_path" id="hotel_image_path" class="form-control text-dark" oninput="pic.src=window.URL.createObjectURL(this.files[0])" accept="image/*"/>
                                        <img src="{{asset('front/assets/img/uploadType.png')}}" alt="" id="up-abs1" class="up-abs" />
                                    </div>
                                    <div class="prev-img-div">
                                        <img src="{{ !empty($hotel_details['hotel_image_path']) ? $hotel_details['hotel_image_path'] : 'front/assets/img/uploadHere.png' }}" alt="image" id="pic" />
                                        <input type="hidden" name="old_image" id="old_image" value="{{ !empty($hotel_details['hotel_image_path']) ? $hotel_details['hotel_image_path'] : '' }}">
                                    </div>
                                </div>

                                <div class="form-group mb-4 section-heading-div">
                                    <label class="form-label mb-3">Hotel Per Night Price (VAT Included)</label>
                                    <div class="input-icon-div">
                                        <input type="text" class="form-control" name="hotel_per_night_price" id="hotel_per_night_price" placeholder="0" value="{{ !empty($hotel_details['hotel_per_night_price']) ? $hotel_details['hotel_per_night_price'] : '' }}">
                                        <span class="input-icon">₺</span>
                                    </div>
                                </div>

                                <div class="form-group mb-4 section-heading-div">
                                    <label class="form-label mb-3">Distance From Hospital</label>
                                    <div class="input-icon-div">
                                        <input type="text" class="form-control"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '');"
                                         name="distance_from_hospital" id="distance_from_hospital" placeholder="0" value="{{ !empty($hotel_details['distance_from_hospital']) ? $hotel_details['distance_from_hospital'] : '' }}">
                                        <span class="input-icon">KM</span>
                                    </div>
                                </div>

                                <div class="multiple-checkbox-div mb-5">
                                    <div class="form-group d-flex flex-column">
                                        <label class="form-label mb-3">Other Services</label>
                                        <div class="multiple-checks">
                                            <div class="form-check">
                                                <input type="checkbox" value="Breakfast & Dinner" class="form-check-input" id="fordinner" {{ !empty($hotel_details['hotel_other_services']) && strpos($hotel_details['hotel_other_services'], 'Breakfast & Dinner') !== false ? 'checked' : '' }}>
                                                <label class="form-check-label fw-500 fsb-1" for="fordinner">
                                                    <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 0.5C1 0.367392 0.947322 0.240215 0.853553 0.146447C0.759785 0.0526784 0.632608 0 0.5 0C0.367392 0 0.240215 0.0526784 0.146447 0.146447C0.0526786 0.240215 5.21142e-08 0.367392 5.21142e-08 0.5V3.5C-0.000117575 4.07633 0.198892 4.63499 0.563347 5.08145C0.927802 5.52791 1.43532 5.83473 2 5.95V13.5C2 13.6326 2.05268 13.7598 2.14645 13.8536C2.24021 13.9473 2.36739 14 2.5 14C2.63261 14 2.75979 13.9473 2.85355 13.8536C2.94732 13.7598 3 13.6326 3 13.5V5.95C3.56468 5.83473 4.0722 5.52791 4.43665 5.08145C4.80111 4.63499 5.00012 4.07633 5 3.5V0.5C5 0.367392 4.94732 0.240215 4.85355 0.146447C4.75979 0.0526784 4.63261 0 4.5 0C4.36739 0 4.24021 0.0526784 4.14645 0.146447C4.05268 0.240215 4 0.367392 4 0.5V3.5C4.00016 3.81033 3.90407 4.11306 3.72497 4.36649C3.54587 4.61992 3.29258 4.81156 3 4.915V0.5C3 0.367392 2.94732 0.240215 2.85355 0.146447C2.75979 0.0526784 2.63261 0 2.5 0C2.36739 0 2.24021 0.0526784 2.14645 0.146447C2.05268 0.240215 2 0.367392 2 0.5V4.915C1.70742 4.81156 1.45413 4.61992 1.27503 4.36649C1.09593 4.11306 0.999837 3.81033 1 3.5V0.5ZM8 13.5V7H6.5C6.36739 7 6.24021 6.94732 6.14645 6.85355C6.05268 6.75979 6 6.63261 6 6.5V2.5C6 1.837 6.326 1.217 6.771 0.771C7.217 0.326 7.837 0 8.5 0C8.63261 0 8.75979 0.0526784 8.85355 0.146447C8.94732 0.240215 9 0.367392 9 0.5V13.5C9 13.6326 8.94732 13.7598 8.85355 13.8536C8.75979 13.9473 8.63261 14 8.5 14C8.36739 14 8.24021 13.9473 8.14645 13.8536C8.05268 13.7598 8 13.6326 8 13.5Z" fill="#111111" />
                                                    </svg>
                                                    Breakfast & Dinner</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" value="Sauna & Spa" class="form-check-input" id="forspa" {{ !empty($hotel_details['hotel_other_services']) && strpos($hotel_details['hotel_other_services'], 'Sauna & Spa') !== false ? 'checked' : '' }}>
                                                <label class="form-check-label fw-500 fsb-1" for="forspa">
                                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M13.225 11.4804H8.68027V12.6004H13.2714C13.3726 12.6054 13.4725 12.5754 13.5542 12.5155C13.6359 12.4556 13.6946 12.3694 13.7203 12.2714V11.9998C13.7203 11.9998 13.7169 11.4804 13.225 11.4804ZM12.5964 11.2592C12.8947 11.2587 13.1806 11.1399 13.3914 10.9287C13.6021 10.7176 13.7204 10.4314 13.7203 10.133C13.7203 9.50947 13.2163 9.00659 12.5964 9.00659C12.4487 9.00685 12.3026 9.03619 12.1663 9.09295C12.03 9.14971 11.9063 9.23277 11.8021 9.33738C11.6979 9.44199 11.6154 9.5661 11.5592 9.70263C11.503 9.83915 11.4743 9.9854 11.4747 10.133C11.4747 10.7544 11.9773 11.2592 12.5964 11.2592ZM10.2292 11.2004C10.8189 11.2004 11.2932 10.7849 11.2932 10.196C11.293 9.60831 10.817 9.30003 10.2318 9.29555L8.68027 9.49211V11.2004H10.2292ZM5.18671 3.90163C5.87523 3.90163 6.43215 3.34163 6.43215 2.65087C6.43215 1.96011 5.87523 1.40039 5.18671 1.40039C4.49875 1.40039 3.94099 1.96011 3.94099 2.65087C3.94099 3.34163 4.49875 3.90163 5.18671 3.90163ZM3.91495 7.94931L3.90375 7.93307L3.33927 6.61875L3.33843 9.24039H5.02543L5.39391 8.84839L4.39459 8.46367C4.15771 8.37463 3.98943 8.17303 3.91495 7.94931ZM4.27251 7.83143C4.32711 7.95407 4.42819 8.05347 4.55531 8.09911L6.48087 8.81283C6.53954 8.83865 6.60272 8.85262 6.6668 8.85395C6.73088 8.85528 6.79459 8.84393 6.85428 8.82057C6.91396 8.7972 6.96844 8.76228 7.01459 8.7178C7.06074 8.67333 7.09765 8.62017 7.12319 8.56139C7.17532 8.44227 7.1782 8.30735 7.13119 8.18611C7.08419 8.06488 6.99112 7.96716 6.87231 7.91431L5.09571 7.24343L4.54691 5.92715L4.90475 5.79387L5.36983 6.92171L6.72027 7.42235V6.04419L7.43707 6.47063L7.79435 8.27047C7.81493 8.33137 7.84737 8.38758 7.8898 8.43586C7.93224 8.48415 7.98382 8.52354 8.04157 8.55176C8.09932 8.57999 8.16209 8.59648 8.22626 8.6003C8.29042 8.60411 8.35471 8.59517 8.41539 8.57399C8.53761 8.53052 8.63776 8.4406 8.6941 8.32376C8.75045 8.20692 8.75846 8.07258 8.71639 7.94987L8.31599 6.21639C8.28976 6.12043 8.23486 6.03475 8.15863 5.97083C7.95339 5.74347 6.91543 4.58287 6.84151 4.50531C6.73315 4.39667 6.48535 4.20039 6.01719 4.20039H4.33719C3.38239 4.20039 3.19871 5.17479 3.39387 5.67039L4.27251 7.83143ZM8.40027 9.52039H0.831033C0.555513 9.52039 0.280273 9.67579 0.280273 10.0177V12.6004H8.40027V9.52039Z" fill="#111111" />
                                                    </svg>
                                                    Sauna & Spa</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" value="No Smoking" class="form-check-input" id="fornosmoking" {{ !empty($hotel_details['hotel_other_services']) && strpos($hotel_details['hotel_other_services'], 'No Smoking') !== false ? 'checked' : '' }}>
                                                <label class="form-check-label fw-500 fsb-1" for="fornosmoking">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6.66667 10.8333V14.1667M13.3333 4.16667V4.58333C13.3333 5.02536 13.5089 5.44928 13.8215 5.76184C14.134 6.07441 14.558 6.25 15 6.25C15.442 6.25 15.866 6.42559 16.1785 6.73816C16.4911 7.05072 16.6667 7.47464 16.6667 7.91667V8.33333M2.5 2.5L17.5 17.5M14.1667 10.8333H16.6667C16.8877 10.8333 17.0996 10.9211 17.2559 11.0774C17.4122 11.2337 17.5 11.4457 17.5 11.6667V13.3333C17.5 13.5667 17.4042 13.7775 17.25 13.9283M14.1667 14.1667H3.33333C3.11232 14.1667 2.90036 14.0789 2.74408 13.9226C2.5878 13.7663 2.5 13.5543 2.5 13.3333V11.6667C2.5 11.4457 2.5878 11.2337 2.74408 11.0774C2.90036 10.9211 3.11232 10.8333 3.33333 10.8333H10.8333" stroke="#111111" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    No Smoking</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" value="Wi-Fi" class="form-check-input" id="forwifi" {{ !empty($hotel_details['hotel_other_services']) && strpos($hotel_details['hotel_other_services'], 'Wi-Fi') !== false ? 'checked' : '' }}>
                                                <label class="form-check-label fw-500 fsb-1" for="forwifi">
                                                    <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_353_6343)">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4214 1.95638C11.3285 0.7545 9.75232 0 7.99998 0C6.24763 0 4.67146 0.7545 3.57859 1.95638H12.4213H12.4214ZM3.57865 9.99438C4.67152 11.1962 6.2477 11.9508 8.00004 11.9508C9.75238 11.9508 11.3286 11.1962 12.4214 9.99438H3.57865ZM2.65464 2.46444C1.18908 2.46444 0.000976562 3.65269 0.000976562 5.1185V6.83225C0.000976562 8.298 1.18908 9.48625 2.65464 9.48625H13.3453C14.8109 9.48625 15.999 8.298 15.999 6.83225V5.1185C15.999 3.65269 14.8109 2.46444 13.3453 2.46444H2.65464ZM15.726 5.08819C15.726 3.78988 14.6737 2.73744 13.3756 2.73744H10.7219C9.4238 2.73744 8.37149 3.78988 8.37149 5.08813V6.87012C8.37149 8.16844 7.31919 9.22087 6.0211 9.22087H13.3756C14.6736 9.22087 15.7259 8.16838 15.7259 6.87012V5.08813L15.726 5.08819ZM6.50641 5.24731V7.75731H7.26457V5.24731H6.50641ZM6.43055 4.45494C6.43055 4.5746 6.47808 4.68936 6.56268 4.77398C6.64728 4.85859 6.76203 4.90613 6.88168 4.90613C7.00133 4.90613 7.11607 4.85859 7.20068 4.77398C7.28528 4.68936 7.33281 4.5746 7.33281 4.45494C7.33281 4.33528 7.28528 4.22051 7.20068 4.1359C7.11607 4.05129 7.00133 4.00375 6.88168 4.00375C6.76203 4.00375 6.64728 4.05129 6.56268 4.1359C6.47808 4.22051 6.43055 4.33528 6.43055 4.45494ZM1.3733 4.09481L2.35137 7.75731H2.98067L3.7162 5.22463L4.45161 7.75737H5.10365L6.06659 4.09481H5.33106L4.77007 6.50619L4.07253 4.09481H3.39774L2.70014 6.4455L2.16946 4.09481H1.3733ZM9.57703 4.09481V7.75731H10.3807V6.32419H12.2005V5.58106H10.3807V4.83794H12.3217V4.09481H9.57703ZM12.8676 5.24738V7.75737H13.6258V5.24738H12.8676ZM12.7994 4.44737C12.7994 4.56704 12.8469 4.6818 12.9315 4.76641C13.0161 4.85103 13.1309 4.89856 13.2505 4.89856C13.3702 4.89856 13.4849 4.85103 13.5695 4.76641C13.6541 4.6818 13.7016 4.56704 13.7016 4.44737C13.7016 4.32771 13.6541 4.21295 13.5695 4.12834C13.4849 4.04372 13.3702 3.99619 13.2505 3.99619C13.1309 3.99619 13.0161 4.04372 12.9315 4.12834C12.8469 4.21295 12.7994 4.32771 12.7994 4.44737Z" fill="black" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_353_6343">
                                                                <rect width="16" height="12" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                    Wi-Fi</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" value="Fitness Center" class="form-check-input" id="forfitness" {{ !empty($hotel_details['hotel_other_services']) && strpos($hotel_details['hotel_other_services'], 'Fitness Center') !== false ? 'checked' : '' }}>
                                                <label class="form-check-label fw-500 fsb-1" for="forfitness">
                                                    <svg width="13" height="15" viewBox="0 0 13 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.21458 1.41667V0H8.46458V1.41667H4.21458ZM4.92292 9.73958L4.14375 8.18125C4.08472 8.05139 3.99618 7.95388 3.87812 7.88871C3.76007 7.82354 3.63611 7.79119 3.50625 7.79167H0C0.177083 6.19792 0.867708 4.85492 2.07187 3.76267C3.27604 2.67042 4.69861 2.12453 6.33958 2.125C7.07153 2.125 7.77396 2.24306 8.44687 2.47917C9.11979 2.71528 9.75139 3.05764 10.3417 3.50625L11.3333 2.51458L12.325 3.50625L11.3333 4.49792C11.7111 4.99375 12.0122 5.51626 12.2365 6.06546C12.4608 6.61465 12.6083 7.19006 12.6792 7.79167H9.61562L8.39375 5.34792C8.26389 5.07639 8.05139 4.94062 7.75625 4.94062C7.46111 4.94062 7.24861 5.07639 7.11875 5.34792L4.92292 9.73958ZM6.33958 14.875C4.69861 14.875 3.27604 14.3289 2.07187 13.2366C0.867708 12.1444 0.177083 10.8016 0 9.20833H3.06354L4.28542 11.6521C4.41528 11.9236 4.62778 12.0594 4.92292 12.0594C5.21806 12.0594 5.43055 11.9236 5.56042 11.6521L7.75625 7.26042L8.53542 8.81875C8.59444 8.94861 8.68299 9.04612 8.80104 9.11129C8.9191 9.17646 9.04306 9.20881 9.17292 9.20833H12.6792C12.5021 10.8021 11.8115 12.1448 10.6073 13.2366C9.40312 14.3284 7.98056 14.8745 6.33958 14.875Z" fill="#111111" />
                                                    </svg>
                                                    Fitness Center</label>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <p>Checked Values: <span id="checkedValues"></span></p> --}}
                                    <input type="hidden" name="hotel_other_services" id="hotel_other_services" value="{{ !empty($hotel_details['hotel_other_services']) ? $hotel_details['hotel_other_services'] : '' }}">
                                    <input type="hidden" name="button_type" id="button_type" value="active">
                                    <input type="hidden" name="platform_type" id="platform_type" value="web">
                                </div>

                                <div class="section-btns mb-4 d-flex gap-3">
                                    <button type="submit" name="button_type" value="active" class="btn save-btn-black text-black bg-green w-50 camptonBold from-prevent-multiple-submits">Save Accommodation</button>
                                    <button type="submit" name="button_type" value="inactive" class="btn save-btn-black w-50 camptonBold from-prevent-multiple-submits">Deactive Accommodation</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include jQuery Validation Plugin -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>

<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>


<script>
    $(".mpOtherServicesLi").addClass("activeClass");
    $(".mpOtherServices").addClass("md-active");
</script>
<script>
    (function() {
        $('.from-prevent-multiple-submits').on('submit', function() {
            $('.from-prevent-multiple-submits').attr('disabled', 'true');
            setTimeout(function() {
                $('.from-prevent-multiple-submits').attr('disabled', false);
            }, 3000);
        })
    })();
</script>

<script>
    $(document).ready(function() {
        function updateCheckedValues() {
            const checkedValues = $('.form-check-input:checked').map(function() {
                return $(this).val();
            }).get().join(', ');
            $('#checkedValues').text(checkedValues);
            $('#hotel_other_services').val(checkedValues);
        }
        $('.form-check-input').change(updateCheckedValues);
        updateCheckedValues();
    });


    $(document).ready(function() {
    var old_image = $('#old_image').val();
    // Add custom method to validate image file types
    $.validator.addMethod("imageType", function(value, element) {
        // Get the file extension
        var extension = value.split('.').pop().toLowerCase();
        // Check if the extension is one of the allowed image types
        return ['jpg', 'jpeg', 'png'].indexOf(extension) !== -1;
    }, "Please select a valid image file (JPEG, JPG, PNG)");

    // Validate the form with id "add_acommodition"
    $("#add_acommodition").validate({
        rules: {
            hotel_name: {
                required: true
            },
            hotel_address: {
                required: true
            },
            hotel_per_night_price: {
                required: true,
                number: true
            },
            distance_from_hospital: {
                required: true,
                number: true
            },
            hotel_stars: {
                required: true,
                // number: true
            },
            hotel_image_path: {
                required: function(element) {
                    // Check if an old image exists
                    var oldImage = $("#old_image").val();

                    // Require new image if no old image exists
                    return oldImage === '';
                },
                imageType: true
            },
            // Add rules for other fields as needed
        },
        messages: {
            hotel_name: {
                required: "Please enter the hotel name"
            },
            hotel_address: {
                required: "Please enter the hotel address"
            },
            hotel_per_night_price: {
                required: "Please enter the price",
                number: "Please enter a valid number"
            },
            distance_from_hospital: {
                required: "Please enter the distance",
                number: "Please enter a valid number"
            },
            hotel_stars: {
                required: "Please select stars",
                // number: "Please enter a valid number"
            },
            hotel_image_path: {
                required: "Please select a hotel picture"
            }
            // Add custom messages for other fields as needed
        },
        submitHandler: function(form) {
            // If the form is valid, you can submit it here
            form.submit();
        }
    });
});
</script>



<!-- JavaScript for Star Rating & AJAX -->
<script>
    $(document).ready(function() {
        // Fetch the value of hotel_stars
        var selectedStars = "{{ !empty($hotel_details['hotel_stars']) ? $hotel_details['hotel_stars'] : 0 }}";

        // Add 'selected' class to stars up to the selected count
        $('.star-rating i').slice(0, selectedStars).addClass('selected');

        $('.star-rating i').click(function() {
            var newSelectedStars = $(this).data('value');
            $('#hotel_stars').val(newSelectedStars);

            // Remove 'selected' class from all stars
            $('.star-rating i').removeClass('selected');

            // Add 'selected' class to stars up to the selected count
            $(this).prevAll().addBack().addClass('selected');

            var base_url = $('#base_url').val();
            // Send an AJAX request to your Laravel endpoint with the selected stars count
            $.ajax({
                type: 'POST',
                url: base_url + '/saveStarRating',
                data: {
                    selectedStars: newSelectedStars,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response.message); // Handle success response if needed
                },
                error: function(error) {
                    console.error(error); // Handle error if needed
                }
            });
        });
    });
</script>



    <!-- JavaScript for Star Rating & AJAX -->
    <script>
        $(document).ready(function() {
            // Fetch the value of hotel_stars
            var selectedStars = "{{ !empty($hotel_details['hotel_stars']) ? $hotel_details['hotel_stars'] : 0 }}";

            // Add 'selected' class to stars up to the selected count
            $('.star-rating i').slice(0, selectedStars).addClass('selected');

            $('.star-rating i').click(function() {
                var newSelectedStars = $(this).data('value');
                $('#hotel_stars').val(newSelectedStars);

                // Remove 'selected' class from all stars
                $('.star-rating i').removeClass('selected');

                // Add 'selected' class to stars up to the selected count
                $(this).prevAll().addBack().addClass('selected');
                var base_url = $('#base_url').val();
                // Send an AJAX request to your Laravel endpoint with the selected stars count
                $.ajax({
                    type: 'POST',
                    url: base_url + '/saveStarRating',
                    data: {
                        selectedStars: newSelectedStars,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response.message); // Handle success response if needed
                    },
                    error: function(error) {
                        console.error(error); // Handle error if needed
                    }
                });
            });
        });
    </script>
@endsection
