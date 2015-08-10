@extends('Center.app')

@section('titulo')
    {{'Empleados | Acordes'}}
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
                    <div class = "col-md-4" ><h3 class="text-center">Empleados!</h3></div >
                    <div class = "col-md-4" ></div >
                </div>
                <div class="row">
                    <div class = "col-md-4" >
                        <a href = "{{ route('adminEmpleadosCrear') }}" class="btn btn-primary pull-left">Nuevo</a >
                    </div >
                    <div class = "col-md-4" ></div >
                    <div class = "col-md-4" >
                        <div class="pull-right">
                            {!! Form::open([ 'route'=>'adminEmpleados','method'=>'GET', 'class'=> 'navbar-form navbar-left','role'=>'search']) !!}
                            {!! Form::text('parametros',null,['class'=>'form-control','placeholder'=>'Busqueda' ]) !!}
                            {!! Form::submit('BUSCAR',array('class'=>'text-center btn btn-default')) !!}
                            {!! Form::close() !!}
                        </div>
                    </div >
                </div>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                <th>Integrante</th>
                <th>Cargo</th>
                <th>Biografia</th>
                <th>Foto</th>
                <th class="foo">Acciones</th>
                </thead>
                <tbody>
                @foreach($registros as $registro)
                    <tr>
                        <td>{{$registro->nombres}}</td>
                        <td>{{$registro->cargo}}</td>
                        <td>{{$registro->biografia}}</td>
                        <td><img src = "{{asset('img/'.$registro->foto)}}" width="70" height="70" alt = "{{$registro->foto}}" /></td>
                        <td>
                            <div class="btn-group-sm">
                                <a href = "{{url('empleados/'.$registro->id.'/editar')}}" class="btn btn-warning"><i class="fa fa-edit"></i></a >
                                <a href = "{{url('empleados/'.$registro->id.'/eliminar')}}" onclick="return confirm('Esta seguro que desea eliminar este dato')" class="btn btn-danger"><i class="fa fa-trash"></i></a >
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