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
        <div class="page-title">Manage Brands</div>
        <div class="row top-cards">
            <div class="col-md-12 my-3 earners brandsPage">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="">
                            <label for="totalEarnings">Total Brands</label>
                            <h4 class="mb-0">{{!empty($brandCount)?$brandCount:0 }}</h4>
                        </div>
                        <div class="add-brands-btn">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#addNewBrandModal" class="btn save-btn"><span>+</span> <br> Add New Brand</button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-body">
                        <!-- Filters -->
                        <div class="w-full d-flex align-items-center justify-content-end gap-2 mb-3 filters">
                            <div class="card-title me-auto">Brands</div>
                            {{-- <input type="text" class="form-control" placeholder="Search"> --}}

                            <select class="form-select form-select-sm">
                                <option selected disabled hidden>All Brands</option>
                                @if($brand_category)
                                @foreach ($brand_category as $brand_category_data)
                                 <option value="{{$brand_category_data->id}}">{{ $brand_category_data->category_name}}</option>
                                @endforeach
                             
                                @endif
                            </select>
                        </div>
                        {{-- <div class="table-responsive" style="overflow-x: hidden"> --}}
                            <table id="example" class="table table-responsive" style="overflow-x: hidden">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr.No.</th>
                                        <th scope="col">ID</th>
                                        <th>Brands</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Action</th>
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
    <!-- Add New Brand Modal -->
    <div class="modal fade " id="addNewBrandModal" tabindex="-1" aria-labelledby="addNewBrandModalLabel" aria-hidden="true">

      
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body px-4">
                    <h4 class="mb-4">Add New Brand</h4>



                    <form id="brandformId" action="{{route('add-brand')}}" method="post">
                            @csrf
                           
                            <input type="hidden" name="id" id="id" value="">
                            
                            
                            <div class="mb-3">
                                <label for="brandCategory">*Brand Category</label>
                                <select name="brand_category" id="brand_category" class="form-select w-100 mb-5">
                                    <option value="" selected disabled>Choose</option>
                                    @if($brand_category)
                                    @foreach ($brand_category as $brand_category_data)
                                     <option value="{{$brand_category_data->id}}">{{ $brand_category_data->category_name}}</option>
                                    @endforeach
                                 
                                    @endif
                                    
                                </select>
                            </div>

                        <div class="mb-3">
                            <label for="brand" class="form-label">*Brand</label>
                            <input type="text" name="brand_name" id="brand_name" class="form-control" value="{{!empty($brand->brand_name)?$brand->brand_name:''}}" placeholder="Brand Name">
                        </div>

                       
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn save-btn w-75">Add Brand</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>

</section>
@endsection
@section('script')
<script src="{{url('admin\controller_js\admin_cn_brand.js')}}"></script>

<script>
    $(".brandsLi").addClass("activeClass");
    $(".brands").addClass("md-active");
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