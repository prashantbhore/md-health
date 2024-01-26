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
                        <form action="{{route('store.membership')}}" method="post">
                            @csrf
                            <!-- 1. SILVER MEMBER -->
                            <div class="mb-5">
                                
                                <div class="mb-3">
                                    <select name="vendor_type" id="vendor_type" class="form-select">
                                        <option value="medical_service_provider">Medical Service Provider</option>
                                        <option value="shop_vendor">Shop Vendor</option>
                                        <option value="food_vendor">Food Vendor</option>
                                        <option value="home_service">Home Service</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <img src="{{asset('admin/assets/img/silver-member.png')}}" alt="">
                                </div>
                              
                                <div class="mb-3">
                                    <input type="text" name="membership_name" value="SilverMember"  class="form-control" placeholder="SilverMember" disabled="disabled" >
                                </div>

                                <input type="hidden" name="membership_name[]" value="silver">

                               
                                <div class="mb-3 position-relative">
                                    <input type="text" name="silver_amount" id="silver_amount" value="0" class="form-control" placeholder="Silver Amount">
                                    <span class="inputIcon">₺</span>
                                </div>

                                
                                <div class="mb-3 position-relative">
                                    <input type="text" name="silver_percentage" id="silver_percentage" value="0" class="form-control" placeholder="">
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
                                    <input type="text" name="membership_name" value="GoldMember" class="form-control" placeholder="" disabled="disabled">
                                </div>

                                <input type="hidden" name="membership_name[]" value="gold">


                                <div class="mb-3 position-relative">
                                    <input type="text" name="gold_amount" id="gold_amount" value="0" class="form-control" placeholder="">
                                    <span class="inputIcon">₺</span>
                                </div>
                                <div class="mb-3 position-relative">
                                    <input type="text" name="gold_percentage" id="gold_percentage" value="0" class="form-control" placeholder="">
                                    <span class="inputIcon">%</span>
                                </div>
                            </div>
                            <!-- GOLD MEMBER END -->

                            <!-- 3. PLATINUM MEMBER -->
                            <div class="" style="margin-bottom: 65px;">
                                <div class="mb-3">
                                    <img src="{{asset('admin/assets/img/platinum-member.png')}}" alt="">
                                </div>
                       

                                <div class="mb-3">
                                    <input type="text" name="membership_name" value="PlatinumMember" class="form-control" placeholder="" disabled="disabled">
                                </div>

                                <input type="hidden" name="membership_name[]" value="platinum">
                                <!-- AMOUNT -->
                                <div class="mb-3 position-relative">
                                    <input type="text" name="platinum_amount" id="platinum_amount" value="0" class="form-control" placeholder="">
                                    <span class="inputIcon">₺</span>
                                </div>
                                <!-- PERCENTAGE -->
                                <div class="mb-3 position-relative">
                                    <input type="text" name="platinum_percentage" id="platinum_percentage" value="0" class="form-control" placeholder="">
                                    <span class="inputIcon">%</span>
                                </div>
                            </div>
                            <!-- PLATINUM MEMBER END -->

                            <div class="d-flex align-items-center justify-content-end gap-3 mb-3">
                                <button type="submit" name="save" value="save"  class="btn submit-btn bg-green df-center">Save Changes</button>
                                <button type="submit" name="discard" value="discard" class="btn submit-btn bg-md-red camLight df-center text-white">Discard Changes</button>
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
{{-- <script>

    function performAjaxCall(selectedValue){
        $.ajax({
            type: "post",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { vendor_type: selectedValue },
            url: base_url + "/admin/memberships/list-memberships",
            beforeSend: function () {
                actionDiv
                    .html(
                        "<i class='fa fa-spin fa-spinner' style='color: #000000 !important;'></i>"
                    )
                    .show();
            },
            success: function (data) {
                var oTable = $("#example").dataTable();
                oTable.fnDraw(false);
                success_toast("Success", data.message);
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });



    }

   
    performAjaxCall($('#vendor_type').val());

    $('#vendor_type').change(function(){

        var selectedValue = $(this).val();
        performAjaxCall(selectedValue);
    });
</script> --}}

<script>
    $(document).ready(function() {

     function performAjaxCall(selectedValue) {
    $.ajax({
        type: "post",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: { vendor_type: selectedValue },
        url: base_url + "/admin/memberships/list-memberships",
        beforeSend: function () {
            // You can add any code to run before the AJAX request is sent
        },
        success: function (data) {
            // Check if data.membershipLits is not found or is empty
            if (!data.membershipLits || data.membershipLits.length === 0) {
                // Set all values to zero
                $("#silver_amount").val(0);
                $("#silver_percentage").val(0);

                $("#gold_amount").val(0);
                $("#gold_percentage").val(0);

                $("#platinum_amount").val(0);
                $("#platinum_percentage").val(0);
            } else {
                // Loop through the array of membership types
                data.membershipLits.forEach(function (membership) {
                    // Get membership type and set values accordingly
                    var membershipType = membership.membership_type.toLowerCase(); // Convert to lowercase for consistency

                    $("#" + membershipType + "_amount").val(membership.membership_amount || 0);
                    $("#" + membershipType + "_percentage").val(membership.commission_percent || 0);
                });
            }

            console.log("Success", data.message);
        },
        error: function (data) {
            console.log("Error:", data);

            // In case of an error, set all values to zero
            $("#silver_amount").val(0);
            $("#silver_percentage").val(0);

            $("#gold_amount").val(0);
            $("#gold_percentage").val(0);

            $("#platinum_amount").val(0);
            $("#platinum_percentage").val(0);
        },
    });
}



      
        performAjaxCall($('#vendor_type').val());

 
        $('#vendor_type').change(function () {
            var selectedValue = $(this).val();
            performAjaxCall(selectedValue);
        });
    });
</script>
@endsection