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
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1296643170672958');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=1296643170672958&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->
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
                        <a class="nav-link" href="{{ route('inicio') }}">{{ __('INICIO') }} | </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="disciplina">
                            {{ __('DISCIPLINAS') }}
                        </a>
                        <div class="dropdown-menu dropright" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item dropdown-toggle" href="#" id="submenu" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="karate()">
                                {{ __('Karate') }}
                            </a>
                            <div class="dropdown-menu submenu1" aria-labelledby="submenu">
                                <a class="dropdown-item"
                                   href="{{ route('karate-basico') }}">{{ __('Karate Básico') }}</a>
                                <a class="dropdown-item"
                                   href="{{ route('karate-intermedio') }}">{{ __('Karate Intermedio') }}</a>
                                <a class="dropdown-item"
                                   href="{{ route('karate-avanzado') }}">{{ __('Karate Avanzado') }}</a>
                            </div>
                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item dropdown-toggle" href="#" id="submenu2" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="muaythai()">
                                {{ __('Muay Thai') }}
                            </a>
                            <div class="dropdown-menu submenu2" aria-labelledby="submenu2">
                                <a class="dropdown-item"
                                   href="{{ route('muaythai-basico') }}">{{ __('Muay Thai Básico') }}</a>
                                <a class="dropdown-item"
                                   href="{{ route('muaythai-intermedio') }}">{{ __('Muay Thai Intermedio') }}</a>
                                <a class="dropdown-item"
                                   href="{{ route('muaythai-avanzado') }}">{{ __('Muay Thai Avanzado') }}</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">| {{ __('CONTACTO') }} | </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('campus') }}">{{ __('CAMPUS') }} |</a>
                    </li>

                    @guest
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i>
                            </a>
                            <div class="dropdown-menu dropleft" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('login') }}" id="submenu" role="button"
                                   aria-haspopup="true"
                                   aria-expanded="false">Iniciar sesión
                                </a>
                                @if (Route::has('register'))
                                    <a class="dropdown-item" href="{{ route('register') }}" id="submenu" role="button"
                                       aria-haspopup="true"
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
                                <a class="dropdown-item" href="{{route('miscompras')}}">
                                    Mis compras
                                </a>
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
                                        ->where('shopping_cart.id', '=', session('idShoppingCart'))
                                        ->first();
                                    ?>
                                    @if($cantidad->cant_prod < 1)
                                        0
                                    @else
                                        {{ $cantidad->cant_prod }}
                                    @endif
                                @else
                                    <?php
                                    $cantidad = DB::table('product_shopping_cart')
                                        ->select(DB::raw('SUM(product_shopping_cart.cantidad) as cant_prod'))
                                        ->join('shopping_cart', 'product_shopping_cart.fk_shopping_cart', '=', 'shopping_cart.id')
                                        ->join('users', 'shopping_cart.fk_usuario', '=', 'users.id')
                                        ->where([
                                            ['users.id', '=', Auth::user()->id],
                                            ['shopping_cart.fk_orden', '=', null]])
                                        ->first();
                                    ?>
                                    @if($cantidad->cant_prod < 1)
                                        0
                                    @else
                                        {{ $cantidad->cant_prod }}
                                    @endif
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
                    <img src="{{asset('/img/Black-belt-negro.png')}}" alt="profile Pic" class="logo">
                    <ul class="menu-datos">
                        <li><i class="fas fa-phone-volume"></i> +(51)924 417 920</li>
                        <li><i class="fas fa-map-marker"></i> Calle Teruel 370 Miraflores, Lima, Peru</li>
                        <li><i class="fas fa-envelope"></i> hola@dojoblackbelt.com</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h2 class="footer-text" style="color: #fff;">CLASES DE ARTES MARCIALES</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="menu-footer">
                                <li><a href="{{route('karate-basico')}}">Karate Básico</a></li>
                                <li><a href="{{route('karate-intermedio')}}">Karate Intermedio</a></li>
                                <li><a href="{{route('karate-avanzado')}}">Karate Avanzado</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="menu-footer">
                                <li><a href="{{route('muaythai-basico')}}">Muay Thai Básico</a></li>
                                <li><a href="{{route('muaythai-intermedio')}}">Muay Thai Intermedio</a></li>
                                <li><a href="{{route('muaythai-avanzado')}}">Muay Thai Avanzado</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
