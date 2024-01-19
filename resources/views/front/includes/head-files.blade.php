<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FavIcon -->
    <link rel="shortcut icon" href="{{ URL::asset('admin/assets/img/FavIcon.svg') }}" type="image/x-icon">

    <!-- MDI Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">
    <!-- RemixIcon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- Simplebar Scrollbar -->
    <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ URL::asset('front/assets/css/waves.min.css') }}">

    <!-- Nice Select -->
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <!-- GLightbox -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ URL::asset('front/assets/css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{URL::asset('front/assets/css/responsiveStyles.css')}}"> --}}

    <link rel="stylesheet" href="{{ URL::asset('admin_panel/js/jquery.toast.min.css') }}">
    

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- Md Booking --}}
    <link rel="stylesheet" href="{{ URL::asset('front/assets/css/md-booking.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/datepicker-js@latest/datepicker.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::asset('front/assets/css/md-food.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- JQuery And Validation -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script> --}}

    <!-- JQuery And Validation -->


    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.1/dist/css/datepicker-bs5.min.css"> -->
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <!-- DATE-PICKER -->
    <link href="{{ URL::asset('front/assets/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Semantic UI -->
    <link href="{{ URL::asset('front/assets/css/semantic.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/base.min.css" /> -->

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" /> -->

    <title>MDhealth</title>

    <style>
        .error {
            color: #F31D1D;
            font-size: 14px;
        }
    </style>

    <!-- <link rel="stylesheet" href="{{ URL::asset('admin_panel/js/jquery.toast.min.css') }}"> -->

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> --}}

<!-- Place the first-->
<script src="https://cdn.tiny.cloud/1/bjb2ddu6e56m3tkx46k66z7gvds3q7lpwsrg7s0jz38d39i9/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />



<script>
    @if(Session::has('success'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
    }
    toastr.success("{{ session('success') }}");
    @endif

    @if(Session::has('error'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
    }
    toastr.error("{{ session('error') }}");
    @endif
</script>

<script>
    function success_toast(title = '', message = '') {
        $.toast({
            heading: title,
            text: message,
            icon: 'success',
            loader: true, // Change it to false to disable loader
            loaderBg: '#9EC600', // To change the background,
            position: "bottom-right"
        });
    }

    function fail_toast(title = '', message = '') {
        $.toast({
            heading: title,
            text: message,
            icon: 'error',
            loader: true, // Change it to false to disable loader
            loaderBg: '#9EC600', // To change the background,
            position: "bottom-right"
        });
    }
</script>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script> --}}

<body>
    <input type="hidden" value="{{ url('/') }}" id="base_url" />