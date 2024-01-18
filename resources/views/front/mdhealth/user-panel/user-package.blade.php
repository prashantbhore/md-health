@section('php')
    @php
        // $my_active_packages_list;
        // $my_completed_packages_list;
        // $my_cancelled_packages_list;
        // dd($my_active_packages_list);
        $patient_information_list = !empty($patient_information_list[0]) ? $patient_information_list[0] : '';

    @endphp
@endsection
@extends('front.layout.layout2')
@section('content')
    <style>
        .form-control {
            font-family: "Campton" !important;
        }

        .user-package-tab .treatment-card img {
            width: 105px;
        }

        .treatment-card-btns {
            border-bottom: 2px solid #d7d7d7;
            margin-bottom: 24px;
            padding-bottom: 24px;
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
        <div class="container py-100px for-cards">
            <div class="row">
                <div class="col-md-3">
                    @include('front.includes.sidebar-user')
                </div>
                <div class="col-md-9">

                    <div class="card">
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
                                                <div class="card shadow-none mb-4 pkgCard">
                                                    <div class="card-body d-flex gap-3 w-100 p-4">
                                                        <div class="df-center">
                                                            <img src="{{ asset($active_package['company_logo_image_path']) }}"
                                                                alt=""
                                                                class="md-img">
                                                            <!-- <img src="{{ asset('front/assets/img/packageImg.png') }}" alt="" class="pkgImg"> -->
                                                        </div>
                                                        <div class="df-column">
                                                            <h5 class="mb-0">
                                                                {{ !empty($active_package['package_name']) ? $active_package['package_name'] : '' }}
                                                            </h5>

                                                            <h6 class="card-h1">
                                                                {{ !empty($active_package['product_category_name']) ? $active_package['treatment_period_in_days'] : '' }}
                                                            </h6>

                                                            <div class="d-flex align-items-center gap-3 mb-3">
                                                                <p class="fsb-2 mb-0 d-flex align-items-center gap-1">
                                                                    <svg width="10" height="15" viewBox="0 0 10 15"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M4.95833 6.72917C4.48868 6.72917 4.03826 6.5426 3.70617 6.2105C3.37407 5.87841 3.1875 5.42799 3.1875 4.95833C3.1875 4.48868 3.37407 4.03826 3.70617 3.70617C4.03826 3.37407 4.48868 3.1875 4.95833 3.1875C5.42799 3.1875 5.87841 3.37407 6.2105 3.70617C6.5426 4.03826 6.72917 4.48868 6.72917 4.95833C6.72917 5.19088 6.68336 5.42115 6.59437 5.636C6.50538 5.85085 6.37494 6.04606 6.2105 6.2105C6.04606 6.37494 5.85085 6.50538 5.636 6.59437C5.42115 6.68336 5.19088 6.72917 4.95833 6.72917ZM4.95833 0C3.6433 0 2.38213 0.522394 1.45226 1.45226C0.522394 2.38213 0 3.6433 0 4.95833C0 8.67708 4.95833 14.1667 4.95833 14.1667C4.95833 14.1667 9.91667 8.67708 9.91667 4.95833C9.91667 3.6433 9.39427 2.38213 8.46441 1.45226C7.53454 0.522394 6.27337 0 4.95833 0Z"
                                                                            fill="#111111" />
                                                                    </svg>
                                                                    {{ !empty($active_package['city_name'] ? $active_package['treatment_period_in_days'] : '') }}
                                                                </p>
                                                                <p class="mb-0 d-flex align-items-center gap-1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                        height="15" viewBox="0 0 14 15" fill="none">
                                                                        <path
                                                                            d="M4.83372 1.41667V0H9.08372V1.41667H4.83372ZM5.54206 9.73958L4.76289 8.18125C4.70386 8.05139 4.61532 7.95388 4.49727 7.88871C4.37921 7.82354 4.25525 7.79119 4.12539 7.79167H0.619141C0.796224 6.19792 1.48685 4.85492 2.69102 3.76267C3.89518 2.67042 5.31775 2.12453 6.95872 2.125C7.69067 2.125 8.3931 2.24306 9.06602 2.47917C9.73893 2.71528 10.3705 3.05764 10.9608 3.50625L11.9525 2.51458L12.9441 3.50625L11.9525 4.49792C12.3303 4.99375 12.6313 5.51626 12.8556 6.06546C13.0799 6.61465 13.2275 7.19006 13.2983 7.79167H10.2348L9.01289 5.34792C8.88303 5.07639 8.67053 4.94062 8.37539 4.94062C8.08025 4.94062 7.86775 5.07639 7.73789 5.34792L5.54206 9.73958ZM6.95872 14.875C5.31775 14.875 3.89518 14.3289 2.69102 13.2366C1.48685 12.1444 0.796224 10.8016 0.619141 9.20833H3.68268L4.90456 11.6521C5.03442 11.9236 5.24692 12.0594 5.54206 12.0594C5.8372 12.0594 6.0497 11.9236 6.17956 11.6521L8.37539 7.26042L9.15456 8.81875C9.21358 8.94861 9.30213 9.04612 9.42018 9.11129C9.53824 9.17646 9.6622 9.20881 9.79206 9.20833H13.2983C13.1212 10.8021 12.4306 12.1448 11.2264 13.2366C10.0223 14.3284 8.5997 14.8745 6.95872 14.875Z"
                                                                            fill="#111111" />
                                                                    </svg>
                                                                    <i>{{ !empty($active_package['treatment_period_in_days'] ? $active_package['treatment_period_in_days'] : '') }}</i>
                                                                </p>
                                                            </div>
                                                            <h6 class="card-p1 fw-bold">Time left to treatment:
                                                                {{ !empty($active_package['treatment_start_date']) ? $active_package['treatment_start_date'] : '' }}
                                                                days</h6>
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
                                                            class="order-completed-btn w-100 bg-black fsb-2 text-white UserChangeInformation"
                                                            id="change_information_model-{{ $active_package['package_id'] . '?' . $active_package['purchase_id'] }}">Change
                                                            Patient Information</a>
                                                        {{-- <a href="javascript:void(0)" class="order-completed-btn w-100 bg-black fsb-2 text-white UserChangeInformation" data-bs-toggle="modal" data-bs-target="#UserChangeInformationModel">Change Patient Information</a> --}}
                                                        <a href="javascript:void(0)"
                                                            class="order-completed-btn w-100 bg-red fsb-2 text-white UserCancelPackage"
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
                                                <div class="card shadow-none mb-4 pkgCard">
                                                    <div class="card-body d-flex gap-3 w-100 p-4">
                                                        <div class="df-center">
                                                            <img src="{{ asset($completed_package['company_logo_image_path']) }}" alt="" class="md-img">
                                                        </div>
                                                        <div class="df-column">
                                                            <div class="trmt-card-body">
                                                                <h5 class="mb-0">
                                                                    {{ !empty($completed_package['package_name']) ? $completed_package['package_name'] : '' }}
                                                                </h5>
                                                                <h6 class="card-h1">
                                                                    {{ !empty($completed_package['product_category_name']) ? $completed_package['product_category_name'] : '' }}
                                                                </h6>
                                                                <div class="d-flex align-items-center gap-3 mb-3">
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
                                                                        <i>{{ !empty($completed_package['treatment_period_in_days']) ? $completed_package['treatment_period_in_days'] : '' }}</i>
                                                                    </p>
                                                                </div>
                                                                <h6 class="card-p1 fw-bold">Time left to treatment:
                                                                    <span class="text-green">Completed!</span>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-md-4 d-flex justify-content-start align-items-end ">
                                                            @if (!empty($completed_package['id']))
                                                                <div class="trmt-card-footer w-100">
                                                                    <a href="javascript:void(0)"
                                                                        class="order-completed-btn w-100 fsb-2 bg-orange text-white UserWriteReview"
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
                                                <div class="card shadow-none mb-4 pkgCard">
                                                    <div class="card-body d-flex gap-3 w-100 p-4">
                                                        <div class="df-center">
                                                            <img src="{{ asset($cancelled_package['company_logo_image_path']) }}"
                                                                alt=""
                                                                style="height: 109px;width:109px;border-radius: 3px;object-fit:cover">
                                                        </div>
                                                        <div class="df-column">
                                                            <h5 class="mb-0">
                                                                {{ !empty($cancelled_package['package_name']) ? $cancelled_package['package_name'] : '' }}
                                                            </h5>
                                                            <h6 class="card-h1">
                                                                {{ !empty($cancelled_package['product_category_name']) ? $cancelled_package['product_category_name'] : '' }}
                                                            </h6>
                                                            <div class="d-flex align-items-center gap-3 mb-3">
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
                                                                    <i>{{ !empty($cancelled_package['treatment_period_in_days']) ? $cancelled_package['treatment_period_in_days'] : '' }}</i>
                                                                </p>
                                                            </div>
                                                            <h6 class="card-p1 fw-bold">Time left to treatment:
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
                            <input type="hidden" name="id" id="patiant_id"
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
                    <button type="button" class="btn-close p-0" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5">
                    <div class="acommodition-content">
                        <div class="mb-4">
                            <h6 class="user-res-p10 mb-2 star-rating">Cleanliness</h6>
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
                            <h6 class="user-res-p10 mb-2 star-rating">Comfort</h6>
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
                            <h6 class="user-res-p10 mb-2 star-rating">Food Quality</h6>
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
                            <h6 class="user-res-p10 mb-2 star-rating">Behavior / Professionalism
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
                            <h6 class="user-res-p10 mb-1 ">Do you recommend this
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
                            <p class=""><span class="user-res-p10">Extra
                                    Notes</span><span class="user-res-p3 fst-italix"> *Optional</span></p>
                            <div class="form-floating" style="width: 312px">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2" class="user-res-p8 camptonBook">Please share you feedback
                                    & experience.</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="user-res-btn4 user-review-from-submit" data-bs-toggle="modal"
                                data-bs-target="#hotelcompletedmodel2" data-bs-dismiss="modal">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            // alert('hi');
            var baseUrl = $('#base_url').val();
            var token = "{{ Session::get('login_token') }}";
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $(".upPackageLi").addClass("activeClass");
            $(".upPackage").addClass("md-active");

            $(".UserChangeInformation").on('click', function(e) {

                let id = this.id;
                let rawId = this.id.split('-')[1];
                let packageId = rawId.split('?')[0];
                let purchaseId = rawId.split('?')[1];
                let formData = new FormData();
                formData.append("id", packageId);
                formData.append("purchase_id", purchaseId);
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
                        $('#patiant_id').val(PatientInformation.id);
                        $('#patient_full_name').val(PatientInformation.patient_full_name);
                        $('#patient_relation').val(PatientInformation.patient_relation);
                        $('#patient_email').val(PatientInformation.patient_email);
                        $('#patient_contact_no').val(PatientInformation.patient_contact_no);
                        $('#patient_country_id').val(PatientInformation.patient_country_id);
                        $('#patient_city_id').val(PatientInformation.patient_city_id);

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
                    patient_relation: {
                        required: true,
                    },
                    patient_email: {
                        required: true,
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
                    patient_relation: {
                        required: "Please enter patient relation",
                    },
                    patient_email: {
                        required: "Please enter patient email",
                    },
                    patient_contact_no: {
                        required: "Please enter patient contact no",
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
                $('#ReviewModal').modal('show');

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

            $('i').click(function() {
                var id = this.id;
                var category = id.split('_')[0];
                id = id.split('_')[1];
                // alert(category);
                for (var i = 5; i > 0; i--) {
                    $('#' + category + "_" + i).removeClass('selectable');
                }
                for (var i = id; i > 0; i--) {
                    var str = category + '_' + i;

                    // alert(str);
                    $('#' + category + "_" + i).addClass('selectable');

                }
                // stars.removeClass('selected');
                // $(this).addClass('selected');
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

            $('.star-rating').each(function() {
                var container = $(this);
                var stars = container.find('.fa-star');
                var errorMessage = container.find('.error-message');


                stars.on('click', function() {
                    alert('hi');
                    stars.removeClass('selected');
                    $(this).addClass('selected');
                });

                container.find('.user-review-from-submit').on('click', function() {
                    var selectedStar = container.find('.reviewsStar .selected');

                    if (!selectedStar.length) {
                        errorMessage.text('Please select at least one star for ' + container.data(
                            'category'));
                    } else {
                        errorMessage.text('');
                        // Include logic to submit the form or perform other actions
                    }
                });
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
        });
    </script>
@endsection
@section('php')
    @php
        // $my_active_packages_list;
        // $my_completed_packages_list;
        // $my_cancelled_packages_list;
        // dd($my_active_packages_list);
        $patient_information_list = !empty($patient_information_list[0]) ? $patient_information_list[0] : '';

    @endphp
@endsection
@extends('front.layout.layout2')
@section('content')
    <style>
        .form-control {
            font-family: "Campton" !important;
        }

        .user-package-tab .treatment-card img {
            width: 105px;
        }

        .treatment-card-btns {
            border-bottom: 2px solid #d7d7d7;
            margin-bottom: 24px;
            padding-bottom: 24px;
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
        <div class="container py-100px for-cards">
            <div class="row">
                <div class="col-md-3">
                    @include('front.includes.sidebar-user')
                </div>
                <div class="col-md-9">

                    <div class="card">
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
                                                <div class="card shadow-none mb-4 pkgCard">
                                                    <div class="card-body d-flex gap-3 w-100 p-4">
                                                        <div class="df-center">
                                                            <img src="{{ asset($active_package['company_logo_image_path']) }}"
                                                                alt=""
                                                                style="height: 109px;width:109px;border-radius: 3px;object-fit:cover">
                                                            <!-- <img src="{{ asset('front/assets/img/packageImg.png') }}" alt="" class="pkgImg"> -->
                                                        </div>
                                                        <div class="df-column">
                                                            <h5 class="mb-0">
                                                                {{ !empty($active_package['package_name']) ? $active_package['package_name'] : '' }}
                                                            </h5>

                                                            <h6 class="card-h1">
                                                                {{ !empty($active_package['product_category_name']) ? $active_package['treatment_period_in_days'] : '' }}
                                                            </h6>

                                                            <div class="d-flex align-items-center gap-3 mb-3">
                                                                <p class="fsb-2 mb-0 d-flex align-items-center gap-1">
                                                                    <svg width="10" height="15" viewBox="0 0 10 15"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M4.95833 6.72917C4.48868 6.72917 4.03826 6.5426 3.70617 6.2105C3.37407 5.87841 3.1875 5.42799 3.1875 4.95833C3.1875 4.48868 3.37407 4.03826 3.70617 3.70617C4.03826 3.37407 4.48868 3.1875 4.95833 3.1875C5.42799 3.1875 5.87841 3.37407 6.2105 3.70617C6.5426 4.03826 6.72917 4.48868 6.72917 4.95833C6.72917 5.19088 6.68336 5.42115 6.59437 5.636C6.50538 5.85085 6.37494 6.04606 6.2105 6.2105C6.04606 6.37494 5.85085 6.50538 5.636 6.59437C5.42115 6.68336 5.19088 6.72917 4.95833 6.72917ZM4.95833 0C3.6433 0 2.38213 0.522394 1.45226 1.45226C0.522394 2.38213 0 3.6433 0 4.95833C0 8.67708 4.95833 14.1667 4.95833 14.1667C4.95833 14.1667 9.91667 8.67708 9.91667 4.95833C9.91667 3.6433 9.39427 2.38213 8.46441 1.45226C7.53454 0.522394 6.27337 0 4.95833 0Z"
                                                                            fill="#111111" />
                                                                    </svg>
                                                                    {{ !empty($active_package['city_name'] ? $active_package['treatment_period_in_days'] : '') }}
                                                                </p>
                                                                <p class="mb-0 d-flex align-items-center gap-1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                        height="15" viewBox="0 0 14 15" fill="none">
                                                                        <path
                                                                            d="M4.83372 1.41667V0H9.08372V1.41667H4.83372ZM5.54206 9.73958L4.76289 8.18125C4.70386 8.05139 4.61532 7.95388 4.49727 7.88871C4.37921 7.82354 4.25525 7.79119 4.12539 7.79167H0.619141C0.796224 6.19792 1.48685 4.85492 2.69102 3.76267C3.89518 2.67042 5.31775 2.12453 6.95872 2.125C7.69067 2.125 8.3931 2.24306 9.06602 2.47917C9.73893 2.71528 10.3705 3.05764 10.9608 3.50625L11.9525 2.51458L12.9441 3.50625L11.9525 4.49792C12.3303 4.99375 12.6313 5.51626 12.8556 6.06546C13.0799 6.61465 13.2275 7.19006 13.2983 7.79167H10.2348L9.01289 5.34792C8.88303 5.07639 8.67053 4.94062 8.37539 4.94062C8.08025 4.94062 7.86775 5.07639 7.73789 5.34792L5.54206 9.73958ZM6.95872 14.875C5.31775 14.875 3.89518 14.3289 2.69102 13.2366C1.48685 12.1444 0.796224 10.8016 0.619141 9.20833H3.68268L4.90456 11.6521C5.03442 11.9236 5.24692 12.0594 5.54206 12.0594C5.8372 12.0594 6.0497 11.9236 6.17956 11.6521L8.37539 7.26042L9.15456 8.81875C9.21358 8.94861 9.30213 9.04612 9.42018 9.11129C9.53824 9.17646 9.6622 9.20881 9.79206 9.20833H13.2983C13.1212 10.8021 12.4306 12.1448 11.2264 13.2366C10.0223 14.3284 8.5997 14.8745 6.95872 14.875Z"
                                                                            fill="#111111" />
                                                                    </svg>
                                                                    <i>{{ !empty($active_package['treatment_period_in_days'] ? $active_package['treatment_period_in_days'] : '') }}</i>
                                                                </p>
                                                            </div>
                                                            <h6 class="card-p1 fw-bold">Time left to treatment:
                                                                {{ !empty($active_package['treatment_start_date']) ? $active_package['treatment_start_date'] : '' }}
                                                                days</h6>
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
                                                            class="order-completed-btn w-100 bg-black fsb-2 text-white UserChangeInformation"
                                                            id="change_information_model-{{ $active_package['package_id'] . '?' . $active_package['purchase_id'] }}">Change
                                                            Patient Information</a>
                                                        {{-- <a href="javascript:void(0)" class="order-completed-btn w-100 bg-black fsb-2 text-white UserChangeInformation" data-bs-toggle="modal" data-bs-target="#UserChangeInformationModel">Change Patient Information</a> --}}
                                                        <a href="javascript:void(0)"
                                                            class="order-completed-btn w-100 bg-red fsb-2 text-white UserCancelPackage"
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
                                                <div class="card shadow-none mb-4 pkgCard">
                                                    <div class="card-body d-flex gap-3 w-100 p-4">
                                                        <div class="df-center">

                                                            <img src="{{ asset($completed_package['company_logo_image_path']) }}"
                                                                alt="">

                                                        </div>

                                                        <div class="df-column">
                                                            <div class="trmt-card-body">
                                                                <h5 class="mb-0">
                                                                    {{ !empty($completed_package['package_name']) ? $completed_package['package_name'] : '' }}
                                                                </h5>
                                                                <h6 class="card-h1">
                                                                    {{ !empty($completed_package['product_category_name']) ? $completed_package['product_category_name'] : '' }}
                                                                </h6>
                                                                <div class="d-flex align-items-center gap-3 mb-3">
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
                                                                        <i>{{ !empty($completed_package['treatment_period_in_days']) ? $completed_package['treatment_period_in_days'] : '' }}</i>
                                                                    </p>
                                                                </div>
                                                                <h6 class="card-p1 fw-bold">Time left to treatment:
                                                                    <span class="text-green">Completed!</span>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-md-4 d-flex justify-content-start align-items-end ">
                                                            @if (!empty($completed_package['id']))
                                                                <div class="trmt-card-footer w-100">
                                                                    <a href="javascript:void(0)"
                                                                        class="order-completed-btn w-100 fsb-2 bg-orange text-white UserWriteReview"
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
                                                <div class="card shadow-none mb-4 pkgCard">
                                                    <div class="card-body d-flex gap-3 w-100 p-4">
                                                        <div class="df-center">
                                                            <img src="{{ asset($cancelled_package['company_logo_image_path']) }}"
                                                                alt=""
                                                                style="height: 109px;width:109px;border-radius: 3px;object-fit:cover">
                                                        </div>
                                                        <div class="df-column">
                                                            <h5 class="mb-0">
                                                                {{ !empty($cancelled_package['package_name']) ? $cancelled_package['package_name'] : '' }}
                                                            </h5>
                                                            <h6 class="card-h1">
                                                                {{ !empty($cancelled_package['product_category_name']) ? $cancelled_package['product_category_name'] : '' }}
                                                            </h6>
                                                            <div class="d-flex align-items-center gap-3 mb-3">
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
                                                                    <i>{{ !empty($cancelled_package['treatment_period_in_days']) ? $cancelled_package['treatment_period_in_days'] : '' }}</i>
                                                                </p>
                                                            </div>
                                                            <h6 class="card-p1 fw-bold">Time left to treatment:
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
                            <input type="hidden" name="id" id="patiant_id"
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
                    <button type="button" class="btn-close p-0" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5">
                    <div class="acommodition-content">
                        <div class="mb-4">
                            <h6 class="user-res-p10 mb-2 star-rating">Cleanliness</h6>
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
                            <h6 class="user-res-p10 mb-2 star-rating">Comfort</h6>
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
                            <h6 class="user-res-p10 mb-2 star-rating">Food Quality</h6>
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
                            <h6 class="user-res-p10 mb-2 star-rating">Behavior / Professionalism
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
                            <h6 class="user-res-p10 mb-1 ">Do you recommend this
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
                            <p class=""><span class="user-res-p10">Extra
                                    Notes</span><span class="user-res-p3 fst-italix"> *Optional</span></p>
                            <div class="form-floating" style="width: 312px">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2" class="user-res-p8 camptonBook">Please share you feedback
                                    & experience.</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="user-res-btn4 user-review-from-submit" data-bs-toggle="modal"
                                data-bs-target="#hotelcompletedmodel2" data-bs-dismiss="modal">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            // alert('hi');
            var baseUrl = $('#base_url').val();
            var token = "{{ Session::get('login_token') }}";
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $(".upPackageLi").addClass("activeClass");
            $(".upPackage").addClass("md-active");

            $(".UserChangeInformation").on('click', function(e) {

                let id = this.id;
                let rawId = this.id.split('-')[1];
                let packageId = rawId.split('?')[0];
                let purchaseId = rawId.split('?')[1];
                let formData = new FormData();
                formData.append("id", packageId);
                formData.append("purchase_id", purchaseId);
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
                        $('#patiant_id').val(PatientInformation.id);
                        $('#patient_full_name').val(PatientInformation.patient_full_name);
                        $('#patient_relation').val(PatientInformation.patient_relation);
                        $('#patient_email').val(PatientInformation.patient_email);
                        $('#patient_contact_no').val(PatientInformation.patient_contact_no);
                        $('#patient_country_id').val(PatientInformation.patient_country_id);
                        $('#patient_city_id').val(PatientInformation.patient_city_id);

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
                    patient_relation: {
                        required: true,
                    },
                    patient_email: {
                        required: true,
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
                    patient_relation: {
                        required: "Please enter patient relation",
                    },
                    patient_email: {
                        required: "Please enter patient email",
                    },
                    patient_contact_no: {
                        required: "Please enter patient contact no",
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
                $('#ReviewModal').modal('show');

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

            $('i').click(function() {
                var id = this.id;
                var category = id.split('_')[0];
                id = id.split('_')[1];
                // alert(category);
                for (var i = 5; i > 0; i--) {
                    $('#' + category + "_" + i).removeClass('selectable');
                }
                for (var i = id; i > 0; i--) {
                    var str = category + '_' + i;

                    // alert(str);
                    $('#' + category + "_" + i).addClass('selectable');

                }
                // stars.removeClass('selected');
                // $(this).addClass('selected');
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

            $('.star-rating').each(function() {
                var container = $(this);
                var stars = container.find('.fa-star');
                var errorMessage = container.find('.error-message');


                stars.on('click', function() {
                    alert('hi');
                    stars.removeClass('selected');
                    $(this).addClass('selected');
                });

                container.find('.user-review-from-submit').on('click', function() {
                    var selectedStar = container.find('.reviewsStar .selected');

                    if (!selectedStar.length) {
                        errorMessage.text('Please select at least one star for ' + container.data(
                            'category'));
                    } else {
                        errorMessage.text('');
                        // Include logic to submit the form or perform other actions
                    }
                });
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
        });
    </script>
@endsection
