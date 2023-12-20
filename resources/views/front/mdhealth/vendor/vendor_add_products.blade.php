@extends('front.layout.layout2')
@section("content")

<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="row">
            <div class="col-md-3">
                @include('front.includes.sidebar-vendor')
            </div>
            <div class="col-md-9">
                <div class="card mb-4">
                    <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                        <span>Add New Product</span>
                        <a href="{{url('vendor-products')}}" class="d-flex align-items-center gap-1 text-decoration-none text-dark">
                            <img src="{{asset('front/assets/img/backPage.png')}}" alt="">
                            <p class="mb-0">Back</p>
                        </a>
                    </h5>
                    <div class="card-body">
                        <div class="form-div">
                            <form>
                                <div class="form-group mb-3">
                                    <label class="form-label">*Product Name</label>
                                    <input type="text" class="form-control" id="productname" aria-describedby="productname" placeholder="Product Name">
                                </div>

                                <div class="form-group d-flex flex-column mb-3">
                                    <label class="form-label">*Product Category</label>
                                    <select name="" id="">
                                        <option value="">Product Category</option>
                                        <option value="">Product Category 2</option>
                                        <option value="">Product Category 3</option>
                                        <option value="">Product Category 4</option>
                                    </select>
                                </div>

                                <div class="form-group d-flex flex-column mb-3">
                                    <label class="form-label">*Sub-category</label>
                                    <select name="" id="">
                                        <option value="">Sub Category</option>
                                        <option value="">Sub Category 2</option>
                                        <option value="">Sub Category 3</option>
                                        <option value="">Sub Category 4</option>
                                    </select>
                                </div>

                                <div class="multiple-upload-images">
                                    <h6 class="section-heading">Product Pictures</h6>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="images[]" multiple />
                                    </div>
                                    <div class="preview-img">
                                        <div class="prev-img-div">
                                            <img src="{{asset('front/assets/img/default.jpg')}}" alt="">
                                            <a href="javascript:void(0);" class="clear-btn">
                                                <div>X</div>
                                            </a>
                                        </div>
                                        <div class="prev-img-div">
                                            <img src="{{asset('front/assets/img/default.jpg')}}" alt="">
                                            <a href="javascript:void(0);" class="clear-btn">
                                                <div>X</div>
                                            </a>
                                        </div>
                                        <div class="prev-img-div">
                                            <img src="{{asset('front/assets/img/default.jpg')}}" alt="">
                                            <a href="javascript:void(0);" class="clear-btn">
                                                <div>X</div>
                                            </a>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group mb-4">
                                    <h6 class="section-heading">Product Description</h6>
                                    <textarea class="form-control" id="productstext" rows="20" placeholder="Product Description"></textarea>
                                </div>

                                <div class="form-group d-flex flex-column mb-5">
                                    <h6 class="section-heading">Product Price</h6>
                                    <label class="form-label">Product Price (VAT Included Price)</label>
                                    <div class="input-icon-div p-relative">
                                        <input type="text" class="form-control" placeholder="Product Price">
                                        <span class="input-icon">₺</span>
                                    </div>
                                </div>

                                <div class="form-group d-flex flex-column mb-5">
                                    <h6 class="section-heading">Shipping Details</h6>
                                    <label class="form-label">Shipping Fee</label>
                                    <div class="input-icon-div mb-3">
                                        <input type="text" class="form-control" placeholder="Shipping Fee">
                                        <span class="input-icon">₺</span>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label fw-700" for="exampleCheck1">Free Shipping</label>
                                    </div>
                                </div>

                                <div class="form-group d-flex flex-column mb-5">
                                    <h6 class="section-heading">Total Price</h6>
                                    <label class="form-label">Discount </label>
                                    <div class="input-icon-div mb-3">
                                        <input type="text" class="form-control" placeholder="0">
                                        <span class="input-icon">%</span>
                                    </div>

                                    <label class="form-label">Sale Price </label>
                                    <div class="input-icon-div mb-3">
                                        <input type="text" class="form-control" placeholder="Calculated Automatically">
                                        <span class="input-icon">₺</span>
                                    </div>
                                </div>

                                <div class="form-group d-flex flex-column mb-4">
                                    <h6 class="section-heading">Featured Request</h6>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="featureproducts">
                                        <label class="form-check-label fw-700 text-secondary fsb-1" for="featureproducts">Featured this product</label>
                                        <p class="text-muted fw-400 fsb-1"><i>*You pay 3% more commission on this product.</i></p>
                                    </div>
                                </div>

                                <div class="section-btns mb-3">
                                    <a href="javascript:void(0);" class="green-plate bg-green text-dark fw-700">Product Active</a>
                                    <a href="javascript:void(0);" class="black-plate bg-black text-white fw-700">Cancel</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(".mpProductsLi").addClass("activeClass");
    $(".mpProducts").addClass("md-active");
</script>

@endsection