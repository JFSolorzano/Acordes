<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('titulo')</title>
        <meta name="description" content="Restaurante Acordes">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <meta name="theme-color" content="#23292c"> <!-- Android 5.0 Tab Color -->
        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

        <!-- Web Fonts -->
        {{--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700,300,400' rel='stylesheet' type='text/css'>--}}
        {{--<link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>--}}

        <!-- Icon Fonts -->
        <link rel="stylesheet" type="text/css" href="{{ asset('club/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('club/css/fontello.css') }}">
        
        <!-- Plugins CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('club/css/rev-slider-settings.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('club/css/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('club/css/owl.carousel.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('club/css/owl.theme.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('club/css/magnific-popup.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('club/css/mediaelementplayer.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('club/css/jquery.datetimepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('club/css/dropzone.css') }}">

        <!-- Template CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('club/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('club/css/reset.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('club/css/main.css') }}">

        <!-- Demo Purpose CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('club/css/custom-bg.css') }}">

        <!-- Head JS Libraries -->
        <script src="{{ asset('club/js/vendor/modernizr-2.6.2.min.js') }}"></script>
        {{--<script src="http://maps.google.com/maps/api/js"></script><!-- REQUIRED FOR GOOGLE MAP -->--}}
    </head>
    <body>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '467232153438758',
                xfbml      : true,
                version    : 'v2.4'
            });
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
        <!--[if lt IE 7]>
            <p class="browsehappy">Estas usando un navegador <strong>desactualizado</strong>. Por favor <a href="http://browsehappy.com/">actualiza tu navegador</a> para mejorar tu experiencia.</p>
        <![endif]-->

        @include('Center.inicio.nav-menu')

        @yield('contenido')

        <script src="{{ asset('club/js/dropzone.js') }}"></script>
        <script src="{{ asset('club/js/vendor/jquery-2.1.3.min.js') }}"></script>
        <script src="{{ asset('club/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('club/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('club/js/jquery.themepunch.tools.min.js') }}"></script>
        <script src="{{ asset('club/js/jquery.themepunch.revolution.min.js') }}"></script>
        <script src="{{ asset('club/js/retina.min.js') }}"></script>
        <script src="{{ asset('club/js/SmoothScroll.js') }}"></script>
        <script src="{{ asset('club/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('club/js/jquery.mixitup.min.js') }}"></script>
        <script src="{{ asset('club/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('club/js/jquery.stellar.min.js') }}"></script>
        <script src="{{ asset('club/js/jquery.nicescroll.min.js') }}"></script>
        <script src="{{ asset('club/js/jquery.nav.js') }}"></script>
        {{--<script src="{{ asset('club/js/cd-google-map.js') }}"></script>--}}
        <script src="{{ asset('club/js/wow.min.js') }}"></script>
        <script src="{{ asset('club/js/mediaelement-and-player.min.js') }}"></script>
        <script src="{{ asset('club/js/tweetie.min.js') }}"></script>
        <script src="{{ asset('club/js/jquery.scrollme.min.js') }}"></script>
        <script src="{{ asset('club/js/jquery.dotdotdot.min.js') }}"></script>
        <script src="{{ asset('club/js/jquery.datetimepicker.js') }}"></script>
        <script src="{{ asset('club/js/moment.min.js') }}"></script>
        <script src="{{ asset('club/js/plugins.js') }}"></script>

        <script src="{{ asset('club/js/ajax.js') }}"></script>
        <script src="{{ asset('club/js/main.js') }}"></script>
        <script type="text/javascript">
            jQuery(document).ready(function() {
               jQuery('.main-slider').revolution(
                {
                    delay:9000,
                    startwidth:1170,
                    startheight: 960,
                    hideThumbs:10,
                    fullScreen: 'on',
                    navigationStyle: 'preview4',
                    parallax: 'scroll',
                    parallaxLevels:[100,-80]
                });
            });

        </script>

    </body>
</html>

