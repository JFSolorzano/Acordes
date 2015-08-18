@extends('Center.app')

@section('titulo')
    {{'Redes Sociales | Acordes'}}
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
                    Editar Red Social
                    <i class="fa fa-facebook"></i>
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-google"></i>...
                </h1>
            </div >
        </div >
        <div class="container">
            <div class = "col-md-2" ></div >
            <div class = "col-md-8" >
                {!! Form::open(['url'=>'redes-sociales/'.$registro['id'].'/actualizar','autocomplete'=>'off']) !!}
                <fieldset >
                    {!! Form::text('nombre', $registro['nombre'], array('placeholder'=>'Nombre de la Red', 'class'=>'text-center form-control')) !!}
                    <br />
                    {!! Form::text('link', $registro['link'], array('placeholder'=>'Enlace', 'class'=>'text-center form-control')) !!}
                    <br />
                    {!! Form::submit('CREAR!',array('class'=>'text-center form-control btn btn-primary')) !!}
                </fieldset>
                {!! Form::close() !!}
            </div >
            <div class = "col-md-2" ></div >
        </div>
    </div>
@endsection