@include('front.includes.head-files')
@include('front.includes.navbar')
@include('front.includes.js-notification')  


@yield('content')


@include('front.includes.footer')
@include('front.includes.js-files')

@yield('script')

</body>

</html>