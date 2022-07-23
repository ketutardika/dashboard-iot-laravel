<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body>
    <div class="main-wrapper">
    <!-- partial:partials/_sidebar.html -->
     @include('layouts.nav-sidebar')
    <!-- partial -->

      <div class="page-wrapper">
        <!-- partial:partials/_navbar.html -->
          @include('layouts.nav-header')
        <!-- partial -->
        <div class="page-content">
          @yield('content')
        </div>

        <!-- partial:partials/_footer.html -->
        @include('layouts.footer')
        <!-- partial -->
        
        </div>
    </div>

    <!-- Plugin js for this page -->
    @include('layouts.plugin-js')
    <!-- End custom js for this page -->
</body>
</html>
