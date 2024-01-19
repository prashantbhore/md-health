@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="container2 pb-5">
        <div class="d-flex align-items-center justify-content-between">
            <div class="page-title">#MD8739</div>
            <a href="{{URL::asset('admin/sales')}}" class="page-title">
                <img src="{{URL::asset('admin/assets/img/ArrowLeftCircle.png')}}" alt="" class="back-btn"> Back Sales
            </a>
        </div>
        <div class="row top-cards">
            <div class="col-md-6">
                <div class="card pkg-card mb-3">
                    <div class="card-body d-flex gap-2">
                        <img src="{{URL::asset('admin/assets/img/packageImg.png')}}" alt="">
                        <div class="d-flex flex-column gap-1">
                            <h4>Hearth Valve Replacement Surgery</h4>
                            <p>Memorial Hospital Istanbul</p>
                        </div>
                        <div class="d-flex flex-column gap-1 ms-auto">
                            <p>Package Price</p>
                            <h3>34.498,39 ₺</h3>
                        </div>
                    </div>
                </div>
                <!-- Pkg Card End -->

                <div class="card card-details mb-3">
                    <div class="card-body">
                        <p class="card-title mb-3">Patient Details</p>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">First Name</label>
                                <p>Ali</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Last Name</label>
                                <p>Danish</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="contactNo">Contact Number</label>
                                <p>+44 4444 44 44</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email">E-mail</label>
                                <p>ali.danish@mdhealth.io</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="address">Address</label>
                                <p class="d-flex flex-column gap-3">
                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore. </span>
                                    <span>City / Country</span>
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="address">Invoice Address</label>
                                <p class="d-flex flex-column gap-3">
                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore. </span>
                                    <span>City / Country</span>
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h4>Payment History</h4>
                                <h6>First Payment - 20% - 4.985,90 ₺</h6>
                                <h3>Payment Date: 12/02/2023</h3>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h4>Payment Info</h4>
                                <h5>via Credit / Debit Card ( **** **** **** 9892 )</h5>
                                <h3>3D Secure - 20% Payment</h3>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-label df-center">Remaining: 27.837,85 ₺</div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Patient Details Card End -->
            </div>

            <div class="col-md-6">
                <div class="card card-details" style="min-height: 588px;">
                    <div class="card-body">
                        <p class="card-title mb-3">Package Details</p>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="planDate">Planned Surgery Date</label>
                                <p>12 Dec 2023</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="contact">Hospital Concact Phone</label>
                                <p>+90 212 222 22 22</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="period">Treatment Periods</label>
                                <p>5-7 Days</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="address">Hospital Address</label>
                                <p>Lorem Ipsum Dolor, Sit Amet No:50 Besiktas / Istanbul</p>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-md-6 mb-3">
                                <p class="card-title mb-3">Package Details</p>
                                <div class="col-md-12 mb-4">
                                    <label for="accomodation">Accommodation</label>
                                    <p>Renaissence Istanbul Hotel</p>
                                    <p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 17" fill="none">
                                            <path d="M10.5414 1.91696e-06C10.8952 -0.000845732 11.1749 0.279514 11.1757 0.653326L11.1766 1.29051C13.4721 1.47401 14.9885 3.06952 14.9909 5.51629L15 12.6782C15.0033 15.3459 13.3602 16.9872 10.7265 16.9915L4.29324 17C1.676 17.0034 0.0123527 15.3229 0.00906157 12.6476L5.52283e-06 5.56981C-0.00328003 3.1069 1.45961 1.51564 3.75515 1.3007L3.75433 0.663521C3.7535 0.289709 4.02502 0.00849958 4.38704 0.00849958C4.74906 0.00765001 5.02057 0.288009 5.0214 0.661822L5.02222 1.25652L9.90949 1.24973L9.90867 0.655026C9.90785 0.281213 10.1794 0.000853417 10.5414 1.91696e-06ZM10.8771 12.0631H10.8688C10.4904 12.0725 10.1868 12.3961 10.195 12.7869C10.1958 13.1777 10.5011 13.4997 10.8795 13.5082C11.2654 13.5074 11.5781 13.1837 11.5773 12.7844C11.5773 12.3851 11.2638 12.0631 10.8771 12.0631ZM4.09742 12.064C3.71895 12.0809 3.42275 12.4046 3.42357 12.7954C3.44085 13.1862 3.7535 13.4921 4.13198 13.4742C4.50305 13.4573 4.79842 13.1336 4.78115 12.7428C4.77292 12.3605 4.46767 12.0631 4.09742 12.064ZM7.48725 12.0597C7.10877 12.0775 6.8134 12.4004 6.8134 12.7912C6.83067 13.182 7.14333 13.487 7.5218 13.47C7.89205 13.4522 8.18825 13.1293 8.17097 12.7377C8.16274 12.3562 7.8575 12.0589 7.48725 12.0597ZM4.09331 9.00549C3.71483 9.02248 3.41946 9.34617 3.42028 9.73697C3.43673 10.1278 3.75021 10.4336 4.12869 10.4158C4.49894 10.3988 4.79431 10.0751 4.77703 9.6843C4.7688 9.30199 4.46438 9.00464 4.09331 9.00549ZM7.48396 8.97575C7.10548 8.99275 6.80928 9.31643 6.8101 9.70724C6.82656 10.098 7.14004 10.403 7.51851 10.386C7.88876 10.3682 8.18414 10.0454 8.16768 9.65456C8.15863 9.27226 7.8542 8.97491 7.48396 8.97575ZM10.8738 8.98C10.4953 8.9885 10.1991 9.30284 10.1999 9.69365V9.70299C10.2082 10.0938 10.5208 10.3903 10.9001 10.3818C11.2704 10.3725 11.5657 10.0488 11.5575 9.65796C11.5402 9.28415 11.2432 8.97915 10.8738 8.98ZM9.91114 2.55807L5.02386 2.56487L5.02469 3.25217C5.02469 3.61834 4.75399 3.9072 4.39197 3.9072C4.02995 3.90805 3.75762 3.62004 3.75762 3.25387L3.75679 2.5997C2.15239 2.76367 1.26461 3.72539 1.26708 5.56811L1.2679 5.83233L13.7247 5.81534V5.51799C13.6893 3.6914 12.7908 2.73308 11.1782 2.59036L11.179 3.24453C11.179 3.60984 10.9001 3.89955 10.5463 3.89955C10.1843 3.9004 9.91196 3.61154 9.91196 3.24623L9.91114 2.55807Z" fill="#212121" />
                                        </svg> 12 Dec 2023 - 19 Dec 2023
                                    </p>
                                    <p><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                            <path d="M11.875 4.375H6.875V8.75H1.875V3.125H0.625V12.5H1.875V10.625H13.125V12.5H14.375V6.875C14.375 6.21196 14.1116 5.57607 13.6428 5.10723C13.1739 4.63839 12.538 4.375 11.875 4.375ZM4.375 8.125C4.87228 8.125 5.34919 7.92746 5.70083 7.57583C6.05246 7.22419 6.25 6.74728 6.25 6.25C6.25 5.75272 6.05246 5.27581 5.70083 4.92417C5.34919 4.57254 4.87228 4.375 4.375 4.375C3.87772 4.375 3.40081 4.57254 3.04917 4.92417C2.69754 5.27581 2.5 5.75272 2.5 6.25C2.5 6.74728 2.69754 7.22419 3.04917 7.57583C3.40081 7.92746 3.87772 8.125 4.375 8.125Z" fill="#111111" />
                                        </svg> Standart Room - 1 Adult</p>
                                </div>
                                <div class="col-md-12">
                                    <label for="transport">Transportaion</label>
                                    <p>Mercedes Vito 2.2 CDI VIP</p>
                                    <p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 17" fill="none">
                                            <path d="M10.5414 1.91696e-06C10.8952 -0.000845732 11.1749 0.279514 11.1757 0.653326L11.1766 1.29051C13.4721 1.47401 14.9885 3.06952 14.9909 5.51629L15 12.6782C15.0033 15.3459 13.3602 16.9872 10.7265 16.9915L4.29324 17C1.676 17.0034 0.0123527 15.3229 0.00906157 12.6476L5.52283e-06 5.56981C-0.00328003 3.1069 1.45961 1.51564 3.75515 1.3007L3.75433 0.663521C3.7535 0.289709 4.02502 0.00849958 4.38704 0.00849958C4.74906 0.00765001 5.02057 0.288009 5.0214 0.661822L5.02222 1.25652L9.90949 1.24973L9.90867 0.655026C9.90785 0.281213 10.1794 0.000853417 10.5414 1.91696e-06ZM10.8771 12.0631H10.8688C10.4904 12.0725 10.1868 12.3961 10.195 12.7869C10.1958 13.1777 10.5011 13.4997 10.8795 13.5082C11.2654 13.5074 11.5781 13.1837 11.5773 12.7844C11.5773 12.3851 11.2638 12.0631 10.8771 12.0631ZM4.09742 12.064C3.71895 12.0809 3.42275 12.4046 3.42357 12.7954C3.44085 13.1862 3.7535 13.4921 4.13198 13.4742C4.50305 13.4573 4.79842 13.1336 4.78115 12.7428C4.77292 12.3605 4.46767 12.0631 4.09742 12.064ZM7.48725 12.0597C7.10877 12.0775 6.8134 12.4004 6.8134 12.7912C6.83067 13.182 7.14333 13.487 7.5218 13.47C7.89205 13.4522 8.18825 13.1293 8.17097 12.7377C8.16274 12.3562 7.8575 12.0589 7.48725 12.0597ZM4.09331 9.00549C3.71483 9.02248 3.41946 9.34617 3.42028 9.73697C3.43673 10.1278 3.75021 10.4336 4.12869 10.4158C4.49894 10.3988 4.79431 10.0751 4.77703 9.6843C4.7688 9.30199 4.46438 9.00464 4.09331 9.00549ZM7.48396 8.97575C7.10548 8.99275 6.80928 9.31643 6.8101 9.70724C6.82656 10.098 7.14004 10.403 7.51851 10.386C7.88876 10.3682 8.18414 10.0454 8.16768 9.65456C8.15863 9.27226 7.8542 8.97491 7.48396 8.97575ZM10.8738 8.98C10.4953 8.9885 10.1991 9.30284 10.1999 9.69365V9.70299C10.2082 10.0938 10.5208 10.3903 10.9001 10.3818C11.2704 10.3725 11.5657 10.0488 11.5575 9.65796C11.5402 9.28415 11.2432 8.97915 10.8738 8.98ZM9.91114 2.55807L5.02386 2.56487L5.02469 3.25217C5.02469 3.61834 4.75399 3.9072 4.39197 3.9072C4.02995 3.90805 3.75762 3.62004 3.75762 3.25387L3.75679 2.5997C2.15239 2.76367 1.26461 3.72539 1.26708 5.56811L1.2679 5.83233L13.7247 5.81534V5.51799C13.6893 3.6914 12.7908 2.73308 11.1782 2.59036L11.179 3.24453C11.179 3.60984 10.9001 3.89955 10.5463 3.89955C10.1843 3.9004 9.91196 3.61154 9.91196 3.24623L9.91114 2.55807Z" fill="#212121" />
                                        </svg> 12 Dec 2023 - 19 Dec 2023
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <p class="card-title mb-3">Package Details</p>
                                <div class="col-md-12 mb-3">
                                    <label for="caseNo">Case No</label>
                                    <p>#384</p>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="caseManager">Case Manager</label>
                                    <p>Mehmet Coskun</p>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="caseManagerNo">Case Manager Contact</label>
                                    <p>+90 555 555 55 55</p>
                                    <p>mehmet.coskun@memorial.com.tr</p>
                                </div>

                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="w-full d-flex align-items-center gap-3">
                                    <div class="w-50">
                                        <label for="status" class="d-block">Status</label>
                                        <select name="status" id="status" class="w-full">
                                            <option value="pending">Pending</option>
                                            <option value="completed">Completed</option>
                                            <option value="inProgress">In Progress</option>
                                        </select>
                                    </div>
                                    <div class="pending w-25">
                                        Pending
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
@section('script')
<script>
    $(".salesLi").addClass("activeClass");
    $(".sales").addClass("md-active");
</script>
@endsection