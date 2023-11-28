@include('admin.includes.head-files')
@include('admin.includes.navbar')

<main class="sidebar-menu">

    @include('admin.includes.sidebar')
</main>
@yield('content')


@include('admin.includes.footer')
@include('admin.includes.js-files')

@yield('script')

</body>

</html>