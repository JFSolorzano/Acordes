@extends('Club.app')
@section('titulo')
{{'Restaurante Acordes'}}
@endsection
@section('contenido')
<!-- Start wrapper -->
<div class="wrapper">

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
    <section class="store-items store-items-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="store-item store-item-detail row">
                        <div class="col-md-6 wow fadeInLeft">
                            <div class="item-slideshow">
                                <div class="main-image">
                                    <figure><img src="{{ asset('img/menus/'.$opcion->imagen) }}" alt="{{ $opcion -> nombre }}"></figure>
                                </div><!-- /main-image -->
                            </div><!-- /item-slideshow -->
                        </div><!-- /col-md-6 -->
                        <div class="col-md-6 wow fadeInRight">
                            <ul class="breadcrumb">
                                <li><a href="#">{{ $opcion -> menu }}</a></li>
                            </ul>
                            <div class="food-info">
                                <h3 class="food-name">{{ $opcion -> nombre }}</h3>
                                <p class="food-price">${{ $opcion -> costo }}</p>
                                <p>{{ $opcion -> descripcion }}</p>
                            </div><!-- /food-info -->
                            <div class="food-tags-category">
                                <div class="food-category">
                                    <h6>Categoria: </h6>
                                    <ul>
                                        <li><a href="#">{{ $opcion -> menu }}</a></li>
                                    </ul>
                                </div><!-- /category -->
                            </div><!-- /food-tags-category -->
                        </div><!-- /col-md-6 -->
                    </div><!-- /store-item -->
                </div><!-- /col-md-12 -->
                {{--<div class="col-md-12">--}}
                    {{--<div class="related-items-container">--}}
                        {{--<header class="section-title wow fadeInDown">--}}
                            {{--<h3>productos relacionados</h3>--}}
                        {{--</header>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-8 col-md-offset-2">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-md-6 wow fadeInDown">--}}
                                        {{--<div class="store-item">--}}
                                            {{--<figure>--}}
                                                {{--<a href="store-item.html">--}}
                                                    {{--<img src="img/gallery/gallery22.jpg" alt="Marine Food Store">--}}
                                                {{--</a>--}}
                                            {{--</figure>--}}
                                            {{--<h3 class="food-name"><a href="store-item.html">Taco with Meat &amp; Avocado</a></h3>--}}
                                            {{--<ul class="food-category">--}}
                                                {{--<li>mexican</li>--}}
                                                {{--<li>fruits</li>--}}
                                                {{--<li>meat</li>--}}
                                                {{--<li>taco</li>--}}
                                            {{--</ul>--}}
                                            {{--<div class="food-order">--}}
                                                {{--<p class="food-price">$11.89</p>--}}
                                                {{--<a href="#" class="add-to-cart-link">Add To Cart</a>--}}
                                            {{--</div><!-- /food-order -->--}}
                                        {{--</div><!-- /store-item -->--}}
                                    {{--</div><!-- /col-md-6 -->--}}
                                    {{--<div class="col-md-6 wow fadeInDown" data-wow-delay="0.2s">--}}
                                        {{--<div class="store-item">--}}
                                            {{--<figure>--}}
                                                {{--<a href="store-item.html">--}}
                                                    {{--<img src="img/gallery/gallery21.jpg" alt="Marine Food Store">--}}
                                                {{--</a>--}}
                                            {{--</figure>--}}
                                            {{--<h3 class="food-name"><a href="store-item.html">Spring Fruit Salad</a></h3>--}}
                                            {{--<ul class="food-category">--}}
                                                {{--<li>spanish</li>--}}
                                                {{--<li>fruits</li>--}}
                                                {{--<li>salad</li>--}}
                                            {{--</ul>--}}
                                            {{--<div class="food-order">--}}
                                                {{--<p class="food-price">$24.95</p>--}}
                                                {{--<a href="#" class="add-to-cart-link">Add To Cart</a>--}}
                                            {{--</div><!-- /food-order -->--}}
                                        {{--</div><!-- /store-item -->--}}
                                    {{--</div><!-- /col-md-6 -->--}}
                                {{--</div><!-- /row -->--}}
                            {{--</div><!-- /col-md-8 -->--}}
                        {{--</div><!-- /row -->--}}
                    {{--</div><!-- /related-items-container -->--}}
                {{--</div><!-- /col-md-12 -->--}}
            </div><!-- /row -->
        </div><!-- /container -->
    </section>

</div><!-- /wrapper -->
<!-- End wrapper -->
@endsection