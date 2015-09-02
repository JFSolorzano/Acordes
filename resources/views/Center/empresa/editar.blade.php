@extends('Center.app')

@section('titulo')
    {{'Informacion Empresarial | Acordes'}}
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
                <h1 class="align-center"><span>INFORMACION EMPRESARIAL</span></h1>
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
                                <li ><a href = "{{ route('adminEmpresa') }}" >VER REGISTROS</a ></li >
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
                {!! Form::open(['url'=>'empresa/'.$registro['id'].'/actualizar','autocomplete'=>'off']) !!}
                <div class="col-md-12 wow fadeInLeft">
                    <div class="col-md-8 col-md-offset-2 ali">
                        <header class="section-title center">
                            <h2 class="align-center"><span>Completa</span> el formulario</h2>
                        </header>
                        <fieldset >
                            {!! Form::text('nombre', $registro['nombre'], array( 'placeholder'=>'Dato', 'style'=>'width: 100%')) !!}
                            <br />
                            {!! Form::textarea('contenido', $registro['contenido'], array('size' => '30x5', 'placeholder'=>'Contenido', 'style'=>'width: 100%')) !!}
                            <br />
                            {!! Form::submit('Actualizar',array('style'=>'width: 100%')) !!}
                        </fieldset>
                    </div>
                </div><!-- /col-md-6 -->
                {!! Form::close() !!}
            </div><!-- /row -->
        </div><!-- /container -->
    </section>
@endsection
