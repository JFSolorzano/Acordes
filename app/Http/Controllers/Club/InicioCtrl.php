<?php namespace Acordes\Http\Controllers\Club;

use Acordes\Http\Requests;
use Acordes\Http\Controllers\Controller;
use Acordes\Empleados;
use Acordes\Opciones;
use Acordes\Promociones;
use Acordes\Menus;
use Acordes\Servicios;

use Illuminate\Http\Request;
use stdClass;

class InicioCtrl extends Controller {


	function inicio(Request $request)
    {
        $datos = new stdClass;

        $datos -> empleados = Empleados::with('cargo')->get();

        $opcionesMenu = Opciones::with('menu')->get();

        $promociones = Promociones::all(['nombre','imagen','inicio']);

        $array = array_merge($opcionesMenu->toArray(), $promociones->toArray());
        shuffle($array);

        $datos -> menus = Menus::with('opciones')->get();

        $datos -> galeria = $array;

        $datos -> filtros = Menus::all(['nombre']);

        $datos -> servicios = Servicios::all(['nombre','descripcion', 'imagen', 'estado']);

//        dd($datos -> menus );

        return view('Club.inicio')
            ->with('datos',$datos);

    }

}
