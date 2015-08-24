<?php namespace Acordes\Http\Controllers\Club;

use Acordes\Http\Requests;
use Acordes\Http\Controllers\Controller;
use Acordes\Menus;
use Acordes\Opciones;

class MenuCtrl extends Controller {

	public function inicio(){

        $menus = Menus::with('opciones')->get();

        return view('Club.menu.completo')
            ->with('menus',$menus);

    }

    public function opcion($slug){


        $opcion = \DB::table('Opciones')
            ->join('Menus', 'Opciones.menu', '=', 'Menus.id')
            ->where('Opciones.slug','=',$slug)
            ->select('Opciones.id', 'Opciones.nombre', 'Opciones.extra', 'Opciones.descripcion', 'Opciones.costo',
                    'Opciones.imagen','Menus.nombre AS menu')
            ->get();

//        $opcion = Opciones::findBySlug($slug);

        $opcion = array_values($opcion)[0];

        return view('Club.menu.detalle')
            ->with('opcion',$opcion);

    }

}
