@extends('Club.app')
@section('titulo')
    {{'Restaurante Acordes'}}
@endsection
@section('contenido')
    <!-- Start wrapper -->
    <div class="wrapper">

        @include('Club.inicio.main-slider')

        @include('Club.menu.galeria',[
            'galeria' => $datos -> galeria,
            'filtros' => $datos -> filtros
        ])

        @include('Club.servicios.inicio',[
            'servicios' => $datos -> servicios
        ])

        @include('Club.acercaDe.personal',[
            'empleados'=> $datos -> empleados
        ])

        @include('Club.menu.inicio',[
            'menus' => $datos -> menus
        ])

        @include('Club.contacto.mapa')

        @include('Club.contacto.formulario')

    </div><!-- /wrapper -->
    <!-- End wrapper -->

    @endsection