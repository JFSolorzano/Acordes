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
            <a href="#">
                <img src="{{ asset('club/img/logo/logo.png') }}" alt="Acordes - Restaurante, Bar, Club">
            </a>
        </div><!-- /logo-container -->
        <nav class="main-nav">
            <ul>
                <li class="active"><a href="{{ route('publicInicio') }}">Inicio</a></li>
                <li><a href="{{ route('publicMenu') }}">Menu</a></li>
                <li><a href="{{ route('publicPromociones') }}">Promociones</a></li>
                <li><a href="{{ route('publicServicios') }}">Servicios</a></li>
                <li><a href="{{ route('publicReservacion') }}">Reservacion</a></li>
                <li><a href="{{ route('publicInformacionEmpresarial') }}">Informacion Empresarial</a></li>
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