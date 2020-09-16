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
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{asset('/img/logo.png')}}" alt="profile Pic" class="logo">

            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">{{ __('INICIO') }} | </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">{{ __('DISCIPLINAS') }} | </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">{{ __('CONTACTO') }} | </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">{{ __('CAMPUS') }} </a>
                    </li>
                    <!-- Authentication Links -->
                    @guest
                        <!--<li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>-->
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
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
    <footer>
        <div class="footer-page">
            <div class="row">
                <div class="offset-md-1 col-md-4">
                    <img src="{{asset('/img/logo-blanco.png')}}" alt="profile Pic" class="logo">
                    <ul class="menu-datos">
                        <li><i class="fas fa-phone-volume"></i> +(51)991 892 397</li>
                        <li><i class="fas fa-map-marker"></i> Calle Alcanfores 140 Oficina 606 Miraflores, Lima, Peru</li>
                        <li><i class="fas fa-envelope"></i> info@latamcoachingnetwork.com</li>
                    </ul>
                </div>
                <div class="col-md-6">
                <ul class="menu-footer">
                    <li>CLASES DE ARTES MARCIALES</li>
                    <li>Karate</li>
                    <li>Muay Thai</li>
                </ul>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
