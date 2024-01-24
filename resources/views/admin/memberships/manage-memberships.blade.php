@extends('admin.layout.layout') @section("content")

<style>
    .form-select,
    .form-control {
        border: 2px solid #d6d6d6;
        border-radius: 5px;
        padding: 10px 16px;
        height: 50px;
        font-size: 16px;
    }

    .inputIcon {
        position: absolute;
        right: 18px;
        top: 13px;
        font-weight: 600;
    }

    .submit-btn {
        width: 232px;
        height: 48px;
        flex-shrink: 0;
        color: #000;
        text-align: center;
        font-family: Campton;
        font-size: 15px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        letter-spacing: -0.6px;
    }
</style>
<section class="main-content">
    <div class="container2 pb-5">
        <div class="page-title">Memberships</div>
        <div class="row top-cards">
            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-header p-4 pb-0 page-title bg-white border-0">Manage Memberships</h5>
                    <div class="card-body p-4 pt-0">
                        <form action="#">
                            <!-- 1. SILVER MEMBER -->
                            <div class="mb-5">
                                <div class="mb-3">
                                    <img src="{{asset('admin/assets/img/silver-member.png')}}" alt="">
                                </div>
                                <div class="mb-3">
                                    <select name="" id="" class="form-select">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                                <!-- AMOUNT -->
                                <div class="mb-3 position-relative">
                                    <input type="text" class="form-control" placeholder="">
                                    <span class="inputIcon">₺</span>
                                </div>
                                <!-- PERCENTAGE -->
                                <div class="mb-3 position-relative">
                                    <input type="text" class="form-control" placeholder="">
                                    <span class="inputIcon">%</span>
                                </div>
                            </div>
                            <!-- SILVER MEMBER END-->

                            <!-- 2. GOLD MEMBER -->
                            <div class="mb-5">
                                <div class="mb-3">
                                    <img src="{{asset('admin/assets/img/gold-member.png')}}" alt="">
                                </div>
                                <div class="mb-3">
                                    <select name="" id="" class="form-select">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                                <div class="mb-3 position-relative">
                                    <input type="text" class="form-control" placeholder="">
                                    <span class="inputIcon">₺</span>
                                </div>
                                <div class="mb-3 position-relative">
                                    <input type="text" class="form-control" placeholder="">
                                    <span class="inputIcon">%</span>
                                </div>
                            </div>
                            <!-- GOLD MEMBER END -->

                            <!-- 3. PLATINUM MEMBER -->
                            <div class="" style="margin-bottom: 65px;">
                                <div class="mb-3">
                                    <img src="{{asset('admin/assets/img/platinum-member.png')}}" alt="">
                                </div>
                                <!-- SELECT -->
                                <div class="mb-3">
                                    <select name="" id="" class="form-select">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                                <!-- AMOUNT -->
                                <div class="mb-3 position-relative">
                                    <input type="text" class="form-control" placeholder="">
                                    <span class="inputIcon">₺</span>
                                </div>
                                <!-- PERCENTAGE -->
                                <div class="mb-3 position-relative">
                                    <input type="text" class="form-control" placeholder="">
                                    <span class="inputIcon">%</span>
                                </div>
                            </div>
                            <!-- PLATINUM MEMBER END -->

                            <div class="d-flex align-items-center justify-content-end gap-3 mb-3">
                                <button type="submit" class="btn submit-btn bg-green df-center">Save Changes</button>
                                <button type="submit" class="btn submit-btn bg-md-red camLight df-center text-white">Discard Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- MEMBERSHIP DETAILS -->
            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-header p-4 pb-0 page-title bg-white border-0">Membership Details</h5>
                    <div class="card-body">
                        <form action="#">
                            <div class="d-flex flex-column gap-3 border-bottom-1 pb-4 mb-4">
                                <div class="d-justify">
                                    <div>
                                        <img src="{{asset('admin/assets/img/silver-member.png')}}" alt="">
                                    </div>
                                    <div class="amount-view">786</div>
                                </div>
                                <div class="d-justify">
                                    <div>
                                        <img src="{{asset('admin/assets/img/gold-member.png')}}" alt="">
                                    </div>
                                    <div class="amount-view">444</div>
                                </div>
                                <div class="d-justify">
                                    <div>
                                        <img src="{{asset('admin/assets/img/platinum-member.png')}}" alt="">
                                    </div>
                                    <div class="amount-view">121</div>
                                </div>
                            </div>


                            <!-- LISTED COMPANIES -->
                            <div class="d-flex align-items-center gap-3 mb-5">
                                <div class="amount-view">Listed</div>
                                <select name="" id="" class="form-select-sm md-select-sm">
                                    <option value="silver members">silver members</option>
                                    <option value="gold members">gold members</option>
                                    <option value="platinum members">platinum members</option>
                                </select>
                            </div>

                            <!-- Company Names -->
                            <div class="d-flex flex-column gap-3  pb-4 mb-4 c-names">
                                <div class="d-justify pb-3">
                                    <div class="company-name">Company Name</div>
                                    <div class="amount-view">1.000,00 <span class="lira">₺</span></div>
                                </div>
                                <div class="d-justify pb-3">
                                    <div class="company-name">Company Name</div>
                                    <div class="amount-view">1.000,00 <span class="lira">₺</span></div>
                                </div>
                                <div class="d-justify pb-3">
                                    <div class="company-name">Company Name</div>
                                    <div class="amount-view">1.000,00 <span class="lira">₺</span></div>
                                </div>
                            </div>
                            <!-- Company Names End -->
                            <!-- LISTED COMPANIES END -->
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- MEMBERSHIP DETAILS END-->

    </div>

    </div>
</section>
@endsection
@section('script')

<script>
    $(".membershipsLi").addClass("activeClass");
    $(".memberships").addClass("md-active");
</script>
<script>
    $(document).ready(function() {
        $("th").each(function() {
            $(this).removeClass('sorting_asc');
        })


    })
</script>
@endsection