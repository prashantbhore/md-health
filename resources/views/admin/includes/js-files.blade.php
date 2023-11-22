<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="{{URL::asset('admin/assets/js/nice-select.min.js')}}"></script>

<script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<!-- GLightbox -->
<script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>

<!-- Sidebar JS -->
<script src="{{URL::asset('admin/assets/js/sidebar.js')}}"></script>

<script>
    $(document).ready(function() {
        $('select').niceSelect();
    });
</script>

<script type="text/javascript">
    const lightbox = GLightbox({
        touchNavigation: true,
        // loop: true,
        autoplayVideos: true
    });
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