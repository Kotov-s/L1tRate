<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>L1tRate</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        @media only screen and (max-width: 600px) {
            .home-link {
                font-size: 16px;
                font-weight: 700;
                /* align-items: center; */
                color: #1e1b2d;
            }

            .search-wrapper {
                min-width: 10px;
                max-width: 80%;
            }

            .auth-card {
                width: 100%;
            }

            .search-wrapper {

                display: block;
                padding-right: 0px;
            }

        }
    </style>
</head>

<body>
    @include('_menu-bar')

    @yield('content')
</body>

</html>
