@extends('Center.app')

@section('titulo')
    {{'Menu | Acordes'}}
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
            <h1 class="align-center"><span>DETALLES</span></h1>
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
                                <li ><a href = "{{ route('adminMenuCervezas') }}" >VER REGISTROS</a ></li >
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
    <section class="store-items store-items-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="store-item store-item-detail row">
                        <div class="col-md-6 wow fadeInLeft">
                            <div class="item-slideshow">
                                <div class="main-image">
                                    <figure><img src="{{ asset('img/menus/'.$registro->imagen) }}" alt="{{ $registro -> nombre }}"></figure>
                                </div><!-- /main-image -->
                            </div><!-- /item-slideshow -->
                        </div><!-- /col-md-6 -->
                        <div class="col-md-6 wow fadeInRight">
                            <ul class="breadcrumb">
                                <li>{{ $registro -> menu }}</li>
                            </ul>
                            <div class="food-info">
                                <h3 class="food-name">{{ $registro -> nombre }}<br >{{ $registro -> extra }}</h3>
                                <p class="food-price">${{ $registro -> costo }}</p>
                                <p>{{ $registro -> descripcion }}</p>
                            </div><!-- /food-info -->
                            <div class="food-tags-category">
                                <div class="food-category">
                                    <h6>Categoria: </h6>
                                    <ul>
                                        <li><a href="{{ url('/menu/cervezas') }}">{{ $registro -> menu }}</a></li>
                                    </ul>
                                </div><!-- /category -->
                            </div><!-- /food-tags-category -->
                        </div><!-- /col-md-6 -->
                    </div><!-- /store-item -->
                </div><!-- /col-md-12 -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section>
@endsection