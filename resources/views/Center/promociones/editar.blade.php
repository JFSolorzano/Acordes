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
                    Editar Promocion
                </h1>
            </div >
        </div >
        <div class="container">
            <div class = "col-md-2" ></div >
            <div class = "col-md-8" >
                {!! Form::open(['url'=>'promociones/'.$registro['id'].'/actualizar','autocomplete'=>'off', 'files'=>'true']) !!}
                <fieldset >
                    {!! Form::text('nombre', $registro['nombre'], array('placeholder'=>'Nombre de la promocion', 'class'=>'text-center form-control')) !!}
                    <br />
                    {!! Form::textarea('descripcion', $registro['descripcion'], array('size' => '30x5','placeholder'=>'Descripcion', 'class'=>'text-center form-control')) !!}
                    <br />
                    <div class="form-group pull-right">
                        {!! Form::label('seleccionarImage', 'Selecciona la imagen de la promocion'); !!}
                        {!! Form::file('imagen',null, array('class'=>'text-center')); !!}
                    </div>
                    <br />
                    <br />
                    <div class="form-group">
                        {!! Form::label('fechaInicioLabel', 'Fecha de Inicio'); !!}
                        {!! Form::date('inicio',$registro['inicio']) !!}
                    </div>
                    <br />
                    <div class="form-group">
                        {!! Form::label('fechaFinLabel', 'Fecha de Fin'); !!}
                        {!! Form::date('fin',$registro['fin']) !!}
                    </div>
                    <br />
                    {!! Form::submit('Actualizar!',array('class'=>'text-center form-control btn btn-primary')) !!}
                </fieldset>
                {!! Form::close() !!}
            </div >
            <div class = "col-md-2" ></div >
        </div>
    </div>
@endsection