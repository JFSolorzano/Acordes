<?php namespace Acordes\Http\Controllers\Club;

use Acordes\Http\Requests;
use Acordes\Http\Controllers\Controller;
use Acordes\Servicios;

class ServiciosCtrl extends Controller {

	public function inicio(){

        $servicios = Servicios::all(['nombre','descripcion', 'imagen', 'estado']);

        return view('Club.servicios.completo')
            ->with('servicios',$servicios);

    }

}
