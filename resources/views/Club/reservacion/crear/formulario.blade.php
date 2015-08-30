<section class = "reservation" >
    <div class = "container" >
        <div class = "row" >
            <div class = "col-md-12 wow fadeInLeft" >
                <header class = " section-title" >
                    <h2 ><span >Formulario</span > online</h2 >
                </header >
                <br >

                <br >
                {!! Form::open(['route' => 'publicReservacion', 'method' => 'get','autocomplete'=>'on']) !!}
                <fieldset >
                    {!! Form::label('seleccionecomidas', 'Seleccione los platillos que desea reservar ',['for' => 'comidas']) !!}
                    <br ><br ><br >
                    <div id="comidas" class="owl-carousel owl-theme">
                        @foreach($platos as $plato)
                            <a class="item opcion" >
                                <img class="img" src = "{{ asset('club/img/gallery/gallery1.jpg') }}" alt = "{{ $plato->nombre }}" >
                            </a >
                        @endforeach
                    </div>
                    <br ><br ><br >
                    {!! Form::label('seleccionebebidas', 'Seleccione las bebidas que desea reservar ',['for' => 'bebidas']) !!}
                    <br ><br ><br >
                    <div id="bebidas" class="owl-carousel owl-theme">
                        @foreach($bebidas as $bebida)
                            {{--{{ dd($plato) }}--}}
                            <a class="item opcion" >
                                <img class="img" src = "{{ asset('club/img/gallery/gallery2.jpg') }}" alt = "{{ $bebida->nombre }}" >
                            </a >
                        @endforeach
                    </div>
                    <br ><br >
                    <button id="completarseleccion">Agregar</button>
                    <br ><br ><br >
                    {!! Form::label('opcioneseleccionadas', 'Opciones seleccionadas',['for' => 'seleccionados']) !!}
                    <div id="menuseleccionado" class="owl-carousel owl-theme">

                    </div>
                    <br ><br ><br >

                    <div id="seleccionados" class="owl-carousel owl-theme">
                        <a class="item opcion" >
                            <img class="img" src = "{{ asset('club/img/gallery/gallery3.jpg') }}" alt = "Nada Seleccionado" >
                        </a >
                    </div>
                    <br ><br ><br >
                    <div class = "input-container col-md-12" >
                        {!! Form::label('cantidadpersonas', 'Cantidad de personas',['for' => 'personas']) !!}
                        {!! Form::text('personas', null, ['placeholder'=>'ej. 4']) !!}
                    </div >
                    <!-- /input-container -->
                    <div class = "input-container  col-md-12" >
                        <div class = "form-group" >
                            {!! Form::label('fechasolicitud', 'Fecha ',['for' => 'fechaInicio']) !!}
                            {!! Form::date('fechaInicio',\Carbon\Carbon::now(), array('class'=>'text-center')) !!}
                        </div >
                    </div >
                    <div class = "input-container col-md-12" >
                        {!! Form::textarea('detalles', null, ['size' => '30x5', 'placeholder'=>'Mensaje', 'rows'=>'5']) !!}
                    </div >
                    <!-- /input-container -->
                    <div class = "input-container col-md-12 " >
                        <button type = "submit" class = "custom-button button-style1 text-center" ><i ></i >Enviar
                        </button >
                    </div >
                    <!-- /input-container -->
                </fieldset >
                {!! Form::close() !!}

                <button id="completarseleccion">Agregar</button>
                <br ><br ><br >
                {{--{!! Form::label('opcioneseleccionadas', 'Opciones seleccionadas',['for' => 'seleccionados']) !!}--}}
                <div id="menuseleccionado" class="owl-carousel owl-theme">

                </div>
            </div>
        </div >
        <!-- /col-md-6 -->
        <div class = "col-md-8 col-md-offset-4 wow fadeInRight" >
            <div class = "reservation-by-phone" >
                <header class = "section-title" >
                    <h2 ><span >Por</span > Telefono</h2 >
                </header >
                <div class = "contact-info" >
                    {{--<figure><img src="img/template-assets/icon-phone.png" alt="Marine Food Calling Info"></figure>--}}
                    <div class = "info-container" >
                        <h3 class = "phone-number" >(503) <span >7923 8323</span ></h3 >

                        <p class = "call-time" >entre las 10am-6pm, Lues a Viernes.</p >
                    </div >
                    <!-- /info-container -->
                </div >
                <!-- /call-info -->
                <address class = "contact-info" >
                    {{--<figure><img src="img/template-assets/icon-map-pin.png" alt="Marine Food Calling Info"></figure>--}}
                    <div class = "info-container" >
                        <p >Acordes.</p >

                        <p >Primera calle oriente y primera avenida norte </p >

                        <p >Frente a Plaza de la Cultura</p >

                        <p >Paseo El Carmen, Santa Tecla</p >
                    </div >
                    <!-- /info-container -->
                </address >
            </div >
            <!-- /reservation-by-phone -->
        </div >
        <!-- /col-md-6 -->
    </div >
    <!-- /row -->
    </div >
    <!-- /container -->
</section >