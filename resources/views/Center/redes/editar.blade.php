@extends('Center.app')

@section('titulo')
    {{'Redes Sociales | Acordes'}}
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

            <h1 class = "align-center" ><span >NUEVA RED</span >
                <i class = "fa fa-facebook" ></i >
                <i class = "fa fa-twitter" ></i >
                <i class = "fa fa-google" ></i >...</h1 >

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
                                <li ><a href = "{{ route('adminRedes') }}" >VER REGISTROS</a ></li >
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
                {!! Form::open(['url'=>'redes-sociales/'.$registro->id.'/actualizar','autocomplete'=>'off']) !!}
                <div class = "col-md-12 wow fadeInLeft" >
                    <header class = "section-title" >
                        <h2 class = "align-center" ><span >Completa</span > el formulario</h2 >
                    </header >
                    <div class = "col-md-8 col-md-offset-2" >
                        <fieldset >
                            {!! Form::text('nombre', $registro->nombre, array('placeholder'=>'Nombre de la red social', 'style'=>'width: 100%')) !!}
                            {!! Form::text('link', $registro->link, array('placeholder'=>'Enlace', 'style'=>'width: 100%')) !!}
                        </fieldset >
                    </div >
                    <div class = "col-md-8 col-md-offset-5" >
                        {!! Form::submit('ACTUALIZAR!',array('class'=>'text-center')) !!}
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