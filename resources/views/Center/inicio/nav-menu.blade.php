@unless(Auth::guest())
<!-- Start mobile-nav -->
<div class = "mobile-nav-container clearfix" >
    <div class = "main-nav-trigger mobile-nav-trigger" >
        <a href = "#" ></a >
    </div >
</div >
<!-- End mobile-nav -->

<!-- Start main-nav-trigger -->
<div class = "main-nav-trigger" >
    <a href = "#" >Menu</a >
</div >
<!-- End main-nav-trigger -->

<!-- Start main-nav -->
<div class = "main-nav-container dark" >
    <div class = "main-nav-inner" >
        <div class = "logo-container" >
            <a href = "{{ route('adminInicio') }}" >
                <img src = "{{ asset('img/logos/150x150p.png') }}" alt = "Acordes - Restaurante, Bar, Club" >
            </a >
        </div >
        <!-- /logo-container -->
        <nav class = "main-nav" >
            <ul >
                @if(Entrust::can('crud-promociones'))
                    <li >
                        <a href = "{{ route('adminPromociones') }}" >Promociones</a >
                    </li >
                @endif
                @if(Entrust::can('crud-empleados'))
                    <li >
                        <a href = "{{ route('adminEmpleados') }}" >Empleados</a >
                    </li >
                @endif
                @if(Entrust::can('crud-servicios'))
                    <li >
                        <a href = "{{ route('adminServicios') }}" >Servicios</a >
                    </li >
                @endif
                @if(Entrust::can('crud-redes'))
                    <li ><a href = "{{ route('adminRedes') }}" >Redes Sociales</a ></li >
                @endif
                @if(Entrust::can('crud-datos'))
                    <li ><a href = "{{ route('adminEmpresa') }}" >Empresa</a ></li >
                @endif
                @if(Entrust::can('crud-menu'))
                    <li >
                        <a href = "{{ route('adminMenu') }}" >Menú<span ></span ></a >
                        <!-- /.nav-second-level -->
                    </li >
                @endif
                @if(Entrust::can('crud-preguntas'))
                    <li >
                        <a href = "{{ route('adminPreguntas') }}" >Preguntas Frecuentes</a >
                    </li >
                @endif
            </ul >
        </nav >
        <nav class = "main-nav" >
            <ul >
                <li><a href="{{ url('/cerrar-sesion') }}">Cerrar sesión</a>
            </ul >
        </nav >
        <!-- /socials-container -->
        <div class = "copyright" >
            <p >&copy; 2015 Acordes</p >

            <p >Todos los derechos reservados.</p >
        </div >
        <!-- /copyright -->
    </div >
    <!-- /main-nav-inner -->
</div ><!-- /main-nav-container -->
<!-- End main-nav -->
@endunless