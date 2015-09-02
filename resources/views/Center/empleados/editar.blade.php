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
    <section class = "reservation" >
        <div class = "container" >
            <div class = "row" >
                {!! Form::open(['url'=>'/empleados/'.$registro->id.'/actualizar','autocomplete'=>'off', 'files'=>'true']) !!}
                <div class = "col-md-12 wow fadeInLeft" >
                    <header class = "section-title" >
                        <h2 ><span >Completa</span > el formulario</h2 >
                    </header >
                    <div class = "col-md-6" >
                        <div class = "form-group text-center" >
                            {!! Form::label('ava', 'Selecciona el avatar del usuario', ['for'=>'avatar']) !!}
                            {!! Form::file('avatar',null, array('class'=>'text-center')) !!}
                        </div >
                    </div >
                    <div class = "col-md-6" >
                        <fieldset >
                            <div class = "input-container" >
                                {!! Form::text('nombres', $registro->name, array( 'placeholder'=>'Nombres', 'style'=>'width: 100%')) !!}
                            </div >
                            <select class = "text-center" style = "width: 100%" name = "rol" >
                                @foreach($roles as $rol)
                                    <option value = "{{$rol->id}}" >{{$rol->display_name}}</option >
                                @endforeach
                            </select >
                            <br />
                            {!! Form::text('email', $registro ->email, array( 'placeholder'=>'Email', 'autocomplete'=>'off', 'style'=>'width: 100%')) !!}
                            <br />
                            <input type = "password" name = "password" autocomplete = "off"
                                   placeholder = "Nueva Contrasena" style = "width: 100%" >
                            <br >
                            <input type = "password" name = "password_confirmation"
                                   placeholder = "Confirma la Contrasena" style = "width: 100%" >
                            {!! Form::submit('Actualizar!',array('class'=>'text-center pull-right')) !!}
                        </fieldset >
                    </div >
                </div >
                <!-- /col-md-6 -->
                {!! Form::close() !!}
            </div >
            <!-- /row -->
        </div >
        <!-- /container -->
    </section >
@endsection