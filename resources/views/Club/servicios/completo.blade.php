@extends('Club.app')
@section('titulo')
{{'Restaurante Acordes'}}
@endsection
@section('contenido')
        <!-- Start wrapper -->
<div class = "wrapper" >

    <!-- Start main-header -->
    <header class = "main-header" id = "top" >
        <div class = "top-banner-container top-banner-container-style2" >
            <div class = "top-banner-bg custom-bg5 parallax" data-stellar-background-ratio = "0.5" ></div >
            <div class = "top-banner" >
                <div class = "top-image" >
                    <img src = "{{ asset('img/encabezados/servicios.png') }}" alt = "Nuestros Servicios" >
                </div >
                <!-- /top-image -->
            </div >
            <!-- /top-banner -->
        </div >
        <!-- /top-banner-container -->
        <div class = "header-bottom-bar" >
            <div class = "container" >
                <div class = "row" >
                    <div class = "col-md-12" >
                        <div class = "contact-info align-right" >
                            <ul >
                                <li ><a href = "{{ route('publicSolicitarServicio') }}" >SOLICITAR SERVICIO</a >
                                </li >
                            </ul >
                        </div >
                        <!-- /contact-info -->
                    </div >
                    <!-- /col-md-12 -->
                </div >
                <!-- /row -->
            </div >
        </div >
    </header >
    <!-- End main-header -->

    <section class = "food-banner" >
        <div class = "container" >
            <div class = "row" >
                <?php $delay = 0 ?>
                @foreach($servicios as $servicio)
                    <div class = "col-md-6 col-md-offset-2 wow fadeInLeft" >
                        <div class = "banner features-right features-active" >
                            <div class = "image-container" >
                                <img src = "{{ asset('club/img/gallery/gallery17.jpg') }}" alt = "Acordes" >

                                <div class = "banner-title" >
                                    <img src = "{{ asset('club/img/slider-images/tasty-brunch.png') }}"
                                         alt = "Tasty Brunch" >
                                </div >
                                <!-- /banner-title -->
                            </div >
                            <div class = "banner-features" >
                                <div class = "banner-features-inner" >
                                    <div class = "food-price" >
                                        <p ><sup >{{$servicio->nombre}}</sup ></p >
                                    </div >
                                    <!-- /food-price -->
                                    <ul >
                                        <li >
                                            <h6 >Se Ofrece</h6 >

                                            <p >{{ $servicio -> descripcion }}</p >
                                        </li >
                                    </ul >
                                </div >
                                <!-- /banner-features-inner -->
                            </div >
                            <!-- /banner-features -->
                        </div >
                        <!-- /banner -->
                    </div ><!-- /col-md-5 -->
                @endforeach
            </div >
            <!-- /row -->
        </div >
        <!-- /container -->
    </section >

</div ><!-- /wrapper -->
<!-- End wrapper -->


@include('Club.contacto.mapa')

@include('Club.contacto.formulario')

@endsection