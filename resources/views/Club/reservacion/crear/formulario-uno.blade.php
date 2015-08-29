<section class = "reservation" >
    <div class = "container" >
        <div class = "row" >
            <div class = "col-md-12 wow fadeInLeft" >
                <header class = " section-title" >
                    <h2 ><span >Formulario</span > online</h2 >

                    <h3 >Paso <span >1</span ></h3 >
                </header >
                <br ><br >
                {!! Form::open(array('route'=>'publicReservacionPasoDos','method'=>'POST', 'id'=>'reservar')) !!}
                    <label for = "cantidadpersonas" >Cantidad de personas</label >
                    <input id = "personas" type = "text" placeholder = "#" >
                    <br ><br ><br >

                    <label for = "comidas" >Seleccione los platillos que desea reservar</label >
                    <br ><br ><br >

                    <div id = "comidas" class = "owl-carousel owl-theme" >

                        @foreach($platos as $plato)
                            <a class = "item opcion comida" >
                                <p class = "hidden" >{{ $plato->id }}</p >
                                <img id = "{{ $plato->id }}" class = "img"
                                     src = "{{ asset('club/img/gallery/gallery1.jpg') }}" alt = "{{ $plato->nombre }}" >
                            </a >
                        @endforeach

                    </div >
                    {!! Form::hidden('json_comidas') !!}
                    <br ><br ><br >

                    <div id = "bebidas" class = "owl-carousel owl-theme" >
                        @foreach($bebidas as $bebida)
                            <a class = "item opcion bebida" >
                                <p class = "hidden" >{{ $bebida->id }}</p >
                                <img id = "{{ $plato->id }}" class = "img"
                                     src = "{{ asset('club/img/gallery/gallery2.jpg') }}"
                                     alt = "{{ $bebida->nombre }}" >
                            </a >
                        @endforeach

                    </div >
                    {!! Form::hidden('json_bebidas') !!}
                    <br ><br >
                    {!! Form::submit('Siguiente', ['id'=>'siguiente']) !!}
                {!! Form::close() !!}
                <br ><br ><br >
                <!-- /input-container -->
            </div >
        </div >
        <!-- /col-md-6 -->
    </div >
    <!-- /row -->
    </div >
    <!-- /container -->
</section >

