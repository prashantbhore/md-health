@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="content-wrapper pb-5">
        <div class="page-title">Manage Vendors</div>

        
        
        <div class="row top-cards productsPage">
            <div class="col-md-3 mb-3">
                <a href="{{URL('admin/pending-vendors')}}" class="text-decoration-none text-dark">
                <div class="card position-relative bg-yellow">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2">
                            <div class="card-text d-flex flex-column">
                                <p class="text-black">Pending Vendors</p>
                                <h4 class="mb-0">{{!empty($total_pending_count)?$total_pending_count:'0'}}</h4>
                            </div>
                            <span class="link-open">
                                    <img src="{{URL::asset('admin/assets/img/link-open.png')}}" alt="">
                                </span>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{URL('admin/approved-vendors')}}" class="text-decoration-none text-dark">
                    <div class="card bg-green position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div class="card-text d-flex flex-column">
                                    <p class="text-black">Approved Vendors</p>
                                    <h4>{{!empty($total_approved_count)?$total_approved_count:'0'}}</h4>
                                </div>
                                <span class="link-open">
                                    <img src="{{URL::asset('admin/assets/img/link-open.png')}}" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{URL('admin/rejected-vendors')}}" class="text-decoration-none text-dark">
                    <div class="card bg-red position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div class="card-text d-flex flex-column">
                                    <p class="text-black">Rejected Vendors</p>
                                    <h4>{{!empty($total_rejected_count)?$total_rejected_count:'0'}}</h4>
                                </div>
                                <span class="link-open">
                                    <img src="{{URL::asset('admin/assets/img/link-open.png')}}" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-12 my-3">
                
                <div class="card md-shadow-light">
                    <div class="card-body">
                        <div class="w-full d-flex align-items-center justify-content-end gap-2 mb-3 filters">
                            <div class="card-title me-auto">Approved Vendors</div>


                            {{-- <input type="text" class="form-control" placeholder="Search"> --}}

                            <select class="form-select form-select-sm">
                                <option selected>Select Status</option>
                                <option value="1">Active</option>
                                <option value="2">Deactive</option>
                            </select>

                          
                            <select id="vendor_type" class="form-select form-select-sm">
                                <option selected value="all">All</option>
                                <option value="medical_service_provider">Medical Service Provider</option>
                                <option value="food_vendor">Food Provider</option>
                                <option value="shop_vendor">Product Vendor</option>
                                <option value="home_service">Home Service</option>
                            </select>
                        </div>


                        {{-- <div class="table-responsive" style="overflow-x: hidden"> --}}
                            <table id="approved_vendor_list" class="table" class="table-responsive" style="overflow-x: hidden">
                                <thead>
                                    <tr> 
                                        <th>Sr. No.</th>
                                        <th>Reg Date</th>
                                        <th scope="col">Vendor ID</th>
                                        <th>Type</th>
                                        <th>Company</th>
                                        <th>Membership</th>
                                        <th>City</th>
                                        {{-- <th>Status</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    {{-- <tr>
                                        <td>1</td>
                                        <td>10 Dec 2024 11:35am</td>
                                        <th scope="row">#MD7384</th>
                                        <td>Medical Service Provider</td>
                                        <td>Company Name A.S.</td>
                                        <td>Gold</td>
                                        <td>Istanbul</td>
                                        <td>Active</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="{{URL::asset('admin/approved-vendor-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        {{-- </div> --}}

                    </div>
                </div>
            </div>
        </div>

       

    </div>
</section>
@endsection
@section('script')
<script src="{{url('admin\controller_js\admin_cn_manage_vendors.js')}}"></script>
<script>
    $(".manageVendorsLi").addClass("activeClass");
    $(".manageVendors").addClass("md-active");
</script>


<script>
    $(document).ready(function(){
           $('#approved_vendor_list').DataTable();
       });
</script>

<script>
    $(document).ready(function(){
        $("th").each(function(){
            $(this).removeClass('sorting_asc');
        })
  
    })
  </script>
  <script>
    $(document).ready(function () {
        var searchBox = $('#approved_vendor_list_filter input');
        searchBox.addClass('form-control form-control-sm');
        searchBox.attr('placeholder', 'Search');
        searchBox.parent().contents().filter(function () {
            return this.nodeType === 3;
        }).remove();
        searchBox.wrap('<div class="custom-search-box"></div>');
    });
</script>
    
@endsection