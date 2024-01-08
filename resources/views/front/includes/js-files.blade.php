<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{ URL::asset('admin/assets/js/nice-select.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
<!-- DATE-PICKER JS -->
<script src="{{ URL::asset('front/assets/js/bootstrap-datepicker.min.js') }}"></script>
<!-- GLightbox -->
<script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>

<!-- Sidebar JS -->
<script src="{{ URL::asset('admin/assets/js/sidebar.js') }}"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> --}}
<script src="{{ URL::asset('admin_panel/js/jquery.toast.min.js') }}"></script>
{{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> --}}
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


<script src="{{ URL::asset('admin\js\common\common_function.js') }}"></script>

<script src="{{ URL::asset('admin\js\validations\common\common.js') }}"></script>

<script src="{{ URL::asset('front/assets/js/semantic.min.js') }}"></script>



<script src="{{ URL::asset('admin\js\validations\common\common.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/datepicker-js@latest/datepicker.min.js"></script>
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> -->

<!-- Datepicker -->
<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js"></script>

<script src="https://cdn.tiny.cloud/1/bjb2ddu6e56m3tkx46k66z7gvds3q7lpwsrg7s0jz38d39i9/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>



<script>
    $(document).ready(function() {
        $('select').niceSelect();
    });

    $('.ui.dropdown')
        .dropdown();
</script>

<script>
    var swiper = new Swiper(".mySwiper", {
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>

<script>
    var titleElement = document.getElementById("example_filter");
    var titleChildren = titleElement.getElementsByTagName("label");

    // Do something with children.
    // In your example code, you'll only have one element returned
    console.log(titleChildren[0].innerHTML);

    // To change the text, simply access the innerHTML property
    titleChildren[0].innerHTML = " ";
</script>

<script type="text/javascript">
    const lightbox = GLightbox({
        touchNavigation: true,
        // loop: true,
        autoplayVideos: true
    });
</script>

<!-- COPY TO CLIPBOARD -->
<script>
    function copyToClipboard() {
        var textBox = document.getElementById("ibanNo");
        textBox.select();
        document.execCommand("copy");
    }
</script>


<noscript>
    <style>
        /**
    * Reinstate scrolling for non-JS clients
    */
        .simplebar-content-wrapper {
            scrollbar-width: auto;
            -ms-overflow-style: auto;
        }

        .simplebar-content-wrapper::-webkit-scrollbar,
        .simplebar-hide-scrollbar::-webkit-scrollbar {
            display: initial;
            width: initial;
            height: initial;
        }
    </style>
</noscript>








<script>
    @if (Session::has('success'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
        }
        toastr.success("{{ session('success') }}");
    @endif

    @if (Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
        }
        toastr.error("{{ session('error') }}");
    @endif
</script>


{{--
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



<script>
  var base_url = $("#base_url").val();
</script> --}}
