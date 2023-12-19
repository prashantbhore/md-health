@extends('front.layout.layout2')
@section("content")

<style>
    .modal-upload-img img{
        height: 95px;
        width: 95px;
        object-position: center;
        object-fit: contain;
        border-radius: 5px;
    }
    .modal-dialog {
        max-width: 675px;
    }
    .modal-upload-img .file-upload{
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
    .modal-header .modal-title{
        font-size: 22px;
        font-weight: 800;
    }
    .modal-header .modal-title2{
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
    .add-menu-modal .modal-content{
        padding: 30px;
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
                        <a href="{{url('food-provider-foods')}}" class="d-flex align-items-center gap-1 text-decoration-none text-dark">
                            <img src="{{asset('front/assets/img/backPage.png')}}" alt="">
                            <p class="mb-0">Back</p>
                        </a>
                    </h5>
                    <div class="card-body">
                        <div class="form-div">
                        <form>
                            <div class="form-group mb-3">
                                <label class="form-label">*Food Name</label>
                                <input type="text" class="form-control" id="foodname" aria-describedby="foodname" placeholder="Food Name">
                            </div>

                            <div class="form-group d-flex flex-column mb-3">
                                <label class="form-label">*Food Type</label>
                                <select name="" id="">
                                    <option value="">Vegan</option>
                                    <option value="">Vegan 2</option>
                                    <option value="">Vegan 3</option>
                                    <option value="">Vegan 4</option>
                                </select>
                            </div>

                            <div class="form-group d-flex flex-column mb-3">
                                <label class="form-label">*Calories</label>
                                <select name="" id="">
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

                            <div class="section-btns pt-3 mb-4">
                                <a href="javascript:void(0);" class="green-plate bg-green text-dark fw-700 w-100" data-bs-toggle="modal" data-bs-target="#AddMenuModal">Add Menu</a>
                            </div>
                            
                            <div class="form-group d-flex flex-column mb-4">
                                <h6 class="section-heading">Breakfast Price</h6>
                                <label class="form-label">Breakfast Price (VAT Included Price)</label>
                                <div class="input-icon-div p-relative">
                                    <input type="text" class="form-control" placeholder="Breakfast Price">
                                    <span class="input-icon">₺</span>
                                </div>
                            </div>

                            <div class="form-group d-flex flex-column mb-4">
                                <h6 class="section-heading">Lunch Price</h6>
                                <label class="form-label">Lunch Price  (VAT Included Price)</label>
                                <div class="input-icon-div mb-3">
                                    <input type="text" class="form-control" placeholder="Lunch Price">
                                    <span class="input-icon">₺</span>
                                </div>
                            </div>

                            <div class="form-group d-flex flex-column mb-4">
                                <h6 class="section-heading">Dinner Price</h6>
                                <label class="form-label">Dinner Price  (VAT Included Price) </label>
                                <div class="input-icon-div mb-3">
                                    <input type="text" class="form-control" placeholder="Dinner Price">
                                    <span class="input-icon">₺</span>
                                </div>
                            </div>
                            
                            <div class="form-group d-flex flex-column">
                                <h6 class="section-heading">Total Price</h6>
                                <label class="form-label">Discount </label>
                                <div class="input-icon-div mb-3">
                                    <input type="text" class="form-control" placeholder="0">
                                    <span class="input-icon">₺</span>
                                </div>
                            </div>

                            <div class="form-group d-flex flex-column mb-4">
                                <label class="form-label">Sale Price</label>
                                <div class="input-icon-div mb-3">
                                    <input type="text" class="form-control" placeholder="Calculated Automatically for Daily, Weekly, Monthly">
                                    <span class="input-icon">₺</span>
                                </div>
                            </div>

                            <div class="form-group d-flex flex-column mb-4">
                                <h6 class="section-heading d-flex justify-content-between">Featured Request <span>%</span></h6>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="featureproducts">
                                    <label class="form-check-label fw-700 text-secondary" for="featureproducts">Featured this product</label>
                                    <p class="text-muted fw-400"><i>*You pay 3% more commission on this product.</i></p>
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

<!-- Modal for Add Menu -->
<!-- Modal -->
<div class="modal fade add-menu-modal" id="AddMenuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <select name="" id="">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                </select>
            </div>
            <div class="form-group d-flex flex-column mb-3">
                <label class="form-label">Calories</label>
                <select name="" id="">
                    <option value="">Max 1500 kcal Daily</option>
                    <option value="">Max 2000 kcal Daily</option>
                    <option value="">Max 2500 kcal Daily</option>
                    <option value="">Max 3000 kcal Daily</option>
                </select>
            </div>
            <div class="form-group d-flex flex-column mb-3">
                <label class="form-label">Meal</label>
                <select name="" id="">
                    <option value="">Breakfast</option>
                    <option value="">Lunch </option>
                    <option value="">Dinner</option>
                </select>
            </div>
            <div class="modal-upload-img mb-3">
                <label class="form-label">Food Picture</label>
                <div class="small-12 large-4 columns">
                    <div class="imageWrapper">
                        <img class="image" src="{{asset('front/assets/img/default.jpg')}}">
                    </div>
                    <button class="file-upload"> <input type="file" class="file-input"></button>
                </div>
            </div>
            <div class="form-group mb-4">
                <label class="form-label">Menu</label>
                <textarea class="form-control" id="productstext" rows="3" placeholder="Description"></textarea>
            </div>
            <div class="section-btns pt-3 mb-4">
                <a href="javascript:void(0);" class="green-plate bg-green text-dark fw-700 w-100">Save Menu</a>
            </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal for Add Menu -->

@section('script')
<script>
    $(".mpFoodsLi").addClass("activeClass");
    $(".mpFoods").addClass("md-active");
</script>

<script>
    $('.file-input').change(function(){
    var curElement = $(this).parent().parent().find('.image');
    console.log(curElement);
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        curElement.attr('src', e.target.result);
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
});
</script>
@endsection