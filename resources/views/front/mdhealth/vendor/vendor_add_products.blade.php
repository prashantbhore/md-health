@extends('front.layout.layout2')
@section('content')

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
                            <a href="{{ url('vendor-products') }}"
                                class="d-flex align-items-center gap-1 text-decoration-none text-dark">
                                <img src="{{ asset('front/assets/img/backPage.png') }}" alt="">
                                <p class="mb-0">Back</p>
                            </a>
                        </h5>
                        <div class="card-body">
                            <div class="form-div">
                                <form action="{{ url('/add-vendor-product') }}" method="post" id="add_product_vender"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id"
                                        value="{{ !empty($product_list['id']) ? $product_list['id'] : '' }}">
                                    <div class="form-group mb-3">
                                        <label class="form-label">*Product Name</label>
                                        <input type="text" class="form-control" id="product_name" name="product_name"
                                            value="{{ !empty($product_list['product_name']) ? $product_list['product_name'] : '' }}"
                                            aria-describedby="productname" placeholder="Product Name">
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
                                        <div class="form-group mb-3">
                                            <input type="file" class="form-control" id="vendor_product_image_path"
                                                name="vendor_product_image_path[]" multiple />
                                        </div>
                                        <div class="preview-img">
                                            @if (!empty($product_gallery_list))
                                                @foreach ($product_gallery_list as $product_gallery)
                                                    <div class="prev-img-div" id="div_{{ $product_gallery['id'] }}">
                                                        <img src="{{ !empty($product_gallery['image']) ? $product_gallery['image'] : '' }}"
                                                            alt="">
                                                        <a href="javascript:void(0);" class="clear-btn"
                                                            onclick="deleteClientLogo({{ $product_gallery['id'] }})">
                                                            {{--  --}}
                                                            <div>X</div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <h6 class="section-heading">Product Description</h6>
                                        <textarea class="form-control" name="product_description" id="product_description" rows="20"
                                            placeholder="Product Description">{{ !empty($product_list['product_description']) ? $product_list['product_description'] : '' }}</textarea>
                                    </div>

                                    <div class="form-group d-flex flex-column mb-5">
                                        <h6 class="section-heading">Product Price</h6>
                                        <label class="form-label">Product Price (VAT Included Price)</label>
                                        <div class="input-icon-div p-relative">
                                            <input type="text" id="product_price" name="product_price"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                                                class="form-control"
                                                value="{{ !empty($product_list['product_price']) ? $product_list['product_price'] : '' }}"
                                                placeholder="Product Price">
                                            <span class="input-icon">₺</span>
                                        </div>
                                    </div>

                                    <div class="form-group d-flex flex-column mb-5">
                                        <h6 class="section-heading">Shipping Details</h6>
                                        <label class="form-label">Shipping Fee</label>
                                        <div class="input-icon-div mb-3">
                                            <input type="text" class="form-control" name="shipping_fee" id="shipping_fee"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                                                value="{{ !empty($product_list['shipping_fee']) ? $product_list['shipping_fee'] : '' }}"placeholder="Shipping Fee">
                                            <span class="input-icon">₺</span>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="free_shipping"
                                                {{ !empty($product_list['free_shipping'])&&($product_list['free_shipping']=='yes') ? 'checked' : false }}
                                                name="free_shipping">
                                            <label class="form-check-label fw-700" for="free_shipping">Free Shipping</label>
                                        </div>
                                    </div>

                                    <div class="form-group d-flex flex-column mb-5">
                                        <h6 class="section-heading">Total Price</h6>
                                        <label class="form-label">Discount </label>
                                        <div class="input-icon-div mb-3">
                                            <input type="text" name="discount_price" id="discount_price"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                                                value="{{ !empty($product_list['discount_price']) ? $product_list['discount_price'] : '' }}"
                                                class="form-control" placeholder="0">
                                            <span class="input-icon">%</span>
                                        </div>

                                        <label class="form-label">Sale Price </label>
                                        <div class="input-icon-div mb-3">
                                            <input type="text" class="form-control" name="sale_price" id="sale_price"
                                                readonly
                                                value="{{ !empty($product_list['sale_price']) ? $product_list['sale_price'] : '' }}"
                                                placeholder="Calculated Automatically">
                                            <span class="input-icon">₺</span>
                                        </div>
                                    </div>

                                    <div class="form-group d-flex flex-column mb-4">
                                        <h6 class="section-heading">Featured Request</h6>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="featured"
                                                name="featured"
                                                {{ !empty($product_list['featured']) ? 'checked' : false }}>
                                            <label class="form-check-label fw-700 text-secondary fsb-1"
                                                for="featured">Featured this product</label>
                                            <p class="text-muted fw-400 fsb-1"><i>*You pay 3% more commission on this
                                                    product.</i></p>
                                        </div>
                                    </div>

                                    <div class="section-btns mb-3">
                                        <button class="green-plate bg-green text-dark fw-700" name="button_type"
                                            value="active">Product Active</button>
                                        <button class="black-plate bg-black text-white fw-700" name="button_type"
                                            value="inactive">Product Inactive</button>
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>

    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
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
    <script>
        function deleteClientLogo(id) {
            var base_url = $('#base_url').val();
            const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const bearer_token = '{{ Session::get('login_token') }}';
            // alert(base_url);
            $.ajax({
                url: base_url + '/api/md-delete-vendor-images-videos',
                type: 'POST',
                data: {
                    id: id,
                },
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Authorization': 'Bearer ' + bearer_token
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#div_' + id).css('display', 'none');
                        toastr.options = {
                            "positionClass": "toast-bottom-right",
                            "timeOut": "5000",
                        };
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                    console.log('Success:', response.message);
                },
                error: function(xhr) {
                    console.error('Error:', xhr);
                }
            });
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            // Function to calculate and update the sale price
            function updateSalePrice() {
                // Get values from inputs
                var productPrice = parseFloat($('#product_price').val()) || 0;
                var shippingFee = parseFloat($('#shipping_fee').val()) || 0;
                var discountPercentage = parseFloat($('#discount_price').val()) || 0;

                // Disable featured checkbox if shipping fee is entered
                if (shippingFee > 0) {
                    $('#free_shipping').prop('disabled', true);
                } else {
                    $('#free_shipping').prop('disabled', false);
                }

                // Disable shipping fee if featured checkbox is checked
                if ($('#free_shipping').prop('checked')) {
                    $('#shipping_fee').prop('disabled', true);
                } else {
                    $('#shipping_fee').prop('disabled', false);
                }

                // Calculate total price
                var totalPrice = productPrice + shippingFee;

                // Calculate discounted price
                var discountAmount = (discountPercentage / 100) * totalPrice;
                var salePrice = totalPrice - discountAmount;

                // Update the sale price input
                $('#sale_price').val(salePrice.toFixed(2));
            }

            // Event listener for input changes
            $('#product_price, #shipping_fee, #discount_price, #free_shipping').on('input change', function() {
                updateSalePrice();
            });

            // Initial calculation on page load
            updateSalePrice();
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Include jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <!-- Your jQuery Validation Script -->
    <script>
        $(document).ready(function() {
            // Initialize the form validation
            $("#add_product_vender").validate({
                rules: {
                    product_name: {
                        required: true,

                    },
                    product_category_id: {
                        required: true
                    },
                    product_subcategory_id: {
                        required: true
                    },
                    vendor_product_image_path: {
                        required: true
                    },
                    product_description: {
                        required: true,

                    },
                    product_price: {
                        required: true,
                        number: true
                    },

                    discount_price: {
                        required: true,
                        number: true,
                        max: 100 // Set the maximum value to 100
                    }
                },
                messages: {
                    product_name: {
                        required: "Please enter the product name."
                    },
                    product_category_id: {
                        required: "Please select a product category."
                    },
                    product_subcategory_id: {
                        required: "Please select a product subcategory."
                    },
                    vendor_product_image_path: {
                        required: "Please upload at least one product image."
                    },
                    product_description: {
                        required: "Please provide a product description."
                    },
                    product_price: {
                        required: "Please enter the product price.",
                        number: "Please enter a valid number for the product price."
                    },
                    discount_price: {
                        required: "Please enter the discount.",
                        number: "Please enter a valid number for the discount.",
                        max: "Discount cannot be greater than 100."
                    }
                },

                submitHandler: function(form) {
                    // Your custom submit logic here, if needed
                    form.submit();
                }
            });
        });
    </script>
@endsection
