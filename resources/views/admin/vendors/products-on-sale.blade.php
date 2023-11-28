@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="container2 pb-5">
        <div class="d-flex align-items-center justify-content-between">
            <div class="page-title">Products</div>
            <a href="{{URL::asset('admin/vendors')}}" class="page-title"> <img src="{{URL::asset('admin/assets/img/ArrowLeftCircle.png')}}" alt="" class="back-btn" /> Back Vendors </a>
        </div>
        <div class="row top-cards">
            <div class="col-md-12">
                <!-- Product Pictures -->
                <div class="card card-details mb-3 products">
                    <div class="card-body">
                        <p class="card-title mb-3">Product Pictures</p>
                        <div class="d-flex flex-wrap gap-3 mt-3">
                            <div class="d-flex flex-column" style="width: 15%;">
                                <a href="{{URL::asset('admin/assets/img/products/1.png')}}" class="glightbox">
                                    <img src="{{URL::asset('admin/assets/img/products/1.png')}}" alt="" class="uploadedImg" />
                                </a>
                                <span class="deleteImg">Delete Picture</span>
                            </div>
                            <div class="d-flex flex-column" style="width: 15%;">
                                <a href="{{URL::asset('admin/assets/img/products/2.png')}}" class="glightbox">
                                    <img src="{{URL::asset('admin/assets/img/products/2.png')}}" alt="" class="uploadedImg" />
                                </a>
                                <span class="deleteImg">Delete Picture</span>
                            </div>
                            <div class="d-flex flex-column" style="width: 15%;">
                                <a href="{{URL::asset('admin/assets/img/products/3.png')}}" class="glightbox">
                                    <img src="{{URL::asset('admin/assets/img/products/3.png')}}" alt="" class="uploadedImg" />
                                </a>
                            </div>
                            <div class="d-flex flex-column" style="width: 15%;">
                                <a href="{{URL::asset('admin/assets/img/products/4.png')}}" class="glightbox">
                                    <img src="{{URL::asset('admin/assets/img/products/4.png')}}" alt="" class="uploadedImg" />
                                </a>
                            </div>
                            <div class="d-flex flex-column" style="width: 15%;">
                                <a href="{{URL::asset('admin/assets/img/products/5.png')}}" class="glightbox">
                                    <img src="{{URL::asset('admin/assets/img/products/5.png')}}" alt="" class="uploadedImg" />
                                </a>
                            </div>
                            <div class="d-flex flex-column" style="width: 15%;">
                                <a href="{{URL::asset('admin/assets/img/products/6.png')}}" class="glightbox">
                                    <img src="{{URL::asset('admin/assets/img/products/6.png')}}" alt="" class="uploadedImg" />
                                </a>
                            </div>
                        </div>

                        <!--  -->
                        <div class="row mt-3">
                            <div class="col-md-6 mb-3">
                                <label for="name">Product Name</label>
                                <input type="text" class="form-control" placeholder="Product Name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="price">Product Price</label>
                                <div class="input-group">
                                    <input type="text" class="form-control border-end-0" placeholder="Product Price" aria-label="Product Price" aria-describedby="basic-addon2">
                                    <span class="input-group-text border-start-0" id="basic-addon2">₺</span>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="description">Description</label>
                                <textarea name="" id="" cols="30" rows="8" class="form-control" placeholder="Description"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="metaKeyword">Meta Keywords</label>
                                <input type="text" class="form-control" placeholder="Meta Keywords">
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="featured">
                                    <label class="form-check-label" for="featured">
                                    Featured this product
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3 df-end">
                                <div class="d-flex flex-wrap justify-content-between w-50">
                                    <button type="submit" class="btn md-btn save-btn">Save Changes</button>
                                    <button type="submit" class="btn md-btn deactivate-btn">Deactivate</button>
                                    <button type="submit" class="btn md-btn delete-btn">Delete Product</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END -->
            </div>

        </div>
    </div>
</section>
@endsection @section('script')
<script>
    $(".manageVendorsLi").addClass("activeClass");
    $(".manageVendors").addClass("md-active");
</script>
@endsection