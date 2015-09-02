@extends('Club.app')

@section('contenido')
        <!-- Start wrapper -->
<div class = "wrapper" >

    <!-- Start main-header -->
    <header class = "main-header" id = "top" >
        <div class = "top-banner-container top-banner-container-style1" >
            <div class = "top-banner-bg custom-bg2 parallax" data-stellar-background-ratio = "0.5" ></div >
            <div class = "top-banner" >
                <div class = "top-image" >
                    <img src = "{{ asset('img/encabezados/informacion.png') }}" alt = "Informacion Empresarial" >
                </div >
                <!-- /top-image -->
            </div >
            <!-- /top-banner -->
        </div >
        <!-- /top-banner-container -->
    </header >
    <!-- End main-header -->

    <section class = "about dark-bg" >
        <div class = "container" >
            <div class = "row" >
                <header class = "section-title col-md-6 col-md-offset-3 wow fadeInDown" >
                    <h1 ><span >Sobre</span > Nosotros</h1 >

                    <p ></p >
                </header >
                <div class="about-container">
                    <div class="row">
                        <div class="col-md-6 wow fadeInLeft">
                            <p>
                                <span class="dropcap">VISION</span>
                            </p>
                            <br >
                            <p>{{ $vision }}</p>
                        </div><!-- /col-md-6 -->
                        <div class="col-md-6 wow fadeInRight">
                            <p>
                                <span class="dropcap">MISION</span>
                            </p>
                            <br >
                            <p>{{ $mision }}</p>
                        </div><!-- /col-md-6 -->
                    </div><!-- /row -->
                </div><!-- /about-container -->
                <!-- /about-container -->
            </div >
            <!-- /row -->
        </div >
        <!-- /contianer -->
        <div class = "promo wow fadeInUp" >
            <p >Uno no puede pensar bien, amar bien, dormir bien, <span >si no ha festejado bien.</span ></p >
        </div >
        <!-- /promo -->
    </section >

    <section class = "testimonials dark-bg custom-bg7 parallax" data-stellar-background-ratio = "0.5"
             data-stellar-vertical-offset = "-100" >
        <div class = "container" >
            <div class = "row" >
                <header class = "section-title wow fadeInUp" >
                    <h1 ><span >Que dice</span > la gente</h1 >
                </header >
                <div class = "testimonial-container col-md-10 col-md-offset-1 wow fadeInUp" >
                    <div class = "testimonial-carousel" >
                        @foreach($opiniones as $opinion)
                            <div class = "testimonial" >
                                <blockquote >
                                    <p >{{ $opinion->mensaje }} </p >
                                </blockquote >
                                <p class = "customer-name" >{{ $opinion->name }}</p >
                                <p class = "customer-job" ></p >
                            </div >
                            <!-- /testimonial -->
                        @endforeach
                        <div class = "testimonial" >
                            <blockquote >
                                <p ></p >
                            </blockquote >
                            <p class = "customer-name" ></p >

                            <p class = "customer-job" ></p >
                        </div >
                        <!-- /testimonial -->
                    </div >
                    <!-- /testimonial-carousel -->
                    <div class = "testimonial-carousel-nav" ></div >
                </div >
                <!-- /testimonial-container -->
            </div >
            <!-- /row -->
        </div >

    </section >

    @include('Club.contacto.mapa')

    @include('Club.contacto.formulario')

</div ><!-- /wrapper -->
<!-- End wrapper -->
@endsection