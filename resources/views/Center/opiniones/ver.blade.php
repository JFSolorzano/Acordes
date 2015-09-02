@extends('Center.app')

@section('titulo')
    {{'Opiniones | Acordes'}}
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

            <h1 class = "align-center" ><span >OPINIONES DE LOS CLIENTES</span ></h1 >

            <h2 style = "display: inline-block" >{{ Auth::user()->name }}</h2 >
            <img class = "circular-image" src = "{{ Auth::user()->avatar }}" alt = "{{ Auth::user()->name }}" >
        </div >
    </header >
    <section class = "store-cart" >
        {!! Form::open(['route'=>'adminPostOpiniones','autocomplete'=>'off']) !!}
        <div class = "container items-table" >
            <table >
                <thead >
                <tr >
                    <th >Cliente</th >
                    <th >Opinion</th >
                    <th class = "remove-item" >Mostrar</th >
                </tr >
                </thead >
                <tbody >
                @foreach($registros as $registro)
                    <tr >
                        <td >{{ $registro->nombre }}</td >
                        <td >{{ $registro->mensaje }}</td >
                        <td >
                            <div class = "btn-group-sm" >
                                @if($registro->estado == 1)
                                    <input type = "checkbox" class = "chk " checked = "checked" id = "{{ $registro->opinion }}"
                                           name = "estado[]"
                                           value = "{{ $registro->opinion }}" />
                                @else
                                    <input type = "checkbox" class = "chk " id = "{{ $registro->opinion }}"
                                           name = "estado[]"
                                           value = "{{ $registro->opinion }}" />
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
