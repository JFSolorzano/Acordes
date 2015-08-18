@extends('Center.app')

@section('titulo')
    {{'Servicios | Acordes'}}
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
                    Nuevo Servicio
                </h1>
            </div >
        </div >
        <div class="container">
            <div class = "col-md-2" ></div >
            <div class = "col-md-8" >
                {!! Form::open(['url'=>'servicios/nuevo-registro','autocomplete'=>'off', 'files'=>'true']) !!}
                <fieldset >
                    {!! Form::text('nombre', null, array('placeholder'=>'Nombre del Servicio', 'class'=>'text-center form-control')) !!}
                    <br />
                    {!! Form::textarea('descripcion', null, array('size' => '30x5','placeholder'=>'Descripcion', 'class'=>'text-center form-control')) !!}
                    <br />
                    <select class="text-center form-control" name="cargo" >
                        <option value="1">Disponible</option>
                        <option value="1"></option>
                    </select>
                    <br />
                    <div class="form-group pull-right">
                        {!! Form::label('seleccionarImage', 'Selecciona la imagen del servicio.'); !!}
                        {!! Form::file('imagen',null, array('class'=>'text-center')); !!}
                    </div>
                    <br />
                    <br />
                    {!! Form::submit('CREAR!',array('class'=>'text-center form-control btn btn-primary')) !!}
                </fieldset>
                {!! Form::close() !!}
            </div >
            <div class = "col-md-2" ></div >
        </div>
    </div>
@endsection