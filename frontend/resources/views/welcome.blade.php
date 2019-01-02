<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href={{ mix('css/app.css') }}>
    </head>
    <body>
        <div id="app" class="flex-center position-ref full-height">
            <example-component></example-component>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>
                <div>
                    @if (session('message'))
                <p>{{ session('message') }}</p>
                    @endif
                </div>
            </div>
        </div>
        <script src={{ mix('js/app.js') }}></script>
        <script src={{ mix('js/manifest.js') }}></script>
        <script src={{ mix('js/vendor.js') }}></script>
    </body>
</html>
