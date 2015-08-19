<html>
<head>
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href="//cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.4/paper/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset("/css/center.css") }}" rel="stylesheet">

    <title>@yield('titulo')</title>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    {{--<div class="content">--}}
        {{--<div class="title">Center</div>--}}
        {{--<div class="quote">{{ Inspiring::quote() }}</div>--}}
    {{--</div>--}}
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Cambiar Navegacion</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('adminInicio') }}">Panel de Administracion</a>
            </div>

            <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
                @unless(Auth::guest())
                    <ul class="nav navbar-nav">
                        {{--<li><a href="{{ url('reservaciones') }}">Reservaciones</a></li>--}}
                        <li class="divider"></li>
                        {{--@if(Entrust::can('crud-menu'))--}}
                            {{--<li class="dropdown">--}}
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menu<span class="caret"></span></a>--}}
                                {{--<ul class="dropdown-menu" role="menu">--}}
                                    {{--<li><a href="{{ route('adminMenuBar') }}">Bebidas</a></li>--}}
                                    {{--<li class="divider"></li>--}}
                                    {{--<li><a href="{{ route('adminMenuRestaurante') }}">Comida</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="divider"></li>--}}
                        {{--@endif--}}
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Control de Contenido<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                @if(Entrust::can('crud-promociones'))
                                    <li><a href="{{ route('adminPromociones') }}">Promociones</a></li>
                                    <li class="divider"></li>
                                @endif
                                @if(Entrust::can('crud-empleados'))
                                    <li><a href="{{ route('adminEmpleados') }}">Equipo</a></li>
                                    <li class="divider"></li>
                                @endif
                                @if(Entrust::can('crud-servicios'))
                                    <li><a href="{{ route('adminServicios') }}">Servicios</a></li>
                                    <li class="divider"></li>
                                @endif
                                @if(Entrust::can('crud-redes'))
                                    <li><a href="{{ route('adminRedes') }}">Redes Sociales</a></li>
                                    <li class="divider"></li>
                                @endif
                                @if(Entrust::can('crud-datos'))
                                    <li><a href="{{ route('adminEmpresa') }}">Empresa</a></li>
                                @endif
                            </ul>
                        </li>
                        @if(Entrust::can('crud-preguntas'))
                            <li class="divider"></li>
                            <li><a href="{{ route('adminPreguntas') }}">Preguntas Frecuentes</a></li>
                        @endif
                    </ul>
                @endunless

                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ route('adminIngresar') }}">Iniciar Sesion</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                @if(Entrust::can('crud-usuarios'))
                                    <li><a href="{{ url('/auth/register') }}">Registrar Usuario</a></li>
                                    <li class="divider"></li>
                                @endif
                                <li><a href="{{ url('/auth/logout') }}">Cerrar Sesion</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('contenido')

    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>
