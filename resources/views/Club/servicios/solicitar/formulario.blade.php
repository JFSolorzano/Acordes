<section class = "reservation" >
    <div class = "container" >
        <div class = "row" >
            <div class = "col-md-12 wow fadeInLeft" >
                <header class = " section-title" >
                    <h2 ><span >Formulario</span > online</h2 >
                </header >
                <br ><br >
                {!! Form::open(array('route'=>'publicPostSolicitarServicio','method'=>'POST', 'id'=>'reservar')) !!}

                <div class = "servicios col-md-7" >
                    <header class = " section-title" >
                        <h3 ><span >Servicios</span ></h3 >
                    </header >
                    @foreach($servicios as $servicio)
                        <div class = "thumb text-center col-md-4" >
                            <label for = "{{ $servicio->id }}" ><img class = "img"
                                                                     src = "{{ asset('img/servicios/'.$servicio->imagen) }}" /></label >
                            <span >{{ $servicio->nombre }}</span >
                            <input type = "checkbox" class = "chk " checked = "checked" id = "{{ $servicio->id }}"
                                   name = "servicios[]"
                                   value = "{{ $servicio->id }}" />
                        </div >
                    @endforeach

                </div >
                <div class = "col-md-5 text-center" >
                    <header class = " section-title" >
                        <h3 ><span >Fecha</span ></h3 >
                    </header >
                    <input id = "datetimepicker-ser" name = "fecha" type = "text">
                </div >

                <div class = "col-md-12" >
                    <br ><br ><br >
                    <header class = "section-title" >
                        <h3 ><span >Mensaje</span ></h3 >
                    </header >
                    {!! Form::textarea('mensaje',null,['size' => '150x20', 'placeholder' => 'Escribe aqui tu mensaje...']) !!}
                </div >

                <div class = "col-md-12 text-center" >
                    <div class = "col-md-8 col-md-offset-5" >
                        {!! Form::submit('Enviar', ['id'=>'enviar']) !!}
                    </div >
                </div >
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

