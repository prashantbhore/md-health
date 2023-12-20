@extends('front.layout.layout2')
@section("content")

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    .video-div {
        height: 100px;
    width: 175px;
    margin-top: 15px;
    }
    .prev-img-div.video-card i{
        position: absolute;
    top: 50%;
    bottom: 50%;
    left: 50%;
    right: 50%;
    font-size: 45px;
    border-radius: initial;
    display: flex;
    align-items: center;
    justify-content: space-around;
    }
    .multiple-upload-images .preview-img {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }
    .multiple-upload-images .preview-img .prev-img-div img {
        height: 100px;
        width: 140px;
        object-fit: contain;
        margin-top: 15px;
    }
</style>

<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="row">
            <div class="col-md-3">
                @include('front.includes.sidebar')
            </div>
            <div class="col-md-9">
                <div class="card mb-4">
                    <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                        <span>Account</span>
                    </h5>
                    <div class="card-body">
                        <div class="form-div">
                            <form>
                                <div class="form-group mb-3">
                                    <label class="form-label">Company Name</label>
                                    <input type="text" class="form-control" id="foodname" aria-describedby="foodname" placeholder="Memorial Hospitals Ltd. Sti.">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Company Address</label>
                                    <input type="text" class="form-control" id="foodname" aria-describedby="foodname" placeholder="Company Full Address">
                                </div>

                                <div class="input-group mb-3 d-flex justify-content-between">
                                    <div class="form-group d-flex flex-column w-50 pe-2">
                                        <label class="form-label">Country</label>
                                        <select name="" id="">
                                            <option value="">India</option>
                                            <option value="">Turkey</option>
                                            <option value="">USA</option>
                                            <option value="">UAE</option>
                                        </select>
                                    </div>
                                    <div class="form-group d-flex flex-column w-50 ps-2">
                                        <label class="form-label">City</label>
                                        <select name="" id="">
                                            <option value="">Pune</option>
                                            <option value="">Instanbul</option>
                                            <option value="">Mumbai</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">TAX Number</label>
                                    <input type="text" class="form-control" id="foodname" aria-describedby="foodname" placeholder="TAX Number">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Authorized Person Full Name</label>
                                    <input type="text" class="form-control" id="foodname" aria-describedby="foodname" placeholder="Authorized Person Full Name">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Authorized Person Mobile Contact</label>
                                    <input type="text" class="form-control" id="foodname" aria-describedby="foodname" placeholder="+90">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Company Overview</label>
                                    <textarea class="form-control" id="productstext" rows="4" placeholder="" data-gramm="false" wt-ignore-input="true"></textarea>
                                </div>

                                <div class="multiple-upload-images">
                                    <h6 class="section-heading">Product Pictures</h6>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="images[]" multiple="">
                                    </div>
                                    <div class="preview-img gallery">
                                        <div class="prev-img-div video-card">
                                            <a href="{{('front/assets/img/homepage/ajooba_banner_video.mp4')}}" class="glightbox">
                                                <video class="video-div" >
                                                    <source src="https://projects.m-staging.in/ajooba_web_solution/storage/images/home/videos/1700845605H9oKC.mp4" type="video/mp4">
                                                </video>
                                                <i class="fa fa-play-circle"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="clear-btn">
                                                <div>X</div>
                                            </a>
                                        </div>
                                        <div class="prev-img-div">
                                            <a href="{{('front/assets/img/homepage/img-1.jpg')}}" class="glightbox">
                                                <img src="{{('front/assets/img/homepage/img-1.jpg')}}" alt="image" />
                                            </a>
                                            <a href="javascript:void(0);" class="clear-btn">
                                                <div>X</div>
                                            </a>
                                        </div>
                                        <div class="prev-img-div">
                                            <a href="{{('front/assets/img/homepage/img-2.jpg')}}" class="glightbox">
                                                <img src="{{('front/assets/img/homepage/img-2.jpg')}}" alt="image" />
                                            </a>
                                            <a href="javascript:void(0);" class="clear-btn">
                                                <div>X</div>
                                            </a>
                                        </div>
                                        <div class="prev-img-div">
                                            <a href="{{('front/assets/img/homepage/img-3.jpg')}}" class="glightbox">
                                                <img src="{{('front/assets/img/homepage/img-3.jpg')}}" alt="image" />
                                            </a>
                                            <a href="javascript:void(0);" class="clear-btn">
                                                <div>X</div>
                                            </a>
                                        </div>
                                        <div class="prev-img-div">
                                            <a href="{{('front/assets/img/homepage/img-1.jpg')}}" class="glightbox">
                                                <img src="{{('front/assets/img/homepage/img-1.jpg')}}" alt="image" />
                                            </a>
                                            <a href="javascript:void(0);" class="clear-btn">
                                                <div>X</div>
                                            </a>
                                        </div>
                                        <div class="prev-img-div">
                                            <a href="{{('front/assets/img/homepage/img-1.jpg')}}" class="glightbox">
                                                <img src="{{('front/assets/img/homepage/img-1.jpg')}}" alt="image" />
                                            </a>
                                            <a href="javascript:void(0);" class="clear-btn">
                                                <div>X</div>
                                            </a>
                                        </div>
                                        <div class="prev-img-div">
                                            <a href="{{('front/assets/img/homepage/img-1.jpg')}}" class="glightbox">
                                                <img src="{{('front/assets/img/homepage/img-1.jpg')}}" alt="image" />
                                            </a>
                                            <a href="javascript:void(0);" class="clear-btn">
                                                <div>X</div>
                                            </a>
                                        </div>
                                    </div>

                                </div>

                                <div class="section-btns mb-4">
                                    <a href="javascript:void(0);" class="black-plate bg-black text-white fw-700 w-100">Save Changes</a>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label fst-italic fsb-2">*Please make sure the photo/video meets the MDhealth policy.</label>
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
    $(".mpAccountLi").addClass("activeClass");
    $(".mpAccount").addClass("md-active");
</script>
<script type="text/javascript">
  const lightbox = GLightbox({ ...options });
</script>

@endsection