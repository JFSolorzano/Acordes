@extends('Club.app')
@section('titulo')
    {{'Restaurante Acordes'}}
@endsection
@section('contenido')
    <!-- Start wrapper -->
    <div class="wrapper">

        @include('Club.inicio.main-slider')

        @include('Club.inicio.galeria',[
            'galeria' => $datos -> galeria,
            'filtros' => $datos -> filtros
        ])

        @include('Club.inicio.servicios',[
            'servicios' => $datos -> servicios
        ])

        @include('Club.inicio.personal',[
            'empleados'=> $datos -> empleados
        ])

        @include('Club.inicio.menu')

        @include('Club.contacto.mapa')

        @include('Club.contacto.formulario')

    </div><!-- /wrapper -->
    <!-- End wrapper -->

    @endsection