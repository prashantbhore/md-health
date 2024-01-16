@extends('admin.layout.layout') @section("content")

<style>
    .deactivate-btn,
    .deactivate-btn:hover {
        color: #ff0000;
        background-color: inherit;
        text-decoration: none; 
    }

    .activate-btn,
    .activate-btn:hover {
        color: #00ff00;
        background-color: inherit;
        text-decoration: none;

        
    }

    .dataTables_filter,
    #dataTables_filter {
        display: block !important
    }
</style>


<section class="main-content">
    <div class="content-wrapper">
        <div class="page-title">Manage Customers</div>
        <div class="row top-cards">
            <div class="col-md-12 my-3">
                <div class="card" style="min-height: calc(100vh - 250px);">
                    <div class="card-body">

                        <div class="w-full d-flex align-items-center justify-content-end gap-2 mb-3 filters">
                            <div class="card-title me-auto">Customers</div>
                            {{-- <input type="text" class="form-control" placeholder="Search"> --}}
                            
                            <select id="status" class="form-select form-select-sm">
                                <option selected value="all">All</option>
                                <option value="active">Active</option>
                                <option value="inactive">Deactive</option>
                            </select>
                        </div>
                        {{-- <div class="table-responsive" style="overflow-x: hidden"> --}}
                            <table id="example"  class="table table-responsive" style="width:100%" style="overflow-x: hidden" >
                                <thead>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>ID</th>
                                        <th scope="col">Name</th>
                                        {{-- <th>Gender</th>
                                        <th>Age</th> --}}
                                        <th>City</th>
                                        <th>Country</th>
                                        <th>Contact Number</th>
                                        <th>Status</th>
                                        <th style="width: 50px;">Action</th>
                                    </tr>
                                </thead>

                                <tbody>

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


<script src="{{url('admin\controller_js\admin_cn_customer.js')}}"></script>
<script>
    $(".manageCustomersLi").addClass("activeClass");
    $(".manageCustomers").addClass("md-active");
</script>

{{-- <script>
    $(document).ready(function(){
           $('#example').DataTable();
       });
</script> --}}

<script>
    $(document).ready(function(){
        $("th").each(function(){
            $(this).removeClass('sorting_asc');
        })
  
    })
  </script>

<script>
    $(document).ready(function () {
        var searchBox = $('#example_filter input');
        searchBox.addClass('form-control form-control-sm');
        searchBox.attr('placeholder', 'Search');
        searchBox.parent().contents().filter(function () {
            return this.nodeType === 3;
        }).remove();
        searchBox.wrap('<div class="custom-search-box"></div>');
    });
</script>
@endsection