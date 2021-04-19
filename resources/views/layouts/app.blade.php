<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>First Day</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        a:hover{
            text-decoration: none;
        }

        .geeks::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: grey;
            animation: animate 5s linear infinite;
        }

        @keyframes animate {
            0% {
                left: 0;
            }

            50% {
                left: 100%;
            }

            0% {
                left: 0;
            }
        }
    </style>
</head>
<body>
    <div id="app">
        @yield('content')
    </div>
</body>
</html>
