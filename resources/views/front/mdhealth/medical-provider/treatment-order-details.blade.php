@extends('front.layout.layout')
@section('content')
<style>
    .tab-div .nav.nav-tabs {
        display: flex;
        /* flex-wrap: nowrap; */
        gap: 12px;
        justify-content: flex-start !important;

    }


    .date-range-picker-div {
        position: relative;
        border: 2px solid #D6D6D6 !important;
        border-radius: 5px;
        padding: 10px 20px !important;
    }

    .date-range-picker-div input {
        position: absolute;
        width: 100%;
        left: 0px;
        top: 0;
        height: 100%;
        padding-left: 45px;
        z-index: 00;
        border: unset;
    }

    .date-range-picker-div .fa {
        position: relative;
        z-index: 9;
    }

    .payment-div .section-heading {
        margin-bottom: 10px !important;
    }

    .daterangepicker.opensleft:before {
        left: 9px !important;
    }

    .daterangepicker.opensleft:after {
        left: 10px !important;
    }

    .daterangepicker {
        left: 425.5px !important;
        right: unset !important;
    }

    .cstom-select-img {
        background-image: url('/front/assets/img/arrow-down-circle.svg');
        background-repeat: no-repeat;
        background-position: right;
        background-origin: content-box;
    }

    .treatment-dashboard-tab .btn-md {
        width: unset;
        height: unset;
    }

    .treatment-dashboard-tab .nav.nav-tabs {
        justify-content: space-between;
        gap: 34px;
    }

    .treatment-dashboard-tab .btn-md {
        width: unset;
        height: unset;
    }

    .treatment-dashboard-tab .nav-link {
        width: 228px !important;
        height: 47px;
        flex-shrink: 0;
        border-radius: 70px;
        border: 1px solid #000;
        /* background: #4CDB06; */
        /* padding: 15px 40px; */
        width: 240px;

        color: #000;
        text-align: center;
        font-family: Campton;
        font-size: 15px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        letter-spacing: -0.6px;
    }

    .treatment-dashboard-tab .nav-link.active,
    .treatment-dashboard-tab .nav-link:hover {
        border-bottom: 0;
        background-color: #4CDB06;
        border: 1px solid transparent !important;
    }

    .input-with-cross {
        position: relative;
    }

    .treatment-dashboard-tab .input-with-cross .fa-close {
        position: absolute;
        top: 9px;
        right: 10px;
        background: #FF9999;
        padding: 4px 5px;
        border-radius: 100%;
        font-size: 12px;
    }

    .example-div {
        border-bottom: 1px solid #4cdb06;
        padding-bottom: 35px;
        margin-bottom: 35px;
    }

    .example-div p {
        font-size: 14px;
    }

    [role=right-icon] {
        display: none;
    }

    .card-details h6 {
        font-size: 20px;
    }
</style>
<div class="content-wrapper">
    <div class="container py-100px for-cards order-details">
        <div class="d-flex gap-3">
            <div class="w-292">
                @include('front.includes.sidebar')
            </div>
            <div class="w-761">
                <!-- SALES DETAILS -->
                <div class="card mb-4">
                    <h5 class="card-header d-flex justify-content-between mb-2">
                        <div>
                            <span class="text-green">Treatment No:
                            </span>{{ !empty($patient_details['order_id']) ? $patient_details['order_id'] : '' }}
                            <h6>{{ !empty($patient_details['package']['package_name']) ? $patient_details['package']['package_name'] : '' }}
                            </h6>
                        </div>
                        <div>
                            <a href="{{ url('medical-provider-dashboard') }}" class="d-flex align-items-center gap-1 text-decoration-none">
                                <img src="{{ asset('front/assets/img/backPage.png') }}" alt="">
                                <p class="mb-0 card-h1 camptonBold">Back Dashboard</p>
                            </a>
                        </div>
                    </h5>

                    <div class="card-body">
                        <div class="tab-div treatment-dashboard-tab">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item " role="presentation">
                                    <button class=" nav-link active btn btn-md btn-text" id="patient-details-tab" data-bs-toggle="tab" data-bs-target="#patient-details" type="button" role="tab" aria-controls="patient-details" aria-selected="true">Patient Details</button>
                                </li>
                                <li class="nav-item " role="presentation">
                                    <button class=" nav-link btn btn-md btn-text" id="patient-package-details-tab" data-bs-toggle="tab" data-bs-target="#patient-package-details" type="button" role="tab" aria-controls="patient-package-details" aria-selected="true">Package Details</button>
                                       
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="btn btn-md btn-text nav-link camptonBook" style="width:165px !important;background: #D9D9D9;border-color:#D9D9D9" id="patient-message-tab" data-bs-toggle="tab" data-bs-target="#patient-message" role="tab" aria-controls="patient-message" aria-selected="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 21 21" fill="none">
                                            <path d="M7 7.875H14M7 11.375H10.0625M9.1875 17.0625L7.875 15.75H5.25C4.55381 15.75 3.88613 15.4734 3.39384 14.9812C2.90156 14.4889 2.625 13.8212 2.625 13.125V6.125C2.625 5.42881 2.90156 4.76113 3.39384 4.26884C3.88613 3.77656 4.55381 3.5 5.25 3.5H15.75C16.4462 3.5 17.1139 3.77656 17.6062 4.26884C18.0984 4.76113 18.375 5.42881 18.375 6.125V9.625" stroke="#111111" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M15.7501 19.2497L18.6814 16.3762C18.8611 16.2017 19.0041 15.9931 19.1019 15.7625C19.1996 15.5319 19.2502 15.284 19.2506 15.0335C19.251 14.7831 19.2013 14.535 19.1042 14.3041C19.0072 14.0732 18.8649 13.8641 18.6857 13.689C18.3201 13.3315 17.8293 13.1308 17.3179 13.1298C16.8064 13.1288 16.3149 13.3276 15.9479 13.6838L15.7519 13.8763L15.5567 13.6838C15.1911 13.3265 14.7005 13.126 14.1893 13.125C13.6781 13.124 13.1867 13.3226 12.8197 13.6785C12.6399 13.8529 12.4969 14.0615 12.399 14.2921C12.3012 14.5227 12.2505 14.7705 12.25 15.021C12.2495 15.2715 12.2992 15.5195 12.3962 15.7505C12.4931 15.9814 12.6354 16.1906 12.8145 16.3657L15.7501 19.2497Z" stroke="#111111" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Message</button>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="patient-details" role="tabpanel" aria-labelledby="patient-details-tab">
                                    <div class="py-3">
                                        <div class="row gy-4 card-details" style="width: 100% !important;">
                                            <div class="col-md-6">
                                                <label for="firstName">First Name</label>
                                                <p>{{ !empty($patient_details['customer']['first_name']) ? $patient_details['customer']['first_name'] : '' }}
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="lastName">Last Name</label>
                                                <p>{{ !empty($patient_details['customer']['last_name']) ? $patient_details['customer']['last_name'] : '' }}
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="contactNo">Contact Number</label>
                                                <p>{{ !empty($patient_details['customer']['phone']) ? $patient_details['customer']['phone'] : '' }}
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email">E-mail</label>
                                                <p>{{ !empty($patient_details['customer']['email']) ? $patient_details['customer']['email'] : '' }}
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="address">Address</label>
                                                <p class="d-flex flex-column gap-3">
                                                    <span>{{ !empty($patient_details['customer']['address']) ? $patient_details['customer']['address'] : '' }}</span>
                                                    <span>{{ !empty($patient_details['customer']['city']['city_name']) ? $patient_details['customer']['city']['city_name'] : '' }}
                                                        /
                                                        {{ !empty($patient_details['customer']['city']['city_name']) ? $patient_details['customer']['country']['country_name'] : '' }}</span>
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="address">Invoice Address</label>
                                                <p class="d-flex flex-column gap-3">
                                                    <span>{{ !empty($patient_details['customer']['address']) ? $patient_details['customer']['address'] : '' }}</span>
                                                    <span>{{ !empty($patient_details['customer']['city']['city_name']) ? $patient_details['customer']['city']['city_name'] : '' }}
                                                        /
                                                        {{ !empty($patient_details['customer']['city']['city_name']) ? $patient_details['customer']['country']['country_name'] : '' }}</span>
                                                </p>
                                            </div>



                                            <div class="col-md-6">
                                                <div class="payment-div mb-4">
                                                    <h6 class="card-h1">Payment Info</h6>
                                                    <h5 class="mb-1">via Credit / Debit Card ( {{ !empty($payment_details['card_no']) ? str_repeat('*', strlen($payment_details['card_no']) - 4) . substr($payment_details['card_no'], -4) : '' }}
                                                        )</h5>

                                                    <h3 class="my-0 campton fw-bold"><i>3D Secure</i> - {{!empty($payment_details['payment_percentage'])?$payment_details['payment_percentage']:0}} Payment</h3>
                                                </div>
                                                <div class="payment-div mb-4">
                                                    <h4 class="mb-0">First Payment - {{!empty($payment_details['payment_percentage'])?$payment_details['payment_percentage']:0}}</h4>
                                                    <h3 class="campton fw-bold my-0">Payment Date: {{ !empty($payment_details['created_at']) ?  date('Y-m-d', strtotime($payment_details['created_at'])) : '' }}
                                                    </h3>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3 align-self-end">
                                                <div class="request-btn-div">
                                                    <p class="mb-0 text-end">Remaining: <b>{{!empty($payment_details['pending_payment'])?$payment_details['pending_payment']:''}} <span class="lira">₺</span></b></p>
                                                    <div class="section-btns pt-2 justify-content-end">
                                                        <a href="javascript:void(0);" class="green-plate bg-green card-h1 fs-15 w-75">Request Payment</a>
                                                            
                                                    </div>
                                                </div>
                                            </div>

                                            <form method="POST" action="{{ route('status.date.store') }}">
                                                @csrf

                                                <input type="hidden" name="treatment_purchage_id" value="{{ !empty($patient_details['id']) ? $patient_details['id'] : '' }}">
                                                <div class="col-md-12 mb-4">
                                                    <h6 class="section-heading">Treatment Start Date</h6>
                                                    <!-- <div id="reportrange" class="date-range-picker-div" name="daterange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%"> -->
                                                    <div>
                                                        <!-- <i class="fa fa-calendar"></i>&nbsp; -->
                                                        <input type="text" id="datepicker" class="form-control" style="border: 2px solid #d6d6d6;" name="treatment_start_date" value="{{ !empty($patient_details['treatment_start_date']) ? $patient_details['treatment_start_date'] : '' }}" />

                                                    </div>
                                                </div>


                                                {{-- {{dd(!empty($patient_details['purchase_type'])?$patient_details['purchase_type']:'')}} --}}

                                                <div class="col-md-12 mb-3">
                                                    <div class="form-group d-flex flex-column">
                                                        <h4 class="text-dark">Status</h4>
                                                        <select name="treatment_status" id="" class="form-control cstom-select-img">
                                                            <option value="pending" {{ !empty($patient_details['purchase_type']) && $patient_details['purchase_type'] == 'pending' ? 'selected' : '' }}>
                                                                Pending</option>
                                                            <option value="in_progress" {{ !empty($patient_details['purchase_type']) && $patient_details['purchase_type'] == 'in_progress' ? 'selected' : '' }}>
                                                                In Progress</option>
                                                            <option value="completed" {{ !empty($patient_details['purchase_type']) && $patient_details['purchase_type'] == 'completed' ? 'selected' : '' }}>
                                                                Complete</option>
                                                            <option value="cancelled" {{ !empty($patient_details['purchase_type']) && $patient_details['purchase_type'] == 'cancelled' ? 'selected' : '' }}>
                                                                Cancel</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="section-btns pt-2">
                                                        <button type="submit" class="black-plate text-light w-100 btn fsb-1" style="background-color: #000002;">Save Changes</button>
                                                    </div>
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="patient-package-details" role="tabpanel" aria-labelledby="patient-package-details-tab">
                                    <div class="py-3">
                                        <div class="col-md-12 mb-3">
                                            <div class="payment-div mb-4">
                                                <h6 class="section-heading">Treatment Details</h6>
                                                <h6>{{ !empty($patient_details['package']['package_name']) ? $patient_details['package']['package_name'] : '' }}
                                                </h6>
                                                <h6 class="fsb-2 mb-0 fst-italic d-flex align-items-center gap-1">
                                                    <svg width="13" height="15" viewBox="0 0 13 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.21458 1.41667V0H8.46458V1.41667H4.21458ZM4.92292 9.73958L4.14375 8.18125C4.08472 8.05139 3.99618 7.95388 3.87812 7.88871C3.76007 7.82354 3.63611 7.79119 3.50625 7.79167H0C0.177083 6.19792 0.867708 4.85492 2.07187 3.76267C3.27604 2.67042 4.69861 2.12453 6.33958 2.125C7.07153 2.125 7.77396 2.24306 8.44687 2.47917C9.11979 2.71528 9.75139 3.05764 10.3417 3.50625L11.3333 2.51458L12.325 3.50625L11.3333 4.49792C11.7111 4.99375 12.0122 5.51626 12.2365 6.06546C12.4608 6.61465 12.6083 7.19006 12.6792 7.79167H9.61562L8.39375 5.34792C8.26389 5.07639 8.05139 4.94062 7.75625 4.94062C7.46111 4.94062 7.24861 5.07639 7.11875 5.34792L4.92292 9.73958ZM6.33958 14.875C4.69861 14.875 3.27604 14.3289 2.07187 13.2366C0.867708 12.1444 0.177083 10.8016 0 9.20833H3.06354L4.28542 11.6521C4.41528 11.9236 4.62778 12.0594 4.92292 12.0594C5.21806 12.0594 5.43055 11.9236 5.56042 11.6521L7.75625 7.26042L8.53542 8.81875C8.59444 8.94861 8.68299 9.04612 8.80104 9.11129C8.9191 9.17646 9.04306 9.20881 9.17292 9.20833H12.6792C12.5021 10.8021 11.8115 12.1448 10.6073 13.2366C9.40312 14.3284 7.98056 14.8745 6.33958 14.875Z" fill="#111111" />
                                                    </svg>
                                                    {{ !empty($patient_details['treatment_start_date']) ? $patient_details['treatment_start_date'] : 'Date is empty' }}
                                                    {{-- {{ !empty($patient_details['treatment_start_date']) ? \Carbon\Carbon::createFromFormat('d/m/Y', $patient_details['treatment_start_date'])->format('j F Y') : '' }} --}}



                                                    {{-- {{!empty($patient_details['treatment_start_date'])?$patient_details['treatment_start_date']:''}} --}}

                                                    {{-- 12 December 2023 - 19 December 2023 --}}
                                                </h6>
                                            </div>
                                        </div>


                                        <form method="POST" action="{{ route('assign.case.manager') }}">

                                            @csrf
                                            <input type="hidden" name="purchage_id" value="{{ !empty($patient_details['id']) ? $patient_details['id'] : '' }}">

                                            <div class="col-md-12 mb-3 payment-div">
                                                <h6 class="section-heading mb-1">Case Details</h6>
                                                <h6>Assign Case Manager</h6>
                                                <div class="input-with-cross mb-3">
                                                    <select class="form-control" name="case_manager_id" id="" aria-describedby="">
                                                        <option value="">Select case manager</option>
                                                        @if(!empty($case_manager))
                                                        @foreach ($case_manager as $manager)
                                                        <option value="{{ !empty($manager['id']) ? $manager['id'] : '' }}">
                                                            {{ !empty($manager['company_name']) ? $manager['company_name'] : '' }}
                                                        </option>
                                                        @endforeach
                                                        @endif

                                                        <!-- Add more options as needed -->
                                                    </select>
                                                    {{-- <i class="fa fa-close"></i> --}}
                                                    <div class="for-icon-text">
                                                    </div>
                                                </div>

                                                <div class="example-div">
                                                    <p class="mb-0"><b>Case
                                                            Manager:</b>{{ !empty($patient_details['case_manager']['name']) ? $patient_details['case_manager']['name'] : '' }}
                                                    </p>
                                                    <p class="mb-0"><b>Case No <span class="text-green">#{{ !empty($patient_details['case_no']) ? $patient_details['case_no'] : '' }}</span>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-3 payment-div">
                                                <h6 class="section-heading mb-1">Accommodation Details</h6>
                                                {{-- <h6>Assign Hotel</h6> --}}
                                                {{-- <div class="input-with-cross mb-3">
                                                        <input type="text" name="hotel_id" class="form-control"
                                                            id="" aria-describedby=""
                                                            placeholder="Renaissence Hotel Besiktas">
                                                        <i class="fa fa-close"></i>
                                                    </div>--}}

                                                <div class="form-group d-flex flex-column mb-2">
                                                    <h6>Assign Hotel</h6>
                                                    <select name="vehicle_id" id="" class="cstom-select-img form-control">

                                                        <option value="">Select hotel</option>
                                                        @if(!empty($hotel_lists))
                                                        @foreach ($hotel_lists as $hotel)
                                                        <option value="{{ !empty($hotel['id']) ? $hotel['id'] : '' }}">
                                                            {{ !empty($hotel['hotel_name']) ? $hotel['hotel_name'] : '' }}
                                                        </option>
                                                        @endforeach
                                                        @endif

                                                        {{-- <option value="2">Mercedes Vito 7+1 VIP Diesel</option>
                                                            <option value="3">Mercedes Vito 7+1 VIP Diesel</option> --}}
                                                    </select>
                                                </div>

                                                {{-- {{dd($patient_details['hotel']['distance_from_hospital'])}} --}}

                                                <div class="example-div">
                                                    <p class="mb-1">
                                                        <b>Hotel:</b>{{ !empty($patient_details['hotel']['hotel_name']) ? $patient_details['hotel']['hotel_name'] : '' }}
                                                        <span class="text-green">{{ !empty($patient_details['hotel']['hotel_address']) ? $patient_details['hotel']['hotel_address'] : '' }}</span>
                                                    </p>
                                                    <div class="for-icon-text">
                                                        <p class="mb-1 fst-italic fw-500 d-flex align-items-center gap-2">
                                                            <svg width="16" height="14" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.6347 1.89601e-06C10.9916 -0.00083649 11.2739 0.27646 11.2747 0.646188L11.2755 1.27641C13.5914 1.45791 15.1212 3.03597 15.1237 5.45601L15.1328 12.5397C15.1361 15.1782 13.4785 16.8016 10.8215 16.8058L4.33125 16.8142C1.69084 16.8176 0.012462 15.1555 0.0091418 12.5094L5.57173e-06 5.50895C-0.00330907 3.07295 1.47253 1.49908 3.7884 1.28649L3.78757 0.656271C3.78674 0.286543 4.06066 0.00840671 4.42588 0.00840671C4.79111 0.00756642 5.06503 0.284862 5.06586 0.65459L5.06669 1.24279L9.99723 1.23607L9.9964 0.647868C9.99557 0.27814 10.2695 0.000844092 10.6347 1.89601e-06ZM10.9734 11.9313H10.9651C10.5833 11.9405 10.277 12.2607 10.2853 12.6472C10.2861 13.0338 10.594 13.3522 10.9759 13.3606C11.3652 13.3598 11.6806 13.0396 11.6798 12.6447C11.6798 12.2498 11.3635 11.9313 10.9734 11.9313ZM4.1337 11.9321C3.75187 11.9489 3.45305 12.2691 3.45388 12.6556C3.47131 13.0422 3.78674 13.3447 4.16856 13.327C4.54292 13.3102 4.84091 12.9901 4.82348 12.6035C4.81518 12.2254 4.50723 11.9313 4.1337 11.9321ZM7.55354 11.9279C7.17171 11.9456 6.87372 12.2649 6.87372 12.6514C6.89115 13.038 7.20658 13.3396 7.5884 13.3228C7.96193 13.3052 8.26075 12.9859 8.24332 12.5985C8.23502 12.2212 7.92707 11.9271 7.55354 11.9279ZM4.12955 8.90709C3.74772 8.92389 3.44973 9.24404 3.45056 9.63058C3.46716 10.0171 3.78342 10.3196 4.16524 10.302C4.53877 10.2852 4.83676 9.96501 4.81933 9.57848C4.81103 9.20035 4.50391 8.90625 4.12955 8.90709ZM7.55022 8.87768C7.16839 8.89448 6.86957 9.21463 6.8704 9.60117C6.887 9.9877 7.20326 10.2894 7.58508 10.2726C7.95861 10.2549 8.2566 9.9356 8.24 9.54907C8.23087 9.17094 7.92375 8.87684 7.55022 8.87768ZM10.9701 8.88188C10.5882 8.89028 10.2894 9.20119 10.2902 9.58772V9.59697C10.2985 9.9835 10.614 10.2768 10.9966 10.2684C11.3701 10.2591 11.6681 9.93897 11.6598 9.55243C11.6424 9.1827 11.3428 8.88104 10.9701 8.88188ZM9.99889 2.53012L5.06835 2.53684L5.06918 3.21664C5.06918 3.5788 4.79609 3.8645 4.43086 3.8645C4.06564 3.86534 3.79089 3.58048 3.79089 3.21832L3.79006 2.57129C2.17144 2.73347 1.27581 3.68468 1.2783 5.50727L1.27913 5.7686L13.8462 5.7518V5.45769C13.8105 3.65107 12.9041 2.70322 11.2772 2.56205L11.278 3.20908C11.278 3.5704 10.9966 3.85694 10.6397 3.85694C10.2745 3.85778 9.99972 3.57208 9.99972 3.21076L9.99889 2.53012Z" fill="black" />
                                                            </svg>
                                                            12 December 2023 - 14 December 2023
                                                        </p>
                                                    </div>
                                                    <div class="for-icon-text">
                                                        <p class="mb-1 fst-italic fw-500 d-flex align-items-center gap-2">
                                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11.083 4.08366H6.41634V8.16699H1.74967V2.91699H0.583008V11.667H1.74967V9.91699H12.2497V11.667H13.4163V6.41699C13.4163 5.79815 13.1705 5.20466 12.7329 4.76708C12.2953 4.32949 11.7018 4.08366 11.083 4.08366ZM4.08301 7.58366C4.54714 7.58366 4.99226 7.39928 5.32044 7.0711C5.64863 6.74291 5.83301 6.29779 5.83301 5.83366C5.83301 5.36953 5.64863 4.92441 5.32044 4.59622C4.99226 4.26803 4.54714 4.08366 4.08301 4.08366C3.61888 4.08366 3.17376 4.26803 2.84557 4.59622C2.51738 4.92441 2.33301 5.36953 2.33301 5.83366C2.33301 6.29779 2.51738 6.74291 2.84557 7.0711C3.17376 7.39928 3.61888 7.58366 4.08301 7.58366Z" fill="#111111" />
                                                            </svg>
                                                            1 Adult
                                                        </p>
                                                    </div>
                                                    <div class="for-icon-text">
                                                        <p class="mb-1 fst-italic fw-500 d-flex align-items-center gap-2">
                                                            <svg width="10" height="14" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M4.95833 6.72917C4.48868 6.72917 4.03826 6.5426 3.70617 6.2105C3.37407 5.87841 3.1875 5.42799 3.1875 4.95833C3.1875 4.48868 3.37407 4.03826 3.70617 3.70617C4.03826 3.37407 4.48868 3.1875 4.95833 3.1875C5.42799 3.1875 5.87841 3.37407 6.2105 3.70617C6.5426 4.03826 6.72917 4.48868 6.72917 4.95833C6.72917 5.19088 6.68336 5.42115 6.59437 5.636C6.50538 5.85085 6.37494 6.04606 6.2105 6.2105C6.04606 6.37494 5.85085 6.50538 5.636 6.59437C5.42115 6.68336 5.19088 6.72917 4.95833 6.72917ZM4.95833 0C3.6433 0 2.38213 0.522394 1.45226 1.45226C0.522394 2.38213 0 3.6433 0 4.95833C0 8.67708 4.95833 14.1667 4.95833 14.1667C4.95833 14.1667 9.91667 8.67708 9.91667 4.95833C9.91667 3.6433 9.39427 2.38213 8.46441 1.45226C7.53454 0.522394 6.27337 0 4.95833 0Z" fill="#111111" />
                                                            </svg>
                                                            Distance to hospital <span class="fw-800">{{!empty($patient_details['hotel']['distance_from_hospital'])?$patient_details['hotel']['distance_from_hospital']:''}}KM</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <h6 class="section-heading">Transportation Details</h6>
                                                <div class="form-group d-flex flex-column mb-2">
                                                    <h6>Assign Vehicle</h6>
                                                    <select name="vehicle_id" id="" class="cstom-select-img form-control">
                                                        <option value="1">Select Vehicle</option>
                                                        @if(!empty($vehicle_list))
                                                        @foreach ($vehicle_list as $vehicle)
                                                        <option value="{{ !empty($vehicle['id']) ? $vehicle['id'] : '' }}">
                                                            {{ !empty($vehicle['vehicle_model_name']) ? $vehicle['vehicle_model_name'] : '' }}
                                                        </option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="example-div">
                                                    <p class="mb-2"><span class="fw-800">Vehicle:</span> <span class="fw-500">{{ !empty($patient_details['vehical']['vehicle_model_id']) ? $patient_details['vehical']['vehicle_model_id'] : '' }}</span>
                                                    </p>
                                                    <div class="for-icon-text d-flex gap-4">

                                                        <p class="mb-1 fw-500 d-flex align-items-center gap-2">
                                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M7.50016 15.8329H12.5002V17.4996H7.50016C5.20016 17.4996 3.3335 15.6329 3.3335 13.3329V5.83294H5.00016V13.3329C5.00016 14.7163 6.11683 15.8329 7.50016 15.8329ZM8.6835 4.50794C9.3335 3.85794 9.3335 2.79961 8.6835 2.14961C8.0335 1.49961 6.97516 1.49961 6.32516 2.14961C5.67516 2.79961 5.67516 3.85794 6.32516 4.50794C6.97516 5.16628 8.02516 5.16628 8.6835 4.50794ZM9.5835 7.49961C9.5835 6.58294 8.8335 5.83294 7.91683 5.83294H7.50016C6.5835 5.83294 5.8335 6.58294 5.8335 7.49961V12.4996C5.8335 13.8829 6.95016 14.9996 8.3335 14.9996H12.5585L15.4752 17.9163L16.6668 16.7246L12.4418 12.4996H9.5835V7.49961Z" fill="#111111" />
                                                            </svg>
                                                            7+1
                                                        </p>

                                                        <p class="mb-1 fw-500 d-flex align-items-center gap-2">
                                                            <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M0 0H2.5C2.73333 0 2.94167 0.0916666 3.09167 0.241667L4.825 1.98333L5.49167 1.325C5.83333 1 6.25 0.833333 6.66667 0.833333H11.6667C12.0833 0.833333 12.5 1 12.8417 1.325L13.675 2.15833C14 2.5 14.1667 2.91667 14.1667 3.33333V14.1667C14.1667 14.6087 13.9911 15.0326 13.6785 15.3452C13.3659 15.6577 12.942 15.8333 12.5 15.8333H4.16667C3.72464 15.8333 3.30072 15.6577 2.98816 15.3452C2.67559 15.0326 2.5 14.6087 2.5 14.1667V5C2.5 4.58333 2.66667 4.16667 2.99167 3.825L3.65 3.15833L2.15833 1.66667H0V0ZM6.66667 2.5V4.16667H11.6667V2.5H6.66667ZM7.00833 7.5L5.34167 5.83333H4.16667V7.00833L5.83333 8.675V11.325L4.16667 12.9917V14.1667H5.34167L7.00833 12.5H9.65833L11.325 14.1667H12.5V12.9917L10.8333 11.325V8.675L12.5 7.00833V5.83333H11.325L9.65833 7.5H7.00833ZM7.5 9.16667H9.16667V10.8333H7.5V9.16667Z" fill="#111111" />
                                                            </svg>
                                                            Diesel
                                                        </p>

                                                        <p class="mb-1 fw-500 d-flex align-items-center gap-2">
                                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6.66667 10.8333V14.1667M13.3333 4.16667V4.58333C13.3333 5.02536 13.5089 5.44928 13.8215 5.76184C14.134 6.07441 14.558 6.25 15 6.25C15.442 6.25 15.866 6.42559 16.1785 6.73816C16.4911 7.05072 16.6667 7.47464 16.6667 7.91667V8.33333M2.5 2.5L17.5 17.5M14.1667 10.8333H16.6667C16.8877 10.8333 17.0996 10.9211 17.2559 11.0774C17.4122 11.2337 17.5 11.4457 17.5 11.6667V13.3333C17.5 13.5667 17.4042 13.7775 17.25 13.9283M14.1667 14.1667H3.33333C3.11232 14.1667 2.90036 14.0789 2.74408 13.9226C2.5878 13.7663 2.5 13.5543 2.5 13.3333V11.6667C2.5 11.4457 2.5878 11.2337 2.74408 11.0774C2.90036 10.9211 3.11232 10.8333 3.33333 10.8333H10.8333" stroke="#111111" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                            No Smoking
                                                        </p>

                                                        <p class="mb-1 fw-500 d-flex align-items-center gap-2">
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
                                                            Wi-Fi
                                                        </p>
                                                    </div>
                                                    <div class="for-icon-text">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <div class="form-group d-flex flex-column mb-2">
                                                    <h6>Status</h6>
                                                    <select name="purchase_type" id="" class="cstom-select-img form-control">
                                                        <option value="pending" {{ !empty($patient_details['purchase_type']) && $patient_details['purchase_type'] == 'pending' ? 'selected' : '' }}>
                                                            Pending</option>
                                                        <option value="in_progress" {{ !empty($patient_details['purchase_type']) && $patient_details['purchase_type'] == 'in_progress' ? 'selected' : '' }}>
                                                            In Progress</option>
                                                        <option value="completed" {{ !empty($patient_details['purchase_type']) && $patient_details['purchase_type'] == 'completed' ? 'selected' : '' }}>
                                                            Complete</option>
                                                        <option value="cancelled" {{ !empty($patient_details['purchase_type']) && $patient_details['purchase_type'] == 'cancelled' ? 'selected' : '' }}>
                                                            Cancel</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="section-btns pt-2">
                                                    <button type="submit" class="green-plate bg-dark text-white fw-700 w-100">Save
                                                        Changes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="patient-message" role="tabpanel" aria-labelledby="patient-message-tab">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- SALES DETAILS END -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(".mpSalesLi").addClass("activeClass");
    $(".mpSales").addClass("md-active");

    // Datepicker
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap5',
        weekStartDay: 1,
        // showRightIcon: true,
        format: 'dd mmm yyyy',

    });
</script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> -->
<script>
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                .format('YYYY-MM-DD'));
        });
    });
</script>
@endsection