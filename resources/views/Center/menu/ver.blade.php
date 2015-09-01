@extends('Center.app')

@section('titulo')
    {{'Opciones | Acordes'}}
@endsection
@section('contenido')
    <div class = "row-fluid" >
        <div class = "container" id="admin">
            @if(\Session::has('alerta'))
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{Session::get('alerta')}}</strong>
                </div>
            @endif
            <div class="container">
                <div class="row">
                    <div class = "col-md-4" > </div >
                    <div class = "col-md-4" ><h3 class="text-center">Opciones del menú</h3></div >
                    <div class = "col-md-4" ></div >
                </div>
                <div class="row">
                    <div class = "col-md-4" >
                        <a href = "{{ route('adminMenusNuevo') }}" class="btn btn-primary pull-left">Nuevo<span class="glyphicon glyphicon-plus" aria-hidden="true"></a >
                    </div >
                    <div class = "col-md-4" ></div >
                    <div class = "col-md-4" >
                        <div class="pull-right">
                            {!! Form::open([ 'url'=>'/menu','method'=>'GET', 'class'=> 'navbar-form navbar-left','role'=>'search']) !!}
                            <button type="submit" class="btn btn-default fa fa-search"></button>
                            {!! Form::text('parametros',null,['class'=>'form-control','placeholder'=>'Busqueda' ]) !!}
                            {!! Form::close() !!}
                        </div>
                    </div >
                </div>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                <th>Titulo</th>
                <th>Extras</th>
                <th>Descripcion</th>
                <th>Imagen</th>
                <th>Costo</th>
                <th>Menú</th>
                <th class="foo">Acciones</th>
                </thead>
                <tbody>
                @foreach($registros as $registro)
                            <tr>
                                <td>{{$registro->nombre}}</td>
                                <td>{{$registro->extra}}</td>
                                <td>{{$registro->descripcion}}</td>
                                <td><img src = "{{asset('img/'.$registro->imagen)}}" width="70" height="70" alt = "{{$registro->imagen}}" /></td>
                                <td>$ {{$registro->costo}}</td>
                               @foreach($menus as $m) @if($m->id == $registro->menu )<td>{{$m->nombre}}</td> @endif @endforeach
                                <td>
                                    <div class="btn-group-sm">
                                        <a href = "{{url('menu/'.$registro->id.'/editar')}}" class="btn btn-warning"><i class="fa fa-edit"></i></a >
                                        <a href = "{{url('menu/'.$registro->id.'/eliminar')}}" onclick="return confirm('Esta seguro que desea eliminar este dato')" class="btn btn-danger"><i class="fa fa-trash"></i></a >
                                    </div>
                                    <br />
                                    <small class="text-info"><i>Ultima actualizacion:</i> {{$registro->updated_at}}</small>
                                </td>
                            </tr>
                @endforeach
                </tbody>
            </table>
            <div class="container" align="center">
                <?php echo $registros->render() ?>
            </div>
        </div >
    </div >
@endsection