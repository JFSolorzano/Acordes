@extends('Center.app')

@section('titulo')
    {{'Informacion Empresarial | Acordes'}}
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
        <div class = "col-md-6" >
            <h1>INFORMACION EMPRESARIAL</h1>
        </div >
        <div class = "col-md-6 logo-container light-shark-bg align-right" >
            <h2 style = "display: inline-block" >{{ Auth::user()->name }}</h2 >
            <img class = "circular-image" src = "{{ Auth::user()->avatar }}" alt = "{{ Auth::user()->name }}" >
        </div >
        <!-- /logo-container -->
        <div class = "header-bottom-bar" >
            <div class = "container" >
                <div class = "row" >
                    <!-- /col-md-12 -->
                    <div class="col-md-3 col-md-offset-9">
                        {!! Form::open([ 'route'=>'adminEmpresa','method'=>'GET', 'class'=> 'search-form','role'=>'search']) !!}
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
                    <th>Dato</th>
                    <th>Contenido</th>
                    <th class="remove-item"> </th>
                </tr>
                </thead>
                <tbody>
                @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->nombre }}</td>
                        <td>{{ $registro->contenido }}</td>
                        <td >
                            <div class="btn-group-sm">
                                <a href = "{{ url('empresa/'.Hashids::encode($registro->id).'/editar') }}" class="remove-items-link"><i class="fa fa-edit"></i></a >
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
