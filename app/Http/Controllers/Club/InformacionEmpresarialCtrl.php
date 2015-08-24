<?php namespace Acordes\Http\Controllers\Club;

use Acordes\Http\Requests;
use Acordes\Http\Controllers\Controller;
use Acordes\Datos;
use Illuminate\Http\Request;

class InformacionEmpresarialCtrl extends Controller {

	function inicio(Request $request)
	{
//		$datos = new stdClass;

		$datos = Datos::all();

//        dd($datos);

		return view('Club.acercaDe.empresa')
			->with('datos',$datos);

	}

}
