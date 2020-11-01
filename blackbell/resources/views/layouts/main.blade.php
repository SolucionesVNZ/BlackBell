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
                        <li><i class="fas fa-envelope"></i> info@latamcoachingnetwork.com</li>
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
