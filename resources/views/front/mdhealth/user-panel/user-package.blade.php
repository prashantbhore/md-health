@section('php')
    @php
        // $my_active_packages_list;
        // $my_completed_packages_list;
        // $my_cancelled_packages_list;
        //dd($my_active_packages_list);
        $patient_information_list = !empty($patient_information_list[0]) ? $patient_information_list[0] : '';

        if (!function_exists('extractNumericRange')) {
            function extractNumericRange($inputString)
            {
                // Use regular expression to match the numeric range
                preg_match('/\b\d+-\d+\b/', $inputString, $matches);

                // Check if a match is found
                if (!empty($matches)) {
                    return $matches[0];
                }

                // Return null if no match is found
                return null;
            }
        }
    @endphp
@endsection
@extends('front.layout.layout2')
@section('content')
    <style>
        .user-res-p8 {
            color: #979797;
            font-family: Campton;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            letter-spacing: -0.64px;
        }

        .form-control {
            font-family: "Campton" !important;
        }

        .user-package-tab .treatment-card img {
            width: 105px;
        }

        .treatment-card-btns {
            border-bottom: 1px solid #bebebe;
            margin-bottom: 20px;
            padding-bottom: 20px;
        }

        .modal-header {
            display: block;
            padding: 2rem;
        }

        .modal-content {
            border-radius: 10px;
        }

        .modal-header .btn-close {
            position: absolute;
            opacity: 1;
            padding: 5px;
        }


        .modal-body input.form-check-input {
            border: 1px solid #D6D6D6;
            margin: 0px;
        }

        .modal-body {
            padding: 1rem 2rem 4rem;
        }

        .modal-body .order-completed-btn {
            padding: 12px 20px;
            width: 70%;
        }

        #flexCheckChecked-error {
            position: absolute;
            top: 24px;
            left: 32px;
        }

        .selectable {
            color: green !important;
        }

        .star {
            display: inline-block;
            height: 12px;
            width: 12px;
            border-radius: 50%;
            background: #B9B9B9;
            line-height: 30px;
            text-align: center;
        }
    </style>
    <div class="content-wrapper">
        <div class="container py-135px for-cards">
            <div class="d-flex gap-3">
                <div class="w-292">
                    @include('front.includes.sidebar-user')
                </div>
                <div class="w-761">

                    <div class="card panel-right">
                        <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                            Packages
                        </h5>
                        <div class="card-body">
                            <div class="tab-div user-package-tab">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="user-tab" data-bs-toggle="tab"
                                            data-bs-target="#user" type="button" role="tab" aria-controls="user"
                                            aria-selected="true">Active</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="user-completed-tab" data-bs-toggle="tab"
                                            data-bs-target="#user-completed" type="button" role="tab"
                                            aria-controls="user-completed" aria-selected="false">Completed</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="user-cancelled-tab" data-bs-toggle="tab"
                                            data-bs-target="#user-cancelled" type="button" role="tab"
                                            aria-controls="user-cancelled" aria-selected="false">Cancelled</button>
                                    </li>
                                </ul>

                                <div class="filter-div">
                                    <div class="search-div">
                                        <input type="text" placeholder="Search">
                                    </div>
                                    <div class="list-div">
                                        <select name="" id="">
                                            <option value="">List for Date</option>
                                            <option value="">List for Stars</option>
                                            <option value="">List for Price</option>
                                            <option value="">List for Distance</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Tab panes -->
                                <div class="tab-content " id="myTabContent">
                                    <div class="tab-pane fade show active" id="user" role="tabpanel"
                                        aria-labelledby="user-tab">
                                        @if (!empty($my_active_packages_list))
                                            @foreach ($my_active_packages_list as $key => $active_package)
                                                <div class="card shadow-none mb-3 pkgCard">
                                                    <div class="card-body d-flex gap-3 w-100 p-3">
                                                        <div class="df-center">
                                                            <img src="{{ asset($active_package['company_logo_image_path']) }}"
                                                                alt="" class="md-img">
                                                            <!-- <img src="{{ asset('front/assets/img/packageImg.png') }}" alt="" class="pkgImg"> -->
                                                        </div>
                                                        <div class="df-column">
                                                            <h5 class="mb-0 card-h4">
                                                                {{ !empty($active_package['company_name']) ? $active_package['company_name'] : '' }}
                                                            </h5>

                                                            <h6 class="card-h1">
                                                                {{ !empty($active_package['package_name']) ? $active_package['package_name'] : '' }}

                                                            </h6>

                                                            <div class="d-flex align-items-center gap-5 mb-3">
                                                                <p class="fsb-2 mb-0 d-flex align-items-center gap-1">
                                                                    <svg width="10" height="15" viewBox="0 0 10 15"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M4.95833 6.72917C4.48868 6.72917 4.03826 6.5426 3.70617 6.2105C3.37407 5.87841 3.1875 5.42799 3.1875 4.95833C3.1875 4.48868 3.37407 4.03826 3.70617 3.70617C4.03826 3.37407 4.48868 3.1875 4.95833 3.1875C5.42799 3.1875 5.87841 3.37407 6.2105 3.70617C6.5426 4.03826 6.72917 4.48868 6.72917 4.95833C6.72917 5.19088 6.68336 5.42115 6.59437 5.636C6.50538 5.85085 6.37494 6.04606 6.2105 6.2105C6.04606 6.37494 5.85085 6.50538 5.636 6.59437C5.42115 6.68336 5.19088 6.72917 4.95833 6.72917ZM4.95833 0C3.6433 0 2.38213 0.522394 1.45226 1.45226C0.522394 2.38213 0 3.6433 0 4.95833C0 8.67708 4.95833 14.1667 4.95833 14.1667C4.95833 14.1667 9.91667 8.67708 9.91667 4.95833C9.91667 3.6433 9.39427 2.38213 8.46441 1.45226C7.53454 0.522394 6.27337 0 4.95833 0Z"
                                                                            fill="#111111" />
                                                                    </svg>
                                                                    {{ !empty($active_package['city_name']) ? $active_package['city_name'] : '' }}
                                                                </p>
                                                                <p class="mb-0 d-flex align-items-center gap-1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                        height="15" viewBox="0 0 14 15" fill="none">
                                                                        <path
                                                                            d="M4.83372 1.41667V0H9.08372V1.41667H4.83372ZM5.54206 9.73958L4.76289 8.18125C4.70386 8.05139 4.61532 7.95388 4.49727 7.88871C4.37921 7.82354 4.25525 7.79119 4.12539 7.79167H0.619141C0.796224 6.19792 1.48685 4.85492 2.69102 3.76267C3.89518 2.67042 5.31775 2.12453 6.95872 2.125C7.69067 2.125 8.3931 2.24306 9.06602 2.47917C9.73893 2.71528 10.3705 3.05764 10.9608 3.50625L11.9525 2.51458L12.9441 3.50625L11.9525 4.49792C12.3303 4.99375 12.6313 5.51626 12.8556 6.06546C13.0799 6.61465 13.2275 7.19006 13.2983 7.79167H10.2348L9.01289 5.34792C8.88303 5.07639 8.67053 4.94062 8.37539 4.94062C8.08025 4.94062 7.86775 5.07639 7.73789 5.34792L5.54206 9.73958ZM6.95872 14.875C5.31775 14.875 3.89518 14.3289 2.69102 13.2366C1.48685 12.1444 0.796224 10.8016 0.619141 9.20833H3.68268L4.90456 11.6521C5.03442 11.9236 5.24692 12.0594 5.54206 12.0594C5.8372 12.0594 6.0497 11.9236 6.17956 11.6521L8.37539 7.26042L9.15456 8.81875C9.21358 8.94861 9.30213 9.04612 9.42018 9.11129C9.53824 9.17646 9.6622 9.20881 9.79206 9.20833H13.2983C13.1212 10.8021 12.4306 12.1448 11.2264 13.2366C10.0223 14.3284 8.5997 14.8745 6.95872 14.875Z"
                                                                            fill="#111111" />
                                                                    </svg>
                                                                    <i>{{ !empty($active_package['treatment_period_in_days']) ? 'Treatment Period ' . extractNumericRange($active_package['treatment_period_in_days']) . ' days' : '' }}</i>
                                                                </p>
                                                            </div>
                                                            @if (!empty($active_package['treatment_start_date']))
                                                                <h6 class="card-p1 fw-bold mt-4">Time left to treatment:
                                                                    {{ !empty($active_package['treatment_start_date']) ? $active_package['treatment_start_date'] : '' }}
                                                                    days
                                                                </h6>
                                                            @endif
                                                        </div>
                                                        <div class="ms-auto pkgMsg">
                                                            <a href="javascript:;"
                                                                class="d-flex align-items-center gap-1 md-gray">
                                                                <svg width="20" height="20" viewBox="0 0 20 20"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M1.66699 7.49501C1.66655 6.83851 1.79562 6.18837 2.0468 5.58183C2.29798 4.97528 2.66634 4.42424 3.13078 3.96026C3.59523 3.49628 4.14664 3.12847 4.75344 2.8779C5.36023 2.62733 6.0105 2.49891 6.66699 2.50001H13.3337C16.0945 2.50001 18.3337 4.74584 18.3337 7.49501V17.5H6.66699C3.90616 17.5 1.66699 15.2542 1.66699 12.505V7.49501ZM16.667 15.8333V7.49501C16.6648 6.61209 16.3127 5.76604 15.6879 5.14219C15.0632 4.51834 14.2166 4.16755 13.3337 4.16667H6.66699C6.22937 4.16558 5.79583 4.25088 5.39124 4.4177C4.98665 4.58451 4.61898 4.82955 4.30929 5.13877C3.99961 5.44799 3.75402 5.8153 3.5866 6.21963C3.41918 6.62397 3.33322 7.05738 3.33366 7.49501V12.505C3.33586 13.3879 3.68792 14.234 4.31271 14.8578C4.93749 15.4817 5.78407 15.8325 6.66699 15.8333H16.667ZM11.667 9.16667H13.3337V10.8333H11.667V9.16667ZM6.66699 9.16667H8.33366V10.8333H6.66699V9.16667Z"
                                                                        fill="#828282" />
                                                                </svg>
                                                                <span class="text-decoration-underline">Message</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                @if (!empty($active_package['package_id']) && !empty($active_package['purchase_id']))
                                                    <div class="treatment-card-btns d-flex justify-content-around gap-3">
                                                        <a href="{{ url('view-my-active-packages/' . $active_package['package_id'] . '/' . $active_package['purchase_id']) }}"
                                                            id="package-details_{{ $active_package['package_id'] }}"
                                                            class="order-completed-btn w-100 bg-white text-black fsb-2 border border-black package-details">Package
                                                            Details</a>
                                                        <a href="javascript:void(0)"
                                                            class="order-completed-btn camThin w-100 bg-black text-white UserChangeInformation"
                                                            id="change_information_model-{{ $active_package['package_id'] . '?' . $active_package['purchase_id'] }}">Change
                                                            Patient Information</a>
                                                        {{-- <a href="javascript:void(0)" class="order-completed-btn w-100 bg-black fsb-2 text-white UserChangeInformation" data-bs-toggle="modal" data-bs-target="#UserChangeInformationModel">Change Patient Information</a> --}}
                                                        <a href="javascript:void(0)"
                                                            class="order-completed-btn w-100 bg-red camThin text-white UserCancelPackage"
                                                            id="cancel_package_model-{{ $active_package['package_id'] . '?' . $active_package['purchase_id'] }}">Cancellation
                                                            Request</a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @else
                                            @include('front.includes.no-data-found')
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="user-completed" role="tabpanel"
                                        aria-labelledby="user-completed-tab">
                                        @if (!empty($my_completed_packages_list))
                                            @foreach ($my_completed_packages_list as $completed_package)
                                                <div class="card shadow-none mb-3 pkgCard">
                                                    <div class="card-body d-flex gap-3 w-100 p-3">
                                                        <div class="df-center">
                                                            <img src="{{ asset($completed_package['company_logo_image_path']) }}"
                                                                alt="" class="md-img">
                                                        </div>
                                                        <div class="df-column">
                                                            <div class="trmt-card-body">
                                                                <h5 class="mb-0 card-h4">
                                                                    {{ !empty($completed_package['company_name']) ? $completed_package['company_name'] : '' }}
                                                                </h5>
                                                                <h6 class="card-h1">
                                                                    {{ !empty($completed_package['package_name']) ? $completed_package['package_name'] : '' }}
                                                                </h6>
                                                                <div class="d-flex align-items-center gap-5 mb-3">
                                                                    <p class="fsb-2 mb-0 d-flex align-items-center gap-1">
                                                                        <svg width="10" height="15"
                                                                            viewBox="0 0 10 15" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M4.95833 6.72917C4.48868 6.72917 4.03826 6.5426 3.70617 6.2105C3.37407 5.87841 3.1875 5.42799 3.1875 4.95833C3.1875 4.48868 3.37407 4.03826 3.70617 3.70617C4.03826 3.37407 4.48868 3.1875 4.95833 3.1875C5.42799 3.1875 5.87841 3.37407 6.2105 3.70617C6.5426 4.03826 6.72917 4.48868 6.72917 4.95833C6.72917 5.19088 6.68336 5.42115 6.59437 5.636C6.50538 5.85085 6.37494 6.04606 6.2105 6.2105C6.04606 6.37494 5.85085 6.50538 5.636 6.59437C5.42115 6.68336 5.19088 6.72917 4.95833 6.72917ZM4.95833 0C3.6433 0 2.38213 0.522394 1.45226 1.45226C0.522394 2.38213 0 3.6433 0 4.95833C0 8.67708 4.95833 14.1667 4.95833 14.1667C4.95833 14.1667 9.91667 8.67708 9.91667 4.95833C9.91667 3.6433 9.39427 2.38213 8.46441 1.45226C7.53454 0.522394 6.27337 0 4.95833 0Z"
                                                                                fill="#111111" />
                                                                        </svg>
                                                                        {{ !empty($completed_package['city_name']) ? $completed_package['city_name'] : '' }}
                                                                    </p>
                                                                    <p class="fsb-2 mb-0 d-flex align-items-center gap-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="14" height="15"
                                                                            viewBox="0 0 14 15" fill="none">
                                                                            <path
                                                                                d="M4.83372 1.41667V0H9.08372V1.41667H4.83372ZM5.54206 9.73958L4.76289 8.18125C4.70386 8.05139 4.61532 7.95388 4.49727 7.88871C4.37921 7.82354 4.25525 7.79119 4.12539 7.79167H0.619141C0.796224 6.19792 1.48685 4.85492 2.69102 3.76267C3.89518 2.67042 5.31775 2.12453 6.95872 2.125C7.69067 2.125 8.3931 2.24306 9.06602 2.47917C9.73893 2.71528 10.3705 3.05764 10.9608 3.50625L11.9525 2.51458L12.9441 3.50625L11.9525 4.49792C12.3303 4.99375 12.6313 5.51626 12.8556 6.06546C13.0799 6.61465 13.2275 7.19006 13.2983 7.79167H10.2348L9.01289 5.34792C8.88303 5.07639 8.67053 4.94062 8.37539 4.94062C8.08025 4.94062 7.86775 5.07639 7.73789 5.34792L5.54206 9.73958ZM6.95872 14.875C5.31775 14.875 3.89518 14.3289 2.69102 13.2366C1.48685 12.1444 0.796224 10.8016 0.619141 9.20833H3.68268L4.90456 11.6521C5.03442 11.9236 5.24692 12.0594 5.54206 12.0594C5.8372 12.0594 6.0497 11.9236 6.17956 11.6521L8.37539 7.26042L9.15456 8.81875C9.21358 8.94861 9.30213 9.04612 9.42018 9.11129C9.53824 9.17646 9.6622 9.20881 9.79206 9.20833H13.2983C13.1212 10.8021 12.4306 12.1448 11.2264 13.2366C10.0223 14.3284 8.5997 14.8745 6.95872 14.875Z"
                                                                                fill="#111111" />
                                                                        </svg>
                                                                        <i>{{ !empty($completed_package['treatment_period_in_days']) ? 'Treatment Period ' . $completed_package['treatment_period_in_days'] . ' days' : '' }}</i>
                                                                    </p>
                                                                </div>
                                                                <h6 class="card-p1 fw-bold mt-4">Time left to treatment:
                                                                    <span class="text-green">Completed!</span>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center gap-3 mb-3 ms-auto mt-auto">
                                                            @if (!empty($completed_package['id']))
                                                                <div class="trmt-card-footer w-100">
                                                                    <a href="javascript:void(0)"
                                                                        class="btn write-rev-btn df-center UserWriteReview"
                                                                        id="user_review_model-{{ $completed_package['id'] . '?' . $completed_package['id'] }}">

                                                                        Write Review
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            @include('front.includes.no-data-found')
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="user-cancelled" role="tabpanel"
                                        aria-labelledby="user-cancelled-tab">
                                        @if (!empty($my_cancelled_packages_list))
                                            @foreach ($my_cancelled_packages_list as $cancelled_package)
                                                <div class="card shadow-none mb-3 pkgCard">
                                                    <div class="card-body d-flex gap-3 w-100 p-3">
                                                        <div class="df-center">
                                                            <img src="{{ asset($cancelled_package['company_logo_image_path']) }}"
                                                                alt="" class="md-img">
                                                        </div>
                                                        <div class="df-column">
                                                            <h5 class="mb-0 card-h4">
                                                                {{ !empty($cancelled_package['company_name']) ? $cancelled_package['company_name'] : '' }}
                                                            </h5>
                                                            <h6 class="card-h1">
                                                                {{ !empty($cancelled_package['package_name']) ? $cancelled_package['package_name'] : '' }}
                                                            </h6>
                                                            <div class="d-flex align-items-center gap-5 mb-3">
                                                                <p class="fsb-2 mb-0 d-flex align-items-center gap-1">
                                                                    <svg width="10" height="15"
                                                                        viewBox="0 0 10 15" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M4.95833 6.72917C4.48868 6.72917 4.03826 6.5426 3.70617 6.2105C3.37407 5.87841 3.1875 5.42799 3.1875 4.95833C3.1875 4.48868 3.37407 4.03826 3.70617 3.70617C4.03826 3.37407 4.48868 3.1875 4.95833 3.1875C5.42799 3.1875 5.87841 3.37407 6.2105 3.70617C6.5426 4.03826 6.72917 4.48868 6.72917 4.95833C6.72917 5.19088 6.68336 5.42115 6.59437 5.636C6.50538 5.85085 6.37494 6.04606 6.2105 6.2105C6.04606 6.37494 5.85085 6.50538 5.636 6.59437C5.42115 6.68336 5.19088 6.72917 4.95833 6.72917ZM4.95833 0C3.6433 0 2.38213 0.522394 1.45226 1.45226C0.522394 2.38213 0 3.6433 0 4.95833C0 8.67708 4.95833 14.1667 4.95833 14.1667C4.95833 14.1667 9.91667 8.67708 9.91667 4.95833C9.91667 3.6433 9.39427 2.38213 8.46441 1.45226C7.53454 0.522394 6.27337 0 4.95833 0Z"
                                                                            fill="#111111" />
                                                                    </svg>
                                                                    {{ !empty($cancelled_package['city_name']) ? $cancelled_package['city_name'] : '' }}
                                                                </p>
                                                                <p class="fsb-2 mb-0 d-flex align-items-center gap-1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                        height="15" viewBox="0 0 14 15"
                                                                        fill="none">
                                                                        <path
                                                                            d="M4.83372 1.41667V0H9.08372V1.41667H4.83372ZM5.54206 9.73958L4.76289 8.18125C4.70386 8.05139 4.61532 7.95388 4.49727 7.88871C4.37921 7.82354 4.25525 7.79119 4.12539 7.79167H0.619141C0.796224 6.19792 1.48685 4.85492 2.69102 3.76267C3.89518 2.67042 5.31775 2.12453 6.95872 2.125C7.69067 2.125 8.3931 2.24306 9.06602 2.47917C9.73893 2.71528 10.3705 3.05764 10.9608 3.50625L11.9525 2.51458L12.9441 3.50625L11.9525 4.49792C12.3303 4.99375 12.6313 5.51626 12.8556 6.06546C13.0799 6.61465 13.2275 7.19006 13.2983 7.79167H10.2348L9.01289 5.34792C8.88303 5.07639 8.67053 4.94062 8.37539 4.94062C8.08025 4.94062 7.86775 5.07639 7.73789 5.34792L5.54206 9.73958ZM6.95872 14.875C5.31775 14.875 3.89518 14.3289 2.69102 13.2366C1.48685 12.1444 0.796224 10.8016 0.619141 9.20833H3.68268L4.90456 11.6521C5.03442 11.9236 5.24692 12.0594 5.54206 12.0594C5.8372 12.0594 6.0497 11.9236 6.17956 11.6521L8.37539 7.26042L9.15456 8.81875C9.21358 8.94861 9.30213 9.04612 9.42018 9.11129C9.53824 9.17646 9.6622 9.20881 9.79206 9.20833H13.2983C13.1212 10.8021 12.4306 12.1448 11.2264 13.2366C10.0223 14.3284 8.5997 14.8745 6.95872 14.875Z"
                                                                            fill="#111111" />
                                                                    </svg>
                                                                    <i>{{ !empty($cancelled_package['treatment_period_in_days']) ? 'Treatment Period in ' . $cancelled_package['treatment_period_in_days'] . ' days' : '' }}</i>
                                                                </p>
                                                            </div>
                                                            <h6 class="card-p1 fw-bold mt-4">Time left to treatment:
                                                                <span class="text-red">Cancelled</span>
                                                            </h6>
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
            </div>
        </div>
    </div>

    <!-- Change Patient Information -->
    <div class="modal fade" id="UserChangeInformationModel" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header text-center border-0">
                    <h5 class="modal-title modal-h1 mb-3" id="">Change Patient Information</h5>
                    <h6 class="modal-title card-p2" id="">Fill the patient detail.</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <form id="UserChangeInformationForm">
                        <div class="row gy-4">
                            <input type="hidden" name="package_buy_for" id="package_buy_for"
                                value="{{ !empty($patient_information_list['package_buy_for']) ? $patient_information_list['package_buy_for'] : '' }}">
                            <input type="hidden" name="package_id" id="package_id"
                                value="{{ !empty($patient_information_list['package_id']) ? $patient_information_list['package_id'] : '' }}">
                            <input type="hidden" name="patient_id" id="patiant_id"
                                value="{{ !empty($patient_information_list['package_id']) ? $patient_information_list['package_id'] : '' }}">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label card-h2 fw-bold">*Patient Full Name</label>
                                    <input type="text" class="form-control" name="patient_full_name"
                                        id="patient_full_name"
                                        value="{{ !empty($patient_information_list['patient_full_name']) ? $patient_information_list['patient_full_name'] : '' }}"
                                        aria-describedby="foodname"
                                        placeholder="{{ !empty($patient_information_list['patient_full_name']) ? $patient_information_list['patient_full_name'] : 'Patient Full Name' }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label card-h2 fw-bold">*Relationship To You</label>
                                    <input type="text" class="form-control" name="patient_relation"
                                        id="patient_relation"
                                        value="{{ !empty($patient_information_list['patient_relation']) ? $patient_information_list['patient_relation'] : '' }}"
                                        aria-describedby="foodname"
                                        placeholder="{{ !empty($patient_information_list['patient_relation']) ? $patient_information_list['patient_relation'] : 'Relationship To You' }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label card-h2 fw-bold">*Patient E-mail <b
                                            class="fs-14 fst-italic">*optional</b></label>
                                    <input type="text" class="form-control" name="patient_email" id="patient_email"
                                        value="{{ !empty($patient_information_list['patient_email']) ? $patient_information_list['patient_email'] : '' }}"
                                        aria-describedby="foodname"
                                        placeholder="{{ !empty($patient_information_list['patient_email']) ? $patient_information_list['patient_email'] : 'E-Mail' }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label card-h2 fw-bold">*Patient Contact Number</label>
                                    <input type="text" class="form-control" name="patient_contact_no"
                                        id="patient_contact_no"
                                        value="{{ !empty($patient_information_list['patient_contact_no']) ? $patient_information_list['patient_contact_no'] : '' }}"
                                        aria-describedby="foodname"
                                        placeholder="{{ !empty($patient_information_list['patient_contact_no']) ? $patient_information_list['patient_contact_no'] : 'Contact Number' }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="inputState" class="form-label card-h2 fw-bold">*Patient Country</label>
                                <select name="patient_country_id" id="patient_country_id" class="form-select">
                                    @if (!empty($counties))
                                        @foreach ($counties as $country)
                                            {{-- @if ($patient_information_list['patient_country_id'] == $country->id)
                                                <option value="{{ $country->id }}" selected>{{ $country->country_name }}
                                </option>
                                @else --}}
                                            <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                            {{-- @endif --}}
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="inputState" class="form-label card-h2 fw-bold">*Patient City</label>
                                <select name="patient_city_id" id="patient_city_id" class="form-select">
                                    @if (!empty($cities))
                                        @foreach ($cities as $city)
                                            {{-- @if ($patient_information_list['patient_city_id'] == $city->id)
                                                <option value="{{ $city->id }}" selected>{{ $city->city_name }}
                                </option>
                                @else --}}
                                            <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                            {{-- @endif --}}
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-12 my-5">
                                <h6 class="card-h2 fw-bold">*You can also change the patient information from <span
                                        class="camptonExtraBold">panel</span> <span class="text-green fw-900">></span>
                                    <span class="camptonExtraBold">packages</span>
                                </h6>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center">
                                <a href="javascript:void(0);" id="submit_btn2"
                                    class="order-completed-btn bg-green text-black change-patient-from-submit"><span
                                        class="fw-bolder me-1">Step 2 :</span> Payment Page</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Cancellation Request -->
    <div class="modal fade" id="UserCancellationReq" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header text-center border-0">
                    <h5 class="modal-title modal-h1 mb-3" id="">Cancellation Request</h5>
                    <h6 class="modal-title card-p2" id="">Fill the form & get your desired treatment plan.</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <form id="UserCancelPackageForm">
                        <div class="row gy-4">
                            <input type="hidden" name="id" id="id" value="">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label card-h2 fw-bold">Reason for Cancellation</label>
                                    <select name="cancellation_reason" id="cancellation_reason" class="form-select">
                                        <option value="">I don’t need this treatment</option>
                                        <option value="">I don’t need this treatment 1</option>
                                        <option value="">I don’t need this treatment 2</option>
                                        <option value="">I don’t need this treatment 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group d-flex flex-column">
                                    <label class="form-label card-h2 fw-bold">Cancellation Detail</label>
                                    <textarea name="cancellation_detail" id="cancellation_detail" rows="5" class="form-control border-2"
                                        placeholder="Please write your treatment cancellation request in detail"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex align-items-center gap-2 mb-5 position-relative">
                                <input class="form-check-input" type="checkbox" name="flexCheckChecked" value=""
                                    id="flexCheckChecked">
                                <label class="form-check-label card-h2 fw-bold d-block" for="flexCheckChecked">
                                    I confirm that I wish cancel my treatment.
                                </label>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center">
                                <a href="javascript:void(0);"
                                    class="order-completed-btn bg-red text-white cancel-package-from-submit">Cancel
                                    Treatment</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Review Completed Package -->
    <div class="modal fade" id="ReviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header border-0 p-5 pb-0">
                    <h5 class="modal-title modal-h1 text-start camptonExtraBold" id="">Write Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5">
                    <div class="acommodition-content">
                        <div class="mb-4">
                            <h6 class="card-h1  mb-2 star-rating">Cleanliness</h6>
                            <div class="reviewsStar">
                                <i class="fa fa-star" id="clean_1"></i>
                                <i class="fa fa-star" id="clean_2"></i>
                                <i class="fa fa-star" id="clean_3"></i>
                                <i class="fa fa-star" id="clean_4"></i>
                                <i class="fa fa-star" id="clean_5"></i>
                            </div>
                            <span class="error-message" style="color: red;"></span>
                        </div>
                        <div class="mb-4">
                            <h6 class="card-h1  mb-2 star-rating">Comfort</h6>
                            <div class="reviewsStar">
                                <i class="fa fa-star" id="comfort_1"></i>
                                <i class="fa fa-star" id="comfort_2"></i>
                                <i class="fa fa-star" id="comfort_3"></i>
                                <i class="fa fa-star" id="comfort_4"></i>
                                <i class="fa fa-star" id="comfort_5"></i>
                            </div>
                            <span class="error-message" style="color: red;"></span>
                            {{-- <h6 class="fsb-2 fw-500">Min 2022 Model</h6> --}}
                        </div>
                        <div class="mb-4">
                            <h6 class="card-h1  mb-2 star-rating">Food Quality</h6>
                            <div class="reviewsStar">
                                <i class="fa fa-star" id="food_1"></i>
                                <i class="fa fa-star" id="food_2"></i>
                                <i class="fa fa-star" id="food_3"></i>
                                <i class="fa fa-star" id="food_4"></i>
                                <i class="fa fa-star" id="food_5"></i>
                            </div>
                            <span class="error-message" style="color: red;"></span>
                        </div>
                        <div class="mb-4">
                            <h6 class="card-h1  mb-2 star-rating">Behavior / Professionalism
                            </h6>
                            <div class="reviewsStar">
                                <i class="fa fa-star" id="behavior_1"></i>
                                <i class="fa fa-star" id="behavior_2"></i>
                                <i class="fa fa-star" id="behavior_3"></i>
                                <i class="fa fa-star" id="behavior_4"></i>
                                <i class="fa fa-star" id="behavior_5"></i>
                            </div>
                            <span class="error-message" style="color: red;"></span>
                        </div>

                        <div class="mb-4">
                            <h6 class="card-h1  mb-1 ">Do you recommend this
                                hotel?
                            </h6>
                            <div class="d-flex" style="gap: 9px;">
                                <div class="p-0 m-0 d-flex align-items-center flex-column">
                                    <p class="mb-0 campton">1</p>
                                    <div class="star" id="rating_1"></div>

                                </div>
                                <div class="p-0 m-0 d-flex align-items-center flex-column">
                                    <p class="mb-0 campton">2</p>
                                    <div class="star" id="rating_2"></div>

                                </div>
                                <div class="p-0 m-0 d-flex align-items-center flex-column">
                                    <p class="mb-0 campton">3</p>
                                    <div class="star" id="rating_3"></div>

                                </div>
                                <div class="p-0 m-0 d-flex align-items-center flex-column">
                                    <p class="mb-0 campton">4</p>
                                    <div class="star" id="rating_4"></div>

                                </div>
                                <div class="p-0 m-0 d-flex align-items-center flex-column">
                                    <p class="mb-0 campton">5</p>
                                    <div class="star" id="rating_5"></div>

                                </div>
                                <div class="p-0 m-0 d-flex align-items-center flex-column">
                                    <p class="mb-0 campton">6</p>
                                    <div class="star" id="rating_6"></div>

                                </div>
                                <div class="p-0 m-0 d-flex align-items-center flex-column">
                                    <p class="mb-0 campton">7</p>
                                    <div class="star" id="rating_7"></div>

                                </div>
                                <div class="p-0 m-0 d-flex align-items-center flex-column">
                                    <p class="mb-0 campton">8</p>
                                    <div class="star" id="rating_8"></div>

                                </div>
                                <div class="p-0 m-0 d-flex align-items-center flex-column">
                                    <p class="mb-0 campton">9</p>
                                    <div class="star" id="rating_9"></div>

                                </div>
                                <div class="p-0 m-0 d-flex align-items-center flex-column">
                                    <p class="mb-0 campton">10</p>
                                    <div class="star" id="rating_10"></div>

                                </div>
                            </div>
                        </div>

                        <div class="">
                            <p class=""><span class="card-h1">Extra
                                    Notes</span><span class="campton fst-italic ms-1"> *Optional</span></p>
                            <div class="form-floating" style="width: 312px">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2" class="user-res-p8 camptonBook">Please share you feedback
                                    & experience.</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn review-sub-btn user-review-from-submit" data-bs-toggle="modal"
                                data-bs-target="#hotelcompletedmodel2" data-bs-dismiss="modal">Submit</button>
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
        $(document).ready(function() {
            // alert('hi');
            var baseUrl = $('#base_url').val();
            var token = "{{ Session::get('login_token') }}";
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var purchaseId;

            $(".upPackageLi").addClass("activeClass");
            $(".upPackage").addClass("md-active");

            $(".UserChangeInformation").on('click', function(e) {

                let id = this.id;
                let rawId = this.id.split('-')[1];
                let packageId = rawId.split('?')[0];
                purchaseId = rawId.split('?')[1];
                let formData = new FormData();
                formData.append("id", packageId);
                formData.append("purchase_id", purchaseId);
                formData.append("patient_id", $('#patiant_id').val());@section('php')
    @php

        //dd($my_details);

        $avialable_accomodation_services = false;
        $breakfast = $sauna = $smoking = $wifi = $fitness = false;
        if (!empty($data['accomodation_view']['hotel_other_services'])) {
            $avialable_accomodation_services = true;
            foreach ($data['accomodation_view']['hotel_other_services'] as $service) {
                switch (str_replace(' ', '', strtolower($service))) {
                    case 'breakfast&dinner':
                        $breakfast = true;
                        break;
                    case 'sauna&spa':
                        $sauna = true;
                        break;
                    case 'nosmoking':
                        $smoking = true;
                        break;
                    case 'wi-fi':
                        $wifi = true;
                        break;
                    case 'fitnesscenter':
                        $fitness = true;
                        break;
                    // case 'ambulanceservices':
                    // $ambulance = true;
                    // break;
                }
            }
        }

        $avialable_transportation_services = false;
        $seven = $gas = $smoking = $wifi = false;
        if (!empty($data['transportation_view']['other_services'])) {
            $avialable_transportation_services = true;
            foreach ($data['transportation_view']['other_services'] as $service) {
                switch (str_replace(' ', '', strtolower($service))) {
                    case '7+1':
                        $seven = true;
                        break;
                    case 'gasoline':
                        $gas = true;
                        break;
                    case 'nosmoking':
                        $smoking = true;
                        break;
                    case 'wi-fi':
                        $wifi = true;
                        break;
                    // case 'fitnesscenter':
                    // $fitness = true;
                    // break;
                    // case 'ambulanceservices':
                    // $ambulance = true;
                    // break;
                }
            }
        }

        $avialable_services = false;
        $accomodation = $transportation = $tour = $visa = $translate = $ambulance = $ticketservice = false;
        if (!empty($data['other_services'])) {
            $avialable_services = true;
            foreach ($data['other_services'] as $service) {
                switch (str_replace(' ', '', strtolower($service))) {
                    case 'accommodation':
                        $accomodation = true;
                        break;
                    case 'transportation':
                        $transportation = true;
                        break;
                    case 'tourdetails':
                        $tour = true;
                        break;
                    case 'visadetails':
                        $visa = true;
                        break;
                    case 'translation':
                        $translate = true;
                        break;
                    case 'ambulanceservice':
                        $ambulance = true;
                        break;
                    case 'ticketservice':
                        $ticketservice = true;
                        break;
                }
            }
        }
        $pending_percent = 0;
        if (!empty($data['payment_percentage'])) {
            $pending_percent_raw = strval(100 - explode('%', $data['payment_percentage'])[0]);
            if ($pending_percent_raw != 0) {
                $pending_percent = $pending_percent_raw . '%';
            }
        }
        if (!empty($data['created_at'])) {
            $payment_time_and_date = explode('T', $data['created_at'])[0] . ' | ' . explode('T', explode('.', $data['created_at'])[0])[1];
        } else {
            $payment_time_and_date = '';
        }

        //dd($my_details,$treatment_information,$data);

    @endphp
@endsection
@extends('front.layout.layout2')
@section('content')
    <style>
        .treatment-card img {
            width: 105px;
        }

        .treatment-card-btns .order-completed-btn {
            font-size: 14px;
        }

        .card-header a {
            font-size: 16px;
            margin: 20px 0 0 15px;
        }

        .modal-header {
            display: block;
            padding: 2rem;
        }

        .modal-header .btn-close {
            position: absolute;
            top: 15px;
            right: 15px;
            opacity: 1;
            background: gray;
            color: #000;
            line-height: 0;
            padding: 6px;
            border-radius: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
            font-size: 12px;
        }

        .modal-dialog {
            max-width: 750px;
        }

        .modal-body select {
            border: 2px solid #D6D6D6;
            border-radius: 5px;
            padding: 0.375rem 0.75rem;
        }

        .modal-body input {
            border: 2px solid #D6D6D6;
        }

        .modal-body input.form-check-input {
            border: 1px solid #D6D6D6;
            margin: 0px;
        }

        .modal-body {
            padding: 1rem 2rem 4rem;
        }

        .modal-body .order-completed-btn {
            padding: 12px 20px;
            width: 70%;
        }

        .user-package-details {
            padding: 25px 15px;
        }

        .user-details-body p {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 0;
        }




        #AccommodationView .acmdn-hotel-details {
            margin-bottom: 100px;
        }

        #TransportationView .acmdn-hotel-details {
            margin-bottom: 40px;
        }

        #TransportationView .acmdn-repsntve-img {
            margin-bottom: 120px;
        }

        .acmdn-hotel-details ul li {
            color: #000;
            font-family: Campton;
            font-size: 12px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            letter-spacing: -0.48px;
            margin-bottom: 8px;
        }

        .user-details-body ul li svg {
            margin-right: 5px;
        }





        .acmdn-star p {
            font-size: 20px;
        }

        /*
                            .acmdn-head h6:last-child,
                            .acmdn-hotel-details h6:last-child {
                                font-size: 15px;
                            } */

        .package-view-div .treatment-card {
            padding: 15px;
        }




        .for-textarea-div {
            width: 300px;
            padding: 10px;
            border-radius: 5px;
            border: 2px solid #D6D6D6;
        }

        .acmdn-notes textarea.form-control {
            width: 275px;
            padding: 0;
            border: unset;
        }

        .for-textarea-div span {
            font-size: 12px;
            color: #979797;
            width: 265px;
            background: #fff;
        }

        .text-area-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .patient-details:last-child {
            margin-bottom: 160px;
        }

        .payment-paid-div {
            border-radius: 3px;
            border: 1px solid #4CDB06;
            display: flex;
            justify-content: space-between;
            border-radius: 0 100px 100px 0;
        }


        .view-menu-div .fa-cloud-upload {
            padding: 25px;
            background: #000;
            border-radius: 5px;
            cursor: pointer;
        }

        .cloud-upload-file span {
            vertical-align: bottom;
            color: #000002;
            font-family: Campton;
            font-size: 16px;
            font-weight: 500;
            line-height: normal;
            letter-spacing: -0.64px;
            margin-left: 1.5rem;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .gallery a {
            position: relative;
            width: 83px;
            height: 62px;
            z-index: 99;
            border-radius: 10px;
        }

        .gallery img {
            width: 83px;
            height: 62px;
            object-fit: cover;
            border-radius: 10px;
        }

        .gallery .clear-btn {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #000000ad;
            padding: 3px 6px;
            border-radius: 100%;
            color: #fff;
            text-decoration: none;
            font-weight: 100;
            z-index: 9999;
        }



        .video-div {
            width: 140px;
            height: 140px;
        }

        .video-card i {
            position: absolute;
            top: 65px;
            left: 60px;
            color: #4cdb06;
            font-size: 30px;
        }

        .add-btn {
            width: 207px !important;
            height: 35px;
            flex-shrink: 0;
            font-size: 14px
        }
    </style>
    <div class="content-wrapper">
        <div class="container py-100px for-cards">
            <div class="d-flex gap-3">
                <div class="w-292">
                    @include('front.includes.sidebar-user')
                </div>
                <div class="w-761">
                    <div class="card">
                        <h5 class="card-header mb-3">
                            Packages
                            <a href="{{ url('my-packages-list') }}"
                                class="fw-800 d-flex align-items-center gap-1 text-decoration-none text-black float-end m-auto">
                                <img src="{{ asset('front/assets/img/backPage.png') }}" alt="">
                                <p class="mb-0">Booked Packages</p>
                            </a>
                        </h5>

                        <div class="card-body">
                            <div class="card shadow-none mb-4 pkgCard">
                                <div class="card-body p-4">
                                    <div class="d-flex gap-3 w-100">
                                        <div class="df-center">
                                            @if (!empty($data['company_logo_image_path']))
                                                <img src="{{ asset($data['company_logo_image_path']) }}" alt="" class="pkgImg" style="object-fit:contain;"
                                                    >
                                            @endif
                                            <!-- <img src="{{ asset('front/assets/img/packageImg.png') }}" alt="" class="pkgImg"> -->

                                        </div>

                                        <div class="df-column">
                                            <div class="trmt-card-body">
                                                <h5 class="mb-0">
                                                    {{ !empty($data['company_name']) ? $data['company_name'] : '' }}
                                                </h5>
                                                <h6 class="card-h1">
                                                    {{ !empty($data['package_name']) ? $data['package_name'] : '' }}
                                                </h6>
                                                <div class="d-flex align-items-center gap-3 mb-3">
                                                    <p class="fsb-2 mb-0 d-flex align-items-center gap-1">
                                                        <svg width="10" height="15" viewBox="0 0 10 15"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.95833 6.72917C4.48868 6.72917 4.03826 6.5426 3.70617 6.2105C3.37407 5.87841 3.1875 5.42799 3.1875 4.95833C3.1875 4.48868 3.37407 4.03826 3.70617 3.70617C4.03826 3.37407 4.48868 3.1875 4.95833 3.1875C5.42799 3.1875 5.87841 3.37407 6.2105 3.70617C6.5426 4.03826 6.72917 4.48868 6.72917 4.95833C6.72917 5.19088 6.68336 5.42115 6.59437 5.636C6.50538 5.85085 6.37494 6.04606 6.2105 6.2105C6.04606 6.37494 5.85085 6.50538 5.636 6.59437C5.42115 6.68336 5.19088 6.72917 4.95833 6.72917ZM4.95833 0C3.6433 0 2.38213 0.522394 1.45226 1.45226C0.522394 2.38213 0 3.6433 0 4.95833C0 8.67708 4.95833 14.1667 4.95833 14.1667C4.95833 14.1667 9.91667 8.67708 9.91667 4.95833C9.91667 3.6433 9.39427 2.38213 8.46441 1.45226C7.53454 0.522394 6.27337 0 4.95833 0Z"
                                                                fill="#111111" />
                                                        </svg>
                                                        {{ !empty($data['city_name']) ? $data['city_name'] : '' }}
                                                    </p>
                                                    <p class="fsb-2 mb-0 d-flex align-items-center gap-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                            height="15" viewBox="0 0 14 15" fill="none">
                                                            <path
                                                                d="M4.83372 1.41667V0H9.08372V1.41667H4.83372ZM5.54206 9.73958L4.76289 8.18125C4.70386 8.05139 4.61532 7.95388 4.49727 7.88871C4.37921 7.82354 4.25525 7.79119 4.12539 7.79167H0.619141C0.796224 6.19792 1.48685 4.85492 2.69102 3.76267C3.89518 2.67042 5.31775 2.12453 6.95872 2.125C7.69067 2.125 8.3931 2.24306 9.06602 2.47917C9.73893 2.71528 10.3705 3.05764 10.9608 3.50625L11.9525 2.51458L12.9441 3.50625L11.9525 4.49792C12.3303 4.99375 12.6313 5.51626 12.8556 6.06546C13.0799 6.61465 13.2275 7.19006 13.2983 7.79167H10.2348L9.01289 5.34792C8.88303 5.07639 8.67053 4.94062 8.37539 4.94062C8.08025 4.94062 7.86775 5.07639 7.73789 5.34792L5.54206 9.73958ZM6.95872 14.875C5.31775 14.875 3.89518 14.3289 2.69102 13.2366C1.48685 12.1444 0.796224 10.8016 0.619141 9.20833H3.68268L4.90456 11.6521C5.03442 11.9236 5.24692 12.0594 5.54206 12.0594C5.8372 12.0594 6.0497 11.9236 6.17956 11.6521L8.37539 7.26042L9.15456 8.81875C9.21358 8.94861 9.30213 9.04612 9.42018 9.11129C9.53824 9.17646 9.6622 9.20881 9.79206 9.20833H13.2983C13.1212 10.8021 12.4306 12.1448 11.2264 13.2366C10.0223 14.3284 8.5997 14.8745 6.95872 14.875Z"
                                                                fill="#111111" />
                                                        </svg>
                                                          <i>{{ !empty($data['treatment_period_in_days']) ?'Treatment Period '.$data['treatment_period_in_days'].' Days' : '' }}</i>
                                                    </p>
                                                </div>
                                                <h6 class="card-p2 fw-bold">Time left to treatment:  {{ !empty($data['treatment_start_date']) ? $data['treatment_start_date'] : '' }}</h6>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- OTHER DETAILS -->
                                    <div class="user-package-details">
                                        <div class="user-package-body">
                                            <div class="user-details-body mb-4">
                                                <div class="d-flex justify-content-between mb-3">
                                                    <p class="card-h1">Package Other Details </p>
                                                    <span>
                                                        <h5 class="card-h4 d-inline-block camptonBold">Your Case No <p
                                                                class="text-green mb-0 d-inline-block">{{ !empty($data['case_no']) ? $data['case_no'] : '' }}</p>
                                                        </h5>

                                                    </span>
                                                </div>

                                                <ul class="ps-0 list-unstyled">
                                                    <li>
                                                        @if ($accomodation == 1)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" viewBox="0 0 10 10" fill="none">
                                                                <g clip-path="url(#clip0_0_22025)">
                                                                    <path
                                                                        d="M8.54102 0.585938L3.95898 6.62695L1.25 3.91992L0 5.16992L4.16602 9.33594L10 1.83594L8.54102 0.585938Z"
                                                                        fill="#4CDB06" />
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_0_22025">
                                                                        <rect width="10" height="10"
                                                                            fill="white" />
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                            Accomodation
                                                            <a href="javascript:void(0);" id="accomodation_modal"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#AccommodationView">View
                                                                Details</a>
                                                        @else
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17"
                                                                height="17" viewBox="0 0 13 13" fill="none">
                                                                <path
                                                                    d="M6.50065 1.08337C9.47982 1.08337 11.9173 3.52087 11.9173 6.50004C11.9173 9.47921 9.47982 11.9167 6.50065 11.9167C3.52148 11.9167 1.08398 9.47921 1.08398 6.50004C1.08398 3.52087 3.52148 1.08337 6.50065 1.08337ZM6.50065 2.16671C5.47148 2.16671 4.55065 2.49171 3.84648 3.08754L9.91315 9.15421C10.4548 8.39587 10.834 7.47504 10.834 6.50004C10.834 4.11671 8.88398 2.16671 6.50065 2.16671ZM9.15482 9.91254L3.08815 3.84587C2.49232 4.55004 2.16732 5.47087 2.16732 6.50004C2.16732 8.88337 4.11732 10.8334 6.50065 10.8334C7.52982 10.8334 8.45065 10.5084 9.15482 9.91254Z"
                                                                    fill="#111111" />
                                                            </svg>
                                                            Accomodation
                                                        @endif

                                                    </li>

                                                    <li>
                                                        @if ($transportation == 1)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" viewBox="0 0 10 10" fill="none">
                                                                <g clip-path="url(#clip0_0_22025)">
                                                                    <path
                                                                        d="M8.54102 0.585938L3.95898 6.62695L1.25 3.91992L0 5.16992L4.16602 9.33594L10 1.83594L8.54102 0.585938Z"
                                                                        fill="#4CDB06" />
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_0_22025">
                                                                        <rect width="10" height="10"
                                                                            fill="white" />
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                            Transportation
                                                            <a href="#" id="transportation_modal"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#TransportationView">View Details</a>
                                                        @else
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17"
                                                                height="17" viewBox="0 0 13 13" fill="none">
                                                                <path
                                                                    d="M6.50065 1.08337C9.47982 1.08337 11.9173 3.52087 11.9173 6.50004C11.9173 9.47921 9.47982 11.9167 6.50065 11.9167C3.52148 11.9167 1.08398 9.47921 1.08398 6.50004C1.08398 3.52087 3.52148 1.08337 6.50065 1.08337ZM6.50065 2.16671C5.47148 2.16671 4.55065 2.49171 3.84648 3.08754L9.91315 9.15421C10.4548 8.39587 10.834 7.47504 10.834 6.50004C10.834 4.11671 8.88398 2.16671 6.50065 2.16671ZM9.15482 9.91254L3.08815 3.84587C2.49232 4.55004 2.16732 5.47087 2.16732 6.50004C2.16732 8.88337 4.11732 10.8334 6.50065 10.8334C7.52982 10.8334 8.45065 10.5084 9.15482 9.91254Z"
                                                                    fill="#111111" />
                                                            </svg>
                                                            Transportation
                                                        @endif

                                                    </li>
                                                    <li>
                                                        @if ($tour == 1)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" viewBox="0 0 10 10" fill="none">
                                                                <g clip-path="url(#clip0_0_22025)">
                                                                    <path
                                                                        d="M8.54102 0.585938L3.95898 6.62695L1.25 3.91992L0 5.16992L4.16602 9.33594L10 1.83594L8.54102 0.585938Z"
                                                                        fill="#4CDB06" />
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_0_22025">
                                                                        <rect width="10" height="10"
                                                                            fill="white" />
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                            Tour
                                                            <a href="#" id="" data-bs-toggle="modal"
                                                                data-bs-target="#TourView">View Details</a>
                                                        @else
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17"
                                                                height="17" viewBox="0 0 13 13" fill="none">
                                                                <path
                                                                    d="M6.50065 1.08337C9.47982 1.08337 11.9173 3.52087 11.9173 6.50004C11.9173 9.47921 9.47982 11.9167 6.50065 11.9167C3.52148 11.9167 1.08398 9.47921 1.08398 6.50004C1.08398 3.52087 3.52148 1.08337 6.50065 1.08337ZM6.50065 2.16671C5.47148 2.16671 4.55065 2.49171 3.84648 3.08754L9.91315 9.15421C10.4548 8.39587 10.834 7.47504 10.834 6.50004C10.834 4.11671 8.88398 2.16671 6.50065 2.16671ZM9.15482 9.91254L3.08815 3.84587C2.49232 4.55004 2.16732 5.47087 2.16732 6.50004C2.16732 8.88337 4.11732 10.8334 6.50065 10.8334C7.52982 10.8334 8.45065 10.5084 9.15482 9.91254Z"
                                                                    fill="#111111" />
                                                            </svg>
                                                            Tour
                                                        @endif


                                                    </li>
                                                    <li>
                                                        @if ($visa == 1)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" viewBox="0 0 10 10" fill="none">
                                                                <g clip-path="url(#clip0_0_22025)">
                                                                    <path
                                                                        d="M8.54102 0.585938L3.95898 6.62695L1.25 3.91992L0 5.16992L4.16602 9.33594L10 1.83594L8.54102 0.585938Z"
                                                                        fill="#4CDB06" />
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_0_22025">
                                                                        <rect width="10" height="10"
                                                                            fill="white" />
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        @else
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17"
                                                                height="17" viewBox="0 0 13 13" fill="none">
                                                                <path
                                                                    d="M6.50065 1.08337C9.47982 1.08337 11.9173 3.52087 11.9173 6.50004C11.9173 9.47921 9.47982 11.9167 6.50065 11.9167C3.52148 11.9167 1.08398 9.47921 1.08398 6.50004C1.08398 3.52087 3.52148 1.08337 6.50065 1.08337ZM6.50065 2.16671C5.47148 2.16671 4.55065 2.49171 3.84648 3.08754L9.91315 9.15421C10.4548 8.39587 10.834 7.47504 10.834 6.50004C10.834 4.11671 8.88398 2.16671 6.50065 2.16671ZM9.15482 9.91254L3.08815 3.84587C2.49232 4.55004 2.16732 5.47087 2.16732 6.50004C2.16732 8.88337 4.11732 10.8334 6.50065 10.8334C7.52982 10.8334 8.45065 10.5084 9.15482 9.91254Z"
                                                                    fill="#111111" />
                                                            </svg>
                                                        @endif
                                                        Visa Service

                                                    </li>
                                                    <li>
                                                        @if ($translate == 1)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" viewBox="0 0 10 10" fill="none">
                                                                <g clip-path="url(#clip0_0_22025)">
                                                                    <path
                                                                        d="M8.54102 0.585938L3.95898 6.62695L1.25 3.91992L0 5.16992L4.16602 9.33594L10 1.83594L8.54102 0.585938Z"
                                                                        fill="#4CDB06" />
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_0_22025">
                                                                        <rect width="10" height="10"
                                                                            fill="white" />
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        @else
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17"
                                                                height="17" viewBox="0 0 13 13" fill="none">
                                                                <path
                                                                    d="M6.50065 1.08337C9.47982 1.08337 11.9173 3.52087 11.9173 6.50004C11.9173 9.47921 9.47982 11.9167 6.50065 11.9167C3.52148 11.9167 1.08398 9.47921 1.08398 6.50004C1.08398 3.52087 3.52148 1.08337 6.50065 1.08337ZM6.50065 2.16671C5.47148 2.16671 4.55065 2.49171 3.84648 3.08754L9.91315 9.15421C10.4548 8.39587 10.834 7.47504 10.834 6.50004C10.834 4.11671 8.88398 2.16671 6.50065 2.16671ZM9.15482 9.91254L3.08815 3.84587C2.49232 4.55004 2.16732 5.47087 2.16732 6.50004C2.16732 8.88337 4.11732 10.8334 6.50065 10.8334C7.52982 10.8334 8.45065 10.5084 9.15482 9.91254Z"
                                                                    fill="#111111" />
                                                            </svg>
                                                        @endif
                                                        Translate

                                                    </li>
                                                    <li class="fsb-2 ">
                                                        @if ($ambulance == 1)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" viewBox="0 0 10 10" fill="none">
                                                                <g clip-path="url(#clip0_0_22025)">
                                                                    <path
                                                                        d="M8.54102 0.585938L3.95898 6.62695L1.25 3.91992L0 5.16992L4.16602 9.33594L10 1.83594L8.54102 0.585938Z"
                                                                        fill="#4CDB06" />
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_0_22025">
                                                                        <rect width="10" height="10"
                                                                            fill="white" />
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        @else
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17"
                                                                height="17" viewBox="0 0 13 13" fill="none">
                                                                <path
                                                                    d="M6.50065 1.08337C9.47982 1.08337 11.9173 3.52087 11.9173 6.50004C11.9173 9.47921 9.47982 11.9167 6.50065 11.9167C3.52148 11.9167 1.08398 9.47921 1.08398 6.50004C1.08398 3.52087 3.52148 1.08337 6.50065 1.08337ZM6.50065 2.16671C5.47148 2.16671 4.55065 2.49171 3.84648 3.08754L9.91315 9.15421C10.4548 8.39587 10.834 7.47504 10.834 6.50004C10.834 4.11671 8.88398 2.16671 6.50065 2.16671ZM9.15482 9.91254L3.08815 3.84587C2.49232 4.55004 2.16732 5.47087 2.16732 6.50004C2.16732 8.88337 4.11732 10.8334 6.50065 10.8334C7.52982 10.8334 8.45065 10.5084 9.15482 9.91254Z"
                                                                    fill="#111111" />
                                                            </svg>
                                                        @endif
                                                        Ambulance Services

                                                    </li>
                                                    <li class="fsb-2 ">
                                                        @if ($ticketservice == 1)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" viewBox="0 0 10 10" fill="none">
                                                                <g clip-path="url(#clip0_0_22025)">
                                                                    <path
                                                                        d="M8.54102 0.585938L3.95898 6.62695L1.25 3.91992L0 5.16992L4.16602 9.33594L10 1.83594L8.54102 0.585938Z"
                                                                        fill="#4CDB06" />
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_0_22025">
                                                                        <rect width="10" height="10"
                                                                            fill="white" />
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        @else
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17"
                                                                height="17" viewBox="0 0 13 13" fill="none">
                                                                <path
                                                                    d="M6.50065 1.08337C9.47982 1.08337 11.9173 3.52087 11.9173 6.50004C11.9173 9.47921 9.47982 11.9167 6.50065 11.9167C3.52148 11.9167 1.08398 9.47921 1.08398 6.50004C1.08398 3.52087 3.52148 1.08337 6.50065 1.08337ZM6.50065 2.16671C5.47148 2.16671 4.55065 2.49171 3.84648 3.08754L9.91315 9.15421C10.4548 8.39587 10.834 7.47504 10.834 6.50004C10.834 4.11671 8.88398 2.16671 6.50065 2.16671ZM9.15482 9.91254L3.08815 3.84587C2.49232 4.55004 2.16732 5.47087 2.16732 6.50004C2.16732 8.88337 4.11732 10.8334 6.50065 10.8334C7.52982 10.8334 8.45065 10.5084 9.15482 9.91254Z"
                                                                    fill="#111111" />
                                                            </svg>
                                                        @endif
                                                        Ticket Service
                                                    </li>
                                                </ul>

                                                <div class="acdm-btns pt-3 df-start gap-3">
                                                    <button target="1"
                                                        class="showSingle btn add-btn text-white fw-lighter">My
                                                        Details</button>
                                                    <button target="2"
                                                        class="showSingle btn add-btn bg-transparent text-black">My
                                                        Documents</button>
                                                </div>



                                                <div id="ShowDiv1" class="view-menu-div targetDiv mt-5">

                                                    @if (!empty($data['case_manager']))
                                                        <div class="view-menu mb-4">
                                                            <h6 class="card-h1">Your Case Manager</h6>
                                                            <p class="text-orange card-h2 text-capitalize camptonBook">
                                                                {{ $data['case_manager'] }}</p>
                                                        </div>
                                                    @endif

                                                    <div class="patient-details-div">
                                                        <div class="patient-details mb-5">
                                                            <h6 class="card-h1 mb-4">Patient Details</h6>
                                                            <div class="row gy-3">
                                                                <div class="col-md-6">
                                                                    <div class="form-group position-relative mb-3">
                                                                        <label class="form-label">First Name</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ !empty($my_details['patient_full_name']) ? $my_details['patient_full_name'] : '' }}"
                                                                            id="foodname" aria-describedby="foodname"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="col-md-6">
                                                                    <div class="form-group position-relative mb-3">
                                                                        <label class="form-label">Last Name</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ !empty($my_details['patient_last_name']) ? $my_details['patient_last_name'] : '' }}"
                                                                            id="foodname" aria-describedby="Last Name"
                                                                            readonly>
                                                                    </div>
                                                                </div> --}}
                                                                <div class="col-md-6">
                                                                    <div class="form-group position-relative mb-3">
                                                                        <label class="form-label">Email</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ !empty($my_details['patient_email']) ? $my_details['patient_email'] : '' }}"
                                                                            id="foodname" aria-describedby="foodname"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group position-relative mb-3">
                                                                        <label class="form-label">Contact Number</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ !empty($my_details['patient_contact_no']) ? $my_details['patient_contact_no'] : '' }}"
                                                                            id="ContactNumber"
                                                                            aria-describedby="Contact Number" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group position-relative mb-3">
                                                                        <label class="form-label">Country</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ !empty($my_details['country_name']) ? $my_details['country_name'] : '' }}"
                                                                            id="foodname" aria-describedby="foodname"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group position-relative mb-3">
                                                                        <label class="form-label">City</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ !empty($my_details['city_name']) ? $my_details['city_name'] : '' }}"
                                                                            id="foodname" aria-describedby="foodname"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="patient-details mb-5">
                                                            <h6 class="card-h1 mb-4">Treatment Details</h6>
                                                            <div class="row gy-3">
                                                                <div class="col-md-6">
                                                                    <div class="form-group position-relative mb-3">
                                                                        <label class="form-label">Hospital Name</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ !empty($data['company_name']) ? $data['company_name'] : '' }}"
                                                                            id="foodname" aria-describedby="foodname"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group position-relative mb-3">
                                                                        <label class="form-label">Treatment</label>
                                                                        <input type="text" class="form-control"
                                                                            id="foodname" aria-describedby="foodname"
                                                                            value="{{ !empty($treatment_information['package_name']) ? $treatment_information['package_name'] : '' }}"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group position-relative mb-3">
                                                                        <label class="form-label">Treatment Period</label>
                                                                         <input type="text" class="form-control"
                                                                            id="foodname" aria-describedby="foodname"
                                                                            value="{{ !empty($data['treatment_period_in_days']) ?'Treatment Period '.$data['treatment_period_in_days'].'days' : '' }}"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group position-relative mb-3">
                                                                        <label class="form-label">Contact Number</label>
                                                                        <input type="text" class="form-control"
                                                                            id="foodname" aria-describedby="foodname"
                                                                            value="{{ !empty($treatment_information['mobile_no'])?$treatment_information['mobile_no']:'' }}"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group position-relative mb-3">
                                                                        <label class="form-label">Country</label>
                                                                        <input type="text" class="form-control"
                                                                            id="foodname" aria-describedby="foodname"
                                                                            value="{{ !empty($treatment_information['country_name'])?$treatment_information['country_name']:'' }}"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group position-relative mb-3">
                                                                        <label class="form-label">City</label>
                                                                        <input type="text" class="form-control"
                                                                            id="foodname" aria-describedby="foodname"
                                                                            value="{{ !empty($treatment_information['city_name']) ? $treatment_information['city_name'] : '' }}"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 pb-5">
                                                                    <div class="form-group position-relative mb-3">
                                                                        <label class="form-label">Address</label>
                                                                        <input type="text" class="form-control"
                                                                            id="foodname" aria-describedby="foodname"
                                                                            value="{{ !empty($treatment_information['company_address']) ? $treatment_information['company_address'] : '' }}"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="ShowDiv2" class="view-menu-div targetDiv mt-5">
                                                    <form id="my_form" class="mb-5">
                                                        <div class="view-menu mb-4">
                                                            <h6 class="card-h1 mb-4">Upload Documents & Video</h6>
                                                            <label for="cloud-upload-file" class="cloud-upload-file">
                                                                <!-- <i class="fa fa-cloud-upload text-green"></i> -->
                                                                <img src="{{ asset('front/assets/img/uploadFile.png') }}"
                                                                    alt="" class="cp">
                                                                <input type="file" name="customer_document_image_path"
                                                                    id="cloud-upload-file" hidden multiple>
                                                                <span class="fsb-2 fw-600">*Upload PDF, Jpeg or PNG, MP4,
                                                                    HEIC,
                                                                    H.264</span>
                                                            </label>
                                                        </div>
                                                    </form>

                                                    <h6 class="card-h1 mb-4">My Documents</h6>

                                                    <div class="gallery">
                                                        @if (!empty($data['documents']))
                                                            @foreach ($data['documents'] as $document)
                                                                @if (!empty($document['customer_document_image_path']))
                                                                    <a href="{{ $document['customer_document_image_path'] }}"
                                                                        class="glightbox">
                                                                        <img src="{{ !empty($document['customer_document_image_path'])?$document['customer_document_image_path']:asset('/front/assets/img/pdf.png') }}"
                                                                            alt="image" />
                                                                        <span class="clear-btn"
                                                                            id="{{ $document['id'] }}">X</span>
                                                                    </a>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                        {{-- <a href="{{ asset('../front/assets/img/homepage/ajooba_banner_video.mp4') }}"
                                                    class=" video-card glightbox" id="">
                                                    <video class="video-div " controls>
                                                        <source src="{{ asset('../front/assets/img/homepage/ajooba_banner_video.mp4') }}" type="video/mp4">
                                                    </video>
                                                    <i class="fa fa-play"></i>
                                                    <span class="clear-btn">X</span>
                                                    </a> --}}
                                                        {{-- <a href="{{ 'front/assets/img/galleryImg1.png' }}"
                                                    class="glightbox">
                                                    <img src="{{ 'front/assets/img/galleryImg1.png' }}" alt="image" />
                                                    <span class="clear-btn">X</span>
                                                    </a>
                                                    <a href="{{ 'front/assets/img/galleryImg2.png' }}" class="glightbox">
                                                        <img src="{{ 'front/assets/img/galleryImg2.png' }}" alt="image" />
                                                        <span class="clear-btn">X</span>
                                                    </a>
                                                    <a href="{{ 'front/assets/img/galleryImg3.png' }}" class="glightbox">
                                                        <img src="{{ 'front/assets/img/galleryImg3.png' }}" alt="image" />
                                                        <span class="clear-btn">X</span>
                                                    </a>
                                                    <a href="{{ 'front/assets/img/galleryImg4.png' }}" class="glightbox">
                                                        <img src="{{ 'front/assets/img/galleryImg4.png' }}" alt="image" />
                                                        <span class="clear-btn">X</span>
                                                    </a>
                                                    <a href="{{ 'front/assets/img/galleryImg3.png' }}" class="glightbox">
                                                        <img src="{{ 'front/assets/img/galleryImg3.png' }}" alt="image" />
                                                        <span class="clear-btn">X</span>
                                                    </a>
                                                    <a href="{{ 'front/assets/img/galleryImg4.png' }}" class="glightbox">
                                                        <img src="{{ 'front/assets/img/galleryImg4.png' }}" alt="image" />
                                                        <span class="clear-btn">X</span>
                                                    </a>
                                                    <a href="{{ 'front/assets/img/galleryImg1.png' }}" class="glightbox">
                                                        <img src="{{ 'front/assets/img/galleryImg1.png' }}" alt="image" />
                                                        <span class="clear-btn">X</span>
                                                    </a>
                                                    <a href="{{ 'front/assets/img/galleryImg2.png' }}" class="glightbox">
                                                        <img src="{{ 'front/assets/img/galleryImg2.png' }}" alt="image" />
                                                        <span class="clear-btn">X</span>
                                                    </a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="{{ url('/user-credit-card-pay') }}" id="payment_form"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="package_id"
                                                    value="{{ !empty($data['package_id']) ? $data['package_id'] : '' }}">
                                                <input type="hidden" name="package_percentage_price"
                                                    value="{{ !empty($pending_percent) ? $pending_percent : '' }}">
                                                <input type="hidden" name="sale_price"
                                                    value="{{ !empty($treatment_information['sale_price']) ? $treatment_information['sale_price'] : '' }}">
                                                <input type="hidden" name="pending_payment"
                                                    value="{{ !empty($data['pending_payment']) ? $data['pending_payment'] : '' }}">
                                                <input type="hidden" name="purchase_id"
                                                    value="{{ !empty($data['purchase_id']) ? $data['purchase_id'] : '' }}">
                                                <div class="user-details-footer">
                                                    <h6 class="card-h4 mb-4">You paid</h6>
                                                    <div class="user-payment-date mb-3">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="payment-left-div">
                                                                <div class="user-percentage fsb-1 fw-600">
                                                                    @if ($pending_percent == 0)
                                                                        {{ !empty($data['paid_amount']) ? $data['paid_amount'] : '' }}
                                                                        <span class="lira">₺</span>
                                                                    @else
                                                                        {{ !empty($data['payment_percentage']) ? $data['payment_percentage'] . '%' : '' }}(<span>{{ !empty($data['paid_amount']) ? $data['paid_amount'] : '' }}
                                                                            <span class="lira">₺</span>)</span>
                                                                    @endif
                                                                </div>

                                                                <div class="fsb-2 text-green paymt-green-text">Payment
                                                                    Completed.</div>
                                                            </div>
                                                            <div class="payment-right-div df-end flex-column">
                                                                <div class="fsb-2 text-green paymt-green-text">Payment Date
                                                                </div>

                                                                <div class="fsb-1">{{ $payment_time_and_date }}</div>
                                                                <!-- <div class="fsb-1"> 15:33:50  |   12/02/2023</div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- {{ dd($pending_percent) }} --}}
                                                    @if ($pending_percent != 0)
                                                        <div class="payment-paid-div">
                                                            <div
                                                                class="user-payment-date paid-percentage fsb-1 fw-600 d-flex flex-column ps-3 justify-content-center">
                                                                <span class="user-percentage fsb-1 fw-600">
                                                                    {{ $pending_percent }}(<span>{{ !empty($data['pending_payment']) ? $data['pending_payment'] : '' }}
                                                                        <span class="lira">₺</span>)</span>
                                                                </span>
                                                                <span class="fsb-2 paymt-green-text"
                                                                    style="color: #F3771D;">Pending</span>
                                                            </div>
                                                            <a href="javascript:void(0)"
                                                                class="payment-pay-btn df-center">
                                                                Pay Now
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- END -->

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Accommodation Details MODAL -->
    <div class="modal fade" id="AccommodationView" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header border-0 p-5 pb-0">
                    <h5 class="modal-title modal-h1 text-start camptonExtraBold" id="">Accommodation Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5">
                    <div class="acommodition-content">
                        <div class="acmdn-head mb-4">
                            <h6 class="card-h1 mb-0 camptonBold" style="letter-spacing: -1.12px;">Hotel</h6>
                            <h6 class="card-p2 fw-bold">
                                {{ !empty($data['accomodation_view']['hotel_name']) ? $data['accomodation_view']['hotel_name'] : '' }}
                            </h6>
                        </div>

                        <div class="acmdn-star mb-4">
                            <h6 class="card-h1  camptonBold" style="letter-spacing: -1.12px;">Hotel Stars</h6>
                            <p class="text-green d-flex gap-2">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </p>
                        </div>

                        <div class="acmdn-hotel-details">
                            <h6 class="card-h1 mb-0 camptonBold" style="letter-spacing: -1.12px;">Hotel Details</h6>
                            <h6 class="card-p2 fw-bold mb-3">Everything Included</h6>

                            <ul style="padding: 0;list-style: none;" class="mt-2">
                                @if ($avialable_accomodation_services == 1)
                                    @if ($breakfast == 1)
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 16 16" fill="none">
                                                <path
                                                    d="M4 1.5C4 1.36739 3.94732 1.24021 3.85355 1.14645C3.75979 1.05268 3.63261 1 3.5 1C3.36739 1 3.24021 1.05268 3.14645 1.14645C3.05268 1.24021 3 1.36739 3 1.5V4.5C2.99988 5.07633 3.19889 5.63499 3.56335 6.08145C3.9278 6.52791 4.43532 6.83473 5 6.95V14.5C5 14.6326 5.05268 14.7598 5.14645 14.8536C5.24021 14.9473 5.36739 15 5.5 15C5.63261 15 5.75979 14.9473 5.85355 14.8536C5.94732 14.7598 6 14.6326 6 14.5V6.95C6.56468 6.83473 7.0722 6.52791 7.43665 6.08145C7.80111 5.63499 8.00012 5.07633 8 4.5V1.5C8 1.36739 7.94732 1.24021 7.85355 1.14645C7.75979 1.05268 7.63261 1 7.5 1C7.36739 1 7.24021 1.05268 7.14645 1.14645C7.05268 1.24021 7 1.36739 7 1.5V4.5C7.00016 4.81033 6.90407 5.11306 6.72497 5.36649C6.54587 5.61992 6.29258 5.81156 6 5.915V1.5C6 1.36739 5.94732 1.24021 5.85355 1.14645C5.75979 1.05268 5.63261 1 5.5 1C5.36739 1 5.24021 1.05268 5.14645 1.14645C5.05268 1.24021 5 1.36739 5 1.5V5.915C4.70742 5.81156 4.45413 5.61992 4.27503 5.36649C4.09593 5.11306 3.99984 4.81033 4 4.5V1.5ZM11 14.5V8H9.5C9.36739 8 9.24021 7.94732 9.14645 7.85355C9.05268 7.75979 9 7.63261 9 7.5V3.5C9 2.837 9.326 2.217 9.771 1.771C10.217 1.326 10.837 1 11.5 1C11.6326 1 11.7598 1.05268 11.8536 1.14645C11.9473 1.24021 12 1.36739 12 1.5V14.5C12 14.6326 11.9473 14.7598 11.8536 14.8536C11.7598 14.9473 11.6326 15 11.5 15C11.3674 15 11.2402 14.9473 11.1464 14.8536C11.0527 14.7598 11 14.6326 11 14.5Z"
                                                    fill="#111111" />
                                            </svg>
                                            Breakfast & Dinner
                                        </li>
                                    @endif
                                    @if ($sauna == 1)
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 14 14" fill="none">
                                                <path
                                                    d="M13.225 11.4799H8.68027V12.5999H13.2714C13.3726 12.6049 13.4725 12.5749 13.5542 12.515C13.6359 12.4551 13.6946 12.3689 13.7203 12.2709V11.9993C13.7203 11.9993 13.7169 11.4799 13.225 11.4799ZM12.5964 11.2587C12.8947 11.2583 13.1806 11.1394 13.3914 10.9282C13.6021 10.7171 13.7204 10.4309 13.7203 10.1325C13.7203 9.50898 13.2163 9.0061 12.5964 9.0061C12.4487 9.00636 12.3026 9.03571 12.1663 9.09246C12.03 9.14922 11.9063 9.23228 11.8021 9.33689C11.6979 9.4415 11.6154 9.56561 11.5592 9.70214C11.503 9.83866 11.4743 9.98491 11.4747 10.1325C11.4747 10.7539 11.9773 11.2587 12.5964 11.2587ZM10.2292 11.1999C10.8189 11.1999 11.2932 10.7844 11.2932 10.1955C11.293 9.60782 10.817 9.29954 10.2318 9.29506L8.68027 9.49162V11.1999H10.2292ZM5.18671 3.90114C5.87523 3.90114 6.43215 3.34114 6.43215 2.65038C6.43215 1.95962 5.87523 1.3999 5.18671 1.3999C4.49875 1.3999 3.94099 1.95962 3.94099 2.65038C3.94099 3.34114 4.49875 3.90114 5.18671 3.90114ZM3.91495 7.94882L3.90375 7.93258L3.33927 6.61826L3.33843 9.2399H5.02543L5.39391 8.8479L4.39459 8.46318C4.15771 8.37414 3.98943 8.17254 3.91495 7.94882ZM4.27251 7.83094C4.32711 7.95358 4.42819 8.05298 4.55531 8.09862L6.48087 8.81234C6.53954 8.83816 6.60272 8.85213 6.6668 8.85346C6.73088 8.85479 6.79459 8.84344 6.85428 8.82008C6.91396 8.79672 6.96844 8.76179 7.01459 8.71732C7.06074 8.67284 7.09765 8.61968 7.12319 8.5609C7.17532 8.44178 7.1782 8.30686 7.13119 8.18563C7.08419 8.06439 6.99112 7.96667 6.87231 7.91382L5.09571 7.24294L4.54691 5.92666L4.90475 5.79338L5.36983 6.92122L6.72027 7.42186V6.0437L7.43707 6.47014L7.79435 8.26998C7.81493 8.33088 7.84737 8.38709 7.8898 8.43538C7.93224 8.48366 7.98382 8.52305 8.04157 8.55127C8.09932 8.5795 8.16209 8.59599 8.22626 8.59981C8.29042 8.60362 8.35471 8.59468 8.41539 8.5735C8.53761 8.53003 8.63776 8.44012 8.6941 8.32328C8.75045 8.20644 8.75846 8.07209 8.71639 7.94938L8.31599 6.2159C8.28976 6.11994 8.23486 6.03427 8.15863 5.97034C7.95339 5.74298 6.91543 4.58238 6.84151 4.50482C6.73315 4.39618 6.48535 4.1999 6.01719 4.1999H4.33719C3.38239 4.1999 3.19871 5.1743 3.39387 5.6699L4.27251 7.83094ZM8.40027 9.5199H0.831033C0.555513 9.5199 0.280273 9.6753 0.280273 10.0172V12.5999H8.40027V9.5199Z"
                                                    fill="#111111" />
                                            </svg>
                                            Sauna & Spa
                                        </li>
                                    @endif
                                    @if ($smoking == 1)
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 20 20" fill="none">
                                                <path
                                                    d="M6.66667 10.8333V14.1667M13.3333 4.16667V4.58333C13.3333 5.02536 13.5089 5.44928 13.8215 5.76184C14.134 6.07441 14.558 6.25 15 6.25C15.442 6.25 15.866 6.42559 16.1785 6.73816C16.4911 7.05072 16.6667 7.47464 16.6667 7.91667V8.33333M2.5 2.5L17.5 17.5M14.1667 10.8333H16.6667C16.8877 10.8333 17.0996 10.9211 17.2559 11.0774C17.4122 11.2337 17.5 11.4457 17.5 11.6667V13.3333C17.5 13.5667 17.4042 13.7775 17.25 13.9283M14.1667 14.1667H3.33333C3.11232 14.1667 2.90036 14.0789 2.74408 13.9226C2.5878 13.7663 2.5 13.5543 2.5 13.3333V11.6667C2.5 11.4457 2.5878 11.2337 2.74408 11.0774C2.90036 10.9211 3.11232 10.8333 3.33333 10.8333H10.8333"
                                                    stroke="#111111" stroke-width="1.66667" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            No Smoking
                                        </li>
                                    @endif
                                    @if ($wifi == 1)
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 16 12" fill="none">
                                                <g clip-path="url(#clip0_0_29559)">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.4214 1.95638C11.3285 0.7545 9.75232 0 7.99998 0C6.24763 0 4.67146 0.7545 3.57859 1.95638H12.4213H12.4214ZM3.57865 9.99438C4.67152 11.1962 6.2477 11.9508 8.00004 11.9508C9.75238 11.9508 11.3286 11.1962 12.4214 9.99438H3.57865ZM2.65464 2.46444C1.18908 2.46444 0.000976562 3.65269 0.000976562 5.1185V6.83225C0.000976562 8.298 1.18908 9.48625 2.65464 9.48625H13.3453C14.8109 9.48625 15.999 8.298 15.999 6.83225V5.1185C15.999 3.65269 14.8109 2.46444 13.3453 2.46444H2.65464ZM15.726 5.08819C15.726 3.78988 14.6737 2.73744 13.3756 2.73744H10.7219C9.4238 2.73744 8.37149 3.78988 8.37149 5.08813V6.87012C8.37149 8.16844 7.31919 9.22087 6.0211 9.22087H13.3756C14.6736 9.22087 15.7259 8.16838 15.7259 6.87012V5.08813L15.726 5.08819ZM6.50641 5.24731V7.75731H7.26457V5.24731H6.50641ZM6.43055 4.45494C6.43055 4.5746 6.47808 4.68936 6.56268 4.77398C6.64728 4.85859 6.76203 4.90613 6.88168 4.90613C7.00133 4.90613 7.11607 4.85859 7.20068 4.77398C7.28528 4.68936 7.33281 4.5746 7.33281 4.45494C7.33281 4.33528 7.28528 4.22051 7.20068 4.1359C7.11607 4.05129 7.00133 4.00375 6.88168 4.00375C6.76203 4.00375 6.64728 4.05129 6.56268 4.1359C6.47808 4.22051 6.43055 4.33528 6.43055 4.45494ZM1.3733 4.09481L2.35137 7.75731H2.98067L3.7162 5.22463L4.45161 7.75737H5.10365L6.06659 4.09481H5.33106L4.77007 6.50619L4.07253 4.09481H3.39774L2.70014 6.4455L2.16946 4.09481H1.3733ZM9.57703 4.09481V7.75731H10.3807V6.32419H12.2005V5.58106H10.3807V4.83794H12.3217V4.09481H9.57703ZM12.8676 5.24738V7.75737H13.6258V5.24738H12.8676ZM12.7994 4.44737C12.7994 4.56704 12.8469 4.6818 12.9315 4.76641C13.0161 4.85103 13.1309 4.89856 13.2505 4.89856C13.3702 4.89856 13.4849 4.85103 13.5695 4.76641C13.6541 4.6818 13.7016 4.56704 13.7016 4.44737C13.7016 4.32771 13.6541 4.21295 13.5695 4.12834C13.4849 4.04372 13.3702 3.99619 13.2505 3.99619C13.1309 3.99619 13.0161 4.04372 12.9315 4.12834C12.8469 4.21295 12.7994 4.32771 12.7994 4.44737Z"
                                                        fill="black" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_0_29559">
                                                        <rect width="16" height="12" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            Wi-Fi
                                        </li>
                                    @endif
                                    @if ($fitness == 1)
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 16 16" fill="none">
                                                <path
                                                    d="M11.0291 2.5C9.00032 2.5 8.00032 4.5 8.00032 4.5C8.00032 4.5 7.00032 2.5 4.97157 2.5C3.32282 2.5 2.01719 3.87938 2.00032 5.52531C1.96594 8.94188 4.71063 11.3716 7.71907 13.4134C7.80201 13.4699 7.9 13.5 8.00032 13.5C8.10063 13.5 8.19863 13.4699 8.28157 13.4134C11.2897 11.3716 14.0344 8.94188 14.0003 5.52531C13.9834 3.87938 12.6778 2.5 11.0291 2.5Z"
                                                    stroke="#111111" stroke-width="0.875" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M1.5 8H5L6.5 5L8 10L9.5 7L10.5 9H14.5" stroke="#111111"
                                                    stroke-width="0.875" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            Fitness Center
                                        </li>
                                    @endif
                                @endif
                            </ul>


                        </div>
                        <div class="acmdn-notes mb-1">
                            <h6 class="card-h1 camptonBold" style="letter-spacing: -1.12px;">Notes <span
                                    class="campton fst-italic fs-14">*Optional</span></h6>
                            <div class="for-textarea-div position-relative">
                                <textarea name="" id="" rows="4" class="form-control border-2"
                                    placeholder="Write notes if any" style="resize: none;"></textarea>
                                <div class="text-area-footer">
                                    <span>0 / 200</span>
                                    <button class="btn textarea-btn df-center">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END -->

    <!-- Transportation Details MODAL -->
    <div class="modal fade" id="TransportationView" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header border-0 p-5 pb-0">
                    <h5 class="modal-title modal-h1 text-start camptonExtraBold" id="">Transportation Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5">
                    <div class="acommodition-content">
                        <div class="acmdn-head mb-4">
                            <h6 class="card-h1 mb-0 camptonBold" style="letter-spacing: -1.12px;">Vehicle Brand </h6>
                            <h6 class="card-p2 fw-bold">
                                {{ !empty($data['transportation_view']['brand_name']) ? $data['transportation_view']['brand_name'] : '' }}
                            </h6>
                        </div>
                        <div class="acmdn-head mb-4">
                            <h6 class="card-h1 mb-0 camptonBold" style="letter-spacing: -1.12px;">Model</h6>
                            <h6 class="card-p2 fw-bold">
                                {{ !empty($data['transportation_view']['vehicle_model_id']) ? $data['transportation_view']['vehicle_model_id'] : '' }}
                            </h6>
                        </div>
                        <div class="acmdn-hotel-details">
                            <h6 class="card-h1 mb-0 camptonBold" style="letter-spacing: -1.12px;">Vehicle Class</h6>
                            <h6 class="card-p2 fw-bold">
                                {{ !empty($data['transportation_view']['vehicle_level_name']) ? $data['transportation_view']['vehicle_level_name'] : '' }}
                            </h6>

                            <ul style="padding: 0;list-style: none;" class="mt-2">
                                @if ($avialable_transportation_services == 1)
                                    @if ($seven == 1)
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none">
                                                <path
                                                    d="M7.49967 15.8334H12.4997V17.5001H7.49967C5.19967 17.5001 3.33301 15.6334 3.33301 13.3334V5.83343H4.99967V13.3334C4.99967 14.7168 6.11634 15.8334 7.49967 15.8334ZM8.68301 4.50843C9.33301 3.85843 9.33301 2.8001 8.68301 2.1501C8.03301 1.5001 6.97467 1.5001 6.32467 2.1501C5.67467 2.8001 5.67467 3.85843 6.32467 4.50843C6.97467 5.16676 8.02467 5.16676 8.68301 4.50843ZM9.58301 7.5001C9.58301 6.58343 8.83301 5.83343 7.91634 5.83343H7.49967C6.58301 5.83343 5.83301 6.58343 5.83301 7.5001V12.5001C5.83301 13.8834 6.94967 15.0001 8.33301 15.0001H12.558L15.4747 17.9168L16.6663 16.7251L12.4413 12.5001H9.58301V7.5001Z"
                                                    fill="#111111" />
                                            </svg>
                                            7+1
                                        </li>
                                    @endif
                                    @if ($gas == 1)
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none">
                                                <path
                                                    d="M5 1.66675H7.5C7.73333 1.66675 7.94167 1.75841 8.09167 1.90841L9.825 3.65008L10.4917 2.99175C10.8333 2.66675 11.25 2.50008 11.6667 2.50008H16.6667C17.0833 2.50008 17.5 2.66675 17.8417 2.99175L18.675 3.82508C19 4.16675 19.1667 4.58341 19.1667 5.00008V15.8334C19.1667 16.2754 18.9911 16.6994 18.6785 17.0119C18.3659 17.3245 17.942 17.5001 17.5 17.5001H9.16667C8.72464 17.5001 8.30072 17.3245 7.98816 17.0119C7.67559 16.6994 7.5 16.2754 7.5 15.8334V6.66675C7.5 6.25008 7.66667 5.83341 7.99167 5.49175L8.65 4.82508L7.15833 3.33341H5V1.66675ZM11.6667 4.16675V5.83341H16.6667V4.16675H11.6667ZM12.0083 9.16675L10.3417 7.50008H9.16667V8.67508L10.8333 10.3417V12.9917L9.16667 14.6584V15.8334H10.3417L12.0083 14.1667H14.6583L16.325 15.8334H17.5V14.6584L15.8333 12.9917V10.3417L17.5 8.67508V7.50008H16.325L14.6583 9.16675H12.0083ZM12.5 10.8334H14.1667V12.5001H12.5V10.8334Z"
                                                    fill="#111111" />
                                            </svg>
                                            Gasoline
                                        </li>
                                    @endif
                                    @if ($smoking == 1)
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 20 20" fill="none">
                                                <path
                                                    d="M6.66667 10.8333V14.1667M13.3333 4.16667V4.58333C13.3333 5.02536 13.5089 5.44928 13.8215 5.76184C14.134 6.07441 14.558 6.25 15 6.25C15.442 6.25 15.866 6.42559 16.1785 6.73816C16.4911 7.05072 16.6667 7.47464 16.6667 7.91667V8.33333M2.5 2.5L17.5 17.5M14.1667 10.8333H16.6667C16.8877 10.8333 17.0996 10.9211 17.2559 11.0774C17.4122 11.2337 17.5 11.4457 17.5 11.6667V13.3333C17.5 13.5667 17.4042 13.7775 17.25 13.9283M14.1667 14.1667H3.33333C3.11232 14.1667 2.90036 14.0789 2.74408 13.9226C2.5878 13.7663 2.5 13.5543 2.5 13.3333V11.6667C2.5 11.4457 2.5878 11.2337 2.74408 11.0774C2.90036 10.9211 3.11232 10.8333 3.33333 10.8333H10.8333"
                                                    stroke="#111111" stroke-width="1.66667" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            No Smoking
                                        </li>
                                    @endif
                                    @if ($wifi == 1)
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 16 12" fill="none">
                                                <g clip-path="url(#clip0_0_29559)">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.4214 1.95638C11.3285 0.7545 9.75232 0 7.99998 0C6.24763 0 4.67146 0.7545 3.57859 1.95638H12.4213H12.4214ZM3.57865 9.99438C4.67152 11.1962 6.2477 11.9508 8.00004 11.9508C9.75238 11.9508 11.3286 11.1962 12.4214 9.99438H3.57865ZM2.65464 2.46444C1.18908 2.46444 0.000976562 3.65269 0.000976562 5.1185V6.83225C0.000976562 8.298 1.18908 9.48625 2.65464 9.48625H13.3453C14.8109 9.48625 15.999 8.298 15.999 6.83225V5.1185C15.999 3.65269 14.8109 2.46444 13.3453 2.46444H2.65464ZM15.726 5.08819C15.726 3.78988 14.6737 2.73744 13.3756 2.73744H10.7219C9.4238 2.73744 8.37149 3.78988 8.37149 5.08813V6.87012C8.37149 8.16844 7.31919 9.22087 6.0211 9.22087H13.3756C14.6736 9.22087 15.7259 8.16838 15.7259 6.87012V5.08813L15.726 5.08819ZM6.50641 5.24731V7.75731H7.26457V5.24731H6.50641ZM6.43055 4.45494C6.43055 4.5746 6.47808 4.68936 6.56268 4.77398C6.64728 4.85859 6.76203 4.90613 6.88168 4.90613C7.00133 4.90613 7.11607 4.85859 7.20068 4.77398C7.28528 4.68936 7.33281 4.5746 7.33281 4.45494C7.33281 4.33528 7.28528 4.22051 7.20068 4.1359C7.11607 4.05129 7.00133 4.00375 6.88168 4.00375C6.76203 4.00375 6.64728 4.05129 6.56268 4.1359C6.47808 4.22051 6.43055 4.33528 6.43055 4.45494ZM1.3733 4.09481L2.35137 7.75731H2.98067L3.7162 5.22463L4.45161 7.75737H5.10365L6.06659 4.09481H5.33106L4.77007 6.50619L4.07253 4.09481H3.39774L2.70014 6.4455L2.16946 4.09481H1.3733ZM9.57703 4.09481V7.75731H10.3807V6.32419H12.2005V5.58106H10.3807V4.83794H12.3217V4.09481H9.57703ZM12.8676 5.24738V7.75737H13.6258V5.24738H12.8676ZM12.7994 4.44737C12.7994 4.56704 12.8469 4.6818 12.9315 4.76641C13.0161 4.85103 13.1309 4.89856 13.2505 4.89856C13.3702 4.89856 13.4849 4.85103 13.5695 4.76641C13.6541 4.6818 13.7016 4.56704 13.7016 4.44737C13.7016 4.32771 13.6541 4.21295 13.5695 4.12834C13.4849 4.04372 13.3702 3.99619 13.2505 3.99619C13.1309 3.99619 13.0161 4.04372 12.9315 4.12834C12.8469 4.21295 12.7994 4.32771 12.7994 4.44737Z"
                                                        fill="black" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_0_29559">
                                                        <rect width="16" height="12" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            Wi-Fi
                                        </li>
                                    @endif
                                @endif
                            </ul>
                        </div>
                        <div class="acmdn-repsntve-img">
                            <h6 class="card-p2 fw-bold fst-italic">*Representative image</h6>
                        </div>

                        <div class="acmdn-notes mb-1">
                            <h6 class="card-h1 camptonBold" style="letter-spacing: -1.12px;">Notes<i
                                    class="fsb-2">*Optional</i></h6>
                            <div class="for-textarea-div position-relative">
                                <textarea name="" id="" rows="4" class="form-control border-2"
                                    placeholder="Write notes if any" style="resize: none;"></textarea>
                                <div class="text-area-footer">
                                    <span>0 / 200</span>
                                    <button class="btn textarea-btn df-center">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END -->

    <!-- Tour Details MODAL -->
    <div class="modal fade" id="TourView" tabindex="-1" aria-labelledby="TourViewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header border-0 p-5 pb-0">
                    <h5 class="modal-title modal-h1 text-start camptonExtraBold" id="">Tour Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5 position-relative">
                    <div class="acommodition-content ">
                        <div class="acmdn-head mb-4">
                            <h6 class="card-h1 mb-0 camptonBold" style="letter-spacing: -1.12px;">Tour Name </h6>
                            <h6 class="card-p2 fw-bold">
                                <!-- {{ !empty($data['transportation_view']['brand_name']) ? $data['transportation_view']['brand_name'] : '' }} -->
                                Tour de france le!
                            </h6>
                        </div>
                        <div class="acmdn-head mb-4">
                            <h6 class="card-h1 mb-0 camptonBold" style="letter-spacing: -1.12px;">Number of Days</h6>
                            <h6 class="card-p2 fw-bold">
                                <!-- {{ !empty($data['transportation_view']['vehicle_model_id']) ? $data['transportation_view']['vehicle_model_id'] : '' }} -->
                                14
                            </h6>
                        </div>
                        <div class="acmdn-hotel-details">
                            <h6 class="card-h1 mb-0 camptonBold" style="letter-spacing: -1.12px;">Vehicle Class</h6>
                            <h6 class="card-p2 fw-bold">
                                {{ !empty($data['transportation_view']['vehicle_level_name']) ? $data['transportation_view']['vehicle_level_name'] : '' }}
                            </h6>

                            <ul style="padding: 0;list-style: none;" class="mt-2">
                                @if ($avialable_transportation_services == 1)
                                    @if ($seven == 1)
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none">
                                                <path
                                                    d="M7.49967 15.8334H12.4997V17.5001H7.49967C5.19967 17.5001 3.33301 15.6334 3.33301 13.3334V5.83343H4.99967V13.3334C4.99967 14.7168 6.11634 15.8334 7.49967 15.8334ZM8.68301 4.50843C9.33301 3.85843 9.33301 2.8001 8.68301 2.1501C8.03301 1.5001 6.97467 1.5001 6.32467 2.1501C5.67467 2.8001 5.67467 3.85843 6.32467 4.50843C6.97467 5.16676 8.02467 5.16676 8.68301 4.50843ZM9.58301 7.5001C9.58301 6.58343 8.83301 5.83343 7.91634 5.83343H7.49967C6.58301 5.83343 5.83301 6.58343 5.83301 7.5001V12.5001C5.83301 13.8834 6.94967 15.0001 8.33301 15.0001H12.558L15.4747 17.9168L16.6663 16.7251L12.4413 12.5001H9.58301V7.5001Z"
                                                    fill="#111111" />
                                            </svg>
                                            7+1
                                        </li>
                                    @endif
                                    @if ($gas == 1)
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none">
                                                <path
                                                    d="M5 1.66675H7.5C7.73333 1.66675 7.94167 1.75841 8.09167 1.90841L9.825 3.65008L10.4917 2.99175C10.8333 2.66675 11.25 2.50008 11.6667 2.50008H16.6667C17.0833 2.50008 17.5 2.66675 17.8417 2.99175L18.675 3.82508C19 4.16675 19.1667 4.58341 19.1667 5.00008V15.8334C19.1667 16.2754 18.9911 16.6994 18.6785 17.0119C18.3659 17.3245 17.942 17.5001 17.5 17.5001H9.16667C8.72464 17.5001 8.30072 17.3245 7.98816 17.0119C7.67559 16.6994 7.5 16.2754 7.5 15.8334V6.66675C7.5 6.25008 7.66667 5.83341 7.99167 5.49175L8.65 4.82508L7.15833 3.33341H5V1.66675ZM11.6667 4.16675V5.83341H16.6667V4.16675H11.6667ZM12.0083 9.16675L10.3417 7.50008H9.16667V8.67508L10.8333 10.3417V12.9917L9.16667 14.6584V15.8334H10.3417L12.0083 14.1667H14.6583L16.325 15.8334H17.5V14.6584L15.8333 12.9917V10.3417L17.5 8.67508V7.50008H16.325L14.6583 9.16675H12.0083ZM12.5 10.8334H14.1667V12.5001H12.5V10.8334Z"
                                                    fill="#111111" />
                                            </svg>
                                            Gasoline
                                        </li>
                                    @endif
                                    @if ($smoking == 1)
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 20 20" fill="none">
                                                <path
                                                    d="M6.66667 10.8333V14.1667M13.3333 4.16667V4.58333C13.3333 5.02536 13.5089 5.44928 13.8215 5.76184C14.134 6.07441 14.558 6.25 15 6.25C15.442 6.25 15.866 6.42559 16.1785 6.73816C16.4911 7.05072 16.6667 7.47464 16.6667 7.91667V8.33333M2.5 2.5L17.5 17.5M14.1667 10.8333H16.6667C16.8877 10.8333 17.0996 10.9211 17.2559 11.0774C17.4122 11.2337 17.5 11.4457 17.5 11.6667V13.3333C17.5 13.5667 17.4042 13.7775 17.25 13.9283M14.1667 14.1667H3.33333C3.11232 14.1667 2.90036 14.0789 2.74408 13.9226C2.5878 13.7663 2.5 13.5543 2.5 13.3333V11.6667C2.5 11.4457 2.5878 11.2337 2.74408 11.0774C2.90036 10.9211 3.11232 10.8333 3.33333 10.8333H10.8333"
                                                    stroke="#111111" stroke-width="1.66667" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            No Smoking
                                        </li>
                                    @endif
                                    @if ($wifi == 1)
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 16 12" fill="none">
                                                <g clip-path="url(#clip0_0_29559)">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.4214 1.95638C11.3285 0.7545 9.75232 0 7.99998 0C6.24763 0 4.67146 0.7545 3.57859 1.95638H12.4213H12.4214ZM3.57865 9.99438C4.67152 11.1962 6.2477 11.9508 8.00004 11.9508C9.75238 11.9508 11.3286 11.1962 12.4214 9.99438H3.57865ZM2.65464 2.46444C1.18908 2.46444 0.000976562 3.65269 0.000976562 5.1185V6.83225C0.000976562 8.298 1.18908 9.48625 2.65464 9.48625H13.3453C14.8109 9.48625 15.999 8.298 15.999 6.83225V5.1185C15.999 3.65269 14.8109 2.46444 13.3453 2.46444H2.65464ZM15.726 5.08819C15.726 3.78988 14.6737 2.73744 13.3756 2.73744H10.7219C9.4238 2.73744 8.37149 3.78988 8.37149 5.08813V6.87012C8.37149 8.16844 7.31919 9.22087 6.0211 9.22087H13.3756C14.6736 9.22087 15.7259 8.16838 15.7259 6.87012V5.08813L15.726 5.08819ZM6.50641 5.24731V7.75731H7.26457V5.24731H6.50641ZM6.43055 4.45494C6.43055 4.5746 6.47808 4.68936 6.56268 4.77398C6.64728 4.85859 6.76203 4.90613 6.88168 4.90613C7.00133 4.90613 7.11607 4.85859 7.20068 4.77398C7.28528 4.68936 7.33281 4.5746 7.33281 4.45494C7.33281 4.33528 7.28528 4.22051 7.20068 4.1359C7.11607 4.05129 7.00133 4.00375 6.88168 4.00375C6.76203 4.00375 6.64728 4.05129 6.56268 4.1359C6.47808 4.22051 6.43055 4.33528 6.43055 4.45494ZM1.3733 4.09481L2.35137 7.75731H2.98067L3.7162 5.22463L4.45161 7.75737H5.10365L6.06659 4.09481H5.33106L4.77007 6.50619L4.07253 4.09481H3.39774L2.70014 6.4455L2.16946 4.09481H1.3733ZM9.57703 4.09481V7.75731H10.3807V6.32419H12.2005V5.58106H10.3807V4.83794H12.3217V4.09481H9.57703ZM12.8676 5.24738V7.75737H13.6258V5.24738H12.8676ZM12.7994 4.44737C12.7994 4.56704 12.8469 4.6818 12.9315 4.76641C13.0161 4.85103 13.1309 4.89856 13.2505 4.89856C13.3702 4.89856 13.4849 4.85103 13.5695 4.76641C13.6541 4.6818 13.7016 4.56704 13.7016 4.44737C13.7016 4.32771 13.6541 4.21295 13.5695 4.12834C13.4849 4.04372 13.3702 3.99619 13.2505 3.99619C13.1309 3.99619 13.0161 4.04372 12.9315 4.12834C12.8469 4.21295 12.7994 4.32771 12.7994 4.44737Z"
                                                        fill="black" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_0_29559">
                                                        <rect width="16" height="12" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            Wi-Fi
                                        </li>
                                    @endif
                                @endif
                            </ul>
                        </div>
                        <div class="acmdn-repsntve-img">
                            <h6 class="card-p2 fw-bold fst-italic">*Representative image</h6>
                        </div>

                        <div class="acmdn-notes mb-1" style="position: absolute;bottom:40px">
                            <h6 class="card-h1 camptonBold" style="letter-spacing: -1.12px;">Notes<i
                                    class="fsb-2">*Optional</i></h6>
                            <div class="for-textarea-div position-relative">
                                <textarea name="" id="" rows="4" class="form-control border-2"
                                    placeholder="Write notes if any" style="resize: none;"></textarea>
                                <div class="text-area-footer">
                                    <span>0 / 200</span>
                                    <button class="btn textarea-btn df-center">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END -->
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    {{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> --}}
    <script>
        $(".upPackageLi").addClass("activeClass");
        $(".upPackage").addClass("md-active");
    </script>

    <script>
        $(document).ready(function() {
            $(".view-menu-div").hide();

            $("#accomodation_modal").click(function() {
                $("#AccommodationView").modal('show');
            });

            $("#transportation_modal").click(function() {
                $("#TransportationView").modal('show');
            });


            var baseUrl = $('#base_url').val();
            var token = "{{ Session::get('login_token') }}";
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $(".payment-pay-btn").click(function() {
                $("#payment_form").submit();
            });

            $('#cloud-upload-file').on('change', function() {
                var packageId = "{{ $data['package_id'] }}"
                var formData = new FormData();
                // var filePath = ""

                formData.append('customer_document_image_path', $(this)[0].files[0]);
                formData.append('package_id', packageId);
                // Assuming only one file is selected
                for (var pair of formData.entries()) {
                    console.log(pair[0] + ', ' + pair[1]);
                }
                $.ajax({
                    url: baseUrl +
                        '/api/md-customer-upload-documents', // Replace with your upload endpoint
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    success: function(response) {
                        console.log('Upload successful:', response);
                        var updatedImages = response.data;

                        // Iterate through the updated images and append them to the gallery
                        // for (var j = 0; j < updatedImages.length; j++) {
                        //     var document = updatedImages[j];
                        //     if (document.customer_document_image_path) {
                        //         var galleryLink = $('<a>', {
                        //             href: document.customer_document_image_path,
                        //             class: 'glightbox'
                        //         });

                        //         var img = $('<img>', {
                        //             src: document.customer_document_image_path,
                        //             alt: 'image'
                        //         });

                        //         var clearBtn = $('<span>', {
                        //             class: 'clear-btn',
                        //             id: document.package_id,
                        //             text: 'X'
                        //         });

                        //         galleryLink.append(img);
                        //         galleryLink.append(clearBtn);

                        //         $('.gallery').append(galleryLink);
                        //     }
                        // }

                        // // Optionally, you can reload the lightbox here if needed
                        // lightbox.reload();
                        document.location.reload();
                    },
                    error: function(error) {
                        console.error('Upload error:', error);
                    }
                });
            });

            $('.clear-btn').click(function(e) {
                // alert('hi');
                e.preventDefault();
                e.stopPropagation();
                var id = this.id;
                var formData = new FormData();
                formData.append('id', id);
                // alert('Id: ' + id);
                $.ajax({
                    url: baseUrl +
                        '/api/md-customer-remove-documents', // Replace with your upload endpoint
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    success: function(response) {
                        console.log('remove successful:', response);
                        document.location.reload();
                    },
                    error: function(error) {
                        console.error('remove error:', error);
                    }
                });
            });

            $(function() {
                $('.showSingle').click(function() {
                    var targetDiv = '#ShowDiv' + $(this).attr('target');

                    if ($(targetDiv).is(':visible')) {
                        $(targetDiv).slideToggle();
                    } else {
                        $('.targetDiv').slideUp();
                        $(targetDiv).slideToggle();
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        const lightbox = GLightbox({
            ...options
        });
    </script>
@endsection
                // alert(packageId + " " + purchaseId);
                e.preventDefault();
                let clickedId = id;
                $.ajax({
                    type: 'POST',
                    url: baseUrl + '/api/md-change-patient-information-list', // Your endpoint
                    contentType: false,
                    processData: false,
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: formData,
                    success: function(response) {
                        // alert(clickedId);
                        var id = this.id;
                        console.log("Success: " + response.PatientInformation);
                        var PatientInformation = response.PatientInformation;
                        // var patientId = 0;

                        // PatientInformation.forEach(function(patientInfo) {
                        //     console.log(patientInfo);
                        //     patientId++;
                        // });
                        // PatientInformation = PatientInformation[patientId - 1];
                        console.log(PatientInformation);
                        $('#package_buy_for').val(PatientInformation.package_buy_for);
                        $('#package_id').val(PatientInformation.package_id);
                        $('#patiant_id').val(PatientInformation.patient_id);
                        $('#patient_full_name').val(PatientInformation.patient_full_name);
                        $('#patient_relation').val(PatientInformation.patient_relation);
                        $('#patient_email').val(PatientInformation.patient_email);
                        $('#patient_contact_no').val(PatientInformation.patient_contact_no);
                        // $('#patient_country_id').val(PatientInformation.patient_country_id);
                        // $('#patient_city_id').val(PatientInformation.patient_city_id);
                        var cityList = $('#patient_city_id');
                        var countryList = $('#patient_country_id');
                        var countryId = PatientInformation.patient_country_id;

                        countryList.find('option[value="' + PatientInformation
                            .patient_country_id + '"]').prop('selected', true);
                        $.ajax({
                            url: baseUrl + '/get_cities_of_country/' + countryId,
                            type: 'GET',
                            success: function(response) {
                                // Request successful, update cities dropdown
                                $('#patient_city_id')
                            .empty(); // Clear existing options
                                $.each(response.cities, function(index, city) {
                                    $('#patient_city_id').append(
                                        '<option value="' + city.id +
                                        '">' + city.city_name +
                                        '</option>');
                                });
                                cityList.find('option[value="' + PatientInformation
                                    .patient_city_id + '"]').prop('selected',
                                    true);
                            },
                            error: function(xhr, status, error) {
                                $('#patient_city_id').empty();
                                alert('no cities found');
                                console.error('Error fetching cities:', error);
                            }
                        });
                        $('#UserChangeInformationModel').modal('show');
                    },
                    error: function(xhr, status, error) {

                        console.log(xhr.responseText);
                    }
                });
            });

            $('.change-patient-from-submit').click(function(e) {
                e.preventDefault();
                $('#UserChangeInformationForm').submit();
            });

            $('#UserChangeInformationForm').validate({
                rules: {
                    patient_full_name: {
                        required: true,
                    },
                    // patient_relation: {
                    //     required: true,
                    // },
                    patient_email: {
                        // required: true,
                        email: true,
                    },
                    patient_contact_no: {
                        required: true,
                    },
                    patient_country_id: {
                        required: true,
                    },
                    patient_city_id: {
                        required: true,
                    },

                },
                messages: {
                    patient_full_name: {
                        required: "Please enter patient full name",
                    },
                    // patient_relation: {
                    //     required: "Please enter patient relation",
                    // },
                    patient_email: {
                        // required: "Please enter patient email",
                    },
                    patient_contact_no: {
                        // required: "Please enter patient contact number",
                        email: "Please enter valid patient email",
                    },
                    patient_country_id: {
                        required: "Please select patient country",
                    },
                    patient_city_id: {
                        required: "Please select patient city",
                    },

                },
                submitHandler: function(form) {
                    // form.preventDefault();
                    var formData = new FormData(form);
                    formData.append('platform_type', 'web');
                    formData.append("patient_id", $('#patiant_id').val());
                    formData.append("purchase_id", purchaseId);

                    $.ajax({
                        type: 'POST',
                        url: baseUrl + '/api/md-update-patient-information', // Your endpoint
                        contentType: false,
                        processData: false,
                        headers: {
                            'Authorization': 'Bearer ' + token,
                            'X-CSRF-TOKEN': csrfToken
                        },
                        data: formData,
                        beforeSend: function() {
                            $('#submit_btn2').attr('disabled', true);
                            $('#submit_btn2').html(
                                '<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Please Wait...'
                            );
                        },
                        success: function(response) {
                            $('#submit_btn2').attr('disabled', false);
                            $('#submit_btn2').html('Submit');
                            console.log("Success: " + response);
                            $('#UserChangeInformationModel').modal('hide');
                        },
                        error: function(xhr, status, error) {
                            $('#submit_btn2').attr('disabled', true);
                            $('#UserChangeInformationModel').modal('hide');
                            alert('Error:', error);
                        },
                    });
                    return false;
                }
            });


            $(".UserCancelPackage").on('click', function() {

                let rawId = this.id.split('-')[1];
                let packageId = rawId.split('?')[0];
                let purchaseId = rawId.split('?')[1];

                $("#id").val(purchaseId);
                $('#UserCancellationReq').modal('show');

            });

            $('.cancel-package-from-submit').click(function(e) {
                e.preventDefault();
                $('#UserCancelPackageForm').submit();
            });

            $('#UserCancelPackageForm').validate({
                rules: {
                    // cancellation_reason: {
                    //     required: true,
                    // },
                    cancellation_detail: {
                        required: true,
                    },
                    flexCheckChecked: {
                        required: true,
                    },
                },
                messages: {
                    // cancellation_reason: {
                    //     required: "Please select a cancellation reason",
                    // },
                    cancellation_detail: {
                        required: "Please enter your cancellation detail",
                    },
                    flexCheckChecked: {
                        required: "Please Confirm if you want to cancel",
                    },
                },
                submitHandler: function(form) {
                    var formData = new FormData(form);
                    formData.append('platform_type', 'web');
                    var baseUrl = $('#base_url').val();
                    var token = "{{ Session::get('login_token') }}";
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        url: baseUrl + '/api/md-customer-change-package-list-active-cancelled',
                        type: 'POST',
                        data: formData,
                        headers: {
                            'Authorization': 'Bearer ' + token,
                            'X-CSRF-TOKEN': csrfToken,
                        },
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            $('.cancel-package-from-submit').attr('disabled', true);
                            $('.cancel-package-from-submit').html(
                                '<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Please Wait...'
                            );
                        },
                        success: function(response) {
                            $('.cancel-package-from-submit').attr('disabled', false);
                            $('.cancel-package-from-submit').html('CancelTreatment');
                            $('#UserCancellationReq').modal('hide');
                            location.reload();
                            console.log('Success:', response);
                        },
                        error: function(error) {
                            $('.cancel-package-from-submit').attr('disabled', false);
                            $('#UserCancellationReq').modal('hide');
                            alert('Error:', error);
                        },
                    });
                    return false;
                }
            });

            $(".UserWriteReview").on('click', function() {

                let rawId = this.id.split('-')[1];
                let packageId = rawId.split('?')[0];
                let purchaseId = rawId.split('?')[1];

                $("#id").val(purchaseId);
                $('#ReviewModal').modal('show');

            });

            $('.user-review-from-submit').click(function(e) {
                e.preventDefault();
                $('#UserCancelPackageForm').submit();
            });

            var cleanValid = false;
            var comfortValid = false;
            var foodValid = false;
            var behaviourValid = false;
            var rateValid = false;

            $('i').click(function() {
                var id = this.id;
                var category = id.split('_')[0];
                id = id.split('_')[1];

                for (var i = 5; i > 0; i--) {
                    $('#' + category + "_" + i).removeClass('selectable');
                }
                for (var i = id; i > 0; i--) {
                    $('#' + category + "_" + i).addClass('selectable');
                }



            });

            $('.star').click(function() {
                // alert('hi');
                var id = this.id;
                var category = id.split('_')[0];
                id = id.split('_')[1];
                // alert(category);
                for (var i = 10; i > 0; i--) {
                    $('#' + category + "_" + i).css('background-color', '#B9B9B9');
                }
                for (var i = id; i > 0; i--) {
                    // alert(str);
                    $('#' + category + "_" + i).css('background-color', 'green');

                }
                // stars.removeClass('selected');
                // $(this).addClass('selected');
            });

            $('.user-review-from-submit').click(function() {

            });

            $('#patient_country_id').change(function() {
                var countryId = $(this).val();
                if (countryId) {
                    // Make AJAX request
                    $.ajax({
                        url: baseUrl + '/get_cities_of_country/' + countryId,
                        type: 'GET',
                        success: function(response) {
                            // Request successful, update cities dropdown
                            $('#patient_city_id').empty(); // Clear existing options
                            $.each(response.cities, function(index, city) {
                                $('#patient_city_id').append('<option value="' + city
                                    .id + '">' + city.city_name + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            $('#patient_city_id').empty();
                            alert('no cities found');
                            console.error('Error fetching cities:', error);
                        }
                    });
                }
            });
        });
    </script>
@endsection
