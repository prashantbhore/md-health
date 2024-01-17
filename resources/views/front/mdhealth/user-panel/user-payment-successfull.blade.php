@extends('front.layout.layout2')
@section('content')
    <div class="content-wrapper paymentsPage bg-f6">

        <!-- SECTION 1 -->
        <div class="searchBar backBtn bg-f6">
            <div class="container pt-4">
                <div class="d-flex flex-column align-items-center gap-4 py-5">
                    <img src="{{ 'front/assets/img/Varlik.svg' }}" alt="" style="width: 100px;">
                    <p class="mb-0 fs-5 camptonBold lh-base">Your payment has been completed successfully</p>
                    <img src="{{ 'front/assets/img/ArrowsDown.png' }}" alt="" class="mb-3">
                    <p class="mb-0 fs-6 camptonBold lh-base">Your order no <span class="text-green">#MD829</span></p>
                    <p class="vSmallFont camptonBook fw-bold">You can go to the "<span
                            id="go_to_packages"class="camptonBold"><u>Packages</u></span>" page or to the <span
                            id="go_to_home"class="camptonBold"><u>Home Page</u></span> to see your reservations.</p>
                </div>
            </div>
        </div>

        <!-- SECTION 3 -->
        <div class="bg-f6 scanQr">
            <img src="{{ 'front/assets/img/appScreenFooter.png' }}" alt="">
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#go_to_packages').click(function() {
                window.location.href = "{{ url('/my-packages-list') }}"
            });
            $('#go_to_home').click(function() {
                window.location.href = "{{ url('/') }}"
            });
        });
    </script>
@endsection
