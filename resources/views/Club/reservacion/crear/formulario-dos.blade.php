<section class = "reservation" >
    <div class = "container" >
        <div class = "row" >
            <div class = "col-md-12 wow fadeInLeft" >
                <header class = "col-md-8 col-md-offset-4 section-title" >
                    <h2 ><span >Formulario</span > online - PASO <span >2</span ></h2 >
                </header >
                {!! Form::open(array('route'=>'publicPostReservacionPasoDos','method'=>'POST', 'id'=>'completar')) !!}
                <?php $costo_total = 0.0; ?>
                {!! Form::number('personas',$personas,['class'=>'hidden']) !!}
                <div class = "col-md-6 text-center" >
                    @if($comidas)
                        <div class = "col-md-12" >
                            <header class = " section-title" >
                                <h3 ><span >Comidas</span ></h3 >
                            </header >
                            <div class = "col-md-8 col-md-offset-2 text-center" >
                                <label for = "precocinado" >Tener comida preparada</label >
                                {!! Form::checkbox('precocinado', 1, ['class' => 'checkbox', 'id' => 'precocinado', 'style' => 'display: inline-block']) !!}
                            </div >
                            <br ><br >
                            <??>
                            @foreach($comidas as $comida)
                                @foreach($comida as $datos)
                                    <?php $costo_total += $datos->costo; ?>
                                    <div class = "comida-seleccionada col-md-12" >
                                        <div class = "col-md-4" >
                                            <img class = "circular-image"
                                                 src = "{{ asset('img/menus/'.$datos -> imagen) }}"
                                                 alt = "{{ $datos->nombre }}" >
                                        </div >
                                        <div class = "contenido col-md-8 text-center" >
                                            <div >
                                                <h4 class = "review-author" ><span >{{ $datos->nombre }}</span >
                                                </h4 >
                                            </div >
                                            <!-- /review-header -->
                                            <div class = "cantidad-a-reservar" >
                                                {!! Form::number('opciones[]', $datos->id, ['class'=>'hidden']) !!}
                                                <label for = "cantidades" ></label >
                                                {!! Form::number('cantidades[]',1,['class' => 'precio-comida']) !!}
                                            </div >
                                            <!-- /review-text -->
                                        </div >
                                        <div class = "costo" >
                                            <p class = "comida-costo hidden" >{{ $datos->costo }}</p >
                                        </div >
                                        <!-- /review-contents -->
                                    </div >
                                @endforeach
                            @endforeach
                        </div >
                    @endif

                    @if($bebidas)
                        <div class = "col-md-12" >
                            <header class = " section-title" >
                                <h3 ><span >Bebidas</span ></h3 >
                            </header >
                            @foreach($bebidas as $bebida)
                                @foreach($bebida as $datos)
                                    <?php $costo_total += $datos->costo; ?>
                                    <div class = "bebida-seleccionada col-md-12" >
                                        <div class = "col-md-4" >
                                            <img class = "circular-image"
                                                 src = "{{ asset('img/menus/'.$datos -> imagen) }}"
                                                 alt = "{{ $datos->nombre }}" >
                                        </div >
                                        <div class = "contenido col-md-8 text-center" >
                                            <div >
                                                <h4 class = "review-author" ><span >{{ $datos->nombre }}</span >
                                                </h4 >
                                            </div >
                                            <!-- /review-header -->
                                            <div class = "cantidad-a-reservar" >
                                                {!! Form::number('opciones[]', $datos->id, ['class'=>'hidden']) !!}
                                                <label for = "cantidades" ></label >
                                                {!! Form::number('cantidades[]',1,['class' => 'precio-bebida']) !!}
                                            </div >
                                            <!-- /review-text -->
                                        </div >
                                        <div class = "costo" >
                                            <p class = "bebida-costo hidden" >{{ $datos->costo }}</p >
                                        </div >
                                        <!-- /review-contents -->
                                    </div >
                                    <br ><br ><br ><br >
                                @endforeach
                            @endforeach
                        </div >
                    @endif
                </div >
                <div class = "col-md-6 text-center" >
                    <header class = "section-title" >
                        <h3 ><span >Fecha</span ></h3 >
                    </header >
                    <div class = "col-md-8" >
                        <input id = "datetimepicker" name = "fecha" type = "text" >
                    </div >
                    <div class = "col-md-4" >
                        <br ><br ><br ><br >
                        <label for = "duracion" >Duracion</label >
                        {!! Form::select('duracion',$duraciones) !!}
                    </div >
                    <div class = "col-md-12" >
                        <br ><br ><br >
                        <header class = "section-title" >
                            <h1 ><span >Cuenta</span ></h1 >
                        </header >
                        <br ><br >

                        <p id = "cuenta-total" >${{ $costo_total }}</p >
                        <input id = "cuenta-total-input" name="cuenta" class="hidden" value="{{ $costo_total }}">
                    </div >
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
            </div >
        </div >
    </div >
    <!-- /container -->
</section >