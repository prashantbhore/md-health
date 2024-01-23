@extends('admin.layout.layout') @section("content")

<style>
    .remove-treatment {
        cursor: pointer;
        display: flex;
        align-items: center;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #fff;
        background-color: #dc3545;
        border: 1px solid #dc3545;
        border-radius: 0.25rem;
    }

.error {
    color: red;
  }
</style>
<section class="main-content">
    <div class="content-wrapper">
        <div class="d-flex align-items-center justify-content-between">
            <div class="page-title">Categories</div>
            <a href="{{URL::asset('admin/products-and-categories')}}" class="page-title"> <img src="{{URL::asset('admin/assets/img/ArrowLeftCircle.png')}}" alt="" class="back-btn" /> Back Products & Categories</a>
        </div>

        <div class="row top-cards productsPage">

            <div class="col mb-3">
                <div class="card bg-green position-relative">
                    <div class="card-body">
                        <div class="card-text d-flex flex-column">
                            <p class="text-black">MDhealth</p>
                            <h4 class="mb-0">{{$md_health_category_count}}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col mb-3">
                <a href="{{URL('admin/category-mdshop')}}" class="text-decoration-none text-dark">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div class="card-text d-flex flex-column">
                                    <p>MDshop</p>
                                    <h4>{{$md_shop_category_count}}</h4>
                                </div>
                                <span class="link-open">
                                    <img src="{{URL::asset('admin/assets/img/link-open.png')}}" alt="" />
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col mb-3">
                <a href="{{URL('admin/category-mdfood')}}" class="text-decoration-none text-dark position-relative">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div class="card-text d-flex flex-column">
                                    <p>MDfood</p>
                                    <h4>{{$md_food_category_count}}</h4>
                                </div>
                                <span class="link-open">
                                    <img src="{{URL::asset('admin/assets/img/link-open.png')}}" alt="" />
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- <div class="col mb-3">
                <a href="{{URL('admin/category-mdbooking')}}" class="text-decoration-none text-dark">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div class="card-text d-flex flex-column">
                                    <p>MDbooking</p>
                                    <h4>3</h4>
                                </div>
                                <span class="link-open">
                                    <img src="{{URL::asset('admin/assets/img/link-open.png')}}" alt="" />
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div> -->


            <div class="col mb-3">
                <a href="{{URL('admin/category-home-service')}}" class="text-decoration-none text-dark">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div class="card-text d-flex flex-column">
                                    <p>Home Service</p>
                                    <h4>{{$md_home_service_category_count}}</h4>
                                </div>
                                <span class="link-open">
                                    <img src="{{URL::asset('admin/assets/img/link-open.png')}}" alt="" />
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col mb-3">
                <div class="add-brands-btn h-100">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addNewCategoryModal" class="btn add-brand-btn">
                        <span>+</span> <br />
                        Add New Category
                    </button>
                </div>
            </div>

            <!--  -->
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-body">
                        <!-- Filters -->
                        <div class="w-full d-flex align-items-center justify-content-end gap-2 mb-3 filters">
                            <div class="card-title me-auto">MDhealth Categories</div>
                            <input type="text" class="form-control" placeholder="Search">

                            <select class="form-select form-select-sm">
                                <option selected disabled hidden>Active</option>
                                <option value="1">Active Orders</option>
                                <option value="2">Denied Orders</option>
                                <option value="3">Completed Orders</option>
                            </select>
                        </div>
                        <div class="table-responsive" style="overflow-x: hidden">
                            <table id="example" class="table">
                                <thead>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th scope="col">ID</th>
                                        <th>Categories</th>
                                        <th>Sub Categories</th>
                                        <th>Created</th>
                                        <th></th>
                                        <th></th>
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

    <!-- Add New Category Modal -->
    <div class="modal fade" id="addNewCategoryModal" tabindex="-1" aria-labelledby="addNewCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body px-4">
                    <h4 class="mb-4 md-fw-bold">Add New Category for MD<span class="fw-light">health</span></h4>

                    <form action="{{route('category.mdhealth.store')}}" method="post">
                        @csrf

                        <input type="hidden"   name="main_category_id" value="1">

                        <input type="hidden"  id="id" name="id">


                        <div class="mb-3">
                            <label for="brand" class="form-label">*Category Name</label>
                            <input type="text" name="category_name" id="product_category_name" class="form-control" placeholder="Category Name" />
                        </div>

                        <div class="mb-3 treatmentsAdd">
                            <label for="brand"  class="form-label">*Treatments</label>
                            <span id="sub_category" ></span>

                            <input type="text" name="treatments[]" class="form-control static-treatments" placeholder="Treatments" />
                            <input type="text" name="treatments[]" class="form-control static-treatments" placeholder="Treatments" />
                            <div class="input-group static-treatments">
                                <input type="text" name="treatments[]" class="form-control border-end-0 static-treatments" placeholder="Treatments" aria-label="Treatments" aria-describedby="addTreatment" />
                                <span class="input-group-text border-start-0 addTreatment static-treatments" id="addTreatment">+</span>
                            </div>
                        </div>
                        

                        <div class="mb-3 text-center">
                            <button type="submit" class="btn save-btn w-75">Add Category</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection @section('script')
<script src="{{url('admin\controller_js\admin_cn_product_md_health.js')}}"></script>
<script>
    $(".productsNcategoriesLi").addClass("activeClass");
    $(".productsNcategories").addClass("md-active");
</script>
@endsection