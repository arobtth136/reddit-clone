<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    @yield('styles')
</head>
<body>
<div id="app">
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="{{route('home')}}" class="brand-logo">Reddit</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    @guest
                        <li><a href="{{route('login')}}">Login</a></li>
                        <li><a href="{{route('register')}}">Register</a></li>
                    @else
                        <li><a href="{{route('user', ['user' => Auth::id()])}}">Mi perfil</a></li>
                        <li><a href="{{route('logout')}}">Cerrar sesión</a></li>
                    @endauth
                </ul>
            </div>
        </nav>
    </div>
    <div class="container">
        @yield('content')
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
@yield('scripts')
</body>
</html>
