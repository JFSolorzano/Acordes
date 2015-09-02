@extends('Center.app')

@section('titulo')
    {{'Empleados | Acordes'}}
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
                <h1 class="align-center"><span>EDITAR USUARIO</span></h1>
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
                                <li ><a href = "{{ route('adminEmpleados') }}" >VER REGISTROS</a ></li >
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
    <section class="reservation">
        <div class="container">
            <div class="row">
                <div class="col-md-12 wow fadeInLeft">
                    {!! Form::open(['url'=>'empleados/'.$registro['id'].'/actualizar','autocomplete'=>'off', 'files'=>'true']) !!}
                    <header class="section-title">
                        <h2><span>Completa</span> el formulario</h2>
                    </header>
                    <div class = "col-md-6" >
                    </div >
                    <div class = "col-md-6" >

                        <fieldset >
                            {!! Form::text('nombres', $registro['nombres'], array( 'placeholder'=>'Nombres', 'class'=>'text-center')) !!}
                            <br />
                            {!! Form::text('apellidos', $registro['apellidos'], array( 'placeholder'=>'Apellidos', 'class'=>'text-center')) !!}
                            <br />
                            <select class="text-center" name="cargo" >
                                @foreach($cargos as $c)
                                    @if($registro->cargo==$c->id)
                                        <option value="{{$c->id}}" selected="selected">{{$c->nombre}}</option>
                                    @else<option value="{{$c->id}}">{{$c->nombre}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <br />
                            <div class="form-group pull-right">
                                {!! Form::label('seleccionarImage', 'Selecciona la foto del integrante') !!}
                                {!! Form::file('foto',null, array('class'=>'text-center')) !!}
                            </div>
                            <br />
                            {!! Form::submit('Actualizar',array('class'=>'text-center')) !!}
                        </fieldset>
                    </div >
                </div><!-- /col-md-6 -->
                {!! Form::close() !!}
            </div><!-- /row -->
        </div><!-- /container -->
    </section>
@endsection

n