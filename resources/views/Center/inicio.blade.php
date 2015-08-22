@extends('Center.app')

@section('titulo')
    {{'Dashboard | Acordes'}}
@endsection
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Bienvenido! </br>{{ Auth::user()->name }}</h3>
                    </div>

                    <div class="panel-body text-center">
                        <p>Has iniciado sesion exitosamente!
                            <br/></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
