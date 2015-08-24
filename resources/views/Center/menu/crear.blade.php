@extends('Center.app')

@section('titulo')
    {{'Promociones | Acordes'}}
@endsection
@section('contenido')
    @if ( ! $errors->isEmpty() )
        <div class="row">
            <div class="col-md-8 col-md-offset-2 alert alert-danger">
                <ul>
                    @foreach ( $errors->all() as $error )
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <div class="row-fluid">
        <div class = "container" >
            <div style="background:transparent !important" class = "jumbotron" >
                <h1 class="text-center">
                    Nueva Promocion
                </h1>
            </div >
        </div >
        <div class="container">
            <div class = "col-md-2" ></div >
            <div class = "col-md-8" >
                {!! Form::open(['url'=>'promociones/nuevo-registro','autocomplete'=>'off', 'class'=>'form', 'files'=>'true']) !!}

                <fieldset>
                    {!! Form::text('nombre', null, array('placeholder'=>'Nombre', 'class'=>'text-center form-control')) !!}
                    <br />
                    {!! Form::textarea('descripcion', null, array('size' => '30x5', 'placeholder'=>'Descripcion', 'class'=>'text-center form-control')) !!}
                    <br />
                    <div class="form-group text-center">
                        {!! Form::label('seleccionarImage', 'Selecciona la imagen de la promocion'); !!}
                        {!! Form::file('imagen',null, array('class'=>'text-center')); !!}
                    </div>
                    <br />
                    <br />
                    <div class="form-group text-center" >
                        {!! Form::label('fechaInicioLabel', 'Fecha de Inicio'); !!}
                        {!! Form::date('inicio',\Carbon\Carbon::now(), array('class'=>'text-center form-control')) !!}
                    </div>
                    <br />
                    <div class="form-group text-center">
                        {!! Form::label('fechaFinLabel', 'Fecha de Fin'); !!}
                        {!! Form::date('fin',\Carbon\Carbon::now(),array('class'=>'text-center form-control')) !!}
                    </div>
                    <br />
                    {!! Form::submit('Crear!',array('class'=>'text-center form-control btn btn-primary')) !!}
                </fieldset>

                {!! Form::close() !!}

            </div>
        </div >
    </div>
@endsection