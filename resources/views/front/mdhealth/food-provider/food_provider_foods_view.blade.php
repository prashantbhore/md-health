@extends('front.layout.layout2')
@section('content')
    <style>
        .modal-upload-img img {
            height: 95px;
            width: 95px;
            object-position: center;
            object-fit: contain;
            border-radius: 5px;
        }

        .modal-dialog {
            max-width: 675px;
        }

        .modal-upload-img .file-upload {
            width: 100%;
            border: 1px solid #f1f1f1;
            background: transparent;
            text-align: left;
            padding: 0;
            margin: 10px 0 0;
            cursor: pointer;
            border-radius: 5px;
        }

        .modal-upload-img .file-upload input[type="file"] {
            color: black !important;
            font-size: 13px;
            padding: 5px 10px;
            width: 100%;
            cursor: pointer;
        }

        .add-menu-modal .modal-body .form-label {
            color: #000;
        }

        .add-menu-modal .modal-body {
            padding: 0;
        }

        .modal-header {
            position: relative;
            flex-direction: column;
            gap: 10px;
            border-bottom: unset;
            padding: 0;
        }

        .modal-header .modal-title {
            font-size: 22px;
            font-weight: 800;
        }

        .modal-header .modal-title2 {
            font-size: 15px;
            font-weight: 200;
        }

        .modal-header .btn-close {
            position: absolute;
            top: 0px;
            right: 0px;
            opacity: 1;
            font-size: 10px;
            background: gray;
            border-radius: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .add-menu-modal .modal-content {
            padding: 30px;
        }

        .menu-div ul li {
            font-weight: 100 !important;
        }
    </style>

    <div class="content-wrapper">
        <div class="container py-100px for-cards">
            <div class="row">
                <div class="col-md-3">
                    @include('front.includes.sidebar-food-provider')
                </div>
                <div class="col-md-9">
                    <div class="card mb-4">
                        <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                            <span>Add New Foods</span>
                            <a href="{{ url('food-provider-foods') }}"
                                class="d-flex align-items-center gap-1 text-decoration-none text-dark">
                                <img src="{{ asset('front/assets/img/backPage.png') }}" alt="">
                                <p class="mb-0">Back</p>
                            </a>
                        </h5>
                        <div class="card-body">
                            <div class="form-div">
                                <form enctype="multipart/form-data" id="foodaddform">
                                    <div class="form-group mb-3">
                                        <label class="form-label">*Food Name</label>
                                        <input type="text" class="form-control" id="package_name" name="package_name"
                                            aria-describedby="foodname" placeholder="Food Name">
                                    </div>

                                    <div class="form-group d-flex flex-column mb-3">
                                        <label class="form-label">*Food Type</label>
                                        <select name="food_type_id" id="food_type_id">
                                            <option value="">Vegan</option>
                                            <option value="">Vegan 2</option>
                                            <option value="">Vegan 3</option>
                                            <option value="">Vegan 4</option>
                                        </select>
                                    </div>

                                    <div class="form-group d-flex flex-column mb-3">
                                        <label class="form-label">*Calories</label>
                                        <select name="calories" id="calories">
                                            <option value="">Max 1500 kCal Daily</option>
                                            <option value="">Max 2000 kCal Daily</option>
                                            <option value="">Max 2500 kCal Daily</option>
                                            <option value="">Max 3000 kCal Daily</option>
                                        </select>
                                    </div>

                                    <div class="multiple-upload-images">
                                        <h6 class="section-heading">Food Pictures</h6>
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="images[]" multiple />
                                        </div>
                                        <div class="preview-img">
                                            <div class="prev-img-div">
                                                <img src="{{ asset('front/assets/img/default.jpg') }}" alt="">
                                                <a href="javascript:void(0);" class="clear-btn">
                                                    <div>X</div>
                                                </a>
                                            </div>
                                            <div class="prev-img-div">
                                                <img src="{{ asset('front/assets/img/default.jpg') }}" alt="">
                                                <a href="javascript:void(0);" class="clear-btn">
                                                    <div>X</div>
                                                </a>
                                            </div>
                                            <div class="prev-img-div">
                                                <img src="{{ asset('front/assets/img/default.jpg') }}" alt="">
                                                <a href="javascript:void(0);" class="clear-btn">
                                                    <div>X</div>
                                                </a>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group mb-4">
                                        <h6 class="section-heading">Product Description</h6>
                                        <textarea class="form-control" id="food_description" name="food_description" rows="20" placeholder="Product Description"></textarea>
                                    </div>

                                    <div class="section-btns pt-3 mb-4" >
                                        <a href="javascript:void(0);" class="green-plate bg-green text-dark fw-700 w-100"
                                            data-bs-toggle="modal" data-bs-target="#AddMenuModal">Add Menu</a>
                                    </div>



                                    <!-- Modal for Add Menu -->
<!-- Modal -->
<div class="modal fade add-menu-modal" id="AddMenuModal" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="">Add Menu</h5>
            <h5 class="modal-title2" id="">Add New Menu for Meal Package</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        <div class="modal-body form-div">
            <div class="form-group d-flex flex-column mb-3">
                <label class="form-label">Day</label>
                <select name="days" id="days">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                </select>
            </div>
            <div class="form-group d-flex flex-column mb-3">
                <label class="form-label">Calories</label>
                <select name="calories" id="calories">
                    <option value="">Max 1500 kcal Daily</option>
                    <option value="">Max 2000 kcal Daily</option>
                    <option value="">Max 2500 kcal Daily</option>
                    <option value="">Max 3000 kcal Daily</option>
                </select>
            </div>
            <div class="form-group d-flex flex-column mb-3">
                <label class="form-label">Meal</label>
                <select name="meal_type" id="meal_type">
                    <option value="">Breakfast</option>
                    <option value="">Lunch </option>
                    <option value="">Dinner</option>
                </select>
            </div>
            <div class="modal-upload-img mb-3">
                <label class="form-label">Food Picture</label>
                <div class="small-12 large-4 columns">
                    <div class="imageWrapper">
                        <img class="image" src="{{ asset('front/assets/img/default.jpg') }}">
                    </div>
                    <button class="file-upload"> <input type="file" name="menu_image_path" id="menu_image_path" class="file-input"></button>
                </div>
            </div>
            <div class="form-group mb-4">
                <label class="form-label">Menu</label>
                <textarea class="form-control" id="menu" name="menu" rows="3" placeholder="Description"></textarea>
            </div>
            <div class="section-btns pt-3 mb-4" onclick="saveMenu();">
                <a href="javascript:void(0);" class="green-plate bg-green text-dark fw-700 w-100">Save Menu</a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal for Add Menu -->





                                    <div class="menu-list-div mb-4">
                                        <h6 class="section-heading">Menu's</h6>
                                        <div class="row"  id="menuList">
                                            <div class="col-md-3 mb-5">
                                                <div class="menu-div">
                                                    <label class="form-menu-label fw-600 mb-2 fsb-1">Day 1 - Menu</label>
                                                    <div class="menu-more-div1 mb-3">
                                                        <p class="text-green mb-0 fw-600 fsb-2">Breakfast</p>
                                                        <ul class="list-unstyled mb-1 fsb-2">
                                                            <li>Sheep Cheese</li>
                                                            <li>Boiled Egg</li>
                                                            <li>Tomato</li>
                                                        </ul>
                                                        <div class="menu-btns d-flex gap-3">
                                                            <a href="javascript:void(0);" class="text-dark fsb-1">Edit</a>
                                                            <a href="javascript:void(0);"
                                                                class="text-danger fsb-1">Delete</a>
                                                        </div>
                                                    </div>
                                                    <div class="menu-more-div2">
                                                        <p class="text-green mb-0 fw-600 fsb-2">Lunch</p>
                                                        <ul class="list-unstyled mb-1 fsb-2">
                                                            <li>Chicken Soup</li>
                                                            <li>Boiled Vegatables</li>
                                                            <li>Salad</li>
                                                        </ul>
                                                        <div class="menu-btns d-flex gap-3">
                                                            <a href="javascript:void(0);" class="text-dark fsb-1">Edit</a>
                                                            <a href="javascript:void(0);"
                                                                class="text-danger fsb-1">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-5">
                                                <div class="menu-div">
                                                    <label class="form-menu-label fw-600 mb-2 fsb-1">Day 2 - Menu</label>
                                                    <div class="menu-more-div1 mb-3">
                                                        <p class="text-green mb-0 fw-600 fsb-2">Breakfast</p>
                                                        <ul class="list-unstyled mb-1 fsb-2">
                                                            <li>Sheep Cheese</li>
                                                            <li>Boiled Egg</li>
                                                            <li>Tomato</li>
                                                        </ul>
                                                        <div class="menu-btns d-flex gap-3">
                                                            <a href="javascript:void(0);" class="text-dark fsb-1">Edit</a>
                                                            <a href="javascript:void(0);"
                                                                class="text-danger fsb-1">Delete</a>
                                                        </div>
                                                    </div>
                                                    <div class="menu-more-div2">
                                                        <p class="text-green mb-0 fw-600 fsb-2">Lunch</p>
                                                        <ul class="list-unstyled mb-1 fsb-2">
                                                            <li>Chicken Soup</li>
                                                            <li>Boiled Vegatables</li>
                                                            <li>Salad</li>
                                                        </ul>
                                                        <div class="menu-btns d-flex gap-3">
                                                            <a href="javascript:void(0);" class="text-dark fsb-1">Edit</a>
                                                            <a href="javascript:void(0);"
                                                                class="text-danger fsb-1">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="form-group d-flex flex-column mb-4">
                                        <h6 class="section-heading">Breakfast Price</h6>
                                        <label class="form-label">Breakfast Price (VAT Included Price)</label>
                                        <div class="input-icon-div p-relative">
                                            <input type="text" class="form-control" id="breakfast_price" name="breakfast_price" placeholder="Breakfast Price">
                                            <span class="input-icon">₺</span>
                                        </div>
                                    </div>

                                    <div class="form-group d-flex flex-column mb-4">
                                        <h6 class="section-heading">Lunch Price</h6>
                                        <label class="form-label">Lunch Price (VAT Included Price)</label>
                                        <div class="input-icon-div mb-3">
                                            <input type="text" class="form-control" id="lunch_price" name="lunch_price" placeholder="Lunch Price">
                                            <span class="input-icon">₺</span>
                                        </div>
                                    </div>

                                    <div class="form-group d-flex flex-column mb-4">
                                        <h6 class="section-heading">Dinner Price</h6>
                                        <label class="form-label">Dinner Price (VAT Included Price) </label>
                                        <div class="input-icon-div mb-3">
                                            <input type="text" class="form-control" id="dinner_price" name="dinner_price" placeholder="Dinner Price">
                                            <span class="input-icon">₺</span>
                                        </div>
                                    </div>

                                    <div class="form-group d-flex flex-column">
                                        <h6 class="section-heading">Total Price</h6>
                                        <label class="form-label">Discount </label>
                                        <div class="input-icon-div mb-3">
                                            <input type="text" class="form-control" id="package_price" name="package_price" placeholder="0">
                                            <span class="input-icon">₺</span>
                                        </div>
                                    </div>

                                    <div class="form-group d-flex flex-column mb-4">
                                        <label class="form-label">Sale Price</label>
                                        <div class="input-icon-div mb-3">
                                            <input type="text" class="form-control" id="sales_price" name="sales_price"
                                                placeholder="Calculated Automatically for Daily, Weekly, Monthly">
                                            <span class="input-icon">₺</span>
                                        </div>
                                    </div>

                                    <div class="form-group d-flex flex-column mb-4">
                                        <h6 class="section-heading d-flex justify-content-between">Featured Request
                                            <span>%</span></h6>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="featureproducts" name="featureproducts">
                                            <label class="form-check-label fw-700 text-secondary"
                                                for="featureproducts">Featured this product</label>
                                            <p class="text-muted fw-400"><i>*You pay 3% more commission on this
                                                    product.</i></p>
                                        </div>
                                    </div>

                                    <div class="section-btns mb-3">
                                        <a href="javascript:void(0);"
                                            class="green-plate bg-green text-dark fw-700" onclick="activateProduct()">Product Active</a>
                                        <a href="javascript:void(0);"
                                            class="black-plate bg-black text-white fw-700">Cancel</a>
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

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>

<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>

@section('script')
    <script>
        $(".mpFoodsLi").addClass("activeClass");
        $(".mpFoods").addClass("md-active");
    </script>

    <script>
        $('.file-input').change(function() {
            var curElement = $(this).parent().parent().find('.image');
            console.log(curElement);
            var reader = new FileReader();

            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                curElement.attr('src', e.target.result);
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
    </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Your existing scripts... -->

<script>
    // Function to handle "Add Menu" button click
    function addMenu() {
        // Your logic to show the "Add Menu" modal
        alert('11');
        $('#AddMenuModal').modal('show');
    }

    // Function to handle "Save Menu" button click in the Add Menu modal
    function saveMenu() {
    try {
        alert('Before API Call'); // Debugging alert

        // var button = $(this).val();
        var form = document.getElementById("foodaddform");
        var formData = new FormData(form);
        var base_url = $('#base_url').val();
        const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const bearer_token = '{{ Session::get('login_token') }}';
        // formData.append('button_type', button);

        alert('Before AJAX Call'); // Debugging alert

        $.ajax({
            url: base_url + '/api/md-add-food-packages',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'Authorization': 'Bearer ' + bearer_token,
                'X-CSRF-TOKEN': token,
            },
            success: function(response) {
                console.log(response.id);
                alert('API Call Success'); // Debugging alert

                // Continue with your success logic
            },
            error: function(error) {
                console.error('Upload error:', error);
                alert('API Call Error'); // Debugging alert
            }
        });

        // Make sure this part is reachable
        alert('After AJAX Call'); // Debugging alert

        // Continue with your logic
        
        // var returnedMenuId = yourApiCallToAddMenuAndGetId();
        // Close the modal
        $('#AddMenuModal').modal('hide');

        // Add the menu to the menu list in the main form
        // addMenuToList(returnedMenuId);
    } catch (error) {
        console.error("Error in saveMenu:", error);
    }
}

    // Function to add the menu to the menu list
    function addMenuToList(menuId) {
        alert('33');
        // Your logic to fetch menu details based on the menuId
        var menuDetails = getMenuDetailsById(menuId);

        // Create HTML for the new menu item
        var newMenuItem = '<div class="col-md-3 mb-5">' +
            '<div class="menu-div">' +
            // Include details of the menu here based on menuDetails
            '</div>' +
            '</div>';

        // Append the new menu item to the menu list
        $('#menuList').append(newMenuItem);
    }

    // Function to handle "Product Active" button click
    function activateProduct() {
        alert('44');
        // Your logic to submit prices data including menu IDs
        // You can collect menu IDs from the menu list and submit them as needed
        var menuIds = getMenuIdsFromList();

        // Make API call to submit prices data including menu IDs
        yourApiCallToSubmitPricesData(menuIds);
    }

    // Additional functions as needed...

</script>

    {{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>

    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
    <script>
        $(".mpProductsLi").addClass("activeClass");
        $(".mpProducts").addClass("md-active");
    </script>
    <script>
        //         $('#add_product_vender').submit(function(e){
        // e.preventDefault();
        //         })
        $('.submitform').on('click', function() {
            var button = $(this).val()
            var form = document.getElementById("add_product_vender");
            var formData = new FormData(form);
            var base_url = $('#base_url').val();
            const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const bearer_token = '{{ Session::get('login_token') }}';
            formData.append('button_type', button);
            // var files = $('#vendor_product_image_path')[0].files;
            // for (var i = 0; i < files.length; i++) {
            //     formData.append('vendor_product_image_path[]', files[i]);
            // }

            for (var pair of formData.entries()) {
                console.log(pair[0] + ', ' + pair[1]);
            }
            $.ajax({
                url: base_url + '/api/add-vendor-product',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'Authorization': 'Bearer ' + bearer_token,
                    'X-CSRF-TOKEN': token,
                },
                success: function(response) {
                    console.log(response);
                    if (response.status == 200) {
                        sessionStorage.setItem('toastMessage', response.message);
                        sessionStorage.setItem('toastType', 'success');
                    } else {
                        sessionStorage.setItem('toastMessage', response.message);
                        sessionStorage.setItem('toastType', 'error');
                    }

                    window.location.href = base_url + '/vendor-products';

                },
                error: function(error) {
                    console.error('Upload error:', error);
                }
            });
        });
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
    </script> --}}
@endsection
