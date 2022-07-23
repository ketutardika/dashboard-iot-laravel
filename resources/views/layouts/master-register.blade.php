<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head-register')
@livewireStyles
<body>

    <div class="main-wrapper">
    <div class="page-wrapper full-page">
      <div class="page-content d-flex align-items-center justify-content-center">
        <div class="container">

        <livewire:registration>
        @yield('content')

        </div>
      </div>
    </div>
  </div>

    <!-- Plugin js for this page -->
    @include('layouts.footer-register')
    @livewireScripts
    <!-- End custom js for this page -->
</body>
</html>
