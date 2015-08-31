@extends('Center.app')

@section('titulo')
    {{'Empresa | Acordes'}}
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
                    <div class = "col-md-4" ><h3 class="text-center">Informacion empresarial</h3></div >
                    <div class = "col-md-4" ></div >
                </div>
                <div class="row">
                    <div class = "col-md-4" >
                        <a href = "{{ route('EmpresaReport') }}" class="btn btn-danger pull-left" target="_blank">Reporte<span class="glyphicon glyphicon-plus" aria-hidden="true"></a >
                    </div >
                    <div class = "col-md-4 col-md-offset-8" >
                        </br>

                        <!--<div class="pull-right">
                            {!! Form::open([ 'route'=>'adminEmpresa','method'=>'GET', 'class'=> 'navbar-form navbar-left','role'=>'search']) !!}
                            <button type="submit" class="btn btn-default fa fa-search"></button>
                            {!! Form::text('parametros',null,['class'=>'form-control','placeholder'=>'Busqueda' ]) !!}
                            {!! Form::close() !!}
                        </div>-->
                    </div >
                </div>
            </div>

            <table class="table table-striped table-hover table-responsive">
                <thead>
                <th>Dato</th>
                <th>Contenido</th>
                <th class="foo">Acciones</th>
                </thead>
                <tbody>
                @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->nombre }}</td>
                        <td>{{ $registro->contenido }}</td>
                        <td width="50px">
                            <div class="btn-group-sm">
                                <a href = "{{ url('empresa/'.Hashids::encode($registro->id).'/editar') }}" class="btn btn-warning"><i class="fa fa-edit"></i></a >
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
