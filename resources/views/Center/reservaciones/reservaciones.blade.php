@extends('index')

@section('titulo')
    {{'Reservaciones | Acordes'}}
@endsection
@section('content')
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
                    <div class = "col-md-4" ><h3 class="text-center">Reservaciones!</h3></div >
                    <div class = "col-md-4" ></div >
                </div>
                <div class="row">
                    <div class = "col-md-4 col-md-offset-8" >
                        <div class="pull-right">
                            {!! Form::open([ 'route'=>'menu-restaurante','method'=>'GET', 'class'=> 'navbar-form navbar-left','role'=>'search']) !!}
                            {!! Form::text('parametros',null,['class'=>'form-control','placeholder'=>'Busqueda' ]) !!}
                            {!! Form::submit('BUSCAR',array('class'=>'text-center btn btn-default')) !!}
                            {!! Form::close() !!}
                        </div>
                    </div >
                </div>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                <th></th>
                <th>Extra</th>
                <th>Descripcion</th>
                <th>Costo</th>
                <th class="foo">Acciones</th>
                </thead>
                <tbody>
                @foreach($datos as $d)
                    <tr>
                        <td>{{$d->nombre}}</td>
                        <td>{{$d->contenidoExtra}}</td>
                        <td>{{$d->descripcionCompleta}}</td>
                        <td><img src = "{{asset('img/'.$d->imagenPequena)}}" width="70" height="70" alt = "{{$d->imagenPequena}}" /></td>
                        <td>{{$d->costo}}</td>
                        <td></td>
                        <td>
                            <div class="btn-group-sm">
                                <a href = "{{url('menu-restaurante/'.$d->id.'/editar')}}" class="btn btn-warning"><i class="fa fa-edit"></i></a >
                                <a href = "{{url('menu-restaurante/'.$d->id.'/eliminar')}}" onclick="return confirm('Esta seguro que desea eliminar este dato')" class="btn btn-danger"><i class="fa fa-trash"></i></a >
                            </div>
                            <br />
                            <small class="text-info"><i>Ultima actualizacion:</i> {{$d->updated_at}}</small>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="container" align="center">
                <?php echo $datos->render() ?>
            </div>
        </div >
    </div >
@endsection