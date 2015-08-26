@extends('Club.app')
@section('titulo')
{{'Restaurante Acordes'}}
@endsection
@section('contenido')
        <!-- Start wrapper -->
<div class="wrapper">

    <!-- Start main-header -->
    <header class="main-header" id="top">
        <div class="top-banner-container top-banner-container-style2">
            <div class="top-banner-bg custom-bg5 parallax" data-stellar-background-ratio="0.5"></div>
            <div class="top-banner">
                <div class="top-image">
                    <img src="{{ asset('club/img/slider-images/our-store.png') }}" alt="Acordes">
                </div><!-- /top-image -->
            </div><!-- /top-banner -->
        </div><!-- /top-banner-container -->
    </header>
    <!-- End main-header -->

    <section class="food-banner">
        <div class="container">
            <div class="row">
                <?php $delay = 0 ?>
                @foreach($promociones as $promocion)
                        <div class="col-lg-5 col-md-6 wow fadeInLeft">
                            <div class="banner features-right features-active">
                                <div class="image-container">
                                    <img src="{{ asset('club/img/gallery/gallery17.jpg') }}" alt="Acordes">
                                    <div class="banner-title">
                                        <img src="{{ asset('club/img/slider-images/tasty-brunch.png') }}" alt="{{ $promocion->nombre }}">
                                    </div><!-- /banner-title -->
                                </div>
                                <div class="banner-features">
                                    <div class="banner-features-inner">
                                        <div class="food-price">
                                            <p><sup>{{ $promocion->nombre }}</sup></p>
                                        </div><!-- /food-price -->
                                        <ul>
                                            <li>
                                                <h6>Detalles</h6>
                                                <p class="elipsis">{{ $promocion -> descripcion }}</p>
                                            </li>
                                        </ul>
                                    </div><!-- /banner-features-inner -->
                                </div><!-- /banner-features -->
                            </div><!-- /banner -->
                        </div><!-- /col-md-5 -->
                @endforeach
            </div><!-- /row -->
        </div><!-- /container -->
    </section>

</div><!-- /wrapper -->
<!-- End wrapper -->


@include('Club.contacto.mapa')

@include('Club.contacto.formulario')

@endsection