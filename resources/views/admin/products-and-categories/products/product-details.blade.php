@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="container2 pb-5">
        <div class="d-flex align-items-center justify-content-between">
            <div class="page-title">Products</div>
            <a href="{{URL::asset('/products-and-categories')}}" class="page-title"> <img src="{{URL::asset('admin/assets/img/ArrowLeftCircle.png')}}" alt="" class="back-btn" /> Back Products & Categories </a>
        </div>
        <div class="row top-cards">
            <div class="col-md-12">
                <!-- Product Pictures -->
                <div class="card card-details mb-3 products">
                    <div class="card-body">
                        <p class="card-title mb-3">Package Details</p>
                        <div class="d-flex flex-wrap gap-3 mt-3">
                            <div class="d-flex flex-column text-center" style="width: 15%;">
                                <a href="{{URL::asset('admin/assets/img/packageImg.png')}}" class="glightbox">
                                    <img src="{{URL::asset('admin/assets/img/packageImg.png')}}" alt="" class="uploadedImg" />
                                </a>
                                <span class="deleteImg">Delete Picture</span>
                            </div>

                        </div>

                        <!--  -->
                        <div class="row mt-3">
                            <div class="col-md-12 mb-3">
                                <label for="name">Package Name</label>
                                <input type="text" class="form-control" placeholder="Package Name">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="name">Treatment Category</label>
                                <input type="text" class="form-control" placeholder="Treatment Category">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="name">Treatment Period</label>
                                <input type="text" class="form-control" placeholder="Treatment Period">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="name">Discount (%)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control border-end-0" placeholder="Discount Price" aria-label="Discount Price" aria-describedby="discountPrice">
                                    <span class="input-group-text border-start-0" id="discountPrice">%</span>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="price">Package Price</label>
                                <div class="input-group">
                                    <input type="text" class="form-control border-end-0" placeholder="Package Price" aria-label="Package Price" aria-describedby="packagePrice">
                                    <span class="input-group-text border-start-0" id="packagePrice">₺</span>
                                </div>
                            </div>

                            <div class="col-md-12 mb-5">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Accomodition">
                                        <label class="form-check-label" for="Accomodition">
                                            Accomodition
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Transportation">
                                        <label class="form-check-label" for="Transportation">
                                            Transportation
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Tour">
                                        <label class="form-check-label" for="Tour">
                                            Tour
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Translation">
                                        <label class="form-check-label" for="Translation">
                                            Translation
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="VisaServices">
                                        <label class="form-check-label" for="VisaServices">
                                            Visa Services
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="TicketServices">
                                        <label class="form-check-label" for="TicketServices">
                                            Ticket Services
                                        </label>
                                    </div>
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
    $(".productsNcategoriesLi").addClass("activeClass");
    $(".productsNcategories").addClass("md-active");
</script>
@endsection