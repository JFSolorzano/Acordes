@extends('Club.app')
@section('titulo')
    {{'Reservar | Acordes'}}
@endsection

@section('contenido')

    @include('Club.reservacion.crear.encabezado')

    @include('Club.reservacion.crear.terminos')

    @include('Club.reservacion.crear.formulario',[
        'platos' => $platos,
        'bebidas' => $bebidas
    ])

    {{--@include('Club.reservacion.crear.video')--}}

    @include('Club.contacto.mapa')

    @include('Club.contacto.formulario')

@endsection