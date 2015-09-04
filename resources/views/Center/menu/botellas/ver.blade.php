@extends('Center.app')

@section('titulo')
    {{'Menu Botellas | Acordes'}}
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
            <h1 class="align-center"><span>BOTELLAS</span></h1>
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
                                <li><select name = "menu" onchange="location = this.value" >
                                        <option value = "#" >Seleccione una opcion...</option >
                                        <option value = "/menu" >Todos</option >
                                        <option value = "/menu/sin-alcohol" >Bebidas Sin Alcohol</option >
                                        <option value = "/menu/cervezas"  >Cervezas</option >
                                        <option value = "/menu/con-alcohol" >Bebidas Con Alcohol</option >
                                        <option value = "/menu/bebidas-calientes" >Bebidas Calientes</option >
                                        <option value = "/menu/bebidas-especiales" >Bebidas Especiales</option >
                                        <option value = "/menu/botellas" >Botellas</option >
                                        <option value = "/menu/para-picar" >Para Picar</option >
                                        <option value = "/menu/platos-fuertes" >Platos Fuertes</option >
                                        <option value = "/menu/bocas" >Bocas</option >
                                        <option value = "/menu/paninis" >Paninis</option >
                                    </select ></li>
                                <li ><a href = "{{ route('BotellasReport') }}" target="_blank" >IMPRIMIR</a ></li >
                                <li ><a href = "{{ route('adminMenusNuevo') }}" >NUEVA OPCION</a ></li >
                            </ul >
                        </div >
                        <!-- /contact-info -->
                    </div >
                    <!-- /col-md-12 -->
                    <div class="col-md-3">
                        {!! Form::open([ 'url'=>'/menu/botellas','method'=>'GET', 'class'=> 'search-form', 'role'=>'search']) !!}
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
                    <th >Titulo</th >
                    <th >Descripcion</th >
                    <th >Costo</th >
                    <th class="remove-item"> </th>
                </tr>
                </thead>
                <tbody>
                @foreach($registros as $registro)
                    <tr>
                        <td class="item-thumb">
                            <figure>
                                <img src = "{{asset('img/menus/'.$registro->imagen)}}" alt = "{{$registro->imagen}}" />
                            </figure>
                        </td>
                        <td>{{$registro->nombre}}<br >{{ $registro->extra }}</td>
                        <td>{{$registro->descripcion}}</td>
                        <td >$ {{$registro->costo}}</td >
                        <td >
                            <div class="btn-group-sm">
                                <a href = "{{url('menu/botellas/'.Hashids::encode($registro->id).'/detalles')}}" ><i class="fa fa-archive"></i></a >
                                <a href = "{{url('menu/botellas/'.Hashids::encode($registro->id).'/editar')}}" ><i class="fa fa-edit"></i></a >
                                <a href = "{{url('menu/botellas/'.$registro->id.'/eliminar')}}" onclick="return confirm('Esta seguro que desea eliminar esta opcion?')" ><i class="fa fa-trash"></i></a >
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
