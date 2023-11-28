@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="content-wrapper">
        <div class="page-title">Manage Cities</div>
        <div class="row top-cards ">
            <div class="col-md-12 my-3">
                <div class="card addCity">
                    <div class="card-body">
                        <div class="card-title">Add New Cities</div>

                        <form id="yourFormId" action="{{route('add-city')}}" method="post">
                            @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <select class="form-control w-100" id="countrySelect" name="country">
                                    <option value="" selected disabled>Select Country</option>
                                    @if(!empty($countries))
                                    @foreach ($countries as $country_data)
                                      <option value="{{$country_data->id}}">{{$country_data->country_name}}</option>
                                    @endforeach
                                    @endif
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                            

                            <div class="col-md-6 mb-3">
                                <input type="text" name="city" class="form-control" placeholder="City Name">
                            </div>
                          
                            <div class="col-md-12 mb-3">
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
                        <!-- Filters -->
                        <div class="w-full d-flex align-items-center justify-content-end gap-2 mb-3 filters">
                            <div class="card-title me-auto">Cities</div>
                            <input type="text" class="form-control" placeholder="Search">

                            <select class="form-select form-select-sm">
                                <option selected disabled hidden>Active Cities</option>
                             
                                    <option value="1">Active Orders</option>
                                    <option value="2">Denied Orders</option>
                                    <option value="3">Completed Orders</option>
                             
                            </select>
                        </div>


                        <div class="table-responsive">
                            <table id="example" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="w-25">id</th>

                                        <th scope="col" class="w-25">City Name</th>
                                        <th class="w-25">Country</th>
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
 $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>

<script src="{{url('admin\assets\js\controllerJs\admin_cn_city.js')}}"></script>



<script>


    $(".citiesLi").addClass("activeClass");
    $(".cities").addClass("md-active");
</script>
@endsection