@extends('Club.app')
@section('titulo')
{{'Restaurante Acordes'}}
@endsection
@section('contenido')
        <!-- Start wrapper -->
<div class="wrapper">

    <!-- Start main-header -->
    <header class = "main-header" id = "top" >
        <div class = "logo-container light-shark-bg align-right" >
            <h2 style="display: inline-block">{{ Auth::user()->name }}</h2>
            <img class="circular-image" src = "{{ Auth::user()->avatar }}" alt = "{{ Auth::user()->name }}" >
        </div >
        <!-- /logo-container -->
        <div class = "header-bottom-bar" >
            <div class = "container" >
                <div class = "row" >
                    <div class = "col-md-12" >
                        <div class = "contact-info align-right" >
                            <ul >
                                <li ><a href = "{{ route('publicReservacionCrear') }}" >Reservar</a ></li >
                                <li ><a href = "{{ '#' }}" >Solicitar Servicio</a ></li >
                                <li ><a href = "{{ '#' }}" >Hacer Sugerencia</a ></li >
                                <li ><a href = "{{ '#' }}" >Contactar</a ></li >
                                <li ><a href = "{{ '#' }}" >Iniciar Chat</a ></li >
                                <li ><a href = "{{ route('clubOlvide') }}" >Editar Mis Datos</a ></li >
                            </ul >
                        </div >
                        <!-- /contact-info -->
                    </div >
                    <!-- /col-md-12 -->
                </div >
                <!-- /row -->
            </div >
            <!-- /container -->
        </div >
        <!-- /header-bottom-bar -->
    </header >
    <!-- End main-header -->
    <section class="reservation">
        <div class="container">
            <div class="row">
                <div class="col-md-6 wow fadeInLeft">
                    <header class="section-title">
                        <h2>Mis <span>Reservaciones</span></h2>
                    </header>
                    <div class="reservaciones">
                        <ul class="menu-meals">
                            @foreach( $reservaciones as $reservacion )
                                <li>
                                    <div class="meal-details">
                                        <h3>{{''}}</h3>
                                        <p></p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- /col-md-6 -->
                <div class="col-md-6 wow fadeInLeft">
                    <header class="section-title">
                        <h2><span>Servicios</span> Solicitados</h2>
                    </header>
                    <div class="servicios">
                        <ul class="menu-meals">
                            @foreach( $servicios as $servicio )
                                <li>
                                    <div class="meal-details">
                                        <h3>{{''}}</h3>
                                        <p></p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- /col-md-6 -->
                </div><!-- /col-md-6 -->
            </div><!-- /row -->
    </section>

</div><!-- /wrapper -->
<!-- End wrapper -->
@endsection