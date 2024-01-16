@extends('admin.layout.layout') @section("content")
<style>
.col-sm-12.col-md-7 {
    margin-left: auto;
    margin-right: auto;
}


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
        <div class="page-title">Manage Cities</div>
        <div class="row top-cards ">
            <div class="col-md-12 my-3">
                <div class="card addCity">
                    <div class="card-body">
                        <div class="card-title">Add New Cities</div>

                        <form id="yourFormId" action="{{route('add-city')}}" method="post">
                            @csrf

                            <input type="hidden" name="id" value="{{!empty($city->id)?$city->id:''}}">

                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <select class="form-control w-100" id="countrySelect" name="country" >
                                        <option value="" selected disabled>Select Country</option>
                                        @if(!empty($countries))
                                        @foreach ($countries as $country_data)
                                        <option value="{{$country_data->id}}" @if(!empty($city)&&($country_data->id == $city->country->id)) selected @endif>{{$country_data->country_name}}</option>
                                        @endforeach
                                        @endif
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <input type="text" name="city" class="form-control" placeholder="City Name" value="{{!empty($city->city_name)?$city->city_name:''}}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <button type="submit" class="btn deactivate-btn w-100">Add City</button>
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
                                <div class="card-title me-auto">Cities</div>
{{--                                 
                            <input type="text" class="form-control" placeholder="Search">

                             <input type="search" class="form-control form-control-sm" placeholder aria-controls="example"> --}}
                              
                                <select id="status" class="form-select form-select-sm">
                                    <option selected value="all" >All</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Deactive</option>
                                </select>
                            </div>
                            <table id="example" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="w-25">Sr.No.</th>
                                        <th scope="col" class="w-25">City Name</th>
                                        <th class="w-25">Country</th>
                                        <th>Status</th>
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

{{-- <script>
 $(document).ready(function() {
        $('#example').DataTable();
    });
    </script> --}}

<script src="{{url('admin\controller_js\admin_cn_city.js')}}"></script>

<script>
    $(".citiesLi").addClass("activeClass");
    $(".cities").addClass("md-active");
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