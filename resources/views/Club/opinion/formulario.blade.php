@extends('Club.app')
@section('titulo')
{{'Restaurante Acordes'}}
@endsection
@section('contenido')
        <!-- Start wrapper -->
<div class="wrapper">

    <!-- Start main-header -->
    <header class = "main-header" id = "top" >
        <div class = "logo-container light-shark-bg align-right" >
            <h2 style="display: inline-block">{{ Auth::user()->name }}</h2>
            <img class="circular-image" src = "{{ Auth::user()->avatar }}" alt = "{{ Auth::user()->name }}" >
        </div >
    </header >
    <!-- End main-header -->
    <section class="reservation">
        <div class="container">
            <div class="row">
                <div class="col-md-12 wow fadeInRight">
                    <header class = "col-md-8 col-md-offset-4 section-title" >
                        <h2 >Danos tu <span>Opinion</span></h2 >
                    </header >
                    {!! Form::open(array('route'=>'publicPostOpinion','method'=>'POST', 'id'=>'opinion')) !!}
                    {!! Form::textarea('mensaje',null,['size' => '150x20', 'placeholder' => 'Escribe aqui tu opinion...']) !!}
                    <div class = "col-md-12 text-center" >
                        <div class = "col-md-8 col-md-offset-5" >
                            {!! Form::submit('Enviar', ['id'=>'enviar']) !!}
                        </div >
                    </div >
                    {!! Form::close() !!}
                </div>
                </div><!-- /col-md-6 -->
            </div><!-- /row -->
    </section>

</div><!-- /wrapper -->
<!-- End wrapper -->
@endsection