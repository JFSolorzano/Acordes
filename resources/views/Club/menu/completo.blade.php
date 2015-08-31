@extends('Club.app')
@section('titulo')
{{'Restaurante Acordes'}}
@endsection
@section('contenido')
<!-- Start wrapper -->
<div class="wrapper">

    <!-- Start main-header -->
    <header class="main-header" id="top">
        <div class="top-banner-container top-banner-container-style1">
            <div class="top-banner-bg custom-bg6 parallax" data-stellar-background-ratio="0.5"></div>
            <div class="top-banner">
                <div class="top-image">
                    <img src="{{ asset('img/encabezados/nuestro-menu.png') }}" alt="Nuestro Menu">
                </div><!-- /top-image -->
            </div><!-- /top-banner -->
        </div><!-- /top-banner-container -->
    </header>
    <!-- End main-header -->

    <section class="menus menus-full dark-bg white-rock-bg">
        <div class="row">
            <div class="left-section white-rock-bg">
                <div class="col-md-8 pull-right menus-container">
                    <div class="menu-carousel wow fadeInLeft">
                        @foreach( $menus as $menu )
                            @include('Club.menu.categoria-completa',[
                                'menu' => $menu
                            ])
                        @endforeach
                    </div><!-- /menu-carousel -->
                    <div class="menu-carousel-nav"></div>
                </div><!-- /menus-container -->
            </div><!-- /left-section -->
            <div class="right-section">
                <div class="col-md-4 menu-meals-container wow fadeInRight">
                    <ul class="menu-meals">
                        <?php $servicio=1; ?>
                        @foreach( $menus as $menu )
                            <li>
                                <figure><img src="{{ asset('club/img/services/service'.$servicio.'.png') }}" alt="Acordes"></figure>
                                <div class="meal-details">
                                    <h3>{{$menu->nombre}}</h3>
                                    <p></p>
                                </div>
                            </li>
                                <?php if($servicio==8){ $servicio = 1;}else{$servicio=$servicio+1;} ?>
                        @endforeach

                    </ul>
                </div><!-- /menu-meals-container -->
            </div><!-- /right-section -->
        </div><!-- /row -->
    </section><!-- /menu-container -->

    <section class="promo-image scrollme parallax custom-bg7" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="-1200">
        <div class="container animateme" data-when="exit" data-from="0" data-to="0.8" data-opacity="0" data-translatey="100">
            <div class="row">
                <h1>Comida preparada desde el corazon con el espiritu en mente!</h1>
            </div><!-- /row -->
        </div><!-- /container -->
    </section>

</div><!-- /wrapper -->
<!-- End wrapper -->
@endsection