@extends('front.layout.layout2')
@section("content")

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<style>
    .multiple-checks{
        display: flex;
    flex-wrap: wrap;
    gap: 15px;
    }
    .multiple-checks .form-check {
    width: 185px;
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
                        <span>#MD3726378</span>
                        <a href="{{url('medical-packages')}}" class="d-flex align-items-center gap-1 text-decoration-none text-dark">
                            <img src="{{asset('front/assets/img/backPage.png')}}" alt="">
                            <p class="mb-0">Back Dashboard</p>
                        </a>
                    </h5>
                    <div class="card-body">
                        <div class="form-div">
                        <form>
                            <div class="form-group mb-3">
                                <label class="form-label">*Package Name</label>
                                <input type="text" class="form-control" id="foodname" aria-describedby="foodname" placeholder="Package Name">
                            </div>

                            <div class="form-group d-flex flex-column mb-3">
                                <label class="form-label">*Treatments Category</label>
                                <select name="" id="">
                                    <option value="">Treatments Category</option>
                                    <option value="">Treatments Category 2</option>
                                    <option value="">Treatments Category 3</option>
                                    <option value="">Treatments Category 4</option>
                                </select>
                            </div>

                            <div class="form-group d-flex flex-column mb-3">
                                <label class="form-label">*Treatments</label>
                                <select name="" id="">
                                    <option value="">Treatments</option>
                                    <option value="">Treatments 2</option>
                                    <option value="">Treatments 3</option>
                                    <option value="">Treatments 4</option>
                                </select>
                            </div>
                            
                            <div class="multiple-checkbox-div">
                                <div class="form-group d-flex flex-column mb-4">
                                    <label class="form-label">Other Services (Selectable)</label>
                                    <div class="multiple-checks">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="foraccomodition">
                                            <label class="form-check-label fw-500 fsb-1" for="foraccomodition">Accomodition</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="fortransportation">
                                            <label class="form-check-label fw-500 fsb-1" for="fortransportation">Transportation</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="fortour">
                                            <label class="form-check-label fw-500 fsb-1" for="fortour">Tour</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="fortranslation">
                                            <label class="form-check-label fw-500 fsb-1" for="fortranslation">Translation</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="forvisaservice">
                                            <label class="form-check-label fw-500 fsb-1" for="forvisaservice">Visa Services</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="forticketservice">
                                            <label class="form-check-label fw-500 fsb-1" for="forticketservice">Ticket Services</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="forambulanceservice">
                                            <label class="form-check-label fw-500 fsb-1" for="forambulanceservice">Ambulance Services</label>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="form-group mb-3">
                                <h6 class="section-heading">Treatment Period in Days</h6>
                                <input type="text" class="form-control" id="foodname" aria-describedby="foodname" placeholder="1-3 Days">
                            </div>
                            
                            <div class="form-group d-flex flex-column">
                                <h6 class="section-heading">Treatment Price</h6>
                                <label class="form-label">Treatment Price  (VAT Included Price) </label>
                                <div class="input-icon-div mb-3">
                                    <input type="text" class="form-control" placeholder="Treatment Price">
                                    <span class="input-icon">₺</span>
                                </div>
                            </div>
                            
                            <div class="form-group d-flex flex-column mb-3">
                                <h6 class="section-heading">Acommodition Details</h6>
                                <label class="form-label">Hotel Name</label>
                                <select name="" id="">
                                    <option value="">Choose Hotel</option>
                                    <option value="">Choose Hotel 2</option>
                                    <option value="">Choose Hotel 3</option>
                                    <option value="">Choose Hotel 4</option>
                                </select>
                            </div>
                            
                            <div class="date-picker-div">
                                <label class="form-label">Reservation Date</label>
                                <div class="date-picker-card-div">
                                    <div class="date-picker-card">
                                        <input type="text" id="from" placeholder="in" />
                                    </div>
                                    <div class="date-picker-card">
                                    <input type="text" id="to" placeholder="out" />
                                    </div>
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

@section('script')
<script>
    $(".mpPackagesLi").addClass("activeClass");
    $(".mpPackages").addClass("md-active");
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script>
  // function to adjust minDate +/-
    function modifyMinMaxDate(date, days) {
    var tempDate = date;
    tempDate.setDate(tempDate.getDate() + days);
    return tempDate;
    }

    $(function() {
    var dateFormat = "mm/dd/yy",
        from = $("#from").datepicker({
        defaultDate: "-2w",
        changeMonth: true,
        changeYear: true,
        maxDate: "-1",
        onClose: function(selectedDate) {
            $("#to").datepicker(
            "option",
            "minDate",
            modifyMinMaxDate(new Date(selectedDate), 1)
            );
        }
        }),
        to = $("#to").datepicker({
        defaultDate: "-1w",
        changeMonth: true,
        changeYear: true,
        maxDate: "0",
        onClose: function(selectedDate) {
            $("#from").datepicker(
            "option",
            "maxDate",
            modifyMinMaxDate(new Date(selectedDate), -1)
            );
        }
        });
    });

  </script>
@endsection