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
                    <img src = "{{ asset('img/encabezados/informacion-empresarial.png') }}" alt = "Informacion Empresarial" >
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
                <div class = "about-container" >
                    <div class = "row" >
                        @foreach($datos as $dato)
                            <div class = "col-md-6 wow fadeInLeft" >
                                <p >
                                    <span class = "dropcap" >{{ $dato->nombre }}</span >
                                    <br >
                                    {{ $dato->contenido }}

                                </p >
                            </div ><!-- /col-md-6 -->
                        @endforeach
                    </div >
                    <!-- /row -->
                </div >
                <!-- /about-container -->
            </div >
            <!-- /row -->
        </div >
        <!-- /contianer -->
        <div class = "members-carousel wow fadeInDown" >
            <div class = "members-carousel-nav" ></div >
            <ul class = "clearfix" >
                <li class = "overlay-container" >
                    <img src = "{{ asset('club/img/team/member3.jpg') }}" alt = "Miembro" >

                    <div class = "overlay" >
                        <div class = "overlay-details" >
                            <h3 >Gustave Bernier</h3 >

                            <p >Chef Ejecutivo</p >
                        </div >
                        <!-- /overlay-details -->
                        <div class = "buttons-container" >
                            <a href = "#" class = "button-link" ></a >
                            <a href = "#" class = "button-zoom" ></a >
                        </div >
                        <!-- /buttons-container -->
                    </div >
                    <!-- /overlay -->
                </li >
                <li class = "overlay-container" >
                    <img src = "{{ asset('club/img/team/member4.jpg') }}" alt = "Marine Food Gallery" >

                    <div class = "overlay" >
                        <div class = "overlay-details" >
                            <h3 >Gustave Bernier</h3 >

                            <p >Chef Ejecutivo</p >
                        </div >
                        <!-- /overlay-details -->
                        <div class = "buttons-container" >
                            <a href = "#" class = "button-link" ></a >
                            <a href = "#" class = "button-zoom" ></a >
                        </div >
                        <!-- /buttons-container -->
                    </div >
                    <!-- /overlay -->
                </li >
                <li class = "overlay-container" >
                    <img src = "{{ asset('club/img/team/member5.jpg') }}" alt = "Marine Food Gallery" >

                    <div class = "overlay" >
                        <div class = "overlay-details" >
                            <h3 >Gustave Bernier</h3 >

                            <p >Executive Chef</p >
                        </div >
                        <!-- /overlay-details -->
                        <div class = "buttons-container" >
                            <a href = "#" class = "button-link" ></a >
                            <a href = "#" class = "button-zoom" ></a >
                        </div >
                        <!-- /buttons-container -->
                    </div >
                    <!-- /overlay -->
                </li >
                <li class = "overlay-container" >
                    <img src = "{{ asset('club/img/team/member6.jpg') }}" alt = "Marine Food Gallery" >

                    <div class = "overlay" >
                        <div class = "overlay-details" >
                            <h3 >Gustave Bernier</h3 >

                            <p >Executive Chef</p >
                        </div >
                        <!-- /overlay-details -->
                        <div class = "buttons-container" >
                            <a href = "#" class = "button-link" ></a >
                            <a href = "#" class = "button-zoom" ></a >
                        </div >
                        <!-- /buttons-container -->
                    </div >
                    <!-- /overlay -->
                </li >
                <li class = "overlay-container" >
                    <img src = "{{ asset('club/img/team/member7.jpg') }}" alt = "Marine Food Gallery" >

                    <div class = "overlay" >
                        <div class = "overlay-details" >
                            <h3 >Gustave Bernier</h3 >

                            <p >Executive Chef</p >
                        </div >
                        <!-- /overlay-details -->
                        <div class = "buttons-container" >
                            <a href = "#" class = "button-link" ></a >
                            <a href = "#" class = "button-zoom" ></a >
                        </div >
                        <!-- /buttons-container -->
                    </div >
                    <!-- /overlay -->
                </li >
                <li class = "overlay-container" >
                    <img src = "{{ asset('club/img/team/member8.jpg') }}" alt = "Marine Food Gallery" >

                    <div class = "overlay" >
                        <div class = "overlay-details" >
                            <h3 >Gustave Bernier</h3 >

                            <p >Executive Chef</p >
                        </div >
                        <!-- /overlay-details -->
                        <div class = "buttons-container" >
                            <a href = "#" class = "button-link" ></a >
                            <a href = "#" class = "button-zoom" ></a >
                        </div >
                        <!-- /buttons-container -->
                    </div >
                    <!-- /overlay -->
                </li >
                <li class = "overlay-container" >
                    <img src = "{{ asset('club/img/team/member9.jpg') }}" alt = "Marine Food Gallery" >

                    <div class = "overlay" >
                        <div class = "overlay-details" >
                            <h3 >Gustave Bernier</h3 >

                            <p >Executive Chef</p >
                        </div >
                        <!-- /overlay-details -->
                        <div class = "buttons-container" >
                            <a href = "#" class = "button-link" ></a >
                            <a href = "#" class = "button-zoom" ></a >
                        </div >
                        <!-- /buttons-container -->
                    </div >
                    <!-- /overlay -->
                </li >
            </ul >
        </div >
        <!-- /members-carousel -->
        <div class = "promo wow fadeInUp" >
            <p >Uno no puede pensar bien, amar bien, dormir bien, <span >si no ha festejado bien.</span ></p >
        </div >
        <!-- /promo -->
    </section >

    <section class = "testimonials dark-bg custom-bg3 parallax" data-stellar-background-ratio = "0.5"
             data-stellar-vertical-offset = "-100" >
        <div class = "container" >
            <div class = "row" >
                <header class = "section-title wow fadeInUp" >
                    <h1 ><span >Que dice</span > la gente</h1 >
                </header >
                <div class = "testimonial-container col-md-10 col-md-offset-1 wow fadeInUp" >
                    <div class = "testimonial-carousel" >
                        <div class = "testimonial" >
                            <blockquote >
                                <p >Vivamus orci sem, consectetur ut vestibulum a, semper ac dui. Proin vulputate
                                    aliquam mi nec rerit. Sed entum velit vel ipsum bibendum tristique. Ut sem lacus,
                                    ttitor putate liquam mi nec hendrerit. Sed entum velit vel ipsum bibendum. sem
                                    lacus, porttitor et aliquam eget, iaculis id lacus. </p >
                            </blockquote >
                            <p class = "customer-name" >Sarah Doe</p >

                            <p class = "customer-job" >Jefe, compania.com</p >
                        </div >
                        <!-- /testimonial -->
                        <div class = "testimonial" >
                            <blockquote >
                                <p >Vivamus orci sem, consectetur ut vestibulum a, semper ac dui. Proin vulputate
                                    aliquam mi nec rerit. Sed entum velit vel ipsum bibendum tristique. Ut sem lacus,
                                    ttitor putate liquam mi nec hendrerit. Sed entum velit vel ipsum bibendum. sem
                                    lacus, porttitor et aliquam eget, iaculis id lacus. </p >
                            </blockquote >
                            <p class = "customer-name" >Sarah Doe</p >

                            <p class = "customer-job" >Jefe, compania.com</p >
                        </div >
                        <!-- /testimonial -->
                        <div class = "testimonial" >
                            <blockquote >
                                <p >Vivamus orci sem, consectetur ut vestibulum a, semper ac dui. Proin vulputate
                                    aliquam mi nec rerit. Sed entum velit vel ipsum bibendum tristique. Ut sem lacus,
                                    ttitor putate liquam mi nec hendrerit. Sed entum velit vel ipsum bibendum. sem
                                    lacus, porttitor et aliquam eget, iaculis id lacus. </p >
                            </blockquote >
                            <p class = "customer-name" >Sarah Doe</p >

                            <p class = "customer-job" >Jefe, compania.com</p >
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