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

    <!-- Sidebar CSS -->
    <link rel="stylesheet" href="{{URL::asset('admin/assets/css/sidebar.css')}}">

    <!-- Nice Select -->
    <link rel="stylesheet" href="{{URL::asset('admin/assets/css/nice-select.css')}}">

    <link rel="stylesheet" href="{{ URL::asset('admin/commonarea/dist/css/jquery.datatables.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('admin/commonarea/plugins/dataTables/fixedHeader.dataTables.min.css')}}">

    

    <!-- GLightbox -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{URL::asset('admin/assets/css/style.css')}}">

    <link rel="stylesheet" href="{{ URL::asset('admin_panel/js/jquery.toast.min.css') }}">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ URL::asset('admin/js/jquery.toast.min.css') }}">


    <title>MDhealth | Admin</title>

</head>

<body>
    <input type="hidden" value="{{url('/')}}" id="base_url" />