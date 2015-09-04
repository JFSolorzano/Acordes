@extends('Center.app')

@section('titulo')
    {{'Reservaciones | Acordes'}}
@endsection
@section('contenido')
    <header class = "main-header" id = "top" >
        @if(\Session::has('alerta'))
            <div class = "col-md-12 text-right alert alert-dismissible alert-success"
                 style = "background-color: white" >
                <button type = "button" class = "close" data-dismiss = "alert" >×</button >
                <h1 >{{Session::get('alerta')}}</h1 >
                <br >
            </div >
        @endif
        @if ( !$errors->isEmpty() )
            <div class = "col-md-12 alert alert-dismissible alert-danger" >
                <button type = "button" class = "close" data-dismiss = "alert" >×</button >
                <ul >
                    @foreach ( $errors->all() as $error )
                        <li >{{ $error }}</li >
                    @endforeach
                </ul >
                <br >
            </div >
        @endif
        <div class = "logo-container light-shark-bg align-right" >
            <br >

            <h1 class = "align-center" ><span >RESERVACIONES DEL DIA</span ></h1 >

            <h2 style = "display: inline-block" >{{ Auth::user()->name }}</h2 >
            <img class = "circular-image" src = "{{ Auth::user()->avatar }}" alt = "{{ Auth::user()->name }}" >
        </div >
    </header >
    <section class = "store-cart" >
        {!! Form::open(['route'=>'adminPostReservacionesHoy','autocomplete'=>'off']) !!}
        <div class = "container items-table" >
            <table >
                <thead >
                <tr >
                    <th >Cliente</th >
                    <th >Costo</th >
                    <th >Fecha</th >
                    <th >Estadia</th >
                    <th class = "remove-item" >Aprobada</th >
                </tr >
                </thead >
                <tbody >
                @foreach($registros as $registro)
                    <tr >
                        <?php
                            $fecha = date_create_from_format('Y-m-j H:i:s', $registro->inicio);
                            $fecha = $fecha->format('j.m.Y h:i a');
                            $estadia = date("H:i ", strtotime($registro->duracion));
                        ?>
                        <td >{{ $registro->name }}</td >
                        <td >${{ $registro->costoEstimado }}</td >
                        <td >{{ $fecha }}</td >
                        <td >{{ $estadia }} hrs</td >
                        <td >
                            <div class = "btn-group-sm" >
                                @if($registro->estado == 1)
                                    <input type = "checkbox" class = "chk " checked = "checked" id = "{{ $registro->id }}"
                                           name = "aprobadas[]"
                                           value = "{{ $registro->id }}" />
                                @else
                                    <input type = "checkbox" class = "chk " id = "{{ $registro->id }}"
                                           name = "aprobadas[]"
                                           value = "{{ $registro->id }}" />
                                @endif
                            </div >
                        </td >
                    </tr >
                @endforeach
                </tbody >
            </table >
            <div class = "container" align = "center" >
                <div class = "col-md-6" >
                    <?php echo $registros->render() ?>
                </div >
                <div class = "col-md-6" >
                    {!! Form::submit('Guardar',array('class'=>'pull-right')) !!}
                </div >
            </div >
        </div >
        {!! Form::close() !!}
                <!-- /container -->
    </section >
@endsection
