@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="container2 pb-5">
        <div class="d-flex align-items-center justify-content-between">
            <div class="page-title">Products</div>
            <a href="{{URL::asset('admin/products-and-categories')}}" class="page-title"> <img src="{{URL::asset('admin/assets/img/ArrowLeftCircle.png')}}" alt="" class="back-btn" /> Back Products & Categories </a>
        </div>
        <div class="row top-cards">
            <div class="col-md-12">
                <!-- Product Pictures -->
                <div class="card card-details mb-3 products">
                    <div class="card-body">
                        <p class="card-title mb-3">Package Details</p>
                        <div class="d-flex flex-wrap gap-3 mt-3">
                            <div class="d-flex flex-column text-center" style="width: 15%;">
                               
                                <a href="{{!empty($package->provider_logo->company_logo_image_path)?url('/').Storage::url($package->provider_logo->company_logo_image_path):''}}" class="glightbox">
                                    <img src="{{!empty($package->provider_logo->company_logo_image_path)?url('/').Storage::url($package->provider_logo->company_logo_image_path):''}}" alt="" class="uploadedImg" />
                                </a>
                                {{-- <span class="deleteImg">Delete Picture</span> --}}
                            </div>

                        </div>

                        <!--  -->
                        <form action="{{route('package.store')}}" method="post">
                            @csrf
                         <input type="hidden" name="id" value="{{!empty($package->id)?$package->id:''}}">   
                        <div class="row mt-3">

                            <div class="col-md-12 mb-3">
                                <label for="name">Package Name</label>
                                <input type="text" class="form-control" name="package_name" placeholder="Package Name" value="{{!empty($package->package_name)?$package->package_name:''}}" disabled>
                            </div>


                            <div class="col-md-12 mb-3">
                                <label for="name">Treatment Category</label>
                                <input type="text" class="form-control" name="treatment_category_id" placeholder="Treatment Category" value="{{!empty($package->product_category->product_category_name)?$package->product_category->product_category_name:''}}"  disabled >
                            </div>

                         



                            <div class="col-md-12 mb-3">
                                <label for="name">Treatment Period</label>
                                <input type="text" class="form-control" name="treatment_period_in_days" placeholder="Treatment Period" value="{{!empty($package->treatment_id)?$package->treatment_id:''}}"  disabled>
                            </div>



                            <div class="col-md-12 mb-3">
                                <label for="name">Discount (%)</label>
                                <div class="input-group">
                                    <input type="text" name="package_discount" class="form-control border-end-0" placeholder="Discount Price" aria-label="Discount Price" aria-describedby="discountPrice" value="{{!empty($package->package_discount)?$package->package_discount:''}}">
                                    <span class="input-group-text border-start-0" id="discountPrice">%</span>
                                </div>
                            </div>


                            <div class="col-md-12 mb-3">
                                <label for="price">Package Price</label>
                                <div class="input-group">
                                    <input type="text" name="package_price" class="form-control border-end-0" placeholder="Package Price" aria-label="Package Price" aria-describedby="packagePrice" value="{{!empty($package->package_price)?$package->package_price:''}}">
                                    <span class="input-group-text border-start-0" id="packagePrice">₺</span>
                                </div>
                            </div>


                            <div class="col-md-12 mb-5">
                                <div class="d-flex align-items-center gap-3">

                                    
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="other_services[]" value="accommodation" id="Accommodation" {{ in_array("accommodation", $otherServicesArray) ? 'checked' : '' }}  disabled>
                                        <label class="form-check-label" for="Accommodation">
                                            Accommodation
                                        </label>
                                    </div>
                                    
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"  name="other_services[]" value="transportation" id="Transportation" {{ in_array("transportation", $otherServicesArray) ? 'checked' : '' }}  disabled>
                                        <label class="form-check-label" for="Transportation">
                                            Transportation
                                        </label>
                                    </div>
                                    
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"  name="other_services[]" value="tour" id="Tour" {{ in_array("tour", $otherServicesArray) ? 'checked' : '' }}  disabled>
                                        <label class="form-check-label" for="Tour">
                                            Tour
                                        </label>
                                    </div>
                                    
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="other_services[]" value="translation" id="Translation" {{ in_array("translation", $otherServicesArray) ? 'checked' : '' }}  disabled>
                                        <label class="form-check-label" for="Translation">
                                            Translation
                                        </label>
                                    </div>
                                    
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="other_services[]" value="visaServices" id="VisaServices" {{ in_array("visaServices", $otherServicesArray) ? 'checked' : '' }}  disabled>
                                        <label class="form-check-label" for="VisaServices">
                                            Visa Services
                                        </label>
                                    </div>
                                    
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="other_services[]"  value="ticketServices" id="TicketServices" {{ in_array("ticketServices", $otherServicesArray) ? 'checked' : '' }}  disabled>
                                        <label class="form-check-label" for="TicketServices">
                                            Ticket Services
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3 df-end">
                                <div class="d-flex flex-wrap justify-content-between w-50">
                                    <button type="submit" class="btn md-btn save-btn">Save Changes</button>
                            </form>        
                                    <button type="button" class="btn md-btn deactivate-btn" data-id="{{!empty($package->id)?$package->id:''}}">{{ $package->status == 'active' ? 'Deactivate Package' : 'Activate Package' }}</button>
                                    <button type="button" data-id="{{ !empty($package->id) ? $package->id : '' }}" class="btn md-btn delete-btn"> {{ $package->status == 'delete' ? 'Deleted' : 'Delete Package' }}</button>

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
<script src="{{url('admin\controller_js\admin_cn_product_md_health_package.js')}}"></script>
<script>
    $(".productsNcategoriesLi").addClass("activeClass");
    $(".productsNcategories").addClass("md-active");
</script>
@endsection