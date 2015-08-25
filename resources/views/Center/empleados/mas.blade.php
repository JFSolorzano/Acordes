@extends('Center.app')

@section('titulo')
    {{'Equipo | Acordes'}}
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
                <h1 class="text-center">Integrante</h1>
            </div >
        </div >
        <div class="container">
            <div class = "col-md-2" ></div >
            <div class = "col-md-8" >
                {!! Form::open(['url'=>'empleados/'.$registro['id'].'/actualizar','autocomplete'=>'off', 'files'=>'true']) !!}
                <fieldset >
                    {!! Form::label('nombres', $registro['nombres'], array( 'placeholder'=>'Nombres', 'class'=>'text-center ')) !!}
                    <br />
                    {!! Form::label('apellidos', $registro['apellidos'], array( 'placeholder'=>'Apellidos', 'class'=>'text-center ')) !!}
                    <br />
                        @foreach($cargos as $c)
                            @if($c->id==$registro->cargo)
                            <label>{{$c->nombre}}</label><br />
                            @endif
                        @endforeach
                    {!! Form::label('biografia', $registro['biografia'], array('id'=>'biografia','size' => '30x5', 'placeholder'=>'Biografia', 'class'=>'text-center ')) !!}
                    <br />
                    <div class="form-group text-center">
                        <img src = "{{asset('img/'.$registro->foto)}}" width="120" height="120" alt = "{{$registro->foto}}" /></td>
                    </div>
                </fieldset>
                {!! Form::close() !!}
            </div >
            <div class = "col-md-2" ></div >
        </div>
    </div>
@endsection