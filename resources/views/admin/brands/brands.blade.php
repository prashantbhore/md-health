@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="content-wrapper">
        <div class="page-title">Manage Brands</div>
        <div class="row top-cards">
            <div class="col-md-12 my-3 earners brandsPage">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="">
                            <label for="totalEarnings">Total Earnings</label>
                            <h4 class="mb-0">212</h4>
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
                        <div class="card-title">Top Earners Monthly</div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th>Full Name</th>
                                        <th>Network</th>
                                        <th>City</th>
                                        <th>Country</th>
                                        <th>Payment Request</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>#MD7384</td>
                                        <td>Ali Danish</th>
                                        <td>47</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>1.980,00 ₺</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#addNewBrandModal">
                                                <img src="{{URL::asset('admin/assets/img/editEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#MD7384</td>
                                        <td>Ali Danish</th>
                                        <td>47</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>1.980,00 ₺</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#addNewBrandModal">
                                                <img src="{{URL::asset('admin/assets/img/editEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#MD7384</td>
                                        <td>Ali Danish</th>
                                        <td>47</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>1.980,00 ₺</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#addNewBrandModal">
                                                <img src="{{URL::asset('admin/assets/img/editEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#MD7384</td>
                                        <td>Ali Danish</th>
                                        <td>47</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>1.980,00 ₺</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#addNewBrandModal">
                                                <img src="{{URL::asset('admin/assets/img/editEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#MD7384</td>
                                        <td>Ali Danish</th>
                                        <td>47</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>1.980,00 ₺</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#addNewBrandModal">
                                                <img src="{{URL::asset('admin/assets/img/editEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#MD7384</td>
                                        <td>Ali Danish</th>
                                        <td>47</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>1.980,00 ₺</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#addNewBrandModal">
                                                <img src="{{URL::asset('admin/assets/img/editEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#MD7384</td>
                                        <td>Ali Danish</th>
                                        <td>47</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>1.980,00 ₺</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#addNewBrandModal">
                                                <img src="{{URL::asset('admin/assets/img/editEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#MD7384</td>
                                        <td>Ali Danish</th>
                                        <td>47</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>1.980,00 ₺</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#addNewBrandModal">
                                                <img src="{{URL::asset('admin/assets/img/editEntry.png')}}" alt="">
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
    $(".brandsLi").addClass("activeClass");
    $(".brands").addClass("md-active");
</script>
@endsection