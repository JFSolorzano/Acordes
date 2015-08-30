@extends('Club.app')
@section('titulo')
    {{'Reservar | Acordes'}}
@endsection

@section('contenido')

    @include('Club.reservacion.crear.encabezado')

    @include('Club.reservacion.crear.terminos')

    div.

    @include('Club.contacto.mapa')

    @include('Club.contacto.formulario')

@endsection