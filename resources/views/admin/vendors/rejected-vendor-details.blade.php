@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="container2 pb-5">
        <div class="d-flex align-items-center justify-content-between">
            <div class="page-title">Vendors ID #273929  <small> Reg Date : 26 Jan 2023 11:45am </small></div>
            <a href="{{URL::asset('admin/pending-vendors')}}" class="page-title"> <img src="{{URL::asset('admin/assets/img/ArrowLeftCircle.png')}}" alt="" class="back-btn" /> Back Vendors </a>
        </div>
        <div class="row top-cards">
            <div class="col-md-6">
                <!-- Vendor Details -->
                <div class="card card-details mb-3" style="min-height: 380px;">
                    <div class="card-body">
                        <p class="card-title mb-3">Medical Service Provider</p>

                        <div class="card-deactive df-end"> Deactive </div>


                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="firstName">Company Name</label>
                                <p>Mplussoft Technologies</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="firstName">TAX Number</label>
                                <p>123456789932422</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email">Company Email</label>
                                <p>ali.danish@mdhealth.io</p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="lastName"> Authorized Person Full Name</label>
                                <p>Manish Kumar </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="contactNo">Authorized Person Mobile Contact</label>
                                <p>+44 4444 44 44</p>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="address">Company Address</label>
                                <p class="d-flex flex-column gap-3">
                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore. </span>
                                    <span>City / Country</span>
                                </p>
                            </div>

                            <div class="clear-fix"></div>
                           
                            <div class="col-md-6 mb-3">
                                <div class="row">
                                    <div class="col-md-6 d-flex flex-column">
                                        <label for="logo" class="mb-2">Company Logo</label>
                                        <div>
                                            <img src="{{URL::asset('admin/assets/img/previewImage.png')}}" alt="" />
                                        </div>
                                        <a href="#"><span class="deleteImg">Delete Logo</span></a>
                                    </div>
                                    <div class="col-md-6 d-flex flex-column">
                                        <label for="license" class="mb-2">Company License</label>
                                        <div>
                                            <img src="{{URL::asset('admin/assets/img/previewImage.png')}}" alt=""/>
                                        </div>
                                        <a href="#"><span class="deleteImg">Delete License</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="mb-3">
                                    <label for="membershipType">Membership Type</label>
                                    <div><img src="https://projects.m-staging.in/md-health-testing/front/assets/img/GoldMember.svg" alt=""></div>
                                </div>

                                <!--Verified  -->
                                <label for="verified">Verified</label>
                                <div class="form-check mt-2 d-flex align-items-center gap-2">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                    <img src="{{URL::asset('admin/assets/img/verifiedBy.png')}}" alt="" />
                                </div>
                            </div>


                            <div class="col-md-12 mb-3 mt-5">
                                <p class="card-title mb-3">Company Details</p>

                                <label for="">Photos & Videos</label>
                                <div class="d-flex flex-wrap gap-3 mt-3">
                                    <div class="d-flex flex-column">
                                        <a href="{{URL::asset('admin/assets/img/servicesGallery/512/1.mp4')}}" class="glightbox">
                                            <img src="{{URL::asset('admin/assets/img/servicesGallery/img5.png')}}" alt="" class="uploadedImg" />
                                        </a>
                                        <a href="#"><span class="deleteImg">Delete Photo</span></a>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="{{URL::asset('admin/assets/img/servicesGallery/512/2.png')}}" class="glightbox">
                                            <img src="{{URL::asset('admin/assets/img/servicesGallery/img3.png')}}" alt="" class="uploadedImg" />
                                        </a>
                                        <a href="#"><span class="deleteImg">Delete Photo</span></a>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="{{URL::asset('admin/assets/img/servicesGallery/512/3.png')}}" class="glightbox">
                                            <img src="{{URL::asset('admin/assets/img/servicesGallery/img2.png')}}" alt="" class="uploadedImg" />
                                        </a>
                                        <a href="#"><span class="deleteImg">Delete Photo</span></a>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="{{URL::asset('admin/assets/img/servicesGallery/512/4.png')}}" class="glightbox">
                                            <img src="{{URL::asset('admin/assets/img/servicesGallery/img4.png')}}" alt="" class="uploadedImg" />
                                        </a>
                                        <a href="#"><span class="deleteImg">Delete Photo</span></a>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="{{URL::asset('admin/assets/img/servicesGallery/512/5.png')}}" class="glightbox">
                                            <img src="{{URL::asset('admin/assets/img/servicesGallery/img6.png')}}" alt="" class="uploadedImg" />
                                        </a>
                                        <a href="#"><span class="deleteImg">Delete Photo</span></a>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="{{URL::asset('admin/assets/img/servicesGallery/512/4.png')}}" class="glightbox">
                                            <img src="{{URL::asset('admin/assets/img/servicesGallery/img4.png')}}" alt="" class="uploadedImg" />
                                        </a>
                                        <a href="#"><span class="deleteImg">Delete Photo</span></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 my-3">
                                <label for="overview" class="mb-2">Company Overview</label>
                                <textarea name="" id="" cols="30" rows="10" class="form-control overviewText">************ Hospital is a family owned business and Trudi Scrivener, the founder is Buckinghamshire based, Trudi has over 30 years of care experience and provides a key leadership role to her team. Ashridge Home Care provide a multi award winning specialist live in care or hourly care service, depending on the needs of the client. Most people want to stay in their own home, and having a carer either living in or visiting from time to time means choosing to enjoy life on your own terms and being able to maintain your independence. Staff pride themselves on delivering quality person-centred care with compassion, choice, dignity and respect.
                                </textarea>
                            </div>

                            

                            <div class="col-md-12 mb-3">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="firstName">Current Status</label>
                                        <p>Rejected</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName">Date</label>
                                        <p>23 Dec 2023 11:24am</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Rejected By</label>
                                        <p>Vishal Mehta</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 ">
                                <div class="d-flex flex-wrap justify-content-between">
                                    <button type="submit" class="btn md-btn-48 save-btn">Approve Vendor</button>
                                    <button type="submit" class="btn md-btn-48 delete-btn">Delete Vendor</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- END -->
            </div>

            <div class="col-md-6">
                <div class="card card-details mb-3 vendorSales">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="totalSales">Total Sales</label>
                                    <h4>0 ₺</h4>
                                </div>
                                <div class="mb-3">
                                    <label for="monthlySales">Monthly</label>
                                    <h4>0 ₺</h4>
                                </div>
                            </div>
                            <div class="col-md-6 text-center position-relative">
                            <p class="inner-text mb-0">by Total Income <span class="md-fw-bold">0%</span></p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 150 150" fill="none" >
                                    <path d="M106.337 137.314C107.639 139.905 106.601 143.079 103.926 144.197C92.8302 148.836 80.7554 150.748 68.7201 149.737C54.937 148.578 41.7426 143.631 30.5957 135.442C19.4488 127.253 10.7837 116.141 5.55817 103.334C0.332696 90.5277 -1.24951 76.5255 0.986476 62.8757C3.22247 49.226 9.18955 36.4604 18.228 25.9904C27.2665 15.5204 39.0242 7.75373 52.2014 3.54916C65.3785 -0.655417 79.4617 -1.13415 92.8939 2.16589C104.623 5.04747 115.457 10.7122 124.493 18.6485C126.671 20.5619 126.642 23.9015 124.581 25.9409C122.52 27.9803 119.209 27.9442 117.009 26.0558C109.351 19.483 100.237 14.7821 90.3888 12.3627C78.8371 9.52463 66.7255 9.93634 55.3932 13.5523C44.0609 17.1682 33.9492 23.8475 26.1761 32.8517C18.403 41.856 13.2713 52.8343 11.3484 64.5731C9.42542 76.3119 10.7861 88.3538 15.28 99.3675C19.7739 110.381 27.226 119.938 36.8123 126.98C46.3987 134.023 57.7458 138.277 69.5993 139.273C79.7044 140.123 89.8419 138.575 99.1967 134.789C101.884 133.702 105.034 134.724 106.337 137.314Z" fill="#C4C4C4" />
                                    <path d="M51.8463 9.20509C50.8839 6.47 52.3172 3.45351 55.1129 2.68466C66.7089 -0.50435 78.9288 -0.864589 90.7377 1.66975C104.261 4.57213 116.719 11.1578 126.734 20.6986C136.748 30.2394 143.929 42.3638 147.482 55.7312C151.036 69.0986 150.824 83.1883 146.869 96.4427C142.915 109.697 135.372 121.6 125.075 130.835C114.778 140.07 102.127 146.277 88.5224 148.771C74.9174 151.265 60.8878 149.948 47.9846 144.965C36.7176 140.615 26.6927 133.618 18.7398 124.596C16.8225 122.421 17.2763 119.113 19.5801 117.352C21.8839 115.591 25.1634 116.048 27.1055 118.201C33.8649 125.695 42.3067 131.518 51.7667 135.17C62.8635 139.455 74.929 140.588 86.6293 138.443C98.3296 136.298 109.209 130.96 118.064 123.018C126.92 115.076 133.407 104.839 136.808 93.4407C140.209 82.042 140.391 69.9248 137.335 58.4288C134.279 46.9328 128.103 36.5059 119.491 28.3008C110.878 20.0957 100.165 14.432 88.5344 11.936C78.6195 9.8081 68.3675 10.053 58.607 12.6179C55.8027 13.3549 52.8088 11.9402 51.8463 9.20509Z" fill="#4CDB06" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-details" style="min-height: 776px;">
                    <div class="card-body">
                        <div class="mb-3 d-flex align-items-center justify-content-between w-full filters">
                            <p class="card-title">Treatment Packages</p>
                            <select class="form-select form-select-sm w-25">
                                <option selected>Select Status</option>
                                <option value="1">Active</option>
                                <option value="2">Deactive</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection @section('script')
<script>
    $(".manageVendorsLi").addClass("activeClass");
    $(".manageVendors").addClass("md-active");
</script>
@endsection