<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BustleBus') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.typekit.net/map2pqt.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.3/css/line.css">
    <!-- <i class="uim uim-map-pin"></i> -->

    <style>
        .rcorners2 {
            border-radius: 15px;
            border: 2px solid #444444;
            padding: 10px;
            margin: 10px;
            width: 10%;
        }

        body {
            background-color: #98CCE7;
        }
    </style>
</head>



<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <div class="jumbotron min-vh-100 text-center m-0 d-flex flex-column justify-content-center">
                    <h1 class="display-4 tk-carlmarx">Welcome to BustleBus</h1>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg tk-carlmarx rcorners2" href="{{ route('login') }}" role="button">Client Login</a>
                        <a class="btn btn-primary btn-lg tk-carlmarx rcorners2" href="{{ route('adminlogin') }}" role="button">Admin Login</a>
                        <a class="btn btn-primary btn-lg tk-carlmarx rcorners2" href="{{ route('hrlogin') }}"role="button">Human Resources Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>