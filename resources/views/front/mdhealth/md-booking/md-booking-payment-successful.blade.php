@extends('front.layout.layout')
@section('content')
    <div class="">
        <div class=" container shadow-lg mt-5 mb-5 bg-body rounded">
            <div class="row">
                <div class="col  border-end payment-h d-flex justify-content-center align-items-center vehicle-p3 ">Equipment
                </div>
                <div class="col  border-end payment-h d-flex justify-content-center align-items-center vehicle-p3">Injection
                    & Influsion</div>
                <div class="col  border-end payment-h d-flex justify-content-center align-items-center vehicle-p3">Emergency
                    & First Aid</div>
                <div class="col  border-end payment-h d-flex justify-content-center align-items-center vehicle-p3">Hygiene &
                    Disinfection</div>
                <div class="col  border-end payment-h d-flex justify-content-center align-items-center vehicle-p3">
                    Instruments</div>
                <div class="col-1 border-end payment-h d-flex justify-content-center align-items-center vehicle-p3">More
                </div>
            </div>
        </div>

        <div class="container mt-5 d-flex justify-content-center align-items-center gap-4 flex-column ">
            <div class="">
                <img src="{{ 'front/assets/img/mdBookings/Varlık 4@.png' }}" alt="" class="">
            </div>
            <p class="payment-p1">Your payment has been completed successfully</p>
            <p class="">
                <img src="{{ 'front/assets/img/mdBookings/Group 11.png' }}" alt="" class="">
            </p>
            <p class="payment-p2"><span class="">Your order no</span><span class="green-color">#MD892</span></p>
            <p class="payment-p3">You can go to the <ins class="fw-bold">"Order"</ins> page or the <ins class="fw-bold">Home Page</ins> to see  your reservation.</p>
        </div>
        <div class="md-food-view-footer">
            <img src="{{ 'front/assets/img/appScreenFooter.png' }}" alt="" class="footer-image mt-5">
        </div>
    </div>
@endsection
