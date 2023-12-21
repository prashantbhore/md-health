@extends('front.layout.layout2')
@section("content")
<style>
    .stars-div .fa {
        font-size: 20px;
    }

    .stars-div .fa-star {
        color: #4CDB06;
    }

    .stars-div .fa-star-o {
        color: #B9B9B9;
    }

    .form-group input.form-control {
        color: #000 !important;
    }

    .form-group .prev-img-div img {
        height: 150px;
        width: 150px;
        object-fit: contain;
        margin-top: 15px;
    }
    .multiple-checkbox-div .multiple-checks {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }
    .multiple-checkbox-div .multiple-checks .form-check {
        width: 185px;
    }
    .multiple-checkbox-div .multiple-checks .form-check .form-check-label svg {
        margin-right: 3px;
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
                        <span>Add New Vehicle</span>
                        <a href="{{url('medical-other-services')}}" class="d-flex align-items-center gap-1 text-decoration-none">
                            <img src="{{asset('front/assets/img/backPage.png')}}" alt="">
                            <p class="mb-0 text-dark">Back</p>
                        </a>
                    </h5>
                    <div class="card-body">
                        <div class="form-div">
                            <form>
                                <div class="input-group mb-3">
                                    <div class="form-group d-flex flex-column w-100">
                                        <label class="form-label">Mercedes Benz</label>
                                        <select name="" id="">
                                            <option value="">BMW</option>
                                            <option value="">TATA</option>
                                            <option value="">TOYOTA</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="form-group d-flex flex-column w-100">
                                        <label class="form-label">Vehicle Model</label>
                                        <select name="" id="">
                                            <option value="">Vito 2.2 CDI</option>
                                            <option value="">Vito 2.2 CDI</option>
                                            <option value="">Vito 2.2 CDI</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="form-group d-flex flex-column w-100">
                                        <label class="form-label">Comfort Level</label>
                                        <select name="" id="">
                                            <option value="">Luxury</option>
                                            <option value="">Luxury</option>
                                            <option value="">Luxury</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mb-3 section-heading-div">
                                    <label class="form-label">Vehicle Per Day Price (VAT Included)</label>
                                    <div class="input-icon-div">
                                        <input type="text" class="form-control" placeholder="0">
                                        <span class="input-icon">₺</span>
                                    </div>
                                </div>

                                <div class="multiple-checkbox-div mb-5">
                                    <div class="form-group d-flex flex-column">
                                        <label class="form-label">Other Services</label>
                                        <div class="multiple-checks">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="fornosmoking">
                                                <label class="form-check-label fw-500 fsb-1" for="fornosmoking">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.66667 10.8333V14.1667M13.3333 4.16667V4.58333C13.3333 5.02536 13.5089 5.44928 13.8215 5.76184C14.134 6.07441 14.558 6.25 15 6.25C15.442 6.25 15.866 6.42559 16.1785 6.73816C16.4911 7.05072 16.6667 7.47464 16.6667 7.91667V8.33333M2.5 2.5L17.5 17.5M14.1667 10.8333H16.6667C16.8877 10.8333 17.0996 10.9211 17.2559 11.0774C17.4122 11.2337 17.5 11.4457 17.5 11.6667V13.3333C17.5 13.5667 17.4042 13.7775 17.25 13.9283M14.1667 14.1667H3.33333C3.11232 14.1667 2.90036 14.0789 2.74408 13.9226C2.5878 13.7663 2.5 13.5543 2.5 13.3333V11.6667C2.5 11.4457 2.5878 11.2337 2.74408 11.0774C2.90036 10.9211 3.11232 10.8333 3.33333 10.8333H10.8333" stroke="#111111" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                No Smoking</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="forwifi">
                                                <label class="form-check-label fw-500 fsb-1" for="forwifi">
                                                <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_353_6343)">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4214 1.95638C11.3285 0.7545 9.75232 0 7.99998 0C6.24763 0 4.67146 0.7545 3.57859 1.95638H12.4213H12.4214ZM3.57865 9.99438C4.67152 11.1962 6.2477 11.9508 8.00004 11.9508C9.75238 11.9508 11.3286 11.1962 12.4214 9.99438H3.57865ZM2.65464 2.46444C1.18908 2.46444 0.000976562 3.65269 0.000976562 5.1185V6.83225C0.000976562 8.298 1.18908 9.48625 2.65464 9.48625H13.3453C14.8109 9.48625 15.999 8.298 15.999 6.83225V5.1185C15.999 3.65269 14.8109 2.46444 13.3453 2.46444H2.65464ZM15.726 5.08819C15.726 3.78988 14.6737 2.73744 13.3756 2.73744H10.7219C9.4238 2.73744 8.37149 3.78988 8.37149 5.08813V6.87012C8.37149 8.16844 7.31919 9.22087 6.0211 9.22087H13.3756C14.6736 9.22087 15.7259 8.16838 15.7259 6.87012V5.08813L15.726 5.08819ZM6.50641 5.24731V7.75731H7.26457V5.24731H6.50641ZM6.43055 4.45494C6.43055 4.5746 6.47808 4.68936 6.56268 4.77398C6.64728 4.85859 6.76203 4.90613 6.88168 4.90613C7.00133 4.90613 7.11607 4.85859 7.20068 4.77398C7.28528 4.68936 7.33281 4.5746 7.33281 4.45494C7.33281 4.33528 7.28528 4.22051 7.20068 4.1359C7.11607 4.05129 7.00133 4.00375 6.88168 4.00375C6.76203 4.00375 6.64728 4.05129 6.56268 4.1359C6.47808 4.22051 6.43055 4.33528 6.43055 4.45494ZM1.3733 4.09481L2.35137 7.75731H2.98067L3.7162 5.22463L4.45161 7.75737H5.10365L6.06659 4.09481H5.33106L4.77007 6.50619L4.07253 4.09481H3.39774L2.70014 6.4455L2.16946 4.09481H1.3733ZM9.57703 4.09481V7.75731H10.3807V6.32419H12.2005V5.58106H10.3807V4.83794H12.3217V4.09481H9.57703ZM12.8676 5.24738V7.75737H13.6258V5.24738H12.8676ZM12.7994 4.44737C12.7994 4.56704 12.8469 4.6818 12.9315 4.76641C13.0161 4.85103 13.1309 4.89856 13.2505 4.89856C13.3702 4.89856 13.4849 4.85103 13.5695 4.76641C13.6541 4.6818 13.7016 4.56704 13.7016 4.44737C13.7016 4.32771 13.6541 4.21295 13.5695 4.12834C13.4849 4.04372 13.3702 3.99619 13.2505 3.99619C13.1309 3.99619 13.0161 4.04372 12.9315 4.12834C12.8469 4.21295 12.7994 4.32771 12.7994 4.44737Z" fill="black"/>
                                                    </g>
                                                    <defs>
                                                    <clipPath id="clip0_353_6343">
                                                    <rect width="16" height="12" fill="white"/>
                                                    </clipPath>
                                                    </defs>
                                                </svg>
                                                Wi-Fi</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="section-btns mb-4">
                                    <a href="javascript:void(0);" class="black-plate bg-black text-white fw-700 w-100">Save Acommodition</a>
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
<script>
    $(".mpOtherServicesLi").addClass("activeClass");
    $(".mpOtherServices").addClass("md-active");
</script>
@endsection