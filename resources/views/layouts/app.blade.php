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

</head>
<style>
    body {
        background-color: #98CCE7;
    }

    .navbar {
        background: #3F4F88;
    }

    .card {
        font-size: 1.1em;
    }

    .card-body {
        background: #F8F8F8;
    }

    .modal-content {
        background: #F8F8F8;
    }

    .rcorners2 {
        border-radius: 15px;
        border: 2px solid #444444;
        padding: 11px;
        margin: 10px;
    }

    span {
        font-size: 1.15em;
    }
</style>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow">
            <div class="container" id="nav">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h2 class="tk-carlmarx" style="color: #F8E78F;"><strong>BustleBus</strong></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" style="color: #F8E78F;" href="{{ route('login') }}">
                                <h3 class="tk-carlmarx"> {{ __('Login') }} </h3>
                            </a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" style="color: #F8E78F;" href="{{ route('register') }}">
                                <h3 class="tk-carlmarx">{{ __('Register') }}</h3>
                            </a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle tk-carlmarx" style="color: #F8E78F; font-size: 1.5em;" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <h3 class="tk-carlmarx">{{ __('Logout') }}</h3>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>