@extends('front.layout.layout2')
@section("content")
<style>
   .treatment-card img{
        width: 105px;
   }
   .treatment-card-btns .order-completed-btn {
        font-size: 14px;
   }
   .card-header a{
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
    padding: 5px 5px;
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
   .modal-body select{
        border: 2px solid #D6D6D6;
        border-radius: 5px;
        padding: 0.375rem 0.75rem;
    }
   .modal-body input{
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
    .user-details-body span {
        font-size: 20px;
        font-weight: 800;
    }
    .user-details-body ul li{
        padding: 5px 0;
        font-weight: 600;
    }
    .user-details-body ul li svg{
        margin-right: 5px;
    }
    .user-details-body .section-btns button{
        text-decoration: none;
        padding: 10px 20px;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: auto;
        width: 35%;
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
                    <h5 class="card-header mb-3">
                        Packages
                        <a href="{{url('user-package')}}" class="fw-800 d-flex align-items-center gap-1 text-decoration-none text-dark">
                            <img src="{{asset('front/assets/img/backPage.png')}}" alt="">
                            <p class="mb-0">Booked Packages</p>
                        </a>
                    </h5>
                    <div class="card-body">
                        <div class="package-view-div">
                            <div class="treatment-card df-start w-100 mb-3">
                                <div class="row card-row">
                                    <div class="col-md-2 df-center ps-4">
                                        <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="">
                                    </div>
                                    <div class="col-md-10 justify-content-start ps-0">
                                        <div class="trmt-card-body">
                                            <h5 class="dashboard-card-title fw-600 mb-0">Memorial Hospital</h5>
                                            <h6 class="mb-1 fsb-1">Heart Valve Replacement Surgery</h6>
                                            <div class="trmt-card-location d-flex align-items-center gap-3 mb-3">
                                                <p class="fsb-2 mb-0 d-flex align-items-center gap-1">
                                                    <svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.95833 6.72917C4.48868 6.72917 4.03826 6.5426 3.70617 6.2105C3.37407 5.87841 3.1875 5.42799 3.1875 4.95833C3.1875 4.48868 3.37407 4.03826 3.70617 3.70617C4.03826 3.37407 4.48868 3.1875 4.95833 3.1875C5.42799 3.1875 5.87841 3.37407 6.2105 3.70617C6.5426 4.03826 6.72917 4.48868 6.72917 4.95833C6.72917 5.19088 6.68336 5.42115 6.59437 5.636C6.50538 5.85085 6.37494 6.04606 6.2105 6.2105C6.04606 6.37494 5.85085 6.50538 5.636 6.59437C5.42115 6.68336 5.19088 6.72917 4.95833 6.72917ZM4.95833 0C3.6433 0 2.38213 0.522394 1.45226 1.45226C0.522394 2.38213 0 3.6433 0 4.95833C0 8.67708 4.95833 14.1667 4.95833 14.1667C4.95833 14.1667 9.91667 8.67708 9.91667 4.95833C9.91667 3.6433 9.39427 2.38213 8.46441 1.45226C7.53454 0.522394 6.27337 0 4.95833 0Z" fill="#111111"/>
                                                    </svg>
                                                    Besiktas / Istanbul
                                                </p>
                                                <p class="fsb-2 mb-0 d-flex align-items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                                                        <path d="M4.83372 1.41667V0H9.08372V1.41667H4.83372ZM5.54206 9.73958L4.76289 8.18125C4.70386 8.05139 4.61532 7.95388 4.49727 7.88871C4.37921 7.82354 4.25525 7.79119 4.12539 7.79167H0.619141C0.796224 6.19792 1.48685 4.85492 2.69102 3.76267C3.89518 2.67042 5.31775 2.12453 6.95872 2.125C7.69067 2.125 8.3931 2.24306 9.06602 2.47917C9.73893 2.71528 10.3705 3.05764 10.9608 3.50625L11.9525 2.51458L12.9441 3.50625L11.9525 4.49792C12.3303 4.99375 12.6313 5.51626 12.8556 6.06546C13.0799 6.61465 13.2275 7.19006 13.2983 7.79167H10.2348L9.01289 5.34792C8.88303 5.07639 8.67053 4.94062 8.37539 4.94062C8.08025 4.94062 7.86775 5.07639 7.73789 5.34792L5.54206 9.73958ZM6.95872 14.875C5.31775 14.875 3.89518 14.3289 2.69102 13.2366C1.48685 12.1444 0.796224 10.8016 0.619141 9.20833H3.68268L4.90456 11.6521C5.03442 11.9236 5.24692 12.0594 5.54206 12.0594C5.8372 12.0594 6.0497 11.9236 6.17956 11.6521L8.37539 7.26042L9.15456 8.81875C9.21358 8.94861 9.30213 9.04612 9.42018 9.11129C9.53824 9.17646 9.6622 9.20881 9.79206 9.20833H13.2983C13.1212 10.8021 12.4306 12.1448 11.2264 13.2366C10.0223 14.3284 8.5997 14.8745 6.95872 14.875Z" fill="#111111"/>
                                                    </svg>
                                                    <i>Treatment Period 3-5 days</i>
                                                </p>
                                            </div>
                                            <h6 class="mb-1 fsb-1">Time left to treatment: 12 days</h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="user-package-details">
                                    <div class="user-package-body">
                                        <div class="user-details-body">
                                            <div class="d-flex justify-content-between">
                                                <p>Package Other Details </p>
                                                <span>
                                                    <span class="fsb-1">Your Case No </span>
                                                    <span class="fsb-1 text-green">#MD829</span>
                                                </span>
                                            </div>
                                            <ul style="padding: 0;list-style: none;">
                                                <li class="fsb-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 10 10" fill="none"><g clip-path="url(#clip0_0_22025)"><path d="M8.54102 0.585938L3.95898 6.62695L1.25 3.91992L0 5.16992L4.16602 9.33594L10 1.83594L8.54102 0.585938Z" fill="#4CDB06"/></g><defs><clipPath id="clip0_0_22025"><rect width="10" height="10" fill="white"/></clipPath></defs></svg>
                                                    Acommodition
                                                    <a href="javascript:void(0);" class="fsb-1 ps-2">View Details</a>
                                                </li>
                                                <li class="fsb-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 10 10" fill="none"><g clip-path="url(#clip0_0_22025)"><path d="M8.54102 0.585938L3.95898 6.62695L1.25 3.91992L0 5.16992L4.16602 9.33594L10 1.83594L8.54102 0.585938Z" fill="#4CDB06"/></g><defs><clipPath id="clip0_0_22025"><rect width="10" height="10" fill="white"/></clipPath></defs></svg>
                                                    Transportation
                                                    <a href="javascript:void(0);" class="fsb-1 ps-2">View Details</a>
                                                </li>
                                                <li class="fsb-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 10 10" fill="none"><g clip-path="url(#clip0_0_22025)"><path d="M8.54102 0.585938L3.95898 6.62695L1.25 3.91992L0 5.16992L4.16602 9.33594L10 1.83594L8.54102 0.585938Z" fill="#4CDB06"/></g><defs><clipPath id="clip0_0_22025"><rect width="10" height="10" fill="white"/></clipPath></defs></svg>
                                                    Tour
                                                    <a href="javascript:void(0);" class="fsb-1 ps-2 text-secondary text-decoration-none">View Details</a>
                                                </li>
                                                <li class="fsb-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 13 13" fill="none">
                                                        <path d="M6.50065 1.08337C9.47982 1.08337 11.9173 3.52087 11.9173 6.50004C11.9173 9.47921 9.47982 11.9167 6.50065 11.9167C3.52148 11.9167 1.08398 9.47921 1.08398 6.50004C1.08398 3.52087 3.52148 1.08337 6.50065 1.08337ZM6.50065 2.16671C5.47148 2.16671 4.55065 2.49171 3.84648 3.08754L9.91315 9.15421C10.4548 8.39587 10.834 7.47504 10.834 6.50004C10.834 4.11671 8.88398 2.16671 6.50065 2.16671ZM9.15482 9.91254L3.08815 3.84587C2.49232 4.55004 2.16732 5.47087 2.16732 6.50004C2.16732 8.88337 4.11732 10.8334 6.50065 10.8334C7.52982 10.8334 8.45065 10.5084 9.15482 9.91254Z" fill="#111111"/>
                                                    </svg>
                                                    Visa Service
                                                    
                                                </li>
                                                <li class="fsb-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 13 13" fill="none">
                                                        <path d="M6.50065 1.08337C9.47982 1.08337 11.9173 3.52087 11.9173 6.50004C11.9173 9.47921 9.47982 11.9167 6.50065 11.9167C3.52148 11.9167 1.08398 9.47921 1.08398 6.50004C1.08398 3.52087 3.52148 1.08337 6.50065 1.08337ZM6.50065 2.16671C5.47148 2.16671 4.55065 2.49171 3.84648 3.08754L9.91315 9.15421C10.4548 8.39587 10.834 7.47504 10.834 6.50004C10.834 4.11671 8.88398 2.16671 6.50065 2.16671ZM9.15482 9.91254L3.08815 3.84587C2.49232 4.55004 2.16732 5.47087 2.16732 6.50004C2.16732 8.88337 4.11732 10.8334 6.50065 10.8334C7.52982 10.8334 8.45065 10.5084 9.15482 9.91254Z" fill="#111111"/>
                                                    </svg>
                                                    Translate
                                                   
                                                </li>
                                                <li class="fsb-2 text-red">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 13 13" fill="none">
                                                        <path d="M6.50065 1.08337C9.47982 1.08337 11.9173 3.52087 11.9173 6.50004C11.9173 9.47921 9.47982 11.9167 6.50065 11.9167C3.52148 11.9167 1.08398 9.47921 1.08398 6.50004C1.08398 3.52087 3.52148 1.08337 6.50065 1.08337ZM6.50065 2.16671C5.47148 2.16671 4.55065 2.49171 3.84648 3.08754L9.91315 9.15421C10.4548 8.39587 10.834 7.47504 10.834 6.50004C10.834 4.11671 8.88398 2.16671 6.50065 2.16671ZM9.15482 9.91254L3.08815 3.84587C2.49232 4.55004 2.16732 5.47087 2.16732 6.50004C2.16732 8.88337 4.11732 10.8334 6.50065 10.8334C7.52982 10.8334 8.45065 10.5084 9.15482 9.91254Z" fill="#111111"/>
                                                    </svg>
                                                    Ambulance
                                                   
                                                </li>
                                            </ul>

                                            <div class="section-btns pt-2 d-flex justify-content-start gap-3">
                                                <button class="green-plate bg-dark text-white fw-700 menu-detail-btn">My Details</button>
                                                <button class="green-plate text-dark border border-1 border-dark fw-700">My Documents</button>
                                            </div>

                                            <div class="view-menu-div mt-4">
                                                <div class="view-menu mb-4">
                                                    <h6 class="fsb-1">Your Case Manager</h6>
                                                    <p class="text-orange">Abdul G.</p>
                                                    <p>Boiled Vegetables</p>
                                                    <p>Salad</p>
                                                </div>
                                                <div class="view-menu mb-4">
                                                    <h6 class="green-colored-text">Day 1 - Menu</h6>
                                                    <p>Chicken Soup</p>
                                                    <p>Boiled Vegetables</p>
                                                    <p>Salad</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
<div class="modal fade" id="UserChangeInformation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-center border-0">
        <h5 class="modal-title fsb-1" id="">Change Patient Information</h5>
        <h6 class="modal-title fsb-2" id="">Fill the patient detail.</h6>
        <button type="button" class="btn-close fw-700" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body ">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label class="form-label fsb-2 fw-600">*Patient Full Name</label>
                    <input type="text" class="form-control" name="" id="" value="" aria-describedby="foodname" placeholder="First Name">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label class="form-label fsb-2 fw-600">*Relationship To You</label>
                    <input type="text" class="form-control" name="" id="" value="" aria-describedby="foodname" placeholder="Relationship To You">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label class="form-label fsb-2 fw-600">*Patient E-mail  <b>*optional</b></label>
                    <input type="text" class="form-control" name="" id="" value="" aria-describedby="foodname" placeholder="E-Mail">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label class="form-label fsb-2 fw-600">*Patient Contact Number</label>
                    <input type="text" class="form-control" name="" id="" value="" aria-describedby="foodname" placeholder="Contact Number">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group d-flex flex-column">
                    <label class="form-label fsb-2 fw-600">*Patient Country</label>
                    <select name="" id="">
                        <option value="">Country</option>
                        <option value="">Patient 1</option>
                        <option value="">Patient 2</option>
                        <option value="">Patient 3</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group d-flex flex-column">
                    <label class="form-label fsb-2 fw-600">*Patient City</label>
                    <select name="" id="">
                        <option value="">City</option>
                        <option value="">Patient 1</option>
                        <option value="">Patient 2</option>
                        <option value="">Patient 3</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12 my-5">
                <h6 class="fsb-2 fw-500">*You can also change the patient information from <span class="fw-900 fsb-1">panel</span> <span class="text-green fw-900">></span> <span class="fw-900 fsb-1">packages</span></h6>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                <a href="javascript:void(0);" class="order-completed-btn bg-green">Submit</a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Change Patient Information -->
<!-- Cancellation Request -->
<div class="modal fade" id="UserCancellationReq" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-center border-0">
        <h5 class="modal-title fsb-1" id="">Cancellation Request</h5>
        <h6 class="modal-title fsb-2" id="">Fill the form & get your desired treatment plan.</h6>
        <button type="button" class="btn-close fw-700" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body ">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="form-group d-flex flex-column">
                    <label class="form-label fsb-2 fw-600">Reason for Cancellation</label>
                    <select name="" id="">
                        <option value="">I don’t need this treatment</option>
                        <option value="">I don’t need this treatment 1</option>
                        <option value="">I don’t need this treatment 2</option>
                        <option value="">I don’t need this treatment 3</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="form-group d-flex flex-column">
                    <label class="form-label fsb-2 fw-600">Cancellation Detail</label>
                    <textarea name="" id="" rows="5" class="form-control border-2" placeholder="Please write your treatment cancellation request in detail"></textarea>
                </div>
            </div>
            <div class="col-md-12 my-5 d-flex align-items-center gap-2">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                <label class="form-check-label fsb-2 fw-600" for="flexCheckChecked">
                    I confirm that I wish cancel my treatment.
                </label>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                <a href="javascript:void(0);" class="order-completed-btn bg-red text-white">Cancel Treatment</a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Cancellation Request -->
@endsection
@section('script')
<script>
    $(".upPackageLi").addClass("activeClass");
    $(".upPackage").addClass("md-active");
</script>

<script>
        $(".view-menu-div").hide();
        $("button").click(function(){
            $(".view-menu-div").toggle(200);
        });
</script>
@endsection