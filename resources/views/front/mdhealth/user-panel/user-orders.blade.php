@extends('front.layout.layout2')
@section("content")
<div class="content-wrapper">
    <div class="container py-100px for-cards">
    <div class="d-flex gap-3">
            <div class="w-292">
            @include('front.includes.sidebar-user')
            </div>
            <div class="w-761">
                <div class="card panel-right mb-4">
                    <h5 class="card-header mb-3">
                        <span>Orders</span>
                    </h5>
                    <div class="card-body">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button card-h2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <div class="d-flex align-items-center justify-content-between w-100">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                                    <path d="M18.375 5.25V18.375C18.375 18.7373 18.3066 19.0757 18.1699 19.3901C18.0332 19.7046 17.8452 19.9814 17.606 20.2207C17.3667 20.46 17.0864 20.6479 16.7651 20.7847C16.4438 20.9214 16.1055 20.9932 15.75 21H3.9375C3.5752 21 3.23682 20.9316 2.92236 20.7949C2.60791 20.6582 2.33105 20.4702 2.0918 20.231C1.85254 19.9917 1.66455 19.7148 1.52783 19.4004C1.39111 19.0859 1.31934 18.7441 1.3125 18.375V5.25H3.9375V3.9375C3.9375 3.39746 4.04004 2.88818 4.24512 2.40967C4.4502 1.93115 4.73389 1.51416 5.09619 1.15869C5.4585 0.803223 5.87549 0.522949 6.34717 0.317871C6.81885 0.112793 7.32812 0.00683594 7.875 0C8.58594 0 9.24561 0.177734 9.854 0.533203C10.4624 0.177734 11.1152 0 11.8125 0C12.3525 0 12.8618 0.102539 13.3403 0.307617C13.8188 0.512695 14.2358 0.796387 14.5913 1.15869C14.9468 1.521 15.2271 1.93799 15.4321 2.40967C15.6372 2.88135 15.7432 3.39062 15.75 3.9375V5.25H18.375ZM14.4375 3.9375C14.4375 3.58203 14.3691 3.24365 14.2324 2.92236C14.0957 2.60107 13.9077 2.32422 13.6685 2.0918C13.4292 1.85938 13.1489 1.67139 12.8276 1.52783C12.5063 1.38428 12.168 1.3125 11.8125 1.3125C11.5049 1.3125 11.2144 1.36377 10.9409 1.46631C11.1392 1.7124 11.2964 1.95508 11.4126 2.19434C11.5288 2.43359 11.6143 2.67285 11.6689 2.91211C11.7236 3.15137 11.7612 3.39404 11.7817 3.64014C11.8022 3.88623 11.8125 4.14941 11.8125 4.42969V5.25H14.4375V3.9375ZM5.25 5.25H10.5V3.9375C10.5 3.58203 10.4316 3.24365 10.2949 2.92236C10.1582 2.60107 9.97021 2.32422 9.73096 2.0918C9.4917 1.85938 9.21143 1.67139 8.89014 1.52783C8.56885 1.38428 8.23047 1.3125 7.875 1.3125C7.5127 1.3125 7.17432 1.38086 6.85986 1.51758C6.54541 1.6543 6.26855 1.84229 6.0293 2.08154C5.79004 2.3208 5.60205 2.60107 5.46533 2.92236C5.32861 3.24365 5.25684 3.58203 5.25 3.9375V5.25ZM13.4736 19.6875C13.2412 19.2773 13.125 18.8398 13.125 18.375V6.5625H2.625V18.375C2.625 18.5596 2.65918 18.7305 2.72754 18.8877C2.7959 19.0449 2.88818 19.1816 3.00439 19.2979C3.12061 19.4141 3.26074 19.5098 3.4248 19.585C3.58887 19.6602 3.75977 19.6943 3.9375 19.6875H13.4736ZM17.0625 6.5625H14.4375V18.375C14.4375 18.5596 14.4717 18.7305 14.54 18.8877C14.6084 19.0449 14.7007 19.1816 14.8169 19.2979C14.9331 19.4141 15.0732 19.5098 15.2373 19.585C15.4014 19.6602 15.5723 19.6943 15.75 19.6875C15.9346 19.6875 16.1055 19.6533 16.2627 19.585C16.4199 19.5166 16.5566 19.4243 16.6729 19.3081C16.7891 19.1919 16.8848 19.0518 16.96 18.8877C17.0352 18.7236 17.0693 18.5527 17.0625 18.375V6.5625Z" fill="#111111" />
                                                </svg> <span class="fw-800 ms-2">MD</span>Shop
                                            </div>
                                            <div>
                                                <p class="mb-0 me-3 card-h2"><span class="fw-700">(2)</span> Orders</p>
                                            </div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row bg-light p-3 mb-3">
                                            <div class="col-md-1">
                                                <img src="{{asset('front/assets/img/productsPic.png')}}" alt="" />
                                            </div>

                                            <div class="col-md-6">
                                                <div class="card-h1 mb-2">Order No: #MD3726378 <span class="ms-3 pending">Pending</span></div>
                                                <p class="mb-0 card-p1">Evony Medical Mask - 50 Pcs.</p>
                                            </div>

                                            <div class="col-md-5 text-end">
                                                <div class="card-p1 mb-2"><span class="fw-700">Total Price:</span> 1.517,71 ₺</div>
                                                <a href="#" class="card-p1"><b>View Details</b></a>
                                            </div>
                                        </div>
                                        <div class="row bg-light p-3">
                                            <div class="col-md-1">
                                                <img src="{{asset('front/assets/img/productsPic.png')}}" alt="" />
                                            </div>

                                            <div class="col-md-6">
                                                <div class="card-h1 mb-2">Order No: #MD3726378 <span class="ms-3 pending">Pending</span></div>
                                                <p class="mb-0 card-p1">Evony Medical Mask - 50 Pcs.</p>
                                            </div>

                                            <div class="col-md-5 text-end">
                                                <div class="card-p1 mb-2"><span class="fw-700">Total Price:</span> 1.517,71 ₺</div>
                                                <a href="#" class="card-p1"><b>View Details</b></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed card-h2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <div class="d-flex align-items-center justify-content-between w-100">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M18 3C18.2449 3.00003 18.4813 3.08996 18.6644 3.25272C18.8474 3.41547 18.9643 3.63975 18.993 3.883L19 4V20C18.9997 20.2549 18.9021 20.5 18.7272 20.6854C18.5522 20.8707 18.313 20.9822 18.0586 20.9972C17.8042 21.0121 17.5536 20.9293 17.3582 20.7657C17.1627 20.6021 17.0371 20.3701 17.007 20.117L17 20V15H16C15.7551 15 15.5187 14.91 15.3356 14.7473C15.1526 14.5845 15.0357 14.3603 15.007 14.117L15 14V8C15 5.79 16.5 3 18 3ZM12 3C12.2449 3.00003 12.4813 3.08996 12.6644 3.25272C12.8474 3.41547 12.9643 3.63975 12.993 3.883L13 4V9C12.9999 9.88687 12.7052 10.7486 12.1622 11.4498C11.6192 12.151 10.8586 12.6519 10 12.874V20C9.99972 20.2549 9.90212 20.5 9.72715 20.6854C9.55218 20.8707 9.31305 20.9822 9.0586 20.9972C8.80416 21.0121 8.55362 20.9293 8.35817 20.7657C8.16271 20.6021 8.0371 20.3701 8.007 20.117L8 20V12.874C7.17545 12.6608 6.44041 12.1902 5.90176 11.5305C5.36312 10.8708 5.04897 10.0565 5.005 9.206L5 9V4C5.00028 3.74512 5.09788 3.49997 5.27285 3.31463C5.44782 3.1293 5.68695 3.01777 5.94139 3.00283C6.19584 2.98789 6.44638 3.07067 6.64183 3.23426C6.83729 3.39786 6.9629 3.6299 6.993 3.883L7 4V9C7.00001 9.35106 7.09243 9.69594 7.26796 9.99997C7.4435 10.304 7.69597 10.5565 8 10.732V4C8.00028 3.74512 8.09788 3.49997 8.27285 3.31463C8.44782 3.1293 8.68695 3.01777 8.94139 3.00283C9.19584 2.98789 9.44638 3.07067 9.64183 3.23426C9.83729 3.39786 9.9629 3.6299 9.993 3.883L10 4L10.001 10.732C10.2801 10.5707 10.516 10.3443 10.6887 10.0722C10.8614 9.80004 10.9658 9.49018 10.993 9.169L11 9V4C11 3.73478 11.1054 3.48043 11.2929 3.29289C11.4804 3.10536 11.7348 3 12 3Z" fill="#111111" />
                                                </svg> <span class="fw-800 ms-2">MD</span>Foods
                                            </div>
                                            <div>
                                                <p class="mb-0 me-3 card-h2"><span class="fw-700">(1)</span> Orders</p>
                                            </div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row bg-light p-3 mb-3">
                                            <div class="col-md-1">
                                                <img src="{{asset('front/assets/img/productsPic.png')}}" alt="" />
                                            </div>

                                            <div class="col-md-6">
                                                <div class="card-h1 mb-1">Order No: #MD3726378 <span class="ms-3 pending">Pending</span></div>
                                                <p class="mb-0 card-p1">Diet Food Package - 7 Days</p>
                                                <div class="d-flex gap-2 align-items-center w-100">
                                                    <div class="card-h3">Subscription:</div>
                                                    <div class="progress w-25" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar" style="width: 45%">3 Days</div>
                                                    </div>
                                                    <div class="card-p1">Remaining Time: 4 Days</div>
                                                </div>
                                            </div>

                                            <div class="col-md-5 text-end">
                                                <div class="card-p1 mb-2"><span class="fw-700">Total Price:</span> 1.517,71 ₺</div>
                                                <a href="#" class="card-p1"><b>View Details</b></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed card-h2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <div class="d-flex align-items-center justify-content-between w-100">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                                    <g clip-path="url(#clip0_0_13997)">
                                                        <path d="M13.7726 7.07202C13.7726 8.63849 12.5011 9.90796 10.9332 9.90796C9.36712 9.90796 8.09766 8.63815 8.09766 7.07202C8.09766 5.5059 9.36712 4.23608 10.9332 4.23608C12.5011 4.23608 13.7726 5.5059 13.7726 7.07202Z" fill="#111111" />
                                                        <path d="M10.9388 0.180176C9.62633 0.180176 7.79311 0.703363 6.4652 2.03127L8.04233 4.90468C8.38696 4.4661 8.8268 4.11163 9.32859 3.86806C9.83038 3.62449 10.381 3.4982 10.9388 3.49874C12.1278 3.49874 13.1859 4.06043 13.86 4.93389L15.4068 1.96527C14.2577 0.709551 12.1969 0.180176 10.9388 0.180176ZM12.1075 2.29011H11.3733V3.02368H10.4912V2.29011H9.75695V1.40839H10.4912V0.671738H11.3733V1.40839H12.1075V2.29011ZM7.2077 15.0051H7.93405L6.89661 18.5608H15.0026L13.97 15.0051H14.697L15.7361 18.5608H18.1214L16.4934 13.1736C16.239 12.2843 15.1239 10.7185 13.1996 10.6711L8.77555 10.6673C6.80758 10.6769 5.66908 12.2733 5.41161 13.1732L3.75198 18.5605H6.17095L7.2077 15.0051ZM0.326172 19.6945H21.5459V21.7134H0.326172V19.6945Z" fill="#111111" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_0_13997">
                                                            <rect width="22" height="22" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <span class="ms-2">HomeServices</span>
                                            </div>
                                            <div>
                                                <p class="mb-0 me-3 card-h2"><span class="fw-700">(1)</span> Orders</p>
                                            </div>
                                        </div>

                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                    <div class="row bg-light p-3 mb-3">
                                            <div class="col-md-1">
                                                <img src="{{asset('front/assets/img/productsPic.png')}}" alt="" />
                                            </div>

                                            <div class="col-md-6">
                                                <div class="card-h1 mb-1">Order No: #MD3726378 <span class="ms-3 pending">Pending</span></div>
                                                <p class="mb-0 card-p1">Diet Food Package - 7 Days</p>
                                                <div class="d-flex gap-2 align-items-center w-100">
                                                    <div class="card-h3">Subscription:</div>
                                                    <div class="progress w-25" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar" style="width: 45%">3 Days</div>
                                                    </div>
                                                    <div class="card-p1">Remaining Time: 4 Days</div>
                                                </div>
                                            </div>

                                            <div class="col-md-5 text-end">
                                                <div class="card-p1 mb-2"><span class="fw-700">Total Price:</span> 1.517,71 ₺</div>
                                                <a href="#" class="card-p1"><b>View Details</b></a>
                                            </div>
                                        </div>                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('script')
<script>
    $(".upOrdersLi").addClass("activeClass");
    $(".upOrders").addClass("md-active");
</script>
@endsection