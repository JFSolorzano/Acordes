<section class = "reservation" >
    <div class = "container" >
        <div class = "row" >
            <div class = "col-md-6 wow fadeInLeft" >
                <header class = "section-title" >
                    <h2 ><span >Formulario</span > de Solicitud</h2 >
                </header >
                {!! Form::open(['url'=>'solicitar-servicio','autocomplete'=>'on']) !!}
                <fieldset >
                    <div class = "input-container  col-md-12" >
                        <div class = "form-group" >
                            {!! Form::label('fechareservacion', 'Fecha ',['for' => 'fechaInicio']) !!}
                            {!! Form::date('fechaInicio',\Carbon\Carbon::now(), array('class'=>'text-center')) !!}
                            <?php echo Form::select('horaInicio', $horas, null) ?>
                            {!! Form::label('PM', 'PM',['style' => 'display: inline-block']) !!}
                        </div >
                    </div >
                    <div class = "input-container col-md-12" >
                        {!! Form::label('numPersonas', 'Numero De Personas ',['for' => 'personas']) !!}
                        <?php echo Form::selectRange('personas', 1, 50); ?>
                    </div >
                    <div id="platillos" class = "input-container col-md-12" >
                        {!! Form::label('numPlatillos', 'Platillos',['for' => 'plato','style' => 'width: 100%']) !!}
                        <?php echo Form::select('plato', $platos, null); ?>
                    </div >
                    <button id="mas-platillos">MAS</button>
                    <div class = "input-container col-md-12" >
                        {!! Form::label('numBebidas', 'Bebidas',['for' => 'bebida','style' => 'width: 100%']) !!}
                        <?php echo Form::select('bebida', $bebidas, null); ?>
                    </div >
                    <div class = "input-container col-md-12" >
                        {!! Form::textarea('detalles', null, ['size' => '30x5', 'placeholder'=>'Mensaje', 'rows'=>'5']) !!}
                    </div >
                    <!-- /input-container -->
                    <div class = "input-container col-md-12" >
                        {!! Form::text('telefono', null, ['placeholder'=>'Telefono']) !!}
                    </div >
                    <!-- /input-container -->
                    <div class = "input-container col-md-12 " >
                        <button type = "submit" class = "custom-button button-style1 text-center" ><i ></i >Enviar
                        </button >
                    </div >
                    <!-- /input-container -->
                </fieldset >
                {!! Form::close() !!}


            </div >
            <!-- /col-md-6 -->
            <div class = "col-md-6 wow fadeInRight" >
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