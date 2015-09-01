@extends('Club.app')
@section('titulo')
{{'Restaurante Acordes'}}
@endsection
@section('contenido')
        <!-- Start wrapper -->
<div class = "wrapper" >

    <!-- Start main-header -->
    <header class = "main-header" id = "top" >
        @if(\Session::has('alerta'))
            <div class = "col-md-12 text-right alert alert-dismissible alert-success"
                 style = "background-color: white" >
                <button type = "button" class = "close" data-dismiss = "alert" >×</button >
                <h1 >{{Session::get('alerta')}}</h1 >
                <br >
            </div >
        @endif
        <div class = "logo-container light-shark-bg align-right" >
            <h2 style = "display: inline-block" >{{ Auth::user()->name }}</h2 >
            <img class = "circular-image" src = "{{ Auth::user()->avatar }}" alt = "{{ Auth::user()->name }}" >
        </div >
        <!-- /logo-container -->
        <div class = "header-bottom-bar" >
            <div class = "container" >
                <div class = "row" >
                    <div class = "col-md-12" >
                        <div class = "contact-info align-right" >
                            <ul >
                                <li ><a href = "{{ route('publicReservacionPasoUno') }}" >Reservar</a ></li >
                                <li ><a href = "{{ route('publicSolicitarServicio') }}" >Solicitar Servicio</a ></li >
                                @unless($opinion !== 0)
                                    <li ><a href = "{{ route('publicOpinion') }}" >Danos tu opinion</a ></li >
                                @endunless
                                <li ><a href = "mailto:contacto@restauranteacordes.com" >Contactar</a ></li >
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
    <section class = "reservation" >
        <div class = "container" >
            <div class = "row" >
                <div class = "col-md-6 wow fadeInLeft" >
                    <header class = "section-title" >
                        <h2 >Mis <span >Reservaciones</span ></h2 >
                    </header >
                    <div class = "reservaciones" >
                        <ul style = "width: auto; height: 300px; overflow: auto" >
                            @foreach( $reservaciones as $reservacion )
                                <?php

                                $fecha = date_create_from_format('Y-m-j H:i:s', $reservacion->inicio);
                                $fecha = $fecha->format('j.m.Y h:i a');

                                switch ($reservacion->estado) {
                                    case 0:
                                        $estado = 'Sin Confirmar';
                                        break;
                                    case 1:
                                        $estado = 'Confirmada';
                                        break;
                                    case 2:
                                        $estado = 'En proceso';
                                        break;
                                    case 3:
                                        $estado = 'Negada';
                                        break;
                                    default:
                                        $estado = 'Sin Confirmar';
                                }

                                ?>
                                <li >
                                    <div >
                                        <a href = "#" ><h3 style = "color: #0f1b26" >{{ $fecha }}</h3 ></a >
                                        <h4 >Estadia: {{ date("H:i", strtotime($reservacion->duracion)) }} hrs</h4 >
                                        <h4 >Cuenta: ${{ $reservacion->costoEstimado }}</h4 >
                                        <h4 >Estado: {{ $estado }}</h4 >
                                    </div >
                                </li >
                                <hr >
                            @endforeach
                        </ul >
                    </div >
                </div >
                <!-- /col-md-6 -->
                <div class = "col-md-6 wow fadeInLeft" >
                    <header class = "section-title" >
                        <h2 ><span >Servicios</span > Solicitados</h2 >
                    </header >
                    <div class = "servicios" >
                        <ul style = "width: auto; height: 300px; overflow: auto" >
                            @foreach( $solicitudes as $solicitud )
                                <?php

                                $fecha = date_create_from_format('Y-m-j H:i:s', $solicitud->fechayhora);
                                $fecha = $fecha->format('j.m.Y h:i a');

                                switch ($solicitud->estado) {
                                    case 0:
                                        $estado = 'Sin Confirmar';
                                        break;
                                    case 1:
                                        $estado = 'Confirmada';
                                        break;
                                    case 2:
                                        $estado = 'En proceso';
                                        break;
                                    case 3:
                                        $estado = 'Negada';
                                        break;
                                    default:
                                        $estado = 'Sin Confirmar';
                                }

                                ?>
                                <li >
                                    <div class = "meal-details" >
                                        <h3 style = "color: #0f1b26">{{ $fecha }}</h3 >
                                        <h4 class = "" >{{ $solicitud->especificaciones }}</h4 >
                                        <h4 >Estado: {{ $estado }}</h4 >

                                        <p ></p >
                                    </div >
                                </li >
                                <hr >
                            @endforeach
                        </ul >
                    </div >
                </div >
                <!-- /col-md-6 -->
            </div >
            <!-- /col-md-6 -->
        </div >
        <!-- /row -->
    </section >

</div ><!-- /wrapper -->
<!-- End wrapper -->
@endsection