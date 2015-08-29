<section class = "reservation" >
    <div class = "container" >
        <div class = "row" >
            <div class = "col-md-12 wow fadeInLeft" >
                <header class = " section-title" >
                    <h2 ><span >Formulario</span > online</h2 >
                </header >
                <div>
                    <label for = "menuseleccionado" >Menu seleccionado</label >
                    <div id="menuseleccionado" class="owl-carousel owl-theme">

                    </div>

                    @foreach($comidas as $comida)
                        @foreach($comida as $datos)
                            <p>{{ $datos -> id }}</p>
                        @endforeach
                    @endforeach

                </div>
            </div>
        </div >
        <!-- /col-md-6 -->
    </div >
    <!-- /row -->
    </div >
    <!-- /container -->
</section >