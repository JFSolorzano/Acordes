@extends('Center.app')

@section('titulo')
    {{'Empleados | Acordes'}}
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
                <h1 class="align-center"><span>USUARIOS</span></h1>
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
                                <li ><a href = "{{ route('adminEmpleadosCrear') }}" >NUEVO USUARIO</a ></li >
                            </ul >
                        </div >
                        <!-- /contact-info -->
                    </div >
                    <!-- /col-md-12 -->
                    <div class="col-md-3">
                        {!! Form::open([ 'route'=>'adminEmpleados','method'=>'GET', 'class'=> 'search-form','role'=>'search']) !!}
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
                        <th class="item-thumb">Foto</th>
                        <th>Nombre</th>
                        <th>Rol</th>
                        <th class="remove-item"> </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($registros as $registro)
                    <tr>
                        <td class="item-thumb">
                            <figure>
                                <img src = "{{asset('img/'.$registro->foto)}}" alt = "{{$registro->foto}}" />
                            </figure>
                        </td>
                        <td class="item-desc">{{$registro->nombres}}</td>
                        <td>wr12454575</td>
                        <td class="remove-item">
                            <a href = "{{url('empleados/'.$registro->id.'/editar')}}" class="remove-items-link"><i class="fa fa-times-circle"></i></a >
                            <a href = "{{url('empleados/'.$registro->id.'/eliminar')}}" onclick="return confirm('Esta seguro que desea eliminar este dato')" class="remove-items-link"><i class="fa fa-edit"></i></a >
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