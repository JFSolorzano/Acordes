@extends('index')

@section('titulo')
    {{'Menu | Acordes'}}
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
                    Nueva Opcion del Menu de Restaurante
                </h1>
            </div >
        </div >
        <div class="container">
            <div class = "col-md-2" ></div >
            <div class = "col-md-8" >
                {!! Form::open(['url'=>'menu-restaurante/nuevo-registro','autocomplete'=>'off','files'=>'true']) !!}
                <fieldset >
                    {!! Form::text('nombre', null, array('placeholder'=>'Nombre de la opcion', 'class'=>'text-center form-control')) !!}
                    <br />
                    {!! Form::text('contenidoExtra', null, array('placeholder'=>'Extras', 'class'=>'text-center form-control')) !!}
                    <br />
                    {!! Form::textarea('descripcionCompleta', null, array('size' => '30x5','placeholder'=>'Descripcion Completa', 'class'=>'text-center form-control')) !!}
                    <br />
                    {!! Form::number('costo', null, array('placeholder'=>'Costo', 'class'=>'text-center form-control')) !!}
                    <br />
                    <div class="form-group pull-right">
                        {!! Form::label('seleccionarImage', 'Selecciona la imagen de la opcion'); !!}
                        {!! Form::file('imagen',null, array('class'=>'text-center')); !!}
                    </div>
                    <br />
                    {!! Form::submit('CREAR!',array('class'=>'text-center form-control btn btn-primary')) !!}
                </fieldset>
                {!! Form::close() !!}
            </div >
            <div class = "col-md-2" ></div >
        </div>
    </div>
@endsection