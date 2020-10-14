<?php
use Illuminate\Support\Facades\DB;
?>
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
    <script src="{{ asset('js/form-validation.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/w3.css')}}" rel="stylesheet">
    <link href="{{ asset('css/form-validation.css')}}" rel="stylesheet">
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#"  id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="disciplina">
                            {{ __('DISCIPLINAS') }}
                        </a>
                        <div class="dropdown-menu dropright" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item dropdown-toggle" href="#"  id="submenu" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="karate()">
                                {{ __('Karate') }}
                            </a>
                            <div class="dropdown-menu submenu1" aria-labelledby="submenu">
                                <a class="dropdown-item" href="{{ route('karatebasico') }}">{{ __('Karate Basico') }}</a>
                                <a class="dropdown-item" href="{{ route('karateintermedio') }}">{{ __('Karate Intermedio') }}</a>
                                <a class="dropdown-item" href="{{ route('karateavanzado') }}">{{ __('Karate Avanzado') }}</a>
                            </div>
                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item dropdown-toggle" href="#"  id="submenu2" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="muaythai()">
                                {{ __('Muay Thai') }}
                            </a>
                            <div class="dropdown-menu submenu2" aria-labelledby="submenu2">
                                <a class="dropdown-item" href="#">{{ __('Muay Thai Basico') }}</a>
                                <a class="dropdown-item" href="#">{{ __('Muay Thai Intermedio') }}</a>
                                <a class="dropdown-item" href="#">{{ __('Muay Thai Avanzado') }}</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">| {{ __('CONTACTO') }} | </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">{{ __('CAMPUS') }} |</a>
                    </li>

                    @guest
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#"  id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropleft" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('login') }}"  id="submenu" role="button" aria-haspopup="true"
                               aria-expanded="false">Iniciar sesión
                            </a>
                            @if (Route::has('register'))
                            <a class="dropdown-item" href="{{ route('register') }}"  id="submenu" role="button" aria-haspopup="true"
                               aria-expanded="false">Registrarse
                            </a>
                            @endif
                        </div>
                    </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Hola {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart') }}">| <i class="fa fa-shopping-cart"></i>
                            <span class="badge badge-light">
                                 @guest
                                     <?php
                                    $cantidad = DB::table('product_shopping_cart')
                                    ->select(DB::raw('SUM(product_shopping_cart.cantidad) as cant_prod'))
                                    ->join('shopping_cart', 'product_shopping_cart.fk_shopping_cart', '=', 'shopping_cart.id')
                                    ->where('shopping_cart.fk_usuario', '=', null)
                                    ->first();
                                    echo $cantidad->cant_prod
                                     ?>
                                @else
                                   <?php
                                $cantidad = DB::table('product_shopping_cart')
                                    ->select(DB::raw('SUM(product_shopping_cart.cantidad) as cant_prod'))
                                    ->join('shopping_cart', 'product_shopping_cart.fk_shopping_cart', '=', 'shopping_cart.id')
                                    ->join('users', 'shopping_cart.fk_usuario', '=', 'users.id')
                                    ->where('users.id', '=', Auth::user()->id)
                                    ->first();
                                echo $cantidad->cant_prod
                                ?>
                                @endguest
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<script>
    function disciplina() {
        event.preventDefault();
        $('div.dropdown-menu.submenu1').removeClass('show');
        $('div.dropdown-menu.submenu2').removeClass('show');
    }
    function karate() {
        event.preventDefault();
        event.stopPropagation();
        $('.submenu2').removeClass('show');
        $('.submenu1').addClass('show');
    }
    function muaythai() {
        event.preventDefault();
        event.stopPropagation();
        $('.submenu1').removeClass('show');
        $('.submenu2').addClass('show');
    }
</script>
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
