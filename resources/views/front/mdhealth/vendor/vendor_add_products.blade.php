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
                            <form action="{{url('/add-vendor-product')}}" method="post" id="add_product_vender">
                                @csrf
                                <input type="hidden" name="id" value="{{ !empty($product_list['id']) ? $product_list['id'] : '' }}">
                                <div class="form-group mb-3">
                                    <label class="form-label">*Product Name</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name"
                                    value="{{ !empty($product_list['product_name']) ? $product_list['product_name'] : '' }}" aria-describedby="productname" placeholder="Product Name">
                                </div>

                                <div class="form-group d-flex flex-column mb-3">
                                    <label class="form-label">*Product Category</label>
                                    <select id="product_category_id" name="product_category_id" class="form-select"
                                            onchange="categoryselect(this.value)">
                                            <option value="" selected disabled>Choose</option>
                                            @foreach ($product_categories as $product_category)
                                                @php
                                                    $isSelected = isset($product_list['product_category_id']) && $product_list['product_category_id'] == $product_category['id'];
                                                @endphp
                                                <option
                                                    value="{{ $product_category['id'] }}"{{ $isSelected ? ' selected' : '' }}>
                                                    {{ $product_category['category_name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                </div>

                                <div class="form-group d-flex flex-column mb-3">
                                    <label class="form-label">*Sub-category</label>
                                    <select name="product_subcategory_id" id="product_subcategory_id">
                                        <option value="">Product Sub-Category </option>
                                    </select>
                                </div>

                                <div class="multiple-upload-images">
                                    <h6 class="section-heading">Product Pictures</h6>
                                    <div class="form-group">
                                        <input type="file" class="form-control" id="vendor_product_image_path" name="vendor_product_image_path[]" multiple />
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
                                    <textarea class="form-control" name="product_description" id="product_description" rows="20" placeholder="Product Description">{{ !empty($product_list['product_description']) ? $product_list['product_description'] : '' }}</textarea>
                                </div>

                                <div class="form-group d-flex flex-column mb-5">
                                    <h6 class="section-heading">Product Price</h6>
                                    <label class="form-label">Product Price (VAT Included Price)</label>
                                    <div class="input-icon-div p-relative">
                                        <input type="text" id="product_price" name="product_price" class="form-control" 
                                        value="{{ !empty($product_list['product_price']) ? $product_list['product_price'] : '' }}" placeholder="Product Price">
                                        <span class="input-icon">₺</span>
                                    </div>
                                </div>

                                <div class="form-group d-flex flex-column mb-5">
                                    <h6 class="section-heading">Shipping Details</h6>
                                    <label class="form-label">Shipping Fee</label>
                                    <div class="input-icon-div mb-3">
                                        <input type="text" class="form-control" name="shipping_fee" id="shipping_fee" 
                                        value="{{ !empty($product_list['shipping_fee']) ? $product_list['shipping_fee'] : '' }}"placeholder="Shipping Fee">
                                        <span class="input-icon">₺</span>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="free_shipping"
                                        {{ !empty($product_list['free_shipping']) ? 'checked' : false }} name="free_shipping">
                                        <label class="form-check-label fw-700" for="free_shipping">Free Shipping</label>
                                    </div>
                                </div>

                                <div class="form-group d-flex flex-column mb-5">
                                    <h6 class="section-heading">Total Price</h6>
                                    <label class="form-label">Discount </label>
                                    <div class="input-icon-div mb-3">
                                        <input type="text" name="discount_price" id="discount_price"
                                        value="{{ !empty($product_list['discount_price']) ? $product_list['discount_price'] : '' }}" class="form-control" placeholder="0">
                                        <span class="input-icon">%</span>
                                    </div>

                                    <label class="form-label">Sale Price </label>
                                    <div class="input-icon-div mb-3">
                                        <input type="text" class="form-control" name="sale_price" id="sale_price"
                                        value="{{ !empty($product_list['sale_price']) ? $product_list['sale_price'] : '' }}" placeholder="Calculated Automatically">
                                        <span class="input-icon">₺</span>
                                    </div>
                                </div>

                                <div class="form-group d-flex flex-column mb-4">
                                    <h6 class="section-heading">Featured Request</h6>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="featured" name="featured"
                                        {{ !empty($product_list['featured']) ? 'checked' : false }}>
                                        <label class="form-check-label fw-700 text-secondary fsb-1" for="featured">Featured this product</label>
                                        <p class="text-muted fw-400 fsb-1"><i>*You pay 3% more commission on this product.</i></p>
                                    </div>
                                </div>

                                <div class="section-btns mb-3">
                                    <button class="green-plate bg-green text-dark fw-700" name="button_type" value="active">Product Active</button>
                                    <button class="black-plate bg-black text-white fw-700" name="button_type" value="inactive">Product Inactive</button>
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

<script>
    function categoryselect(value) {
        var base_url = $('#base_url').val();
        const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const bearer_token = '{{ Session::get('login_token') }}';

        $.ajax({
            url: base_url + '/api/product-sub-category',
            type: 'POST',
            data: {
                category_id: value,
            },
            headers: {
                'X-CSRF-TOKEN': token,
                'Authorization': 'Bearer ' + bearer_token
            },
            success: function(response) {
                console.log(response);
                // Clear existing options
                $('#product_subcategory_id').empty();

                if (response.status === 200) {
                    // Add new options based on the response
                    response.product_category.forEach(function(product_category) {
                        $('#product_subcategory_id').append($('<option>', {
                            value: product_category.id,
                            text: product_category.sub_category_name
                        }));
                    });

                    // Pre-select treatment if it exists
                    var selectedTreatment =
                        "{{ isset($product_list['product_subcategory_id']) ? $product_list['product_subcategory_id'] : null }}";
                    if (selectedTreatment) {
                        $('#product_subcategory_id').val(selectedTreatment);
                    }
                } else {
                    console.error('Error:', response.message);
                }
            },
            error: function(xhr) {
                console.error('Error:', xhr);
            }
        });
    }

    // Call categoryselect() initially with the default value
    $(document).ready(function() {
        var defaultValue =
            "{{ isset($product_list['product_category_id']) ? $product_list['product_category_id'] : null }}";
        if (defaultValue) {
            categoryselect(defaultValue);
        }
    });
</script>

@endsection