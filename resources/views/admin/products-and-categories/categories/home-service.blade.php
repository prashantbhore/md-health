@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="content-wrapper">
        <div class="d-flex align-items-center justify-content-between">
            <div class="page-title">Categories</div>
            <a href="{{URL::asset('/products-and-categories')}}" class="page-title"> <img src="{{URL::asset('admin/assets/img/ArrowLeftCircle.png')}}" alt="" class="back-btn" /> Back Products & Categories</a>
        </div>
        <div class="row top-cards productsPage">
            <div class="col mb-3">
                <a href="{{URL('/category-mdhealth')}}" class="text-decoration-none text-dark">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="card-text d-flex flex-column">
                                <p>MDhealth</p>
                                <h4 class="mb-0">3</h4>
                            </div>
                            <span class="link-open">
                                <img src="{{URL::asset('admin/assets/img/link-open.png')}}" alt="">
                            </span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col mb-3">
                <a href="{{URL('/category-mdshop')}}" class="text-decoration-none text-dark">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div class="card-text d-flex flex-column">
                                    <p>MDshop</p>
                                    <h4>123</h4>
                                </div>
                                <span class="link-open">
                                    <img src="{{URL::asset('admin/assets/img/link-open.png')}}" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col mb-3">
                <a href="{{URL('/category-mdfood')}}" class="text-decoration-none text-dark">
                    <div class="card  position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div class="card-text d-flex flex-column">
                                    <p>MDfood</p>
                                    <h4>2</h4>
                                </div>
                                <span class="link-open">
                                    <img src="{{URL::asset('admin/assets/img/link-open.png')}}" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col mb-3">
                <a href="{{URL('/category-mdbooking')}}" class="text-decoration-none text-dark">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div class="card-text d-flex flex-column">
                                    <p>MDbooking</p>
                                    <h4>3</h4>
                                </div>
                                <span class="link-open">
                                    <img src="{{URL::asset('admin/assets/img/link-open.png')}}" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col mb-3">
                    <div class="card bg-green position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div class="card-text d-flex flex-column">
                                    <p class="text-black">Home Service</p>
                                    <h4>3</h4>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col mb-3">
                <div class="add-brands-btn h-100">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addNewCategoryModal" class="btn add-brand-btn"><span>+</span> <br> Add New Category</button>
                </div>
            </div>

            <!--  -->
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-body">
                        <!-- Filters -->
                        <div class="w-full d-flex align-items-center justify-content-end gap-2 mb-3 filters">
                                   <div class="card-title me-auto">MD Home Service Categories</div>
                            <input type="text" class="form-control" placeholder="Search">

                            <select class="form-select form-select-sm">
                                <option selected disabled hidden>Active</option>
                                <option value="1">Active Orders</option>
                                <option value="2">Denied Orders</option>
                                <option value="3">Completed Orders</option>
                            </select>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th>Categories</th>
                                        <th>Created</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>#MD7384</td>
                                        <td>Hotel</th>
                                        <td>12/12/2023 - 15:34</td>
                                        <td class="text-end d-flex align-items-center justify-content-end gap-3">
                                            <a href="#" class="deleteImg mt-0">Deactivate</a>

                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntryBlack.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#MD7384</td>
                                        <td>Transportation</th>
                                        <td>12/12/2023 - 15:34</td>
                                        <td class="text-end d-flex align-items-center justify-content-end gap-3">
                                            <a href="#" class="deleteImg mt-0">Deactivate</a>

                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntryBlack.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#MD7384</td>
                                        <td>Flight Ticket</th>
                                        <td>12/12/2023 - 15:34</td>
                                        <td class="text-end d-flex align-items-center justify-content-end gap-3">
                                            <a href="#" class="deleteImg mt-0">Deactivate</a>

                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntryBlack.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add New Category Modal -->
    <div class="modal fade " id="addNewCategoryModal" tabindex="-1" aria-labelledby="addNewCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body px-4">
                    <h4 class="mb-4 md-fw-bold">Add New Category for MD<span class="fw-light">Home Service</span></h4>

                    <form>
                        <div class="mb-3">
                            <label for="brand" class="form-label">*Category Name</label>
                            <input type="text" class="form-control" placeholder="Category Name">
                        </div>
                        <div class="mb-3 treatmentsAdd">
                            <label for="brand" class="form-label">*Treatments</label>
                            <input type="text" class="form-control" placeholder="Treatments">
                            <input type="text" class="form-control" placeholder="Treatments">
                            <div class="input-group">
                                <input type="text" class="form-control border-end-0" placeholder="Treatments" aria-label="Treatments" aria-describedby="addTreatment">
                                <span class="input-group-text border-start-0" id="addTreatment">+</span>
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
@endsection
@section('script')
<script>
    $(".productsNcategoriesLi").addClass("activeClass");
    $(".productsNcategories").addClass("md-active");
</script>
@endsection