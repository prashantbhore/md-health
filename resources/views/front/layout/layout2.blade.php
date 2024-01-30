@include('front.includes.head-files')
@include('front.includes.navbar2')
@include('front.includes.js-notification')
{{-- @include('resources.js.bootstrap.js') --}}

@yield('content')

@include('front.includes.footer2')
@include('front.includes.js-files')

@yield('script')

</body>

</html>