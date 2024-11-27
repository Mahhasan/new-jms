
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'JMS') }}</title>
        <!-- Scripts (Fonts)-->
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/sass/app.scss'])
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {
                background-color: #fff;
                font-family: 'Nunito', sans-serif;
            }

            .full-height {
                height: 100vh;
            }

            .title {
                font-size: 84px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid d-flex flex-column justify-content-center align-items-center full-height">
            @if (Route::has('login'))
                <div class="position-absolute top-0 end-0 p-3">
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-link">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-link">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-link">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="text-center">
                <div class="title m-b-md">
                    DIU JOURNAL
                </div>
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-link">DIUJAHS</a>
                    <a href="#" class="btn btn-link ms-3">DIUJBE</a>
                    <a href="#" class="btn btn-link ms-3">DIUJHSS</a>
                    <a href="#" class="btn btn-link ms-3">DIUJST</a>
                </div>
            </div>
        </div>
    </body>
</html>
