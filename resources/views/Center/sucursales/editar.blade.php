
@extends('index')

@section('titulo')
    {{'Sucursales | Acordes'}}
@endsection
@section('content')
    @if ( ! $errors->isEmpty() )
        <div class="row">
            @foreach ( $errors->all() as $error )
                <div class="col-md-8 col-md-offset-2 alert alert-danger text-center" role="alert">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>{{ $error }}
                </div>
            @endforeach
        </div>
    @endif
    <div class="row-fluid">
        <div class = "container" >
            <div style="background:transparent !important" class = "jumbotron" >
                <h1 class="text-center">
                    Editar Sucursal
                </h1>
            </div >
        </div >
        <div class="container">
            <div class = "col-md-2" ></div >
            <div class = "col-md-8" >
                {!! Form::open(['url'=>'sucursales/'.$datos['id'].'/actualizar','autocomplete'=>'off']) !!}
                <fieldset >
                    {!! Form::text('direccion', $datos['direccion'], array('placeholder'=>'Direccion Completa', 'class'=>'text-center form-control')) !!}
                    <br />
                    {!! Form::text('longitud', $datos['longitud'], array('placeholder'=>'Longitud', 'class'=>'text-center form-control')) !!}
                    <br />
                    {!! Form::text('latitud', $datos['latitud'], array('placeholder'=>'Latitud', 'class'=>'text-center form-control')) !!}
                    <br />
                    {!! Form::submit('Actualizar!',array('class'=>'text-center form-control btn btn-primary')) !!}
                </fieldset>
                {!! Form::close() !!}
            </div >
            <div class = "col-md-2" ></div >
        </div>
    </div>
@endsection