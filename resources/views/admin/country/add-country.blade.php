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



<section class="main-content cityPage">
    <div class="content-wrapper">
        <div class="page-title">Manage Country</div>
        <div class="row top-cards ">
            <div class="col-md-12 my-3">
                <div class="card addCity">
                    <div class="card-body">
                        <div class="card-title"> Country Name</div>

                        <form id="yourFormId" action="{{route('add-country')}}" method="post">
                            @csrf

                            <input type="hidden" name="id" value="{{!empty($country->id)?$country->id:''}}">

                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <input type="text" name="country_code" class="form-control" placeholder="Country Code" value="{{!empty($country->country_code)?$country->country_code:'+'}}">
                                </div>
                                

                                <div class="col-md-6 mb-3">
                                    <input type="text" name="country" class="form-control" placeholder="Country Name" value="{{!empty($country->country_name)?$country->country_name:''}}">
                                </div>
                              

                                <div class="col-md-3 mb-3">
                                    <button type="submit" class="btn deactivate-btn w-100" style="background: #000;
                                    color: #fff;">{{!empty($country->id)?'Update':'Add '}}Country</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>

            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive" style="overflow-x: hidden">
                            <!-- Filters -->
                            <div class="w-full d-flex align-items-center justify-content-end gap-2 mb-3 filters">
                                <div class="card-title me-auto">Country List</div>
                                
                        

                                <select id="status" class="form-select form-select-sm">
                                    <option selected >All</option>
                                    <option value="active">Active </option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <table id="example" class="table">
                                <thead>
                                    <tr>
                                    <th scope="col" class="w-2">Sr. No.</th>
                                        <th scope="col" class="w-15">Country ID</th>
                                        <th scope="col" class="w-25">Country Name</th>
                                        <th  scope="col" class="w-10">Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                               
                                  

                                </tbody>
                            </table>

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
 $(document).ready(function(){
        $('#example').DataTable();
    });
</script>

<script src="{{url('admin\controller_js\admin_cn_country.js')}}"></script>

<script>
    $(".contryLi").addClass("activeClass");
    $(".contry").addClass("md-active");
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