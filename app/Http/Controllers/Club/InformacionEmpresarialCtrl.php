<?php namespace Acordes\Http\Controllers\Club;

use Acordes\Http\Requests;
use Acordes\Http\Controllers\Controller;
use Acordes\Datos;
use Illuminate\Http\Request;

class InformacionEmpresarialCtrl extends Controller {

	function inicio()
	{

		$datos = Datos::all();

        $valores = $datos[0]->contenido;
        $mision = $datos[1]->contenido;
        $vision = $datos[2]->contenido;

		$opiniones = \DB::table('opiniones')
			->join('users','users.id','=','opiniones.cliente')
            ->where('opiniones.estado','=','1')
            ->select('users.name','opiniones.mensaje')
            ->get();

		return view('Club.acercaDe.empresa')
			->with(['vision'=>$vision, 'mision'=>$mision, 'opiniones'=>$opiniones]);

	}

}
