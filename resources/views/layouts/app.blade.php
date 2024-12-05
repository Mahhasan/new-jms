<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'NEW-JMS') }}</title>
        <!-- Scripts (Fonts)-->
        <!-- @vite(['resources/css/app.css']) -->
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/vendors/ti-icons/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">
        <link rel="stylesheet" href="{{asset('admin/vendors/font-awesome/css/font-awesome.min.css')}}">
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{asset('admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
        <!-- Layout styles -->
        <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{asset('admin/images/favicon.png')}}" />
    </head>
    <body>
        <div class="container-scroller">
            <!-- Header -->
            @include('layouts.navbar')
            <div class="container-fluid page-body-wrapper">
                <!-- Sidebar -->
                @include('layouts.Sidebar')
                <div class="main-panel">
                    <!-- Main Content -->
                    @yield('content')
                    <!-- Footer -->
                    @include('layouts.footer')
                </div>
            </div>
        </div>
        <!-- Logout Confirmation Modal -->
        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to log out? Your session will be ended.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <!-- Confirm Logout Button -->
                        <button type="button" class="btn btn-primary" id="logoutConfirmBtn">Logout</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- plugins:js -->
        <script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
        <!-- Plugin js for this page -->
        <script src="{{asset('admin/vendors/chart.js/chart.umd.js')}}"></script>
        <script src="{{asset('admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
        <!-- inject:js -->
        <script src="{{asset('admin/js/off-canvas.js')}}"></script>
        <script src="{{asset('admin/js/misc.js')}}"></script>
        <script src="{{asset('admin/js/settings.js')}}"></script>
        <script src="{{asset('admin/js/todolist.js')}}"></script>
        <script src="{{asset('admin/js/jquery.cookie.js')}}"></script>
        <!-- Custom js for this page -->
        <script src="{{asset('admin/js/dashboard.js')}}"></script>
        <!-- Script for logout popup -->
        <script>
            document.getElementById('logoutConfirmBtn').addEventListener('click', function () {
            // Submit the logout form when the user confirms
                document.getElementById('logout-form').submit();
            });
        </script>
    </body>
</html>
