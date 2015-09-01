<html>
<head>
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href="//cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.4/paper/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset("/css/center.css") }}" rel="stylesheet">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/sb-admin-2.css') }}" rel="stylesheet">

    <title>@yield('titulo')</title>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
@unless(Auth::guest())
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Cambiar navegación</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="" data-toggle="dropdown" class="navbar-brand" href="{{ route('adminInicio') }}">Panel de administración<span class="fa fa-fw"></span></a>
            <ul class="dropdown-menu" id="">
                <li>
                    <a href="{{ route('adminInicio') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Control de contenido<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @if(Entrust::can('crud-promociones'))
                            <li>
                                <a href="{{ route('adminPromociones') }}">Promociones</a>
                            </li>
                        @endif
                        @if(Entrust::can('crud-empleados'))
                            <li>
                                <a href="{{ route('adminEmpleados') }}">Empleados</a>
                            </li>
                        @endif
                        @if(Entrust::can('crud-servicios'))
                            <li>
                                <a href="{{ route('adminServicios') }}">Servicios</a>
                            </li>
                        @endif
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @if(Entrust::can('crud-redes'))
                            <li><a href="{{ route('adminRedes') }}">Redes Sociales</a></li>
                        @endif
                        @if(Entrust::can('crud-datos'))
                            <li><a href="{{ route('adminEmpresa') }}">Empresa</a></li>
                        @endif
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                @if(Entrust::can('crud-menu'))
                    <li>
                        <a href="{{ route('adminMenu') }}"><i class="fa fa-table fa-fw"></i> Menú<span ></span></a>
                        <!-- /.nav-second-level -->
                    </li>
                @endif
                @if(Entrust::can('crud-preguntas'))
                    <li><a href="{{ route('adminPreguntas') }}"><i class="fa fa-files-o fa-fw"></i>Preguntas frecuentes</a></li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href=""><i class="fa fa-user fa-fw"></i>{{ Auth::user()->name }}<br>{{ Auth::user()->email}}</a>
                    </li>
                    @if(Entrust::can('crud-usuarios'))
                        <li><a href="{{ url('/auth/register') }}"><i class="fa fa-gear fa-fw"></i> Usuarios</a>
                        </li>@endif
                    <li class="divider"></li>
                    <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
    </nav>

    @endunless



    @yield('contenido')

    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>
