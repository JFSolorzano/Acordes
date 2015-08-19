@extends('Club.app')

@section('titulo')
{{ 'Inicia Sesion | Acordes' }}
@endsection

@section('contenido')
        <!-- Start wrapper -->
<div class = "wrapper" >

    <!-- Start main-header -->
    <header class = "main-header" id = "top" >
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
                                <li ><a href = "#" >OLVIDE MI CONTRASENA!</a ></li >
                                <li >Necesitas Ayuda? Llamanos: 7168 5165</li >
                                <li ><a href = "#" >E-mail</a ></li >
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

    <section class = "store-checkout" >
        <div class = "container wow fadeInDown" >
            <div class = "row" >
                <div class = "col-md-12" >
                    <div class = "container" >
                        <div class = "row" >
                            <div class = "col-md-6 col-md-offset-3 wow fadeInDown" >
                                <div class = "contact-form-contaienr" >
                                    <div class = "section-title" >
                                        <h1 ><span >Inicia Sesion</span ></h1 >
                                    </div >
                                    <form id = "contact-form" role = "form" method = "POST"
                                          action = "{{ route('clubPostIngresar') }}" >
                                        <input type = "hidden" name = "_token" value = "{{ csrf_token() }}" >

                                        <input type = "email"  name = "email" autocomplete = "off"
                                               placeholder = "E-mail*" value = "{{ old('email') }}" required >

                                        <input type = "password" name = "password" placeholder = "Contrasena*" >

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                                                    Login
                                                </button>

                                                <a href="#">Forgot Your Password?</a>
                                            </div>
                                        </div>
                                    </form >
                                    <div id = "form-messages" >
                                        @if (count($errors) > 0)
                                            <strong >Whoops!</strong > Hubieron unos problemas con tus datos.<br ><br >
                                            <ul >
                                                @foreach ($errors->all() as $error)
                                                    <li >{{ $error }}</li >
                                                @endforeach
                                            </ul >
                                        @endif
                                    </div >
                                </div >
                                <!-- /contact-form-container -->
                            </div >
                            <!-- /col-md-6 -->
                        </div >
                        <!-- /row -->
                    </div >
                    <!-- /container -->
                </div >
                <!-- /col-md-12 -->
            </div >
            <!-- /row -->
        </div >
        <!-- /container -->
    </section >
</div >

<div class = "container-fluid" >
    <div class = "row" >
        <div class = "col-md-8 col-md-offset-2" >
            <div class = "panel panel-default" >
                <div class = "panel-heading" >Inicio de sesion</div >
                <div class = "panel-body" >


                </div >
            </div >
        </div >
    </div >
</div >


@endsection
