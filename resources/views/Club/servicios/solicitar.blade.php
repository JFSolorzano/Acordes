@extends('Club.app')
@section('titulo')
    {{'Solicitar Servicio | Acordes'}}
@endsection

@section('contenido')

    @include('Club.servicios.solicitar.encabezado')

    @include('Club.servicios.solicitar.terminos')

    @include('Club.servicios.solicitar.formulario',['servicios' => $servicios])

    @include('Club.contacto.mapa')

    @include('Club.contacto.formulario')

@endsection