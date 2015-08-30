<section class = "reservation" >
    <div class = "container" >
        <div class = "row" >
            <div class = "col-md-12 wow fadeInLeft" >
                <header class = " section-title" >
                    <h2 ><span >Formulario</span > online - PASO <span >1</span ></h2 >
                </header >
                <br ><br >
                {!! Form::open(array('route'=>'publicReservacionPasoDos','method'=>'POST', 'id'=>'reservar')) !!}
                    <label for = "cantidadpersonas" >Cantidad de personas</label >
                    <input name = "personas" type = "number" placeholder = "#" >
                    <br ><br ><br >

                    <label for = "comidas" >Seleccione los platillos que desea reservar</label >
                    <br ><br ><br >

                    <div id = "comidas" class = "owl-carousel owl-theme" >

                        @foreach($platos as $plato)
                            <a class = "item opcion comida" >
                                <p class = "hidden id" >{{ $plato->id }}</p >
                                <p class = "hidden imagen" >{{ $plato->imagen }}</p >
                                <p class = "hidden nombre" >{{ $plato->nombre }}</p >
                                <p class = "hidden costo" >{{ $plato->costo }}</p >
                                <img id = "{{ $plato->id }}" class = "img"
                                     src = "{{ asset('img/menus/'.$plato->imagen) }}" alt = "{{ $plato->nombre }}" >
                            </a >
                        @endforeach

                    </div >
                    {!! Form::hidden('json_comidas') !!}
                    <br ><br ><br >

                    <div id = "bebidas" class = "owl-carousel owl-theme" >
                        @foreach($bebidas as $bebida)
                            <a class = "item opcion bebida" >
                                <p class = "hidden id" >{{ $bebida->id }}</p >
                                <p class = "hidden imagen" >{{ $bebida->imagen }}</p >
                                <p class = "hidden nombre" >{{ $bebida->nombre }}</p >
                                <p class = "hidden costo" >{{ $bebida->costo }}</p >
                                <img id = "{{ $bebida->id }}" class = "img"
                                     src = "{{ asset('img/menus/'.$bebida->imagen) }}"
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

