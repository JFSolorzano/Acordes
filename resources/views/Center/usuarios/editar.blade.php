@extends('index')

@section('titulo')
    {{'Usuarios | Acordes'}}
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
                    Editar Usuario
                </h1>
            </div >
        </div >
        <div class="container">
            <div class = "col-md-2" ></div >
            <div class = "col-md-8" >
                {!! Form::open(['url'=>'usuarios/nuevo-registro','autocomplete'=>'off']) !!}
                <fieldset >
                    {!! Form::text('usuario', $datos['name'], array('placeholder'=>'Usuario', 'class'=>'text-center form-control')) !!}
                    <br />
                    {!! Form::email('email', $datos['email'], array('placeholder'=>'Email (Con este se logeara)', 'class'=>'text-center form-control')) !!}
                    <br />
                    {!! Form::password('contrasena', null, array('placeholder'=>'Contrasena', 'class'=>'text-center form-control')) !!}
                    <br />
                    {!! Form::password('confirmacion', null, array('placeholder'=>'Confirme su contrasena', 'class'=>'text-center form-control')) !!}
                    <br />
                    {!! Form::submit('CREAR!',array('class'=>'text-center form-control btn btn-primary')) !!}
                </fieldset>
                {!! Form::close() !!}
            </div >
            <div class = "col-md-2" ></div >
        </div>
    </div>
@endsection