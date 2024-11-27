<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'NEW-JMS') }}</title>
        <!-- Scripts (Fonts)-->
        @vite(['resources/css/app.css'])
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/vendors/ti-icons/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">
        <link rel="stylesheet" href="{{asset('admin/vendors/font-awesome/css/font-awesome.min.css')}}">
        <!-- Layout styles -->
        <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{asset('admin/images/favicon.png')}}" />
    </head>
    <body>

        @yield('content')

        <!-- plugins:js -->
        <script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
        <!-- inject:js -->
        <script src="{{asset('admin/js/off-canvas.js')}}"></script>
        <script src="{{asset('admin/js/misc.js')}}"></script>
        <script src="{{asset('admin/js/settings.js')}}"></script>
        <script src="{{asset('admin/js/todolist.js')}}"></script>
        <script src="{{asset('admin/js/jquery.cookie.js')}}"></script>
        <!-- Custom js for this page -->
        <script src="{{asset('admin/js/dashboard.js')}}"></script>
    </body>
</html>
