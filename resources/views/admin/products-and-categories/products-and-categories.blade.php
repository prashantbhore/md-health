@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="content-wrapper">
        <div class="page-title">Manage Products & Categories</div>
        <div class="row top-cards productsPage">
            <div class="col-md-3 mb-3">
                <a href="{{URL('/category-mdhealth')}}" class="text-decoration-none text-dark">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div class="card-text d-flex flex-column">
                                    <p>Total Categories</p>
                                    <h4 class="mb-0">272</h4>
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
                <a href="{{URL('/product-mdhealth')}}" class="text-decoration-none text-dark">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div class="card-text d-flex flex-column">
                                    <p>Total Products</p>
                                    <h4>4.873</h4>
                                </div>
                                <span href="{{URL('/category-mdhealth')}}" class="link-open">
                                    <img src="{{URL::asset('admin/assets/img/link-open.png')}}" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-body">
                        <div class="w-full d-flex align-items-center justify-content-end gap-2 mb-3 filters">
                            <div class="card-title me-auto">Recent Categories & Products</div>
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
                                        <td>Treatments</th>
                                        <td>12/12/2023 - 15:34</td>
                                        <td class="text-end d-flex align-items-center justify-content-end gap-3">
                                            <a href="#" class="deleteImg mt-0">Deactivate</a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#MD7384</td>
                                        <td>Packages</th>
                                        <td>12/12/2023 - 15:34</td>
                                        <td class="text-end d-flex align-items-center justify-content-end gap-3">
                                            <a href="#" class="deleteImg mt-0">Deactivate</a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#MD7384</td>
                                        <td>Home Service</th>
                                        <td>12/12/2023 - 15:34</td>
                                        <td class="text-end d-flex align-items-center justify-content-end gap-3">
                                            <a href="#" class="deleteImg mt-0">Deactivate</a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#MD7384</td>
                                        <td>Treatments</th>
                                        <td>12/12/2023 - 15:34</td>
                                        <td class="text-end d-flex align-items-center justify-content-end gap-3">
                                            <a href="#" class="activateLink mt-0">Activate</a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#MD7384</td>
                                        <td>Packages</th>
                                        <td>12/12/2023 - 15:34</td>
                                        <td class="text-end d-flex align-items-center justify-content-end gap-3">
                                            <a href="#" class="activateLink mt-0">Activate</a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#MD7384</td>
                                        <td>Home Service</th>
                                        <td>12/12/2023 - 15:34</td>
                                        <td class="text-end d-flex align-items-center justify-content-end gap-3">
                                            <a href="#" class="deleteImg mt-0">Deactivate</a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#MD7384</td>
                                        <td>Treatments</th>
                                        <td>12/12/2023 - 15:34</td>
                                        <td class="text-end d-flex align-items-center justify-content-end gap-3">
                                            <a href="#" class="deleteImg mt-0">Deactivate</a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#MD7384</td>
                                        <td>Packages</th>
                                        <td>12/12/2023 - 15:34</td>
                                        <td class="text-end d-flex align-items-center justify-content-end gap-3">
                                            <a href="#" class="deleteImg mt-0">Deactivate</a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>



                                </tbody>
                            </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                </ul>
                            </nav>
                        </div>
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

                    <form>
                        <div class="mb-3">
                            <label for="brand" class="form-label">*Brand</label>
                            <input type="text" class="form-control" placeholder="Brand Name">
                        </div>
                        <div class="mb-3">
                            <label for="brandCategory">*Brand Category</label>
                            <select name="" id="" class="form-select w-100 mb-5">
                                <option value="" selected disabled>Choose</option>
                                <option value="vehicle">Vehicle</option>
                                <option value="flight">Flight</option>
                                <option value="hotel">Hotel</option>
                                <option value="mdShop">MDshop</option>
                            </select>
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
<script>
    $(".productsNcategoriesLi").addClass("activeClass");
    $(".productsNcategories").addClass("md-active");
</script>
@endsection