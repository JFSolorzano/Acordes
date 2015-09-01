@extends('Club.app')
@section('titulo')
    {{'Reservar | Acordes'}}
@endsection

@section('contenido')

    @include('Club.reservacion.crear.encabezado')

    @include('Club.reservacion.crear.terminos')

    <section class = "reservation" >
        <div class = "container" >
            <div class = "row" >
                <div class = "col-md-12 wow fadeInLeft" >
                    <header class = "align-center section-title" >
                        <h2 ><span >Resumen</span ></h2 >
                        <br ><br ><br >
                    </header >

                    <div class = "col-md-12" style = " display: -webkit-box;
                                                       display: -webkit-flex;
                                                       display: -ms-flexbox;
                                                       display:         flex;" >
                        <div class = "col-md-4 align-center personas " style = "border-right: 1px solid #969696;" >
                            <h3 >Cliente: <span >{{ \Auth::user()->name }}</span ></h3 >
                            <br ><br >

                            <h3 >Personas a llegar: <span >{{ $datos['personas'] }}</span ></h3 >
                            <br ><br >

                            <h3 >Fecha: <span >{{ $datos['fecha'] }}</span ></h3 >
                            <br >

                            <h3 >Cuenta: <span >${{ $datos['cuenta'] }}</span ></h3 >
                        </div >
                        <div class = "align-center col-md-4 "
                             style = " height: auto; border-right: 1px solid #969696;" >
                            <header class = "section-title" >
                                <h3 class = "align-center" ><span >Menu</span ></h3 >
                            </header >
                            <br >
                            <br >
                            @foreach($opciones as $indice => $opcion)
                                <h4 >{{ $opcion['nombre'] }} x {{ $cantidades[$indice] }}</h4 >
                                <br >
                            @endforeach
                        </div >
                        <div class = "align-center col-md-4" >
                            <header class = "section-title" >
                                <h3 class = "align-center" ><span >Mensaje</span ></h3 >
                            </header >
                            {{--<h3># Precocinado: <span>{{ $datos['precocinado'] }}</span></h3>--}}
                            <br >

                            <p style = "word-wrap: break-word" >{{ $datos['mensaje'] }}</p >
                        </div >
                    </div >
                    <div class = "col-md-12 align-center wow fadeInUp" >
                        <br ><br ><br ><br >
                        <a href = "#" class = "custom-button button-style1" >Imprimir</a >
                        <br ><br >
                        <a href = "{{ route('publicCuenta') }}" class = "custom-button button-style3" >IR A MI
                                                                                                       CUENTA</a >
                    </div >
                </div >
            </div >
        </div >
        <!-- /container -->
    </section >

    @include('Club.contacto.mapa')

    @include('Club.contacto.formulario')

@endsection