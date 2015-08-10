@extends('Center.app')

@section('titulo')
    {{'Empleados | Acordes'}}
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
                    Nuevo Empleado
                </h1>
            </div >
        </div >
        <div class="container">
            <div class = "col-md-2" ></div >
            <div class = "col-md-8" >
                {!! Form::open(['url'=>'empleados/nuevo-registro','autocomplete'=>'off', 'files'=>'true']) !!}
                <fieldset >
                    {!! Form::text('nombres', null, array( 'placeholder'=>'Nombres', 'class'=>'text-center form-control')) !!}
                    <br />
                    {!! Form::text('apellidos', null, array( 'placeholder'=>'Apellidos', 'class'=>'text-center form-control')) !!}
                    <br />
                    {!! Form::text('cargo', null, array( 'placeholder'=>'Cargo', 'class'=>'text-center form-control')) !!}
                    <br />
                    {!! Form::textarea('biografia', null, array('size' => '30x5', 'placeholder'=>'Biografia', 'class'=>'text-center form-control')) !!}
                    <br />
                    <div class="form-group pull-right">
                        {!! Form::label('seleccionarImage', 'Selecciona la foto del integrante.'); !!}
                        {!! Form::file('foto',null, array('class'=>'text-center')); !!}
                    </div>
                    <br />
                    <br />
                    {!! Form::submit('Crear!',array('class'=>'text-center form-control btn btn-primary')) !!}
                </fieldset>
                {!! Form::close() !!}
            </div >
            <div class = "col-md-2" ></div >
        </div>
    </div>
@endsection