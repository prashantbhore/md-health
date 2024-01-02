<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- FavIcon -->
  <link rel="shortcut icon" href="{{URL::asset('admin/assets/img/FavIcon.svg')}}" type="image/x-icon">

  <!-- Simplebar Scrollbar -->
  <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css" />

  <!-- RemixIcon -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Nice Select -->
  <link rel="stylesheet" href="{{URL::asset('admin/assets/css/nice-select.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

  <!-- GLightbox -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{URL::asset('front/assets/css/style.css')}}">

  <link rel="stylesheet" href="{{ URL::asset('admin_panel/js/jquery.toast.min.css') }}">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  {{-- Md Booking --}}
  <link rel="stylesheet" href="{{URL::asset('front/assets/css/md-booking.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/datepicker-js@latest/datepicker.min.css" rel="stylesheet">

  <link rel="stylesheet" href="{{URL::asset('front/assets/css/md-food.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- jQuery Validate -->
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

  
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.1/dist/css/datepicker-bs5.min.css"> -->
  <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

  <title>MDhealth</title>

  <style>
    .error {
      color: red !important;
      font-size: 14px !important;
    }
  </style>

  <link rel="stylesheet" href="{{ URL::asset('admin_panel/js/jquery.toast.min.css') }}">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


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

<body>
  <input type="hidden" value="{{url('/')}}" id="base_url" />