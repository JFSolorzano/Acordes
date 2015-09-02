@extends('Center.app')

@section('titulo')
    {{'Dashboard | Acordes'}}
@endsection
@section('contenido')

<!-- Start main-header -->
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
            <strong>Ooops!</strong> Hay problemas con los datos ingresados.<br><br>
            <ul >
                @foreach ( $errors->all() as $error )
                    <li >{{ $error }}</li >
                @endforeach
            </ul >
            <br >
        </div >
    @endif
    <div class = "logo-container light-shark-bg align-center" >
        <a href = "#" class = "logo" >
            <img src = "{{ asset('club/img/logo/243x100p.png') }}" alt = "Restaurante Acordes" >
        </a >
    </div >
    <!-- /logo-container -->
    <div class = "header-bottom-bar" >
        <div class = "container" >
            <div class = "row" >
                <div class = "col-md-12" >
                    <div class = "contact-info align-right" >
                        <ul >
                            <li >Hola <span>{{ Auth::user()->name }}!</span> </li >
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
<!-- End main-header -->

@endsection
