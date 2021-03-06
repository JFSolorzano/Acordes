@extends('Center.app')

@section('titulo')
    {{'Servicios | Acordes'}}
@endsection
@section('contenido')
    <header class = "main-header" id = "top" >
        @if(\Session::has('alerta'))
            <div class = "col-md-12 text-right alert alert-dismissible alert-success"
                 style = "background-color: white" >
                <button type = "button" class = "close" data-dismiss = "alert" >×</button >
                <h1 >{{Session::get('alerta')}}</h1 >
                <br >
            </div >
        @endif
        @if ( !$errors->isEmpty() )
            <div class = "col-md-12 alert alert-dismissible alert-danger" >
                <button type = "button" class = "close" data-dismiss = "alert" >×</button >
                <ul >
                    @foreach ( $errors->all() as $error )
                        <li >{{ $error }}</li >
                    @endforeach
                </ul >
                <br >
            </div >
        @endif

        <div class = "logo-container light-shark-bg align-right" >
            <br >
            <h1 class="align-center"><span>SERVICIOS</span></h1>
            <h2 style = "display: inline-block" >{{ Auth::user()->name }}</h2 >
            <img class = "circular-image" src = "{{ Auth::user()->avatar }}" alt = "{{ Auth::user()->name }}" >
        </div >
        <!-- /logo-container -->
        <div class = "header-bottom-bar" >
            <div class = "container" >
                <div class = "row" >
                    <div class = "col-md-9" >
                        <div class = "contact-info align-right" >
                            <ul >
                                <li ><a href = "{{ route('ServiciosReport') }}" >IMPRIMIR</a ></li >
                                <li ><a href = "{{ route('adminServiciosCrear') }}" >NUEVO SERVICIO</a ></li >
                            </ul >
                        </div >
                        <!-- /contact-info -->
                    </div >
                    <!-- /col-md-12 -->
                    <div class="col-md-3">
                        {!! Form::open([ 'route'=>'adminRedes','method'=>'GET', 'class'=> 'search-form','role'=>'search']) !!}
                        <input type="search" name="parametros" id="search" placeholder="Buscar">
                        <button type="submit"><i class="fa fa-search"></i></button>
                        {!! Form::close() !!}
                    </div><!-- /col-md-3 -->
                </div >
                <!-- /row -->
            </div >
            <!-- /container -->
        </div >
        <!-- /header-bottom-bar -->
    </header >
    <section class="store-cart">
        <div class="container items-table">
            <table>
                <thead>
                <tr>
                    <th class="item-thumb">Imagen</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Estado</th>
                    <th class="remove-item"> </th>
                </tr>
                </thead>
                <tbody>
                @foreach($registros as $registro)
                    <tr>
                        <td class="item-thumb">
                            <figure>
                                <img src = "{{asset('img/'.$registro->imagen)}}" alt = "{{$registro->imagen}}" />
                            </figure>
                        </td>
                        <td>{{$registro->nombre}}</td>
                        <td>{{$registro->descripcion}}</td>
                        @if($registro->estado == 1)<td> Disponible</td> @endif
                        @if($registro->estado == 0)<td> No disponible</td> @endif
                        <td >
                            <div class="btn-group-sm">
                                <a href = "{{url('servicios/'.Hashids::encode($registro->id).'/detalles')}}" ><i class="fa fa-archive"></i></a >
                                <a href = "{{url('servicios/'.Hashids::encode($registro->id).'/editar')}}" ><i class="fa fa-edit"></i></a >
                                <a href = "{{url('servicios/'.$registro->id.'/eliminar')}}" onclick="return confirm('Esta seguro que desea eliminar este servicio?')" ><i class="fa fa-trash"></i></a >
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="container" align="center">
                <?php echo $registros->render() ?>
            </div>
        </div><!-- /container -->
    </section>
@endsection