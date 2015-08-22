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
                    Editar servicio
                </h1>
            </div >
        </div >
        <div class="container">
            <div class = "col-md-2" ></div >
            <div class = "col-md-8" >
                {!! Form::open(['url'=>'servicios/'.$registro['id'].'/actualizar','autocomplete'=>'off','files'=>'true']) !!}
                <fieldset >
                    {!! Form::text('nombre', $registro['nombre'], array('placeholder'=>'Nombre del Servicio', 'class'=>'text-center form-control')) !!}
                    <br />
                    {!! Form::textarea('descripcion', $registro['descripcion'], array('size' => '30x5','placeholder'=>'Descripcion', 'class'=>'text-center form-control')) !!}
                    <br />
                    <select class="text-center form-control" name="est" >
                        @if($registro->estado == 1)<option value="1" selected="selected" >Disponible</option> @else <option value="1"  >Disponible</option>@endif
                        @if($registro->estado == 0)<option value="0" selected="selected" >No disponible</option> @else <option value="0"  >No disponible</option>@endif
                    </select>
                    <br />
                    <div class="form-group pull-right">
                        {!! Form::label('seleccionarImage', 'Selecciona la imagen del servicio.'); !!}
                        {!! Form::file('imagen',null, array('class'=>'text-center')); !!}
                    </div>
                    <br />
                    {!! Form::submit('ACTUALIZAR!',array('class'=>'text-center form-control btn btn-primary')) !!}
                </fieldset>
                {!! Form::close() !!}
            </div >
            <div class = "col-md-2" ></div >
        </div>
    </div>
@endsection