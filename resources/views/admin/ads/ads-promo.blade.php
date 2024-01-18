@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="container2 pb-5">
        <div class="page-title">Ads & Promo</div>
        <div class="row top-cards">
            <div class="col-md-5">
                <div class="card card-details ads">
                    <div class="card-body">
                        <div class="card-title">New Promo</div>
                        <div class="row">

                           
                            <form method="post" action="{{route('store.ads')}}" id="ads-form" enctype="multipart/form-data">
                                @csrf
                            <input type="hidden" name="id" value="{{!empty($edit_data->id)?$edit_data->id:""}}">
                            <div class="col-md-12 mb-3">
                                <label for="*Choose Page" class="mb-2">*Choose Page</label>
                                <select name="page_name" id="choosePage" class="form-select">
                                    <option value="" selected>Select Page</option>
                                    <option value="MDhealth Home Page Advertise Area" {{ !empty($edit_data->ads_for_page) && ($edit_data->ads_for_page == 'MDhealth Home Page Advertise Area') ? 'selected' : '' }}>MDhealth Home Page Advertise Area</option>
                                    <option value="Home Service Advertise Area" {{ !empty($edit_data->ads_for_page) && ($edit_data->ads_for_page == 'Home Service Advertise Area') ? 'selected' : '' }}>Home Service Advertise Area</option>
                                    <option value="MDfood Advertise Area" {{ !empty($edit_data->ads_for_page) && ($edit_data->ads_for_page == 'MDfood Advertise Area') ? 'selected' : '' }}>MDfood Advertise Area</option>
                                    <option value="MDbooking Advertise Area" {{ !empty($edit_data->ads_for_page) && ($edit_data->ads_for_page == 'MDbooking Advertise Area') ? 'selected' : '' }}>MDbooking Advertise Area</option>
                                    <option value="MDbooking Flight Advertise Area" {{ !empty($edit_data->ads_for_page) && ($edit_data->ads_for_page == 'MDbooking Flight Advertise Area') ? 'selected' : '' }}>MDbooking Flight Advertise Area</option>
                                    <option value="MDbooking Hotel Advertise Area" {{ !empty($edit_data->ads_for_page) && ($edit_data->ads_for_page == 'MDbooking Hotel Advertise Area') ? 'selected' : '' }}>MDbooking Hotel Advertise Area</option>
                                </select>
                                
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="*Time" class="mb-2 d-block">Date </label>
                                <input type="text" name="date" value="{{!empty($edit_data->date)?$edit_data->date:''}}" class="form-control"/>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="MDhealth URL" class="mb-2">Ad URL</label>
                                <input type="text" name="url" value="{{!empty($edit_data->ads_url)?$edit_data->ads_url:''}}" class="form-control" placeholder="URL">

                            </div>

                        
                            <div class="col-md-12 mb-3">
                                <label for="*Upload Advertise" class="mb-2 d-block">*Upload Advertise</label>
                                
                                <div class="d-flex align-items-end gap-2">
                                    <div class="image-upload">
                                        <label for="file-input" style="cursor:pointer">
                                            <img id="image-preview" src="{{!empty($edit_data->ads_image_path)?url('/').Storage::url($edit_data->ads_image_path):(URL::asset('admin/assets/img/uploadHere.png'))}}" alt="Upload Image Preview" />
                                        </label>
                                        <input id="file-input" name="ads_image" type="file" onchange="previewImage(this)" accept="image/*" />
                                    </div>
                                    <p class="upload-file-text">*Please upload 1066x223px picture.</p>
                                </div>
                            </div>

                         

                            <div class="col-md-12 mb-3">
                                <div class="d-flex flex-wrap gap-3 ">
                                    <button type="submit" name="promo_status" value="publish" class="btn md-btn save-btn">Publish Promo</button>
                                    <button type="submit" name="promo_status" value="schedule" class="btn md-btn deactivate-btn">Schedule Promo</button>
                                </div>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 promo">
                
                <div class="card card-details">
                    <div class="card-body">
                        <div class="mb-3 d-flex align-items-center justify-content-between w-full filters">
                            <p class="card-title">Ads & Promo History</p>
                            <form action="{{ route('filter.ads')}}" method="get">
                                <select class="form-select form-select-sm w-25" name="filter" id="filter" onchange="this.form.submit()">
                                    <option value="all" {{ $filter === 'all' ? 'selected' : '' }}>All</option>
                                    <option value="publish" {{ $filter === 'publish' ? 'selected' : '' }}>Published</option>
                                    <option value="schedule" {{ $filter === 'schedule' ? 'selected' : '' }}>Scheduled</option>
                                </select>
                          </form>
                      </div>
                        <div class="row">

                            @if(!$ads->isEmpty())
                             @foreach($ads as $ads_data)
                             <div class="col-md-12 mb-3">
                                <div class="card shadow-none">
                                    <div class="card-body d-flex align-items-center w-full justify-content-between" style="background: #F6F6F6;">
                                        <div class="d-flex gap-2">
                                            <img src="{{!empty($ads_data->ads_image_path)?url('/').Storage::url($ads_data->ads_image_path):''}}" alt="" height="60px" width="60px">



                                            <div class="d-flex flex-column">
                                                <h4 class="mb-0">{{!empty($ads_data->ads_for_page)?$ads_data->ads_for_page:''}}</h4>
                                                <p class="fw-bold">Date : <span class="fw-light">{{!empty($ads_data->date)?$ads_data->date:''}}</span></p>
                                                <a href="{{!empty($ads_data->ads_url)?$ads_data->ads_url:''}}"><p class="fw-bold">{{!empty($ads_data->ads_url)?$ads_data->ads_url:''}}</p></a>
                                            </div>
                                        </div>
                                        @if(!empty($ads_data->promo_status) &&$ads_data->promo_status=='publish')
                                          <div class="completed">Published</div>
                                        @endif

                                       
                                        @if(!empty($ads_data->promo_status)&&$ads_data->promo_status=='schedule')
                                          <div class="deleted">Scheduled</div>
                                        @endif

                                        <div class="d-flex gap-2 actionText">
                                            <div class="d-flex flex-column gap-1">
                                                <a href="{{url('admin/ads-edit/'.Crypt::encrypt($ads_data->id))}}">
                                                    <img src="{{URL::asset('admin/assets/img/editEntry.png')}}" alt="">
                                                </a>
                                                <p>Edit</p>
                                            </div>

                                            <div class="d-flex flex-column gap-1">
                                                <a href="{{url('admin/ads-delete/'.Crypt::encrypt($ads_data->id))}}">
                                                    <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                                </a>
                                                <p>Delete</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                            @else
                            <h1>No Ads or Promo Found</h1>
                            @endif



{{--                            
                            <div class="card shadow-none">
                                    <div class="card-body d-flex align-items-center w-full justify-content-between" style="background: #F6F6F6;">
                                        <div class="d-flex gap-2">
                                            <img src="{{URL::asset('admin/assets/img/productsPic.png')}}" alt="">
                                            <div class="d-flex flex-column">
                                                <h4 class="mb-0">Home Service Advertise Area</h4>
                                                <p class="fw-bold">Date : <span class="fw-light">25 Dec 2023 - 25 Jan 2024</span></p>
                                                <a href="#"><p class="fw-bold">Redirection URL</p></a>
                                            </div>
                                        </div>
                                        <div class="deleted">Deactived</div>

                                        <div class="d-flex gap-2 actionText">
                                            <div class="d-flex flex-column gap-1">
                                                <a href="#">
                                                    <img src="{{URL::asset('admin/assets/img/editEntry.png')}}" alt="">
                                                </a>
                                                <p>Edit</p>
                                            </div>

                                            <div class="d-flex flex-column gap-1">
                                                <a href="#">
                                                    <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                                </a>
                                                <p>Delete</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}




                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
@section('script')
<script src="{{url('admin\controller_js\admin_cn_ads.js')}}"></script>
<script>
    $(".adsLi").addClass("activeClass");
    $(".ads").addClass("md-active");
    $('.drp-buttons .applyBtn').removeClass('btn-primary');
</script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $(function () {
        $('input[name="date"]').daterangepicker({
            opens: 'left',
            singleDatePicker: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        }, function (start, end, label) {});
    });
</script>

<script>
    function previewImage(input) {
        var fileInput = input.files[0];

        if (fileInput) {
            var reader = new FileReader();

            reader.onload = function (e){
                document.getElementById('image-preview').src = e.target.result;
            };

            reader.readAsDataURL(fileInput);
        }
    }
</script>

@endsection