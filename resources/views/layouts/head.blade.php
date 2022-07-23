<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" >
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->

    <!-- Layout styles --> 
    @if (get_setting('theme') == 'dark')
    <link rel="stylesheet" href="{{ asset('assets/css/demo2/style.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('assets/css/demo1/style.css') }}">
    @endif
    <!-- End layout styles -->

    <!-- Layout styles -->  
    <link rel="stylesheet" href="{{ asset('assets/css/style-custom.css') }}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.pngaassets/images/favicon.png') }}" />
</head>