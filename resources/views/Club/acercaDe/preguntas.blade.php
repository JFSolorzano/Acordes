@extends('Club.app')

@section('contenido')
        <!-- Start wrapper -->
<div class = "wrapper" >

    <!-- Start main-header -->
    <header class = "main-header" id = "top" >
        <div class = "top-banner-container top-banner-container-style1" >
            <div class = "top-banner-bg custom-bg3 parallax" data-stellar-background-ratio = "0.5" ></div >
            <div class = "top-banner" >
                <div class = "top-image" >
                    <img src = "{{ asset('img/encabezados/preguntas.png') }}" alt = "Preguntas Frecuentes" >
                </div >
                <!-- /top-image -->
            </div >
            <!-- /top-banner -->
        </div >
        <!-- /top-banner-container -->
    </header >
    <!-- End main-header -->

    <section class = "about dark-bg" >
        <div class = "container" >
            @foreach($preguntas as $pregunta)
                <div class = "row" >
                    <header class = "section-title col-md-6 col-md-offset-3 wow fadeInDown" >
                        <h1 >{{ $pregunta->pregunta }}</h1 >
                    </header >
                    <div class = "about-container" >
                        <div class = "row" >
                            @foreach($preguntas as $pregunta)
                                <div class = "col-md-8 col-md-offset-2 wow fadeInLeft" >
                                    <p >
                                        {{ $pregunta->respuesta }}
                                    </p >
                                </div ><!-- /col-md-6 -->
                            @endforeach
                        </div >
                        <!-- /row -->
                    </div >
                    <!-- /about-container -->
                </div >
                <!-- /row -->
            @endforeach
        </div >
        <!-- /contianer -->
    </section >

    @include('Club.contacto.mapa')

    @include('Club.contacto.formulario')

</div ><!-- /wrapper -->
<!-- End wrapper -->
@endsection