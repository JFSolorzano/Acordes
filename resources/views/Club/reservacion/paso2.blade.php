@extends('Club.app')
@section('titulo')
    {{'Reservar | Acordes'}}
@endsection

@section('contenido')

    @include('Club.reservacion.crear.encabezado')

    @include('Club.reservacion.crear.formulario-dos',[
        'bebidas' => $bebidas,
        'comidas' => $comidas,
    ])

@endsection