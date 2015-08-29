<!-- Start mobile-nav -->
<div class="mobile-nav-container clearfix">
    <div class="main-nav-trigger mobile-nav-trigger">
        <a href="#"></a>
    </div>
</div>
<!-- End mobile-nav -->

<!-- Start main-nav-trigger -->
<div class="main-nav-trigger">
    <a href="#">Menu</a>
</div>
<!-- End main-nav-trigger -->

<!-- Start main-nav -->
<div class="main-nav-container dark">
    <div class="main-nav-inner">
        <div class="logo-container">
            <a href="{{ route('publicInicio') }}">
                <img src="{{ asset('club/img/logo/150x150p.png') }}" alt="Acordes - Restaurante, Bar, Club">
            </a>
        </div><!-- /logo-container -->
        <nav class="main-nav">
            <ul>
                <li><a href="{{ route('publicMenu') }}">Menu</a></li>
                {{--<li><a href="{{ route('publicPromociones') }}">Promociones</a></li>--}}
                <li><a href="{{ route('publicServicios') }}">Servicios</a></li>
                <li><a href="{{ route('publicReservacion') }}">Reservacion</a></li>
                <li><a href="{{ route('publicInformacionEmpresarial') }}">Informacion Empresarial</a></li>
                <li><a href="{{ route('publicPreguntas') }}">Preguntas Frecuentes</a></li>
            </ul>
        </nav>
        <nav class="main-nav">
            <ul>
                @if (Auth::guest())
                    <li><a href="{{ route('clubIngresar') }}">Inicia Sesion</a></li>
                    <li><a href="{{ route('clubRegistrar') }}">Crea tu Cuenta</a></li>
                @else
                    <li><a href="{{ route('publicCuenta') }}">Mi Cuenta</a></li>
                    <li><a href="{{ route('clubSalir') }}">Cerrar Sesion</a></li>
                @endif
            </ul>
        </nav>
        <div class="tweets-container">
            <div class="twitter-logo">
                <i class="fa fa-twitter"></i>
            </div><!-- /twitter-logo -->
            <div class="tweet"></div>
        </div><!-- /tweets-container -->
        <div class="socials-container">
            <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-skype"></i></a></li>
            </ul>
        </div><!-- /socials-container -->
        <div class="copyright">
            <p>&copy; 2015 Acordes</p>
            <p>Todos los derechos reservados.</p>
        </div><!-- /copyright -->
    </div><!-- /main-nav-inner -->
</div><!-- /main-nav-container -->
<!-- End main-nav -->