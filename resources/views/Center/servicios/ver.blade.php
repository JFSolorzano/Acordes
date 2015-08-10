@extends('Center.app')

@section('titulo')
    {{'Servicios | Acordes'}}
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
                    <div class = "col-md-4" ><h3 class="text-center">Servicios!</h3></div >
                    <div class = "col-md-4" ></div >
                </div>
                <div class="row">
                    <div class = "col-md-4" >
                        {!! Form::open([ 'route'=>'adminServicios','method'=>'GET', 'class'=> 'navbar-form navbar-left','role'=>'search']) !!}
                        <button type="submit" class="btn btn-default">Buscar</button>
                        <div class="form-group">
                            {!! Form::text('variable',null,['class'=>'form-control','placeholder'=>'Busqueda' ]) !!}
                        </div>
                        {!! Form::close() !!}
                    </div >
                    <div class = "col-md-4" ></div >
                    <div class = "col-md-4 " >
                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-4">
                                <a href = "{{ route('adminServiciosCrear') }}" class="btn btn-primary pull-right">Nuevo</a >
                            </div>
                        </div>
                    </div >
                </div>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th class="foo">Acciones</th>
                </thead>
                <tbody>
                @foreach($registros as $registro)
                    <tr>
                        <td>{{$registro->nombre}}</td>
                        <td>{{$registro->descripcion}}</td>
                        @if(($registro->estado)==0)
                            <td>No disponible</td>
                        @else
                            <td>Disponible</td>
                        @endif
                        <td>
                            <div class="btn-group-sm">
                                <a href = "{{url('servicios/'.$registro->id.'/editar')}}" class="btn btn-warning"><i class="fa fa-edit"></i></a >
                                <a href = "{{url('servicios/'.$registro->id.'/eliminar')}}" onclick="return confirm('Esta seguro que desea eliminar este dato')" class="btn btn-danger"><i class="fa fa-trash"></i></a >
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