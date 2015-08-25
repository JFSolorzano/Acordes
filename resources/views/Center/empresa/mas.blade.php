@extends('Center.app')

@section('titulo')
    {{'Datos Empresariales | Acordes'}}
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
                <h1 class="text-center">{{$registro->nombre}}</h1>
            </div >
        </div >
        <div class="container">
            <div class = "col-md-2" ></div >
            <div class = "col-md-8" >
                {!! Form::open(['url'=>'empresa/'.$registro['id'].'/actualizar','autocomplete'=>'off']) !!}
                <fieldset >
                    {!! Form::label('contenido', $registro['contenido'], array('size' => '30x5', 'placeholder'=>'Contenido', 'class'=>'text-center form-control')) !!}
                    <br />
                </fieldset>
                {!! Form::close() !!}
            </div >
            <div class = "col-md-2" ></div >
        </div>
    </div>
@endsection