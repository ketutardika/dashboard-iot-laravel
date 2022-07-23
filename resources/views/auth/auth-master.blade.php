<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body>

    @yield('content')


<!-- Plugin js for this page -->
@include('layouts.plugin-js')
<!-- End custom js for this page -->
<!-- End custom js for this page -->
</body>
</html>
