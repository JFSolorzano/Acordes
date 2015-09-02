@extends('Center.app')

@section('titulo')
        {{'Servicios | Acordes'}}
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
            <h1 class="align-center"><span>EDITAR SERVICIO</span></h1>
            <h2 style = "display: inline-block" >{{ Auth::user()->name }}</h2 >
            <img class = "circular-image" src = "{{ Auth::user()->avatar }}" alt = "{{ Auth::user()->name }}" >
        </div >
        <!-- /logo-container -->
        <div class = "header-bottom-bar" >
            <div class = "container" >
                <div class = "row" >
                    <div class = "col-md-12" >
                        <div class = "contact-info align-right" >
                            <ul >
                                <li ><a href = "{{ route('adminServicios') }}" >VER REGISTROS</a ></li >
                            </ul >
                        </div >
                        <!-- /contact-info -->
                    </div >
                    <!-- /col-md-12 -->
                </div >
                <!-- /row -->
            </div >
            <!-- /container -->
        </div >
        <!-- /header-bottom-bar -->
    </header >
    <section class = "reservation" >
        <div class = "container" >
            <div class = "row" >
                {!! Form::open(['url'=>'servicios/'.$registro->id.'/actualizar','autocomplete'=>'off','files'=>'true']) !!}
                <div class = "col-md-12 wow fadeInLeft" >
                    <header class = "section-title" >
                        <h2 class="align-center"><span >Completa</span > el formulario</h2 >
                    </header >
                    <div class = "col-md-6" >
                        <div class="form-group ">
                            {!! Form::label('seleccionarImage', 'Selecciona la imagen del servicio.') !!}
                            {!! Form::file('imagen',null, array('class'=>'text-center')) !!}
                        </div>
                    </div >
                    <div class = "col-md-6" >
                        <fieldset >
                            {!! Form::text('nombre', $registro->nombre, array('placeholder'=>'Nombre del Servicio', 'style'=>'width: 100%')) !!}
                            <select class="text-center" name="est" style="width: 100%" >
                                @if($registro->estado == 1)<option value="1" selected="selected" >Disponible</option> @else <option value="1"  >Disponible</option>@endif
                                @if($registro->estado == 0)<option value="0" selected="selected" >No disponible</option> @else <option value="0"  >No disponible</option>@endif
                            </select>
                            {!! Form::textarea('descripcion', $registro->descripcion, array('size' => '30x5','placeholder'=>'Descripcion', 'style'=>'width: 100%')) !!}
                        </fieldset>
                    </div >
                    <div class="col-md-8 col-md-offset-5">
                        {!! Form::submit('ACTUALIZAR!',array('class'=>'text-center')) !!}
                    </div>
                </div >
                <!-- /col-md-6 -->
                {!! Form::close() !!}
            </div >
            <!-- /row -->
        </div >
        <!-- /container -->
    </section >
@endsection
